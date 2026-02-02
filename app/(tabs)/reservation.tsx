import AsyncStorage from "@react-native-async-storage/async-storage";
import { useRouter } from "expo-router";
import React, { useEffect, useState } from "react";
import {
  Alert,
  Image,
  ScrollView,
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  View,
} from "react-native";

interface Materiel {
  nom: string;
  qteChoisie: number;
  prix: string;
}

interface Salle {
  nom: string;
  capacite: number;
  prix: string;
}

export default function Reservation() {
  const router = useRouter();

  const [salle, setSalle] = useState<Salle | null>(null);
  const [materiels, setMateriels] = useState<Materiel[]>([]);
  const [total, setTotal] = useState<number>(0);
  const [date, setDate] = useState<string>("");
  const [heureDebut, setHeureDebut] = useState<string>("");
  const [heureFin, setHeureFin] = useState<string>("");

  // 🔹 Charger données depuis AsyncStorage
  useEffect(() => {
    const loadData = async () => {
      try {
        const salleStr = await AsyncStorage.getItem("salleChoisie");
        const materielsStr = await AsyncStorage.getItem("materielsSelectionnes");

        const salleData = salleStr ? JSON.parse(salleStr) : null;
        const materielsData: Materiel[] = materielsStr ? JSON.parse(materielsStr) : [];

        setSalle(salleData);
        setMateriels(materielsData);

        // Calcul total
        let t = 0;
        if (salleData) t += parseInt(salleData.prix.replace(/\s/g, ""));
        materielsData.forEach((m) => {
          t += m.qteChoisie * parseInt(m.prix.replace(/\s/g, ""));
        });
        setTotal(t);
      } catch (e) {
        Alert.alert("Erreur", "Impossible de charger les données de réservation");
        console.log(e);
      }
    };
    loadData();
  }, []);

  // 🔹 Confirmer réservation
  const confirmer = async () => {
    if (!date || !heureDebut || !heureFin) {
      Alert.alert("Erreur", "Veuillez remplir la date et les heures !");
      return;
    }

    try {
      await AsyncStorage.setItem("dateReservation", date);
      await AsyncStorage.setItem("heureDebutReservation", heureDebut);
      await AsyncStorage.setItem("heureFinReservation", heureFin);

      Alert.alert("✅ Succès", "Réservation confirmée !");
      router.push("/confirmation"); // Page de confirmation
    } catch (e) {
      Alert.alert("Erreur", "Impossible de sauvegarder la réservation");
    }
  };

  return (
    <ScrollView contentContainerStyle={styles.page}>
      {/* HEADER */}
      <View style={styles.header}>
        <Image source={require("../../assets/images/logo.png")} style={styles.logo} />
        <Text style={styles.siteTitle}>Rêve d’un Jour</Text>
      </View>

      <View style={styles.content}>
        <Text style={styles.sectionTitle}>FINALISER VOTRE RÉSERVATION</Text>

        {/* Salle choisie */}
        {salle && (
          <View style={styles.infoBlock}>
            <Text style={styles.subTitle}>Salle choisie :</Text>
            <Text><Text style={{ fontWeight: "bold" }}>Nom :</Text> {salle.nom}</Text>
            <Text><Text style={{ fontWeight: "bold" }}>Capacité :</Text> {salle.capacite} personnes</Text>
            <Text><Text style={{ fontWeight: "bold" }}>Prix :</Text> {salle.prix} Ar</Text>
          </View>
        )}

        {/* Matériels */}
        {materiels.length > 0 && (
          <View style={styles.infoBlock}>
            <Text style={styles.subTitle}>Matériels sélectionnés :</Text>
            {materiels.map((m, i) => (
              <Text key={i}>
                {m.nom} - {m.qteChoisie} unité(s) - {m.prix} Ar/unité
              </Text>
            ))}
          </View>
        )}

        {/* Total */}
        <View style={styles.total}>
          <Text><Text style={{ fontWeight: "bold" }}>Total général :</Text> {total} Ar</Text>
        </View>

        {/* Date et heure */}
        <View style={styles.dateInput}>
          <Text>Date :</Text>
          <TextInput
            placeholder="YYYY-MM-DD"
            style={styles.input}
            value={date}
            onChangeText={setDate}
          />

          <Text>Heure de début :</Text>
          <TextInput
            placeholder="HH:MM"
            style={styles.input}
            value={heureDebut}
            onChangeText={setHeureDebut}
          />

          <Text>Heure de fin :</Text>
          <TextInput
            placeholder="HH:MM"
            style={styles.input}
            value={heureFin}
            onChangeText={setHeureFin}
          />
        </View>

        {/* Actions */}
        <View style={styles.actions}>
          <TouchableOpacity style={styles.btnValid} onPress={confirmer}>
            <Text style={{ color: "#fff", fontWeight: "bold" }}>Confirmer ma réservation ✅</Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.btnCancel} onPress={() => router.push("/NosOffres")}>
            <Text style={{ fontWeight: "bold" }}>Modifier ma sélection</Text>
          </TouchableOpacity>
        </View>

        <TouchableOpacity style={styles.btnLogout} onPress={() => router.push("/")}>
          <Text style={{ color: "#fff", fontWeight: "bold" }}>Se déconnecter</Text>
        </TouchableOpacity>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  page: { backgroundColor: "#fff9e9", alignItems: "center", paddingVertical: 20 },
  header: { alignItems: "center", marginBottom: 15 },
  logo: { width: 80, height: 80, borderRadius: 40, marginBottom: 10 },
  siteTitle: { fontSize: 24, fontWeight: "bold", color: "#d93025" },
  content: { backgroundColor: "#fff", borderWidth: 3, borderColor: "#ffd966", borderRadius: 25, padding: 20, width: "90%" },
  sectionTitle: { fontSize: 18, fontWeight: "bold", color: "#003366", textAlign: "center", marginBottom: 10 },
  infoBlock: { backgroundColor: "#fffef8", borderWidth: 2, borderColor: "#a4e26a", borderRadius: 10, padding: 10, marginBottom: 10 },
  subTitle: { fontWeight: "bold", marginBottom: 5 },
  total: { fontSize: 18, marginVertical: 10 },
  dateInput: { marginVertical: 10 },
  input: { borderWidth: 1, borderColor: "#ccc", borderRadius: 5, padding: 5, marginVertical: 5, width: "100%" },
  actions: { flexDirection: "row", justifyContent: "space-between", marginTop: 10 },
  btnValid: { backgroundColor: "#6ab04c", padding: 10, borderRadius: 10, flex: 1, marginRight: 5, alignItems: "center" },
  btnCancel: { backgroundColor: "#ffd966", padding: 10, borderRadius: 10, flex: 1, marginLeft: 5, alignItems: "center" },
  btnLogout: { marginTop: 15, backgroundColor: "#e74c3c", padding: 8, borderRadius: 10, alignItems: "center" },
});
