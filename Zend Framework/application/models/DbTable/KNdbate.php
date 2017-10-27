<?php
class DbTable_KNdbate extends Zend_Db_Table_Abstract 
{
    protected $_name = 'KN_dbate';
    
    public function getItems($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)
			
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATENAME'))
			->joinLeft('KN_obl', '"KN_dbate"."ID_OBL" = "KN_obl"."ID_OBL"', array('NAME_OBL' => 'OBL'))
			->joinLeft('KN_ra', '"KN_dbate"."ID_RA" = "KN_ra"."ID_RA"', array('NAME_RA' => 'RA'))
			->joinLeft('KN_atevalue', '"KN_dbate"."ATEVALUE" = "KN_atevalue"."ID_ATEVALUE"', array('NAMEVALUE'))
			;
			
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

    public function getItemsByKodATE($itemId = null)
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)
        ;

        if (!is_null($itemId)) {
            $select->where('"KOD_ATE" = ?', $itemId);
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
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
	
	public function getPorc($limit = null, $pages = null, $sorting = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)
            ->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))
			->joinLeft('KN_obl', '"KN_dbate"."ID_OBL" = "KN_obl"."ID_OBL"', array('NAME_OBL' => 'OBL'))
			->joinLeft('KN_ra', '"KN_dbate"."ID_RA" = "KN_ra"."ID_RA"', array('NAME_RA' => 'RA'))
			->limit($limit, $pages)
			;
		if ($sorting)
		{ 
		  	$select->order($sorting.' asc');
		}else{
			$select->order("KOD_ATE asc");
		}
		
		$stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();   
        return $result;

    }
	
	public function search($zapros) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name)
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))
			->joinLeft('KN_obl', '"KN_dbate"."ID_OBL" = "KN_obl"."ID_OBL"', array('NAME_OBL' => 'OBL'))
			->joinLeft('KN_ra', '"KN_dbate"."ID_RA" = "KN_ra"."ID_RA"', array('NAME_RA' => 'RA'))			
			;		  
		
		if ($zapros['namerus']) 
			$select->where('"NAMERUS" = ?', $zapros['namerus']); 
		
		if ($zapros['namebel']) 
		 	$select->where('"NAMEBEL" = ?', $zapros['namebel']); 
		
		if ($zapros['namelat']) 
		  	$select->where('"NAMELAT" = ?', $zapros['namelat']); 
		 
		if ($zapros['soato'] || $zapros['soato']===0) 
		  	$select->where('"SOATO" = ?', $zapros['soato']); 
		 
		if ($zapros['rodate'])
		{
			
			$mass_rodate = explode(',',$zapros['rodate']);
			reset($mass_rodate);
			$first = key($mass_rodate);
			$str = '';
			
			foreach($mass_rodate as $key => $value)
			{
				if ($key==$first)
				{ 
					$str.='"KN_dbate"."ID_RODATE" = '.$value;
				}
				else
				{
					$str.=' OR '.'"KN_dbate"."ID_RODATE" = '.$value;
				}
			}
			
			$select->where($str);
		
		}
		 
		if ($zapros['existence']) 
		 	$select->where('"EXISTENCE" = ?', $zapros['existence']); 
		 
		if ($zapros['obl']) 
		  	$select->where('"KN_dbate"."ID_OBL" = ?', $zapros['obl']); 
		 
		if ($zapros['ra']) 
		  	$select->where('"KN_dbate"."ID_RA" = ?', $zapros['ra']);
			
		if ($zapros['sovet']) 
		  	$select->where('"SOVET" = ?', $zapros['sovet']);
		
		if ($zapros['nomenklat']) 
		  	$select->where('"NOMENKLAT" = ?', $zapros['nomenklat']);

		if ($zapros['popular_max']||$zapros['popular_min']||$zapros['popular_max']===0||$zapros['popular_min']===0){
			$select->joinLeft('KN_hpopular', '"KN_dbate"."KOD_ATE" = "KN_hpopular"."KOD_ATE"', array('POPULAR','DATACENSUS'))
			   ->where('"DATACENSUS" = (SELECT MAX ("DATACENSUS") FROM "KN_hpopular" WHERE "KN_dbate"."KOD_ATE" = "KN_hpopular"."KOD_ATE")');
			
			if ($zapros['popular_max']||$zapros['popular_max']===0) 
				$select->where('"POPULAR" <= ?', $zapros['popular_max']);
			
			if ($zapros['popular_min']||$zapros['popular_min']===0)
				$select->where('"POPULAR" >= ?', $zapros['popular_min']);		
		}
		
		if ($zapros['sorting']) 
		  	$select->order($zapros['sorting'].' asc');
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
	//reports
	
	public function getCouncils($itemId = null) 
    {

        $select = $this->getAdapter()->select()
            ->from($this->_name)
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))			
			->order("NAMERUS");
			;
			
		if (!is_null($itemId)) {
            $select->where('"SOATO" = ?', $itemId); 
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetch();
        }
        else {
			$select->where('"KN_dbate"."ID_RODATE" = ?', 103)
				->orwhere('"KN_dbate"."ID_RODATE" = ?', 999);
            $stmt = $this->getAdapter()->query($select);
            $result = $stmt->fetchAll();    
        }

        return $result;

    }
	
	public function getlistcouncils($zapros) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name)
			->where('"KN_dbate"."ID_RODATE" = 103 OR "KN_dbate"."ID_RODATE" = 999')
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))
			
			->order("NAMERUS asc")
			;
		
		if ($zapros['obl']) 
		  	$select->where('"ID_OBL" = ?', $zapros['obl']); 
		 
		if ($zapros['ra']) 
		  	$select->where('"ID_RA" = ?', $zapros['ra']);
			
		if ($zapros['existence']) 
		  	$select->where('"EXISTENCE" = ?', $zapros['existence']);
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
	public function getcountlocations($itemId) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name, array('KOL' => 'COUNT("SOATO")'))
			->where('"SOATO" > ?', (real)$itemId)
			->where('"SOATO" < ?', (real)$itemId+1000)
			;
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetch();   
        return $result;

    }
	
	public function getlistlocations($zapros) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name)
			->where('	"KN_dbate"."ID_RODATE" = 231 OR "KN_dbate"."ID_RODATE" = 232 OR "KN_dbate"."ID_RODATE" = 233 OR
						"KN_dbate"."ID_RODATE" = 234 OR "KN_dbate"."ID_RODATE" = 235 OR "KN_dbate"."ID_RODATE" = 239')
						
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))
			->joinLeft('KN_hpopular', '"KN_dbate"."KOD_ATE" = "KN_hpopular"."KOD_ATE"', array('POPULAR','DATACENSUS'))
			->where('"DATACENSUS" = (SELECT MAX ("DATACENSUS") FROM "KN_hpopular" WHERE "KN_dbate"."KOD_ATE" = "KN_hpopular"."KOD_ATE") OR "POPULAR" ISNULL')
			->order(array('SOVET asc', 'NAMERUS asc'))
			;
		 
		if ($zapros['obl']) 
		  	$select->where('"ID_OBL" = ?', $zapros['obl']); 
		 
		if ($zapros['ra']) 
		  	$select->where('"ID_RA" = ?', $zapros['ra']);
			
		if ($zapros['sovet'])
		{ 
		  	$select->where('"SOATO" > ?', (real)$zapros['sovet'])
				->where('"SOATO" < ?', (real)$zapros['sovet']+1000)
			;
		}
			
		if ($zapros['existence']) 
		  	$select->where('"EXISTENCE" = ?', $zapros['existence']); 
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
	public function getlistdifference($zapros) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name)
			->where('"ATENAME" != "NAMERUS"')
			->order("NAMERUS asc")
			;
		 
		if ($zapros['obl']) 
		  	$select->where('"ID_OBL" = ?', $zapros['obl']); 
		 
		if ($zapros['ra']) 
		  	$select->where('"ID_RA" = ?', $zapros['ra']);
			
		if ($zapros['sovet'])
		{ 
		  	$select->where('"SOATO" > ?', (real)$zapros['sovet'])
				->where('"SOATO" < ?', (real)$zapros['sovet']+1000)
			;
		}
			
		if ($zapros['existence']) 
		  	$select->where('"EXISTENCE" = ?', $zapros['existence']); 
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
	public function getlistsettlements($zapros) 
    {
	    $select = $this->getAdapter()->select()
            ->from($this->_name)
			->joinLeft('KN_rodate', '"KN_dbate"."ID_RODATE" = "KN_rodate"."ID_RODATE"', array('RATECUT'))
			->where('"KN_dbate"."ID_RODATE" = 111 OR "KN_dbate"."ID_RODATE" = 112 OR "KN_dbate"."ID_RODATE" = 113 OR
						"KN_dbate"."ID_RODATE" = 121 OR "KN_dbate"."ID_RODATE" = 122 OR "KN_dbate"."ID_RODATE" = 123 OR
						"KN_dbate"."ID_RODATE" = 231 OR "KN_dbate"."ID_RODATE" = 232 OR "KN_dbate"."ID_RODATE" = 233 OR
						"KN_dbate"."ID_RODATE" = 234 OR "KN_dbate"."ID_RODATE" = 235 OR "KN_dbate"."ID_RODATE" = 239')
			->order("NAMERUS asc")
			;
		 
		if ($zapros['obl']) 
		  	$select->where('"ID_OBL" = ?', $zapros['obl']); 
		 
		if ($zapros['ra']) 
		  	$select->where('"ID_RA" = ?', $zapros['ra']);
			
		if ($zapros['existence']) 
		  	$select->where('"EXISTENCE" = ?', $zapros['existence']); 
		
		$stmt = $this->getAdapter()->query($select);
        $result = $stmt->fetchAll();   
        return $result;

    }
	
}