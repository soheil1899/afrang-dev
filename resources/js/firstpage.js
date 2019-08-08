require('./bootstrap');
window.Vue=require('vue');
window.axios=require('axios');
Vue.component('error', require('./components/plugin/error.vue').default);

import Vue3dMenu from 'vue-3d-menu';
var Lang = require('vuejs-localization');
Vue.use(Lang);
Lang.requireAll(require.context('./lang', true, /\.js$/));


const login= new Vue({
    el: '#app',
    data:{


    },
    mounted:function () {
        this.$lang.setLang('fa');

    }

});