<?php
require_once('funcs.php');
$pdo = db_conn();

$id = $_POST['id'];
$text = $_POST['announce_text'];

var_dump($id);

// $id = $_POST['id'];


$stmt = $pdo->prepare("UPDATE announce_texts 
                       SET
                       announce_text =:announce_text,
                       updated_at = sysdate()
                       WHERE
                       id = :id;");

$stmt->bindValue(':announce_text', $text, PDO::PARAM_STR);
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// $stmt->bindValue(':', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ更新処理後
if ($status == false) {
  sql_error($stmt);
} else {
  // var_dump($stmt);
  redirect('select.php');
  // header('select.php');
}