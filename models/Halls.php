<?php
function get_subjects(){
    global $db;
    $query = 'SELECT * FROM subjects
              ORDER BY subject_id';
	try{
		$statement = $db->prepare($query);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    $statement->closeCursor();
	    return $result;
	} catch (PDOException $e){
		$error_message = $e->getMessage();
		display_db_error($error_message);
    }
}

function add_hall($name){
    global $db;
    $query = "INSERT INTO halls(name)
              VALUES (:name)";
	$statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
	$statement->execute();
    $statement->closeCursor();
	return $db->lastInsertId();
}

function edit_hall($id, $name){
    global $db;
    $query = 'UPDATE halls
        	  SET name = :name
			  WHERE id = :id';
    try{
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
		return true;
    } catch (PDOException $e){
        $error_message = $e->getMessage();
		display_db_error($error_message);
    }
}
		
function remove_hall($subject_id){
	global $db;
	$query = 'DELETE FROM halls
              WHERE id = :id';
  	try{
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $id);
    	$statement->execute();
    	$statement->closeCursor();
		return true;
	} catch (PDOException $e){
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function link_hall($id, $subject_id){
    global $db;
    $query = "INSERT INTO halls_subject (halls_id, subjects_id)
              VALUES (:halls_id, :subjects_id)";
	$statement = $db->prepare($query);
    $statement->bindValue(':halls_id', $id);
    $statement->bindValue(':subjects_id', $subject_id);
	$statement->execute();
    $statement->closeCursor();
	return $db->lastInsertId();
}

function unlink_hall($id){
	global $db;
	$query = 'DELETE FROM halls_subjects
              WHERE id = :id';
  	try{
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $id);
    	$statement->execute();
    	$statement->closeCursor();
		return true;
	} catch (PDOException $e){
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>