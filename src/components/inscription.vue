<template>
  <div class="container">
    <div class="register-card">

      <header class="header">
        <img src="../assets/logo.jpg" alt="Logo" class="logo" />
        <h1 class="title">Rêve d'un Jour</h1>
      </header>

      <form class="form" @submit.prevent="inscrire">

        <input
          v-model="nomUtilisateur"
          type="text"
          placeholder="Nom d'utilisateur"
          required
        />

        <input
          v-model="email"
          type="email"
          placeholder="Email"
          required
        />

        <input
          v-model="motDePasse"
          type="password"
          placeholder="Mot de passe"
          required
        />

        <input
          v-model="confirmationMotDePasse"
          type="password"
          placeholder="Confirmation du mot de passe"
          required
        />

        <div class="buttons">
          <button type="submit" class="btn register">S'inscrire</button>
          <router-link to="/connexion" class="btn login">
            Se connecter
          </router-link>
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
const email = ref("");
const motDePasse = ref("");
const confirmationMotDePasse = ref("");

const inscrire = () => {
  if (motDePasse.value !== confirmationMotDePasse.value) {
    alert("Les mots de passe ne correspondent pas !");
    return;
  }

  // 🔹 SIMULATION INSCRIPTION (VUE SEUL)
  alert(
    "Inscription réussie 🎉\n\n" +
    "Nom : " + nomUtilisateur.value + "\n" +
    "Email : " + email.value
  );

  // reset formulaire
  nomUtilisateur.value = "";
  email.value = "";
  motDePasse.value = "";
  confirmationMotDePasse.value = "";
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #fff9e9;
}

.register-card {
  background: #fff;
  border: 3px solid #ffd966;
  border-radius: 25px;
  padding: 40px 30px;
  width: 800px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.header {
  text-align: center;
  margin-bottom: 20px;
}

.logo {
  width: 60px;
  height: 60px;
  border-radius: 50%;
}

.title {
  color: #d93025;
  font-size: 26px;
  margin-top: 10px;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input {
  padding: 12px;
  border: 2px solid #ffd966;
  border-radius: 10px;
  font-size: 15px;
  outline: none;
}

input:focus {
  border-color: #f4c542;
  box-shadow: 0 0 5px #ffe599;
}

.buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}

.btn {
  flex: 1;
  margin: 5px;
  padding: 10px;
  font-size: 15px;
  border-radius: 8px;
  cursor: pointer;
  border: none;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
}

.btn.register {
  background: #6ab04c;
  color: #fff;
}

.btn.login {
  background: #fff;
  color: #6ab04c;
  border: 2px solid #6ab04c;
}

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
