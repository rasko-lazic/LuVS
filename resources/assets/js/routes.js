module.exports = {

    configRouter: function (router) {

        router.map({
            '/test': {
                component: require('./components/test.vue'),
                guest: true
            }
        });

        router.alias({
            '': '/home',
            '/auth': '/auth/login'
        });

        router.beforeEach(function (transition) {

            var token = localStorage.getItem('jwt-token')
            if (transition.to.auth) {
                if (!token || token === null) {
                    transition.redirect('/auth/login')
                }
            }
            if (transition.to.guest) {
                if (token) {
                    transition.redirect('/')
                }
            }
            transition.next()
        })
    }
};