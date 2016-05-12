<template>
    <div id="auth">
        <router-view></router-view>
    </div>
</template>

<script>
    module.exports = {

        ready: function() {
            console.log('auth');
        }
    }
</script>