<template>
<div>
    <div class="fixed-backgrounds"></div>

        <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">MAGIC IS IN THE DETAILS</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="#" class="white">register</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="Dashboard.Default.html">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Login</h6>
                            <form v-on:submit.prevent="formsubmit">
                                <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input v-model="form.email" class="form-control"  id="email"/>
                                </div>
                                 <div class="form-group">
                                    <label for="password"> password</label>
                                    <input class="form-control" v-model="form.password" id="password"type="password"  placeholder=""/>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Forget password?</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</template>
<script>
import axios from 'axios';
import Vue from "vue";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

Vue.use(Toast, {
  transition: "Vue-Toastification__fade",
  maxToasts: 20,
  newestOnTop: true
});
export default {
    name: 'Logins',

    data() {
        return{
        form:{
           email: "",
           password: ""
        }
        }
    },
    methods: {

        formsubmit(){
                if (!this.form.email) {
                this.$toast.error('Email is required', {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: "button",
                icon: true,
                rtl: false
                });  
                          }
            else if (!this.form.password) {
                this.$toast.error('Password is required', {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: "button",
                icon: true,
                rtl: false
                });  
            } 
            else{

                 axios.post('/api/login', this.form)
            .then((res) => {
                 this.$toast.success(res.data.msg, {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: "button",
                icon: true,
                rtl: false
                });
                sessionStorage.token = res.data.token;
                setTimeout(() => {this.$router.push("/admin")}, 1000);
            })
            .catch((e) => {
                
                this.$toast.error(e.response.data.msg, {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: "button",
                icon: true,
                rtl: false
                });
            })

            }      
           
        }
    },
    mounted() {
    },

}
</script>