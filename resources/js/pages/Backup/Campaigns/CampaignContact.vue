<template>
    <div>
        {{campaignContact.data}}
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "CampaignContact",


    computed: {
        ...mapGetters({
            campaignContact: 'campaignContact',
        }),
    }


}
</script>

<style scoped>

</style>
