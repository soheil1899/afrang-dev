<template>
    <div>

        <div class="row">
            <div class="col-md-6 col-xs-12">

            </div>
            <div class="col-md-6 col-xs-12">
                <form @submit.prevent="saveform" class="marginsup">
                    <div class="form-group">
                        <label v-text="$lang.store.name"></label>
                        <input v-model="data.name" class="form-control">
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.store.description"></label>
                        <editor :init="{plugins: 'wordcount','directionality': 'rtl','height':800}" api-key="qc1sdre33bdx4lkj24aw4ffoeyx1rvbohr9ow2hzhjgfu2mi" ref="editor"
                                v-model="data.desciption"></editor>
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.store.aparat"></label>
                        <input v-model="data.video" class="form-control">
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.store.selectprofessor"></label><span class="fa fa-list"  v-on:click="loadproflist()"></span>
                        <select v-model="data.professor" class="form-control">
                            <option v-for="item in listprof" v-bind:value="item.id" v-text="item.name +' '+ item.to_prof[0].family"></option>
                        </select>
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.store.datestart"></label>
                        <custom-date-picker v-model="data.date" type="datetime"></custom-date-picker>

                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.admin.price"></label>
                        <money v-model="data.price" v-bind="money"></money>

                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.admin.poster"></label>
                        <input type="file" v-on:change="uploadfile" ref="logo" class="form-control">

                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label v-text="$lang.admin.FreeForSpecialUser"></label>
                        <select  class="form-control" v-model="data.specialuser">
                            <option value="0" v-text="$lang.admin.no"></option>
                            <option value="1" v-text="$lang.admin.yes"></option>
                        </select>
                        <small class="form-text text-muted"></small>
                    </div>

                    <input type="submit" class="btn btn-primary" v-bind:value="$lang.store.save">
                    <error class="margintop" :error="error"></error>

                </form>

            </div>
            <div class="col-md-6 col-xs-12">
                <template v-if="data.pic!=null">
                    <img v-bind:src="data.pic">
                </template>
            </div>

        </div>

    </div>
</template>

<script>
    import {Money} from 'v-money'
    import Editor from '@tinymce/tinymce-vue';

    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'

    Vue.use(VuePersianDatetimePicker, {
        name: 'custom-date-picker',
        props: {
            inputFormat: 'YYYY/MM/DD HH:mm',
            format: 'jYYYY/jMM/jDD HH:mm',
            editable: false,
            inputClass: 'form-control my-custom-class-name',
            placeholder: 'Please select a date',
            altFormat: 'YYYY/MM/DD HH:mm',
            color: '#00acc1',
            autoSubmit: false,
            //...
            //... And whatever you want to set as default
            //...
        }
    });
    export default {
        props:['id'],
        name: "class",
        data() {
            return {
                error:[],
                data: {
                    id: null,
                    name: null,
                    desciption: null,
                    professor: null,
                    date: null,
                    price: null,
                    specialuser: null,
                    id: null,
                    video: null,
                    pic: null
                },
                listprof: [],
                money: {
                    decimal: ',',
                    thousands: ',',
                    suffix: '',
                    precision: 0,
                    class: 'form-control',
                    masked: false
                }
            }

        },
        components: {
            datePicker: VuePersianDatetimePicker, Money,Editor
        },
        methods: {
            loadproflist() {
                let that = this;
                axios.post('/admin/VideoCenter/loadproflist')
                    .then(function (response) {
                        that.listprof = response.data;
                    })
            },
            saveform() {
                let that = this;
                axios.post('/admin/VideoCenter/SaveClass', this.data)
                    .then(function (response) {
                            that.data=response.data;

                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;
                    });
            },
            loadclass(){
                let that = this;
                let data={
                    id:this.data.id
                }
                axios.post('/admin/VideoCenter/loadclassroom',data)
                    .then(function (response) {
                        that.data=response.data;

                    })

            },
            uploadfile() {
                this.loadproflist();
                let formData = new FormData();
                formData.append('logo', this.$refs.logo.files[0]);
                formData.append('id', this.data.id);

                axios.post(
                    '/admin/VideoCenter/SaveClasspic'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(function (response) {
                        that.model = 'listmodel';
                        that.listgroup();
                        this.loadclass();
                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;
                    });
            },


        },
        mounted() {
            this.loadproflist();
            if(this.id!=null){
                this.data.id=this.id;
                this.loadclass();
            };
        }
    }
</script>

<style scoped>
    .marginsup {
        margin: 5%;
    }
</style>