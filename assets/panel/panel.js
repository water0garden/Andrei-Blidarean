document.addEventListener("DOMContentLoaded", function (event) {

    const Settings = {
        url: window.location.hostname
    }

    const Panel = {
        init: function () {
            Panel.bindEvents();
        },

        bindEvents: function () {
            Panel.determineIfLocal();
        },

        determineIfLocal: function() {
            if (Settings.url.includes('.local')) {
                document.querySelector('body').setAttribute('data-local', 'true')
            } else {
                document.querySelector('body').setAttribute('data-local', 'false')
            }
        }
    };


    Panel.init();

});
