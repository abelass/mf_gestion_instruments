<?php
/**
 * Utilisations de pipelines par Gestion des instruments de Music Fund 
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Orlando
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/*
 * Un fichier de pipelines permet de regrouper
 * les fonctions de branchement de votre plugin
 * sur des pipelines existants.
 */




/**
 * Optimiser la base de données 
 * 
 * Supprime les objets à la poubelle.
 *
 * @pipeline optimiser_base_disparus
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function mf_gestion_instruments_optimiser_base_disparus($flux){

	sql_delete("spip_instruments", "statut='poubelle' AND maj < " . $flux['args']['date']);

	return $flux;
}