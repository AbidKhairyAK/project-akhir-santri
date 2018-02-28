<?php

$array = array('1','2','3');
$rand = rand(1,4);
$search = array_search($rand,$array);
// exit();

while (is_int($search)){
	$rand = rand(1,4);
	$search = array_search($rand,$array);
}
echo $rand;

?>