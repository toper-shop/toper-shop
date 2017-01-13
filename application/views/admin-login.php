<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title><?php if(isset($seo_title)) 
			{
				$seo_title = strip_tags($seo_title);
				echo $seo_title;
				}else{
				$ci = &get_instance();
				echo ucfirst($ci->router->fetch_class()) . ' ' . ucfirst($ci->router->fetch_method()) . ' - ' . strip_tags($ci->config->item('site_title'));
			} 
		?></title>
		
		<!-- Bootstrap core CSS -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="/css/signin.css" rel="stylesheet">
		
		
		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		
		<div class="container">
			<center><?php if(isset($form_message)) print $form_message; ?></center>
			
			<form method="post" action="/admin/login" class="form-signin">
				<h2 class="form-signin-heading">Вход в админ-панель</h2>
				<input type="text" class="form-control" name="u" placeholder="Логин"/>
				<input type="password" class="form-control" name="p" placeholder="Пароль"/>
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				<input type="submit" name="sbLogin" value="Войти" class="btn btn-lg btn-primary btn-block"/>
			</form>
			
		</div> <!-- /container -->
	</body>
</html>