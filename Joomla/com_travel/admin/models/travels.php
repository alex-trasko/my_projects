<?php

// No direct access to this file
defined('_JEXEC') or die;

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Travels Model.
 */
class TravelModelTravels extends JModelList
{

    /**
     * Method to build an SQL query to load the list data.
     *
     * @return	string	An SQL query
     */
	protected function getListQuery(){
        // Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

        // Select some fields
		$query->select('t.id, t.title, t.image_thumb, t.place, t.start_date, t.end_date, t.description, t.published');

        // From the travel table
		$query->from('#__travel t');
		return $query;
	}

}