    <div class="callback_form buy_one_click_form notactive">
        <form action="" id="buy_one_click_form">
            <p class="form_name">Купить в один клик</p>

            <input type="hidden" name="product_id" value="">

            <label for="">
                <span>Ваше имя*</span>
                <input type="text" name="name" placeholder="Напишите Ваше имя">
            </label>

            <label for="">
                <span>Ваш контактный телефон*</span>
                <input type="text" id="phone" name="phone" placeholder="Введите Ваш номер">
            </label>

            <!-- <label for="">
                <span>Ваш контактный e-mail*</span>
                <input type="text" name="email" placeholder="Введите Вашу почту">
            </label>

            <label for="">
                <span>Ваш город*</span>
                <input type="text" name="city" placeholder="Введите Вашу город">
            </label> -->

            <label for="">
                <span>Ваш комментарий к заказу</span>
                <textarea name="comment" id="" placeholder="Введите Ваш комментарий к заказу"></textarea>
            </label>

            <button type="submit" id="buy_one_click_form_submit">КУПИТЬ В ОДИН КЛИК</button>
            <p class="form_comment">* - обязательно для заполнения</p>

            <div class="close"></div>
        </form>
    </div>


@push('script')
<script>

    function postBuyOneClickAjax(data) {
        $.ajax({
            url: '/buy-one-click',
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( data, textStatus, jQxhr ){
                console.log('success!');
                $("#buy_one_click_form :input").val('');
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

        $('#buy_one_click_form_submit').on('click', function(){
            debugger;
            $form.submit();
        });

        var $form = $('#buy_one_click_form');
        var $inputName = $form.find('input[name="name"]');
        var $inputPhone = $form.find('input[name="phone"]');
        var $inputEmail = $form.find('input[name="email"]');
        var $inputCity = $form.find('input[name="city"]');
        var $inputComment = $form.find('textarea[name="comment"]');
        
        $form.on('submit', function(e) {

            e.preventDefault();

            var formIsValid = true;

            $("#buy_one_click_form :input").removeAttr('style');

            var data = {
                name: $inputName.val(),
                phone: $inputPhone.val(),
                email: 'email@email',
                city: 'city',
                product_id: $('input[name="product_id"]').val(),
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

            //  if (!data.email) {
            //     formIsValid = false;
            //     makeInputRed($inputEmail);
            //  } else {
            //      if (!validateEmail(data.email)) {
            //       formIsValid = false;
            //          makeInputRed($inputEmail);
            //      }
            //  }

            //  if (!data.city) {
            //      formIsValid = false;
            //      makeInputRed($inputCity);
            // }

            if (!formIsValid) {
                return false;
            }

            data["_token"] = "{{ csrf_token() }}";

            postBuyOneClickAjax(data);

        });

    });



</script>
@endpush
