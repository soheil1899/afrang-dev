<template>
    <div>
        <modal :overlayTransition="true" :adaptive="true" ref="modal" >
            <h5 slot="title" v-text="title"></h5>
            <template slot="body">

            <form @submit.prevent="save">
                <label v-text="$lang.admin.name"></label>
                <input class="form-control" type="text" v-model="data.name">
                <label v-text="$lang.admin.insubmenu"></label>

                <select v-model="data.insubmenu" class="form-control">
                    <option v-bind:value="1"  v-text="$lang.admin.yes" ></option>
                    <option v-bind:value="0"  v-text="$lang.admin.no"></option>
                </select>
                <input type="submit" class="btn btn-success mt-3" v-bind:value="$lang.admin.Save">
                <error class="margintop" :error="error"></error>

            </form>
            </template>

        </modal>

        <div>
            <input  type="button" class="btn btn-success" v-bind:value="$lang.admin.Add" v-on:click="newsubject">

            <input  type="button"  class="btn btn-danger"  v-bind:value="$lang.admin.Reload" v-on:click="loadpage">
        </div>
        <div>
            <table class="table">
                <tr>
                    <th v-text="$lang.admin.Id"></th>
                    <th v-text="$lang.admin.Name"></th>
                    <th v-text="$lang.admin.Up"></th>
                    <th v-text="$lang.admin.Down"></th>
                    <th v-text="$lang.admin.Edit"></th>
                    <th v-text="$lang.admin.Delete"></th>
                </tr>

                <tr v-for="item in list">
                    <th v-text="item.id"></th>
                    <th v-text="item.name"></th>
                    <th v-on:click="up(item.id)"><span class="fa fa-arrow-up mousehover"></span></th>
                    <th  v-on:click="down(item.id)"><span class="fa fa-arrow-down mousehover"></span></th>
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
        name: "newssubject",
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
                    insubmenu:1
                },
                title:null
            }
        },

        methods: {
            loadpage(){
                let that=this;
                this.data={
                    name:null,
                };
                this.$refs.modal.hide();
                axios.get('/admin/news/subject/create')
                    .then(function (response) {
                        that.list=response.data;
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
                        axios.delete('/admin/news/subject/'+id)
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
            newsubject(){
                this.title=this.$lang.admin.AddSubjec;
                this.$refs.modal.show();

            },
            up(id){
                let that=this;
                let data={
                    id:id
                }
                axios.post('/admin/news/subject/up',data)
                    .then(function (response) {
                        that.loadpage();

                    })

            },

            down(id){
                let that=this;
                let data={
                    id:id
                };
                axios.post('/admin/news/subject/down',data)
                    .then(function (response) {
                        that.loadpage();

                    })
            },
            edit(id){
                let that=this;

                axios.get('/admin/news/subject/'+id+'/edit')
                    .then(function (response) {
                       that.data=response.data;
                        that.$refs.modal.show();

                    });

            },
            save(){
                let that=this;
                let data={
                    id:this.data.id,
                    name:this.data.name
                }
                if(this.data.id!=null){
                    axios.put('/admin/news/subject/'+this.data.id,that.data)
                        .then(function (response) {
                            that.loadpage();
                        })
                        .catch((error) => {
                            that.error = error.response.data.errors;
                        });

                }else{
                    axios.post('/admin/news/subject',that.data)
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