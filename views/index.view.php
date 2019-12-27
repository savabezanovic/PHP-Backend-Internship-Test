<?php require ("partials/header.php");?>	

	<h1>Search Form</h1>

	<form method="GET" action="/results">
		
		<span for="name">Search Text Input:</span>
		<input type="text" name="name"></input>

		<span for="userType">User Type Select Field:</span>
		<select name="userType">

 	 		<option value="">Front End</option>
			<option value="">Back End</option>
			<option value="">Java Script</option>
			<option value="">PHP</option>

		</select>

		<button type="submit">Search</button>

	</form>

<?php require ("partials/footer.php");?>