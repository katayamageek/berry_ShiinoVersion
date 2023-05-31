<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
        $db_name = '';　//DBの名前
        $db_id   = '';  // DBのID
        $db_pw   = '';  // DBのパスワード
        $db_host = 'l';　// localhost
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;port=8889;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

function redirect($file_name){
    header('Location: ' . $file_name);
    exit();
}