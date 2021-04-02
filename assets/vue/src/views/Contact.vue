<template>
    <div class="back">
        <v-container fluid>
            <v-row class="p-5">
                <v-col cols="12" md="12" class="mt-5">
                    <h2>CONTACTEZ-MOI</h2>
                    <h4 class="mt-5">Un projet, des questions ou des commentaires? N'hésitez pas à me contacter!</h4>
                </v-col>

                <v-col cols="12" md="12">
                    <v-alert dense text type='success' id="show"> </v-alert>
                    <v-alert dense text type="error" id="erreur"> </v-alert>
                </v-col>

                <v-col cols="12" md="12" class="text-center">
                    <v-form method="post" id="contactform">
                        <v-text-field 
                            id="name"
                            class="text"
                            label="Nom/Prenom" 
                            :rules="rules.name"
                        />
                        <v-text-field
                            id="email" 
                            class="mt-3 text"
                            label="Email" 
                            :rules="rules.email"
                        />
                        <v-textarea
                            id="message"
                            class="text"
                            label="Message" 
                            :rules="rules.message"
                        ></v-textarea>

                        <v-btn 
                            color="#fd7e14"
                            dark
                            class="p-4 bouton"
                            rounded="pill"
                            type="submit"
                        >  
                            Envoyer Message
                        </v-btn>                   
                    </v-form>
                </v-col>

                <v-col cols="12" md="12" class="police h5 text-right">
                    <i class="fas fa-map-marker-alt ml-5" style="color:#fd7e14; font-size:20px"></i>
                    <span> Limoges (France)</span>
                </v-col>

            </v-row>
        </v-container>
    </div>   
</template>

<script>
export default {
    name: 'Contact',
    data: () => ({
      rules: {
        name: [
            value => !!value || 'Obligatoire.',
            value => (value && value.length >= 3) || 'Min 3 characters',
        ],
        email: [
            value => !!value || 'Obligatoire.',
            value => {
            const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(value) || 'Invalid e-mail.'
            },
        ],
        message: [
            value => !!value || 'Obligatoire.',
            value => (value && value.length >= 5) || 'Min 5 characters',
        ],

      }
    }),
    methods:{
        submitForm(e){
            e.preventDefault();
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let message =document.getElementById("message").value;
            let alerterreur = document.createTextNode("Veuillez remplir tous les champs SVP!");
            let erreur = document.getElementById('erreur');

            document.getElementById('contactform').reset();

            if ( name.trim() == "" || email.trim() == "" || message.trim() == ""){
                erreur.appendChild(alerterreur);
                erreur.style.display="block";
            }else{
                this.sendEmail(name, email, message);
                erreur.style.display="none";
            }
        },
        sendEmail(name, email, message){
            Email.send({
                Host : "smtp.gmail.com",
                Username : "narjesdev@gmail.com",
                Password : "quteytdbltnmtdhw",
                To : 'narjesdev@gmail.com',
                From : "narjesdev@gmail.com",
                Subject : `${name} sent you a message`,
                Body : `Name: ${name} <br/> Email: ${email} <br/> Message: ${message}`
            }).then((message) => this.log());
        },
        log(){
            let alert = document.createTextNode("Votre message est envoyé avec succès merci!");
            let show = document.getElementById('show');
            show.appendChild(alert);
            show.style.display="block";
        },

    },
    mounted(){
        document.getElementById("contactform").addEventListener("submit", this.submitForm);
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,100&display=swap');


@media (max-width: 1060px) { 
  .back{
    margin-bottom: 20%;
    margin-top: 7%;
  }
}

@media (min-width:1060px){
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
    color: #fd7e14;
    font-family: 'Concert One', cursive;
    font-weight: bold;
    font-size: 3em;
}

h4 {
    font-family: 'Lato', sans-serif;
}

.police{
    font-family: 'Lato', sans-serif;
}

.text {
    font-family: 'Lato', sans-serif;
}

.bouton{
    font-family: 'Concert One', cursive;
    font-size: 20px;
}
.margInfo{
    margin-top: 5%;
}

#show{
    display:none;
}

#erreur{
    display:none;
}

</style>