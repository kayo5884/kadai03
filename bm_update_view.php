<?php
// 一回だけfuncs.php取得
require_once('funcs.php');
$pdo =db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

$status = $stmt->execute();

$veiw = "";
if($status ==false){
    sql_error($status);
} else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<a href="bm_update.php?id='.$result['id'].'">';
        $view .= '[更新]';
        $view .= '</a>';
        $view .= $result["name"] . "：" . $result["url"];
        $view .= '</a>';
        $view .= '<a href="delete.php?id='.$result['id'].'">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク更新</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">ブックマーク登録に戻る</a></div>
            </div>
        </nav>
    </header>
    <div>
        <div class="container jumbtron">
        <div>ブックマークを更新する</div>
            <a href="detail.php"></a>
            <?=$view ?>
        </div>
    </div>
    
</body>
</html>

