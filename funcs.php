<?php
// XSS対策を行う関数
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続を行う関数
// PDO(PHP Data Object)とは、DBに接続するためのインターフェイス
// new PDO(データソース名, ユーザー名, パスワード, オプション配列)
// mysql:dbname='.$db_name.';host='.$db_host)→種類がMySQL,DB名とホスト名を明記
// try{エラーの起こりうる処理A}catch(例外変数){例外発生時の処理B}}→処理Aでエラーが発生したら処理
// getMessage()は例外オブジェクトに定義されているメソッド
// $e->getMessage()でその例外に関するメッセージが取得できる（どのようなエラーが発生しているかなど）
function db_conn(){
    try{
        $db_name = "kayo5884_bookmark2";
        $db_id = "kayo5884";
        $db_pw = "***********";
        $db_host = "mysql57.kayo5884.sakura.ne.jp";
        $pdo = new PDO('mysql:'.$db_name. ';charset=utf8;host='.$db_host, $db_id, $db_pw);
        return $pdo;
    } catch(PDOException $e){
        exit('DBConnectError:'.$e->getMessage());
    }
}

function sql_error($smst){
    $error = $smst -> errorInfo();
    exit("SQLError:".print_r($error, true));
}

function redirect($file_name){
    header("Location:".$file_name);
    exit();
}

?>