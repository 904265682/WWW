

var MenuFocus = function () {

	var sidebarActive = function (sidebar, pathname) {
    	var current = sidebar.find('li a[href*="' + pathname + '"]');

    	if (current.length) {
            current = current.eq(0);
            var parents = current.eq(0).parents('li');
            var breadcrumb_first = $('.breadcrumbs > ul.breadcrumb > li:eq(0)');
            parents.each(function() {
                var active_a = $(this).children('a')
                var href = active_a.attr('href');
                var text = active_a.text();
                var element = $('<li>' + text + '</li>')
                breadcrumb_first.after(element);
            });
            // alert(parents.length);
    		current.parents('li').addClass('active open');
    		current.parent('li').removeClass('open');

    	}else {
    		var paramArr = pathname.split('/');
    		paramArr.pop();
    		sidebarActive(sidebar, paramArr.join('/'));
    	}
    };

    var navTabActive = function (nav_tab, pathname) {
        var current = nav_tab.find('li a[href*="' + pathname + '"]');

        if (current.length) {
            current = current.eq(0);
            current.attr('href', 'javascript:;')
            var focus = current.parents('li');
            focus.addClass('active');
            focus.removeClass('hidden');

            var breadcrumb = $('.breadcrumbs > ul.breadcrumb');
            var active = $(focus.prop('outerHTML'));
            active.html(active.text());
            breadcrumb.append(active);
        }else {
            var paramArr = pathname.split('/');
            paramArr.pop();
            navTabActive(nav_tab, paramArr.join('/'));
        }
    };

    var subNavTabActive = function (sub_nav_tab, pathname) {
        var current = sub_nav_tab.find('li a[href*="' + pathname + '"]');

        if (current.length) {
            current = current.eq(0);
            current.attr('href', 'javascript:;')
            var focus = current.parents('li');
            focus.addClass('active');
            focus.removeClass('hidden');

            var breadcrumb = $('.breadcrumbs > ul.breadcrumb');
            var active = $(focus.prop('outerHTML'));
            active.html(active.text());
            breadcrumb.append(active);
        }else {
            var paramArr = pathname.split('/');
            paramArr.pop();
            subNavTabActive(sub_nav_tab, paramArr.join('/'));
        }
    };



    return {

        init: function () {
            var pathname = window.location.pathname;
            var param = pathname.split('/');
            param.shift();
            param.shift();
            param.shift();
            param.shift();
            pathname = param.join('/');


            // alert(pathname);

            var sidebar = $('#sidebar > ul.nav');
            if (sidebar.length) {
                sidebarActive(sidebar, pathname);
            }

            var nav_tab = $('.tabbable > ul.nav');
            if (nav_tab.length) {
                navTabActive(nav_tab, pathname);
            }

            var sub_nav_tab = $('.sub-tabbable > ul.nav');
            if (sub_nav_tab.length) {
                subNavTabActive(sub_nav_tab, pathname);
            }
        },

    };

}();



jQuery(document).ready(function() {
    MenuFocus.init();
});
