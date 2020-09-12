<?php

class database
{
	
	protected $host = 'localhost';
    protected $dbname = 'store_locator';
    protected $user = 'root';
    protected $password = '';

	public function db_connect(){		
		$link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        return $link;;		
    }
    
    public function closeDbConnection(&$link)
    {
        $link = null;
    }


}

?>
