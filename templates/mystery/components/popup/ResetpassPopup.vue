<template>
  <div v-if="!isLogin" class="modal fade" id="resetpassmodal" tabindex="-1" role="dialog" aria-labelledby="resetPassModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content kl304ant">
        <div class="css-ranbx4 tiabi29" width="800">
          <div class="css-3g9l7g tlfan01a">
            <div class="css-1he5r9c n3al2104w">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 g39i3t9b">RESET PASSWORD</div>
              </div>
              <form class="bgj9328v">
                <div id="firstformreset" class="css-9s9ecg f38259a">
                  <label for="rollbit-field-emailres" class="css-puxo7b kvjol02x">Email<span class="css-1vr6qde k539nfk"> *</span></label>
                  <div>
                    <div class="css-1en6d7w tvg2857t"><input type="text" spellcheck="false" v-model="email_resetpass" class="kbla9208f" name="text" placeholder="" id="rollbit-field-emailres" value=""></div>
                  </div>
                  <template>
                    <vue-recaptcha ref="recaptcharswdnmd" sitekey="6Ldp-NcfAAAAAE8FXN_x1B524wBanfc9TZcI1I6g" @verify="recaptchaVerifyrpv" @expired="resetCaptcharpv" @error="resetCaptcharpv" size="invisible">

                      <button @click.prevent="recaptchaSndrpv()" class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="margin-top:1em;padding:0;position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;">
                        <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;">
                          <p class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                            <svg id="avsubmload10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                            <span id="submbttxav10" class="css-1ubm3rw">RESET PASSWORD</span>
                          </p>
                          <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
                      </button>

                    </vue-recaptcha>
                  </template>
                </div>
                <div id="newformreset" class="css-9s9ecg gn9305ft">
                  <label for="rollbit-field-res" class="css-puxo7b gba935l">Reset pass key<span class="css-1vr6qde h98351ab"> *</span></label>
                  <div>
                    <div class="css-1en6d7w kah924f"><input type="text" spellcheck="false" v-model="resetpass_key" name="text" class="h38059gn" placeholder="" id="rollbit-field-res" value=""></div>
                  </div>
                  <label for="rollbit-field-newpass" class="css-puxo7b nb05i0a">New password<span class="css-1vr6qde h98351ab"> *</span></label>
                  <div>
                    <div class="css-1en6d7w gnt9582k"><input type="password" spellcheck="false" v-model="resetnew_password" class="to058lw" name="text" placeholder="" id="rollbit-field-newpass" value=""></div>
                  </div>
                  <label for="rollbit-field-newpassconf" class="css-puxo7b toa94n">New password confirmation<span class="css-1vr6qde h98351ab"> *</span></label>
                  <div>
                    <div class="css-1en6d7w tb92489a"><input type="password" spellcheck="false" v-model="resetnew_password_confirm" name="text" class="bw964839l" placeholder="" id="rollbit-field-newpassconf" value=""></div>
                  </div>


                  <div @click.prevent="resetSetPassw()" id="resetbutton2" class="relative max-w-max" style="margin-top:1em;"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                    <svg id="avsubmload9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                    <span id="submbttxav9" class="css-1ubm3rw">RESET PASSWORD</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>


                </div>
                <div class="css-9s9ecg b959jwk"></div>
                <div class="css-9s9ecg"></div>
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
		data: () => ({
        email_resetpass: '',
        resetpass_key: '',
        resetnew_password: '',
        resetnew_password_confirm: '',
				resetTimeout: false,
        resetTimeout2: false,
			}),
		mounted() {
			$(document).on('click', '[data-popup="resetpassmodal"]', () => {
				$('#resetpassmodal').addClass('open').addClass('animate');
				$(document).on('click', '#resetpassmodal', (e) => {
						e.stopPropagation() 
				});
        $(document).on('click', '#resetbutton2', (e) => {
          this.resetSetPassw();
        });
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="resetpassmodal"]');
		},
    methods: {
      resetSend() {
        if (this.resetTimeout) {
          clearTimeout(this.resetTimeout);
        }
        if (this.email_resetpass.length > 0) {
          this.resetTimeout = setTimeout(() => {
            Utils.apiPostCall("/api/member/reset/pass/", {email_resetpass: this.email_resetpass})
                .then(resp => {
                  console.log(resp.data);
                  if (resp.data.success == true){
                    Utils.userAlert('Email with reset pass code has been sent.', '', 'success');
                    $("#firstformreset").css("display", "none");
                    $("#newformreset").css("display", "initial");
                  }
                  if (resp.data.success == false){
                    Utils.userAlert('An error occurred', resp.data.error, 'error')
                  }
                })
                .catch(err => {
                  Utils.userAlert('Error, try again', err.response.statusText, 'error');
                });
          }, 1000);
        }
      },
      resetSetPassw() {
        if (this.resetTimeout2) {
          clearTimeout(this.resetTimeout2);
        }
        if (this.email_resetpass.length > 0) {
          $("#submbttxav9").addClass("loadhide");
          $("#avsubmload9").removeClass("loadhide");
          this.resetTimeout2 = setTimeout(() => {
            Utils.apiPostCall("/api/member/reset/setnew/", {resetpass_key: this.resetpass_key, resetnew_password:this.resetnew_password, resetnew_password_confirm: this.resetnew_password_confirm})
                .then(resp => {
                  console.log(resp.data);
                  if (resp.data.success == true){
                    Utils.userAlert('Password has been successfully changed', 'Please login again.', 'success');
                    $('#resetpassmodal').modal('toggle');
                  }
                  if (resp.data.success == false){
                    Utils.userAlert('An error occurred', resp.data.error, 'error')
                  }
                  $("#submbttxav9").removeClass("loadhide");
                  $("#avsubmload9").addClass("loadhide");
                })
                .catch(err => {
                  $("#submbttxav9").removeClass("loadhide");
                  $("#avsubmload9").addClass("loadhide");
                  Utils.userAlert('Error, try again', err.response.statusText, 'error');
                });
          }, 1000);
        }
      },
      recaptchaSndrpv() {
        $("#submbttxav10").addClass("loadhide");
        $("#avsubmload10").removeClass("loadhide");
        this.$refs.recaptcharswdnmd.execute();
      },
      recaptchaVerifyrpv(response){
        console.log('recaptcha response: ' + response)
        if (this.resetTimeout) {
          clearTimeout(this.resetTimeout);
        }
        if (this.email_resetpass.length > 0) {
          this.resetTimeout = setTimeout(() => {
            Utils.apiPostCall("/api/member/reset/pass/", {email_resetpass: this.email_resetpass, recaptch_resetp_resp: response})
                .then(resp => {
                  console.log(resp.data);
                  if (resp.data.success == true){
                    Utils.userAlert('Email with reset pass code has been sent.', '', 'success');
                    $("#firstformreset").css("display", "none");
                    $("#newformreset").css("display", "initial");
                  }
                  if (resp.data.success == false){
                    Utils.userAlert('An error occurred', resp.data.error, 'error')
                  }
                  $("#submbttxav10").removeClass("loadhide");
                  $("#avsubmload10").addClass("loadhide");
                })
                .catch(err => {
                  $("#submbttxav10").removeClass("loadhide");
                  $("#avsubmload10").addClass("loadhide");
                  Utils.userAlert('Error, try again', err.response.statusText, 'error');
                });
          }, 1000);
        }
        this.$refs.recaptcharswdnmd.reset();
      },
      resetCaptcharpv(){
        this.$refs.recaptcharswdnmd.reset();
        this.$refs.recaptcharswdnmd.execute();
      }
    },
		computed: {
			isLogin() {
				return this.$store.getters.isLogin;
			}
		},
    components: {'vue-recaptcha': VueRecaptcha }
	}
</script>