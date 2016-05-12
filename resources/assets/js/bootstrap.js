//Vue initialization
window.Vue = require('vue');
window.VueRouter = require('vue-router');

//Vue-router initialization
const router = new VueRouter();
import { configRouter } from './routes'

// Inject the routes into the VueRouter object
configRouter(router);

// Configure the application
window.config = require('./config/development');
Vue.config.debug = config.debug;

// Configure our HTTP client
var rest = require('rest');
var pathPrefix = require('rest/interceptor/pathPrefix');
var mime = require('rest/interceptor/mime');
var defaultRequest = require('rest/interceptor/defaultRequest');
var errorCode = require('rest/interceptor/errorCode');
var interceptor = require('rest/interceptor');
var jwtAuth = require('./interceptor/jwtAuth');

window.client = rest.wrap(pathPrefix, { prefix: config.api.base_url })
    .wrap(mime)
    .wrap(defaultRequest, config.api.defaultRequest)
    .wrap(errorCode, { code: 400 })
    .wrap(jwtAuth);

// Pulling in the basic global components


//Bootstrap the app
const App = Vue.extend(require('./app.vue'));
router.start(App, '#app');
window.router = router;
