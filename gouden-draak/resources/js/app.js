import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
//import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
window.Axios = require('axios').default;

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//components
Vue.component('gerecht', require('./components/Gerecht.vue').default);
Vue.component('gerecht-list', require('./components/GerechtList.vue').default);
Vue.component('cart-list', require('./components/CartList').default);
Vue.component('menu-gerecht', require('./components/MenuGerecht.vue').default);
Vue.component('menu-gerecht-overzicht', require('./components/MenuGerechtOverzicht.vue').default);


//view
Vue.component('view-web-menu', require('./view/web-menu.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#vue-app',
});
