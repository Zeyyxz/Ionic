<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 1</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">
      <ion-card v-for="post in posts" :key="post.id">
         <ion-card-header>
          <ion-card-title>{{ post.title }}</ion-card-title>
          </ion-card-header>
         <ion-card-content>
            {{ post.body }}
          </ion-card-content>
      </ion-card>
  </ion-content>
</ion-page>

    
</template>

<script setup lang="ts">
import { 
  IonPage, 
  IonHeader, 
  IonToolbar,
  IonTitle,
  IonContent,
  IonCardHeader,
  IonCardTitle, 
  IonCardContent} from '@ionic/vue';
import {defineComponent} from 'vue';
import ExploreContainer from '@/components/ExploreContainer.vue';

import {ref, onMounted } from "vue";
import axios from "axios";

const posts = ref<any[]>([]);

onMounted(async () => {
  try {
    const res = await axios.get("http://jsonplaceholder.typicode.com/posts");
    posts.value = res.data; 
  } catch (err) {
    console.error("Gagal ambil data", err)
  }
})
</script>