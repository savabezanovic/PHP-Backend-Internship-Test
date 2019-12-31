<?php require ("partials/header.php");?>	

	<h1>Search Form</h1>

	<form method="GET" action="/results">
		
		<span for="name">Search Text Input:</span>
		<input type="text" name="name" required></input>

		<span for="user_type_id">User Type Select Field:</span>
		<select name="user_type_id">
		
		<?php foreach($userTypes as $userType): ?>

			<option value=<?php echo $userType->{"id"} ?>><?php echo $userType->{"type_name"} ?></option>

		<?php endforeach; ?>	

			
			<option name="Back End">Back End</option>
 
		</select>

		<button type="submit">Search</button>

	</form>

<?php require ("partials/footer.php");?>