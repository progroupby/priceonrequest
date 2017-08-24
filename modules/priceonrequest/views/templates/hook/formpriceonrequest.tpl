<div id="priceonrequest">
    <div class="row">
    <div id="por-header">{l s="Request a price for the " mod='priceonrequest'}<i></i></div>
    <form id="form_priceonrequest" name="contact" action="#" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="data[name]" class="col-sm-4 control-label">{l s="Your name *" mod='priceonrequest'}</label>
            <div class="col-sm-8">
                <input type="text" id="name" name="data[name]" placeholder="Jon Smith">
            </div>
        </div>
        <div class="form-group">
            <label for="data[email]" class="col-sm-4 control-label">{l s="Your email *" mod='priceonrequest'}</label>
            <div class="col-sm-8">
                <input type="text" id="email" name="data[email]" placeholder="jonsmith@gmail.com">
            </div>
        </div>
        <div class="form-group">
            <label for="data[phone]" class="col-sm-4 control-label">{l s="Your phone" mod='priceonrequest'} </label>
            <div class="col-sm-8">
                <input type="text" id="phone" name="data[phone]" placeholder="+12345678">
            </div>
        </div>
        <div class="form-group">
            <label for="data[message]" class="col-sm-4 control-label">{l s="Your comment" mod='priceonrequest'}</label>
            <div class="col-sm-8">
                <textarea id="message" name="data[message]" class="textarea"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 text-center">
            <button id="form_priceonrequest_send" class="btn btn-default">{l s="Send" mod='priceonrequest'}</button>
            </div>
        </div>
        <input type="hidden" name="data[pid]" id="por-pid">
        <input type="hidden" name="data[pname]" id="por-pname">
    </form>
    <div id="priceonrequest_alert"><p><strong>{l s="Your request has been sent!" mod='priceonrequest'}</strong></p></div>
    </div>
</div>
