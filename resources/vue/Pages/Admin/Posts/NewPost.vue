<template>
 <div>
 <Header />
 <Sidebar/>
  <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Extensive Infomediaries</h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Library</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

           
                <input type="text" class="form-control mb-3" v-model="form.title" placeholder="Post Name">

             <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                        <div class="card-body">
                        <h5 class="card-title">Post Details</h5>
                          <textarea v-model="form.body" class="form-control" rows="19"></textarea>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-xl-4 col-right">

                    <div class="card mb-4">
                        <div class="position-absolute card-top-buttons">
                            <button class="btn btn-header-light icon-button">
                                <i class="simple-icon-refresh"></i>
                            </button>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Save / Update</h5>
                            <div>
                                <button id="saveBtn" @click="postData"  class="btn btn-outline-success w-100">save</button>
                                <button id="updateBtn" @click="postDataUpdate" class="btn d-none btn-outline-warning w-100">update</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Image Post</h5>
                                <input type="file" style="display:none;" v-on:change="uploadImage" ref="imageInput"/>
                                <img :src="imagepost" class="mb-3" style="width: 100%; border-radius:10px;" id="postImage"/>
                                <button @click="$refs.imageInput.click()" class="btn btn-outline-info w-100">upload image</button>
                        </div>
                      </div> 
                     <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>

                            

                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </main>

    <Footer />
</div>
</template>
<script>
import Header from '../../../layout/Admin/Header.vue';
import Sidebar from '../../../layout/Admin/Sidebar.vue';
import Footer from '../../../layout/Admin/Footer.vue';
import axios from 'axios';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
export default {
         components:{
        Header,
        Sidebar,
        Footer
    }, 
    data(){
        return{
            imagepost: null,
            postid: null ,
        form:{
            title:'',
            body: '',
            image: null,
        }

        }
    },
    methods: {
            uploadImage(event){
            
            let reader = new FileReader();
            const file = event.target.files[0];
           this.form.image = event.target.files[0];
            reader.readAsDataURL(file);
            reader.onload = e => {
                this.imagepost = e.target.result;
            }
            },
            postData(){
                var data = new FormData();
                data.append('title', this.form.title);
                data.append('body', this.form.body);
                data.append('image',  this.form.image);
                var config = {
                method: 'post',
                url: '/api/dashboard/post',
                headers: { 'Accept': 'application/json, multipart/form-data' ,'Authorization': `Bearer ${sessionStorage.token}`},
                data : data
                };
               if(this.form.title == ''){
                   this.$toast.error( 'title Post is required' , {
                position: "bottom-left",
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
               else if(this.form.body == ''){
                this.$toast.error(  'Post Details is required', {
                position: "bottom-left",
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
               else if (this.form.image == null){

                this.$toast.error( 'Image Post is required'  , {
                position: "bottom-left",
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
                axios(config)
                .then((response) => {
                console.log(response.data);
                this.$toast.success(    response.data.msg  , {
                position: "bottom-left",
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
                this.postid = response.data.post.id;
                document.getElementById('saveBtn').style.display = 'none';
                document.getElementById('updateBtn').classList.remove('d-none');
                })
                .catch((error) => {
                console.log(error.response);
                this.$toast.error(error.response.data.message  , {
                position: "bottom-left",
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
                });
               }
            },
            postDataUpdate(){
                var data = new FormData();
                data.append('title', this.form.title);
                data.append('body', this.form.body);
                data.append('image',  this.form.image);
                 var configUpdate = {
                method: 'put',
                url: '/api/dashboard/post/'+this.postid,
                headers: { 'Accept': 'application/json, multipart/form-data' ,'Authorization': `Bearer ${sessionStorage.token}`},
                data : data
                };

               if(this.form.title == ''){
                   this.$toast.error( 'title Post is required' , {
                position: "bottom-left",
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
               else if(this.form.body == ''){
                this.$toast.error(  'Post Details is required', {
                position: "bottom-left",
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
               else if (this.form.image == null){

                this.$toast.error( 'Image Post is required'  , {
                position: "bottom-left",
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
                axios(configUpdate)
                .then((response) => {
                console.log(response.data);
                this.$toast.success(    response.data.msg  , {
                position: "bottom-left",
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
                this.postid = response.data.post.id;
                document.getElementById('saveBtn').style.display = 'none';
                document.getElementById('updateBtn').classList.remove('d-none');
                })
                .catch((error) => {
                console.log(error.response);
                this.$toast.error(error.response.data.message  , {
                position: "bottom-left",
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
                });
               }
            }
    },
}
</script>
<style>
</style>
