<?php

/*  
*
*	VA BeikaMedia - functions lib
*	-------------------------------
*
*	Copyright (c) 2010 - 2016 BeikaMedia (dennis kelich-akashia)
*	Software Lizenz: http://de.beikamedia.info/mit/
*
*	Version: 1.0.0
*
*/

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
} // end of function

function sqlinjection_filter($tmp_text){
	$tmp_text = preg_replace("/\<(.*)\>(.*)\<\/(.*)\>/Usi", "", $tmp_text);
	$tmp_text = preg_replace("/\;/Usi", "\;", $tmp_text);
	$tmp_text = preg_replace("/\"/Usi", "\"", $tmp_text);
	$tmp_text = preg_replace("/\~/Usi", "\~", $tmp_text);
	$tmp_text = preg_replace("/\'/Usi", "\'", $tmp_text);
	$tmp_text = preg_replace("/\./Usi", "\.", $tmp_text);

	return ($tmp_text);
}


?>