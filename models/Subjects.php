<?php
function get_subjects() {
    global $db;
    $query = 'SELECT * FROM subjects
              ORDER BY subject_id';
 try {   	
	$statement = $db->prepare($query);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    $statement->closeCursor();
	    return $result;
	} catch 	(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_subject($subject_id) {
    global $db;
	//$query = "DELETE FROM subjects WHERE subject_id = '$subject_id'";
    //$db->exec($query);
   $query = 'DELETE FROM subjects
              WHERE subject_id = :subjectid';
  try {
	$statement = $db->prepare($query);
	$statement->bindValue(':subjectid', $subject_id);
    $statement->execute();
    $statement->closeCursor();
return true;
	} catch 	(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function add_subject($subject_name, $subject_short) {
    global $db;
    $query = "INSERT INTO subjects
                 (subject_name, subject_short)
              VALUES
                 (:subject_name, :subject_short)";
	$statement = $db->prepare($query);
    $statement->bindValue(':subject_name', $subject_name);
    $statement->bindValue(':subject_short', $subject_short);
	$statement->execute();
    $statement->closeCursor();
	return $db->lastInsertId();
}


function update_subject($subject_id, $subject_name, $subject_short) {
    global $db;
    $query = "UPDATE subjects
        SET subject_name = :name,
            subject_short = :short
        WHERE subject_id = :id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $subject_name);
        $statement->bindValue(':short', $subject_short);
        $statement->bindValue(':id', $subject_id);
        $statement->execute();
        $statement->closeCursor();
		return true;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        return false;
		//display_db_error($error_message);
    }
}


?>