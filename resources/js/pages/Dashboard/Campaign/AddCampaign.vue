<template>
    <div>
        <file-upload-mapper v-on:saveFileMapping="saveFileMapping"></file-upload-mapper>
    </div>
</template>

<script>
import FileUploadMapper from "@components/FileUploadMapper";
export default {
    name: "CampaignContact",
    components: {
        FileUploadMapper
    },

    methods:{
        saveFileMapping(data){
            this.$store.dispatch('postCampaign', data)
                .then(() => this.$router.push('/dashboard'))
                .catch(err => console.log(err))
        }


    },

    created() {
        this.$store.dispatch("getCampaignTypes")
    }
}
</script>

<style scoped>

</style>
