<template>
  <v-container class="fill-height">
    <v-responsive class="align-center text-center fill-height">
      <v-row>
        <v-col cols="12" md="6">          
        </v-col>
        <v-col cols="12" md="6">
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
          <GameCount />
        </v-col>
      </v-row>
    </v-responsive>
  </v-container>
</template>

<script>

import GameCount from '@/components/dashboard/GameCount.vue'
import FeaturedGame from '@/components/dashboard/FeaturedGame.vue'

export default {
  name: "Dashboard",
  components: { GameCount, FeaturedGame },
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