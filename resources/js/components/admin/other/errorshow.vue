<template>
    <ul class="list-group">

        <div class="alert alert-warning alert-dismissible fade show" v-for="item in error.response.data.errors " role="alert">
            <div v-for="itmes in item ">
                {{  itmes }}

            </div>

        </div>
    </ul>
</template>

<script>
    export default {
        name: "errorshow",
        props:['error'],

        methods: {
           showerror:function () {

           }
        },
        mounted: function () {
            this.showerror();
        }
    }
</script>

<style scoped>

</style>