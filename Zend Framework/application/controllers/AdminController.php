<?php

class AdminController extends Zend_Controller_Action 
{
	
	protected $_sog = "БВГДЖЗКЛМНПРСТФХЦЧШбвгджзклмнпрстфхцчш";
			
	protected $_tr_g = array(
			"А"=>"A","Б"=>"B","В"=>"V","Г"=>"H","Д"=>"D","Е"=>"Je","Ё"=>"Jo","Ж"=>"Z~","З"=>"Z","I"=>"I","Й"=>"J",
			"К"=>"K","Л"=>"L","М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T","У"=>"U","Ў"=>"Uu",
			"Ф"=>"F","Х"=>"Ch","Ц"=>"C","Ч"=>"C~","Ш"=>"S~","Ы"=>"Y","Ь"=>"^","Э"=>"E","Ю"=>"Ju","Я"=>"Ja",
			"а"=>"a","б"=>"b","в"=>"v","г"=>"h","д"=>"d","е"=>"je","ё"=>"jo","ж"=>"z~","з"=>"z","i"=>"i","й"=>"j",
			"к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u","ў"=>"u",
			"ф"=>"f","х"=>"ch","ц"=>"c","ч"=>"c~","ш"=>"s~","ы"=>"y","ь"=>"^","э"=>"e","ю"=>"ju","я"=>"ja");
		 
	protected $_tr_s = array(
			"А"=>"A","Б"=>"B","В"=>"V","Г"=>"H","Д"=>"D","Е"=>"Je","Ё"=>"Jo","Ж"=>"Z~","З"=>"Z","I"=>"I","Й"=>"J",
			"К"=>"K","Л"=>"L","М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T","У"=>"U","Ў"=>"Uu",
			"Ф"=>"F","Х"=>"Ch","Ц"=>"C","Ч"=>"C~","Ш"=>"S~","Ы"=>"Y","Ь"=>"^","Э"=>"E","Ю"=>"Ju","Я"=>"Ja",
			"а"=>"a","б"=>"b","в"=>"v","г"=>"h","д"=>"d","е"=>"ie","ё"=>"io","ж"=>"z~","з"=>"z","i"=>"i","й"=>"j",
			"к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u","ў"=>"u",
			"ф"=>"f","х"=>"ch","ц"=>"c","ч"=>"c~","ш"=>"s~","ы"=>"y","ь"=>"^","э"=>"e","ю"=>"iu","я"=>"ia");
	
	public function listateAction()  
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
				$this->view->search_rezult = $rezult;
								
			}
		
		}
		
		$pages = 0; 
		if(isset($_POST['page']))
		{
			$pages = $this->_request->getPost('page');
			$this->view->pages = $pages;
			$pages = $pages*50-50;
		}
		
		$sorting = $this->_request->getPost('sorting');
		$this->view->sorting = $sorting;
			
		$table = new DbTable_KNdbate();
		$atelist = $table->getPorc(50,$pages,$sorting);
		$count = $table->getCount();
		$this->view->kol = $count['count'];
		$this->view->pagescount = Ceil($count['count']/50);
		$this->view->atelist = $atelist;
	
		
	}
	
	public function exportateAction() 
	{		
		$table = new DbTable_KNdbate();
		$atedata = $table->getItems();
		
		$this->_helper->layout()->disableLayout();			
		require_once '../library/App/Util/Exel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'ID_ATE')
					->setCellValue('B1', 'KOD_ATE')
					->setCellValue('C1', 'DATERЕG')
					->setCellValue('D1', 'SOATO')
					->setCellValue('E1', 'ATENAME')
					->setCellValue('F1', 'NAMERUS')
					->setCellValue('G1', 'UDARRUS')
					->setCellValue('H1', 'NAMEBEL')
					->setCellValue('I1', 'UDARBEL')
					->setCellValue('J1', 'NAMELAT')
					->setCellValue('K1', 'ID_RODATE')
					->setCellValue('L1', 'EXISTENCE')
					->setCellValue('M1', 'ID_OBL')
					->setCellValue('N1', 'ID_RA')
					->setCellValue('O1', 'SOVET')
					->setCellValue('P1', 'ADMINCENTE')
					->setCellValue('Q1', 'ATEVALUE')
					->setCellValue('R1', 'SINFORUS')
					->setCellValue('S1', 'SINFOBEL')
					->setCellValue('T1', 'NOMENKLAT')
					->setCellValue('U1', 'X_WGS')
					->setCellValue('V1', 'Y_WGS')
					;
					
		$x = 1;
		foreach($atedata as $item)
		{
			$x++;			
			$objPHPExcel->setActiveSheetIndex(0)			
					->setCellValue('A'.$x, $item['ID_ATE'] )
					->setCellValue('B'.$x, $item['KOD_ATE'])
					->setCellValue('C'.$x, $item['DATERЕG'])
					->setCellValue('D'.$x, $item['SOATO'])
					->setCellValue('E'.$x, $item['ATENAME'])
					->setCellValue('F'.$x, $item['NAMERUS'])
					->setCellValue('G'.$x, $item['UDARRUS'])
					->setCellValue('H'.$x, $item['NAMEBEL'])
					->setCellValue('I'.$x, $item['UDARBEL'])
					->setCellValue('J'.$x, $item['NAMELAT'])
					->setCellValue('K'.$x, $item['ID_RODATE'])
					->setCellValue('L'.$x, $item['EXISTENCE'])
					->setCellValue('M'.$x, $item['ID_OBL'])
					->setCellValue('N'.$x, $item['ID_RA'])
					->setCellValue('O'.$x, $item['SOVET'])
					->setCellValue('P'.$x, $item['ADMINCENTE'])
					->setCellValue('Q'.$x, $item['ATEVALUE'])
					->setCellValue('R'.$x, $item['SINFORUS'])
					->setCellValue('S'.$x, $item['SINFOBEL'])
					->setCellValue('T'.$x, $item['NOMENKLAT'])
					->setCellValue('U'.$x, $item['X_WGS'])
					->setCellValue('V'.$x, $item['Y_WGS'])
					;			
		}
		
		$objPHPExcel->getActiveSheet()->getStyle('A1:V1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);		
		$objPHPExcel->getActiveSheet()->setTitle('ГОСКАРТГЕОЦЕНТР');
		$objPHPExcel->setActiveSheetIndex(0);			
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="ГОСКАРТГЕОЦЕНТР.xls"');
		header('Cache-Control: max-age=0');		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	
	public function translit($org_str)
	{
		
		$tmp_str = ''; 
		
		for($i = 0; $i < strlen($org_str); $i++) { 
			$s = mb_substr($org_str,$i,1,'UTF-8');
			  
			if($i>0){
				$f=false;
				for ($j = 0; $j < strlen($this->_sog); $j++){
					if(mb_substr($this->_sog,$j,1,'UTF-8') == mb_substr($org_str,$i-1,1,'UTF-8'))	
						$f=true;
				}			
			}else{$f=false;}	
			   
			if($f==true){
				$tmp_str = $tmp_str.strtr($s, $this->_tr_s);}
			else{
				$tmp_str = $tmp_str.strtr($s, $this->_tr_g);}
		
		}		  
		return $tmp_str; 
	}
	
	public function editateAction() 
	{
		$ateid = $this->_getParam('ateId');

		$table = new DbTable_KNatevalue();
		$KN_atevalue = $table->getItems();
		$this->view->KN_atevalue = $KN_atevalue;
		
		$table = new DbTable_KNrodate();
		$KN_rodate = $table->getItems();
		$this->view->KN_rodate = $KN_rodate;

		$table = new DbTable_KNsinfo();
		$KN_sinfo = $table->getItems();
		$this->view->KN_sinfo = $KN_sinfo;
		
		$table = new DbTable_KNobl();
		$KN_obl = $table->getItems();
		$this->view->KN_obl = $KN_obl;

		$table = new DbTable_KNra();
		$KN_ra = $table->getItems();
		$this->view->KN_ra = $KN_ra;
		
		$table = new DbTable_KNdbate;
		$KN_sovet = $table->getCouncils();
		$this->view->KN_sovet = $KN_sovet;
		
		if(isset($_POST['saveate']))
		{	
			$atedata = array(
				'ID_ATE' => $this->_request->getPost('id_ate'),
				'KOD_ATE' => intval($this->_request->getPost('kod_ate')),
				'DATERЕG' => date("Y-m-d H:i:s", strtotime($this->_request->getPost('datereg'))),
				'SOATO' => intval($this->_request->getPost('soato')),
				'ATENAME' => $this->_request->getPost('atename'),
				'NAMERUS' => $this->_request->getPost('namerus'),
				'UDARRUS' => $this->_request->getPost('udarrus'),
				'NAMEBEL' => $this->_request->getPost('namebel'),
				'UDARBEL' => $this->_request->getPost('udarbel'),
				'NAMELAT' => $this->translit($this->_request->getPost('namebel')),
				'ID_RODATE' => intval($this->_request->getPost('id_rodate')),
				'EXISTENCE' => $this->_request->getPost('existence'),
				'ID_OBL' => intval($this->_request->getPost('obl')),
				'ID_RA' => intval($this->_request->getPost('ra')),
				'SOVET' => $this->_request->getPost('sovet'),
				'ADMINCENTE' => $this->_request->getPost('admincente'),
				'ATEVALUE' => intval($this->_request->getPost('atevalue')),
				'SINFORUS' => '',
				'SINFOBEL' => '',
				'NOMENKLAT' => $this->_request->getPost('nomenklat'),
				'X_WGS' => (float) $this->_request->getPost('x_wgs'),
				'Y_WGS' => (float) $this->_request->getPost('y_wgs'),
			);

			if ($this->_request->getPost('datereg')=='')
				$atedata['DATERЕG'] = null;
			
			if ($this->_request->getPost('sinforus'))
				$atedata['SINFORUS'] = implode(',', $this->_request->getPost('sinforus'));
			
			if ($this->_request->getPost('sinfobel'))
				$atedata['SINFOBEL'] = implode(',', $this->_request->getPost('sinfobel'));				

//			echo("<pre>"); 
//			print_r($atedata);
/*			
			if($atedata['ID_ATE'] == '')
				$errors[] = "id_ate";

			if($atedata['KOD_ATE'] == '')
				$errors[] = "kod_ate";
				
			if($atedata['DATERЕG'] == '')
				$errors[] = "datereg";
				
			if($atedata['SOATO'] == '')
				$errors[] = "soato";
				
			if($atedata['ATENAME'] == '')
				$errors[] = "atename";
				
			if($atedata['NAMERUS'] == '')
				$errors[] = "namerus";
				
			if($atedata['UDARRUS'] == '')
				$errors[] = "udarrus";
				
			if($atedata['NAMEBEL'] == '')
				$errors[] = "namebel";
				
			if($atedata['UDARBEL'] == '')
				$errors[] = "udarbel";	
		
			if($atedata['NAMELAT'] == '')
				$errors[] = "namelat";
				
			if($atedata['ID_RODATE'] == '')
				$errors[] = "id_rodate";
				
			if($atedata['EXISTENCE'] == '')
				$errors[] = "existence";*/			
			
			if(!isset($errors))
			{
				$atedata['ID_ATE'] = intval($atedata['ID_ATE']);
				if($ateid == 0)
				{
					$table = new DbTable_KNdbate();
                    $date = $table->getItemsByKodATE($atedata['KOD_ATE']);
                    if (empty($date)){
                        $table->insert($atedata);
                    }
                    else
                    {
                        $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Ошибка: Запись с таким KOD_ATE уже сушествует!');
                    }
				}
				else
				{
					$table = new DbTable_KNdbate();		
					$table->update($atedata, '"ID"='.$ateid);
				}
				$this->getHelper('Redirector')->gotoSimpleAndExit($url, 'listate');
			}
			else
			{
				$this->view->errors = $errors;		
			}
		
		}
		else
		{
			$table = new DbTable_KNdbate();
			$atedata = $table->getItems($ateid);
		}
		
		if (!empty($atedata)){
			
			if (!$atedata['SINFOBEL'] == '')
			{
				$atedata['SINFOBEL'] = strtr($atedata['SINFOBEL'], ".",",");
			}
			
	
			if (!$atedata['SINFORUS'] == '')
			{	   
				$atedata['SINFORUS'] = strtr($atedata['SINFORUS'], ".",",");
			}
					
			if (!$atedata['KOD_ATE']=='')
			{
			
				$table = new DbTable_KNhpopular();
				$result = $table->getItemsATE($atedata['KOD_ATE']);
				$atedata['HPOPULAR']= $result;
				
				$table = new DbTable_KNhchangeate();
				$result = $table->getItemsATE($atedata['KOD_ATE']);
				$atedata['HCHANGE']= $result;
				
				$table = new DbTable_KNatedrnamebel();
				$result = $table->getItemsATE($atedata['KOD_ATE']);
				$atedata['DRTNAMEBEL']= $result;
				
				$table = new DbTable_KNatedrnamerus();
				$result = $table->getItemsATE($atedata['KOD_ATE']);
				$atedata['DRTNAMERUS']= $result;
			
			}
		
		}
		
		$this->view->atedata = $atedata;
		$this->view->id = $ateid;		
			
	}
	
	public function delateAction() 
	{		
		$ateId = $this->_getParam('ateId');
		$table = new DbTable_KNdbate();
		$table->delete('"ID"='.$ateId);
		$this->getHelper('Redirector')->gotoSimpleAndExit($url, 'listate');
	}
	
	public function reportsateAction()  
	{		
		$table = new DbTable_KNobl();
		$KN_obl = $table->getItems();
		$this->view->KN_obl = $KN_obl;

		$table = new DbTable_KNra();
		$KN_ra = $table->getItems();
		$this->view->KN_ra = $KN_ra;
		
		$table = new DbTable_KNdbate;
		$KN_sovet = $table->getCouncils();
		$this->view->KN_sovet = $KN_sovet;
	}
	
	public function viewreportateAction()  
	{
		if(isset($_POST['zapros']))
		{
			
			$zapros = array(
				'obl' => $this->_request->getPost('obl'),
				'ra' => $this->_request->getPost('ra'),
				'sovet' => $this->_request->getPost('sovet'),
				'existence' => $this->_request->getPost('existence'),
				'report' => intval($this->_request->getPost('report')),
			);

			if ($zapros['obl'])
			{
				$table = new DbTable_KNobl();
				$KN_obl = $table->getItems(intval($zapros['obl']));
				$this->view->obl =  mb_strtoupper($KN_obl['OBL'].' область', 'UTF-8');
			}
			
			if ($zapros['ra'])
			{
				$table = new DbTable_KNra();
				$KN_ra = $table->getItems(intval($zapros['ra']));
				$this->view->ra = $KN_ra['RA'].' район';
			}
			
			if ($zapros['sovet'])
			{
				$table = new DbTable_KNdbate();
				$KN_sovet = $table->getCouncils((real)$zapros['sovet']);
				$this->view->sovet = ($KN_sovet['NAMERUS'].' '.$KN_sovet['RATECUT'].' Административный центр - '.$KN_sovet['ADMINCENTE']);
			}
			
			$table = new DbTable_KNdbate();
			
			switch($zapros['report']) {
			
				case '1':
					$title['top'] = 'Сельсоветы и их центры (рус.яз)';
					$title['doc'] = 'Сельсоветы и их центры';
					unset($this->view->sovet);
					$zapros['sovet'] = '';
					$report = $table->getlistcouncils($zapros);
					$i=0;
					if (!empty($report))
					{
						foreach($report as $item)
						{
							$kol = $table->getcountlocations($item['SOATO']);
							$report[$i]['KOL'] = $kol['KOL'];
							$i++;
						}
					}
					
					break;
				
				case '2':
					$title['top'] = 'Сельские населенные пункты по сельсоветам (рус. и бел. яз.,номенклатура, кол-во жителей)';
					$title['doc'] = 'Сельские населенные пункты по сельсоветам';
					$report = $table->getlistlocations($zapros);
					break;
				
				case '3':
					$title['top'] = 'Сельские населенные пункты по сельсоветам (рус. и бел. яз.) с источниками';
					$title['doc'] = 'Сельские населенные пункты по сельсоветам';
					$report = $table->getlistlocations($zapros);
					break;
				
				case '4':
					$title['top'] = 'Сельсоветы (рус. и бел. яз.) и их центры';
					$title['doc'] = 'Сельсоветы и их центры';
					unset($this->view->sovet);
					$zapros['sovet'] = '';
					$report = $table->getlistcouncils($zapros);
					$i=0;
					if (!empty($report))
					{
						foreach($report as $item)
						{
							$kol = $table->getcountlocations($item['SOATO']);
							$report[$i]['KOL'] = $kol['KOL'];
							$i++;
						}
					}
					
					break;
				
				case '5':
					$title['top'] = 'Список расхождений в написании наименований';
					$title['doc'] = 'Список расхождений в написании наименованийВ';
					$report = $table->getlistdifference($zapros);
					break;
				
				case '6':
					$title['top'] = 'Сельские населенные пункты по сельсоветам (рус. и бел. яз.)';
					$title['doc'] = 'Сельские населенные пункты по сельсоветам';
					$report = $table->getlistlocations($zapros);
					break;
				
				case '7':
					$title['top'] = 'Алфавитный список населенных пунктов с номенклатурами';
					$title['doc'] = 'Алфавитный список населенных пунктов с номенклатурами';
					unset($this->view->sovet);
					$zapros['sovet'] = '';
					$report = $table->getlistsettlements($zapros);
					break;
				
				default:
					$this->getHelper('Redirector')->gotoSimpleAndExit('reportsate', 'admin');
			
			}
			
			$this->view->title = $title;
			$this->view->report_type = $zapros['report'];
			$this->view->report = $report;
			$this->view->zapros = $zapros;				
				
//			echo("<pre>"); 
//			print_r($zapros);
//			print_r($report);
	
		}
		else
		{
			$this->getHelper('Redirector')->gotoSimpleAndExit('reportsfgo', 'admin');
		}		

	}

	public function exportreportateAction() 
	{		
		if(isset($_POST['zapros']))
		{
			
			$zapros = array(
				'obl' => $this->_request->getPost('obl'),
				'ra' => $this->_request->getPost('ra'),
				'sovet' => $this->_request->getPost('sovet'),
				'existence' => $this->_request->getPost('existence'),
				'report' => intval($this->_request->getPost('report')),
			);
			
			$this->_helper->layout()->disableLayout();			
			require_once '../library/App/Util/Exel/Classes/PHPExcel.php';
			
			$table = new DbTable_KNdbate();
			
			switch($zapros['report']) {
			
				case '1':
					$zapros['sovet'] = '';
					$report = $table->getlistcouncils($zapros);
					$i=0;
					if (!empty($report))
					{
						foreach($report as $item)
						{
							$kol = $table->getcountlocations($item['SOATO']);
							$report[$i]['KOL'] = $kol['KOL'];
							$i++;
						}
					}
						
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Название совета')
								->setCellValue('B1', 'Административный центр')
								->setCellValue('C1', 'Кол-во н.п.')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['NAMERUS'].' '.$item['RATECUT'])
								->setCellValue('B'.$x, $item['ADMINCENTE'])
								->setCellValue('C'.$x, $item['KOL'])
								;
											
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '2':
					$report = $table->getlistlocations($zapros);	
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Тип')
								->setCellValue('B1', 'Название (Рус.)')
								->setCellValue('C1', 'Название (Бел.)')
								->setCellValue('D1', 'Название совета')
								->setCellValue('E1', 'Номенклатура')
								->setCellValue('F1', 'Кол-во жителей')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['RATECUT'])
								->setCellValue('B'.$x, $item['NAMERUS'])
								->setCellValue('C'.$x, $item['NAMEBEL'])
								->setCellValue('D'.$x, $item['SOVET'])
								->setCellValue('E'.$x, $item['NOMENKLAT'])
								->setCellValue('F'.$x, $item['POPULAR'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '3':
					$report = $table->getlistlocations($zapros);
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Тип')
								->setCellValue('B1', 'Название (Рус.)')
								->setCellValue('C1', 'Источник (Рус.)')
								->setCellValue('D1', 'Название (Бел.)')
								->setCellValue('E1', 'Источник (Бел.)')
								->setCellValue('F1', 'Название совета')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['RATECUT'])
								->setCellValue('B'.$x, $item['NAMERUS'])
								->setCellValue('C'.$x, $item['SINFORUS'])
								->setCellValue('D'.$x, $item['NAMEBEL'])
								->setCellValue('E'.$x, $item['SINFOBEL'])
								->setCellValue('F'.$x, $item['SOVET'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '4':
					$zapros['sovet'] = '';
					$report = $table->getlistcouncils($zapros);
					$i=0;
					if (!empty($report))
					{
						foreach($report as $item)
						{
							$kol = $table->getcountlocations($item['SOATO']);
							$report[$i]['KOL'] = $kol['KOL'];
							$i++;
						}
					}
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Название совета (Рус.)')
								->setCellValue('B1', 'Название совета (Бел.)')
								->setCellValue('C1', 'Административный центр')
								->setCellValue('D1', 'Кол-во н.п.')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['NAMERUS'])
								->setCellValue('B'.$x, $item['NAMEBEL'])
								->setCellValue('C'.$x, $item['ADMINCENTE'])
								->setCellValue('D'.$x, $item['KOL'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '5':
					$report = $table->getlistdifference($zapros);
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Название АТЕ')
								->setCellValue('B1', 'Название (Рус.)')
								->setCellValue('C1', 'Название (Бел.)')
								->setCellValue('D1', 'Название совета')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['ATENAME'])
								->setCellValue('B'.$x, $item['NAMERUS'])
								->setCellValue('C'.$x, $item['NAMEBEL'])
								->setCellValue('D'.$x, $item['SOVET'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '6':
					$report = $table->getlistlocations($zapros);
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Тип')
								->setCellValue('B1', 'Название (Рус.)')
								->setCellValue('C1', 'Название (Бел.)')
								->setCellValue('D1', 'Название совета')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['RATECUT'])
								->setCellValue('B'.$x, $item['NAMERUS'])
								->setCellValue('C'.$x, $item['NAMEBEL'])
								->setCellValue('D'.$x, $item['SOVET'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				case '7':
					$zapros['sovet'] = '';
					$report = $table->getlistsettlements($zapros);
					
					$objPHPExcel = new PHPExcel();
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('A1', 'Тип')
								->setCellValue('B1', 'Название (Рус.)')
								->setCellValue('C1', 'Название совета')
								->setCellValue('D1', 'Номенклатура')
								;
								
					$x = 1;
					foreach($report as $item)
					{
						$x++;			
						$objPHPExcel->setActiveSheetIndex(0)			
								->setCellValue('A'.$x, $item['RATECUT'])
								->setCellValue('B'.$x, $item['NAMERUS'])
								->setCellValue('C'.$x, $item['SOVET'])
								->setCellValue('D'.$x, $item['NOMENKLAT'])
								;			
					}
					
					$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
					
					break;
				
				default:
					$this->getHelper('Redirector')->gotoSimpleAndExit('reportsate', 'admin');
			
			}
			
			$objPHPExcel->getActiveSheet()->setTitle('ГОСКАРТГЕОЦЕНТР');
			$objPHPExcel->setActiveSheetIndex(0);			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="ГОСКАРТГЕОЦЕНТР.xls"');
			header('Cache-Control: max-age=0');		
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		
		}
	
	}

}