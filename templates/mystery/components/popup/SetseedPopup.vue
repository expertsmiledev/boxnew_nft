<template>
  <div v-if="isLogin && userData" class="modal fade" id="setseedModal" tabindex="-1" role="dialog" aria-labelledby="setseedModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content mndlfjiwlf">
        <div class="css-ranbx4 kgfnaowmgt" width="800">
          <div class="css-3g9l7g gbkaur">
            <div class="css-1he5r9c grewiozvc">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 ksofwelpa">Set Seed</div>
              </div>
              <form class="asnzxlra">
                <div class="css-9s9ecg sdeponv">
                  <label for="seedmbr_modal" class="css-puxo7b krsaizow">Seed<span class="css-1vr6qde sgdfkoqlzew"> *</span></label>
                  <div>
                    <div class="css-1en6d7w klweaioasb"><input v-model="userData.seed" spellcheck="false" class="srnvclkas" type="text" name="text" placeholder="Wallet address" id="seedmbr_modal"></div>
                  </div>
                </div>
                <div class="css-9s9ecg sdf92lsa"></div>
                <div class="css-9s9ecg"></div>

                <template><vue-recaptcha ref="recaptchasdmvzn" sitekey="6Ldp-NcfAAAAAE8FXN_x1B524wBanfc9TZcI1I6g" @verify="recaptchaVerifyssdpn" @expired="resetCaptchassdpn" @error="resetCaptchassdpn" size="invisible">
                  <button @click.prevent="recaptchaSendssdpn()" class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="padding:0;position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;">
                    <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;">
                      <p class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                        <svg id="avsubmload11" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                        <span id="submbttxav11" class="css-1ubm3rw">SAVE</span>
                      </p>
                      <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
                  </button>
                </vue-recaptcha></template>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {VueRecaptcha} from 'vue-recaptcha';
	export default {
    components: {
      'vue-recaptcha': VueRecaptcha
    },
    data() {
      return {
        changeSeedmdStatus: 0,
        actionInProgress: false
      }},
		mounted() {
			$(document).on('click', '[data-popup="setseedModal"]', () => {
				$('#setseedModal').addClass('open').addClass('animate');
				$(document).on('click', '#setseedModal', (e) => {
						e.stopPropagation();
				});
        $(document).on('click', '#useaffbutton', (e) => {
          this.useaffSend();
        });
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="setseedModal"]');
		},
    methods: {
      recaptchaSendssdpn() {
        $("#submbttxav11").addClass("loadhide");
        $("#avsubmload11").removeClass("loadhide");
        this.$refs.recaptchasdmvzn.execute();
      },
      recaptchaVerifyssdpn(response){
        console.log('recaptcha response: ' + response)
        if (this.changeSeedmdStatus == 1) {
          return;
        }
        this.changeSeedmdStatus = 1;
        Utils.apiPostCall("/api/request/changeseed/", {
          new_seed: $("#seedmbr_modal").val(),
          recaptch_seed_resp: response
        })
            .then(resp => {
              if (resp.data.success) {
                this.changeSeedmdStatus = 2;
                Utils.userAlert('Seed changed successfully.','', 'success');
                $("#actseedprof").val(resp.data.newseed);
              } else {
                this.changeSeedmdStatus = 3;
                Utils.userAlert('An error occurred while changing seed', resp.data.error, 'error');
              }
              $("#submbttxav11").removeClass("loadhide");
              $("#avsubmload11").addClass("loadhide");
            })
            .catch(err => {
              this.changeSeedmdStatus = 3;
              $("#submbttxav11").removeClass("loadhide");
              $("#avsubmload11").addClass("loadhide");
              Utils.userAlert('An error occurred while changing seed', err.response.statusText, 'error');
            });
        this.$refs.recaptchasdmvzn.reset();
      },
      resetCaptchassdpn(){
        this.$refs.recaptchasdmvzn.reset();
        this.$refs.recaptchasdmvzn.execute();
      },
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