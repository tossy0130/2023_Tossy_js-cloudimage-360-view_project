//===================
// === 文字アニメーション
//===================

// === 文字を動かす
function Text_move(Tar_elme) {
    Tar_elme.css({ 'opacity': 0, 'margin-top': '10px' });

    var delaySpeed = 200;
    var fadeSpeed = 1000;

    Tar_elme.delay(delaySpeed).animate({opacity:'1',marginTop:'0px'},fadeSpeed);
}

function stop_hoge(){
    clearInterval(setIV);
    console.log("停止しました！");
}

// === 文字アニメーション　テスト用
//$(document).ready(function () {
$(window).on("load", function () {

   
    setTimeout(function () {

         var El_top_01 = $('.h_text_box').offset().top;
        console.log(El_top_01);

        // === 文字　表示アニメーション OK === 
        var delaySpeed = 200;
        var fadeSpeed = 1000;
        $('.h_text_box_min').css({ 'opacity': 0, 'margin-top': '10px' });
      //  setIV = setInterval(Text_move(T_elme_01), 1000);
        $('.h_text_box_min').each(function (i) {
            
	$(this).delay(i*(delaySpeed)).animate({opacity:'1',marginTop:'0px'},fadeSpeed);
});
    }, 3000);
    
 
}); // === function END

// ==================== モーダル
        // === Btn => クリックする要素 , Item => モーダル要素 , Item_02 => モーダル要素の中の img
        function Mouse_Weel_Img(Btn, Item, Item_02) {

            Btn.click(function() {

                // Item.html($(this).prop('outerHTML'));

                num = Btn.index(this);
                console.log("Btn num:::" + num);

                src_path = Item_02.eq(num).attr('src');
                console.log("src_path:::" + src_path);

                Item.append($("<img>").attr("src", "./img/ds/" + src_path + ".jpg").attr("width", 1000)
                    .attr("height", 1000));

                // Item.fadeIn(200);

                /*
                Item.append(($("<img>").attr("src", "img/200906281536.jpg").attr("width", 160)
                        .attr("height", 160));
                */

                $('body,html').css('overflow-y', 'hidden'); // スクロール禁止
            });

            Item.click(function() {
                Item.fadeOut(100);
                $('body,html').css('overflow-y', 'visible'); // スクロール再開
            });

            Item_02.click(function() {
                Item.fadeOut(100);
                $('body,html').css('overflow-y', 'visible'); // スクロール再開
            });

        }


        function Modal_Close(Item, Item_02) {

            Item.click(function() {
                Item.fadeOut(100);
                $('body,html').css('overflow-y', 'visible'); // スクロール再開
            });

            Item_02.click(function() {
                Item.fadeOut(100);
                $('body,html').css('overflow-y', 'visible'); // スクロール再開
            });
        }

        $(document).ready(function() {
            var btn_01 = $('#gazou_01');
            var btn_02 = $('#gazou_02');
            var btn_03 = $('#gazou_03');
            var btn_04 = $('#gazou_04');
            var btn_05 = $('#gazou_05');
            var btn_06 = $('#gazou_06');
            var btn_07 = $('#gazou_07');
            var btn_08 = $('#gazou_08');

            var model_01 = $('#modal_window_image_01');
            var model_01_img = $('#modal_window_image_01 img');

            var model_02 = $('#modal_window_image_02');
            var model_02_img = $('#modal_window_image_02 img');

            var model_03 = $('#modal_window_image_03');
            var model_03_img = $('#modal_window_image_03 img');

            var model_04 = $('#modal_window_image_04');
            var model_04_img = $('#modal_window_image_04 img');

            var model_05 = $('#modal_window_image_05');
            var model_05_img = $('#modal_window_image_05 img');

            var model_06 = $('#modal_window_image_06');
            var model_06_img = $('#modal_window_image_06 img');

            var model_07 = $('#modal_window_image_07');
            var model_07_img = $('#modal_window_image_07 img');

            var model_08 = $('#modal_window_image_08');
            var model_08_img = $('#modal_window_image_08 img');

            // === 実行
            $(".gazou_btn").click(function() {
                num = $(".gazou_btn").index(this);
                Elm = $(this);
                console.log("gazou_btn num:::" + num);

                if (num == 0) {
                    Get_prop = $('#modal_window_image_01').html((Elm).prop('outerHTML'));
                    console.log(num + "Get_prop:::" + Get_prop);
                    console.log(Get_prop[0].outerHTML);

                    $('#modal_window_image_01').fadeIn(200);

                    Modal_Close(model_01, model_01_img);
                } else if (num == 1) {
                    Get_prop = $('#modal_window_image_02').html((Elm).prop('outerHTML'));
                    console.log(num + "Get_prop:::" + Get_prop);
                    console.log(Get_prop[0].outerHTML);

                    $('#modal_window_image_02').fadeIn(200);

                    Modal_Close(model_02, model_02_img);
                } else if (num == 2) {
                    Get_prop = $('#modal_window_image_03').html((Elm).prop('outerHTML'));
                    console.log(num + "Get_prop:::" + Get_prop);
                    console.log(Get_prop[0].outerHTML);

                    $('#modal_window_image_03').fadeIn(200);

                    Modal_Close(model_03, model_03_img);
                }

                //   num.html($(this).prop('outerHTML'));
                //   num.fadeIn(200);
            });

            Mouse_Weel_Img(btn_01, model_01, model_01_img);
            Mouse_Weel_Img(btn_02, model_02, model_02_img);
            Mouse_Weel_Img(btn_03, model_03, model_03_img);
            Mouse_Weel_Img(btn_04, model_04, model_04_img);
            Mouse_Weel_Img(btn_05, model_05, model_05_img);
            Mouse_Weel_Img(btn_06, model_06, model_06_img);
            Mouse_Weel_Img(btn_07, model_07, model_07_img);
            Mouse_Weel_Img(btn_08, model_08, model_08_img);
            
        });
   