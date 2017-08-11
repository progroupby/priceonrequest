$(document).ready(function(){
    $(".price_on_request_button").fancybox();
    $("#form_priceonrequest").submit(function(){ return false; });
    $("#form_priceonrequest_send").on("click", function(){
        // тут дальнейшие действия по обработке формы
        // закрываем окно, как правило делать это нужно после обработки данных
        $("#form_priceonrequest").fadeOut("fast", function(){
            $(this).before("<p><strong>Ваше сообщение отправлено!</strong></p>");
            setTimeout("$.fancybox.close()", 1500);
        });
    });
});
