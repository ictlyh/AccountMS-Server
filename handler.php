<?php
require "./database.php";

if($_POST)
{
	if(isset($_POST['userID']) && isset($_POST['type']))
	{
		if($_POST['type'] == 'download')
		{
			//echo "calling downlad";
			exportToFile($_POST['userID']);
		}
	}
	if(isset($_POST['userID']) && isset($_POST['pwd']))
	{
		//echo "calling regist";
		$db->query("DELETE FROM tb_pwd WHERE _id = '".addslashes($_POST['userID'])."'");
		$db->query("INSERT INTO tb_pwd VALUES('".addslashes($_POST['userID'])."','".addslashes($_POST['pwd'])."')");
	}
}

if($_FILES)
{
	//echo "calling upload\n";
	importFromFile();
}
function exportToFile($userid)
{
	global $db;
	$dem = ',';
	$fp = fopen("tmp.txt","w+") or die("Unable to open file!");
	
	$res = $db->query("SELECT * FROM tb_inaccount WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.strval($row[2]).$dem.$row[3].$dem.$row[4].$dem.$row[5].$dem.$row[6].$dem."\n";
		//echo $line."</br>";
		fwrite($fp, $line);
	}

	$res = $db->query("SELECT * FROM tb_outaccount WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.strval($row[2]).$dem.$row[3].$dem.$row[4].$dem.$row[5].$dem.$row[6].$dem."\n";
		//echo $line."</br>";
		fwrite($fp, $line);
	}

	$res = $db->query("SELECT * FROM tb_flag WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.$row[2].$dem."\n";
		//echo $line."</br>";
		fwrite($fp, $line);
	}
	fclose($fp);
}
function importFromFile()
{
	global $db;
	move_uploaded_file($_FILES['file']["tmp_name"],$_FILES["file"]["name"]);
	$fp = fopen("tmp.txt","rb") or die("Unable to open file!");
	$userid = trim(fgets($fp));
	//echo "userid = '$userid'"."</br>";
	$db->query("DELETE FROM tb_inaccount WHERE userID = '$userid'");
	$db->query("DELETE FROM tb_outaccount WHERE userID = '$userid'");
	$db->query("DELETE FROM tb_flag WHERE userID = '$userid'");
	while(!feof($fp))
	{
		$line = fgets($fp);
		//echo $line."</br>";
		$res = $db->query($line);
		if(!res)
		{
			echo "Error occur while exec ".$line."\n";
		}
	}
	fclose($fp);
}
?>
