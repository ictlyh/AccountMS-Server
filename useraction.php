<?php
	if (isset($_POST['action'])){
		//用户提交动作
		if (isset($_COOKIE['user'])){//已登录，存在cookie，自动登录
			$dbquery=$db->query("SELECT password FROM tb_pwd WHERE _id='".addslashes($_COOKIE['user'])."'");
			$record=$dbquery->fetch_row();
			//数据库中的密码和cookie中的密码相同
			if ($record[0]==$_COOKIE['password']){
				global $username;
				$username=$_COOKIE['user'];
			}
		}
		if ($_POST['action']=='login'){//用户登录
			//查询用户密码
			$dbquery=$db->query("SELECT password FROM tb_pwd WHERE _id='".addslashes($_POST['user'])."'");
			if ($dbquery->num_rows!=0){//用户存在
				$record=$dbquery->fetch_row();
				if ($record[0]==$_POST['password']){//密码正确
					global $username;
					$username=$_POST['user'];
					//向客户机发送cookie，包括cookie的名称，值，有效期0.5h
					setcookie('user',$_POST['user'],time()+1800);
					setcookie('password',$_POST['password'],time()+1800);
				}else 
					$error="密码错误";
			}else
				$error="用户不存在";
		}else if ($_POST['action']=='register'){//用户注册
			//用户名符合命名规则且两个密码相同
			//if($_POST['password']==$_POST['password-confirm']&&preg_match('/^[a-z\d]{7,16}$/i',$_POST['user'])){
			if($_POST['password']==$_POST['password-confirm']){
				//插入用户
				$dbquery=$db->query("INSERT INTO tb_pwd VALUES('".addslashes($_POST['user'])."','".addslashes($_POST['password'])."')");
				if ($dbquery){//插入用户成功
						global $username;
						$username=$_POST['user'];
						setcookie('user',$_POST['user'],time()+1800);
						setcookie('password',$_POST['password'],time()+1800);
				}else//插入失败 
					$error="用户名已存在";
			}else
				$error="用户名不符合规范或密码不一致";
		}else if ($_POST['action']=='addinaccount'){//新增收入
				$record = $db->query("SELECT max(_id) FROM tb_inaccount WHERE userID='$username'");
				$res=$record->fetch_row();
				$count = intval($res['0'])+1;
				$dbquery=$db->query("INSERT INTO tb_inaccount VALUES('$username','$count','".addslashes($_POST['money'])."','".addslashes($_POST['time'])."','".addslashes($_POST['type'])."','".addslashes($_POST['handler'])."','".addslashes($_POST['mark'])."')");
				if ($dbquery)//插入收入成功
					$error="新增收入成功";
				else
					$error="新增收入失败";
		}else if ($_POST['action']=='addoutaccount'){//新增支出
				$record = $db->query("SELECT COUNT(*) FROM tb_outaccount WHERE userID='$username'");
				$res=$record->fetch_row();
				$count = intval($res['0'])+1;
				$dbquery=$db->query("INSERT INTO tb_outaccount VALUES('$username','$count','".addslashes($_POST['money'])."','".addslashes($_POST['time'])."','".addslashes($_POST['type'])."','".addslashes($_POST['address'])."','".addslashes($_POST['mark'])."')");
				if ($dbquery)//插入支出成功
					$error="新增支出成功";
				else
					$error="新增支出失败";
		}else if ($_POST['action']=='addflag'){//新增便签
				$record = $db->query("SELECT COUNT(*) AS total FROM tb_flag WHERE userID='$username'");
				$res=$record->fetch_row();
				$count = intval($res['0'])+1;
				$dbquery=$db->query("INSERT INTO tb_flag VALUES('$username','$count','".addslashes($_POST['flag'])."')");
				if ($dbquery)//插入便签成功
					$error="新增便签成功";
				else
					$error="新增便签失败";
		}
	}else if (isset($_GET['action'])&&$_GET['action']=='logout'){//已登录，退出时使cookie失效
		setcookie('user','',time());
		setcookie('password','',time());
	}else if (isset($_COOKIE['user'])){//未登录，但存在cookie，自动登录
		$dbquery=$db->query("SELECT password FROM tb_pwd WHERE _id='".addslashes($_COOKIE['user'])."'");
		$record=$dbquery->fetch_row();
		//数据库中的密码和cookie中的密码相同
		if ($record[0]==$_COOKIE['password']){
			global $username;
			$username=$_COOKIE['user'];
		}
	}

	global $warning;
	if (isset($_POST['action'])&&!isset($username)){
		$warning='<div class="alert alert-error fade in" style="text-align: center;"><a class="close" data-dismiss="alert" href="#">x</a>';
		switch($_POST['action']){
			case "login":$warning.="<h4><strong>登录失败：</strong>".$error."</h4>";break;
			case "register":$warning.="<h4><strong>注册失败：</strong>".$error."</h4>";break;
			default: break;
		}
		$warning.='</div>';
	}
?>
