<?php
include('dbc.php');

$data = $_POST['items'];
$theAction = $data['addwhat'];

if ($theAction === 'events') {
	$updateTable = 'race_events';
	$returnArray = array();
	$raceID = $_POST['race_id'];
	$eventsArray = $data['eventsArray'];
	if (is_array($eventsArray)) {
		foreach($eventsArray as $eventValue) {
			$event_id = $eventValue['event_id'];
			$eventName = $eventValue['event_name'];
			$event_permalink = sanitize_titler($eventName);
			if ($eventName) {
				if (!$event_id) {
					$insert_event = "INSERT INTO race_events (`title`, `permalink`) VALUES (:title, :permalink);";
					$eventpreparedStatement = $db->prepare($insert_event);
					$eventpreparedStatement->bindParam(":title", $eventName);
					$eventpreparedStatement->bindParam(":permalink", $event_permalink);
					$events_result = $eventpreparedStatement->execute();
					if ($events_result !== false) {
						//ok it's a new race successfully added so we need to add its joins:
						$event_id = $db->lastInsertId();
						
					} else {
						fail('Failed to add event to database.');
					}
				}
			} 
			if ($event_id && $event_id !== '') {
				//TODO: ADD CHECK TO SEE IF THIS JOINER ALREADY EXISTS.
				//now add to events join races table:
				$join_events_races = "INSERT INTO events_join_races (`race_id`, `event_id`) VALUES (:race_id, :event_id)";
				$joinEvtRaceprepStmt = $db->prepare($join_events_races);
				$joinEvtRaceprepStmt->bindParam(':race_id', $raceID);
				$joinEvtRaceprepStmt->bindParam(':event_id', $event_id);
				$joinEvtRace_result = $joinEvtRaceprepStmt->execute();
				if ($joinEvtRace_result !== false) {
					//successfully added 
				} else {
					fail('Failed to add join event race ids to database.');
				}
			} else {
				fail('Failed to find an event ID.' . $eventName);
			}
			if (!$eventName && !$event_id) {
				fail('Every event needs a name');
			}
			
		}
	} else {
		fail('event data is not an array');
	}
	$now = date("Y-m-d H:i:s");
	$returnArray['timestamp'] = $now;
	$returnArray['race_id'] = $raceID;
	success($returnArray);
}
else if ($theAction == 'schools') {
	$updateTable = 'schools';
	$returnArray = array();
	$raceID = $_POST['race_id'];
	$schoolsArray = $data['schoolsArray'];
	if (is_array($schoolsArray)) {
		foreach($schoolsArray as $schoolValue) {
			$school_id = $schoolValue['school_id'];
			$schoolName = $schoolValue['school_name'];
			$school_permalink = sanitize_titler($schoolName);
			//first don't add a permalink that already exists.
			$select_ = "SELECT * FROM runners WHERE `permalink` = :permalink AND `deleted` = 0";
			$select_PrepStmt = $db->prepare($select_);
			$select_PrepStmt->bindParam(':permalink', $school_permalink);
			$selectResult = $select_PrepStmt->execute();
			//if this permalink already exists in db, add a random number to the end of it
			if ($selectResult !== false && $select_PrepStmt->rowCount() > 0) {
				//TODO: switch to random_int(min,max) when upgraded to PHP 7.0.
				$school_permalink = $school_permalink . '-' . rand(1, 10939);
			}
			if ($schoolName && !$school_id) {
				$insert_school = "INSERT INTO schools (`title`, `permalink`) VALUES (:title, :permalink);";
				$schoolpreparedStatement = $db->prepare($insert_school);
				// $schoolpreparedStatement->bindParam(":title", $schoolName);
				// $schoolpreparedStatement->bindParam(":permalink", $school_permalink);
				$executeArray = array(
									':title' => $schoolName,
									':permalink' => $school_permalink
								);
				$schools_result = $schoolpreparedStatement->execute($executeArray);
				if ($schools_result !== false) {
					//ok it's a new race successfully added so we need to add its joins:
					$school_id = $db->lastInsertId();
					
				} else {
					fail('Failed to add school to database.');
				}
			}
			if ($school_id && $school_id !== '' && $school_id !== 0) {
				//TODO: ADD CHECK TO SEE IF THIS JOINER ALREADY EXISTS.
				//now add to schools join races table:
				$join_schools_races = "INSERT INTO schools_join_races (`race_id`, `school_id`) VALUES (:race_id, :school_id)";
				$joinSchoolRaceprepStmt = $db->prepare($join_schools_races);
				$joinSchoolRaceprepStmt->bindParam(':race_id', $raceID);
				$joinSchoolRaceprepStmt->bindParam(':school_id', $school_id);
				$joinSchoolRace_result = $joinSchoolRaceprepStmt->execute();
				if ($joinSchoolRace_result !== false) {
					//successfully added 
				} else {
					fail('Failed to add join event race ids to database.');
				}
			} else {
				fail('Failed to find an school ID.');
			}
			if (!$schoolName && !$school_id) {
				fail('Every school needs a name');
			}
			
		}
	} else {
		fail('schools data is not an array');
	}
	$now = date("Y-m-d H:i:s");
	$returnArray['timestamp'] = $now;
	$returnArray['race_id'] = $raceID;
	success($returnArray);
}
else if ($theAction == 'runners') {
	$updatetable = 'runners';
	$returnArray = array();
	$raceID = $_POST['race_id'];
	$runnersArray = $data['runnersArray'];
	if (is_array($runnersArray)) {
		foreach($runnersArray as $runnersValue) {
			$runner_id = $runnersValue['runner_id'];
			$first_name = ucfirst(strtolower(remove_accentsr($runnersValue['first_name'])));
			$last_name = ucfirst(strtolower(remove_accentsr($runnersValue['last_name'])));
			$last_name_first_name = $last_name . '-' . $first_name;
			$runner_permalink = sanitize_titler($last_name_first_name);
			$place = $runnersValue['place'];
			$bib_number = $runnersValue['bib_number'];
			$bib_number = str_replace('#', '', $bib_number);
			$event_id = $runnersValue['event_id'];
			$event_type_id = $runnersValue['event_type_id'];
			$heat_num = $runnersValue['heat_num'];
			$school_id = $runnersValue['school_id'];
			$ageVal = $runnersValue['age'];
			if ($ageVal === '' || $ageVal === 0 || !$ageVal) {
				$ageVal = null;
			}
			if (!$event_type_id) {
				$event_type_id = 1;
			}
			if (!$heat_num) {
				$heat_num = null;
			}
			//now start adding
			if (!$runner_id || $runner_id === 0) {
				//first don't add a permalink that already exists.
				$select_runner = "SELECT * FROM runners WHERE `permalink` = :permalink AND `deleted` = 0";
				$selectRunnerPrepStmt = $db->prepare($select_runner);
				$selectRunnerPrepStmt->bindParam(':permalink', $runner_permalink);
				$selectResult = $selectRunnerPrepStmt->execute();
				//if this permalink already exists in db, add a random number to the end of it
				if ($selectResult !== false && $selectRunnerPrepStmt->rowCount() > 0) {
					//TODO: switch to random_int(min,max) when upgraded to PHP 7.0.
					$runner_permalink = $runner_permalink . '-' . rand(1, 10939);
				}
				$insert_runner = "INSERT INTO runners (`last_name`,`first_name`,`school_id`,`graduation_year`,`age`,`hometown`, `state`, `country`, `sex`, `permalink`) VALUES (:last_name, :first_name, :school_id, :graduation_year, :age, :hometown, :state, :country, :sex, :permalink);";
				
				$runnerpreparedStatement = $db->prepare($insert_runner);
				$runnerpreparedStatement->bindParam(':last_name', $last_name);
				$runnerpreparedStatement->bindParam(':first_name', $first_name);
				$runnerpreparedStatement->bindParam(':school_id', $school_id);
				$runnerpreparedStatement->bindParam(':graduation_year', $runnersValue['graduation_year']);
				$runnerpreparedStatement->bindParam(':age', $ageVal);
				$runnerpreparedStatement->bindParam(':hometown', $runnersValue['hometown']);
				$runnerpreparedStatement->bindParam(':state', $runnersValue['state']);
				$runnerpreparedStatement->bindParam(':country', $runnersValue['country']);
				$runnerpreparedStatement->bindParam(':sex', $runnersValue['sex']);
				$runnerpreparedStatement->bindParam(':permalink', $runner_permalink);
				$runnerresult = $runnerpreparedStatement->execute();
				if ($runnerresult !== false) {
					//successfully added, now select to find its new ID:
					$runner_id = $db->lastInsertId();
				} else {
					fail('Failed to add runner to database.');
				}
			} else {
				//modify existing runner and add this results to the join results runner table yeap.
				$update_runner = "UPDATE runners SET `last_name` = :last_name,
					`first_name` = :first_name,
					`school_id` = :school_id,
					`graduation_year` = :graduation_year,
					`age` = :age,
					`hometown` = :hometown,
					`state` = :state,
					`country` = :country,
					`sex` = :sex 
					WHERE `id` = :runner_id";
				$runnerpreparedStatement = $db->prepare($update_runner);
				$runnerpreparedStatement->bindParam(':last_name', $last_name);
				$runnerpreparedStatement->bindParam(':first_name', $first_name);
				$runnerpreparedStatement->bindParam(':school_id', $school_id);
				$runnerpreparedStatement->bindParam(':graduation_year', $runnersValue['graduation_year']);
				$runnerpreparedStatement->bindParam(':age', $ageVal);
				$runnerpreparedStatement->bindParam(':hometown', $runnersValue['hometown']);
				$runnerpreparedStatement->bindParam(':state', $runnersValue['state']);
				$runnerpreparedStatement->bindParam(':country', $runnersValue['country']);
				$runnerpreparedStatement->bindParam(':sex', $runnersValue['sex']);
				$runnerpreparedStatement->bindParam(':runner_id', $runner_id);
				$runnerresult = $runnerpreparedStatement->execute();
				if ($runnerresult !== false) {
					//successfully added, now idk
				} else {
					fail('Failed to edit runner in database.');
				}
			}
			//TODO: if this join doesn't exist, add it
			//add runner join schools
			$join_runner_school = "INSERT INTO runners_join_schools (`runner_id`, `school_id`, `graduation_year`) VALUES (:runner_id, :school_id, :graduation_year)";
			$joinRunSchoolprepStmt = $db->prepare($join_runner_school);
			$joinRunSchoolprepStmt->bindParam(':runner_id', $runner_id);
			$joinRunSchoolprepStmt->bindParam(':school_id', $school_id);
			$joinRunSchoolprepStmt->bindParam(':graduation_year', $runnersValue['graduation_year']);
			$joinRunSchool_result = $joinRunSchoolprepStmt->execute();
			if ($joinRunSchool_result !== false) {
				//successfully added 
			} else {
				fail('Failed to add join event race ids to database.');
			}
			//now add the results info
			if (is_array($event_id)) {
				foreach($event_id as $eventObj) {
					$results_insert = "INSERT INTO results (`place`, `time`, `runner_id`, `event_id`, `event_type_id`, `heat_number`, `race_id`, `bib_number`) VALUES (:place, :time, :runner_id, :event_id, :event_type_id, :heat_number, :race_id, :bib_number)";
					$resultsPrepStmt = $db->prepare($results_insert);
					$resultsPrepStmt->bindParam(':place', $place);
					$resultsPrepStmt->bindParam(':time', $runnersValue['time']);
					$resultsPrepStmt->bindParam(':runner_id', $runner_id);
					$resultsPrepStmt->bindParam(':event_id', $eventObj['event_id']);
					$resultsPrepStmt->bindParam(':event_type_id', $eventObj['event_type_id']);
					$resultsPrepStmt->bindParam(':heat_number', $eventObj['heat_num']);
					$resultsPrepStmt->bindParam(':race_id', $raceID);
					$resultsPrepStmt->bindParam(':bib_number', $bib_number);
					$results_result = $resultsPrepStmt->execute();
					if ($results_result !== false) {
						//successfully added do nothing
					} else {
						fail('Failed to add multi events for a runner to database.');
					}
				}
			} else {
				$results_insert = "INSERT INTO results (`place`, `time`, `runner_id`, `event_id`, `event_type_id`, `heat_number`, `race_id`, `bib_number`) VALUES (:place, :time, :runner_id, :event_id, :event_type_id, :heat_number, :race_id, :bib_number)";
				$resultsPrepStmt = $db->prepare($results_insert);
				$resultsPrepStmt->bindParam(':place', $place);
				$resultsPrepStmt->bindParam(':time', $runnersValue['time']);
				$resultsPrepStmt->bindParam(':runner_id', $runner_id);
				$resultsPrepStmt->bindParam(':event_id', $event_id);
				$resultsPrepStmt->bindParam(':event_type_id', $event_type_id);
				$resultsPrepStmt->bindParam(':heat_number', $heat_num);
				$resultsPrepStmt->bindParam(':race_id', $raceID);
				$resultsPrepStmt->bindParam(':bib_number', $bib_number);
				$results_result = $resultsPrepStmt->execute();
				if ($results_result !== false) {
					//successfully added do nothing
				} else {
					fail('Failed to add results to database.');
				}
			}
			
		}
	}
	$now = date("Y-m-d H:i:s");
	$returnArray['timestamp'] = $now;
	$returnArray['race_id'] = $raceID;
	success($returnArray);
}
else {
	fail('This code didnt recognize any params!');
}
?>