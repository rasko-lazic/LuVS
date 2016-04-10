<style scoped>
    h1 {
        color: #9c0033;
        text-align: center;
    }
</style>

<template>
    <h1>{{ content }}</h1>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                content: "This app is officially tested!!"
            }
        }
    }
</script>