<?php 




include 'config.php';

class database {


	public $database_host = HOST;
	public $database_user = USER;
	public $database_password = PASSWORD;
	public $database_databasename = DBNAME;


	public $link;
	public $error;

	public function __construct(){


		$this->databaseconnection();


	}

	private function databaseconnection(){

		$this->link = new mysqli($this->database_host,$this->database_user,$this->database_password,$this->database_databasename);


		if (!$this->link) {
			
			$this->error="connect faild";

			echo $this->error;
			exit();

		}else{

			//echo "success";

		}

	}


	public function read($x){

		$result = $this->link->query($x);


		if ($result->num_rows > 0) {
			
			return $result;
		}else{

			return false;


		}

	}




	public function insert($x){

		$result = $this->link->query($x);

		if($result){

			return $result;

		} else{


			return false;
		}

	}







public function validate($x){

      $X = trim($x);
      $x = stripslashes($x);
      $x = htmlspecialchars($x); 
      return $x;

}




	public function delete($x){

		$result = $this->link->query($x);

		if ($result) {
			
			return $result;
		}else{

			return false;

		}


	}




		public function edit($x){

		$result = $this->link->query($x);

		if ($result) {
			
			return $result;
		}else{

			return false;

		}


	}



public function shortText($t,$l=50){

		$t = substr($t,0,$l);

		$t = $t."....";
		return $t;
}


public function selectTable($t,$c ='c',$l= 2){

	if ($c == 'c' && $l == 2) {

		$x = "SELECT * FROM $t";

	}else{

		$x = "SELECT * FROM $t WHERE cat= '$c' or id= '$c' limit $l";

	}


	$x = $this->read($x);

	if ($x) {
		
		//$y = $x->fetch_assoc();

		return $x;
	}


	
}








}










 ?>