<?php

/* ======== select the multiple result from database for party name field ========= */

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hoodycam_db';

$ids=$_GET['id'];


//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term

$searchTerm = $_GET['term'];
//get matched data from userdb table
$query = $db->query("SELECT DISTINCT model_name FROM lend_details WHERE cat_id like '".$ids."%' and model_name LIKE '".$searchTerm."%' ORDER BY model_name" );
while ($row = $query->fetch_assoc()) {
    $data[] = $row['model_name'];
}
//return json data
echo json_encode($data);


?>