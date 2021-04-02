<template>
  <div class="back">
  <v-container fluid>
    <v-row class="p-5">
      <v-col cols="12">
        <h2>COMPETENCES EN DÉVELOPPEMENT WEB</h2>
      </v-col>
      <v-col
          v-for="(techno,index) in group"
          :key="index"
          cols="12"
          sm="6"
          md="6"
          lg="3"
          class="text-center marge"
          offset-xs="2"
      >
        <v-card
          max-width="300"
          height="500px"
          class="padding"
          id="card"
          @mouseover= disp(techno.icon,techno.nom,techno.id)
          @mouseleave= show(techno.icon,techno.nom,techno.id)
        >

          <p id="icon" class="couleur"><i :class= "techno.icon" :id="techno.icon"></i></p>

          <h3 class="nom" :id="techno.nom">{{techno.nom}}</h3>

          <div :id="techno.id" style="display:none">
          <Techno v-for="(tech,index) in techno.technologies" :key="index" :chemin="tech" />
          </div>

        </v-card>
      </v-col>
      <v-col cols="12" class="text-center mt-5 animate__animated animate__heartBeat animate__delay-5s">
        <i class="fas fa-thumbtack mr-3"
        style="color:rgb(141, 121, 141); font-size:30px"
        ></i>
        <span class="h4 paragraph">J'ai développé ce portfolio, sous Linux, en utilisant les technologies: Symfony, Vuejs et Vuetify.</span>
      </v-col>
    </v-row>
  </v-container>
  </div>
</template>

<script>
import axios from 'axios'
import Techno from '../components/Techno'

export default {
    name:'Skills',
    components: {
      Techno,
    }, 
    data() {
      return{
        group: [],
      }
    },

    mounted() {
      axios
      .get('https://portfolio-narjes.bimingu.com/api/groupes')
      .then(response => this.group = response.data['hydra:member'])
    },

    methods: {
      disp: function(x,y,z){
        let icon = document.getElementById(x);
        let name = document.getElementById(y);
        let techno = document.getElementById(z);

        icon.style.display="none";
        name.style.display="none";
        techno.style.display="block";
      },
      
      show: function(x,y,z){
        let icon = document.getElementById(x);
        let name = document.getElementById(y);
        let techno = document.getElementById(z);

        icon.style.display="block";
        name.style.display="block";
        techno.style.display="none";
      }

    }

}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

@media (max-width: 1060px) { 
  .back{
    margin-bottom: 15%;
    margin-top: 7%;
  }
}

@media (max-width: 670px) { 
  .back{
    margin-bottom: 25%;
    margin-top: 3%;
  }
}

@media(min-width: 1060px){
  .back{
    margin-left:5%;

  }
}


.back{
    height: 100%;
    margin-bottom: 5%;
}

.rowpad{
  padding-top:6%;
  padding-left: 15%;

}

h2{
    color: #f783ac;
    font-family: 'Concert One', cursive;
    font-weight: bold;
    font-size: 3em;
}
.paragraph{
    color: rgb(141, 121, 141);
    font-family: 'Concert One', cursive;
    font-weight: bold;
}

.marge{
  margin-top: 5%;
}

.padding{
  padding-top: 35%;
  background-color: transparent;
  border: solid rgb(141, 121, 141);
}
.nom{
  font-family: 'Concert One', cursive;
  color: #f783ac;
  font-size: 2em;
  margin-top: 70px;
}

#icon{
  font-size: 50px;
  color: rgb(141, 121, 141)
}

#card:hover{
  background-color: rgb(141, 121, 141); opacity: 0.5;
}

</style>