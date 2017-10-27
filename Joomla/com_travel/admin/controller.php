<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of Travel component
 */
class TravelController extends JControllerLegacy
{
    /**
     * display task
     *
     * @return void
     */
	public function display($cachable = false, $urlparams = array()) 
	{
		// Устанавливаем представление по умолчанию, если оно не было установлено.
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'Travels'));

		parent::display($cachable);
	}
}