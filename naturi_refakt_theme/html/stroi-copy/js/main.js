new WOW().init();

let technologyDifferences = 0;
$('.technology_differences_inner_right li').each(function () {
    $(this).attr('data-wow-delay', ++technologyDifferences * 0.2 + 's');
});
let faqItem = 0;
$('.faq_item').each(function () {
    $(this).attr('data-wow-delay', ++faqItem * 0.1 + 's');
});
let aboutAdvantagesItems = 1.25;
$('.about_advantages_item').each(function () {
    $(this).attr('data-wow-delay', ++aboutAdvantagesItems * 0.25 + 's');
});
let advantagesItem = 1.25;
$('.advantages_item').each(function () {
    $(this).attr('data-wow-delay', ++advantagesItem * 0.25 + 's');
});
let privilegeItem = 0.25;
$('.technology_privilege_item').each(function () {
    $(this).attr('data-wow-delay', ++privilegeItem * 0.25 + 's');
});

let photoGalery = 0;
$('.photo_galery li').each(function () {
    $(this).attr('data-wow-delay', ++photoGalery * 0.15 + 's');
});

let videoGalery = 0;
$('.video_galery_items a').each(function () {
    $(this).attr('data-wow-delay', ++videoGalery * 0.15 + 's');
});

let servicesInnerItem = 0;
$('.services_inner_specifications_item').each(function () {
    $(this).attr('data-wow-delay', ++servicesInnerItem * 0.15 + 's');
});

let servicesInnerDetailStagesItem = 0;
$('.services_inner_detail_stages_item').each(function () {
    $(this).attr('data-wow-delay', ++servicesInnerDetailStagesItem * 0.15 + 's');
});

let reviewsInnerPageItem = 0;
$('.reviews_inner_page_item').each(function () {
    $(this).attr('data-wow-delay', ++reviewsInnerPageItem * 0.15 + 's');
});

document.addEventListener('DOMContentLoaded', () => { // Структура страницы загружена и готова к взаимодействию
    const tabs = (tabsSelector, tabsHeadSelector, tabsBodySelector, tabsCaptionSelector, tabsCaptionActiveClass, tabsContentActiveClass) => { // объявляем основную функцию tabs, которая будет принимать CSS классы и селекторы
        const tabs = document.querySelector(tabsSelector) // ищем на странице элемент по переданному селектору основного элемента вкладок и записываем в константу
        if (tabs !== null) {
            const head = tabs.querySelector(tabsHeadSelector) // ищем в элементе tabs элемент с кнопками по переданному селектору и записываем в константу
            const body = tabs.querySelector(tabsBodySelector) // ищем в элементе tabs элемент с контентом по переданному селектору и записываем в константу
            const getActiveTabName = () => { // функция для получения названия активной вкладки
                return head.querySelector(`.${tabsCaptionActiveClass}`).dataset.tab // возвращаем значение data-tab активной кнопки
            }
            const setActiveContent = () => { // функция для установки активного элемента контента
                if (body.querySelector(`.${tabsContentActiveClass}`)) { // если уже есть активный элемент контента
                    body.querySelector(`.${tabsContentActiveClass}`).classList.remove(tabsContentActiveClass) // то скрываем его
                }
                body.querySelector(`[data-tab=${getActiveTabName()}]`).classList.add(tabsContentActiveClass) // затем ищем элемент контента, у которого значение data-tab совпадает со значением data-tab активной кнопки и отображаем его
            }
            // проверяем при загрузке страницы, есть ли активная вкладка
            if (!head.querySelector(`.${tabsCaptionActiveClass}`)) { // если активной вкладки нет
                head.querySelector(tabsCaptionSelector).classList.add(tabsCaptionActiveClass) // то делаем активной по-умолчанию первую вкладку
            }
            setActiveContent(getActiveTabName()) // устанавливаем активный элемент контента в соответствии с активной кнопкой при загрузке страницы
            head.addEventListener('click', e => { // при клике на элемент с кнопками
                const caption = e.target.closest(tabsCaptionSelector) // узнаем, был ли клик на кнопке
                if (!caption) return // если клик был не на кнопке, то прерываем выполнение функции
                if (caption.classList.contains(tabsCaptionActiveClass)) return // если клик был на активной кнопке, то тоже прерываем выполнение функции и ничего не делаем

                if (head.querySelector(`.${tabsCaptionActiveClass}`)) { // если уже есть активная кнопка
                    head.querySelector(`.${tabsCaptionActiveClass}`).classList.remove(tabsCaptionActiveClass) // то удаляем ей активный класс
                }
                caption.classList.add(tabsCaptionActiveClass) // затем добавляем активный класс кнопке, на которой был клик
                setActiveContent(getActiveTabName()) // устанавливаем активный элемент контента в соответствии с активной кнопкой
            })
        }
    }
    tabs('.the_team_of_employees_inner', '.tabs_head', '.tabs_body', '.tabs_caption', 'tabs_caption_active', 'tabs_content_active') // вызываем основную функцию tabs для синих вкладок .section__tabs
});

var swiper = new Swiper(".reviews_slider", {
    pagination: {
        el: ".reviews_slider_pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
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
    freeMode: false
});

var thicknessBottom = new Swiper(".thickness_bottom", {
    spaceBetween: 0,
    slidesPerView: 1,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        600: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        767: {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: !0
        }
    },
    thumbs: {
        swiper: thicknessTop,
    },
});

var technologyHistoryBottom = new Swiper(".technology_history_bottom", {
    spaceBetween: 0,
    slidesPerView: 4,
    loop: false,
    freeMode: false
});

var technologyHistoryTop = new Swiper(".technology_history_top", {
    spaceBetween: 30,
    slidesPerView: 1,
    loop: false,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        600: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        767: {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: !0
        }
    },
    thumbs: {
        swiper: technologyHistoryBottom,
    },
    navigation: {
        nextEl: ".technology_history_bottom_next",
        prevEl: ".technology_history_bottom_prev",
    },
});

var swiper = new Swiper(".product_slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: ".product_slider_photo_navigation_next",
        prevEl: ".product_slider_photo_navigation_prev",
    },
});

var swiper = new Swiper(".services_inner_slider", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: ".services_inner_slider_navigation_next",
        prevEl: ".services_inner_slider_navigation_prev",
    },
    pagination: {
        el: ".services_inner_slider_pagination_inner",
        type: 'fraction'
    },
});

Fancybox.bind("[data-fancybox]", {});

class ItcAccordion {
    constructor(target, config) {
        this._el = typeof target === 'string' ? document.querySelector(target) : target;
        const defaultConfig = {
            alwaysOpen: true,
            duration: 350
        };
        this._config = Object.assign(defaultConfig, config);
        this.addEventListener();
    }

    addEventListener() {
        this._el.addEventListener('click', (e) => {
            const elHeader = e.target.closest('.faq_header');
            if (!elHeader) {
                return;
            }
            if (!this._config.alwaysOpen) {
                const elOpenItem = this._el.querySelector('.faq_item_show');
                if (elOpenItem) {
                    elOpenItem !== elHeader.parentElement ? this.toggle(elOpenItem) : null;
                }
            }
            this.toggle(elHeader.parentElement);
        });
    }

    show(el) {
        const elBody = el.querySelector('.faq_body');
        if (elBody.classList.contains('collapsing') || el.classList.contains('faq_item_show')) {
            return;
        }
        elBody.style['display'] = 'block';
        const height = elBody.offsetHeight;
        elBody.style['height'] = 0;
        elBody.style['overflow'] = 'hidden';
        elBody.style['transition'] = `height ${this._config.duration}ms ease`;
        elBody.classList.add('collapsing');
        el.classList.add('faq_item_slidedown');
        elBody.offsetHeight;
        elBody.style['height'] = `${height}px`;
        window.setTimeout(() => {
            elBody.classList.remove('collapsing');
            el.classList.remove('faq_item_slidedown');
            elBody.classList.add('collapse');
            el.classList.add('faq_item_show');
            elBody.style['display'] = '';
            elBody.style['height'] = '';
            elBody.style['transition'] = '';
            elBody.style['overflow'] = '';
        }, this._config.duration);
    }

    hide(el) {
        const elBody = el.querySelector('.faq_body');
        if (elBody.classList.contains('collapsing') || !el.classList.contains('faq_item_show')) {
            return;
        }
        elBody.style['height'] = `${elBody.offsetHeight}px`;
        elBody.offsetHeight;
        elBody.style['display'] = 'block';
        elBody.style['height'] = 0;
        elBody.style['overflow'] = 'hidden';
        elBody.style['transition'] = `height ${this._config.duration}ms ease`;
        elBody.classList.remove('collapse');
        el.classList.remove('faq_item_show');
        elBody.classList.add('collapsing');
        window.setTimeout(() => {
            elBody.classList.remove('collapsing');
            elBody.classList.add('collapse');
            elBody.style['display'] = '';
            elBody.style['height'] = '';
            elBody.style['transition'] = '';
            elBody.style['overflow'] = '';
        }, this._config.duration);
    }

    toggle(el) {
        el.classList.contains('faq_item_show') ? this.hide(el) : this.show(el);
    }
}

new ItcAccordion(document.querySelector('.faq_items'), {
    alwaysOpen: false
});


/*fixed header*/
$(function () {
    let header = $('.header');
    let hederHeight = header.height(); // вычисляем высоту шапки
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0.2) {
            header.addClass('js_fixed');
            $('body').css({
                'paddingTop': hederHeight + 'px' // делаем отступ у body, равный высоте шапки
            });
        } else {
            header.removeClass('js_fixed');
            $('body').css({
                'paddingTop': 0 // удаляю отступ у body, равный высоте шапки
            })
        }
    });
});



$(function () {
    $(".hamburger_menu").click(function () {
        $(this).toggleClass("active"), $(this).closest("#header").toggleClass("menu-active"), $("#header").hasClass("menu-active") ? $(".header_menu_detail").slideDown() : $(".header_menu_detail").slideUp();
    });

    $('.hamburger_menu a,.overlay').click(function () {
        $('.header_menu_detail').slideUp();
        $('.overlay').removeClass('show');
        $('.hamburger_menu').removeClass('active');
        $('.header').removeClass('menu-active');
        event.preventDefault();
    });

    //remove redirect link (a)*/
    $('a.hamburger_menu').click(function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        window.history.replaceState("object or string", "Title", url); 
    });
    ///end*/

    $(window).width() < 992 &&
        $(".header_menu_detail_item").each(function () {
            $(this)
                .find(".header_menu_detail_item_title")
                .click(function () {
                    $(this).parent().hasClass("active_block")
                        ? $(this).parent().removeClass("active_block").find(".header_menu_detail_item_list").slideUp()
                        : ($(".header_menu_detail_item").removeClass("active_block").find(".header_menu_detail_item_list").slideUp(), $(this).parent(".header_menu_detail_item").addClass("active_block").find(".header_menu_detail_item_list").slideDown());
                });
        });
});



homeRadioButton = document.querySelectorAll('.home-quiz__radio input');
homeRadioWrapper = document.querySelectorAll('.home-quiz__radio .wpcf7-list-item');
for (let i = 0; i < homeRadioButton.length; i++) {
    homeRadioWrapper[0].style = 'background: #ff8156; color: #ffff';
    homeRadioButton[i].addEventListener("click", function () {
        homeRadioWrapper.forEach(function (e) {
            e.style = 'background: #fff; color: #000';
        });
        homeRadioWrapper[i].style = 'background: #ff8156; color: #ffff';
    });
}



jQuery(document).ready(function(){
	jQuery('.content_toggle').click(function(){
		jQuery('.catalog_category_description_text').toggleClass('content_block_hide');	
		if (jQuery('.catalog_category_description_text').hasClass('content_block_hide')) {
			jQuery('.content_toggle').html('Читать далее');
		} else {
			jQuery('.content_toggle').html('Свернуть');
		}		
		return false;
	});				
});
