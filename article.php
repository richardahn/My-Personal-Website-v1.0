<?php
require_once 'header.php';
require_once 'functions.php';

if (isset($_GET['id']))
{
    $id = sanitizeString($_GET['id']);
    $query = "SELECT * FROM blogposts WHERE id='$id'";
    $result = queryMysql($query);
    if (!$result) showErrorPage();
}
else
{
    showErrorPage();
}

// Show page with article
$result->data_seek(0);
$row = $result->fetch_array();
$year = substr($row[2],0,4);
$month = substr($row[2],5,2);
$day = substr($row[2],8,2);
$date = "$month/$day/$year";
echo <<<_END
   <div id="body">
        <div class="container_12">
            <div class="introduction grid_10">
                <div class="articles">
                    <div class="article">
                            <h1 class="article-title">$row[1]</h1>
                            <p class="article-date">
                                $date
                            </p>
                            <p class="article-teaser">
                            $row[3]
                            </p>
                        </div>
                    </div>
            </div>
            <div class="sidebar grid_2">
                SIDEBAR LIST
            </div>
        </div>
    </div>
_END;





function showErrorPage()
{
    echo <<<_END
       <div id="body">
        <div class="container_12">
            <div class="introduction grid_10">
                <p>
                    Unable to find requested article.
                </p>
            </div>
            <div class="sidebar grid_2">
                SIDEBAR LIST
            </div>
        </div>
    </div>
_END;

    exit;
}