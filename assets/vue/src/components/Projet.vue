<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="12" class="text-right">
                <i class="far fa-times-circle btn"
                    style="color:#afc098; font-size:30px;"
                    @click="$emit('demande-fermer')"
                >
                </i>
                <v-card
                    :loading="loading"
                    class="mx-auto"
                >
                    <v-img
                        height="500"
                        :src="require('../assets/img/' + projet.image)"
                    ></v-img>
                    <v-divider class="mx-4"></v-divider>
                    <div class="pb-2 pr-2"> 
                        <Techniques v-for="tech in projet.techno" :key="tech" :chemintech="tech" />
                    </div>
                </v-card>
            </v-col>
            <v-col cols="12" md="12">

                <span class="h3 mr-2">{{projet.nom}}</span> 
                <i class="fas fa-tag fa-lg"></i>
                <Categorie class="ml-1 mt-2" :chemincat="projet.type" />
                <i class="far fa-calendar-alt fa-lg ml-3"></i>
                <span class="h6 mt-2 ml-1">{{projet.date}}</span>
               
                <h5 class="mt-3">
                    <a :href="projet.lien" target="_blank" style="color:#82c91e">
                        Visiter le site
                    </a>
                </h5>
            </v-col>

        </v-row>
    </v-container>
</template>

<script>

import axios from 'axios'
import Categorie from './Categorie.vue'
import Techniques from './Techniques.vue'

export default {
    name: "Projet",
    components:  {
        Categorie,
        Techniques
    },
    props:{
        chemin: String
    },
    data(){
        return {
            projet: [],
        }
    },
    mounted(){
        axios 
        .get("https://portfolio-narjes.bimingu.com" + this.chemin)
        .then(response => this.projet = response.data)
    },
    
}
</script>

<style scoped>



</style>