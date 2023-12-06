$(function () {

    var ajaxResponseBaseTime = 3;
    var ajaxResponseRequestError = "<div class='message error icon-warning'>Desculpe mas não foi possível processar sua requisição...</div>";


        //DATA SET

        $("[data-post]").click(function (e) {
            e.preventDefault();
    
            var clicked = $(this);
            var data = clicked.data();
            var load = $(".ajax_load");
    
            if (data.confirm) {
                var deleteConfirm = confirm(data.confirm);
                if (!deleteConfirm) {
                    return;
                }
            }
    
            $.ajax({
                url: data.post,
                type: "POST",
                data: data,
                dataType: "json",
                beforeSend: function () {
                    load.fadeIn(200).css("display", "flex");
                },
                success: function (response) {
                    //redirect
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        load.fadeOut(200);
                    }
    
                    //reload
                    if (response.reload) {
                        window.location.reload();
                    } else {
                        load.fadeOut(200);
                    }
    
                    //message
                    if (response.message) {
                        ajaxMessage(response.message, ajaxResponseBaseTime);
                    }
                },
                error: function () {
                    ajaxMessage(ajaxResponseRequestError, 5);
                    load.fadeOut();
                }
            });
        });


        $("form:not('.ajax_off')").submit(function (e) {
            e.preventDefault();
    
            var form = $(this);
            var load = $(".ajax_load");
    
            if (typeof tinyMCE !== 'undefined') {
                tinyMCE.triggerSave();
            }
    
            form.ajaxSubmit({
                url: form.attr("action"),
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    load.fadeIn(200).css("display", "flex");
                },
                uploadProgress: function (event, position, total, completed) {
                    var loaded = completed;
                    var load_title = $(".ajax_load_box_title");
                    load_title.text("Enviando (" + loaded + "%)");
    
                    if (completed >= 100) {
                        load_title.text("Aguarde, carregando...");
                    }
                },
                success: function (response) {
                    //redirect
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        form.find("input[type='file']").val(null);
                        load.fadeOut(200);
                    }
    
                    //reload
                    if (response.reload) {
                        window.location.reload();
                    } else {
                        load.fadeOut(200);
                    }
    
                    //message
                    if (response.message) {
                        ajaxMessage(response.message, ajaxResponseBaseTime);
                    }
    
    
                },
                complete: function () {
                    if (form.data("reset") === true) {
                        form.trigger("reset");
                    }
                },
                error: function () {
                    ajaxMessage(ajaxResponseRequestError, 5);
                    load.fadeOut();
                }
            });
        });
 

    function ajaxMessage(message, time) {
        var ajaxMessage = $(message);
    
        ajaxMessage.append("<div class='message_time'></div>");
        ajaxMessage.find(".message_time").animate({"width": "100%"}, time * 1000, function () {
            $(this).parents(".message").fadeOut(200);
        });

        $(".ajax_response").append(ajaxMessage);
        ajaxMessage.effect("bounce");
     }
    
    // AJAX RESPONSE MONITOR
    
    $(".ajax_response .message").each(function (e, m) {
        ajaxMessage(m, ajaxResponseBaseTime += 1);
    });
    
    // AJAX MESSAGE CLOSE ON CLICK
    
    $(".ajax_response").on("click", ".message", function (e) {
        $(this).effect("bounce").fadeOut(1);
    });

});