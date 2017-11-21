<div class="popup" data-popup="popup-2">
    <div class="popup-inner">
        <h2>Sign Up</h2>
        <form action="{{url('register')}}" method="post" id="register-form">
            <ul class="alert alert-danger hidden" id="error-message-register">

            </ul>
            <label><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="name" required>
            <br/>
            <label><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <br/>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br/>
            <label><b>Confirm Password</b></label>
            <input type="password" placeholder="Enter Password Confirmation" name="password_confirmation" required>
            <br/><br/>
            <button type="submit">Register</button>
        </form>
        <!--<input type="checkbox" checked="checked"> Remember me -->
        <a class="popup-close" data-popup-close="popup-2" href="#">x</a>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#register-form').on('submit', function (e) {
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
                    $('#error-message-register').removeClass('hidden').empty();
                    $.each(errors, function (index, value) {
                        $('#error-message-register').append('<li style="">' + value + '</li>');
                    });
                }
            });
        });
    });
</script>