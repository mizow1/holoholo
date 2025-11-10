<?php
session_start();
require_once('../lib/functions.php');
$_SESSION['return_url']=$_POST['return_url'];
$_SESSION['cid']=$_POST['cid'];
$rate = $_POST['rate']?$_POST['rate']:3;

//コメント登録
$pdo = db_connect();
$sql = "insert into mana_comment (contents_id,title,comment,score,approval) values(:contents_id,:title,:comment,:score,0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':contents_id',$_POST['cid'],PDO::PARAM_INT);
$stmt->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$stmt->bindValue(':comment',$_POST['body'],PDO::PARAM_STR);
$stmt->bindValue(':score',$rate,PDO::PARAM_INT);
$stmt->execute();

// dump確認用
// if($stmt->execute()){
// 	echo 'ok';
// }else{
//     echo "エラー: " . $stmt->errorInfo()[2];
// }
$pdo = null;


//コメントが投稿されましたメール
$to = 'skunk0915@gmail.com'; // 宛先のメールアドレス
$subject = 'ホロホロコメントが来ました'; // メールの件名
$body = $_POST['body']; // フォームから送信された本文
$headers = 'From: your-email@example.com' . "\r\n"; // 送信者のメールアドレス

// メールを送信
mail($to, $subject, $body, $headers);



header('location:send_comment_redirect.php');