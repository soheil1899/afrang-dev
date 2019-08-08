<template>
    <div>
        <div>
            <a class="btn btn-primary" v-text="$lang.store.add" href="/admin/VideoCenter/Classedit"></a>
            <a class="btn btn-danger" v-text="$lang.store.reload" v-on:click="loadclass"></a>
        </div>
        <table class="table margintop">
            <tr>
                <th>{{$lang.admin.Row}}</th>
                <th>{{$lang.admin.Title}}</th>
                <th>{{$lang.store.Date}}</th>
                <th>{{$lang.store.Professor}}</th>
                <th>{{$lang.store.Lessonses}}</th>
                <th>{{$lang.admin.Edit}}</th>
                <th>{{$lang.admin.Remove}}</th>
            </tr>
            <tr  v-for="item in listclass.data">
                <th>{{ item.id }}</th>
                <th>{{ item.name }}</th>
                <th>{{ item.date }}</th>
                <th>{{ item.to_porf.name }}</th>
                <th><a class="fa fa-check" v-bind:href="'/admin/VideoCenter/LessonsOffline/'+item.id"></a></th>
                <th><a class="fa fa-edit" v-bind:href="'/admin/VideoCenter/Classedit/'+item.id"></a> </th>
                <th>         </th>


            </tr>

        </table>
        <nav aria-label="Page navigation example" dir="ltr">
            <ul class="pagination">
                <li class="page-item" v-for="item in listclass.last_page" v-on:click="changepage(item)"><a class="page-link" href="#">{{ item }}</a></li>
                <li class="page-item"><a class="page-link" href="#">{{$lang.admin.Page}} {{ page }}</a></li>
            </ul>
        </nav>

    </div>
</template>

<script>
    export default {
        name: "classroom",
        data() {
            return {
                data:{
                    page:null
                },
                listclass:[],
            }
        },
        methods: {
            loadclass(){
                let that=this;

                axios.post('/admin/VideoCenter/loadclassfree',this.data)
                    .then(function (response) {
                        that.listclass = response.data;

                    })
            },
            changepage(page){
                this.data.page=page;
                this.loadclass();
            }
        },
        mounted() {
            this.loadclass();
        }


    }
</script>

<style scoped>

</style>