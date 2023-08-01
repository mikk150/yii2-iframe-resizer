(function ($) {

    var height = $.fn.height;
    var scrollTop = $.fn.scrollTop;
    var currentPageInfo = {};

    var interval = setInterval(() => {
        if ('parentIFrame' in window) {
            window.parentIFrame.getPageInfo(function (pageInfo) {
                currentPageInfo = pageInfo;
            });
            clearInterval(interval);
        }
    }, 200);

    function isWindow(obj) {
        return obj != null && obj === obj.window;
    }

    $.fn.height = function (margin, value) {
        if (!margin && this.get(0).nodeType === 9 && 'parentIFrame' in window) {
            return currentPageInfo.documentHeight;
        }
        var boundHeight = height.bind(this);
        return boundHeight(margin, value);
    }

    $.fn.scrollTop = function (value) {
        if (!value && isWindow(this.get(0)) && 'parentIFrame' in window) {
            return currentPageInfo.scrollTop;
        }

        if (value && isWindow(this.get(0)) && 'parentIFrame' in window) {
            parentIFrame.scrollTo(0, value);
        }

        var boundScrolltop = scrollTop.bind(this);
        return boundScrolltop(value);
    };

}(jQuery));