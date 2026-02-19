const webpack = require('webpack');

const ora = require('ora');
const chalk = require('chalk');

const spinner = ora({
    text: 'Initializing...',
    color: 'black',
    spinner: 'dots'
}).start();

setTimeout(() => {
    text = 'Collecting elements...';
    color = 'cyan';
}, 1000);

let config;

switch(process.env.NODE_ENV) {
    case 'development':
        config = require('./webpack.dev');
        break;
    case 'production':
        config = require('./webpack.prod');
        break;
    default:
        config = require('./webpack.dev');
}

webpack(config, function (error, stats) {

    spinner.stop();

    if (error) {

        throw error
    }

    else {

        console.log(stats.toString({
            colors: true,
            modules: false,
            reasons: true,
            errorDetails: true,
            children: false,
            chunks: false,
            chunkModules: false
        }));

        spinner.warn(['Collecting...']);
        spinner.succeed('Assets collected...');

        spinner.warn(['Collecting...']);
        spinner.succeed('Javascripts collected...');

        spinner.warn(['Collecting...']);
        spinner.succeed('Scss styles collected...');

        spinner.warn(['Loading result...']);
        console.log(chalk.green('Elements collected'));
    }
});
