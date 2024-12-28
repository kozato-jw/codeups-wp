var $ = jQuery.noConflict();
"use strict";

jQuery(function ($) {
  /* ハンバーガーメニュー */
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
    var css = "\n      body.hidden > *:not(header) {\n        opacity: 0;\n        transition: opacity 0.6s;\n      }\n    ";
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
});

/* ギャラリーのモーダル */
document.addEventListener('DOMContentLoaded', function () {
  var images = document.querySelectorAll('.gallery__image img');
  var modal = document.getElementById('modal');
  var modalImg = document.getElementById('modalimage');
  if (modal && modalImg) {
    images.forEach(function (image) {
      image.addEventListener('click', function () {
        // スクロールバーの幅を取得し、その分だけbodyにpaddingを追加
        var scrollbarWidth = getScrollbarWidth();
        document.body.style.paddingRight = "".concat(scrollbarWidth, "px");
        modal.style.display = 'block';
        setTimeout(function () {
          return modal.classList.add('show');
        }, 10);
        modalImg.src = this.src;
        document.body.classList.add('js-modal-open');
      });
    });
    modal.addEventListener('click', function () {
      modal.classList.remove('show');
      setTimeout(function () {
        modal.style.display = 'none';
        document.body.style.paddingRight = '';
        document.body.classList.remove('js-modal-open');
      }, 500);
    });
  }

  // スクロールバーの幅を計算する関数
  function getScrollbarWidth() {
    return window.innerWidth - document.documentElement.clientWidth;
  }
});

/* FAQアコーディオン */
$(document).ready(function () {
  $(".faq-box__function").click(function () {
    $(this).next(".faq-box__answer").slideToggle();
    $(this).toggleClass("js-close");
  });
});

/* (トップページMV)ローディングアニメーションとswiper */
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

/* swiper・キャンペーンセクション */
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

/* 画像に色幕のアニメーション(inview.js使用) */
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

/* ページトップリンク */
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

/* インフォメーション・カテゴリータブ */
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

/*サイドバー・アーカイブ情報のトグル */
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

/* コンタクトフォーム */
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('contactForm');
  var submitButton = document.getElementById('submitButton');
  var consentCheckbox = document.getElementById('consentCheckbox');
  setupEventListeners();
  function setupEventListeners() {
    consentCheckbox.addEventListener('change', handleConsentChange);
    var requiredFields = form.querySelectorAll('.form__required');
    requiredFields.forEach(function (field) {
      return setupFieldInputListener(field);
    });
    form.addEventListener('submit', handleSubmit);
  }
  function handleConsentChange() {
    var isChecked = this.checked;
    submitButton.disabled = !isChecked;
    submitButton.classList.toggle('btn--disabled', !isChecked);
  }
  function setupFieldInputListener(requiredField) {
    var fieldContainer = requiredField.closest('dl');
    var input = fieldContainer.querySelector('input, textarea, select');
    if (input) {
      input.addEventListener('input', function () {
        validateField(input, fieldContainer);
      });
    }
  }

  // function validateField(input, fieldContainer) {
  //     if (input.value.trim()) {
  //         input.classList.remove('form__error');
  //         fieldContainer.classList.remove('form__item--error');
  //     } else {
  //         input.classList.add('form__error');
  //         fieldContainer.classList.add('form__item--error');
  //     }
  // }

  // function handleSubmit(event) {
  //     event.preventDefault();
  //     let hasError = false;
  //     resetErrors();
  //     hasError = validateRequiredFields();
  //     hasError = validateCheckGroups() || hasError;
  //     hasError = validateConsentCheckbox() || hasError;
  //     if (hasError) {
  //         form.classList.add('form--error');
  //         window.scrollTo(0, 0);
  //     } else {
  //         form.classList.remove('form--error');
  //         form.submit();
  //     }
  // }

  // function resetErrors() {
  //     form.classList.remove('form--error');
  //     form.querySelectorAll('.form__item--error').forEach(item => item.classList.remove('form__item--error'));
  //     form.querySelectorAll('.form__error').forEach(input => input.classList.remove('form__error'));
  // }

  // function validateRequiredFields() {
  //     let hasError = false;
  //     const requiredFields = form.querySelectorAll('.form__required');
  //     requiredFields.forEach(field => {
  //         const fieldContainer = field.closest('dl');
  //         const input = fieldContainer.querySelector('input, textarea, select');
  //         if (input) {
  //             const isEmpty = !input.value.trim();
  //             const isEmailInvalid = input.type === 'email' && !input.value.includes('@');
  //             if (isEmpty || isEmailInvalid) {
  //                 input.classList.add('form__error');
  //                 fieldContainer.classList.add('form__item--error');
  //                 hasError = true;
  //             }
  //         }
  //     });
  //     return hasError;
  // }

  // function validateCheckGroups() {
  //     let hasError = false;
  //     const checkGroups = form.querySelectorAll('.form__check');
  //     checkGroups.forEach(group => {
  //         const checkboxes = Array.from(group.querySelectorAll('input[type="checkbox"]'));
  //         const hasChecked = checkboxes.some(checkbox => checkbox.checked);
  //         if (!hasChecked) {
  //             group.classList.add('form__item--error');
  //             group.querySelectorAll('label').forEach(label => label.classList.add('form__item--error'));
  //             hasError = true;
  //         } else {
  //             group.classList.remove('form__item--error');
  //             group.querySelectorAll('label').forEach(label => label.classList.remove('form__item--error'));
  //         }
  //     });
  //     return hasError;
  // }

  // function validateConsentCheckbox() {
  //     const isConsentChecked = consentCheckbox.checked;
  //     if (!isConsentChecked) {
  //         consentCheckbox.closest('p').classList.add('form__item--error');
  //     } else {
  //         consentCheckbox.closest('p').classList.remove('form__item--error');
  //     }
  //     return !isConsentChecked;
  // }
});





// カテゴリーボタン　タクソノミーによるタブ切り替えの設定
$(document).ready(function () {
  $('.category__btn').on('click', function (e) {
    var href = $(this).attr('href');
    

    if (!href.startsWith('#')) {
      return;
    }
    
    e.preventDefault();
    var tabId = $(this).data('tab').replace('tab-', '');
    activateTab(tabId);
  });

});




// // カテゴリーボタン　タクソノミーによるタブ切り替えの設定
// $(document).ready(function () {
//   // ページ読み込み時の動作
//   $(window).on('load', function () {
//     var hash = window.location.hash;
//     if (hash && hash.startsWith('#category-tab-')) {
//       var tabId = hash.replace('#category-tab-', ''); // ハッシュからタブIDを取得
//       activateTab(tabId);
//     } else {
//       activateTab('all'); // デフォルトで全ての投稿を表示
//     }
//   });

//   // タブボタンがクリックされたときの処理
//   $('.category__btn').on('click', function (e) {
//     e.preventDefault(); // デフォルトのリンク動作を防止
//     var tabId = $(this).data('tab').replace('tab-', ''); // `tab-` を除去してIDを取得
//     activateTab(tabId);
//     window.location.hash = 'category-tab-' + tabId; // URLのハッシュを更新
//   });

//   // URLのハッシュが変更されたときの処理
//   $(window).on('hashchange', function () {
//     var hash = window.location.hash.replace('#category-tab-', '');
//     activateTab(hash);
//   });

//   // タブを切り替える関数
//   function activateTab(tabId) {
//     // 全てのボタンから active クラスを削除
//     $('.category__btn').removeClass('active');
//     // 現在のタブを active にする
//     $("[data-tab='tab-" + tabId + "']").addClass('active');

//     // 全てのカードを非表示
//     $('.campaign-card').css('display', 'none');

//     // "all" が選ばれた場合は全てのカードを表示
//     if (tabId === 'all') {
//       $('.campaign-card').css('display', 'block');
//     } else {
//       // 選択されたタブIDに一致するカードだけ表示
//       $(".js-tab-" + tabId).css('display', 'block');
//     }
//   }

//   // ページトップにスムーススクロールする関数
//   function scrollToTop() {
//     var targetOffset = $('.category').offset().top - 200;
//     $('html, body').animate({
//       scrollTop: targetOffset
//     }, 300);
//   }
// });



/* プライスページへのリンクのスクロール位置指定 */
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




