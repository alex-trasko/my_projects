<?php


$router = new Zend_Controller_Router_Rewrite();

$router->addRoute('searchkn',
     new Zend_Controller_Router_Route('searchkn', array('controller' => 'index', 'action' => 'searchkn'))
);

$router->addRoute('searchate',
     new Zend_Controller_Router_Route('searchate', array('controller' => 'index', 'action' => 'searchate'))
);
$router->addRoute('searchfgo',
     new Zend_Controller_Router_Route('searchfgo', array('controller' => 'index', 'action' => 'searchfgo'))
);
$router->addRoute('searchrw',
     new Zend_Controller_Router_Route('searchrw', array('controller' => 'index', 'action' => 'searchrw'))
);
$router->addRoute('searchair',
     new Zend_Controller_Router_Route('searchair', array('controller' => 'index', 'action' => 'searchair'))
);

$router->addRoute('viewate',
     new Zend_Controller_Router_Route('viewate/:ateId', array('controller' => 'index', 'action' => 'viewate'))
);
$router->addRoute('viewfgo',
     new Zend_Controller_Router_Route('viewfgo/:fgoId', array('controller' => 'index', 'action' => 'viewfgo'))
);
$router->addRoute('viewrw',
     new Zend_Controller_Router_Route('viewrw/:rwId', array('controller' => 'index', 'action' => 'viewrw'))
);
$router->addRoute('viewair',
     new Zend_Controller_Router_Route('viewair/:airId', array('controller' => 'index', 'action' => 'viewair'))
);

$router->addRoute('suggest',
     new Zend_Controller_Router_Route('suggest', array('controller' => 'index', 'action' => 'suggest'))
);

$router->addRoute('selectrasearchate',
     new Zend_Controller_Router_Route('selectrasearchate', array('controller' => 'index', 'action' => 'selectrasearchate'))
);
$router->addRoute('selectrasearch',
     new Zend_Controller_Router_Route('selectrasearch', array('controller' => 'index', 'action' => 'selectrasearch'))
);
$router->addRoute('selectsovetsearch',
     new Zend_Controller_Router_Route('selectsovetsearch', array('controller' => 'index', 'action' => 'selectsovetsearch'))
);

$router->addRoute('listkn',
     new Zend_Controller_Router_Route('listkn', array('controller' => 'admin', 'action' => 'listkn'))
);
$router->addRoute('listate',
     new Zend_Controller_Router_Route('listate', array('controller' => 'admin', 'action' => 'listate'))
);
$router->addRoute('listfgo',
     new Zend_Controller_Router_Route('listfgo', array('controller' => 'admin', 'action' => 'listfgo'))
);
$router->addRoute('listrw',
     new Zend_Controller_Router_Route('listrw', array('controller' => 'admin', 'action' => 'listrw'))
);
$router->addRoute('listair',
     new Zend_Controller_Router_Route('listair', array('controller' => 'admin', 'action' => 'listair'))
);

$router->addRoute('editate',
     new Zend_Controller_Router_Route('editate/:ateId', array('controller' => 'admin', 'action' => 'editate'))
);
$router->addRoute('editfgo',
     new Zend_Controller_Router_Route('editfgo/:fgoId', array('controller' => 'admin', 'action' => 'editfgo'))
);
$router->addRoute('editrw',
     new Zend_Controller_Router_Route('editrw/:rwId', array('controller' => 'admin', 'action' => 'editrw'))
);
$router->addRoute('editair',
     new Zend_Controller_Router_Route('editair/:airId', array('controller' => 'admin', 'action' => 'editair'))
);

$router->addRoute('delate',
     new Zend_Controller_Router_Route('delate/:ateId', array('controller' => 'admin', 'action' => 'delate'))
);
$router->addRoute('delfgo',
     new Zend_Controller_Router_Route('delfgo/:fgoId', array('controller' => 'admin', 'action' => 'delfgo'))
);
$router->addRoute('delrw',
     new Zend_Controller_Router_Route('delrw/:rwId', array('controller' => 'admin', 'action' => 'delrw'))
);
$router->addRoute('delair',
     new Zend_Controller_Router_Route('delair/:airId', array('controller' => 'admin', 'action' => 'delair'))
);

$router->addRoute('importate',
     new Zend_Controller_Router_Route('importate', array('controller' => 'admin', 'action' => 'importate'))
);
$router->addRoute('importfgo',
     new Zend_Controller_Router_Route('importfgo', array('controller' => 'admin', 'action' => 'importfgo'))
);
$router->addRoute('importair',
     new Zend_Controller_Router_Route('importair', array('controller' => 'admin', 'action' => 'importair'))
);
$router->addRoute('importrw',
     new Zend_Controller_Router_Route('importrw', array('controller' => 'admin', 'action' => 'importrw'))
);
$router->addRoute('exportate',
     new Zend_Controller_Router_Route('exportate', array('controller' => 'admin', 'action' => 'exportate'))
);
$router->addRoute('exportfgo',
     new Zend_Controller_Router_Route('exportfgo', array('controller' => 'admin', 'action' => 'exportfgo'))
);
$router->addRoute('exportair',
     new Zend_Controller_Router_Route('exportair', array('controller' => 'admin', 'action' => 'exportair'))
);
$router->addRoute('exportrw',
     new Zend_Controller_Router_Route('exportrw', array('controller' => 'admin', 'action' => 'exportrw'))
);

$router->addRoute('listobl',
     new Zend_Controller_Router_Route('listobl', array('controller' => 'admin', 'action' => 'listobl'))
);
$router->addRoute('listra',
     new Zend_Controller_Router_Route('listra', array('controller' => 'admin', 'action' => 'listra'))
);
$router->addRoute('listrodate',
     new Zend_Controller_Router_Route('listrodate', array('controller' => 'admin', 'action' => 'listrodate'))
);
$router->addRoute('listrodfgo',
     new Zend_Controller_Router_Route('listrodfgo', array('controller' => 'admin', 'action' => 'listrodfgo'))
);
$router->addRoute('listatevalue',
     new Zend_Controller_Router_Route('listatevalue', array('controller' => 'admin', 'action' => 'listatevalue'))
);
$router->addRoute('listsinfo',
     new Zend_Controller_Router_Route('listsinfo', array('controller' => 'admin', 'action' => 'listsinfo'))
);
$router->addRoute('listhpopular',
     new Zend_Controller_Router_Route('listhpopular', array('controller' => 'admin', 'action' => 'listhpopular'))
);
$router->addRoute('listatedrnamebel',
     new Zend_Controller_Router_Route('listatedrnamebel', array('controller' => 'admin', 'action' => 'listatedrnamebel'))
);
$router->addRoute('listatedrnamerus',
     new Zend_Controller_Router_Route('listatedrnamerus', array('controller' => 'admin', 'action' => 'listatedrnamerus'))
);
$router->addRoute('listfgodrtnamebel',
     new Zend_Controller_Router_Route('listfgodrtnamebel', array('controller' => 'admin', 'action' => 'listfgodrtnamebel'))
);
$router->addRoute('listfgodrtnamerus',
     new Zend_Controller_Router_Route('listfgodrtnamerus', array('controller' => 'admin', 'action' => 'listfgodrtnamerus'))
);
$router->addRoute('listhchangeate',
     new Zend_Controller_Router_Route('listhchangeate', array('controller' => 'admin', 'action' => 'listhchangeate'))
);
$router->addRoute('listhchangefgo',
     new Zend_Controller_Router_Route('listhchangefgo', array('controller' => 'admin', 'action' => 'listhchangefgo'))
);
$router->addRoute('listhchangeair',
     new Zend_Controller_Router_Route('listhchangeair', array('controller' => 'admin', 'action' => 'listhchangeair'))
);
$router->addRoute('listhchangerw',
     new Zend_Controller_Router_Route('listhchangerw', array('controller' => 'admin', 'action' => 'listhchangerw'))
);
$router->addRoute('listcategory',
     new Zend_Controller_Router_Route('listcategory', array('controller' => 'admin', 'action' => 'listcategory'))
);
$router->addRoute('listnod',
     new Zend_Controller_Router_Route('listnod', array('controller' => 'admin', 'action' => 'listnod'))
);

$router->addRoute('editobl',
     new Zend_Controller_Router_Route('editobl/:oid', array('controller' => 'admin', 'action' => 'editobl'))
);
$router->addRoute('editra',
     new Zend_Controller_Router_Route('editra/:oid', array('controller' => 'admin', 'action' => 'editra'))
);
$router->addRoute('editrodate',
     new Zend_Controller_Router_Route('editrodate/:oid', array('controller' => 'admin', 'action' => 'editrodate'))
);
$router->addRoute('editrodfgo',
     new Zend_Controller_Router_Route('editrodfgo/:oid', array('controller' => 'admin', 'action' => 'editrodfgo'))
);
$router->addRoute('editatevalue',
     new Zend_Controller_Router_Route('editatevalue/:oid', array('controller' => 'admin', 'action' => 'editatevalue'))
);
$router->addRoute('editsinfo',
     new Zend_Controller_Router_Route('editsinfo/:oid', array('controller' => 'admin', 'action' => 'editsinfo'))
);
$router->addRoute('edithpopular',
     new Zend_Controller_Router_Route('edithpopular/:oid', array('controller' => 'admin', 'action' => 'edithpopular'))
);
$router->addRoute('editatedrnamebel',
     new Zend_Controller_Router_Route('editatedrnamebel/:oid', array('controller' => 'admin', 'action' => 'editatedrnamebel'))
);
$router->addRoute('editatedrnamerus',
     new Zend_Controller_Router_Route('editatedrnamerus/:oid', array('controller' => 'admin', 'action' => 'editatedrnamerus'))
);
$router->addRoute('editfgodrtnamebel',
     new Zend_Controller_Router_Route('editfgodrtnamebel/:oid', array('controller' => 'admin', 'action' => 'editfgodrtnamebel'))
);
$router->addRoute('editfgodrtnamerus',
     new Zend_Controller_Router_Route('editfgodrtnamerus/:oid', array('controller' => 'admin', 'action' => 'editfgodrtnamerus'))
);
$router->addRoute('edithchangeate',
     new Zend_Controller_Router_Route('edithchangeate/:oid', array('controller' => 'admin', 'action' => 'edithchangeate'))
);
$router->addRoute('edithchangefgo',
     new Zend_Controller_Router_Route('edithchangefgo/:oid', array('controller' => 'admin', 'action' => 'edithchangefgo'))
);
$router->addRoute('edithchangeair',
     new Zend_Controller_Router_Route('edithchangeair/:oid', array('controller' => 'admin', 'action' => 'edithchangeair'))
);
$router->addRoute('edithchangerw',
     new Zend_Controller_Router_Route('edithchangerw/:oid', array('controller' => 'admin', 'action' => 'edithchangerw'))
);
$router->addRoute('editcategory',
     new Zend_Controller_Router_Route('editcategory/:oid', array('controller' => 'admin', 'action' => 'editcategory'))
);
$router->addRoute('editnod',
     new Zend_Controller_Router_Route('editnod/:oid', array('controller' => 'admin', 'action' => 'editnod'))
);

$router->addRoute('delobl',
     new Zend_Controller_Router_Route('delobl/:oid', array('controller' => 'admin', 'action' => 'delobl'))
);
$router->addRoute('delra',
     new Zend_Controller_Router_Route('delra/:oid', array('controller' => 'admin', 'action' => 'delra'))
);
$router->addRoute('delrodate',
     new Zend_Controller_Router_Route('delrodate/:oid', array('controller' => 'admin', 'action' => 'delrodate'))
);
$router->addRoute('delrodfgo',
     new Zend_Controller_Router_Route('delrodfgo/:oid', array('controller' => 'admin', 'action' => 'delrodfgo'))
);
$router->addRoute('delatevalue',
     new Zend_Controller_Router_Route('delatevalue/:oid', array('controller' => 'admin', 'action' => 'delatevalue'))
);
$router->addRoute('delsinfo',
     new Zend_Controller_Router_Route('delsinfo/:oid', array('controller' => 'admin', 'action' => 'delsinfo'))
);
$router->addRoute('delhpopular',
     new Zend_Controller_Router_Route('delhpopular/:oid', array('controller' => 'admin', 'action' => 'delhpopular'))
);
$router->addRoute('delatedrnamebel',
     new Zend_Controller_Router_Route('delatedrnamebel/:oid', array('controller' => 'admin', 'action' => 'delatedrnamebel'))
);
$router->addRoute('delatedrnamerus',
     new Zend_Controller_Router_Route('delatedrnamerus/:oid', array('controller' => 'admin', 'action' => 'delatedrnamerus'))
);
$router->addRoute('delfgodrtnamebel',
     new Zend_Controller_Router_Route('delfgodrtnamebel/:oid', array('controller' => 'admin', 'action' => 'delfgodrtnamebel'))
);
$router->addRoute('delfgodrtnamerus',
     new Zend_Controller_Router_Route('delfgodrtnamerus/:oid', array('controller' => 'admin', 'action' => 'delfgodrtnamerus'))
);
$router->addRoute('delhchangeate',
     new Zend_Controller_Router_Route('delhchangeate/:oid', array('controller' => 'admin', 'action' => 'delhchangeate'))
);
$router->addRoute('delhchangefgo',
     new Zend_Controller_Router_Route('delhchangefgo/:oid', array('controller' => 'admin', 'action' => 'delhchangefgo'))
);
$router->addRoute('delhchangeair',
     new Zend_Controller_Router_Route('delhchangeair/:oid', array('controller' => 'admin', 'action' => 'delhchangeair'))
);
$router->addRoute('delhchangerw',
     new Zend_Controller_Router_Route('delhchangerw/:oid', array('controller' => 'admin', 'action' => 'delhchangerw'))
);
$router->addRoute('delcategory',
     new Zend_Controller_Router_Route('delcategory/:oid', array('controller' => 'admin', 'action' => 'delcategory'))
);
$router->addRoute('delnod',
     new Zend_Controller_Router_Route('delnod/:oid', array('controller' => 'admin', 'action' => 'delnod'))
);

$router->addRoute('reportsate',
     new Zend_Controller_Router_Route('reportsate', array('controller' => 'admin', 'action' => 'reportsate'))
);
$router->addRoute('reportsfgo',
     new Zend_Controller_Router_Route('reportsfgo', array('controller' => 'admin', 'action' => 'reportsfgo'))
);

$router->addRoute('viewreportate',
     new Zend_Controller_Router_Route('viewreportate', array('controller' => 'admin', 'action' => 'viewreportate'))
);
$router->addRoute('viewreportfgo',
     new Zend_Controller_Router_Route('viewreportfgo', array('controller' => 'admin', 'action' => 'viewreportfgo'))
);

$router->addRoute('selectraate',
     new Zend_Controller_Router_Route('selectraate', array('controller' => 'admin', 'action' => 'selectraate'))
);
$router->addRoute('selectra',
     new Zend_Controller_Router_Route('selectra', array('controller' => 'admin', 'action' => 'selectra'))
);
$router->addRoute('selectsovet',
     new Zend_Controller_Router_Route('selectsovet', array('controller' => 'admin', 'action' => 'selectsovet'))
);
$router->addRoute('getnomenklat',
     new Zend_Controller_Router_Route('getnomenklat', array('controller' => 'admin', 'action' => 'getnomenklat'))
);

$router->addRoute('atelisthpopular',
     new Zend_Controller_Router_Route('atelisthpopular', array('controller' => 'admin', 'action' => 'atelisthpopular'))
);
$router->addRoute('ateedithpopular',
     new Zend_Controller_Router_Route('ateedithpopular', array('controller' => 'admin', 'action' => 'ateedithpopular'))
);
$router->addRoute('atelistatedrtnamebel',
     new Zend_Controller_Router_Route('atelistatedrtnamebel', array('controller' => 'admin', 'action' => 'atelistatedrtnamebel'))
);
$router->addRoute('ateeditatedrtnamebel',
     new Zend_Controller_Router_Route('ateeditatedrtnamebel', array('controller' => 'admin', 'action' => 'ateeditatedrtnamebel'))
);
$router->addRoute('atelistatedrtnamerus',
     new Zend_Controller_Router_Route('atelistatedrtnamerus', array('controller' => 'admin', 'action' => 'atelistatedrtnamerus'))
);
$router->addRoute('ateeditatedrtnamerus',
     new Zend_Controller_Router_Route('ateeditatedrtnamerus', array('controller' => 'admin', 'action' => 'ateeditatedrtnamerus'))
);
$router->addRoute('atelisthchangeate',
     new Zend_Controller_Router_Route('atelisthchangeate', array('controller' => 'admin', 'action' => 'atelisthchangeate'))
);
$router->addRoute('ateedithchangeate',
     new Zend_Controller_Router_Route('ateedithchangeate', array('controller' => 'admin', 'action' => 'ateedithchangeate'))
);

$router->addRoute('fgolistfgodrtnamebel',
     new Zend_Controller_Router_Route('fgolistfgodrtnamebel', array('controller' => 'admin', 'action' => 'fgolistfgodrtnamebel'))
);
$router->addRoute('fgoeditfgodrtnamebel',
     new Zend_Controller_Router_Route('fgoeditfgodrtnamebel', array('controller' => 'admin', 'action' => 'fgoeditfgodrtnamebel'))
);
$router->addRoute('fgolistfgodrtnamerus',
     new Zend_Controller_Router_Route('fgolistfgodrtnamerus', array('controller' => 'admin', 'action' => 'fgolistfgodrtnamerus'))
);
$router->addRoute('fgoeditfgodrtnamerus',
     new Zend_Controller_Router_Route('fgoeditfgodrtnamerus', array('controller' => 'admin', 'action' => 'fgoeditfgodrtnamerus'))
);
$router->addRoute('fgolisthchangefgo',
     new Zend_Controller_Router_Route('fgolisthchangefgo', array('controller' => 'admin', 'action' => 'fgolisthchangefgo'))
);
$router->addRoute('fgoedithchangefgo',
     new Zend_Controller_Router_Route('fgoedithchangefgo', array('controller' => 'admin', 'action' => 'fgoedithchangefgo'))
);

$router->addRoute('airlisthchangeair',
     new Zend_Controller_Router_Route('airlisthchangeair', array('controller' => 'admin', 'action' => 'airlisthchangeair'))
);
$router->addRoute('airedithchangeair',
     new Zend_Controller_Router_Route('airedithchangeair', array('controller' => 'admin', 'action' => 'airedithchangeair'))
);

$router->addRoute('rwlisthchangerw',
     new Zend_Controller_Router_Route('rwlisthchangerw', array('controller' => 'admin', 'action' => 'rwlisthchangerw'))
);
$router->addRoute('rwedithchangerw',
     new Zend_Controller_Router_Route('rwedithchangerw', array('controller' => 'admin', 'action' => 'rwedithchangerw'))
);

$router->addRoute('exportreportate',
     new Zend_Controller_Router_Route('exportreportate', array('controller' => 'admin', 'action' => 'exportreportate'))
);
$router->addRoute('exportreportfgo',
     new Zend_Controller_Router_Route('exportreportfgo', array('controller' => 'admin', 'action' => 'exportreportfgo'))
);