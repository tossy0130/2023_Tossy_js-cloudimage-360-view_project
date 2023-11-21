 //　$(window).load(function () {
        $(function() {
             
            // === 初期設定
            var num = 0;
            var num_2;
            var num_3; //=== フレームタイプ　の eq 取得

            var targetSrc = $("#sub_image li img").eq(0).attr('src');
            $("input[name=path]").val(targetSrc);

            /*
            $("#main_image li").eq(0).addClass("show"); 
            $("#main_image li").eq(0).removeClass("img_hide");
            */

            // === 最初に表示する要素 
            // $("#main_image li").eq(0).removeClass("img_hide");
            $("#main_image li").eq(0).show();


            // === フレームタイプ
            // $("#sub_image").hide(); // === 「ホワイト」非表示


            // === タブメニュー　クリック
            $('.tab_box .tab_btn').click(function() {
                var index = $('.tab_box .tab_btn').index(this);

                console.log('タブ:index::::' + index);

                $('.tab_box .tab_btn, .tab_box .tab_panel').removeClass('active');
                $(this).addClass('active');
                $('.tab_box .tab_panel').eq(index).addClass('active');

                // === 画像 URL 取得ロジック
                if (index == 0) {
                    // 画像URLを取得
                    var targetSrc = $("#sub_image li img").eq(0).attr('src');
                    $("input[name=path]").val(targetSrc);

                } else {

                    var targetSrc = $("#main_image li img").eq(0).attr('src');
                    $("input[name=path]").val(targetSrc);
                }

            });

            // === テーブルカラー選択
            $("#btn li").click(function() {
                num = $("#btn li").index(this);
                $("#main_image li").hide();
                $("#main_image li").eq(num).show();

                // 画像URLを取得
                targetSrc = $("#main_image li img").eq(num).attr('src');
                $("input[name=path]").val(targetSrc);
                console.log(targetSrc);
            });

            //============== ホワイトテーブル　色変え
            //$("#sub_image li").eq(0).show();

            // === テーブルカラー選択
            $("#btn_01 li").click(function() {
                num = $("#btn_01 li").index(this);
                console.log("num:" + num);
                $("#sub_image li").hide();
                $("#sub_image li").eq(num).show();

                // 画像URLを取得
                targetSrc = $("#sub_image li img").eq(num).attr('src');
                $("input[name=path]").val(targetSrc);
                console.log(targetSrc);
            });

            // === 脚カラー
            $("#btn_ashi li").click(function() {
                num_2 = $("#btn_ashi li").index(this);


                //=====================
                // === シルバーだったら
                //=====================
                if (num_2 == 0) {
                    $("#sub_image").hide();
                    $("#main_image").fadeIn('fast');


                } else if (num_2 == 1) {
                    //=====================
                    // === ホワイトだったら
                    //=====================

                    $("#main_image").hide();
                    $("#sub_image").show();

                    if (num == -1) {
                        $("#sub_image li").eq(0).fadeIn('fast');
                    } else {
                        $("#sub_image li").eq(num).fadeIn('fast');
                    }


                }

            });

            // === フレームタイプ
            $("#f_type li").click(function() {

                // === 「ホワイト」が押されたら

                num_3 = $("#f_type li").index(this);

                console.log("カラータイプ eq:::" + num);
                console.log("フレームタイプ eq:::" + num_2);
                console.log("メイン画像:::" + num_3); // 押された時の、メイン画像の eq を取得　表示


                //=====================
                // === シルバーだったら
                //=====================
                if (num_3 == 0) {
                    $("#sub_image").hide();
                    $("#main_image").fadeIn('fast');


                } else if (num_3 == 1) {
                    //=====================
                    // === ホワイトだったら
                    //=====================

                    $("#main_image").hide();
                    $("#sub_image").show();

                    if (num == -1) {
                        $("#sub_image li").eq(0).fadeIn('fast');
                    } else {
                        $("#sub_image li").eq(num).fadeIn('fast');
                    }

                }

            });

        });

$(function() {
            $("#contactForm").submit(function() {
                if (window.confirm('お選び頂きました商品で問い合わせ画面へ進みます。よろしいですか？')) {
                    return true;
                } else {
                    return false;
                }
            });
        });
