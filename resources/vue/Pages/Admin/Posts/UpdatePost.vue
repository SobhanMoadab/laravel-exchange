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

            <form v-on:submit.prevent="postData">
                <input type="text" class="form-control mb-3" v-model="data.title" placeholder="Post Name">

             <div class="row">
                <div class="col-12 col-md-12 col-xl-8 col-left">
                    <div class="card mb-4">
                     
                        <div class="card-body">
                          <textarea v-model="data.body" class="form-control"></textarea>

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
                                <button class="btn btn-outline-warning w-100">update</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Image Post</h5>


                                <input type="file" id="file" :value="data.image" ref="image" v-on:change="uploadImage()"/>
                                <button class="btn btn-outline-info w-100">upload</button>

                        </div>
                    </div> 
                     <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>

                            

                        </div>
                    </div>
                </div>
                
            </div>
            </form>
        </div>

    </main>

    <Footer />
</div>
</template>
<script>
import Header from '../../../layout/Admin/Header.vue'
import Sidebar from '../../../layout/Admin/Sidebar.vue'
import Footer from '../../../layout/Admin/Footer.vue'
import axios from 'axios'
export default {
         components:{
        Header,
        Sidebar,
        Footer
    }, 
    data(){
        return{
        data:{
            title:'',
            body: '',
            image:'',
        }

        }
    },
    methods: {
            uploadImage(){
              this.data.image =  this.$refs.image.files[0]
            },
            postData(){
                console.log(this.data)
                 axios.get('/api/dashboard/post?page=1',{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
                .then((res) => {
                    console.log(res)
                }).catch((e)=>{
                    console.log(e.response)
                })
            }
    },
}
</script>