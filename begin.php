<?php

error_reporting(E_ERROR | E_PARSE);

//ini_set('session.gc_maxlifetime', 172800);
//ini_set('session.cookie_lifetime', 172800);

$tlyaz = new \NumberFormatter("tr-TR", \NumberFormatter::CURRENCY);

class myFunctions
{  

	public $path		= "localhost";
    var $dbHost			= "localhost";
    var $dbName			= "eksparcomtr_motobike";
    var $dbUserName		= "root";
  //  var $dbUserName		= "eksparcomtr_motobike";
  //  var $dbPassword		= "4[MTYFKm!bQs";
    var $dbPassword		= "";
	var $dbCharSet		= "utf8";
	
 

	
	public function __construct($session = false){
		try
		{
			$this->db = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=".$this->dbCharSet, $this->dbUserName, $this->dbPassword);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			
			
	   if($session){
				$this->sessionKontrol();
			}
		}
		
		
		catch (PDOException $e)
		{
		  die("Connection failure:<br /><br />" . $e->getMessage());
		}
	}
	
 
	
 
	public function query($sql, $params = null){
		
		
		
		try {
		
		//$lastId = $func->db->lastInsertId(); last id unutma, gerektigi sayfada kullanmak icin burada degil
		
		$query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$query->execute($params);
		return $query;
		
		} catch (PDOException $e) {
     // $error = "Error!: " . $e->getMessage() . "<br/>";
       die("Hatali:<br /><br />" . $e->getMessage());
      //echo $error;
    //die();
}
		
		
	}
	public function __destruct(){
		$this->db = null;
	}
}


$func		= new myFunctions;

