<?php require ("partials/header.php");?>

	<h1>Login Screen</h1>

	<form method="GET" action="dashboard">
		
		<span for="email">Email Input Field:</span>
		<input type="email" name="email" placeholder="name@email.com">

		<span for="password">Password Input Field:</span>
		<input type="password" name="password">

		<button type="submit">Submit</button>

	</form>

<?php require ("partials/footer.php");?>