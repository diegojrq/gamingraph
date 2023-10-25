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
      <v-col cols="12" md="12">
        <div class="div-card-title">
          <p>most hyped games from all time </p>
        </div>
        <v-divider></v-divider>
      </v-col>
    </v-row>
    <v-slide-y-transition>
      <div v-show="loaded" v-if="loaded">
        <v-table density="compact">
          <thead>
            <tr>
              <th>
                Game
              </th>
              <th>
                Calories
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="game in games"
              :key="game.id"
            >
              <td>{{ game.name }}</td>
              <td>{{ game.total_rating_count }}</td>
              <td>{{ game.total_rating }}</td>
            </tr>
          </tbody>
        </v-table>
        

        <v-divider></v-divider>
        <div class="div-updated-at">
          <p>based on the number of ratings and the rating itself</p>
        </div>
      </div>
    </v-slide-y-transition>
      
  </v-card>
</template>

<script>

import { getMostHypedGamesFromAllTime } from '@/services/game.service';

export default {
  name: "MostHypedFromAllTime",
  data() {
    return {
      games: [],
      loading: true,
      loaded: false,
    }
  },
  created() {
    getMostHypedGamesFromAllTime().then((response) => {
      this.games = response.data;
      this.loading = false;
      this.loaded = true;
    });
  },
  methods: {    
  }
}

</script>

<style lang="scss" scoped>
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
  
  .div-game-info {
    text-align: left;
    font-size: 1em;
  }

  .div-game-name {    
    padding-left: 4%;
    font-size: 1.8em;
  }

  .div-game-rating-number {
    font-size: 1.8em;
    color: #fff;

  }

  .div-game-launch {    
    padding-left: 8%;
    font-size: 1.0em;
    color: #999;
  }

  .div-card-title {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }

  .div-count {
    text-align: left;
    padding-left: 4%;    
  }

  .div-count {
    font-size: 0.8em;    
  }

  .p-subtitle {
    font-size: 1.8em;    
  }

</style>