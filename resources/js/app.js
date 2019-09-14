/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { library } from '@fortawesome/fontawesome-svg-core'
import { faShoppingCart } from '@fortawesome/free-solid-svg-icons'
import { faSpinner } from '@fortawesome/free-solid-svg-icons'
import { faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../../public/css/main.css'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)
library.add(faShoppingCart)
library.add(faSpinner)
library.add(faTrash)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('add-to-cart', require('./components/AddToCartComponent.vue').default);
Vue.component('add-to-cart-btn', require('./components/AddToCartButton.vue').default);
Vue.component('cart-modal', require('./components/CartComponent.vue').default);
Vue.component('products-list', require('./components/ProductsComponent.vue').default);
Vue.component('category-products-list', require('./components/CategoryProductsComponent.vue').default);
Vue.component('category-delete-btn', require('./components/DeleteCategoryComponent.vue').default);
Vue.component('checkout-page', require('./components/CheckoutComponent.vue').default);
Vue.component('image-carousel', require('./components/ImageCarouselComponent.vue').default);
//Vue.component('best-deal', require('./components/SalesBestDeal.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('font-awesome-icon', FontAwesomeIcon)
const app = new Vue({
    el: '#app',
});
