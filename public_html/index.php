<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
<div class="container">  
<form method="post" action="berry/login.php">
    <div class="login">
        <fieldset>
            <legend>Hello!</legend>
            <!-- <label>User name：<input type="text" name="name" placeholder="名前を入力してください" class="data_insert"></label><br> -->
            <label>Email：<input type="email" name="email" placeholder="メールアドレスを入力してください" class="data_insert" value="test1@gmail.com"></label><br>
            <label>Password：<input type="password" name="password" placeholder="パスワードを入力してください" class="data_insert" value="test1234"></label><br>
            <!-- <label>Comment：<textarea name="comment" rows="4" cols="40" placeholder="任意でコメントを入力してください" class="data_insert"></textarea></label><br> -->
            <input type="submit" value="LOGIN" value="Submit" class="sub_btn">
        </fieldset>

        <!-- <a href="register.php">登録はこちら</a> -->
    </div>
</form>
</div>  
</body>  

</html>
