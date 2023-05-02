<template>
  <div class="divmaxxvaf">
    <div class="header_roulette flex dropnftlc">
      <div class="relative flex items-center w-2/3 pt-2.5 pb-3 lg:w-20 lg:flex-1 lg:flex-col md:justify-center border-r border-navy-700 o9234b">
        <img src="/uploads/livedrop.png" class="d1h34nx">
        <h2 class="my-1 ml-2 text-sm font-semibold leading-none text-center uppercase lg:ml-0 text-gold d805g3a">
          Live drop
        </h2>

      </div>
      <div class="guns_block_roulette flex imgdrnfla">
        <a @click.prevent="checkProfileModal(item.user_id)" href="#" v-for="item in droppedItems" :key="item.id" class="gun_item_roulette" :class="[item.rarity, item.source_css_class]">
          <div class="gun_img">
            <img :src="item.image" :alt="item.name">
          </div>
          <div class="gun_name" v-html="item.name"></div>
          <div class="gun_price">€{{item.price}}</div>
          <div class="dropped">
            <div class="dropped__case">
              <div class="case_image">
                <img v-if="item.from > 0" :src="item.source_img" :alt="item.source_img_alt">
                <img v-else-if="item.from == -2" src="battle.png" alt="Battle">
              </div>
            </div>
            <div class="dropped_user">
              <div class="user_image"><img :src="item.user_img" :alt="item.user_name"></div>
              <div class="user_name">{{item.user_name}}</div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
	export default {
    data: () => ({
      droppedItems: [],
      droppedItemsInprogress: false,
      droppedItemsTimeout: false,
      destroyed: false,
      profileuserid: false,
      items: {
        list: false,
        page: 0,
        hasMore: true,
        isLoading: false,
        min: 0,
        max: 0
      },
    }),
		components: {
		},
		mounted() {
      this.getDroppedItems(true);

      const adddroppeditemcentr = this.$centrifuge.newSubscription("glob:addDroppedItem");

      adddroppeditemcentr.on('publication', function (resp) {
        if (resp.data.success) {
          this.addNewDroppedItems(resp.data.items);
        }
      }).subscribe();

      this.$eventBus.$on('centrifugeDisconnected', this.getDroppedItems);
		},
		beforeDestroy() {
			this.destroyed = true;
      clearTimeout(this.droppedItemsTimeout);
      this.$eventBus.$off('centrifugeDisconnected', this.getDroppedItems);
		},
		methods: {
      addNewDroppedItems(items) {
        if (this.droppedItems.length <= 0) {
          this.droppedItems = items;
        } else {
          for (let i = 0; i < items.length; i++) {
            let find = false;
            for (let j = 0; j < this.droppedItems.length; j++) {
              if (this.droppedItems[j].id == items[i].id) {
                find = true;
                break;
              }
            }
            if (!find) {
              if (!items[i].waittime) {
                items[i].waittime = 0;
              }
              if (items[i].waittime) {
                setTimeout(() => {
                  this.droppedItems.unshift(items[i]);
                  if (items[i].price >= 1000) {
                    this.goodItem = items[i];
                  }
                }, items[i].waittime * 1000);
              } else {
                this.droppedItems.unshift(items[i]);
                if (items[i].price >= 1000) {
                  this.goodItem = items[i];
                }
              }
            }

          }
          this.droppedItems.splice(100, this.droppedItems.length);
        }
      },
      getDroppedItems(force = false) {
        if (!force && this.$centrifugeConnected || this.droppedItemsInprogress) {
          return;
        }
        let params = {};
        if (this.droppedItems.length > 0) {
          params.lastupdate = this.droppedItems[0].time;
        }
        this.droppedItemsInprogress = true;
        Utils.apiPostCall("/api/request/lastnfts/", params)
            .then(resp => {
              if (resp.data.success) {
                this.addNewDroppedItems(resp.data.items);
                if (resp.data.goodItem) {
                  this.goodItem = resp.data.goodItem;
                }
              }
              this.droppedItemsInprogress = false;
              if (!this.destroyed) {
                this.droppedItemsTimeout = setTimeout(() => {
                  this.getDroppedItems();
                }, 6000);
              }
            })
            .catch(err => {
              this.droppedItemsInprogress = false;
              if (!this.destroyed) {
                this.droppedItemsTimeout = setTimeout(() => {
                  this.getDroppedItems();
                }, 6000);
              }
            });
      },
      checkProfileModal(userid){
        for (let ilist = 0; ilist < 20; ilist++) {
          $("#profileitems" + ilist).html('<img src="" style="width: 48px;"/>');
        }
        let url = "/api/member/profile/"+userid+"/";
        Utils.apiPostCall(url)
            .then(resp => {
              if (resp.data.success) {
                console.log(resp.data.profile)
                $("#profilename").html(resp.data.profile.name);
                $("#profname").html(resp.data.profile.name);
                $("#profdate").html("Joined "+resp.data.profile.timeFromReg+" ago");
                $("#profavatarimg").attr("src", resp.data.profile.image);
                $("#profcurentseed").html("Current seed: " + resp.data.profile.seed);
                $("#profcustats").html("Boxes: "+resp.data.profile.counts.case+" | Battles: "+resp.data.profile.counts.battle.total);
                $("#proffavbox").html('Favourite Box: '+resp.data.profile.favoriteCase.name+'<img src="'+resp.data.profile.favoriteCase.image+'" style="width: 35px;">');
                $("#profbestdrop").html('Best NFT won: '+resp.data.profile.bestDrop.name+'<img src="'+resp.data.profile.bestDrop.image+'" style="width: 35px;"> € '+resp.data.profile.bestDrop.price+'');
                let lvl = ((Math.pow(resp.data.profile.exp/1000, 1/2)) + 1);
                let rank = 1;
                let rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                if (lvl >= 0 && lvl < 10){
                  rank = 1;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 10 && lvl < 20){
                  rank = 2;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 20 && lvl < 35){
                  rank = 3;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 35 && lvl < 50){
                  rank = 4;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 50 && lvl < 70){
                  rank = 5;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 70 && lvl < 90){
                  rank = 6;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                if (lvl >= 90){
                  rank = 7;
                  rankimgx = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
                }
                $("#rankimgsr").attr("src", rankimgx);
                $("#proflvlrank").html("Level: "+lvl+" Rank: "+rank);
                this.getItems(userid, 0);
              }
              //this.loaded = true;
            })
            .catch(err => {
              //this.loaded = true;
            });

        $('#profileModal').modal('toggle');
        console.log('herepuid'+this.profileuserid);
      },
      getItems(userid,ipage) {
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
                for (let ilist = 0; ilist < 20; ilist++) {
                  $("#profileitems" + ilist).html('<img src="'+resp.data.items[ilist].image+'" style="width: 48px;"/>€'+resp.data.items[ilist].price+' status:'+resp.data.items[ilist].status);
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
		},
		computed: {
			userData() {
				return this.$store.getters.userData;
			},
			hasUserData() {
				return this.$store.getters.hasUserData;
			}
		}
	}
</script>
