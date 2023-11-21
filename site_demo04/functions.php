<?php

// === エスケープ処理
function h($var)
{
    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
}

// === DB接続

class GetDB
{
    // 接続情報
    // === mysql:dbname= データベース名, host= ホスト名, port= ポート番号
    const DNS = 'mysql:dbname=xs810378_test01;host=localhost;port=3306';
    const USER = 'xs810378_tossy';
    const PASS = 'tarantno777';
}

//=== メール送信用
class Send_Mail_GOGO
{
    //=== メール件名
    const SUBJECT = "件名：（お問い合わせありがとうございます）";
    //=== メール送信者名
    const SENDER_NAME = "株式会社 xxxぺけぺけ";
}


// === 2023-02-17 11:07:20 の形式で日付け取得
function Get_Datetime()
{
    $objDateTime = new DateTime();
    $tmp_time = $objDateTime->format('Y-m-d H:i:s');

    return $tmp_time;
}


/*
class Mid_Table
{
}
*/