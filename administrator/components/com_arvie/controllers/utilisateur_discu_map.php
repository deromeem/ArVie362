<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieControllerUtilisateur_discu_map extends JControllerForm
{
		function display($cachable = false, $urlparams = false) 
        {
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'utilisateur_discu_map'));
 
                parent::display($cachable, $urlparams);
        }
}
