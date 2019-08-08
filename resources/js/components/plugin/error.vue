<template>
    <div>
        <div v-if="error!=null">
            <div v-for="item in error">
                <div v-for="i in item " class="alert alert-success" v-html="i">
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        name: "error",
        props: ['error'],
    }
</script>

<style scoped>

</style>