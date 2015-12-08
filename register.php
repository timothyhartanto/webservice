<?php

require ("config.inc.php");

if(!empty($_POST)){
	//json data
	echo 'message';
}
else{
	?>
	
<h1>Register</h1>
<form action="register.php" method="post">
	Username: <br/>
	<input type="text" name="username" placeholder="User name"></input><br/>
	Password: <br/>
	<input type="password" name="password" placeholder="Password"></input><br/><br/>
	
	<input type="submit" value="Register user"><br/>
</form>

	<?php
}

?>
