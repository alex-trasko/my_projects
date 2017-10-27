<?php

// No direct access
defined('_JEXEC') or die;

// import Joomla table library
jimport('joomla.database.table');

/**
 * Travel Table class
 */
class TravelTableTravel extends JTable
{
    /**
     * Constructor
     *
     * @param object Database connector object
     */
	function __construct(&$db) 
	{
		parent::__construct('#__travel', 'id', $db);
	}
}