
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var Lang = require('vuejs-localization');
window.Swal=require('sweetalert2');
Lang.requireAll(require.context('./lang', true, /\.js$/));
Vue.component('firstpage', require('./components/web/pages/firstpage').default);




Vue.component('our-portfolio', require('./components/web/pages/OurPortfolio.vue').default);





Vue.component('login', require('./components/web/modules/login').default);
Vue.component('error', require('./components/plugin/error.vue').default);
Vue.component('search', require('./components/web/tools/searchbox.vue').default);
Vue.component('articleshow', require('./components/web/tools/ArticleShow.vue').default);
Vue.component('checkmobilephone', require('./components/web/tools/checkmobilephone.vue').default);
Vue.component('changemobile', require('./components/web/tools/changemobile.vue').default);
Vue.component('playmovie', require('./components/web/tools/playmovie.vue').default);
Vue.component('credit', require('./components/web/userpanel/credit.vue').default);

Vue.use(Lang);

const app = new Vue({
    el: '#app',
    methods: {
        loadfunction:function () {


        }
    },
    created() {
        this.loadfunction();
        this.$lang.setLang('en');
    }
});


