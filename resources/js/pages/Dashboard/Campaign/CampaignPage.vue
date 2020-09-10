<template>

    <div class="md-layout">
        <div class="md-layout-item md-size-100">
            <md-card>
                <md-card-header class="md-card-header-icon md-card-header-green">
                    <div class="card-icon">
                        <md-icon>assignment</md-icon>
                    </div>
                    <h4 class="title">Campaign List</h4>
                </md-card-header>

                <md-card-content>
                    <div class="text-right">
                        <md-button class="md-primary md-dense" @click="addCampaign">
                            Add Campaign
                        </md-button>
                    </div>
                    <div class="md-layout">
                        <div class="md-layout-item md-size-20">
                            <md-table
                                :value="campaigns.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >

                                <md-table-row slot="md-table-row" slot-scope="{ item}">
                                    <md-table-cell md-label="Campaign" md-sort-by="name">{{item.name}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="getCampaignList(item)" style="margin: .2rem;">
                                            <md-icon>play_arrow</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </div>
                        <div class="md-layout-item md-size-75">
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

                                <md-table-row slot="md-table-row" slot-scope="{ item}">
                                    <md-table-cell md-label="First Name" md-sort-by="first_name">{{item.contact.first_name}}</md-table-cell>
                                    <md-table-cell md-label="Last Name" md-sort-by="last_name">{{item.contact.last_name}}</md-table-cell>
                                    <md-table-cell md-label="Updated Date" md-sort-by="created_at">{{item.updated}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onEdit(item)" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
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
    watcher:{
       campaigns: function (){
           console.log('updated')
       }
    },
    data: () => ({
        table: [],
        activeCampaign:'',
        footerTable: ["Name", "Email", "Created At", "Actions"],

        query: null,

        sortation: {
            field: "created_at",
            order: "asc"
        },

        pagination: {
            total: 1,
            perPage: 5,
            currentPage: 1,
            perPageOptions: [5, 10, 25, 50],
            to: 1,
            from: 1,
            last_page:1
        },

    }),

    computed: {
        ...mapGetters({
            campaignContacts: 'campaignContacts',
            campaigns:'campaigns'
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

        getCampaignList(data) {
            this.activeCampaign = data.name
            this.updateData();
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
            this.$store.dispatch('searchContactByCampaign', {perPage: this.pagination.perPage , query:this.activeCampaign, page:this.pagination.currentPage});
        },
        addCampaign(){
            this.$router.push({name:'Add Campaign'})
        }


    },

    async created() {

        await this.$store.dispatch("getAllCampaigns");
        await this.$store.dispatch('searchContactByOwner', {perPage: this.pagination.perPage, query:'', page:this.pagination.currentPage});
        window.Echo.channel('search')
            .listen('.searchResults', (e) => {
                console.log('results listening' + e)
                this.$store.commit('SET_CAMPAIGN_CONTACTS', e.campaignContacts)
            })

    },
}

</script>
