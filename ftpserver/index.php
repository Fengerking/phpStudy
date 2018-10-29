<!DOCTYPE html>

<html>  

<head>
    <meta charset="utf-8">
  	<title> 用户登录 </title>	
    
<script src="md5.js"></script>

<script type="text/javascript">
    function checkValue() {
        var name = document.LoginForm.username.value;
        var pwd = document.LoginForm.password.value;
	    if(name==null||name.length==0){
		    alert("用户名不能为空！");
		    return false;
	    }
	     if(pwd==null||pwd.length==0){
		    alert("密码不能为空");
		    return false;
	     }
	     var hash = md5(pwd);
	     document.LoginForm.password.value = hash;
	     return true;
    }
</script>

<style> 
body{ text-align:center} 
.div{ margin:0 auto; width:800px; height:400px; } 
</style> 

</head>  

<body>

<div class="div">
<br></br>
<form name="LoginForm" method="post" action="ftplogin.php" onsubmit="checkValue()" >  

<p>  
<label for="username" class="label">用户:</label>  
<input id="username" name="username" type="text" value=""/>  
<p/>  

<p>  
<label for="password" class="label">密码:</label>  
<input id="password" name="password" type="password" value="" />  
<p/>  

<p>  
<input type="submit" name="login" value="  登  录  " class="left" />  &nbsp &nbsp
<input type="submit" name="regist" value="  注  册  " class="right" />  
<br />

</p>  
<br></br>

</form>  
</div>


</body>

</html>