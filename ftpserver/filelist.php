<?php 
function outJavaScript ()
{
?>    
<script type="text/javascript">
function doConfirm(varName, varURL)
{
    var msg = "确认删除文件 " + varName + " 吗？";
    var r=confirm(msg)
    if (r==true)
    {
        var urlDelete = 'filedelete.php?filedelete=' + varURL;
        window.location.href = urlDelete;
    }
}
</script>

<style>
  body{ text-align:center}
  .div{ margin:0 auto; width:800px; height:400px; }
</style>

<?php
}

function doFileList($subfolder)
{   
    $files = array ();
    $filename = "";
    
    if(!is_dir($subfolder)) {
        mkdir ($subfolder);
    }
    
    $dir = getcwd()."/".$subfolder;
    $handler = opendir($dir); 
    while (($filename = readdir($handler)) !== false) {
        if ($filename != "." && $filename != "..") { 
            $files[] = $filename; 
        }   
    } 
    closedir($handler); 
 ?>

<div class="div">

  <table border="1"  cellspacing="0" style="border-color:#EEEEEE" >
    <tr bgcolor="#BBBBBB" height ="44px">
      <th style="width:710px; font-size:16px; ">文件列表</th>
      <th style="width:80px; font-size:16px; ">操作</th>
    </tr>

    <?php
    foreach ($files as $value) { 
        $gbname = iconv("gb2312", "UTF-8", $value);
        $urlvalue = urlencode($value);
        
        echo "<tr height =\"36px\">";
        echo "<td style=\"text-align:left \">";
        echo $gbname;
        echo "&nbsp &nbsp <a href=".$subfolder."/".$gbname."> 下载 </a>\r\n";
        echo "</td>\r\n";
        
        echo "<td>";
        echo "&nbsp &nbsp <input type=\"button\"  onclick=\"doConfirm('".$gbname."', '".$urlvalue."')\" value=\"删除\" /><br>\r\n";
        echo "</td>";
        echo "</tr>";
    }   
?>
  </table>

  <div style="width:800px; background:#CCCCCC ">
    <p>&nbsp</p>
    <p>上传文件</p>

    <form action="fileupload.php" method="post" enctype="multipart/form-data">
      <label for="file">文件名：  </label>
      <input type="file" name="file" id="file">
        <br>
          <br>
            &nbsp&nbsp<input type="submit" name="submit" value="提交">
    
  
    </form>
    <br />
  </div>
</div>


<?php    
}
?>

