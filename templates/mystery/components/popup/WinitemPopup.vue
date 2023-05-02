<template>
  <div v-if="isLogin && userData" class="modal fade" id="wonNftModal" tabindex="-1" role="dialog" aria-labelledby="wonNftModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mwib539v" role="document">
      <div class="modal-content avdhkwqbkf">
        <div class="css-ranbx4 csorwprw" width="800">
          <div class="css-3g9l7g srblerwa">
            <div class="css-1he5r9c wrpownokw">
              <div class="css-1f9kk05">
                <div class="css-tqjib3 fowhlaew">CONGRATULATIONS, YOU WON:</div>
              </div>
              <img class="nkrewo4oz" id="wonnftimg" src="">
              <p class="ndso34aplzf" id="wonnftname"></p>
              <p class="fdgert5ab" id="wonnftprice">€</p>
              <p class="chnlw405a" id="wonnftchance"></p>
              <form class="asnk3qoz">
                <div class="css-9s9ecg fhertcgx"></div>
                <div class="css-9s9ecg fgtrxcgha"></div>
                <div class="css-9s9ecg"></div>

                <div @click.prevent="withdrawItem()" class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                  <svg id="avsubmload22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                  <span id="submbttxav22" class="css-1ubm3rw">WITHDRAW</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

                <div class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                  <svg id="avsubmload23" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                  <span id="submbttxav23" class="css-1ubm3rw">SELL FOR BALANCE</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>

                <div class="relative max-w-max"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep" style="position: relative; display: block; overflow: hidden; border: 1px solid black; font-size: 22px; text-align: center; line-height: 44px; text-decoration: none; color: white; border-radius: 4px; width: 340px; height: 40px; box-shadow: rgb(139, 109, 35) 0px 4px 0px, rgba(0, 0, 0, 0.4) 0px 5px 5px 1px; transition: all 0.15s ease-in-out 0s;"><button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button" style="background: rgb(226, 178, 56); line-height: 1em; width: 340px; height: 40px;"><div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow">
                  <svg id="avsubmload24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide" style="position: relative; margin: auto; shape-rendering: auto; width: 20px; height: 20px;"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
                  <span id="submbttxav24" class="css-1ubm3rw">SELL FOR CRYPTO</span></div><div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>
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
  props: {
    winitemData: false
  },
  data: () => ({
    itemActionInProgress: false
  }),
  mounted() {
    $(document).on('click', '#winnftmodal', () => {
      return false;
    });
  },
  beforeDestroy() {
    $(document).off('click', '#winnftmodal');
    $(document).off('click', 'body');
  },
  methods: {
    close() {
      this.$emit('closeWinItemModal');
    },
    nftItemName(name) {
      return name;
    },
    withdrawItem() {
      this.close();
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