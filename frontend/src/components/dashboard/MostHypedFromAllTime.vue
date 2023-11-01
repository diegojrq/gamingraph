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
          <p><strong>most hyped</strong> games from all time </p>
        </div>
        <v-divider></v-divider>
      </v-col>
    </v-row>
    <v-slide-y-transition>
      <div v-show="loaded" v-if="loaded">
        <v-row>
          <v-col cols="12" md="3">
            <div>
              <v-icon size="100">mdi-star</v-icon>  
            </div>
          </v-col>
          <v-col cols="12" md="9">
            <v-table class="v-table" density="compact">
              <tbody>
                <tr
                  v-for="game in games"
                  :key="game.id"
                >
                  <td>{{ game.name }}</td>
                  <td>{{ Math.round(game.total_rating * 100) / 100 }} / 100</td>
                </tr>
              </tbody>
            </v-table>
          </v-col>
        </v-row>

        <v-divider></v-divider>
        <div class="div-updated-at">
          <v-row>
            <v-col cols="12" md="6">
              <div class="div-updated-at-based">
                <p>based on the number of ratings and the rating itself</p>            
              </div>
            </v-col>
            <v-col cols="12" md="6">
              <div class="div-updated-at-see-more">
                <p>see more ...</p>
              </div>
            </v-col>
          </v-row>
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

  .div-card-title {
    text-align: right;
    padding: 1%;
    font-size: 0.8em;
  }

  .v-table {
    font-size: 0.7em;
    background-color: #333;
    color: #fff;
    padding: 0;
    text-align: right;
  }

  .v-table tr {    
    line-height: 0.5em;
  }

  .v-table td {    
    color: #fff;
    padding: 0;
  }

  .v-table th {
    background-color: #333;
    color: #fff;
    padding: 0;
  }

  .div-updated-at-based {
    text-align: left;
  }

  .div-updated-at-see-more {
    text-align: right;
  }

</style>