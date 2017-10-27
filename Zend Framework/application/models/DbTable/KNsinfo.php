<?php
class DbTable_KNsinfo extends Zend_Db_Table_Abstract 
{
    protected $_name = 'KN_sinfo';
    
    public function getItems($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name);
			
        if (!is_null($itemId)) {
            $select->where('"ID_SINFO" = ?', $itemId); 
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
			$select->order("ID_SINFO asc");
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();    
        }

        return $result;

    }
	
	public function getCount() 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name, 'count(*)');
		
		$stmt = $this->getAdapter()->query($select);
		$result = $stmt->fetch();  
        return $result;

    }	
	
	public function getPorc($limit = null, $pages = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)
			->limit($limit, $pages)
			->order("ID_SINFO asc");
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
}