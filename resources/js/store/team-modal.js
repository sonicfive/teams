
const state = {
  is_active : false,
  title: '',
  players: []
}

const getters = {
    IS_ACTIVE : state => {
        return state.is_active
    },
    TITLE : state => {
        return state.title
    },
    PLAYERS : state => {
        return state.players
    }
}

const actions = {
    OPEN : (context, payload) => {
        context.commit('SET_TITLE', payload.title)
        context.commit('SET_ACTIVE', true)
        context.dispatch('GET_PLAYERS', payload.id)
    },
    CLOSE : (context) => {
        context.commit('SET_ACTIVE', false)
    },
    GET_PLAYERS: async (context, payload) => {
        let _this = this
          await axios.get("/api/teams/" + payload + "/players")
          .then(
              data => {
                context.commit('SET_PLAYERS', data.data)
              }
          )
      }
}

const mutations = {
    SET_ACTIVE : (state, payload) => {
        state.is_active = payload
    },
    SET_TITLE : (state, payload) => {
        state.title = payload
    },
    SET_PLAYERS : (state, payload) => {
        state.players = payload
    }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
