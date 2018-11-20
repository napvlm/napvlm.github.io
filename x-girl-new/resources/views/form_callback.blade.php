<div class="callback_form callback_only_form notactive">
    <form action="" method="post" id="callback_form">
        <p class="form_name">Обратная связь</p>

        <label for="">
            <span>Ваше имя*</span>
            <input type="text" name="name" placeholder="Напишите Ваше имя">
        </label>

        <label for="">
            <span>Ваш контактный телефон*</span>
            <input type="text" id="phone" name="phone" placeholder="Введите Ваш номер">
        </label>

        <label for="">
            <span>Ваш контактный e-mail</span>
            <input type="text" name="email" placeholder="Введите Вашу почту">
        </label>

        <label for="">
            <span>Ваш комментарий</span>
            <textarea name="comment" placeholder="Введите Ваш комментарий"></textarea>
        </label>

        <button type="submit" id="callback_form_submit">ОТПРАВИТЬ</button>
        <p class="form_comment">* - обязательно для заполнения</p>

        <div class="close"></div>
    </form>
</div>


@push('script')
<script>

    function postCallbackAjax(data) {

        $.ajax({
            url: '/callback',
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( data, textStatus, jQxhr ){
                console.log('success!');
                $("#callback_form :input").val('');
                closeForm();
                alert('Добавлено!');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.error( errorThrown );
            }
        });
    }

    $(function(){

        $("#phone").mask("(999) 999-99-99");

        $('#callback_form_submit').on('click', function(){
            $form.submit();
        });

        var $form = $('#callback_form');
        var $inputName = $form.find('input[name="name"]');
        var $inputPhone = $form.find('input[name="phone"]');
        var $inputEmail = $form.find('input[name="email"]');
        var $inputComment = $form.find('textarea[name="comment"]');

        $form.on('submit', function(e) {

            e.preventDefault();

            var formIsValid = true;

            $("#callback_form :input").removeAttr('style');

            var data = {
                name: $inputName.val(),
                phone: $inputPhone.val(),
                email: $inputEmail.val(),
                comment: $inputComment.val(),
            }

            if (!data.name) {
                formIsValid = false;
                makeInputRed($inputName);
            }

            if (!data.phone) {
                formIsValid = false;
                makeInputRed($inputPhone);
            }

            if (!data.email) {
                formIsValid = false;
                makeInputRed($inputEmail);
            } else {
                if (!validateEmail(data.email)) {
                    formIsValid = false;
                    makeInputRed($inputEmail);
                }
            }

            if (!formIsValid) {
                return false;
            }

            data["_token"] = "{{ csrf_token() }}";

            postCallbackAjax(data);

        });

    });



</script>
@endpush
