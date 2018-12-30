import axios from "axios";

const state = {
  players : []
}

const getters = {
  ALL : state => {
    return _.orderBy(state.players, ['first_name'], ['asc'])
  }
}

const actions = {
  GET_PLAYERS : async (context) => {
    let {data} = await axios.get("/api/players")
    context.commit('SET_PLAYERS', data.data )
  },

  ADD_PLAYER : async (context, payload) => {
    let _this = this

    await axios.post("/api/players/create", payload)
    .then( data => {
        context.dispatch(
            'toast/OPEN', 
            {message: "Added a new player"}, 
            {root:true})
        context.dispatch('GET_PLAYERS')
    })
  },

  UPDATE_PLAYER: async (context, payload) => {
    // console.log(payload)
    await axios.post("/api/players/update", payload)
    .then(
        data => {
        context.dispatch('toast/OPEN',{message: "Updated player successfuly"},{ root:true })
        context.dispatch('GET_PLAYERS')
        }
    )
  },

  DELETE_PLAYER: async (context, payload) => {
    let _this = this
      await axios.post("/api/players/delete", payload)
      .then(
          data => {
              context.dispatch('toast/OPEN', {message: "Deleted \"" + payload.name + "\" player successfuly" },{ root:true })
              context.dispatch('GET_PLAYERS')
          }
      )
  }

}

const mutations = {
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
