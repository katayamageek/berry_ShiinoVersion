<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Admin</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <style>
        .btn-area{
            margin: 0 auto;
            /* border: solid 1px; */
            max-width: 360px;
        }
    </style>
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="">Berryさんプロトタイプ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/index.php">ログイン画面<span class="sr-only">(current)</span></a>
            <!-- <a href="select.php">テキスト一覧に戻る</a> -->
        </li>
        <li class="nav-item active">
            <!-- <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a> -->
            <a class="nav-link" href="select.php">テキスト一覧</a>
        </li>
</nav>
<div class="container">  
    <h3>テキスト登録</h3>
 <form method="post" action="text_insert.php">
        <fieldset>
            <!-- <label><?= $view ?></label> -->
            <textarea type="text" name="announce_text" value="announce_text" cols="79" rows="10"></textarea>
            <!-- <input type="hidden" name="updated_at" value="<?= $row['id'] ?>"> -->
            <!-- <input type="submit" value="登録" class="sub_btn"> -->
        </fieldset>
        <div>
            <button class="btn btn-lg btn-primary btn-block btn-area" type="submit" value="登録" class="sub_btn" > 登録</button>
            <!-- <p class="mt-5 mb-3 text-muted">&copy; 2023</p> -->
        </div>
            <!-- <div><input type="submit" value="UPDATE" class="sub_btn"></div> -->
 </form>
</div>  

</body>  

</html>
