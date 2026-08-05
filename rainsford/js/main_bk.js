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