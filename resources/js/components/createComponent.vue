<template>
     <div class="modal">
        <form @submit.prevent="submitForm" class="form" >
            <div class="container">
                <h1>Congrats</h1>
                <p>You've seen a new movie. Tell us more about it</p>
                <hr>
                <label for="movieName">Enter the name of the movie's name</label>
                <input type="text" required id="movieName" v-model="tittle">
                <br>
                <label for="movieYear">Enter the year of the movie</label>
                <input type="text"  id="movieYear" v-model="year">
                <br>
                <label for="movieDirector">Enter the director of the movie</label>
                <input type="text"  id="movieDirector" v-model="director">
                <br>
                <label for="movieGenre">Enter the genre of the movie</label>
                <input type="text"  id="movieGenre" v-model="genre">
                <br>
                <div class="clearfix">
                    <router-link to="/" custom v-slot="{ navigate }">
                        <button class="cancelBtn" @click="navigate">Cancel</button>
                    </router-link>
                    <button class="subBtn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    export default{
        data(){
            return{
                tittle: '',
                year: '',
                director: '',
                genre: '',
            }
        },
        methods: {
            submitForm(){
                axios.post('/api/movies', {
                    tittle: this.tittle,
                    year: this.year,
                    director: this.director,
                    genre: this.genre,
                })
                .then(response => {
                    // this.$router.push({ name: 'home' })
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }
        }
    }

</script>
