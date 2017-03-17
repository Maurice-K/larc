<?php
include('dbc.php');
$racesQuery = 'SELECT * from `races` where `deleted` = 0';
?>
<script src="<?php bloginfo('template_url'); ?>/resultsfiles/js/util.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resultsfiles/css/results.css" type="text/css" media="all" />

<header>
	<div class="header tabs">
		<ul class="header-links">
			<li><a href="<?php bloginfo('template_url'); ?>/uploaderDisplay.php" class="button" title="Upload Results">Upload Results</a></li>
			<li><a href="<?php bloginfo('template_url'); ?>/resultsfiles/edit-races.php" class="button" title="Add/Edit Races">Races</a></li>
			<li><a href="<?php bloginfo('template_url'); ?>/resultsfiles/edit-runners.php" class="button" title="Add/Edit Runners">Runners</a></li>
			<li><a href="<?php bloginfo('template_url'); ?>/resultsfiles/edit-venues.php" class="button" title="Add/Edit Venues">Venues</a></li>
		</ul>
	</div>
</header>