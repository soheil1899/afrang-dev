<template>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="boxfirstpage">
                <h4 class="namefirstpage1">{{ toppage.data1 }}</h4>
                <h5 class="namefirstpage2">{{ toppage.data2 }}</h5>
                <h6 class="namefirstpage3">{{ toppage.data3 }}</h6>
                <template v-if="toppage.searchbox=='1'">
                    <search></search>
                </template>
            </div>

        </div>
        <div class="col-md-6 col-xs-12">
            <img :src="toppage.header" class="img-fluid img-firstpage">

        </div>
        <div class="col-sm-12 border2">

        </div>
    </div>

</template>

<script>
    export default {
        name: "firstpage",
        data() {
            return {
                toppage: {
                    data1: null,
                    data2: null,
                    data3: null,
                    data4: '',
                    data5: null,
                    data6: null,
                    data7: null,
                    searchbox: null,
                }
            }
        },
        methods: {
            loadfirtspage() {
                let that = this;
                axios.post('/Loadfirstpage')
                    .then(function (response) {
                        response.data.forEach(function (element) {
                            let data2 = element.name;
                            that.toppage[data2] = element.data;
                        });

                    });


            }
        },
        mounted: function () {
            this.loadfirtspage();

        }

    }
</script>

<style scoped>
    .boxfirstpage {
        margin-top: 30%;
        text-align: right;
        padding: 10%;
    }

    .namefirstpage1 {
        font-size: 21px;
        font-weight: bold;
    }

    .namefirstpage2 {
        font-size: 40px;
        font-weight: bold;
        color: red;
    }

    .namefirstpage3 {
        font-size: 30px;
        font-weight: bold;
        margin-top: 10px;
    }

    .img-firstpage {
        padding: 5%;
    }
    .row{
        margin: 0px !important;
    }
    .border2{
        width: 100%;
        height: 100px;
        -webkit-box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);
        -moz-box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);
        box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);

    }
</style>