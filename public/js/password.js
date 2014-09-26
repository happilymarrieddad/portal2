// Change password functions
$(function() {

    listen('bind', function() {

        $('#change-password').bind('click', function(e) {
            e.preventDefault();
            if($('#new_password').val() != $('#confirm_password').val()) tell('alert.error', 'The new password doesn\'t match the confirm password.');
            else
            {
                function callback(res) {
                    $('#old_password').val('');
                    $('#new_password').val('');
                    $('#confirm_password').val('');
                    if(res[0]) tell('alert.success', res[1]);
                    else tell('alert.error', res[1]);
                }

                tell('server.post', ['/profile/passUpdate',{a:$('#old_password').val(), b:$('#new_password').val()},callback]);
            }
        });

    });

});