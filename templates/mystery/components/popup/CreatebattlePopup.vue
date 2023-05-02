<template>
	<div v-if="isLogin && userData" id="createBattlemodal" class="payments-refillblock">
		<div class="payments-block">
			<div class="pb-header">Create Battle</div>
			<div class="inner-refill">
				<div class="inner-refill__form">
					<form class="payments-form" name="payment" method="post" action="/" accept-charset="UTF-8">
						<div class="inner-refill__input inner-refill__input_promocode">
							<input type="text" spellcheck="false" v-model="case_id" name="case_id" placeholder="case id">
						</div>
            <input type="button" class="button inner-refill__btn inner-refill__btn_standart" id="createbutton" value="Create">
					</form>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data: () => ({
        case_id: '',
        actionInProgress: false
			}),
		mounted() {
			$(document).on('click', '[data-popup="createBattlemodal"]', () => {
				$('#createBattlemodal').addClass('open').addClass('animate');
				$(document).on('click', '#createBattlemodal', (e) => {
						e.stopPropagation() 
				});
        $(document).on('click', '#createbutton', (e) => {
          this.createSend();
        });
				return false;
			});
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="createBattlemodal"]');
		},
    methods: {
      createSend() {
        if (this.case_id.length > 0) {
          if (this.actionInProgress) {
            return;
          }
          this.actionInProgress = true;
          Utils.apiPostCall("/api/request/battle/new/" + this.case_id + "/")
              .then(resp => {
                if (resp.data.success) {
                  this.$router.push("/battle/" + resp.data.id + "/");
                } else {
                  Utils.userAlert('An error occurred during battle creation', resp.data.error, 'error');
                }
                this.actionInProgress = false;
              })
              .catch(err => {
                this.actionInProgress = false;
                Utils.userAlert('An error occurred during battle creation', err.response.statusText, 'error');
              });
        }
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