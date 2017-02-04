var path = require("path");
var webpack = require("webpack");


module.exports = {
    resolve: {
        modulesDirectories: [ "node_modules", "bower_components"]
    },
    devtool: 'source-map',
    debug: true,
    plugins: [
        new webpack.ResolverPlugin(
            new webpack.ResolverPlugin.DirectoryDescriptionFilePlugin(".bower.json", ["main"])
        ),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
    ],
    entry: './assets/js/main.js',
    output: { path: __dirname +'/web/app/themes/nwww/dist/js', filename: 'main.js' },
    devtool: 'source-map',
    module: {
        loaders: [
            {
                loader: 'babel-loader',
                test: /\.js?$/,

                query: {
                    presets: ['es2015']
                }
            },
            { test: /\/bower_components\/.+\.(jsx|js)$/,
                loader: 'imports?jQuery=jquery,$=jquery,this=>window'
            }

        ]
    }
};