<?php

$image = $_GET["todo"];
var_dump($image);
$link = "images/".$image.".jpg";

print '<img src="'.$link.'"/>';

