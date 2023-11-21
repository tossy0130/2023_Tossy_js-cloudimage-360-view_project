<?php

// エラーを出力
ini_set("display_errors", "On");
// functions.php 読み込み
require(dirname(__FILE__) . '/functions.php');

// セッションスタート
session_start();

// トークン作成（01）
$token_one = uniqid('', true);
// セッション変数へ格納
$_SESSION['token_one'] = $token_one;

$img_path = "";
if (isset($_POST['path'])) {
    $img_path = $_POST['path'];
}


// === 画像パスの g_01 を取得
$img_cut = substr($img_path, 6, 4);
$img_number = "";

//=== HTML メール送信用　画像ナンバー
if (false !== strpos($img_cut, '01')) {
    $img_number = "1";
} else if (false !== strpos($img_cut, '02')) {
    $img_number = "2";
} else if (false !== strpos($img_cut, '03')) {
    $img_number = "3";
} else if (false !== strpos($img_cut, '04')) {
    $img_number = "4";
} else if (false !== strpos($img_cut, '05')) {
    $img_number = "5";
} else if (false !== strpos($img_cut, '06')) {
    $img_number = "6";
} else if (false !== strpos($img_cut, '07')) {
    $img_number = "7";
} else if (false !== strpos($img_cut, '08')) {
    $img_number = "8";
} else if (false !== strpos($img_cut, 'bl')) {
    $img_number = "20";
    print($img_number);
}


//===


// ================= フォーム値　判別 ===============*/

//====== POSTされていたら画面遷移

/*
if (
    isset($_POST['user_name']) && isset($_POST['user_name_kana'])  && isset($_POST['tel']) &&
    isset($_POST['email_address'])
) {

    $_SESSION['toko'] = 'kokokara';
    header("Location: register.php");
} else {
    //====== 入力項目エラー

}
*/

try {

    //=== DB 接続情報
    $pdo = new PDO(GetDB::DNS, GetDB::USER, GetDB::PASS);

    // ======  （トランザクション） トランザクション開始 ======
    $pdo->beginTransaction();

    // PDOが例外を投げるように設定する
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "接続に成功しました";
} catch (PDOException $e) {
    $e->getMessage();
    echo "接続に失敗しました: " . $e->getMessage();
} finally {
    $pdo = null;
}





?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
        <link href="css/style.css" rel="stylesheet">
        -->

    <link rel="stylesheet" href="css/form.css">

    <!-- Vue CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>

    <style>
        body {
            font-family: 'Noto Sans JP',
                'Yu Gothic Medium',
                '游ゴシック Medium',
                YuGothic,
                '游ゴシック体',
                'ヒラギノ角ゴ Pro W3',
                'メイリオ',
                sans-serif;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            background-color: rgb(221, 221, 221);
        }

        #select_img {
            width: 45%;
            height: auto;
        }

        #select_img>img {
            width: 100%;
            height: auto;
        }

        #select_item {
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 0.25em;
            margin: 0px 0 5px 0;
            display: inline-block;
        }

        .f_content_01 {
            max-width: 720px;
            margin: 0 auto;
            position: relative;
            top: 20px;
        }

        #zigyou_text {
            display: inline-block;
            margin: 0;
            padding: 0;
            position: relative;
            left: 6%;
        }
        }
    </style>
</head>

<body>

    <!-- 問い合わせ　フォーム開始 -->

    <div class="container">
        <div class="f_content_01">
            <p class="c-head01 u-en u-uppercase">contact</p>

            <p id="select_img">
                <span id="select_item">選択された商品</span>
                <img src="<?php print h($img_path); ?>">
            </p>
        </div>
    </div>

    <div class="Form" id="app">
        <form action="register.php" method="POST" @submit.prevent="submitForm" name="index_submit">

            <!-- 名前　 -->
            <div class="Form-Item">
                <p class="Form-Item-Label">お名前<span class="Form-Item-Label-Required">必須</span>
                    <span class="holder_text" id="pl_01">（例）山田太郎</span>
                </p>

                <p>
                    <!-- Vue.js エラーメッセージ -->

                    <!--
                <p class="error-user_name">入力欄が空欄になっています。お名前をご入力ください。</p>
                -->

                    <input type="text" class="Form-Item-Input" value="<?php if (!empty($_POST['user_name'])) {
                                                                            echo h($_POST['user_name']);
                                                                        } ?>" placeholder="例）山田太郎" name="user_name" v-model="user_name" @input="$v.user_name.$touch()">
                    <span v-if="$v.user_name.$error" class="err_span">※入力欄が空欄になっています。お名前をご入力ください。</span>

                </p>
            </div>

            <!-- 名前 フリガナ -->
            <div class="Form-Item">
                <p class="Form-Item-Label">お名前（フリガナ）<span class="Form-Item-Label-Required">必須</span>
                    <span class="holder_text" id="pl_02">（例）ヤマダタロウ</span>
                </p>

                <p>
                    <!-- Vue.js エラーメッセージ -->
                    <input type="text" class="Form-Item-Input" value="<?php if (!empty($_POST['user_name_kana'])) {
                                                                            echo h($_POST['user_name_kana']);
                                                                        } ?>" placeholder="（例）ヤマダタロウ" name="user_name_kana" v-model="user_name_kana" @input="$v.user_name_kana.$touch()">
                    <span v-if="$v.user_name_kana.$error" class="err_span">※入力欄が空欄になっています。お名前（カタカナ）でご入力ください。</span>
                </p>
            </div>


            <!-- 会社名 -->
            <div class="Form-Item">

                <!--
                <p class="Form-Item-Label">会社名<span class="Form-Item-Label-Required">必須</span>
                    <span class="holder_text" id="pl_02">（例）株式会社●●</span>
                </p>

                <p>
                   
                    <input type="text" class="Form-Item-Input" value="<?php if (!empty($_POST['company_name'])) {
                                                                            echo h($_POST['company_name']);
                                                                        } ?>" placeholder="（例）株式会社●●" name="company_name" v-model="company_name" @input="$v.company_name.$touch()">
                    <span v-if="$v.company_name.$error" class="err_span">※入力欄が空欄になっています。お名前（カタカナ）でご入力ください。</span>
                </p>
            </div>
                                                                    -->

                <p class="Form-Item-Label">会社名
                    <span class="holder_text" id="pl_02">（例）株式会社●●</span>
                </p>
                <span id="zigyou_text" style="color:red;">※事業所の方は会社名のご入力をお願い致します。</span>

                <p>
                    <input type="text" class="Form-Item-Input" name="company_name" placeholder="例）株式会社●●">
                </p>
            </div>

            <!-- 電話番号 -->
            <div class="Form-Item">
                <p class="Form-Item-Label">電話番号<span class="Form-Item-Label-Required">必須</span>
                    <span class="holder_text" id="pl_03">（例）000-0000-0000</span>
                </p>

                <p>
                    <input type="tel" class="Form-Item-Input" <?php if (!empty($_POST['tel'])) {
                                                                    echo h($_POST['tel']);
                                                                } ?> placeholder="例）000-0000-0000" name="tel" v-model="tel" @input="$v.tel.$touch()">
                    <!-- Vue.js エラーメッセージ -->
                    <span v-if="$v.tel.$error" class="err_span">※入力欄が空欄になっています。電話番号をご入力ください。</span>
                </p>
            </div>

            <!-- メールアドレス -->
            <div class="Form-Item">
                <p class="Form-Item-Label">メールアドレス<span class="Form-Item-Label-Required">必須</span>
                    <span class="holder_text" id="pl_04">（例）example@gmail.com</span>
                </p>

                <p>
                    <input type="email" class="Form-Item-Input" <?php if (!empty($_POST['email_address'])) {
                                                                    echo h($_POST['email_address']);
                                                                } ?> placeholder="例）example@gmail.com" name="email_address" v-model="email_address" @blur="$v.email_address.$touch()">

                    <!-- Vue.js エラーメッセージ -->
                <div v-if="$v.email_address.$error">
                    <p v-if="!$v.email_address.required" class="err_span2">※入力欄が空になっています。メールアドレスをご入力ください。</p>
                    <p v-if="!$v.email_address.email" class="err_span">※メールアドレスの形式が正しくありません。</p>
                </div>

                </p>
            </div>

            <!-- -->

            <div class="Form-Item">
                <p class="Form-Item-Label">お問い合わせ 種別<span class="Form-Item-Label-Required">必須</span></p>
                <div class="select">
                    <select name="Inquiry_type" id="" v-model="Inquiry_type" @blur="$v.Inquiry_type.$touch()">

                        <!--
                        <option value="射出成形について">射出成形について</option>
                        <option value="ウォータージェットついて">ウォータージェットついて</option>
                                                            -->

                        <option value="ガラステーブルについて">ガラステーブルについて</option>

                        <!--
                        <option value="クライシスについて">クライシスについて</option>
                        <option value="その他 設備について">その他 設備について</option>
                                                            
                        <option value="会社概要">会社概要</option>
                        -->
                        <option value="お見積もり">お見積もり</option>
                        <option value="その他 お問い合わせ">その他 お問い合わせ</option>
                    </select>
                </div>

                <!-- Vue.js エラーメッセージ -->
                <div v-if="$v.Inquiry_type.$error">
                    <span class="err_span" v-if="!$v.Inquiry_type.required">
                        ※入力欄が空欄になっています。「お問い合わせ種別」を選択してください。
                    </span>
                </div>

            </div>

            <!-- お問い合わせ 内容 -->
            <div class="Form-Item">
                <p class="Form-Item-Label isMsg" style="margin: 0 0 15px 0;">お問い合わせ 内容<span class="Form-Item-Label-Required">必須</span></p>
                <textarea class="Form-Item-Textarea" name="toiawase_text" value="<?php if (!empty($_POST['toiawase_text'])) {
                                                                                        echo h($_POST['toiawase_text']);
                                                                                    } ?>" v-model="toiawase_text"></textarea>
            </div>

            <!-- ボタン -->

            <div v-if="$v.user_name.$error || $v.user_name_kana.$error || $v.tel.$error || $v.email_address.$error">
                <span id="submit_err">※入力不備があります。入力欄をご確認して再度ご入力ください。</span>
            </div>

            <!--
            <input :disabled="$v.$invalid" type="submit" class="Form-Btn" value="確認画面へ進む">
-->
            <!-- メール画像　送信用 -->
            <input type="hidden" value="<?php echo h($img_number) ?>" name="img_number">
            <input type="hidden" value="<?php echo h($token_one); ?>" name="token_one">

            <input type="submit" class="Form-Btn" value="確認画面へ進む">

        </form>

    </div>


    <!-- 問い合わせ　フォーム END -->

    <script>
        /*
        var submit_err = document.getElementById('submit_err');
        submit_err.style.display = "none";

        var submit_err_Flg = false;
        */

        Vue.use(window.vuelidate.default);
        const {
            required,
            email,
            numeric,
            maxLength,
            minLength
        } = window.validators;

        const app = new Vue({
            el: '#app',
            data: {
                user_name: '',
                user_name_kana: '',
                company_name: '',
                tel: '',
                email_address: '',
                Inquiry_type: '',
                toiawase_text: ''
            },

            validations: {
                // 名前
                user_name: {
                    required
                },
                // 名前（カタカナ）
                user_name_kana: {
                    required
                },

                /*
                company_name: {
                    required
                },
                */

                // 電話番号
                tel: {
                    required
                },
                // メールアドレス
                email_address: {
                    required,
                    email,
                },
                // 問い合わせ種別
                Inquiry_type: {
                    required
                },

            },

            methods: {
                submitForm() {
                    //console.log(this.$v.user_name.$invalid)
                    this.$v.$touch();
                    if (this.$v.$invalid) {
                        console.log('バリデーションエラー');

                    } else {
                        // submit_err.style.display = "none";

                        document.index_submit.submit();
                        console.log('submit === OK ===');

                    }
                }
            }

        });
    </script>


</body>

</html>