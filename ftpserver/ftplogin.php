<?php 
require_once "filelist.php";
require_once "dbFunc.php";

session_start();
if(!isset($_POST['login']) && !isset($_POST['regist'])){  
    if (!isset($_SESSION['user']))
        exit('非法访问!');  
    else
    {
        $username = $_SESSION['user'];
        $password = $_SESSION['pswd'];
    }
}  
else
{
    $username = $_POST['username'];  
    $password = $_POST['password'];
    //$username = "liuping";
    $_SESSION['user'] = $username;
    $_SESSION['pswd'] = $password;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 文件列表 </title>
<?php
        outJavaScript();
?>
    </head>
    <body>

<?php 

if (isset($_POST['regist'])) {
    if (findUser ($username)) {
        exit('用户已经存在， 无法注册！');  
    }
    if (!regUser ($username, $password)){
        exit('注册失败，稍后再试！');  
    }
}

if (isset($_POST['login'])) {
    if (!loginUser ($username, $password)){
        exit('用户名或者密码错误！');  
    }
}

doFileList ($username);

?>

    </body>
</html>
