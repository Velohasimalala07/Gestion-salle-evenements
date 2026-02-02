import axios from "axios";
import { useRouter } from "expo-router";
import { useState } from "react";
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

export default function Inscription() {
  const router = useRouter();

  const [nom, setNom] = useState("");
  const [email, setEmail] = useState("");
  const [mdp, setMdp] = useState("");
  const [confirm, setConfirm] = useState("");

  const inscrire = async () => {
    if (mdp !== confirm) {
      Alert.alert("Erreur", "Les mots de passe ne correspondent pas !");
      return;
    }

    try {
      const res = await axios.post("http://10.113.114.72:8000/api/inscription", {
        nom_utilisateur: nom,
        email: email,
        mot_de_passe: mdp,
        mot_de_passe_confirmation: confirm,
      });
      Alert.alert("Succès", res.data.message);
    } catch (e: any) {
      if (e.response?.data?.errors) {
        Alert.alert("Erreur", JSON.stringify(e.response.data.errors));
      } else {
        Alert.alert("Erreur", "Erreur serveur");
      }
    }
  };

  return (
    <ScrollView contentContainerStyle={styles.container}>
      <View style={styles.card}>
        {/* HEADER */}
        <View style={styles.header}>
          <Image
            source={require("../../assets/images/logo.png")}
            style={styles.logo}
          />
          <Text style={styles.title}>Rêve d'un Jour</Text>
        </View>

        {/* FORM */}
        <TextInput
          placeholder="Nom d'utilisateur"
          style={styles.input}
          value={nom}
          onChangeText={setNom}
        />
        <TextInput
          placeholder="Email"
          style={styles.input}
          value={email}
          onChangeText={setEmail}
          keyboardType="email-address"
        />
        <TextInput
          placeholder="Mot de passe"
          style={styles.input}
          value={mdp}
          onChangeText={setMdp}
          secureTextEntry
        />
        <TextInput
          placeholder="Confirmation du mot de passe"
          style={styles.input}
          value={confirm}
          onChangeText={setConfirm}
          secureTextEntry
        />

        {/* BUTTONS */}
        <View style={styles.buttons}>
          <TouchableOpacity style={[styles.btn, styles.register]} onPress={inscrire}>
            <Text style={styles.btnText}>S'inscrire</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={[styles.btn, styles.login]}
            onPress={() => router.push("/connexion")}
          >
            <Text style={[styles.btnText, { color: "#6ab04c" }]}>Se connecter</Text>
          </TouchableOpacity>
        </View>

        {/* FOOTER */}
        <View style={styles.footer}>
          <Text>📞 038 43 332 25</Text>
          <Text>📘 Stéphanya VELOHASIMALALA</Text>
        </View>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "#fff9e9",
    padding: 20,
  },
  card: {
    width: "100%",
    maxWidth: 400,
    backgroundColor: "#fff",
    borderRadius: 25,
    borderWidth: 3,
    borderColor: "#ffd966",
    padding: 30,
    shadowColor: "#000",
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.1,
    shadowRadius: 10,
    elevation: 5,
  },
  header: { alignItems: "center", marginBottom: 20 },
  logo: { width: 60, height: 60, borderRadius: 50 },
  title: { fontSize: 26, color: "#d93025", marginTop: 10, fontWeight: "bold" },
  input: {
    borderWidth: 2,
    borderColor: "#ffd966",
    borderRadius: 10,
    padding: 12,
    marginBottom: 15,
    fontSize: 15,
  },
  buttons: { flexDirection: "row", justifyContent: "space-between", marginTop: 10 },
  btn: { flex: 1, padding: 12, margin: 5, borderRadius: 8, alignItems: "center" },
  register: { backgroundColor: "#6ab04c" },
  login: { backgroundColor: "#fff", borderWidth: 2, borderColor: "#6ab04c" },
  btnText: { fontWeight: "600", color: "#fff" },
  footer: {
    marginTop: 20,
    backgroundColor: "#ffd966",
    borderRadius: 20,
    padding: 10,
    alignItems: "center",
  },
});
