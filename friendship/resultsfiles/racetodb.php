<?php
include('dbc.php');
//fail('itsrfail');
//echo $_POST['title'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$enddate = $_POST['enddate'];
$timeh = $_POST['timeh'];
$timem = $_POST['timem'];
//$ampm = $_POST['timeAMPM'];
$general = $_POST['general'];
$location = $_POST['location'];
$location_id = $_POST['location_id'];
$organizer = $_POST['organizer'];
$director = $_POST['director'];
$race_id = null;
//$race_types = $_POST['types'];
$dontAccept = array("!","<",">","@","$","%","^","*","=","+","","~","{","[","}","]","|",";");
if(preg_match('/[^\w\s\.]/i', $title)) {
	if (contains($title, $dontAccept) !== false) {
		fail('Invalid title provided.');
	}
}
if(empty($title)) {
	fail('Please enter the Race Title.');
}
$permalink = sanitize_titler($title);
$dateString = '';
if (!empty($date)) {
	$mmddyy = explode("/", $date);
	$mm = $mmddyy[0];
	$dd = $mmddyy[1];
	$yy = $mmddyy[2];
	if (empty($timeh)) {
		//$date = '20' . $yy . '-' . $mm . '-' . $dd . ' ' . '00:00:00';
		$date = date('Y-m-d H:i:s', mktime(0, 0, 0, intval($mm), intval($dd), intval($yy)));
	} else {
		if (isset($_POST['timeAMPM'])) {
			if ($timeh !== 12)
				$timeh = $timeh + 12;
		} else {
			if ($timeh == 12)
				$timeh = 0;
		}
		//if ($timeh < 10) $timeh = '0' . $timeh;
		//$date = '20' . $yy . '-' . $mm . '-' . $dd . ' ' . $timeh . ':' . $timem . ':00';
		if (empty($timem))
			$date = date('Y-m-d H:i:s', mktime($timeh, 0, 0, intval($mm), intval($dd), intval($yy)));
		else
			$date = date('Y-m-d H:i:s', mktime($timeh, $timem, 0, intval($mm), intval($dd), intval($yy)));
	}
	//$date = date('Y-m-d G:i:s', strtotime($date));
	$dateString = $mm . ' ' . $dd . ' ' . $yy . ' ' . $timeh . ' ' . $timem;
}
$preparedStatement = $db->prepare("INSERT INTO races (title, description, date, is_general, location, organizer, director, permalink) VALUES (:title, :description, :date, :is_general, :location, :organizer, :director, :permalink)");
$preparedStatement->bindParam(':title', $title);
$preparedStatement->bindParam(':description', $description);
$preparedStatement->bindParam(':date', $date);
//$preparedStatement->bindParam(':enddate', $enddate);
$preparedStatement->bindParam(':is_general', $general);
$preparedStatement->bindParam(':location', $location);
$preparedStatement->bindParam(':organizer', $organizer);
$preparedStatement->bindParam(':director', $director);
$preparedStatement->bindParam(':permalink', $permalink);
$paramsArray = array(
	'title' => $title,
	'description' => $description,
	'date' => $date,
	'recurring' => $recurring,
	'general' => $general,
	'location' => $location,
	'organizer' => $organizer,
	'director' => $director,
	'permalink' => $permalink
);
$result = $preparedStatement->execute();
if ($result !== false) {
	$race_id = $db->lastInsertId();
} else {
	fail('Failed to add race to database.');
	//fail($db->errorInfo());
	//fail($paramsArray);
}

//also add join race types to database:
if (isset($_POST['types'])) {
    $race_types = $_POST['types'];
    foreach ($race_types as $type) {
    	$type_id = $type;
    	//TODO: ADD CHECK TO SEE IF THIS JOINER ALREADY EXISTS.
		//now add to types join races table:
		$join_types_races = "INSERT INTO races_join_types (`race_id`, `type_id`) VALUES (:race_id, :type_id)";
		$joinTypeRaceprepStmt = $db->prepare($join_types_races);
		$joinTypeRaceprepStmt->bindParam(':race_id', $race_id);
		$joinTypeRaceprepStmt->bindParam(':type_id', $type_id);
		$joinTypeRace_result = $joinTypeRaceprepStmt->execute();
		if ($joinTypeRace_result !== false) {
			//successfully added 
		} else {
			fail('Failed to add join type race ids to database.');
		}
    }
}

$now = date("Y-m-d H:i:s");
$paramsArray['timestamp'] = $now;
$paramsArray['datesubmitted'] = $_POST['date'];
$paramsArray['datestring'] = $dateString;
success($paramsArray); 

exit;
?>