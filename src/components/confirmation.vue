<template>
 <header class="header">
      <div class="logo-section">
        <img src="../assets/logo.jpg" class="logo" />
        <h1 class="site-title">Reve d' un Jour</h1>
      </div>
    </header>
  <div class="page-confirmation">
    <div class="card">
      <h1>✅ Réservation confirmée !</h1>

      <p class="message">
        Votre réservation a été enregistrée avec succès !!<br>
        MERCI d'avoir choisi <b>"REVE D’UN JOUR"</b> pour votre évènement.<br>
        Nous sommes ravis de vous accompagner dans cette belle occasion.<br>
        Pour toute modification ou annulation : contactez-nous au <b>038 43 332 25</b> ou par Facebook <b>Stéphanya VELOHASIMALALA</b>
      </p>

      <p class="abientot">A BIENTOT !</p>

      <hr />

      <div class="details">
        <p><b>Date :</b> {{ date }}</p>
        <p><b>Heure :</b> {{ heureDebut }} - {{ heureFin }}</p>

        <h3>Salle réservée :</h3>
        <p>{{ salle.nom }} - Capacité : {{ salle.capacite }} personnes - Prix : {{ salle.prix }} Ar</p>

        <div v-if="materiels.length > 0">
          <h3>Matériels :</h3>
          <ul>
            <li v-for="(m,i) in materiels" :key="i">
              {{ m.nom }} - {{ m.qteChoisie }} unité(s) - {{ m.prix }} Ar/unité
            </li>
          </ul>
        </div>

        <p class="total"><b>Total : </b> {{ total }} Ar</p>
      </div>

      <router-link to="/" class="btn-home">Retour à l'accueil</router-link>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const salle = ref({});
const materiels = ref([]);
const total = ref(0);
const date = ref("");
const heureDebut = ref("");
const heureFin = ref("");

onMounted(() => {
  salle.value = JSON.parse(localStorage.getItem("salleChoisie"));
  materiels.value = JSON.parse(localStorage.getItem("materielsSelectionnes"));
  date.value = localStorage.getItem("dateReservation");
  heureDebut.value = localStorage.getItem("heureDebutReservation");
  heureFin.value = localStorage.getItem("heureFinReservation");

  if (salle.value) total.value += parseInt(salle.value.prix.replace(/\s/g,""));
  materiels.value.forEach(m => total.value += m.qteChoisie * parseInt(m.prix.replace(/\s/g,"")));
});
</script>

<style scoped>
.logo-section {
  display: flex;
  flex-direction: column; /* Apetraka ambanin'ny logo ny soratra */
  align-items: center;    /* Apivony tsara eo afovoany */
}

.logo {
  width: 80px;   /* Ataovy lehibe kokoa raha tiana */
  height: 80px;
  border-radius: 50%;
}

.site-title {
  color: #d93025;
  font-weight: bold;
  font-size: 24px; /* Somary lehibe kely */
  margin-top: 10px; /* Misy elanelana kely eo ambanin'ny logo */
  text-align: center;
}

.header {
  display: flex;
  justify-content: center; /* Apivony eo afovoany ny rehetra */
  align-items: center;
  padding: 15px;
  border-bottom: 2px solid #ffd966;
  background: #fffef8;
}

.page-confirmation {
  display:flex;
  justify-content:center;
  align-items:center;
  min-height:100vh;
  background:#fff9e9;
  font-family: "Poppins", sans-serif;
  padding:20px;
}

.card {
  background:#fffef8;
  border:3px solid #ffd966;
  border-radius:25px;
  padding:30px;
  max-width:1000px;
  width:100%;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  text-align:center;
}

h1 {
  color:#6ab04c;
  margin-bottom:15px;
}

.message {
  font-size:16px;
  line-height:1.6;
  margin-bottom:20px;
}

.abientot {
  font-weight:bold;
  margin-bottom:20px;
}

hr {
  border:1px solid #ffd966;
  margin:20px 0;
}

.details {
  text-align:left;
  margin-bottom:20px;
}

.details h3 {
  margin-top:15px;
  color:#6ab04c;
}

.total {
  font-size:18px;
  margin-top:10px;
  font-weight:bold;
}

.btn-home {
  display:inline-block;
  padding:10px 20px;
  background:#6ab04c;
  color:white;
  border-radius:10px;
  text-decoration:none;
  margin-top:10px;
}
</style>
