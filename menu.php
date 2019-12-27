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

<body>

<nav>
    <ul class="topnav" id="myTopnav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About US</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="event.php">Events</a></li>
        <li><a class="active" href="menu.php">Menu</a></li>
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
        <h1>APPETIZERS</h1>

        <h2>Cold Appetizers</h2>
        <h3>Salad</h3>
        <p>$4.09</p>
        <p>Seaweed salad and cucumber in vinegar sauce.</p>
        <h3>Golden Spicy Tuna</h3>
        <p>$9.29</p>
        <p>Spicy tuna with crunch.</p>
        <h3>Combination Sashimi</h3>
        <p>$13.39</p>
        <p>Nine slices of three kind of fresh fish.</p>
        <h3>Sushi Sampler</h3>
        <p>$11.29</p>
        <p>Four pieces of sushi, three tekka maki and three kappa maki.</p>

        <h2>Hot Appetizers</h2>
        <h3>Edamame</h3>
        <p>$4.09</p>
        <p>Blanched and lightly salted Japanese soy beans.</p>
        <h3>Agedashi Tofu</h3>
        <p>$4.09</p>
        <p>Deep fried tofu in special sauce.</p>
        <h3>Gyoza</h3>
        <p>$6.19</p>
        <p>Japanese style pan fried dumplings.</p>
        <h3>Shumai</h3>
        <p>$6.19</p>
        <p>Japanese style steamed shrimp dumpling.</p>
        <h3>Yakitori</h3>
        <p>$6.19</p>
        <p>Broiled chicken on skewers glazed in teriyaki sauce.</p>
        <h3>Tempura</h3>
        <p>$6.19</p>
        <p>Variety of deep fried vegetables.</p>
        <h3>Soft Shell Crab</h3>
        <p>$8.19</p>
        <p>Deep fried jumbo soft shell crab with special sauce.</p>
        <h3>Spicy Edamame</h3>
        <p>$4.09</p>
        <p>Blanched and hot red pepper salted Japanese beans.</p>
        <h3>Super Bowl</h3>
        <p>$8.19</p>
        <p>Sushi rice topped with baked spy crab, salmon, tako and scallion with special sauce.</p>

        <h1>BOXES</h1>

        <h2>Sushi Boxes</h2>
        <h3>Sushi Box Combination A</h3>
        <p>$21.59</p>
        <p>Three pieces of sushi, California maki, chicken teriyaki and combo tempura.</p>
        <h3>Sushi Box Combination B</h3>
        <p>$26.79</p>
        <p>Three pieces of sushi, California maki, Kalbi marinated beef ribs and combo tempura.</p>
        <h3>Sushi Box Combination C</h3>
        <p>$26.79</p>
        <p>Three pieces of sushi, California maki, salmon teriyaki and combo tempura.</p>

        <h2>Combo Boxes</h2>
        <h3>Combination A</h3>
        <p>$13.39</p>
        <p>Shrimp tempura, California roll, three shumai and one vegetable croquette.</p>
        <h3>Combination B</h3>
        <p>$15.39</p>
        <p>Chicken teriyaki, California roll, three shumai and one vegetable croquette.</p>
        <h3>Combination C</h3>
        <p>$15.39</p>
        <p>Chicken teriyaki, vegetable tempura, two shumai and one vegetable croquette.</p>
        <h3>Combination D</h3>
        <p>$17.49</p>
        <p>Kalbi marinated beef ribs, California roll, three shumai and one vegetable croquette.</p>
        <h3>Combination E</h3>
        <p>$17.49</p>
        <p>Kalbi marinated beef ribs, vegetable tempura, three shumai and one vegetable croquette.</p>

        <h1>OTHERS</h1>

        <h2>Bibimbap</h2>
        <h3>Sashimi Ric</h3>
        <p>$12.39</p>
        <p>Sashimi and vegetables over the rice with spicy red pepper sauce.</p>
        <h3>Bibimba</h3>
        <p>$10.29</p>
        <p>Rice bowl with topping and cooked vegetables.</p>
        <h3>Dolsot Bibimba</h3>
        <p>$11.29</p>
        <p>Bibimbap served in a hot bowl.</p>

        <h2>Teriyaki</h2>
        <h3>Chicken Teriyak</h3>
        <p>$12.39</p>
        <p>Broiled chicken with teriyaki sauce and vegetables.</p>
        <h3>Salmon Teriyak</h3>
        <p>$16.49</p>
        <p>Broiled salmon with teriyaki sauce and vegetables. </p>

        <h2>Sides</h2>
        <h3>Miso Soup</h3>
        <p>$1.59</p>
        <h3>Steamed Rice</h3>
        <p>$1.59</p>
        <h3>House Salad</h3>
        <p>$1.59</p>
        <h3>Side Of Spicy Mayo</h3>
        <p>$1.09</p>


    </article>

    <aside>
        <h1>ENTREES</h1>

        <h2>Tempura Entrees</h2>
        <h3>Vegetable Tempura Entree</h3>
        <p>$11.29</p>
        <p>Deep fried variety of vegetables.</p>
        <h3>Shrimp Tempura Entree</h3>
        <p>$13.39</p>
        <p>Four pieces of shrimp, sweet potato, green beans, zucchini, onion and carrot.</p>
        <h3>Combination Tempura Entree</h3>
        <p>$16.49</p>
        <p>Three pieces of shrimp, three pieces of calamari, sweet potato, green beans, zucchini, onion and carrot.</p>

        <h2>Sushi Entrees</h2>
        <h3>Vegetarian Dish</h3>
        <p>$10.29</p>
        <p>Kappa, avocado and kampyo maki.</p>
        <h3>Maki Special</h3>
        <p>$15.39</p>
        <p>California, tekka and ami maki.</p>
        <h3>Maki Deluxe</h3>
        <p>$20.59</p>
        <p>California, ebi tempura and spicy tuna maki.</p>
        <h3>Sushi Regular</h3>
        <p>$15.39</p>
        <p>Califronia maki and six pieces of sushi.</p>
        <h3>Sushi Special</h3>
        <p>$21.59</p>
        <p>California, ami maki and six pieces of sushi.</p>
        <h3>Sushi Deluxe</h3>
        <p>$26.79</p>
        <p>California, ebi tempura maki and eight pieces of sushi.</p>
        <h3>Sashimi Regular</h3>
        <p>$30.89</p>
        <p>Around 20 pieces of sliced fish.</p>
        <h3>Sashimi Special</h3>
        <p>$46.29</p>
        <p>Around 40 pieces of sliced fish.</p>
        <h3>Sashimi Deluxe</h3>
        <p>$61.79</p>
        <p>Around 40 pieces of sliced fish.</p>
        <h3>Sushi Sashimi Combination</h3>
        <p>$26.79</p>
        <p>Four pieces of sushi, nine pieces of of sashimi, tekka maki and kappa maki.</p>

        <h2>Chef's Specials</h2>
        <h3>Caterpillar</h3>
        <p>$11.29</p>
        <p>Eel and cucumber topped with avocado, with sweet sauce.</p>
        <h3>Bond Girl</h3>
        <p>$9.29</p>
        S<p>picy crab and cucumber topped with shrimp and avocado.</p>
        <h3>Salmon Avalanche</h3>
        <p>$10.29</p>
        <p>Salmon, crab and cream cheese. Deep fried and then baked with mayo.</p>
        <h3>Ultimate Shrimp</h3>
        <p>$14.39</p>
        <p>Spicy soft shell crab, shrimp tempura topped with cooked shrimp and avocado. Spicy mayo and sweet sauce.</p>
        <h3>Ultimate Rainbow</h3>
        <p>$15.39</p>
        <p>Spicy soft shell crab, shrimp tempura topped with variety of fish. Spicy garlic ponzu sauce.</p>
        <h3>Black Dragon</h3>
        <p>$16.49</p>
        <p>California with a whole unagi piece in the form of a dragon.</p>
        <h3>007 Roll</h3>
        <p>$9.29</p>
        <p>Spicy tuna, spicy crab, avocado and cream cheese with a bang.</p>
        <h3>Tuna Crunch</h3>
        <p>$14.39</p>
        <p>Crab meat, tamago topped with spicy tuna, special sauce and crunch.</p>
        <h3>Mountain</h3>
        <p>$16.49</p>
        <p>White fish tempura topped with crunch crab meat, shrimp tempura along with special sauce and a crunch.</p>
        <h3>Fire In The Roll</h3>
        <p>$10.29</p>
        <p>Hamachi, tuna, avocado, scallions and cucumber roll with special "fire" sauce. Very spicy!</p>

        <h2>Noodle Entrees</h2>
        <h3>Zaru Soba</h3>
        <p>$9.29</p>
        <p>Cold buckwheat noodle with special sauce.</p>
        <h3>Yaki Soba</h3>
        <p>$9.29</p>
        <p>Stir fried buckwheat noodle and vegetables in special sauce.</p>
        <h3>Yaki Udon</h3>
        <p>$9.29</p>
        <p>Stir fried thick noodle and vegetables in special sauce.</p>
        <h3>Tempura Soba</h3>
        <p>$10.29</p>
        <p>Buckwheat noodle soup with shrimp, sweet potato, green bean and zucchini tempura.</p>
        <h3>Vegetable Udon</h3>
        <p>$8.19</p>
        <p>Thick noodle soup with vegetables.</p>

        <h1>Beverages</h1>
        <h3>Coca Cola</h3>
        <p>$1.59</p>
        <p>12 oz. can.</p>
        <h3>Diet Coca-Cola</h3>
        <p>$1.59</p>
        <p>12 oz. can.</p>
        <h3>Sprite</h3>
        <p>$1.59</p>
        <p>12 oz. can.</p>
        <h3>Bottled Water</h3>
        <p>$1.59</p>
        <p>17 oz. bottle.</p>
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





