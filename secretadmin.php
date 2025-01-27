<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div id="content">
            <form class="center_form" method="POST">
                <h1>Log In:</h1>
                <input name="username" placeholder="Username"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <input type="submit" value="Log In"> 
                <?php if (isset($error)){echo "<span style='color:red'>Login Failed</span>";} ?>
            </form>
        </div>
    </body>
</html>