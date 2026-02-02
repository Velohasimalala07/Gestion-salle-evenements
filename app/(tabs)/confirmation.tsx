import AsyncStorage from "@react-native-async-storage/async-storage";
import { useRouter } from "expo-router";
import React, { useEffect, useState } from "react";
import { Image, ScrollView, StyleSheet, Text, TouchableOpacity, View } from "react-native";

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

export default function Confirmation() {
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
        const dateStr = await AsyncStorage.getItem("dateReservation");
        const heureDebutStr = await AsyncStorage.getItem("heureDebutReservation");
        const heureFinStr = await AsyncStorage.getItem("heureFinReservation");

        const salleData = salleStr ? JSON.parse(salleStr) : null;
        const materielsData: Materiel[] = materielsStr ? JSON.parse(materielsStr) : [];

        setSalle(salleData);
        setMateriels(materielsData);
        setDate(dateStr || "");
        setHeureDebut(heureDebutStr || "");
        setHeureFin(heureFinStr || "");

        // Calcul total
        let t = 0;
        if (salleData) t += parseInt(salleData.prix.replace(/\s/g, ""));
        materielsData.forEach((m) => {
          t += m.qteChoisie * parseInt(m.prix.replace(/\s/g, ""));
        });
        setTotal(t);
      } catch (e) {
        console.log(e);
      }
    };
    loadData();
  }, []);

  return (
    <ScrollView contentContainerStyle={styles.pageConfirmation}>
      {/* HEADER */}
      <View style={styles.header}>
        <Image source={require("../../assets/images/logo.png")} style={styles.logo} />
        <Text style={styles.siteTitle}>Rêve d’un Jour</Text>
      </View>

      <View style={styles.card}>
        <Text style={styles.title}>✅ Réservation confirmée !</Text>

        <Text style={styles.message}>
          Votre réservation a été enregistrée avec succès !!
          {"\n"}MERCI d'avoir choisi <Text style={{ fontWeight: "bold" }}>"REVE D’UN JOUR"</Text> pour votre évènement.
          {"\n"}Nous sommes ravis de vous accompagner dans cette belle occasion.
          {"\n"}Pour toute modification ou annulation : contactez-nous au <Text style={{ fontWeight: "bold" }}>038 43 332 25</Text> ou par Facebook <Text style={{ fontWeight: "bold" }}>Stéphanya VELOHASIMALALA</Text>
        </Text>

        <Text style={styles.abientot}>A BIENTOT !</Text>
        <View style={styles.hr} />

        {/* Details */}
        <View style={styles.details}>
          <Text><Text style={{ fontWeight: "bold" }}>Date :</Text> {date}</Text>
          <Text><Text style={{ fontWeight: "bold" }}>Heure :</Text> {heureDebut} - {heureFin}</Text>

          {salle && (
            <>
              <Text style={styles.sectionTitle}>Salle réservée :</Text>
              <Text>{salle.nom} - Capacité : {salle.capacite} personnes - Prix : {salle.prix} Ar</Text>
            </>
          )}

          {materiels.length > 0 && (
            <>
              <Text style={styles.sectionTitle}>Matériels :</Text>
              {materiels.map((m, i) => (
                <Text key={i}>
                  {m.nom} - {m.qteChoisie} unité(s) - {m.prix} Ar/unité
                </Text>
              ))}
            </>
          )}

          <Text style={styles.total}><Text style={{ fontWeight: "bold" }}>Total :</Text> {total} Ar</Text>
        </View>

        <TouchableOpacity style={styles.btnHome} onPress={() => router.push("/")}>
          <Text style={{ color: "#fff", fontWeight: "bold" }}>Retour à l'accueil</Text>
        </TouchableOpacity>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  pageConfirmation: { flexGrow: 1, backgroundColor: "#fff9e9", alignItems: "center", padding: 20 },
  header: { alignItems: "center", marginBottom: 20 },
  logo: { width: 80, height: 80, borderRadius: 40, marginBottom: 10 },
  siteTitle: { fontSize: 24, fontWeight: "bold", color: "#d93025", textAlign: "center" },
  card: { backgroundColor: "#fffef8", borderWidth: 3, borderColor: "#ffd966", borderRadius: 25, padding: 30, width: "100%", maxWidth: 1000, shadowColor: "#000", shadowOffset: { width: 0, height: 8 }, shadowOpacity: 0.1, shadowRadius: 20, elevation: 5 },
  title: { color: "#6ab04c", fontSize: 22, fontWeight: "bold", marginBottom: 15, textAlign: "center" },
  message: { fontSize: 16, lineHeight: 24, marginBottom: 20, textAlign: "center" },
  abientot: { fontWeight: "bold", marginBottom: 20, textAlign: "center" },
  hr: { borderBottomWidth: 1, borderBottomColor: "#ffd966", marginVertical: 20 },
  details: { marginBottom: 20 },
  sectionTitle: { fontSize: 16, fontWeight: "bold", marginTop: 15, color: "#6ab04c" },
  total: { fontSize: 18, fontWeight: "bold", marginTop: 10 },
  btnHome: { backgroundColor: "#6ab04c", padding: 12, borderRadius: 10, alignItems: "center" },
});
