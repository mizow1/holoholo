window.addEventListener('load', function(e) {
	$('.spread_yesno_item').on('click',function(e){
		$('.spread_yesno_item').removeClass('spread_yesno_item_start');//最初のみ非表示にしておくためのクラスを削除
		e.preventDefault();//リンク遷移を一旦停止
		var url = $(this).find('a').attr('href');//遷移先URL取得
		$('.spread_yesno_item').removeClass('start_yesno_selected');//クリックされた要素のみ追加するクラスを一旦全要素から削除
		$(this).addClass('start_yesno_selected');//クリックされた要素のみ追加するクラス
		setTimeout(function(){
			window.location = url;//指定時間後にリンク遷移実行
		},1000);
	});
});