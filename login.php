<?php include('header.php'); ?>
<?php include('Account.php');  ?>

<?php
 $user = new Account($db);
?>
<?php
if(isset($_POST['btnLogin'])){
	$user->login($_POST['username'],md5($_POST['password']));


}

?>


<form action="login.php" method="POST">
	<div class="container">
		<h4>Admin Login</h4>
		<div class="col-md-4">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" placeholder="username...">
			</div>
			<div class="form-group">
				<label for="password">password</label>
				<input type="password" name="password" class="form-control" placeholder="password...">
			</div>
			<div class="form-group">
				<button type="submit" name="btnLogin" class="btn btn-success">Login</button>
			</div>

		</div>
	</div>
</form>
