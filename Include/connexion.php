<?php
	$errormanagement = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$db = new PDO('mysql:host=localhost;dbname=medmeasure', 'root', '', $errormanagement);
	
	
	/*$rep = $db -> query("
		ALTER TABLE `cis` 
		CHANGE `TypeProcédureAMM` `TypeProcedureAMM` VARCHAR(255) 
		CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
		");*/
?>	
