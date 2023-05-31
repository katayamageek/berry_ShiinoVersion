// Google API準備
const apiKey = 'AIzaSyBTG6UaYCQBu3a8hJL1KDN-Cz2H7RTHSUM';


// Google API呼び出すための機能群
// 音声合成
function speak(button, text) {
    // let readText = $("#readText").val();
    // console.log(readText);
    // (↑)HTMLに置いた「localStorage.getItem("demo");」の処理内容を「getText」とlet定義する
    console.log(getText);
    const url = "https://texttospeech.googleapis.com/v1/text:synthesize?key=" + apiKey;
    const data = {
        "input": {
            "text": getText
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
    const otherparam = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(data),
        method: "POST"
    }
    fetch(url, otherparam)
        .then(data => { return data.json() })
        .then(res => {
            try {
                var blobUrl = base64ToBlobUrl(res.audioContent)
                var audio = new Audio()
                audio.src = blobUrl
                audio.play()
                console.log(blobUrl);
                console.log(audio);
            } catch (e) {
                console.log(e)
            }
        })
        .catch(error => alert(error))
}




// }

// Base64 → BlobUrl
function base64ToBlobUrl(base64) {
    var bin = atob(base64.replace(/^.*,/, ''))
    var buffer = new Uint8Array(bin.length)
    for (var i = 0; i < bin.length; i++) {
        buffer[i] = bin.charCodeAt(i)
    }
    return window.URL.createObjectURL(new Blob([buffer.buffer], { type: "audio/wav" }))
}

//API実行ボタン
$(".btn").on("click",function(){
    // speak();
    // console.log()
    let readText = $("#readText").val();
    console.log("aaa");

});


// NEXT 一度取得したら音源をAPI呼ばずに再生する


// localStorage.removeItem("demo")
// // (↑)ページ読み込み(リロード)時にローカルストレージをremoveする

// // 店名と商品を原稿へインプットする
// function onButtonClick1() {
//     target = document.getElementById("output1");
//     target.innerText = document.forms.id_form1.id_textBox1.value;
//     //target.innerText = document.id_form1.id_textBox1.value;//これでもOK
// };

// function onButtonClick2() {
//     target = document.getElementById("output2");
//     target.innerText = document.forms.id_form2.id_textBox2.value;
//     //target.innerText = document.id_form1.id_textBox1.value;//これでもOK
// };



// クリップボードへコピーする
// const copybtns = document.getElementsByClassName('copybtn'); // コピーするボタンのクラス名

// const clipCopy = () => {
//     if (copybtns.length > 0) {
//         for (let i = 0; i < copybtns.length; i++) {
//             copybtns[i].addEventListener('click', () => {
//                 const copytextarea = document.createElement("textarea");
//                 const id = copybtns[i].getAttribute('data-copy');
//                 const copyarea = document.getElementById(id);
//                 const copytext = copyarea.textContent;
//                 copytextarea.textContent = copytext;
//                 //(↑)copytext=ボタンを押したら…
//                 localStorage.removeItem("demo")
//                 //(↑)ローカルストレージをremoveして…
//                 localStorage.setItem("demo", copytext);
//                 // (↑)ローカルストレージにセットする（入れる）
//                 document.body.appendChild(copytextarea);
//                 copytextarea.select();
//                 const results = document.execCommand('copy');
//                 document.body.removeChild(copytextarea);
//                 // if (results) {
//                 //     alert('クリップボードにコピーしました。');
//                 // } else {
//                 //     alert("コピーに失敗しました。")
//                 // }
//             });
//         }
//     }
// }

// clipCopy();

// (↓)ボタンを押すと色が変わりっぱなしになる
// document.getElementById('copybtn').addEventListener('click',
//   function () {
//     this.style.backgroundColor = "#3fb811";
//   }
// )

// $("#output").on("click", function () {
//     const str1 = $("#text").val(); // テキストボックスのvalue値を取得
//     console.log(str1);
//     $("#span1").text(str1); // spanタグに値を設定
//     text2 = str1
//     console.log(text2)

// // ローカルストレージへ保存
// localStorage.setItem("demo", str1);

// });




