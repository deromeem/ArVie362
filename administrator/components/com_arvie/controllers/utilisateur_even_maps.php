<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieControllerUtilisateur_even_maps extends JControllerAdmin
{
	// surcharge pour gérer la suppression de Publications par le modèle adéquat
	public function getModel($name = 'Utilisateur_even_map', $prefix = 'ArvieModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
