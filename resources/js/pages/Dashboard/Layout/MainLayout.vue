<template>
    <div>
        <div>Header</div>
        <router-view></router-view>
        <content-footer></content-footer>
    </div>
</template>



<script>

import ContentFooter from "./ContentFooter";
export default {
    props: {
        backgroundColor: {
            type: String,
            default: "black"
        }
    },
    inject: {
        autoClose: {
            default: true
        }
    },

    components: {
        ContentFooter
    },

    data() {
        return {

        };
    },
    computed: {},
    methods: {},
    mounted() {
    }
}
</script>
