<template>
<div class="youtube-result"> 
    <img :src="value.snippet.thumbnails.medium.url">
    <b :class="{inplay}">
        {{value.snippet.title}} <span v-if="inplay"><i class="fa fa-play"></i></span>
    </b>
</div>
</template>
<script>
export default {
    props: {
        value: {
            required: true,
        },
        inplay: {
            required: false,
            type: Boolean
        }
    }
}
</script>