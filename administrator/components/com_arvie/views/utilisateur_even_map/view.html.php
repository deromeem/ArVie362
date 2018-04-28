<?php
defined('_JEXEC') or die('Restricted access');
 
class ArvieViewUtilisateur_even_map extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $state;
	
	public function display($tpl = null) 
	{
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		$this->addToolBar();
		parent::display($tpl);
	}

	protected function addToolBar() 
	{			
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		// $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $userId);
	
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title(JText::_('COM_ARVIE_UTILISATEUR_EVEN_MAP')." : ".($isNew ? JText::_('COM_ARVIE_NEW'): JText::_('COM_ARVIE_MODIF')), 'address');


		if ($isNew)
		{
			JToolbarHelper::apply('utilisateur_even_map.apply');
			JToolbarHelper::save('utilisateur_even_map.save');
			JToolbarHelper::save2new('utilisateur_even_map.save2new');
		}
		else
		{
			// if (!$checkedOut)
			// {
				JToolbarHelper::apply('utilisateur_even_map.apply');
				JToolbarHelper::save('utilisateur_even_map.save');
			// }
		}
		JToolBarHelper::cancel('utilisateur_even_map.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
