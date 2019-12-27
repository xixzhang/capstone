<?php
session_start();
require 'includes/dbh.inc.php';

function getContent($conn) {
    $sql="select * from about";
    $result=mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $content=$row['about_content'];
            echo nl2br($row['about_content']);
            echo "<form method='POST'>
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

global $content;

if (isset($_SESSION['user_id'])) {
    echo "<form method='POST' action='".editContent($conn)."'>
        <textarea name='content'>".$content."</textarea><br>
        <button type='submit' name='edit'>Edit</button>
    </form>";
}

getContent($conn);


/*
$content=$_POST['content'];

echo "<form method='POST' action='".editContent($conn)."'>
    <input type='hidden' name='content' value='content'>
    <textarea name='content'>".$content."</textarea><br>
    <button type='submit' name='edit'>Edit</button>
</form>";
*/




if (isset($_SESSION['user_id'])) {
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        echo "<form method='POST' action='" . editContent($conn) . "'>
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
                echo "<form method='POST' action='" . editContent($conn) . "'>
                    <textarea name='content'>" . $content . "</textarea><br>
                    <button type='submit' name='edit'>Edit</button>
                </form>";
            }
        }
    }
}


if (isset($_SESSION['user_id'])) {
    $content=$_POST['content'];

    echo "<form method='POST' action='".editContent($conn)."'>
                    <textarea name='content'>".$content."</textarea><br>
                    <button type='submit' name='edit'>Edit</button>
                </form>";
}


?>