<style scoped>
    h1 {
        color: #81be00;
    }
</style>

<script>
    module.exports = {

        el: '#app',

        ready: function () {
            console.log('boot');
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
                this.user = user
                this.authenticated = true
                this.token = localStorage.getItem('jwt-token')
            },

            destroyLogin: function (user) {
                // Cleanup when token was invalid our user has logged out
                this.user = null
                this.token = null
                this.authenticated = false
                localStorage.removeItem('jwt-token')
                if (this.$route.auth) this.$route.router.go('/auth/login')
            }
        }

    }
</script>