<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Travel Component
 */
class TravelViewTravel extends JViewLegacy
{
    /**
     * Сообщение.
     *
     * @var string
     */
    protected $msg;
    protected $data;

    /**
     * Параметры.
     *
     * @var object
     */
    protected $params;

    /**
     * Переопределяем метод display класса JViewLegacy.
     *
     * @return void
     */

    public function display($tpl = null)
    {

        $doc = JFactory::getDocument();
        $doc->addScript('http://maps.google.com/maps/api/js?sensor=false');
        $doc->addScript(JURI::root().'media/com_travel/js/infobox.js');
        $doc->addScript(JURI::root().'media/com_travel/js/markerclusterer.js');
        $doc->addScript(JURI::root().'media/com_travel/js/jquery-1.9.1.min.js');

        // Get data from the model
        if (!empty($_GET["id"])) {
            $issetId = 1;
            $this->data =& $this->get('DataById');
            $this->assignRef('issetId',$issetId);
        } else {
            $this->data =& $this->get('Data');
        }
        $this->pagination = $this->get('Pagination');

        // Assign data to the view
        $this->assignRef('data', $this->data);
        $this->assignRef('pagination', $this->pagination);
        // print_r($this->data);

        // Check for errors
        if (count($errors = $this->get('Errors')))
        {
            foreach ($errors as $error)
            {
                JLog::add($error, JLog::ERROR, 'com_travel');
            }
        }

        // Get Params
        $app = JFactory::getApplication();
        $this->params = $app->getParams();

        // Prepare Document
        $this->_prepareDocument();

        // Display the view
        parent::display($tpl);
    }

    /**
     * Prepare Document
     *
     * @return void
     */
    protected function _prepareDocument()
    {
        $app = JFactory::getApplication();
        $menus = $app->getMenu();
        $title = null;

        // Так как приложение устанавливает заголовок страницы по умолчанию,
        // мы получаем его из пункта меню.
        $menu = $menus->getActive();

        if ($menu)
        {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        }
        else
        {
            $this->params->def('page_heading', JText::_('COM_TRAVEL_DEFAULT_PAGE_TITLE'));
        }

        // Получаем заголовок страницы в браузере из параметров.
        $title = $this->params->get('page_title', '');

        if (empty($title))
        {
            $title = $app->getCfg('sitename');
        }
        elseif ($app->getCfg('sitename_pagetitles', 0) == 1)
        {
            $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        }
        elseif ($app->getCfg('sitename_pagetitles', 0) == 2)
        {
            $title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
        }
        else
        {
            $title = $this->msg;
        }

        // Устанавливаем заголовок страницы в браузере.
        $this->document->setTitle($title);
    }
}