let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addEntry('style', './assets/scss/main.scss')
    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
        'bootstrap/scss/bootstrap.scss'
    ])

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader()
    .autoProvidejQuery();

module.exports = Encore.getWebpackConfig();