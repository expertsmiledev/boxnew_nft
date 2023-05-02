<template>
  <div v-if="isLogin && userData" class="modal fade" id="exchangeCrModal" tabindex="-1" role="dialog" aria-labelledby="exchangeCrModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content mndlfjiwlf"><div width="800" class="css-ranbx4 kgfnaowmgt"><div class="css-3g9l7g gbkaur"><div class="css-1he5r9c grewiozvc"><div class="css-1f9kk05">
        <div class="css-tqjib3 ksofwelpa">Sell for Crypto</div></div> <div class="asnzxlra"><div class="css-9s9ecg sdeponv" style="
    text-align: center;
"><p style="margin-bottom:0;">You are selling <span id="nftnameixcm"></span> for ETH</p><br>
        <input type="hidden" id="nftidtexc" value=""/>
        <input type="hidden" id="cuspnidv" :value="userData.publicid"/>
        <img id="nftimgtexc" src="" style="
    width: 120px;
    border-radius: 10px;
    margin-top: 0.4em;
">   <br><span id="nftamtexc" style="
    margin-top: 0.3em;
    display: block;
    margin-bottom: 0.6em;
    color: #fac84b;
    font-weight: 600;
"></span><label for="crslm" style="
    font-size: 0.9em;
">Choose a crypto:</label>
        <select name="crslm" id="crslm" style="
    background: rgb(35 37 40);
    color: white;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid #363636;
    border-radius: 5px;
    margin-left: 5px;
    font-size: 0.95em;
">
          <option value="eth">ETH</option>

        </select>
        <div id="mainexchi" v-if="geodx" class="inner-refill__form" style="
    margin-top: 0.4em;
"><div class="inner-refill__input inner-refill__input_amount"> <div class="css-9s9ecg sdeponv" style="
    margin-top: 0em;
"><label for="addresscrinput" class="css-puxo7b krsaizow">ETH Address<span class="css-1vr6qde sgdfkoqlzew"> *</span></label> <div>
          <div class="css-1en6d7w klweaioasb">
            <input type="hidden" id="ethfsev" :value="ethfees"/>
            <input id="addresscrinput" v-model="addresscrinput" spellcheck="false" type="text" name="text" placeholder="ADDRESS" value="" class="srnvclkas"></div></div></div>
          <div style="
    margin-bottom: 0.4em;
"><p style="font-size: 12px; margin: 0px; height: 10px;">Transaction fee (ETH): €<span id="exchfeth"></span></p> </div></div>

          <div @click.prevent="exchNfsn()" class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
            <svg id="avsubmload21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
            <span id="submbttxav21" class="css-1ubm3rw">EXCHANGE</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

        </div>
        <div id="mxchrl" v-if="geodx == false">
            <span>
              Exchange is not available in your country. If you are using VPN, please disable it.
            </span>
        </div>
        </div>  </div></div></div></div></div>
    </div>
  </div>
</template>


<script>
	export default {
    data: () => ({
      ethfees: false,
      geodx: true,
      currentmethod: "eth",
      addresscrinput: '',
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
			$(document).on('click', '[data-popup="exchangeCr"]', () => {
				$('#exchangeCr').addClass('open').addClass('animate');
        this.currentmethod = "eth";
				$(document).on('click', '#exchangeCr', (e) => {
						e.stopPropagation() 
				});
				return false;
			});
      this.getFees();
      //this.getGeoLoc();
		},
		beforeDestroy() {
			$(document).off('click', '[data-popup="exchangeCr"]');
		},
		methods: {
      getFees() {
        Utils.apiPostCall("/api/request/getcrfees/")
            .then(resp => {
              console.log(resp.data);
              if (resp.data.success) {
                this.ethfees = resp.data.ethfeeprice;
              }
            });
      },
      getGeoLoc(){
        Utils.apiPostCall("/api/request/getcountrexcr/")
            .then(resp => {
              console.log("getcxxcre");
              console.log(resp.data);
              if (resp.data.success) {
                if (resp.data.country == "US"){
                  this.geodx = false;
                }
              }
            });
      },
      getWonNftsev(userid,ipage) {
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
      exchNfsn(){
        if (this.addresscrinput.length > 0) {
          $("#submbttxav21").addClass("loadhide");
          $("#avsubmload21").removeClass("loadhide");
          Utils.apiPostCall("/api/request/exchangenft/", {
            address: $("#addresscrinput").val(),
            nftid: $("#nftidtexc").val(),
            method: this.currentmethod
          })
              .then(resp => {
                console.log(resp.data);
                if (resp.data.success) {
                  $('#exchangeCrModal').modal('toggle');
                  Utils.userAlert('NFT Exchange created successfully, it can take up to 5 minutes', '', 'success');
                  this.getWonNftsev($("#cuspnidv").val(), 0);
                }else{
                  Utils.userAlert('An error has occured during creating NFT exchange', resp.data.error, 'error');
                }
                $("#submbttxav21").removeClass("loadhide");
                $("#avsubmload21").addClass("loadhide");
              })
              .catch(err => {
                $("#submbttxav21").removeClass("loadhide");
                $("#avsubmload21").addClass("loadhide");
                Utils.userAlert('An error occurred', err.response.statusText, 'error');
              });
        }else{
          Utils.userAlert('Please provide ETH address', '', 'error');
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