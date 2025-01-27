<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] == true) {
        header('location: /login.php');
        die();
    } 
?>

<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div id="content">
            <div id="index_content">
                <?php if (isset($_SESSION['isadmin'])) {
                    include('includes/db_connect.php');
                    $ret = pg_query($db, "select username,description from users order by uid asc;");

                    echo '<h4>[User List]</h4>';
                    echo 'Can you find password hash for admin 2? (Bonus Point)';
                    echo '<table>';
                    echo '<tr><th>Username</th><th>Role</th></tr>';
                    while ($row = pg_fetch_row($ret)) {
                        echo '<tr>';
                        echo '<td>'.$row[0].'</td>';
                        echo '<td>'.$row[1].'</td>';
                        echo '</tr>';
                    }
                    echo '</table><br>';
                    echo '<b>Import user:</b> <br>';
                ?>
                    <form action="admin/import_user.php" method="POST">
                        <input name="userobj" placeholder="User Object"> 
                        <input type="submit" value="Import User">
                    </form>
                <?php
                    echo '<hr>';
                } ?>

                <?php
                    if (isset($_SESSION['isadmin']))
                        echo '<a href="admin/update_motd.php">';
                    echo '<h4>[Message of the Day]</h4>';
                    echo '<div class="center_div">';
                    if (isset($_SESSION['isadmin']))
                        echo '</a>';

                    include('includes/db_connect.php');
                    $ret = pg_query($db, "select * from motd;");
                    $row = pg_fetch_row($ret);
                    require_once 'vendor/autoload.php';
                    $smarty = new Smarty();
                    $smarty->assign("username", $_SESSION['username']);
                    $smarty->debugging = true;
                    $smarty->force_compile = true;
                    echo $smarty->fetch("motd.tpl").'<br>';

                    $ret = pg_query($db, "select * from motd_images order by iid desc limit 12;");
                    while($row = pg_fetch_row($ret)) {
                        echo '<figure><img src="'.$row[1].'" /><figcaption>'.$row[2].'</figcaption></figure>';
                    }
                    echo '</div>';
                    echo '<hr>';
                ?>

                <?php
                    include('includes/db_connect.php');
                    $ret = pg_query($db, "select * from class_posts;");

                    echo '<h4>[Posts]</h4>';
                    echo '<table id="class_posts">';
                    echo '<tr><th>Module Code</th><th>Module Name</th><th>Professor</th>';
                    echo '<th>Credit Units</th><th>Comment</th></tr>';
                    while ($row = pg_fetch_row($ret)) {
                        echo '<tr>';
                        echo '<td><i>'.htmlentities($row[1]).'</i></td>';
                        echo '<td><u>'.htmlentities($row[2]).'</u></td>';
                        echo '<td>'.htmlentities($row[3]).'</td>';
                        echo '<td>'.htmlentities($row[4]).'</td>';
                        echo '<td>'.htmlentities($row[5]).'</td>';
                        echo '</tr>';
                    }
                    echo '</table><hr>';
                ?>

                <h4>[Create a post]</h4>
                <form action="includes/createpost.php" method="POST">
                    <input name="lvaCode" placeholder="Module Code">
                    <input name="lvaName" placeholder="Module Name">
                    <input name="professor" placeholder="Professor">
                    <input type="number" step="0.5" name="ects" placeholder="Credit Units">
                    <input name="description" placeholder="Description">
                    <br><br>
                    <input type="submit" value="Submit Post">
                </form>
            </div>
        </div>
    </body>
</html>
