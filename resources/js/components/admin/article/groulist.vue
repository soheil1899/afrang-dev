<template>
    <div >
        <ul class="breadcrumb" >
            <li><a href="/admin">{{$lang.admin.Dashboard}}</a> <span class="divider">/</span></li>
            <li class="active">{{$lang.admin.GroupManager}}</li>
        </ul>

        <ul class="nav">
            <li class="active">
                <a   class="btn  btn-success " href="/admin/ArticleCategory/NewCategory">{{$lang.admin.AddGroup}}  <span class="iconsmind-Folder-Add  font-1x"></span></a>
                <a   class="btn  btn-dark text-white " v-on:click="loadgrouplist">{{$lang.admin.ReloadGroup}} <span class="iconsmind-Reload  font-1x"></span></a>
            </li>

        </ul>

        <table class="table margintop">
            <tr>
                <th>{{$lang.admin.row}}</th>
                <th>{{$lang.admin.title}}</th>
                <th>{{$lang.admin.Url}}</th>
                <th>{{$lang.admin.Language}}</th>
                <th>{{$lang.admin.Order}}</th>
                <th>{{$lang.admin.Edit}}</th>
                <th>{{$lang.admin.Remove}}</th>
                <th>{{$lang.admin.Publish}}</th>
            </tr>
            <tr  v-for="item in listgroup">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td v-on:click="yeetefagh(item.id)">{{ item.url }}</td>
                <td >{{ item.to_lang.orgianlname }}</td>
                <td><input type="number" class="mini-input form-control" v-on:blur="changeordered($event,item.id)"  v-bind:value="item.ordered" ></td>
                <td><a  v-bind:href="'/admin/ArticleCategory/EditArticleCategory/'+item.id"  class="iconmenu  font-05x tiss-cursor tiss-hover iconsmind-Edit"></a></td>
                <td>
                    <span v-on:click="removegroup(item.id)"  class="iconmenu  tiss-cursor font-05x  tiss-hover-green iconsmind-Remove"></span>
                </td>
                <td>
                    <span v-if="item.publish==true" v-on:click="changepublish(false,item.id)"  class="iconmenu tiss-cursor font-05x tiss-hover iconsmind-Yes"></span>{{ item.ordred }}
                    <span v-if="item.publish==false"  v-on:click="changepublish(true,item.id)"  class="iconmenu  tiss-cursor font-05x  tiss-hover-green iconsmind-Remove"></span>
                </td>
            </tr>

        </table>
    </div>
</template>

<script>
    window.axios=require('axios');
    const Swal = require('sweetalert2')

    export default {
        props: [],
        data(){
            return{
                listgroup:[],
                thisrow:0,

            }
        },
        methods: {
            loadgrouplist: function () {
                this.thisrow=0;
                let that=this;
                axios.post('/admin/ArticleCategory/LoadGroupList')
                    .then(function (response) {
                        that.listgroup=response.data;
                    });
            },
            removegroup:function(id){
                let that=this;
                let data={
                    id:id,
                };
                axios.post('/admin/ArticleCategory/DelGroupArticle',data)
                    .then(function (response) {
                        if(response.data.success==true){
                            that.loadgrouplist();

                        }else{
                            Swal.fire(
                                response.data.messege,
                                '',
                                'error'

                            )
                        }
                    })
            },
            changepublish:function(e,id){
                let data={
                    id:id,
                    published:e
                };
                let that=this;
                axios.post('/admin/ArticleCategory/ChangePublishGroup',data)
                    .then(function (response) {
                        that.loadgrouplist();
                    })
            },
            changeordered:function(e,id){


                let data={
                    id:id,
                    ordered:e.target.value
                };

                let that=this;
                axios.post('/admin/ArticleCategory/ChangeOrderGroup',data)
                    .then(function (response) {
                        that.loadgrouplist();
                    })
            }

        },
        mounted: function () {
            this.loadgrouplist();

        }
    }

</script>
