<template>
  <div class="container">
    <div class="login-card">
      <header class="header">
       <img src="../assets/logo.jpg" alt="Logo" class="logo" />
        <h1 class="title">Rêve d'un Jour</h1>
      </header>

      <form class="form" @submit.prevent="connecter">
        <input v-model="nomUtilisateur" type="text" placeholder="Nom d'utilisateur" required />
        <input v-model="motDePasse" type="password" placeholder="Mot de passe" required />

        <div class="buttons">
          <router-link to="/NosOffres" class="btn login">Se connecter</router-link>
          <router-link to="/inscription" class="btn register">S'inscrire</router-link>
        </div>
      </form>
      <footer class="footer">
        <p>📞 038 43 332 25</p>
        <p>📘 Stéphanya VELOHASIMALALA</p>
      </footer>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const nomUtilisateur = ref("");
const motDePasse = ref("");

function connecter() {
  alert(`Bienvenue ${nomUtilisateur.value} 🎉 (Mode démo)`);
}
</script>

<style scoped>
/* (mitovy amin’ilay teo aloha) */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #fff9e9;
}
.login-card {
  background: #fff;
  border: 3px solid #ffd966;
  border-radius: 25px;
  padding: 40px 30px;
  width: 800px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.header { text-align: center; margin-bottom: 20px; }
.logo { width: 60px; height: 60px; border-radius: 50%; }
.title { color: #d93025; font-size: 26px; margin-top: 10px; }
.form { display: flex; flex-direction: column; gap: 15px; }
input {
   padding: 12px; border: 2px solid #ffd966; border-radius: 10px;
  font-size: 15px; outline: none; transition: 0.3s;
}
input:focus {
  border-color: #ffd966;
  box-shadow: 0 0 5px #a4e26a;
}
.buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}
.btn {
  flex: 1; margin: 5px; padding: 10px; font-size: 15px; border-radius: 8px;
  cursor: pointer; border: none; font-weight: 600; text-align: center;
  text-decoration: none;
}
.btn.login { background: #6ab04c; color: #fff; }
.btn.register { background: #fff; color: #6ab04c; border: 2px solid #6ab04c; }
.footer {
  margin-top: 25px;
  background: #ffd966;
  border-radius: 0 0 20px 20px;
  padding: 10px;
  text-align: center;
  font-size: 14px;
  color: #333;
}
</style>
