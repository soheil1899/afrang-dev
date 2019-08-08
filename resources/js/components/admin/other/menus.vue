<template>
    <div>
        <sidebar-menu :menu="menu"   :rtl="true"  :collapsed="true" />

    </div>


</template>

<script>
    export default {
        props: ['menu'],

    }
</script>

<style scoped>

</style>