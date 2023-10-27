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
          <p>genre division </p>
        </div>
        <v-divider></v-divider>
      </v-col>
    </v-row>
    <v-slide-y-transition>
      <div v-show="loaded" v-if="loaded">
        <div class="chart-div">
          <Pie
              id="my-chart-id"
              :options="chartOptions"
              :data="chartData"
            />
        </div>
        <v-divider></v-divider>
        <div class="div-updated-at">
          <v-row>
            <v-col cols="12" md="6">
              <div class="div-updated-at-based">
                <p>embrace this indie adventure</p>            
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

import { getGenreCount } from '@/services/game.service';

import { Chart as ChartJS, ArcElement, Tooltip, Legend, Colors } from 'chart.js'
import { Pie } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend, Colors)

export default {
  name: "GenreGraph",
  components: { Pie },

  data() {
    return {
      chartData: {
        labels: [],
        datasets: [
          { data: [] }
        ]
      },
      chartOptions: {
        responsive: true,
      },
      loading: true,
      loaded: false,
    }
  },
  created() {
    getGenreCount().then((response) => {

      response.data.forEach((element) => {
        this.chartData.labels.push(element.name);
        this.chartData.datasets[0].data.push(element.count);
      });
      
      this.loading = false;
      this.loaded = true;
    });
  },
  methods: {    
  }
}

</script>

<style lang="scss" scoped>
  
  .div-updated-at {
    text-align: left;
    padding: 1%;
    font-size: 10px;
  }

  .div-card-title {
    text-align: right;
    padding: 1%;
    font-size: 10px;
  }

  .div-updated-at-based {
    text-align: left;
  }

  .div-updated-at-see-more {
    text-align: right;
  }

  .chart-div {
    padding: 4%;
  }

</style>