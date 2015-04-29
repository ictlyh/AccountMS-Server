<?php
require "./database.php";
require "./useraction.php";
?>
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
		
		<div class="row">
			<div class="span6 offset2"><br>
				<h1>提供收入支出管理一键服务</h1><br><br>
				<h3><font color="green">简单</font>  : 简单易用，方便快捷</h3><br>
				<h3><font color="green">可靠</font>  : 同步到服务器，再也不怕数据丢失</h3><br><br>
				<button class="btn btn-info btn-large"><a href="#register" data-toggle="modal"><font color="white">马上注册 &raquo;</font></a></button>
			</div>
			
			<div class="span4">
				<div class="my-logo">
					<h1><font color="blue">启程</font></h1>
					<br><h3>还在犹豫什么，赶快来使用吧</h2><br><br>
				</div>
				<button class="btn btn-primary btn-large"><i class="icon-plane icon-white"></i><a href="./AccountManagementSystem.apk" target="_blank"><font color="white">Download APK!</font></a></button>
			</div>
				
		</div>
		<br>
		
		<div class="row">
			<div class="span3 offset1"><img src="img/sea1.jpg" alt=""></div>
			<div class="span3"><img src="img/leisure.jpg" alt=""></div>
			<div class="span3"><img src="img/kaixuan.jpg" alt=""></div>
			<div class="span3"><img src="img/sea2.jpg" alt=""></div>
		</div>
	
		<div class="span12" style="text-align:center">
			<br><?php echo $warning ?><br>
		</div>
		
		<?php include './footer.php' ?>
		<br>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('.carousel').carousel();
			$('.typeahead').typeahead();
		</script>
		
	</body>
</html>
