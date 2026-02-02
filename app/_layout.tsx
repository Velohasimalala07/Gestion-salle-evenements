// app/_layout.tsx
import { useColorScheme } from '@/hooks/use-color-scheme';
import { DarkTheme, DefaultTheme, ThemeProvider } from '@react-navigation/native';
import { Stack } from 'expo-router';
import { StatusBar } from 'expo-status-bar';
import 'react-native-reanimated';

export const unstable_settings = {
  anchor: '(tabs)',
};

export default function RootLayout() {
  const colorScheme = useColorScheme();

  return (
    <ThemeProvider value={colorScheme === 'dark' ? DarkTheme : DefaultTheme}>
      <Stack>
        {/* Tabs root */}
        <Stack.Screen name="(tabs)" options={{ headerShown: false }} />

        {/* Modal pages */}
        <Stack.Screen
          name="modal"
          options={{ presentation: 'modal', title: 'Modal' }}
        />

        {/* Pages ivelan'ny tabs */}
        <Stack.Screen
          name="connexion"
          options={{ presentation: 'card', title: 'Connexion' }}
        />
        <Stack.Screen
          name="inscription"
          options={{ presentation: 'card', title: 'Inscription' }}
        />
      </Stack>
      <StatusBar style="auto" />
    </ThemeProvider>
  );
}
