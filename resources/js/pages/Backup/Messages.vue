<template>
  <div >

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general"
           role="tab" aria-controls="pills-general" aria-selected="true">General</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="pills-jv-tab" data-toggle="pill" href="#pills-jv"
           role="tab" aria-controls="pills-jv" aria-selected="false">Joint Ventures</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="pills-inquiry-tab" data-toggle="pill" href="#pills-inquiry"
           role="tab" aria-controls="pills-inquiry" aria-selected="false">Property Inquires</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="pills-calls-tab" data-toggle="pill" href="#pills-calls"
           role="tab" aria-controls="pills-calls" aria-selected="false">Callrail Calls</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="pills-texts-tab" data-toggle="pill" href="#pills-texts"
           role="tab" aria-controls="pills-texts" aria-selected="false">Callrail texts</a>
      </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-general" role="tabpanel"
           aria-labelledby="pills-general-tab" v-if="generalMessages!=undefined">
        <section v-if="generalMessages.length>0" class="container-fluid">
          <h6 class="border-bottom border-gray pb-2 mb-0">General</h6>
          <div class="media text-muted pt-3" v-for="messages in generalMessages">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{messages.full_name}}</strong>
                <a href="#">Read</a>
              </div>
              <span class="d-block">{{messages.message.substr(0,75)}} ...</span>
            </div>
          </div>
        </section>
      </div>

      <div class="tab-pane fade" id="pills-jv" role="tabpanel" aria-labelledby="pills-jv-tab" v-if="jvMessages!=undefined">
        <section v-if="jvMessages.length>0" class="container-fluid">
          <h6 class="border-bottom border-gray pb-2 mb-0" >Joint Ventures</h6>
          <div class="media text-muted pt-3" v-for="messages in jvMessages">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{messages.full_name}}</strong>
                <a href="#">Read</a>
              </div>
              <span class="d-block">{{messages.condition.substr(0,75)}} ...</span>
            </div>
          </div>
        </section>
      </div>


      <div class="tab-pane fade" id="pills-inquiry" role="tabpanel" aria-labelledby="pills-inquiry-tab"
           v-if="offerMessages!=undefined">
        <section v-if="offerMessages.length>0" class="container-fluid">
          <h6 class="border-bottom border-gray pb-2 mb-0" >Properties Inquiry Offer</h6>
          <div class="media text-muted pt-3" v-for="messages in offerMessages">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{messages.full_name}}</strong>
                <a href="#">Read</a>
              </div>
              <span class="d-block">{{messages.condition.substr(0,75)}} ...</span>
            </div>
          </div>
        </section>
      </div>



      <div class="tab-pane fade" id="pills-calls" role="tabpanel" aria-labelledby="pills-calls-tab">
        <b-table id="call-activity-table" striped hover
                 :items="callDataProvider"
                 :fields="callFields"
                 :per-page="callPerPage"
                 :current-page="currentCallPage"
                 head-variant="dark"
                 :no-provider-sorting="true"
                 :bordered="true">
        </b-table>
        <b-pagination align="center"
                      v-model="currentCallPage"
                      :per-page="callPerPage"
                      :current-page="currentCallPage"
                      aria-controls="call-activity-table"
                      :total-rows="callRows">

        </b-pagination>

      </div>


      <div class="tab-pane fade" id="pills-texts" role="tabpanel" aria-labelledby="pills-texts-tab-tab">
        <b-table id="text-activity-table" striped hover
                 :items="textDataProvider"
                 :fields="textFields"
                 :per-page="textPerPage"
                 :current-page="currentTextPage"
                 head-variant="dark"
                 :no-provider-sorting="true"
                 :bordered="true">
        </b-table>
        <b-pagination
          align="center"
          v-model="currentTextPage"
          :per-page="textPerPage"
          :current-page="currentTextPage"
          aria-controls="text-activity-table"
          :total-rows="textRows">
        </b-pagination>
      </div>
    </div>

  </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  export default {
    name: "Messages",
    data() {
      return{
        textRows:1,
        callRows:1,
        textPerPage: 10,
        callPerPage: 10,
        currentTextPage: 1,
        currentCallPage: 1,
        callFields: [
          {
            key: 'id',
            sortable: true
          },
          {
            key: 'business_phone_number',
            label: 'Business Number',
            sortable: true,
          },
          {
            key: 'customer_name',
            label: 'Customer Name',
            sortable: true,
          },
          {
            key: 'customer_phone_number',
            label: 'Customer Phone Number',
            sortable: true,
          },
          {
            key: 'direction',
            label: 'Call Direction',
            sortable: true,
          },
          {
            key: 'answered',
            sortable: true
          },
          {
            key: 'tracking_phone_number',
            label: 'Tracking Number',
            sortable: true,
          },
          {
            key: 'voicemail',
            label: 'Voicemail',
            sortable: true,
          }
        ],
        textFields: [
          {
            key: 'id',
            sortable: true
          },
          {
            key: 'formatted_customer_name',
            label: 'Customer Name',
            sortable: true,
          },
          {
            key: 'customer_phone_number',
            label: 'Customer Phone Number',
            sortable: true,
          },
          {
            key: 'recent_messages[0].direction',
            label: 'Direction',
            sortable: true
          },
          {
            key: 'recent_messages[0].content',
            label: 'Last Message',
            sortable: true,
          },
          {
            key: 'current_tracking_number',
            label: 'Tracking Number',
            sortable: true,
          },
          {
            key: 'tracker_name',
            label: 'Tracking Name',
            sortable: true,
          },

          {
            key: 'last_message_at',
            label: 'Date',
            sortable: true,
            formatter:value =>{
              return this.$moment(String(value)).format('MM/DD/YY h:mma')
            }
          }
        ]
      }
    },

    watch: {
      getCallActivity: function () {
        this.callRows = this.getCallActivity.total_records
      },
      getTextActivity: function () {
        this.textRows = this.getTextActivity.total_records
      }

    },
    computed: {
      ...mapGetters({
        jvMessages: "jvMessages",
        offerMessages: "offerMessages",
        generalMessages: "generalMessages",
        getCallActivity:"getCallActivity",
        getTextActivity:"getTextActivity"

      }),
    },
    methods:{
      getFormat(key){
        console.log(key)
      },
      callDataProvider (ctx, callback) {
        if(ctx!=undefined) {
          this.$store.dispatch('getCallRailActivity', ctx).then(data => {
            callback(data.calls);
          }).catch(() => {

          })
        }
        return null
      },

      textDataProvider (ctx, callback) {
        console.log(ctx)
        if(ctx!=undefined) {
          this.$store.dispatch('getCallRailText', ctx).then(data => {
            console.log('got callback')
            callback(data.conversations);

          }).catch(() => {

          })
        }
        return null
      },

    },
    created() {
      this.$store.dispatch('getGeneralMessages');
      this.$store.dispatch('getOfferMessages');
      this.$store.dispatch('getJVMessages');
    }

  }
</script>

<style scoped>
  .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #007bff !important;
  }
</style>
