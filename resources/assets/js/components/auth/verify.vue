<style scoped>

</style>

<template>

</template>

<script>
    module.exports = {

        data: function () {
            return {
                verificationString: '',
                messages: [],
                verifying: false
            }
        },

        methods: {
            verifyUser: function () {
                var self = this;
                self.verifying = true;
                self.messages = [];
                self.$dispatch('userHasLoggedOut');
                client({ path: '/verify/' + self.verificationString, 'method': 'GET', entity: this.user }).then(
                        function (response) {
                            self.messages.push({ message: 'Thank you for verifying your account' });
                            self.getUserData();
                            self.verifying = false;
                        },
                        function (response) {
                            if (response.status && response.status.code === 401) {
                                self.messages.push({ message: response.entity.message });
                            } else {
                                self.messages.push({ message: 'Oops, something went wrong.' });
                            }
                            self.verifying = false;
                        }
                )

            },

            getUserData: function () {
                var self = this;
                client({ path: '/users/me' }).then(
                        function (response) {
                            self.$dispatch('userHasLoggedIn', response.entity.user);
                        }
                )
            }
        },

        route: {
            data: function (transition) {
                var self = this;

                //noinspection JSUnresolvedVariable
                transition.next({ verificationString: self.$route.params.verification_string });
                self.verifyUser();
            }
        }
    }
</script>