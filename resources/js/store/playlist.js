import vue from 'vue'
import database from "./../database";

export default {
    namespaced: true,
    
    state: {
        playlist: null,
        key: '',
        songs: []
    },
    mutations: {
        setInplaySong(state, song){
            let song_index = state.songs.indexOf(song)
            vue.set(state.songs[song_index], 'inplay', 1)
        },
        setPlaylist(state, playlist){
            state.songs = playlist.songs
            playlist.songs = []
            state.playlist = playlist
            state.key = playlist.key
        },
        addSong(state, payload){
            state.songs.push(payload)
        }
    },
    actions: {
        saveToPlaylist({commit, state}, song){
            return database.con.post(database.routes.addSong, {song, key: state.key})
        },
        search({state, commit}, key){
            return database.con.post(database.routes.playlistSearch, {
                key: key
            }).then(response => {
                commit('setPlaylist', response.data.playlist)
                return response.data
            })
        },
        play({commit, state}, song){
            state.songs.map(song => {
                if(song.inplay == '1'){
                    vue.set(song, 'inplay', '0')
                }
            })
            commit('setInplaySong', song)
            // TODO MAKE REQUEST TO DATABASE
            database.con.post(database.routes.play, song)
        }
    },
    getters: {
        inplay(state){
            let inplay_song = state.songs.filter(song => song.inplay == 1)
            if(inplay_song.length > 0)
                return inplay_song[0]
            return null
        }
    },
}