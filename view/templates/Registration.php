<div class="errors">
	<?php if(!empty($messages['errors'])) { ?>
		<b>Check these faults!</b><br/>
		<?php foreach($messages['errors'] as $error) { 
			echo $error . "<br/>";
		} ?>
	<?php } ?>
</div>
<div class="success">
<?php if(!empty($messages['success'])) echo $messages['success']; ?>
</div>
<h3>Registration</h3>
<form id="registration_form" action="<?=$action_registration; ?>" method="POST">
	<input type="text" name="Login" placeholder="Your login..."/>
	<input type="text" name="Password" placeholder="Password..."/>
	<input type="text" name="Confirm" placeholder="Confirm password..."/>
	<input type="text" name="Name" placeholder="Your name..."/>
	<input type="text" name="Email" placeholder="Your email..."/>
	<input type="submit" value="Send"/>
</form>