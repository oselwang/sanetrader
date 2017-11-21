<div class="popup" data-popup="popup-1">
    <div class="popup-inner">
        <h2>Log in</h2>
        <ul class="alert alert-danger hidden" id="error-message-login">

        </ul>
        <form action="{{url('login')}}" method="post" id="login-form">
            {{csrf_field()}}
            <label><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <br/>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br/><br/>
            <button type="submit" id="submit">Login</button>
            <!--<input type="checkbox" checked="checked"> Remember me -->
            <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#login-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data: $(this).serializeArray(),
                Accept: 'application/json', // ini harus selalu ada setiap pemanggilan ajax
                success: function (data) {
                    window.location = 'http://sanetrader.dev'; //ini nanti diganti sesuai url setelah login
                },
                error: function (error) {
                    var errors = $.parseJSON(error.responseText);
                    $('#error-message-login').removeClass('hidden').empty();
                    $.each(errors, function (index, value) {
                        $('#error-message-login').append('<li style="">' + value + '</li>');
                    });
                }
            });
        });
    });
</script>