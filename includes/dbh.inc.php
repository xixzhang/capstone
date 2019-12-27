<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="capstone";

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

//SQL
/*

//admin
create table users (
user_id int(11) auto_increment primary key not null,
username varchar(256) not null,
user_email varchar(256) not null,
user_pwd varchar(512) not null
);

//vip list
create table vips (
vip_id int(11) auto_increment primary key not null,
vip_first varchar(256) not null,
vip_last varchar(256) not null,
email varchar(256) not null,
bday varchar(256) not null
);

insert into vips (vip_first,vip_last,email,bday) values
('xixi','zhang','xixi@qq.com','admin','1995-07-24'),
('gaga','a','gaga@qq.com','gaga520','1987-10-23'
);


//events
create table events (
event_id int(11) auto_increment primary key not null,
event_title varchar(256) not null,
event_date varchar(256) not null,
event_content varchar(256) not null
);

insert into events (event_title,event_date,event_content) values
('Free Lunch!','2019-12-23','If today is your birthday you will have a free lunch.'),
("10% Off of Chef's Specials!", '2020-01-01',"Today we have 10% off of all chef's specials."),
('Extra 5% Off for VIPs!','2020-01-05','We offer extra 5% off for VIP members who usually have 10% off.');


//news
create table news (
news_id int(11) auto_increment primary key not null,
news_title varchar(256) not null,
news_date varchar(256) not null,
news_content varchar(256) not null
);

insert into news (news_title,news_date,news_content) values
('New Chef!','2019-11-01','We have a new chef.'),
('New Dishes Soon!','2019-11-15','We are going to have some new dishes soon.');


//about
create table about (
about_id int(11) auto_increment primary key not null,
about_content varchar(256) not null,
image_status int(11) not null
);


insert into about (about_content,image_status) values
("Traditional ambience, quiet, relaxing, delicate taste, are these what you are looking for in a Japanese dining experience? Then come to our restaurant, set up just the way you would if you were setting up a Japanese restaurant yourself. Ami Japanese Restaurant features truly traditional Japanese ambience with Tatami room for dining with privacy, a village like setting inside the dining hall, casual sushi bar, and a friendly, experienced staff waiting to give you that unique dining experience you’d only get if you were visiting the country itself.
Ami is a full service restaurant with take out available, is open for lunch and dinner from Monday to Sunday, and features variety of house special rolls with delicate sauces, fresh sushi, and traditional Japanese cuisine from the kitchen made only with the freshest ingredients. So whether you are looking for that one special dish you’ve tasted in your travel to the Far East or just a simple, relaxing dining experience with Japanese ambience, Ami is the place to experience it all!"
, 1);

update about set about_content="Traditional ambience, quiet, relaxing, delicate taste, are these what you are looking for in a Japanese dining experience? Then come to our restaurant, set up just the way you would if you were setting up a Japanese restaurant yourself. Ami Japanese Restaurant features truly traditional Japanese ambience with Tatami room for dining with privacy, a village like setting inside the dining hall, casual sushi bar, and a friendly, experienced staff waiting to give you that unique dining experience you’d only get if you were visiting the country itself.
Ami is a full service restaurant with take out available, is open for lunch and dinner from Monday to Sunday, and features variety of house special rolls with delicate sauces, fresh sushi, and traditional Japanese cuisine from the kitchen made only with the freshest ingredients. So whether you are looking for that one special dish you’ve tasted in your travel to the Far East or just a simple, relaxing dining experience with Japanese ambience, Ami is the place to experience it all!";


*/

?>