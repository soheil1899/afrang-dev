<template>

    <div>
        <div v-if="flag=='firstpagework'">
            <div class="pb-4 row m-0 d-block text-center">
                <img :src="imageurl" width="70%">
            </div>
            <div class="row m-0 d-block text-center">
                <h4><strong>
                    {{article.name}}
                </strong></h4>
                <div v-html="paragraph">
                </div>
            </div>
        </div>

        <div style="padding-top: 150px; padding-bottom: 150px;background-color: #f1f3f5" class="shadow-sm" dir="ltr"
             v-if="flag=='firstpageaboutus'">
            <div class="container text-center">
                <div class="mx-auto px-3 widthfit">
                    <img :src="imageurl" class="mb-5" width="100%">
                </div>
                <div class="px-5" v-html="paragraph">

                </div>
            </div>
        </div>

        <div v-if="flag=='firstpageteampic'">
            <div class="mx-auto widthfit">
                <img class="pointer team-img mb-4" :src="imageurl" width="100%">
            </div>
            <h5><strong>{{article.name}}</strong></h5>
            <small v-html="paragraph"></small>
        </div>

        <div v-if="flag=='firstpageteamdes'">
            <p class="team-desc text-center" v-html="paragraph">
            </p>
        </div>

        <div v-if="flag=='footer'">
            <p class="team-desc footerabout" v-html="paragraph">
            </p>
        </div>

        <div v-if="flag=='afrangteamdes'">
            <p class="team-desc" v-html="paragraph">
            </p>
        </div>

        <div class="position-relative team-box" v-if="flag=='afrangteam'">
            <div class="position-absolute team-image">
                <div class="mx-auto">
                    <img class="our-img pointer" :src="imageurl">
                </div>
            </div>
            <h4><strong>{{article.name}}</strong></h4>
            <small>{{title}}</small>
            <div class="text-left px-4 py-3">
                <p v-html="paragraph">
                </p>
            </div>
            <div class="py-3 position-absolute team-footer">
                <i class="far fa-envelope fa-lg mx-1 my-0"></i>
                <label class="m-0">
                    {{article.writter}}
                </label>
            </div>
        </div>

        <div class="row mx-0" v-if="flag=='aboutafrangtop'">
            <div class="col-12 order-1 order-lg-0 col-lg-5 padding60">
                <h3 class="mb-3 aboutafrang">
                    About Afrang
                </h3>
                <div>
                    <p class="team-desc" v-html="paragraph">
                    </p>
                </div>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img :src="imageurl" width="100%">
            </div>
        </div>

        <div class="ourworks shadow-sm padding150" dir="ltr" v-if="flag=='aboutafrangbottom'">
            <div class="container text-center">
                <h3 class="mb-5"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 35px">
                    WE PROMOTE YOUR BUSINESS
                </h3>
                <div class="row pt-4">
                    <div class="col-12 col-lg-5">
                        <img :src="imageurl" width="100%" style="box-shadow: 0 0 10px 2px #b2b457">
                    </div>
                    <div class="col-12 pt-5 pt-lg-0 col-lg-7 px-5 text-left">

                        <div class="mb-5">
                            <h5 class="mb-3 pb-1"
                                style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #5879ec">
                                {{titlearray[0]}}
                            </h5>
                            <p class="team-desc" v-html="paragrapharray[0]">
                            </p>
                        </div>
                        <div class="mb-5">
                            <h5 class="mb-3 pb-1"
                                style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #028c32">
                                {{titlearray[1]}}
                            </h5>
                            <p class="team-desc" v-html="paragrapharray[1]">
                            </p>
                        </div>
                        <div class="mb-5">
                            <h5 class="mb-3 pb-1"
                                style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #e84a60">
                                {{titlearray[2]}}
                            </h5>
                            <p class="team-desc" v-html="paragrapharray[2]">
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="row mx-0" v-if="flag=='portfoliotop'">
            <div class="col-12 order-1 order-lg-0 col-lg-5 padding60">
                <h3 class="mb-3 aboutafrang">
                    Our Portfolio
                </h3>
                <div>
                    <p class="team-desc" v-html="paragraph">
                    </p>
                </div>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img :src="imageurl" width="100%">
            </div>
        </div>


    </div>


</template>

<script>
    export default {
        props: ['id', 'flag'],
        data() {
            return {
                article: [],
                imageurl: null,
                paragraph: null,
                paragrapharray: [],
                titlearray: [],
                title: null,
                email: null,

            }
        },
        methods: {
            loadfunction: function () {
                let that = this;
                let data = {
                    id: this.id,

                };
                axios.post('LoadArticle', data)
                    .then(function (response) {
                        that.article = response.data;
                        that.email = response.data.writter;
                        for (var i = 0; i < response.data.to_content.length; i++) {
                            if (response.data.to_content[i]['methods'] == 'Images') {
                                that.imageurl = response.data.to_content[i]['title'];
                            } else if (response.data.to_content[i]['methods'] == 'Paragraph') {
                                that.paragraph = response.data.to_content[i]['Text'];
                            } else if (response.data.to_content[i]['methods'] == 'Title') {
                                that.title = response.data.to_content[i]['title'];
                            }
                        }

                        if (that.id == 24) {
                            let counter_p = 0;
                            let counter_t = 0;
                            for (var i = 0; i < response.data.to_content.length; i++) {
                                if (response.data.to_content[i]['methods'] == 'Paragraph') {
                                    that.paragrapharray[counter_p] = response.data.to_content[i]['Text'];
                                    counter_p++;
                                } else if (response.data.to_content[i]['methods'] == 'Title') {
                                    that.titlearray[counter_t] = response.data.to_content[i]['title'];
                                    counter_t++;
                                }
                            }
                        }


                    });
            }
        },
        mounted: function () {
            this.loadfunction();
        }
    }
</script>

<style scoped>


</style>