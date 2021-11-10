<template>
    <div class="md-layout text-center">

        <div class="md-layout-item md-size-100">
            <div class="text-center">
                <h3>Log in to Virtus Investment Group LLC</h3>
                <p>
                </p>
            </div>
        </div>

        <div class="md-layout-item md-size-33 md-medium-size-50 md-small-size-70 md-xsmall-size-100">
            <login-card header-color="green">
                <h4 slot="title" class="title">Log in</h4>
                <md-button slot="buttons" ref="#facebook" class="md-just-icon md-simple md-white">
                    <i class="fab fa-facebook-square"></i>
                </md-button>
                <md-button slot="buttons" href="#twitter" class="md-just-icon md-simple md-white">
                    <i class="fab fa-twitter"></i>
                </md-button>
                <md-button slot="buttons" href="#google" class="md-just-icon md-simple md-white">
                    <i class="fab fa-google-plus-g"></i>
                </md-button>
                <p slot="description" class="description">Or Be Classical</p>
                <md-field class="form-group md-invalid" slot="inputs" style="margin-bottom: 28px">
                    <md-icon>email</md-icon>
                    <label>Email...</label>
                    <md-input v-model="username" type="text"/>
                    <validation-error :errors="apiValidationErrors.username"/>
                </md-field>
                <md-field class="form-group md-invalid" slot="inputs">
                    <md-icon>lock_outline</md-icon>
                    <label>Password...</label>
                    <md-input v-model="password" type="password"/>
                </md-field>
                <md-button slot="footer" @click="login" class="md-simple md-success md-lg">
                    Lets Go
                </md-button>
            </login-card>
        </div>
    </div>
</template>

<script>
import {LoginCard, ValidationError} from "@/components";
import formMixin from "@/mixins/form-mixin";
import store from "../../../store";
const Quote = require('inspirational-quotes');

export default {
    components: {
        LoginCard, ValidationError
    },
    mixins: [formMixin],
    computed: {
        isAuthenticated: function () {
            return this.$store.getters.isAuthenticated();
        }
    },
    data: () => ({
        username: "blackheart1286",
        password: "password?1",
    }),
    methods: {

        getQuote(){
            console.log(Quote.getRandomQuote())
        return Quote.getRandomQuote();

        },

        async login() {
            const user = {
                username: this.username,
                password: this.password
            }

            const requestOptions = {
                headers: {
                    'Accept': 'application/vnd.api+json',
                    'Content-Type': 'application/vnd.api+json',
                }
            }

            try {
                await this.$store.dispatch("login", {user, requestOptions})
            } catch (e) {
                await this.$store.dispatch("alerts/error", "Invalid credentials!")
                this.setApiValidation(e.response.data.errors)
            }

        }
    },

};
</script>
