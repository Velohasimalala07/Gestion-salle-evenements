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
      <h2 class="section-title">CHOISISSEZ VOTRE MATERIEL POUR L'ÉVÉNEMENT</h2>
      <p class="subtitle">Sélectionnez les équipements que vous souhaitez utiliser ce jour-là :</p>

      <div class="materiels">
        <div v-for="(materiel, i) in materiels" :key="i" class="materiel-card">
          <img :src="materiel.image" alt="Matériel" class="materiel-image" />
          <div class="materiel-info">
            <p><b>Nom :</b> {{ materiel.nom }}</p>
            <p><b>Description :</b> {{ materiel.description }}</p>
            <p><b>Prix :</b> {{ materiel.prix }} Ar</p>

            <div class="quantity">
              <button @click="decrement(materiel)">−</button>
              <input type="number" v-model="materiel.qteChoisie" min="0" :max="materiel.quantite" readonly />
              <button @click="increment(materiel)">+</button>
            </div>

            <p><b>Disponible :</b> {{ materiel.quantite }}</p>

            <button
              class="btn-action"
              :class="{ selected: materiel.selectionne }"
              @click="selectionner(materiel)"
            >
              {{ materiel.selectionne ? "Sélectionné ✅" : "Sélectionner" }}
            </button>
          </div>
        </div>
      </div>

      <div class="actions">
        <button class="btn-valid" @click="valider">Validé</button>
        <button class="btn-cancel" @click="annuler">Annuler</button>
      </div>

      <router-link to="/" class="btn-logout">Se deconnecter</router-link>
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

const materiels = ref([
  {
    nom: "Microphone sans fil professionnel",
    description: "Micro haute qualité adapté aux conférences et fêtes",
    prix: "10 000",
    quantite: 10,
    qteChoisie: 0,
    selectionne: false,
    image: new URL("../assets/micro.jpg", import.meta.url).href,
  },
  {
    nom: "Chaises blanches harmonieuses",
    description: "Confortables, idéales pour mariage et réception",
    prix: "2 000",
    quantite: 400,
    qteChoisie: 0,
    selectionne: false,
    image: new URL("../assets/chaise.jpg", import.meta.url).href,
  },
  {
    nom: "Table ronde et 6 places",
    description: "Tables élégantes, style dégagé",
    prix: "4 000",
    quantite: 200,
    qteChoisie: 0,
    selectionne: false,
    image: new URL("../assets/table.jpg", import.meta.url).href,
  },
  {
    nom: "Sonorisation complète",
    description: "Enceintes, mixeur, micro, tout le nécessaire musical",
    prix: "50 000",
    quantite: 5,
    qteChoisie: 0,
    selectionne: false,
    image: new URL("../assets/sono.jpg", import.meta.url).href,
  },
]);

function increment(m) {
  if (m.qteChoisie < m.quantite) m.qteChoisie++;
}

function decrement(m) {
  if (m.qteChoisie > 0) m.qteChoisie--;
}

function selectionner(m) {
  m.selectionne = !m.selectionne;
}

function valider() {
  const choisis = materiels.value.filter((m) => m.selectionne && m.qteChoisie > 0);

  if (choisis.length === 0) {
    alert("Veuillez choisir au moins un matériel avec quantité > 0 !");
    return;
  }

  // ✅ Stocker dans localStorage
  localStorage.setItem("materielsSelectionnes", JSON.stringify(choisis));

  // ✅ Aller à la page réservation
  router.push("/Reservation");
}

function annuler() {
  materiels.value.forEach((m) => {
    m.selectionne = false;
    m.qteChoisie = 0;
  });
  alert("❌ Sélections annulées.");
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
  width: 90%;
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
.materiels {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-top: 15px;
}
.materiel-card {
  display: flex;
  align-items: center;
  border: 2px solid #a4e26a;
  border-radius: 15px;
  padding: 10px;
  background: #fffef8;
}
.materiel-image {
  width: 120px;
  height: 90px;
  border-radius: 10px;
  margin-right: 15px;
}
.quantity {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 5px 0;
}
.quantity button {
  background: #6ab04c;
  color: white;
  border: none;
  padding: 4px 10px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
}
.quantity input {
  width: 50px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 0 5px;
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
  margin-top: 15px;
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
