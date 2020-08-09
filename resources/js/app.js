import Vue from 'vue'
import Vuikit from 'vuikit'
import VuikitIcons from '@vuikit/icons'

import '@vuikit/theme'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = Vue;

Vue.use(Vuikit)
Vue.use(VuikitIcons)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import DeviceTypesTable from './components/DeviceTypesTable.vue';
import LocaleSelector from './components/LocaleSelector.vue';
import DevicePanel from './components/DevicePanel';
import PowerSwitch from './components/PowerSwitch.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        DeviceTypesTable,
        LocaleSelector,
        DevicePanel,
        PowerSwitch
    },
    data () {
        return {
            data: [
            ]
        }
    }
});
