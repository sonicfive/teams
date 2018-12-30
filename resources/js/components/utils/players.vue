<template>
   <nav class="panel">
  <p class="panel-heading">
    Players
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input v-model="search_term" class="input is-small" type="text" placeholder="search by first name">
      <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>
  <div class="panel-block">
  <div class="control">
    <button @click="add()" class="button is-primary">New Player</button>
  </div>
  </div>

  <player v-for="item in filtered_players" :player="item"  v-bind:key="item.id"></player>
</nav>
</template>
<script>
export default {
  data: function(){
    return {
      search_term: ''
    }
  },
  mounted() {
    
  },
  computed: {
    all_players: function() {
      return this.$store.getters['players/ALL']
    },
    filtered_players: function(){
        let _this = this
        return _.filter(this.all_players, function(c){
            let name = _.lowerCase(c.first_name)
            return name.includes(_.lowerCase(_this.search_term.trim()))
          })
    },
  },
  methods:{
    'add': function(){
      this.$store.dispatch('new_player_modal/OPEN')
    }
  },
  components:{
    'player': require('./player'),
  }
};
</script>

<style scoped>
</style>
