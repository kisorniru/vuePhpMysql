<?php

$conn = new mysqli("localhost", "root", "123456", "vuephpmysql");

if($conn->connect_error()){
	die("could not connect to databse!");
} else {
	return "hello world!";
}