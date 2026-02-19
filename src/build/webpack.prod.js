const base= require('./webpack.base');
const { merge } = require('webpack-merge');
const webpack = require('webpack');

module.exports = merge(base, {

    mode: 'production',

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

    ]

});
