<?php
include('dbc.php');
if($_FILES['file-0']['size'] > 0 && !empty($_POST['pickrace'])) {
	$filename = $_FILES['file-0']['tmp_name'];
	$file = fopen($filename, "r");
	$count = 0;
	$newEvent = false;
	$thisEvent = '';
	$thisEventID = '';
	$eventsArray = array();
	$dataArray = array();
	$raceID = $_POST['pickrace'];
	$raceName = $_POST['racename'];
	$hasCountry = false;
	//get the data from CSV and put info back into the response 
	while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
		if (!empty($emapData[0])) {
			//start new event type here and add to array
			$newEvent = true;
			$thisEvent = $emapData[0];
			array_push($eventsArray, $emapData[0]);
			//find out if this event exists and if it does then attach its ID here:
			$select_event = "SELECT * from race_events WHERE deleted = 0 and title = :title";
			$eventstmt = $db->prepare($select_event);
			$eventstmt->execute(array(':title' => $thisEvent));
			//todo change to if length result tehn set this piece, but the while "loop" takes care of that right
			//foreach ($eventstmt as $eventrow)
			while($eventrow = $eventstmt->fetch(PDO::FETCH_ASSOC)) {
				$thisEventID = $eventrow['id'];
			}
		//} else if ($emapData[1] == 'Place' || $emapData[1] == 'PLACE' || $emapData[1] == 'place') {
		} else if (strtolower($emapData[1]) == 'place') {
			//then set emapData1 to be the place for the next time around????? um. yeah...
			//so the logic is:
			//if emap 1 is place then now for the rest of them (itll eval in the next if? or a switch statement. set a bool to use next time
			//then if emap 2 is place then for the rest of them use emap 2 for place, and so on and so forth for the rest of the damn cols.)
			//$place = $emapData[1];
			$placeNumber = 1;
			$timeNumber = 2;
			$bib_numberNumber = 3;
			$last_nameNumber = 4;
			$first_nameNumber = 5;
			$ageNumber = 6;
			$graduation_yearNumber = 7;
			$hometownNumber = 8;
			$stateNumber = 9;
			$countryNumber = 10;
			$schoolNumber = 11;
			$sexNumber = 12;
			for ($i=1; $i<13; $i++) {
				if (strtolower($emapData[$i]) == 'place') {
					$placeNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'time') {
					$timeNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'bib_number') {
					$bib_numberNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'last_name') {
					$last_nameNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'first_name') {
					$first_nameNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'age') {
					$ageNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'graduation_year') {
					$graduation_yearNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'hometown') {
					$hometownNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'state') {
					$stateNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'country') {
					$countryNumber = $i;
					$hasCountry = true;
				}
				elseif (strtolower($emapData[$i]) == 'school') {
					$schoolNumber = $i;
				}
				elseif (strtolower($emapData[$i]) == 'sex') {
					$sexNumber = $i;
				}
			}
		} elseif (!empty($emapData[1])) {
			$newEvent = false;
			$thisSchoolID = '';
			$thisRunnerID = '';
			//find if the school exists and add its ID if so.
			$select_schools = "SELECT * from schools WHERE deleted = 0 and title = :title";
			$schoolsstmt = $db->prepare($select_schools);
			$schoolsstmt->execute(array(':title' => $emapData[9]));
			while($schoolrow = $schoolsstmt->fetch(PDO::FETCH_ASSOC)) {
				$thisSchoolID = $schoolrow['id'];
			}
			//find if the runner exists and add zher/zhis ID if so.
			//TODO: UPDATE BASED ON EVENT TYPE OR RACE TYPE. MAKE IT HOMETOWN FOR NON-SCHOOL RACES
			//$select_runner = "SELECT * from runners WHERE deleted = 0 and first_name = :first_name and last_name = :last_name and school_id = :school_id";
			$select_runner = "SELECT * from runners WHERE deleted = 0 and first_name = :first_name and last_name = :last_name";
			$runnerstmt = $db->prepare($select_runner);
			/*$runnersQueryArray = array(
									':first_name' => $emapData[5],
									':last_name' => $emapData[4],
									':school_id' => $thisSchoolID,
								);*/
			$runnersQueryArray = array(
				':first_name' => $emapData[5],
				':last_name' => $emapData[4]
			);
			$runnerstmt->execute($runnersQueryArray);
			while($runnerrow = $runnerstmt->fetch(PDO::FETCH_ASSOC)) {
				$thisRunnerID = $runnerrow['id'];
			}
			$countryEntry = 'United States';
			if (!empty($emapData[$countryNumber]) && $hasCountry) {
				$countryEntry = $emapData[$countryNumber];
			}
			array_push($dataArray, 
						array(
							'place' => $emapData[$placeNumber],
							'time' => $emapData[$timeNumber],
							'bib_number' => $emapData[$bib_numberNumber],
							'last_name' => $emapData[$last_nameNumber],
							'first_name' => $emapData[$first_nameNumber],
							'runner_id' => $thisRunnerID,
							'age' => $emapData[$ageNumber],
							'graduation_year' => $emapData[$graduation_yearNumber],
							'hometown' => $emapData[$hometownNumber],
							'country' => $countryEntry,
							'school' => $emapData[$schoolNumber],
							'school_id' => $thisSchoolID,
							'sex' => $emapData[$sexNumber],
							'event' => $thisEvent,
							'event_id' => $thisEventID
						)
					);
		}
		$count++;
	}
	//$resultsArray = array($eventsArray, $dataArray);
	$resultsArray['events'] = $eventsArray;
	$resultsArray['data'] = $dataArray;
	$now = date("Y-m-d H:i:s");
	$resultsArray['timestamp'] = $now;
	$resultsArray['race_title'] = $raceName;
	$resultsArray['race_id'] = $raceID;
	success($resultsArray);  
/*} else if($_FILES['file-0']['size'] < 1) {
	fail('ADD AN EXCEL SHEET!' . $_FILES['file']['type']);*/
} else if(empty($_POST['pickrace'])) {
	fail('You gotta select a race to add results to.');
}
?>