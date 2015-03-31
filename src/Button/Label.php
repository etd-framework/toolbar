<?php
/**
 * Part of the ETD Framework Toolbar Package
 *
 * @copyright   Copyright (C) 2015 ETD Solutions, SARL Etudoo. Tous droits réservés.
 * @license     Apache License 2.0; see LICENSE
 * @author      ETD Solutions http://etd-solutions.com
 */

namespace EtdSolutions\Toolbar\Button;

use EtdSolutions\Language\LanguageFactory;
use Joomla\Utilities\ArrayHelper;

class Label {

    /**
     * @var string $text Le texte du bouton
     */
    protected $text = '';

    protected $attribs = array();

    protected $icon = '';

    public function __construct($text, $attribs = array(), $icon = '') {

        if (array_key_exists('title', $attribs)) {
            $attribs['title'] = (new LanguageFactory)
                                   ->getText()
                                   ->translate($attribs['title']);
        }

        $this->attribs = $attribs;
        $this->icon    = $icon;
        $this->text    = $text;
    }

    public function setAttribute($name, $value) {

        $this->attribs[$name] = $value;
    }

    public function getAttribute($name) {

        return isset($this->attribs[$name]) ? $this->attribs[$name] : null;
    }

    public function setText($text) {

        $this->text = $text;
    }

    public function getText() {

        return $this->text;
    }

    public function render() {

        $text = (new LanguageFactory)->getText();

        $html = '<label ' . ArrayHelper::toString($this->attribs, '=', ' ') . '>';

        if (!empty($this->icon)) {
            $html .= '<span class="fa fa-' . $this->icon . '"></span>';
        }

        if (!empty($this->text)) {
            $html .= '<span class="text">&nbsp;' . $text->translate($this->text) . '</span>';
        }

        $html .= '</label>';

        return $html;
    }

}