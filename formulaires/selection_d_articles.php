<?php

include_spip('pb_selection_fonctions');
include_spip('inc/autoriser');

function formulaires_selection_d_articles_saisies($id_selection, $nom_form) {

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

function formulaires_selection_d_articles_charger_dist($id_selection, $nom_form) {
	// Il faut une autorisation de publication pour éditer la sélection d'article
  	if (!autoriser('publierdans', 'rubrique')) {
		return false;
  	}

	$contexte = selection_d_articles_charger($id_selection);
	$contexte['id_selection'] = $id_selection;

	return $contexte;
}

function formulaires_selection_d_articles_verifier_dist($id_selection, $nom_form) {
	// Il faut une autorisation de publication pour éditer la sélection d'article
  	if (!autoriser('publierdans', 'rubrique')) {
		return false;
  	}
  	
	$erreurs = selection_d_articles_verifier($id_selection);

	return $erreurs;
}

function formulaires_selection_d_articles_traiter_dist($id_selection, $nom_form) {

	return selection_d_articles_traiter($id_selection);
}
