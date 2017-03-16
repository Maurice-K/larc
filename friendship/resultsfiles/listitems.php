<?php
include('dbc.php');
$theAction = $_GET['listwhat'];
if ($theAction == 'events') {
	$tableFrom = 'race_events';
	$pageQuery = "SELECT * FROM " . $tableFrom; 
	$pageQuery .= " where deleted = 0";
	$pageQuery .= " ORDER BY title";
	//$pageQuery .= " AND type = '" . $currentPageSlug . "'";
	$stmt = $db->query($pageQuery);
	$returnArray = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		//add items to that array we gonna return
		array_push($returnArray, $row);
	}
	success($returnArray);
} 
elseif ($theAction == 'eventsAndTypes') {
	$returnArray = array();
	$returnArray['events'] = array();
	$returnArray['event_types'] = array();
	$tableFrom = 'race_events';
	$pageQuery = "SELECT * FROM " . $tableFrom; 
	$pageQuery .= " where deleted = 0";
	$pageQuery .= " ORDER BY title";
	//$pageQuery .= " AND type = '" . $currentPageSlug . "'";
	$stmt = $db->query($pageQuery);
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		//add items to that array we gonna return
		array_push($returnArray['events'], $row);
	}
	$typesQuery = "SELECT * FROM event_types"; 
	$typesQuery .= " where deleted = 0";
	$typestmt = $db->query($typesQuery);
	while($row = $typestmt->fetch(PDO::FETCH_ASSOC)) {
		//add items to that array we gonna return
		array_push($returnArray['event_types'], stripslashes_deepr($row));
	}
	success($returnArray);
} 
elseif ($theAction == 'schools') {
	$tableFrom = 'schools';
	$pageQuery = "SELECT * FROM " . $tableFrom; 
	$pageQuery .= " where deleted = 0";
	$pageQuery .= " ORDER BY title, city";
	$stmt = $db->query($pageQuery);
	$returnArray = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		//add items to that array we gonna return
		array_push($returnArray, stripslashes_deepr($row));
	}
	success($returnArray);
} 
elseif ($theAction == 'runners') {
	$tableFrom = 'runners';
	$pageQuery = "SELECT runners.id as runner_id, runners.last_name, runners.first_name, school_id, hometown, schools.title as school_title FROM " . $tableFrom; 
	$pageQuery .= " JOIN schools on runners.school_id = schools.id";
	$pageQuery .= " WHERE runners.deleted = 0";
	//make join on school ID etc etc etc join on hometown loc ID etc etc etc
	//TODO: update to join and show some events they normally do
	$first_name = $_GET['first_name'];
	$last_name = $_GET['last_name'];
	$school_id = $_GET['school_id'];
	if (!empty($first_name)) {
		$pageQuery .= " AND first_name = '" . $first_name . "'";
		//$pageQuery .= " AND first_name = :first_name";
	}
	if (!empty($last_name)) {
		$pageQuery .= " AND last_name = '" . $last_name . "'";
		//$pageQuery .= " AND last_name = :last_name";
	}
	$pageQuery .= " ORDER BY last_name";
	//$runnerpreparedStatement->bindParam(':last_name', $runnersValue['last_name']);
	//$runnerpreparedStatement->bindParam(':first_name', $runnersValue['first_name']);
	$stmt = $db->query($pageQuery);
	$returnArray = array();
	$itemsArray = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		//add items to that array we gonna return
		$item = array(
					'id' => $row['runner_id'],
					'last_name' => stripslashes($row['last_name']),
					'first_name' => stripslashes($row['first_name']),
					'school_id' => $row['school_id'],
					'school' => stripslashes($row['school_title']),
					'hometown' => stripslashes($row['hometown'])
			);
		array_push($returnArray, $item);
	}
	success($returnArray);
} else {
	fail('This didnt recognize any params');
}
?>