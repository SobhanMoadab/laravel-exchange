<template>
<div>
    <div class="fixed-background"></div>

    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">
                            <p class=" text-white h2">MAGIC IS IN THE DETAILS</p>
                            <p class="white mb-0">
                                Please use this form to register.
                                <br>If you are a member, please
                                <a href="#" class="white">login</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="Dashboard.Default.html">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Register</h6>

                            <form v-on:submit.prevent="formsubmit">
                            <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input v-model="form.email" class="form-control"  id="email"/>
                                </div>
                                 <div class="form-group">
                                    <label for="password"> password</label>
                                    <input class="form-control" v-model="form.password" id="password"type="password"  placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation"> password confirmation </label>
                                    <input class="form-control" v-model="form.password_confirmation" id="password_confirmation" type="password" placeholder="" />                                
                                </div>
                            <div class="form-group">
                                <label for="country">country</label>
                                <select class="form-control" v-model="form.country_id" required id="country" >
                                <option value="" selected>Choose country</option>
                                <option  v-for="country in countrys" :key="country.id" :value="country.id" >{{country.name}}</option>
                                
                                </select>
                            </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow">REGISTER</button>
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
import {Fragment} from 'vue-fragment';
import axios from 'axios';
import Vue from "vue";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

Vue.use(Toast, {
  transition: "Vue-Toastification__fade",
  maxToasts: 3,
  newestOnTop: true
});
export default {
    name: 'Register',
    component:{
        Fragment
    },
    data() {
        return{
        countrys:null,
        form:{
           email: 'test@test.com',
           password: '123456',
           password_confirmation:'123456',
           country_id:''
        }

        }
    },
    methods: {

        formsubmit(){
                if (!this.form.email) {
                this.$toast.error('email is required', {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
                });  
                          }
            else if (!this.form.password) {
                        this.$toast.error('password is required', {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
                }); 
            } 
            else{

                 axios.post('/api/register', this.form)
                .then((res) => {
                console.log(res)
                 this.$toast.success("You are registered !!", {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
                });
                sessionStorage.token = res.data.token;
                setTimeout(() => {this.$router.push("/login")}, 1000);
            })
            .catch((e) => {
                 console.log(e.response)
                if(e.response.data.errors.email){
                this.$toast.error(e.response.data.errors.email.[0], {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
                });
                }else if(e.response.data.errors.password){
                    console.log('saalm')
                    for(let i = 0; i < e.response.data.errors.password.length; i++ ){
                this.$toast.error(e.response.data.errors.password.[i], {
                position: "top-right",
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
                });
                console.log(i)
                    }
                }
            })
            }        
        }
    },
    mounted() {
            axios.get('https://api.countrystatecity.in/v1/countries',{ 
                headers:{"X-CSCAPI-KEY": 'UGR3bHNNZU8zQWpwS2VnMElDeUVlQ3ZtcDI4eDdSWWpnTG5uZTNKNw=='}
                })
                .then((res)=> {
                    this.countrys = res.data;
                }).catch((error)=> {
                    console.log(error)
                })
    },

}
</script>