<?php
require_once 'core/init.php';

if(Token::check(Input::get('token'))) {	
	if(Input::exists()) {	
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username'=> array(
				'required' => true,
				'min' => 5,
				'max' => 20,
				'unique'=> 'users'
			),
			'password'=> array(
				'required' => true,
				'min' => 6
			),
			'password_again'=> array(
				'required' => true,
				'matches' => 'password'
			),
			'name'=> array(
				'required' => true,
				'min' => 5,
				'max' => 50
			)
		));
		
		if($validation->passed()) {
			
			$user = new User();
			
			$salt = Hash::salt(32);
			
			try {
				$user->create(array(
					//Session::flash('success', 'You registered successfully!');
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
					'profile_image' => '',
					'profile_text' => '',
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1
				));	
				
				Session::flash('home', 'You have been registered and can now log in!');
				Redirect::to('index.php');
				
			} catch(Exception $e) {
				//header('Location: includes/error/registererror.php');
				die($e->getMessage());
			}
		} else {
			foreach($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}
?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
	</div>
	
	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
	</div>
	
	<div class="field">
		<label for="password_again">Enter your password again</label>
		<input type="password" name="password_again" id="password_again">
	</div>
	
	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
	</div>
	
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Register">
</form>