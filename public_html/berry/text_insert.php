<?php

// require_once('funcs2.php');
require_once('funcs.php');

$announce_text = $_POST['announce_text'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $comment = $_POST['comment'];

$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO announce_texts(id, announce_text, created_at,updated_at)
                       VALUES(NULL, :announce_text,  sysdate(), sysdate())");

$stmt->bindValue(':announce_text', $announce_text, PDO::PARAM_STR); 
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('select.php');
}
?>

