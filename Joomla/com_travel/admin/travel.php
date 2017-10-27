<?php

// No direct access to this file
defined('_JEXEC') or die;

// Устанавливаем некоторые глобальные свойства.
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-travel {background-image: url(../media/com_travel/images/travel-48x48.png);}');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Travel
$controller = JControllerLegacy::getInstance('Travel');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();