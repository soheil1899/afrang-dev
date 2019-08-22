<template>


    <div>
        <div v-for="(item, index) in articles" :key="item.id">

        <div class="row sampleweb my-0 my-lg-5 py-5" v-if="index%2==0">

            <div class="col-12 col-lg-9 p-lg-0 px-4 order-0 order-lg-1">
                <div class="sampleweb-image">
                    <img :src="portfolioimg(item.to_content)" width="100%">
                </div>
            </div>

            <div class="col-12 col-lg-3 order-1 order-lg-0 position-relative pt-5 pb-0 py-lg-5" dir="ltr">
                <div class="p-lg-5 px-4 webtext">
                    <h3 class="mb-3 webtext-title">
                        {{item.name}}
                    </h3>
                    <div v-html="portfoliotext(item.to_content)">

                    </div>
                </div>
            </div>
        </div>


        <div class="row sampleweb my-0 my-lg-5 py-5" v-else>

            <div class="col-12 col-lg-9 p-lg-0 px-4 order-0">
                <div class="sampleweb-image">
                    <img :src="portfolioimg(item.to_content)" width="100%">
                </div>
            </div>

            <div class="col-12 col-lg-3 order-1 position-relative pt-5 pb-0 py-lg-5" dir="rtl">
                <div class="p-lg-5 px-4 webtext">
                    <h3 class="mb-3 webtext-title">
                        {{item.name}}
                    </h3>
                    <div dir="ltr" v-html="portfoliotext(item.to_content)">
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "portfolioshow",
        props: ['groupid'],
        data() {
            return {
                articles: [],
            }
        },
        methods: {
            loadfunction: function () {
                let that = this;
                let data = {
                    groupid: this.groupid,

                };
                axios.post('LoadPortfolio', data)
                    .then(function (response) {
                        that.articles = response.data.to_article;
                        console.log(that.articles);
                    });
            },
            portfolioimg(contents){
                for (var i=0; i< contents.length; i++){
                    if(contents[i]['methods'] == "Images"){
                        return contents[i]['title'];
                    }
                }
            },
            portfoliotext(contents){
                for (var i=0; i< contents.length; i++){
                    if(contents[i]['methods'] == "Paragraph"){
                        return contents[i]['Text'];
                    }
                }
            },
        },
        mounted: function () {
            console.log(this.groupid);
            this.loadfunction();
        }
    }
</script>

<style scoped>
    .sampleweb:hover .sampleweb-image {
        background-color: rgba(0, 0, 0, 0);
    }

    .sampleweb:hover .sampleweb-image img {
        opacity: 1;
    }

    @media (min-width: 992px) {
        .sampleweb:hover .webtext {
            margin: 0 -30px;
        }

        .webtext {
            width: 160%;
            background-color: #fff;
            z-index: 2;
            box-shadow: 0 0 10px 4px #ccc;
            margin: 0 70px;
            transition: margin 3.5s;
        }
    }

    .webtext-title {
        font-family: Rambla;
        font-weight: bold;
        text-shadow: 0 0 1px;
        color: #ef586a;
        font-size: 25px;
    }

    .sampleweb-image {
        background-color: rgba(0, 0, 0, 0.3);
        width: 100%;
        transition: background-color 1.5s;
    }

    .sampleweb-image img {
        box-shadow: 0 0 10px 4px #ccc;
        opacity: 0.8;
        transition: opacity 1.5s;
    }

</style>