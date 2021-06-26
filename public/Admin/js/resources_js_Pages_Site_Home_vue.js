(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Site_Home_vue"],{

/***/ "./node_modules/babel-helper-vue-jsx-merge-props/index.js":
/*!****************************************************************!*\
  !*** ./node_modules/babel-helper-vue-jsx-merge-props/index.js ***!
  \****************************************************************/
/***/ ((module) => {

var nestRE = /^(attrs|props|on|nativeOn|class|style|hook)$/

module.exports = function mergeJSXProps (objs) {
  return objs.reduce(function (a, b) {
    var aa, bb, key, nestedKey, temp
    for (key in b) {
      aa = a[key]
      bb = b[key]
      if (aa && nestRE.test(key)) {
        // normalize class
        if (key === 'class') {
          if (typeof aa === 'string') {
            temp = aa
            a[key] = aa = {}
            aa[temp] = true
          }
          if (typeof bb === 'string') {
            temp = bb
            b[key] = bb = {}
            bb[temp] = true
          }
        }
        if (key === 'on' || key === 'nativeOn' || key === 'hook') {
          // merge functions
          for (nestedKey in bb) {
            aa[nestedKey] = mergeFn(aa[nestedKey], bb[nestedKey])
          }
        } else if (Array.isArray(aa)) {
          a[key] = aa.concat(bb)
        } else if (Array.isArray(bb)) {
          a[key] = [aa].concat(bb)
        } else {
          for (nestedKey in bb) {
            aa[nestedKey] = bb[nestedKey]
          }
        }
      } else {
        a[key] = b[key]
      }
    }
    return a
  }, {})
}

function mergeFn (a, b) {
  return function () {
    a && a.apply(this, arguments)
    b && b.apply(this, arguments)
  }
}


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue_content_loader__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-content-loader */ "./node_modules/vue-content-loader/dist/vue-content-loader.es.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
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
    ContentLoader: vue_content_loader__WEBPACK_IMPORTED_MODULE_1__.ContentLoader
  },
  name: 'CryptoBar',
  data: function data() {
    return {
      ETHBUSD: '',
      BNBBUSD: '',
      BTCBUSD: '',
      FILBUSD: '',
      ADABUSD: '',
      LTCBTC: ''
    };
  },
  methods: {
    getCrypto: function getCrypto() {// axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=ETHBUSD').then((res) => {this.binance.ETHBUSD =  res.data.lastPrice}),
      // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=BNBBUSD').then((res) => {this.binance.BNBBUSD = res.data.lastPrice }),
      // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=BTCBUSD').then((res) => {this.binance.BTCBUSD = res.data.lastPrice }),
      // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=FILBUSD').then((res) => {this.binance.FILBUSD = res.data.lastPrice }),
      // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=ADABUSD').then((res) => {this.binance.ADABUSD = res.data.lastPrice }),
      // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=LTCBTC').then((res) => {this.binance.LTCBTC =res.data.lastPrice })
    }
  },
  created: function created() {
    var _this = this;

    this.BNB = new WebSocket("wss://stream.binance.com:9443/stream?streams=ethusdt@ticker/btcusdt@ticker");
    this.ETH = new WebSocket("wss://stream.binance.com:9443/ws/ethusdt@ticker");
    this.BTC = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@ticker");
    this.FIL = new WebSocket("wss://stream.binance.com:9443/ws/filusdt@ticker");
    this.ADA = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@ticker");
    this.LTC = new WebSocket("wss://stream.binance.com:9443/ws/dogeusdt@ticker");

    this.BNB.onmessage = function (event) {
      _this.BNBBUSD = JSON.parse(event.data);
    }; // this.BNB.onopen = (event) => {
    // console.log(event)
    // }


    this.ETH.onmessage = function (event) {
      _this.ETHBUSD = JSON.parse(event.data);
    };

    this.BTC.onmessage = function (event) {
      _this.BTCBUSD = JSON.parse(event.data);
    };

    this.FIL.onmessage = function (event) {
      _this.FILBUSD = JSON.parse(event.data);
    };

    this.ADA.onmessage = function (event) {
      _this.ADABUSD = JSON.parse(event.data);
    };

    this.LTC.onmessage = function (event) {
      _this.LTCBUSD = JSON.parse(event.data);
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../layout/Site/Header.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../layout/Site/Footer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _Components_crypto_CryptoBar_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Components/crypto/CryptoBar.vue */ "./resources/js/Components/crypto/CryptoBar.vue");
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
  name: 'HomePage',
  components: {
    Header: Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../layout/Site/Header.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    Footer: Object(function webpackMissingModule() { var e = new Error("Cannot find module '../../layout/Site/Footer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    CryptoBar: _Components_crypto_CryptoBar_vue__WEBPACK_IMPORTED_MODULE_1__.default
  }
});

/***/ }),

/***/ "./node_modules/vue-content-loader/dist/vue-content-loader.es.js":
/*!***********************************************************************!*\
  !*** ./node_modules/vue-content-loader/dist/vue-content-loader.es.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ContentLoader": () => (/* binding */ ContentLoader),
/* harmony export */   "BulletListLoader": () => (/* binding */ BulletListLoader),
/* harmony export */   "CodeLoader": () => (/* binding */ CodeLoader),
/* harmony export */   "FacebookLoader": () => (/* binding */ FacebookLoader),
/* harmony export */   "ListLoader": () => (/* binding */ ListLoader),
/* harmony export */   "InstagramLoader": () => (/* binding */ InstagramLoader)
/* harmony export */ });
/* harmony import */ var babel_helper_vue_jsx_merge_props__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! babel-helper-vue-jsx-merge-props */ "./node_modules/babel-helper-vue-jsx-merge-props/index.js");
/* harmony import */ var babel_helper_vue_jsx_merge_props__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(babel_helper_vue_jsx_merge_props__WEBPACK_IMPORTED_MODULE_0__);


var uid = (function () {
  return Math.random().toString(36).substring(2);
});

var ContentLoader = {
  name: 'ContentLoader',
  functional: true,
  props: {
    width: {
      type: [Number, String],
      "default": 400
    },
    height: {
      type: [Number, String],
      "default": 130
    },
    speed: {
      type: Number,
      "default": 2
    },
    preserveAspectRatio: {
      type: String,
      "default": 'xMidYMid meet'
    },
    baseUrl: {
      type: String,
      "default": ''
    },
    primaryColor: {
      type: String,
      "default": '#f9f9f9'
    },
    secondaryColor: {
      type: String,
      "default": '#ecebeb'
    },
    primaryOpacity: {
      type: Number,
      "default": 1
    },
    secondaryOpacity: {
      type: Number,
      "default": 1
    },
    uniqueKey: {
      type: String
    },
    animate: {
      type: Boolean,
      "default": true
    }
  },
  render: function render(h, _ref) {
    var props = _ref.props,
        data = _ref.data,
        children = _ref.children;
    var idClip = props.uniqueKey ? props.uniqueKey + "-idClip" : uid();
    var idGradient = props.uniqueKey ? props.uniqueKey + "-idGradient" : uid();
    return h("svg", babel_helper_vue_jsx_merge_props__WEBPACK_IMPORTED_MODULE_0___default()([data, {
      attrs: {
        viewBox: "0 0 " + props.width + " " + props.height,
        version: "1.1",
        preserveAspectRatio: props.preserveAspectRatio
      }
    }]), [h("rect", {
      style: {
        fill: "url(" + props.baseUrl + "#" + idGradient + ")"
      },
      attrs: {
        "clip-path": "url(" + props.baseUrl + "#" + idClip + ")",
        x: "0",
        y: "0",
        width: props.width,
        height: props.height
      }
    }), h("defs", [h("clipPath", {
      attrs: {
        id: idClip
      }
    }, [children || h("rect", {
      attrs: {
        x: "0",
        y: "0",
        rx: "5",
        ry: "5",
        width: props.width,
        height: props.height
      }
    })]), h("linearGradient", {
      attrs: {
        id: idGradient
      }
    }, [h("stop", {
      attrs: {
        offset: "0%",
        "stop-color": props.primaryColor,
        "stop-opacity": props.primaryOpacity
      }
    }, [props.animate ? h("animate", {
      attrs: {
        attributeName: "offset",
        values: "-2; 1",
        dur: props.speed + "s",
        repeatCount: "indefinite"
      }
    }) : null]), h("stop", {
      attrs: {
        offset: "50%",
        "stop-color": props.secondaryColor,
        "stop-opacity": props.secondaryOpacity
      }
    }, [props.animate ? h("animate", {
      attrs: {
        attributeName: "offset",
        values: "-1.5; 1.5",
        dur: props.speed + "s",
        repeatCount: "indefinite"
      }
    }) : null]), h("stop", {
      attrs: {
        offset: "100%",
        "stop-color": props.primaryColor,
        "stop-opacity": props.primaryOpacity
      }
    }, [props.animate ? h("animate", {
      attrs: {
        attributeName: "offset",
        values: "-1; 2",
        dur: props.speed + "s",
        repeatCount: "indefinite"
      }
    }) : null])])])]);
  }
};

var BulletListLoader = {
  name: 'BulletListLoader',
  functional: true,
  render: function render(h, _ref) {
    var data = _ref.data;
    return h(ContentLoader, data, [h("circle", {
      attrs: {
        cx: "10",
        cy: "20",
        r: "8"
      }
    }), h("rect", {
      attrs: {
        x: "25",
        y: "15",
        rx: "5",
        ry: "5",
        width: "220",
        height: "10"
      }
    }), h("circle", {
      attrs: {
        cx: "10",
        cy: "50",
        r: "8"
      }
    }), h("rect", {
      attrs: {
        x: "25",
        y: "45",
        rx: "5",
        ry: "5",
        width: "220",
        height: "10"
      }
    }), h("circle", {
      attrs: {
        cx: "10",
        cy: "80",
        r: "8"
      }
    }), h("rect", {
      attrs: {
        x: "25",
        y: "75",
        rx: "5",
        ry: "5",
        width: "220",
        height: "10"
      }
    }), h("circle", {
      attrs: {
        cx: "10",
        cy: "110",
        r: "8"
      }
    }), h("rect", {
      attrs: {
        x: "25",
        y: "105",
        rx: "5",
        ry: "5",
        width: "220",
        height: "10"
      }
    })]);
  }
};

var CodeLoader = {
  name: 'CodeLoader',
  functional: true,
  render: function render(h, _ref) {
    var data = _ref.data;
    return h(ContentLoader, data, [h("rect", {
      attrs: {
        x: "0",
        y: "0",
        rx: "3",
        ry: "3",
        width: "70",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "80",
        y: "0",
        rx: "3",
        ry: "3",
        width: "100",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "190",
        y: "0",
        rx: "3",
        ry: "3",
        width: "10",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "15",
        y: "20",
        rx: "3",
        ry: "3",
        width: "130",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "155",
        y: "20",
        rx: "3",
        ry: "3",
        width: "130",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "15",
        y: "40",
        rx: "3",
        ry: "3",
        width: "90",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "115",
        y: "40",
        rx: "3",
        ry: "3",
        width: "60",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "185",
        y: "40",
        rx: "3",
        ry: "3",
        width: "60",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "60",
        rx: "3",
        ry: "3",
        width: "30",
        height: "10"
      }
    })]);
  }
};

var FacebookLoader = {
  name: 'FacebookLoader',
  functional: true,
  render: function render(h, _ref) {
    var data = _ref.data;
    return h(ContentLoader, data, [h("rect", {
      attrs: {
        x: "70",
        y: "15",
        rx: "4",
        ry: "4",
        width: "117",
        height: "6.4"
      }
    }), h("rect", {
      attrs: {
        x: "70",
        y: "35",
        rx: "3",
        ry: "3",
        width: "85",
        height: "6.4"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "80",
        rx: "3",
        ry: "3",
        width: "350",
        height: "6.4"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "100",
        rx: "3",
        ry: "3",
        width: "380",
        height: "6.4"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "120",
        rx: "3",
        ry: "3",
        width: "201",
        height: "6.4"
      }
    }), h("circle", {
      attrs: {
        cx: "30",
        cy: "30",
        r: "30"
      }
    })]);
  }
};

var ListLoader = {
  name: 'ListLoader',
  functional: true,
  render: function render(h, _ref) {
    var data = _ref.data;
    return h(ContentLoader, data, [h("rect", {
      attrs: {
        x: "0",
        y: "0",
        rx: "3",
        ry: "3",
        width: "250",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "20",
        y: "20",
        rx: "3",
        ry: "3",
        width: "220",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "20",
        y: "40",
        rx: "3",
        ry: "3",
        width: "170",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "60",
        rx: "3",
        ry: "3",
        width: "250",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "20",
        y: "80",
        rx: "3",
        ry: "3",
        width: "200",
        height: "10"
      }
    }), h("rect", {
      attrs: {
        x: "20",
        y: "100",
        rx: "3",
        ry: "3",
        width: "80",
        height: "10"
      }
    })]);
  }
};

var InstagramLoader = {
  name: 'InstagramLoader',
  functional: true,
  render: function render(h, _ref) {
    var data = _ref.data;
    return h(ContentLoader, babel_helper_vue_jsx_merge_props__WEBPACK_IMPORTED_MODULE_0___default()([data, {
      attrs: {
        height: 480
      }
    }]), [h("circle", {
      attrs: {
        cx: "30",
        cy: "30",
        r: "30"
      }
    }), h("rect", {
      attrs: {
        x: "75",
        y: "13",
        rx: "4",
        ry: "4",
        width: "100",
        height: "13"
      }
    }), h("rect", {
      attrs: {
        x: "75",
        y: "37",
        rx: "4",
        ry: "4",
        width: "50",
        height: "8"
      }
    }), h("rect", {
      attrs: {
        x: "0",
        y: "70",
        rx: "5",
        ry: "5",
        width: "400",
        height: "400"
      }
    })]);
  }
};




/***/ }),

/***/ "./resources/js/Components/crypto/CryptoBar.vue":
/*!******************************************************!*\
  !*** ./resources/js/Components/crypto/CryptoBar.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CryptoBar.vue?vue&type=template&id=3b794bcf& */ "./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf&");
/* harmony import */ var _CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CryptoBar.vue?vue&type=script&lang=js& */ "./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__.render,
  _CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/crypto/CryptoBar.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Site/Home.vue":
/*!******************************************!*\
  !*** ./resources/js/Pages/Site/Home.vue ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Home.vue?vue&type=template&id=77ebb3ee& */ "./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee&");
/* harmony import */ var _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Home.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__.render,
  _Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Site/Home.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_3b794bcf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=template&id=3b794bcf& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf&");


/***/ }),

/***/ "./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee&":
/*!*************************************************************************!*\
  !*** ./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee& ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_template_id_77ebb3ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Home.vue?vue&type=template&id=77ebb3ee& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/crypto/CryptoBar.vue?vue&type=template&id=3b794bcf& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "horz-list" }, [
    _c("ul", [
      _c("li", [
        _c("i", { staticClass: "cc BTC " }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.BTCBUSD.c))
        ])
      ]),
      _vm._v(" "),
      _c("li", [
        _c("i", { staticClass: "cc ETH " }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.ETHBUSD.c))
        ])
      ]),
      _vm._v(" "),
      _c("li", [
        _c("i", { staticClass: "cc BNB " }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.BNBBUSD.c))
        ])
      ]),
      _vm._v(" "),
      _c("li", [
        _c("i", { staticClass: "cc FIL" }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.FILBUSD.c))
        ])
      ]),
      _vm._v(" "),
      _c("li", [
        _c("i", { staticClass: "cc ADA " }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.ADABUSD.c))
        ])
      ]),
      _vm._v(" "),
      _c("li", [
        _c("i", { staticClass: "cc DOGE " }),
        _vm._v("  $ "),
        _c("span", { staticClass: "coin-value" }, [
          _vm._v(_vm._s(this.LTCBTC.c))
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Site/Home.vue?vue&type=template&id=77ebb3ee& ***!
  \****************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "container" }, [
        _c(
          "div",
          {
            staticClass: "exchange-section data_background text-center",
            attrs: {
              "data-background": "/site/assets/images/exchange-background.png"
            }
          },
          [
            _c("CryptoBar"),
            _vm._v(" "),
            _c("h1", { staticClass: "text-center" }, [
              _vm._v(
                "Buy and sell Coins at the Cryptic without additional fees"
              )
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "text-center" }, [
              _vm._v(
                "Buy now and get +40% extra bonus Minimum pre-sale amount 25 Cryptic Coin. We accept\r\n                    BTC crypto-currency."
              )
            ]),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _c(
              "a",
              {
                staticClass: "btn btn-default button-element",
                attrs: { href: "tables.market-capitalizations.html" }
              },
              [_vm._v("EXCHANGE NOW")]
            )
          ],
          1
        ),
        _vm._v(" "),
        _c("div", { staticClass: "clearfix" }),
        _vm._v(" "),
        _c("div", { staticClass: "spacer_30" }),
        _vm._v(" "),
        _vm._m(1),
        _vm._v(" "),
        _vm._m(2)
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
    return _c("div", { staticClass: "exchange-calculator text-center" }, [
      _c("input", {
        attrs: {
          type: "text",
          name: "coins-exchange",
          placeholder: "",
          value: "0.04321"
        }
      }),
      _vm._v(" "),
      _c(
        "select",
        { staticClass: "coins-exchange", attrs: { name: "state" } },
        [
          _c("option", { attrs: { value: "BTC" } }, [_vm._v("BTC")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "BTC" } }, [_vm._v("Ethereum")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("Ripple")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [
            _vm._v("Bitcoin Cash")
          ]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("Cardano")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("Litecoin")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("NEO")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("Stellar")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("EOS")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "Ripple" } }, [_vm._v("NEM")])
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "equal" }, [_vm._v(" = ")]),
      _vm._v(" "),
      _c("input", {
        attrs: {
          type: "text",
          name: "money-exchange",
          placeholder: "",
          value: "33.4343"
        }
      }),
      _vm._v(" "),
      _c(
        "select",
        { staticClass: "money-exchange", attrs: { name: "state" } },
        [
          _c("option", { attrs: { value: "USD" } }, [_vm._v("USD")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "EURO" } }, [_vm._v("EURO")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "margin_left_right_30" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc BTC", attrs: { title: "BTC" } }),
                _vm._v(" Bitcoin BTC")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.00000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("BTC")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-success" }, [
                  _vm._v("+1.35%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_btc" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc LTC", attrs: { title: "LTC" } }),
                _vm._v(" Litecoin LTC")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.00000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("LTC")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-danger" }, [
                  _vm._v("-1.35%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_ltc" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc NEO", attrs: { title: "NEO" } }),
                _vm._v(" Neo NEO")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.00000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("NEO")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-danger" }, [
                  _vm._v("-1.35%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_neo" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc DASH", attrs: { title: "DASH" } }),
                _vm._v(" Dash DASH")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("DASH")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-success" }, [
                  _vm._v("+0.99%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_dash" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc ETH", attrs: { title: "ETH" } }),
                _vm._v(" Ethereum ETH")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.00000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("LTC")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-success" }, [
                  _vm._v("+0.35%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_eth" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-sm-6 col-lg-4" }, [
          _c("div", { staticClass: "panel panel-default exchange" }, [
            _c("div", { staticClass: "panel-body" }, [
              _c("h3", [
                _c("i", { staticClass: "cc XRP", attrs: { title: "XRP" } }),
                _vm._v(" Ripple XRP")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _vm._v("0.000434 "),
                  _c("span", { staticClass: "color-gray" }, [_vm._v("XRP")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-info" }, [_vm._v("$0.04")])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 text-right text-danger" }, [
                  _vm._v("-0.99%")
                ])
              ]),
              _vm._v(" "),
              _c("div", {
                staticClass: "highchart_currency",
                attrs: { id: "chart_ripple_xrp" }
              })
            ])
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "margin_left_right_30" }, [
      _c("div", { staticClass: "chart-section1" }, [
        _c("div", {}, [
          _c("div", { staticClass: "panel panel-default" }, [
            _c("div", { staticClass: "panel-heading" }, [
              _c("h3", { staticClass: "panel-title" }, [_vm._v("Depth Chart")])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "panel-body" }, [
              _c("div", {
                staticClass: "overflow-table",
                attrs: { id: "depthChart" }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-6 col-xs-12" }, [
              _c("div", { staticClass: "panel panel-default" }, [
                _c("div", { staticClass: "panel-heading" }, [
                  _c("h3", { staticClass: "panel-title" }, [
                    _c("span", { staticClass: "text-left" }, [
                      _vm._v("Sell Orders")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "panel-body" }, [
                  _c("div", { staticClass: "table-sellorders" }, [
                    _c(
                      "table",
                      {
                        staticClass:
                          "table table-striped table-hover pull-left no-margin"
                      },
                      [
                        _c("thead", [
                          _c("tr", [
                            _c("th", [_vm._v("Price")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("ETH")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("BTC")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("Sum(BTC)")])
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tbody", [
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ])
                        ])
                      ]
                    )
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-6 col-xs-12" }, [
              _c("div", { staticClass: "panel panel-default" }, [
                _c("div", { staticClass: "panel-heading" }, [
                  _c("h3", { staticClass: "panel-title" }, [
                    _c("span", { staticClass: "text-left" }, [
                      _vm._v("Buy Orders")
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "panel-body" }, [
                  _c("div", { staticClass: "table-buyorders" }, [
                    _c(
                      "table",
                      {
                        staticClass:
                          "table table-striped table-hover pull-left no-margin"
                      },
                      [
                        _c("thead", [
                          _c("tr", [
                            _c("th", [_vm._v("Price")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("ETH")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("BTC")]),
                            _vm._v(" "),
                            _c("th", [_vm._v("Sum(BTC)")])
                          ])
                        ]),
                        _vm._v(" "),
                        _c("tbody", [
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", [_vm._v("0.10427082")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.46172744")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("1.04239753")]),
                            _vm._v(" "),
                            _c("td", [_vm._v("0.00687967")])
                          ])
                        ])
                      ]
                    )
                  ])
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "clearfix" }),
        _vm._v(" "),
        _c("div", { staticClass: "spacer_50" }),
        _vm._v(" "),
        _c("div", { staticClass: "clearfix" })
      ])
    ])
  }
]
render._withStripped = true



/***/ })

}]);