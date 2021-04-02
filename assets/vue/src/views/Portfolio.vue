<template>
  <v-row class="back">
      <v-col 
            v-for="projet in projets"
            :key="projet"
            cols="12" 
            :id="projet.id" 
            style="display:none"
            class="margeQueri"
      >
        <Projet :chemin="projet['@id']"  @demande-fermer="fermer(projet.id)"/>

      </v-col>

    <v-col cols="12" xs="12" sm="12" md="12" lg="8" offset-lg="1" id="image">
        <v-container fluid>
          <v-row>
            <v-col
              v-for="projet in projets"
              :key="projet"
              class="d-flex child-flex"
              cols="12"
              xs="12"
              sm="6"
              md="6"
              lg="4"
            >
              <v-hover v-slot:default="{ hover }">
              <v-card flat tile class="d-flex" @click="click(projet.id)">

                <v-img
                  :src="require('../assets/img/' + projet.background)"
                  aspect-ratio="1"
                  class="grey lighten-2"
                >
                <v-expand-transition>
                  <div
                    v-if="hover"
                    class="d-flex transition-fast-in-fast-out green darken-2 v-card--reveal display-3 white--text"
                    style="height: 100%;"
                  >
                    <i class="fas fa-plus"></i>
                  </div>
                </v-expand-transition>
                <v-card-title class="titre font-weight-bold">
                  <h5>{{projet.nom}}</h5>
                </v-card-title>
                  <template v-slot:placeholder>
                    <v-row
                      class="fill-height ma-0"
                      align="center"
                      justify="center"
                    >
                      <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                    </v-row>
                  </template>
                </v-img>
              </v-card>
               </v-hover>
            </v-col>
          </v-row>
        </v-container>
    </v-col>
  </v-row>
</template>

<script>

import axios from 'axios'
import Projet from '../components/Projet'

export default {
    name: 'Portfolio',
    components: {
      Projet,
    }, 
    data() {
      return{
        projets: [],
      }
    },
    mounted() {
      axios 
        .get('https://portfolio-narjes.bimingu.com/api/projets')
        .then(response => this.projets= response.data['hydra:member'])     
    },
    methods:{
      click: function(x){
        let projet = document.getElementById(x);
        let image = document.getElementById('image');

        image.style.display="none";
        projet.style.display="block";
      },
      
      fermer: function(x){
        let projet = document.getElementById(x);
        let image = document.getElementById('image');

        image.style.display="block";
        projet.style.display="none";
      },

    }
    
}
</script>

<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');


@media (max-width: 1060px) { 
  .back{
    padding-bottom: 50%;
    margin-top: 20%;
      font-family: 'Concert One', cursive;

  }

}

@media (max-width: 670px) { 
  .back{
    padding-bottom: 50%;
    margin-top: 20%;
      font-family: 'Concert One', cursive;

  }
}

@media (min-width: 1060px) { 
  .back{
    padding-bottom: 10%;
    padding-left: 5%;
    font-family: 'Concert One', cursive;
    margin-left:5%;
    margin-bottom: 20%;
  }

}

.v-card--reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: .5;
  position: absolute;
  width: 100%;
}

.titre{
  font-family: 'Concert One', cursive;
  color: #82c91e;
  margin-top: 15%;
  text-align: center;
}

.carte{
  height: 100%;
}

</style>