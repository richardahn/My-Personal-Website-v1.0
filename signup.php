<?php
require_once 'header.php';

echo <<<_END
    <script>
        function checkUser(user)
        {
            if (user.value == '')
            {
                O('info').innerHTML = '';
                return;
            }

            params = 'user=' + user.value;
            request = new ajaxRequest();
            request.open("POST", "checkuser.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.setRequestHeader("Content-length", params.length);
            request.setRequestHeader("Connection", "close");

            request.onreadystatechange = function()
            {
                if (this.readyState == 4)
                {
                    if (this.status == 200)
                    {
                        if (this.responseTexxt != null)
                            O('info').innerHTML = this.responseText;
                    }
                }
            }
            request.send(params);
        }

        function ajaxRequest()
        {
            try
            {
                var request = new XMLHttpRequest();
            }
            catch (e1)
            {
                try
                {
                    request = new ActiveXObject("Msxml2.XMLHTTP")
                }
                catch (e2)
                {
                    try
                    {
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch (e3)
                    {
                        request = false;
                    }
                }
            }
            return request;
        }
    </script>
    <div class="main"><h3>Please enter your details to sign up</h3>
_END;

$error = $username = $password = "";
// Destroy session if user is logged in
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
    $username = sanitizeString($_POST['username']);
    $password = sanitizeString($_POST['password']);

    // Check if something was entered
    if ($username == "" || $password == "")
        $error = "Not all fields were entered<br/><br/>";
    else
    {
        $query = "SELECT * FROM members WHERE username='$username'";
        $result = queryMysql($query);

        if ($result->num_rows)
            $error = "That username already exists<br/><br/>";
        else
        {
            $query = "INSERT INTO members VALUES(NULL, '$username', '$password', 0)";
            queryMysql($query);
            die("<h4>Account created</h4>Please log in.<br/><br/>");
        }
    }
}

echo <<<_END

_END;




















