<?php

$ip = $_SERVER['REMOTE_ADDR'] ;

/* Set your API key this is a fake example :) */
$api= "4f8276bd1b70776600534eb1c638e58535a7646387de96e715fa307fc392d135" ;  
//$apiurl = "http://api.ipinfodb.com/v3/ip-city/?key=$api&ip=$ip" ; 
$apiurl='';

/* Prepare connection to ipinfodb.com and parse results into varibles  */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$apiurl");
/**
* Ask cURL to return the contents in a variable
* instead of simply echoing them to the browser.
*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
/**
* Execute the cURL session
*/
$contents = curl_exec ($ch);
/**
* Close cURL session
*/
curl_close ($ch);
//print_r($contents);
$pieces = explode(";", $contents) ;
$country = $pieces['4'] ;
$city = $pieces['6'] ;
$city2 = $pieces['5'] ;
$date = date("Y-m-d") ;
$time = date("H:i:s") ;
$ip = $_SERVER['REMOTE_ADDR'] ;
$query_string = $_SERVER['QUERY_STRING'] ;
$http_referer = isset( $_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "no referer" ;
$http_user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "no User-agent" ;
$web_page = $_SERVER['SCRIPT_NAME'] ;
$isbot = is_Bot() ? '1' : '0' ;


/* Conect to the database --- set your credentials  ---  */
//$connection = new mysqli("localhost", "root", "", "test");
/* check connection */
/*if (mysqli_connect_errno()) {
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
		}*/

/* Insert data into mysql - table  */

$arrayField=array('country','city','date','time','ip','web_page','query_string','http_referer','http_user_agent','is_bot');
$arrayValue=array($country,$city,$date,$time,$ip,$web_page,$query_string,$http_referer,$http_user_agent,$isbot);
$res=$db->valInsert('visitor_tracker',$arrayField,$arrayValue);
/*
mysql_query("INSERT INTO  `visitor_tracker` (`country` ,`city`,`date` ,`time`,`ip` ,`web_page` ,`query_string` ,`http_referer` ,`http_user_agent` ,`is_bot`) VALUES ('$country','$city',  '$date', '$time', '$ip', '$web_page',  '$query_string', '$http_referer', '$http_user_agent','$isbot'
)") ;*/
/* close DB-connection */
//mysql_close($connection) ;


/* Remove this line on production pages */
//echo "Your IP is :" . $ip  . "and database is updated " ;


/* Detect if visitor is a "bot" */
function is_bot() {
$botlist = getBotList() ;
foreach($botlist as $bot) {
if(strpos($_SERVER['HTTP_USER_AGENT'] , $bot) !== false)
return true ;
	}
return false ;
	}//end function is_bot

	
/* Parse the robotId.txt file into an array */
function getBotList(){
if (($handle = fopen("robotid.txt", "r")) !== FALSE) {
$count= 1 ;
$bots = array() ;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {	
	if (strchr($data[0] , "robot-id:")) {
	//echo $count ." $data[0]"."<br>"; // for debuging
	$botId = substr("$data[0]", 9) . "<br>" ;
	array_push($bots, "$botId") ;
	$count++ ;		
	}
	}    
fclose($handle);
return $bots ;
	}
	} // end function getBotList

?>