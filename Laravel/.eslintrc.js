module.exports = {
    root: true,
    parserOptions: {
        parser: 'babel-eslint',
    },
    env: {
        browser: true,
    },
    extends: [
        'standard',
        'plugin:vue/recommended',
        'plugin:prettier/recommended',
        'prettier/vue',
    ],
    plugins: [
        'vue',
        'prettier',
    ],
    rules: {
        // ESLintが使用する整形ルールのうち、自分がoffにしたいルールなどを指定する
        // 'vue/no-v-html': 'off',
        'vue/prop-name-casing': 'off',
        'no-console': 'off',
        'no-unused-vars': 'off',
        'camelcase': 'off',
        // Prettierのルール
        "prettier/prettier": [
            "error",
            {
                printWidth: 120,
                tabWidth: 2,
                useTabs: false,
                singleQuote: true,
                trailingComma: 'all',
                bracketSpacing: true,
                arrowParens: 'avoid',
                semi: false,
            },
        ]
    }
}
