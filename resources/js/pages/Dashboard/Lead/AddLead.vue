<template>
    <div class="container bg-color center" >
        <div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100">
                <md-card class="pageLayout">
                    <!--      <md-card-header class="md-card-header-text md-card-header-warning">
                              <div class="card-text">
                                  <h4 class="title">Add New Lead</h4>
                              </div>
                          </md-card-header>-->
                    <md-card-content>
                        <div class="md-layout">
                            <div class="md-layout-item md-small-size-100"  >
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>face</md-icon>
                                    <label  class="label-color">First Name</label>
                                    <md-input v-model="first_name"/>
                                    <validation-error :errors="apiValidationErrors.first_name"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>face</md-icon>
                                    <label  class="label-color">Last Name</label>
                                    <md-input v-model="last_name"/>
                                    <validation-error :errors="apiValidationErrors.last_name"/>
                                </md-field>


                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>email</md-icon>
                                    <label  class="label-color">Email</label>
                                    <md-input v-model="email"/>
                                    <validation-error :errors="apiValidationErrors.email"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>phone</md-icon>
                                    <label  class="label-color">Phone Number</label>
                                    <md-input v-model="phone_number"/>
                                    <validation-error :errors="apiValidationErrors.phone_number"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>input</md-icon>
                                    <label  class="label-color">Other Owner's Info</label>
                                    <md-textarea v-model="other_owner_info"/>
                                    <validation-error :errors="apiValidationErrors.other_owner_info"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property Address</label>
                                    <md-input v-model="property_address"/>
                                    <validation-error :errors="apiValidationErrors.property_address"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property City</label>
                                    <md-input v-model="property_city"/>
                                    <validation-error :errors="apiValidationErrors.property_city"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property State</label>
                                    <md-input v-model="property_state"/>
                                    <validation-error :errors="apiValidationErrors.property_state"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>location_on</md-icon>
                                    <label  class="label-color">Property Zip Code</label>
                                    <md-input v-model="property_zip"/>
                                    <validation-error :errors="apiValidationErrors.property_zip"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>read_more</md-icon>
                                    <label  class="label-color">Property Details Site (Zillow, RedFin Etc...)</label>
                                    <md-input v-model="property_site_link"/>
                                    <validation-error :errors="apiValidationErrors.property_site_link"/>
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
                                    <md-input v-model="lead_status_notes"/>
                                    <validation-error :errors="apiValidationErrors.lead_status_notes"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>connect_without_contact</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Contact Stage</label> <br />
                                        <md-button class="md-raised" v-for="stage in leadStatuses.stage.data" :key="stage.id">{{stage.stages_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Lead Temperature</label> <br />
                                        <md-button class="md-raised" v-for="temperature in leadStatuses.temperature.data" :key="temperature.id">{{temperature.temperature_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Follow Up In</label> <br />
                                        <md-button class="md-raised" v-for="followUp in leadStatuses.followUp.data" :key="followUp.id">{{followUp.lead_followup_type}}</md-button>
                                    </div>
                                </md-field>


                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Follow Up Date</label> <br />
                                        <div>
                                            <md-datepicker v-model="follow_up_date">
                                                <label  class="label-color">Select date</label>
                                            </md-datepicker>
                                        </div>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>weather</md-icon>
                                    <div>
                                        <label  class="label-color bt-label">Occupancy</label> <br />
                                        <md-button class="md-raised" v-for="occupancy in leadStatuses.occupancy.data" :key="occupancy.id">{{occupancy.occupancy_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>input</md-icon>
                                    <label  class="label-color">Occupancy Details Owner's Info</label>
                                    <md-textarea v-model="other_owner_info"/>
                                    <validation-error :errors="apiValidationErrors.other_owner_info"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>home_repair_service</md-icon>
                                    <label  class="label-color">Property Details (Repairs Done/ Needed)</label>
                                    <md-textarea v-model="property_details"/>
                                    <validation-error :errors="apiValidationErrors.property_details"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>text_snippet</md-icon>
                                    <label  class="label-color">Selling Reason?</label>
                                    <md-input v-model="reason_to_sell"/>
                                    <validation-error :errors="apiValidationErrors.reason_to_sell"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>local_atm</md-icon>
                                    <label  class="label-color">Mortgage Amount?</label>
                                    <md-input v-model="mortgage_amount"/>
                                    <validation-error :errors="apiValidationErrors.mortgage_amount"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">HOA?</label>
                                    <md-input v-model="HOA"/>
                                    <validation-error :errors="apiValidationErrors.HOA"/>
                                </md-field>
                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">Asking Price?</label>
                                    <md-input v-model="asking_price"/>
                                    <validation-error :errors="apiValidationErrors.asking_price"/>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>request_quote</md-icon>
                                    <div>
                                        <label class="label-color bt-label">Offer Made</label> <br />
                                        <md-button class="md-raised" v-for="offerMade in leadStatuses.offerMade.data" :key="offerMade.id">{{offerMade.offer_made_type}}</md-button>
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
                                        <md-button class="md-raised" v-for="offerAccepted in leadStatuses.offerAccepted.data" :key="offerAccepted.id">{{offerAccepted.offer_accepted_type}}</md-button>
                                    </div>
                                </md-field>

                                <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                                    <md-icon>payments</md-icon>
                                    <label  class="label-color">Accepted offer Amount?</label>
                                    <md-input v-model="accepted_offer"/>
                                    <validation-error :errors="apiValidationErrors.accepted_offer"/>
                                </md-field>
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

        data() {
            return {
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
        },

        methods: {
            async addLead() {


            },

            async getStatuses() {
                await this.$store.dispatch("getLeadStatuses")
            }
        },

        created() {
            this.getStatuses();
        }
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
