<?php
		session_start();
			$headline=$POST['headline'];
			$tag=$_POST['tag'];
			$details=$_POST['details'];
			$author=$_SESSION['username'];
			$config=require_once 'config.php';
			$pdo = new PDO($config['db_linkname'],$config['db_username'],$config['db_password']);
			$pdo -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
			$number=$pdo->query("SELECT num FROM ask ORDER BY num DESC")->fetch(PDO::FETCH_ASSOC)['num']+1;
			$demo=$pdo->prepare("INSERT INTO ask (num,headline,tag,details,author) VALUES (?,?,?,?,?)");
			$demo->bind_param(1,$num, PDO::PARAM_INT);
			$demo->bind_param(2,$headline, PDO::PARAM_STR);
			$demo->bind_param(3,$tag, PDO::PARAM_STR);
			$demo->bind_param(4,$details, PDO::PARAM_STR);
			$demo->bind_param(5,$author, PDO::PARAM_STR);
			$demo->execute();
			echo "<script>alert('提问成功".$_SESSION['username']."')</script>";
			header("");
		?>