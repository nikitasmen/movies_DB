<template>
    <div>
        <h1>My Movies DB</h1>
        <p>Here you can see and edit all watched movies</p>
    </div>
    <div class="header">
        <div class="search">
            <input type="text" placeholder="Search.." name="search" v-model="search">
            <button type="submit" @click="searchMovie">Search</button>
        </div>
            <router-link to="/create" custom v-slot="{ navigate }">
            <button class="addBtn" @click="navigate">Add a new movie</button>
        </router-link>
    </div>
    <div class="mainDiv">
        <table>

                <tr>
                    <th>Tittle</th>
                    <th>Year</th>
                    <th>Director</th>
                    <th>Genre</th>
                    <th>Rating</th>
                </tr>
                <tr v-for="(movie ,id ) in movies" :key="id">
                    <!-- <td>//Show image here</td> -->
                    <td>{{ movie.tittle }}</td>
                    <td>{{ movie.year }}</td>
                    <td>{{ movie.director }}</td>
                    <td>
                        <span v-for="(category, index) in movie.categoryName" :key="index">
                            {{ category }}<span v-if="index < movie.categoryName.length - 1">, </span>
                        </span>
                    </td>
                    <td>{{ movie.rate }}/10</td>
            </tr>

        </table>
    </div>
</template>
<style>
    @import './css/menu.css';
</style>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            search: '',
            movies: [],
        }
    },
    mounted() {
        axios.get('/api/movies')
            .then(response => {
                this.movies = response.data;
            });
    },
    methods: {
        searchMovie() {
            axios.get('/api/movies/search', {
                params: {
                   search: this.search
            }
            }).then(response => {
                this.$router.push({ name: 'search',
                params: { search: JSON.stringify(response.data)}
            })
            });
        }
    }


}
</script>
