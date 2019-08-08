<template>
    <div>
        <modal :overlayTransition="true" :adaptive="true" ref="modal" >
            <h5 slot="title" v-text="title"></h5>
            <template slot="body">

                <form @submit.prevent="save">
                    <label v-text="$lang.admin.name"></label>
                    <input class="form-control" type="text" v-model="data.name">
                    <label v-text="$lang.admin.family"></label>
                    <input class="form-control" type="text" v-model="data.family">
                    <label v-text="$lang.admin.email"></label>
                    <input class="form-control" type="text" v-model="data.email">
                    <label v-text="$lang.admin.phone"></label>
                    <input class="form-control" type="text" v-model="data.phone">
                    <label v-text="$lang.admin.mobile"></label>
                    <input class="form-control" type="text" v-model="data.mobile">
                    <label v-text="$lang.admin.password"></label>
                    <input class="form-control" type="text" v-model="data.password">
                    <label v-text="$lang.admin.slogan"></label>
                    <input class="form-control" type="text" v-model="data.slogan">
                    <label v-text="$lang.admin.actived"></label>
                    <select v-model="data.actived" class="form-control">
                        <option v-bind:value="1" v-text="$lang.admin.Actived"></option>
                        <option v-bind:value="0" v-text="$lang.admin.inActived"></option>
                    </select>
                    <label v-text="$lang.admin.job"></label>

                    <select v-model="data.job" class="form-control">
                        <option v-bind:value="1" v-text="$lang.admin.Editor"></option>
                        <option v-bind:value="2" v-text="$lang.admin.Reporter"></option>
                        <option v-bind:value="3" v-text="$lang.admin.photographer"></option>
                    </select>
                    <label v-text="$lang.admin.sex"></label>
                    <select v-model="data.sex" class="form-control">
                        <option v-bind:value="1" v-text="$lang.admin.male"></option>
                        <option v-bind:value="0" v-text="$lang.admin.famle"></option>
                    </select>
                    <label v-text="$lang.admin.address"></label>
                    <textarea class="form-control" type="text" v-model="data.address"></textarea>


                    <input type="submit" class="btn btn-success mt-3" v-bind:value="$lang.admin.Save">
                    <error class="margintop" :error="error"></error>

                </form>
            </template>

        </modal>

        <div>
            <input  type="button" class="btn btn-success" v-bind:value="$lang.admin.Add" v-on:click="newlayout">

            <input  type="button"  class="btn btn-danger"  v-bind:value="$lang.admin.Reload" v-on:click="loadpage">
        </div>
        <div>
            <table class="table">
                <tr>
                    <th v-text="$lang.admin.Id"></th>
                    <th v-text="$lang.admin.Name"></th>
                    <th v-text="$lang.admin.family"></th>
                    <th v-text="$lang.admin.job"></th>
                    <th v-text="$lang.admin.Edit"></th>
                    <th v-text="$lang.admin.Delete"></th>
                </tr>

                <tr v-for="item in list">
                    <th v-text="item.id"></th>
                    <th v-text="item.name"></th>
                    <th v-text="item.jbname"></th>
                    <th v-text="item.family"></th>
                    <th v-on:click="edit(item.id)"><span class="fa fa-edit mousehover"></span></th>
                    <th v-on:click="del(item.id)"><span class="fa fa-times mousehover"></span></th>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    import Modal from 'vmodal'

    export default {
        name: "newsuser",
        components: {
            'modal': Modal,// <- Important part,


        },
        data() {
            return {
                error:[],
                list:{},
                data:{
                    name:null,
                    id:null,
                    family:null,
                    slogan:null,
                    actived:null,
                    sex:null,
                    job:null,
                    email:null,
                    address:null,
                    phone:null,
                    mobile:null,
                },
                title:null
            }
        },

        methods: {
            loadpage(){
                let that=this;
                this.data={
                    name:null,
                    id:null,
                    url:null,
                };
                this.$refs.modal.hide();
                axios.get('/admin/news/users/create')
                    .then(function (response) {
                        that.list=response.data.data;
                    })


                //    axios.post('/admin/VideoCenter/SavePackage',that.data)

            },
            del(id){
                Swal.fire({
                    title: this.$lang.admin.Delete,
                    text: this.$lang.admin.Youwontbeabletorevertthis,
                    type: 'info',
                    showCancelButton: true,
                    cancelButtonText:this.$lang.admin.Cancel,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: this.$lang.admin.Yesdeleteit
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/admin/news/users/'+id)
                            .then(function (response) {
                                that.loadpage();
                                Swal.fire(
                                    this.$lang.admin.warning.Deleted,
                                    '',
                                    this.$lang.admin.warning.success
                                )
                            });

                    }
                });
                let that=this;

            },
            newlayout(){
                this.title=this.$lang.admin.newlayout;
                this.$refs.modal.show();

            },

            edit(id){
                let that=this;

                axios.get('/admin/news/users/'+id+'/edit')
                    .then(function (response) {
                        that.data=response.data.data;
                        that.$refs.modal.show();

                    });

            },
            save(){
                let that=this;

                if(this.data.id!=null){
                    axios.put('/admin/news/users/'+this.data.id,that.data)
                        .then(function (response) {
                            that.loadpage();
                        })
                        .catch((error) => {
                            that.error = error.response.data.errors;
                        });

                }else{
                    axios.post('/admin/news/users',that.data)
                        .then(function (response) {
                            that.loadpage();
                        })
                        .catch((error) => {
                            that.error = error.response.data.errors;
                        });

                }


            }
        },
        mounted: function () {
            this.loadpage();
        }
    }
</script>

<style scoped>

</style>