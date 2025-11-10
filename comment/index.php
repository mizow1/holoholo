<?php
ini_set('display_errors', 1);
session_start();
session_unset(); // 結果ページのseedを削除

// 定数は functions.php で定義されているため、ここでは定義しない
require_once(dirname(dirname(__FILE__)) . '/lib/template.php');
require_once(dirname(dirname(__FILE__)) . '/lib/functions.php');
require_once(dirname(dirname(__FILE__)) . '/parts/log.php');

// テンプレートオブジェクトの作成
$tpl = new MyTemplate();

try {
    // 全コメントを取得（comment_data()は既にapproval=1のコメントのみを返す）
    $all_comments = comment_data();
    
    
    // 現在日時を取得
    $current_date = time();
    
    // 現在日時より前の日付のコメントのみを抽出
    $filtered_comments = array_filter($all_comments, function($comment) use ($current_date) {
        if (empty($comment) || empty($comment['date'])) return false;
        $comment_date = strtotime($comment['date']);
        return $comment_date !== false && $comment_date <= $current_date;
    });
    
    // インデックスを振り直す
    $filtered_comments = array_values($filtered_comments);

    // コンテンツデータを取得
    $contents_data = contents_data();

    // テンプレート変数にセット
    $tpl->comment_data = $filtered_comments;
    $tpl->contents_data = $contents_data;
    $tpl->page_title = 'みんなのコメント一覧';

    
    $tpl->show(SERVICE_PATH.'template/comment_list.php');
} catch (Exception $e) {
    echo 'エラーが発生しました: ' . $e->getMessage();
    exit;
}
