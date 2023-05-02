const request = require('request-promise');
const config = require('../config');

module.exports = async (method, params) => {
    let options = {
        uri: config.host + '/api' + method,
        headers: {
            'Authorization' : 'Basic ' + config.apiKey,
            'User-Agent': 'API CALL'
        },
        method: 'POST',
        json: true
    }
    if (params) {
        options.form = params
    }
    console.log("request to:"+config.host + '/api' + method);
    let responce = await request(options).catch((err) => {})
    console.log("response:"+responce.msg)
    if (!responce) return false
    return responce
}