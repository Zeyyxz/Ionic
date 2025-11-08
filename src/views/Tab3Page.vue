<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 3</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 3</ion-title>
        </ion-toolbar>
      </ion-header>

      <ion-list>
        <ion-item>
          <ion-input label="Nama Lengkap :" v-model="fullname"></ion-input>
        </ion-item>

        <ion-item>
          <ion-input label="Nama Panggilan :" v-model="nickname"></ion-input>
        </ion-item>

        <ion-item>
          <ion-select placeholder="Agama" v-model="agama">
            <div slot="label">Agamamu: </div>
            <ion-select-option value="Kristen">Kristen</ion-select-option>
            <ion-select-option value="Islam">Islam</ion-select-option>
            <ion-select-option value="Katolik">Katolik</ion-select-option>
            <ion-select-option value="Hindu">Hindu</ion-select-option>
            <ion-select-option value="Khonghucu">Khonghucu</ion-select-option>
            <ion-select-option value="Buddha">Buddha</ion-select-option>
          </ion-select>
        </ion-item>

        <ion-item>
          <ion-select placeholder="Jenis Kelamin" v-model="jeniskelamin">
            <div slot="label">Jenis Kelamin:</div>
            <ion-select-option value="Perempuan">Perempuan</ion-select-option>
            <ion-select-option value="Laki-laki">Laki-laki</ion-select-option>
          </ion-select>
        </ion-item>

        <ion-item>
          <ion-textarea label="Alamat:" placeholder="Alamatmu..." v-model="Alamat"></ion-textarea>
        </ion-item>

        <ion-item lines="none">
          <ion-label position="stacked">Hobi:</ion-label>
        </ion-item>
        <ion-radio-group v-model="Hobi">
          <ion-item>
            <ion-radio slot="start" value="Sports"></ion-radio>
            <ion-label>Sports</ion-label>
          </ion-item>
          <ion-item>
            <ion-radio slot="start" value="Gaming"></ion-radio>
            <ion-label>Gaming</ion-label>
          </ion-item>
          <ion-item>
            <ion-radio slot="start" value="Reading"></ion-radio>
            <ion-label>Reading</ion-label>
          </ion-item>
        </ion-radio-group>

        <ion-item lines="none">
          <ion-label position="stacked">Makanan favorit:</ion-label>
        </ion-item>

        <ion-item>
          <ion-checkbox
            slot="start"
            :checked="makanan.includes('Nasi Goreng')"
            @ionChange="(e) => onMakananChanged('Nasi Goreng', e)"
          ></ion-checkbox>
          <ion-label>Nasi Goreng</ion-label>
        </ion-item>

        <ion-item>
          <ion-checkbox
            slot="start"
            :checked="makanan.includes('Mie Goreng')"
            @ionChange="(e) => onMakananChanged('Mie Goreng', e)"
          ></ion-checkbox>
          <ion-label>Mie Goreng</ion-label>
        </ion-item>

        <ion-item>
          <ion-checkbox
            slot="start"
            :checked="makanan.includes('Burger')"
            @ionChange="(e) => onMakananChanged('Burger', e)"
          ></ion-checkbox>
          <ion-label>Burger</ion-label>
        </ion-item>
      </ion-list>

      <ion-button expand="full" color="success" @click="Kirim">SIMPAN</ion-button>

      
      <ion-card v-if="showResult" class="ion-margin-top">
        <ion-card-header>
          <ion-card-title>Hasil Input</ion-card-title>
        </ion-card-header>
        <ion-card-content>
          <p><strong>Nama Lengkap:</strong> {{ fullname }}</p>
          <p><strong>Nama Panggilan:</strong> {{ nickname }}</p>
          <p><strong>Agama:</strong> {{ agama }}</p>
          <p><strong>Jenis Kelamin:</strong> {{ jeniskelamin }}</p>
          <p><strong>Alamat:</strong> {{ Alamat }}</p>
          <p><strong>Hobi:</strong> {{ Hobi }}</p>
          <p><strong>Makanan favorit:</strong> {{ makanan.join(', ') }}</p>
        </ion-card-content>
      </ion-card>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import {
  IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonList, IonItem, IonInput,
  IonButton, IonTextarea, IonSelect, IonSelectOption, IonLabel, IonRadioGroup,
  IonRadio, IonCheckbox, IonCard, IonCardHeader, IonCardTitle, IonCardContent
} from '@ionic/vue';
import { ref } from 'vue';

const fullname = ref('');
const nickname = ref('');
const agama = ref('');
const jeniskelamin = ref('');
const Alamat = ref('');
const Hobi = ref('');
const makanan = ref<string[]>([]);
const showResult = ref(false);

function onMakananChanged(val: string, ev: any) {
  const checked = ev.detail.checked;
  if (checked) {
    if (!makanan.value.includes(val)) makanan.value.push(val);
  } else {
    makanan.value = makanan.value.filter(x => x !== val);
  }
}

const Kirim = () => {
  console.log('Nama lengkap saya adalah', fullname.value);
  console.log('Nama panggilan saya', nickname.value);
  console.log('Agama saya ', agama.value);
  console.log('Jenis kelamin saya', jeniskelamin.value);
  console.log('Alamat saya di', Alamat.value);
  console.log('Hobi saya ', Hobi.value);
  console.log('Makanan favorit=', makanan.value);
  showResult.value = true;
}
</script>