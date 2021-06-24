(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Posts_NewPost_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Header.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Sidebar.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Footer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_toastification__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-toastification */ "./node_modules/vue-toastification/dist/esm/index.js");
/* harmony import */ var vue_toastification_dist_index_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-toastification/dist/index.css */ "./node_modules/vue-toastification/dist/index.css");
/* harmony import */ var vue_toastification_dist_index_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_toastification_dist_index_css__WEBPACK_IMPORTED_MODULE_3__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Header: Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Header.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    Sidebar: Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Sidebar.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    Footer: Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../../layout/Admin/Footer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())
  },
  data: function data() {
    return {
      imagepost: null,
      postid: null,
      form: {
        title: '',
        body: '',
        image: null
      }
    };
  },
  methods: {
    uploadImage: function uploadImage(event) {
      var _this = this;

      var reader = new FileReader();
      var file = event.target.files[0];
      this.form.image = event.target.files[0];
      reader.readAsDataURL(file);

      reader.onload = function (e) {
        _this.imagepost = e.target.result;
      };
    },
    postData: function postData() {
      var _this2 = this;

      var data = new FormData();
      data.append('title', this.form.title);
      data.append('body', this.form.body);
      data.append('image', this.form.image);
      var config = {
        method: 'post',
        url: '/api/dashboard/post',
        headers: {
          'Accept': 'application/json, multipart/form-data',
          'Authorization': "Bearer ".concat(sessionStorage.token)
        },
        data: data
      };

      if (this.form.title == '') {
        this.$toast.error('title Post is required', {
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
      } else if (this.form.body == '') {
        this.$toast.error('Post Details is required', {
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
      } else if (this.form.image == null) {
        this.$toast.error('Image Post is required', {
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
      } else {
        axios__WEBPACK_IMPORTED_MODULE_1___default()(config).then(function (response) {
          console.log(response.data);

          _this2.$toast.success(response.data.msg, {
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

          _this2.postid = response.data.post.id;
          document.getElementById('saveBtn').style.display = 'none';
          document.getElementById('updateBtn').classList.remove('d-none');
        })["catch"](function (error) {
          console.log(error.response);

          _this2.$toast.error(error.response.data.message, {
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
    postDataUpdate: function postDataUpdate() {
      var _this3 = this;

      var data = new FormData();
      data.append('title', this.form.title);
      data.append('body', this.form.body);
      data.append('image', this.form.image);
      var configUpdate = {
        method: 'put',
        url: '/api/dashboard/post/' + this.postid,
        headers: {
          'Accept': 'application/json, multipart/form-data',
          'Authorization': "Bearer ".concat(sessionStorage.token)
        },
        data: data
      };

      if (this.form.title == '') {
        this.$toast.error('title Post is required', {
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
      } else if (this.form.body == '') {
        this.$toast.error('Post Details is required', {
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
      } else if (this.form.image == null) {
        this.$toast.error('Image Post is required', {
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
      } else {
        axios__WEBPACK_IMPORTED_MODULE_1___default()(configUpdate).then(function (response) {
          console.log(response.data);

          _this3.$toast.success(response.data.msg, {
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

          _this3.postid = response.data.post.id;
          document.getElementById('saveBtn').style.display = 'none';
          document.getElementById('updateBtn').classList.remove('d-none');
        })["catch"](function (error) {
          console.log(error.response);

          _this3.$toast.error(error.response.data.message, {
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
  }
});

/***/ }),

/***/ "./resources/js/Pages/Admin/Posts/NewPost.vue":
/*!****************************************************!*\
  !*** ./resources/js/Pages/Admin/Posts/NewPost.vue ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NewPost.vue?vue&type=template&id=421745ea& */ "./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea&");
/* harmony import */ var _NewPost_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NewPost.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _NewPost_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__.render,
  _NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Posts/NewPost.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPost_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NewPost.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPost_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea&":
/*!***********************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPost_vue_vue_type_template_id_421745ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NewPost.vue?vue&type=template&id=421745ea& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Posts/NewPost.vue?vue&type=template&id=421745ea& ***!
  \**************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("Header"),
      _vm._v(" "),
      _c("Sidebar"),
      _vm._v(" "),
      _c("main", [
        _c("div", { staticClass: "container-fluid" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("input", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.form.title,
                expression: "form.title"
              }
            ],
            staticClass: "form-control mb-3",
            attrs: { type: "text", placeholder: "Post Name" },
            domProps: { value: _vm.form.title },
            on: {
              input: function($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.$set(_vm.form, "title", $event.target.value)
              }
            }
          }),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-12 col-md-12 col-xl-8 col-left" }, [
              _c("div", { staticClass: "card mb-4" }, [
                _c("div", { staticClass: "card-body" }, [
                  _c("h5", { staticClass: "card-title" }, [
                    _vm._v("Post Details")
                  ]),
                  _vm._v(" "),
                  _c("textarea", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.body,
                        expression: "form.body"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { rows: "19" },
                    domProps: { value: _vm.form.body },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "body", $event.target.value)
                      }
                    }
                  })
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12 col-md-12 col-xl-4 col-right" }, [
              _c("div", { staticClass: "card mb-4" }, [
                _vm._m(1),
                _vm._v(" "),
                _c("div", { staticClass: "card-body" }, [
                  _c("h5", { staticClass: "card-title" }, [
                    _vm._v("Save / Update")
                  ]),
                  _vm._v(" "),
                  _c("div", [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-outline-success w-100",
                        attrs: { id: "saveBtn" },
                        on: { click: _vm.postData }
                      },
                      [_vm._v("save")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn d-none btn-outline-warning w-100",
                        attrs: { id: "updateBtn" },
                        on: { click: _vm.postDataUpdate }
                      },
                      [_vm._v("update")]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card mb-4" }, [
                _c("div", { staticClass: "card-body" }, [
                  _c("h5", { staticClass: "card-title" }, [
                    _vm._v("Image Post")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    ref: "imageInput",
                    staticStyle: { display: "none" },
                    attrs: { type: "file" },
                    on: { change: _vm.uploadImage }
                  }),
                  _vm._v(" "),
                  _c("img", {
                    staticClass: "mb-3",
                    staticStyle: { width: "100%", "border-radius": "10px" },
                    attrs: { src: _vm.imagepost, id: "postImage" }
                  }),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-outline-info w-100",
                      on: {
                        click: function($event) {
                          return _vm.$refs.imageInput.click()
                        }
                      }
                    },
                    [_vm._v("upload image")]
                  )
                ])
              ]),
              _vm._v(" "),
              _vm._m(2)
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("Footer")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-12" }, [
        _c("div", { staticClass: "mb-2" }, [
          _c("h1", [_vm._v("Extensive Infomediaries")]),
          _vm._v(" "),
          _c(
            "nav",
            {
              staticClass:
                "breadcrumb-container d-none d-sm-block d-lg-inline-block",
              attrs: { "aria-label": "breadcrumb" }
            },
            [
              _c("ol", { staticClass: "breadcrumb pt-0" }, [
                _c("li", { staticClass: "breadcrumb-item" }, [
                  _c("a", { attrs: { href: "#" } }, [_vm._v("Home")])
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "breadcrumb-item" }, [
                  _c("a", { attrs: { href: "#" } }, [_vm._v("Library")])
                ]),
                _vm._v(" "),
                _c(
                  "li",
                  {
                    staticClass: "breadcrumb-item active",
                    attrs: { "aria-current": "page" }
                  },
                  [_vm._v("Data")]
                )
              ])
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "separator mb-5" })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "position-absolute card-top-buttons" }, [
      _c("button", { staticClass: "btn btn-header-light icon-button" }, [
        _c("i", { staticClass: "simple-icon-refresh" })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card mb-4" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("h5", { staticClass: "card-title" }, [_vm._v("Categories")])
      ])
    ])
  }
]
render._withStripped = true



/***/ })

}]);