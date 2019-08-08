<template>

        <div class="container-fluid" >

            <ul class="breadcrumb"  id="groupmanager">
                <li><a href="/admin">{{$lang.admin.Dashboard}}</a> <span class="divider">/</span></li>
                <li class="active">{{$lang.admin.ListArticle}}</li>
            </ul>

            <h2>{{$lang.admin.ListArticle}}</h2>
            <form @submit="filteration" class="row">
                <input  class="form-control col-sm-6 col-xs-12 margin" v-model:value="search" placeholder="Search">
                <select  class="form-control col-sm-5 col-xs-10 margin" v-model:value="group" >
                    <option value="0">{{$lang.admin.All}}</option>
                    <option v-for="item in listgroup" v-bind:value="item.id">{{ item.name }}</option>
                </select>
                <button type="submit" style="margin-top: 0px;"
                        class="btn btn-success  col-sm-1 col-xs-2">
                    <span class=" iconmenu iconsmind-Magnifi-Glass2  tiss-cursor" style="font-size: 14px;"></span>
                </button>
            </form>

        <table class="table margintop">
            <tr>
                <th>{{$lang.admin.Row}}</th>
                <th>{{$lang.admin.Title}}</th>
                <th>{{$lang.admin.Group}}</th>
                <th>{{$lang.admin.Order}}</th>
                <th>{{$lang.admin.Edit}}</th>
                <th>{{$lang.admin.Remove}}</th>
                <th>{{$lang.admin.Publish}}</th>
            </tr>
            <tr  v-for="item in listarticle">
                <th>{{ item.id }}</th>
                <th>{{ item.name }}</th>
                <th>{{ item.to_group[0].name }}</th>
                <th><input type="number" v-bind:value="item.ordered" class="mini-input form-control"></th>
                <th><a  v-bind:href="'/admin/EditArticle/'+item.id"  class="iconmenu  font-05x tiss-cursor tiss-hover iconsmind-Edit"></a></th>
                <th>
                    <a   v-on:click="removearticle(item.id)" class="iconmenu  font-05x tiss-cursor tiss-hover iconsmind-Recycling"></a>
                </th>
                <th>
                    <span v-if="item.publish==true" v-on:click="changepublish(false,item.id)"  class="iconmenu tiss-cursor font-05x tiss-hover iconsmind-Yes"></span>
                    <span v-if="item.publish==false"  v-on:click="changepublish(true,item.id)"  class="iconmenu  tiss-cursor font-05x  tiss-hover-green iconsmind-Remove"></span>

                </th>

            </tr>

        </table>
        <nav aria-label="Page navigation example" dir="ltr">
            <ul class="pagination">
 <li class="page-item" v-for="item in fullpage" v-on:click="changepage(item)"><a class="page-link" href="#">{{ item }}</a></li>
<li class="page-item"><a class="page-link" href="#">{{$lang.admin.Page}} {{ page }}</a></li>
            </ul>
        </nav>

        </div>
</template>

<script>
    export default {
        props:['id'],
        data(){
            return{
                listgroup:[],
                listarticle:[],
                group:null,
                page:1,
                search:null,
                fullpage:0,

            }
        },
        methods: {
            grouploader:function () {
                let that=this;
                axios.post('/admin/ArticleCategory/LoadGroupList')
                    .then(function (response) {
                        that.listgroup=response.data;

                    });

            },
            removearticle:function(id){
                let that=this;
                let data={
                    id:id,
                };
                axios.post('/admin/Article/RemoveArticle',data)
                    .then(function (response) {
                        that.loadlist();
                    });
            },
            loadlist:function(){
                let that=this;
                let data={
                    group:this.group,
                    search:this.search,
                    page:this.page,


                };


                axios.post('/admin/Article/ListArticle',data)
                    .then(function (response) {
                        that.listarticle=response.data.data;
                        that.fullpage=response.data.last_page;

                    });
            },
            changepage:function(changepage){
                this.page=changepage;
                this.loadlist();
            },
            filteration:function (e) {

                this.loadlist();
                e.preventDefault();

            },
            changepublish:function (publish,item) {

            }
        },
        mounted: function () {
            this.grouploader();
            this.loadlist();
        }
    }
</script>

