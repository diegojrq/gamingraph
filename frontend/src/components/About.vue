<template>
  <v-container class="fill-height">
    <v-responsive class="align-center text-center fill-height">      
      <v-card
        class="mx-auto v-card"
      >
        <v-row>
          <v-col cols="12" md="12">
            <div class="div-card-title">
              <h3><strong>What?</strong></h3>
            </div>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <div>
          <v-row>           
            <v-col cols="12" md="12">
              <div class="div-card-text">
                <p><span class="span-highlight">Gamingraph</span> is an online resource that serves as a comprehensive repository of detailed information and <span class="span-highlight">metrics related to video games.</span> Our goal is to include information about various aspects of games, such as the games itself, genre, theme, players, characters and all other data about them, along with associated statistics.</p>
                <br/>
                <p>Here we will try to present you data and information in a structured and organized manner, <span class="span-highlight">offering data visualization tools, charts, graphs, and reports</span> to help you understand and interpret the information more easily.</p>
              </div>
            </v-col>
          </v-row>          
        </div>
      </v-card>

      <v-card
        class="mx-auto v-card"
      >
        <v-row>
          <v-col cols="12" md="12">
            <div class="div-card-title">
              <h3><strong>Why?</strong></h3>
            </div>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <div>
          <v-row>
            <v-col cols="12" md="12">
              <div class="div-card-text">
                <p>I wanted to do something useful with my <span class="span-highlight">coding and gaming passion.</span> So I created <span class="span-highlight">Gamingraph</span>.</p>
                <br/>
                <p>Now I want to make it better, providing you accurate, up-to-date data. This way you can perform research, analyze trends, make informed decisions, gain insights or just hang around in this world of gaming statistics. In essence, I wish Gamingraph to serve as valuable source of information and tools for anyone seeking to better understand and engage with data in gaming area.</p>
              </div>
            </v-col>
          </v-row>          
        </div>
      </v-card>

      <v-card
        class="mx-auto v-card"
      >
        <v-row>
          <v-col cols="12" md="12">
            <div class="div-card-title">
              <h3><strong>How?</strong></h3>
            </div>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <div>
          <v-row>
            <v-col cols="12" md="12">
              <div class="div-card-text">
                <p>Until this date, I've consumed <a href="https://api-docs.igdb.com">IGDB (Twitch) public API</a> and generated some graphs and insights. The idea is to <span class="span-highlight">fetch data from different gaming sources and link them</span> creating one single repository with as many information as possible.</p>
                <br/>
                <p>I'll keep an release notes and upcoming features sections updated so you can track the development of <span class="span-highlight">Gamingraph</span>.</p>
                <br/>
                Our website uses:
Latest PHP
postgres for the database
Laravel for the backend
Vue for the frontend

              </div>
            </v-col>
          </v-row>          
        </div>
      </v-card>

      <v-card
        class="mx-auto v-card"
      >
        <v-row>
          <v-col cols="12" md="12">
            <div class="div-card-title">
              <h3><strong>Who?</strong></h3>
            </div>
            <v-divider></v-divider>
          </v-col>
        </v-row>
        <div>
          <v-row>
            <v-col cols="12" md="12">
              <div class="div-card-text">
                <p>I am <span class="span-highlight">Diego Queiroz</span>, developer and gamer.</p>
                <br/>
                <p>Currently <span class="span-highlight">working</span> as a senior developer specialized on Laravel and Vue.</p>
                <br/>
                <p>In the last 9 year I have been a developer, project manager, tech leader, database administrator and played the role of Product Owner on many projects such e-commerce, portals, intranet, customer relationship management apps and more.</p>
                <br/>
                <p>Currently <span class="span-highlight">playing</span> everything that is downloadable =)</p>

              </div>
            </v-col>
          </v-row>          
        </div>
        <v-divider></v-divider>
        <div class="div-updated-at">
          <v-row>
            <v-col cols="12" md="12">
              <div class="div-updated-at-based">
                <v-tooltip
                  location="top"
                >
                  <template v-slot:activator="{ props }">
                    <v-btn
                      density="comfortable"
                      icon
                      class="ma-1"
                      color="blue-grey-lighten-2"
                      @click="openInNewTab('https://www.linkedin.com/in/queirozdiego/')"
                      v-bind="props"
                    >
                      <v-icon color="white">
                        mdi-linkedin
                      </v-icon>
                    </v-btn>
                  </template>
                  <span>/queirozdiego</span>
                </v-tooltip>
                <v-tooltip
                  location="top"
                >
                  <template v-slot:activator="{ props }">
                    <v-btn
                      density="comfortable"
                      class="ma-1"
                      icon
                      color="blue-grey-lighten-2"
                      @click="openInNewTab('https://www.instagram.com/diegojrq/')"
                      v-bind="props"
                    >
                      <v-icon color="white">
                        mdi-instagram
                      </v-icon>
                    </v-btn>
                  </template>
                  <span>@diegojrq</span>
                </v-tooltip>
                <v-tooltip
                  location="top"
                >
                  <template v-slot:activator="{ props }">
                    <v-btn
                      density="comfortable"
                      class="ma-1"
                      icon
                      color="blue-grey-lighten-2"
                      @click="openInNewTab('https://steamcommunity.com/profiles/76561198017038390/')"
                      v-bind="props"
                    >
                      <v-icon color="white">
                        mdi-steam
                      </v-icon>
                    </v-btn>
                  </template>
                  <span>Peeroco</span>
                </v-tooltip>
              </div>
            </v-col>            
          </v-row>
        </div>
      </v-card>
    </v-responsive>
  </v-container>
</template>

<script>

export default {
  name: "About",
  components: { },
  mixins: [],
  data() {
    return {
      user: [],
    }
  },
  created() {
  },
  methods: {
    openInNewTab(url) {
      window.open(url, '_blank', 'noreferrer');
    },
  }
}

</script>

<style lang="scss" scoped>  

.v-card {  
  background-color: #333;
  color: #fff;
  border: 2px solid #fff;
  margin-top: 20px;
}

.div-card-title {
  text-align: right;
  padding: 1%;  
  font-size: 1.3em;
}

.div-card-text {
  text-align: justify;
  padding: 3%;
  font-size: 1em;
  margin: 0;
}

.span-highlight {
  color: #00dd00;
  font-weight: bold;
}

a {
  color: #00ccdd;
  font-weight: bold;
}

.div-updated-at {
  text-align: left;
  padding: 1%;
  font-size: 10px;
}

</style>