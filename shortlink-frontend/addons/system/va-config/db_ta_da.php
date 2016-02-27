<?php

/* 
*
*	VA BeikaMedia 
*	Shorter - DB-TA-DA
*	------------------------------------------
*
* 	Beschreibung:	Datenbank Verbindungsscript
*					>>benötigt object mySQL-lib<<
*
*	Copyright (c) 2010 - 2016 BeikaMedia (dennis kelich-akashia)
*	Software Lizenz: http://de.beikamedia.info/mit/
*
*	Kodierung: UTF-8
*
*	beinhalten folgende ellemente:
*				- MySQL
*
*/		

// ---------- Main-Connect -----------------------------------------------------------------------------------------------------------------
	
	$dbService = new mysql;


	if($dbService->Connect("DB_SERVER_ADD", "DB_USER", "DB_PASS", "DB_NAME") == false){

		if($dbService->Connect("localhost", "root", "XXXXX", "bm_short") == false){
			echo"
				### Fehler 001: Datenbank Verbindung konnte nicht Hergestellt werden
			";
			exit;
		} // end of if
	} // end of if

	mysql_query("SET CHARACTER SET 'utf8'");	

								
?>