"use strict";

jQuery(function ($) {
  /* ================================================================================================== */
  /* **********ハンバーガーメニュー********** */
  $(function () {
    function addGlobalStyle(css) {
      var head, style;
      head = document.getElementsByTagName("head")[0];
      if (!head) {
        return;
      }
      style = document.createElement("style");
      style.type = "text/css";
      style.innerHTML = css;
      head.appendChild(style);
    }
    var css = "\n  body.hidden > *:not(header) {\n    opacity: 0;\n    transition: opacity 0.6s;\n  }\n";
    addGlobalStyle(css);
    $(".js-hamburger").on("click", function () {
      $(this).toggleClass("js-active");
      $(".js-header__nav-wrapper").toggleClass("js-active");
      if ($(this).hasClass("js-active")) {
        $("body").addClass("hidden");
        $("body").css("overflow", "hidden");
        $(".header").css("background-color", "#408F95");
        $(".header").css("transition", "0.6s");
      } else {
        $("body").removeClass("hidden");
        $("body").css("overflow", "");
        $(".header").css("background-color", "");
      }
      return false;
    });
    $(".header__nav-wrapper a").on("click", function () {
      $(".header__nav-wrapper").removeClass("js-active");
      $(".hamburger").removeClass("js-active");
      $("body").removeClass("hidden");
      $("body").css("overflow", "");
      $(".header").css("background-color", "");
    });
    $(".header__logo a").on("click", function (e) {
      if ($(".header").hasClass("js-visible")) {
        e.preventDefault();
        $(".header__nav-wrapper").removeClass("js-active");
        $(".hamburger").removeClass("js-active");
        $("body").removeClass("hidden");
        $("body").css("overflow", "");
        $(".header").css("background-color", "");
        setTimeout(function () {
          window.location.href = "/";
        }, 600);
      }
    });
  });

  /* ================================================================================================== */
  /* **********ギャラリーのモーダル********** */
  $(document).ready(function () {
    // ギャラリーの画像をクリックした時
    $('.gallery__image img').on('click', function () {
      var imageUrl = $(this).attr('src'); // クリックした画像のURLを取得
      $('#modalimage').css('background-image', 'url(' + imageUrl + ')');
      $('#modal').fadeIn(300).addClass('modal--active').css('display', 'flex');
      $('body').css('overflow', 'hidden'); // bodyのスクロールを無効に
    });

    // モーダルまたはモーダル画像をクリックした時にモーダルを閉じる
    $('#modal, #modalimage').on('click', function (e) {
      if (e.target === this) {
        $('#modal').fadeOut(300, function () {
          $(this).removeClass('modal--active');
        });
        $('body').css('overflow', 'auto');
      }
    });
  });

  /* ================================================================================================== */
  /* **********FAQアコーディオン********** */
  $(document).ready(function () {
    $(".faq-box__function").click(function () {
      $(this).next(".faq-box__answer").slideToggle();
      $(this).toggleClass("js-close");
    });
  });

  /* ================================================================================================== */
  /* **********(トップページMV)ローディングアニメーションとswiper********** */
  $(document).ready(function () {
    var $title = $(".js-mv__title");
    var $animationContainer = $(".js-mv__loading-inner");
    var $header = $(".js-top-header");
    function initialShowAndHideTitle() {
      $title.addClass("js-visible--loading");
      setTimeout(function () {
        $title.removeClass("js-visible--loading").addClass("js-hidden");
      }, 3000);
    }
    function showTitle() {
      setTimeout(function () {
        $title.removeClass("js-hidden").addClass("js-visible");
      }, 1000);
    }
    function hideAnimationContainer() {
      setTimeout(function () {
        $animationContainer.fadeOut(2000, function () {
          $animationContainer.remove();
          startSwiper();
        });
      }, 2000);
    }
    function startSwiper() {
      var mvSwiper = new Swiper(".js-mv__swiper", {
        loop: true,
        speed: 1500,
        effect: "fade",
        autoplay: {
          delay: 2000
        },
        slidesPerView: 1,
        roundLengths: true
      });
    }
    function showHeader() {
      $header.addClass("js-visible").fadeIn(1000);
    }
    initialShowAndHideTitle();
    $(".mv__loading-image--right").on("animationend", function () {
      showTitle();
    });
    $title.on("transitionend", function () {
      if ($title.hasClass("js-visible")) {
        hideAnimationContainer();
        showHeader();
      }
    });
  });

  /* ================================================================================================== */
  /* **********swiper・キャンペーンセクション********** */
  var campaignSwiper = new Swiper(".js-campaign__swiper", {
    slidesPerView: "auto",
    spaceBetween: 24,
    loop: true,
    freeMode: true,
    navigation: {
      nextEl: ".campaign__swiper-button-next",
      prevEl: ".campaign__swiper-button-prev"
    },
    breakpoints: {
      768: {
        spaceBetween: 40
      }
    }
  });

  /* ================================================================================================== */
  /* **********画像に色幕のアニメーション(inview.js使用)********** */
  var box = $(".js-colorbox"),
    speed = 700;
  box.each(function () {
    $(this).append('<div class="js-color"></div>');
    var color = $(this).find($(".js-color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");
    color.on("inview", function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          width: "100%"
        }, speed, function () {
          image.css("opacity", "1");
          $(this).css({
            left: "0",
            right: "auto"
          });
          $(this).animate({
            width: "0%"
          }, speed);
        });
        counter = 1;
      }
    });
  });

  /* ================================================================================================== */
  /* **********ページトップリンク********** */
  function PageTopAnime() {
    var scroll = $(window).scrollTop();
    var wH = window.innerHeight;
    var footerPos = $("#footer").offset().top;
    if (scroll >= 200) {
      $("#page-top").removeClass("RightOut").addClass("RightIn");
    } else {
      if ($("#page-top").hasClass("RightIn")) {
        $("#page-top").removeClass("RightIn").addClass("RightOut");
      }
    }
    if (scroll + wH >= footerPos + 16) {
      var pos = scroll + wH - footerPos + 16;
      $("#page-top").css("bottom", pos).removeClass("RightIn").addClass("RightOut");
    } else {
      if ($("#page-top").hasClass("RightIn")) {
        $("#page-top").css("bottom", "16px");
      }
    }
  }
  $(window).scroll(function () {
    PageTopAnime();
  });
  $("#page-top").click(function () {
    $("body,html").animate({
      scrollTop: 0
    }, 500);
    return false;
  });

  /* ================================================================================================== */
  /* **********インフォメーション・カテゴリータブ********** */
  // ハッシュIDでタブを切り替える関数
  function getHashID(hashIDName) {
    if (hashIDName && hashIDName.startsWith("#tab-")) {
      // ハッシュが"tab-"で始まるか確認
      $('.tab').find('a').each(function () {
        var idName = $(this).attr('href');
        if (idName === hashIDName) {
          var btnElm = $(this);
          // タブボタンのactiveクラス管理
          $('.tab__btn').removeClass("active");
          btnElm.addClass("active");
          // 情報カードの表示管理
          $(".information-card").removeClass("is-active");
          $(hashIDName).addClass("is-active");
        }
      });
    }
  }

  // タブボタンがクリックされたときのイベント
  $('.tab__btn').on('click', function () {
    var idName = $(this).attr('href');
    if (idName.startsWith('#tab-')) {
      $('.tab__btn').removeClass("active");
      $(this).addClass("active");
      getHashID(idName);
    }
    return false;
  });
  $(window).on('load', function () {
    var hashName = location.hash;
    if (hashName && hashName.startsWith("#tab-")) {
      getHashID(hashName);
      scrollToTab();
    } else {
      $('.tab__btn:first-of-type').addClass("active");
      $('.information-card:first-of-type').addClass("is-active");
    }
  });

  // ハッシュ変更時にタブを切り替える
  $(window).on('hashchange', function () {
    var hashName = location.hash;
    if (hashName && hashName.startsWith("#tab-")) {
      getHashID(hashName);
      scrollToTab();
    }
  });

  // タブメニューの位置までスクロールする関数
  function scrollToTab() {
    var targetOffset = $('.tab').offset().top - 200;
    $('html, body').animate({
      scrollTop: targetOffset
    }, 500);
  }

  /* ================================================================================================== */
  /* **********サイドバー・アーカイブ情報のトグル********** */
  $(document).ready(function () {
    var firstYear = $('.sidebar__archive-list').first();
    firstYear.find('.sidebar__archive-months').show();
    firstYear.find('.sidebar__archive-year').on('click', function (e) {
      e.preventDefault();
      firstYear.find('.sidebar__archive-months').slideToggle();
      firstYear.toggleClass('js-open');
    });
    var secondYear = $('.sidebar__archive-list').eq(1);
    secondYear.find('.sidebar__archive-months').hide();
    secondYear.find('.sidebar__archive-year').on('click', function (e) {
      e.preventDefault();
      secondYear.find('.sidebar__archive-months').slideToggle();
      secondYear.toggleClass('js-open');
    });
  });

  /* ================================================================================================== */
  /* **********プライスページへのリンクのスクロール位置指定********** */
  $(document).ready(function () {
    var scrollOffset = 200;
    function scrollToHash() {
      var hash = window.location.hash; // URLのハッシュを取得
      if (hash) {
        var $target = $(hash);

        // ターゲット要素が .price-sub セクション内にあるか確認
        if ($target.length && $target.closest('.price-sub').length) {
          var offset = $target.offset().top;
          $('html, body').animate({
            scrollTop: offset - scrollOffset
          }, 600);
        }
      }
    }
    scrollToHash();
    $(window).on('hashchange', scrollToHash);
  });
});