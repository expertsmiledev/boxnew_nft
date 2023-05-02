<template>
	<div class="centerblock">
		<main id="main" class="site-main" role="main">
			<h1><span></span>Battles <span></span></h1>
			<div class="container_1570 flex">
				<div class="sidebar">
					<div class="last_battle">
						<h4>Last Battles</h4>
						<div v-if="lastBattle && lastBattle.creator && lastBattle.participant && lastBattle.case" class="border">
							<div class="battle_results flex">
								<div class="first_player" :class="{'winner' : (lastBattle.winnerId == -1 || lastBattle.winnerId == lastBattle.creator.id)}">
									 <div class="played_gun">
										<img :src="lastBattle.creator.drop.image" :alt="lastBattle.creator.drop.name">
									</div>
									<div class="player">
										<img :src="lastBattle.creator.image" :alt="lastBattle.creator.name">
									</div>
									<p class="price_gun">{{lastBattle.creator.drop.price}}</p>
								</div>
								<div class="played_case">
									<img :src="lastBattle.case.image" :alt="lastBattle.case.name">
								</div>
								<div class="second_player" :class="{'winner' : (lastBattle.winnerId == -1 || lastBattle.winnerId == lastBattle.participant.id)}">
									 <div class="played_gun">
										<img :src="lastBattle.participant.drop.image" :alt="lastBattle.participant.drop.name">
									</div>
									<div class="player">
										<img :src="lastBattle.participant.image" :alt="lastBattle.participant.name">
									</div>
									<p class="price_gun">{{lastBattle.participant.drop.price}}</p>
								</div>
							</div>
						</div>
						<div v-if="userStats" class="border">
							<div class="my_battles">
								<div class="battle_statistics flex">
									<div class="victory">
										<div class="quantity">{{userStats.won.toLocaleString('ru-RU')}}</div>
										<p>victories</p>
									</div>
									<div class="defeat">
										<div class="quantity">{{userStats.lost.toLocaleString('ru-RU')}}</div>
										<p>defeats</p>
									</div>
									<div class="draws">
										<div class="quantity">{{userStats.draw.toLocaleString('ru-RU')}}</div>
										<p>draws</p>
									</div>
								</div>
								<router-link to="/profile/" class="open_statistics">My battles</router-link>
							</div>
						</div>
						<div v-if="stats" class="border">
							<div class="battle_information">
								<div class="total_battles">
									<div class="quantity">{{stats.active.toLocaleString('ru-RU')}}</div>
									<p>active battle</p>
								</div>
								<div class="active_battles">
									<div class="quantity">{{stats.total.toLocaleString('ru-RU')}}</div>
									<p>total battles</p>
								</div>
							</div>
						</div>
						<h4>how it works?</h4>
						<div class="border">
							<div class="who_is">
								<ol class="who_is__list">
									<li>
                    Click "Create" or join an existing battle.
                  </li>
									<li>
                    The battle will begin as soon as both participants have joined.
                  </li>
									<li>
                    The participant who received the item more expensive takes both.
                  </li>
								</ol>
							</div>
						</div>
					</div>
				</div>
        <template v-if="isLogin && userData">
          <a href="#" data-popup="createBattlemodal" style="position:absolute;">Create battle</a>
        </template>
				<div class="battles_list">
					<table class="table_price" style="border-collapse: collapse; width: 100%;">
						<thead>
							<tr>
								<td class="table_case">Case </td>
								<td class="table_battles">User</td>
                <td class="table_battles">Avatar</td>
                <td class="table_battles">User2</td>
                <td class="table_battles">Avatar2</td>
								<td class="table_price">Price</td>
								<td class="table_actions">Actions</td>
							</tr>
						</thead>
						<tbody>
							<tr v-for="ocase in cases">
                <a href="#" @click.prevent="showBattle(ocase.id)" style="display:contents;">
								<td class="table_case"><img :src="ocase.image" :alt="ocase.name"></td>
								<td class="table_battles">{{ocase.creator_username}}</td>
                <td class="table_battles"><img :src="ocase.creator_avatar" :alt="ocase.creator_username"></td>
                <td class="table_battles">{{ocase.enemy_username}}</td>
                <td class="table_battles"><img :src="ocase.enemy_avatar" :alt="ocase.enemy_username"></td>
								<td class="table_price"><p>{{ocase.salePrice}}</p></td>
								<td class="table_actions">
									<template v-if="isLogin && userData">
										<a href="#" @click.prevent="joinBattle(ocase.id)" class="enter_battle green_btn btn">Join</a>
										<a href="#" @click.prevent="createBattle(ocase.case_id)" class="add_battle blue_btn btn">Create</a>
									</template>
								</td>
                </a>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
    <createbattle-popup></createbattle-popup>
	</div>
</template>
<script>
	import CreatebattlePopup from "../popup/CreatebattlePopup";
  export default {
    components: {CreatebattlePopup},
    data: () => ({
				cases: false,
				caseTimeout: false,
				actionInProgress: false,
				stats: false,
				lastBattle: false,
				userStats: false,
				destroyed: false
			}),
		mounted() {
			Utils.setTitle("Battles");
			this.getBattlesData(true);

      const updatebattlelistcentr = this.$centrifuge.newSubscription("glob:uptadeBattleList");

      updatebattlelistcentr.on('publication', function (resp) {
        if (resp.data.success) {
          this.cases = resp.data.battles;
          this.stats = resp.data.stats;
          this.lastBattle = resp.data.lastBattle;
        }
      }).on('subscribing', function (ctx) {
        console.log(`subscribing: ${ctx.code}, ${ctx.reason}`);
      }).on('subscribed', function (ctx) {
        console.log('subscribed', ctx);
      }).on('unsubscribed', function (ctx) {
        console.log(`unsubscribed: ${ctx.code}, ${ctx.reason}`);
      }).subscribe();

			this.$eventBus.$on('centrifugeDisconnected', this.getBattlesData);
		},
		beforeDestroy() {
			this.destroyed = true;
			clearTimeout(this.caseTimeout);
			this.$eventBus.$off('centrifugeDisconnected', this.getBattlesData);
			this.$centrifuge.getSub("uptadeBattleList").unsubscribe();
		},
		methods: {
			getBattlesData(force = false) {
				if (!force && this.$centrifugeConnected) {
					return;
				}
				Utils.apiPostCall("/api/request/battle/boxes/")
						.then(resp => {
							if (resp.data.success) {
								this.cases = resp.data.battles;
								this.stats = resp.data.stats;
								this.lastBattle = resp.data.lastBattle;
								if (resp.data.userStats) {
									this.userStats = resp.data.userStats;
								}
							}
							if (!this.destroyed) {
								this.statTimeout = setTimeout(() => {
									this.getBattlesData();
								}, 5000);
							}
						})
						.catch(err => {
							if (!this.destroyed) {
								this.statTimeout = setTimeout(() => {
									this.getBattlesData();
								}, 5000);
							}
						});
			},
      showBattle(battleId){
        this.$router.push("/battle/" + battleId + "/");
      },
			createBattle(caseId) {
				if (this.actionInProgress) {
					return;
				}
				this.actionInProgress = true;
				Utils.apiPostCall("/api/request/battle/new/" + caseId + "/")
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
			},
			joinBattle(battleId) {
				if (this.actionInProgress) {
					return;
				}
				this.actionInProgress = true;
				Utils.apiPostCall("/api/request/battle/join/" + battleId + "/")
						.then(resp => {
							if (resp.data.success) {
								this.$router.push("/battle/" + resp.data.id + "/");
							} else {
								Utils.userAlert('An error occurred when joining the battle', resp.data.error, 'error');
							}
							this.actionInProgress = false;
						})
						.catch(err => {
							this.actionInProgress = false;
							Utils.userAlert('An error occurred when joining the battle', err.response.statusText, 'error');
						});
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
		}
	}
</script>