$(function () {

    Base = $('link[rel="base"]').attr('href');
    //alert(Base);

    $('html').on('submit', 'form[name="sendFormPdt"]', function (e) {
        e.preventDefault();

        $(this).ajaxSubmit({
            url: Base+'/controller.ajax.php',
            data: {},
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $(".main_single_pdt_frete_form").find(".load").fadeIn(400);
                $('.frete_result').fadeOut(400, function(){
                    $(this).find('.information_frete_opt').remove();
                });                
            },
            success: function (data) {

                if(data.notify){
                    trigger(data.notify);
                }

                if (data.success) {
                    $(".information_frete").fadeIn(400);
                    $('.frete_result').append(data.success).fadeIn(400);
                }

                $(".main_single_pdt_frete_form").find(".load").fadeOut(400);
            }
        });

        return false;
    });

    $('html').on('submit', 'form[name="sendForm"]', function (e) {
        e.preventDefault();

        var valor = $('.price_value').attr('data-price');
        console.log(valor);
        $(this).ajaxSubmit({
            url: Base+'/controller.ajax.php',
            data: {preco: valor},
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $(".main_single_pdt_frete_form").find(".load").fadeIn(400);
                $('.frete_result').fadeOut(400, function(){
                    $(this).find('.information_frete_opt').remove();
                });                
            },
            success: function (data) {

                if(data.notify){
                    trigger(data.notify);
                }

                if (data.success) {
                    $(".information_frete").fadeIn(400);
                    $('.frete_result').append(data.success).fadeIn(400);
                }

                $(".main_single_pdt_frete_form").find(".load").fadeOut(400);
            }
        });

        return false;
    });

    
    function trigger(data) {
        if(data[0]){
            $.each(data, function(key, value){
                triggerNotify(data[key]);
            })
        } else {
            triggerNotify(data);
        }
    }

    function triggerNotify(data) {

        var triggerContent = "<div class='trigger_notify trigger_notify_" + data.color + "' style='left: 100%; opacity: 0;'>";
        triggerContent += "<p class='trigger_content'><span  class='icon " + data.icon + "'></span>" + data.title + "</p>";
        triggerContent += "<span class='trigger_notify_timer'></span>";
        triggerContent += "</div>";

        if(!$('.trigger_notify_box').length){
            $('body').prepend("<div class='trigger_notify_box'></div>");
        }

        $('.trigger_notify_box').prepend(triggerContent);
        $('.trigger_notify').stop().animate({'left': '0', 'opacity': '1'}, 200, function(){
            $(this).find('.trigger_notify_timer').animate({'width': '100%'}, data.timer, 'linear', function(){
                $(this).parent('.trigger_notify').animate({'left': '100%', 'opacity': '0'}, function(){
                    $(this).remove();
                });
            });
        });

        $('body').on('click', '.trigger_notify', function(){
            $(this).animate({'left': '100%', 'opacity': '0'}, function(){
                $(this).remove();
            });
        });
    }
});