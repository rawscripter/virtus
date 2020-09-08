<template>
    <section class="wrapper">
        <div class="container-fluid content-panel">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <h5 class="card-header">Seller Details</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{owner.first_name}}  {{owner.last_name}}</h5>
                            <p class="card-text"><strong>Mailing Address: </strong>{{owner.mailing_address}}</p>
                            <p class="card-text"><strong>Mailing City: </strong>{{owner.mailing_city}}</p>
                            <p class="card-text"><strong>Mailing State: </strong>{{owner.mailing_state}}</p>
                            <p class="card-text"><strong>Mailing Zip: </strong>{{owner.mailing_zip}}</p>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Property Details</h5>
                        <div class="card-body">
                            [ MAP GOES HERE ]
                            <div class="google-map" :id="mapName"></div>

                            <p class="card-text"><strong>Address: </strong>{{owner.addresses[0].address}}</p>
                            <p class="card-text"><strong>City: </strong>{{owner.addresses[0].city}}</p>
                            <p class="card-text"><strong>State: </strong>{{owner.addresses[0].state}}</p>
                            <p class="card-text"><strong>Zip: </strong>{{owner.addresses[0].zip}}</p>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Associated Numbers</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="card-text list-group-item" v-for="phone in owner.phones">
                                    <span> {{phone.number}} </span>
                                    <span class="pull-right">
                                    <input type="checkbox" class="form-check-input"  id="phone.id">
                                    <label>{{phone.type}}</label>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header">List Of Owners</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="card-text list-group-item" v-for="address in owner.addresses">
                                    <h5>{{address.address}} ,  {{address.city}}, {{address.state}}, {{address.zip}}</h5>
                                    <div v-for="owner in address.owners">
                                        <span> {{owner.first_name}} {{owner.last_name}}</span>
                                        <span class="pull-right">
                                    <input type="checkbox" class="form-check-input"  id="owner.id">
                                    </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="msg_history">
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>Test which is a new approach to have all
                                                solutions</p>
                                            <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Test which is a new approach to have all
                                            solutions</p>
                                        <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>Test, which is a new approach to have</p>
                                            <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>Apollo University, Delhi, India Test</p>
                                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                                </div>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>We work directly with our designers and suppliers,
                                                and sell direct to you, which means quality, exclusive
                                                products, at a price anyone can afford.</p>
                                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <input type="text" class="write_msg" placeholder="Type a message" />
                                    <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        name: "Owner",

        computed: {
            ...mapGetters({
                owner: 'owner'
            }),
        },

    }
</script>

<style scoped>

</style>
