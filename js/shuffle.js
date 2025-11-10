window.addEventListener('load', function() {
	//入力画面
	if($('.shuffle_start').length){
		move_image_random();
	}

	//結果画面
	// document.addEventListener('DOMContentLoaded', function() {
	// });
	const cardWraps = document.querySelectorAll('.spread_list .card_wrap');
	const flipCard = (entries, observer) => {
		entries.forEach((entry, index) => {
			if (entry.isIntersecting) {
				setTimeout(() => {
					entry.target.classList.add('flipped');
				}, index * 100); // 0.1 second delay for each card
			}
		});
	};

	const observerOptions = {
		root: null,
		rootMargin: '0px',
		threshold: 0.1
	};

	const observer = new IntersectionObserver(flipCard, observerOptions);

	cardWraps.forEach(card => {
		observer.observe(card);
	});



//入力画面
if($('.shuffle_start').length){

	$('.shuffle_start').on('click',function(){
		$('.shuffle_end').fadeIn();
		move_image_random();
	});
	
	$('.shuffle_end').on('click',function(){
		$('.shuffle_start').fadeOut();
		$('.shuffle_end').fadeOut();
		$('.spread_box_entry .btn_wrap').fadeOut();
		$('.spread_box_title span').fadeOut();
		$('.card_select').fadeIn();
		card_select();
		$('.card_back').css({cursor:'pointer'});
	});
	
	$(document).on('click','.group',function(){
		var clickedClass = $(this).attr('class');
		var fadeOutPromises = [];
		$('.card_select').fadeOut();
		$('.spread_box_entry .btn_wrap').delay(2000).fadeIn();
		$('.group').each(function(){
			if(!$(this).hasClass(clickedClass)){
				var promise = $(this).fadeOut().promise();
				fadeOutPromises.push(promise);
			}
		});
		$.when.apply($, fadeOutPromises).done(function () {
			spread_10();
			$('.go_result').fadeIn().css('display','block');
		});
		
	});
}
});


function move_image_random() {
	for(var i=0;i<$('.card_back').length;i++){
		var image = $('.card_back').eq(i);
		var container = $('.spread_list ');

		var maxX = container.width()/2;
		var maxY = container.height()/2;
		var minX = maxX*-1;
		var minY = maxY*-1;

		var randomX = Math.floor(Math.random() * (maxX-minX+1))+minX;
		var randomY = Math.floor(Math.random() * (maxY-minY+1))+minY;
		var deg = Math.floor(Math.random() * 360);

		image.css({transform:'translate('+randomX+'px,'+randomY+'px) '+'rotate('+deg+'deg)'});
	 }
}

//シャッフルしたカードを3つの束に分ける
function card_select(){
	var image = $('.card_back');
	for(var i=0;i<image.length;i++){
		if(i<10){
			var x = -100;
			var group_id = 1;
		}
		if(i>=10&&i<20){
			var x = 0;
			var group_id = 2;
		}
		if(i>=20){
			var x = 100;
			var group_id = 3;
		}
		image.eq(i).addClass('group');
		image.eq(i).addClass('group_'+group_id);
		
		(function (index, xPos) {
			image.eq(index).delay(index * 10).queue(function () {
			  $(this).css({ transform: 'translate(' + xPos + '%,0)' });
			  $(this).dequeue();
			});
		 })(i, x);
	}
	image.animate({width:'25%'});
}

function spread_1(){
	console.log(116);
	const card = $('.card_back:visible');
}

function spread_7(){
	console.log(121);
	const card = $('.card_back:visible');
	card.animate({width:'15%'});

	const card_count = card.length;
	const position_x = [-270,-170,-70,30,130,230,130];
	const position_y = [0,0,0,0,-100,0,100];
	for(var i=0;i<card_count;i++){
		(function(i,position_x,position_y){
			card.eq(i).delay(i*100).queue(function(){
				$(this).css({transform:'translate('+position_x[i]+'%,'+position_y[i]+'%)'})
			});
		})(i,position_x,position_y);
	}
	
}

function spread_10(){
	const card = $('.card_back:visible');
	card.animate({width:'15%'});
	const card_count = card.length;
	const position_x = [0,0,0,-100,-200,-100,0,100,200,100];
	const position_y = [160,60,-40,60,20,-40,-140,-40,20,60];
	for(var i=0;i<card_count;i++){
		(function(i,position_x,position_y){
			card.eq(i).delay(i*100).queue(function(){
				$(this).css({transform:'translate('+position_x[i]+'%,'+position_y[i]+'%)'})
			});
		})(i,position_x,position_y);
	}
	
}

function spread_44(){
	console.log(156);
}