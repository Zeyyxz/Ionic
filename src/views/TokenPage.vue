<template>
    <IonPage>
      <IonHeader>
        <IonToolbar color="primary">
          <IonTitle>Masukkan Token 🔐</IonTitle>
        </IonToolbar>
      </IonHeader>
  
      <IonContent class="ion-padding">
        <IonList>
          <IonItem>
            <IonInput
              v-model="token"
              label="Masukkan Token"
              label-placement="floating"
              type="password"
              required
            />
          </IonItem>
  
          <IonButton expand="block" color="success" @click="verifyToken">
            Verifikasi Token
          </IonButton>
        </IonList>
      </IonContent>
    </IonPage>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import { useRouter } from "vue-router";
  import {
    IonPage,
    IonHeader,
    IonToolbar,
    IonTitle,
    IonContent,
    IonList,
    IonItem,
    IonInput,
    IonButton,
  } from "@ionic/vue";
  
  const token = ref("");
  const router = useRouter();
  
  // Token yang sama seperti di API
  const VALID_TOKEN = "12345ABCDE";
  
  function verifyToken() {
    if (token.value === VALID_TOKEN) {
      localStorage.setItem("auth_token", token.value);
      router.push("/tabs/tab2"); // arahkan ke halaman utama
    } else {
      alert("Token salah! Coba lagi.");
    }
  }
  </script>  