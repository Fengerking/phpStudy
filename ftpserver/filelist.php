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
	header {
        background-color:#888888;
        color:white;
        width:800px;
        text-align:center;
        padding:2px;
	}
   viewFile{
   	    background-color:#FFFFFF;
        width:700px;
        float:left;
        padding:5px;
   }
   viewButton{
   	    background-color:#FFFFFF;
        width:100px;
        float:left;
        text-align:center;
        padding:5px;
   }
   footer {
        background-color:#666666;
        color:white;
        width:800px;
        clear:both;
    }
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
 
    echo "<header>\r\n";
    echo "<h3> 文件列表 </h3>\r\n";
    echo "</header>\r\n";

    echo "<viewFile>\r\n";
    foreach ($files as $value) { 
        $gbname = iconv("gb2312", "UTF-8", $value);
        $urlvalue = urlencode($value);
        
        echo "<p>";
        echo $gbname;
        echo "&nbsp &nbsp <a href=".$subfolder."/".$gbname."> 下载 </a>\r\n";
        echo "</p>";
    }
    echo "</viewFile>\r\n";

    echo "<viewButton>\r\n";
    foreach ($files as $value) { 
        $gbname = iconv("gb2312", "UTF-8", $value);
        $urlvalue = urlencode($value);
        
        echo "<p>";
        echo "&nbsp &nbsp <input type=\"button\"  onclick=\"doConfirm('".$gbname."', '".$urlvalue."')\" value=\"删除\" /><br>\r\n";
        echo "</p>";
    }
    echo "</viewButton>\r\n";
    
?>
    <footer>
    <p>&nbsp</p>
    <p>上传文件：</p>

    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：  </label>
        <input type="file" name="file" id="file"><br><br>
        &nbsp&nbsp<input type="submit" name="submit" value="提交">
    </form>
    <br />
    </footer>

<?php    
}
?>

