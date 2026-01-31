<template>
  <div class="page">
    <header class="header">
      <div class="logo-section">
        <img src="../assets/logo.jpg" alt="Logo" class="logo" />
        <h1 class="site-title">Reve d’ un Jour</h1>
      </div>

      <div class="nav-buttons">
        <router-link to="/NosOffres" class="btn-nav">Nos offres</router-link>
        <router-link to="/NosMateriels" class="btn-nav">Nos matériels</router-link>
      </div>
    </header>

    <main class="content">
      <h2 class="section-title">NOS OFFRES DISPONIBLES</h2>
      <p class="subtitle">Choisissez votre salle idéale pour un événement inoubliable !</p>

      <div class="offers">
        <div v-for="(offre, i) in offres" :key="i" class="offer-card">
          <img :src="offre.image" alt="Salle" class="offer-image" />

          <div class="offer-info">
            <p><b>NOM :</b> {{ offre.nom }}</p>
            <p><b>CAPACITÉ :</b> {{ offre.capacite }} personnes</p>
            <p><b>PRIX :</b> {{ offre.prix }} Ar</p>
            <p><b>DESCRIPTION :</b> {{ offre.description }}</p>

            <button
              class="btn-action"
              :class="{ selected: offre.selectionnee }"
              @click="reserver(offre)"
            >
              {{ offre.selectionnee ? "Réservée ✅" : "Réserver maintenant" }}
            </button>
          </div>
        </div>
      </div>

      <div class="actions">
        <button class="btn-valid" @click="valider">Validé</button>
        <button class="btn-cancel" @click="annuler">Annuler</button>
      </div>

      <router-link to="/" class="btn-logout" @click="logout">Se déconnecter</router-link>
    </main>

    <footer class="footer">
      <p>📞 038 43 332 25</p>
      <p>📘 Stéphanya VELOHASIMALALA</p>
    </footer>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const offres = ref([
  {
    nom: "Salle Romantique",
    capacite: 150,
    prix: "800 000",
    description: "Salle climatisée, décor fleuri, idéale pour mariage",
    image: new URL("../assets/romantique.jpg", import.meta.url).href,
    selectionnee: false,
  },
  {
    nom: "Salle Étoile",
    capacite: 100,
    prix: "650 000",
    description: "Salle lumineuse, déco moderne, idéale pour anniversaire",
    image: new URL("../assets/etoile.jpg", import.meta.url).href,
    selectionnee: false,
  },
  {
    nom: "Salle Prestige",
    capacite: 300,
    prix: "400 000",
    description: "Grande salle avec scène, idéale pour conférence",
    image: new URL("../assets/grande salle.jpg", import.meta.url).href,
    selectionnee: false,
  },
]);

function reserver(offre) {
  // Un seul choix de salle
  offres.value.forEach(o => o.selectionnee = false);
  offre.selectionnee = true;
}

function valider() {
  const salleChoisie = offres.value.find(o => o.selectionnee);

  if (!salleChoisie) {
    alert("Veuillez sélectionner une salle avant de valider.");
    return;
  }

  // ✅ Mitehirizina ny salle tiana
  localStorage.setItem("salleChoisie", JSON.stringify(salleChoisie));

  alert(`✅ Salle réservée : ${salleChoisie.nom}`);

  // ✅ Avy eo mandeha any NosMateriels
  router.push("/NosMateriels");
}

function annuler() {
  offres.value.forEach(o => (o.selectionnee = false));
  alert("❌ Réservations annulées.");
}

function logout() {
  alert("Déconnexion réussie !");
}
</script>

<style scoped>
.page {
  background: #fff9e9;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 800%;
  margin: 20px auto;
}
.logo-section {
  display: flex;
  align-items: center;
  gap: 10px;
}
.logo {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.site-title {
  color: #d93025;
  font-weight: bold;
  font-size: 20px;
}
.nav-buttons {
  display: flex;
  gap: 10px;
}
.btn-nav {
  background: #a6d785;
  padding: 8px 15px;
  border-radius: 10px;
  color: #333;
  text-decoration: none;
  font-weight: 600;
}
.content {
  width: 90%;
  background: white;
  border: 3px solid #ffd966;
  border-radius: 25px;
  padding: 20px;
  text-align: center;
}
.section-title {
  color: #003366;
  font-size: 18px;
  text-decoration: underline;
}
.offers {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-top: 15px;
}
.offer-card {
  display: flex;
  align-items: center;
  border: 2px solid #a4e26a;
  border-radius: 15px;
  padding: 10px;
  background: #fffef8;
}
.offer-image {
  width: 120px;
  height: 90px;
  border-radius: 10px;
  margin-right: 15px;
}
.btn-action {
  background: #6ab04c;
  color: white;
  border: none;
  padding: 8px 12px;
  border-radius: 8px;
  margin-top: 8px;
  cursor: pointer;
}
.btn-action.selected {
  background: #ffd966;
  color: #333;
}
.actions {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 20px;
}
.btn-valid {
  background: #6ab04c;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 10px;
  font-weight: 600;
}
.btn-cancel {
  background: #ffd966;
  color: #333;
  padding: 10px 15px;
  border: none;
  border-radius: 10px;
  font-weight: 600;
}
.btn-logout {
  background: #a4e26a;
  border: none;
  margin-top: 25px;
  padding: 8px 15px;
  border-radius: 10px;
  color: #fff;
}
.footer {
  background: #ffd966;
  width: 100%;
  text-align: center;
  padding: 10px 0;
  margin-top: 20px;
  border-radius: 0 0 20px 20px;
}
</style>
