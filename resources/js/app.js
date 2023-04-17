require('./bootstrap');
require('./main');
import Vue from 'vue';
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

window.Vue = require('vue');
window.Fire = new Vue();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import role from "./components/role.vue";
import user from "./components/user.vue";
import loading from "./components/loading.vue";
createApp(role).mount("#app");
createApp(user).mount("#app");
createApp(loading).mount("#app");
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.component('role',require('./components/role.vue').default);
Vue.component('user',require('./components/user.vue').default);
Vue.component('loading',require('./components/loading.vue').default);

import VueToastr from "vue-toastr";
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultPosition: "toast-top-right",
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
});

import moment from 'moment';

Vue.filter("date", function(created){
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
});



import Swal from 'sweetalert2'
window.swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.toast = Toast;

import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

require('./component');

const app = new Vue({
    el: '#app'
});



