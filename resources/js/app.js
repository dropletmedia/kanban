import Vue from 'vue'

import App from './components/App'
import store from './store'

const app = new Vue({
    el: '#app',
    store,
    ...App,
})
