<template>
    <div v-if="user" class="md-layout md-gutter">
        <div class="md-layout-item md-size-66 md-small-size-100">
            <div class="md-layout-item md-size-100">
                <user-edit-card :user="user"/>
            </div>
            <div class="md-layout-item md-size-100">
                <user-password-card :user="user"/>
            </div>
        </div>
        <div class="md-layout-item md-size-33 md-small-size-100">
            <user-profile-card :user="user"/>
        </div>
    </div>
</template>

<script>
import UserEditCard from "@/pages/Dashboard/Profile/UserProfile/EditProfileCard.vue";
import UserPasswordCard from "@/pages/Dashboard/Profile/UserProfile/EditPasswordCard.vue";
import UserProfileCard from "@/pages/Dashboard/Profile/UserProfile/UserProfileCard.vue";

import {mapGetters} from 'vuex'

export default {
    name: "user-profile",

    components: {
        "user-profile-card": UserProfileCard,
        "user-edit-card": UserEditCard,
        "user-password-card": UserPasswordCard
    },


    computed: {
        ...mapGetters({
            user: 'user',
        }),
    },

    watch:{
        user: function (e) {
            console.log(e)
        }
    },

    created() {
        this.getProfile();
    },

    methods: {
        getProfile() {
            this.$store.dispatch("getUser", this.$store.getters['AUTH_ID'] )
        }
    }
}
</script>
