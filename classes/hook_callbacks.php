<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Hook callbacks for block_smartbot.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_smartbot;

defined('MOODLE_INTERNAL') || die();

/**
 * Callback for the Moodle 4.4+ footer HTML generation hook.
 *
 * @package    block_smartbot
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {

    /**
     * Add the SmartBot chat HTML to the footer.
     *
     * @param \core\hook\output\before_footer_html_generation $hook
     * @return void
     */
    public static function before_footer_html_generation(
        \core\hook\output\before_footer_html_generation $hook
    ): void {
        $hook->add_html(\block_smartbot_before_footer());
    }
}
