import AsyncStorage from "@react-native-async-storage/async-storage";
import { useRouter } from "expo-router";
import React, { useState } from "react";
import {
  Alert,
  Image,
  ScrollView,
  StyleSheet,
  Text,
  TouchableOpacity,
  View,
} from "react-native";

interface Offre {
  id: number;
  nom: string;
  capacite: number;
  prix: string;
  description: string;
  image: any; // require() object
  selectionnee: boolean;
}

export default function NosOffres() {
  const router = useRouter();

  const [offres, setOffres] = useState<Offre[]>([
    {
      id: 1,
      nom: "Salle Romantique",
      capacite: 150,
      prix: "800 000",
      description: "Salle climatisée, décor fleuri, idéale pour mariage",
      image: require("../../assets/images/romantique.jpg"),
      selectionnee: false,
    },
    {
      id: 2,
      nom: "Salle Étoile",
      capacite: 100,
      prix: "650 000",
      description: "Salle lumineuse, déco moderne, idéale pour anniversaire",
      image: require("../../assets/images/etoile.jpg"),
      selectionnee: false,
    },
    {
      id: 3,
      nom: "Salle Prestige",
      capacite: 300,
      prix: "400 000",
      description: "Grande salle avec scène, idéale pour conférence",
      image: require("../../assets/images/grande salle.jpg"),
      selectionnee: false,
    },
  ]);

  // 🔹 Réserver une salle
  const reserver = (id: number) => {
    setOffres((prev) =>
      prev.map((o) => ({ ...o, selectionnee: o.id === id }))
    );
  };

  // 🔹 Valider réservation
  const valider = async () => {
    const salle = offres.find((o) => o.selectionnee);
    if (!salle) {
      Alert.alert("Erreur", "Veuillez sélectionner une salle avant de valider.");
      return;
    }

    await AsyncStorage.setItem("salleChoisie", JSON.stringify(salle));
    Alert.alert("✅ Succès", `Salle réservée : ${salle.nom}`);
    router.push("/NosMateriels");
  };

  // 🔹 Annuler
  const annuler = () => {
    setOffres((prev) => prev.map((o) => ({ ...o, selectionnee: false })));
    Alert.alert("❌ Réservations annulées.");
  };

  // 🔹 Logout
  const logout = () => {
    AsyncStorage.removeItem("token");
    Alert.alert("Déconnexion", "Vous êtes déconnecté !");
    router.push("/connexion");
  };

  return (
    <ScrollView style={styles.page} contentContainerStyle={{ alignItems: "center" }}>
      {/* HEADER */}
      <View style={styles.header}>
        <View style={styles.logoSection}>
          <Image source={require("../../assets/images/logo.png")} style={styles.logo} />
          <Text style={styles.siteTitle}>Rêve d’un Jour</Text>
        </View>
        <View style={styles.navButtons}>
          <TouchableOpacity style={styles.btnNav} onPress={() => router.push("/NosOffres")}>
            <Text>Nos offres</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.btnNav} onPress={() => router.push("/NosMateriels")}>
            <Text>Nos matériels</Text>
          </TouchableOpacity>
        </View>
      </View>

      {/* CONTENT */}
      <View style={styles.content}>
        <Text style={styles.sectionTitle}>NOS OFFRES DISPONIBLES</Text>
        <Text style={styles.subtitle}>
          Choisissez votre salle idéale pour un événement inoubliable !
        </Text>

        {offres.map((offre) => (
          <View key={offre.id} style={[styles.offerCard, offre.selectionnee && styles.selectedCard]}>
            <Image source={offre.image} style={styles.offerImage} />
            <View style={styles.offerInfo}>
              <Text><Text style={{ fontWeight: "bold" }}>NOM :</Text> {offre.nom}</Text>
              <Text><Text style={{ fontWeight: "bold" }}>CAPACITÉ :</Text> {offre.capacite} personnes</Text>
              <Text><Text style={{ fontWeight: "bold" }}>PRIX :</Text> {offre.prix} Ar</Text>
              <Text><Text style={{ fontWeight: "bold" }}>DESCRIPTION :</Text> {offre.description}</Text>

              <TouchableOpacity
                style={[styles.btnAction, offre.selectionnee && styles.selectedButton]}
                onPress={() => reserver(offre.id)}
              >
                <Text style={{ color: offre.selectionnee ? "#333" : "#fff", fontWeight: "bold" }}>
                  {offre.selectionnee ? "Réservée ✅" : "Réserver maintenant"}
                </Text>
              </TouchableOpacity>
            </View>
          </View>
        ))}

        {/* ACTIONS */}
        <View style={styles.actions}>
          <TouchableOpacity style={styles.btnValid} onPress={valider}>
            <Text style={{ color: "#fff", fontWeight: "bold" }}>Validé</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.btnCancel} onPress={annuler}>
            <Text style={{ fontWeight: "bold" }}>Annuler</Text>
          </TouchableOpacity>
        </View>

        <TouchableOpacity style={styles.btnLogout} onPress={logout}>
          <Text style={{ color: "#fff", fontWeight: "bold" }}>Se déconnecter</Text>
        </TouchableOpacity>
      </View>

      {/* FOOTER */}
      <View style={styles.footer}>
        <Text>📞 038 43 332 25</Text>
        <Text>📘 Stéphanya VELOHASIMALALA</Text>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  page: { flex: 1, backgroundColor: "#fff9e9" },
  header: { width: "90%", marginTop: 20, marginBottom: 10, flexDirection: "row", justifyContent: "space-between", alignItems: "center" },
  logoSection: { flexDirection: "row", alignItems: "center", gap: 10 },
  logo: { width: 50, height: 50, borderRadius: 50 },
  siteTitle: { fontSize: 20, fontWeight: "bold", color: "#d93025" },
  navButtons: { flexDirection: "row", gap: 10 },
  btnNav: { backgroundColor: "#a6d785", padding: 8, borderRadius: 10, alignItems: "center", marginHorizontal: 5 },
  content: { width: "90%", backgroundColor: "#fff", borderColor: "#ffd966", borderWidth: 3, borderRadius: 25, padding: 20, alignSelf: "center" },
  sectionTitle: { fontSize: 18, color: "#003366", textDecorationLine: "underline", marginBottom: 5, textAlign: "center" },
  subtitle: { marginBottom: 15, textAlign: "center" },
  offerCard: { flexDirection: "row", backgroundColor: "#fffef8", borderWidth: 2, borderColor: "#a4e26a", borderRadius: 15, padding: 10, marginBottom: 15 },
  selectedCard: { borderColor: "#ffd966", borderWidth: 3 },
  offerImage: { width: 120, height: 90, borderRadius: 10, marginRight: 15, resizeMode: "contain" },
  offerInfo: { flex: 1 },
  btnAction: { backgroundColor: "#6ab04c", padding: 8, borderRadius: 8, marginTop: 8, alignItems: "center" },
  selectedButton: { backgroundColor: "#ffd966" },
  actions: { flexDirection: "row", justifyContent: "center", gap: 15, marginTop: 10 },
  btnValid: { backgroundColor: "#6ab04c", padding: 10, borderRadius: 10, flex: 1, alignItems: "center" },
  btnCancel: { backgroundColor: "#ffd966", padding: 10, borderRadius: 10, flex: 1, alignItems: "center" },
  btnLogout: { backgroundColor: "#a4e26a", padding: 8, borderRadius: 10, marginTop: 20, alignItems: "center" },
  footer: { width: "100%", backgroundColor: "#ffd966", alignItems: "center", paddingVertical: 10, marginTop: 20, borderBottomLeftRadius: 20, borderBottomRightRadius: 20 },
});
