<template>
    <div class="md-layout main-containter">
        <!---left -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-40">
            <md-card class="md-primary" md-theme="black-card">
                <md-card-header>
                    <stats-card header-color="rose">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>account_box</md-icon>
                            </div>
                            <h3 class="title">
                                Seller Info
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>
                <md-card-content>
                    <md-field>
                        <label>First Name</label>
                        <md-input v-model="activeContact.contact.first_name" readonly></md-input>
                    </md-field>

                    <md-field>
                        <label>Last Name</label>
                        <md-input v-model="activeContact.contact.last_name" readonly></md-input>
                    </md-field>

                    <md-field>
                        <label>Mailing Address</label>
                        <md-input v-model="activeContact.mailing.street"></md-input>
                        <span class="md-helper-text">Helper text</span>
                    </md-field>

                    <md-field>
                        <label>Mailing City</label>
                        <md-input v-model="activeContact.mailing.city"></md-input>
                    </md-field>

                    <md-field md-inline>
                        <label>Mailing State</label>
                        <md-input v-model="activeContact.mailing.state"></md-input>
                    </md-field>

                    <md-field>
                        <label>Mailing Zip</label>
                        <md-input v-model="activeContact.mailing.zip" type="number"></md-input>
                    </md-field>

                </md-card-content>
            </md-card>

            <md-card class="md-primary" md-theme="black-card">
                <md-card-header>
                    <stats-card header-color="rose">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>account_box</md-icon>
                            </div>
                            <h3 class="title">
                                Contact Numbers
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>
                <md-card-content v-for="phones in activeContact.phones"  :key="phones.id">
                    <md-field v-for="(index, key) in phones" :key="index.phone + key">
                        <label>Phone {{key +1}}</label>
                        <md-input :value="index.phone" readonly></md-input>
                        {{index.phone_type}}
                    </md-field>
                </md-card-content>
            </md-card>

            <!-- PROPERTY DETAILS CARD -->
            <md-card class="md-primary" md-theme="black-card" v-model="activeContact.addresses">
                <md-card-header>
                    <stats-card header-color="rose">
                        <template slot="header">
                            <div class="card-icon">
                                <md-icon>home</md-icon>
                            </div>
                            <h3 class="title">
                                Property Info
                            </h3>
                        </template>

                    </stats-card>
                </md-card-header>



                <md-card v-for="properties in activeContact.addresses" :key="properties.id">
                    <md-card-header class="md-card-header-text md-card-header-warning">
                        <div class="card-text">
                            <p class="category">
                                <md-button class="md-raised md-success">{{ properties[0]['full_address'] }}</md-button>

                                 <a :href="getZlink(properties[0]['full_address'])" target="_blank">View On Zillow</a>
                            </p>
                        </div>
                    </md-card-header>
                <md-card-expand>
                    <md-card-actions>
                        <md-card-expand-trigger>
                            <md-button class="md-icon-button">
                                <md-icon>keyboard_arrow_down</md-icon>
                            </md-button>
                        </md-card-expand-trigger>

                       <md-card-expand-content>
                            <md-table table-header-color="orange" >
                                <span v-for="property in properties" :key="property.id">

                          <md-table-row slot="md-table-row">
                                <md-table-cell md-label="Name">{{property.details[0]['details'] }}</md-table-cell>
                                <md-button class="md-just-icon md-simple md-primary">
                                    <md-icon>edit</md-icon>
                                    <md-tooltip md-direction="top">Edit</md-tooltip>
                                </md-button>
                                <md-button class="md-just-icon md-simple md-danger">
                                    <md-icon>close</md-icon>
                                    <md-tooltip md-direction="top">Close</md-tooltip>
                                </md-button>
                            </md-table-row>



                           <md-table-row slot="md-table-row">
                                <md-table-cell md-label="Name" v-for="owner in property.owners" :key="owner.id">{{owner.first_name}} {{owner.last_name}}</md-table-cell>
                                <md-button class="md-just-icon md-simple md-primary">
                                    <md-icon>edit</md-icon>
                                    <md-tooltip md-direction="top">Edit</md-tooltip>
                                </md-button>
                                <md-button class="md-just-icon md-simple md-danger">
                                    <md-icon>close</md-icon>
                                    <md-tooltip md-direction="top">Close</md-tooltip>
                                </md-button>
                            </md-table-row>
                            </span>
                        </md-table>
                    </md-card-expand-content>

                </md-card-actions>

                </md-card-expand>
                </md-card>
            </md-card>

            <md-card class="md-primary" md-theme="black-card">
                <md-card-area>
                    map goes here
                </md-card-area>
            </md-card>
        </div>
        <!---middle -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
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

        <!---right -->
        <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
            <md-card class="md-primary" md-theme="black-card">
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
            </md-card>
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
        })
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

        }
    },
    methods:{
        getZlink(property){
            return "https://www.zillow.com/homes/" +property+'-_rb/'
        },

        selectProperty(){
            console.log('test')
        },

        onTabChange(tabIndex) {
       this.infoTab=tabIndex
        },

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
</style>
