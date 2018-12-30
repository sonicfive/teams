import axios from "axios";

const state = {
  teams : []
}

const getters = {
  ALL : state => {
    return _.orderBy(state.teams, ['name'], ['asc'])
  }
}

const actions = {
  GET_TEAMS : async (context) => {
    let {data} = await axios.get ("/api/teams")
    context.commit('SET_TEAMS', data.data )
  },
  ADD_TEAM : async (context, payload) => {

    await axios.post("/api/teams/create", payload)
    .then( data => {
        context.dispatch(
            'toast/OPEN', 
            {message: "Added a new team"}, 
            {root:true})
        context.dispatch('GET_TEAMS')
    })
  },
  UPDATE_TEAM: async (context, payload) => {
    
    await axios.post("/api/teams/update", payload)
    .then(
        data => {
        context.dispatch('toast/OPEN',{message: "Updated team successfuly"},{ root:true })
        context.dispatch('GET_TEAMS')
        }
    )
  },
  DELETE_TEAM: async (context, payload) => {
      await axios.post("/api/teams/delete", payload)
      .then(
          data => {
              context.dispatch('toast/OPEN',{message: "Deleted \"" + payload.name + "\" team successfuly"},{ root:true })
              context.dispatch('GET_TEAMS')
          }
      )
  }
}

const mutations = {
  SET_TEAMS : (state, payload) => {
    state.teams = payload
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
