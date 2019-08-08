
/**
 * AfrangArt Design  Studio
 */
require('./bootstrap');
window.Vue = require('vue');
window.axios=require('axios');
window.Swal=require('sweetalert2');
window.CKEditor=require('@ckeditor/ckeditor5-vue');
import VueTagsInput from '@johmun/vue-tags-input';
var Lang = require('vuejs-localization');
Vue.use( CKEditor );

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
//Notice that you need to specify the lang folder, in this case './lang'
Lang.requireAll(require.context('./lang', true, /\.js$/));

Vue.use(Lang);
Vue.component('product', require('./market/admin/product.vue').default);
Vue.component('productmanager', require('./market/admin/productmanager.vue').default);

// Main App
const app = new Vue({
    el: '#wrapper',
    data:{
        menu:[],

    },
    methods: {
            menucall:function(){



            }
    }
    ,
    mounted:function () {
        this.$lang.setLang('fa');

    }

});

