<template>
    <div class="row">


        <div class="col-6">
            <h3>Battle in {{ countgame }} Player</h3>
            <h2 v-html="messege"></h2>
            <pre>{{ rollnumber }}</pre>
            <pre>{{ text }}</pre>
            <dice @diceroll="roll"></dice>
            <div>
                active
                <pre>{{ active }}</pre>

                <pre>{{ movinglist }}</pre>
                <ul>
                    <li v-for="player in users">
                        {{ player }}
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-6">
            <pre>
                {{ events }}

            </pre>
        </div>

        </div>
</template>

<script>
    import dice from '../game/dice.vue';

    var VSR = require('voice-speech-recognition');

    export default {
        components: {
            dice
        },
        name: "snakesladders",
        data() {
            return {
               config:{
                    continuous: true, // default: true, interval: {true, false}
                    interimResults: true, // default: true, interval: {true, false}
                    maxAlternatives: 1 ,// default: 1, interval {1, 2, 3, 4, ...}
                    lang: 'fa-IR', // default: 'en-US', one of language localisation
                    grammars: undefined, // default: new SpeechGrammarList()
                    serviceURI: undefined, // default: undefined
                },
                rollnumber:null,
                counter: 0,
                users:[],
                messege:null,
                recognizer:{},
                active:[],
                text:null,
                playeractiver:0,
                countgame:0,
                finalpos:100,
                mytext:null,
                movinglist:[],
                events:{
                    4:{ mode:'Yahoo',target:14 },
                    9:{  mode:'Yahoo',target:31 },
                    17:{  mode:'Snakes',target:7 },
                    20:{  mode:'Yahoo',target:38 },
                    28:{  mode:'Yahoo',target: 84 },
                    40:{  mode:'Yahoo',target:59 },
                    51:{  mode:'Yahoo',target:67 },
                    62:{ mode:'Snakes',target:19 },
                    64:{  mode:'Snakes',target:60 },
                    71:{  mode:'Yahoo',target:91 },
                    93:{  mode:'Snakes',target:73 },
                    95:{  mode:'Snakes',target:77 },
                    87:{  mode:'Snakes',target:24 },
                    99:{  mode:'Snakes',target:87 },
                    54:{  mode:'Snakes',target:34 },
                    63:{  mode:'Yahoo',target:81 },
                }
            }
        },

        methods: {
            roll(data){
                this.rollnumber=data;
                if(this.rollnumber!=6){
                    this.movable();
                    this.playeractiver=this.playeractiver+1;

                }else{

                    if(this.active['gamestart']!=true){

                        this.movinglist[this.playeractiver].gamestart=true;
                    }else{
                        this.movable();
                    }

                }

                console.log(this.recognizer.lastRecognizing);
                this.text=this.recognizer.lastRecognizing;
               this.actiongame();
            },
            movable(){
                if(this.active['gamestart']==true) {

                    let move = this.active['home']+ this.rollnumber;
                    if(this.events[move]){
                        this.messege=this.active['id']+":"+this.events[move].mode+"</br>I move"+move+"to"+this.events[move].target;

                         move=this.events[move].target;

                    };

                    var totaltoend=(this.finalpos+1)-move;
                    console.log(totaltoend);
                    if(totaltoend>0){

                        this.movinglist[this.playeractiver].home = move ;
                        if(move==this.finalpos){
                            alert(this.active['id']+" Victory")
                        }
                    }else{
                        this.messege=this.active['id']+":Can Not Moving";

                    }


                }

            },
            actiongame(){

                if(this.playeractiver==this.countgame){
                    this.playeractiver=0;
                }

                this.active=this.movinglist[this.playeractiver];


            },
                textspeech(){
                this.text = this.recognizer.interimRecognizing ;

            },
            loadgame(){

                let that=this;

              this.users=['blue','green','red','yellow'];
            //    this.users=['blue'];
                this.users.forEach(function(element) {
                    that.movinglist.push({
                        id:element,
                        home:1,
                        gamestart:false
                    })

                });
                this.countgame=this.users.length;
                this.actiongame();

                this.recognizer = VSR.voiceSpeechRecognition(this.config);
                setInterval(function(){ that.textspeech() }, 3000);
                this.recognizer.startRecognition();



            }
        },
        mounted() {
            this.loadgame();
        }
    }
</script>

<style scoped>

</style>
