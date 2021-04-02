<template>
    <div class="back">
        <v-container id="presentation">
            <v-row class="p-5">
                <v-col cols="12" sm="12" md="12" lg="10">
                    <h2>QUI SUIS-JE?</h2>
                    <br/>
                    <h3 id="bonjour"></h3>
                    <h3 id="presentation1"></h3>
                </v-col>
                <v-col cols="12" sm="12" md="12" lg="2" class=" text-center marg">
                  <v-btn
                  class="ma-2"
                  outlined
                  x-large
                  fab
                  color="#303f9f"
                  >
                    <i class="fas fa-id-card" @click="open()" style="color:#303f9f; font-size:40px"
                    ></i>
                  </v-btn>

                  <p style="color:#303f9f;font-family: 'Concert One', cursive;font-size: 25px;">Mon CV</p>
                </v-col>
                <v-col cols="12">
                  <h3 id="voyage"></h3>
                </v-col>
                <v-col cols="12">
                  <v-carousel
                      id="carousel"
                      cycle
                      width="600"
                      height="400"
                      hide-delimiter-background
                      show-arrows-on-hover
                  >
                      <v-carousel-item
                      v-for="(slide, i) in slides"
                      :key="i"
                      :src="require('../assets/img/images/' + slide.image)"
                      >
                      <v-sheet
                          color="transparent"
                          height="100%"
                      >
                          <v-row
                          class="fill-height"
                          align="center"
                          justify="center"
                          >
                          <div class="display-3">
                              {{ slide.nom }}
                          </div>
                          </v-row>
                      </v-sheet>
                      </v-carousel-item>
                  </v-carousel>
                </v-col>
            </v-row>
        </v-container>
        <v-container fluid id="cv">
            <v-row class="pt-1 pl-5">
                <v-btn
                    class="ma-2"
                    outlined
                    large
                    fab
                    color="#303f9f"
                >
                  <i class="fas fa-arrow-left"
                      style="color:#303f9f; font-size:30px;"
                      @click="fermer()"
                  >
                  </i>
                </v-btn>
            </v-row>
            <v-row class="text-center titre">
                <v-timeline>
                    <v-timeline-item
                    v-for="(year, i) in years"
                    :key="i"
                    :color="year.color"
                    :icon="year.icon"
                    large
                    >
                    <template v-slot:opposite>
                        <span
                        :class="`headline font-weight-bold ${year.color}--text`"
                        v-text="year.year"
                        ></span>
                    </template>
                    <div class="py-4">
                        <h3 :class="`headline font-weight-bold mb-4 ${year.color}--text`">
                        {{year.title}}
                        </h3>
                        <div>
                            <h5>{{year.text}}</h5>
                        </div>
                    </div>
                    </v-timeline-item>
                </v-timeline>
            </v-row>
        </v-container>
    </div>
</template>
<script>

export default {
    name:'User', 
    data: () => ({
        bonjour: "Bonjour et bienvenue, ",
        presentation1: "Je m'appelle Narjes et je suis née en 1988. Je suis Docteur en physique passionnée par la programmation. J'ai choisi donc de m'orienter vers le développement web. Je suis officiellement développeuse web dépuis Décembre 2020.",
        voyage:"C'est dans le voyage que je réussisse à me connaître et à me retrouver!",
        myArray1: [],
        myArray2:[],
        myArray3:[],
        slides: [
          {
            image: 'cahors.jpeg',
            nom: 'Cahors',
          },
          {
            image: 'saint-cirq-lapopie.jpeg',
            nom: 'Saint-cirq-Lapopie',
          },
          {
            image: 'bordeaux.jpg',
            nom: 'Bordeaux',
          },
          {
            image: 'rocamadour.jpeg',
            nom: 'Rocamadour',
          },
          {
            image: 'evian.jpeg',
            nom: 'Evian',
          },
          {
            image: 'lille.jpg',
            nom: 'Lille',
          },
          {
            image: 'strasbourg.jpg',
            nom: 'Strasbourg',
          },
          {
            image: 'lyon.jpg',
            nom: 'Lyon',
          },
          {
            image: 'marseille.jpg',
            nom: 'Marseille',
          },
          {
            image: 'paris.jpg',
            nom: 'Paris',
          },
          {
            image: 'morges.jpeg',
            nom: 'Morges',
          },
          {
            image: 'lausanne.jpeg',
            nom: 'Lausanne',
          },
          {
            image: 'Montreux.jpeg',
            nom: 'Montreux',
          },
          {
            image: 'gruyere.jpeg',
            nom: 'Gruyère',
          },
          {
            image: 'zurich.jpeg',
            nom: 'Zurich',
          },
          {
            image: 'venise.jpg',
            nom: 'Venise',
          },
          {
            image: 'bruges.jpg',
            nom: 'Bruges',
          },
          {
            image: 'sidi-bou-said.jpg',
            nom: 'Sidi bou said',
          },
          {
            image: 'hammamet.jpg',
            nom: 'Hammamet',
          },
          {
            image: 'tozeur.jpg',
            nom: 'Tozeur',
          },

        ],
        years: [
        {
          color: 'cyan',
          year: '2020',
          icon: 'mdi-desktop-mac-dashboard',
          title:'Développeuse web full stack',
          text:"Reconversion professionnelle: Formation en développement web dont 2 mois de stage comme développeuse front-end chez Icohup - Limoges"
        },
        {
          color: 'green',
          year: '2018',
          icon: 'mdi-atom',
          title:'Collaboratrice scientifique',
          text:"J'ai exploité mes connaissances en programmation pour étudier les propriétés mécaniques des composants mésoscopiques - Lausanne"
        },
        {
          color: 'pink',
          year: '2017',
          icon: 'mdi-school',
          title:'Thèse de doctorat',
          text:"J'ai étudié théoriquement les propriétés électroniques des nano-fils semi-conducteurs - Tunisie"
        },
        {
          color: 'amber',
          year: '2014',
          icon: 'mdi-chart-line',
          title:'Enseignante vacataire',
          text:"J'ai enseigné les sciences physiques à l'institut préparatoire aux études d'ingénieur de Monastir - Tunisie"
        },
      ],
    }), 
    methods:{
      open: function(){
        let cv = document.getElementById('cv');
        let presentation = document.getElementById('presentation');
        let carousel = document.getElementById('carousel');

        carousel.style.display="none";
        presentation.style.display="none";
        cv.style.display="block";
      },
      
      fermer: function(){
        let cv = document.getElementById('cv');
        let presentation = document.getElementById('presentation');
        let carousel = document.getElementById('carousel');

        carousel.style.display="block";
        presentation.style.display="block";
        cv.style.display="none";
      },

      loop(){
        if(this.myArray1.length > 0 ){

          document.getElementById("bonjour").innerHTML += this.myArray1.shift();

        }else if (this.myArray2.length > 0 ){

          document.getElementById("presentation1").innerHTML += this.myArray2.shift();

        }else if (this.myArray3.length > 0 ){
          document.getElementById("voyage").innerHTML += this.myArray3.shift();
        }else{
          let carousel = document.getElementById('carousel');
          carousel.style.display="block";
          clearInterval(this.loop());
        }
        setTimeout(()=> {this.loop()},50);
      },
    },
    mounted(){
      this.myArray1 = this.bonjour.split("");
      this.myArray2 = this.presentation1.split("");
      this.myArray3 = this.voyage.split("");
      this.loop();
    },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap');

@media (max-width: 1060px) { 
  .back{
    margin-bottom: 15%;
    margin-top: 7%;
  }
  #cv{
    margin-top: 5%;
  }
}

@media (max-width: 670px) { 
  .back{
    margin-bottom: 25%;
    margin-top: 3%;
  }
  #cv{
    margin-top: 5%;
  }
}

@media (min-width: 1060px) { 
  .back{
    margin-bottom: 5%;
    margin-left:5%;
  }
}

.back{
    height: 100%;
    margin-bottom: 10%;
}

h2{
    color: #303f9f;
    font-family: 'Concert One', cursive;
    font-weight: bold;
    font-size: 3em;
}

h3{
    font-family: 'Lato', sans-serif;
    margin-top: 2%;
}

.titre{
    font-family: 'Concert One', cursive;
}
.marg{
    margin-top: 10%;
}
#carousel{
  display: none;
}
#cv{
  display:none;
}

</style>