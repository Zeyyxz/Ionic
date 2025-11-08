<template>
    <ion-page>
      <!-- <ion-header>
        <ion-toolbar>
          <ion-title style="text-align: center;"><b>Daftar Pesan</b></ion-title>
        </ion-toolbar>
      </ion-header> -->
      <ion-content class="ion-padding">
        <ion-content style="box-shadow: 0px !important;">
         <h1><b>Form Login</b></h1>
          <ion-card-content>
    <ion-list>
      <ion-item>
        <ion-input v-model="username" label-placement="floating">
          <div slot="label"><b>username</b></div>
        </ion-input>
      </ion-item>
    </ion-list>
      <ion-list>
      <ion-item>
          <ion-input type="password" v-model="password" label="Password" placeholder="12345" style="font-weight: bold;">
      <ion-input-password-toggle slot="end"></ion-input-password-toggle>
    </ion-input>
      </ion-item>
    </ion-list>
            <ion-button expand="block" @click="eksekusi" color="dark">Kirim</ion-button>
          </ion-card-content>
        </ion-content>
        <!-- <ion-card v-for="post in posts" :key="post.id">
          <ion-card-header>
            <ion-card-title>{{ post.title }}</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            {{ post.body }}
          </ion-card-content>
        </ion-card> -->
      </ion-content>
    </ion-page>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import axios from "axios";
  import { useRouter } from "vue-router";
  
  import {
    IonPage,
    IonHeader,
    IonToolbar,
    IonTitle,
    IonContent,
    IonCard,
    IonCardHeader,
    IonCardTitle,
    IonCardContent,
    IonInput,
    IonButton,
    IonInputPasswordToggle
  } from "@ionic/vue";
  
  
   
      const username = ref("")
      const password = ref("")
      const router = useRouter();
      const eksekusi = async () => {
          const formdata = new FormData()
          formdata.append('username', username.value)
          formdata.append('password', password.value)
  
            try {
      const res = await axios.post("http://localhost:8080/MyProject/server/api.php", formdata);
      console.log(res.data);
  
      if (res.data.status === "Berhasil") {
          router.push("/UserTable")
      }
      alert(res.data); 
    } catch (err) {
      console.error("Gagal mengirim data:", err);
    }
      }
  
  
  
  
  // const posts = ref<any[]>([]);
  
  
  // const newTitle = ref("");
  // const newBody = ref("");
  
  
  // onMounted(async () => {
  //   const res = await axios.get("https://jsonplaceholder.typicode.com/posts");
  //   posts.value = res.data;
  // });
  
  
  // async function createPost() {
  //   const res = await axios.post("https://jsonplaceholder.typicode.com/posts", {
  //     title: newTitle.value,
  //     body: newBody.value,
  //     userId: 1,
  //   });
  
  
  //   const newPost = {
  //     id: Date.now(),
  //     title: newTitle.value,
  //     body: newBody.value,
  //   };
  
  
  //   posts.value.unshift(newPost);
  
  
  //   newTitle.value = "";
  //   newBody.value = "";
  
  //   console.log("Respon dari API:", res.data); 
  // }
  </script>