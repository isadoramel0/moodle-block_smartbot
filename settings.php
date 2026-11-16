<?php
/**
 * Admin settings for block_smartbot.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if ($ADMIN->fulltree) {
    // cria títulos para agrupar os campos
    $settings->add(new admin_setting_heading(
        'block_smartbot/modelheading',
        get_string('modelheading', 'block_smartbot'),
        ''
    ));

    // cria uma lista de opções
    $settings->add(new admin_setting_configselect(
        'block_smartbot/modelsource',
        get_string('modelsource', 'block_smartbot'),
        get_string('modelsource_desc', 'block_smartbot'),
        'local',
        [
            'local' => get_string('modelsource_local', 'block_smartbot'),
            'cloud' => get_string('modelsource_cloud', 'block_smartbot'),
        ]
    ));

    // cria um campo de texto
    $settings->add(new admin_setting_configtext(
        'block_smartbot/localurl',
        get_string('localurl', 'block_smartbot'),
        get_string('localurl_desc', 'block_smartbot'),
        'http://localhost:11434/api/generate',
        PARAM_URL
    ));
    $settings->hide_if('block_smartbot/localurl', 'block_smartbot/modelsource', 'neq', 'local');

    $settings->add(new admin_setting_configtext(
        'block_smartbot/model',
        get_string('model', 'block_smartbot'),
        get_string('model_desc', 'block_smartbot'),
        'llama3',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configpasswordunmask(
        'block_smartbot/apikey',
        get_string('apikey', 'block_smartbot'),
        get_string('apikey_desc', 'block_smartbot'),
        ''
    ));
    $settings->hide_if('block_smartbot/apikey', 'block_smartbot/modelsource', 'neq', 'cloud');

    $settings->add(new admin_setting_configcheckbox(
        'block_smartbot/enableprompt',
        get_string('enableprompt', 'block_smartbot'),
        get_string('enableprompt_desc', 'block_smartbot'),
        '1'
    ));

    //campo de texto maior
    $settings->add(new admin_setting_configtextarea(
        'block_smartbot/prompt',
        get_string('prompt', 'block_smartbot'),
        get_string('prompt_desc', 'block_smartbot'),
        get_string('prompt_default', 'block_smartbot')
    ));
    $settings->hide_if('block_smartbot/prompt', 'block_smartbot/enableprompt', 'notchecked');

    $settings->add(new admin_setting_heading(
        'block_smartbot/behaviourheading',
        get_string('behaviourheading', 'block_smartbot'),
        ''
    ));

    //configurar cor primária
    $settings->add(new admin_setting_configcolourpicker(
        'block_smartbot/primarycolor',
        get_string('primarycolor', 'block_smartbot'),
        get_string('primarycolor_desc', 'block_smartbot'),
        '#2C5279'
    ));

    $settings->add(new admin_setting_configtext(
        'block_smartbot/botname',
        get_string('botname', 'block_smartbot'),
        get_string('botname_desc', 'block_smartbot'),
        get_string('pluginname', 'block_smartbot'),
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'block_smartbot/subtitle',
        get_string('subtitle', 'block_smartbot'),
        get_string('subtitle_desc', 'block_smartbot'),
        get_string('subtitle_default', 'block_smartbot'),
        PARAM_TEXT
    ));

    $positions = [
        'bottomright' => get_string('iconposition_bottomright', 'block_smartbot'),
        'bottomleft' => get_string('iconposition_bottomleft', 'block_smartbot'),
        'topright' => get_string('iconposition_topright', 'block_smartbot'),
        'topleft' => get_string('iconposition_topleft', 'block_smartbot'),
    ];
    $settings->add(new admin_setting_configselect(
        'block_smartbot/iconposition',
        get_string('iconposition', 'block_smartbot'),
        get_string('iconposition_desc', 'block_smartbot'),
        'bottomright',
        $positions
    ));

    $faqcounts = [];
    //cria as opções de 1 a 10 para a quantidade de perguntas.
    for ($count = 1; $count <= 10; $count++) {
        $faqcounts[(string)$count] = get_string('faqcount_option', 'block_smartbot', $count);
    }
    $settings->add(new admin_setting_configselect(
        'block_smartbot/faqcount',
        get_string('faqcount', 'block_smartbot'),
        get_string('faqcount_desc', 'block_smartbot'),
        '4',
        $faqcounts
    ));

    $settings->add(new admin_setting_configtextarea(
        'block_smartbot/welcomemessage',
        get_string('welcomemessage', 'block_smartbot'),
        get_string('welcomemessage_desc', 'block_smartbot'),
        get_string('welcomemessage_default', 'block_smartbot')
    ));
}
