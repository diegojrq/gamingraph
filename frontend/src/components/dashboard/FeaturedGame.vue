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
        <div class="div-featured-game">
          <p>featured game ot the day</p>
        </div>
        <v-divider></v-divider>
      </v-col>
    </v-row>
    <v-slide-y-transition>
      <div v-show="loaded" v-if="loaded">
        <v-row>
          <v-col cols="12" md="2">
            <div class="div-wrapper-title">
              <v-img
                v-if="game.cover"                
                class="img-cover"
                cover
                :src="`${ game.cover.url }`"
              ></v-img>
            </div>
          </v-col>
          <v-col cols="12" md="10">
            <v-row>
              <v-col cols="12" md="8">
                <div class="div-game-info">
                  <div class="div-game-name">
                    <p>{{ game.name }}</p>
                  </div>
                  <div class="div-game-launch">
                    <p>{{ 'launched on ' + formatDate(game.first_release_date) + ' (' + formatDateFromNow(game.first_release_date) + ')' }} </p>
                    <p v-for="involved_company in game.involved_companies" :key="involved_company.id">
                      {{ involved_company.publisher ? 'published by ' + involved_company.company.name : '' }}
                    </p>
                  </div>                  
                </div>            
              </v-col>
              <v-col cols="12" md="4">
                <v-progress-circular
                  v-if="game.rating"
                  :rotate="360"
                  :size="100"
                  :width="12"
                  :model-value="rating_value"
                  :color="`${ game.rating > 75 ? 'green' : (game.rating > 50 ? 'yellow' : (game.rating > 25 ? 'orange' : 'red')) }`"
                >
                  <div class="div-game-rating-number">
                    <p>
                      {{ Number(game.rating.toFixed(0)) }}
                    </p>
                  </div>
                </v-progress-circular>
                
              </v-col>
            </v-row>
          </v-col>
        </v-row>  
        <v-card-text v-show="!loading" class="v-card-text">
          <p>{{ game.summary }}</p>
        </v-card-text>
        <v-divider></v-divider>
          <div class="div-updated-at">
            <p>updated at</p>
          </div>
      </div>
    </v-slide-y-transition>
      
  </v-card>
</template>

<script>

import { getGame } from '@/services/game.service';

import moment from 'moment';

export default {
  name: "FeaturedGame",
  data() {
    return {
      game: [],
      loading: true,
      loaded: false,
      rating_interval: {},
      rating_value: 0
    }
  },
  beforeUnmount () {
    clearInterval(this.interval)
  },
  created() {
    getGame(19164).then((response) => {
      this.game = response.data;
      console.log(this.game.cover);
      this.loaded = true;
      this.loading = false;
      
      this.rating_interval = setInterval(() => {
        if (this.rating_value >= this.game.rating) {
          return 1;
        }
        this.rating_value += 1
      }, 10);      

    });
  },
  methods: {
    formatDate(date) {
      return moment(date).format("LL");
    },
    formatDateFromNow(date) {
      return moment(date).fromNow();
    },
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

  .div-featured-game {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }

</style>