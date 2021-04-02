<template>
    <v-container fluid class="text-center back"> 
      <v-row>
        <v-col cols="12" class="text-right">
        </v-col>

        <v-col cols="12" class="section">
          <img src="../assets/img/logo.png" class="img-fluid">
          <h2 id="web" class="job mt-5"></h2>
          <h2 id="phys" class="job mt-5"></h2>
        </v-col>
      </v-row>
    </v-container>
</template>

<script>
export default {
  name: 'Home',
  data: () => ({ 
      web:"DEVELOPPEUSE WEB FULL STACK JUNIOR",   
      phys:"DOCTEUR EN PHYSIQUE",
      myArray1: [],
      myArray2:[],
      socials: [
        {
          icon: 'mdi-facebook',
          color: 'indigo',
        },
        {
          icon: 'mdi-linkedin',
          color: 'cyan darken-1',
        },
        {
          icon: 'mdi-instagram',
          color: 'red lighten-3',
        },
      ],
  }),
  methods:{
    loop(){
      if(this.myArray1.length > 0){
        document.getElementById("web").innerHTML += this.myArray1.shift();
      }else if (this.myArray2.length > 0){
        document.getElementById("phys").innerHTML += this.myArray2.shift();
      }else{
        clearInterval(this.loop());
      }
      setTimeout(()=> {this.loop()},70);
    },
  },
  mounted(){
      /* let web = this.$t('dev'); */
      this.myArray1 = this.web.split("");
      this.myArray2 = this.phys.split("");
      this.loop();
  },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');


@media (max-width: 1060px) { 
  .section{
    padding-top: 30%;
  }
}

@media (min-width: 1060px) { 
  .section{
    padding-top: 15%;
  }

  .back{
    margin-bottom: 20%;
  }
}

.img{
  width: 7%;
}

.job{
  font-family: 'Concert One', cursive;
  font-size: 3em;
  color: #221f5f;
}

.butmarg{
  margin-top: 8%;
}

.social{
  margin-top: 5%;
}

</style>
