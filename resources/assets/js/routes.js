module.exports = {

    configRouter: function (router) {

        router.map({
            '/auth': {
                component: require('./components/auth/auth.vue'),
                subRoutes: {
                    '/login': {
                        component: require('./components/auth/login.vue'),
                        guest: true
                    },
                    '/register': {
                        component: require('./components/auth/register.vue'),
                        guest: true
                    },
                    '/logout': {
                        component: require('./components/auth/logout.vue'),
                        auth: true
                    },
                    '/verify/:verification_string': {
                        component: require('./components/auth/verify.vue')
                    }
                }
            }
        });

        router.redirect({
            
        });

        router.alias({
            '/auth': '/auth/login'
        });

        router.beforeEach(function (transition) {

            var token = localStorage.getItem('jwt-token');
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