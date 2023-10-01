<template>
  <v-card
    :loading="loading"
    class="mx-auto v-card"
    max-width="344"
  >
    <template v-slot:loader="{ isActive }">
      <v-progress-linear
        :active="isActive"
        color="deep-purple"
        height="4"
        indeterminate
      ></v-progress-linear>
    </template>
    <div class="div-wrapper-title">
      <div class="div-icon">
        <v-icon size="70">mdi-gamepad-variant</v-icon>  
      </div>
      <div class="div-title">
        <span class="text-h5">{{ gameCount }} games</span>
      </div>
    </div>
    <v-card-text class="v-card-text">
      relating to or dependent on charity; charitable.<br>
      "an eleemosynary educational institution."
    </v-card-text>
    <v-divider></v-divider>
      <div class="div-updated-at">
        <p>updated at</p>
      </div>
  </v-card>
</template>

<script>

import { getGameCount } from '@/services/game.service';

export default {
  name: "GameCount",
  data() {
    return {
      gameCount: '[loading ... ]',
      loading: true,
    }
  },
  created() {
    getGameCount().then((response) => { this.gameCount = response.data; this.loading = false; });
  },
  methods: {    
  }
}

</script>

<style scoped>
  .v-card {
    margin-top: 20px;
    background-color: #333;
    color: #fff;
    border: 2px solid #fff;
    overflow: initial;
    z-index: initial;
  }

  .div-icon {
    width: 30%;
    margin-top: -4%;
    margin-left: 2%;
    border: 1px solid #fff;
    border-radius: 3%;
  }

  .div-wrapper-title {
    display: flex;
    flex-direction: row;
    justify-content: right;
    align-items: center;
  }

  .div-title {
    width: 70%;
    margin-top: 2%;
    width: 100%;
    margin-right: 2%;    
    text-align: right;
  }

  .v-card-text {    
    font-size: 12px;
  }

  .div-updated-at {
    text-align: left;
    padding: 1%;
    font-size: 10px;
  }

</style>