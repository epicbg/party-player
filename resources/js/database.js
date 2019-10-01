import Axios from "axios";

export default {
    con: Axios,

    routes: {
        playlistSearch: '/playlist/search',
        play: '/playlist/song/play',
        pause: '/playlist/song/pause',
        addSong: '/playlist/song/add'
    }
}