<template>
  <v-card
    :loading="loading"
    class="mx-auto v-card"    
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
        <v-img
          cover
          src="https://images.igdb.com/igdb/image/upload/t_thumb/co75ap.jpg"
        ></v-img>
      </div>
      <div class="div-title">
        <div class="div-featured-game">
          <p>featured game ot the day</p>
        </div>
        <v-divider></v-divider>        
        <div class="div-game-name">
          <p>{{ game.name }}</p>
          <p>{{ game.name }}</p>
        </div>
      </div>
    </div>
    <v-card-text class="v-card-text">
      <p>{{ game.summary }}</p>
    </v-card-text>
    <v-divider></v-divider>
      <div class="div-updated-at">
        <p>updated at</p>
      </div>
  </v-card>
</template>

<script>

import { getGame } from '../services/game.service';

export default {
  name: "FeaturedGame",
  data() {
    return {
      game: [],
      loading: true,
    }
  },
  created() {
    getGame(242408).then((response) => {
      this.game = response.data;
    });
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
    width: 20%;
    margin-top: -5%;
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
    width: 80%;
    margin-top: -8%;
    margin-right: 1%;    
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
  
  .div-game-name {
    text-align: left;
    padding: 1%;
    font-size: 12px;
  }
  .div-featured-game {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }
  

</style>