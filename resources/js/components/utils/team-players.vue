<template>
    <nav class="panel">
      <table class="table is-fullwidth">
  <thead>
    <tr>
      <th><abbr title="Plry">Player</abbr></th>
      <th>Games</th>
      <th><abbr title="Min">MPG</abbr></th>
      <th><abbr title="PPG">PPG</abbr></th>
    </tr>
  </thead>
  <tbody>
  
  <tr v-for="player in players" v-bind:key="player.id">
    <td>{{ player.first_name }} {{ player.last_name }}</td>
    <td>{{ player.stats.games }}</td>
    <td>{{ player.stats.minutes_per_game }}</td>
    <td>{{ player.stats.points_per_game }}</td>
  </tr>
  </tbody>
      </table>
  
</nav>
</template>

<script>
export default {
    props: ['players']
}
</script>