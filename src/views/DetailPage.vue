<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>{{ game && game.title }}</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">
      <div v-if="game">
        <img :src="`/assets/${game.img}`" alt="gambar"
             style="width:200px; display:block; margin:auto;" />
        <p style="margin-top: 10px;">{{ game.desc }}</p>
      </div>
      <div v-else>
        <p>tidak ditemukan</p>
      </div>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router'
import { ref } from 'vue'

const route = useRoute()
const id = Number(route.params.id)

const games = [
  { id: 1, title: 'Pokémon', img: 'pikapika.png', desc: 'Game klasik Pokemon di GameBoy.' },
  { id: 2, title: 'Mega Man X', img: 'megaman.png', desc: 'Platformer aksi ikonik.' },
  { id: 3, title: 'The Legend of Zelda', img: 'zelda.png', desc: 'Petualangan legendaris.' },
  { id: 4, title: 'Pac-Man', img: 'pacman.png', desc: 'Game arcade klasik.' },
  { id: 5, title: 'Super Mario World', img: 'mario.png', desc: 'Mario klasik di SNES.' }
]

const game = ref(games.find(g => g.id === id))
</script>
