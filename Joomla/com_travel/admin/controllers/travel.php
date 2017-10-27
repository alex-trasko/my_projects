<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * Travel Controller.
 */
class TravelControllerTravel extends JControllerForm
{
    function save() {

        $jform = JRequest::getVar('jform', array(), '', 'array');

        $params = JComponentHelper::getParams('com_travel');
        $thumb_width = $params->get('thumb_width');
        $thumb_height = $params->get('thumb_height');
        $full_width = $params->get('full_width');
        $full_height = $params->get('full_height');

        $thumbSizes = array($thumb_width.'x'. $thumb_height, $full_width.'x'.$full_height);

        $image = new JImage(JPATH_ROOT . DS . $jform['image']);
        $thumbsCreated = $image->createThumbs($thumbSizes, 2);

        $jform['image_thumb'] = $thumbsCreated[0]->getPath();
        $jform['image_full'] = $thumbsCreated[1]->getPath();

        JRequest::setVar('jform', $jform);

        parent::save();

    }

}