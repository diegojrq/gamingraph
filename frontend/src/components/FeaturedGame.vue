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
    <v-row>
      <v-col cols="12" md="2">
        <div class="div-wrapper-title">
          <v-img
            class="img-cover"
            cover
            src="https://images.igdb.com/igdb/image/upload/t_thumb/co75ap.jpg"
          ></v-img>
        </div>
      </v-col>
      <v-col cols="12" md="10">
        <div class="div-featured-game">
          <p>featured game ot the day</p>
        </div>
        <v-divider></v-divider>
        <v-row>
          <v-col cols="12" md="6">
            <div class="div-game-name">
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
              <p>{{ game.name }}</p>
            </div>            
          </v-col>
          <v-col cols="12" md="6">
            <p>release date</p>
          </v-col>
        </v-row>

      </v-col>
    </v-row>   
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
  }

  .img-cover {
    width: 92%;
    margin: 4%;
    
    border: 1px solid #fff;
    border-radius: 1%;
  }



  .div-title {
    width: 80%;
    margin: 1%;    
    text-align: right;
    border: 1px solid #fff;
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
    font-size: 1em;
  }
  .div-featured-game {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }
  

</style>