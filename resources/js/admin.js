
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
import VueSidebarMenu from 'vue-sidebar-menu';
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css';
Vue.use(VueSidebarMenu);

Vue.use(Lang);
Vue.component('grouplist', require('./components/admin/article/groulist.vue').default);
Vue.component('about', require('./components/about.vue').default);
Vue.component('modal', require('./components/admin/other/modal.vue').default);
Vue.component('titleeditor', require('./components/admin/article/titleeditor.vue').default);
Vue.component('aritclesection', require('./components/admin/article/aritclesection.vue').default);
Vue.component('Categoryedit', require('./components/admin/article/categoryedit.vue').default);
Vue.component('EditArticle', require('./components/admin/article/editarticle.vue').default);
Vue.component('articlelist', require('./components/admin/article/articlelist.vue').default);
Vue.component('editarticle', require('./components/admin/article/editarticle.vue').default);
Vue.component('filemanager', require('./components/admin/filemanager/filemanager.vue').default);
Vue.component('settingpage', require('./components/admin/setting/setting.vue').default);
Vue.component('slidergroup', require('./components/admin/slider/slidergroup.vue').default);
Vue.component('wellcome', require('./components/admin/setting/wellcome.vue').default);
Vue.component('menus', require('./components/admin/other/menus.vue').default);
Vue.component('profileedit', require('./components/admin/other/ProfileEdit.vue').default);
Vue.component('changepassword', require('./components/admin/other/changepassword.vue').default);
Vue.component('errorshow', require('./components/admin/other/errorshow.vue').default);
Vue.component('dashboard', require('./components/admin/other/dashboard.vue').default);
Vue.component('firstpagesetting', require('./components/admin/other/firstpagesetting.vue').default);
Vue.component('error', require('./components/plugin/error.vue').default);
Vue.component('menugraoup', require('./components/admin/menu/menugroup.vue').default);
Vue.component('submenu', require('./components/admin/menu/submenu.vue').default);
Vue.component('smsdetail', require('./components/admin/other/smsdetail.vue').default);
Vue.component('newssubject', require('./components/admin/news/newssubject.vue').default);
Vue.component('newslayout', require('./components/admin/news/newslayout.vue').default);
Vue.component('newsuser', require('./components/admin/news/newsuser.vue').default);
Vue.component('adverlayout', require('./components/admin/adver/adverlayout.vue').default);
Vue.component('customer', require('./components/admin/adver/customer.vue').default);
Vue.component('advercenter', require('./components/admin/adver/advercenter.vue').default);

// Market

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
                        title: this.$lang.admin.Article,
                        href: 'Article',

                        icon: 'iconmenu iconsmind-Folder-Edit myicondashboard',
                        child: [
                            {
                                href: '/admin/ArticleCategory',
                                title: this.$lang.admin.ArticleCategory,
                                icon: 'iconmenu iconsmind-Folder myicondashboard',

                            },
                            {
                                href: '/admin/Article/ArticleList',
                                title: this.$lang.admin.ArticleList,
                                icon: 'iconmenu iconsmind-Folder myicondashboard',

                            },
                            {
                                href: '/admin/Article/NewArtilce',
                                title: this.$lang.admin.NewArtilce,
                                icon: 'iconmenu iconsmind-Add-File myicondashboard',

                            },
                            {
                                href: '#',
                                title: this.$lang.admin.BlogLayout,
                                icon: 'iconmenu iconsmind-Window myicondashboard',
                                disabled: true
                            },
                        ]
                    },  {
                        title: this.$lang.admin.Users,
                        icon: 'iconmenu iconsmind-User myicondashboard',
                        href: 'Users',

                        child: [
                            {
                                href: '#',
                                title: this.$lang.admin.NormalUser,
                                icon: 'iconmenu iconsmind-User myicondashboard',
                                disabled: true

                            },
                            {
                                href: '#',
                                title: this.$lang.admin.AdminUser,
                                icon: 'iconmenu iconsmind-Administrator myicondashboard',
                                disabled: true

                            },
                        ]

                    },


                    {
                        title: this.$lang.admin.Plugin,
                        href: 'Plugin',

                        icon: 'iconmenu iconsmind-Puzzle myicondashboard',
                        child: [
                            {
                                href: '/admin/SliderGroup',
                                title: this.$lang.admin.SliderGroup,
                                icon: 'iconmenu iconsmind-Folder-Pictures myicondashboard',

                            },

                        ]
                    },
                    {
                        title: this.$lang.admin.Settings,
                        href: 'Settings',

                        icon: 'iconmenu iconsmind-Settings-Window myicondashboard',
                        child: [
                            {
                                href: '/admin/setting',
                                title: this.$lang.admin.SettingWebsite,
                                icon: 'iconmenu iconsmind-Gear-2 myicondashboard',
                            },
                            {
                                href: '/admin/MenuGroup',
                                title: this.$lang.admin.MenusConfigartion,
                                icon: 'iconmenu iconsmind-Check-2 myicondashboard',
                            },
                            {
                                href: '/admin/Firstpagesetting',
                                title: this.$lang.admin.MainPage,
                                icon: 'iconmenu iconsmind-Gear myicondashboard',
                            }
                        ]
                    },
                    {
                        title: this.$lang.admin.Newsstation,
                        href: 'Newsstation',

                        icon: 'iconmenu iconsmind-Settings-Window myicondashboard',
                        child: [
                            {
                                href: '/admin/news/users',
                                title: this.$lang.admin.Users,
                                icon: 'iconmenu iconsmind-Gear-2 myicondashboard',
                            },
                            {
                                href: '/admin/news/subject',
                                title: this.$lang.admin.Subjects,
                                icon: 'iconmenu iconsmind-Check-2 myicondashboard',
                            },
                            {
                                href: '/admin/news/layout',
                                title: this.$lang.admin.Layout,
                                icon: 'iconmenu iconsmind-Gear myicondashboard',
                            }
                        ]
                    },
                    {
                        title: this.$lang.admin.Advertising,
                        href: 'advers',

                        icon: 'iconmenu iconsmind-Settings-Window myicondashboard',
                        child: [
                            {
                                href: '/admin/adv/customers',
                                title: this.$lang.admin.customers,
                                icon: 'iconmenu iconsmind-Gear-2 myicondashboard',
                            },
                            {
                                href: '/admin/adv/advers',
                                title: this.$lang.admin.advers,
                                icon: 'iconmenu iconsmind-Check-2 myicondashboard',
                            },
                            {
                                href: '/admin/adv/layouts',
                                title: this.$lang.admin.layouts,
                                icon: 'iconmenu iconsmind-Gear myicondashboard',
                            }
                        ]
                    },
                    {
                        title: this.$lang.admin.AboutSoftWare,
                        href: 'AboutSoftWare',

                        icon: 'iconmenu iconsmind-Settings-Window myicondashboard',
                        child: [
                            {
                                href: '/admin/about',
                                title: this.$lang.admin.AboutSoftWare,
                                icon: 'iconmenu iconsmind-Gear-2 myicondashboard',
                            }
                            ]
                    }

                ];

            }
    }
    ,
    mounted:function () {
        this.$lang.setLang('fa');
        this.menucall();
    }

});

