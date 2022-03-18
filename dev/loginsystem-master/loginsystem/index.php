<?php
require_once 'core/init.php';

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>

<!doctype html>
<html lang="en">
	
	<body>
		<div class="container">
			<div class="col-md-12">
				<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
			</div>
			<div class="col-md-12">
				<ul>
					<li><a href="update.php">Update</a></li>
					<li><a href="changepassword.php">Change password</a></li>
					<li><a href="logout.php">Log out</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<?php

					if($user->hasPermission('admin')){
						echo '<p>You are an administrator!</p>';
					} else {
						echo '<p>You are a standard user.</p>';
					}

				} else {
					echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a>.</p>';
				}
				?>
			</div>
		</div><!--.container-->
	</body>
</html>