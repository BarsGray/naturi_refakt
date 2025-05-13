
if ($('#filters').length > 0 && typeof filter_values != "undefined") {


    $("#price_field").slider({
        min: filter_values['price']['min'],
        max: filter_values['price']['max'],
        values: [filter_values['price']['min'],filter_values['price']['max']],
        range: true,
        stop: function(event, ui) {
            filter_values['price']['min'] = $("#price_field").slider("values", 0);
            filter_values['price']['max'] = $("#price_field").slider("values", 1);
            $("input#minCost").val($("#price_field").slider("values",0));
            $("input#maxCost").val($("#price_field").slider("values",1));
        },
        slide: function(event, ui){
            $("input#minCost").val($("#price_field").slider("values",0));
            $("input#maxCost").val($("#price_field").slider("values",1));
        }
    });


    $("#area_filter").slider({
        min: filter_values['area']['min'],
        max: filter_values['area']['max'],
        values: [filter_values['area']['min'],filter_values['area']['max']],
        range: true,
        stop: function(event, ui) {
            filter_values['area']['min'] = $("#area_filter").slider("values", 0);
            filter_values['area']['max'] = $("#area_filter").slider("values", 1);
            $("input#minCost2").val($("#area_filter").slider("values",0));
            $("input#maxCost2").val($("#area_filter").slider("values",1));
        },
        slide: function(event, ui){
            $("input#minCost2").val($("#area_filter").slider("values",0));
            $("input#maxCost2").val($("#area_filter").slider("values",1));
        }
    });
    $("#terrace_filter").slider({
        min: filter_values['terrace']['min'],
        max: filter_values['terrace']['max'],
        values: [filter_values['terrace']['min'],filter_values['terrace']['max']],
        range: true,
        stop: function(event, ui) {
            filter_values['terrace']['min'] = $("#terrace_filter").slider("values", 0);
            filter_values['terrace']['max'] = $("#terrace_filter").slider("values", 1);
            $("input#minCost3").val($("#terrace_filter").slider("values",0));
            $("input#maxCost3").val($("#terrace_filter").slider("values",1));
        },
        slide: function(event, ui){
            $("input#minCost3").val($("#terrace_filter").slider("values",0));
            $("input#maxCost3").val($("#terrace_filter").slider("values",1));
        }
    });

    $("#floor_filter").change(function() {
        filter_values['floor'] = $(this).find('option:selected').val();
    });

    $("#bedroom_filter").change(function() {
        filter_values['bedroom'] = $(this).find('option:selected').val();
    });



    // Сортировка по параметрам
    $(".catalog-sortirovka__link").click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
            if ($(this).data('order') == 'ASC') {
                $(this).data('order', 'DESC');
            } else {
                $(this).data('order', 'ASC');
            }
        } else {
            $(".catalog-sortirovka__link").data('order', 'DESC').removeClass('active');
            $(this).addClass('active');
        }

        filter_values['sort_by'] = $(this).data('sort');
        filter_values['order_by'] = $(this).data('order');

        update_projects_list();
    });

    // Открыть закрыть фильтр
    $(".catalog-filters-bottom__left > .filter-link-one, .catalog-filters-bottom__left > .filter-link-close").click(function(e){
        e.preventDefault();
        $(this).closest(".catalog-filters").toggleClass("filter-rash-active");
    });

    // Сброс фильтра
    $(".filter-reset-btn").click(function(){

        filter_active = clone_object(filter_default);
        filter_values = clone_object(filter_default);

        console_event('Сброс фильтра');

        /*
        $("#price_field").slider({
            values: [filter_default['price']['min'], filter_default['price']['max']]
        });
        $("#area_filter").slider({
            values: [filter_default['area']['min'], filter_default['area']['max']]
        });
        $("#terrace_filter").slider({
            values: [filter_default['terrace']['min'], filter_default['terrace']['max']]
        });

        $("#floor_filter").val('').trigger('refresh');

        $("#bedroom_filter").val('').trigger('refresh');
        */

        update_projects_list();

    });

    $('#true_loadmore_projects').click(function(){
        $(this).find('.all-more__text').text('Загружаю...');
        var data = {
            'action': action,
            'query': true_posts,
            'page' : current_page,
            'filter': filter_active
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success: function (data) {
                load_more_projects(data)
            }
        });
    });

    // Применение фильтра
    $('.filter-link-three').click(function(){
        update_projects_list();
    });

    var filter_default = clone_object(filter_values);
    var filter_active = clone_object(filter_values);

}



function console_event(str) {
    if (typeof str !== 'undefined') {
        console.log(str, ' - console_event');
    }
    console.log('Значения фильтра', filter_values);
    console.log('Стандартные значения', filter_default);
    console.log('Актуальные значения', filter_active);
}

function clone_object(obj) {
    return JSON.parse(JSON.stringify(obj));
}

function load_more_projects(data) {
    if( data ) {
        $('#true_loadmore_projects').text('Загрузить ещё');
        $('#load_list').append(data);
        current_page++;
        //if (current_page == max_pages) $("#true_loadmore_projects").remove();
    } else {
        //$('#true_loadmore_projects').remove();
    }
}

function update_projects_list() {
    filter_active = clone_object(filter_values);

    console_event('Загрузка');

    $(this).text('Загружаю...');
    var data = {
        'action': action,
        'query': true_posts,
        'page' : 0,
        'filter': filter_active
    };
    $.ajax({
        url:ajaxurl,
        data:data,
        type:'POST',
        success: function (data) {
            $('#load_list').empty();
            load_more_projects(data)
        }
    });
}
