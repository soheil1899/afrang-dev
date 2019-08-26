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


        <nav aria-label="Page navigation example" v-if="meta.last_page > 1">
            <ul class="pagination justify-content-center">
                <li class="page-item pointer" v-on:click="gobackpage">
                    <a class="page-link pagination-portfolio" tabindex="-1">Previous</a>
                </li>
                <li class="page-item pointer" v-for="i in meta.last_page" v-on:click="loadfunction(i)"><a
                        class="page-link pagination-portfolio" :style="activebtn(i)">{{ i }}</a></li>
                <li class="page-item pointer" v-on:click="gonextpage">
                    <a class="page-link pagination-portfolio">Next</a>
                </li>
            </ul>
        </nav>


    </div>
</template>

<script>
    export default {
        name: "portfolioshow",
        props: ['groupid'],
        data() {
            return {
                meta: [],
                articles: [],
                currentpage: null,
            }
        },
        methods: {
            loadfunction: function (page = 1) {
                this.currentpage = page;
                let that = this;
                let data = {
                    groupid: this.groupid,
                    page: page,

                };
                axios.post('LoadPortfolio', data)
                    .then(function (response) {
                        console.log(response.data);
                        that.articles = response.data.data;
                        that.meta = response.data.meta;
                    });


            },
            gobackpage() {
                if (this.currentpage != 1) {
                    this.loadfunction(this.currentpage - 1);
                }
            },
            gonextpage() {
                if (this.currentpage != this.meta.last_page) {
                    this.loadfunction(this.currentpage + 1);
                }
            },
            activebtn(i) {
                if (i == this.currentpage) {
                    return "background-color: #e3e4e4;";
                }
            },
            portfolioimg(contents) {
                for (var i = 0; i < contents.length; i++) {
                    if (contents[i]['methods'] == "Images") {
                        return contents[i]['title'];
                    }
                }
            },
            portfoliotext(contents) {
                for (var i = 0; i < contents.length; i++) {
                    if (contents[i]['methods'] == "Paragraph") {
                        return contents[i]['Text'];
                    }
                }
            },
        },
        mounted: function () {
            this.loadfunction();
        }
    }
</script>

<style scoped>
    .pagination-portfolio {
        color: #000 !important;

    }

</style>