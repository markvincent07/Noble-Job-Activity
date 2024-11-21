<?php  

require_once 'dbConfig.php';

function getAllUsers($pdo) {
	$sql = "SELECT * FROM applicants 
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $id) {
	$sql = "SELECT * from applicants WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAUser($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM applicants WHERE 
			CONCAT(first_name,last_name,email,years_of_experience,specialization,favorite_programming_language) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewUser($pdo, $first_name, $last_name, $email, $years_of_experience, $specialization, $favorite_programming_language) {
        $response = array();
	    

	$sql = "INSERT INTO applicants 
			(
				first_name,
				last_name,
				email,
				years_of_experience,
				specialization,
				favorite_programming_language
				
			)
			VALUES (?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $years_of_experience, $specialization, $favorite_programming_language]);

	if ($executeQuery) {
		$response = array(
            "status" => "200",
            "message" => "User successfully inserted!"
        );
	}
    else {
        $response = array(
            "status" => "400",
            "message" => "An error occured with the query!"
        );
    }
    
    return $response;
}

function editUser($pdo, $first_name, $last_name, $email, $years_of_experience, $specialization, $favorite_programming_language, $id) {
    $response = array();

    $sql = "UPDATE applicants 
            SET first_name = ?,
                last_name = ?,
                email = ?";


    $params = [$first_name, $last_name, $email];

    if (!empty($specialization)) {
        $sql .= ", specialization = ?";
        $params[] = $specialization;
    }

    if (!empty($years_of_experience)) {
        $sql .= ", years_of_experience = ?";
        $params[] = $years_of_experience;
    }

    if (!empty($favorite_programming_language)) {
        $sql .= ", favorite_programming_language = ?";
        $params[] = $favorite_programming_language;
    }

    $sql .= " WHERE id = ?";

    $params[] = $id;

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute($params);

    if ($executeQuery) {
        $response = array(
            "status" => "200",
            "message" => "User successfully edited!"
        );
    } else {
        $response = array(
            "status" => "400",
            "message" => "An error occurred with the query!"
        );
    }

    return $response;
}


function deleteUser($pdo, $id) {
	$sql = "DELETE FROM applicants 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		$response = array(
			"status" => "200",
			"message" => "User successfully deleted!"
		);
	}
	else {
		$response = array(
			"status" => "400",
			"message" => "An error occured with the query!"
		);
	}
	
return $response;
}




?>