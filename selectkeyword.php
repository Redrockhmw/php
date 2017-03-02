<?php
$service='mysql:host=localhost;dbname=segmentfault';
$name='root';
$code='';
$keyword=$_POST['keyword'];
print_r($_POST);
try
{
	$pdo = new PDO($service , 'root' , '');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo -> query("select * from selectkeyword																																								 where keyword='{$keyword}'");
    $data = $result -> fetch(PDO::FETCH_ASSOC);
    if ($keyword == $data['keyword']) 
    {
        echo "关键词已存在";
    }
    else 
    {
        echo "关键词不存在";
    }
}
    catch (PDOException $e) 
    {
        echo "数据库连接失败";
    }
?>
