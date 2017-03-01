<?php
/*session_start();*/
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
$url="youxiangzhuce.html";
print_r($_POST);
try{
    $pdo = new PDO($service , 'root' , '');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_POST['checklogina']==1)
    {
        $signinname=$_POST['huozhe'];
        $password=$_POST['psd'];
        $result = $pdo -> query("SELECT * from userinformation where signinname='{$signinname}'");
        $data = $result -> fetch(PDO::FETCH_ASSOC);
        if ($password == $data['password']) 
       {
           /* $_SESSION['username']=$username;
            $_SESSION['password']=$password;*/
            header("location:yidengluzhuye.html");          
        }
        else 
        {
            echo "登录失败";
        }
    }
    else
    {
        $signinname=$_POST['email'];
        $password=$_POST['psd'];
        $username=$_POST['mingzi'];
        $result=$pdo->query("INSERT into userinformation (username,signinname,password) values ('{$username}','{$email}','{$password}')");
        header("location:yidengluzhuye.html");
        /*if($result)
        {
            echo "1";
            $to = "$_signinname";
            $subject = "账号激活";
            $message = "您好，请在 24 小时内点击此链接以完成激活";
            $from = "1530417351@qq.com";
            $headers = "From: $from";
            mail($to,$subject,$message,$headers);
            echo "Mail Sent.";
        }
        else{
            echo "2";
        }
*/    }
}
catch (PDOException $e) {
            echo "数据库连接失败";
    }
?>
