<?php

/**
 * Upgrade steps for block_smartbot.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade the SmartBot block.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_block_smartbot_upgrade($oldversion): bool {
    if ($oldversion < 2026110501) {
        unset_config('welcometext', 'block_smartbot');
        upgrade_block_savepoint(true, 2026110501, 'smartbot');
    }

    return true;
}
