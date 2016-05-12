<style scoped>
    #router {
        width: 100vw;
        height: 100vh;
        max-width: 100%;
        max-height: 100%;
        overflow-y: hidden;
        overflow-x: hidden;
    }
</style>

<template>
    <div id="router">
        <router-view></router-view>
    </div>
</template>

<!--suppress JSUnresolvedFunction, JSUnresolvedVariable -->
<script>
    module.exports = {

        ready: function () {

            this.$on('userHasLoggedOut', function () {
                var self = this;
                self.destroyLogin();
            });

            this.$on('userHasLoggedIn', function (user) {
                var self = this;
                self.setLogin(user);
            });

            // The app has just been initialized, check if we can get the user data with an already existing token
            var token = localStorage.getItem('jwt-token');
            if (token !== null && token !== 'undefined') {
                var self = this;
                client({ path: '/users/me' }).then(
                        function (response) {
                            // User has successfully logged in using the token from storage
                            self.setLogin(response.entity.user);
                            // broadcast an event telling our children that the data is ready and views can be rendered
                            self.$broadcast('data-loaded');
                        },
                        function (response) {
                            self.destroyLogin()
                        }
                )
            }
        },

        data: function () {
            return {
                user: null,
                token: null,
                authenticated: false
            }
        },

        methods: {
            setLogin: function (user) {
                // Save login info in our data and set header in case it's not set already
                this.user = user;
                this.authenticated = true;
                this.token = localStorage.getItem('jwt-token');
            },

            destroyLogin: function () {
                // Cleanup when token was invalid our user has logged out
                this.user = null;
                this.token = null;
                this.authenticated = false;
                localStorage.removeItem('jwt-token');
                if (this.$route.auth) this.$route.router.go('/auth/login');
            }
        }
    };
</script>