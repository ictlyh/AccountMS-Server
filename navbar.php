<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="index.php"><h3><font color="blue"><h3>Account Management System</h3></font></a>
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<div class="nav-collapse">
				<ul class="nav">
				<!-- 导航栏  根据用户是否登录显示不同内容 -->
					<?php
						if (isset($username)){	//客户已登录，显示收入，支出，便签，退出，关于
					?>
						<li><p class="navbar-text">Welcome!  <?php echo $username; ?></p></li>
						<li class="divider-vertical"></li>
						<li <?php if($_SERVER['PHP_SELF']=='./inaccount.php') echo ' class="active"'?>><a href="./inaccount.php"><h3>收入</h3></a></li>
						<li <?php if($_SERVER['PHP_SELF']=='./outaccount.php') echo ' class="active"'?>><a href="./outaccount.php"><h3>支出</h3></a></li>
						<li <?php if($_SERVER['PHP_SELF']=='./flag.php') echo ' class="active"'?>><a href="./flag.php"><h3>便签</h3></a></li>
						<li><a href="./index.php?action=logout"><h3>退出</h3></a></li>
						<li><a href="./about.php" target="_blank"><h3>关于</h3></a></li>
					<?php
						}else if(!isset($_POST['admin-action'])){	//用户未登录，显示登录，注册，关于
					?>
							<li><p class="navbar-text">欢迎来到 Account Management System</p></li>
							<li class="divider-vertical"></li>
							<li><a href="#login" data-toggle="modal"><h3>登录</h3></a></li>
							<li><a href="#register" data-toggle="modal"><h3>注册</h3></a></li>
							<li><a href="./about.php" target="_blank"><h3>关于</h3></a></li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
