<style scoped>
    h1 {
        color: #9c0033;
        text-align: center;
    }

    p {
        color: #8080ff;
        text-align: center;
    }
</style>

<template>
    <h1>{{ content }}</h1>
    <p><a v-link="{ path: '/' }" @click="getRoot">[UNTEST]</a></p>
    <button @click="greet">Greet</button>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                content: "This app is officially tested!!"
            };
        },

        methods: {
            getRoot: function() {
                console.log(this.$root);
            },

            greet: function () {
                console.log('hello there');
            }
        }
    }
</script>