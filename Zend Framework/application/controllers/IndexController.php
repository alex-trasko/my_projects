<?php

/**
 * IndexController
 * 
 * Главный контроллер сайта
 * 
 */
class IndexController extends Zend_Controller_Action 
{

	public function searchateAction()
	{
		
		$table = new DbTable_KNrodate();
		$KN_rodate = $table->getItems();
		$this->view->KN_rodate = $KN_rodate;		
		
		$table = new DbTable_KNobl();
		$KN_obl = $table->getItems();
		$this->view->KN_obl = $KN_obl;

		$table = new DbTable_KNra();
		$KN_ra = $table->getItems();
		$this->view->KN_ra = $KN_ra;
		
		$table = new DbTable_KNdbate;
		$KN_sovet = $table->getCouncils();
		$this->view->KN_sovet = $KN_sovet;
				
		if(isset($_POST['namerus']))
		{
			$atedata = array(
				'namerus' => $this->_request->getPost('namerus'),
				'namebel' => $this->_request->getPost('namebel'),
				'namelat' => $this->_request->getPost('namelat'),
				'soato' => $this->_request->getPost('soato'),
				'rodate' => '',
				'existence' => $this->_request->getPost('existence'),
				'obl' => intval($this->_request->getPost('obl')),
				'ra' => intval($this->_request->getPost('ra')),
				'sovet' => $this->_request->getPost('sovet'),
				'nomenklat' => $this->_request->getPost('nomenklat'),
				'popular_min' => $this->_request->getPost('popular_min'),
				'popular_max' => $this->_request->getPost('popular_max'),
				'sorting' => $this->_request->getPost('sorting'),			
			);
			
			if ($this->_request->getPost('rodate'))
				$atedata['rodate'] = implode(',', $this->_request->getPost('rodate'));
							
			if($atedata['namerus']!= '' || $atedata['namebel']!= '' || $atedata['namelat']!= '' || $atedata['soato']!= '' || $atedata['rodate']!= '' || $atedata['existence']!= '' || $atedata['obl']!= '' || $atedata['ra']!= '' || $atedata['sovet']!= '' || $atedata['nomenklat']!= '' || $atedata['popular_min']!= '' || $atedata['popular_max']!= '')
			{		
				
				if ($atedata['soato']!='')
					$atedata['soato'] = intval($atedata['soato']);
				
				if ($atedata['popular_min']!='')
					$atedata['popular_min'] = intval($atedata['popular_min']);
				
				if ($atedata['popular_max']!='')
					$atedata['popular_max'] = intval($atedata['popular_max']);
				
				$this->view->atedata = $atedata;
				$table = new DbTable_KNdbate();
				$rezult = $table->search($atedata);
				
				$rodate = array(111,112,113,121,122,123,231,232,233,234,235,239);
				$table = new DbTable_SearchGis();
				foreach($rezult as &$rez)
					if(in_array($rez['ID_RODATE'],$rodate))
						$rez['geom'] = $table->searchAte($rez['KOD_ATE']);					
				$this->view->search_rezult = $rezult;								
			}
		
		}
	}

	public function viewateAction() 
    {
		
		$id = $this->_getParam('ateId');
		$table = new DbTable_KNdbate();
		$atedata = $table->getItems($id);
		
		if (!$atedata['SINFOBEL'] == '')
		{
			$atedata['SINFOBEL'] = strtr($atedata['SINFOBEL'], ".",",");
			$mass_sinfobel = explode(',', $atedata['SINFOBEL']);
			$table = new DbTable_KNsinfo();
			foreach($mass_sinfobel as $item)
			{
				$row = $table->getItems($item);
				$atedata['SINFOBEL_M'][]= $row['SINFONAME'];
			}
		} else {
			$atedata['SINFOBEL_M'][]= '';
		}		

		if (!$atedata['SINFORUS'] == '')
		{	   
			$atedata['SINFORUS'] = strtr($atedata['SINFORUS'], ".",",");
			$mass_sinforus = explode(',', $atedata['SINFORUS']);
			$table = new DbTable_KNsinfo();
			foreach($mass_sinforus as $item)
			{
				$row = $table->getItems($item);
				$atedata['SINFORUS_M'][]= $row['SINFONAME'];
			}
		} else {
			$atedata['SINFORUS_M'][]= '';
		}
		
		$table = new DbTable_KNhpopular();
		$result = $table->getItemsATE($atedata['KOD_ATE']);
		$atedata['HPOPULAR']= $result;
		
		$table = new DbTable_KNatedrnamebel();
		$result = $table->getItemsATE($atedata['KOD_ATE']);
		if (!empty ($result))
		{
			foreach($result as $item)
			{
				$atedata['DRTNAMEBEL'][]= $item;
			}
		}
		
		$table = new DbTable_KNatedrnamerus();
		$result = $table->getItemsATE($atedata['KOD_ATE']);
		if (!empty ($result))
		{
			foreach($result as $item)
			{
				$atedata['DRTNAMERUS'][]= $item;
			}
		}
				
		$table = new DbTable_KNhchangeate();
		$result = $table->getItemsATE($atedata['KOD_ATE']);
		$atedata['HCHANGE']= $result;
				
//		echo("<pre>");
//		print_r($atedata);
		$this->view->atedata = $atedata;			
	 
    }

}