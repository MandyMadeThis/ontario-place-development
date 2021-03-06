! function(e) {
    function n() {
        e(".menu__item").removeClass("menu__item--open")
    }

    var o = e(".menu").find("a"),
        t = o.first(),
        s = o.last();

    e(document).on("click", ".header__toggle, .menu__close, .menu__pageOverlay", function(n) {
        e("body").toggleClass("menu--open"), t.focus(), n.preventDefault()
    }), e(document).on("click", ".menu__item > a > .toggle", function(n) {
        n.currentTarget || n.target;
        e(n.target).closest(".menu__item").toggleClass("menu__item--open"), n.preventDefault()
    }), e(document).on("click", ".sidebar__item > a > .toggle", function(n) {
        n.currentTarget || n.target;
        e(n.target).closest(".sidebar__item").toggleClass("open"), n.preventDefault()
    }), e(".menu").on("keydown", function(o) {
        e("body").hasClass("menu--open") && "27" == o.keyCode && (e("body").toggleClass("menu--open"), e(".flexslider a").first().focus(), n())
    }), e(".menu__close").on("click", function(o) {
        setTimeout(function() {
            e(".flexslider a").first().focus()
        }, 0), n()
    }), e(".menu__nav--parent").on("focus", function(n) {
        setTimeout(function() {
            var n = e(this).closest(".menu__item");
            n.hasClass("menu__item--open") || n.addClass("menu__item--open")
        }, 100)
    }), e(".subscribe__prefix .btn").on("click", function(n) {
        n.preventDefault(), e(".subscribe").addClass("embed")
    }), e(".subscribe__embed__close").on("click", function(n) {
        n.preventDefault(), e(".subscribe").removeClass("embed")
    }), s.on("keydown", function(n) {
        e("body").hasClass("menu--open") && 9 === n.which && !n.shiftKey && (n.preventDefault(), t.focus())
    }), t.on("keydown", function(n) {
        e("body").hasClass("menu--open") && 9 === n.which && n.shiftKey && (n.preventDefault(), s.focus())
    });

    var i = {
        animation: "slide",
        useCSS: !1,
        animationLoop: !1,
        smoothHeight: !1,
        controlNav: !0,
        prevText: '<span style="display: none">Previous Slide</span>',
        nextText: '<span style="display: none">Next Slide</span>'
    };

    e(".flexslider.hero").length && e(".flexslider.hero").flexslider(i);
    var a = {
        duration: 300
    };

    e(document).on("click", ".resource-header", function(n) {
        var o = e(n.target).closest(".resource-header"),
            t = o.closest(".posts"),
            s = o.siblings(".content");
        s && (o.hasClass("active") ? s.stop().slideUp(a) : s.stop().slideDown(a), t && e(".content", t).not(s).slideUp(a).siblings(".resource-header").removeClass("active"), o.toggleClass("active"))
    })

    e('.accordion__header').on('click', function(n) {
        if (e(this).hasClass('active')) {
          e(this).removeClass('active');
          e(this).next()
          .stop()
          .slideUp(300);
        } else {
          e(this).addClass('active');
          e(this).next()
          .stop()
          .slideDown(300);
        }
      });
}(jQuery);