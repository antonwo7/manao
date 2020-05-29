<div class="errors">
	<?php if(!empty($messages['errors'])) { ?>
		<b>Check these faults!</b><br/>
		<?php foreach($messages['errors'] as $error) { 
			echo $error . "<br/>";
		} ?>
	<?php } ?>
</div>
<h3>Login</h3>
<form id="login_form" action="<?=$action_login; ?>" method="POST">
	<input type="text" name="Login" value=""/>
	<input type="text" name="Password" value=""/>
	<input type="submit" value="Login"/>
</form>