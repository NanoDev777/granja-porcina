import './bootstrap'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import router from './router'
import store from './store'
import App from './components/App.vue'
import axios from 'axios'
import CxltToastr from 'cxlt-vue2-toastr'


var toastrConfigs = {
    position: 'top right',
    icon: 'img/icons/check.png',
    showMethod: 'fadeIn',
    hideMethod: 'faceOut',
    hideDuration: 2500,
    timeOut: 2500
}
Vue.use(CxltToastr, toastrConfigs)
Vue.use(BootstrapVue)


const app = new Vue({
    router,
    store,
    el: '#app',
    render: h => h(App)
})
