$(document).ready(function(){
    $(".price_on_request_button").fancybox({
            helpers:  {
            title:  null
        },
        beforeLoad: function() {
            name = $(this.element).attr('data-name');
            id = $(this.element).attr('data-id');
            $("#por-header i").text(name);
            $("#form_priceonrequest #por-pid").val(id);
            $("#form_priceonrequest #por-pname").val(name);
            debugger;
        }
    });
    $("#form_priceonrequest").submit(function(){ return false; });
    $("#form_priceonrequest_send").on("click", function(){
        $.ajax({
            type: 'POST',
            url: baseDir + 'modules/priceonrequest/sendrequest.php',
            data: 'send=request&'+ $('#form_priceonrequest').serialize(),
            dataType: 'json',
            success: function(json) {
                debugger;
            }
        });

        $("#form_priceonrequest").fadeOut("fast", function(){
            $("#priceonrequest_alert").show();
            setTimeout('$.fancybox.close()', 1500);
            setTimeout('$("#priceonrequest_alert").hide()', 2000);
            setTimeout('$("#form_priceonrequest").show()', 2000);
        });
    });
});
