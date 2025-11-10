window.addEventListener('load', function() {
// Intersection Observerのコールバック関数を定義
const callback = (entries, observer) => {
	entries.forEach(entry => {
		// spread_lakiがビューポート内に入った場合
		if (entry.isIntersecting) {
			// 各画像に対してアニメーションを再生
			entry.target.querySelectorAll('.spread_laki_item').forEach(img => {
				img.style.animationPlayState = 'running';
			});
			// 一度アニメーションが始まったら、observerを解除
			observer.unobserve(entry.target);
		}
	});
};

// Intersection Observerを初期化
const options = {
	threshold: 0.5 // spread_lakiの10%以上が表示されたらトリガー
};
const observer = new IntersectionObserver(callback, options);

// spread_laki要素を監視
const spreadLaki = document.querySelector('.spread_laki');
observer.observe(spreadLaki);

});