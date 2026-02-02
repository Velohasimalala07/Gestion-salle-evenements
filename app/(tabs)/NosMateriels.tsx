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

export default function NosMateriels() {
  const router = useRouter();

  const [materiels, setMateriels] = useState([
    {
      id: 1,
      nom: "Microphone sans fil professionnel",
      description: "Micro haute qualité adapté aux conférences et fêtes",
      prix: "10 000",
      quantite: 10,
      qteChoisie: 0,
      selectionne: false,
      image: require("../../assets/images/micro.jpg"),
    },
    {
      id: 2,
      nom: "Chaises blanches harmonieuses",
      description: "Confortables, idéales pour mariage et réception",
      prix: "2 000",
      quantite: 400,
      qteChoisie: 0,
      selectionne: false,
      image: require("../../assets/images/chaise.jpg"),
    },
    {
      id: 3,
      nom: "Table ronde et 6 places",
      description: "Tables élégantes, style dégagé",
      prix: "4 000",
      quantite: 200,
      qteChoisie: 0,
      selectionne: false,
      image: require("../../assets/images/table.jpg"),
    },
    {
      id: 4,
      nom: "Sonorisation complète",
      description: "Enceintes, mixeur, micro, tout le nécessaire musical",
      prix: "50 000",
      quantite: 5,
      qteChoisie: 0,
      selectionne: false,
      image: require("../../assets/images/sono.jpg"),
    },
  ]);

  // ➕ quantité
  const increment = (id: number) => {
    setMateriels((prev) =>
      prev.map((m) =>
        m.id === id && m.qteChoisie < m.quantite
          ? { ...m, qteChoisie: m.qteChoisie + 1 }
          : m
      )
    );
  };

  // ➖ quantité
  const decrement = (id: number) => {
    setMateriels((prev) =>
      prev.map((m) =>
        m.id === id && m.qteChoisie > 0
          ? { ...m, qteChoisie: m.qteChoisie - 1 }
          : m
      )
    );
  };

  // sélection
  const toggleSelection = (id: number) => {
    setMateriels((prev) =>
      prev.map((m) =>
        m.id === id ? { ...m, selectionne: !m.selectionne } : m
      )
    );
  };

  // ✅ VALIDER + AsyncStorage
  const valider = async () => {
    const selection = materiels.filter(
      (m) => m.selectionne && m.qteChoisie > 0
    );

    if (selection.length === 0) {
      Alert.alert(
        "Erreur",
        "Veuillez sélectionner au moins un matériel avec une quantité > 0"
      );
      return;
    }

    try {
      await AsyncStorage.setItem(
        "materielsSelectionnes",
        JSON.stringify(selection)
      );

      router.push("/reservation");
    } catch (error) {
      Alert.alert("Erreur", "Impossible de sauvegarder les matériels");
    }
  };

  // ❌ annuler
  const annuler = () => {
    setMateriels((prev) =>
      prev.map((m) => ({ ...m, qteChoisie: 0, selectionne: false }))
    );
    Alert.alert("Annulé", "Sélection annulée");
  };

  return (
    <ScrollView style={styles.page} contentContainerStyle={{ alignItems: "center" }}>
      {/* HEADER */}
      <View style={styles.header}>
        <View style={styles.logoSection}>
          <Image
            source={require("../../assets/images/logo.png")}
            style={styles.logo}
          />
          <Text style={styles.siteTitle}>Rêve d’un Jour</Text>
        </View>
      </View>

      {/* CONTENT */}
      <View style={styles.content}>
        <Text style={styles.sectionTitle}>
          CHOISISSEZ VOS MATÉRIELS
        </Text>

        {materiels.map((m) => (
          <View
            key={m.id}
            style={[
              styles.materielCard,
              m.selectionne && styles.selectedCard,
            ]}
          >
            <Image source={m.image} style={styles.materielImage} />

            <View style={styles.materielInfo}>
              <Text><Text style={{ fontWeight: "bold" }}>Nom :</Text> {m.nom}</Text>
              <Text><Text style={{ fontWeight: "bold" }}>Description :</Text> {m.description}</Text>
              <Text><Text style={{ fontWeight: "bold" }}>Prix :</Text> {m.prix} Ar</Text>
              <Text><Text style={{ fontWeight: "bold" }}>Disponible :</Text> {m.quantite}</Text>

              {/* Quantité */}
              <View style={styles.quantity}>
                <TouchableOpacity
                  style={styles.qteButton}
                  onPress={() => decrement(m.id)}
                >
                  <Text style={styles.qteTextBtn}>−</Text>
                </TouchableOpacity>

                <Text style={styles.qteText}>{m.qteChoisie}</Text>

                <TouchableOpacity
                  style={styles.qteButton}
                  onPress={() => increment(m.id)}
                >
                  <Text style={styles.qteTextBtn}>+</Text>
                </TouchableOpacity>
              </View>

              <TouchableOpacity
                style={[
                  styles.btnAction,
                  m.selectionne && styles.selectedButton,
                ]}
                onPress={() => toggleSelection(m.id)}
              >
                <Text style={styles.btnActionText}>
                  {m.selectionne ? "Sélectionné ✅" : "Sélectionner"}
                </Text>
              </TouchableOpacity>
            </View>
          </View>
        ))}

        {/* ACTIONS */}
        <View style={styles.actions}>
          <TouchableOpacity style={styles.btnValid} onPress={valider}>
            <Text style={{ color: "#fff", fontWeight: "bold" }}>
              Valider
            </Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.btnCancel} onPress={annuler}>
            <Text style={{ fontWeight: "bold" }}>Annuler</Text>
          </TouchableOpacity>
        </View>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  page: { flex: 1, backgroundColor: "#fff9e9" },
  header: { marginTop: 20 },
  logoSection: { flexDirection: "row", alignItems: "center", gap: 10 },
  logo: { width: 50, height: 50, borderRadius: 25 },
  siteTitle: { fontSize: 20, fontWeight: "bold", color: "#d93025" },

  content: {
    width: "90%",
    backgroundColor: "#fff",
    borderColor: "#ffd966",
    borderWidth: 3,
    borderRadius: 25,
    padding: 20,
    marginTop: 15,
  },

  sectionTitle: {
    fontSize: 18,
    fontWeight: "bold",
    textAlign: "center",
    marginBottom: 15,
    color: "#003366",
  },

  materielCard: {
    flexDirection: "row",
    borderWidth: 2,
    borderColor: "#a4e26a",
    borderRadius: 15,
    padding: 10,
    marginBottom: 15,
    backgroundColor: "#fffef8",
  },

  selectedCard: {
    borderColor: "#ffd966",
    borderWidth: 3,
  },

  materielImage: {
    width: 120,
    height: 90,
    borderRadius: 10,
    marginRight: 10,
    resizeMode: "contain",
  },

  materielInfo: { flex: 1 },

  quantity: {
    flexDirection: "row",
    alignItems: "center",
    marginVertical: 6,
  },

  qteButton: {
    backgroundColor: "#6ab04c",
    paddingHorizontal: 12,
    paddingVertical: 4,
    borderRadius: 5,
  },

  qteTextBtn: { color: "#fff", fontSize: 18, fontWeight: "bold" },
  qteText: { marginHorizontal: 10, fontWeight: "bold" },

  btnAction: {
    backgroundColor: "#6ab04c",
    padding: 8,
    borderRadius: 8,
    alignItems: "center",
    marginTop: 5,
  },

  selectedButton: { backgroundColor: "#ffd966" },

  btnActionText: { color: "#fff", fontWeight: "bold" },

  actions: {
    flexDirection: "row",
    gap: 10,
    marginTop: 10,
  },

  btnValid: {
    backgroundColor: "#6ab04c",
    flex: 1,
    padding: 10,
    borderRadius: 10,
    alignItems: "center",
  },

  btnCancel: {
    backgroundColor: "#ffd966",
    flex: 1,
    padding: 10,
    borderRadius: 10,
    alignItems: "center",
  },
});
