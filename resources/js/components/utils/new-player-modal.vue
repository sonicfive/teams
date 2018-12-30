<template>
  <div class="modal" :class="active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">New Player</p>
        <button class="delete" @click="close()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <loading v-if="loading"></loading>
        <div class="field">
          <label class="label">First name</label>
          <div class="control">
            <input class="input" v-model="first_name" v-validate="'required'" name="first_name" type="text" placeholder="Enter name">
          </div>
            <p v-if="errors.has('first_name')" class="help is-danger">{{ errors.first('first_name')}}</p>
        </div>
        <div class="field">
          <label class="label">Last name</label>
          <div class="control">
            <input class="input" v-model="last_name" v-validate="'required'" name="last_name" type="text" placeholder="Enter last name">
          </div>
          <p v-if="errors.has('last_name')" class="help is-danger">{{ errors.first('last_name')}}</p>
        </div>
        <div class="field">
          <label class="label">Games</label>
          <div class="control">
            <input class="input" v-model="games" v-validate="'required|integer'" name="games" type="text" placeholder="# Games">
          </div>
          <p v-if="errors.has('games')" class="help is-danger">{{ errors.first('games')}}</p>
        </div>
        <div class="field">
          <label class="label">Minutes per Game</label>
          <div class="control">
            <input class="input" v-model="minutes_per_game" v-validate="'required|integer'" name="minutes_per_game" type="text" placeholder="min. per game">
          </div>
          <p v-if="errors.has('minutes_per_game')" class="help is-danger">{{ errors.first('minutes_per_game')}}</p>
        </div>
        <div class="field">
          <label class="label">Points per Game</label>
          <div class="control">
            <input class="input" v-model="points_per_game" v-validate="'required|integer'" name="points_per_game" type="text" placeholder="# points per game">
          </div>
          <p v-if="errors.has('points_per_game')" class="help is-danger">{{ errors.first('points_per_game')}}</p>
        </div>
        <div class="field">
        <label class="label">Team</label>
        <div class="control">
          <div class="select">
            <select v-model="selected_team" v-validate="'required'" name="selected_team">
              <option v-for="option in teams" :value="option.id" >
                {{ option.name }}
              </option>
            </select>
          </div>
        </div>
        <p v-if="errors.has('selected_team')" class="help is-danger">{{ errors.first('selected_team')}}</p>
        </div>
      </section>
      
      <footer class="modal-card-foot">
        <button @click="save()" class="button is-success">Save</button>
        <button @click="close()" class="button">Close</button>
        
      </footer>
    </div>
  </div>
</template>

<script>
import store from '../../store';

export default {
    created: function() {
        this.$store.dispatch('teams/GET_TEAMS')
    },
    data: function() {
        return {
            first_name: '',
            last_name: '',
            selected_team: '',
            games: 0,
            minutes_per_game: 0,
            points_per_game: 0
        }
    },
    computed: {
        'active': function() {
            return {
                'is-active': this.$store.getters['new_player_modal/IS_ACTIVE']
            }
        },
        'loading': function() {
            return this.$store.getters['new_player_modal/loading']
        },
        'teams': function() {
            return this.$store.getters['teams/ALL']
        }
    },
    methods: {
        'close': function() {
            this.$store.dispatch('new_player_modal/CLOSE')
        },
        'save': function() {
            let _this = this
            this.$validator.validateAll()
                .then(result => {
                    if (result) {
                        let payload = {
                            first_name: _this.first_name,
                            last_name: _this.last_name,
                            team_id: _this.selected_team,
                            games: _this.games,
                            minutes_per_game: _this.minutes_per_game,
                            points_per_game: _this.points_per_game
                        }
                        console.log(payload)
                        store.dispatch('players/ADD_PLAYER', payload)
                        store.dispatch('new_player_modal/CLOSE')
                    }
                })
        }
    },
    components: {
        'loading': require('./loading.vue')
    }
}
</script>
<style>

</style>

