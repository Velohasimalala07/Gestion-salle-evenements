<template>
  <div class="page">
    <header class="header">
      <div class="logo-section">
        <img src="../assets/logo.jpg" class="logo" />
        <h1 class="site-title">Reve d' un Jour</h1>
      </div>
    </header>

    <main class="content">
      <h2 class="section-title">FINALISER VOTRE RÉSERVATION</h2>

      <!-- Salle choisie -->
      <div v-if="salle" class="info-block">
        <h3>Salle choisie :</h3>
        <p><b>Nom :</b> {{ salle.nom }}</p>
        <p><b>Capacité :</b> {{ salle.capacite }} personnes</p>
        <p><b>Prix :</b> {{ salle.prix }} Ar</p>
      </div>

      <!-- Matériel -->
      <div v-if="materiels.length > 0" class="info-block">
        <h3>Matériels sélectionnés :</h3>
        <ul>
          <li v-for="(m,i) in materiels" :key="i">
            {{ m.nom }} - {{ m.qteChoisie }} unité(s) - {{ m.prix }} Ar/unité
          </li>
        </ul>
      </div>

      <!-- Total -->
      <div class="total">
        <p><b>Total général : </b> {{ total }} Ar</p>
      </div>

      <!-- Date et heure -->
      <div class="date-input">
        <label>Date :</label>
        <input type="date" v-model="date" />

        <label>Heure de début :</label>
        <input type="time" v-model="heureDebut" />

        <label>Heure de fin :</label>
        <input type="time" v-model="heureFin" />
      </div>

      <!-- Actions -->
      <div class="actions">
        <button class="btn-valid" @click="confirmer">Confirmer ma réservation ✅</button>
        <router-link to="/NosOffres" class="btn-cancel">Modifier ma sélection</router-link>
      </div>

      <router-link to="/" class="btn-logout">Se déconnecter</router-link>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";

const salle = ref(null);
const materiels = ref([]);
const total = ref(0);
const date = ref("");
const heureDebut = ref("");
const heureFin = ref("");

const router = useRouter();

// Récupération des données depuis LocalStorage
onMounted(() => {
  salle.value = JSON.parse(localStorage.getItem("salleChoisie"));
  materiels.value = JSON.parse(localStorage.getItem("materielsSelectionnes")) || [];

  total.value = 0;
  if (salle.value) total.value += parseInt(salle.value.prix.replace(/\s/g,""));

  materiels.value.forEach(m => {
    total.value += m.qteChoisie * parseInt(m.prix.replace(/\s/g,""));
  });
});

// Confirmer la réservation et rediriger vers la page confirmation
function confirmer() {
  if (!date.value || !heureDebut.value || !heureFin.value) {
    return alert("Veuillez remplir la date et les heures !");
  }

  // Stocker les dates et heures pour la page confirmation
  localStorage.setItem("dateReservation", date.value);
  localStorage.setItem("heureDebutReservation", heureDebut.value);
  localStorage.setItem("heureFinReservation", heureFin.value);

  // Redirection vers la page confirmation
  router.push("/confirmation");
}
</script>

<style scoped>
.page {
  background:#fff9e9;
  min-height:100vh;
  text-align:center;
  font-family: "Poppins", sans-serif;
}

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


.content {
  background:white;
  border:3px solid #ffd966;
  margin:20px auto;
  padding:20px;
  border-radius:25px;
  max-width:1000px;
}

.info-block {
  background:#fffef8;
  border:2px solid #a4e26a;
  padding:10px;
  margin-bottom:10px;
  border-radius:10px;
  text-align:left;
}

.total {
  font-size:18px;
  margin:10px 0;
}

.date-input input {
  margin:5px;
  padding:5px;
  width:200px;
}

.btn-valid {
  background:#6ab04c;
  color:white;
  padding:10px 15px;
  border-radius:10px;
  margin-top:10px;
  border:none;
  cursor:pointer;
}

.btn-cancel {
  background:#ffd966;
  padding:10px;
  border-radius:10px;
  margin-top:10px;
  display:inline-block;
  text-decoration:none;
  color:#333;
}
.btn-logout {
  margin-top:10px;
  display: inline-block;  
  color: white;
  background: #e74c3c;
  padding: 5px 12px;       
  border-radius: 10px;
  text-decoration: none;
  font-size: 14px;         
}


</style>
