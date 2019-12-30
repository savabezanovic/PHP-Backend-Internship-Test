<?php require ("partials/header.php")  ?>

	<h1>Register Screen</h1>

	<form method="POST" action="register">
		
		<!-- Same as in index.view.php -->
		<span for="userType">User Type Select Field:</span>
		<select name="userType">

 	 		<option value="">Front End</option>
			<option value="">Back End</option>
			<option value="">Java Script</option>
			<option value="">PHP</option>

		</select>

		<span for="email">Email Input Field:</span>
		<input type="email" name="email" placeholder="name@email.com">

		<span for="name">Name Input Field:</span>
		<input type="text" name="name" placeholder="name">

		<span for="password">Password Input Field:</span>
		<input type="password" name="password">

		<span for="repeatPassword">Repeat Password Input Field:</span>
		<input type="password" name="repeatPassword">

		<button type="submit">Submit</button>

	</form>

<?php require ("partials/footer.php") ?>