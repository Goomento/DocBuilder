define([
    'jquery',
    'pagebuilderRegister'
], function ($, pagebuilderRegister) {
    const defaultConfig = {
        colors: ['red', 'green', 'yellow', 'black'],
        $element: $
    };
    pagebuilderRegister.widgetRegister(
        'hello-world',
        function (args) {
            setInterval(function () {
                // Get random color from `defaultConfig`
                let color = args.colors[Math.random() * args.colors.length | 0];

                // Changing color
                args.$element.find('.hello-world').css('color', color);
            }, 1000);
        },
        defaultConfig
    );
})
