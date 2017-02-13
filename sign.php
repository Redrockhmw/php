<?php
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
$signinname=$_POST['signinname'];
$password=$_POST['password'];
try{
	$pdo = new PDO($service , 'root' , '');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo -> query("select * from userinformation where signinname='{$signinname}'");
    if($result)
    {
        $data = $result -> fetch(PDO::FETCH_ASSOC);
        if ($password == $data['password']) 
 /*     {
            $url="";
            echo " window.location.href = '$url' ";  
        }
    else 
        {
            echo "<script>登录失败</script>";
        }*/
    else
    {
        $result=$pdo->query("INSERT into userinformation(phonenum,email,password) values('{$ signinname}','{$ signinname}','{$password}'");
        if($result)
        {
            /*登陆*/
        }
    }
    }
catch (PDOException $e) {
            echo "数据库连接失败";
    }
?>