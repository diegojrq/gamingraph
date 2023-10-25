<template>
  <v-container class="fill-height">
    <v-responsive class="align-center text-center fill-height">
      <v-row>
        <v-col cols="12" md="6">
          <GameCount />
        </v-col>
        <v-col cols="12" md="6">
          <MostHypedFromAllTime />
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="12">
          <FeaturedGame />
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="4">
        </v-col>
        <v-col cols="12" md="4">
        </v-col>
        <v-col cols="12" md="4">
          
        </v-col>
      </v-row>
    </v-responsive>
  </v-container>
</template>

<script>

import GameCount from '@/components/dashboard/GameCount.vue'
import MostHypedFromAllTime from '@/components/dashboard/MostHypedFromAllTime.vue'
import FeaturedGame from '@/components/dashboard/FeaturedGame.vue'

export default {
  name: "Dashboard",
  components: { GameCount, MostHypedFromAllTime, FeaturedGame },
  mixins: [],
  data() {
    return {
      user: [],
    }
  },
  created() {
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

  .div-featured-game {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }

</style>