<style scoped>

</style>

<template>

</template>

<script>
    module.exports = {

        data: function () {
            return {
                user: {
                    name: null,
                    email: null,
                    password: null
                },
                messages: [],
                registering: false
            }
        },

        methods: {
            registerUser: function () {
                var self = this;
                self.registering = true;
                client({ path: '/register', 'method': 'POST', entity: this.user }).then(
                        function (response) {
                            self.getUserData()
                        },
                        function (response) {
                            self.messages = [];
                            if (response.status && response.status.code === 422) {
                                self.messages = [];
                                for (var key in response.entity) {
                                    self.messages.push({message: response.entity[key]});
                                    self.registering = false;
                                }
                            }
                        }
                )

            },

            getUserData: function () {
                var self = this;
                client({ path: '/users/me' }).then(
                        function (response) {
                            self.$dispatch('userHasLoggedIn', response.entity.user);
                            self.$route.router.go('/spendings');
                        }
                )
            }
        }
    }
</script>