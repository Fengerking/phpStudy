<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 文件上传 </title>
    </head>
    <body>
    	
<?php
session_start();
$username = $_SESSION['user'];

if ($_FILES["file"]["error"] > 0)
{
    echo "错误：" . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
    echo "<br><br>";
    

    $destname = $username."/".iconv("UTF-8", "gb2312", $_FILES["file"]["name"]);
    
    if (file_exists($destname))
    {
        echo $_FILES["file"]["name"] . " 文件已经存在, 被覆盖。<br>";
        unlink ($destname);
    }
    
    move_uploaded_file($_FILES["file"]["tmp_name"], $destname);
    echo "文件存储在: " . $_FILES["file"]["name"];
}
?>

    <p>&nbsp</p>
    <p>继续上传文件：</p>

    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：  </label>
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" name="submit" value="提交"><br>
    </form>

    <a href="ftplogin.php"><br> 返回文件列表</a>
</body>
</html>
 