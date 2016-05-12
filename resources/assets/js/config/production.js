var config = {
    env: 'production',
    api: {
        base_url: '',
        defaultRequest: {
            headers: {
                'X-Requested-With': 'rest.js',
                'Content-Type': 'application/json'
            }
        }
    },
    social: {
        facebook: '',
        twitter: '',
        github: ''
    },
    debug: false
}

module.exports = config