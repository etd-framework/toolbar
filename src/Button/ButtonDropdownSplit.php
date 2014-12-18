<?php
/**
 * Part of the ETD Framework Toolbar Package
 *
 * @copyright   Copyright (C) 2015 ETD Solutions, SARL Etudoo. Tous droits réservés.
 * @license     Apache License 2.0; see LICENSE
 * @author      ETD Solutions http://etd-solutions.com
 */
namespace EtdSolutions\Toolbar\Button;

use Joomla\Language\Text;

defined('_JEXEC') or die;

class ButtonDropdownSplit {

    /**
     * @var array $links tableau avec les sous boutons et leur lien
     */
    protected $links = array();

    /**
     * @var Button
     */
    protected $button = null;

    public function render(){

        $html = '<div class="btn-group">';
        $html .= $this->button->render();
        $html .= '<button type="button" class="' . $this->button->getAttribute('class') . ' dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
</button><ul class="dropdown-menu" role="menu">';

        foreach($this->links as $link){
            $link->setAttribute('class', '');
            $html.= '<li>'.$link->render().'</li>';
        }
        $html.='</ul></div>';


        return $html;
    }

    function __construct($links, $button = null)
    {

        // Si le bouton n'est pas spécifié, on prend le premier du tableau.
        if (is_null($button)) {
            $button = array_shift($links);
        }

        $this->button = $button;
        $this->links  = $links;
    }

}