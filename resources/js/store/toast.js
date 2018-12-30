
import { toast as superToast} from "bulma-toast";
const state = {
  open : false
}

const getters = {

}

const actions = {
    OPEN : (state, payload) => {
        superToast({
            message: payload.message,
            type: "is-success",
            dismissible: true,
            closeOnClick: true,
            duration: 3000,
            position: "top-center",
            animate: { in: 'fadeIn', out: 'fadeOut' }
          })
        // state.params = payload
      }
}

const mutations = {

}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
