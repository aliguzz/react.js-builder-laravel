
;(function($){
    var pluginName = "undone";
    $[pluginName] = $.fn[pluginName] = function (options) {
        var args = arguments,
            returns;

        if (!(this instanceof $)) return $.fn[pluginName].apply($(window), arguments);

        this.each(function() {
            var instance = $.data(this, 'plugin_' + pluginName);
            if (typeof options === 'string' && options[0] !== '_') {
                if (instance instanceof Undone && typeof instance[options] === 'function') {
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }
            } else if(!instance) {
                $.data(this, 'plugin_' + pluginName, new Undone(options));
            }
        });
        return returns === undefined ? this : returns;
    };
}(jQuery));