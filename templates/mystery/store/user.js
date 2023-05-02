import Vue from 'vue';
import { Centrifuge } from 'centrifuge';

function getToken(url, ctx) {
	return new Promise((resolve, reject) => {
		fetch(url, {
			method: 'POST',
			headers: new Headers({ 'Content-Type': 'application/json' }),
			body: JSON.stringify(ctx)
		})
			.then(res => {
				if (!res.ok) {
					throw new Error(`Unexpected status code ${res.status}`);
				}
				return res.json();
			})
			.then(data => {
				resolve(data.user.jwtc);
			})
			.catch(err => {
				reject(err);
			});
	});
}

Vue.prototype.$centrifugeConnected = false;
let centrifuge = new Centrifuge('wss://smirnoffonbahamas.vip:8443/connection/websocket', {
	token: '',
	getToken: function (ctx) {
		return getToken('/api/member/', ctx);
	}
});

Vue.prototype.$centrifuge = centrifuge;
centrifuge.on('connect', (ctx) => {
	if (Vue.prototype.$centrifugeConnected != true) {
		Vue.prototype.$centrifugeConnected = true;
		Vue.prototype.$eventBus.$emit('centrifugeConnected');
		console.log("connected", ctx);
	}
	console.log("connected2", ctx);
});
centrifuge.on('disconnect', (ctx) => {
	if (Vue.prototype.$centrifugeConnected != false) {
		Vue.prototype.$centrifugeConnected = false;
		Vue.prototype.$eventBus.$emit('centrifugeDisconnected');
		console.log("disconnected", ctx);
	}
	console.log("disconnected2", ctx);
});

centrifuge.on('error', function (ctx) {
	console.log('Error:', ctx)
});

centrifuge.on('connecting', function (ctx) {
	console.log(`connecting: ${ctx.code}, ${ctx.reason}`);
}).on('connected', function (ctx) {
	Vue.prototype.$centrifugeConnected = true;
	Vue.prototype.$eventBus.$emit('centrifugeConnected');
	console.log(`connected over ${ctx.transport}`);
}).on('disconnected', function (ctx) {
	Vue.prototype.$centrifugeConnected = false;
	Vue.prototype.$eventBus.$emit('centrifugeDisconnected');
	console.log(`disconnected: ${ctx.code}, ${ctx.reason}`);
}).connect();

let connectedToMessageSystem = false;
let connectedToUpdateBalSystem = false;
let userIdfData = 0;

export default {
	data: () => ({
		destroyed: false,
		connectedToMessageSystem: false,
		connectedToUpdateBalSystem: false,
		userIdfData: 0
	}),
	actions: {
		getUserData(ctx) {
			Utils.apiPostCall('/api/member/')
					.then(resp => {
						ctx.commit('updateUser', resp.data.user);
						console.log('jwtc:'+resp.data.user.jwtc);
						if (connectedToMessageSystem == false) {
								const messagesystemcentr = centrifuge.newSubscription("glob:messageSystem" + resp.data.user.id);

								messagesystemcentr.on('publication', function (respx) {
									if (respx.data.success) {
										Utils.userAlert(respx.data.message, respx.data.message2, respx.data.type);
									}
								}).subscribe();
						}
						if (connectedToUpdateBalSystem == false) {
								const updatebalancecentr = centrifuge.newSubscription("glob:updateBalance" + resp.data.user.id);

								updatebalancecentr.on('publication', function (respx) {
									console.log("update balance");
									console.log(respx.data);
									console.log(respx.data.balance);
									if (respx.data.success) {
										$(".user_cash").html(respx.data.balance);
									}
								}).subscribe();
						}
						userIdfData = resp.data.user.id;
						connectedToMessageSystem = true;
						connectedToUpdateBalSystem = true;
					})
		}
	},
	beforeDestroy() {
		this.destroyed = true;
	},
	mutations: {
		updateUser(state, user) {
			Vue.set(state, 'user', user);
		},
		changeBalance(state, change) {
			let axcb = parseFloat(state.user.balance) + parseFloat(change);
			Vue.set(state.user, 'balance', axcb.toFixed(2));
		},
		setBalance(state, balance) {
			Vue.set(state.user, 'balance', balance);
		},
		changeExpe(state, change) {
			Vue.set(state.user, 'exp', parseInt(state.user.exp) + parseInt(change));
		},
		setExpe(state, exp) {
			Vue.set(state.user, 'exp', exp);
		},
	},
	state: {
		user: {}
	},
	getters: {
		hasUserData(state) {
			return Object.keys(state.user).length != 0;
		},
		userData(state) {
			return state.user;
		},
		isLogin(state) {
			return state.user && state.user.login;
		}
	}
}