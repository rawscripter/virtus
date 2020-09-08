<template>
    <div>
        <div class="table-responsive-sm">

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                                <router-link to="/dashboard/campaigns/add">Upload New Campaign</router-link>
                            </h5>
                            <div class="panel panel-primary filterable">
                                <div class="panel-heading">
                                    <b-col lg="6" class="my-1">
                                        <b-form-group
                                            label="Filter"
                                            label-cols-sm="3"
                                            label-size="sm"
                                            label-for="filterInput"
                                            class="mb-0"
                                        >
                                            <b-input-group size="sm">
                                                <b-form-input
                                                    v-model="filter"
                                                    type="search"
                                                    id="filterInput"
                                                    placeholder="Type to Search"
                                                ></b-form-input>
                                                <b-input-group-append>
                                                    <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                                                </b-input-group-append>
                                            </b-input-group>
                                        </b-form-group>
                                    </b-col>
                                    <b-table
                                        show-empty
                                        small
                                        stacked="md"
                                        :items=campaignContacts.data
                                        :fields="fields"
                                        :filter="filter"
                                        :filterIncludedFields="filterOn"
                                        @filtered="onFiltered"
                                        @row-dblclicked="(item) =>openContact(item)"
                                    >
                                    </b-table>
                                    <b-pagination
                                        v-if="campaignContacts"
                                        v-model=campaignContacts.meta.current_page
                                        :total-rows=campaignContacts.meta.total
                                        :per-page=campaignContacts.meta.per_page
                                        align="fill"
                                        size="sm"
                                        class="my-0"
                                        @change="returnData"
                                    ></b-pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
//let _ = require('lodash');
import {mapGetters} from 'vuex'
export default {
    name: "Campaigns",
    data() {
        return {
            filter: '',
            filterOn: [],
            fields:[
                {
                    key: 'id',
                    sortable: true
                },
                {
                    key: 'full_name',
                    sortable: true
                },
                {
                    key: 'property_address',
                    sortable: true
                },
                {
                    key: 'property_city',
                    sortable: true
                },
                {
                    key: 'property_state',
                    sortable: true
                },
                {
                    key: 'property_zip',
                    sortable: true
                },
                {
                    key: 'phone1',
                    sortable: true
                },
                {
                    key: 'phone2',
                    sortable: true
                },
                {
                    key: 'phone3',
                    sortable: true
                },
                {
                    key: 'phone4',
                    sortable: true
                },
            ]
        }
    },
    computed: {
        ...mapGetters({
            campaignContacts: 'campaignContacts',
            campaignContact: 'campaignContact'
        }),
    },
    watch: {
        campaignContact(contact){
            this.$router.push({ name: 'CampaignContact', params: { userId: contact.data.id}})
        },
        campaign: function (campaign) {
            console.log(campaign)
            this.$router.push({name:'campaign'})
        },

        filter:function (query){
            window._.debounce(this.searchContacts(query), 100)
        },

    },
    methods:{
        openCampaign(id){
            this.$store.dispatch('getCampaign', id );
        },
        returnData(page){
            //this.$store.dispatch('getCampaigns', page );
        },
        openContact(contact) {
            this.$store.dispatch('getCampaignContact', contact.id)
        },
        deleteCampaign(){

        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1

        },
        searchContacts(query){
            this.$store.dispatch("searchContact", query)
        }
    },

    mounted() {
        this.$store.dispatch('searchContact', 'a');
        this.$store.dispatch("getCampaignTypes")
        window.Echo.channel('search')
            .listen('.searchResults', (e) => {
                console.log('results listening' + e)
                this.$store.commit('SET_CAMPAIGN_CONTACTS', e.campaignContacts)
            })

    }
}
</script>

<style>

</style>
