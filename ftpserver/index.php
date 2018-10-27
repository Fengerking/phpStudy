<!DOCTYPE html>

<html>  

<head>
    <meta charset="utf-8">
  	<title> 用户登录 </title>	
    
<script src="md5.js"></script>

<script type="text/javascript">
    function loginClick() {
        var name = document.LoginForm.username.value;
        var pwd = document.LoginForm.password.value;
	    if(name==null||name.length==0){
		    alert("用户名不能为空！");
		    return;
	    }
	     if(pwd==null||pwd.length==0){
		    alert("密码不能为空！");
		    return;
	     }
	     var hash = md5(pwd);
	     document.LoginForm.password.value = hash;
	     document.LoginForm.submit();
    }
</script>

</head>  

<body>

<form name="LoginForm" method="post" action="ftplogin.php" >  

<p>  
<label for="username" class="label">用户:</label>  
<input id="username" name="username" type="text" value=""/>  
<p/>  

<p>  
<label for="password" class="label">密码:</label>  
<input id="password" name="password" type="password" value="" />  
<p/>  

<p>  
<input type="submit" name="login" onclick ="loginClick()" value="  登  录  " class="left" />  &nbsp &nbsp
<input type="submit" name="regist" onclick ="loginClick()" value="  注  册  " class="right" />  
<br />

</p>  

</form>  


</body>

</html>