window.Vue = require('vue');
window.VueRouter = require('vue-router');

const router = new VueRouter();
import { configRouter } from './routes'

configRouter(router);

const App = Vue.extend(require('./app.vue'));
router.start(App, '#app');
window.router = router;
