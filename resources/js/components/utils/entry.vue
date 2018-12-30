<template>
<div class="panel-block">
    <div class="field has-addons has-addons-right">
 
  <p class="control">
    <input 
    v-on:keyup.enter="add_team"
    class="input " 
    v-model="team" 
    type="text" 
    placeholder="Enter new team name"
    >
  </p>
  <p class="control ">
    <a @click="add_team()" class="button is-primary">
      <span class="icon"><i class="fa fa-plus"></i>+</span>
    </a>
  </p>
</div>
</div>
</template>
<script>
export default {
    data: function(){
        return {
            team:''
        }
    },
    methods: {
        add_team: function(){
            this.$store.dispatch('teams/ADD_TEAM', { name: this.team })
            this.team = ''
        }
    }
}
</script>
<style scoped>

</style>

