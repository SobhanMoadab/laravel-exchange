<template>
<div> 
<Header />
<Sidebar />
  <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h1>Product Thumbs</h1>
                        <div class="text-zero top-right-button-container">
                            <button type="button" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW</button>
                            <div class="btn-group">
                                <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
                                    <label class="custom-control custom-checkbox mb-0 d-inline-block">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </div>
                                <button type="button"
                                    class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </div>
                            </div>
                        </div>
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

                    <div class="mb-2">
                        <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                            role="button" aria-expanded="true" aria-controls="displayOptions">
                            Display Options
                            <i class="simple-icon-arrow-down align-middle"></i>
                        </a>
                        <div class="collapse d-md-block" id="displayOptions">
                          
                            <div class="d-block d-md-inline-block">
                                <div class="btn-group float-md-left mr-1 mb-1">
                                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Order By
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </div>
                                <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                    <input placeholder="Search...">
                                </div>
                            </div>
                            <div class="float-md-right">
                                <span class="text-muted text-small">Displaying 1-10 of 210 items </span>
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    20
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item active" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row" >
                <div class="col-12 list"  data-check-all="checkAll">

                    <div class="card d-flex flex-row mb-3" v-for="blog in blogs.data" :key="blog.id">
                        <a class="d-flex" href="#">
                            <img :src="'/images/post/'+blog.image_path" alt="Fat Rascal"
                                class="list-thumbnail responsive border-0 card-img-left" />
                        </a>
                        <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                            <div
                                class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                <a href="Pages.Product.Detail.html" class="w-40 w-sm-100">
                                    <p class="list-item-heading mb-0 truncate">{{blog.title}}</p>
                                </a>
                                <p class="mb-0 text-muted text-small w-15 w-sm-100">Cupcakes</p>
                                <p class="mb-0 text-muted text-small w-15 w-sm-100">{{blog.updated_at}}</p>
                                <div class="w-15 w-sm-100 d-flex">
                                    <!-- <span  class="badge badge-pill badge-primary">PROCESSED</span> -->
                                    <a v-on:click="delPost(blog.id)" class="badge badge-pill badge-danger text-white">Delete</a>
                                </div>
                            </div>
                            <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </div>


                    <nav class="mt-4 mb-3">
                        <ul class="pagination justify-content-center mb-0" >
                            <li class="page-item ">
                                <a class="page-link first"  v-on:click="firstPageUrl(blogs.first_page_url)"  href="#">
                                    <i class="simple-icon-control-start"></i>
                                </a>
                            </li> <!--
                            <li class="page-item ">
                                <a class="page-link prev" href="#">
                                    <i class="simple-icon-arrow-left"></i>
                                </a>
                            </li> -->
                            <li   v-for="blog in blogs.links"  :class="{'page-item active' : blog.active == true, 'page-item' :  blog.active == false}">
                                <a class="page-link" v-on:click="pagination(blog.url)" href="#">{{blog.label}}</a>
                            </li>
                           
                           <!-- <li class="page-item ">
                                <a class="page-link next" href="#" aria-label="Next">
                                    <i class="simple-icon-arrow-right"></i>
                                </a>
                            </li> -->
                            <li class="page-item ">
                                <a class="page-link last" v-on:click="lastPageUrl(blogs.last_page_url)" href="#">
                                    <i class="simple-icon-control-end"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </main>
     <Footer />


<!--
    <main>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Datatables Rows</h1>

                    <div class="top-right-button-container">
                        <div class="btn-group">
                            <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                EXPORT
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                                <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                                <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                                <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                            </div>
                        </div>
                    </div>

                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Posts</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">NewPost</li>
                        </ol>
                    </nav>
                    <div class="mb-2">
                        <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                            role="button" aria-expanded="true" aria-controls="displayOptions">
                            Display Options
                            <i class="simple-icon-arrow-down align-middle"></i>
                        </a>
                        <div class="collapse dont-collapse-sm" id="displayOptions">
                            <div class="d-block d-md-inline-block">
                                <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                    <input class="form-control" placeholder="Search Table" id="searchDatatable">
                                </div>
                            </div>
                            <div class="float-md-right dropdown-as-select" id="pageCountDatatable">
                                <span class="text-muted text-small">Displaying 1-10 of 40 items </span>
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    10
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">2</a>
                                    <a class="dropdown-item active" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
                    <table id="datatableRows" class="data-table responsive nowrap"
                        data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sales</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th class="empty">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="list-item-heading">Marble Cake</p>
                                </td>
                                <td>
                                    <p class="text-muted">1452</p>
                                </td>
                                <td>
                                    <p class="text-muted">62</p>
                                </td>
                                <td>
                                    <p class="text-muted">Cupcakes</p>
                                </td>
                                <td>
                                    <label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <p class="list-item-heading">Kransekake</p>
                                </td>
                                <td>
                                    <p class="text-muted">1356</p>
                                </td>
                                <td>
                                    <p class="text-muted">27</p>
                                </td>
                                <td>
                                    <p class="text-muted">Desserts</p>
                                </td>
                                <td>
                                    <label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="list-item-heading">Aranygaluska</p>
                                </td>
                                <td>
                                    <p class="text-muted">1323</p>
                                </td>
                                <td>
                                    <p class="text-muted">57</p>
                                </td>
                                <td>
                                    <p class="text-muted">Desserts</p>
                                </td>
                                <td>
                                    <label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="list-item-heading">Lamington</p>
                                </td>
                                <td>
                                    <p class="text-muted">1301</p>
                                </td>
                                <td>
                                    <p class="text-muted">11</p>
                                </td>
                                <td>
                                    <p class="text-muted">Cakes</p>
                                </td>
                                <td>
                                    <label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </main>
    -->

  </div>
</template>
<script>
  import { ContentLoader } from "vue-content-loader"
import Header from '../../../layout/Admin/Header.vue'
import Sidebar from '../../../layout/Admin/Sidebar.vue'
import Footer from '../../../layout/Admin/Footer.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
export default {
     components:{
        Header,
        Sidebar,
        Footer,
        ContentLoader
    },
data:() => ({
    imagepost: null,
    blogs:''
}),

methods: {
    getData() {
        
        axios.get('/api/dashboard/post',{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
        .then((result) => {
            this.blogs = result.data.posts
        console.log(result)
        })
   
},
    delPost(id){
        axios.delete('/api/dashboard/post/'+id,{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
        .then((res) => {
            this.getData();
            })

    }  ,
    pagination(url){
         axios.get(url,{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
        .then((result) => {
        this.blogs = result.data.posts
        })
    },
    firstPageUrl(first){
         axios.get(first,{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
        .then((result) => {
        this.blogs = result.data.posts
        })
    },
    lastPageUrl(last){
         axios.get(last,{headers: {Authorization:`Bearer ${sessionStorage.token}`}})
        .then((result) => {
        this.blogs = result.data.posts
        })
    }
},
mounted() {
this.getData()
},
}
</script>