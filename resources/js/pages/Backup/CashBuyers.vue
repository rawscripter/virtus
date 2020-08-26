<template>
    <div>
        <div>
            <b-form @submit="calculateDistance">
                <b-form-group
                    id="input-group-1"
                    label="Origin Address:"
                    label-for="input-1"
                    description="Sellers Address"
                >
                    <b-form-input
                        id="input-1"
                        v-model="form.originAddress"
                        required
                        placeholder="Sellers Address"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Destination Address:" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="form.destinationAddress"
                        required
                        placeholder="Destination Address"
                    ></b-form-input>
                </b-form-group>


                <b-button type="submit" variant="primary">Submit</b-button>
            </b-form>
            <b-card class="mt-3" header="Form Data Result">
                <pre class="m-0">{{ this.results  }}</pre>
            </b-card>
        </div>

        <div class="float-right">
            <b-button >Add Cash Buyer</b-button>
            <b-button>Upload Cash Buyer List</b-button>
        </div>
        <div>
            <b-table striped hover responsive
                     :items="items"
                     :fields="fields" >
            </b-table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CashBuyers",
        components:{
        },
        data() {
            return {
                results:"",
                form: {
                    originAddress: '',
                    destinationAddress: '',
                },
                items: [
                    { company: 40, first_name: 'Dickerson', last_name: 'Macdonald', Phone: '123-456-7898' },
                    { company: 21, first_name: 'Larsen', last_name: 'Shaw', Phone: '123-456-7898' },
                    { company: 89, first_name: 'Geneva', last_name: 'Wilson', Phone: '123-456-7898'  },
                    { company: 38, first_name: 'Jami', last_name: 'Carney', Phone: '123-456-7898'  }
                ],
                fields: [
                    {
                        key: 'company',
                        sortable: true
                    },
                    {
                        key: 'first_name',
                        sortable: false,
                        thStyle:{
                            width:"15%"
                        }
                    },
                    {
                        key: 'last_name',
                        sortable: true
                    },
                    {
                        key: 'Phone',
                        label: 'Phone Number',
                        sortable: true,
                        // Variant applies to the whole column, including the header and footer
                        variant: ''
                    }
                ],
            }
        },

        methods:{
            calculateDistance(evt){
                evt.preventDefault()
                console.log("in method")
                let query = "https://maps.googleapis.com/maps/api/distancematrix/json?" +
                    "origins='" + this.form.originAddress +"'&destinations='" + this.form.destinationAddress + "'&key=AIzaSyDbbDNxOzT70A82_p_maGCaFUR8hfg8Yzg"
                console.log(query)
                this.axios.get(query).then(response => {
                    this.results = response;
                })

                console.log(this.results )
            }
        }
    }
</script>

<style scoped>

</style>
