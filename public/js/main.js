/* Javascript for Survey Program */
if (!String.prototype.fill) {
    String.prototype.fill = function () {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function (match, number) {
            return typeof args[number] != 'undefined'
                ? args[number] : match;
        });
    };
}

// Listen/Tell System
(function ($) {
    var que = {}, debug = true; //(location.hash == '#debug');

    function log() {
        if (!debug) return;
        if (console && console.log) console.log(arguments);
    }

    function tell(e, p) {
        p = p || null;
        if (!que.hasOwnProperty(e)) return log(e, 'nothing listening');
        $.each(que[e], function (i, o) {
            var v = o(p) || null;
            log('event', e, 'with', p, '=> ' + v);
        });
        return true;
    }

    function listen(e, obj) {
        if (typeof e == 'object') {
            $.each(e, function (i, ev) {
                listen(ev, obj);
            });
        } else if (typeof e == 'string') {
            if (!que.hasOwnProperty(e)) que[e] = [];
            que[e].push(obj);
        } else {
            log('Que Reject', e);
        }
    }

    // Export to global
    window.tell = tell;
    window.listen = listen;
    window.debug = debug;

    if (debug) window.que = que;


}(jQuery));

// Server jQuery
(function($){
    listen('server.get', function (cfg) {
        $.ajax({
            dataType : 'json',
            url      : cfg[0],
            data     : cfg[1],
            method   : 'get'
        }).always(cfg[2]);
        return "getting package from server";
    });

    listen('server.post', function (cfg) {
        $.ajax({
            dataType : 'json',
            url      : cfg[0],
            data     : cfg[1],
            method   : 'post'
        }).always(cfg[2]);
        return "posted package to server";
    });
}(jQuery));


// Message System
$(function () {

    var button = {};
    var total = $('#input-total');

    listen('bind', function() {

        button.error = $('#alert-error');
        button.loading = $('#alert-loading');
        button.success = $('#alert-success');

        button.error.bind('click', function() {
            $(this).hide();
            total.focus();
        });
        button.loading.bind('click', function() {
            $(this).hide();
            total.focus();
        });
        button.success.bind('click', function() {
            $(this).hide();
            total.focus();
        });

    });

    listen('alert.error', function(val) {
        tell('alert.hide');
        button.error.show();
        button.error.text(val);
        setTimeout(function() {
            button.error.fadeOut('fast');
        }, 4000);
    });

    listen('alert.loading', function(val) {
        tell('alert.hide');
        button.loading.show();
        button.loading.text(val);
        setTimeout(function() {
            button.loading.fadeOut('fast');
        }, 4000);
    });

    listen('alert.success', function(val) {
        tell('alert.hide');
        button.success.show();
        button.success.text(val);
        setTimeout(function() {
            button.success.fadeOut('fast');
        }, 4000);
    });

    listen('alert.hide', function() {
        button.loading.hide();
        button.error.hide();
        button.success.hide();
    });
});


// Control System
$(function() {

    var ui = {};

    var input = {};

    var display = {};

    var total = 0;
    var used = 0;
    var left = 0;

    listen('bind', function() {

        // Assignments
        ui.menuTopHide = $('#button-menu-hide');
        ui.menuTopShow = $('#button-menu-show');
        ui.menuTop = $('#display-nav-top');
        ui.menuBottom = $('#display-nav-bottom1');

        input.totalPoints = $('#input-total-points');
        input.totalUsed = $('#input-total-used');
        input.totalLeft = $('#input-total-left');

        display.totalUsed = $('#input-total-used-text');
        display.totalLeft = $('#input-total-left-text');


        // Binding assignments to functions
        ui.menuTopHide.bind('click', function(e) {
            e.preventDefault();
            tell('menu-toggle');
        });
        ui.menuTopShow.bind('click', function(e) {
            e.preventDefault();
            tell('menu-toggle');
        });
        input.totalPoints.keyup(function() {
            var val = input.totalPoints.val();
            if(isNaN(val))
            {
                tell('alert.error', 'Total points must be a number.');
                input.totalPoints.val('0');
                input.totalLeft.val(0);
            }
            else if(parseInt(val) < 0 || parseInt(val) > 10000 || val.length < 1)
            {
                tell('alert.error', 'Total points must be between 0 and 10,000');
                input.totalPoints.val('0');
                input.totalLeft.val(0);
            }
            else
            {
                tell('adjust-points', val);
                tell('adjust-points-display');
            }
        })

    });

    // Adjusting the menu
    listen('menu-toggle', function() {
        ui.menuTopHide.toggle();
        ui.menuTopShow.toggle();
        ui.menuTop.toggle();
    });
    listen('nav-bottom-toggle', function() {
        ui.menuBottom.toggle();
    });

    // Adjusting points
    listen('adjust-points-display', function() {
        var val = total - used;
        if(val < 0) display.totalLeft.attr('style', 'color:red');
        else display.totalLeft.removeAttr('style');
        if(isNaN(val)) input.totalLeft.val(0);
        else input.totalLeft.val(val);
    });
    listen('adjust-points', function(val) {
        total = val;
    });
    listen('adjust-used', function(val) {
        used += val;
        input.totalUsed.val(used);
        tell('adjust-points-display');
    });

    // Starting functions
    listen('fantasy-start', function() {
        tell('menu-toggle');
        tell('nav-bottom-toggle');
    });

});


