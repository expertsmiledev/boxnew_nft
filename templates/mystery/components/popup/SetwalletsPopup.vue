<template>
  <div v-if="isLogin && userData" class="modal fade" id="setwalletsModal" tabindex="-1" role="dialog" aria-labelledby="setwalletsModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content mndlfjiwlf">
        <div class="css-ranbx4 kgfnaowmgt" width="800">
          <div class="css-3g9l7g gbkaur">
            <div class="css-1he5r9c grewiozvc">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 ksofwelpa">Set Wallet</div>
              </div>
              <form class="asnzxlra">
                <div class="css-9s9ecg sdeponv">
                  <label for="ethwallet_modal" class="css-puxo7b krsaizow">ETH<span class="css-1vr6qde sgdfkoqlzew"> *</span></label>
                  <div>
                    <div class="css-1en6d7w klweaioasb"><input v-model="userData.ethwallet" spellcheck="false" class="srnvclkas" type="text" name="text" placeholder="Wallet address" id="ethwallet_modal"></div>
                  </div>
                </div>
                <div class="css-9s9ecg sdf92lsa"></div>
                <div class="css-9s9ecg"></div>

                <div @click="setWalletSend()" class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                  <svg id="avsubmload12" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                  <span id="submbttxav12" class="css-1ubm3rw">SAVE</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
	export default {
    data() {
      return {
        savingEthWalletmdStatus: 0,
        actionInProgress: false
      }},
		mounted() {
			$(document).on('click', '[data-popup="setwalletsModal"]', () => {
				$('#setwalletsModal').addClass('open').addClass('animate');
				$(document).on('click', '#setwalletsModal', (e) => {
						e.stopPropagation();
				});
        $(document).on('click', '#useaffbutton', (e) => {
          this.useaffSend();
        });
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="setwalletsModal"]');
		},
    methods: {
      setWalletSend() {
        if (this.savingEthWalletmdStatus == 1) {
          return;
        }
        this.savingEthWalletmdStatus = 1;
        $("#submbttxav12").addClass("loadhide");
        $("#avsubmload12").removeClass("loadhide");
        Utils.apiPostCall("/api/request/setethwallet/", {
          eth_wallet: $("#ethwallet_modal").val()
        })
            .then(resp => {
              if (resp.data.success) {
                this.savingEthWalletmdStatus = 2;
                Utils.userAlert('Saved successfully', '', 'success');
              } else {
                this.savingEthWalletmdStatus = 3;
                Utils.userAlert('An error occurred while saving Ethereum wallet address', resp.data.error, 'error');
              }
              $("#submbttxav12").removeClass("loadhide");
              $("#avsubmload12").addClass("loadhide");
            })
            .catch(err => {
              this.savingEthWalletmdStatus = 3;
              $("#submbttxav12").removeClass("loadhide");
              $("#avsubmload12").addClass("loadhide");
              Utils.userAlert('An error occurred while saving Ethereum wallet address', err.response.statusText, 'error');
            });
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