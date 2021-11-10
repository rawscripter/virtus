<template>
    <div class="md-layout">
        <div class="md-layout-item md-size-100">
            <md-card>
                <md-card-header class="md-card-header-icon md-card-header-green">
                    <div class="card-icon">
                        <md-icon>assignment</md-icon>
                    </div>
                    <h4 class="title">Properties</h4>
                </md-card-header>

                <md-card-content>
                    <div class="md-layout">
                        <div class="md-layout-item md-size-100">
                            <div v-show="table.length>0">
                                <md-table
                                    :value="table"
                                    class="paginated-table table-striped table-hover"
                                >


                                    <md-table-row slot="md-table-row" @click="onEdit(item)" slot-scope="{item}">
                                        <md-table-cell md-label="ID"  md-sort-by="id">{{item[0]["id"]}}</md-table-cell>
                                        <md-table-cell md-label="Name" md-sort-by="name"> {{item[0]["owners"][0]["first_name"]}} {{item[0]["owners"][0]["last_name"]}}</md-table-cell>
                                        <md-table-cell md-label="Address" md-sort-by="name">{{item[0]["full_address"]}}</md-table-cell>
                                        <md-table-cell md-label="Name" md-sort-by="name">{{item[0]["market"][0]["market"]}}</md-table-cell>
                                    </md-table-row>
                                </md-table>
                            </div>
                        </div>
                    </div>
                </md-card-content>

            </md-card>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "Addresses",
    data: () => ({
        table: [],
    }),

    computed: {
        ...mapGetters({
            addresses: 'addresses',
        }),

    },


    watch :{
        addresses: function (e) {
            console.log(e);
            this.getList(e.data);
        },
    },

    methods: {
        getList(data) {
            let dataArr = []
            data.forEach(function (item) {
                dataArr.push(item)
            });
            this.table = dataArr
        },

        async onEdit(contact) {
            await this.$store.dispatch('setActiveContact', contact)
            await this.$router.push({name: 'Campaign Contact'});
        },
    },

    async created() {
        await this.$store.dispatch("getAllAddresses");
    },
}
</script>

<style scoped>

</style>
