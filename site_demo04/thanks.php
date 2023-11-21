<?php

// エラーを出力
ini_set('display_errors', "On");

// 
require(dirname(__FILE__) . '/functions.php');

// リダイレクト用 URL
$redirect_url = 'https://xs810378.xsrv.jp/site_demo04/form.php';

// 判定フラグ
$Thanks_Flg = 0;

session_start();

// === 変数初期化
// SESSION 用
$user_name = ""; // 名前
$user_name_kana = ""; // 名前（カナ）
$tel = ""; // 電話
$email_address = ""; // メールアドレス
$Inquiry_type = ""; // 問い合わせ 種別
$toiawase_text = "";  // 問い合わせ内容

// POST 用
$h_user_name = ""; // 名前
$h_user_name_kana = ""; // 名前（カナ）
$h_tel = ""; // 電話
$h_email_address = ""; // メールアドレス
$h_Inquiry_type = ""; // 問い合わせ 種別
$h_toiawase_text = "";  // 問い合わせ内容

$img_number = ""; // メール送信　時　画像判別用

$token_two = "";

$arr_color_name = []; // 選択したカラー画像 index:0 => 名 01, index 1 = 名 02

if (isset($_POST['token_two'])) {
    // === POST のトークン 2 が空だったら、リダイレクト
    if (empty($_POST['token_two'])) {
        header("Location: {$redirect_url}");
    } else {
        $token_two = $_POST['token_two'];
    }
}

// === トークンチェック
if (empty($_SESSION['token_two'])) {

    header("Location: {$redirect_url}");
} else {
    // === トークンありの場合

    // === session と post のトークンが一致した場合
    if ($_SESSION['token_two'] == $token_two) {

        // ============ フォームの hidden の値を POST で取得
        if (isset($_POST['h_user_name'])) {
            $h_user_name = $_POST['h_user_name'];
        }

        if (isset($_POST['h_user_name_kana'])) {
            $h_user_name_kana = $_POST['h_user_name_kana'];
        }

        if (isset($_POST['h_tel'])) {
            $h_tel = $_POST['h_tel'];
        }

        if (isset($_POST['h_email_address'])) {
            $h_email_address = $_POST['h_email_address'];
        }

        if (isset($_POST['h_Inquiry_type'])) {
            $h_Inquiry_type = $_POST['h_Inquiry_type'];
        }

        if (isset($_POST['h_toiawase_text'])) {
            $h_toiawase_text = $_POST['h_toiawase_text'];
            // === 問い合わせ内容が空の場合は、なしを代入
            if (empty($h_toiawase_text)) {
                $h_toiawase_text = "なし";
            }
        }

        if (isset($_POST['img_number'])) {
            $img_number = $_POST['img_number'];
        }

        // === 送信結果　フラグ 1: 送信完了 2:エラー
        $Thanks_Flg = 1;

        // ============================ メール送信処理 START ==================================

        // === 送信先
        $to = $h_email_address;

        // === メールタイトル
        $subject = "ガラステーブルのお問い合わせを受付致しました。";

        // === Gmail 対策
        $senderName = base64_encode("test_01@xs810378.xsrv.jp");
        $senderName = "=?UTF-8?B?{$senderName}?=";

        // === 選択した画像のパスを取得して、img へセットする。
        $img_path = "";

        switch ($img_number) {
            case "1":
                $img_path = "g_01.jpg";
                $arr_color_name[0] = "ライトブルー";
                $arr_color_name[1] = "（SS5）";
                break;
            case "2":
                $img_path = "g_02.jpg";
                $arr_color_name[0] = "シャーベットピンク";
                $arr_color_name[1] = "（SBP）";
                break;
            case "3":
                $img_path = "g_03.jpg";
                $arr_color_name[0] = "シャーベットレッド";
                $arr_color_name[1] = "（SBR）";
                break;
            case "4":
                $img_path = "g_04.jpg";
                $arr_color_name[0] = "アクアグリーン";
                $arr_color_name[1] = "（FG3）";
                break;
            case "5":
                $img_path = "g_05.jpg";
                $arr_color_name[0] = "ダンディーブルー";
                $arr_color_name[1] = "（SS1）";
                break;
            case "6":
                $img_path = "g_06.jpg";
                $arr_color_name[0] = "ラベンダー";
                $arr_color_name[1] = "（TP6）";
                break;
            case "7":
                $img_path = "g_07.jpg";
                $arr_color_name[0] = "ペールスカイ";
                $arr_color_name[1] = "（BO3）";
                break;
            case "8":
                $img_path = "g_08.jpg";
                $arr_color_name[0] = "ピュアパールホワイト";
                $arr_color_name[1] = "（JPW）";
                break;
            case "20":
                $img_path = "t_bl.jpg"; // === カーボンブラックテーブル
                $arr_color_name[0] = "カーボンブラック";
                $arr_color_name[1] = "";
                break;
        }



        $message = <<< EOS
<html>
<head>
<meta http-equiv="Content-Type" Content="text/html;charset=UTF-8">

<style>



        /*** HTML メール  レイアウト ***/
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        .tb01 th,
        .tb01 td {
            padding: 15px;
            border: solid 1px #ccc;
            text-align: center;
            box-sizing: border-box;
        }

        .tb01 th {
            background: #c1a9a3;
            color: #fff;

        }

        #mail_img {
              width: 100%;
              height: auto;
        }

        @media screen and (max-width: 640px) {
            .tb01 .head {
                display: none;
            }

            .tb01 {
                width: 100%;
            }

            table.tb01 td {
                display: block;
                width: 100%;
                border-bottom: none;
            }

            table.tb01 td:first-child {
                background: #c1a9a3;
                color: #fff;
                font-weight: bold;
            }

            .tb01 tr:last-child {
                border-bottom: solid 1px #ccc;
            }

            #mail_img {
                   width: 65%;
                   height: auto;
            }

        }

</style>

</head>
<body>
<h1>有限会社 ミッド（Mid）</h1>
<h2>
お問い合わせありがとうございます。
</h2>

<table class="tb01" width="100%" border="0" cellpadding="0" cellspacing="0" style="width:100%; border:none; margin:0 auto; max-width: 1000px;display: table !important;">
  <tr>
    <th width="28%">
        お問い合わせ種別
    </th>

    <th width="28%">
        お問い合わせ内容
    </th>

     <th width="40%">
        お問い合わせ対象テーブル
    </th>
  </tr> 
  
  <tr>
    <td width="28%">{$h_Inquiry_type}</td>
    <td width="28%">{$h_toiawase_text}</td>
    <td width="40%"><p>
テーブルカラー:<b>{$arr_color_name[0]} {$arr_color_name[1]}</b><br /><br />
※画像が表示されない場合は、メールソフトの設定を変更してください。<br />
<img id="mail_img" width="100%" src="https://xs810378.xsrv.jp/site_demo04/img/$img_path">
</p></td>
  </tr>
</table>

<p>
上記の内容のお問い合わせに関しまして、ご連絡させて頂きますので<br />
よろしくお願い致します。
</p>

<div style="background-color:#0C0C38;padding:8px;">
    <p style="color:#fff;text-align:center;font-size:1.0em;">〒955-0036 新潟県三条市篭場5-10</p>
    <p style="color:#fff;text-align:center;font-size:1.6em;">有限会社ミッド</p>
    <p style="color:#fff;text-align:center;font-size:1.0em;">電話番号:<a style="color:#fff !important;text-decoration: none !important;font-size:1.3em !important;display: inline-block;" href="tel:0256-38-2688">0256-38-2688</a></p>
    <p style="color:#fff;text-align:center;font-size:1.0em;">メールアドレス:<a style="color:#fff !important;text-decoration: none !important;font-size:1.3em !important;display: inline-block;" href="mailto:niigata.ogi-mid@am.wakwak.com?subject=ノフュレカラーページから">niigata.ogi-mid@am.wakwak.com</a></p>
</div>

</body>
</html>
EOS;

        $mailHeaders = <<< EOF
From:  {$senderName} <test_01@xs810378.xsrv.jp>
Reply-To: test_01@xs810378.xsrv.jp
Return-Path: test_01@xs810378.xsrv.jp
Content-type: text/html; charset=UTF-8
EOF;

        // === メール送信
        $result = mail($to, $subject, $message, $mailHeaders);

        // === 送信結果 判定 ===
        if ($result) {
            //  echo "送信成功";
            $Thanks_Flg = 1;
        } else {
            //  echo "送信失敗";
            $Thanks_Flg  = 2;
        }

        // ============================ メール送信処理 END ==================================


    }
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS 読み込み -->
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/form.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <title>問い合わせ 完了</title>


    <style>
        #thank_p {
            font-size: 20px;
            margin: 30px 0px;
            letter-spacing: 0.14em;
            font-weight: 600;
        }
    </style>

</head>

<body>


    <div class="container">

        <?php if (strcmp($Thanks_Flg, 1) == 0) : ?>
            <div class="col-lg-10 col-sm-10 col-10" style="border-top: 0.5px solid #666;border-bottom: 0.5px solid #666;margin: 40px 0;">
                <p style="text-align: center;" id="thank_p">
                    お問い合わせありがとうございました。<br />
                    フォームよりご入力頂きました、<br />
                    下記メールアドレスまでご連絡させて頂きます。<br />
                    よろしくお願い致します。
                </p>

                <h2 class="my-4 sank_h2" style="text-align: center;" id="Thanks_text_h2">
                    メールアドレス：<?php print h($h_email_address); ?>
                </h2>

            </div>

        <?php elseif (strcmp($jim_token_FLG, 2) == 0) : ?>

            <div class="col-lg-10 col-sm-10 col-10">
                <h2 class="my-4 sank_h2" style="text-align: center;">
                    自動メール送信 エラー
                </h2>

                <p style="text-align: center;">ご迷惑をおかけします。<br />
                    自動送信メールの送信が失敗しました。
                </p>

                <?php header("Location: register.php"); ?>
            </div>

        <?php else : ?>

            <div class="col-lg-10 col-sm-10 col-10">
                <h2 class="my-4 sank_h2" style="text-align: center;">

                </h2>

                <p style="text-align: center;"></p>

                <?php header("Location: register.php"); ?>
            </div>

        <?php endif; ?>


    </div>

</body>

</html>