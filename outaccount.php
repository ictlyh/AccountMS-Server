<?php
require "./database.php";
require "./useraction.php";
?>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title>支出管理</title>
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
					//根据del删除支出
					if ($_POST['action']=='remove'&&isset($_POST['del'])){
						foreach ($_POST['del'] as $item){
							//删除支出条目
							$db->query("DELETE FROM tb_outaccount WHERE userID='$username' AND _id='$item'");
						}
				?>
					<div class="alert alert-success fade in" style="text-align: center;">
						<a class="close" data-dismiss="alert" href="#">x</a>
						<strong>成功删除支出</strong>
					</div>
		<?php
					}
				}
		?>
		
		
		<!-- 显示支出信息	-->
			<br>
			<h1>欢迎您，<?php echo $username ?>&nbsp;&nbsp;&nbsp;</h1><br>

			<p><h3>您的支出：</h3></p>
		<?php
			$record=$db->query("SELECT * FROM tb_outaccount WHERE userID='$username'");
			if ($record->num_rows==0){//无支出
		?>
			<div class="alert alert-error fade in" style="text-align: center;">
				<a class="close" data-dismiss="alert" href="#">x</a>
				<strong>您目前没有任何支出</strong>
			</div>
			<button class="btn btn-large btn-danger"><a href="#addoutaccount" data-toggle="modal">新增支出</a></button>
		<?php
			}else{//显示支出列表
		?>
				<form method="post" action="./outaccount.php">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>编号</th>
								<th>金额</th>
								<th>时间</th>
								<th>类型</th>
								<th>地点</th>
								<th>备注</th>
								<th>删除</th>
							</tr>
						</thead>
						
						<tbody>
					<?php
							while ($row=$record->fetch_row()){
								//显示相关信息，删除复选框
								echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td><input type=\"checkbox\" name=\"del[]\" value=\"$row[1]\"></td></tr>";
						}
					?>
						</tbody>
					</table>
					<input type="hidden" name="action" value="remove">
					<button type="submit" class="btn btn-large btn-danger">删除支出</button>
					<button class="btn btn-large btn-danger"><a href="#addoutaccount" data-toggle="modal">新增支出</a></button>
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
