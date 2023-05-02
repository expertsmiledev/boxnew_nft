<template>
  <div v-if="isLogin && userData" class="modal fade" id="wonnftsModal" tabindex="-1" role="dialog" aria-labelledby="wonnftsModalTitle" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-dialog-centered"><div class="modal-content dnlas03l"><div tabindex="-1" aria-modal="true" id="mat-dialog-1" role="dialog" class="div ng-tns-c96-84 ng-trigger ng-trigger-dialogContainer ng-star-inserted akiwnruiz">
      <div class="ng-star-inserted tiklavn32v"><div class="div ng-star-inserted kla05ba52g"><cw-icon inlinesvg="assets/icons/close-modal.svg" class="close-btn ng-star-inserted cnick5"><svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h25v25H0V0z"></path> <g fill="#FFF"><path d="M15.445 8.375l1.179 1.179-7.071 7.07-1.178-1.178 7.07-7.07z"></path> <path d="M8.375 9.554l1.178-1.179 7.071 7.071-1.178 1.178-7.071-7.07z"></path></g></svg></cw-icon> <section class="new-payment-container ng-star-inserted klrb20ag" style="background: rgb(24, 27, 28);"><div class="lateral-menu pretty-scrollbar mobile-hide an5320mfl" style="min-width:240px;">
        <div class="ng-star-inserted dbj0435nla"><section class="currencies-container as43dgfbn"><h6 class="currencies-section-title title-3 currencies-section-title-font-style">FILTER</h6> <div class="currency border-left-selected currencies-section-title-font-style selected-currency ng-star-inserted"><span><img src="https://static.ancientgaming.io/icons/various-methods.png" class="icon">ALL</span></div><div class="currency border-left-selected currencies-section-title-font-style selected-currency ng-star-inserted"><span><img src="https://static.ancientgaming.io/icons/various-methods.png" class="icon">WAITING</span></div><div class="currency border-left-selected currencies-section-title-font-style selected-currency ng-star-inserted"><span><img src="https://static.ancientgaming.io/icons/various-methods.png" class="icon">NFT SENT</span></div> <div class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img src="https://www.hypedrop.com/en/assets/icons/payment-icons/gift-card.png" class="icon">NFT SOLD</span></div><div class="currency border-left-selected currencies-section-title-font-style ng-star-inserted"><span><img src="https://www.hypedrop.com/en/assets/icons/payment-icons/gift-card.png" class="icon">NFT SOLD FOR CRYPTO</span></div></section></div></div> <div class="main-content h35h90a0m"><h6 class="payment-modal-title-aligment title jka0352gt" style="padding-top: 0.4em;"><a class="control-button clipped-button h3 ng-star-inserted active" style="font-size: 0.5em;">NFT WON</a></h6> <div class="ng-star-inserted hnw0932nat"><section class="classic-currency-container ao21h50anb" style="
    display: block;
    padding-left: 10px;
    padding-right: 10px;
">
      <div id="wonnftslistuo" class="css-zsytrg" style="
    grid-template-columns: repeat(auto-fill, minmax(55px, 1fr));
">
      </div><p>we encourage you to withdraw nft to your own wallet and don't store it on our page because we aren't site to hold nft, withdraw nfts you won or sell blalblblblalbl. if not withdrawn, nfts will be sold within 7 days to your balance. blablablbal decentralized. blablbala use your own wallet.</p>
      <p>next</p><div style="display: flex;margin-bottom:1em;">{{ mvgwNf(userData.publicid) }}

      <div class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 100px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 100px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
        <svg id="avsubmload24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
        <span id="submbttxav24" class="css-1ubm3rw">WITHDRAW</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

      <div class="relative max-w-max" @click.prevent="sellNftIs()"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 100px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 100px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
        <svg id="avsubmload25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
        <span id="submbttxav25" class="css-1ubm3rw">SELL FOR BALANCE</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

      <div class="relative max-w-max" @click.prevent="sellNftfcr()"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 150px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 150px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
        <svg id="avsubmload26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
        <span id="submbttxav26" class="css-1ubm3rw">SELL FOR CRYPTO</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

    </div>
    </section></div></div></section></div></div></div></div></div>
  </div>
</template>
<script>
	export default {
		data: () => ({
      inAction: false,
      oncecNF: false,
      unpbiv: false,
      items: {
        list: false,
        page: 0,
        hasMore: true,
        isLoading: false,
        min: 0,
        max: 0
      },
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
		},
		methods: {
		  mvgwNf(userid){
		    if (this.oncecNF == false){
          this.getWonNfts(userid, 0);
          this.unpbiv = userid;
          this.oncecNF = true;
        }
        return "";
      },
      getWonNfts(userid,ipage) {
        if (this.items.isLoading) {
          return;
        }
        this.items.isLoading = true;
        Utils.apiPostCall("/api/request/nftsuser/", {
          user_id: userid,
          page: ipage,
          min: this.items.min,
          max: this.items.max
        })
            .then(resp => {
              if (resp.data.success) {
                console.log(resp.data);
                $("#wonnftslistuo").html("");
                for (let ilist = 0; ilist < 20; ilist++) {
                  let acstatusnft = "";
                  if(resp.data.items[ilist].status == 0){
                    acstatusnft = "Waiting";
                  }
                  if(resp.data.items[ilist].status == 1){
                    acstatusnft = "Sent";
                  }
                  if(resp.data.items[ilist].status == 2){
                    acstatusnft = "Retrieved";
                  }
                  if(resp.data.items[ilist].status == 3){
                    acstatusnft = "Sold";
                  }
                  if(resp.data.items[ilist].status == 4){
                    acstatusnft = "Sold for Crypto";
                  }
                  if(resp.data.items[ilist].status == 5){
                    acstatusnft = "Error";
                  }
                  if(resp.data.items[ilist].status == 6){
                    acstatusnft = "Resend";
                  }

                  $("#wonnftslistuo").append('<div class="nftuqs nftdroppednx" data-id="'+resp.data.items[ilist].id+'" data-name="'+resp.data.items[ilist].name+'" data-img="'+resp.data.items[ilist].image+'" data-am="'+resp.data.items[ilist].price+'" data-status="'+acstatusnft+'"><div class="css-1gs9hbv"><div class="css-midcvu"><div class="css-12g0wy1"><img src="'+resp.data.items[ilist].image+'" class="css-glrcrp" style="opacity: 1;"></div> <div class="css-1reg6gs"></div> <div class="css-uxw1yk"><div><div class="css-17uis7f">'+resp.data.items[ilist].name+' status:'+acstatusnft+'</div></div></div> <div class="css-1eyidho"><span>€'+resp.data.items[ilist].price+'</span></div></div></div></div>');
                }
                this.items.page++;
                console.log(this.items.list);
                this.items.hasMore = !resp.data.not_items;
                this.items.isLoading = false;
              }else{
                this.items.isLoading = false;
                console.log(resp.data);
              }
            })
            .catch(err => {
              this.items.isLoading = false;
            });
      },
      sellNftIs(){
        if (this.inAction) {
          return;
        }
        this.inAction = true;
        let currentactvnf = 0;
        $(".nftdroppednx.activenftinsn").each(function() {
          let idnftdis = $(this).data('id');
          currentactvnf = idnftdis;
          console.log("currentactive:"+idnftdis);
        });
        console.log("nftid:"+currentactvnf);
        if (currentactvnf == 0){
          Utils.userAlert('Please select NFT you would like to sell', '', 'error');
          this.inAction = false;
        }else {
          Utils.apiPostCall("/api/request/sell/" + currentactvnf + "/")
              .then(resp => {
                if (resp.data.success) {
                  this.$store.commit('changeBalance', resp.data.price);
                  Utils.userAlert('NFT has been sold successfully for wallet balance', '', 'success');
                  setTimeout(() => {
                    this.getWonNfts(this.unpbiv, 0);
                  }, 100);
                } else {
                  Utils.userAlert('An error occurred while selling an NFT', resp.data.error, 'error');
                }
                this.inAction = false;
              })
              .catch(err => {
                Utils.userAlert('An error occurred while selling an NFT', err.response.statusText, 'error');
                this.inAction = false;
              });
        }
      },
      sellNftfcr(){
        let currentactvnfx = 0;
        let sitemstatus = "";
        let sitemname = "";
        let sitemam = "";
        let sitemimg = "";
        $(".nftdroppednx.activenftinsn").each(function() {
          let idnftdx = $(this).data('id');
          currentactvnfx = idnftdx;
          let idnftdstv = $(this).data('status');
          sitemstatus = idnftdstv;
          let idnftdsnm = $(this).data('name');
          sitemname = idnftdsnm;
          let idnftdsam = $(this).data('am');
          sitemam = idnftdsam;
          let idnftdsimg = $(this).data('img');
          sitemimg = idnftdsimg;
          console.log("currentactive:"+idnftdx);
          console.log("itemstatus:"+idnftdstv);
          console.log("itemname:"+idnftdsnm);
          console.log("itemam:"+idnftdsam);
          console.log("itemimg:"+idnftdsimg);
        });
        console.log("nftid:"+currentactvnfx);
        console.log("nftstatus:"+sitemstatus);
        console.log("nftname:"+sitemname);
        console.log("nftam:"+sitemam);
        console.log("nftimg:"+sitemimg);

        if (currentactvnfx == 0){
          Utils.userAlert('Please select NFT you would like to sell', '', 'error');
          this.inAction = false;
        }else {
          if (sitemstatus == "Waiting") {
            $("#nftidtexc").val("" + currentactvnfx);
            $("#nftnameixcm").html(sitemname);
            $("#nftimgtexc").attr("src", sitemimg);
            $("#nftamtexc").html("€" + sitemam);
            let nftamxv = $("#nftamtexc").html();
            let nftamxv2 = nftamxv.replace("€", "");
            let nftamxv3 = (parseFloat(nftamxv2 * 0.015));
            let nftamxv4 = nftamxv3.toFixed(2);
            let cneflv = $("#ethfsev").val();
            let cnettl = parseFloat(parseFloat(nftamxv4) + parseFloat(cneflv));
            $("#exchfeth").html(cnettl.toFixed(2));
            $("#wonnftsModal").modal('toggle');
            $('#exchangeCrModal').modal('toggle');
          } else {
            Utils.userAlert('An error occurred while selling an NFT', 'This NFT has already been sold or withdrawn', 'error');
          }
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