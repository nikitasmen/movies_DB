<template>
    <div class="menu">

    </div>
</template>
<script>
export default {
    props: ['search'],
    data() {
        return {
            movies: [],
        }
    },
    methods: {
        navigate() {
            console.log(this.search)
        }
    }
}
</script>
