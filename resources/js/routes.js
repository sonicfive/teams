import store from './store';

export default [
    {
        path: '/',
        component: require('./components/utils/teams.vue'),
        beforeEnter: (to, from, next) => {
            store.dispatch('teams/GET_TEAMS')
            next()
        }
    },
    {
        path: '/players',
        component: require('./components/utils/players.vue'),
        beforeEnter: (to, from, next) => {
            store.dispatch('players/GET_PLAYERS')
            next()
        }
    }
]