const api = require('./modules/api');

(async () => {
    let responce = await api('/autosell/')
    if (!responce) throw new Error('Cant load autosell')
    console.log("responcexx:"+responce);
    console.log("responcexx2:"+responce.msg);
})()