<?php
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
$signinname=$_POST['signinname'];
$password=$_POST['password'];
$url="youxiangzhuce.html";
try{
	$pdo = new PDO($service , 'root' , '');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo -> query("select * from userinformation where signinname='{$signinname}'");
    if($result)
    {
        $data = $result -> fetch(PDO::FETCH_ASSOC);
        if ($password == $data['password']) 
       {
            $url="";
            echo " window.location.href = '$url' ";  
        }
    else 
        {
            echo "<script>登录失败</script>";
        }
    }
    else
    {
        $result=$pdo->query("INSERT into userinformation(email,password) values('{$_signinname}','{$_password}'");
        if($result)
        {
            echo "<script>注册成功</script>";
        }
    }
    }
catch (PDOException $e) {
            echo "数据库连接失败";
    }
?>
