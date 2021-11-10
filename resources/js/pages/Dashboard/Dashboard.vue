z4<template>
  <div class="md-layout">
    <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">

      <stats-card header-color="blue">
        <template slot="header">
          <div class="card-icon">
              <md-icon>whatshot</md-icon>
          </div>
          <p class="category">Projected Leads Revenue</p>
          <h3 class="title">
            $115,000.56
          </h3>
        </template>

        <template slot="footer">
          <div class="whatshot">
            <md-icon>update</md-icon>
            Just Updated
          </div>
        </template>
      </stats-card>
    </div>
    <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
      <stats-card header-color="rose">
        <template slot="header">
          <div class="card-icon">
            <md-icon>equalizer</md-icon>
          </div>
          <p class="category">Monthly Leads Acquired</p>
          <h3 class="title">
            5
          </h3>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>local_offer</md-icon>
           Tracked From Leads Entry
          </div>
        </template>
      </stats-card>
    </div>
    <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
      <stats-card header-color="green">
        <template slot="header">
          <div class="card-icon">
            <md-icon>store</md-icon>
          </div>
          <p class="category">Actual Closed Revenue</p>
          <h3 class="title">
            $ 55,000.24
          </h3>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>date_range</md-icon>This Month
          </div>
        </template>
      </stats-card>
    </div>
    <div class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25">
      <stats-card header-color="warning">
        <template slot="header">
          <div class="card-icon">
            <md-icon>weekend</md-icon>
          </div>
          <p class="category">Schedule Cosings</p>
          <h3 class="title">
           5
          </h3>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon class="text-danger">warning</md-icon>
            <a href="#pablo">Still Below Closing Threshold</a>
          </div>
        </template>
      </stats-card>
    </div>
    <div
      class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33"
    >
      <chart-card
        :chart-data="emailsSubscriptionChart.data"
        :chart-options="emailsSubscriptionChart.options"
        :chart-responsive-options="emailsSubscriptionChart.responsiveOptions"
        chart-type="Bar"
        chart-inside-header
        background-color="rose"
      >
        <md-icon slot="fixed-button">build</md-icon>
        <md-button class="md-simple md-info md-just-icon" slot="first-button">
          <md-icon>refresh</md-icon>
          <md-tooltip md-direction="bottom">Refresh</md-tooltip>
        </md-button>
        <md-button class="md-simple md-just-icon" slot="second-button">
          <md-icon>edit</md-icon>
          <md-tooltip md-direction="bottom">Change Date</md-tooltip>
        </md-button>

        <template slot="content">
          <h4 class="title">Monthly Lead Tracker</h4>
          <p class="category">
            Latest Acquisition Performance
          </p>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>access_time</md-icon>
            updated 10 days ago
          </div>
        </template>
      </chart-card>
    </div>
    <div
      class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33"
    >
      <chart-card
        :chart-data="dailySalesChart.data"
        :chart-options="dailySalesChart.options"
        chart-type="Line"
        chart-inside-header
        background-color="green"
      >
        <md-button class="md-simple md-info md-just-icon" slot="first-button">
          <md-icon>refresh</md-icon>
          <md-tooltip md-direction="bottom">Refresh</md-tooltip>
        </md-button>
        <md-button class="md-simple md-just-icon" slot="second-button">
          <md-icon>edit</md-icon>
          <md-tooltip md-direction="bottom">Change Date</md-tooltip>
        </md-button>

        <template slot="content">
          <h4 class="title">Daily Leads</h4>
          <p class="category">
            <span class="text-success"
              ><i class="fas fa-long-arrow-alt-up"></i>
              15%
            </span>
            increase in today Leads.
          </p>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>access_time</md-icon>
            updated 4 minutes ago
          </div>
        </template>
      </chart-card>
    </div>
    <div
      class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33"
    >
      <chart-card
        :chart-data="dataCompletedTasksChart.data"
        :chart-options="dataCompletedTasksChart.options"
        chart-type="Line"
        chart-inside-header
        background-color="blue"
      >
        <md-button class="md-simple md-info md-just-icon" slot="first-button">
          <md-icon>refresh</md-icon>
          <md-tooltip md-direction="bottom">Refresh</md-tooltip>
        </md-button>
        <md-button class="md-simple md-just-icon" slot="second-button">
          <md-icon>edit</md-icon>
          <md-tooltip md-direction="bottom">Change Date</md-tooltip>
        </md-button>

        <template slot="content">
          <h4 class="title">Leads Added Today</h4>
          <p class="category">
            Last Campaign Performance
          </p>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>access_time</md-icon>
            campaign sent 26 minutes ago
          </div>
        </template>
      </chart-card>
    </div>

    <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
      <md-card>
        <md-card-header class="md-card-header-text md-card-header-warning">
          <div class="card-text">
            <h4 class="title">Last Updated Contacts</h4>
            <p class="category">
             Leads Recently Updated
            </p>
          </div>
        </md-card-header>
        <md-card-content>
          <md-table v-model="recentLeads" table-header-color="orange">
             <md-table-row v-for="lead in recentLeads.data"  :key="lead.id">
                 <md-table-cell md-label="Id">{{ lead.contact.first_name }}</md-table-cell>
              <md-table-cell md-label="Name">{{ lead.contact.last_name }}</md-table-cell>
            </md-table-row>
          </md-table>
        </md-card-content>
      </md-card>
    </div>

    <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
      <nav-tabs-card>
        <template slot="content">
          <span class="md-nav-tabs-title">Tasks</span>
          <md-tabs md-sync-route class="md-rose" md-alignment="left">
            <md-tab id="tab-home" md-label="" md-icon="fast_check">
              <md-table v-model="firstTabs" @md-selected="onSelect">
                <md-table-row
                    slot="md-table-row"
                    slot-scope="{ item }"
                    md-selectable="multiple"
                    md-auto-select
                >
                  <md-table-cell>{{ item.tab }}</md-table-cell>
                  <md-table-cell>
                    <md-button class="md-just-icon md-simple md-primary">
                      <md-icon>edit</md-icon>
                      <md-tooltip md-direction="top">Edit</md-tooltip>
                    </md-button>
                    <md-button class="md-just-icon md-simple md-danger">
                      <md-icon>close</md-icon>
                      <md-tooltip md-direction="top">Close</md-tooltip>
                    </md-button>
                  </md-table-cell>
                </md-table-row>
              </md-table>
            </md-tab>
          </md-tabs>
        </template>
      </nav-tabs-card>
    </div>

  </div>
</template>

<script>

import {
  StatsCard,
  ChartCard,
  NavTabsCard
} from "@/components";


import {mapGetters} from 'vuex'
export default {
  components: {
    StatsCard,
    ChartCard,
    NavTabsCard
  },


    computed: {
        ...mapGetters({
            recentLeads: 'recentLeads',
        }),
    },

  data() {
    return {
      product1: process.env.VUE_APP_APP_BASE_URL + "/img/card-2.jpg",
      product2: process.env.VUE_APP_APP_BASE_URL + "/img/card-3.jpg",
      product3: process.env.VUE_APP_APP_BASE_URL + "/img/card-1.jpg",
      seq2: 0,

      selected: [],
      firstTabs: [
        { tab: "Sign contract for 125 N Main St in Durham"},
        { tab: "Call Mr. Grey about selling 14 N. Driver In Durham" },
        { tab: "Update Revenue after closing today" },
        { tab: "Team Meeting at 2PM Monday to discuss next Quarter Goals" }
      ],

      users: [
        {
          id: 1,
          name: "Noelia O'Kon",
          salary: "13098.00",
          country: "Niger"
        },
        {
          id: 2,
          name: "Mr. Enid Von PhD",
          salary: "35978.00",
          country: "Curaçao"
        },
        {
          id: 3,
          name: "Colton Koch",
          salary: "26278.00",
          country: "Netherlands"
        },
        {
          id: 4,
          name: "Gregory Vandervort",
          salary: "25537.00",
          country: "South Korea"
        },
      ],
      dailySalesChart: {
        data: {
          labels: ["M", "T", "W", "T", "F", "S", "S"],
          series: [[7, 10, 9, 4, 8444444444, 1, 0]]
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 15, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      dataCompletedTasksChart: {
        data: {
          labels: ["9am", "10pm", "11pm", "1pm", "2pm", "3pm", "4pm", "5pm"],
          series: [[0, 2, 3, 0, 0, 2, 0, 3]]
        },

        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 20, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      emailsSubscriptionChart: {
        data: {
          labels: [
            "Ja",
            "Fe",
            "Ma",
            "Ap",
            "Mai",
            "Ju",
            "Jul",
            "Au",
            "Se",
            "Oc",
            "No",
            "De"
          ],
          series: [[60, 100, 55, 75, 35, 105, 85, 65, 75, 55, 48, 29]]
        },
        options: {
          axisX: {
            showGrid: false
          },
          low: 0,
          high: 200,
          chartPadding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 0
          }
        },
        responsiveOptions: [
          [
            "screen and (max-width: 640px)",
            {
              seriesBarDistance: 5,
              axisX: {
                labelInterpolationFnc: function(value) {
                  return value[0];
                }
              }
            }
          ]
        ]
      }
    };
  },

  methods: {
    onSelect: function(items) {
      this.selected = items;
    }
  },

    async created() {
        await this.$store.dispatch('getRecentlyUpdatedLeads');

    },
};
</script>
