<template>
    <div>
        Master Contacts
        <wizard v-on:saveFileMapping="saveFileMapping"></wizard>
    </div>
</template>

<script>
    import Wizard from '../../../components/FileUploadMapper'

    export default {
        name: "Contacts",
        components: {
            Wizard,
        },
        data() {
            return {
            };
        },

        methods: {
            saveFileMapping(data){
                console.log(data)
                this.$store.dispatch('postCampaign', data)
                    .then(() => this.$router.push('/dashboard'))
                    .catch(err => console.log(err))
            }
        }
    }
</script>

<style scoped>

</style>
