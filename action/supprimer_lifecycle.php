<?php
/**
 * Utilisation de l'action supprimer pour l'objet lifecycle
 *
 * @plugin     Gestion des instruments de Music Fund 
 * @copyright  2016
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Mf_gestion_instruments\Action
 */

if (!defined('_ECRIRE_INC_VERSION')) return;



/**
 * Action pour supprimer un·e lifecycle
 *
 * Vérifier l'autorisation avant d'appeler l'action.
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, lifecycle, #ID_LIFECYCLE}|oui)
 *         [(#BOUTON_ACTION{<:lifecycle:supprimer_lifecycle:>,
 *             #URL_ACTION_AUTEUR{supprimer_lifecycle, #ID_LIFECYCLE, #URL_ECRIRE{lifecycles}},
 *             danger, <:lifecycle:confirmer_supprimer_lifecycle:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     [(#AUTORISER{supprimer, lifecycle, #ID_LIFECYCLE}|oui)
 *         [(#BOUTON_ACTION{
 *             [(#CHEMIN_IMAGE{lifecycle-del-24.png}|balise_img{<:lifecycle:supprimer_lifecycle:>}|concat{' ',#VAL{<:lifecycle:supprimer_lifecycle:>}|wrap{<b>}}|trim)],
 *             #URL_ACTION_AUTEUR{supprimer_lifecycle, #ID_LIFECYCLE, #URL_ECRIRE{lifecycles}},
 *             icone s24 horizontale danger lifecycle-del-24, <:lifecycle:confirmer_supprimer_lifecycle:>})]
 *     ]
 *     ```
 *
 * @example
 *     ```
 *     if (autoriser('supprimer', 'lifecycle', $id_lifecycle)) {
 *          $supprimer_lifecycle = charger_fonction('supprimer_lifecycle', 'action');
 *          $supprimer_lifecycle($id_lifecycle);
 *     }
 *     ```
 *
 * @param null|int $arg
 *     Identifiant à supprimer.
 *     En absence de id utilise l'argument de l'action sécurisée.
**/
function action_supprimer_lifecycle_dist($arg=null) {
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	$arg = intval($arg);

	// cas suppression
	if ($arg) {
		sql_delete('spip_lifecycles',  'id_lifecycle=' . sql_quote($arg));
	}
	else {
		spip_log("action_supprimer_lifecycle_dist $arg pas compris");
	}
}