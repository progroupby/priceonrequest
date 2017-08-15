<div id="priceonrequest">
    <div id="por-header">Отправка запроса цены <i></i></div>
    <form id="form_priceonrequest" name="contact" action="#" method="post">
        <label for="data[name]">Ваше имя *</label><br>
        <input type="text" id="name" name="data[name]"><br>
        <label for="data[email]">Ваш E-mail *</label><br>
        <input type="text" id="email" name="data[email]"><br>
        <label for="data[phone]">Ваш телефон</label><br>
        <input type="text" id="phone" name="data[phone]"><br>
        <label for="data[message]">Комментарий</label><br>
        <textarea id="message" name="data[message]" class="textarea"></textarea>
        <button id="form_priceonrequest_send">Отправить</button>
        <input type="hidden" name="data[pid]" id="por-pid">
        <input type="hidden" name="data[pname]" id="por-pname">
    </form>
    <div id="priceonrequest_alert"><p><strong>Ваш запрос отправлен!</strong></p></div>
</div>
