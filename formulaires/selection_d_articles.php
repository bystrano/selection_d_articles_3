<?php

include_spip('pb_selection_fonctions');

function formulaires_selection_d_articles_saisies ($id_selection, $nom_form) {

    include_spip('inc/yaml');

    return yaml_decode(
               recuperer_fond('formulaires/selection_d_articles.yaml',
                              array(
                                  'id_selection' => $id_selection,
                                  'nom_form'     => $nom_form,
                              )));
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