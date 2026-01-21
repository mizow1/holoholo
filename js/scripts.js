/*-----------------------------------------------------------------------------------

	Custom JS - All front-end jQuery

-------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Scrolltop
/*-----------------------------------------------------------------------------------*/
$(document).ready(function ($) {

	var pagetop = $('#js_pagetop');
	pagetop.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 700) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});

});

/*-----------------------------------------------------------------------------------*/
/*	SP_FIXED_MENU
/*-----------------------------------------------------------------------------------*/
$(function () {
	var menu = $('.logo');
	if (menu.length) {
		var offset = menu.offset();
		$(window).scroll(function () {
			if ($(window).scrollTop() > offset.top) {
				menu.addClass('fixed');
			} else {
				menu.removeClass('fixed');
			}
		});
	}
});

/*-----------------------------------------------------------------------------------*/
/*	RANKING_SLIDE
/*-----------------------------------------------------------------------------------*/
$(function () {
	var swiper = new Swiper("#ranking_slide", {
		//		centeredSlides: true,
		//		loop: true,
		speed: 1000,
		slidesPerView: 2.5,
		spaceBetween: 1,
		freeMode: true,
		slidesPerGroup: 2,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		//		navigation: {
		//			nextEl: ".swiper-button-next",
		//			prevEl: ".swiper-button-prev",
		//		},
	});
});

/*-----------------------------------------------------------------------------------*/
/*	REVIEW_SLIDE
/*-----------------------------------------------------------------------------------*/
$(function () {
	var swiper = new Swiper("#review_slide", {
		//		centeredSlides: true,
		loop: true,
		speed: 1000,
		slidesPerView: 1,
		spaceBetween: 30,
		//		autoplay: {
		//			delay: 3000,
		//			disableOnInteraction: false,
		//		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
});

/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/
$(function () {
	$('.js_ac_trigger').on('click', function () {
		$(this).next().slideToggle(300);
		$(this).toggleClass('open', 300);
	});
});

/*-----------------------------------------------------------------------------------*/
/*	TAB_MENU
/*-----------------------------------------------------------------------------------*/
$(function () {
	$('.js-tab .tab_btn').on('click', function () {
		var tabMenu = $(this).parents('.tab_menu');
		var tabBtn = tabMenu.find(".tab_btn");
		var tabPanel = tabMenu.find('.tab_panel');
		tabBtn.removeClass('active');
		$(this).addClass('active');
		var elmIndex = tabBtn.index(this);
		tabPanel.removeClass('tab_panel_show');
		tabPanel.eq(elmIndex).addClass('tab_panel_show');
	});
});

/*-----------------------------------------------------------------------------------*/
/*	Modal
/*-----------------------------------------------------------------------------------*/
$(function () {
	const modalBtns = document.querySelectorAll(".js_modal-toggle");
	modalBtns.forEach(function (btn) {
		btn.onclick = function () {
			var modal = btn.getAttribute('data-modal');
			document.getElementById(modal).style.display = "block";
		};
	});
	const closeBtns = document.querySelectorAll(".js_modal-close");
	closeBtns.forEach(function (btn) {
		btn.onclick = function () {
			var modal = btn.closest('.modal');
			modal.style.display = "none";
		};
	});

	window.onclick = function (event) {
		if (event.target.className === "modal") {
			event.target.style.display = "none";
		}
	};

});

/*-----------------------------------------------------------------------------------*/
/*	繧ｭ繝ｼ繝ｯ繝ｼ繝峨°繧画爾縺呻ｼ磯幕髢会ｼ�
/*-----------------------------------------------------------------------------------*/
$(function () {
	$(".js_more").on("click", function () {
		$(this).toggleClass("on-click");
		$(".js_more_panel").slideToggle();
	});
});



