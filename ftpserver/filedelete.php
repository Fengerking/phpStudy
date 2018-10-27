<?php 
require_once "filelist.php";
session_start();
$username = $_SESSION['user'];
$filedelete = $_GET['filedelete'];  
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 删除文件 </title>
<?php
        outJavaScript();
?>
    </head>
    <body>

<?php 

    $delfile = $username."/".urldecode($filedelete);
    unlink ($delfile);
    $dispname = iconv("gb2312", "UTF-8", $delfile);
    //echo "<br> 删除文件： ".$dispname."<br>";
        
    doFileList ($username);

   // echo "<br><br> <a href=index.php> 返回主页 </a>";

?>

    </body>
</html>
