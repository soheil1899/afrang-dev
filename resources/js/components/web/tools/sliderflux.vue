<template>
    <div>
    <vue-flux
            :options="fluxOptions"
            :images="fluxImages"
            :transitions="fluxTransitions"
            :captions="fluxCaptions"
            ref="slider">
        <flux-controls slot="controls"></flux-controls>
        <flux-caption slot="caption"></flux-caption>

        <flux-pagination slot="pagination"></flux-pagination>
    </vue-flux>

    </div>

</template>

<script>
    import { VueFlux, FluxPagination, Transitions ,FluxCaption,FluxControls } from 'vue-flux';

    export default {
        props:['id'],
        components: {
            VueFlux,
            FluxPagination,
            FluxCaption,
            FluxControls,

        },

        data: () => ({
            fluxOptions: {
                autoplay: true,
                height:'500px',
            },
            fluxImages: [],

            fluxCaptions: [],
            fluxTransitions: {
                transitionBook: Transitions.transitionFade,
                transitionBook2: Transitions.transitionCamera,

            }
        }),
        mounted() {
            let that=this;
            let data={
                id:this.id,

            };
            axios.post('/LoadSliderFirstpage',data)
                .then(function (response) {
                    console.log(response.data.to_slider);
                    for(var i in response.data.to_slider) {
                        that.fluxImages.push(response.data.to_slider[i].picture);
                        that.fluxCaptions.push(response.data.to_slider[i].name);
                    }


                });
        }
    }

</script>

<style scoped>

</style>