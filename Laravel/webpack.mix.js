const mix = require('laravel-mix');
const styleLintPlugin = require('stylelint-webpack-plugin');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// ESLintに関する設定（この部分を丸ごと追記するイメージです）
if (!mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      new styleLintPlugin({
        files: ['./resources/sass/_custom.scss'],
        configFile: path.join(__dirname, '.stylelintrc'),
        syntax: 'scss',
        options: {
          fix: false
        }
      }),
    ],
    module: {
      rules: [
        {
          enforce: 'pre',
          exclude: /node_modules/,
          loader: 'eslint-loader',
          test: /\.(js|vue)?$/,
          options: {
            fix: false
          }
        }
      ]
    }
  })
}

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/laravel.vue.js', 'public/js')
mix.js('resources/js/jquery/test_jquery.js', 'public/js/app.js')
  .sass('resources/sass/app.scss', 'public/css')
  .scripts('resources/js/jquery/test_vanilla.js', 'public/js/jquery/test_vanilla.js')
