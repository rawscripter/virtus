<template>
    <div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Add New Marketing Campaign Type</h6>
                <p class="card-text">
                    <input v-model='campaignName' type="text">
                </p>
                <button v-on:click="addCampaign" class="card-link">Submit</button>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Admin",
    data(){
        return {
            campaignName: ''
        }
    },

    methods:{
        addCampaign(){
            this.$store.dispatch('postCampaignType', {'campaignType': this.campaignName})
                .then(() => this.$router.push('/dashboard/admin'))
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
