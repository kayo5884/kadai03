<?php
require_once('funcs.php');
$pdo = db_conn();

$id= $_GET['id'];
$stmt = $pdo -> prepare('SELECT * FROM gs_bm_table WHERE id=:id');
$stmt->bindValue(':id', $id,PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';
if($status == false){
    sql_error($stmt);
}else{
    $result = $stmt ->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="bm_update_view.php">ブックマークを更新する</a></div>
            </div>
        </nav>
    </header>
    <form action="POST" action="update.php">
        <div class="">
            <fieldset>
                <legend>ブックマーク 更新</legend>
                <label>書籍名：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $result['url']?>"></label><br>
                <label>書籍コメント：</label><br>
                <label><textarea name="comment" id="" cols="40" rows="4"><?= $result['comment']?></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>
</html>
