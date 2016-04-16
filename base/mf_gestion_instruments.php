<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Orlando
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function mf_gestion_instruments_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['instruments'] = 'instruments';
	$interfaces['table_des_tables']['lifecycles'] = 'lifecycles';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function mf_gestion_instruments_declarer_tables_objets_sql($tables) {

	$tables['spip_instruments'] = array(
		'type' => 'instrument',
		'principale' => "oui",
		'field'=> array(
			"id_instrument"      => "bigint(21) NOT NULL",
			"titre"              => "varchar(255) NOT NULL DEFAULT ''",
			"mf_id"              => "varchar(50) NOT NULL DEFAULT ''",
			"date_creation"      => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"descriptif"         => "mediumtext NOT NULL DEFAULT ''",
			"nombre"             => "int(11) NOT NULL DEFAULT 1",
			"date_creation"      => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'", 
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_instrument",
			"KEY statut"         => "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		'date' => "date_creation",
		'champs_editables'  => array('titre', 'mf_id', 'date_creation', 'descriptif', 'nombre'),
		'champs_versionnes' => array('titre', 'mf_id', 'descriptif', 'nombre'),
		'rechercher_champs' => array("titre" => 8, "mf_id" => 8, "descriptif" => 5),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'instrument:texte_changer_statut_instrument', 
		

	);

	$tables['spip_lifecycles'] = array(
		'type' => 'lifecycle',
		'principale' => "oui",
		'field'=> array(
			"id_lifecycle"       => "bigint(21) NOT NULL",
			"id_instrument"      => "int(11) NOT NULL DEFAULT 0",
			"id_contact"         => "int(11) NOT NULL DEFAULT 0",
			"descriptif"         => "text NOT NULL DEFAULT ''",
			"nombre"             => "int(11) NOT NULL DEFAULT 1",
			"date"               => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"date"               => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'", 
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_lifecycle",
			"KEY statut"         => "statut", 
		),
		'titre' => "statut AS titre, '' AS lang",
		'date' => "date",
		'champs_editables'  => array('id_instrument', 'id_contact', 'descriptif', 'nombre', 'date'),
		'champs_versionnes' => array('id_instrument', 'id_contact', 'descriptif', 'nombre', 'date'),
		'rechercher_champs' => array("descriptif" => 5, "date" => 8),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'lifecycle:texte_changer_statut_lifecycle', 
		

	);

	return $tables;
}



?>