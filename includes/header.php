<?php 
    if (session_id() == "")
        session_start(); 
?>

<div id="header">
<b><a href="/">Insecure Academy Forum</a></b>

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
    <span style="float:right;">Logged in as: <a href="/profile.php"><b><?php echo $_SESSION['username']; ?></b></a>, <a href="/includes/logout.php">Log out</a></span>
<?php } ?>
</div>