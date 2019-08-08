<template>
    <div class="margintop">
        <h3>تنظیمات صفحه اول</h3>
        <hr>
        <form @submit.prevent="saveform">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label v-on:click="firstpageobject">متن اول</label>
                        <input class="form-control" v-model="info.data1" >
                    </div>


                    <div class="form-group">
                        <label>متن دوم</label>
                        <input class="form-control"  v-model="info.data2" >
                    </div>
                    <div class="form-group">
                        <label>متن سوم</label>
                        <input class="form-control"  v-model="info.data3" >
                    </div>
                    <div class="form-group">
                        <label>کادر جستجو</label>
                        <select class="form-control"  v-model="info.searchbox" >
                            <option value="1"> بلی</option>
                            <option value="0"> خیر</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>عکس اول</label>
                        <input class="form-control" ref="header" v-on:change="uploadfile('header')" type="file">
                        <img :src="info.header" class="img-fluid">

                    </div>
                </div>
            </div>
<div>

</div>
            <label>متن سئو</label>
            <ckeditor :editor="editor" v-model="info.data4"  :config="editorConfig"></ckeditor>

            <hr>
            <input type="submit" class="btn btn-primary" value="ذخیره شود">
        </form>

    </div>
</template>

<script>
    window.CKEditor = require('@ckeditor/ckeditor5-vue');
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data() {
            return {
                info:{
                    data1:null,
                    data2:null,
                    data3:null,
                    data4:'',
                    data5:null,
                    data6:null,
                    data7:null,
                    searchbox:null,
                },
                editor: ClassicEditor,
                error:[],
                editorData: '',
                editorConfig: {

                    language: 'fa',
                    heading: {}
                }
            };
        },
        methods: {
            saveform() {
                let that = this;
                let data={
                    data:this.info
                }
                axios.post('/admin/SaveFirstpage', data)
                    .then(function (response) {

                    });

            },
            uploadfile:function(name){
                let that=this;
                let formData = new FormData();
                formData.append('id', 1);
                formData.append('header', this.$refs.header.files[0]);
                formData.append('name', name);
                axios.post('/admin/Savepicfirstpage'
                    , formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    })
                    .then(function (response) {
                        that.firstpageobject();

                        Swal.fire(
                            that.$lang.store.Success,
                            that.$lang.store.UploadCompleted,
                            'success'
                        );

                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;

                    });

            },
            firstpageobject: function () {
              let that = this;
                let data = {
                    id: 1,


                };

                axios.post('/admin/LoadSpecialPage', data)
                    .then(function (response) {
                        response.data.to_data.forEach(function (element) {
                            let data2=element.name;
                            that.info[data2]=element.data;
                        });

                    });

            }
        },
        mounted: function () {
            this.firstpageobject();

        }
    }
</script>

<style scoped>

</style>