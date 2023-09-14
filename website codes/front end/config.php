<?php
define('DB_HOST', 'fdb1028.awardspace.net');
define('DB_USERNAME', '4355543_soilmoisturedb');
define('DB_PASSWORD', 'rBE@rYTQHjgZ83t');
define('DB_NAME', '4355543_soilmoisturedb');

define('POST_DATA_URL', 'http://indoorsmartfarming.atwebpages.com/post-data.php');

//PROJECT_API_KEY is the exact duplicate of, PROJECT_API_KEY in NodeMCU sketch file
//both values must be same

define('PROJECT_API_KEY', 'Hello_World');

//Connect with the database
$db = new mysqli (DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Display error if failed to connect
if ($db -> connect_errno) {
    echo "Connection to database is failed: ".$db -> connect_errno;
    exit();
}