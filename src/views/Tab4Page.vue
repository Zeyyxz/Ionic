<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 4 Reusable Component</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 4</ion-title>
        </ion-toolbar>
      </ion-header>

      <ion-card>
  <ion-card-header>
    <ion-card-title>Abid Faeyza</ion-card-title>
    <ion-card-subtitle>Murid</ion-card-subtitle>
  </ion-card-header>

  <ion-card-content>
    Saya adalah murid dari SMKN 7 SAMARINDA
  </ion-card-content>
</ion-card>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import {
  IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonCard, IonCardHeader, IonCardTitle, IonCardContent
} from '@ionic/vue';
import Componentupi from '@/components/UserTable.vue';
import { ref } from 'vue';


</script>