<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('login.php');
}

if(Token::check(Input::get('token'))) {
	if(Input::exists()) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 5,
				'max' => 50
			),
			'profile_text' => array(
				'required' => true,
				'min' => 0,
				'max' => 500
			),
			'profile_image' => array(
				'required' => true,
				'min' => 0,
				'max' => 500
			)
		));
		
		if($validation->passed()) {
			
			try{
				$user->update(array(
					'name' => Input::get('name'),
					'profile_text' => Input::get('profile_text'),
					'profile_text' => Input::get('profile_image')
				));
				
				Session::flash('home', 'Your details have been updated.');
				Redirect::to('index.php');
			
			} catch(Exception $e){
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

<form action="" method="post" enctype="multipart/form-data">
	<div class="field">
		<label for="name">Update name</label>
		<input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
		
		<label for="profile_text">Update profile text</label>
		<input type="text" name="profile_text" value="<?php echo escape($user->data()->profile_text); ?>">
		
		<label for="profile_image">Update profile picture</label>
		<input type="file" name="profile_image" value="<?php echo escape($user->data()->profile_image); ?>">
	
		<input type="submit" value="Update">
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</div>
</form>