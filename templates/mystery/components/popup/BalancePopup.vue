<template>
  <div v-if="isLogin && userData" class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content dnlas03l">
        <div tabindex="-1" aria-modal="true" class="div ng-tns-c96-84 ng-trigger ng-trigger-dialogContainer ng-star-inserted akiwnruiz" id="mat-dialog-1" role="dialog">
          <div class="ng-star-inserted tiklavn32v">
            <div class="div ng-star-inserted kla05ba52g">
              <cw-icon inlinesvg="assets/icons/close-modal.svg" class="close-btn ng-star-inserted cnick5">
                <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 0h25v25H0V0z"></path>
                  <g fill="#FFF">
                    <path d="M15.445 8.375l1.179 1.179-7.071 7.07-1.178-1.178 7.07-7.07z"></path>
                    <path d="M8.375 9.554l1.178-1.179 7.071 7.071-1.178 1.178-7.071-7.07z"></path>
                  </g>
                </svg>
              </cw-icon>

              <section class="new-payment-container ng-star-inserted klrb20ag">
                <div class="lateral-menu pretty-scrollbar mobile-hide an5320mfl">
                  <div class="control-buttons"><a class="control-button clipped-button h3 ng-star-inserted active">Deposit</a>
                  </div>
                  <div class="ng-star-inserted dbj0435nla">
                    <section class="currencies-container as43dgfbn">
                      <h6 class="currencies-section-title title-3 currencies-section-title-font-style"> Classic Currency </h6>
                      <div class="currency border-left-selected currencies-section-title-font-style selected-currency ng-star-inserted"><span><img class="icon" src="https://static.ancientgaming.io/icons/various-methods.png"> Zen </span></div>
                      <div class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img class="icon" src="https://www.hypedrop.com/en/assets/icons/payment-icons/gift-card.png"> gift card </span></div>
                      <h6 class="currencies-section-title title-3 currencies-section-title-font-style"> Crypto Currency </h6>
                      <div @click.prevent="selectMethod('btc')" class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img class="icon" src="https://static.ancientgaming.io/icons/bitcoin.svg"> Bitcoin </span></div>
                      <div @click.prevent="selectMethod('eth')" class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img class="icon" src="https://static.ancientgaming.io/icons/ethereum.svg"> Ethereum </span></div>
                      <div @click.prevent="selectMethod('ltc')" class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img class="icon" src="https://static.ancientgaming.io/icons/litecoin.svg"> Litecoin </span></div>
                      <div @click.prevent="selectMethod('bch')" class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img class="icon" src="https://static.ancientgaming.io/icons/bitcoin-cash.svg"> Bitcoin Cash </span></div>
                    </section>
                  </div>
                </div>
                <div class="main-content h35h90a0m">
                  <h6 class="payment-modal-title-aligment title jka0352gt"> Deposit with Zen </h6>
                  <div class="ng-star-inserted hnw0932nat" id="depmainsummr">
                    <section class="classic-currency-container ao21h50anb">
                      <div class="ng-star-inserted klvn0235la">
                        <section class="credit-card-currency-container tlk350anzr">
                          <p class="deposit-amount-label">deposit amount</p>
                          <form novalidate="" class="deposit-amount-form ng-untouched ng-pristine ng-valid">
                            <div class="deposit-currency">
                              <cw-icon class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="10" cy="10" r="10" fill="#213F88"></circle>
                                  <path d="M11.017 13.891C11.745 13.891 12.33 13.267 12.668 12.812C12.772 12.669 12.837 12.552 12.941 12.318L11.615 11.967C11.615 11.967 11.303 12.448 11.03 12.578C11.004 12.591 10.978 12.591 10.965 12.591H9.483C9.47 12.591 9.405 12.591 9.392 12.578C9.197 12.474 8.794 12.136 8.794 11.98V11.408H11.589V10.238H8.794V9.77H11.589V8.587H8.794V8.028C8.794 8.002 8.794 7.911 8.807 7.885C8.937 7.677 9.223 7.404 9.392 7.313C9.392 7.313 9.418 7.3 9.444 7.3H10.978C10.991 7.3 11.017 7.3 11.03 7.313C11.225 7.43 11.615 7.911 11.615 7.911L12.941 7.534C12.824 7.326 12.772 7.222 12.668 7.079C12.33 6.637 11.745 6 11.017 6H9.392C9.106 6 8.794 6.117 8.586 6.234C8.313 6.39 7.793 6.949 7.637 7.17C7.481 7.404 7.429 7.651 7.429 7.898V8.587H7V9.77H7.429V10.238H7V11.408H7.429V11.993C7.429 12.24 7.481 12.5 7.637 12.734C7.793 12.968 8.313 13.501 8.586 13.657C8.794 13.787 9.106 13.891 9.392 13.891H11.017Z" fill="white"></path>
                                </svg>
                              </cw-icon>
                            </div>
                            <div>
                              <mat-form-field class="mat-form-field w-100 ng-tns-c56-230 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-fill mat-form-field-can-float mat-form-field-should-float ng-untouched ng-pristine ng-valid ng-star-inserted">
                                <div class="mat-form-field-wrapper ng-tns-c56-230">
                                  <div class="mat-form-field-flex ng-tns-c56-230">
                                    <div class="mat-form-field-infix ng-tns-c56-230">
                                      <div class="ng-tns-c56-230 input-wrapper">
                                        <input v-model="depamountiknv" matinput="" type="number" autocomplete="off" spellcheck="false" class="mat-input-element mat-form-field-autofill-control ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored" required="" id="mat-input-16" aria-invalid="false" aria-required="true">
                                      </div>
                                      <div class="form-field-buttons ng-tns-c56-230">
                                        <button type="button" mat-flat-button="" class="mat-focus-indicator symbol mat-flat-button mat-button-base mat-primary ng-star-inserted"><span class="mat-button-wrapper"> + </span><span matripple="" class="mat-ripple mat-button-ripple"></span><span class="mat-button-focus-overlay"></span></button><button type="button" mat-flat-button="" class="mat-focus-indicator symbol mat-flat-button mat-button-base mat-primary ng-star-inserted"><span class="mat-button-wrapper"> - </span><span matripple="" class="mat-ripple mat-button-ripple"></span><span class="mat-button-focus-overlay"></span></button>
                                      </div>
                                      <span class="mat-form-field-label-wrapper ng-tns-c56-230"></span>
                                    </div>
                                  </div>
                                  <div class="mat-form-field-underline ng-tns-c56-230 ng-star-inserted"><span class="mat-form-field-ripple ng-tns-c56-230"></span></div>
                                  <div class="mat-form-field-subscript-wrapper ng-tns-c56-230">
                                    <div class="mat-form-field-hint-wrapper ng-tns-c56-230 ng-trigger ng-trigger-transitionMessages ng-star-inserted">
                                      <div class="mat-form-field-hint-spacer ng-tns-c56-230"></div>
                                    </div>
                                  </div>
                                </div>
                              </mat-form-field>
                            </div>
                          </form>
                          <div class="money-grid-container kla025nv">
                            <div class="fdj034ka">
                              <section class="money-grid-container cn0352vla">
                                <div class="money-row n349oa4w2v"><span class="quantity-block selected ng-star-inserted k3294uabi"> €5.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €10.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €25.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €50.00 </span></div>
                                <div class="money-row nre93095a"><span class="quantity-block ng-star-inserted dko23490f"> €100.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €250.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €500.00 </span><span class="quantity-block ng-star-inserted dko23490f"> €1,000.00 </span></div>
                              </section>
                            </div>
                          </div>
                          <a @click.prevent="processDepo()" mat-flat-button="" color="primary" mat-button="" class="mat-focus-indicator deposit-button mat-button mat-flat-button mat-button-base mat-primary mkl30945b" tabindex="0" aria-disabled="false">
                            <span id="submbttxav7" class="mat-button-wrapper w459anlw"> DEPOSIT €5.00 </span>
                            <span matripple="" class="mat-ripple mat-button-ripple"></span><span class="mat-button-focus-overlay"></span>
                            <svg id="avsubmload7" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="position:relative;margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                              <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                              </circle></svg>
                          </a>
                        </section>
                      </div>
                    </section>
                  </div>
                  <div class="ng-star-inserted hnw0932nat hidedepsmnvu" id="depmainsummr2"><section class="classic-currency-container ao21h50anb"><div class="ng-star-inserted klvn0235la"><section class="credit-card-currency-container tlk350anzr"><p class="deposit-amount-label">info</p>
                    <div class="money-grid-container kla025nv">Please send <span id="amountcsenda"></span> <span id="mthenvzd"></span> to <span id="adrnvznds"></span></div>
                    <img id="pwithmtmsk" class="hidepmtmsk" @click="sendetx" src="/uploads/paymmask.png" style="width:220px"/>
                    <div class="money-grid-container kla025nv">Your deposit will be processed after blockchain confirmations.</div>
                    <div class="money-grid-container kla025nv">This is one time address, after deposit it will expire and you will get new address.</div>
                  </section></div></section></div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
	export default {
		data: () => ({
        selected_method: "btc",
        depamountiknv: false
			}),
		mounted() {
			$(document).on('click', '[data-popup="addBalance"]', () => {
				$('#addBalance').addClass('open').addClass('animate');

				$(document).on('click', '#addBalance', (e) => {
						e.stopPropagation() 
				});

				return false;
			});

		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="addBalance"]');
			console.log("destroypop");
		},
		methods: {
		  selectMethod(method){
		    this.selected_method = method;
		    console.log(this.selected_method);
		    console.log(method);
      },
      processDepo(){
		    console.log(this.selected_method);
        console.log(this.depamountiknv);
        $("#submbttxav7").addClass("loadhide");
        $("#avsubmload7").removeClass("loadhide");
        Utils.apiPostCall("/api/request/depoprcs/", {depmethodrq: this.selected_method, amountdrq: this.depamountiknv})
            .then(resp => {
              console.log(resp.data);
              if (resp.data.success == true){
                $("#depmainsummr").addClass("hidedepsmnvu");
                $("#depmainsummr2").removeClass("hidedepsmnvu");
                if (this.selected_method == "eth"){
                  $("#pwithmtmsk").removeClass("hidepmtmsk");
                }
                $("#amountcsenda").html(resp.data.amnt);
                $("#mthenvzd").html(resp.data.mthd);
                $("#adrnvznds").html(resp.data.adrsn);
              }
              $("#submbttxav7").removeClass("loadhide");
              $("#avsubmload7").addClass("loadhide");
            });
      },
      async sendetx() {
		    console.log('sendetxx1');
        await this.$store.dispatch("sendetx", {
          connect: true,
          amnt: parseFloat($("#amountcsenda").html()),
          adrx: ""+$("#adrnvznds").html()
        });
      },
      close() {
        console.log('closepopup');
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