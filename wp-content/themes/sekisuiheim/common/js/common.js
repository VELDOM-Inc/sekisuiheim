$(function(){
  var head = $('header');
  var returnbtn = $('.return');
  $(window).on('scroll', function(){
    var el = $(this).scrollTop();
    var winHeight = $(window).height() - 100;

    if(el >= winHeight){
      if(!head.hasClass('header_fix')){
        head.addClass('header_fix');
        returnbtn.addClass('show');
      }
    } else {
      head.removeClass('header_fix');
      returnbtn.removeClass('show');
    }
  });
});  

//header menu
$('.l-header-sp__toggle').click(function(){
  $(this).parent().toggleClass('nav_open');
  $('.l-header').toggleClass('is-show');
  $('body').toggleClass('__hidden');
});

$(function() {
  $('a[href^="#"]').on("click", function(e) {
    e.preventDefault();
    var adjust = -100;
    var speed = 800;
    var href = $(this).attr("href");
    var $target = href === "#" || href === "" ? $("html") : $(href);

    if ($target.length) {
      var position = $target.offset().top + adjust;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
    }
  });
});

//toggle menu
$('.l-header-nav__toggle').click(function(){
  $(this).toggleClass('is-close');
  $('body').toggleClass('is-hidden');
  $('.l-header-nav').toggleClass('is-open');
});

$('.l-header-nav-btn').click(function(){
  $(this).toggleClass('__move');
  $(this).next().toggleClass('submenu-open');
});

$('.l-footer-top-nav__btn').click(function(){
  $(this).toggleClass('__move');
  $(this).next().toggleClass('submenu-open');
});

//toggle link
$('.c-index-contents__slider__toggle-ttl').click(function(){
  $(this).toggleClass('is-open');
  $(this).next().slideToggle();
});
$(document).ready(function(){
  $('a[href^="#"]').on('click', function(){
    $('.l-header-nav').removeClass('is-open');
  });
});

//inview package
$(function () {
    $(".is-fade").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".is-fadeleft").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".is-faderight").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".anime-up").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".is-animation").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".is-blur").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".is-bounce").on("inview", function () {
        $(this).addClass("is-inview");
    });
    $(".c-index-bottom").on("inview", function () {
        $(this).addClass("is-inview");
    });
});

const list = document.querySelector('.c-index-flow__list');
const track = document.querySelector('.custom-scrollbar');
const thumb = document.querySelector('.custom-thumb');

function updateThumb() {
  const scrollLeft = list.scrollLeft;
  const scrollWidth = list.scrollWidth;
  const visibleWidth = list.clientWidth;
  const trackWidth = track.clientWidth;

  // 表示割合からつまみの幅を決定
  const thumbWidth = Math.max(
    (visibleWidth / scrollWidth) * trackWidth,
    40 // 最小幅（任意）
  );

  const maxScroll = scrollWidth - visibleWidth;
  const maxMove = trackWidth - thumbWidth;

  const moveX = (scrollLeft / maxScroll) * maxMove;

  thumb.style.width = `${thumbWidth}px`;
  thumb.style.transform = `translateX(${moveX}px)`;
}

// スクロール追従
list.addEventListener('scroll', updateThumb);
window.addEventListener('resize', updateThumb);

// 初期化
updateThumb();
let isDragging = false;
let startX = 0;
let startScrollLeft = 0;

thumb.addEventListener('mousedown', (e) => {
  isDragging = true;
  startX = e.clientX;
  startScrollLeft = list.scrollLeft;
  document.body.classList.add('is-dragging');
});

document.addEventListener('mousemove', (e) => {
  if (!isDragging) return;

  const trackWidth = track.clientWidth;
  const thumbWidth = thumb.offsetWidth;
  const maxMove = trackWidth - thumbWidth;
  const maxScroll = list.scrollWidth - list.clientWidth;

  const dx = e.clientX - startX;
  const scrollRatio = maxScroll / maxMove;

  list.scrollLeft = startScrollLeft + dx * scrollRatio;
});

document.addEventListener('mouseup', () => {
  isDragging = false;
  document.body.classList.remove('is-dragging');
});

thumb.addEventListener('touchstart', (e) => {
  isDragging = true;
  startX = e.touches[0].clientX;
  startScrollLeft = list.scrollLeft;
});

document.addEventListener('touchmove', (e) => {
  if (!isDragging) return;

  const trackWidth = track.clientWidth;
  const thumbWidth = thumb.offsetWidth;
  const maxMove = trackWidth - thumbWidth;
  const maxScroll = list.scrollWidth - list.clientWidth;

  const dx = e.touches[0].clientX - startX;
  const scrollRatio = maxScroll / maxMove;

  list.scrollLeft = startScrollLeft + dx * scrollRatio;
});

document.addEventListener('touchend', () => {
  isDragging = false;
});


//wpcf7-previous
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wpcf7-previous').forEach(function(button) {
        button.addEventListener('click', function() {
            history.back();
        });
    });
});

//slick
$(function () {
  $('.c-index-visual__top--slider').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    speed: 3000,
    pauseOnHover: false,
    dots: false,
  }).on({
		beforeChange: function (event, slick, currentSlide, nextSlide) {
			$(".c-index-visual__top--item.slick-slide", this).eq(nextSlide).addClass("add-animation");
			$(".c-index-visual__top--item.slick-slide", this).eq(currentSlide).addClass("remove-animation");
		},
		afterChange: function () {
			$(".remove-animation", this).removeClass(
				"remove-animation add-animation"
			);
		},
	});
  $('.c-index-visual__bottom--slider').slick({
    autoplay: true,
    autoplaySpeed: 0,
    speed: 9000,
    cssEase: 'linear',
    arrows:false,
    swipe: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    centerMode: true,
    initialSlide: 3,
    variableWidth: true, 
  })
});
