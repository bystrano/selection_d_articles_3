<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

function selection_d_articles_charger ($id_selection) {

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

    $req = _request($id_selection);

    $contexte = array(
        $id_selection => $req ? $req : $valeurs_saisie_selection,
    );

    return $contexte;
}

function selection_d_articles_verifier ($id_selection) {

    $erreurs = liste_objets_verifier($id_selection);

    /* Dans le cas où on a cliqué un submit propre à la saisie, on
       interrompt les traitements du formulaire, mais il faut quand
       même executer les traitements de la saisie selection_d_articles. */
    if (array_key_exists('stop', $erreurs)) {

        $selection = _request($id_selection);
        enregistrer_selection($id_selection, $selection);
    }

    return $erreurs;
}

function selection_d_articles_traiter ($id_selection) {

    return liste_objets_traiter($id_selection);
}

function enregistrer_selection ($id_selection, $selection) {

    include_spip('base/abstract_sql');

    sql_delete('spip_pb_selection',
    'id_selection='.sql_quote($id_selection));

    foreach ($selection as $i => $article) {
        $id_article = str_replace('article|', '', $article['article'][0]);
        sql_insertq('spip_pb_selection', array(
            'id_selection' => $id_selection,
            'id_article'   => $id_article,
            'ordre'        => $i,
        ));
    }
}