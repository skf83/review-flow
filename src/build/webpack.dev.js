const base = require('./webpack.base');
const { merge } = require('webpack-merge');

//const path = require('path');

const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = merge(base, {

    devtool: 'source-map',

    mode: 'development',

    module: {
        rules: [

            // ...add your rules here!

        ]
    },

    plugins: [

        new webpack.DefinePlugin({
            'process': {
                //env: config
            }
        }),

        new BrowserSyncPlugin({

            /**
             *  enable (or disable) HTTPS
             *  [default = false]
             */
            https: false,

            /**
             *  ...
             *  [default = n/a]
             */
            host: 'localhost',

            /**
             *  port to be used for serving the application
             *  [default = n/a]
             */
            port: 3000,

            /**
             *  determine, if the notification in the upper right corner should be showed
             *  [default = true]
             */
            notify: true,

            /**
             *  serve files from this folder
             *  [default = n/a]
             */
            server: {
                baseDir: [
                    'src/build/static'
                ],
                index: "welcome.html",
                serveStaticOptions: {
                    extensions: [
                        "html"
                    ]
                },
                routes: {
                    // "/bower_components": "bower_components"
                }
            },

            /**
             *  watch for changes in these files
             *  [default = n/a]
             */
            files: [
                {
                    match: [
                        '**/*.js',
                        '**/*.html',
                        //'**/*.php',
                        //'**/*.twig'
                    ],
                    files: [

                        // TODO : It might be possible to also serve php if setting up a proxy to php-server!? ( https://matmunn.me/2017/03/08/webpack-browsersync-php/ )

                        //'app/*.php',
                        //'app/**/*.php',
                        'app/*.js',
                        'app/**/*.js',
                    ],
                    fn: function(event, file) {
                        if (event === "change") {
                            const bs = require('browser-sync').get('bs-webpack-plugin');
                            bs.reload();
                        }
                    }
                }
            ],

            /**
             *  serve BrowserSync UI on this port
             *  [default = n/a]
             */
            ui: {
                port: 8080
            }
        })

    ],

    watch: true

});
