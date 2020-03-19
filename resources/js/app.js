require('./bootstrap');
window.Vue = require('vue');

import { Slide } from 'vue-burger-menu'

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('urlside-component', require('./components/UrlSideComponent.vue').default);
Vue.component('compile-component', require('./components/CompileComponent.vue').default);
Vue.component('slide', Slide);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});
