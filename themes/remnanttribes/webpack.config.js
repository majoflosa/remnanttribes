const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');

module.exports = {
    entry: ['@babel/polyfill', './assets/src/js/index.js'],
    
    output: {
        path: path.join(__dirname, 'assets/dist/main'),
        filename: 'main.js'
    },
    
    mode: process.env.NODE_ENV || 'production',
    
    devtool: 'source-map',
    
    module: {
        rules: [
            { test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/, query: { presets: ['@babel/env'] } },
            { test: /.sass$/, use: [
                // 'style-loader', 
                {
                    loader: MiniCssExtractPlugin.loader,
                    options: {
                        hmr: process.env.NODE_ENV === 'development'
                    }
                },
                'css-loader', 
                'postcss-loader',
                'sass-loader'
            ] }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            path: path.join(__dirname, 'assets/dist/main'),
            filename: 'main.css',
            chunkFilename: '[id].css'
        }),
        new BrowserSyncPlugin({
            files: [
                './*.php',
                './**/*.php'
            ],
            proxy: 'http://localhost:8888'
        })
    ]
}