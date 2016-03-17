<?php

include_spip('pb_selection_fonctions');

function formulaires_selection_d_articles_saisies ($id_selection, $nom_form) {

    return array(
        array(
            'saisie' => 'liste',
            'options' => array(
                'nom' => $id_selection,
                'label' => $nom_form ? $nom_form : "Sélection d'articles",
            ),
            'saisies' => array(
                array(
                    'saisie' => 'input',
                    'options' => array(
                        'nom' => 'article',
                        'placeholder' => 'Saisissez le titre de l\'article',
                        'attributs' => 'data-selecteur="generique" '
                        . 'data-select-php="oui"'
                        . ' data-select-params="'.json_encode(
	                        array('objets' => array('articles')),
	                        JSON_HEX_TAG
                        )
                        . '"'
                    ),
                ),
            ),
        ),
    );
}

function formulaires_selection_d_articles_charger_dist ($id_selection, $nom_form) {

    $contexte = selection_d_articles_charger($id_selection);
    $contexte['id_selection'] = $id_selection;

    return $contexte;
}

function formulaires_selection_d_articles_verifier_dist ($id_selection, $nom_form) {

    $erreurs = selection_d_articles_verifier($id_selection);

    return $erreurs;
}

function formulaires_selection_d_articles_traiter_dist ($id_selection, $nom_form) {

    return selection_d_articles_traiter($id_selection);
}