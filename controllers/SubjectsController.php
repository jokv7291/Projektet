<?php


//Har funktionerna för subjects dvs add, update och delete.

require_once('../util/main.php');
require_once 'models/Subjects.php';


if (isset($_POST['s'])) {
 
  $action = $_POST['s'];
} // else if (isset($_GET['s'])) {
//     $action = $_GET['s'];
// } 


switch ($action) {

	case 'add_subject':
		$name = $_POST['subject_name'];
		$short = $_POST['subject_short'];
		
		if (empty($short) || empty($name)) {
			 $error = "Invalid product data. Check all fields and try again.";
			echo $error;
		} else {
			$id = add_subject($name, $short);
			echo $id;
		}
		break;
	case 'delete_subject':
		$id = $_POST['subject_id'];
		delete_subject($id);
		break;
	
	
}


?>