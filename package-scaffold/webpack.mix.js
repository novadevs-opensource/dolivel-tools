let mix = require('laravel-mix');

mix.autoload({
    jquery: ['$', 'window.jQuery','jQuery','window.$','jquery','window.jquery', 'Popper'],
});

// https://laravel.com/docs/5.8/mix
