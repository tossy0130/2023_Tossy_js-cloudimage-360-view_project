<?php

// gmail
$to = "tokotoko33ok@gmail.com";
// $to = "test_02@xs810378.xsrv.jp";

$subject = "TEST MAIL";

$senderName = base64_encode("test_01@xs810378.xsrv.jp");
$senderName = "=?UTF-8?B?{$senderName}?=";

$message = <<< EOS
<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=UTF-8">
</head>
<body>
<h1>HTMLメールのテスト</h1>
<p>
HTMLメールのテストです。setHTMLBodyメソッドを使います。
</p>

<p>
<img src="https://xs810378.xsrv.jp/site_demo04/img/g_05.jpg">
</p>

</body>
</html>
EOS;

$mailHeaders = <<< EOF
From:  {$senderName} <test_01@xs810378.xsrv.jp>
Reply-To: test_01@xs810378.xsrv.jp
Return-Path: test_01@xs810378.xsrv.jp
Content-type: text/html; charset=UTF-8
EOF;


$result = mail($to, $subject, $message, $mailHeaders);

if ($result) {
    echo "送信成功";
} else {
    echo "送信失敗";
}
