<template>
    <div>
        <vue-good-wizard
            :steps="steps"
            :onNext="nextClicked"
            :onBack="backClicked">
            <div slot="page1">
                <h4>Step 1</h4>
                <div class="child">
                    <div class="row"><label class="text-danger">{{error}}</label></div>
                    <input  type='file' accept='.csv' name="file" ref="file" v-on:change='readFile()'/>
                </div>

            </div>
            <div slot="page2">
                <h4>Step 2</h4>
                <div class="container-fluid">
                    <div class="row" v-if="file">
                        <div class="col-sm-4 scrollableCsvMap">
                            <draggable id="leftColumn"
                                       :list="originalMap"
                                       class="list-group"
                                       draggable=".item"
                                       group="a">
                                <div
                                    class="list-group-item item"
                                    v-for="contact in originalMap"
                                    :key="contact.name"
                                >
                                    {{ contact.name }}
                                </div>
                                <div  class="list-group-item item">
                                </div>
                            </draggable>
                        </div>

                        <div class="col-sm-8 row">
                            <div class="col-12">

                                <div class="row scrollableCsvMap">
                                    <div class="list-group-item item col-4">First Name</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="firstName"  :list="fields[0].firstName" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].firstName.length>0"> {{fields[0].firstName[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Last Name</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="lastName"  :list="fields[0].lastName" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].lastName.length>0">{{fields[0].lastName[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Property Address</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="address"  :list="fields[0].address" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].address.length>0">{{fields[0].address[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Property City</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="city"  :list="fields[0].city" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].city.length>0"> {{fields[0].city[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Property State</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="state"  :list="fields[0].state" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].state.length>0"> {{fields[0].state[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Property Zip</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="zip"  :list="fields[0].zip" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].zip.length>0">  {{fields[0].zip[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Mailing Address</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="mailingAddress"  :list="fields[0].mailingAddress" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].mailingAddress.length>0">{{fields[0].mailingAddress[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Mailing City</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="mailingCity"  :list="fields[0].mailingCity" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].mailingCity.length>0"> {{fields[0].mailingCity[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Mailing State</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="mailingState"  :list="fields[0].mailingState" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].mailingState.length>0"> {{fields[0].mailingState[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Mailing Zip</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="mailingZip"  :list="fields[0].mailingZip" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-if="fields[0].mailingZip.length>0">  {{fields[0].mailingZip[0].name}}</div>
                                        </draggable>
                                    </div>

                                    <div class="list-group-item item col-4">Phone Numbers</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="phoneNumbers"  :list="fields[0].phoneNumbers" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item"  v-for="number in fields[0].phoneNumbers" :key="number.name">
                                                <div>
                                                    {{number.name}}
                                                </div>
                                            </div>
                                        </draggable>
                                    </div>


                                    <div class="list-group-item item col-4"> Mobile Numbers</div>
                                    <div class="list-group-item item col-6">
                                        <draggable id="mobileNumbers"  :list="fields[0].mobileNumbers" class="list-group dropzone" draggable=".item" group="a">
                                            <div class="list-group-item item" v-for="number in fields[0].mobileNumbers" :key="number.name" >
                                                <div>
                                                    {{number.name}}
                                                </div>
                                            </div>
                                        </draggable>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div slot="page3">
                <h4>Step 3</h4>
                <div class="child">
                    <div class="row"><label class="text-danger">{{error}}</label></div>
                    <div class="row">
                        <label class="text-primary font-weight-bold text-center">Campaign Name</label>
                    </div>
                    <div class="row">
                        <input type="text" class="row form-control" placeholder="Campaign Name" v-model="campaignName">
                    </div>
                </div>
            </div>
        </vue-good-wizard>

    </div>
</template>

<script>
    import Papa from 'papaparse'
    import draggable from 'vuedraggable'

    export default {
        name: "app-footer",
        components:{
            draggable
        },
        data() {
            return {
                error:null,
                mappedCsv:[],
                count:0,
                originalMap:[],
                file: null,
                campaignName: "",
                csv:[],
                fields: [
                    {
                        firstName:[],
                        lastName:[],
                        address:[],
                        city:[],
                        state:[],
                        zip:[],
                        mailingAddress:[],
                        mailingCity:[],
                        mailingState:[],
                        mailingZip:[],
                        phoneNumbers: [],
                        mobileNumbers: [],
                    }
                ],
                steps: [
                    {
                        label: 'Select Items',
                        slot: 'page1',
                    },
                    {
                        label: 'Map Contact Template',
                        slot: 'page2',
                    },
                    {
                        label: 'Save Campaign',
                        slot: 'page3',
                    }
                ],
            }
        },

        watch: {
            fields: {
                handler: function (fields) {
                    console.log(fields)
                },
                deep: true
            }
        },

        methods:{
            mapContact(data, fields) {
                let arr =[];
                Object.keys(fields).map(function (key,index) {
                    let value=fields[Object.keys(fields)[index]]
                    data.map(function (item) {
                        if(key==='phoneNumbers'){
                            if (value[0]) {
                                let arrPhone=[];
                                for(let i=0; value.length>i; i++) {
                                    if (item.name === value[i].name) {
                                        arrPhone.push(item)
                                    }
                                }
                                arr.push({[key]:arrPhone})
                            }
                        }else if(key==='mobileNumbers') {
                            if (value[0]) {
                                let arrMobile=[];
                                for(let i=0; value.length>i; i++) {
                                    if (item.name === value[i].name) {
                                        arrMobile.push(item)
                                    }
                                }
                                arr.push({[key]:arrMobile})
                            }
                        }else {
                            if (value[0]) {
                                if (item.name === value[0].name) {
                                    let obj = {
                                        [key]:item
                                    }
                                    arr.push(obj)
                                }
                            }
                        }
                    })
                })
                this.mappedCsv.push(arr)
            },

            mapArray(){
                console.log(this.csv)
                this.csv.forEach(function (contact) {
                    console.log(contact)

                    if(contact.errors<1) {
                        contact.data.map(function (fields) {
                            let array = [];
                            Object.keys(fields).forEach(function (field, index) {
                                array.push({
                                    name: field,
                                    index: index,
                                    value: fields[Object.keys(fields)[index]]
                                })
                            }.bind(this))
                            this.mapContact(array, this.fields[0])
                        }.bind(this))
                    }
                }.bind(this))
                this.$emit('map', this.formatCSVForUpload(this.mappedCsv));
            },

            formatCSVForUpload(array){
                let data = {
                    name: this.campaignName,
                    contacts: []
                }
                array.flatMap(function (contact) {
                    let landline= []
                    let wireless = []
                    let property ={
                        address:'',
                        city:'',
                        state:'',
                        zip:''
                    }
                    let arr ={
                        first_name:'',
                        last_name:'',
                        mailing_address:'',
                        mailing_city:'',
                        mailing_state:'',
                        mailing_zip:'',
                    }

                    contact.map(function (data) {
                        let key = Object.keys(data)[0]
                        let item = Object.values(data)[0];
                        switch(key) {
                            case 'firstName':
                                arr.first_name=item.value
                                break;
                            case 'lastName':
                                arr.last_name= item.value
                                break;
                            case 'address':
                                property.address = item.value
                                break;
                            case 'city':
                                property.city = item.value
                                break;
                            case 'state':
                                property.state = item.value
                                break;
                            case 'zip':
                                property.zip = item.value
                                break;
                            case 'mailingAddress':
                                arr.mailing_address = item.value
                                break;
                            case 'mailingCity':
                                arr.mailing_city = item.value
                                break;
                            case 'mailingState':
                                arr.mailing_state = item.value
                                break;
                            case 'mailingZip':
                                arr.mailing_zip = item.value
                                break;
                            case 'phoneNumbers':
                                if(item[0]) {
                                    if (item[0].value.length > 0) {
                                        landline.push(item[0].value)
                                    }
                                }
                                break;
                            case 'mobileNumbers':
                                if(item[0]) {
                                    if (item[0].value.length > 0) {
                                        wireless.push(item[0].value)
                                    }
                                }
                                break;
                            default:
                            // code block
                        }
                    })

                    arr.addresses= [property]
                    arr.phones =landline
                    arr.mobile_phones =wireless
                    data.contacts.push(arr)
                })
                return data;
            },

            readFile(){
                this.csv=[];
                this.originalMap=[];
                this.file = this.$refs.file.files[0];
                if(this.getExtension(this.file.name).toLowerCase()!=='csv'){
                    this.error = "Please Select A Valid CSV File"}else {
                    this.error=""
                }

                Papa.parse(this.file,{
                    delimiter: "", // auto-detect
                    newline: "", // auto-detect
                    quoteChar: '"',
                    encoding: "",
                    preview: 0,
                    header: true,
                    dynamicTyping: false,
                    worker: false,
                    comments: false,
                    download: false,
                    skipEmptyLines: false,
                    step: this.step,
                    complete: this.complete,
                    error: undefined,
                    chunk: undefined,
                    fastMode: undefined,
                    beforeFirstChunk: undefined,
                    withCredentials: undefined
                });

            },
            step(results) {
                this.csv.push(results)
            },
            complete(){
                console.log(this.csv)
                let sample =this.csv[0].data;
                console.log(sample)
                console.log('should habe sa')
                Object.keys(sample).forEach(function (item, index) {
                    this.originalMap.push({
                        name: item,
                        index: index,
                        value: sample[Object.keys(sample)[index]]
                    })
                }.bind(this))
            },
            nextClicked(currentPage) {
                switch(currentPage) {
                    case 0:
                        if(this.file!=null) {
                            if (this.getExtension(this.file.name).toLowerCase() !== 'csv') {
                                this.error = "Please Select A Valid CSV File"
                                return false;
                            } else {
                                return true;
                            }
                        }else {
                            this.error = "Please Select A CSV File"
                            return false;
                        }
                    case 1:
                        for(let value in Object.values(this.fields[0])){
                            console.log(value)
                        }
                        return true;
                    case 2:
                        if (this.campaignName === "") {
                            this.error = "Enter A Campaign Name"
                            return false;
                        } else {
                            this.error = ""
                            this.mapArray();
                            return true;
                        }
                    default:
                        return false;
                }
            },
            backClicked(currentPage) {
                if(currentPage===1){
                    this.file=null;
                }
                return true; //return false if you want to prevent moving to previous page
            },
            getExtension(filename) {
                let  parts = filename.split('.');
                return parts[parts.length - 1];
            }

        }
    }
</script>

<style scoped>
    .dropzone{
        border-style: dotted;
        border-width: medium;
        border-color: #1f565f;
        min-height:40px;
    }

    .scrollableCsvMap {
        height:62vh;
        overflow-y: scroll;
    }
</style>
