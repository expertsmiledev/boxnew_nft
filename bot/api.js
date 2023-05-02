const api = require('./modules/api');
const request = require('request-promise');
const requestify = require('requestify');

const uris = [
    /*{
        method: '/currencies/rates/update/',
        params: {},
        interval: 60 * 60000,
        func: async function() {
            api(this.method, await updateFiatRates())
        }
    },
    */
    {
        method: '/autosell/',
        interval: 10 * 60000
    }
];

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

(function looprain() {
    var minutesrain = getRandomInt(30,110), the_intervalrain = minutesrain * 60 * 1000;
    setTimeout(function() {
        sendrain();
        looprain();
    }, the_intervalrain);
}());

function sendrain(){
    requestify.request('https://smirnoffonbahamas.vip' + '/api/rainon/',{
        method: 'POST',
        headers: {
            'Authorization' : 'Basic ' + 'nva090324u0238yAk012489axva',
            'User-Agent': 'API CALL'
        }
    })
        .then(function(res) {
            console.log(res.body);
            setTimeout(function() {sendrainoff();}, 30000);
        }, function(res) {
            console.log(res.body);
            console.log('sendrain error');
            console.log('retried');
            setTimeout(function() {sendrain();}, 2500);
        });
}
function sendrainoff(){
    requestify.request('https://smirnoffonbahamas.vip' + '/api/rainoff/',{
        method: 'POST',
        headers: {
            'Authorization' : 'Basic ' + 'nva090324u0238yAk012489axva',
            'User-Agent': 'API CALL'
        }
    })
        .then(function(res) {
            console.log(res.body);
        }, function(res) {
            console.log(res.body);
            console.log('sendrainoff error');
            console.log('retried');
            setTimeout(function() {sendrainoff();}, 2500);
        });
}

(async () => {
    for(let i in uris) {
        let uri = uris[i]
        setInterval(() => {
            if (typeof uri.func == 'function') {
                uri.func()
            } else {
                api(uri.method, uri.params)
            }
        }, uri.interval)
        if (typeof uri.func == 'function') {
            uri.func()
        } else {
            await api(uri.method, uri.params)
        }
    }
})()
