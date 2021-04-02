<template>
    <span class="h6">{{categorie.nom}}</span>
</template>
<script>
import axios from 'axios'
export default {
    name: "Categorie",
    props:{
        chemincat: String,
    },
    data(){
        return {
            categorie: [],
        }
    },
    mounted(){
        axios
        .get("https://portfolio-narjes.bimingu.com" + this.chemincat)
        .then(response => this.categorie = response.data)

    }
    
}
</script>