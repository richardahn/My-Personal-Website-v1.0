<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 8/25/2015
 * Time: 12:58 AM
 */

$dbhost = 'localhost';
$dbname = 'richardwp';
$dbuser = 'root';
$dbpass = '';
$appname = 'Richard\'s Webpage';

// Connect to database
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) die($conn->connect_error);

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br/>";
}

function queryMysql($query)
{
    global $conn;
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    return $result;
}

function destroySession()
{
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}

function sanitizeString($var)
{
    global $conn;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $conn->real_escape_string($var);
}
