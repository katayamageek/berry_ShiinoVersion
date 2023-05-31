<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];
// var_dump($id);

$stmt = $pdo->prepare('SELECT * FROM announce_texts WHERE id =' . $id . ';');
$status = $stmt->execute();
// $var_dump($id);

// $view = '';
// if ($status == false) {
//     sql_error($status);
// } else {
//     $row = $stmt->fetch();
// }
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $view .= '<textarea cols="70" rows="10">';
        // $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        // $view .= $result['id'];
        // $view .= '<br>';
        $view .= $result['announce_text'];
        // $view .= '</textarea>';

        // $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        // $view .= '  [削除]  ';
        // $view .= '</a>';

        // $view .= '</p>';
        // $view .= '<p>';
        // $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        // $view .= $result['date'] . '：' . $result['name'];
        // $view .= '</a>';
        // var_dump($id);
        // var_dump($view);

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Admin</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
    <style>
        .container{
            width:720px;
            /* border: solid 1px; */
        }
        .btn-area{
            margin: 0 auto;
            /* border: solid 1px; */
            max-width: 720px;
        }

        .btn-spacing{
            justify-content:center;
        }

        .btn-spacing div{
            width:25%;
            margin:auto;   
        }
        textarea{
            /* max-width:720px; */
            width:inherit;
        }


    </style>
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
    <h3>テキスト編集</h3>
    <form method="post" action="update.php">
        <!-- <fieldset> -->
            <!-- <legend>Welcom!</legend> -->
            <label><input type="hidden" name = "id" value="<?= $id ?>"></label>
            <label><textarea id="textarea" cols="78" rows="10" name="announce_text" value="<?= $view ?>"><?= $view ?></textarea></label>
            <!-- <legend>Welcom!</legend> -->
    </form>
    
    <!-- <form action="samplel.cgi" method="post"> -->
    <p>リピート回数<br>
        <select size="1" name="sample" id="repeatNum">
            <option value="1">1回</option>
            <option value="2">2回</option>
            <option value="3">3回</option>
            <option value="4">4回</option>
            <option value="5">5回</option>
        </select>
    </p>
<!-- </form> -->

    <div class="btn-area">
        <div class="flex btn-spacing">
            <div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="UPDATE" class="sub_btn" >UPDATE</button>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2023</p> -->
            </div>
            <div>
                <button class="btn btn-lg btn-success btn-block" type="button" value="PLAY" class="sub_btn" id="output" onclick="speak(this, 'テスト')">PLAY</button>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2023</p> -->
            </div>
            <div>
                <button class="btn btn-lg btn-success btn-block" type="button" value="PLAY" class="sub_btn" id="repeat" onclick="speak(this, 'テスト')">REPEAT</button>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2023</p> -->
            </div>
        </div>
    </div>
</div>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
</ul> -->
    


    
<!-- <div><input type="submit" value="UPDATE" class="sub_btn"></div>
<div><input type="button" value="PLAY" class="sub_btn" id="output" onclick="speak(this, 'テスト')"></div>   -->
<!-- <div><button id="output" onclick="speak(this, 'テスト')">　▶　</button></div> -->




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/apikey.js"></script>
<script>

// 音声合成
function speak(button, text) {
  const getText = document.getElementById("textarea").value;
    // (↑)HTMLに置いた「localStorage.getItem("demo");」の処理内容を「getText」とlet定義する
    console.log(getText);
    const url = "https://texttospeech.googleapis.com/v1/text:synthesize?key=" + apiKey;
    const data = {
        "input": {
            "text": getText
            // "ssml":
            // (↑)let定義したgetTextを音声合成する内容('text')に指定する
        },
        "voice": {
            "languageCode": "ja-JP",
            "name": "ja-JP-Standard-B"
        },
        "audioConfig": {
            "audioEncoding": "MP3",
            "speaking_rate": "1.00",
            "pitch": "0.00"
        }
    }
    // console.log(data);
    const otherparam = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(data),
        method: "POST"
    }
    fetch(url, otherparam)
        .then(data => { return data.json() }) //texttospeechの実行
        .then(res => {
                try {
                    //APIのレスポンス処理必要な部分
                    var blobUrl = base64ToBlobUrl(res.audioContent)
                    var audio = new Audio()
                    audio.src = blobUrl
                    audio.play()

                    //レスポンス項目
                    // console.log(data)
                    // console.log(res)

                    //APIのレスポンス不要な処理
                    // console.log(audio.src)
                    // const downloadlink = URL.createObjectURL(blob);
                    // console.log(blob);
                    // const link = document.getElementById('download');
                    // link.href = url;
                    // link.download = 'output.mp3';
                    // console.log(download)

                } catch (e) {
                    console.log(e)
                }
        })
    }

// Base64 → BlobUrl
function base64ToBlobUrl(base64) {
    var bin = atob(base64.replace(/^.*,/, ''))
    var buffer = new Uint8Array(bin.length)
        for (var i = 0; i < bin.length; i++) {
            buffer[i] = bin.charCodeAt(i)
        }
    return window.URL.createObjectURL(new Blob([buffer.buffer], { type: "audio/wav" }))
    const downloadlink = URL.createObjectURL(blob);
    const link = document.getElementById('download');
}

$("#repeat").on("click",function(){
    let repeatNum = $('option:selected').val();
    console.log('repeat回数は' + repeatNum + '回');

    let num = 1;
    console.log(num);
    let repeat = setInterval(() => {
        if (num < repeatNum){
            speak()
            console.log(num);
            num ++
        }
        if (num > repeatNum){
            clearInterval(repeat)
            console.log("repeat終了")
        }
    }, 2000);
}
);


    

</script>
</body>
</html>