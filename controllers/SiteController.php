<?php 

require_once 'models/Subjects.php';
require_once 'models/Groups.php';

if (isset($_POST['r'])) {
    $action = $_POST['r'];
} else if (isset($_GET['r'])) {
    $action = $_GET['r'];
} else {
    $action = 'home';
}

switch ($action) {
	
	case 'home':
		include "views/site/index.php";
		break;
	case 'subjects':
		$subjects = get_subjects();
		include "views/subjects/index.php";
		break;
	case 'groups':
		//$subjects = get_subjects();
		include "views/groups/index.php";
		break;
	
	
	
}


?>