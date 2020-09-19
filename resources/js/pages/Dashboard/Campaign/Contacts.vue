<template>

    <div class="md-layout">
        <div class="md-layout-item md-size-100">
            <md-card>
                <md-card-header class="md-card-header-icon md-card-header-green">
                    <div class="card-icon">
                        <md-icon>assignment</md-icon>
                    </div>
                    <h4 class="title">Contacts</h4>
                </md-card-header>

                <md-card-content>
                    <div class="md-layout">
                        <div class="md-layout-item md-size-100">
                            <div v-if="table.length>0">
                            <md-table
                                :value="table"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-toolbar>

                                    <md-field>
                                        <label>Per page</label>
                                        <md-select v-model="pagination.perPage" name="pages">
                                            <md-option
                                                v-for="item in pagination.perPageOptions"
                                                :key="item"
                                                :label="item"
                                                :value="item"
                                            >
                                                {{ item }}
                                            </md-option>
                                        </md-select>
                                    </md-field>

                                </md-table-toolbar>

                                <md-table-row slot="md-table-row" @click="onEdit(item)" slot-scope="{ item}">
                                    <md-table-cell md-label="ID"  md-sort-by="id">{{item.id}}</md-table-cell>
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.contact.first_name}} {{item.contact.last_name}}</md-table-cell>
                                    <md-table-cell md-label="Address" md-sort-by="address">{{item.addresses[0][0]["street"]}}</md-table-cell>
                                    <md-table-cell md-label="City" md-sort-by="address">{{item.addresses[0][0]["city"]}}</md-table-cell>
                                    <md-table-cell md-label="State" md-sort-by="address">{{item.addresses[0][0]["state"]}}</md-table-cell>
                                    <md-table-cell md-label="Zip Code" md-sort-by="address">{{item.addresses[0][0]["zip"]}}</md-table-cell>
                                    <md-table-cell md-label="Properties Own" md-sort-by="properties">{{item.addresses.length}}</md-table-cell>
                                    <md-table-cell md-label="Campaigns On" md-sort-by="campaigns">{{item.campaigns.length}}</md-table-cell>
                                    <md-table-cell md-label="Best Number" md-sort-by="phone_number #">{{item.phones[0][0]["phone"]}}</md-table-cell>
                                    <md-table-cell md-label="Available Numbers" md-sort-by="campaigns">{{item.phones.length}}</md-table-cell>
                                    <md-table-cell md-label="Updated Date" md-sort-by="created_at">{{item.updated}}</md-table-cell>
                                </md-table-row>
                            </md-table>
                                </div>
                            <div v-else>
                             <h3>
                                 <strong>{{activeCampaign}}  Has No Leads</strong>
                             </h3>
                            </div>
                        </div>
                    </div>
                    <div class="footer-table md-table">
                        <table>
                            <tfoot>
                            <tr>
                                <th v-for="item in footerTable" :key="item.name" class="md-table-head">
                                    <div class="md-table-head-container md-ripple md-disabled">
                                        <div class="md-table-head-label">
                                            {{ item }}
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </md-card-content>

                <md-card-actions md-alignment="space-between">
                    <div class="">
                        <p class="card-category">
                            Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }} entries
                        </p>
                    </div>
                    <pagination
                        class="pagination-no-border pagination-success"
                        v-model="pagination.currentPage"
                        :per-page="pagination.perPage"
                        :total="pagination.total"
                    />
                </md-card-actions>

            </md-card>
        </div>
    </div>

</template>

<script>

import Pagination from "@/components/Pagination";

import {mapGetters} from 'vuex'

export default {

    components: {
        "pagination": Pagination
    },
    data: () => ({
        table: [],
        activeCampaign:'',
        footerTable: ["id","Name", "Address", "Properties Own", "Campaigns On","Best Number", "Available Numbers", "Last Updated"],

        query: null,

        sortation: {
            field: "created_at",
            order: "asc"
        },

        pagination: {
            total: 1,
            perPage: 25,
            currentPage: 1,
            perPageOptions: [5, 10, 25, 50, 'All'],
            to: 1,
            from: 1,
            last_page:1
        },

    }),

    computed: {
        ...mapGetters({
            campaignContacts: 'campaignContacts',
        }),

        sort() {
            if (this.sortation.order === "desc") {
                return `-${this.sortation.field}`
            }

            return this.sortation.field;
        },

    },

    watch :{
        campaignContacts: function (e) {
            if (e.meta.currentPage == this.pagination.currentPage)
            {
                this.pagination.currentPage = e.meta.currentPage
            }
            this.pagination.total = e.meta.total
            this.pagination.to = e.meta.to
            this.pagination.from = e.meta.from
            this.getList(e.data)
        },

        'pagination.perPage':function () {
            this.updateData()
        },

        'pagination.currentPage': function (item) {
            this.updateData()
        },
    },

    methods: {

        getList(data) {
            let dataArr = []
            data.forEach(function (item){
                dataArr.push(item)
            });
            this.table = dataArr
        },

        onProFeature() {
            this.$store.dispatch("alerts/error", "Feature Not Implemented.")
        },

        customSort() {
            return false
        },
        async onEdit(contact){
            await this.$store.dispatch('setActiveContact', contact)
            await this.$router.push({name:'Campaign Contact'});
        },
        updateData() {
            this.$store.dispatch('searchContactByOwner', {perPage: this.pagination.perPage , query:this.activeCampaign, page:this.pagination.currentPage});
        },
    },

    async created() {
        await this.$store.dispatch('searchContactByOwner', {perPage: this.pagination.perPage, query:'', page:this.pagination.currentPage});
        window.Echo.channel('search')
            .listen('.searchResults', (e) => {
                console.log('results listening' + e)
                this.$store.commit('SET_CAMPAIGN_CONTACTS', e.campaignContacts)
            })

    },
}

</script>
