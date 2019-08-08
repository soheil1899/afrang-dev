<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">

                <div class="modal-header">
                    <slot name="header">

                        {{ titlemodal }}
                    </slot>
                </div>

                <div class="modal-body">
                    <slot name="body">

                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">



                    </slot>



                </div>
            </div>
        </div>
    </div>
    </template>
<script>
    export default {
        props: ['name','titlemodal'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
