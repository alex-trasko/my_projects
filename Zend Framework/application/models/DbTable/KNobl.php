<?php
class DbTable_KNobl extends Zend_Db_Table_Abstract 
{
    protected $_name = 'KN_obl';
    
    public function getItems($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name);
			
        if (!is_null($itemId)) {
            $select->where('"ID_OBL" = ?', $itemId); 
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
            $select->order("ID_OBL asc");
			$stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();    
        }

        return $result;

    }	
	
}