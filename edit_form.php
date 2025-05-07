<?php

defined('MOODLE_INTERNAL') || die();

class block_site_info_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        // Seção para as configurações.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('editor', 'config_htmlcontent', get_string('confightmlcontent', 'block_site_info'));
        $mform->setDefault('config_htmlcontent', $this->block->get_default_htmlcontent());
        $mform->setType('config_htmlcontent', PARAM_RAW);
    }
}