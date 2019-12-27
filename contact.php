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

<body id="contact">

<nav>
    <ul class="topnav" id="myTopnav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About US</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="event.php">Events</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a class="active" href="contact.php">Contact US</a></li>
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
        <?php if (!isset($_SESSION['user_id'])) {
            echo '<h1>Signup to be a VIP</h1>';

            if (isset($_GET['error'])) {
                if ($_GET['error']=='invalidemail') {
                    echo '<p class="signuperror">Invalid email!</p>';
                }
                elseif ($_GET['error']=='emptyfields') {
                    echo '<p class="signuperror">Fill in all fields!</p>';
                }
                elseif ($_GET['error']=='invalidbday') {
                    echo '<p class="signuperror">Invalid birthday!</p>';
                }
                elseif ($_GET['error']=='usertaken') {
                    echo '<p class="signuperror">This email is already existed!</p>';
                }
            }
            elseif (isset($_GET['signup'])) {
                echo '<p class="signupsuccess">Signup successfully!</p>';
            }

            echo '<div id="signup">
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="first" placeholder="firstname">
                <br>
                <input type="text" name="last" placeholder="lastname">
                <br>
                <input type="text" name="email" placeholder="email">
                <br>
                <input type="date" name="bday">
                <br>
                <button type="submit" name="signup-submit">Sign up</button>
            </form>
        </div>
        <br>
        <h1>Send E-mail Form</h1>';


            if (isset($_POST['send'])) {
                $to="ayunga491@gmail.com";
                $address=$_POST['address'];
                $fullname=$_POST['fullname'];
                $subject=$_POST['subject'];
                $message=$_POST['message'];
                $headers="From: ".$address;
                $txt="You have received an e-mail from ".$fullname.".\n\n".$message;

                if (null == $address and null ==$message) {
                    echo "<p>Your e-mail address and message sections are required!</p>";
                } else {
                    mail($to, $subject, $txt, $headers);
                    if (mail($to, $subject, $txt, $headers)) {
                        echo "<p>Your e-mail has been sent successfully!</p>";
                    } else {
                        echo "<p>Unable to send email. Please try again!</p>";
                    }
                }
            }

        echo '<div id="email">
            <form method="POST">
                <input type="text" name="fullname" placeholder="Full name">
                <input type="text" name="address" placeholder="Your email address">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" value="message" placeholder="Message"></textarea>
                <button type="submit" name="send" value="send-sumit">Send</button>
            </form>
        </div>';
        }
        else {
            echo '<div id="list">
            <h1>VIP Lists</h1>
            <form method="GET">
            <input type="text" name="first" placeholder="Fullname" style="width: 40%;"> 
            <input type="date" name="bday" style="width: 35%;">
            <button type="submit" name="search" value="search">Search</button>
            <button type="submit" name="reset" value="reset">Reset</button>
            </form>
            </div>';

            if (isset($_GET['reset']) || !isset($_GET['search'])) {
                $sql = "select * from vips order by vip_first;";

            } else {
                $first=$_GET['first'];
                $bday=$_GET['bday'];
                $sql = "select * from vips where concat(vip_first, ' ', vip_last) like '%".$first."%' and bday like '%".$bday."%' order by vip_first;";
            }

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                echo "<table>";
                echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Birthday</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    //$datas[]=$row;
                    echo "<tr><td>" . $row['vip_first'] . "</td><td>" . $row['vip_last'] . "</td><td>" . $row['email'] . "</td><td>" . $row['bday'] . "</td></tr>";
                }
                echo "</table>";
                }
        }
        ?>
        <br>

    </article>

    <aside>
        <!-- Insert Google Map Here -->
        <h1>Address</h1>
        <br>
        <br>
        <div style="width: 100%"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3093.2210528481405!2d-86.
        53614158518675!3d39.16969513845351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886c66dc13b64b9d%3A0x92447861fa38dd93!2s403%20N%20Walnut%20St%2C%20Bloomington
        %2C%20IN%2047404!5e0!3m2!1szh-CN!2sus!4v1576806808498!5m2!1szh-CN!2sus" width="500" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </aside>

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








