<?php
/**
 * Gestion du formulaire de d'édition de instrument
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Orlando
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Formulaires
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/editer');

/**
 * Identifier le formulaire en faisant abstraction des paramètres qui ne représentent pas l'objet edité
 *
 * @param int|string $id_instrument
 *     Identifiant du instrument. 'new' pour un nouveau instrument.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un instrument source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du instrument, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return string
 *     Hash du formulaire
 */
function formulaires_editer_instrument_identifier_dist($id_instrument='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return serialize(array(intval($id_instrument)));
}

/**
 * Chargement du formulaire d'édition de instrument
 *
 * Déclarer les champs postés et y intégrer les valeurs par défaut
 *
 * @uses formulaires_editer_objet_charger()
 *
 * @param int|string $id_instrument
 *     Identifiant du instrument. 'new' pour un nouveau instrument.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un instrument source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du instrument, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Environnement du formulaire
 */
function formulaires_editer_instrument_charger_dist($id_instrument='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$valeurs = formulaires_editer_objet_charger('instrument', $id_instrument, '', $lier_trad, $retour, $config_fonc, $row, $hidden);
	
	return $valeurs;
}

/**
 * Vérifications du formulaire d'édition de instrument
 *
 * Vérifier les champs postés et signaler d'éventuelles erreurs
 *
 * @uses formulaires_editer_objet_verifier()
 *
 * @param int|string $id_instrument
 *     Identifiant du instrument. 'new' pour un nouveau instrument.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un instrument source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du instrument, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Tableau des erreurs
 */
function formulaires_editer_instrument_verifier_dist($id_instrument='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$erreurs = array();

	$verifier = charger_fonction('verifier', 'inc');

	foreach (array('date_creation') AS $champ) {
		$normaliser = null;
		if ($erreur = $verifier(_request($champ), 'date', array('normaliser'=>'datetime'), $normaliser)) {
			$erreurs[$champ] = $erreur;
		// si une valeur de normalisation a ete transmis, la prendre.
		} elseif (!is_null($normaliser)) {
			set_request($champ, $normaliser);
		// si pas de normalisation ET pas de date soumise, il ne faut pas tenter d'enregistrer ''
		} else {
			set_request($champ, null);
		}
	}

	$erreurs += formulaires_editer_objet_verifier('instrument', $id_instrument, array('titre', 'mf_id', 'date_creation'));

	return $erreurs;
}

/**
 * Traitement du formulaire d'édition de instrument
 *
 * Traiter les champs postés
 *
 * @uses formulaires_editer_objet_traiter()
 *
 * @param int|string $id_instrument
 *     Identifiant du instrument. 'new' pour un nouveau instrument.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param int $lier_trad
 *     Identifiant éventuel d'un instrument source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du instrument, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Retours des traitements
 */
function formulaires_editer_instrument_traiter_dist($id_instrument='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$retours = formulaires_editer_objet_traiter('instrument', $id_instrument, '', $lier_trad, $retour, $config_fonc, $row, $hidden);
	return $retours;
}