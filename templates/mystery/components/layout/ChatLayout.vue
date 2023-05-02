<template>
  <div class="d-none d-xl-block col-xl-2 bd-toc chatright q05b39d">
    <div class="onlinechat g9438jbds">
      <p class="e953oil">Chat (<span id="playersonline"></span> players online)</p>
      <svg id="hidechatbutton" class="ry34985a" width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><path id="hdnidvn" d="M0 0h25v25H0V0z" style="fill: rgb(38 38 38);"></path> <g fill="#FFF"><path d="M15.445 8.375l1.179 1.179-7.071 7.07-1.178-1.178 7.07-7.07z"></path> <path d="M8.375 9.554l1.178-1.179 7.071 7.071-1.178 1.178-7.071-7.07z"></path></g></svg></div>
    <div class="chatSection-0-2-25"><div id="zrain" style="display: none;"><p class="raining">It's raining today!</p>
      <p class="receiveclick">Click below to receive free balance.</p> <img src="/uploads/rainchat.png" class="rainclick">
      
      <template>
        <vue-recaptcha ref="recaptcharain" sitekey="6Ldp-NcfAAAAAE8FXN_x1B524wBanfc9TZcI1I6g" @verify="takepartinRain" @expired="resetCaptcharain" @error="resetCaptcharain" size="invisible">
        <button @click.prevent="recaptchaSendrain()" class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep claimbtn g2803tn">
          <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button x4539is1c">
            <p class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow e934u5i">
              <svg id="avsubmload27" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loadhide y93254k"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fe718d" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" style="stroke: rgb(23, 23, 23);"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>
              <span id="submbttxav27" class="css-1ubm3rw">CLAIM</span>
            </p>
            <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button>
        </button>
      </vue-recaptcha>
      </template>

    </div>
      <div class="container-0-2-159 containerWithMessages-0-2-161">
        <template v-if="userData && userData.ismod == 1">
        <input type="hidden" id="ismod" value="1"/>
        </template>
        <template v-else>
          <input type="hidden" id="ismod" value="0"/>
        </template>

        <div class="messagesWrapper-0-2-163">
          <div class="messages-0-2-164">
            <template v-if="chatData">
              <div v-for="newchat in chatData" class="messageWrapper-0-2-212" :data-chatid="newchat.id">
                <img :alt="newchat.username" loading="lazy" :src="newchat.useravatar" class="emoji-0-2-230 moodEmoji-0-2-213">
                <div class="informationAndMessage-0-2-214">
                  <div class="information-0-2-215">
                    <template v-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 0 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 10">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 10 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 20">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 20 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 35">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 35 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 50">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 50 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 70">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 70 && ((Math.pow(newchat.userexp/1000, 1/2)) + 1) < 90">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>
                    <template v-else-if="((Math.pow(newchat.userexp/1000, 1/2)) + 1) >= 90">
                      <img src="https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png" class="w934b3s">
                    </template>

                    <template v-if="newchat.modpower == 1">
                          <span style="
                            margin-left: 5px;
                            background: #3f8a4d;
                            padding-left: 3px;
                            padding-right: 3px;
                            border-radius: 5px;
                            font-size: .7rem;
                            font-weight: 600;
                         ">MOD</span>
                    </template>
                    <template v-else-if="newchat.modpower == 2">
                      <span style="
                          margin-left: 5px;
                          background: #f02d59;
                          padding-left: 3px;
                          padding-right: 3px;
                          border-radius: 5px;
                          font-size: .7rem;
                          font-weight: 600;
                      ">OWNER</span>
                    </template>

                    <template v-if="newchat.modpower == 0">
                    <a @click.prevent="checkProfileModalchlw(newchat.publicid)" class="internalLink-0-2-156 username-0-2-221">{{ newchat.username }}</a>
                    </template>

                    <template v-if="newchat.modpower == 1">
                      <a @click.prevent="checkProfileModalchlw(newchat.publicid)" class="internalLink-0-2-156 username-0-2-221" style="color:rgb(65 255 128);">{{ newchat.username }}</a>
                    </template>

                    <template v-if="newchat.modpower == 2">
                      <a @click.prevent="checkProfileModalchlw(newchat.publicid)" class="internalLink-0-2-156 username-0-2-221" style="color:rgb(251 72 113);">{{ newchat.username }}</a>
                    </template>

                    <div class="timestamp-0-2-222" :data-timesent="newchat.time">{{ timeCalcAgo(""+newchat.time) }}
                    </div>
                    <template v-if="userData">
                    <div v-if="userData.ismod == 1" class="f7u84395i">
                      <a @click.prevent="deleteMessage(newchat.id)" style="cursor:pointer">delete</a>
                      <a @click.prevent="banUserFromMessage(newchat.id)" style="cursor:pointer;color: #d3d3d3;margin-left: 4px;"> chat ban</a>
                    </div>
                    </template>

                  </div>
                  <div class="message-0-2-223" v-html="newchat.message">
                  </div>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>

    <div id="emojisck" class="sc-fWSCIC iwghVy hideemojis">
      <div class="sc-TmcTc cJbABh">Emojis
      </div>
      <div class="sc-dwfUOf bNQBLt grid grid-cols-7 gap-1">
        <div class="chat-ebicon" @click.prevent="addEmoji(':blueheart:')">
          <img src="/uploads/blueheart.gif" loading="lazy" title=":blueheart:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':bonk:')">
          <img src="/uploads/bonk.png" loading="lazy" title=":bonk:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':bruh:')">
          <img src="/uploads/bruh.png" loading="lazy" title=":bruh:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':catjump:')">
          <img src="/uploads/catjump.gif" loading="lazy" title=":catjump:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':catokay:')">
          <img src="/uploads/catokay.png" loading="lazy" title=":catokay:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':dogeshy:')">
          <img src="/uploads/dogeshy.png" loading="lazy" title=":dogeshy:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':fire:')">
          <img src="/uploads/fire.gif" loading="lazy" title=":fire:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':insane:')">
          <img src="/uploads/insane.png" loading="lazy" title=":insane:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepecopium:')">
          <img src="/uploads/pepecopium.png" loading="lazy" title=":pepecopium:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepecross:')">
          <img src="/uploads/pepecross.png" loading="lazy" title=":pepecross:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepelove:')">
          <img src="/uploads/pepelove.png" loading="lazy" title=":pepelove:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepesalute:')">
          <img src="/uploads/pepesalute.png" loading="lazy" title=":pepesalute:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepethink:')">
          <img src="/uploads/pepethink.png" loading="lazy" title=":pepethink:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pogging:')">
          <img src="/uploads/pogging.png" loading="lazy" title=":pogging:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':redheart:')">
          <img src="/uploads/redheart.png" loading="lazy" title=":redheart:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':rip:')">
          <img src="/uploads/rip.png" loading="lazy" title=":rip:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':bayc:')">
          <img src="/uploads/bayc.png" loading="lazy" title=":bayc:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':kleexcited:')">
          <img src="/uploads/kleexcited.png" loading="lazy" title=":kleexcited:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':milady:')">
          <img src="/uploads/milady.png" loading="lazy" title=":milady:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':moonbirds:')">
          <img src="/uploads/moonbirds.png" loading="lazy" title=":moonbirds:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':okboomer:')">
          <img src="/uploads/okboomer.png" loading="lazy" title=":okboomer:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':peperain:')">
          <img src="/uploads/peperain.gif" loading="lazy" title=":peperain:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pikachu:')">
          <img src="/uploads/pikachu.gif" loading="lazy" title=":pikachu:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':yocigood:')">
          <img src="/uploads/yocigood.gif" loading="lazy" title=":yocigood:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':cake:')">
          <img src="/uploads/cake.png" loading="lazy" title=":cake:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':flushed:')">
          <img src="/uploads/flushed.png" loading="lazy" title=":flushed:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':heartlove:')">
          <img src="/uploads/heartlove.png" loading="lazy" title=":heartlove:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':ily:')">
          <img src="/uploads/ily.png" loading="lazy" title=":ily:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':kittylove:')">
          <img src="/uploads/kittylove.png" loading="lazy" title=":kittylove:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':monkas:')">
          <img src="/uploads/monkas.png" loading="lazy" title=":monkas:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':mushroom:')">
          <img src="/uploads/mushroom.png" loading="lazy" title=":mushroom:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepecomfy:')">
          <img src="/uploads/pepecomfy.png" loading="lazy" title=":pepecomfy:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepeez:')">
          <img src="/uploads/pepeez.png" loading="lazy" title=":pepeez:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepehands:')">
          <img src="/uploads/pepehands.png" loading="lazy" title=":pepehands:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepehappy:')">
          <img src="/uploads/pepehappy.png" loading="lazy" title=":pepehappy:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepeheart:')">
          <img src="/uploads/pepeheart.png" loading="lazy" title=":pepeheart:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepehmm:')">
          <img src="/uploads/pepehmm.png" loading="lazy" title=":pepehmm:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepeno:')">
          <img src="/uploads/pepeno.png" loading="lazy" title=":pepeno:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepewin:')">
          <img src="/uploads/pepewin.png" loading="lazy" title=":pepewin:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pepeyes:')">
          <img src="/uploads/pepeyes.png" loading="lazy" title=":pepeyes:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pinkcoffee:')">
          <img src="/uploads/pinkcoffee.png" loading="lazy" title=":pinkcoffee:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':sadge:')">
          <img src="/uploads/sadge.png" loading="lazy" title=":sadge:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':uwucat:')">
          <img src="/uploads/uwucat.png" loading="lazy" title=":uwucat:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':pressf:')">
          <img src="/uploads/pressf.png" loading="lazy" title=":pressf:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':clover:')">
          <img src="/uploads/clover.png" loading="lazy" title=":clover:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':sailormoonwink:')">
          <img src="/uploads/sailormoonwink.gif" loading="lazy" title=":sailormoonwink:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':shootingstars:')">
          <img src="/uploads/shootingstars.png" loading="lazy" title=":shootingstars:" alt="" class="mvo923ba">
        </div>
        <div class="chat-ebicon" @click.prevent="addEmoji(':bigshibaspin:')">
          <img src="/uploads/bigshibaspin.gif" loading="lazy" title=":bigshibaspin:" alt="" class="mvo923ba">
        </div>
      </div>
    </div>
    <div class="form-0-2-165 v92w3ik">
      <div class="container-0-2-98">
        <div id="emoji-picker-tooltip-reference" aria-expanded="false">
          <div id="emoji-suggestion-tooltip-reference" aria-expanded="false">
            <div id="command-suggestion-tooltip-reference" aria-expanded="false">
              <div id="user-suggestion-tooltip-reference" aria-expanded="false">
      <div class="inputContainer-0-2-101">
        <template v-if="isLogin && userData">
        <input id="chattext" spellcheck="false" v-on:keyup.enter="sendChatMessage" placeholder="Send a message" value="" class="input-0-2-103 inputContentAfter-0-2-105 d923iknrea"/>
          <div class="relative max-w-max h938k25x" @click.prevent="sendChatMessage()"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep t83s49d">
            <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button q158d64x">
              <div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow f36734rt">SEND</div>
              <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>
        </template>
        <template v-if="!isLogin">
          <input id="chattextiln" disabled="" spellcheck="false" placeholder="Login to use chat" value="" class="input-0-2-103 inputContentAfter-0-2-105 v10d34i"/>
          <div class="relative max-w-max h938k25x" @click.prevent="sendChatMessageiln()"><div class="react-ripples h-full w-full rounded min-w-[140px] shiny-sweep t83s49d">
            <button type="button" class="group relative flex h-11 items-start justify-center rounded bg-yellow-dark-100  min-w-[140px] shiny-sweep c-button q158d64x">
              <div class="relative flex h-10.5 w-full items-center justify-center rounded px-4 text-sm font-semibold bg-yellow text-[#3E3009] group-hover:bg-yellow f36734rt">SEND</div>
              <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div></button></div></div>
        </template>
      </div></div></div></div></div></div><div class="chatActions-0-2-167">
      <button type="button" @click.prevent="showEmojis()" class="button-0-2-12 transparent-0-2-15 small-0-2-19 chatAction-0-2-168 c-button">
        <img src="/uploads/staremoji.png" class="g323a6bj">Emoji
        <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
      </button>
      <button type="button" @click.prevent="rainPopup()" class="button-0-2-12 transparent-0-2-15 small-0-2-19 chatAction-0-2-168 c-button">
        <img src="/uploads/rainchat.png" class="c823a45i">Rain
        <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
      </button>
      <button type="button" @click.prevent="chatrulesPopup()" class="button-0-2-12 transparent-0-2-15 small-0-2-19 chatAction-0-2-168 c-button r92a345e">
        <img src="/uploads/chatrules.png" class="c823a45i">Rules
        <div class="c-ripple js-ripple"><span class="c-ripple__circle"></span></div>
      </button></div></div>
  </div>
  </div>
</template>
<script>
import {VueRecaptcha} from 'vue-recaptcha';
	export default {
		data: () => ({
        chatData: false,
        stats: false,
        statsInProgress: false,
        chatInProgress: false,
        statTimeout: false,
        chatTimeout: false,
				destroyed: false,
        showemojid: false,
        items: {
          list: false,
          page: 0,
          hasMore: true,
          isLoading: false,
          min: 0,
          max: 0
        },
      centriCheckChat: false,
			}),
    deleteMessagex(messageid) {
      Utils.apiPostCall("/api/request/chat/moddelete/", {
        message_id: messageid
      })
          .then(resp => {
            if (resp.data.success) {
              console.log('success message deleted');
            } else {
              console.log(resp.data);
            }
          })
          .catch(err => {
            console.log(err);
          });
    },
		mounted() {
		  this.getStats(true);
      this.getChatData();
      this.chattimeAgo();
      $(document).on('click', '#hidechatbutton', (e) => {
        $(".chatright").addClass("hidechatd");
        $(".mainconpagenft").addClass("col-xl-12");
        $("#chatopenb").removeClass("hidechatd");
        $("#chatopenb").addClass("chatopenbop");
      });


          const subchatcentr = this.$centrifuge.newSubscription("glob:chatMessage");

          subchatcentr.on('publication', (resp) => {

            if (resp.data.success) {
              console.log("new chat message" + resp.data.message);
              $(".messageWrapper-0-2-212:first-child").remove();
              let currentx = (new Date().toLocaleString('en', {timeZone: 'Atlantic/St_Helena'}));
              var newdatecalcx = new Date(currentx).toISOString();
              var newdatecalc2x = new Date(newdatecalcx);
              let cDatex = newdatecalc2x.getFullYear() + '-' + (newdatecalc2x.getMonth() + 1) + '-' + newdatecalc2x.getDate();
              let cTimex = newdatecalc2x.getHours() + ":" + newdatecalc2x.getMinutes() + ":" + newdatecalc2x.getSeconds();
              let dateTimex = cDatex + ' ' + cTimex; console.log(dateTimex);

              let levelatmsg = parseInt((Math.pow(resp.data.userexp / 1000, 1 / 2)) + 1);
              let rankmsg = 1;
              let rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              let modpower = resp.data.modpower;
              let modp1add = '';
              let modp2add = '';

              if (levelatmsg >= 0 && levelatmsg < 10){
                rankmsg = 1;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 10 && levelatmsg < 20){
                rankmsg = 2;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 20 && levelatmsg < 35){
                rankmsg = 3;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 35 && levelatmsg < 50){
                rankmsg = 4;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 50 && levelatmsg < 70){
                rankmsg = 5;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 70 && levelatmsg < 90){
                rankmsg = 6;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }
              if (levelatmsg >= 90){
                rankmsg = 7;
                rankatmsg = "https://rollbit.com/static/media/Icon%201%20(gold).ee387ca7baa17741a3a7.png";
              }

              if (modpower == 1){
                modp1add = "<span style='margin-left: 5px;background: #3f8a4d;padding-left: 3px;padding-right: 3px;border-radius: 5px;font-size: .7rem;font-weight: 600;'>MOD</span>";
                modp2add = 'color: rgb(65 255 128);';
              }
              if (modpower == 2){
                modp1add = "<span style='margin-left: 5px;background: #f02d59;padding-left: 3px;padding-right: 3px;border-radius: 5px;font-size: .7rem;font-weight: 600;'>OWNER</span>";
                modp2add = 'color: rgb(251 72 113);';
              }

              if ($("#ismod").val() == 1){
                $(".messages-0-2-164").append('<div class="messageWrapper-0-2-212" data-chatid="' + resp.data.id + '"><img alt="' + resp.data.username + '" loading="lazy" src="' + resp.data.useravatar + '" class="emoji-0-2-230 moodEmoji-0-2-213"><div class="informationAndMessage-0-2-214"><div class="information-0-2-215"><img src="' + rankatmsg + '" class="w934b3s">' + modp1add + '<a class="internalLink-0-2-156 username-0-2-221" style="' + modp2add + '">' + resp.data.username + '</a><div class="timestamp-0-2-222" data-timesent="'+ dateTimex + '">now</div><div class="f7u84395i"><a onclick="deleteMessagex(' + resp.data.id + ')" style="cursor:pointer">delete</a><a onclick="banUserFromMessagex(' + resp.data.id + ')" style="cursor:pointer;color: #d3d3d3;margin-left: 4px;"> chat ban</a></div></div><div class="message-0-2-223">' + resp.data.message + '</div></div></div>');
              }else{
                $(".messages-0-2-164").append('<div class="messageWrapper-0-2-212" data-chatid="' + resp.data.id + '"><img alt="' + resp.data.username + '" loading="lazy" src="' + resp.data.useravatar + '" class="emoji-0-2-230 moodEmoji-0-2-213"><div class="informationAndMessage-0-2-214"><div class="information-0-2-215"><img src="' + rankatmsg + '" class="w934b3s">' + modp1add + '<a class="internalLink-0-2-156 username-0-2-221" style="' + modp2add + '">' + resp.data.username + '</a><div class="timestamp-0-2-222" data-timesent="'+ dateTimex + '">now</div><div class="f7u84395i"></div></div><div class="message-0-2-223">' + resp.data.message + '</div></div></div>');
              }

              $('.messagesWrapper-0-2-163').scrollTop($('.messagesWrapper-0-2-163')[0].scrollHeight);
            }
          }).subscribe();


          const statsupdatecentr = this.$centrifuge.newSubscription("glob:updateStats");

          statsupdatecentr.on('publication', function (resp) {
            if (resp.data.success) {
              this.stats = resp.data;
              $("#playersonline").html(resp.data.online);
            }
          }).subscribe();


          const rainoncentr = this.$centrifuge.newSubscription("glob:rainOn");

          rainoncentr.on('publication', function (resp) {
            if (resp.data.success) {
              console.log('rainOn');
            }
          }).subscribe();

          const rainoffcentr = this.$centrifuge.newSubscription("glob:rainOff");

          rainoffcentr.on('publication', function (resp) {
            if (resp.data.success) {
              console.log('rainOff');
            }
          }).subscribe();


          const deletemesscentr = this.$centrifuge.newSubscription("glob:deleteMessage");

          deletemesscentr.on('publication', function (resp) {
            console.log(resp);
            if (resp.data.success) {
              console.log("new chat delete id:" + resp.data.message_id);
              $('[data-chatid^="' + resp.data.message_id + '"]').remove();
              $('.messagesWrapper-0-2-163').scrollTop($('.messagesWrapper-0-2-163')[0].scrollHeight);
            }
          }).subscribe();



      this.$eventBus.$on('centrifugeDisconnected', this.getStats);
		},
		beforeDestroy() {
			this.destroyed = true;
      clearTimeout(this.statTimeout);
      clearTimeout(this.chatTimeout);
      this.$eventBus.$off('centrifugeDisconnected', this.getStats);
		},
		methods: {
      getStats(force = false) {
        if (!force && this.$centrifugeConnected || this.statsInProgress) {
          return;
        }
        this.statsInProgress = true;
        Utils.apiPostCall("/api/request/statistics/")
            .then(resp => {
              if (resp.data.success) {
                this.stats = resp.data;
                $("#playersonline").html(resp.data.online);
              }
              this.statsInProgress = false;
              if (!this.destroyed) {
                if(!this.$centrifugeConnected) {
                  this.chatTimeout = setTimeout(() => {
                    this.getStats();
                  }, 10000);
                }
              }
            })
            .catch(err => {
              this.statsInProgress = false;
              if (!this.destroyed) {
                if(!this.$centrifugeConnected) {
                  this.chatTimeout = setTimeout(() => {
                    this.getStats();
                  }, 10000);
                }
              }
            });
      },
      getChatData() {
        if (this.chatInProgress) {
          return;
        }
        this.chatInProgress = true;
        Utils.apiPostCall("/api/request/chat/info/")
            .then(resp => {
              if (resp.data.success == true){
                resp.data.chatm.sort(function(a,b){return a.id-b.id});
                this.chatData = resp.data.chatm;
                console.log("chatdata"+this.chatData);
                setTimeout(() => {
                  $('.messagesWrapper-0-2-163').scrollTop($('.messagesWrapper-0-2-163')[0].scrollHeight);
                }, 800);
              }
              this.chatInProgress = false;
              if (!this.destroyed) {
                if(!this.$centrifugeConnected) {
                  this.chatTimeout = setTimeout(() => {
                    this.getChatData();
                  }, 4000);
                }
              }
            })
            .catch(err => {
              this.chatInProgress = false;
              if (!this.destroyed) {
                if(!this.$centrifugeConnected) {
                  this.chatTimeout = setTimeout(() => {
                    this.getChatData();
                  }, 4000);
                }
              }
            });
      },
      timeCalcAgo(date) {
          date = new Date(date.toLocaleString('en')).toISOString();
          var date2 = new Date(date);
          //console.log("date:"+date);
          //console.log("date2"+date2);
          var aztl = (new Date().toLocaleString('en', {timeZone: 'Atlantic/St_Helena'}));
          var newdatecalc = new Date(aztl).toISOString();
          var newdatecalc2 = new Date(newdatecalc);
          //console.log("newdatecalc:"+newdatecalc);
          //console.log("newdatecalc2:"+newdatecalc2);
          var seconds = Math.floor((newdatecalc2 - date2) / 1000);
          var interval = seconds / 31536000;
          if (interval > 1) {
            return Math.floor(interval) + " years ago";
          }
          interval = seconds / 2592000;
          if (interval > 1) {
            return Math.floor(interval) + " months ago";
          }
          interval = seconds / 86400;
          if (interval > 1) {
            if (Math.floor(interval) == 1){
              return Math.floor(interval) + " day ago";
            }else{
              return Math.floor(interval) + " days ago";
            }
          }
          interval = seconds / 3600;
          if (interval > 1) {
            if (Math.floor(interval) == 1) {
              return Math.floor(interval) + " hour ago";
            }else{
              return Math.floor(interval) + " hours ago";
            }
          }
          interval = seconds / 60;
          if (interval > 1) {
            if (Math.floor(interval) == 1) {
              return Math.floor(interval) + " minute ago";
            }else{
              return Math.floor(interval) + " minutes ago";
            }
          }
          if (Math.floor(seconds) == 1){
            return Math.floor(seconds) + " second ago";
          }
          return Math.floor(seconds) + " seconds ago";
      },
      chattimeAgo(){
        setInterval(() => {

          $('.timestamp-0-2-222').each(function(index,item){
            var date = "" + $(item).data('timesent');
            date = new Date(date.toLocaleString('en')).toISOString();
            var date2 = new Date(date);
            //console.log("date:"+date);
            //console.log("date2"+date2);
            var aztl = (new Date().toLocaleString('en', {timeZone: 'Atlantic/St_Helena'}));
            var newdatecalc = new Date(aztl).toISOString();
            var newdatecalc2 = new Date(newdatecalc);
            //console.log("newdatecalc:"+newdatecalc);
            //console.log("newdatecalc2:"+newdatecalc2);
            var seconds = Math.floor((newdatecalc2 - date2) / 1000);
            var interval = seconds / 31536000;
            var rtrnvl = "";
            if (interval > 1) {
              rtrnvl = Math.floor(interval) + " years ago";
              $(item).html('' + rtrnvl);
            }else{
              interval = seconds / 2592000;
              if (interval > 1) {
                rtrnvl = Math.floor(interval) + " months ago";
                $(item).html('' + rtrnvl);
              }else {
                interval = seconds / 86400;
                if (interval > 1) {
                  if (Math.floor(interval) == 1) {
                    rtrnvl = Math.floor(interval) + " day ago";
                  }else{
                    rtrnvl = Math.floor(interval) + " days ago";
                  }
                  $(item).html('' + rtrnvl);
                }else {
                  interval = seconds / 3600;
                  if (interval > 1) {
                    if (Math.floor(interval) == 1) {
                      rtrnvl = Math.floor(interval) + " hour ago";
                    }else{
                      rtrnvl = Math.floor(interval) + " hours ago";
                    }
                    $(item).html('' + rtrnvl);
                  }else {
                    interval = seconds / 60;
                    if (interval > 1) {
                      if (Math.floor(interval) == 1) {
                        rtrnvl = Math.floor(interval) + " minute ago";
                      }else{
                        rtrnvl = Math.floor(interval) + " minutes ago";
                      }
                      $(item).html('' + rtrnvl);

                    } else {
                      if (Math.floor(seconds) == 1) {
                        rtrnvl = Math.floor(seconds) + " second ago";
                      }else{
                        rtrnvl = Math.floor(seconds) + " seconds ago";
                      }
                      $(item).html('' + rtrnvl);
                    }
                  }
                }
              }
            }

          });
        }, 5000);
      },
      sendChatMessage() {
        Utils.apiPostCall("/api/request/chat/send/", {
          chat_message: $("#chattext").val()
        })
            .then(resp => {
              if (resp.data.success) {
                console.log('success chat sent');
                $("#chattext").val('');
              } else {
                Utils.userAlert(resp.data.error, '', 'error');
              }
            })
            .catch(err => {
              Utils.userAlert(err, '', 'error');
            });
      },
      sendChatMessageiln(){
        $('#loginModal').modal('toggle');
      },
      deleteMessage(messageid) {
        Utils.apiPostCall("/api/request/chat/moddelete/", {
          message_id: messageid
        })
            .then(resp => {
              if (resp.data.success) {
                console.log('success message deleted');
              } else {
                console.log(resp.data);
              }
            })
            .catch(err => {
              console.log(err);
            });
      },
      banUserFromMessage(messageid) {
        Utils.apiPostCall("/api/request/chat/modchatban/", {
          message_id: messageid
        })
            .then(resp => {
              if (resp.data.success) {
                console.log('success user banned and message deleted');
              } else {
                console.log(resp.data);
              }
            })
            .catch(err => {
              console.log(err);
            });
      },
      checkProfileModalchlw(userid){
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
                this.getItemschlw(userid, 0);
              }
              //this.loaded = true;
            })
            .catch(err => {
              //this.loaded = true;
            });

        $('#profileModal').modal('toggle');
        console.log('herepuid'+this.profileuserid);
      },
      getItemschlw(userid,ipage) {
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
      showEmojis(){
          this.showemojid = 1;
          if($("#emojisck").hasClass("displayemojis")){
            if(this.showemojid == 1){
              $("#emojisck").removeClass("displayemojis");
              $("#emojisck").addClass("hideemojis");
              this.showemojid = 2;
            }
          }
          if($("#emojisck").hasClass("hideemojis")){
            if(this.showemojid == 1) {
              $("#emojisck").removeClass("hideemojis");
              $("#emojisck").addClass("displayemojis");
              this.showemojid = 2;
            }
          }
      },
      addEmoji(emote){
        $("#chattext").val((($("#chattext").val()) + " " + emote));
      },
      rainPopup(){
        $('#rainPopup').modal('toggle');
      },
      chatrulesPopup(){
        $('#chatrulesPopup').modal('toggle');
      },
      recaptchaSendrain() {
        this.$refs.recaptcharain.execute();
      },
      takepartinRain(response){
        console.log('recaptcha response: ' + response);
        Utils.apiPostCall("/api/request/raintakepartin/", { recaptch_rain_resp: response })
            .then(resp => {
              console.log(resp.data);
            })
            .catch(err => {
              Utils.userAlert('Error, try again', err.response.statusText, 'error');
            });
        this.$refs.recaptcharain.reset();
      },
      resetCaptcharain(){
        this.$refs.recaptcharain.reset();
        this.$refs.recaptcharain.execute();
      },
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
		},
    components: {'vue-recaptcha': VueRecaptcha }
	}
</script>
