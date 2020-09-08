<template>
    <div class="md-layout">
        <div class="md-layout-item">
            <signup-card>
                <h2 class="title text-center" slot="title">Register</h2>
                <div
                    class="md-layout-item md-size-50 md-medium-size-50 md-small-size-100 ml-auto"
                    slot="content-left"
                >
                    <div
                        class="info info-horizontal"
                        v-for="item in contentLeft"
                        :key="item.title"
                    >
                        <div :class="`icon ${item.colorIcon}`">
                            <md-icon>{{ item.icon }}</md-icon>
                        </div>
                        <div class="description">
                            <h4 class="info-title">{{ item.title }}</h4>
                            <p class="description">
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="md-layout-item md-size-50 md-medium-size-50 md-small-size-100 mr-auto"
                    slot="content-right"
                >
                    <div class="social-line text-center">
                        <md-button class="md-just-icon md-round md-twitter">
                            <i class="fab fa-twitter"></i>
                        </md-button>
                        <md-button class="md-just-icon md-round md-dribbble">
                            <i class="fab fa-dribbble"></i>
                        </md-button>
                        <md-button class="md-just-icon md-round md-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </md-button>
                        <h4 class="mt-3">or be classical</h4>
                    </div>

                    <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                        <md-icon>face</md-icon>
                        <label>Username</label>
                        <md-input v-model="username"/>
                        <validation-error :errors="apiValidationErrors.username"/>
                    </md-field>

                    <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                        <md-icon>face</md-icon>
                        <label>First Name</label>
                        <md-input v-model="first_name"/>
                        <validation-error :errors="apiValidationErrors.first_name"/>
                    </md-field>

                    <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                        <md-icon>face</md-icon>
                        <label>Last Name</label>
                        <md-input v-model="last_name"/>
                        <validation-error :errors="apiValidationErrors.last_name"/>
                    </md-field>


                    <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                        <md-icon>email</md-icon>
                        <label>Email</label>
                        <md-input v-model="email"/>
                        <validation-error :errors="apiValidationErrors.email"/>
                    </md-field>

                    <md-field class="md-form-group md-invalid" style="margin-bottom: 2rem">
                        <md-icon>lock_outline</md-icon>
                        <label>Password</label>
                        <md-input v-model="password" type="password"/>
                        <validation-error :errors="apiValidationErrors.password"/>
                    </md-field>

                    <md-field class="md-form-group md-invalid">
                        <md-icon>lock_outline</md-icon>
                        <label>Confirm Password</label>
                        <md-input v-model="password_confirmation" type="password"/>
                        <validation-error :errors="apiValidationErrors.password_confirmation"/>
                    </md-field>

                    <md-checkbox v-model="boolean">I agree to the <a>terms and conditions</a>.</md-checkbox>

                    <div class="button-container">
                        <md-button class="md-success md-round mt-4" @click="register" slot="footer" disabled>
                            Get Started
                        </md-button>
                    </div>

                </div>
            </signup-card>
        </div>
    </div>
</template>
<script>
import {SignupCard, ValidationError} from "@/components";
import formMixin from "@/mixins/form-mixin";

export default {
    components: {
        SignupCard, ValidationError
    },
    mixins: [formMixin],
    data() {
        return {
            enableRegistration:false,
            username: null,
            first_name: null,
            last_name: null,
            boolean: false,
            email: null,
            role: 1,
            password: null,
            password_confirmation: null,
            contentLeft: [
                {
                    colorIcon: "icon-success",
                    icon: "timeline",
                    title: "Marketing",
                    description:
                        "We've created the marketing campaign of the website. It was a very interesting collaboration."
                },

                {
                    colorIcon: "icon-danger",
                    icon: "code",
                    title: "Fully Coded in HTML5",
                    description:
                        "We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub."
                },

                {
                    colorIcon: "icon-info",
                    icon: "group",
                    title: "Built Audience",
                    description:
                        "There is also a Fully Customizable CMS Admin Dashboard for this product."
                }
            ]
        };
    },

    methods: {
        async register() {
            if(this.enableRegistration) {
                if (!this.boolean) {
                    await this.$store.dispatch("alerts/error", "You need to agree with our terms and conditions.")
                    return
                }

                const user = {
                    username: this.username,
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                };

                const requestOptions = {
                    headers: {
                        'Accept': 'application/vnd.api+json',
                        'Content-Type': 'application/vnd.api+json',
                    }
                }

                try {
                    await this.$store.dispatch("register", {user, requestOptions})
                    await this.$store.dispatch("alerts/success", "Successfully registered.")
                } catch (e) {
                    await this.$store.dispatch("alerts/error", "Oops, something went wrong")
                    this.setApiValidation(e.response.data.errors)
                }
            }
        }
    }
};
</script>
