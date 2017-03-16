jQuery(document).ready(function() {
    $ = jQuery;
    $('.addraceformbox').hide();
    $('.phase2').hide();
    $('#addarace').click( function() {
    	$('.addraceformbox').show();
    });
    function submitRunners(formId, event_id, race_id) {
    	var formData = {};
		var runnersArray = [];
		
		if (typeof state == undefined) {
			state = null;
		}
		if (typeof school == undefined) {
			school = null;
		}
		if (typeof hometown == undefined) {
			hometown = null;
		}
		formData.addwhat = 'runners';
		$('#' + formId + ' div.runnersSelectContainer').each(function(k,v) {
			var lastName = $(this).children('input[type="text"].last_name').val().replace("’","'").trim();
			var firstName = $(this).children('input[type="text"].first_name').val().replace("’","'").trim();
			var state = $(this).data('old_data').state;
			var school = $(this).data('old_data').school;
			var hometown = $(this).data('old_data').hometown;
			var event_type_id = $(this).data('old_data').event_type_id;
			var heat_num = $(this).data('old_data').heat_num;
			if ($(this).has('.runnersSelector').length) {
				//only add if they picked something in select box then just update that one
    			if ($(this).children('select').val() !== '' && $(this).has('select').length) {
    				var selectedId = $(this).children('select').val();
    				if (arrayObjectIndexOf(runnersArray, selectedId, 'runner_id') === -1 || runnersArray.length === 0) {
	    				runnersArray.push({'runner_id': selectedId, 
											'event_id': event_id, 
											'first_name': firstName, 
											'last_name': lastName, 
											'event_type_id': event_type_id, 
											'heat_num': heat_num,
											'place': $(this).data('old_data').place, 
											'bib_number': $(this).data('old_data').bib_number, 
											'school_id': $(this).data('old_data').school_id, 
											'school': school, 
											'time': $(this).data('old_data').time, 
											'age': $(this).data('old_data').age,
											'hometown': hometown,
											'state': state,
											'country': $(this).data('old_data').country,
											'sex': $(this).data('old_data').sex,
											'graduation_year': $(this).data('old_data').graduation_year
	    								});
	    			}
	    			else {
	    				if (runnersArray.length !== 0) {
	    				var thisEventArray = [];
	    				var oldIndex = arrayObjectIndexOf(runnersArray, selectedId, 'runner_id');
	    					if ($.isArray(runnersArray[oldIndex].event_id)) {
		    					runnersArray[oldIndex].event_id.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
		    				}
		    				else {
		    					thisEventArray.push({'event_id': runnersArray[oldIndex].event_id, 'event_type_id': runnersArray[oldIndex].event_type_id, 'heat_num': runnersArray[oldIndex].heat_num});
		    					thisEventArray.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
	    						runnersArray[oldIndex].event_id = thisEventArray;
		    				}
	    				}
		    				
	    			}
    			} else {
    				//if not then if not in array, add a new runner
    				if ((arrayObjectIndexOf(runnersArray, firstName, 'first_name') === -1 
						 && arrayObjectIndexOf(runnersArray, lastName, 'last_name') === -1
						 && arrayObjectIndexOf(runnersArray, school, 'school') === -1 
						 && arrayObjectIndexOf(runnersArray, hometown, 'hometown') === -1
						 ) 
						|| runnersArray.length === 0) {
    					runnersArray.push({'runner_id': null, 
	    								   'first_name': firstName, 
										   'last_name': lastName, 
	    								   'event_id': event_id, 
											'event_type_id': $(this).data('old_data').event_type_id, 
											'heat_num': $(this).data('old_data').heat_num,
										   'place': $(this).data('old_data').place, 
										   'bib_number': $(this).data('old_data').bib_number, 
	    								   'school_id': $(this).data('old_data').school_id, 
	    								   'school': school, 
	    								   'time': $(this).data('old_data').time, 
										   'age': $(this).data('old_data').age,
										   'hometown': hometown,
										   'state': state,
										   'country': $(this).data('old_data').country,
										   'sex': $(this).data('old_data').sex,
										   'graduation_year': $(this).data('old_data').graduation_year
	    								});
    				}
    				else if (runnersArray.length !== 0) {
	    				var thisEventArray = [];
	    				//var oldIndex = arrayObjectIndexOf(runnersArray, firstName, 'first_name');
	    				var oldIndex = arrayMultiObjectIndexOf(runnersArray, [firstName, lastName, school, hometown], ['first_name', 'last_name', 'school', 'hometown']);
	    				if ($.isArray(runnersArray[oldIndex].event_id)) {
	    					runnersArray[oldIndex].event_id.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
	    				}
	    				else {
	    					thisEventArray.push({'event_id': runnersArray[oldIndex].event_id, 'event_type_id': runnersArray[oldIndex].event_type_id, 'heat_num': runnersArray[oldIndex].heat_num});
	    					thisEventArray.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
    						runnersArray[oldIndex].event_id = thisEventArray;
	    				}
	    			}
    			}
			} 
			else {
				if (arrayMultiObjectIndexOf(runnersArray, [firstName, lastName, school, hometown], ['first_name', 'last_name', 'school', 'hometown'] === -1) 
					|| runnersArray.length === 0) {
					runnersArray.push({'runner_id': null, 
									   'first_name': firstName, 
									   'last_name': lastName, 
									   'event_id': event_id, 
										'event_type_id': $(this).data('old_data').event_type_id, 
										'heat_num': $(this).data('old_data').heat_num,
									   'place': $(this).data('old_data').place, 
									   'bib_number': $(this).data('old_data').bib_number, 
									   'school_id': $(this).data('old_data').school_id, 
									   'school': school, 
									   'time': $(this).data('old_data').time, 
										'age': $(this).data('old_data').age,
										'hometown': hometown,
										'state': state,
										'country': $(this).data('old_data').country,
										'sex': $(this).data('old_data').sex,
										'graduation_year': $(this).data('old_data').graduation_year
									});
				}
				else if (runnersArray.length !== 0) {
    				var thisEventArray = [];
    				var oldIndex = arrayMultiObjectIndexOf(runnersArray, [firstName, lastName, school, hometown], ['first_name', 'last_name', 'school', 'hometown']);
    				console.log('oldIndex');
    				console.log(oldIndex);
    				console.log('runnersArray');
    				console.log(runnersArray);
    				if ($.isArray(runnersArray[oldIndex].event_id)) {
    					runnersArray[oldIndex].event_id.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
    				}
    				else {
    					thisEventArray.push({'event_id': runnersArray[oldIndex].event_id, 'event_type_id': runnersArray[oldIndex].event_type_id, 'heat_num': runnersArray[oldIndex].heat_num});
    					thisEventArray.push({'event_id': event_id, 'event_type_id': event_type_id, 'heat_num': heat_num});
    					runnersArray[oldIndex].event_id = thisEventArray;
    				}
    			}

			}
		});
		formData.runnersArray = runnersArray;
		console.log('runnersArray');
		console.log(runnersArray);
		//first fadeOut this form:
		$('#' + formId).fadeOut();
		//now do that ajax call to add them into database:
		$.ajax({
    		method: "POST",
    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/additems.php",
    		data: {items: formData, race_id: race_id},
    		dataType: "json",
			cache: false,
    		success: function(json) {
    			//congrats it is successful
    		}
		})
		.done(function(rdata) {
			$(".message").fadeOut();
			var jdata = rdata;
			if (jdata.status == "fail") {
				$('#message-' + formId).html(jdata.message).fadeIn();
			}
			if (jdata.status == "success") {
				console.log('success added runners');
				$('#message-' + formId).removeClass('error');
				$('#message-' + formId).addClass('success');
    			$('#message-' + formId).fadeIn(2000);
    			//location.reload();
			}
		})
		.fail(function() {
			$('#message-' + formId).html('Sorry there was an issue submitting this race, please try again.');
			$('#message-' + formId).fadeIn();
			//$('#message-' + formId).fadeOut(2000);
			//$('#' + formId).fadeIn(2000);
		    console.log('fail error');
		});
    }
    //submit csv file results:
    $('#submitResults').click(function() {
    	//var data = $("#resultUploadForm :input").serializeArray();
    	var data = new FormData();
    	//data.append('file',jQuery('#file')[0].files);
		data.append('pickrace',$('select#pickrace option:selected').val());
		data.append('racename',$('select#pickrace option:selected').text());
    	$.each($('#file')[0].files, function(i, file) {
		    data.append('file-'+i, file);
		});
    	//$.post(jQuery("#resultUploadForm").attr('action'), data, function(json){
    	$.ajax({
    		method: "POST",
    		url: $("#resultUploadForm").attr('action'),
    		data: data,
    		/*dataType: 'json',*/
    		cache: false,
    		contentType: false,
    		processData: false,
    		success: function(json) {
    			//console.log('success???');
    		}
    	})
		.done(function(rdata) {
			$(".message").fadeOut();
			var jdata = JSON.parse(rdata);
			if (jdata.status == "fail") {
				jQuery(".message").html(jdata.message).fadeIn();
				console.log(jdata.message);
			}
			if (jdata.status == "success") {
				jQuery("#resultUploadForm :input[name!=action]").val("");
				jQuery("#resultUploadForm").fadeOut(500);
	            jQuery(".message").html("Results Submission successful!").fadeIn();
				
				var resultsData = jdata.data;
				//phase2(resultsData);
				eventsPhase(resultsData);
			}
		})
		.fail(function() {
		    console.log('fail error');
		})
		.always(function() {
		    //alert( "finished" );
		});
    });
    function eventsPhase(data) {
    	$('div.phase1').fadeOut();
    	$(".message").fadeOut(2000);
		var raceTitle = data.race_title;
    	$('div.phase2 #raceTitle').html(raceTitle);
		var raceID = data.race_id;
		$('div.contentArea').append('<p>Check to see if these already exist.</p>');
		$('div.contentArea').append('<div class="eventsSelect"></div>');
		$('div.eventsSelect').append('<form id="eventsForm"></form>');
		var nextEvent = false;
		var addEventToDb = true;
		var options = '';
    	$.ajax({
    		method: "GET",
    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/listitems.php?listwhat=eventsAndTypes",
    		cache: false,
    		contentType: false,
    		success: function(json) {
    			var parsedJSON = JSON.parse(json);
    			var eventList;
    			var updatedRunnerData = [];
    			var selectBox = '';
    			var alreadyExistsClass = '';
    			var selectedText = '';
    			options = '';
    			var typeSelectBox = '';
    			var typeOptions = '';
    			var typeSelected = '';
    			$.each(data.data, function(key, value) {
    				updatedRunnerData.push({id: value.runner_id,
    					                    runner_id: value.runner_id,
											place: value.place,
											bib_number: value.bib_number,
											last_name: value.last_name,
											first_name: value.first_name,
											time: value.time,
											runner_temp_id: key, 
											old_school: value.school, 
											school: value.school, 
											school_id: value.school_id,
											event_id: value.event_id,
											event_type_id: value.event_type_id,
											event: value.event,
											age: value.age,
											hometown: value.hometown,
											state: value.state,
											country: value.country,
											sex: value.sex,
											graduation_year: value.graduation_year
										});	
    			});

				$.each(data.events, function(key, value) {
					options = '';
					typeOptions = '';
					alreadyExistsClass = '';
					
					var heatNumGuess = '';
					var valueGuess = value;
					$.each(parsedJSON.data.event_types, function(tidx, tval) {
						typeSelected = '';
						//if this value has the word 'final, semi-final, heat' etc, then select that type
						if ((hasWordsOfEachOther(tval.title, value) || hasWordsOfEachOther(tval.title + 's', value)) 
							 && tval.title !== 'Normal') {
							if (typeSelected !== 'selected' && tval.title !== 'Heat') {
								typeSelected = 'selected';
								if (valueGuess.indexOf(tval.title + 's') !== -1) {
									valueGuess = valueGuess.replace(tval.title + 's','').trim();
								} else {
									valueGuess = valueGuess.replace(tval.title,'').trim();
								}
							}
						} 
						typeOptions += '<option id="" value="' + tval.id + '"' + typeSelected + '>' + tval.title + '</option>';
					});
					if (value.indexOf('Heat') !== -1) {
						heatNumGuess = value.charAt(value.indexOf('Heat') + 5);
						valueGuess = valueGuess.slice(0, valueGuess.indexOf('Heat') + 5) + valueGuess.slice(valueGuess.indexOf('Heat') + 6).trim();
						valueGuess = valueGuess.replace('Heat','').trim();
					}
					$.each(parsedJSON.data.events, function(idx, val) {
						selectedText = '';
						if (isSimilar(val.title, valueGuess)) {
							if (val.title === valueGuess) {
								selectedText = 'selected';
							}
							options += '<option id="" value="' + val.id + '" ' + selectedText + '>' + val.title + '</option>';
						}
					});

					if (options !== '') {
						options = '<option value="">Use Pre-existing?</option>' + options;
						selectBox = '<select class="eventSelector" id="">' + options + '</select>';
						alreadyExistsClass = 'already-exists';
					} else {
						selectBox = '';
						alreadyExistsClass = 'pink';
					}
					typeSelectBox = '<select class="eventTypeSelector" id="">' + typeOptions + '</select>';
					
					var appendText = '<div class="selectingOldOrNew eventSelectContainer ' + alreadyExistsClass + '">';
					appendText += '<div class="old-data-text">Text from sheet: <strong>' + value + '</strong></div>';
					appendText += '<div class="new-data-text" data-oldevent="' + value + '">'
						appendText += '<input type="text" class="eventNameInput" value="' + valueGuess + '"/>';
						appendText += selectBox;
						appendText += '<div class="eventTypeContainer column"> Event Type: ' + typeSelectBox + '</div>';
						appendText += '<div class="heatNum column">Heat Number (if applicable): <input type="text" class="heatNumInput" value="' + heatNumGuess + '"/></div>';
						appendText += '</div>';
					appendText += '</div>';
					$('div.eventsSelect form').append(appendText);
				});
				$('div.eventsSelect form').append('<a class="submit button" id="submitAllEvents">Submit Data/Changes</a>');
		
				$('#submitAllEvents').click(function(e) {
		    		e.stopPropagation();
		    		var formData = {};
		    		var eventsArray = [];
		    		formData.addwhat = 'events';
		    		$('.eventSelectContainer .new-data-text').each(function(k,v) {
		    			var thisOldEvent = $(this).data('oldevent');
		    			var thisNewEvent = $(this).children('input[type="text"].eventNameInput').val().replace("’","'").trim();
		    			var thisNewEventId = null;
		    			var thisEventTypeId = $(this).children('.eventTypeContainer').children('select.eventTypeSelector').val();
		    			var heatNumberVal = null;
		    			if (parseInt($(this).children('select.eventTypeSelector').val(), 10) === 2) {
		    				heatNumberVal = 1;
		    				if ($(this).children('input[type="text"].heatNumInput').val()) {
		    					heatNumberVal = parseInt($(this).children('input[type="text"].heatNumInput').val(),10);
		    				}
		    			}
		    			if ($(this).has('select.eventSelector').length) {
		    				//only add if they picked something in select box then just update that one
		    				
			    			if ($(this).children('select.eventSelector').val() !== '') {
			    				thisNewEventId = $(this).children('select.eventSelector').val();
			    				thisNewEvent = $(this).children('select.eventSelector').children(':selected').text().trim();

			    				if (arrayObjectIndexOf(eventsArray, thisNewEventId, 'event_id') === -1 || eventsArray.length === 0) {
									//now check to make sure the name doesn't already exist, if it does, just update that
									if (arrayObjectIndexOf(eventsArray, thisNewEvent, 'event_name') !== -1 && eventsArray.length !== 0) {
										var arrayIndex = arrayObjectIndexOf(eventsArray, thisNewEvent, 'event_name');
										eventsArray[arrayIndex] = {'event_id': thisNewEventId, 'event_name': thisNewEvent, 'event_type_id':  thisEventTypeId, 'heat_num': heatNumberVal};
									} 
									else {
										eventsArray.push({'event_id': thisNewEventId, 'event_name': thisNewEvent, 'event_type_id':  thisEventTypeId, 'heat_num': heatNumberVal});
									}
								}
			    				$.each(updatedRunnerData, function(key, item) {
			    					if (item.event === thisOldEvent) {
			    						item.event_id = thisNewEventId;
			    						item.event = thisNewEvent;
			    						item.event_type_id = thisEventTypeId;
			    						item.heat_num = heatNumberVal;
			    					}
			    				});
			    			} else {
			    				//if not in array then add a new event 
			    				if (arrayObjectIndexOf(eventsArray, thisNewEvent, 'event_name') === -1) {
			    					eventsArray.push({'event_id': null, 'event_name': thisNewEvent, 'event_type_id':  thisEventTypeId, 'heat_num': heatNumberVal});
			    				}
			    				$.each(updatedRunnerData, function(key, item) {
			    					if (item.event === thisOldEvent) {
			    						item.event = thisNewEvent;
			    						item.event_type_id = thisEventTypeId;
			    						item.heat_num = heatNumberVal;
			    					}
			    				});
			    			}

			    			
		    			} else {
		    				if (arrayObjectIndexOf(eventsArray, thisNewEvent, 'event_name') === -1) {
		    					eventsArray.push({'event_id': null, 'event_name': thisNewEvent, 'event_type_id':  thisEventTypeId, 'heat_num': heatNumberVal});
		    				}

		    				$.each(updatedRunnerData, function(key, item) {
		    					if (item.event === thisOldEvent) {
		    						item.event = thisNewEvent;
		    						item.event_type_id = thisEventTypeId;
		    						item.heat_num = heatNumberVal;
		    					}
		    				});
		    			}
		    		});
		    		
		    		formData.eventsArray = eventsArray;

		    		setTimeout(function() {
				    	//delay post?
				    	$.ajax({
				    		method: "POST",
				    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/additems.php",
				    		data: {items: formData, race_id: raceID},
				    		dataType: "json",
							cache: false,
				    		success: function(json) {
				    			//congrats it is successful
				    		}
			    		})
			    		.done(function(rdata) {
							$(".message").fadeOut();
							var jdata = rdata;
							if (jdata.status == "fail") {
								$(".message").html(jdata.message).fadeIn();
							}
							if (jdata.status == "success") {
								console.log('success added events');

				    			$(".message").html('Events successfully submitted.');
				    			$(".message").fadeIn(2000);
				    			//now create modified data and set the school ID
				    			$.each(jdata.data, function(idx, eventdata) {
					    			$.each(updatedRunnerData, function(key, item) {
				    					if (item.event === eventdata.title) {
				    						item.event_id = eventdata.id;
				    					}
				    				});
				    			});
				    			
				    			schoolsPhase({race_id: raceID, race_title: raceTitle, data: updatedRunnerData});
							}
						})
						.fail(function() {
						    console.log('fail error');
						});
				    }, (100));
					return false;
		    		
		    	});
    		}
    	});
    	$('div.phase2').fadeIn();
    }
/*****************************************************************
************                        ********************************
************                        ********************************
************          Schools       ********************************
************           Phase        ********************************
************                        ********************************
********************************************************************
*******************************************************/
    function schoolsPhase(data) {
    	$('div.phase2').fadeOut();
    	$(".message").fadeOut(2000);
    	$('div.contentArea').html('');
    	var raceTitle = data.race_title;
    	$('div.phase2 #raceTitle').html(raceTitle);
		var raceID = data.race_id;
		$('div.contentArea').append('<p>Check to see if these schools already exist and are spelled correctly. Choose a pre-existing from the select box or type corrections in the input box.</p>');
		$('div.contentArea').append('<div class="schoolsSelect"></div>');
		$('div.schoolsSelect').append('<form id="schoolsForm"></form>');
		var options = '';
    	$.ajax({
    		method: "GET",
    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/listitems.php?listwhat=schools",
    		cache: false,
    		contentType: false,
    		success: function(json) {
    			var parsedJSON = JSON.parse(json);
    			var schoolsList = [];
    			var updatedRunnerData = [];
    			var currentSchool = '';
    			var selectBox = '';
    			var alreadyExistsClass = '';
    			var selectedText = '';
    			options = '';
    			//for each runner entry, find the school and add it to our list if it doesnt already exist.
    			//track which school belongs to which runner.
    			//runner id, data-temp-school-id
    			//schools list, and have an updateAll?
    			//each runner, add it if it doesnt exist, but add it to a "runner_temp_id" array! then go back and update the schools by looping those arrays?
				$.each(data.data, function(key, value) {
					if (schoolsList.indexOf(value.school) === -1 || schoolsList.length === 0) {
						schoolsList.push(value.school);
					}
					if (!value.state) {
						value.state = null;
					}
					if (!value.graduation_year) {
						value.graduation_year = null;
					}
					updatedRunnerData.push({id: value.runner_id,
											runner_id: value.runner_id,
											place: value.place,
											bib_number: value.bib_number,
											last_name: value.last_name,
											first_name: value.first_name,
											time: value.time,
											runner_temp_id: key, 
											old_school: value.school, 
											school: value.school, 
											school_id: value.school_id,
											event_id: value.event_id,
											event_type_id: value.event_type_id,
											event: value.event,
											age: value.age,
											hometown: value.hometown,
											state: value.state,
											country: value.country,
											sex: value.sex,
											graduation_year: value.graduation_year
										});		
				});

				$.each(schoolsList, function(key, value) {
					options = '';
					alreadyExistsClass = '';
					$.each(parsedJSON.data, function(idx, val) {
						var cityText = '';
						selectedText = '';
						if (isSimilar(val.title, value) || hasWordsOfEachOther(val.title, value)) {
							if (val.title === value) {
								selectedText = 'selected';
							}
							if (val.city) {
								cityText = ' - ' + val.city;
							}
							options += '<option id="" value="' + val.id + '" ' + selectedText + '>' + val.title + ' ' + cityText + '</option>';
						}
					});
					if (options !== '') {
						options = '<option value="">Use Pre-existing?</option>' + options;
						selectBox = '<select class="schoolsSelector" id="">' + options + '</select>';
						alreadyExistsClass = 'already-exists';
					} else {
						selectBox = '';
						alreadyExistsClass = 'pink';
					}
					$('div.schoolsSelect form').append('<div class="selectingOldOrNew schoolsSelectContainer ' + alreadyExistsClass + '" data-oldschool="' + value + '"><input type="text" value="' + value + '"/>' + selectBox + '</div>');
				});
				//maybe time out this blcok
				setTimeout(function() {
					$('div.schoolsSelect form').append('<div class="padding"><a class="submit button" id="submitAllSchools">Submit Data/Changes</a></div>');
					$('#submitAllSchools').click(function(e) {
			    		e.stopPropagation();
			    		var formData = {};
			    		var schoolsArray = [];
			    		formData.addwhat = 'schools';
			    		$('.schoolsSelectContainer').each(function(k,v) {
			    			var thisOldSchool = $(this).data('oldschool');
			    			var thisNewSchool = $(this).children('input[type="text"]').val().replace("’","'").trim();
			    			var thisNewSchoolId = null;
			    			if ($(this).has('.schoolsSelector').length) {
			    				//if they picked something in the select box, use that to assign joins.
				    			if ($(this).children('select').val() !== '' && $(this).has('select').length) {
				    				thisNewSchoolId = $(this).children('select.schoolsSelector').val();
				    				thisNewSchool = $(this).children('select.schoolsSelector').children(':selected').text().trim();
				    				if (arrayObjectIndexOf(schoolsArray, thisNewSchoolId, 'school_id') === -1 || schoolsArray.length === 0){
				    					//now check to make sure the name doesn't already exist, if it does, just update that
				    					if (arrayObjectIndexOf(schoolsArray, thisNewSchool, 'school_name') !== -1 && schoolsArray.length !== 0) {
				    						var arrayIndex = arrayObjectIndexOf(schoolsArray, thisNewSchool, 'school_name');
				    						schoolsArray[arrayIndex] = {'school_id': thisNewSchoolId, 'school_name': thisNewSchool };
				    					} 
				    					else {
					    					schoolsArray.push({'school_id': thisNewSchoolId, 'school_name': thisNewSchool });
				    					}
					    			}
				    				$.each(updatedRunnerData, function(key, item) {
				    					if (item.school === thisOldSchool) {
				    						item.school_id = thisNewSchoolId;
				    						item.school = thisNewSchool;
				    					}
				    				});
				    			} else {
				    				//if not already in array then add a new school
				    				if (arrayObjectIndexOf(schoolsArray, thisNewSchool, 'school_name') === -1 || schoolsArray.length === 0){
					    				schoolsArray.push({'school_id': null, 'school_name': thisNewSchool});
					    			}
				    				$.each(updatedRunnerData, function(key, item) {
				    					if (item.school === thisOldSchool) {
				    						item.school = thisNewSchool;
				    					}
				    				});
				    			}
			    			} else {
			    				if (arrayObjectIndexOf(schoolsArray, thisNewSchool, 'school_name') === -1 || schoolsArray.length === 0) {
				    				schoolsArray.push({'school_id': null, 'school_name': thisNewSchool});
				    			}
			    				$.each(updatedRunnerData, function(key, item) {
			    					if (item.school === thisOldSchool) {
			    						item.school = thisNewSchool;
			    					}
			    				});
			    			}
			    		});
			    		
			    		formData.schoolsArray = schoolsArray;
			    		
			    		//timeout?
			    		$.ajax({
				    		method: "POST",
				    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/additems.php",
				    		data: {items: formData, race_id: raceID},
				    		dataType: "json",
							cache: false,
				    		success: function(json) {
				    			console.log('success schools status');
				    		}
			    		})
			    		.done(function(rdata) {
							$(".message").fadeOut();
							var jdata = rdata;
							if (jdata) {
								if (jdata.status == "fail") {
									$(".message").html(jdata.message).fadeIn();
								}
								if (jdata.status == "success") {
									console.log('success added schools');
					    			$(".message").html('Schools successfully submitted!');
					    			$(".message").fadeIn();
					    			//now create modified data and set the school ID
					    			$.each(jdata.data, function(idx, schooldata) {
						    			$.each(updatedRunnerData, function(key, item) {
					    					if (item.school === schooldata.title) {
					    						item.school_id = schooldata.id;
					    					}
					    				});
					    			});
					    			console.log('data submitted, set ids: updatedRunnerData:');
					    			console.log(updatedRunnerData);
					    			runnersPhase({race_id: raceID, race_title: raceTitle, data: updatedRunnerData});
								}
							} else {
								$(".message").html('Error adding schools to database.').fadeIn();
							}
						})
						.fail(function() {
						    console.log('fail error');
						});
						return false;
			    	});
				}, (200));
    		}
    	});
    	$('div.phase2').fadeIn();
    }
    function runnersPhase(data) {
    	$('div.phase2').fadeOut();
    	$(".message").fadeOut(2000);
    	$('div.contentArea').html('');
    	var raceTitle = data.race_title;
    	$('div.phase2 #raceTitle').html(raceTitle);
		var raceID = data.race_id;
		$('div.contentArea').append('<p>Check to see if these runners already exist and are spelled correctly. Choose a pre-existing name from the select box or type corrections in the input boxes.</p>');
		$('div.contentArea').append('<div class="runnersSelect"></div>');
		var options = '';
		$.ajax({
    		method: "GET",
    		url: "<?php bloginfo('template_url'); ?>/resultsfiles/listitems.php?listwhat=runners",
    		cache: false,
    		contentType: false,
    		success: function(json) {
    			var parsedJSON = JSON.parse(json);
    			var selectBox = '';
    			var eventsList = [];
    			var alreadyExistsClass = '';
    			var selectedText = '';
    			var lastEventPermalink = '';
    			var newEventPermalink = '';
    			var newEventId = 0;
    			var lastEventId = 0;
    			options = '';
				$.each(data.data, function(key, value) {
					//arrayObjectIndexOf(eventsList, value.event_id, 'event_id') === -1
					var eventPermalink = makePermalink(value.event);
					lastEventPermalink = newEventPermalink;
					lastEventId = newEventId;
					var newEvent = false;
					if (arrayObjectIndexOf(eventsList, value.event_id, 'event_id') === -1 || eventsList.length === 0) {
						// if (lastEventPermalink === '') {
						// 	lastEventPermalink = eventPermalink;
						// }
						if (lastEventPermalink !== '') {
							var currentPermalink = lastEventPermalink;
							var currentEventId = lastEventId;
							$('form#' + currentPermalink).append('<a class="submit button" id="submitRunners-' + currentPermalink + '">Submit Data/Changes</a>');
							//we can also set the onClick function here
							$('#submitRunners-' + currentPermalink).click(function() {
								submitRunners(currentPermalink, currentEventId, raceID);
							});
						}
						newEventPermalink = makePermalink(value.event);
						newEventId = value.event_id;
						$('div.runnersSelect').append('<h3>' + value.event + '</h3>');
						$('div.runnersSelect').append('<p class="error display-none" id="message-' + eventPermalink + '">' + value.event + ' successfully added!</p>');
						$('div.runnersSelect').append('<form id="' + eventPermalink + '"></form>');
						newEvent = true;
					}
						options = '';
						alreadyExistsClass = '';
						console.log('parsedJSON.data runners');
						console.log(parsedJSON.data);
						$.each(parsedJSON.data, function(idx, val) {
							var hometownText = '';
							selectedText = '';
							//if first and last name are similar
							//TODO: when data gets large, we will have tons of same name. make it check by school name as well as hometown and events.
							if (isSimilarName(val.last_name, value.last_name) && isSimilarName(val.first_name, value.first_name) 
								&& (val.last_name === value.last_name || val.first_name === value.first_name) ) {
								if (val.last_name === value.last_name && val.first_name === value.first_name) {
									selectedText = 'selected';
								}
								//Right now, it says if there's a hometown show it. Possibly update this to check if "isInSchool" or something to determine
								//whether or not to display school or hometown. Also consider adding a couple of events this runner normally does.
								if (val.hometown) {
									hometownText = ' - ' + val.hometown;
								} 
								else if (val.school) {
									hometownText = val.school;
								}
								options += '<option id="" value="' + val.id + '" ' + selectedText + '>' + val.last_name + ', ' + val.first_name + ' - ' + hometownText + '</option>';
							}
						});
						if (options !== '') {
							options = '<option value="">Use Pre-existing?</option>' + options;
							selectBox = '<select class="runnersSelector" id="">' + options + '</select>';
							alreadyExistsClass = 'already-exists';
						} else {
							selectBox = '';
							alreadyExistsClass = 'pink';
						}
						$('form#' + eventPermalink).append('<div id="runner-' + key + '" class="selectingOldOrNew runnersSelectContainer ' + alreadyExistsClass + '"><input class="first_name" type="text" value="' + value.first_name + '"/> <input class="last_name" type="text" value="' + value.last_name + '"/>' + selectBox + '</div>');
						$('#runner-' + key).data({old_data: value});
					if (newEvent) {
						eventsList.push({event_id: value.event_id, event_name: value.event});
					}
					//for the very last iteration, add the submit button.
					if ((parseInt(key) + 1) == data.data.length) {
						$('form#' + eventPermalink).append('<a class="submit button btn" id="submitRunners-' + eventPermalink + '">Submit ' + value.event + '</a>');
						//we can also set the onClick function here
						$('#submitRunners-' + eventPermalink).click(function(e) {
							e.stopPropagation();
							submitRunners(eventPermalink, value.event_id, raceID);
						});
					}
				});
			}
		});
    	$('div.phase2').fadeIn();
    }
});      