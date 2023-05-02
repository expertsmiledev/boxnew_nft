<template>
  <div class="modal fade" id="freeBoxModal" tabindex="-1" role="dialog" aria-labelledby="freeBoxModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content mndlfjiwlf">
        <div class="css-ranbx4 kgfnaowmgt" width="800">
          <div class="css-3g9l7g gbkaur">
            <div class="css-1he5r9c grewiozvc">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 ksofwelpa">FREE BOX</div>
              </div>
              <img class="fsrewisdgr" src="https://rustclash.com/images/cases/pandora's-box.png">
              <form class="asnzxlra">
                <div class="css-9s9ecg sdeponv">
                  <label for="affilcodemd" class="css-puxo7b krsaizow">Affiliate code<span class="css-1vr6qde sgdfkoqlzew"> *</span></label>
                  <div>
                    <div class="css-1en6d7w klweaioasb"><input id="affilcodemd" spellcheck="false" class="srnvclkas" type="text" name="text" placeholder="CODE" value=""></div>
                  </div>
                </div>
                <div class="css-9s9ecg sdf92lsa"></div>
                <div class="css-9s9ecg"></div>



                <div class="relative max-w-max" @click.prevent="useaffSend()"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative;display: inline-flex;overflow: hidden;border: 1px solid black;display: block;font-size: 22px;text-align: center;line-height: 44px;text-decoration: none;color: white;border-radius: 4px;width: 340px;height: 40px;text-shadow: 0 -1px -1px #af3a2a;-moz-box-shadow: 0 4px 0 #af3a2a, 0 5px 5px 1px rgba(0, 0, 0, 0.4);-webkit-box-shadow: 0 4px 0 #af3a2a, 0 5px 5px 1px rgb(0 0 0 / 40%);box-shadow: 0 4px 0 #8b6d23, 0 5px 5px 1px rgb(0 0 0 / 40%);-moz-transition: all 0.15s ease-in-out;-o-transition: all 0.15s ease-in-out;-webkit-transition: all 0.15s ease-in-out;transition: all 0.15s ease-in-out;">
                  <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56);line-height: 1em;width: 340px;height: 40px;text-shadow: 0 -1px -1px #af3a2a;-moz-box-shadow: 0 4px 0 #af3a2a, 0 5px 5px 1px rgba(0, 0, 0, 0.4);-moz-transition: all 0.15s ease-in-out;-o-transition: all 0.15s ease-in-out;">
                  <div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                    <svg id="avsubmload5" class="loadhide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="position:relative;margin: auto;/* background: rgb(255, 255, 255); */display: block;shape-rendering: auto;width: 20px;height: 20px;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="
    stroke: #171717;
">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                      </circle></svg>
                    <span id="submbttxav5" class="css-1ubm3rw">GET FREE CASE</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div>
                </div>



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
		data: () => ({
        actionInProgress: false
			}),
		mounted() {
			$(document).on('click', '[data-popup="useAffmodal"]', () => {
				$('#useAffmodal').addClass('open').addClass('animate');
				$(document).on('click', '#useAffmodal', (e) => {
						e.stopPropagation() 
				});
        $(document).on('click', '#useaffbutton', (e) => {
          this.useaffSend();
        });
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="useAffmodal"]');
		},
    methods: {
      useaffSend() {
        if ($("#affilcodemd").val().length > 0) {
          if (this.actionInProgress) {
            return;
          }
          this.actionInProgress = true;
          $("#submbttxav5").addClass("loadhide");
          $("#avsubmload5").removeClass("loadhide");
          Utils.apiPostCall("/api/request/userefcode/", {"refc_use": $("#affilcodemd").val()})
              .then(resp => {
                if (resp.data.success) {
                  $('#freeBoxModal').modal('toggle');
                  Utils.userAlert('An referral code has been used successfully', 'You have got free case to open', 'success');
                  this.$router.push("/case/case1/");
                } else {
                  if (resp.data.usedrbnused == 1) {
                    Utils.userAlert('You have used affiliate code earlier but didnt open box yet', 'You have got free case to open', 'success');
                    $('#freeBoxModal').modal('toggle');
                    this.$router.push("/case/case1/");
                  } else {
                    if (resp.data.loginneed == 1) {
                      $('#freeBoxModal').modal('toggle');
                      $('#registerModal').modal('toggle');
                      Utils.userAlert('Please login to open free box', '', 'error');
                    } else {
                      Utils.userAlert('An error occurred during using referral code', resp.data.msg, 'error');
                    }
                  }
                }
                $("#submbttxav5").removeClass("loadhide");
                $("#avsubmload5").addClass("loadhide");
                this.actionInProgress = false;
              })
              .catch(err => {
                this.actionInProgress = false;
                $("#submbttxav5").removeClass("loadhide");
                $("#avsubmload5").addClass("loadhide");
                Utils.userAlert('An error occurred during using referral code', err.response.statusText, 'error');
              });
        }else{
          Utils.userAlert('Please provide affiliate code to open free case', '', 'error');
        }
      }
    },
		computed: {
			isLogin() {
				return this.$store.getters.isLogin;
			}
		}
	}
</script>