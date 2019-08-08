<template>
    <div id="submenu">
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent='submitForm'>

                        <!-- Modal Header -->
                        <div class="modal-header">

                            <h4 class="modal-title" v-text="modalHeading"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div v-if="addMenu">
                                <label v-text="$lang.admin.name"></label>
                                <input v-model="name" class="form-control">
                                <div class="editImage" v-if="editflag">

                                    <img v-bind:src="image2">

                                    <span class="btn btn-danger pointer" v-on:click="deletePic(thisid)">.</span>

                                </div>
                                <label v-text="$lang.admin.Image"></label>
                                <input type="file" ref="image" class="form-control">
                                <label v-text="$lang.admin.Icon"></label>
                                <input v-model="icon" class="form-control">
                                <label v-text="$lang.admin.subname"></label>
                                <input v-model="subname" class="form-control">
                                <label v-text="$lang.admin.Url"></label>
                                <input v-model="url" class="form-control">
                                <error :error="error"></error>


                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" value="save" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <button data-toggle="modal" data-target="#myModal" id="openmodal" class="btn btn-success" v-on:click="newMenu"
                v-text="$lang.admin.NewMenu"></button>
        <button class="btn btn-success" v-on:click="loadpage" v-text="'Reload'"></button>
        <error :error="error"></error>
        <div class="alert alert-danger" v-if="errortext!=null">{{ errortext }}</div>
        <div class="groupname">
            <h3 class="float-right">زیرمنوهای گروه {{ group.name }}</h3>
            <a class="btn btn-secondary float-left back" v-if="gotoback.length == 1" v-on:click="GoBack()" v-bind:href="backurl" v-text="$lang.admin.getback"></a>
            <button class="btn btn-secondary float-left" v-else v-on:click="GoBack()" v-text="$lang.admin.getback"></button>
        </div>

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th v-text="$lang.admin.id"></th>
                <th v-text="$lang.admin.name"></th>
                <th v-text="$lang.admin.subname"></th>
                <th v-text="$lang.admin.subMenu"></th>
                <th v-text="$lang.admin.Url"></th>
                <th v-text="$lang.admin.Edit"></th>
                <th v-text="$lang.admin.Deleted"></th>
            </tr>
            </thead>
            <tbody v-for="item in group.to_group_menu" v-if="item.parent==parent">
            <tr>
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.subname}}</td>
                <td v-on:click="changeparent(item.id,item.parent)" class="pointer" v-text="$lang.admin.subMenu"></td>
                <td>{{item.url}}</td>
                <td @click="editsubmenu(item.id)" class="pointer" v-text="$lang.admin.Edit"></td>
                <td v-on:click="deleteMenu(item.id)" class="pointer" v-text="$lang.admin.Deleted"></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        name: "submenu",
        props: ['id'],
        data() {
            return {
                addMenu: false,
                thisid: null,
                name: null,
                image2: null,
                icon: null,
                subname: null,
                url: null,
                parent: 0,
                errortext: null,
                group: [],
                oldparent: null,
                editflag: false,
                error: [],
                gotoback:[],
                backurl:null,
                modalHeading: null,

            }
        },

        methods: {
            deletePic(imageid) {
                let that = this;
                let data = {
                    ImageId: imageid,
                };
                axios.post('/admin/DeleteImage', data)
                    .then(function (response) {
                        that.image2 = null;
                        that.editflag = false;
                    })
            },

            deleteMenu(id) {
                let that = this;
                let data = {
                    id: id,
                };
                axios.post('/admin/DeleteSubMenu', data)
                    .then(function (response) {

                        that.loadpage();

                    })
                    .catch((error) => {
                        that.errortext = "دارای زیر مجموعه می باشد";
                    });

            },
            editsubmenu(id) {
                this.modalHeading = 'ویرایش منو';

                $('#myModal').modal();
                $('#myModal').show();
                let that = this;
                let data = {
                    id: id,
                };
                axios.post('/admin/EditSubMenu', data)
                    .then(function (response) {

                        that.name = response.data.name;
                        if (response.data.image != null) {
                            that.image2 = response.data.image;
                            that.editflag = true;
                        }else{
                            that.image2 = null;
                            that.editflag = false;
                        }
                        that.addMenu = true;
                        that.icon = response.data.icon;
                        that.subname = response.data.subname;
                        that.url = response.data.url;
                        that.thisid = response.data.id;
                    })
            },

            newMenu() {
                this.addMenu = true;
                this.name = null;
                this.icon = null;
                this.subname = null;
                this.url = null;
                this.editflag = false;
                this.thisid = null;
                this.modalHeading = 'افزودن منو جدید';
            },
            submitForm() {
                let that = this;
                let formData = new FormData();
                formData.append('id', this.id);
                formData.append('thisid', this.thisid);
                formData.append('name', this.name);
                formData.append('icon', this.icon);
                formData.append('parent', this.parent);
                formData.append('url', this.url);
                formData.append('subname', this.subname);
                formData.append('image', this.$refs.image.files[0]);
                console.log(formData);
                axios.post('/admin/Savemenu'
                    , formData
                    , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    })
                    .then(function (response) {
                        $('#myModal').modal('hide');
                        this.modalHeading = null;
                        that.loadpage();

                    })
                    .catch(function (error) {
                        // handle error
                        console.log('dsds');

                    });
            },
            loadpage() {
                let that = this;
                let data = {
                    id: this.id,
                };
                axios.post('/admin/LoadSubMenu', data)
                    .then(function (response) {
                        that.group = response.data;
                        that.errortext = null;
                    })

            },
            loadSub(id){
                this.id = id;
                this.loadpage();
            },
            changeparent(id,parentID) {
                this.oldparent = id;
                this.parent = id;
                this.errortext = null;
                if(parentID!=null){
                    this.gotoback.push(parentID);
                }
            },
            GoBack(){
                if(this.gotoback.length == 1){
                    this.backurl = '/admin/MenuGroup';
                    console.log(this.gotoback);
                }else{
                    let last = this.gotoback[this.gotoback.length-1];
                    this.gotoback.pop();
                    this.changeparent(last,null);
                }
            }

        },
        mounted: function () {
            this.loadpage();
            this.gotoback.push(this.id);
        }

    }
</script>

<style scoped>
    .groupname {
        margin: 20px;
    }
    .pointer {
        cursor: pointer;
    }
    .back{
        color: white !important;
    }
    .close{
        float: left;
        margin: 0 ;
    }
    .editImage{
        margin-top: 10px ;
        width: 100%;
        height: 23px;
    }
    .editImage > *{
        float: left;
    }
    .editImage > span{
        padding: 0 1px;
    }
</style>