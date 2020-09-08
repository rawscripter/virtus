<template >
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" @submit.prevent="login">
                <span class="contact100-form-title">
                Please Login!
                </span>

                <label class="label-input100" for="username">Username*</label>
                <div class="wrap-input100">
                    <input id="username" class="input100" type="text" v-model="username" placeholder="Eg. Tdm1287" required>
                    <span class="focus-input100"></span>
                </div>

                <label class="label-input100" for="password">Password*</label>
                <div class="wrap-input100">
                    <input id="password" class="input100" type="password" v-model="password"  placeholder="" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        Login
                    </button>
                </div>
            </form>
            <div class="contact100-more flex-col-c-m" style="background-image: url('../assets/images/bgr.jpg');">

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                             <span class="txt1 p-r-25">
                       <i class="fas fa-phone-square-alt"></i>
                    </span>
                    </div>
                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                        Lets Talk
                        </span>
                        <span class="txt3">
                        (919) 275-5388
                        </span>
                    </div>
                </div>
                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="txt1 p-r-25">
                        <i class="far fa-envelope"></i>
                         </span>
                    </div>
                    <div class="flex-col size2">

                        <span class="txt1 p-b-20">
                        General Support
                        </span>
                        <span class="txt3">
                        contact@trianglecashhomes.com
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                username : "",
                password : ""
            }
        },
        methods: {
            login: function () {
                let username = this.username
                let password = this.password
                this.$store.dispatch('login', { username, password })
                    .then(() => this.$router.push('/dashboard'))
                    .catch(err => console.log(err))
            }
        }
    }
</script>

<style scoped>

</style>
