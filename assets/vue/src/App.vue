<template>
  <v-app>
    <v-app-bar
      absolute
      color="white"
      id="appbar"
      extended="true"
      class="p-3"
    >
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <router-link :to="`/${$i18n.locale}`">
              <i 
              class="fas fa-home mr-5" style="color:#f8d64d; font-size:30px"
              v-bind="attrs"
              v-on="on"
              >
              </i>
          </router-link>
        </template>
        <span>Accueil</span>
      </v-tooltip>
      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <router-link :to="`/${$i18n.locale}/user`">
              <i 
              class="far fa-user mr-5" style="color:#303f9f; font-size:30px"
              v-bind="attrs"
              v-on="on"
              >
              </i>
          </router-link>
        </template>
        <span>à propos</span>
      </v-tooltip>
      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <router-link :to="`/${$i18n.locale}/skills`">
              <i 
              class="fas fa-laptop-code mr-5" style="color:#f783ac; font-size:30px"
              v-bind="attrs"
              v-on="on"
              >
              </i>
          </router-link>
        </template>
        <span>competences</span>
      </v-tooltip>
      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <router-link :to="`/${$i18n.locale}/portfolio`">
              <i 
              class="far fa-eye mr-5" style="color:#82c91e; font-size:30px"
              v-bind="attrs"
              v-on="on"
              >
              </i>
          </router-link>
        </template>
        <span>portfolio</span>
      </v-tooltip>
      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <router-link :to="`/${$i18n.locale}/contact`">
              <i 
              class="far fa-envelope" style="color:#fd7e14; font-size:30px"
              v-bind="attrs"
              v-on="on"
              >
              </i>
          </router-link>
        </template>
        <span>contact</span>
      </v-tooltip>
    </v-app-bar>

      <v-navigation-drawer
        id="navigation"
        width="110px"
        absolute
        style="background-color: white;"
      >
        <v-list class="text-center" style="margin-top: 80%;">
          <v-tooltip left>
            <template v-slot:activator="{ on, attrs }">
              <router-link :to="`/${$i18n.locale}`">
                <v-list-item class="ml-4">
                  <i 
                  class="fas fa-home" style="color:#f8d64d; font-size:40px"
                  v-bind="attrs"
                  v-on="on"
                  >
                  </i>
                </v-list-item>
              </router-link>
            </template>
            <span>Accueil</span>
          </v-tooltip>

          <v-tooltip left>
            <template v-slot:activator="{ on, attrs }">
              <router-link :to="`/${$i18n.locale}/user`">
                <v-list-item class="marg ml-5">
                  <i 
                  class="far fa-user" style="color:#303f9f; font-size:40px"
                  v-bind="attrs"
                  v-on="on"
                  >
                  </i>
                </v-list-item>
              </router-link>
            </template>
            <span>à propos</span>
          </v-tooltip>

          <v-tooltip left>
            <template v-slot:activator="{ on, attrs }">
              <router-link :to="`/${$i18n.locale}/skills`">
                <v-list-item class="marg ml-3">
                  <i 
                  class="fas fa-laptop-code" style="color:#f783ac; font-size:40px"
                  v-bind="attrs"
                  v-on="on"
                  >
                  </i>
                </v-list-item>
              </router-link>
            </template>
            <span>competences</span>
          </v-tooltip>

          <v-tooltip left>
            <template v-slot:activator="{ on, attrs }">
              <router-link :to="`/${$i18n.locale}/portfolio`">
                <v-list-item class="marg ml-4">
                  <i 
                  class="far fa-eye" style="color:#82c91e; font-size:40px"
                  v-bind="attrs"
                  v-on="on"
                  >
                  </i>
                </v-list-item>
              </router-link>
            </template>
            <span>portfolio</span>
          </v-tooltip>

          <v-tooltip left>
            <template v-slot:activator="{ on, attrs }">
              <router-link :to="`/${$i18n.locale}/contact`">
                <v-list-item class="marg ml-5">
                  <i 
                  class="far fa-envelope" style="color:#fd7e14; font-size:40px"
                  v-bind="attrs"
                  v-on="on"
                  >
                  </i>
                </v-list-item>
              </router-link>
            </template>
            <span>contact</span>
          </v-tooltip>
        </v-list>
      </v-navigation-drawer>

    <router-view />

  <v-footer absolute color="transparent" class="paddingleft">
    <v-col cols="12" sm="12" md="12" lg="4" class="text-center text-sm-center text-md-center text-lg-left">
      <v-btn
      v-for="(social, i) in socials"
      :key="i"
      :color="social.color"
      class="white--text"
      :href="social.link"
      target="_blank"
      fab
      icon
      x-large
      >
      <v-icon > {{social.icon}} </v-icon>
      </v-btn>        
    </v-col>
    <v-col
      cols="12"
      sm="12"
      md="12"
      lg="6"
      class="text-center text-sm-center text-md-center text-lg-left"
    >
      <span class="year paddingleft">{{ new Date().getFullYear() }} &copy;</span> <span class="name"> Narjes Jomaa Bouzid</span>
    </v-col>
    <v-col cols="12" sm="12" md="12" lg="2" class="language locale-changer text-center text-sm-center text-md-center text-lg-right">
      <select v-model="$i18n.locale">
        <option v-for="(langage, i) in langages" :key="`langage${i}`" :value="langage.lang" @click="setLocale(langage.lang)">
          {{ langage.nom }}
        </option>
      </select>
    </v-col>
  </v-footer>

  </v-app>
</template>

<script>

export default {
  name: 'App',
  data: () => ({
    langages:[
      {
        nom: 'Français',
        lang:'fr'
      },
    ],
    socials: [
      {
        icon: 'mdi-linkedin',
        color: 'cyan darken-1',
        link:"https://www.linkedin.com/in/narjes-jomaa-bouzid-09912487",
      },
      {
        icon: 'mdi-instagram',
        color: 'red lighten-3',
        link:"https://www.instagram.com/narjoussjomaa/?hl=fr",
      },
    ],
  }),
  methods:{
    setLocale(locale){
      this.$i18n.locale = locale;
      this.$router.push({
        params: {lang:locale}
      });
    }
  },

}
</script>

<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap');

@font-face {
    font-family: 'SimpleRonde-Regular';
    src: url('./assets/font/SimpleRonde-Regular.ttf');
}

@media (max-width: 1060px) { 
  #appbar{
    display: block;
  }
  #navigation{
    display:none;
  }
}

@media (min-width: 1060px) { 
  #appbar{
    display: none;
  }
  #navigation{
    display: block;
  }
  .paddingleft{
  padding-left: 7%;
  }
}


.name{
    font-family: 'SimpleRonde-Regular';
    font-size: 20px;
    font-weight: bold;
}
.year{
  font-family: 'Lato', sans-serif;
  font-size: 20px;
  font-weight: bold;
}
.language{
  font-family: 'Lato', sans-serif;
  font-size: 20px;
  font-weight: bold;
}
.logo{
  width: 100%;
}

.marg{
  margin-top: 80%;
}


</style>

