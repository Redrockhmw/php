<?php
$service;
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
print_r($_POST);
try{
		$headline=$_POST['headline'];
		$tag=$_POST['tag'];
		$details=$_POST['details'];
		$pdo = new PDO($service,'root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$result = $pdo -> query("INSERT into questions(headline,tag,details) VALUES ('{$headline}','{$tag}','{$details}')");
		if ($result) {
			echo "提问成功";
		}
	}
catch(PDOException $e){
		echo "数据库连接失败";
	}
?>
