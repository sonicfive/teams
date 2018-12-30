<template>
   <nav class="panel">
  <p class="panel-heading">
    Teams
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input v-model="search_term" class="input is-small" type="text" placeholder="search by team name">
      <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>
  <entry></entry>
  <team v-for="item in filtered_teams" :team="item"  v-bind:key="item.id"></team>
</nav>
</template>
<script>
export default {
  data: function(){
    return {
      search_term: ''
    }
  },
  computed: {
    all_teams: function() {
      return this.$store.getters['teams/ALL']
    },
    filtered_teams: function(){
        let _this = this
        return _.filter(this.all_teams, function(c){
            let name = _.lowerCase(c.name)
            return name.includes(_.lowerCase(_this.search_term.trim()))
          })
    },
  },
  components:{
    'team': require('./team'),
    'entry': require('./entry')
  }
};
</script>

<style scoped>
</style>
