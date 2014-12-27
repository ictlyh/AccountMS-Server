<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title>Account Management System</title>
		<meta name="description" content="">
		<meta name="author" content="Yuanhao Luo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/docs.css" rel="stylesheet">
		<link href="./css/bootstrap-responsive.min.css" rel="stylesheet">
		<style type="text/css">
			body {
				padding-top: 60px;
			}
		</style>
	</head>
	
	<body>
		<div class="navbar navbar-fixed-top">
			<!--	加入导航栏	-->
			<?php include './navbar.php' ?>
		</div>
		<br>
		<h3><font color="green">APP</font></h3><br>
			<ul>
				<li>App支持离线使用，要求最低Android版本4.3.1</li>
				<li>APP同步数据时只同步便签，收入支出信息，并不同步账户</li>
				<li>每次登陆APP时，联网条件下会自动同步账户信息到服务器</li>
				<li>只支持将账户从APP同步到服务器，不支持从服务器同步账户到APP，故最好在APP上注册</li>
				<li>APP上更改密码后，下次登陆APP时同步账户到服务器后服务器密码才更新</li>
			</ul>
		<h3><font color="green">Server</font></h3><br>
			<ul>
				<li>支持注册，登陆，增删收入支出和便签</li>
				<li>暂不支持更改信息</li>
				<li>所有资料在服务器上明文保存，包括账户和密码，以后可能加密保存</li>
				<li>MySQL语句没有进行安全性检查，请不要特意进行SQL注入破坏</li>
			</ul>
		<h3><font color="green">Source Code</font></h3><br>
			<ul>
				<li><a href="https://github.com/ictlyh/AccountMS">APP Source Code</a></li>
				<li><a href="https://github.com/ictlyh/AccountMS-Server">Server Source Code</a></li>
			</ul>
		<h3><font color="green">CopyRight</font></h3><br>
			<ul>
				<li>Power by Yuanhao Luo</a></li>
				<li>Any problems and suggestions? Please feel free to contact with me:luoyuanhao@software.ict.ac.cn</li>
			</ul>	
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('.carousel').carousel();
			$('.typeahead').typeahead();
		</script>
		
	</body>
</html>
