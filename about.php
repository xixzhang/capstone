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

<body id="about">

<nav>
    <ul class="topnav" id="myTopnav">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="about.php">About US</a></li>
        <li><a href="news.php">News</a></li>
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
        <h1>About Us</h1>
        <br>

        <?php
        function getContent($conn) {
            $sql="select * from about";
            $result=mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>".nl2br($row['about_content'])."</p>";
                    echo "<form method='POST' action='".editContent($conn)."'>
                    <input type='hidden' name='content' value='".$row['about_content']."'>
                </form>";
                }
            }
        }

        function editContent($conn) {
            if (isset($_POST['edit'])) {
                $content=$_POST['content'];
                $sql="update about set about_content='$content';";
                $result=mysqli_query($conn, $sql);
            }
        }

        if (isset($_SESSION['user_id'])) {
            if (isset($_POST['content'])) {
                $content = $_POST['content'];
                echo "<form id='edit' method='POST' action='" . editContent($conn) . "'>
                    <textarea name='content'>" . $content . "</textarea><br>
                    <button type='submit' name='edit'>Edit</button>
                </form>";
            }
            else {
                $sql = "select * from about;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $content=nl2br($row['about_content']);
                        echo "<form id='edit' method='POST' action='" . editContent($conn) . "'>
                    <textarea name='content'>" . $content . "</textarea><br>
                    <button type='submit' name='edit'>Edit</button>
                </form>";
                    }
                }
            }
        }

        getContent($conn);
        ?>
        <br>

    </article>

    <aside>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<form method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
            </form>';

            if (isset($_POST['submit'])) {
                $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 20000000) {
                            $fileNameNew = "new." . $fileActualExt;
                            $fileDestination = 'uploads/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            $sql='update about set image_status=0;';
                            $result = mysqli_query($conn, $sql);
                        } else {
                            echo "Your file is too big.";
                        }
                    } else {
                        echo "There was an error uploading your error.";
                    }
                } else {
                    echo "You can only upload files of JPG type!";
                }
            }
        }

        $sql = "select * from about;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sqlImg = "select image_status from about;";
                $resultImg = mysqli_query($conn, $sqlImg);

                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                    if ($rowImg['image_status']==0) {
                        echo '<img src="uploads/new.jpg" alt="New" style="display: flex;flex-wrap: wrap;justify-content: center;max-width: 90%;margin: 4.0em 3.0em 0;">';
                    }
                    else {
                        echo '<img src="uploads/ami-logo.jpg" alt="Ami" style="display: flex;flex-wrap: wrap;justify-content: center;max-width: 90%;margin: 4.0em 3.0em 0;">';
                    }
                }
            }
        }
            ?>
        <br>
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








