<?php
require_once 'header.php';
require_once 'functions.php';

echo <<<_END
    <!-- Body -->
    <div id="body">
        <div class="container_12">
            <div class="introduction grid_10">
                <div class="articles">
_END;
$query = "SELECT * FROM blogposts";
$result = queryMysql($query);

$num_rows = $result->num_rows;
for ($i = 0; $i < $num_rows; $i++)
{
    $result->data_seek($i);
    $row = $result->fetch_array();

    $year = substr($row[2],0,4);
    $month = substr($row[2],5,2);
    $day = substr($row[2],8,2);
    $date = "$month/$day/$year";
    $article_teaser = substr($row[3],0,500) . "...";

    echo <<<_END
                    <div class="article">
                        <h1 class="article-title">
                            <a href="article.php?id=$row[0]">$row[1]</a>
                        </h1>
                        <p class="article-date">
                            $date
                        </p>
                        <p class="article-teaser">
                            $article_teaser
                        </p>
                    </div>
                    <br/>
_END;
}
echo <<<_END
                </div>
            </div>
_END;
require_once 'sidebar.php';
echo <<<_END
        </div>
    </div>
_END;
require_once 'footer.php';
echo <<<_END
</div>
</body>
</html>
_END;

?>