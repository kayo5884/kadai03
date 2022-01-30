<?php
$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare(
    "INSERT INTO gs_bm_table( id, name, url, comment, indate)
    VALUES( NULL, :name, :url, :comment, sysdate() )"
  );
  
  // 4. バインド変数を用意
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  
  $stmt->bindValue(':url', $url, PDO::PARAM_STR);  
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  
  
  // 5. 実行
  $status = $stmt->execute();
  
  //6．データ登録処理後
  if($status==false){
      sql_error($stmt);
    }else{
      redirect('index.php');
    }
?>