module.exports = {
    root: true,
    globals: {
        '_': true, // lodash
        'Enumerable': true // linq
    },
    parserOptions: {
        parser: 'babel-eslint'
    },
    env: {
        'browser': true,
        'jquery' : true
    },
    extends: [
        "prettier",
        'standard', // https://github.com/standard/standard/blob/master/docs/RULES-en.md,
        // 'eslint:recommended',
        // "plugin:vue-i18n/recommended",
        // 'plugin:vue/essential'
        // "plugin:vue/strongly-recommended"
        'plugin:vue/recommended'

    ],
    // required to lint *.vue files
    plugins: [
        'vue',
        "prettier"
    ],
    // add your custom rules here
    rules: {
        // allow async-await
        'generator-star-spacing': 'off',
        "indent": ["error", 2]

    }
}
