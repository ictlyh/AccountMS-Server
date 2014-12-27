<?php
require "./database.php";
require "./useraction.php";
?>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title>便签管理</title>
		<meta name="description" content="Make Your Travel Easy">
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
			<!-- 加入导航栏	-->
			<?php include './navbar.php' ?>
		</div>
	
		<div class="container">
			<?php echo $warning ?>
			<?php
				if (!isset($username)){//未登录
			?>
				<p><h2>您尚未登录，请<a href="#login" data-toggle="modal">登录</h2></a></p>
			<?php
			}else{//已登录
				if (isset($_POST['action'])){
					//根据del删除便签
					if ($_POST['action']=='remove'&&isset($_POST['del'])){
						foreach ($_POST['del'] as $item){
							//删除便签条目
							$db->query("DELETE FROM tb_flag WHERE userID='$username' AND _id='$item'");
						}
				?>
					<div class="alert alert-success fade in" style="text-align: center;">
						<a class="close" data-dismiss="alert" href="#">x</a>
						<strong>成功删除便签</strong>
					</div>
		<?php
					}
				}
		?>
		
		
		<!-- 显示便签信息	-->
			<br>
			<h1>欢迎您，<?php echo $username ?>&nbsp;&nbsp;&nbsp;</h1><br>

			<p><h3>您的便签：</h3></p>
		<?php
			$record=$db->query("SELECT * FROM tb_flag WHERE userID='$username'");
			if ($record->num_rows==0){//无便签
		?>
			<div class="alert alert-error fade in" style="text-align: center;">
				<a class="close" data-dismiss="alert" href="#">x</a>
				<strong>您目前没有任何便签</strong>
			</div>
			<button class="btn btn-large btn-danger"><a href="#addflag" data-toggle="modal">新增便签</a></button>
		<?php
			}else{//显示便签列表
		?>
				<form method="post" action="./flag.php">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>编号</th>
								<th>内容</th>
								<th>删除</th>
							</tr>
						</thead>
						
						<tbody>
					<?php
							while ($row=$record->fetch_row()){
								//显示相关信息，删除复选框
								echo "<tr><td>$row[1]</td><td>$row[2]</td><td><input type=\"checkbox\" name=\"del[]\" value=\"$row[1]\"></td></tr>";
						}
					?>
						</tbody>
					</table>
					<input type="hidden" name="action" value="remove">
					<button type="submit" class="btn btn-large btn-danger">删除便签</button>
					<button class="btn btn-large btn-danger"><a href="#addflag" data-toggle="modal">新增便签</a></button>
				</form>
	<?php
				}
			}
	?>
		<?php include './footer.php' ?>
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("a[rel=popover]").popover()
		</script>
	</body>
</html>
