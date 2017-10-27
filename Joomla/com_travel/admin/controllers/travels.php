<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Travels Controller.
 */
class TravelControllerTravels extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     * @since	1.6
     */
	public function getModel($name = 'Travel', $prefix = 'TravelModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}

    public function delete(){
        $model = $this->getModel('travels');
        $model->delete();
        parent::delete();
    }

}