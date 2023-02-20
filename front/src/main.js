import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Vuesax from 'vuesax'
import axios from 'axios'
import VueAxios from 'vue-axios'
import vmodal from 'vue-js-modal'
import 'vuesax/dist/vuesax.css'
import 'material-icons/iconfont/material-icons.css'

Vue.use(Vuesax, {
  // options here
})

Vue.use(VueAxios, axios)
Vue.axios.defaults.baseURL = 'http://localhost:8000/api/'
// Vue.axios.defaults.baseURL = 'https://rickandmortyapi.com/api/'

Vue.use(vmodal)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
