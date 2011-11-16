<?php 

//SiteController styr menyn och skapar startvyn för varje vy.
//Respektive controller styr sedan mha js och modelen resterande funktioner.

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
		$subjects = get_groups();
		include "views/groups/index.php";
		break;
	case 'halls':
		include "views/halls/index.php";
		break;
	
	
	
}


?>