<template>
    <div class="container bg-color center" >
        <div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100">
                <md-card class="pageLayout">
                    <md-card-content v-if="loadPage">
                        <div class="md-layout">
                            <div class="md-layout-item md-small-size-100"  >
                                <div class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>face</md-icon>
                                    <label  class="label-color">Search Lead In Contact</label>
                                    <md-autocomplete  v-model="searchValue"  :md-options="searchOptions" @select="fillLeadInputs" required/>
                                </div>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>face</md-icon>
                                    <label  class="label-color">First Name</label>
                                    <md-input  v-model="lead.first_name"  required/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>face</md-icon>
                                    <label  class="label-color">Last Name</label>
                                    <md-input v-model="lead.last_name" required/>
                                </md-field>


                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>email</md-icon>
                                    <label  class="label-color">Email</label>
                                    <md-input v-model="lead.email"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>phone</md-icon>
                                    <label  class="label-color">Phone Number</label>
                                    <md-input v-model="lead.phone_number" required/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>input</md-icon>
                                    <label  class="label-color">Other Owner's Info</label>
                                    <md-textarea v-model="lead.other_owner_info"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property Address</label>
                                    <md-input v-model="lead.property_address" required/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property City</label>
                                    <md-input v-model="lead.property_city" required/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property State</label>
                                    <md-input v-model="lead.property_state" required/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property Zip Code</label>
                                    <md-input v-model="lead.property_zip" required/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>read_more</md-icon>
                                    <label  class="label-color">Property Details Site (Zillow, RedFin Etc...)</label>
                                    <md-input v-model="lead.property_site_link"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>bubble_chart</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Lead Status</label> <br />
                                        <md-button class="md-raised" v-for="status in leadStatuses.status.data" :key="status.id">{{status.status_type}}</md-button>
                                    </div>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>text_snippet</md-icon>
                                    <label  class="label-color">Lead Status Notes</label>
                                    <md-input v-model="lead.lead_status_notes"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>connect_without_contact</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Contact Stage</label> <br />
                                        <md-button class="md-raised" v-for="stage in leadStatuses.stage.data" :key="stage.id"
                                                   @click="setId('stage', stage.id)">{{stage.stages_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Lead Temperature</label> <br />
                                        <md-button class="md-raised" v-for="temperature in leadStatuses.temperature.data" :key="temperature.id"
                                                   @click="setId('temperature', temperature.id)">{{temperature.temperature_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Follow Up In</label> <br />
                                        <md-button class="md-raised" v-for="followUp in leadStatuses.followUp.data" :key="followUp.id"
                                                   @click="setId('followUp', followUp.id)">{{followUp.lead_followup_type}}</md-button>
                                    </div>
                                </md-field>


                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Follow Up Date</label> <br />
                                        <div>
                                            <md-datepicker v-model="lead.follow_up_date">
                                                <label  class="label-color">Select date</label>
                                            </md-datepicker>
                                        </div>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Occupancy</label> <br />
                                        <md-button class="md-raised" v-for="occupancy in leadStatuses.occupancy.data" :key="occupancy.id"
                                                   @click="setId('occupancy', occupancy.id)">{{occupancy.occupancy_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>input</md-icon>
                                    <label  class="label-color">Occupancy Details Owner's Info</label>
                                    <md-textarea v-model="lead.other_owner_info"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>home_repair_service</md-icon>
                                    <label  class="label-color">Property Details (Repairs Done/ Needed)</label>
                                    <md-textarea v-model="lead.property_details"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>text_snippet</md-icon>
                                    <label  class="label-color">Selling Reason?</label>
                                    <md-input v-model="lead.reason_to_sell"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>local_atm</md-icon>
                                    <label  class="label-color">Mortgage Amount?</label>
                                    <md-input v-model="lead.mortgage_amount"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">HOA?</label>
                                    <md-input v-model="lead.HOA"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">Asking Price?</label>
                                    <md-input v-model="lead.asking_price"/>
                                </md-field>
                                <!--
                                                          <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                                              <md-icon>request_quote</md-icon>
                                                              <div>
                                                                  <label class="label-color bt-label">Offer Made</label> <br />
                                                                  <md-button class="md-raised" v-for="offerMade in leadStatuses.offerMade.data" :key="offerMade.id"
                                                                             @click="setId('offerMade', offerMade.id)">{{offerMade.offer_made_type}}</md-button>
                                                              </div>
                                                          </md-field>

                                                          <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                                              <md-icon>payments</md-icon>
                                                              <label  class="label-color">Offer Amount?</label>
                                                              <md-input v-model="offer_amount"/>
                                                              <validation-error :errors="apiValidationErrors.offer_amount"/>
                                                          </md-field>

                                                  <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                                              <md-icon>request_quote</md-icon>
                                                              <div>
                                                                  <label class="label-color bt-label">Offer Accepted</label>
                                                                  <br>
                                                                  <md-button class="md-raised" v-for="offerAccepted in leadStatuses.offerAccepted.data" :key="offerAccepted.id"
                                                                             @click="setId('offerAccepted', offerAccepted.id)">{{offerAccepted.offer_accepted_type}}</md-button>
                                                              </div>
                                                          </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">Accepted offer Amount?</label>
                                    <md-input v-model="accepted_offer"/>
                                    <validation-error :errors="apiValidationErrors.accepted_offer"/>
                                </md-field>
                                -->

                                <div class="button-container">
                                    <md-button class="md-success md-round mt-4" @click="addLead" slot="footer">
                                        Add Lead
                                    </md-button>
                                </div>


                            </div>
                        </div>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>



<script>


import { ValidationError} from "@/components";
import formMixin from "@/mixins/form-mixin";
import {
    StatsCard,
    ChartCard,
    NavTabsCard
} from "@/components";

import {mapGetters} from "vuex";

export default {
    name: "AddLead",

    components: {
        ValidationError,
        StatsCard,
        ChartCard,
        NavTabsCard
    },
    mixins: [formMixin],
    computed: {
        ...mapGetters({
            leadStatuses: 'leadStatuses'
        }),
    },

    data() {
        return {
            loadPage:false,
            searchOptions:[],
            contacts:[],
            searchValue:'',
            lead: {
                owner_id: "",
                first_name: "",
                last_name: "",
                email: "",
                phone_number: "",
                communication_type_id: "",
                other_owner_info: "",
                property_address: "",
                property_city: "",
                property_state: "",
                property_zip: "",
                property_site_link: "",
                lead_status_id: "",
                lead_status_notes: "",
                contact_stage_id: "",
                lead_temperature_id: "",
                follow_up_type_id: "",
                follow_up_date: "",
                occupancy_id: "",
                occupancy_details: "",
                property_details: "",
                reason_to_sell: "",
                mortgage_amount: "",
                HOA: "",
                asking_price: "",
                offer_made_id: "",
                offer_amount: "",
                offer_accepted_id: "",
                accepted_offer: "",
                lead_manager_id: "",
            }
        }
    },

    watch:{
        'lead.first_name': function (e) {

        },

        'lead.last_name': function (e) {
        },

        searchValue: function (e){
            this.$store.dispatch('search', {perPage: 10, query:e, type: 'owner'});
            console.log('rain')
            console.log(e)
            let id= e.substring(0,1)
            console.log(id)
            console.log(this.contacts)
        }

    },

    methods: {

        fillLeadInputs(){
        console.log('ready to fill')
        },

        async addLead() {
            console.log(this.lead)
            await this.$store.dispatch("createLead", this.lead);
        },

        async getStatuses() {
            await this.$store.dispatch("getLeadStatuses");
            this.loadPage= true;
        },

        setId(type, id){
            switch (type) {
                case 'leadStatus':
                    this.lead.lead_status_id = id;
                    break;
                case 'stage':
                    this.lead.contact_stage_id = id;
                    break;
                case 'temperature':
                    this.lead.lead_temperature_id = id;
                    break;
                case 'followUp':
                    this.lead.follow_up_type_id = id;
                    break;
                case 'occupancy':
                    this.lead.occupancy_id= id;
                    break;
                case 'offerMade':
                    this.lead.offer_made_id = id;
                    break;
                case 'offerAccepted':
                    this.lead.offer_accepted_id = id;
                    break;
            }
        }
    },

    created() {
        this.getStatuses();
    },

    mounted() {
        Echo.channel('search')
            .listen('.searchResults', (e) => {
               let array = []
                let original= []
                e.campaignContact.data.forEach(function (contact){
                    array.push(contact.id + '. ' + contact.first_name + ' ' + contact.last_name)
                    array.push(contact.id + '. ' + contact.first_name + ' ' + contact.last_name)
                }.bind(this))

                this.contacts = array;
                this.searchOptions = array;
            })
    }
}
</script>

<style scoped>
.pageLayout{
    background-color: #3b3b3b!important;
    color: #3AB3AB!important;
    font-weight: bolder!important;
}

.pageLayout input{
    color: #fff !important;
}

.bg-color{
    background-color: #fff !important;
}
.center {
    margin: auto;
    width: 50%;
    /* border: 3px solid #00bcd4; */
    padding: 10px;
}
.label-color{
    color: white !important;
}

.md-icon{
    color: #00b0ff !important;
}

.bt-label{
    margin-left: 25px;
}
</style>
