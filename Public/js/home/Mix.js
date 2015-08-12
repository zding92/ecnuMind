$(function () {
	
    $('#L3 :input').each(function () {
        var self = $(this),
        label = self.next(),
        label_text = label.text();
        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
    
    $(function () {
        $('#L3 :input').each(function () {
            $(this).parent().addClass($(this).attr('data-cat'));
            $(this).parent().attr('data-cat', $(this).attr('data-cat'));
            $(this).parent().css('display', 'inline-block');
        })
    })
    
        var filterList = {
        init: function () {
            // MixItUp plugin
            $('#L2').mixitup({
                targetSelector: '.tags_1',
                filterSelector: '#L1 .filter',
                effects: ['fade'],
                easing: 'snap'
            });
        }
    }.init();

    var filterList2 = {
        init: function () {
            // MixItUp plugin
            $('#L3').mixitup({
                targetSelector: '.icheckbox_line-blue',
                filterSelector: '#L2 .filter',
                effects: ['fade'],
                easing: 'snap'
            });
        }
    }.init();

    var filters = "";
    $('.tags').click(function () {
        if ($(this).attr('id') == "L1_all") {
            $("#L1_all ~ div").removeClass('active');
            $(this).addClass('active');
            filters = "all";
        } else {
            filters = filters.replace(/all/, "");
            $("#L1_all").removeClass('active');
            $(this).toggleClass('active');
            filters = $(this).hasClass('active') ? (filters + " " + $(this).attr('id')) : filters.replace(eval("/" + $(this).attr('id') + " */"), "");
        }
        $("#index").attr('data-filter', filters);
        setTimeout('$("#index").click()', 500);
    })

    var filters_2 = "";
    $('.tags_1').click(function () {
        if ($(this).attr('id') == "L2_all") {
            $("#L2_all ~ div").removeClass('active');
            $(this).addClass('active');
            filters_2 = "all";
        } else {
            filters_2 = filters_2.replace(/all/, "");
            $("#L2_all").removeClass('active');
            $(this).toggleClass('active');
            filters_2 = $(this).hasClass('active') ? (filters_2 + " " + $(this).attr('id')) : filters_2.replace(eval("/" + $(this).attr('id') + " */"), "");
        }
        $("#index2").attr('data-filter', filters_2);
        setTimeout('$("#index2").click()', 500);
    })

    var index = 1;
    var last = 1;
    $(function () {
        $('.tags_1').each(function () {
            if ($(this).attr('id') !== "L2_all") {
                if ($(this).attr('data-cat')[3] == last.toString()) {
                    $(this).attr('id', $(this).attr('data-cat') + '_' + index);
                    index++;
                } else {
                    last++;
                    index = 1;
                    $(this).attr('id', $(this).attr('data-cat') + '_' + index);
                }
            }
        })
    });
    
})();