<?php
/**
 * Part of the ETD Framework Toolbar Package
 *
 * @copyright   Copyright (C) 2015 ETD Solutions, SARL Etudoo. Tous droits réservés.
 * @license     Apache License 2.0; see LICENSE
 * @author      ETD Solutions http://etd-solutions.com
 */

namespace EtdSolutions\Toolbar\Button;

class ButtonDropdownSingle {

    /**
     * @var array $links tableau avec les sous boutons et leur lien
     */
    protected $links = array();

    /**
     * @var Button
     */
    protected $button = null;

    protected $attribs = array();

    public function setAttribute($name, $value) {

        $this->attribs[$name] = $value;
    }

    public function getAttribute($name) {

        return isset($this->attribs[$name]) ? $this->attribs[$name] : null;
    }

    public function render(){


        $html = '<div class="btn-group">';

        $this->button->setAttribute('class', $this->button->getAttribute('class') . " dropdown-toggle");
        $this->button->setText($this->button->getText() . ' <span class="caret"></span>');
        $this->button->setAttribute('data-toggle', 'dropdown');

        $html .= $this->button->render();

        $html .= '<ul class="' . $this->getAttribute('class') . ' dropdown-menu pull-right" role="menu">';

        foreach($this->links as $link) {
            $link->setAttribute('class', '');
            $html .= '<li>' . $link->render() . '</li>';
        }

        $html .= '</ul></div>';

        return $html;
    }


    function __construct($links, $button = null, $attribs = array())
    {

        // Si le bouton n'est pas spécifié, on prend le premier du tableau.
        if (is_null($button)) {
            $button = array_shift($links);
        }

        $this->button = $button;
        $this->links  = $links;
        $this->attribs = $attribs;
    }


}