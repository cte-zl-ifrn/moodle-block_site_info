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
 * Block site_info is defined here.
 *
 * @package     block_site_info
 * @copyright   2025 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_site_info extends block_base {

    /**
     * Initializes class member variables.
     */
    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('pluginname', 'block_site_info');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        global $OUTPUT;

        $html = !empty($this->config->htmlcontent['text']) 
            ? $this->config->htmlcontent['text']
            : $this->get_default_htmlcontent()['text'];

        $data = ['config_htmlcontent' => $html];

        $this->content = new stdClass();
        $this->content->text = $OUTPUT->render_from_template('block_site_info/site_info', $data);
        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediately after init().
     */
    public function specialization() {
        // Load user defined title and make sure it's never empty.
        $this->title = '';
    }

    /**
     * Sets the applicable formats for the block.
     *
     * @return string[] Array of pages and permissions.
     */
    public function applicable_formats() {
        return [
            'admin' => false,
            'site-index' => true,
            'course-view' => false,
            'mod' => false,
            'my' => false,
        ];
    }

    /**
     * Retorna o conteúdo HTML padrão do bloco.
     *
     * @return array
     */
    public function get_default_htmlcontent(): array {
        return [
            'text' => '
            <div class="site-info-header">
                <h1>O Moodle em números</h1>
                <h5>Estude em uma instituição centenária, sem pagar, sair de casa ou necessitar de matrícula.</h5>
            </div>
            <div class="row hero">
                <div class="col-md-3">
                    <div class="site-info-header-column">
                        <p class="site-info-header-column-number text-green">115 anos</p>
                        <p class="site-info-header-column-title">De história</p>
                        <p class="site-info-header-column-text">Mais de 1 século de dedicação à educação e à formação profissional.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="site-info-header-column">
                        <p class="site-info-header-column-number text-green">49</p>
                        <p class="site-info-header-column-title">Cursos</p>
                        <p class="site-info-header-column-text">Nossos cursos são focados em formação inicial e continuada.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="site-info-header-column">
                        <p class="site-info-header-column-number text-green">11 mil</p>
                        <p class="site-info-header-column-title">Alunos</p>
                        <p class="site-info-header-column-text">Nossa base de usuários reflete a eficácia de nossos cursos.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="site-info-header-column">
                        <p class="site-info-header-column-number text-green">5 mil</p>
                        <p class="site-info-header-column-title">Certificados</p>
                        <p class="site-info-header-column-text">Obtenha um certificado de conclusão emitido por uma instituição prestigiada.</p>
                    </div>
                </div>
            </div>
            <div class="site-info-main-header-about-button">
                <a href="https://ead.ifrn.edu.br/" class="btn btn-primary">Sobre nós</a>
            </div>',
            'format' => FORMAT_HTML
        ];
    }
}
