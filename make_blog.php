<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 8/25/2015
 * Time: 1:29 AM
 *
 * createTable('blogposts',
'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(64),
date DATE,
article VARCHAR(4096)
INDEX(title(12))');
 */
require_once 'functions.php';

$title = $date = $article = "";

if (isset($_POST['title']) &&
    isset($_POST['article']))
{
    $title = sanitizeString($_POST['title']);
    $date = time();
    $article = sanitizeString($_POST['article']);

    $query = "INSERT INTO blogposts VALUES(NULL, '$title', '$date', '$article')";
    queryMysql($query);
}


echo <<<_END
<!DOCTYPE html>
<html>
    <head>
        <title>Making a blog</title>
    </head>
    <body>
        <form action="make_blog.php" method="post">
            <label>Enter in a title: <input type="text" name="title"/></label>
            <br/>
            Enter in the article description:
            <br/>
            <textarea name="article" rows="20" cols="40" placeholder="Enter in the description">
            </textarea>
            <br/>
            <input type="submit" value="Make blog" />
        </form>
    </body>
</html>
_END;
