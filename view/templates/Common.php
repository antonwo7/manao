<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<title></title>

		<link rel="stylesheet" type="text/css" href="view/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="view/assets/css/main.css" />
		
		<script src="view/assets/js/jquery.min.js"></script>
		<script src="view/assets/js/main.js"></script>
	</head>

	<body>
		<section>
			<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="row">
						<div id="login" class="form-wrapper"><?=$login; ?></div>
					</div>
					<div class="row">
						<?php if($registration) { ?>
						<div id="registration" class="form-wrapper"><?php echo $registration; ?></div>
						<?php } ?>
					</div>
				</div>
		</section>
	</body>
</html>