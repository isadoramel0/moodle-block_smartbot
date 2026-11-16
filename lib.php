<?php

/**
 * Callbacks for block_smartbot.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Darken a hex color by the given percentage.
 *
 * @param string $hex Color in #RGB or #RRGGBB format.
 * @param float $percent Amount to darken, from 0 to 1.
 * @return string Darkened color in #RRGGBB format.
 */
function block_smartbot_darken_color(string $hex, float $percent): string {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }

    $red = (int)round(hexdec(substr($hex, 0, 2)) * (1 - $percent));
    $green = (int)round(hexdec(substr($hex, 2, 2)) * (1 - $percent));
    $blue = (int)round(hexdec(substr($hex, 4, 2)) * (1 - $percent));

    return sprintf('#%02x%02x%02x', $red, $green, $blue);
}

/**
 * Add the SmartBot chat to the page footer for logged-in users.
 *
 * @return string
 */
function block_smartbot_before_footer(): string {
    global $OUTPUT, $PAGE;
    //Verifica quem está acessando
    if (!isloggedin() || isguestuser()) {
        return '';
    }
    //Lê as configurações salvas
    $botname = get_config('block_smartbot', 'botname');
    if (empty($botname)) {
        $botname = get_string('pluginname', 'block_smartbot');
    }

    $iconposition = get_config('block_smartbot', 'iconposition');
    $validpositions = ['bottomright', 'bottomleft', 'topright', 'topleft'];
    if (!in_array($iconposition, $validpositions, true)) {
        $iconposition = 'bottomright';
    }

    $primarycolor = get_config('block_smartbot', 'primarycolor');
    if (empty($primarycolor) || !preg_match('/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6})$/', $primarycolor)) {
        $primarycolor = '#2C5279';
    }
    $primarycolordark = block_smartbot_darken_color($primarycolor, 0.25);

    $subtitle = get_config('block_smartbot', 'subtitle');
    if ($subtitle === false || $subtitle === '') {
        $subtitle = '';
    } else {
        $subtitle = format_string($subtitle);
    }

    $welcomemessage = get_config('block_smartbot', 'welcomemessage');
    if (empty($welcomemessage)) {
        $welcomemessage = get_string('welcomemessage_default', 'block_smartbot');
    }

    $questions = [
        ['text' => get_string('faq_question_image', 'block_smartbot')],
        ['text' => get_string('faq_question_submit', 'block_smartbot')],
        ['text' => get_string('faq_question_grades', 'block_smartbot')],
        ['text' => get_string('faq_question_forums', 'block_smartbot')],
    ];
    $faqcount = get_config('block_smartbot', 'faqcount');
    if ($faqcount === false || $faqcount === '') {
        $faqcount = 4;
    }
    $faqcount = max(1, min((int)$faqcount, 10));

    $context = [
        'botname' => format_string($botname),
        'iconpositionclass' => 'block_smartbot-widget--' . $iconposition,
        'primarycolor' => $primarycolor,
        'primarycolordark' => $primarycolordark,
        'subtitle' => $subtitle,
        'openlabel' => get_string('chat_open', 'block_smartbot'),
        'closelabel' => get_string('chat_close', 'block_smartbot'),
        'termslabel' => get_string('terms_of_use', 'block_smartbot'),
        'welcomemessage' => $welcomemessage,
        'faqbutton' => get_string('view_faq', 'block_smartbot'),
        'frequenttitle' => get_string('frequent_questions', 'block_smartbot'),
        'questions' => array_slice($questions, 0, $faqcount),
        'demo_user_message' => get_string('demo_user_message', 'block_smartbot'),
        'demo_answer_intro' => get_string('demo_answer_intro', 'block_smartbot'),
        'demo_answer_topics' => [
            ['text' => get_string('demo_answer_topic_one', 'block_smartbot')],
            ['text' => get_string('demo_answer_topic_two', 'block_smartbot')],
            ['text' => get_string('demo_answer_topic_three', 'block_smartbot')],
        ],
        'messageplaceholder' => get_string('message_placeholder', 'block_smartbot'),
        'sendlabel' => get_string('message_send', 'block_smartbot'),
        'disclaimer' => get_string('ai_disclaimer', 'block_smartbot'),
    ];

    $PAGE->requires->js_call_amd('block_smartbot/chat', 'init');

    //Renderiza o template: passa os dados para chat.mustache e devolve o HTML que será inserido na página.
    return $OUTPUT->render_from_template('block_smartbot/chat', $context);
}
