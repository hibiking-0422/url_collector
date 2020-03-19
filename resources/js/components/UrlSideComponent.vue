<template>
    <div>
      <div class="left">
     <v-app>
      <v-content>
        <v-container>
          <v-layout wrap>
            <v-flex xs3 v-for="(url, key) in urls">
              <v-card  v-bind:href="url.url" target="_blank" hover shaped width="200" class="ma-2">
                <v-card-title><a v-bind:href="url.url" target="new">{{ url.title }}</a></v-card-title>
                  <v-card-text>
                    {{ url.comment }}
                  </v-card-text>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>
  </div>
        <slide right>
          <div class="input-area">
              <input type="text" class="input-box" v-model="searchWord" v-on:keydown.enter="searchGenres(searchWord)">
          </div>
              <div v-for="(genre, key) in genres"> 
                  <span v-on:click="getUrls(genre.id)">{{ genre.genre_name }}</span>
              </div>
        </slide>
        <div id="page-wrap"></div>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    data:function() {
        return {
            genres: [],
            urls: [],
            searchWord: '',
            active: false,
            navi: false,
        };
    },
    created: function() {
        this.getGenres();
        this.getAllUrls();
    },
    methods: {
        getGenres: function() {
            axios.get('/genre/json')
            .then(response =>{
                this.genres = response.data;
                console.log(response.data);
            });
        },
        getUrls: function(id) {
            axios.get('/url/getUrls', {params :{
                ID: id
            }}).then(response => {
                    this.urls = response.data;
                    console.log(this.urls);
                });
        },
        getAllUrls: function() {
            axios.get('/url/getAllUrls')
              .then(response => {
                    this.urls = response.data;
                    console.log(this.urls);
                });
        },
        searchGenres: function(txt) {
            axios.get('/genre/searchGenres', {params :{
                TXT: txt
            }}).then(response => {
                    this.genres = response.data;
                    console.log(this.genres);
                });
        },
        naviOpen: function() {
            this.active = !this.active;
            this.navi = !this.navi;
        }
    }
}
</script>
<style scoped>

.input-area {
  margin-right: auto;
  margin-left: auto;
}

.input-box {
    height: 40px;
    background-color: snow;
}

.left {
  position:  absolute;
  width: 1250px;    
}

.left a {
  text-decoration: none;
}
</style>