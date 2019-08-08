<template>
    <div>
        <div class="boxsearch">
            <div class="boxbtn">


            </div>
            <div>
                <input class="inputbox" v-bind:placeholder="$lang.store.Whatareyoulookingfor">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "searchbox",
        data(){
            return{

            }
        },
        methods:{

        },
        mounted:function () {

        }
    }
</script>

<style scoped>
    .inputbox{
        width: 80%;
        height: 45px;
        padding: 14px;
        border: none;
        background-color: transparent;
    }
.boxsearch{
    width: 100%;
    border: solid 1px #9e9e9e;
    height: 50px;
    border-radius: 10px;
}
    .boxbtn{ width: 20%; height: 50px; background-color: #ff6661;
        border-radius: 10px;
        cursor: pointer;
    float: left;}
    .boxbtn:focus {outline:0 !important;}
</style>