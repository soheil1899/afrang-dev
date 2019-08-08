<template>
    <div class="container-fluid">



        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" v-for="item in menu" v-if="item.href!='Dashboard'">

                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                <div class="text-body font-weight-bold text-primary text-uppercase mb-1" >                                <i v-bind:class="item.icon"></i> {{ item.title }}
                </div>
                  <ul>
                      <li class="" v-for="menu in item.child">
    <a class="text-xs font-weight-bold text-uppercase mb-2 " dir="rtl" v-bind:href="menu.href" >{{  menu.title }}</a>
                      </li>
                  </ul>

                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        name: "dashboard",
        props:['menu'],
        methods:{
            loaddata:function () {
                this.menu.shift();
                this.menu.shift();
            }

        },
        mounted(){
               this.loaddata();
        }

    }
</script>

<style scoped>
.card-title span{
    font-size: 100px;
}
</style>