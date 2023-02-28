<?php
Class Action 
{
	private $db;

	public function __construct() {
		ob_start();
        include 'db_connect.php';
        $this->db = $conn;
	}
    
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function addcustom()
	{
		extract($_POST);
		$uniqueid = time();
		$_SESSION['customuid'] = $uniqueid;
        $qry = $this->db->query("INSERT INTO customorder(userid,uniqueid, tcolor, bcolor, neckline, sleeve, bottom,size,amount, status) VALUES ('$user_id','$uniqueid','$tcolor','$bcolor','$neckline','$sleeve','$bottom','$size','$amount','1')");
        return $qry;

    }
    
}
