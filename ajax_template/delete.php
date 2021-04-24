<?php
$id = $_POST["id"];

$connection = new mysqli("localhost","root","","ajax129");

$sql = "DELETE FROM students WHERE id='$id'";

$connection->query($sql);



?>