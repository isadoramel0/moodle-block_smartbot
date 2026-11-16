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
 * SmartBot chat window interactions.
 *
 * @module     block_smartbot/chat
 * @copyright  2026 Isadora Melo <isadora.cunha@estudante.ufla.br>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([], function() {
    /**
     * Initialise the open and close controls for the chat window.
     */
    const init = () => {
        const widget = document.querySelector('[data-block-smartbot]');
        if (!widget || widget.dataset.initialised) {
            return;
        }

        const chat = widget.querySelector('.block_smartbot-chat');
        const launcher = widget.querySelector('[data-action="open"]');
        const close = widget.querySelector('[data-action="close"]');
        if (!chat || !launcher || !close) {
            return;
        }

        widget.dataset.initialised = 'true';

        launcher.addEventListener('click', () => {
            chat.hidden = false;
            launcher.setAttribute('aria-expanded', 'true');
            close.focus();
        });

        close.addEventListener('click', () => {
            chat.hidden = true;
            launcher.setAttribute('aria-expanded', 'false');
            launcher.focus();
        });
    };

    return {
        init: init,
    };
});
