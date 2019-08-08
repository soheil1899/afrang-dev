<template>
    <div  >
        <div class="card">
            <div class="card-header">
                <slot name="options"></slot>
            </div>
            <div class="card-body">
                <slot name="body"></slot>
                <slot name="filemanager"></slot>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['id'],
        data(){
            return{


            }
        },
        methods: {

        },
        mounted: function () {

        }

        }

</script>
