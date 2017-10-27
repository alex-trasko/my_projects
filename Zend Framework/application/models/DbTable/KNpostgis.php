<?php
class DbTable_KNpostgis extends Zend_Db_Table_Abstract 
{   
	function searchAll($xy)
	{
		$dbh = pg_connect("host=******** port=**** dbname=**** user=**** password=********");
		$sql = "SELECT * FROM lists_100000 WHERE ST_Contains(the_geom, ST_GeomFromText('POINT(".$xy.")', 32635))";
		$result = pg_query($dbh, $sql);
		return pg_fetch_row($result);
	//	while($line = pg_fetch_array($result))
	//		$mass[] = $line;		
	//	return $mass;
	}
}