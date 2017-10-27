<?php
class DbTable_KNsuggest
{    
    
	public function getSuggest($table,$field,$word) 
	{

        $connect = pg_connect("host=localhost port=**** dbname=**** user=**** password=********");

		if($table)
		{
			
			$query = "SELECT DISTINCT ".'"'.$field.'"'." FROM ".'"'.$table.'"'." WHERE ".'"'.$field.'"'."  ILIKE('".$word."%') ORDER BY ".'"'.$field.'"';	
			$result = pg_query($connect, $query);
			
			while ($row = pg_fetch_array($result)) 
			{
				$mass[] = $row[$field];
			}			
			
		}
		
		pg_close($connect);
		
		return (isset ($mass))? $mass : null;
		
    }
	
	
}
	
