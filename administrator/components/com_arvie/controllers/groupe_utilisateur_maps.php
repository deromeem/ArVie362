<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieControllerGroupe_utilisateur_maps extends JControllerAdmin
{
	// surcharge pour gérer la suppression de utilisateurs par le modèle adéquat
	public function getModel($name = 'Groupe_utilisateur_map', $prefix = 'ArvieModel') 
	{
		// récupèrer le modèle de détail ($name au sigulier) pour la suppression assistée d'un (des) enregistrement(s)
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
