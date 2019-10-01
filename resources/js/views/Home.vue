<template>
    <div class="player-search">
        <div>
            <h1>
                Party Player
            </h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga distinctio cum ratione corporis, quasi nostrum recusandae sed eaque laborum a culpa quisquam quos esse consequatur suscipit iusto veritatis facere officiis?
            </p>
        </div>
        <b-input-group>
            <b-form-input v-model="key" placeholder="Enter playlist key" size="lg"></b-form-input>
            <b-button href="#" size="lg" @click="searchForPlaylist"><i class="fa fa-play"></i></b-button>
        </b-input-group>
    </div>
</template>
<script>
import Swal from 'sweetalert2'
import { mapActions } from 'vuex'

export default {
    data(){
        return {
            key: '',
            loading: false,
        }
    },
    methods: {
        searchForPlaylist(){
            this.loading = true
            this.search(this.key).then(response => {
                // redirect to playlist page
                this.$router.push({name: 'playlist', params: {key: this.key}})
                
                this.loadinig = false
            })
        },
        ...mapActions('playlist', [
            'search'
        ])
    }
}
</script>
<style lang="css">
.player-search {
    margin-top: 100px;
    padding: 0px 100px;
}

@media screen and (max-width: 900px) {
    .player-search {
        padding: 10px;
    }
}
</style>