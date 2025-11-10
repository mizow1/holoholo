window.addEventListener('load', function() {
   var flag = 0;
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=\\#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
      flag = 1;
   });

   //URLに「target_id」が含まれる場合（全国名字ランキング）
   if(location.href.indexOf('target_id')>0&&flag==0&&$('.target_sei').length){
      // スクロールの速度
      var speed = 1000; // ミリ秒
      // アンカーの値取得
      var target= $('.target_sei');
      // 移動先を取得
      // var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   }
});
})