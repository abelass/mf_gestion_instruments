<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Gestion des instruments de Music Fund 
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin Gestion des instruments de Music Fund .
 *
 * Vous pouvez :
 *
 * - créer la structure SQL,
 * - insérer du pre-contenu,
 * - installer des valeurs de configuration,
 * - mettre à jour la structure SQL 
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function mf_gestion_instruments_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();
	# quelques exemples
	# (que vous pouvez supprimer !)
	# 
	# $maj['create'] = array(array('creer_base'));
	#
	# include_spip('inc/config')
	# $maj['create'] = array(
	#	array('maj_tables', array('spip_xx', 'spip_xx_liens')),
	#	array('ecrire_config', array('mf_gestion_instruments', array('exemple' => "Texte de l'exemple")))
	#);
	#
	# $maj['1.1.0']  = array(array('sql_alter','TABLE spip_xx RENAME TO spip_yy'));
	# $maj['1.2.0']  = array(array('sql_alter','TABLE spip_xx DROP COLUMN id_auteur'));
	# $maj['1.3.0']  = array(
	#	array('sql_alter','TABLE spip_xx CHANGE numero numero int(11) default 0 NOT NULL'),
	#	array('sql_alter','TABLE spip_xx CHANGE texte petit_texte mediumtext NOT NULL default \'\''),
	# );
	# ...

	$maj['create'] = array(array('maj_tables', array('spip_instruments', 'spip_lifecycles')));
	$maj['1.1.0'] = array(
		array('maj_tables', array('spip_instruments')),
		array('sql_alter','TABLE spip_instruments DROP COLUMN statut')
	);

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Gestion des instruments de Music Fund .
 * 
 * Vous devez :
 *
 * - nettoyer toutes les données ajoutées par le plugin et son utilisation
 * - supprimer les tables et les champs créés par le plugin. 
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function mf_gestion_instruments_vider_tables($nom_meta_base_version) {
	# quelques exemples
	# (que vous pouvez supprimer !)
	# sql_drop_table("spip_xx");
	# sql_drop_table("spip_xx_liens");

	sql_drop_table("spip_instruments");
	sql_drop_table("spip_lifecycles");

	# Nettoyer les versionnages et forums
	sql_delete("spip_versions",              sql_in("objet", array('instrument', 'lifecycle')));
	sql_delete("spip_versions_fragments",    sql_in("objet", array('instrument', 'lifecycle')));
	sql_delete("spip_forum",                 sql_in("objet", array('instrument', 'lifecycle')));

	effacer_meta($nom_meta_base_version);
}

?>