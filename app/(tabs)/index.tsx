// app/(tabs)/index.tsx
import { useRouter } from 'expo-router';
import { Image, StyleSheet, Text, TouchableOpacity, View } from 'react-native';

export default function Home() {
  const router = useRouter();

  return (
    <View style={styles.vitrine}>
      <View style={styles.card}>
        <Text style={styles.title}>Rêve d'un Jour</Text>
        <Text style={styles.subtitle}>
          Bienvenue dans notre site de salle d'événements
        </Text>

        <Image
          source={require('../../assets/images/logo.png')}
          style={styles.logo}
        />

        <View style={styles.stars}>
          <Text style={styles.star}>⭐</Text>
          <Text style={styles.star}>⭐</Text>
          <Text style={styles.star}>⭐</Text>
        </View>

        <TouchableOpacity
          style={styles.startBtn}
          onPress={() => router.push('/inscription')} // Navigue any Connexion
        >
          <Text style={styles.startBtnText}>START</Text>
        </TouchableOpacity>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  vitrine: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff9e9',
  },
  card: {
    backgroundColor: '#fff',
    borderWidth: 3,
    borderColor: '#ffd966',
    borderRadius: 25,
    padding: 40,
    width: '85%',
    alignItems: 'center',
  },
  title: {
    color: '#d93025',
    fontSize: 28,
    fontWeight: 'bold',
  },
  subtitle: {
    marginTop: 10,
    color: '#444',
    fontSize: 16,
    textAlign: 'center',
  },
  logo: {
    width: 120,
    height: 120,
    borderRadius: 60,
    marginVertical: 25,
  },
  stars: {
    flexDirection: 'row',
    marginBottom: 25,
  },
  star: {
    fontSize: 24,
    marginHorizontal: 2,
  },
  startBtn: {
    backgroundColor: '#ffd966',
    paddingVertical: 12,
    paddingHorizontal: 35,
    borderRadius: 25,
  },
  startBtnText: {
    color: '#333',
    fontSize: 16,
    fontWeight: 'bold',
  },
});
