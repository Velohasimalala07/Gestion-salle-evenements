<template>
  <div class="page">
    <h2>📋 Liste des Réservations</h2>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Heure début</th>
          <th>Heure fin</th>
          <th>Salle</th>
          <th>Matériels</th>
          <th>Total (Ar)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="r in reservations" :key="r.id">
          <td>{{ r.date_reservation }}</td>
          <td>{{ r.heure_debut }}</td>
          <td>{{ r.heure_fin }}</td>
          <td>{{ r.salle.nom }}</td>
          <td>
            <ul v-if="r.materiels && r.materiels.length > 0">
              <li v-for="(m, i) in r.materiels" :key="i">
                {{ m.nom }} - {{ m.qteChoisie }} unité(s)
              </li>
            </ul>
            <span v-else>-</span>
          </td>
          <td>{{ r.total }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const reservations = ref([]);

async function fetchReservations() {
  try {
    const res = await axios.get("http://127.0.0.1:8000/api/admin/reservations");
    reservations.value = res.data;
  } catch (err) {
    console.error("Erreur AdminReservations:", err);
    alert("Impossible de charger les réservations !");
  }
}

onMounted(() => {
  fetchReservations();

  // 🔹 Optional: auto refresh every 5s
  setInterval(fetchReservations, 5000);
});
</script>

<style scoped>
.page {
  padding: 20px;
  font-family: "Poppins", sans-serif;
  background: #fff9e9;
  min-height: 100vh;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #6ab04c;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #fffef8;
  border: 3px solid #ffd966;
  border-radius: 15px;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: center;
}

th {
  background: #ffd966;
  font-weight: bold;
}

td ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
</style>
