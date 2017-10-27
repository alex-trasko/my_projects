<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Travels View
 */
class TravelViewTravels extends JViewLegacy
{
    /**
     * Items
     *
     * @var array
     */
	protected $items;

    /**
     * Pagination.
     *
     * @var object
     */
	protected $pagination;

    /**
     * display method of Partners view
     *
     * @return void
     */
	public function display($tpl = null) 
	{
        // Get the Data
        $this->items = $this->get('Items');

        // Get the Pagination
		$this->pagination = $this->get('Pagination');

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
		JToolBarHelper::title(JText::_('COM_TRAVEL_MANAGER'), 'travel');
		JToolBarHelper::addNew('travel.add');
		JToolBarHelper::editList('travel.edit');
        JToolBarHelper::divider();
        JToolBarHelper::publishList('travels.publish');
        JToolBarHelper::unpublishList('travels.unpublish');
        JToolBarHelper::divider();
		JToolBarHelper::deleteList('', 'travels.delete');
        JToolBarHelper::divider();
        JToolBarHelper::preferences('com_travel');
	}
}