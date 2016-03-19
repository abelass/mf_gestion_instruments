<?php
/**
 * Utilisation de l'action supprimer pour l'objet instrument
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Orlando
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Action
 */

if (!defined('_ECRIRE_INC_VERSION')) return;



/**
 * Action pour supprimer un·e instrument
 *
 * Vérifier l'autorisation avant d'appeler l'action.
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, instrument, #ID_INSTRUMENT}|oui)
 *         [(#BOUTON_ACTION{<:instrument:supprimer_instrument:>,
 *             #URL_ACTION_AUTEUR{supprimer_instrument, #ID_INSTRUMENT, #URL_ECRIRE{instruments}},
 *             danger, <:instrument:confirmer_supprimer_instrument:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, instrument, #ID_INSTRUMENT}|oui)
 *         [(#BOUTON_ACTION{
 *             [(#CHEMIN_IMAGE{instrument-del-24.png}|balise_img{<:instrument:supprimer_instrument:>}|concat{' ',#VAL{<:instrument:supprimer_instrument:>}|wrap{<b>}}|trim)],
 *             #URL_ACTION_AUTEUR{supprimer_instrument, #ID_INSTRUMENT, #URL_ECRIRE{instruments}},
 *             icone s24 horizontale danger instrument-del-24, <:instrument:confirmer_supprimer_instrument:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     if (autoriser('supprimer', 'instrument', $id_instrument)) {
 *          $supprimer_instrument = charger_fonction('supprimer_instrument', 'action');
 *          $supprimer_instrument($id_instrument);
 *     }
 *     ```
 *
 * @param null|int $arg
 *     Identifiant à supprimer.
 *     En absence de id utilise l'argument de l'action sécurisée.
**/
function action_supprimer_instrument_dist($arg=null) {
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	$arg = intval($arg);

	// cas suppression
	if ($arg) {
		sql_delete('spip_instruments',  'id_instrument=' . sql_quote($arg));
	}
	else {
		spip_log("action_supprimer_instrument_dist $arg pas compris");
	}
}