<?php
//Har funktionerna för halls dvs add, edit, remove, link & unlink.

require_once('../util/main.php');
require_once 'models/Halls.php';

if (isset($_POST['s'])) {
	$action = $_POST['s'];
}

switch ($action) {
	case 'add_hall':
		$name = $_POST['hall_name'];
		
		if (empty($name)){
			$error = "You must choose a name.";
			echo $error;
		} else{
			$id = add_hall($name);
			echo $id;
		}
		break;
		
	case 'edit_hall':
		$id = $_POST['id'];
		$name = $_POST['hall_name'];
		
		if (empty($name)){
			$error = "You must choose a name.";
			echo $error;
		} else
			edit_hall($id, $name);
		break;
	
	case 'remove_hall':
		$id = $_POST['id'];
		
		remove_hall($id);
		break;

	case 'link_hall':
		$id = $_POST['id'];
		$subject_id = $_POST['subject_id'];
		
		link_hall($id, $subject_id);
		break;
		
	case 'unlink_hall':
		$id = $_POST['id'];
		
		unlink_hall($id);
		break;
}
?>