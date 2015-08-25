<?php
require_once 'header.php';
echo <<<_END
    <!-- Body -->
    <div id="body">
        <div class="container_12">
            <div class="introduction grid_10">
                <p>
                    Hello,
                    <br/><br/>
                    My name is <span style="color: green">Richard</span>, I am a student at
                    <span style="color: red">Rutgers</span>
                    who enjoys learning about stuff. I started this
                    site to document things that I've learned and
                    thought were interesting.
                    <br/><br/>
                    Best Regards,
                    <br/>
                    Richard Ahn
                </p>
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