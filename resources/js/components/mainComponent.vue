<template>
    <div>
        <h1>My Movies DB</h1>
        <p>Here you can see and edit all watched movies</p>
    </div>
    <div>
        <router-link to="/create" custom v-slot="{ navigate }">
            <button class="addBtn" @click="navigate">Add a new movie</button>
        </router-link>
    </div>
    <div class="moviesTable">
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
<script>
import axios from 'axios';

export default {
    data() {
        return {
            movies: [],
        }
    },
    mounted() {
        axios.get('/api/movies')
            .then(response => {
                this.movies = response.data;
            });
    },

}
</script>
