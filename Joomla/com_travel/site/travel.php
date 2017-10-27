<?php

// No direct access to this file
defined('_JEXEC') or die;

// Add loggger
JLog::addLogger(array('text_file' => 'com_travel.php'), JLog::ALL, array('com_travel'));

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Partner.
$controller = JControllerLegacy::getInstance('Travel');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();