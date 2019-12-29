<?php require ("partials/header.php");?>	

	<h1>Search Form</h1>

	<form method="GET" action="/results">
		
		<span for="name">Search Text Input:</span>
		<input type="text" name="name"></input>

		<span for="userType">User Type Select Field:</span>
		<select name="userType">

			<option name="Front End">Front End</option>
			<option name="Back End">Back End</option>

<!-- 		<?php foreach ($userTypes as $userType) : ?>

 	 			<option name=<?php echo $userType->{"name"} ?>>
 	 				
 	 				<?php echo $userType->{"name"} ?>
 	 					
 	 			</option>

 	 	<?php endforeach; ?> -->
 
		</select>

		<button type="submit">Search</button>

	</form>

<?php require ("partials/footer.php");?>