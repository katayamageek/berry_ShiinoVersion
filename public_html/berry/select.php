<?php
require_once('funcs.php');
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM announce_texts");
$status = $stmt->execute();


$view = '';
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $view .= '<p> No.';
        // $view .= $result['id'];
        $view .= '<a href="detail.php?id=' . $result['id'].  '">';
        // $view .= $result['id'];
        $view .= '<br>';
        $view .= $result['announce_text'];
        $view .= '</a></p>';


        // $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        // $view .= '  [削除]  ';
        // $view .= '</a>';

        // $view .= '</p>';
        // $view .= '<p>';
        // $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        // $view .= $result['date'] . '：' . $result['name'];
        // $view .= '</a>';

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>テキスト選択</title>
<link href="css/reset.css" rel="stylesheet">
<!-- <link href="css/style.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
<link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
<script src="js/jquery-3.5.1.min.js"></script>
<!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body id="main">
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="">Berryさんプロトタイプ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/index.php">ログイン画面<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="insert_form.php">テキスト登録</a></li></span></a>
        </li>
    </div>
</nav>
    
    <!-- 共通Header -->    <div>
        <div class="container ">
            <h1>登録済みのテキストの表示 </h1>

            <!-- <a href="detail.php"></a> -->
            <?= $view ?>
        </div>
    
              <!-- Jumbotron -->
      <!-- <div class="jumbotron">
      <p>※サーバーがロースペックのため編集時に時間がかかります</p>
       <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      <!-- </div> -->

</body>
</html>
