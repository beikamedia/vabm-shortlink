<?php

/* 
*
*	VA BeikaMedia
*	lib - Object MySQL Lib
*	---------------------------------------
*
*	Copyright (c) 2010 - 2016 BeikaMedia (dennis kelich-akashia)
*	Software Lizenz: http://de.beikamedia.info/mit/
*
*	Version: 2.1.0.a
*
*/

class mysql{

	// --------------- attr -------------------------------------------------
		public $connectedInstans;

	// --------------- methods ----------------------------------------------

	public function setDbInstans($instance){
		$state = true;
		$this->connectedInstans = $instance;
		return $state;

	} // end of function

	public function getDbInstans(){
		return $this->connectedInstans;

	} // end of function

	/*
	 *	BM - connect
	 *	=============================
	 *	description: datenbank verbindung aufbauen
	 *	Parameter: 1= "ServerAddresse" 2= "benutzer" 3= "passwort" 4= "datenbank name"
	 *	Return: true/false (verbindung erfolgreich oder nicht)
	 *	Version: 1.0.3.g
	 *	Autor: VA / BeikaMedia
	 *
	 */
	public function Connect($server, $user, $passwort, $database){
		$connect = false;
		/*if(@mysql_connect($server, $user, $passwort)){
			if($this->GoToDatabase($database) == true){
				$connect = true;
			}
		}*/

		$this->connectedInstans = @mysql_connect($server, $user, $passwort);
		if($this->connectedInstans){
			if($this->GoToDatabase($database, $this->connectedInstans) == true){
				$connect = true;
				$this->setDbInstans($this->connectedInstans);
			}			
		}
		return $connect;

	} // end of function

	/*
	 *	BM - GoToDatabase
	 *	=============================
	 *	description: datenbank auswahl
	 *	Parameter: 1= "datenbank name"
	 *	Return: true/false (auswahl erfolgreich oder nicht)	 
	 *	Version: 1.2.3.g
	 *	Autor: VA / BeikaMedia
	 *
	 */
	public function GoToDatabase($database, $link){
		$goDatabase = false;
		if(mysql_select_db($database, $link)){
				$goDatabase = true;
		}
		return $goDatabase;
	} // end of function

	public function DatabaseSwitch($database){
		$goDatabase = false;
		//print_r($database);
		if(mysql_select_db($database, $this->connectedInstans)){
			//print_r($database);
				$goDatabase = true;
		}
		return $goDatabase;
	} // end of function

	/*
	 *	BM - SelectToArray
	 *	=============================
	 *	description: datenbank abfrage  + ergebnis umwandlung in ein array
	 *	Parameter: 1= "SQL Abfrage String"
	 *	Return: Array mit dem Datenbank Abfrage Ergebnis. im fehler fall wird ein leeres array zurück geliefert  
	 *	Version: 2.0.3.g
	 *	Autor: VA / BeikaMedia
	 *
	 */
	public function SelectToArray($sql){
		$query = mysql_query($sql, $this->connectedInstans);
		if($query){
			if(mysql_num_rows($query) > 0){
				while($datensatz = mysql_fetch_assoc($query)){
					$ausgabe[] = $datensatz;
				} // end of while
			} // end of if
			else{
				$ausgabe = array(0);	
			}//
		}
		else{
			$ausgabe = array(0);	
		}
		return $ausgabe;
	} // end of function

	public function SelectToObjekt($sql){
		if($query = mysql_query($sql)){
			while($datensatz = mysql_fetch_assoc($query)){
				$ausgabe[] = $datensatz;
			}
		}else{
			$ausgabe = array();	
		}
		return $ausgabe;
	} // end of function

	public function SelectNumRows($sql){
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		return $num;
	} // end of function

	public function Insert($sql){
		mysql_query($insert);
		if(mysql_affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	} // end of function

	public function Update($sql){
		mysql_query($sql);
		if(mysql_affected_rows() > 0){
			return true;
		}else{
			return false;	
		}

	} // end of function

	public function Delete($sql){
		mysql_query($sql);
		if(mysql_affected_rows() > 0){
			return true;
		}else{
			return false;	
		}
	} // end of function

} // end of class

?>