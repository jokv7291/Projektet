<?php
require_once('../util/main.php');
require_once 'models/Subjects.php';


if (isset($_POST['s'])) {
 
  $action = $_POST['s'];
} else if (isset($_GET['s'])) {
    $action = $_GET['s'];
} 


switch ($action) {

	case 'add_subject':
		$name = $_POST['subject_name'];
		$short = $_POST['subject_short'];
		$id = add_subject($name, $short);
		echo $id;
		break;
	case 'delete_subject':
		$id = 47;//$_POST['subject_id'];
		$success = 0;
		$success = delete_subject($id);
		echo $success;
		break;
	
	
}


?>