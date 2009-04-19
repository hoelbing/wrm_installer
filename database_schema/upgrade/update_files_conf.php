<?php

$wrm_update_array = array();

//3.6.1 -- not change this --
$wrm_update_array[] =
						array(
							'file_name' => "",
							'update_to_version'=> "3.6.1"
						);

//from 3.6.1 to 4.0.0
$wrm_update_array[] = 
						array(
							'file_name' => "4.0.0.sql",
							'update_to_version'=> "4.0.0"
						);

//only for testing
//4.0.0 to 4.0.1
$wrm_update_array[] =
						array(
							'file_name' => "4.0.1.sql",
							'update_to_version'=> "4.0.1"
						);


/*
 * Temp
 * 
array_push($wrm_update_array,
	array(
		'file_name' => "x.x.x.sql",
		'update_to_version'=> "x.x.x"
	)
);*/
?>
