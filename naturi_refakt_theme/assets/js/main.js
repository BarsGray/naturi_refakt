new WOW().init();

document.addEventListener('wpcf7mailsent', function (event) {
  setTimeout(() => {
    location = '/thanks';
  }, 1000); // Wait for 3 seconds to redirect.
}, false);

/*
var x = document.getElementsByClassName("agree");
var i;
for (i = 0; i < x.length; i++) {
x[i].checked = false;
}*/

/*
 *
 *
 * добавление в заголовка в скрытый input
 */

$("#page_title").val($("title").text());
$("#page_title1").val($("title").text());
$("#page_title2").val($("title").text());
$("#page_title3").val($("title").text());
$("#page_title4").val($("title").text());
$("#page_title5").val($("title").text());
//*$("#page_title").val($("h1").text());*/

/*
 *
 *
 * ajax обновление счетчика желаний
 */
$(document).on("click", ".add_to_wishlist, .remove_from_wishlist", function () {
  const counterClass = $(".wishlist_counter");
  setTimeout(function () {
    $.ajax({
      url: wc_order_attribution.params.ajaxurl,
      type: "POST",
      data: {
        action: "update_wishlist_counter",
      },
      success: function (response) {
        if (response.success) {
          counterClass.text(response.data);
        } else {
          console.log(response);
        }
      },
    });
  }, 250);
});
/*
 *
 *
 * ajax обновление счетчика сравнения
 */
/* $(document).on("click", ".compare-button", function () {
  const counterClass = $(".compare_counter");
  setTimeout(function () {
    let counter = parseInt(counterClass.text());
    counterClass.text(++counter);
  }, 250);
});
$(document).on("click", ".compare-list .remove a", function () {
  const counterClass = $(".compare_counter");
  setTimeout(function () {
    let counter = parseInt(counterClass.text());
    counterClass.text(--counter);
  }, 250);
}); */

/*
 * ajax кнопка Загрузка продуктов
 */

jQuery(document).ready(function ($) {
  $(document).on('click', '#load_products', function () {
    var button = $(this);
    var page = button.data('page');
    var wpf_fbv = getParameterByName('wpf_fbv');

    $.ajax({
      url: wc_order_attribution.params.ajaxurl,
      type: 'POST',
      data: {
        action: 'load_more_products',
        page: page,
        wpf_fbv: wpf_fbv
      },
      beforeSend: function () {
        button.text('Загрузка...');
        $('.news_btn').hide();
      },
      success: function (response) {
        if (response === 'no-more-products') {
          button.remove();
        } else {
          $('.catalog_items .products').append(response);
          button.text('Больше домов').data('page', page + 1);
        }
      }
    });
  });

  // Функция для получения значения GET параметра
  function getParameterByName(name) {
    var regex = new RegExp('[?&]' + name + '=([^&#]*)');
    var results = regex.exec(window.location.href);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }

});


/*
 * ajax кнопка Загрузить еще
 */
$(".loadmore").on("click", function () {
  const this_btn = $(this);
  this_btn.siblings(".preloader").show();
  let parent_container = $(this).siblings(".loadmore__container");
  const page_id = parseInt(parent_container.attr("data-page_id"));
  const acf_field = parent_container.attr("data-acf_field");
  let offset = parseInt(parent_container.attr("data-count"));
  $.ajax({
    url: wc_order_attribution.params.ajaxurl,
    type: "post",
    data: {
      action: "load_more",
      offset: offset,
      page_id: page_id,
      acf_field: acf_field,
    },
    success: function (response) {
      let data = JSON.parse(response);
      parent_container.append(data.html);
      offset += 4;
      parent_container.attr("data-count", offset);
      console.log(data);
      if (!data.has_more) {
        this_btn.hide();
      }
    },
    complete: function () {
      this_btn.siblings(".preloader").hide();
    },
  });
});
/*
 * ajax кнопка Загрузить больше новостей
 */
$("#load_news").on("click", function () {
  var button = $(this);
  var page = parseInt(button.attr("data-page"));
  var newPage = page + 1;
  $.ajax({
    url: wc_order_attribution.params.ajaxurl,
    type: "post",
    data: {
      action: "load_more_news",
      page: newPage,
    },
    beforeSend: function () {
      button.text("Загружаю...");
    },
    success: function (response) {
      console.log(response);
      if (response) {
        $("#post-container").append(response);
        button.attr("data-page", newPage);
        button.text("Загрузить еще");
      } else {
        // console.log("Нет больше записей");
        button.text("Нет больше записей");
        button.prop("disabled", true);
      }
    },
  });
});
//

let technologyDifferences = 0;
$(".technology_differences_inner_right li").each(function () {
  $(this).attr("data-wow-delay", ++technologyDifferences * 0.2 + "s");
});
let faqItem = 0;
$(".faq_item").each(function () {
  $(this).attr("data-wow-delay", ++faqItem * 0.1 + "s");
});
let aboutAdvantagesItems = 1.25;
$(".about_advantages_item").each(function () {
  $(this).attr("data-wow-delay", ++aboutAdvantagesItems * 0.25 + "s");
});
let advantagesItem = 1.25;
$(".advantages_item").each(function () {
  $(this).attr("data-wow-delay", ++advantagesItem * 0.25 + "s");
});
let privilegeItem = 0.25;
$(".technology_privilege_item").each(function () {
  $(this).attr("data-wow-delay", ++privilegeItem * 0.25 + "s");
});

let photoGalery = 0;
$(".photo_galery li").each(function () {
  $(this).attr("data-wow-delay", ++photoGalery * 0.15 + "s");
});

let videoGalery = 0;
$(".video_galery_items a").each(function () {
  $(this).attr("data-wow-delay", ++videoGalery * 0.15 + "s");
});

let servicesInnerItem = 0;
$(".services_inner_specifications_item").each(function () {
  $(this).attr("data-wow-delay", ++servicesInnerItem * 0.15 + "s");
});

let servicesInnerDetailStagesItem = 0;
$(".services_inner_detail_stages_item").each(function () {
  $(this).attr("data-wow-delay", ++servicesInnerDetailStagesItem * 0.15 + "s");
});

let reviewsInnerPageItem = 0;
$(".reviews_inner_page_item").each(function () {
  $(this).attr("data-wow-delay", ++reviewsInnerPageItem * 0.15 + "s");
});

let historyHouseDetailItogSliderWrapper = 0;
$(".history_house_detail_itog_slider .swiper-slide").each(function () {
  $(this).attr(
    "data-wow-delay",
    ++historyHouseDetailItogSliderWrapper * 0.1 + "s"
  );
});

document.addEventListener("DOMContentLoaded", () => {
  // Структура страницы загружена и готова к взаимодействию
  const tabs = (
    tabsSelector,
    tabsHeadSelector,
    tabsBodySelector,
    tabsCaptionSelector,
    tabsCaptionActiveClass,
    tabsContentActiveClass
  ) => {
    // объявляем основную функцию tabs, которая будет принимать CSS классы и селекторы
    const tabs = document.querySelector(tabsSelector); // ищем на странице элемент по переданному селектору основного элемента вкладок и записываем в константу
    if (tabs !== null) {
      const head = tabs.querySelector(tabsHeadSelector); // ищем в элементе tabs элемент с кнопками по переданному селектору и записываем в константу
      const body = tabs.querySelector(tabsBodySelector); // ищем в элементе tabs элемент с контентом по переданному селектору и записываем в константу
      const getActiveTabName = () => {
        // функция для получения названия активной вкладки
        return head.querySelector(`.${tabsCaptionActiveClass}`).dataset.tab; // возвращаем значение data-tab активной кнопки
      };
      const setActiveContent = () => {
        // функция для установки активного элемента контента
        if (body.querySelector(`.${tabsContentActiveClass}`)) {
          // если уже есть активный элемент контента
          body
            .querySelector(`.${tabsContentActiveClass}`)
            .classList.remove(tabsContentActiveClass); // то скрываем его
        }
        body
          .querySelector(`[data-tab=${getActiveTabName()}]`)
          .classList.add(tabsContentActiveClass); // затем ищем элемент контента, у которого значение data-tab совпадает со значением data-tab активной кнопки и отображаем его
      };
      // проверяем при загрузке страницы, есть ли активная вкладка
      if (!head.querySelector(`.${tabsCaptionActiveClass}`)) {
        // если активной вкладки нет
        head
          .querySelector(tabsCaptionSelector)
          .classList.add(tabsCaptionActiveClass); // то делаем активной по-умолчанию первую вкладку
      }
      setActiveContent(getActiveTabName()); // устанавливаем активный элемент контента в соответствии с активной кнопкой при загрузке страницы
      head.addEventListener("click", (e) => {
        // при клике на элемент с кнопками
        const caption = e.target.closest(tabsCaptionSelector); // узнаем, был ли клик на кнопке
        if (!caption) return; // если клик был не на кнопке, то прерываем выполнение функции
        if (caption.classList.contains(tabsCaptionActiveClass)) return; // если клик был на активной кнопке, то тоже прерываем выполнение функции и ничего не делаем

        if (head.querySelector(`.${tabsCaptionActiveClass}`)) {
          // если уже есть активная кнопка
          head
            .querySelector(`.${tabsCaptionActiveClass}`)
            .classList.remove(tabsCaptionActiveClass); // то удаляем ей активный класс
        }
        caption.classList.add(tabsCaptionActiveClass); // затем добавляем активный класс кнопке, на которой был клик
        setActiveContent(getActiveTabName()); // устанавливаем активный элемент контента в соответствии с активной кнопкой
      });
    }
  };
  tabs(
    ".the_team_of_employees_inner",
    ".tabs_head",
    ".tabs_body",
    ".tabs_caption",
    "tabs_caption_active",
    "tabs_content_active"
  ); // вызываем основную функцию tabs для синих вкладок .section__tabs

  /*  let head_tabs = 0;
     $('.tabs_caption').each(function () {
         $(this).attr('data-tab', ++head_tabs);
     });
 
     let tabs_content = 0;
     $('.tabs_content').each(function () {
         $(this).attr('data-tab', ++tabs_content);
     }); */
});

var swiper = new Swiper(".reviews_slider", {
  // pagination: {
  //   el: ".reviews_slider_pagination",
  //   clickable: true,
  // },
  navigation: {
    nextEl: ".reviews_slider_nagination-next",
    prevEl: ".reviews_slider_nagination-prev",
  },
  loop: true,
});

var swiper = new Swiper(".about_info_slider", {
  pagination: {
    el: ".about_info_slider_pagination",
    clickable: true,
  },
});

var thicknessTop = new Swiper(".thickness_top", {
  spaceBetween: 0,
  slidesPerView: 3,
  loop: false,
  freeMode: false,
});

var thicknessBottom = new Swiper(".thickness_bottom", {
  spaceBetween: 0,
  slidesPerView: 1,
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    600: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    767: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: !0,
    },
  },
  thumbs: {
    swiper: thicknessTop,
  },
});

// var technologyHistoryBottom = new Swiper(".technology_history_bottom", {
//   spaceBetween: 0,
//   slidesPerView: 4,
//   loop: false,
//   freeMode: false,
// });

// var technologyHistoryTop = new Swiper(".technology_history_top", {
//   spaceBetween: 30,
//   slidesPerView: 1,
//   loop: false,
//   breakpoints: {
//     320: {
//       slidesPerView: 1,
//       spaceBetween: 10,
//     },
//     600: {
//       slidesPerView: 1,
//       spaceBetween: 20,
//     },
//     767: {
//       slidesPerView: 1,
//       spaceBetween: 30,
//       loop: !0,
//     },
//   },
//   thumbs: {
//     swiper: technologyHistoryBottom,
//   },
//   navigation: {
//     nextEl: ".technology_history_bottom_next",
//     prevEl: ".technology_history_bottom_prev",
//   },
// });






var slideCount = document.querySelectorAll('.product_slider .swiper-slide').length;
if (slideCount) {
  var swiper = new Swiper('.product_slider', {
    slidesPerView: 1,
    spaceBetween: 10,
    // navigation: {
    //   nextEl: ".product_slider_photo_navigation_next",
    //   prevEl: ".product_slider_photo_navigation_prev",
    // },
    breakpoints: {
      320: {
        slidesPerView: "auto",
      },
    },
    thumbs: {
      swiper: {
        el: '.product_mini_slider',
        spaceBetween: 10,
        slidesPerView: 5,
      }
    },
  });
};

/**
 * Функция обходит все элементы <a> и добавляет к ссылкам UTM-метки, которые пришли из текущего запроса 
 */
function add_dynamic_utm_to_links() {
  //Домен, ссылки которого будут обработаны
  var domains_for_check = [
    '//' + window.location.hostname
  ];

  //Список UTM-меток, которые будут добавлены к ссылкам
  var utm_params = [
    'utm_medium',
    'utm_source',
    'utm_campaign',
    'utm_term',
    'roistat'
  ];

  //Готовим строку, состоящую из utm-меток. Строка будет добавлена к ссылкам
  var ar = [];
  var str_utm_get_params = '';
  for (var index = 0; index < utm_params.length; index++) {
    let utm_name = utm_params[index];
    let match = '';
    let value = '';

    if (match = (new RegExp('[?&]' + encodeURIComponent(utm_name) + '=([^&]*)')).exec(window.location.search)) {
      value = decodeURIComponent(match[1]);
    }

    if (value != '') {
      ar.push(utm_params[index] + '=' + value);
    }
  }
  str_utm_get_params = ar.join('&');

  //Если utm-меток нету, то завершаем работу функции
  if (str_utm_get_params == '') return false;

  //Массив всех ссылок страницы
  var links = document.querySelectorAll('a:not(.utm_checked)');

  //Обходим все ссылки и для подходящих добавляем строку, содержащую utm-параметры
  var connect_sign = '?';
  for (var index = 0; index < links.length; index++) {
    //Если ссылка уже обработана, то пропускам её повторную обработку
    if (links[index].classList.contains('utm_checked') == true) continue;

    for (var d_num = 0; d_num < domains_for_check.length; d_num++) {

      if (links[index].href.indexOf(domains_for_check[d_num]) > -1 && links[index].href.indexOf('#') === -1) {
        //Символ для соединения параметров
        connect_char = '?';
        if (links[index].href.indexOf('?') > -1) {
          connect_char = '&';
        }

        links[index].href = links[index].href + connect_char + str_utm_get_params;
      }
    }

    //Фиксируем обход ссылки с помощью css-класса
    links[index].classList.add('utm_checked');
  }

  console.log('Метки добавлены');

  return true;
}


window.onload = function () {

  add_dynamic_utm_to_links();

  var swiper = new Swiper(".services_inner_slider", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    // loop: true,
    navigation: {
      nextEl: ".services_inner_slider_navigation_next",
      prevEl: ".services_inner_slider_navigation_prev",
    },
    pagination: {
      el: ".services_inner_slider_pagination_inner",
      type: "fraction",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 1,
      },
    },
  });
  var swiper = new Swiper(".slider_galerei", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    // loop: true,
    // loopedSlides: 2,
    watchOverflow: true,
    navigation: {
      nextEl: ".slider_galerei_navigation_next",
      prevEl: ".slider_galerei_navigation_prev",
    },
    grid: {
      rows: 2,
      fill: 'row' // 'row' или 'column' - зависит от желаемого порядка заполнения
    },
    breakpoints: {
      781: {
        loop: true,
        loopedSlides: 2,
        slidesPerView: 1,
        grid: {
          rows: 1,
        },
      },
    },
  });
  var swiper = new Swiper(".history_one_home_inner_slider", {
    slidesPerView: 2,
    spaceBetween: 30,
    centeredSlides: true,
    // loop: true,
    navigation: {
      nextEl: ".history_one_home_inner_slider_navigation_next",
      prevEl: ".history_one_home_inner_slider_navigation_prev",
    },
    pagination: {
      el: ".history_one_home_inner_slider_pagination_inner",
      type: "fraction",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 2,
      },
    },
  });
};

var swiper = new Swiper(".galery_single_slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: ".galery_single_slider_navigation_next",
    prevEl: ".galery_single_slider_navigation_prev",
  },
  pagination: {
    el: ".galery_single_slider_pagination_inner",
    clickable: true,
  },
});

Fancybox.bind("[data-fancybox]", {});

class ItcAccordion {
  constructor(target, config) {
    this._el =
      typeof target === "string" ? document.querySelector(target) : target;
    const defaultConfig = {
      alwaysOpen: true,
      duration: 350,
    };
    this._config = Object.assign(defaultConfig, config);
    this.addEventListener();
  }

  addEventListener() {
    this._el.addEventListener("click", (e) => {
      const elHeader = e.target.closest(".faq_header");
      if (!elHeader) {
        return;
      }
      if (!this._config.alwaysOpen) {
        const elOpenItem = this._el.querySelector(".faq_item_show");
        if (elOpenItem) {
          elOpenItem !== elHeader.parentElement
            ? this.toggle(elOpenItem)
            : null;
        }
      }
      this.toggle(elHeader.parentElement);
    });
  }

  show(el) {
    const elBody = el.querySelector(".faq_body");
    if (
      elBody.classList.contains("collapsing") ||
      el.classList.contains("faq_item_show")
    ) {
      return;
    }
    elBody.style["display"] = "block";
    const height = elBody.offsetHeight;
    elBody.style["height"] = 0;
    elBody.style["overflow"] = "hidden";
    elBody.style["transition"] = `height ${this._config.duration}ms ease`;
    elBody.classList.add("collapsing");
    el.classList.add("faq_item_slidedown");
    elBody.offsetHeight;
    elBody.style["height"] = `${height}px`;
    window.setTimeout(() => {
      elBody.classList.remove("collapsing");
      el.classList.remove("faq_item_slidedown");
      elBody.classList.add("collapse");
      el.classList.add("faq_item_show");
      elBody.style["display"] = "";
      elBody.style["height"] = "";
      elBody.style["transition"] = "";
      elBody.style["overflow"] = "";
    }, this._config.duration);
  }

  hide(el) {
    const elBody = el.querySelector(".faq_body");
    if (
      elBody.classList.contains("collapsing") ||
      !el.classList.contains("faq_item_show")
    ) {
      return;
    }
    elBody.style["height"] = `${elBody.offsetHeight}px`;
    elBody.offsetHeight;
    elBody.style["display"] = "block";
    elBody.style["height"] = 0;
    elBody.style["overflow"] = "hidden";
    elBody.style["transition"] = `height ${this._config.duration}ms ease`;
    elBody.classList.remove("collapse");
    el.classList.remove("faq_item_show");
    elBody.classList.add("collapsing");
    window.setTimeout(() => {
      elBody.classList.remove("collapsing");
      elBody.classList.add("collapse");
      elBody.style["display"] = "";
      elBody.style["height"] = "";
      elBody.style["transition"] = "";
      elBody.style["overflow"] = "";
    }, this._config.duration);
  }

  toggle(el) {
    el.classList.contains("faq_item_show") ? this.hide(el) : this.show(el);
  }
}

if ($(".faq_items").length) {
  new ItcAccordion(document.querySelector(".faq_items"), {
    alwaysOpen: false,
  });
}

/*fixed header*/
$(function () {
  let header = $(".header");
  let hederHeight = header.height(); // вычисляем высоту шапки
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0.2) {
      header.addClass("js_fixed");
      $("body").css({
        paddingTop: hederHeight + "px", // делаем отступ у body, равный высоте шапки
      });
    } else {
      header.removeClass("js_fixed");
      $("body").css({
        paddingTop: 0, // удаляю отступ у body, равный высоте шапки
      });
    }
  });
});

$(function () {
  $(".hamburger_menu").click(function () {
    $(this).toggleClass("active"),
      $(this).closest("#header").toggleClass("menu-active"),
      $("#header").hasClass("menu-active")
        ? $(".header_menu_detail").slideDown()
        : $(".header_menu_detail").slideUp();
  });

  $(".hamburger_menu a, .overlay").click(function () {
    $(".header_menu_detail").slideUp();
    $(".overlay").removeClass("show");
    $(".hamburger_menu").removeClass("active");
    $(".header").removeClass("menu-active");
    event.preventDefault();
  });


  //remove redirect link (a)*/
  $("a.hamburger_menu").click(function (event) {
    event.preventDefault();
    var url = $(this).attr("href");
    window.history.replaceState("object or string", "Title", url);
  });
  ///end*/

  $(window).width() < 992 &&
    $(".header_menu_detail_item").each(function () {
      $(this)
        .find(".header_menu_detail_item_title")
        .click(function () {
          $(this).parent().hasClass("active_block")
            ? $(this)
              .parent()
              .removeClass("active_block")
              .find(".header_menu_detail_item_list")
              .slideUp()
            : ($(".header_menu_detail_item")
              .removeClass("active_block")
              .find(".header_menu_detail_item_list")
              .slideUp(),
              $(this)
                .parent(".header_menu_detail_item")
                .addClass("active_block")
                .find(".header_menu_detail_item_list")
                .slideDown());
        });
    });
});

homeRadioButton = document.querySelectorAll(".home-quiz__radio input");
homeRadioWrapper = document.querySelectorAll(
  ".home-quiz__radio .wpcf7-list-item"
);
for (let i = 0; i < homeRadioButton.length; i++) {
  homeRadioWrapper[0].style = "background: #ff8156; color: #ffff";
  homeRadioButton[i].addEventListener("click", function () {
    homeRadioWrapper.forEach(function (e) {
      e.style = "background: #fff; color: #000";
    });
    homeRadioWrapper[i].style = "background: #ff8156; color: #ffff";
  });
}

jQuery(document).ready(function () {
  jQuery(".content_toggle").click(function () {
    jQuery(".catalog_category_description_text").toggleClass(
      "content_block_hide"
    );
    if (
      jQuery(".catalog_category_description_text").hasClass(
        "content_block_hide"
      )
    ) {
      jQuery(".content_toggle").html("Читать далее");
    } else {
      jQuery(".content_toggle").html("Свернуть");
    }
    return false;
  });
});

let includedTabContent = document.querySelectorAll(
  ".included_price_tabs_container_info"
);
let includedTabItem = document.querySelectorAll(
  ".included_price_tabs_container_item"
);
for (let i = 0; i < includedTabItem.length; i++) {
  includedTabItem[i].addEventListener("mouseover", () => {
    includedTabContent.forEach((item) => {
      item.classList.add("included_price_tabs_container_info_hidden");
    });
    includedTabItem.forEach((item) => {
      item.classList.remove("included_price_tabs_container_item_active");
    });
    includedTabContent[i].classList.remove(
      "included_price_tabs_container_info_hidden"
    );
    includedTabItem[i].classList.add(
      "included_price_tabs_container_item_active"
    );
  });
}

window.addEventListener("DOMContentLoaded", () => {
  const resizableSwiper = (
    breakpoint,
    swiperClass,
    swiperSettings,
    callback
  ) => {
    let swiper;

    breakpoint = window.matchMedia(breakpoint);

    const enableSwiper = function (className, settings) {
      swiper = new Swiper(className, settings);

      if (callback) {
        callback(swiper);
      }
    };

    const checker = function () {
      if (breakpoint.matches) {
        return enableSwiper(swiperClass, swiperSettings);
      } else {
        if (swiper !== undefined) swiper.destroy(true, true);
        return;
      }
    };

    breakpoint.addEventListener("change", checker);
    checker();
  };

  const someFunc = (instance) => {
    if (instance) {
      instance.on("slideChange", function (e) {
        console.log("*** mySwiper.activeIndex", instance.activeIndex);
      });
    }
  };

  resizableSwiper(
    "(max-width: 1280px)",
    ".history_house_detail_itog_slider",
    {
      loop: true,
      spaceBetween: 32,
      slidesPerView: 2,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    },
    someFunc
  );
});

$("#acceptance_form").attr("onclick", "return false");

$('body').append('<div class="upbtn"></div>');
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('.upbtn').css({
      right: '-120px',
      bottom: '-120px'
    });
  } else {
    $('.upbtn').css({
      right: '-220px',
      bottom: '-220px'
    });
  }
});
$('.upbtn').on('click', function () {
  $('html, body').animate({
    scrollTop: 0
  }, 500);
  return false;
});






var agreeCheckBox = document.getElementsByClassName("agree");
var iagreeCheckBox;
for (iagreeCheckBox = 0; iagreeCheckBox < agreeCheckBox.length; iagreeCheckBox++) {
  agreeCheckBox[iagreeCheckBox].checked = false;
};


const scrollContainer = document.querySelectorAll(".the_team_of_employees .tabs_head")[0];
// const scrollIndex = 110;
if (scrollContainer) {
  scrollContainer.addEventListener('wheel', scrollingWhel);
}
const scrollContainer2 = document.querySelectorAll(".included_price_tabs_container_list")[0];
// const scrollIndex2 = 110;
if (scrollContainer2) {
  scrollContainer2.addEventListener('wheel', scrollingWhel2);
}

function scrollingWhel(event) {
  event.preventDefault();
  scrollContainer.scrollBy({
    left: event.deltaY * 2,
    behavior: 'smooth'
  });
}
function scrollingWhel2(event) {
  event.preventDefault();
  scrollContainer2.scrollBy({
    left: event.deltaY * 2,
    behavior: 'smooth'
  });
}