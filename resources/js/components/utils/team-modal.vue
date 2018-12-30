<template>
  <div class="modal" :class="active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">"{{ title }}" Team Players</p>
        <button class="delete" @click="close()" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <team-players :players="team_players"></team-players>
      </section>
      <footer class="modal-card-foot">
        <button @click="close()" class="button">Close</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    data: function(){
      return {

      }
    },
    computed: {
      'active': function(){
        return {
          'is-active' : this.$store.getters['team_modal/IS_ACTIVE']
        }
      },
      'title': function(){
        return this.$store.getters['team_modal/TITLE']
      },
      'team_players': function(){
        return this.$store.getters['team_modal/PLAYERS'].data
      }

    },
    methods:{
      'close': function(){
        this.$store.dispatch('team_modal/CLOSE')
      }
    },
    components:{
      'team-players': require('./team-players.vue')
    }
}
</script>
<style>

</style>

