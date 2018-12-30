import Vue from 'vue'
import Vuex from 'vuex'
import teams from './store/teams'
import players from './store/players'
import team_modal from './store/team-modal'
import player_modal from './store/player-modal'
import new_player_modal from './store/new-player-modal'
import toast from './store/toast'

Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    teams,
    players,
    team_modal,
    player_modal,
    new_player_modal,
    toast
  }
})