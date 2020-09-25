<template>
    <div class="md-layout">

        <div class="md-layout-item md-size-50">
            <md-card>
                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-blue">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Campaign List</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add New Marketing Campaign Type</label>
                                                <md-input v-model='campaignName'></md-input>
                                                <md-button class="md-primary md-dense" @click="addCampaign">
                                                    Add Campaign
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="campaignTypes"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.name}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>

                    </md-card>
                </div>


                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-rose">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Lead Stage Types</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Lead Stage Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('stage')">
                                                    Add Stage Type
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.stage.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.stages_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>

                    </md-card>
                </div>


                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-green">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Lead Status Type</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Lead Status Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('leadStatus')">
                                                    Add Status Type
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.status.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.status_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>

                    </md-card>
                </div>

                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-primary">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Temperature Types</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Temperature Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('temperature')">
                                                    Add Campaign
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.temperature.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.temperature_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>

                    </md-card>
                </div>
            </md-card>
        </div>

        <div class="md-layout-item md-size-50">
            <md-card>
                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-danger">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Follow Up Types</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Follow Up Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('followUp')">
                                                    Add FollowUp Type
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.followUp.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >
                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.lead_followup_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>
                    </md-card>
                </div>


                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-warning">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Occupancy Types</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Occupancy Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('occupancy')">
                                                    Add Occupancy Type
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.occupancy.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >

                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.occupancy_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>

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

                    </md-card>
                </div>


                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Offer Made Types</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Offer Made Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('made')">
                                                    Add Offer Made type
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.offerMade.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >

                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.offer_made_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>
                    </md-card>
                </div>


                <div class="md-layout-item md-size-100">
                    <md-card>
                        <md-card-header class="md-card-header-icon md-card-header-green">
                            <div class="card-icon">
                                <md-icon>assignment</md-icon>
                            </div>
                            <h4 class="title">Offer Accepted Type</h4>
                        </md-card-header>
                        <md-card-content>
                            <div class="text-right">
                                <md-card-content>
                                    <div class="md-layout md-gutter">
                                        <div class="md-layout-item md-small-size-100 md-size-30">
                                            <md-field>
                                                <label>Add Offer Accepted Type</label>
                                                <md-input v-model='type'></md-input>
                                                <md-button class="md-primary md-dense" @click="addType('accepted')">
                                                    Add Campaign
                                                </md-button>
                                            </md-field>
                                        </div>
                                    </div>
                                </md-card-content>
                            </div>
                            <md-table
                                :value="leadStatuses.offerAccepted.data"
                                :md-sort.sync="sortation.field"
                                :md-sort-order.sync="sortation.order"
                                :md-sort-fn="customSort"
                                class="paginated-table table-striped table-hover"
                            >

                                <md-table-row slot="md-table-row" slot-scope="{ item }">
                                    <md-table-cell md-label="Name" md-sort-by="name">{{item.offer_accepted_type}}</md-table-cell>
                                    <md-table-cell md-label="Created At" md-sort-by="created_at">{{item.created_at}}</md-table-cell>
                                    <md-table-cell md-label="Actions">
                                        <md-button class="md-icon-button md-raised md-round md-info" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>edit</md-icon>
                                        </md-button>
                                        <md-button class="md-icon-button md-raised md-round md-danger" @click="onProFeature" style="margin: .2rem;">
                                            <md-icon>delete</md-icon>
                                        </md-button>
                                    </md-table-cell>
                                </md-table-row>
                            </md-table>
                        </md-card-content>
                    </md-card>
                </div>
            </md-card>
        </div>
    </div>
</template>

<script>

import Pagination from "@/components/Pagination";

import {mapGetters} from "vuex";

export default {

    components: {
        "pagination": Pagination
    },

    data: () => ({
        table: [],
        footerTable: ["Name", "Email", "Created At", "Actions"],
        footerTypeTable: ["Type","Created At", "Actions"],
        campaignName: '',
        type:'',
        query: null,

        sortation: {
            field: "created_at",
            order: "asc"
        },

        pagination: {
            perPage: 5,
            currentPage: 1,
            perPageOptions: [5, 10, 25, 50]
        },

        total: 1

    }),

    computed: {
        ...mapGetters({
            campaignTypes: 'campaignTypes',
            leadStatuses: 'leadStatuses'
        }),

        sort() {
            if (this.sortation.order === "desc") {
                return `-${this.sortation.field}`
            }

            return this.sortation.field;
        },

        from() {
            return this.pagination.perPage * (this.pagination.currentPage - 1);
        },

        to() {
            let highBound = this.from + this.pagination.perPage;
            if (this.total < highBound) {
                highBound = this.total;
            }
            return highBound;
        },

    },

    created() {
        this.getList()
    },

    methods: {

        async getList() {
            await this.$store.dispatch("getCampaignTypes")
            await this.$store.dispatch("getLeadStatuses")
            this.table = [{
                name: "Admin",
                email: "admin@material.com",
                created_at: "2020-01-01"
            }]
        },

        addCampaign(){
            this.$store.dispatch('postCampaignType', {'campaignType': this.campaignName})
                .then(() => this.$router.go())
                .catch(err => console.log(err))
        },

        onProFeature() {
            this.$store.dispatch("alerts/error", "This is a PRO feature.")
        },

        customSort() {
            return false
        },

        async addType(type){
            switch (type) {
                case 'leadStatus':
                    await this.$store.dispatch('status', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'stage':
                    await this.$store.dispatch('stage', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'temperature':
                    await this.$store.dispatch('temperature', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'followUp':
                    await this.$store.dispatch('followUp', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'occupancy':
                    await this.$store.dispatch('occupancy', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'made':
                    await this.$store.dispatch('offerMade', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
                case 'accepted':
                    await this.$store.dispatch('offerAccepted', {'type': this.type})
                        .then(() => this.$router.go())
                        .catch(err => console.log(err))
                    break;
            }


        }

    }

}

</script>
