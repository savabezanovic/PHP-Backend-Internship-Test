<?php require ("partials/header.php"); ?>
	
	<h1>Results Screen</h1>

	<h2>Left Side</h2>

	<h3>User Types</h3>

	<ul>

		<?php foreach($userTypes as $userType): ?>

			<li><?php echo $userType->{"type_name"} ?></li>

		<?php endforeach; ?>	

	</ul>	

	<h2>Right Side</h2>

	<?php echo $searchedUser[0]->{"name"} . " " . $searchedUser[0]->{"type_name"} ?>

<?php require ("partials/footer.php"); ?>