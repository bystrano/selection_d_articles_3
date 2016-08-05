<?php

function pb_selection_install($action, $prefix, $version_cible) {
		global $tables_principales;

		include_spip('base/pb_selection_install');
		$tables_principales = pb_selection_declarer_tables_objets_sql($tables_principales);

		include_spip('base/create');
	include_spip('base/abstract_sql');

	creer_base();

	return true;
}

function pb_selection_vider_tables($nom_meta_base_version) {

	sql_drop_table('spip_pb_selection');
	effacer_meta($nom_meta_base_version);
}
