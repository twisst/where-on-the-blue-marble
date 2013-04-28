<?php

// ini_set('display_errors', '1');
// error_reporting(E_ERROR | E_WARNING | E_PARSE);

// connect to database
include ('dbconnect.php');

session_start();

$sessionid = session_id();
$ip = $_SERVER["REMOTE_ADDR"];


// save scores for photos
if ( isset($_GET['distance']) ) {
    
    $sql = "INSERT INTO scores (photoid, sessionid, ip, distance) VALUES (" . mysql_real_escape_string($_GET['photoid']) . ", '" . $sessionid . "', '" . md5($ip) . "', " . mysql_real_escape_string($_GET['distance']) . ")";
    $result = mysql_query( $sql );
    
    
}

/* we don't use this (because it is already in the front end, but we could to generate an overall score board for a user 
function totalScores($sessionid) {
    
    $result = mysql_query( "SELECT sum(distance) as total_distance, count(*) as photo_count FROM scores WHERE sessionid = '" . $sessionid . "' GROUP BY sessionid");
    
    echo $sql;
    
    echo mysql_error();
    
    $image = mysql_fetch_assoc($result);
    
    return json_encode($image);

}
*/


?>