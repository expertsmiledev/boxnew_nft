<template>
  <div v-if="!isLogin" class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwibakr4g" role="document">
      <div class="modal-content mldngklrjz">
        <div class="css-ranbx4 bnfao2na" width="800">
          <div class="css-3g9l7g mndlahxz">
            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" class="css-qwzhon svmvznlax">
              <g id="cross" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path d="M12.5490552,5.44652354 L10.0190552,7.97452354 L7.48905518,5.44452354 C7.12622749,5.06665914 6.58740604,4.91458087 6.08055863,5.04698605 C5.57371122,5.17939123 5.17811268,5.57557067 5.04645136,6.08261183 C4.91479005,6.58965298 5.0676588,7.1282507 5.44605518,7.49052354 L7.97505518,10.0205235 L5.44805518,12.5475235 C4.89838994,13.1154377 4.90565787,14.0192007 5.46438558,14.5782014 C6.0231133,15.137202 6.9268726,15.1449113 7.49505518,14.5955235 L10.0190552,12.0635235 L12.5470552,14.5925235 C12.9101461,14.9696355 13.4486088,15.1212283 13.9551127,14.9889326 C14.4616166,14.8566368 14.8571684,14.461085 14.9894642,13.9545811 C15.12176,13.4480771 14.9701671,12.9096144 14.5930552,12.5465235 L12.0690552,10.0215235 L14.5960552,7.49452354 C15.1457204,6.92660935 15.1384525,6.02284638 14.5797248,5.46384572 C14.0209971,4.90484505 13.1172378,4.89713573 12.5490552,5.44652354 Z" id="Close" fill="currentColor"></path>
              </g>
            </svg>
            <div class="css-1he5r9c dvnalsdpnv">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 drgnaiam">Sign Up</div>
              </div>
              <form>
                <div class="css-1knbux5 fnldikspvlf">
                  <button class="css-kyxqpo btnlsbdidlb c-button" type="button" @click="connect">
                    <div id="submbttxav18">
                    <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" size="20" class="css-d25ing gh924h9ab">
                      <g id="steam" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="steam-1" transform="translate(-0.000000, 0.000000)" fill="currentColor" fill-rule="nonzero">
                          <path d="M9.87483452,0 C4.66929231,0 0.40495021,4.05042947 0,9.19747029 L5.3110302,11.4134135 C5.7747852,11.0924071 6.32554784,10.9207555 6.88956321,10.9214453 C6.94226856,10.9214453 6.99435567,10.9229137 7.04566997,10.9257731 L9.40782801,7.47055857 L9.40782801,7.42218093 C9.40782801,5.34310164 11.0840437,3.65119802 13.1445756,3.65119802 C15.2050303,3.65119802 16.881246,5.34310164 16.881246,7.42218093 C16.881246,9.50118295 15.2050303,11.1937821 13.1445756,11.1937821 C13.1159818,11.1937821 13.0881608,11.1930866 13.0597216,11.192391 L9.69082948,13.6172236 C9.69299333,13.6622009 9.69438438,13.7071009 9.69438438,13.7513054 C9.69438438,15.3126821 8.43602479,16.5825565 6.88956321,16.5825565 C5.53205264,16.5825565 4.39626004,15.604339 4.13961125,14.3095803 L0.340807333,12.7245557 C1.51724952,16.9218955 5.33877393,19.9991307 9.87483452,19.9991307 C15.3476902,19.9991307 19.7838271,15.5216488 19.7838271,9.99956537 C19.7838271,4.47686368 15.3476902,0 9.87483452,0 Z M6.20964872,15.1726497 L4.99255695,14.6650709 C5.20793791,15.1184761 5.58151221,15.4977691 6.07703525,15.7060403 C7.14791217,16.156586 8.38277847,15.643984 8.82915107,14.562365 C9.04525272,14.042289 9.04653093,13.4577844 8.83270598,12.9367682 C8.61879335,12.4120331 8.21453866,12.0027551 7.69621785,11.7845921 C7.18075642,11.5685929 6.62889584,11.5763982 6.14403751,11.7610988 L7.40177886,12.2858339 C8.19174089,12.6181404 8.56531519,13.5335288 8.23594538,14.3306779 C7.9072711,15.1277497 6.99961075,15.5049562 6.20964872,15.1726497 L6.20964872,15.1726497 Z M15.6345557,7.42218093 C15.6345557,6.03692664 14.5173105,4.90901665 13.1448075,4.90901665 C11.7716089,4.90901665 10.6543637,6.03692664 10.6543637,7.42218093 C10.6543637,8.80751251 11.7716089,9.93472697 13.1448075,9.93472697 C14.5173105,9.93472697 15.6345557,8.80751251 15.6345557,7.42218093 L15.6345557,7.42218093 Z M11.2782498,7.4179305 C11.2782498,6.37557011 12.1159712,5.53073887 13.1484397,5.53073887 C14.1815264,5.53073887 15.0192478,6.37557011 15.0192478,7.4179305 C15.0192478,8.46029089 14.1815264,9.30519941 13.1483624,9.30519941 C12.1159712,9.30519941 11.2781725,8.46029089 11.2781725,7.41800778 L11.2782498,7.4179305 Z" id="Shape"></path>
                        </g>
                      </g>
                    </svg>
                    Metamask</div>
                    <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
                    <svg id="avsubmload18" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                      </circle></svg>
                  </button>
                  <button class="css-kyxqpo btnlsbdidlb c-button" type="button">
                    <div id="submbttxav30">
                      <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" size="20" class="css-d25ing gh924h9ab">
                        <g id="steam" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g id="steam-1" transform="translate(-0.000000, 0.000000)" fill="currentColor" fill-rule="nonzero">
                            <path d="M9.87483452,0 C4.66929231,0 0.40495021,4.05042947 0,9.19747029 L5.3110302,11.4134135 C5.7747852,11.0924071 6.32554784,10.9207555 6.88956321,10.9214453 C6.94226856,10.9214453 6.99435567,10.9229137 7.04566997,10.9257731 L9.40782801,7.47055857 L9.40782801,7.42218093 C9.40782801,5.34310164 11.0840437,3.65119802 13.1445756,3.65119802 C15.2050303,3.65119802 16.881246,5.34310164 16.881246,7.42218093 C16.881246,9.50118295 15.2050303,11.1937821 13.1445756,11.1937821 C13.1159818,11.1937821 13.0881608,11.1930866 13.0597216,11.192391 L9.69082948,13.6172236 C9.69299333,13.6622009 9.69438438,13.7071009 9.69438438,13.7513054 C9.69438438,15.3126821 8.43602479,16.5825565 6.88956321,16.5825565 C5.53205264,16.5825565 4.39626004,15.604339 4.13961125,14.3095803 L0.340807333,12.7245557 C1.51724952,16.9218955 5.33877393,19.9991307 9.87483452,19.9991307 C15.3476902,19.9991307 19.7838271,15.5216488 19.7838271,9.99956537 C19.7838271,4.47686368 15.3476902,0 9.87483452,0 Z M6.20964872,15.1726497 L4.99255695,14.6650709 C5.20793791,15.1184761 5.58151221,15.4977691 6.07703525,15.7060403 C7.14791217,16.156586 8.38277847,15.643984 8.82915107,14.562365 C9.04525272,14.042289 9.04653093,13.4577844 8.83270598,12.9367682 C8.61879335,12.4120331 8.21453866,12.0027551 7.69621785,11.7845921 C7.18075642,11.5685929 6.62889584,11.5763982 6.14403751,11.7610988 L7.40177886,12.2858339 C8.19174089,12.6181404 8.56531519,13.5335288 8.23594538,14.3306779 C7.9072711,15.1277497 6.99961075,15.5049562 6.20964872,15.1726497 L6.20964872,15.1726497 Z M15.6345557,7.42218093 C15.6345557,6.03692664 14.5173105,4.90901665 13.1448075,4.90901665 C11.7716089,4.90901665 10.6543637,6.03692664 10.6543637,7.42218093 C10.6543637,8.80751251 11.7716089,9.93472697 13.1448075,9.93472697 C14.5173105,9.93472697 15.6345557,8.80751251 15.6345557,7.42218093 L15.6345557,7.42218093 Z M11.2782498,7.4179305 C11.2782498,6.37557011 12.1159712,5.53073887 13.1484397,5.53073887 C14.1815264,5.53073887 15.0192478,6.37557011 15.0192478,7.4179305 C15.0192478,8.46029089 14.1815264,9.30519941 13.1483624,9.30519941 C12.1159712,9.30519941 11.2781725,8.46029089 11.2781725,7.41800778 L11.2782498,7.4179305 Z" id="Shape"></path>
                          </g>
                        </g>
                      </svg>
                      WalletConnect</div>
                    <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
                    <svg id="avsubmload30" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                      </circle></svg>
                  </button>
                  <button class="css-18nhrep bldkorsmvrd c-button" type="button" @click="loginWithGoogle">
                    <div id="submbttxav19">
                    <svg width="19px" height="20px" viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="css-1dy0bu7 vkoa92n">
                      <g stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-141.000000, -7399.000000)" fill="currentColor">
                          <g transform="translate(56.000000, 160.000000)">
                            <path d="M97,7249 L99,7249 L99,7244 L97,7244 L97,7249 Z M92,7249 L94,7249 L94,7244 L92,7244 L92,7249 Z M102,7250.307 L102,7241 L88,7241 L88,7253 L92,7253 L92,7255.953 L94.56,7253 L99.34,7253 L102,7250.307 Z M98.907,7256 L94.993,7256 L92.387,7259 L90,7259 L90,7256 L85,7256 L85,7242.48 L86.3,7239 L104,7239 L104,7251.173 L98.907,7256 Z" id="twitch-[#182]"></path>
                          </g>
                        </g>
                      </g>
                    </svg>
                      Google</div>
                    <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
                    <svg id="avsubmload19" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                      </circle></svg>
                  </button>
                </div>
                <button class="css-125jxmv dlbkrlbrm c-button" type="button" @click="loginWithSteam">
                  <div id="submbttxav20">
                  <img src="https://rollbit.com/static/media/metamask.b5950bb2.png" size="18" class="css-1jqe58j mtlkvnakz">Steam</div>
                  <div class="c-ripple js-ripple">
                  <span class="c-ripple__circle"></span></div>
                  <svg id="avsubmload20" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                      <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                    </circle></svg>
                </button>
                <div class="css-11rshjn nrwlzipvb">Or Continue with</div>
                <div class="css-9s9ecg dfrnblanw">
                  <label for="rollbit-field-username" class="css-puxo7b lbdnfrbawz">Username<span class="css-1vr6qde vmnadl3hba"> *</span></label>
                  <div>
                    <div class="css-1en6d7w nfal2i0kx"><input type="text" spellcheck="false" v-model="username_register" name="username" placeholder="username" id="rollbit-field-username" value="" class="vndslankfiex"></div>
                  </div>
                </div>
                <div class="css-9s9ecg dfrnblanw">
                  <label for="rollbit-field-email" class="css-puxo7b lbdnfrbawz">Email<span class="css-1vr6qde vmnadl3hba"> *</span></label>
                  <div>
                    <div class="css-1en6d7w nfal2i0kx"><input type="email" spellcheck="false" v-model="email_register" name="email" placeholder="youremail@domain.com" id="rollbit-field-email" value="" class="vndslankfiex"></div>
                  </div>
                </div>
                <div class="css-9s9ecg gja02lznb">
                  <label for="rollbit-field-password" class="css-puxo7b lbpsnleriam">Password<span class="css-1vr6qde osabfowebakv"> *</span></label>
                  <div>
                    <div class="css-1en6d7w ndlgjdiovlaz"><input type="password" spellcheck="false" v-model="password_register" name="password" placeholder="********" id="rollbit-field-password" class="ndfoewilazo" value=""></div>
                  </div>
                </div>
                <div id="forgpasswc" class="css-3xlfkp wvjlafpaz" @click.prevent="forgotPasswordCM()">Forgot password?</div>
                <div class="css-9s9ecg"></div>
                <template><vue-recaptcha ref="recaptchafrgpas" sitekey="6Ldp-NcfAAAAAE8FXN_x1B524wBanfc9TZcI1I6g" @verify="recaptchaVerifyrpnvaz" @expired="resetCaptcharpnvaz" @error="resetCaptcharpnvaz" size="invisible">

                  <button @click.prevent="recaptchaSndrpnvaz()" class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="padding:0;position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;">
                    <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;">
                      <p class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                        <svg id="avsubmload13" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                        <span id="submbttxav13" class="css-1ubm3rw">SIGN UP</span>
                      </p>
                      <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
                  </button>

                </vue-recaptcha></template>
                </form>
            </div>
            <div class="css-1wpmnuy asnkjdsuac">
              <div class="css-15nbf9a nflaiov">
                <div class="css-w100qs mlaksoinqob">
                  <img class="ntjrboiurz" src="https://rollbit.com/static/media/rollbit-logo-glow.9277851a6346811f86d40f1c9e365d65.svg">
                  <p class="pnfjthap">The World's First NFT Casino</p>
                </div>
                <span>By accessing the site, I attest that I am at least 18 years old and have read the <a class="css-1mr3o4q klrahj9o" href="/terms-and-conditions">Terms &amp; Conditions.</a><br><br>I also acknowledge understanding that our Crypto Trading is not gambling, and therefore not covered by our gaming license.</span>
              </div>
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
        username_register: '',
        email_register: '',
        password_register: '',
				promoMsg: '',
				promoTimeout: false
			}),
		mounted() {
			$(document).on('click', '[data-popup="registerUser"]', () => {
				$('#registerUser').addClass('open').addClass('animate');
				$(document).on('click', '#registerUser', (e) => {
						e.stopPropagation() 
				});
				return false;
			});

		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="registerUser"]');
		},
		methods: {
      async connect() {
        $("#submbttxav18").addClass("loadhide");
        $("#avsubmload18").removeClass("loadhide");
        await this.$store.dispatch("connect", true);
      },
      loginWithGoogle () {
        $("#submbttxav19").addClass("loadhide");
        $("#avsubmload19").removeClass("loadhide");
        this.$gAuth
            .signIn()
            .then(GoogleUser => {
              console.log("successlogin google")
              console.log('GoogleUser', GoogleUser)
              console.log("gu 1:"+GoogleUser.getAuthResponse().access_token);
              console.log("gu 1:"+GoogleUser.getAuthResponse().id_token);
              Utils.apiPostCall("/api/request/verifygauth/", {"acto":GoogleUser.getAuthResponse().access_token})
                  .then(resp => {
                    if (resp.data.success == true){
                      window.location.reload();
                    }
                    $("#submbttxav19").removeClass("loadhide");
                    $("#avsubmload19").addClass("loadhide");
                  })
                  .catch(err => {
                    $("#submbttxav19").removeClass("loadhide");
                    $("#avsubmload19").addClass("loadhide");
                  });
            })
            .catch(error => {
            })
      },
      recaptchaSndrpnvaz() {
        $("#submbttxav13").addClass("loadhide");
        $("#avsubmload13").removeClass("loadhide");
        this.$refs.recaptchafrgpas.execute();
      },
      loginWithSteam() {
        $("#submbttxav20").addClass("loadhide");
        $("#avsubmload20").removeClass("loadhide");
        window.location.href="https://smirnoffonbahamas.vip/?login";
      },
      recaptchaVerifyrpnvaz(response){
        console.log('recaptcha response: ' + response)
        if (this.promoTimeout) {
          clearTimeout(this.promoTimeout);
        }
        this.promoMsg = '';
        if (this.email_register.length > 0) {
          this.promoTimeout = setTimeout(() => {
            Utils.apiPostCall("/api/member/register/", {email_register: this.email_register, username_register: this.username_register, password_register: this.password_register, recaptch_register_resp: response})
                .then(resp => {
                  if (resp.data.success == true){
                    Utils.userAlert('Success', 'Account created successfully', 'success');
                    window.location.reload();
                  }
                  if (resp.data.success == false){
                    Utils.userAlert('Error', resp.data.error, 'error');
                  }
                  $("#submbttxav13").removeClass("loadhide");
                  $("#avsubmload13").addClass("loadhide");
                })
                .catch(err => {
                  $("#submbttxav13").removeClass("loadhide");
                  $("#avsubmload13").addClass("loadhide");
                  Utils.userAlert('Error, try again', err.response.statusText, 'error');
                });
          }, 1000);
        }
        this.$refs.recaptchafrgpas.reset();
      },
      resetCaptcharpnvaz(){
        this.$refs.recaptchafrgpas.reset();
        this.$refs.recaptchafrgpas.execute();
      },
      forgotPasswordCM(){
        $('#registerModal').modal('toggle');
        $('#resetpassmodal').modal('toggle');
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