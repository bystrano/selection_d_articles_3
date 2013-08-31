<?php

function formulaires_selection_d_articles_yaml_charger_dist ($id_rubrique) {

  include_spip('base/abstract_sql');

  $selection = sql_allfetsel('id_article', 'spip_pb_selection',
                             'id_rubrique=' . intval($id_rubrique),
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

function formulaires_selection_d_articles_yaml_verifier_dist ($id_rubrique) {

  if (liste_objets_verifier('selection')) return;
}

function formulaires_selection_d_articles_yaml_traiter_dist ($id_rubrique) {

  if (liste_objets_traiter('selection')) return;
}