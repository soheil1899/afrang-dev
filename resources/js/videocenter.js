/*
 * AfrangArt Design  Studio
 */
require('./bootstrap');
window.Vue = require('vue');
window.axios=require('axios');
var Lang = require('vuejs-localization');
window.Swal=require('sweetalert2');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
//Notice that you need to specify the lang folder, in this case './lang'
Lang.requireAll(require.context('./lang', true, /\.js$/));
var sbadmin2 = require('../../public/videoplayer/js/sb-admin-2.js');
Vue.use(Lang);
Vue.component('uploader', require('./videoplayer/admin/uploader.vue').default);
Vue.component('convertor', require('./videoplayer/admin/convertor.vue').default);
Vue.component('listvideo', require('./videoplayer/admin/listvideo.vue').default);
Vue.component('classroom', require('./videoplayer/admin/classroom.vue').default);
Vue.component('classedit', require('./videoplayer/admin/classedit.vue').default);
Vue.component('offlineclassroom', require('./videoplayer/admin/offlineclassroom.vue').default);
Vue.component('class', require('./videoplayer/admin/class.vue').default);
Vue.component('player', require('./videoplayer/player.vue').default);
Vue.component('professor', require('./professor/professor.vue').default);
Vue.component('packages', require('./packages/packages.vue').default);
Vue.component('error', require('./components/plugin/error.vue').default);
Vue.component('major', require('./learning/major.vue').default);
Vue.component('lessons', require('./videoplayer/admin/lessons.vue').default);
Vue.component('wellcome', require('./components/admin/setting/wellcome.vue').default);
Vue.component('lessonsoffline', require('./videoplayer/admin/lessonsoffline.vue').default);
Vue.component('onlinesetting', require('./videoplayer/admin/onlineSetting.vue').default);
Vue.component('classeditonline', require('./videoplayer/admin/Classeditonline.vue').default);

// Main App
const app = new Vue({
    el: '#wrapper',
    data:{
        menu:[],
    },
    methods: {
        menucall:function(){
            this.menu=[
                {
                    href: '/admin',
                    title: this.$lang.admin.Dashboard,
                    icon: 'iconmenu iconsmind-Shop-4  myicondashboard',
                    child: [
                        {
                            href: '/admin',
                            title: this.$lang.admin.Dashboard,
                            icon: 'fa fa-dashboard',

                        }
                    ]
                },
                {
                    title: this.$lang.admin.OnlineSetting,
                    href: 'Video',

                    icon: 'fa fa-video myicondashboard',
                    child: [

                        {
                            href:'/admin/VideoCenter/settingonline',
                            title: this.$lang.admin.settingonline,
                            icon: 'iconmenu iconsmind-Folder myicondashboard',

                        },


                    ]
                },
                {
                    title: this.$lang.admin.adminandMajors,
                    icon: 'iconmenu iconsmind-User myicondashboard',
                    href: 'Users',
                    child: [
                        {
                            href:'/admin/VideoCenter/professors',
                            title: this.$lang.admin.professors,
                            icon: 'iconmenu iconsmind-User myicondashboard',
                            disabled: true

                        },
                        {
                            href: '/admin/VideoCenter/Major',
                            title: this.$lang.admin.MajorsField,
                            icon: 'iconmenu iconsmind-Administrator myicondashboard',
                            disabled: true

                        },
                    ]

                },
                {
                    title: this.$lang.admin.Learning,
                    icon: 'fa fa-book myicondashboard',
                    href: 'Learning',

                    child: [
                        {
                            href:'/admin/VideoCenter/Student',
                            title: this.$lang.admin.Student,
                            icon: 'iconmenu iconsmind-User myicondashboard',
                            disabled: true

                        },
                        {
                            href:'/admin/VideoCenter/Classroom',
                            title: this.$lang.admin.Classroom,
                            icon: 'iconmenu iconsmind-User myicondashboard',
                            disabled: true

                        },
                        {
                            href:'/admin/VideoCenter/offlineClassroom',
                            title: this.$lang.admin.offlineClassroom,
                            icon: 'iconmenu iconsmind-User myicondashboard',
                            disabled: true

                        },
                        {
                            href:'/admin/VideoCenter/Packages',
                            title: this.$lang.admin.Packages,
                            icon: 'iconmenu iconsmind-User myicondashboard',
                            disabled: true
                        },
                    ]
                },


            ];

        }
    }
    ,
    mounted:function () {
        this.$lang.setLang('fa');
        this.menucall();

    }
});

