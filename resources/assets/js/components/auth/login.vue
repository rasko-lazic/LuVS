<style scoped>

</style>

<template>

</template>

<script>
    module.exports = {

        data: function () {
            return {
                user: {
                    email: null,
                    password: null
                },
                messages: [],
                loggingIn: false
            }
        },

        methods: {
            attempt: function () {
                var self = this;
                self.loggingIn = true;
                client({ path: 'login', method: 'POST', entity: self.user }).then(
                        function (response) {
                            //TODO check if this event is dead end
                            self.$dispatch('userHasFetchedToken', response.token);
                            self.getUserData();
                        },
                        function (response) {
                            self.messages = [];
                            if (response.status && response.status.code === 401) {
                                self.messages.push({ message: 'Sorry, you provided invalid credentials' });
                            }
                            self.loggingIn = false;
                        }
                )
            },

            getUserData: function () {
                var self = this;
                client({ path: '/users/me' }).then(
                        function (response) {
                            self.$dispatch('userHasLoggedIn', response.entity.user);
                            self.$route.router.go('/spendings')
                        },
                        function (response) {
                            console.log(response)
                        }
                )
            }
        },

        route: {
            activate: function (transition) {
                var self = this;
                self.$dispatch('userHasLoggedOut');
                transition.next()
            }
        }
    }
</script>