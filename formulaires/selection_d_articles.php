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
                    'saisie' => 'selecteur_article',
                    'options' => array(
                        'nom' => 'article',
                    ),
                ),
            ),
        ),
    );
}

function formulaires_selection_d_articles_charger_dist ($id_selection, $nom_form) {

    return selection_d_articles_charger($id_selection);
}

function formulaires_selection_d_articles_verifier_dist ($id_selection, $nom_form) {

    $erreurs = selection_d_articles_verifier($id_selection);

    return $erreurs;
}

function formulaires_selection_d_articles_traiter_dist ($id_selection, $nom_form) {

    return selection_d_articles_traiter($id_selection);
}