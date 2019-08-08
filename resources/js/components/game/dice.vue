<template>
    <div>
        <button class="btn btm-success"  v-on:click="rolled" v-text="'Dices'"></button>
    </div>
</template>

<script>
    export default {
        name: "dice",
        data() {
            return {
                dicechance:null,
                min:1,
                max:6
            }
        },

        methods: {
            rolled(){
                this.dicechance=Math.floor(Math.random()*(this.max-this.min+1)+this.min);
                this.$emit('diceroll', this.dicechance);
            }
        }
    }
</script>

<style scoped>

</style>
