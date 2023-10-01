<template>
  <v-container class="fill-height">
    <v-responsive class="align-center text-center fill-height">
      <v-row>
        <v-col cols="12" md="6">
          <GameCount />
        </v-col>
        <v-col cols="12" md="6">
          <GameCount />
        </v-col>

      </v-row>
      <v-row>
        <v-col cols="12" md="4">
          <GameCount />
        </v-col>
        <v-col cols="12" md="4">
          <GameCount />
        </v-col>
        <v-col cols="12" md="4">
          <GameCount />
        </v-col>

      </v-row>
    </v-responsive>
  </v-container>
</template>

<script>

import GameCount from '@/components/dashboard/GameCount.vue'

import { getGame } from '../services/game.service';

export default {
  name: "Dashboard",
  components: { GameCount },
  mixins: [],
  data() {
    return {
      user: [],
    }
  },
  created() {

    getGame(10).then((response) => { this.user = response.data; });

  },
  methods: {    
  }
}

</script>