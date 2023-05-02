<template>
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog modal-dialog-centered mwib539v">
      <div class="modal-content mndlfjiwlf">
        <div width="800" class="css-ranbx4 kgfnaowmgt">
          <div class="css-3g9l7g gbkaur">
            <div class="css-1he5r9c grewiozvc">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 ksofwelpa">PROFILE - <span id="profilename"></span>
                </div>
              </div>
              <div style="
                      display: inline;
                      ">
                <img id="rankimgsr" src="" style="
    width: 20px;
    position: absolute;
    left: 30%;
">
                <p id="profname" style="
                      margin-top: 15px;
                      /* margin: auto; */
                      margin-left: 40%;
                      margin-bottom: 0;
                      font-size: 0.9em;
                      ">
                </p>
              </div>
              <p id="proflvlrank" style="
                      margin-top: 15px;
                      /* margin: auto; */
                      margin-left: 40%;
                      margin-bottom: 0;
                      font-size: 0.9em;
                      ">
              </p>
              <p id="profdate" style="
                    /* margin-top: 15px; */
                    /* margin: auto; */
                    margin-left: 28%;
                    /* vertical-align: middle; */
                    /* margin: auto; */
                    /* display: flex; */
                    font-size: 0.9em;
                    ">Joined
              </p>
              <img id="profavatarimg" src="" class="fsrewisdgr" style="
                                                                                                                  width: 88px;
                                                                                                                  ">
              <p id="profcurentseed" style="
                    margin-top: 15px;
                    /* margin: auto; */
                    margin-left: 16%;
                    /* vertical-align: middle; */
                    /* margin: auto; */
                    /* display: flex; */
                    font-size: 0.9em;
                    margin-bottom: 0;
                    ">Current seed:
              </p>
              <p id="proffavbox" style="
                    margin-top: 15px;
                    /* margin: auto; */
                    margin-left: 16%;
                    /* vertical-align: middle; */
                    /* margin: auto; */
                    /* display: flex; */
                    font-size: 0.9em;
                    margin-bottom: 0;
                    ">Favourite Box:
              </p>
              <p id="profcustats" style="
                    /* margin-top: 15px; */
                    /* margin: auto; */
                    margin-left: 26%;
                    /* vertical-align: middle; */
                    /* margin: auto; */
                    /* display: flex; */
                    font-size: 0.9em;
                    margin-bottom: 0.5rem;
                    ">Boxes: 0 | Battles: 0
              </p>
              <p id="profbestdrop" style="
                    margin-top: 15px;
                    /* margin: auto; */
                    margin-left: 16%;
                    /* vertical-align: middle; */
                    /* margin: auto; */
                    /* display: flex; */
                    font-size: 0.9em;
                    margin-bottom: 0;
                    ">Best NFT won:
              </p>
              <button class="css-1x857qs ashr9bnrk c-button" style="
                                                       width: 120px;
                                                       text-transform: none;
                                                       border-radius: 50px;
                                                       ">
            <span class="css-zu8xmm">
            </span>
                <span class="css-1l4yntu">
            </span>
                <span class="css-tqp6s2">
            </span>
                <span class="css-1ubm3rw" style="
                                             ">Drop
            </span>
                <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
              </button>
              <button class="css-1x857qs ashr9bnrk c-button" style="
                                                       width: 120px;
                                                       margin-left: 20px;
                                                       text-transform: none;
                                                       ">
            <span class="css-zu8xmm">
            </span>
                <span class="css-1l4yntu">
            </span>
                <span class="css-tqp6s2">
            </span>
                <span class="css-1ubm3rw">Battles
            </span>
                <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
              </button>
              <div id="profdropnft" style="display: flex;"><div id="profileitems1" style="font-size: 0.85em;"></div><div id="profileitems2" style="font-size: 0.85em;"></div><div id="profileitems3" style="font-size: 0.85em;"></div><div id="profileitems4" style="font-size: 0.85em;"></div><div id="profileitems5" style="font-size: 0.85em;"></div><div id="profileitems6" style="font-size: 0.85em;"></div>     </div>
              <div style="display: flex;"><div id="profileitems7" style="font-size: 0.85em;"></div><div id="profileitems8" style="font-size: 0.85em;"></div><div id="profileitems9" style="font-size: 0.85em;"></div><div id="profileitems10" style="font-size: 0.85em;"></div><div id="profileitems11" style="font-size: 0.85em;"></div><div id="profileitems12" style="font-size: 0.85em;"></div>     </div>
              <div style="
                      margin-top: 20px;
                      margin-left: 40%;
                      ">1/4 ...
              </div>
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
        affiliate_code: '',
        actionInProgress: false,
			}),
		mounted() {
		},
		beforeDestroy() {
		},
    methods: {
    },
		computed: {
			isLogin() {
				return this.$store.getters.isLogin;
			}
		}
	}
</script>