<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Travel View
 */
class TravelViewTravel extends JViewLegacy
{
    /**
     * Items
     *
     * @var array
     */
	protected $item;

    /**
     * Form object.
     *
     * @var array
     */
	protected $form;

    /**
     * display method of Partner view
     *
     * @return void
     */
	public function display($tpl = null) 
	{

        $doc = JFactory::getDocument();
        $doc->addScript('http://maps.google.com/maps/api/js?sensor=false');

        // Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

        // Check for errors
		if (count($errors = $this->get('Errors'))) 
		{
			JFactory::getApplication()->enqueueMessage(implode('<br />', $errors), 'error');
		}

        // Set the toolbar
		$this->addToolBar();

        // Display the template
		parent::display($tpl);
	}

    /**
     * Set the toolbar
     *
     * @return void
     */
	protected function addToolBar() 
	{
		$input = JFactory::getApplication()->input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_TRAVEL_MANAGER_NEW')
								: JText::_('COM_TRAVEL_MANAGER_EDIT'), 'travel');
        JToolBarHelper::apply('travel.apply', 'JTOOLBAR_APPLY');
		JToolBarHelper::save('travel.save');
		JToolBarHelper::cancel('travel.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}