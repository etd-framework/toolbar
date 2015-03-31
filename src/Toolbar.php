<?php
/**
 * Part of the ETD Framework Toolbar Package
 *
 * @copyright   Copyright (C) 2015 ETD Solutions, SARL Etudoo. Tous droits réservés.
 * @license     Apache License 2.0; see LICENSE
 * @author      ETD Solutions http://etd-solutions.com
 */

namespace EtdSolutions\Toolbar;

use EtdSolutions\Toolbar\Button\Button;
use EtdSolutions\Toolbar\Button\ButtonDropdownSplit;
use EtdSolutions\Toolbar\Button\ButtonGroup;
use EtdSolutions\Toolbar\Button\ButtonDropdownSingle;
use EtdSolutions\Toolbar\Button\Label;
use Joomla\Form\Form;

class Toolbar {

    /**
     * @var Toolbar L'instance générale de la barre d'outils.
     */
    private static $instance;

    /**
     * @var array Tableau des boutons d'actions.
     */
    protected $buttons = array();

    /**
     * @var Form Le formulaire utilisé pour filtrer les enregistrements.
     */
    protected $filterForm = null;

    /**
     * @var string Le titre de la page.
     */
    protected $title = null;

    /**
     * Retourne une référence à l'objet global Toolbar, en le créant seulement si besoin.
     *
     * @return  Toolbar
     */
    public static function getInstance() {

        if (empty(self::$instance)) {
            self::$instance = new Toolbar;
        }

        return self::$instance;
    }

    /**
     * Méthode pour créer un texte
     *
     * @param string $text    Texte
     * @param array  $attribs Tableau des attributs supplémentaires
     * @param string $icon    Classe CSS Font Awesome (sans le fa-)
     *
     * @return Label
     */
    public static function createLabel($text, $attribs = array(), $icon = '') {

        return new Label($text, $attribs, $icon);

    }

    /**
     * Méthode pour créer un bouton
     *
     * @param string $text    Texte du bouton
     * @param array  $attribs Tableau des attributs supplémentaires
     * @param string $icon    Classe CSS Font Awesome (sans le fa-)
     *
     * @return Button
     */
    public static function createButton($text, $attribs = array(), $icon = '') {

        return new Button($text, $attribs, $icon);

    }

    /**
     * Méthode pour créer un groupe de bouton.
     *
     * @param array $components Tableau des boutons à ajouter au groupe.
     *
     * @return ButtonGroup
     */
    public static function createButtonGroup($components) {

        $button = new ButtonGroup($components);

        return $button;
    }

    /**
     * Méthode pour créer un Split Dropdown
     *
     * @param array  $links
     * @param Button $button
     *
     * @return ButtonDropdownSplit
     */
    public static function createButtonDropdownSplit($links, $button = null) {

        // Si le bouton n'est pas spécifié, on prend le premier du tableau.
        if (is_null($button)) {
            $button = array_shift($links);
        }

        return new ButtonDropdownSplit($links, $button);
    }

    /**
     * Méthode pour créer un dropdown
     *
     * @param array  $links
     * @param Button $button
     *
     * @return ButtonDropdownSingle
     */
    public static function createButtonDropdownSingle($links, $button = null) {

        return new ButtonDropdownSingle($links, $button);
    }

    /**
     * Méthode pour ajouter un bouton à la toolbar.
     *
     * @param mixed $button
     *
     * @return $this
     */
    public function addButton($button) {

        $this->buttons[] = $button;

        return $this;

    }

    /**
     * Méthode pour ajouter un filtre à la toolbar.
     *
     * @param Form $form
     *
     * @return $this
     */
    public function setFilterForm($form) {

        $this->filterForm = $form;

        return $this;

    }

    /**
     * Méthode pour définir le titre de page affiché dans la barre d'outils.
     *
     * @param string $title
     *
     * @return Toolbar
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Renvoi le titre de page.
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Retourne les boutons.
     *
     * @return array
     */
    public function getButtons() {
        return $this->buttons;
    }

}
