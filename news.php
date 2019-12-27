<?php
    session_start();
    require 'includes/dbh.inc.php';
?>
<!DOCTYPE HTML>
<html lang="en">

<!--
    Capstone Project
-->

<head>
    <meta charset="utf-8">
    <title>Capstone Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">

    <!-- Stylesheets -->
    <script src="https://use.fontawesome.com/a686b3c76b.js"></script>
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" media="all">

    <!--[if lt IE 9]>
    <script src="assets/components/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body id="news">

<nav>
    <ul class="topnav" id="myTopnav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About US</a></li>
        <li><a class="active" href="news.php">News</a></li>
        <li><a href="event.php">Events</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="contact.php">Contact US</a></li>
        <li><?php if (isset($_SESSION['user_id'])) {
                echo '<form id="logout" action="includes/logout.inc.php" method="POST">
                <button type="submit" name="logout-submit">Logout</button>
            </form>';}
            else {
                echo '<form id="login" action="includes/login.inc.php" method="POST">
                <input type="text" name="mailuid" placeholder="Username/Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">Login</button>
            </form>';
            }
            ?></li>
        <li class="icon"><a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
    </ul>
</nav>


<main>
    <article>
        <h1>News</h1>
        <br>

        <?php
        $sql = "select * from news order by news_date desc;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h2>".$row['news_title']."</h2>";
                echo "<h3>".$row['news_date']."</h3>";
                echo "<p>".$row['news_content']."</p>";
            }
        }
        ?>
        <br>
    </article>
</main>

<footer>
    <div id="info">
        <section>
            <h1>Contact</h1>
            <address>403 N Walnut Street<br>
                Bloomington, IN 47404</address>
        </section>
        <section>
            <h1>Order</h1>
            <p><a href="https://www.delivery.com/cities/bloomington-in/categories/restaurant/ami-menu-64?address=&utm_campaign=places_order_now_btn&utm_medium=list&utm_source=google&orderType=delivery&orderTime=ASAP">delivery.com</a></p>
        </section>
        <section>
            <h1>Hours</h1>
            <p>Monday  11AM–10PM</p>
            <p>Tuesday  11AM–10PM</p>
            <p>Wednesday  11AM–10PM</p>
            <p>Thursday  11AM–10PM</p>
            <p>Friday  11AM–10PM</p>
            <p>Saturday  12–10PM</p>
            <p>Sunday  12–10PM</p>
        </section>
    </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>





