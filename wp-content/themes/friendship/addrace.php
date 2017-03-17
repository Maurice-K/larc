<?php
//upload an excel sheet or something
//include('uploaderNavigation.php');
?>
<link href="/wp-content/themes/friendship/css/jquery-ui.min.css" type="text/css" media="all" />
<style>
#ui-datepicker-div {
	background-color: #999;
	font-size: 1rem;
	padding: 0.5rem;
}
.ui-datepicker {
	font-size: 1rem;
}
fieldgroup.blockinputs label {
	display: block;
}
</style>
<form id="raceUploadForm" method="post" role="form" action="<?php bloginfo('template_url'); ?>/resultsfiles/racetodb.php">
<!-- <p class="note">Sorry but for now if you add a race the page will refresh. Will update in the near future. Gotta get the data in.</p>
<h4>Upload an Excel Sheet</h4>
<p class="note">NOTE: If you add an excel sheet, your form data will be ignored.</p>
<label for="upload">Select File</label>
<input type="file" value="Browse" id="upload" name="upload" />-->
<h4>Add information:</h4>
<label for="title">Title:</label>
<input type="text" id="title" name="title"/><br/>
<label for="description">Description:</label>
<input type="text" id="description" name="description"/><br/>
<!-- <label for="image">Featured Image:</label>
<input type="file" id="image" name="image"/><br/> -->
<label for="general">Parent/General Meet/series?</label>
<select id="general" name="general" hint="Use this for a general meet that is recurring every year or is a series.">
	<option value="0">False</option>
	<option value="1">True</option>
</select><br/>
<label for="racetype">Race type(s) (select all that apply):</label>
<fieldgroup id="racetype" name="racetype" class="blockinputs">
	<label for="highschool"><input type="checkbox" id="highschool" name="types[]" value="1"/>High School</label>
	<label for="college"><input type="checkbox" id="college" name="types[]" value="2"/>College</label>
	<label for="middleschool"><input type="checkbox" id="middleschool" name="types[]" value="4"/>Middle School</label>
	<label for="elementary"><input type="checkbox" id="elementary" name="types[]" value="5"/>Elementary School</label>
	<label for="road"><input type="checkbox" id="road" name="types[]" value="3"/>Road Race</label>
	<label for="trail"><input type="checkbox" id="trail" name="types[]" value="6"/>Trail Race</label>
</fieldgroup><br/>
<label for="date">Start Date:</label>
<input type="text" id="date" name="date"/><br/>
<label for="enddate">End Date (if longer than 1 day):</label>
<input type="text" id="enddate" name="enddate"/><br/>
<label for="timeh">Time:</label>
<select id="timeh" name="timeh">
	<option value=""></option>
	<?php 
	for ($i = 1; $i <= 12; $i++) {
		echo '<option value="'. $i .'">'. $i .'</option>';
	}
	?>
</select>
<select id="timem" name="timem">
	<option value=""></option>
	<?php 
	for ($i = 0; $i <= 59; $i++) {
		$vali = $i;
		if ($i < 10)
			$vali = '0' . $i;
		echo '<option value="'. $i .'">'. $vali .'</option>';
	}
	?>
</select>
<label for="timeAMPM">PM?</label>
<input type="checkbox" id="timeAMPM" name="timeAMPM"/>
<br/>
<label for="location">Location/venue: </label>
<input type="text" id="location" name="location"/><br/>
<label for="organizer">Organizer: </label>
<input type="text" id="organizer" name="organizer"/><br/>
<label for="director">Director: </label>
<input type="text" id="director" name="director"/><br/>
<input type="button" value="Submit" id="submitrace"/>
</form>
<script src="/wp-content/themes/friendship/js/jquery-ui.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {  
	$ = jQuery;
	$("#date").datepicker();
	$("#enddate").datepicker();
    jQuery('#submitrace').click(function() {
    	var data = $("#raceUploadForm :input").serializeArray();
    	console.log(data);
    	//save points post via ajax then refresh the page???? clear form data too, for the dangit adding new race at least. also send SUCCESS message.
    	$.post(jQuery("#raceUploadForm").attr('action'), data, function(json){
			jQuery(".message").fadeOut();
			if (json.status == "fail") {
				jQuery(".message").html(json.message).fadeIn();
				console.log('faiilingg');
			}
			if (json.status == "success") {
				//console.log("success, saving point, still adding");
				jQuery("#raceUploadForm :input[name!=action]").val("");
				//added to try
				jQuery("#raceUploadForm").fadeOut(500);
	            jQuery(".message").html("Submission successful!").fadeIn();
				var raceData = json.data;
				//console.log(raceData.datesubmitted);
				//console.log(raceData.datestring);
				//console.log(raceData.date);
				//alert(raceData.datesubmitted);
				//have to find a way to get the ID before we can really do this
				/*jQuery('#pickrace').append(jQuery("<option></option>")
                    .attr("value",raceData.id)
                    .text(raceData.title)
                    );*/
			}
		}, "json")
		.done(function() {
		    location.reload();
		})
		.fail(function(error) {
		    //alert( "error" );
		    //console.log("yea no luck.");
		    //console.log(error);
		})
		.always(function() {
		    //alert( "finished" );
		});
    });
});    
</script>