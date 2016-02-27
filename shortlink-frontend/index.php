<?php

/* 
*
*	VA BeikaMedia
*	Basic - Main Index
*	---------------------------------------
* 
*	Copyright (c) 2010 - 2016 BeikaMedia (dennis kelich-akashia)
*	Software Lizenz: http://de.beikamedia.info/mit/
*
*
*/
// ------------- Import ------------------------------------------------------------------------------------------------------------------
	include("./addons/system/va-config/main.php");			// globale config
	include("./addons/system/va-lib/mysql_lib.php");		// mySQL object lib
	include("./addons/system/va-config/db_ta_da.php");		// datenbank zugang
	include("./addons/system/va-lib/funktionen.php");		// seiten basis functionen
// ------------- db-query ----------------------------------------------------------------------------------------------------------------		
	// abfrage ob eine id page mitgegeben wurde
	if(isset($_GET['page']) and $_GET['page'] != ''){
		mysql_query("SET names 'utf8'");
		$pageBaseInfoArray = $dbService->SelectToArray("SELECT bm_url.*, bm_domains.* FROM bm_domains JOIN bm_url ON bm_domains.d_id = bm_url.u_domain WHERE bm_url.u_hash = '".sqlinjection_filter($_GET['page'])."' LIMIT 1");
		if($pageBaseInfoArray[0] != ""){
			$basicUrl = "http://".$pageBaseInfoArray[0]['d_name']."".$pageBaseInfoArray[0]['u_get'];
			print_r("bitte warten...");
			redirect($basicUrl);
			exit;
		} // end of if
		else{
			print_r("Not Found");
			exit;
		} // end of else	
	} // end of
	else{
		print_r("Not Found");
		exit;
	} // end of else

?>