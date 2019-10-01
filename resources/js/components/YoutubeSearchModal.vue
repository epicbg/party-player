<template>
<b-modal v-model="value" id="youtube-modal">

    <!-- Search field -->
    <b-form-input @input="searchYoutube" placeholder="Search youtube" size="lg"></b-form-input>

    <!-- Search results -->
    <div class="youtube-results-wrapper" style="min-height: 400px">
        <youtube-search-result v-for="(result, key) in results" :value="result" :key="key" @click.native="select(result)"> </youtube-search-result>
    </div>

    <!-- footer -->
    <template slot="modal-footer">
        <span></span>
        <!-- <div class="container">
            <div class="row">
                <div class="col col-xs-6 col-sm-6">
                    <b-button block variant="light">Cancel</b-button>
                </div>
                <div class="col col-xs-6 col-sm-6">
                    <b-button block variant="light">Append</b-button>
                </div>
                <div class="col col-xs-12 col-md-6">
                    <b-button block variant="danger">Play now</b-button>
                </div>
                <div class="col col-xs-12 col-md-6">
                    <b-button block variant="primary">Add as Next</b-button>
                </div>
            </div>
        </div> -->
    </template>
</b-modal>
</template>
<script>
import searchYoutube from 'youtube-api-v3-search';
import YoutubeSearchResult from './../components/YoutubeSearchResult'

export default {
    components: {
        YoutubeSearchResult
    },
    data(){
        return {
            results: [],
            loading: false
        }
    },
    methods: {
        async searchYoutube(query){
            this.loading = true
            let result = await searchYoutube('AIzaSyBZpeWSjjN9pSY7h9Clk5GWdvEXmROSlIg', {
                q: query,
                part:'snippet',
                type:'video'
            })
            this.results = result.items
            this.loading = false
        },
        select(result){
            this.$emit('selected', result)
        }
    },
    props: {
        value: {
            required: true,
            type: Boolean
        }
    }
}
</script>

<style lang="css">
#youtube-modal .modal-header {
    display: none;
}
</style>