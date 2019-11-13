/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
Vue.config.silent = true;
window.vuetify = require('vuetify');
window.axios = require('axios');
window.io = require('socket.io-client');
// window.ioc = require('socket.io');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sample-component', require('./components/SampluComponent.vue').default);
Vue.component('axios-component', require('./components/axiosComponent.vue').default);
Vue.component('scoremodal-component', require('./components/ScoreModalComponent.vue').default);
Vue.component('socket-component', require('./components/socketComponent.vue').default);
Vue.component('score-notice-component', require('./components/ScoreNoticeConponent.vue').default);
Vue.component('display-event-component', require('./components/DisplayEventConponent.vue').default);
Vue.component('display-tournament-component', require('./components/DisplayTournamentConponent.vue').default);
Vue.component('score-cups-component', require('./components/ScoreCupsConponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app'
});

// const app2 = new Vue({
//   el: '#sample'
// });
//
// const score = new Vue({
//   el: '#weather'
// });
