<?php

class database_connection
{
	
	protected $host = 'localhost';
    protected $dbname = 'store_locator';
    protected $user = 'root';
    protected $password = '';

	 function db_connect(){		
		$link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        return $link;;		
    }
    
     function closeDbConnection(&$link)
    {
        $link = null;
    }


}

?>
