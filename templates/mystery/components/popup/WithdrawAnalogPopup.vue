<template>
	<div v-if="isLogin && userData && withdrowAnalogItemData" id="withdrawAnalog" class="modal-window widthdrow-modal">
		<div class="title">
			NFT Withdrawal
		</div>
		<div class="info">
      Unfortunately, at this time we were unable to get this NFT for purchase. Instead we can offer you the following NFT.<br>
			<span v-if="withdrowAnalogItemData.balance > 0">Additionally, you will be credited with ${{withdrowAnalogItemData.balance}}</span>
		</div>		
		<div class="item-wrap">
			<div class="gun_item" :class="withdrowAnalogItemData.analog.rarity">
				<div class="gun_img">
					<img :src="withdrowAnalogItemData.analog.image" :alt="withdrowAnalogItemData.analog.name">
				</div> 
				<div class="gun_name" v-html="nftItemName(withdrowAnalogItemData.analog.name)"></div>
				<div class="gun_cost">{{withdrowAnalogItemData.analog.price}}</div>
			</div>
		</div>
		<div class="btns-wrap">
			<button class="modal-btn c-button" @click="withdrawItem">Withdraw <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
			<button class="modal-btn empty c-button" @click="close">Close <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
		</div>
	</div>
</template>
<script>
	export default {
		props: {
			withdrowAnalogItemData: false
		},
		data: () => ({
				itemActionInProgress: false
			}),
		mounted() {
			$(document).on('click', '#withdrawAnalog', () => {
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '#withdrawAnalog');
		},
		methods: {
			close() {
				this.$emit('closeWithdrawAnalogModal');
			},
      nftItemName(name) {
				return name;
			},
			withdrawItem() {
				let item = this.withdrowAnalogItemData.item;
				if (this.itemActionInProgress || item.disable) {
					return;
				}
				this.itemActionInProgress = true;
				this.$set(item, 'disable', true);
				let balance = this.withdrowAnalogItemData.balance;
				Utils.apiPostCall("/api/request/getnft/" + item.id + "/", {analog: this.withdrowAnalogItemData.analog.id})
						.then(resp => {
							if (resp.data.success) {
								item.status = 1;
								if (balance > 0) {
									this.$store.commit('changeBalance', balance);
								}
								Utils.userAlert(resp.data.msg, '', 'success');
							} else {
								Utils.userAlert('An error occurred when buying the NFT', resp.data.error, 'error');
							}
							this.itemActionInProgress = false;
							this.$set(item, 'disable', false);
						})
						.catch(err => {
							this.itemActionInProgress = false;
							this.$set(item, 'disable', false);
							Utils.userAlert('An error occurred when buying the NFT', err.response.statusText, 'error');
						});
				this.close();
			}
		},
		computed: {
      userData() {
        return this.$store.getters.userData;
      },
      hasUserData() {
        return this.$store.getters.hasUserData;
      },
			isLogin() {
				return this.$store.getters.isLogin;
			}
		}
	}
</script>