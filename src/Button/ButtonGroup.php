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

    /**
     * @var array Les boutons du btn-group
     */
    protected $components = array();

    function __construct(array $components) {

        $this->components = $components;

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