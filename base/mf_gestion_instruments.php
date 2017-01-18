<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Gestion des instruments de Music Fund
 * @copyright  2016
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Pipelines
 */
if (! defined ( '_ECRIRE_INC_VERSION' ))
	return;

/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 *
 * @param array $interfaces
 *        	Déclarations d'interface pour le compilateur
 * @return array Déclarations d'interface pour le compilateur
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
 *
 * @param array $tables
 *        	Description des tables
 * @return array Description complétée des tables
 */
function mf_gestion_instruments_declarer_tables_objets_sql($tables) {
	$tables['spip_instruments'] = array (
		'type' => 'instrument',
		'principale' => "oui",
		'field' => array (
			"id_instrument" => "bigint(21) NOT NULL",
			"titre" => "varchar(255) NOT NULL DEFAULT ''",
			"mf_id" => "varchar(50) NOT NULL DEFAULT ''",
			"cle" => "varchar(50) NOT NULL DEFAULT ''",
			"taille" => "varchar(255) NOT NULL DEFAULT ''",
			"date_creation" => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"descriptif" => "mediumtext NOT NULL DEFAULT ''",
			"nombre" => "int(11) NOT NULL DEFAULT 1",
			"date_creation" => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"maj" => "TIMESTAMP"
		),
		'key' => array (
			"PRIMARY KEY" => "id_instrument"
		),
		'titre' => "titre AS titre, '' AS lang",
		'date' => "date_creation",
		'champs_editables' => array (
			'titre',
			'mf_id',
			'date_creation',
			'descriptif',
			'nombre',
			'cle',
			'taille'
		),
		'champs_versionnes' => array (
			'titre',
			'mf_id',
			'descriptif',
			'nombre',
			'cle',
			'taille'
		),
		'rechercher_champs' => array (
			"titre" => 8,
			"mf_id" => 8,
			"descriptif" => 5,
			'cle' => 5
		),
		'tables_jointures' => array ()
	)
	;

	$tables['spip_lifecycles'] = array (
		'type' => 'lifecycle',
		'principale' => "oui",
		'field' => array (
			"id_lifecycle" => "bigint(21) NOT NULL",
			"id_instrument" => "int(11) NOT NULL DEFAULT 0",
			"id_contact" => "int(11) NOT NULL DEFAULT 0",
			"descriptif" => "text NOT NULL DEFAULT ''",
			"nombre" => "int(11) NOT NULL DEFAULT 1",
			"date" => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"date" => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"statut" => "varchar(20)  DEFAULT '0' NOT NULL",
			"maj" => "TIMESTAMP"
		),
		'key' => array (
			"PRIMARY KEY" => "id_lifecycle",
			"KEY statut" => "statut"
		),
		'titre' => "statut AS titre, '' AS lang",
		'date' => "date",
		'champs_editables' => array (
			'id_instrument',
			'id_contact',
			'descriptif',
			'nombre',
			'date'
		),
		'champs_versionnes' => array (
			'id_instrument',
			'id_contact',
			'descriptif',
			'nombre',
			'date'
		),
		'rechercher_champs' => array (
			"descriptif" => 5,
			"date" => 8
		),
		'tables_jointures' => array ('spip_instruments'),
		'statut_textes_instituer' => array (
			'BEING REPAIRED' => 'lifecycle:texte_statut_being_repaired',
			'COLLECTED' => 'lifecycle:texte_statut_collected',
			'DONATED' => 'lifecycle:texte_statut_donated',
			'GIVEN AWAY' => 'lifecycle:texte_statut_given_away',
			'ON THE ROAD' => 'lifecycle:texte_statut_on_the_road',
			'READY' => 'lifecycle:texte_statut_ready',
			'SOLD' => 'lifecycle:texte_statut_sold',
			'TO CHECK' => 'lifecycle:texte_statut_to_check',
			'USED FOR PIECES' => 'lifecycle:texte_statut_used_for_pieces',
			'USED TO REPAIR' => 'lifecycle:texte_statut_used_to_repair',
			'INVENTORIED' => 'lifecycle:texte_statut_inventoried',
		),
		'statut' => array (
			array (
				'champ' => 'statut',
				'publie' => '
					USED TO REPAIR,
					USED FOR PIECES,
					TO CHECK,
					SOLD,
					READY,
					ON THE ROAD,
					GIVEN AWAY,
					DONATED,
					COLLECTED,
					BEING REPAIRED',
				'previsu' => '
					USED TO REPAIR,
					USED FOR PIECES,
					TO CHECK,
					SOLD,
					READY,
					ON THE ROAD,
					GIVEN AWAY,
					DONATED,
					COLLECTED,
					BEING REPAIRED',
				'post_date' => 'date',
				'exception' => array (
					'statut',
					'tout'
				)
			)
		),
		'statut_images' => array (
			'BEING REPAIRED' => 'puce-being-repaired-8.png',
			'COLLECTED' => 'puce-collected-8.png',
			'DONATED' => 'puce-donated-8.png',
			'GIVEN AWAY' => 'puce-given-away-8.png',
			'ON THE ROAD' => 'puce-given-on-the-road-8.png',
			'READY' => 'puce-ready-8.png',
			'SOLD' => 'puce-sold-8.png',
			'TO CHECK' => 'puce-to-check-8.png',
			'USED FOR PIECES' => 'puce-used-for-pieces-8.png',
			'USED TO REPAIR' => 'puce-used-to-repair-8.png',
			'INVENTORIED' => 'puce-used-to-inventoried-8.png',
			'poubelle' => 'puce-reservation-poubelle-16.png'
		),
		'texte_changer_statut' => 'lifecycle:texte_changer_statut_lifecycle'
	)
	;

	return $tables;
}

?>