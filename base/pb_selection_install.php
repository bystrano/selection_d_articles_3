<?php

//
// Formulaires : Structure
//

function pb_selection_declarer_tables_objets_sql($tables) {

	$tables['spip_articles']['tables_jointures'][] = 'pb_selection';

	$tables['spip_pb_selection'] = array(
		'field' => array(
			'id_selection' => 'varchar(60) NOT NULL',
			'id_article'   => 'bigint(21) NOT NULL',
			'ordre'        => 'bigint(21) NOT NULL',
			'maj'          => 'TIMESTAMP'
		),
		'key'   => array(
			'PRIMARY KEY'   => 'id_selection, id_article'
		),
		'join' => array(
			'id_article' => 'id_article',
		),
		'tables_jointures' => array('spip_articles'),
	);

	return $tables;
}
