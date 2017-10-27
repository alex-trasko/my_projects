<?php
class DbTable_KNrodate extends Zend_Db_Table_Abstract 
{
    protected $_name = 'KN_rodate';
    
    public function getItems($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name);
			
        if (!is_null($itemId)) {
            $select->where('"ID_RODATE" = ?', $itemId); 
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
            $select->order("ID_RODATE asc");
			$stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();    
        }

        return $result;

    }	
	
}