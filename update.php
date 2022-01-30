<?php
$name =$_POST['name'];
$url =$_POST['url'];
$comment =$_POST['comment'];
$id =$_POST['id'];

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare(
    "UPDATE gs_bm_table SET 
    name =:name, url =:url, comment =:comment, indate=sysdate() 
    WHERE id =:id"
    );

$stmt->bindValue(':name', $name, PDO::PARAM_STR);   
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  

$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
  }else{
    redirect('bm_update_view.php');
  }

?>
