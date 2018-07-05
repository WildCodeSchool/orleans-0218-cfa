let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addEntry('share', './assets/js/shareEvent.js')
    .addEntry('style', './assets/scss/main.scss')
    .addEntry('style_timeline', './assets/scss/timeline.scss')
    .addEntry('style_admin', './assets/scss/admin.scss')
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