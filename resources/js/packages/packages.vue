<template>
    <div>


        <error :error="error"></error>

        <div>
            <input v-on:click="AddAccount" class="btn btn-primary tiss-cursor" v-bind:value="$lang.admin.Add">
            <input v-on:click="loadproflist" class="btn btn-primary tiss-cursor" v-bind:value="$lang.admin.List">
        </div>
        <div>
            <modal    :overlayTransition="true" :adaptive="true" ref="modal" >
                <h5 slot="title" v-text="title"></h5>
                <template slot="body">

                    <form @submit.prevent="savefrom">
                        <div class="row">

                            <img v-bind:src="data.picture" class="col-sm-12">

                            <div class="col-sm-12">
                                <label v-text="$lang.admin.name"></label>
                                <input class="form-control" v-model="data.name">

                                <label v-text="$lang.admin.price"></label>
                                <input class="form-control" type="number" v-model="data.price">
                                <label v-text="$lang.admin.day"></label>
                                <input class="form-control" type="number" v-model="data.day">
                                <label v-text="$lang.admin.order"></label>
                                <input class="form-control" type="number" v-model="data.order">
                                <label v-text="$lang.admin.active"></label>
                               <select v-model="data.limited" class="form-control">
                                   <option value="0" v-text="$lang.admin.no"></option>
                                   <option value="1" v-text="$lang.admin.yes"></option>
                               </select>

                                <label v-text="$lang.admin.comment"></label>
                                <textarea class="form-control" v-model="data.comment"></textarea>
                                <label v-text="$lang.admin.image"></label>
                                <input ref="file" v-on:change="upload" type="file"/>


                            </div>


                        </div>
                        <br>
                        <error :error="error2"></error>

                        <button type="submit" class="btn btn-primary"  >{{ $lang.admin.save }}</button>
                        <button type="button" class="btn btn-secondary" @click="closemodel">{{ $lang.admin.Close }} </button>

                    </form>
                </template>
            </modal>
            <div>
                <table class="table margintop">
                    <tr>
                        <th>{{$lang.admin.Row}}</th>
                        <th>{{$lang.admin.name}} </th>
                        <th>{{$lang.admin.price}}</th>
                        <th>{{$lang.admin.Remove}}</th>
                        <th>{{$lang.admin.Publish}}</th>
                    </tr>
                    <tr  v-for="item in listprof">
                        <th>{{ item.id }}</th>
                        <th>{{ item.name }}</th>
                        <th v-on:click="edit(item.id)" ><span class="fa fa-edit"></span></th>
                        <th>
                        </th>

                        <th></th>

                    </tr>

                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import Modal from 'vmodal'

    export default {
        name: "package",
        components: {
            'modal': Modal,// <- Important part,
        },
        data() {
            return {
                error: [],
                error2: [],
                listprof:[],
                data: {
                    id: null,
                    name: null,
                    price: null,
                    day: null,
                    order: null,
                    limited: null,
                    comment: null,
                    picture: null,
                },
                title: null,
                textgreen:'textgreen',
            }
        },
        methods: {
            AddAccount() {
                this.$refs.modal.show();
                this.title = this.$lang.admin.AddPorfessor;
            },
            closemodel(){
                this.$refs.modal.hide();
            },
            upload(){
                this.savefrom('upload');
                let that=this;
                let formData = new FormData();
                formData.append('id', this.data.id);
                formData.append('file', this.$refs.file.files[0]);
                axios.post('/admin/VideoCenter/UploadPicPackage'
                    , formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    })
                    .then(function (response) {
                        that.loadproduct();

                        Swal.fire(
                            that.$lang.store.Success,
                            that.$lang.store.UploadCompleted,
                            'success'
                        )

                    })
                    .catch((error) => {
                        that.error = error.response.data.errors;

                    });
            },
            edit(id){
                let that=this;
                let data={
                    id:id
                }
                axios.post('/admin/VideoCenter/LoadPackage',data)
                    .then(function (response) {
                        that.$refs.modal.show();
                        that.data= {

                            id: response.data.id,
                            name: response.data.name,
                            price: response.data.price,
                            day: response.data.day,
                            order: response.data.order,
                            limited: response.data.limited,
                            comment: response.data.comment,
                            picture: response.data.picture,

                        };
                    })

            },


            resetform(){
                this.data= {
                    id: null,
                    name: null,
                    price: null,
                    day: null,
                    order: null,
                    limited: null,
                    comment: null,
                    picture: null,

                };
            },
            savefrom(mode="normal"){
                alert(mode);
                let that=this;

                axios.post('/admin/VideoCenter/SavePackage',that.data)
                    .then(function (response) {
                        if(mode=="normal"){

                            that.$refs.modal.hide();
                            that.resetform();
                            that.error2=[];


                        }
                        that.loadproflist();


                    })
                    .catch(function (error) {
                        // handle error
                        that.error2= error.response.data.errors;

                    });
            },
            loadproflist(){
                let that=this;
                axios.post('/admin/VideoCenter/loadpacklist')
                    .then(function (response) {
                        that.listprof=response.data;
                    })

            }
        },
        mounted: function () {
            this.loadproflist();
        }
    }
</script>

<style scoped>
    .textgreen{ color:green !important;}

    .REDTEXT{ color:red;}
</style>