<template>
    <a class="panel-block">
    <span @click="editing = true" v-if="!editing">{{team.name}}</span>
    <input 
    v-if="editing" 
    v-on:keyup.escape="editing=false" 
    v-on:keyup.enter="save" 
    v-model="team.name"
    class="input" 
    type="text"   
    placeholder="Enter a name for the team"/>

    &nbsp;
    <button @click="destroy()"  class="button is-small is-outline">delete</button>
    &nbsp;
    <button @click="editing = true"  class="button is-small is-outline">edit</button>
    &nbsp;
    <button v-if="team.players.length" @click="view_players()"  class="button is-small is-outline">view players</button>
  </a>
</template>
<script>
export default {
    props: ['team'],
    data: function(){
      return {
        editing: false
      }
    },
    methods:{
      'save': function(){
        this.editing = false
        this.$store.dispatch('teams/UPDATE_TEAM', this.team)
      },
      'destroy': function(){
        this.editing = false
        this.$store.dispatch('teams/DELETE_TEAM', {id : this.team.id, name : this.team.name})
      },
      'view_players': function(){
        this.editing = false
        this.$store.dispatch('team_modal/OPEN', {id : this.team.id, title : this.team.name})
      }
    },
}
</script>
<style scoped>
</style>

