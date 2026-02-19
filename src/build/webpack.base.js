const path = require('path');

const webpack = require("webpack");

const MiniCssExtractPlugin      = require('mini-css-extract-plugin');
const CopyStaticsPlugin         = require('copy-webpack-plugin');
const { VueLoaderPlugin }       = require('vue-loader')
const WebpackNotifierPlugin     = require('webpack-notifier');

module.exports = {

    devtool: 'inline-source-map',

    mode: 'none',

    performance: {

        hints: "warning",
        maxEntrypointSize: 2048000,
        maxAssetSize: 2048000
    },

    entry: {

        'register-service-worker'       : 'js/register-service-worker.js',
        './../../service-worker'        : 'js/service-worker.js',

        'api/swagger-ui'                : 'js/api/swagger-ui.js',

        'back/app'                      : 'js/back/app.js',
        'back/app-demo'                 : 'js/back/app-demo.js',
        'back/auto-lock'                : 'js/back/auto-lock.js',
        'back/key-map'                  : 'js/back/key-map.js',
        'back/plugins/datatables'       : 'js/back/plugins/datatables.js',

        'vendors/choices'               : 'js/vendors/choices.js',
        'vendors/dropzone'              : 'js/vendors/dropzone.js',
        'vendors/intl-tel-input'        : 'js/vendors/intl-tel-input.js',
        'vendors/sweet-alert2'          : 'js/vendors/sweet-alert2.js',

        'vue/main'                      : './src/assets/js/vue/main.js',

        /**
         * ---> INJECT YOUR OWN .JS FILES HERE! <---
         */
    },

    output: {

        filename: 'js/[name].min.js',
        path: path.resolve(__dirname, '../../public'),
        assetModuleFilename: 'assets/[name][ext][query]'
    },

    resolve: {

        alias: {

            'config':       path.resolve('./config'),
            '§':            path.resolve('./config'),
            'public':       path.resolve('./public'),
            '@':            path.resolve('./src'),
            '^':            path.resolve('./src/views'),
            '~':            path.resolve('./src/assets/js/vue/components'),
            '>':            path.resolve('./src/assets/js/vue/router'),
            '#':            path.resolve('./src/locales'),
            '*':            path.resolve('./src/assets/js/vue/store'),
            'directives':   path.resolve('./src/assets/js/vue/directives'),
            //'mixins':       require("path").resolve(__dirname, "src/assets/js/vue/mixins"),
            //'plugins':      require("path").resolve(__dirname, "src/plugins"),
            'fonts':        path.resolve('./src/assets/fonts'),
            'icons':        path.resolve('./src/assets/icons'),
            'images':       path.resolve('./src/assets/images'),

            //'logoes':       require("path").resolve(__dirname, "src/assets/logoes"),
            //'npm':          require("path").resolve(__dirname, "node_modules"),

            'js':           path.resolve('./src/assets/js'),
            'scss':         path.resolve('./src/assets/scss'),

        },

        extensions: [

            '.js',
            '.vue',
            '.css',
            '.scss',
            '.twig'
        ]
    },

    module: {

        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [{
                    loader: 'babel-loader'
                }]
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
            },
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                type: "asset/resource"
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    extractCSS: true // TODO
                }
            }
        ]
    },

    plugins: [

        new MiniCssExtractPlugin({

            filename: 'css/[name].min.css',
        }),

        new CopyStaticsPlugin({

            patterns: [
                {
                    from: path.join(__dirname, './static/browserconfig.xml'),
                    to: '.'
                },
                {
                    from: path.join(__dirname, './static/manifest.json'),
                    to: '.'
                },
                {
                    from: path.join(__dirname, './static/robots.txt'),
                    to: '.'
                },
                {
                    from: path.join(__dirname, './static/sitemap.xml'),
                    to: '.'
                },
                {
                    from: path.join(__dirname, './../assets/scss/@global/plugins/pace'),
                    to: 'css/plugins/pace/[name].min.css'
                }
            ]
        }),

        new VueLoaderPlugin(),

        new WebpackNotifierPlugin({

            emoji: true,
            appName: "Element3",
            appID: 'Element3',
            sound: true,
            contentImage: path.join(__dirname, './static/icons/icon_512.png'),
            title: 'Elements collected',
            //excludeWarnings: true,
            alwaysNotify: true
        }),

        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
            __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
        })

    ]

}
