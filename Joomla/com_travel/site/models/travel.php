<?php

// No direct access to this file
defined('_JEXEC') or die;

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Travel Model
 */
class TravelModelTravel extends JModelItem
{
    /**
     * data
     * @var array
     */
    var $_data;

    /**
     * total
     * @var integer
     */
    var $_total = null;

    /**
     * pagination
     * @var object
     */
    var $_pagination = null;

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
    function __construct()
    {
        parent::__construct();

        $limit = 1000;
        $limitstart = 0;

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }

    function getData()
    {
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }

    public function getDataById()
    {
        $id = (int) $_GET['id'];
        if (empty($this->_data))
        {
            $query = $this->_buildQuery($id);
            $this->_data = $this->_getList($query);
        }

        return $this->_data;
    }

    function getTotal()
    {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }
        return $this->_total;
    }

    function getPagination()
    {
        // Load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
        }
        return $this->_pagination;
    }

    public function getTable($type = 'Travel', $prefix = 'TravelTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    protected function _buildQuery($id=null,$q="")
    {
        //$q = mysql_real_escape_string($q);
        $query = 'SELECT *' .
            ' FROM #__travel' .
            ' WHERE published = 1';
        if ($id!=null) {
            $query.=" AND id=".$id;
        }
        if($q!='') {
            $query.=" AND (`title` LIKE '%".$q."%' OR `description` LIKE '%".$q."%' )";
        }
        return $query;
    }

}