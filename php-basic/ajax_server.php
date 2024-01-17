<?php
//Ajaxリクエストを取得(php://inputはAjaxリクエストのbody部分を受け取る)
$ajax_request = file_get_contents('php://input');

//AjaxリクエストをPHPで扱える連想配列に変換 (true=連想配列, false=オブジェクト)
//json_decode('元データの変数, true/false)
$data = json_decode($ajax_request, true);


//受け取ったデータに応じて処理を行う
if( $data['name'] === 'SAMURAI') {
    $data['name'] = 'TERAKOYA'; 
} else {
    $data['name'] = 'SAMURAI';
}

//Ajaxレスポンスを生成(連想配列としてセット)
$response = [
    'message' => $data['name']
];

//JSON形式を指定してブラウザ側へ返信
header('Content-Type: application/json');
echo json_encode($response);
?>
