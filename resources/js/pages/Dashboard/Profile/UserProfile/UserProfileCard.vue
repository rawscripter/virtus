<template>
  <md-card class="md-card-profile">
    <div class="md-card-avatar">
      <img class="img" :src="cardUserImage"/>
    </div>
    <md-card-content>
      <h6 class="category text-gray">Co-Founder</h6>
      <h4 class="card-title"> {{user.full_name}}</h4>
      <p class="card-description">
        Don't be scared of the truth because we need to restart the human
        foundation in truth And I love you like Kanye loves Kanye I love Rick
        Owens’ bed design but the back is...
      </p>
      <md-button class="md-round" :class="getColorButton(buttonColor)">
        Follow
      </md-button>
    </md-card-content>
  </md-card>
</template>

<script>
  export default {
    name: "user-profile-card",
    props: {
        user: Object,
      cardUserImage: {
        type: String,
        default: "/images/avatar.jpg"
      },
      buttonColor: {
        type: String,
        default: ""
      }
    },
    data() {
      return {};
    },
    methods: {
      getColorButton: (buttonColor) => ("md-" + buttonColor + "")
    }
  };
</script>
