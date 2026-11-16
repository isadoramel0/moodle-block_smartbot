<?php

/**
 * Hook callbacks for block_smartbot.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$callbacks = [
    \core\hook\output\before_footer_html_generation::class => [
        \block_smartbot\hook_callbacks::class . '::before_footer_html_generation',
    ],
];
