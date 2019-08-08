require('./bootstrap');
window.Vue=require('vue');
window.axios=require('axios');
window.Swal=require('sweetalert2');
Vue.component('error', require('./components/plugin/error.vue').default);
    Vue.component('articleshow', require('./components/web/tools/ArticleShow.vue').default);

const login= new Vue({
    el:'#login',
    data: {

        email:null,
        password:null,
        remember:false,
        error:[]
    },
    methods: {
        submitform:function (e) {

           data={
                email:this.email,
                password:this.password
            }
            let that=this;
            axios.post(`/login`,data)
                .then(function (response) {
                    location.reload();
                })
                    .catch(function (error) {
                        // handle error
                        that.error= error.response.data.errors;

                    });

            e.preventDefault();
            e.stopPropagation();
        }
    }

});
