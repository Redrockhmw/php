<?php
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
$keyword=$_POST['keyword'];
try{
	$pdo = new PDO($service , 'root' , '');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo -> query("select * from selectkeyword where keyword='{$keyword}'");
    $data = $result -> fetch(PDO::FETCH_ASSOC);
    if ($keyword == $data['keyword']) 
        {
            $url="";
            echo "<script>window.location.href='$url';</script>";
    	}
    else 
        {
            $url="";
            echo "<script>window.location.href='$url';</script>";
    	}
}
catch (PDOException $e) {
            echo "数据库连接失败";
    }
?>
