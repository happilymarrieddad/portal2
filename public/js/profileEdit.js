// Profile edit
$(function() {

    var ui = {};
    var input = {};


    listen('bind', function() {

        ui.submit = $('#button-submit');

        input.email = $('#email');
        input.fname = $('#first_name');
        input.flast = $('#last_name');
        input.address1 = $('#address1');
        input.address2 = $('#address2');
        input.aptsuite = $('#apt_suite');
        input.city = $('#city');
        input.state = $('#state');
        input.country = $('#country');
        input.zip = $('#zip');

        ui.submit.bind('click', function(e) {
            e.preventDefault();
            function callback(res) {
                if(!res[0]) tell('alert.error', res[1]);
                else tell('alert.success', res[1]);
            }

            var map = {
                a : input.email.val(),
                b : input.fname.val(),
                c : input.flast.val(),
                d : input.address1.val(),
                e : input.address2.val(),
                f : input.aptsuite.val(),
                g : input.city.val(),
                h : input.state.val(),
                i : $('#country option:selected').val(),
                j : input.zip.val()
            };

            tell('server.post', ['/profile/update', map, callback]);

        });

    });

});