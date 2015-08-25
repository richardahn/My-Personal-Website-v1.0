<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 8/25/2015
 * Time: 1:07 AM
 */
require_once 'functions.php';

session_start();
$userstr = ' (Guest)';
if (isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
}
else $loggedin = FALSE;

echo <<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Richard Ahn | Blog</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/960_12_col.css" type="text/css" />
</head>
<body>
<!-- Page -->
<div id="page">
    <!-- Header -->
    <div id="header">
        <div class="container_12">
_END;
if ($loggedin)
{
    echo <<<_END
            <div class="topbar grid_12">
                <div class="topbar-nav">
                    <span>Welcome, $user</span>
                    <ul class="topbar-nav-list">
                        <li><a href="#">Profile</a></li> |
                        <li><a href="#">Log Out</a></li>
                    </ul>
                </div
            </div>
_END;
}
else
{
    echo <<<_END
            <div class="topbar grid_12">
                <div class="topbar-nav">
                    <ul class="topbar-nav-list">
                        <li><a href="#">Sign Up</a></li> |
                        <li><a href="#">Log In</a></li>
                    </ul>
                </div
            </div>
_END;
}

echo <<<_END
            <div class="logo grid_12">
                <img src="images/logo.png" alt="Richard's Webpage" />
            </div>
            <div class="header-nav grid_12">
                <ul class="header-nav-list">
                    <li><a href="index.php">Home</a></li> |
                    <li><a href="blog.php">Blog</a></li> |
                    <li><a href="resume.html">Resume</a></li> |
                    <li><a href="contact.html">Contact</a></li> |
                    <li><a href="about.html">About</a></li>
                </ul>
            </div>
        </div>
    </div>
_END;




