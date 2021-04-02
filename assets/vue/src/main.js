import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import '@fortawesome/fontawesome-free/css/all.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import i18n from './i18n'

Vue.config.productionTip = false

router.beforeEach((to,from,next) => {
  let language = to.params.langs;

  if (!language){
    language = 'fr'
  }

  i18n.locale = language

  next()

})

new Vue({
  router,
  vuetify,
  i18n,
  render: h => h(App)
}).$mount('#app')

