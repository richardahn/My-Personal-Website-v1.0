<!DOCTYPE html>
<html>
    <head>
        <title>Setting up database</title>
    </head>
    <body>
        <h3>Setting up...</h3>
<?php
require_once 'functions.php';

createTable('blogposts',
    'memberId INT,
     title VARCHAR(64),
     date DATETIME,
     article VARCHAR(4096),
     INDEX(title(12))');

createTable('members',
    'memberId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR(16),
     password VARCHAR(16),
     is_moderator TINYINT(1),
     INDEX(username(6))');
?>
        <br/>...done.
    </body>
</html>