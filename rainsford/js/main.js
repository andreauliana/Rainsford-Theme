document.addEventListener('DOMContentLoaded', function () {

    var hamburger = document.getElementById('hamburger-icon');

    M.Sidenav.init(document.querySelectorAll('.sidenav'), {
        onOpenStart: function () {
            if (hamburger) hamburger.classList.add('is-active');
        },
        onCloseStart: function () {
            if (hamburger) hamburger.classList.remove('is-active');
        }
    });

    M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'));
    M.Collapsible.init(document.querySelectorAll('.collapsible'));

    // Materialize's trigger only calls open(), never close() — this turns it
    // into a real toggle by intercepting the click in the capture phase
    // when the sidenav is already open, before Materialize's own listener fires.
    if (hamburger) {
        hamburger.addEventListener('click', function (e) {
            var sidenavEl = document.getElementById('mobile-nav');
            var instance = M.Sidenav.getInstance(sidenavEl);
            if (instance && instance.isOpen) {
                e.preventDefault();
                e.stopImmediatePropagation();
                instance.close();
            }
        }, true);
    }

    // Closes the mobile sidenav when a link inside it is clicked
    // (delegation: works regardless of when/how the links are rendered)
    document.addEventListener('click', function (e) {
        var link = e.target.closest('#mobile-nav a');
        if (!link) return;
        var instance = M.Sidenav.getInstance(document.getElementById('mobile-nav'));
        if (instance) instance.close();
    });

});

// Generic parallax: any .parallax-wrap[data-parallax] with an <img> inside gets it.
// Speed per breakpoint is set via data-parallax-speed-mobile / data-parallax-speed-desktop.
(function () {
    var wraps = document.querySelectorAll('[data-parallax]');
    if (!wraps.length) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var items = Array.prototype.map.call(wraps, function (wrap) {
        return {
            wrap: wrap,
            img: wrap.querySelector('img'),
            speedMobile: parseFloat(wrap.dataset.parallaxSpeedMobile || '0.15'),
            speedDesktop: parseFloat(wrap.dataset.parallaxSpeedDesktop || '0.3')
        };
    }).filter(function (item) { return item.img; });

    if (!items.length) return;

    var ticking = false;

    function update() {
        var isDesktop = window.innerWidth >= 993;
        items.forEach(function (item) {
            var speed = isDesktop ? item.speedDesktop : item.speedMobile;
            var rect = item.wrap.getBoundingClientRect();
            var offset = rect.top * speed;

            // Clamp to the actual overscan available (real rendered image
            // height vs wrap height), so the image can never reveal empty
            // space regardless of how speed or height get tuned later.
            var maxOffset = (item.img.offsetHeight - item.wrap.offsetHeight) / 2;
            if (maxOffset > 0) {
                offset = Math.max(-maxOffset, Math.min(maxOffset, offset));
            }

            item.img.style.transform = 'translate(-50%, -50%) translateY(' + offset + 'px)';
        });
        ticking = false;
    }

    function requestUpdate() {
        if (!ticking) {
            window.requestAnimationFrame(update);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate, { passive: true });

    update();
})();