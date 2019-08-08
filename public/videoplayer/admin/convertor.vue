<template>
    <div>
        <select class="form-control">
            <option>kffdkj</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "convertor",
        props: ['token'],
        data(){
            return{
            }
        },
        methods: {
            loadfiles:function () {
                let that=this;



                axios.post('/admin/VideoCenter/listfiles')
                    .then(function (response) {
                       console.log(response.data);

                    });
            }
        },
        mounted: function () {
            this.loadfiles();
        }


    }
</script>

<style scoped>

</style>