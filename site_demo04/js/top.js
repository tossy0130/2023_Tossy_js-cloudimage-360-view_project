//===================
//=== 最初の表示画像を表示して、2.5秒後に非表示にする
//===================
$(document).ready(function () {

    var winW = $(window).width();
    var devW = 480;

    if (winW <= devW) {
        //=====================================================
        //==================== スマホ ==========================
        //=====================================================
        // ウィンドウサイズが 480px以下の場合のコードをここに

            // ========= 初期設定 =========
    var Top_Flg = false;
    var Top_Flg_01 = false;

    // === テキスト 文言 02
    var text_02_Flg = false;
    var text_item_02 = $('.h_text_02');
    
    // === テキスト 文言 03
    var text_03_Flg = false;
    var text_item_03 = $('.h_text_03');

       // === テキスト 文言 04
    var text_04_Flg = false;
    var text_item_04 = $('.h_text_04');

    var Img_Flg_01 = false;

    // ====== 特徴エリア ======

    // テキスト　= 特徴
    var text_05_Flg = false;
    var text_item_05 = $('.midasi_01');

    // 特徴　画像
    var text_06_Flg = false;
    var text_item_06 = $('#cont_02_itme_01');

    // 特徴　テキスト
    var text_07_Flg = false;
    var text_item_07 = $('#cont_02_item_right');

    //=== 特徴　container　を最初は非表示にする
    var Tokushou_Container = $('#tokutyou_container');
    Tokushou_Container.hide();

    // === 色選択　container を最初は非表示にする
    var Tab_container = $('#tab_container');
    Tab_container.hide();

    // === 色選択　container を最初は非表示にする
    var Footer_container = $('#footer_container');
    Footer_container.hide();

    // === 最初の画像
    $('#logo_img').hide();
    $('.head_content').hide();
        
    // スマホ用
    $('.container_002_SUMAHO').hide();  
        

  
    $('.first_img_box').fadeIn(300);


    // スクロール禁止
    $('html *').css('overflow','hidden');
    $(window).on('touchmove.noScroll', function(e) {
    e.preventDefault();
    });
    

     setTimeout(function(){
         $('#logo_img').fadeIn(600);
    }, 500);


    setTimeout(function(){
        $('.first_img_box').fadeOut(600);
        $('#logo_img').fadeOut(800);

        $('.head_content').fadeIn(1600);
        
        // === 非表示
         $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '25px' });
        text_item_02.css({ 'opacity': 0, 'margin-top': '10px' });
        text_item_03.css({ 'opacity': 0, 'margin-top': '10px' });
        text_item_04.css({ 'opacity': 0, 'margin-top': '10px' });
        $('#top_table_img').css({ 'opacity': 0, 'margin-top': '10px' });

        // 特徴
        text_item_05.css({'opacity':1,'margin-top' : '10px'})
        text_item_06.css({ 'opacity': 1, 'margin-top': '10px' });
        $('.cont_text_02').css({ 'opacity': 1, 'margin-top': '10px' });
        

        Top_Flg_01 = true;

        // === スクロール禁止　解除
        $('html *').css('overflow','visible');
        $(window).off('.noScroll');

        // === container 表示
        Tokushou_Container.show();
        Tab_container.show();
        Footer_container.show();



    }, 2000);

    //=========================== ロゴ終了

    // ========================== TOP画像　終了後　発火
    setTimeout(function () {

        if (Top_Flg_01 == true) {
            
            var delaySpeed = 100;
            var fadeSpeed = 280;
            $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '25px' });
                
            $('.h_text_box_min').each(function (i) {
                $(this).delay(i * (delaySpeed)).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
            });

        } else {

            $(window).scroll(function () {
                var scroll = $(this).scrollTop();

                if (scroll > 30) {
                    var delaySpeed = 120;
                    var fadeSpeed = 400;
                    $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '10px' });
                
                    $('.h_text_box_min').each(function (i) {
                    $(this).delay(i * (delaySpeed)).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
                    });
                }

            });

        }
        
        // === テーブル画像 はみ出ている部分を非表示
        $('.first_img').css('overflow', 'hidden');
        $('.img_hide').css('overflow', 'hidden');
        
        $('.h_text_box_min').css('overflow', 'hidden');
        $('#top_table_img').css('overflow', 'hidden');
        $('.h_text_02').css('overflow', 'hidden');
        $('.h_text_03').css('overflow', 'hidden');
        $('.h_text_04').css('overflow', 'hidden');

    }, 2200);
        
        
        /**
         *  スクロール　イベント
         */
        $(window).scroll(function () {
            var scroll = $(this).scrollTop();
            console.log(scroll);
          
        });

    } else {
        //==========================================================
        //============================ PC ==========================
        //==========================================================

        // ウィンドウサイズが 480px以上の場合のコードをここに

           // ========= 初期設定 =========
    var Top_Flg = false;
    var Top_Flg_01 = false;

    // === テキスト 文言 02
    var text_02_Flg = false;
    var text_item_02 = $('.h_text_02');
    
    // === テキスト 文言 03
    var text_03_Flg = false;
    var text_item_03 = $('.h_text_03');

       // === テキスト 文言 04
    var text_04_Flg = false;
    var text_item_04 = $('.h_text_04');

    var Img_Flg_01 = false;

    // ====== 特徴エリア ======

    // テキスト　= 特徴
    var text_05_Flg = false;
    var text_item_05 = $('.midasi_01');

    // 特徴　画像
    var text_06_Flg = false;
    var text_item_06 = $('#cont_02_itme_01');

    // 特徴　テキスト
    var text_07_Flg = false;
    var text_item_07 = $('#cont_02_item_right');

    //=== 特徴　container　を最初は非表示にする
    var Tokushou_Container = $('#tokutyou_container');
    Tokushou_Container.hide();

    // === 色選択　container を最初は非表示にする
    var Tab_container = $('#tab_container');
    Tab_container.hide();

    // === 色選択　container を最初は非表示にする
    var Footer_container = $('#footer_container');
    Footer_container.hide();

    // === 最初の画像
    $('#logo_img').hide();

    $('.head_content').hide();
    $('#logo_img').hide();

    $('.first_img_box').fadeIn(300);
    
    // === 追加 格子柄　背景 ===
    $('.h_text_box').hide();


    // スクロール禁止
    $('html *').css('overflow','hidden');
    $(window).on('touchmove.noScroll', function(e) {
    e.preventDefault();
    });
    

     setTimeout(function(){
         $('#logo_img').fadeIn(600);
    }, 500);


    setTimeout(function(){
        $('.first_img_box').fadeOut(600);
        $('#logo_img').fadeOut(800);

        $('.head_content').fadeIn(1600);
        
        // === 非表示
         $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '25px' });
        text_item_02.css({ 'opacity': 0, 'margin-top': '10px' });
        text_item_03.css({ 'opacity': 0, 'margin-top': '10px' });
        text_item_04.css({ 'opacity': 0, 'margin-top': '10px' });
        $('#top_table_img').css({ 'opacity': 0, 'margin-top': '10px' });

        // 特徴
        text_item_05.css({'opacity':0,'margin-top' : '10px'})
        text_item_06.css({ 'opacity': 0, 'margin-top': '10px' });
        $('.cont_text_02').css({ 'opacity': 0, 'margin-top': '10px' });
        

        Top_Flg_01 = true;

        // === スクロール禁止　解除
        $('html *').css('overflow','visible');
        $(window).off('.noScroll');

        // === container 表示
        Tokushou_Container.show();
        Tab_container.show();
        Footer_container.show();

    }, 2000);

    //=========================== ロゴ終了

    // ========================== TOP画像　終了後　発火
    setTimeout(function () {

        if (Top_Flg_01 == true) {
            
            var delaySpeed = 100;
            var fadeSpeed = 280;
            $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '25px' });
                
            $('.h_text_box_min').each(function (i) {
                $(this).delay(i * (delaySpeed)).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
            });

            // === 追加 格子柄　背景 ===
            $('.h_text_box').fadeIn(1500);

        } else {

            $(window).scroll(function () {
                var scroll = $(this).scrollTop();

                if (scroll > 30) {
                    var delaySpeed = 120;
                    var fadeSpeed = 400;
                    $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '10px' });
                
                    $('.h_text_box_min').each(function (i) {
                    $(this).delay(i * (delaySpeed)).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
                    });
                }

            });

        }
        
        // === テーブル画像 はみ出ている部分を非表示
        $('.first_img').css('overflow', 'hidden');
        $('.img_hide').css('overflow', 'hidden');
        
        $('.h_text_box_min').css('overflow', 'hidden');
        $('#top_table_img').css('overflow', 'hidden');
        $('.h_text_02').css('overflow', 'hidden');
        $('.h_text_03').css('overflow', 'hidden');
        $('.h_text_04').css('overflow', 'hidden');

    }, 2200);
  

    // === ノフュレ ガラステーブル G-Tellus 文字アニメーション
    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        console.log(scroll);

        // === トップ　テーブル画像（黒テーブル）
        var Top_img_Position = $('#top_table_img').offset().top;
        var Top_img_01 = $('#top_table_img');
        if (scroll > 180) {
            if (!Img_Flg_01) {
                FadeIn_Animation_02(Top_img_01); // テーブル画像
                Img_Flg_01 = true;
            } else {
                ;
            }
            
        }
        
        

        //=== テキスト 2 フェード
        if (scroll > 110) {
            // === テキスト 02 フェードイン
            if (!text_02_Flg) {
                FadeIn_Animation_01(text_item_02);
                text_02_Flg = true;
            } else {
                ;
            }
            
        } else {
            ;
        }

         //=== テキスト 2 フェード
        if (scroll > 300) {
            // === テキスト 02 フェードイン
            if (!text_03_Flg) {
                FadeIn_Animation_01(text_item_03);
                text_03_Flg = true;
            } else {
                ;
            }
           
        } else {
            ;
        }


          //=== テキスト 1 フェード
        if (scroll > 500) {
            // === テキスト 02 フェードイン
            if (!text_04_Flg) {
                FadeIn_Animation_01(text_item_04);
                text_04_Flg = true;
            } else {
                ;
            }
           
        } else {
            ;
        }

         //=== テキスト 1 フェード
        if (scroll > 700) {
            // === テキスト 02 フェードイン
            if (!text_05_Flg) {
                FadeIn_Animation_01(text_item_05);
                text_05_Flg = true;
            } else {
                ;
            }
           
        } else {
            ;
        }

            //=== テキスト 1 フェード
        if (scroll > 800) {
            // === テキスト 02 フェードイン
            if (!text_06_Flg) {
                FadeIn_Animation_02(text_item_06);
                text_06_Flg = true;
            } else {
                ;
            }
           
        } else {
            ;
        }

        var cont_text_02_C = $('.cont_text_02');
        if (scroll > 800) {
            if (!text_07_Flg) {
                FadeIn_Animation_03(cont_text_02_C); // テーブル画像
                text_07_Flg = true;
            } else {
                ;
            }
            
        }




    }); // === (window).scroll(function () END
    }
    
 
}); // ================================  document.read END


// === フェードイン
function FadeIn_Go(Item) {
    Item.fadeIn(1200);
}

// === フェードインアニメーション
function FadeIn_Animation_01(Item) {
     Item.css({ 'opacity': 0, 'margin-top': '20px' });
     var delaySpeed = 400;
     var fadeSpeed = 700;
    Item.delay(delaySpeed).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
    
    Item.stop();
}


// === フェードインアニメーション 02
function FadeIn_Animation_02(Item) {
     Item.css({ 'opacity': 0, 'margin-top': '20px' });
     var delaySpeed = 1200;
     var fadeSpeed = 2800;
    Item.delay(delaySpeed).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
    
    Item.stop();
}


// === フェードインアニメーション 03
function FadeIn_Animation_03(Item) {
     Item.css({ 'opacity': 0, 'margin-top': '20px' });
     var delaySpeed = 800;
     var fadeSpeed = 1800;
    Item.delay(delaySpeed).animate({ opacity: '1', marginTop: '0px' }, fadeSpeed);
    
    Item.stop();
}



//=== スクロール位置を取得
$(window).on('load', function () {
   
  
});