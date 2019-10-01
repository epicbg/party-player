<template>
    <div class="playlist">


        <div class="youtube-results-wrapper container">
            <div style="text-align:center; width:100%"><i class="fa fa-spinner fa-spin fa-2x"></i></div>
            <youtube-search-result v-for="(song, i) in songs" :key="i" :value="JSON.parse(song.data)" @click.native="play(JSON.parse(song.data))" :inplay="song.inplay == '1'"></youtube-search-result>
        </div>
        
        <!-- Modal -->
        <youtube-search-modal v-model="modal" @selected="saveSong"></youtube-search-modal>
        
        <media-player @toggleModal="modal = !modal"></media-player>
    </div>
</template>
<script>
import YoutubeSearchModal from './../components/YoutubeSearchModal'
import YoutubeSearchResult from './../components/YoutubeSearchResult'
import MediaPlayer from './../components/MediaPlayer'

import { mapActions, mapState, mapMutations } from 'vuex'

export default {
    data(){
        return {
            modal: false
        }
    },
    mounted(){
        Echo.channel(`playlist.${this.playlist.id}`).listen('AddSong', e => {this.map
            this.loading = false
            console.log(e.song)
            this.addSong(e.song)
        })
    },
    components:{ 
        YoutubeSearchModal, YoutubeSearchResult, MediaPlayer
    },
    methods: {
        saveSong(data){
            this.modal = false
            this.loading = true
            this.saveToPlaylist(data)
        },
        ...mapActions('playlist', [
            'saveToPlaylist', 'play'
        ]),
        ...mapMutations('playlist', [
            'addSong'
        ])
    },
    computed:{
        ...mapState('playlist', [
            'playlist', 'key', 'songs'
        ])
    }
}
</script>