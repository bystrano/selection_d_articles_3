<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function pb_selection_header_prive ($flux) {

  $flux .= '<link rel="stylesheet" href="' . find_in_path('selection_d_articles.css') . '" type="text/css"></link>';

  return $flux;
}
