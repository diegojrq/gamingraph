<template>
  <v-container class="fill-height">
    <v-responsive class="align-center text-center fill-height">
      <v-row>
        <v-col cols="12" md="12"> 
          <v-card
            class="mx-auto v-card"
            v-for="job in jobs" :key="job.id">

            {{ job.name }}

            <v-card-actions>
              <v-btn
                color="success"                
                @click="startJob(job.id)"  
              >
                <v-icon>mdi-play</v-icon>
              </v-btn>
            </v-card-actions>
            

          </v-card>
        </v-col>       
      </v-row> 
    </v-responsive>
  </v-container>
</template>

<script>

import { getJobs, executeJob } from '@/services/job.service';

export default {
  name: "Admin",
  components: {  },
  mixins: [],
  data() {
    return {
      jobs: [],
    }
  },
  created() {
    getJobs().then((response) => {
      this.jobs = response.data;
    });
  },
  methods: {
    startJob(id) {
      executeJob(id).then((response) => {
        console.log(response.data);
      });
    }
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

</style>