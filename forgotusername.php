<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header('location: /index.php');
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];

        include('includes/db_connect.php');
        $ret = pg_query($db, "select * from users where username='".$username."';");

        if (pg_num_rows($ret) === 1) {
            $success = true;
        } else {
            $error = true;
        }
    }
?>

<html>
    <head>
        <title>Forgot Username</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div id="content">
            <form class="center_form" action="forgotusername.php" method="POST">
                <h1>Forgot Username:</h1>
                <p>Please enter a username to check if exists</p>
                <input name="username" placeholder="Username"><br><br>
                <input type="submit" value="Send Reset Token"> 
                <?php if (isset($error)){echo "<span style='color:red'>User doesn't exist.</span>";}
                else if (isset($success)){echo "<span style='color:green'>User exists!</span>";} ?>
                <br><br>
                <?php include('includes/login_footer.php'); ?>
            </form>
        </div>
    </body>
</html>