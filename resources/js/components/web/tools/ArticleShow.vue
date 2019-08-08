<template>

    <div>

        <div v-for="item in article.to_content">
                <div v-if="item.methods=='Paragraph'">
                   <p v-html="item.Text"></p>
                </div>
            <div v-if="item.methods=='Title'">
                <h3>{{ item.title }}</h3>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props:['id'],
        data(){
            return{
                article:[],

            }
        },
            methods:{
            loadfunction:function () {
                let that=this;
                let data={
                    id:this.id,

                };
                axios.post('/loadarticle',data)
                    .then(function (response) {
                        console.log(response.data.to_content);
                        that.article=response.data;

                    });
            }
        },
        mounted:function () {
            this.loadfunction();
        }
    }
</script>

<style scoped>

</style>