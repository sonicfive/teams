<template>
    <div class="tabs is-boxed">
        <ul>
            <li :class="current('/')"><router-link to="/">Teams</router-link></li>
            <li :class="current('/players')"><router-link to="/players">Players</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    methods:{
        'current': function( path ){
            return {
                'is-active': this.$route.path == path
            }
        }
    }
}
</script>

<style>
</style>

