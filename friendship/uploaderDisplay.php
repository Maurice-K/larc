<?php
include('resultsfiles/results-header.php');
//$racesQuery = 'SELECT * from `races` where `deleted` = 0';
?>

<p class="message alert-panel"></p>

<div class="results-container">
	<div class="phase1">
		<h2>Add New or Select Which Race/meet to upload results</h2>
		<h3>Add Race</h3>
		<a href="#" class="button" id="addarace">Add Race</a>
		<div class="addraceformbox">
		<?php include('addrace.php');?>
		</div>
		<h3>Select Already Added Race</h3>
		<form id="resultUploadForm" enctype="multipart/form-data" method="post" role="form" action="<?php bloginfo('template_url'); ?>/resultsfiles/uploadx.php">
		<select id="pickrace" name="pickrace">
			<option value="">Choose One</option>
			<?php 
				$stmt = $db->query($racesQuery);
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
				}
			?>
		</select>
		<h4>Upload a Results CSV</h4>
		<input type="hidden" name="MAX_FILE_SIZE" value="1500000" />
		<label for="file">Select File</label>
		<input type="file" value="Browse" id="file" name="file" />
		<br/>
		<input type="button" value="Submit These Results!" id="submitResults"/>
		</form>
	</div>
	<div class="phase2">
		<h2 id="raceTitle"></h2>
		<h3>Check Your Upload Against Pre-Existing Data</h3>
		<div class="contentArea"></div>
	</div>
</div>
<?php include('resultsfiles/results-footer.php'); ?>