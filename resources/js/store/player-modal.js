
const state = {
  is_active : false,
  title: '',
  player: {},
  loading: true
}

const getters = {
    IS_ACTIVE : state => {
        return state.is_active
    },
    TITLE : state => {
        return state.title
    },
    PLAYER : state => {
        return state.player
    }
}

const actions = {
    OPEN : (context, payload) => {
        context.commit('SET_TITLE', payload.title)
        context.commit('SET_ACTIVE', true)
        context.dispatch('GET_PLAYER', payload)
    },
    CLOSE : (context) => {
        context.commit('SET_ACTIVE', false)
    },
    GET_PLAYER: async (context, payload) => {
        let _this = this
        context.commit('SET_LOADING', true)
          await axios.get("/api/players/" + payload.id)
          .then(
              data => {
                context.commit('SET_PLAYER', data.data)
                context.commit('SET_LOADING', false)
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
    SET_PLAYER : (state, payload) => {
        state.player = payload
    },
    SET_LOADING : (state, payload) => {
        state.loading = payload
    }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
