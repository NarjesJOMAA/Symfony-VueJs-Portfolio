<template>
    <div>
        <p v-if="techno.icon != null">
            <i :class= "techno.icon" id="icon"></i>
        </p>
        <p v-else class="nom">
            {{techno.nom}}
        </p>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:"Techno",
        
    props: {
        chemin: String
    },

    data() {
        return{
            techno: String,
        }
    },
    mounted() {
      axios 
        .get('https://portfolio-narjes.bimingu.com'+ this.chemin)
        .then(response => this.techno= response.data)     
    },
}
</script>
<style scoped>

#icon{
  font-size: 50px;
  color: white;
}

.nom{
    font-weight: bold;
    color: white;
    font-size: 20px;
}

</style>