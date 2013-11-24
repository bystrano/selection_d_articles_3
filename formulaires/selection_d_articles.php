<?php

function formulaires_selection_d_articles_saisies ($id_selection, $nom_form) {

    include_spip('inc/yaml');

    return yaml_decode(
               recuperer_fond('formulaires/selection_d_articles.yaml',
                              array('nom_form' => $nom_form)));
}

function formulaires_selection_d_articles_charger_dist ($id_selection, $nom_form) {

  include_spip('base/abstract_sql');

  $selection = sql_allfetsel('id_article', 'spip_pb_selection',
                             'id_selection=' . sql_quote($id_selection),
                             '','ordre');

  $valeurs_saisie_selection = array();
  foreach ($selection as $i => $article) {
    $valeurs_saisie_selection[$i] = array(
                                      'article' => 'article|' . $article['id_article']
                                    );
  }

  $req = _request('selection');

  $contexte = array(
                'selection' => $req ? $req : $valeurs_saisie_selection,
              );

  return $contexte;
}

function formulaires_selection_d_articles_verifier_dist ($id_selection, $nom_form) {

  if (liste_objets_verifier('selection')) return;
}

function formulaires_selection_d_articles_traiter_dist ($id_selection, $nom_form) {

  liste_objets_traiter('selection');

  $selection = _request('selection');

  include_spip('base/abstract_sql');

  sql_delete('spip_pb_selection', 'id_selection='.sql_quote($id_selection));

  foreach ($selection as $i => $article) {
    $id_article = str_replace('article|', '', $article['article'][0]);
    sql_insertq('spip_pb_selection', array(
                                       'id_selection' => $id_selection,
                                       'id_article'   => $id_article,
                                       'ordre'        => $i,
                                     ));
  }
}