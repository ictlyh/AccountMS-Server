<?php
	//定义一个数据库全局变量
	global $db;
	//绑定数据库
	$db = new mysqli("localhost","root","root","account");
	if (mysqli_connect_errno())
	{
		printf("Database Connect Failed. Error: %s\n",mysqli_connect_error());
		exit();
	}
	$db->query("SET character_set_client=utf8");
	$db->query("SET character_set_connection=utf8");
	$db->query("SET character_set_results=utf8");
	$db->query("CREATE TABLE IF NOT EXISTS tb_pwd (_id VARCHAR(10) PRIMARY KEY,password VARCHAR(32))ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	$db->query("ALTER TABLE  `tb_pwd` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;");
	$db->query("CREATE TABLE IF NOT EXISTS tb_inaccount (userID VARCHAR(10), _id INTEGER, money DECIMAL, time VARCHAR(10), type VARCHAR(10),handler VARCHAR(100),mark VARCHAR(200),	PRIMARY KEY(userID, _id))ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	$db->query("ALTER TABLE  `tb_inaccount` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;");
	$db->query("CREATE TABLE IF NOT EXISTS tb_outaccount (userID VARCHAR(10), _id INTEGER, money DECIMAL, time VARCHAR(10), type VARCHAR(10), address VARCHAR(100), mark VARCHAR(200),PRIMARY KEY(userID, _id))ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	$db->query("ALTER TABLE  `tb_outaccount` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;");	
	$db->query("CREATE TABLE IF NOT EXISTS tb_flag (userID VARCHAR(10), _id INTEGER, flag VARCHAR(200), PRIMARY KEY(userID, _id))ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	$db->query("ALTER TABLE  `tb_flag` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;");
?>
