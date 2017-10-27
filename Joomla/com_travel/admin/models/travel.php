<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * Travel Model.
 */
class TravelModelTravel extends JModelAdmin
{
    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
	public function getTable($type = 'Travel', $prefix = 'TravelTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

    /**
     * Method to get the record form.
     *
     * @param	array	$data		Data for the form.
     * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
     * @return	mixed	A JForm object on success, false on failure
     * @since	1.6
     */
	public function getForm($data = array(), $loadData = true) 
	{
        // Get the form.
		$form = $this->loadForm('com_travel.travel', 'travel',
								array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}

		return $form;
	}

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return	mixed	The data for the form.
     * @since	1.6
     */
	protected function loadFormData() 
	{
		// Проверка сессии на наличие ранее введеных в форму данных.
		$data = JFactory::getApplication()->getUserState('com_travel.edit.travel.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}

		return $data;
	}

}