<?php
/**
 * Part of the ETD Framework Toolbar Package
 *
 * @copyright   Copyright (C) 2015 ETD Solutions, SARL Etudoo. Tous droits réservés.
 * @license     Apache License 2.0; see LICENSE
 * @author      ETD Solutions http://etd-solutions.com
 */

namespace EtdSolutions\Toolbar\Button;

class ButtonGroup {

    protected $attribs = [];

    /**
     * @var array Les boutons du btn-group
     */
    protected $components = [];

    public function __construct(array $components, $attribs = []) {

        $this->components = $components;
        $this->attribs    = $attribs;

    }

    public function setAttribute($name, $value) {

        $this->attribs[$name] = $value;
    }

    public function getAttribute($name) {

        return isset($this->attribs[$name]) ? $this->attribs[$name] : null;
    }

    public function render() {

        $html = '<div class="btn-group">';

        foreach ($this->components as $component) {

            $html .= $component->render();

        }

        $html .= '</div>';

        return $html;
    }

}