import { createRouter, createWebHistory } from "vue-router";


// Import des pages / components
import Vitrine from "../components/Vitrine.vue";
import Connexion from "../components/Connexion.vue";
import Inscription from "../components/Inscription.vue";
import NosOffres from "../components/NosOffres.vue";
import NosMateriels from "../components/NosMateriels.vue";
import Reservation from "../components/Reservation.vue";
import Confirmation from "../components/Confirmation.vue"; // nouvelle route
import AdminReservations from "../components/AdminReservations.vue";

const routes = [
  { path: "/", component: Vitrine },
  { path: "/connexion", component: Connexion },
  { path: "/inscription", component: Inscription },
  
  { path: "/NosOffres", component: NosOffres },
  { path: "/NosMateriels", component: NosMateriels },
  { path: "/Reservation", component: Reservation },
  { path: "/confirmation", component: Confirmation }, // ajout
   {
    path: "/AdminReservations",
    name: "AdminReservations",
    component: AdminReservations
  },
  
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;




