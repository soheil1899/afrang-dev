<template>
    <div id="menugroup">

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <form @submit.prevent="save">
                    <div class="modal-content">


                        <div class="modal-header">

                            <h4 class="modal-title" v-text="modalHeading"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div v-if="menuedit==true" class="modal-body">
                            <label v-text="$lang.admin.name"></label>
                            <input v-model="name" class="form-control">
                            <label v-text="$lang.admin.Language"></label>
                            <select class="form-control" v-model="language">
                                <option v-for="item in lang" v-bind:value="item.id" v-html="item.orgianlname"></option>

                            </select>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" value="save" class="btn btn-primary">
                        </div>


                    </div>
                </form>
            </div>
        </div>

        <button class="btn btn-success" v-on:click="newMenu" v-html="$lang.admin.NewMenu"></button>
        <button class="btn btn-success" v-on:click="loadpage" v-html="'Reload'"></button>
        <error :error="error"></error>


        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th v-text="$lang.admin.id"></th>
                <th v-text="$lang.admin.name"></th>
                <th v-text="$lang.admin.Language"></th>
                <th v-text="$lang.admin.subMenu"></th>
                <th v-text="$lang.admin.Edit"></th>
                <th v-text="$lang.admin.Deleted"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in grouplist">
                <td v-text="item.id"></td>
                <td v-text="item.name"></td>
                <td v-text="item.to_lang.orgianlname"></td>
                <td><a v-bind:href="'/admin/MenuGroup/'+item.id" v-text="$lang.admin.subMenu"></a></td>
                <td v-on:click="editMenu(item.id)" v-text="$lang.admin.Edit"></td>
                <td v-on:click="deletemenu(item.id)" v-text="$lang.admin.Deleted"></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        name: "menugroup",
        data() {
            return {
                menuedit: false,
                lang: [],
                name: null,
                language: null,
                id: null,
                error: [],
                grouplist: [],
                modalHeading: null,


            }
        },

        methods: {
            deletemenu(id) {
                let that = this;
                let data = {
                    id: id,
                };
                axios.post('/admin/DeleteMenuGroup', data)
                    .then(function (response) {
                        console.log(response);

                        that.loadpage();
                    })

            },
            save() {
                let that = this;
                let data = {
                    id: this.id,
                    name: this.name,
                    lang: this.language,
                };
                axios.post('/admin/SaveMenuGroup', data)
                    .then(function (response) {
                        this.modalHeading = null;

                        $('#myModal').modal('hide');
                        that.error = [];
                        that.loadpage();
                        that.menuedit = false;

                    })


            },
            newMenu: function () {
                this.modalHeading = 'افزودن گروه جدید';
                $('#myModal').modal();
                $('#myModal').show();
                this.id = null;
                this.name = null;
                this.language = null;
                this.menuedit = true;
            },
            editMenu: function (id) {
                this.modalHeading = 'ویرایش گروه';
                $('#myModal').modal();
                $('#myModal').show();
                let that = this;
                let data = {
                    id: id
                };
                axios.post('/admin/LoadMenuGroup', data)
                    .then(function (response) {
                        that.id = response.data.id;
                        that.name = response.data.name;
                        that.language = response.data.lang;
                    });
                this.menuedit = true;
            },
            loadpage() {
                let that = this;
                axios.post('/getlang')
                    .then(function (response) {
                        that.lang = response.data;
                    });
                that.reloadgroup();


            },
            reloadgroup() {
                let that = this;

                axios.post('/admin/getMenuGroup')
                    .then(function (response) {
                        that.grouplist = response.data;
                    })
            }
        },
        mounted: function () {
            this.loadpage();
        }

    }
</script>

<style scoped>


    .close{
        float: left;
        margin: 0 ;
    }
</style>