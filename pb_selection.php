<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function pb_selection_jqueryui_plugins($plugins) {
	if (_DIR_RACINE == "../") {
		$plugins[] = "jquery.ui.core";
		$plugins[] = "jquery.ui.widget";
		$plugins[] = "jquery.ui.mouse";
		$plugins[] = "jquery.ui.sortable";
	}
	return $plugins;
}

function pb_selection_header_prive ($flux) {

  $flux .= '<link rel="stylesheet" href="' . find_in_path('selection_d_articles.css') . '" type="text/css"></link>';

  return $flux;
}
