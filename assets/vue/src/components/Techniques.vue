<template>
        <v-btn
        class="btn ml-2 p-2 font-weight-bold"
        color="#82c91e"
        outlined
        >
            {{technique.nom}}
        </v-btn>
</template>
<script>
import axios from 'axios'
export default {
    name: "Techniques",
    props:{
        chemintech: String,
    },
    data(){
        return {
            technique: String,
        }
    },
    mounted(){
        axios
        .get("https://portfolio-narjes.bimingu.com" + this.chemintech)
        .then(response => this.technique = response.data)

    }
    
}
</script>
<style scoped>
</style>