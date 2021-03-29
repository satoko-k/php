$(function () {
  // ここから書く
  //   $(function(){})を使うと、$(function(){})の中に書かれた記述はHTMLの読み込みが完了するまでは待機するようになります。

  // スクロールするとページトップへボタンがでる

  $(function () {
    var topBtn = $("#page-top");
    topBtn.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        topBtn.fadeIn();
      } else {
        topBtn.fadeOut();
      }
    });
    //スクロールしてトップ
    topBtn.click(function () {
      $("body,html").animate(
        {
          scrollTop: 0,
        },
        500
      );
      return false;
    });
  });

  // ふわっとでるところ
  $(".weeds").hide().fadeIn(1000);

  // この下は消しちゃダメ
});
