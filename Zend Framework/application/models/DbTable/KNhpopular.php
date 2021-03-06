<?php
class DbTable_KNhpopular extends Zend_Db_Table_Abstract 
{
    protected $_name = 'KN_hpopular';
    
    public function getItems($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name);
			
        if (!is_null($itemId)) {            
            $select->where('"ID" = ?', $itemId); 
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();    
        }

        return $result;

    }
	
	public function getItemsATE($itemId) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)			            
			->where('"KOD_ATE" = ?', $itemId) 
            ->order("DATACENSUS desc");
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();
        
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
			->order("KOD_ATE asc");
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }	
	
}