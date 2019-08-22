
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
Vue.component('section-works', require('./components/web/pages/Works').default);
Vue.component('section-options', require('./components/web/pages/Options').default);


Vue.component('mobileapp-portfolio', require('./components/web/pages/MobilePortfolio').default);
Vue.component('web-portfolio', require('./components/web/pages/WebPortfolio').default);
Vue.component('portal-portfolio', require('./components/web/pages/PortalPortfolio').default);
Vue.component('programmerteam', require('./components/web/pages/ProgrammerTeam').default);
Vue.component('aboutafrang', require('./components/web/pages/AboutAfrang').default);
Vue.component('orderonline', require('./components/web/pages/OrderOnline').default);
Vue.component('contactus', require('./components/web/pages/ContactUs').default);





Vue.component('portfolioshow', require('./components/web/tools/portfolioshow').default);





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


