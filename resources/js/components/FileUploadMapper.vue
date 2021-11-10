<template>
    <div>
        <vue-good-wizard
            :steps="steps"
            :onNext="nextClicked"
            :onBack="backClicked">
            <div slot="page1">
                <h4>Add File</h4>
                <vue-csv-import v-model="csv" :map-fields=fields :auto-match-fields=true :can-ignore="true">
                    <template slot="hasHeaders" slot-scope="{headers, toggle}">
                        <div class="form-check">
                            <input class="form-check-input uploadFile" type="checkbox" @change="toggle" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                headers
                            </label>
                        </div>
                    </template>

                    <template slot="error">
                        File type is invalid
                    </template>

                    <template slot="thead">
                        <tr>
                            <th>My Fields</th>
                            <th>Column</th>
                        </tr>
                    </template>

                    <template slot="next" slot-scope="{load}">
                        <button  @click.prevent="load">Map Data</button >
                        <div class="alert alert-info">After Loading File Please Ignore Fields That Doesn't Apply</div>
                    </template>

                    <template slot="submit" slot-scope="{submit}">
                        <button > @click.prevent="submit">send!</button>
                    </template>
                </vue-csv-import>
            </div>
            <div slot="page2">
                <h4>Step 2</h4>
                <div>Select Market</div>
                <select v-model="market">
                    <option  v-for="market in markets" v-bind:value="market">{{market.name}}</option>
                </select>


                <div>Select Campaigns</div>
                <select v-model="campaign">
                    <option  v-for="types in campaignTypes" v-bind:value="types">{{types.name}}</option>
                </select>

            </div>
            <div slot="page3">
                <h4>Market: {{market.name}} Campaign Name: {{campaign.name}} Records:({{csv.length}})</h4>
                <table class="table center-aligned-table">
                    <thead>
                    <tr>
                        <th class="border-bottom-0">First Name</th>
                        <th class="border-bottom-0">Last Name</th>
                        <th class="border-bottom-0">Property Address</th>
                        <th class="border-bottom-0">Property City</th>
                        <th class="border-bottom-0">Property State</th>
                        <th class="border-bottom-0">Property zip</th>
                        <th class="border-bottom-0">Mailing Address</th>
                        <th class="border-bottom-0">Mailing City</th>
                        <th class="border-bottom-0">Mailing State</th>
                        <th class="border-bottom-0">Mailing zip</th>
                        <th class="border-bottom-0">Phone1</th>
                        <th class="border-bottom-0">Phone1 Type</th>
                        <th class="border-bottom-0">Phone2</th>
                        <th class="border-bottom-0">Phone2 Type</th>
                        <th class="border-bottom-0">Phone3</th>
                        <th class="border-bottom-0">Phone3 Type</th>
                        <th class="border-bottom-0">Phone4</th>
                        <th class="border-bottom-0">Phone4 Type</th>
                        <th class="border-bottom-0">Phone5</th>
                        <th class="border-bottom-0">Phone5 Type</th>
                        <th class="border-bottom-0">Phone6</th>
                        <th class="border-bottom-0">Phone6 Type</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="contact in csv.filter((data, value)=>value <20)">
                        <td>{{contact.first_name}}</td>
                        <td>{{contact.last_name}}</td>
                        <td>{{contact.property_address}}</td>
                        <td>{{contact.property_city}}</td>
                        <td>{{contact.property_state}}</td>
                        <td>{{contact.property_zip}}</td>
                        <td>{{contact.mailing_address}}</td>
                        <td>{{contact.mailing_city}}</td>
                        <td>{{contact.mailing_state}}</td>
                        <td>{{contact.mailing_zip}}</td>
                        <td>{{contact.phone1}}</td>
                        <td>{{contact.phone1_type}}</td>
                        <td>{{contact.phone1_tag}}</td>
                        <td>{{contact.phone2}}</td>
                        <td>{{contact.phone2_type}}</td>
                        <td>{{contact.phone2_tag}}</td>
                        <td>{{contact.phone3}}</td>
                        <td>{{contact.phone3_type}}</td>
                        <td>{{contact.phone3_tag}}</td>
                        <td>{{contact.phone4}}</td>
                        <td>{{contact.phone4_type}}</td>
                        <td>{{contact.phone4_tag}}</td>
                        <td>{{contact.phone5}}</td>
                        <td>{{contact.phone5_type}}</td>
                        <td>{{contact.phone5_tag}}</td>
                        <td>{{contact.phone6}}</td>
                        <td>{{contact.phone6_type}}</td>
                        <td>{{contact.phone6_tag}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div slot="page4">
                <h4>Upload Notice</h4>
                <p>A total of {{csv.length}} records will be save! If this is correct please click Save!</p>
            </div>
        </vue-good-wizard>
    </div>
</template>


<script>
import { VueCsvImport } from 'vue-csv-import';
import {mapGetters} from "vuex";
export default {
    name: "FileUploadMapper",
    components:{
        VueCsvImport,
    },
    data(){
        return {
            market: "market",
            campaign: {name:''},
            fields: {
                first_name:'First Name',
                last_name:'Last Name',
                property_address:'Property Address',
                property_city:'Property City',
                property_state:'Property State',
                property_zip:'Property Zip',
                mailing_address:'Mailing Address',
                mailing_city:'Mailing City',
                mailing_state:'Mailing State',
                mailing_zip:'Mailing Zip',
                phone1:'Phone 1',
                phone1_type:'Phone Type1',
                phone1_tag: 'Phone Tag1',
                phone2:'Phone 2',
                phone2_type:'Phone Type2',
                phone2_tag: 'Phone Tag2',
                phone3:'Phone 3',
                phone3_type:'Phone Type3',
                phone3_tag: 'Phone Tag3',
                phone4:'Phone 4',
                phone4_type:'Phone Type4',
                phone4_tag: 'Phone Tag4',
                phone5:'Phone 5',
                phone5_type:'Phone Type5',
                phone5_tag: 'Phone Tag5',
                phone6:'Phone 6',
                phone6_type:'Phone Type6',
                phone6_tag: 'Phone Tag6',
                email:'Email'
            },
            csv:[],
            error:null,
            steps: [
                {
                    label: 'Select Items',
                    slot: 'page1',
                },
                {
                    label: 'Name',
                    slot: 'page2',
                },
                {
                    label: 'Review',
                    slot: 'page3',
                },
                {
                    label: 'Upload',
                    slot: 'page4',
                    options: {
                        nextDisabled: false, // control whether next is disabled or not
                    },
                }
            ],
        };
    },
    computed: {
        ...mapGetters({
            campaignTypes: 'campaignTypes',
            markets: 'markets'
        }),
    },
    methods: {
        getSample(){
            let sample = this.csv.filter((data, value)=>value <20)
            return sample;
        },
        nextClicked(currentPage, e) {
            if(currentPage!==3) {
                return true; //return false if you want to prevent moving to previous page
            }else {
                let data = {
                    market: this.market,
                    campaign: this.campaign,
                    csv: this.csv
                }
                this.$emit('saveFileMapping', data)
            }
        },
        backClicked(currentPage) {
            return true; //return false if you want to prevent moving to previous page

        },
    }
}
</script>

<style type="text/css">
.form-group input {
    opacity: 100 !important;
    position: inherit !important;
}
</style>
