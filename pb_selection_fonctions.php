<?php

function selection_d_articles_charger($id_selection) {

	/* On ne peut pas utiliser de nombres pour l'id_selection, puisqu'il sera
		 utilisé comme clé dans un tableau. Or PHP converti automatiquement les
		 strings qui représentent des nombres en index numériques, et ça met le
		 brun… */
	if (is_numeric($id_selection)) {
		erreur_squelette(_T('selection_d_articles_3:erreur_id_selection_invalide'));
	}

	include_spip('base/abstract_sql');

	$selection = sql_allfetsel(
		'id_article',
		'spip_pb_selection',
		'id_selection=' . sql_quote($id_selection),
		'',
		'ordre'
	);

	$valeurs_saisie_selection = array();
	foreach ($selection as $i => $article) {
		$valeurs_saisie_selection[$i] = array(
			'article' => 'article|' . $article['id_article']
		);
	}

	$req = _request($id_selection);

	$contexte = array(
		$id_selection => $req ? $req : $valeurs_saisie_selection,
	);

	return $contexte;
}

function selection_d_articles_verifier($id_selection) {

	saisies_liste_verifier($id_selection);

	return array();
}

function selection_d_articles_traiter($id_selection) {

	saisies_liste_traiter($id_selection);

	$selection = _request($id_selection);

	enregistrer_selection($id_selection, $selection);

	return array();
}

function enregistrer_selection($id_selection, $selection) {

	include_spip('base/abstract_sql');

	sql_delete(
		'spip_pb_selection',
		'id_selection='.sql_quote($id_selection)
	);

	foreach ($selection as $i => $article) {
		$id_article = str_replace('article|', '', $article['article'][0]);
		sql_insertq('spip_pb_selection', array(
			'id_selection' => $id_selection,
			'id_article'   => $id_article,
			'ordre'        => $i,
		));
	}
}
