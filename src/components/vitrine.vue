<template>
  <div class="vitrine">
    <div class="card">
      <h2 class="title">Rêve d'un Jour</h2>
      <p class="subtitle">Bienvenue dans notre site de salle d'événements</p>

      <img src="../assets/logo.jpg" alt="Logo" class="logo" />

      <div class="stars">
        <span>⭐</span>
        <span>⭐</span>
        <span>⭐</span>
      </div>

      <router-link to="/inscription" class="start-btn">START</router-link>
    </div>
  </div>
</template>

<style scoped>
.vitrine {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #fff9e9;
}

.card {
  background: white;
  border: 3px solid #ffd966;
  border-radius: 25px;
  text-align: center;
  padding: 40px;
  width: 800px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.title {
  color: #d93025;
  font-size: 28px;
  font-weight: bold;
}

.subtitle {
  margin-top: 10px;
  color: #444;
  font-size: 16px;
}

.logo {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  margin: 25px 0;
}

.stars {
  margin: 10px 0 25px;
  color: #ffd966;
  font-size: 24px;
}

.start-btn {
  background: #ffd966;
  border: none;
  color: #333;
  padding: 12px 35px;
  border-radius: 25px;
  text-decoration: none;
  font-size: 16px;
  font-weight: bold;
  box-shadow: 0 2px 5px rgba(0,0,0,0.15);
  transition: 0.3s;
}

.start-btn:hover {
  background: #f4c542;
}
</style>
