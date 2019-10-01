<template>
    <div class="player">
        <div class="title" v-if="inplay">
            {{inplay.snippet.title}}
        </div>
        <div class="actions">
            <i class="fa fa-step-backward"></i>
            <i class="fa fa-play"></i>
            <i class="fa fa-step-forward"></i>
            <i class="fa fa-plus" @click="$emit('toggleModal')"></i>
        </div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
export default {
    computed: {
        ...mapGetters('playlist', [
            'inplay'
        ])
    }
}
</script>