import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import VueClipboards from "vue-clipboards";
import Notifications from 'vue-notification'
import User from './store/user';
import Index from './components/pages/IndexPage.vue';
import Case from './components/pages/CasePage.vue';
import Battles from './components/pages/BattlesPage.vue';
import Battle from './components/pages/BattlePage.vue';
import Top from './components/pages/TopPage.vue';
import FAQ from './components/pages/FAQPage.vue';
import Affiliates from './components/pages/AffiliatesPage.vue';
import Howdoes from './components/pages/HowdoesPage.vue';
import Provablyfair from './components/pages/ProvablyfairPage.vue';
import Transparency from './components/pages/TransparencyPage.vue';
import Termsofservice from './components/pages/TermsofservicePage.vue';
import Privacystatement from './components/pages/PrivacystatementPage.vue';
import Amlpolicy from './components/pages/AmlpolicyPage.vue';
import Token from './components/pages/TokenPage.vue';
import Settings from './components/pages/SettingsPage.vue';
import Contact from './components/pages/ContactPage.vue';
import Default from './components/pages/DefaultPage.vue';
import { ethers } from "ethers";
import GoogleAuth from './google.js';
import VueCompositionAPI from '@vue/composition-api';
//import VueRecaptcha from 'vue-recaptcha';



window.$ = window.jQuery = require('jquery');
window.Utils = require('./utils/utils');
window.axios = require('axios');
window.Centrifuge = require("centrifuge");
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

const gauthOption = {
	clientId: '386308555123-8rehuih0f3j87q08nnq89u5ea7v6fns1.apps.googleusercontent.com',
	scope: 'profile email',
	prompt: 'select_account'
}

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueClipboards);
Vue.use(Notifications);
Vue.use(GoogleAuth, gauthOption);
Vue.use(VueCompositionAPI);
//Vue.use(VueRecaptcha);


Vue.prototype.$eventBus = new Vue();

Vue.prototype.SITE_URL = "https://smirnoffonbahamas.vip";
Vue.prototype.SITE_NAME = "SmirnoffonBahamas";

Vue.component('header-layout', require('./components/layout/HeaderLayout.vue').default);
Vue.component('drop-layout', require('./components/layout/DropLayout.vue').default);
Vue.component('chat-layout', require('./components/layout/ChatLayout.vue').default);
Vue.component('footer-layout', require('./components/layout/FooterLayout.vue').default);
Vue.component('page-404', require('./components/pages/404.vue').default);

const router = new VueRouter({
	mode: 'history',
	routes: [
		{path: '/', component: Index},
		{path: '/case/:key/', component: Case},
		//{path: '/battles/', component: Battles},
		//{path: '/battle/:id/', component: Battle},
		{path: '/leaderboard/', component: Top},
		{path: '/faq/', component: FAQ},
		{path: '/how-it-works/', component: Howdoes},
		{path: '/provably-fair/', component: Provablyfair},
		{path: '/transparency/', component: Transparency},
		{path: '/terms-of-service/', component: Termsofservice},
		{path: '/privacy-statement/', component: Privacystatement},
		{path: '/settings/', component: Settings},
		{path: '/aml-policy/', component: Amlpolicy},
		{path: '/token/', component: Token},
		{path: '/affiliate/', component: Affiliates},
		{path: '/contact/', component: Contact},
		{path: '*', component: Default}
	],
	scrollBehavior(to, from, savedPosition) {
		if (savedPosition) {
			return savedPosition;
		} else {
			return {x: 0, y: 0};
		}
	}
});

const store = new Vuex.Store({
	strict: true,
	state: {
		account: null,
		error: null,
		mining: false,
	},
	modules: {
		User
	},
	getters: {
		account: (state) => state.account,
		error: (state) => state.error,
		mining: (state) => state.mining
	},
	mutations: {
		setAccount(state, account) {
			state.account = account;
		},
		setError(state, error) {
			state.error = error;
		},
		setMining(state, mining) {
			state.mining = mining;
		},
	},
	actions: {
		async walletConnectconnect(){


		},
		async connect({ commit, dispatch }, connect) {
			try {
				const { ethereum } = window;
				if (!ethereum) {
					commit("setError", "Metamask not installed!");
					return;
				}
				if (!(await dispatch("checkIfConnected")) && connect) {
					await dispatch("requestAccess");
				}
				await dispatch("checkNetwork");
				if (ethereum) {
					const accounts = await window.ethereum.enable();
					const provider = new ethers.providers.Web3Provider(window.ethereum);
					console.log('account: ', accounts[0]);
					console.log('provider: ', provider);
					const signer = provider.getSigner();
						Utils.apiPostCall("/api/request/getnonce/", {
							wallet: accounts[0]
						})
						.then(resp => {
							console.log(resp.data);
							signer.signMessage("Sign in to smirnoffonbahamas.vip Nonce:"+resp.data.nonce).then(function(result) {
								Utils.apiPostCall("/api/request/verifysig/", {
									address: accounts[0],
									signature: result
								})
									.then(resp => {
										console.log(resp.data);
										if (resp.data.signature == "successsignature"){
											Utils.userAlert('Success', 'Account created successfully, please enter your username now', 'success');
											$("#loginModal").modal("hide");
											$("#registerModal").modal("hide");
											$('#claimunameModal').modal('toggle');
											$(document).on('click', '#setusernamebutton', (e) => {
												console.log("clicked");
												$("#submbttxav8").addClass("loadhide");
												$("#avsubmload8").removeClass("loadhide");
												Utils.apiPostCall("/api/request/setusername/", {"new_username":$("#unamesn_modal").val()
												})
													.then(resp => {
														console.log(resp.data);
														if (resp.data.success) {
															Utils.userAlert('Username has been successfully set up.', '', 'success');
															$('#claimunameModal').modal('toggle');
															window.location.reload();
														} else {
															Utils.userAlert('An error occurred during setting up username', resp.data.error, 'error');
														}
														$("#submbttxav8").removeClass("loadhide");
														$("#avsubmload8").addClass("loadhide");
													})
													.catch(err => {
														$("#submbttxav8").removeClass("loadhide");
														$("#avsubmload8").addClass("loadhide");
														Utils.userAlert('An error occurred during setting up username', err.response.statusText, 'error');
													});
											});
										}
										if (resp.data.lgdins == 1){
											window.location.reload();
										}
									})
									.catch(err => {
										Utils.userAlert('An error occurred', err.response.statusText, 'error');
									});
							})
						})
						.catch(err => {
							Utils.userAlert('An error occurred', err.response.statusText, 'error');
						});
				}
			} catch (error) {
				console.log(error);
				commit("setError", "Account request refused.");
			}
		},
		async checkNetwork({ commit, dispatch }) {
			let chainId = await ethereum.request({ method: "eth_chainId" });
			const ethmainnet = "0x1";
			if (chainId !== ethmainnet) {
				if (!(await dispatch("switchNetwork"))) {
					commit(
						"setError",
						"You are not connected to the ETH Main Network!"
					);
				}
			}
		},
		async switchNetwork() {
			try {
				await ethereum.request({
					method: "wallet_switchEthereumChain",
					params: [{ chainId: "0x1" }],
				});
				return 1;
			} catch (switchError) {
				return 0;
			}
		},
		async checkIfConnected({ commit }) {
			const { ethereum } = window;
			const accounts = await ethereum.request({ method: "eth_accounts" });
			if (accounts.length !== 0) {
				commit("setAccount", accounts[0]);
				return 1;
			} else {
				return 0;
			}
		},
		async requestAccess({ commit }) {
			const { ethereum } = window;
			const accounts = await ethereum.request({
				method: "eth_requestAccounts",
			});
			commit("setAccount", accounts[0]);
		},
		async signMessage(message) {
			try {
				const provider = ethers.providers.Web3Provider(window.Ethereum);
				await provider.signMessage(message)
				return 1;
			} catch (switchError) {
				return 0;
			}
		},
		async sendetx({ commit, dispatch }, payload) {
			console.log('sendetxx2');
			try {
				console.log('sendetxx3');
				const { ethereum } = window;
				if (!ethereum) {
					commit("setError", "Metamask not installed!");
					return;
				}
				console.log('sendetxx4');
				if (!(await dispatch("checkIfConnected")) && payload.connect) {
					await dispatch("requestAccess");
				}
				console.log('sendetxx5');
				await dispatch("checkNetwork");
				if (ethereum) {
					console.log('sendetxx6');
					const accounts = await window.ethereum.enable();
					const provider = new ethers.providers.Web3Provider(window.ethereum);
					console.log('sendetxaccount: ', accounts[0]);
					console.log('sendetxprovider: ', provider);
					console.log('sendetxamnt:', payload.amnt);
					console.log('sendetxadrx:', payload.adrx);
					console.log('wei:', (''+parseFloat(payload.amnt*1000000000000000000)));
					const transactionParameters = {
						to: ''+payload.adrx,
						from: accounts[0],
						value: (payload.amnt*1000000000000000000).toString(16),
						chainId: '0x3',
					};
					const txHash = await ethereum.request({
						method: 'eth_sendTransaction',
						params: [transactionParameters],
					})
						.then((txHash) => Utils.userAlert('Your deposit will be processed after transaction confirmation', '', 'success'))
						.catch((error) => console.error);
				}
			} catch (error) {
				console.log(error);
				commit("setError", "Send request refused.");
			}
		}
	},
});

const app = new Vue({
	el: '#app',
	router,
	store,
	created: function () {
		this.$store.dispatch('getUserData');
	}
});

export default app;
