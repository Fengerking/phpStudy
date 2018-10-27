<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 文件上传 </title>
          <style>
            body{ text-align:center}
            .div{ margin:0 auto; width:800px; height:400px; }
          </style>
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
?>
      <div class="div">
        <table border="1"  cellspacing="0" style="border-color:#EEEEEE" >
          <tr bgcolor="#BBBBBB" height ="44px">
            <th style="width:120px; font-size:16px; "> 名称 </th>
            <th style="width:670px; font-size:16px; "> 信息 </th>
          </tr>
          <?php    
        echo "<tr height =\"36px\">";
        echo "<td style=\"text-align:left \"> 文件名: </td>\r\n";
        echo "<td style=\"text-align:left \">".$_FILES["file"]["name"]."</td>\r\n";
        echo "</tr>\r\n";
        
        echo "<tr height =\"36px\">";
        echo "<td style=\"text-align:left \"> 文件类型: </td>\r\n";
        echo "<td style=\"text-align:left \">".$_FILES["file"]["type"]."</td>\r\n";
        echo "</tr>\r\n";
        
        echo "<tr height =\"36px\">";
        echo "<td style=\"text-align:left \"> 文件大小: </td>\r\n";
        echo "<td style=\"text-align:left \">".($_FILES["file"]["size"] / 1024)."KB</td>\r\n";
        echo "</tr>\r\n";
      
    $destname = $username."/".iconv("UTF-8", "gb2312", $_FILES["file"]["name"]);  
    if (file_exists($destname))
    {
        unlink ($destname);
        echo "<tr height =\"36px\">";
        echo "<td style=\"text-align:left \"> 覆盖: </td>\r\n";
        echo "<td style=\"text-align:left \"> 文件已存在，已经被覆盖!</td>\r\n";
        echo "</tr>\r\n";
    }
    
    move_uploaded_file($_FILES["file"]["tmp_name"], $destname);
    
    echo "</table>\r\n";
}
?>

          <div style="width:800px; background:#CCCCCC ">
            <p>继续上传文件</p>

            <form action="fileupload.php" method="post" enctype="multipart/form-data">
              <label for="file">文件名：  </label>
              <input type="file" name="file" id="file">
                <br>
                  <br>
                    <input type="submit" name="submit" value="提交">
                      <br>
    
            </form>

            <a href="ftplogin.php">
              <br> 返回文件列表
            </a>
            <br></br>
          </div>
        </div>
      
</body>
</html>
 