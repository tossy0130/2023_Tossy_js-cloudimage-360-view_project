<?php

require(dirname(__FILE__) . '/functions.php');

// メール送信　可変
$MAILTO = "tokotoko33ok@gmail.com"; // 宛先のメールアドレス

$content = "本文：てすと本文：てすと本文：てすと本文：てすと";

// 送信社
//==========  Gmail用　エンコーディング対策
$senderName = base64_encode(Send_Mail_GOGO::SENDER_NAME);
$senderName = "=?UTF-8?B?{$senderName}?=";

// ヘッダー情報　=== test_01@xs810378.xsrv.jp エックスサーバーメール
$mailHeaders = <<< EOF
From: {$senderName} <test_01@xs810378.xsrv.jp>
Reply-To: test_01@xs810378.xsrv.jp
Return-Path: test_01@xs810378.xsrv.jp
X-Mailer: X-Mailer
MIME-Version: 1.0
Content-Type: text/plain;charset=UTF-8
Content-Transfer-Encoding: 8bit
EOF;

// 文字化けするようなら下記のコメントアウト解除してみて
// mb_language("ja");
mb_internal_encoding("UTF-8");

// メール送信処理
$result = mb_send_mail($MAILTO, Send_Mail_GOGO::SUBJECT, $content, $mailHeaders);

// メール送信処理結果出力
if ($result) {
    echo "送信成功";
} else {
    echo "送信失敗";
}
