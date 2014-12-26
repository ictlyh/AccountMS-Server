<?php
require "database.php";
echo "This is the index page of project account management system"."</br>";
//global $db;
//$db->query("INSERT INTO t1 VALUES('ictlyh',24,'中国科学院大学'); ");
//importFromFile();
//$userid = 'ictlyh';
//exportToFile($userid);

function exportToFile($userid)
{
	global $db;
	$dem = ',';
	$filename = $userid.".txt";
	//echo "file name = ".$filename."</br>";
	$filename = "tmp.txt";
	$fp = fopen($filename,"w+") or die("Unable to open file!");
	
	$res = $db->query("SELECT * FROM tb_inaccount WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.strval($row[2]).$dem.$row[3].$dem.$row[4].$dem.$row[5].$dem.$row[6].$dem."\n";
		echo $line."</br>";
		fwrite($fp, $line);
	}

	$res = $db->query("SELECT * FROM tb_outaccount WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.strval($row[2]).$dem.$row[3].$dem.$row[4].$dem.$row[5].$dem.$row[6].$dem."\n";
		echo $line."</br>";
		fwrite($fp, $line);
	}

	$res = $db->query("SELECT * FROM tb_flag WHERE userID = '$userid' ORDER BY _id;");
	$num = mysqli_num_rows($res);
	fwrite($fp, strval($num)."\n");
	while($row = $res->fetch_row())
	{
		$line = $row[0].$dem.strval($row[1]).$dem.$row[2].$dem."\n";
		echo $line."</br>";
		fwrite($fp, $line);
	}
	fclose($fp);
}
function importFromFile()
{
	echo "calling importFromFile"."</br>";
	global $db;
	//move_uploaded_file($_FILES['file']["tmp_name"],$_FILES["file"]["name"]);
	//$fp = fopen($_FILES["file"]["name"],"rb") or die("Unable to open file!");
	$fp = fopen("tmp.txt","rb") or die("Unable to open file!");
	$userid = trim(fgets($fp));
	//echo "userid = '$userid'"."</br>";
	//$sql = "DELETE FROM tb_inaccount WHERE userID = '".$userid."';";
	//echo $sql."</br>";
	//$db->query($sql);
	$db->query("DELETE FROM tb_inaccount WHERE userID = '$userid';");
	echo "done delete from tb_inaccount"."</br>";
	$db->query("DELETE FROM tb_outaccount WHERE userID = '$userid';");
	echo "done delete from tb_outaccount"."</br>";
	$db->query("DELETE FROM tb_flag WHERE userID = '$userid';");
	echo "done delete from tb_flag"."</br>";
	while(!feof($fp))
	{
		$line = fgets($fp);
		echo $line."</br>";
		$res = $db->query($line) or die(mysql_error());
		if(!res)
		{
			echo "Error occur while exec ".$line."\n";
		}
	}
	if(feof($fp))
		echo "End of file";
	fclose($fp);
	//$res = @unlink($_FILES["file"]["name"]);
}
?>
