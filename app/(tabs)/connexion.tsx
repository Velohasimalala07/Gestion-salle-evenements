import { useRouter } from 'expo-router';
import { useState } from 'react';
import {
  Alert,
  Image,
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  View,
} from 'react-native';

export default function Connexion() {
  const router = useRouter();

  const [email, setEmail] = useState('');
  const [motDePasse, setMotDePasse] = useState('');

  const seConnecter = async () => {
  if (!email || !motDePasse) {
    Alert.alert('Erreur', 'Veuillez remplir tous les champs');
    return;
  }

  try {
    const response = await fetch('http://192.168.1.100:8000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        nom_utilisateur: email,
        mot_de_passe: motDePasse
      }),
    });

    const data = await response.json();

    if (!response.ok) {
      Alert.alert('Erreur', data.message || 'Erreur de connexion');
      return;
    }

    console.log('Utilisateur connecté:', data.user);

    // Mandeha any amin'ny NosOffres
    router.push('/NosOffres');

  } catch (error) {
    console.error(error);
    Alert.alert('Erreur', 'Impossible de se connecter au serveur');
  }
};


  return (
    <View style={styles.container}>
      <View style={styles.card}>

        {/* HEADER */}
        <View style={styles.header}>
          <Image
            source={require('../../assets/images/logo.png')}
            style={styles.logo}
          />
          <Text style={styles.title}>Rêve d'un Jour</Text>
        </View>

        {/* INPUTS */}
        <TextInput
          placeholder="Nom d'utilisateur"
          style={styles.input}
          value={email}
          onChangeText={setEmail}
          keyboardType="email-address"
        />

        <TextInput
          placeholder="Mot de passe"
          style={styles.input}
          value={motDePasse}
          onChangeText={setMotDePasse}
          secureTextEntry
        />

        {/* BUTTONS */}
        <View style={styles.buttons}>
          <TouchableOpacity
            style={[styles.btn, styles.login]}
             onPress={() => router.push('/NosOffres')}
          >
            <Text style={styles.btnText}>Se connecter</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={[styles.btn, styles.register]}
            onPress={() => router.push('/inscription')}
          >
            <Text style={[styles.btnText, { color: '#6ab04c' }]}>
              S'inscrire
            </Text>
          </TouchableOpacity>
        </View>

        {/* FOOTER */}
        <View style={styles.footer}>
          <Text>📞 038 43 332 25</Text>
          <Text>📘 Stéphanya VELOHASIMALALA</Text>
        </View>

      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff9e9',
  },
  card: {
    width: 350,
    padding: 30,
    borderRadius: 25,
    borderWidth: 3,
    borderColor: '#ffd966',
    backgroundColor: '#fff',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.1,
    shadowRadius: 10,
    elevation: 5,
  },
  header: {
    alignItems: 'center',
    marginBottom: 20,
  },
  logo: {
    width: 60,
    height: 60,
    borderRadius: 50,
  },
  title: {
    fontSize: 26,
    color: '#d93025',
    marginTop: 10,
  },
  input: {
    borderWidth: 2,
    borderColor: '#ffd966',
    borderRadius: 10,
    padding: 12,
    marginBottom: 15,
  },
  buttons: {
    flexDirection: 'row',
    justifyContent: 'space-between',
  },
  btn: {
    flex: 1,
    padding: 10,
    margin: 5,
    borderRadius: 8,
    alignItems: 'center',
  },
  login: {
    backgroundColor: '#6ab04c',
  },
  register: {
    backgroundColor: '#fff',
    borderWidth: 2,
    borderColor: '#6ab04c',
  },
  btnText: {
    fontWeight: '600',
    color: '#fff',
  },
  footer: {
    marginTop: 20,
    backgroundColor: '#ffd966',
    borderRadius: 20,
    padding: 10,
    alignItems: 'center',
  },
});
