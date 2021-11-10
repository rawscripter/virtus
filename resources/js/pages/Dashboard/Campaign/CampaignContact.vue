<template>
    <div class="md-layout main-containter">
        <!---left -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-40">
            <div class="row gutters-sm">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ activeContact.contact.full_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mailing Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <span>
                                  {{activeContact.mailing.street}}, {{activeContact.mailing.city}}  {{activeContact.mailing.state}},  {{activeContact.mailing.zip}}
                                </span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    fip@jukmuh.al
                                </div>
                            </div>
                            <hr>
                            <div class="row" v-for="(phones, count) in activeContact.phones[0]"  :key="phones.id">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{phones.phone_type}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{formatPhoneNumber(phones.phone) }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm mb">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-4"><i class="material-icons text-info mr-3">map</i>Property Addresses</h6>
                                    <div v-for="properties in activeContact.addresses" :key="properties.id">
                                        <small>{{ properties[0].full_address }}</small>
                                        <small class="mb-4" style="height: 30px">
                                            <a class="float-right" :href="getZlink(properties[0]['full_address'])" target="_blank">View On Zillow</a>
                                        </small>

                                        <md-field :class="messageClass">
                                            <label>Property Details:</label>
                                            <md-textarea v-model="textarea" v-for="property in properties[0].details" :key="property.id" >{{ property.details}} </md-textarea>
                                            <span class="md-helper-text">Helper text</span>
                                            <span class="md-error">There is an error</span>
                                        </md-field>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-md-4 mb-3">
                    <div class="card mt-3">
                        <md-card class="md-primary" md-theme="black-card">
                            <md-card-header>
                                <stats-card header-color="green">
                                    <template slot="header">
                                        <div class="card-icon">
                                            <md-icon>rule</md-icon>
                                        </div>
                                        <h3 class="title">
                                            Lead Status
                                        </h3>
                                    </template>

                                </stats-card>
                            </md-card-header>
                            <md-card-content>
                                <md-field v-for=" item in leadStatus" :key="item.status">
                                    <md-checkbox :value="item.status" v-model="setStatus">{{ item.status }}</md-checkbox>
                                </md-field>
                            </md-card-content>
                        </md-card>
                    </div>
                </div>
            </div>
        </div>
        <!---middle -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
<!--            <md-card class="md-primary" md-theme="black-card">
                <md-card-header>
                    <stats-card header-color="green">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>rule</md-icon>
                            </div>
                            <h3 class="title">
                                Lead Status
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>
                <md-card-content>
                    <md-field v-for=" item in leadStatus" :key="item.status">
                        <md-checkbox :value="item.status" v-model="setStatus">{{ item.status }}</md-checkbox>
                    </md-field>
                </md-card-content>
            </md-card>-->
        </div>

        <!---right -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
<!--            <md-card class="md-primary" md-theme="black-card">
                <md-card-header>
                    <stats-card header-color="blue">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>question_answer</md-icon>
                            </div>
                            <h3 class="title">
                                Communications
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>
                <md-card-content>
                    <md-field>
                        <label>label</label>
                        <md-input value="index.phone" readonly></md-input>
                    </md-field>
                </md-card-content>
            </md-card>

            <md-card class="md-primary" md-theme="black-card">
                <md-card-header>
                    <stats-card header-color="blue">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>receipt</md-icon>
                            </div>
                            <h3 class="title">
                                Communication History
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>
                <md-card-area>
                    {{activeContact.property}}
                </md-card-area>
            </md-card>


            <md-card>
                <md-card-header class="md-card-header-text md-card-header-warning">
                    <div class="card-text">
                        <h4 class="title">Active Campaigns</h4>
                        <p class="category">
                            {{ activeContact.contact.full_name }} is in {{activeContact.campaigns.length}} campaigns
                        </p>
                    </div>
                </md-card-header>
                <md-card-content>
                    <md-table v-model="activeContact.campaigns" table-header-color="orange">
                        <md-table-row slot="md-table-row" slot-scope="{ item }">
                            <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
                            <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
                        </md-table-row>
                    </md-table>
                </md-card-content>
            </md-card>-->
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import {
    StatsCard,
    ChartCard,
    NavTabsCard
} from "@/components";


export default {
    name: "CampaignContact",

    components:{
        StatsCard,
        NavTabsCard
    },
    computed:{
        ...mapGetters({
            activeContact: 'activeContact'
        }),
        messageClass() {
            return {
                'md-invalid': this.hasMessages
            }
        }
    },
    data(){
        return {
            infoTab:1,
            leadStatus:[
                {status:'Active'},
                {status:'Dead'},
                {status: 'DNC'},
                {status:'Follow Up'},
                {status: 'New Untouched'},
                {status:'Realtor Needed'},
                {status:'Sold'},
                {status:'Not Selling'}
            ],

            setStatus: ['New Untouched'],
            getActiveTab:1,
            setActiveTab:1,
            pillsActive: 0,
            selectedProperty:true,
            noError: null,
            required: null,
            textarea: null,
            hasMessages: false

        }
    },

    methods:{
        getZlink(property){
            return "https://www.zillow.com/homes/" +property+'_rb/'
        },

        selectProperty(){
            console.log('test')
        },

        onTabChange(tabIndex) {
            this.infoTab=tabIndex
        },

        formatPhoneNumber(phoneNumberString) {
            let cleaned = ('' + phoneNumberString).replace(/\D/g, '');
            let match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
            if (match) {
                return '(' + match[1] + ') ' + match[2] + '-' + match[3];
            }
            return null;
        }
    },

    created() {
        // this.$store.dispatch('getCallRailText', 1);

    }
}
</script>

<style scoped>
.card-bg{
    background-color: #fff;
}

.card-margin{
    margin: 5px !important;
}

.md-card-expand-content{
    width: 100%;
}

</style>
