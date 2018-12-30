<template>
    <a class="panel-block">
    <span>{{player.first_name}}, {{player.last_name}}</span>
    &nbsp;
    <button @click="destroy()"  class="button is-small is-outline">delete</button>
    &nbsp;
    <button @click="edit()"  class="button is-small is-outline">edit</button>
  </a>
</template>
<script>
export default {
    props: ['player'],
    data: function(){
      return {
      }
    },
    methods:{
      'destroy': function(){
        this.editing = false
        this.$store.dispatch('players/DELETE_PLAYER', {id : this.player.id, name : this.full_name})
      },
      'edit': function(){
        this.$store.dispatch('player_modal/OPEN', {id : this.player.id, title : this.full_name})
      }
    },
    computed:{
        'full_name': function(){
            return this.player.first_name + ' ' + this.player.last_name
        }
    }
}
</script>
<style scoped>

</style>

