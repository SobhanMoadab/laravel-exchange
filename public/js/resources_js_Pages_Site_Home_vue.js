(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Site_Home_vue"],{

/***/ "./node_modules/axios/index.js":
/*!*************************************!*\
  !*** ./node_modules/axios/index.js ***!
  \*************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__(/*! ./lib/axios */ "./node_modules/axios/lib/axios.js");

/***/ }),

/***/ "./node_modules/axios/lib/adapters/xhr.js":
/*!************************************************!*\
  !*** ./node_modules/axios/lib/adapters/xhr.js ***!
  \************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var settle = __webpack_require__(/*! ./../core/settle */ "./node_modules/axios/lib/core/settle.js");
var cookies = __webpack_require__(/*! ./../helpers/cookies */ "./node_modules/axios/lib/helpers/cookies.js");
var buildURL = __webpack_require__(/*! ./../helpers/buildURL */ "./node_modules/axios/lib/helpers/buildURL.js");
var buildFullPath = __webpack_require__(/*! ../core/buildFullPath */ "./node_modules/axios/lib/core/buildFullPath.js");
var parseHeaders = __webpack_require__(/*! ./../helpers/parseHeaders */ "./node_modules/axios/lib/helpers/parseHeaders.js");
var isURLSameOrigin = __webpack_require__(/*! ./../helpers/isURLSameOrigin */ "./node_modules/axios/lib/helpers/isURLSameOrigin.js");
var createError = __webpack_require__(/*! ../core/createError */ "./node_modules/axios/lib/core/createError.js");

module.exports = function xhrAdapter(config) {
  return new Promise(function dispatchXhrRequest(resolve, reject) {
    var requestData = config.data;
    var requestHeaders = config.headers;

    if (utils.isFormData(requestData)) {
      delete requestHeaders['Content-Type']; // Let the browser set it
    }

    var request = new XMLHttpRequest();

    // HTTP basic authentication
    if (config.auth) {
      var username = config.auth.username || '';
      var password = config.auth.password ? unescape(encodeURIComponent(config.auth.password)) : '';
      requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
    }

    var fullPath = buildFullPath(config.baseURL, config.url);
    request.open(config.method.toUpperCase(), buildURL(fullPath, config.params, config.paramsSerializer), true);

    // Set the request timeout in MS
    request.timeout = config.timeout;

    // Listen for ready state
    request.onreadystatechange = function handleLoad() {
      if (!request || request.readyState !== 4) {
        return;
      }

      // The request errored out and we didn't get a response, this will be
      // handled by onerror instead
      // With one exception: request that using file: protocol, most browsers
      // will return status as 0 even though it's a successful request
      if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
        return;
      }

      // Prepare the response
      var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
      var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
      var response = {
        data: responseData,
        status: request.status,
        statusText: request.statusText,
        headers: responseHeaders,
        config: config,
        request: request
      };

      settle(resolve, reject, response);

      // Clean up request
      request = null;
    };

    // Handle browser request cancellation (as opposed to a manual cancellation)
    request.onabort = function handleAbort() {
      if (!request) {
        return;
      }

      reject(createError('Request aborted', config, 'ECONNABORTED', request));

      // Clean up request
      request = null;
    };

    // Handle low level network errors
    request.onerror = function handleError() {
      // Real errors are hidden from us by the browser
      // onerror should only fire if it's a network error
      reject(createError('Network Error', config, null, request));

      // Clean up request
      request = null;
    };

    // Handle timeout
    request.ontimeout = function handleTimeout() {
      var timeoutErrorMessage = 'timeout of ' + config.timeout + 'ms exceeded';
      if (config.timeoutErrorMessage) {
        timeoutErrorMessage = config.timeoutErrorMessage;
      }
      reject(createError(timeoutErrorMessage, config, 'ECONNABORTED',
        request));

      // Clean up request
      request = null;
    };

    // Add xsrf header
    // This is only done if running in a standard browser environment.
    // Specifically not if we're in a web worker, or react-native.
    if (utils.isStandardBrowserEnv()) {
      // Add xsrf header
      var xsrfValue = (config.withCredentials || isURLSameOrigin(fullPath)) && config.xsrfCookieName ?
        cookies.read(config.xsrfCookieName) :
        undefined;

      if (xsrfValue) {
        requestHeaders[config.xsrfHeaderName] = xsrfValue;
      }
    }

    // Add headers to the request
    if ('setRequestHeader' in request) {
      utils.forEach(requestHeaders, function setRequestHeader(val, key) {
        if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
          // Remove Content-Type if data is undefined
          delete requestHeaders[key];
        } else {
          // Otherwise add header to the request
          request.setRequestHeader(key, val);
        }
      });
    }

    // Add withCredentials to request if needed
    if (!utils.isUndefined(config.withCredentials)) {
      request.withCredentials = !!config.withCredentials;
    }

    // Add responseType to request if needed
    if (config.responseType) {
      try {
        request.responseType = config.responseType;
      } catch (e) {
        // Expected DOMException thrown by browsers not compatible XMLHttpRequest Level 2.
        // But, this can be suppressed for 'json' type as it can be parsed by default 'transformResponse' function.
        if (config.responseType !== 'json') {
          throw e;
        }
      }
    }

    // Handle progress if needed
    if (typeof config.onDownloadProgress === 'function') {
      request.addEventListener('progress', config.onDownloadProgress);
    }

    // Not all browsers support upload events
    if (typeof config.onUploadProgress === 'function' && request.upload) {
      request.upload.addEventListener('progress', config.onUploadProgress);
    }

    if (config.cancelToken) {
      // Handle cancellation
      config.cancelToken.promise.then(function onCanceled(cancel) {
        if (!request) {
          return;
        }

        request.abort();
        reject(cancel);
        // Clean up request
        request = null;
      });
    }

    if (!requestData) {
      requestData = null;
    }

    // Send the request
    request.send(requestData);
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/axios.js":
/*!*****************************************!*\
  !*** ./node_modules/axios/lib/axios.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./utils */ "./node_modules/axios/lib/utils.js");
var bind = __webpack_require__(/*! ./helpers/bind */ "./node_modules/axios/lib/helpers/bind.js");
var Axios = __webpack_require__(/*! ./core/Axios */ "./node_modules/axios/lib/core/Axios.js");
var mergeConfig = __webpack_require__(/*! ./core/mergeConfig */ "./node_modules/axios/lib/core/mergeConfig.js");
var defaults = __webpack_require__(/*! ./defaults */ "./node_modules/axios/lib/defaults.js");

/**
 * Create an instance of Axios
 *
 * @param {Object} defaultConfig The default config for the instance
 * @return {Axios} A new instance of Axios
 */
function createInstance(defaultConfig) {
  var context = new Axios(defaultConfig);
  var instance = bind(Axios.prototype.request, context);

  // Copy axios.prototype to instance
  utils.extend(instance, Axios.prototype, context);

  // Copy context to instance
  utils.extend(instance, context);

  return instance;
}

// Create the default instance to be exported
var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
axios.Axios = Axios;

// Factory for creating new instances
axios.create = function create(instanceConfig) {
  return createInstance(mergeConfig(axios.defaults, instanceConfig));
};

// Expose Cancel & CancelToken
axios.Cancel = __webpack_require__(/*! ./cancel/Cancel */ "./node_modules/axios/lib/cancel/Cancel.js");
axios.CancelToken = __webpack_require__(/*! ./cancel/CancelToken */ "./node_modules/axios/lib/cancel/CancelToken.js");
axios.isCancel = __webpack_require__(/*! ./cancel/isCancel */ "./node_modules/axios/lib/cancel/isCancel.js");

// Expose all/spread
axios.all = function all(promises) {
  return Promise.all(promises);
};
axios.spread = __webpack_require__(/*! ./helpers/spread */ "./node_modules/axios/lib/helpers/spread.js");

// Expose isAxiosError
axios.isAxiosError = __webpack_require__(/*! ./helpers/isAxiosError */ "./node_modules/axios/lib/helpers/isAxiosError.js");

module.exports = axios;

// Allow use of default import syntax in TypeScript
module.exports.default = axios;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/Cancel.js":
/*!*************************************************!*\
  !*** ./node_modules/axios/lib/cancel/Cancel.js ***!
  \*************************************************/
/***/ ((module) => {

"use strict";


/**
 * A `Cancel` is an object that is thrown when an operation is canceled.
 *
 * @class
 * @param {string=} message The message.
 */
function Cancel(message) {
  this.message = message;
}

Cancel.prototype.toString = function toString() {
  return 'Cancel' + (this.message ? ': ' + this.message : '');
};

Cancel.prototype.__CANCEL__ = true;

module.exports = Cancel;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/CancelToken.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/cancel/CancelToken.js ***!
  \******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var Cancel = __webpack_require__(/*! ./Cancel */ "./node_modules/axios/lib/cancel/Cancel.js");

/**
 * A `CancelToken` is an object that can be used to request cancellation of an operation.
 *
 * @class
 * @param {Function} executor The executor function.
 */
function CancelToken(executor) {
  if (typeof executor !== 'function') {
    throw new TypeError('executor must be a function.');
  }

  var resolvePromise;
  this.promise = new Promise(function promiseExecutor(resolve) {
    resolvePromise = resolve;
  });

  var token = this;
  executor(function cancel(message) {
    if (token.reason) {
      // Cancellation has already been requested
      return;
    }

    token.reason = new Cancel(message);
    resolvePromise(token.reason);
  });
}

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
CancelToken.prototype.throwIfRequested = function throwIfRequested() {
  if (this.reason) {
    throw this.reason;
  }
};

/**
 * Returns an object that contains a new `CancelToken` and a function that, when called,
 * cancels the `CancelToken`.
 */
CancelToken.source = function source() {
  var cancel;
  var token = new CancelToken(function executor(c) {
    cancel = c;
  });
  return {
    token: token,
    cancel: cancel
  };
};

module.exports = CancelToken;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/isCancel.js":
/*!***************************************************!*\
  !*** ./node_modules/axios/lib/cancel/isCancel.js ***!
  \***************************************************/
/***/ ((module) => {

"use strict";


module.exports = function isCancel(value) {
  return !!(value && value.__CANCEL__);
};


/***/ }),

/***/ "./node_modules/axios/lib/core/Axios.js":
/*!**********************************************!*\
  !*** ./node_modules/axios/lib/core/Axios.js ***!
  \**********************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var buildURL = __webpack_require__(/*! ../helpers/buildURL */ "./node_modules/axios/lib/helpers/buildURL.js");
var InterceptorManager = __webpack_require__(/*! ./InterceptorManager */ "./node_modules/axios/lib/core/InterceptorManager.js");
var dispatchRequest = __webpack_require__(/*! ./dispatchRequest */ "./node_modules/axios/lib/core/dispatchRequest.js");
var mergeConfig = __webpack_require__(/*! ./mergeConfig */ "./node_modules/axios/lib/core/mergeConfig.js");

/**
 * Create a new instance of Axios
 *
 * @param {Object} instanceConfig The default config for the instance
 */
function Axios(instanceConfig) {
  this.defaults = instanceConfig;
  this.interceptors = {
    request: new InterceptorManager(),
    response: new InterceptorManager()
  };
}

/**
 * Dispatch a request
 *
 * @param {Object} config The config specific for this request (merged with this.defaults)
 */
Axios.prototype.request = function request(config) {
  /*eslint no-param-reassign:0*/
  // Allow for axios('example/url'[, config]) a la fetch API
  if (typeof config === 'string') {
    config = arguments[1] || {};
    config.url = arguments[0];
  } else {
    config = config || {};
  }

  config = mergeConfig(this.defaults, config);

  // Set config.method
  if (config.method) {
    config.method = config.method.toLowerCase();
  } else if (this.defaults.method) {
    config.method = this.defaults.method.toLowerCase();
  } else {
    config.method = 'get';
  }

  // Hook up interceptors middleware
  var chain = [dispatchRequest, undefined];
  var promise = Promise.resolve(config);

  this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
    chain.unshift(interceptor.fulfilled, interceptor.rejected);
  });

  this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
    chain.push(interceptor.fulfilled, interceptor.rejected);
  });

  while (chain.length) {
    promise = promise.then(chain.shift(), chain.shift());
  }

  return promise;
};

Axios.prototype.getUri = function getUri(config) {
  config = mergeConfig(this.defaults, config);
  return buildURL(config.url, config.params, config.paramsSerializer).replace(/^\?/, '');
};

// Provide aliases for supported request methods
utils.forEach(['delete', 'get', 'head', 'options'], function forEachMethodNoData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, config) {
    return this.request(mergeConfig(config || {}, {
      method: method,
      url: url,
      data: (config || {}).data
    }));
  };
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, data, config) {
    return this.request(mergeConfig(config || {}, {
      method: method,
      url: url,
      data: data
    }));
  };
});

module.exports = Axios;


/***/ }),

/***/ "./node_modules/axios/lib/core/InterceptorManager.js":
/*!***********************************************************!*\
  !*** ./node_modules/axios/lib/core/InterceptorManager.js ***!
  \***********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

function InterceptorManager() {
  this.handlers = [];
}

/**
 * Add a new interceptor to the stack
 *
 * @param {Function} fulfilled The function to handle `then` for a `Promise`
 * @param {Function} rejected The function to handle `reject` for a `Promise`
 *
 * @return {Number} An ID used to remove interceptor later
 */
InterceptorManager.prototype.use = function use(fulfilled, rejected) {
  this.handlers.push({
    fulfilled: fulfilled,
    rejected: rejected
  });
  return this.handlers.length - 1;
};

/**
 * Remove an interceptor from the stack
 *
 * @param {Number} id The ID that was returned by `use`
 */
InterceptorManager.prototype.eject = function eject(id) {
  if (this.handlers[id]) {
    this.handlers[id] = null;
  }
};

/**
 * Iterate over all the registered interceptors
 *
 * This method is particularly useful for skipping over any
 * interceptors that may have become `null` calling `eject`.
 *
 * @param {Function} fn The function to call for each interceptor
 */
InterceptorManager.prototype.forEach = function forEach(fn) {
  utils.forEach(this.handlers, function forEachHandler(h) {
    if (h !== null) {
      fn(h);
    }
  });
};

module.exports = InterceptorManager;


/***/ }),

/***/ "./node_modules/axios/lib/core/buildFullPath.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/core/buildFullPath.js ***!
  \******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var isAbsoluteURL = __webpack_require__(/*! ../helpers/isAbsoluteURL */ "./node_modules/axios/lib/helpers/isAbsoluteURL.js");
var combineURLs = __webpack_require__(/*! ../helpers/combineURLs */ "./node_modules/axios/lib/helpers/combineURLs.js");

/**
 * Creates a new URL by combining the baseURL with the requestedURL,
 * only when the requestedURL is not already an absolute URL.
 * If the requestURL is absolute, this function returns the requestedURL untouched.
 *
 * @param {string} baseURL The base URL
 * @param {string} requestedURL Absolute or relative URL to combine
 * @returns {string} The combined full path
 */
module.exports = function buildFullPath(baseURL, requestedURL) {
  if (baseURL && !isAbsoluteURL(requestedURL)) {
    return combineURLs(baseURL, requestedURL);
  }
  return requestedURL;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/createError.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/core/createError.js ***!
  \****************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var enhanceError = __webpack_require__(/*! ./enhanceError */ "./node_modules/axios/lib/core/enhanceError.js");

/**
 * Create an Error with the specified message, config, error code, request and response.
 *
 * @param {string} message The error message.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The created error.
 */
module.exports = function createError(message, config, code, request, response) {
  var error = new Error(message);
  return enhanceError(error, config, code, request, response);
};


/***/ }),

/***/ "./node_modules/axios/lib/core/dispatchRequest.js":
/*!********************************************************!*\
  !*** ./node_modules/axios/lib/core/dispatchRequest.js ***!
  \********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var transformData = __webpack_require__(/*! ./transformData */ "./node_modules/axios/lib/core/transformData.js");
var isCancel = __webpack_require__(/*! ../cancel/isCancel */ "./node_modules/axios/lib/cancel/isCancel.js");
var defaults = __webpack_require__(/*! ../defaults */ "./node_modules/axios/lib/defaults.js");

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
function throwIfCancellationRequested(config) {
  if (config.cancelToken) {
    config.cancelToken.throwIfRequested();
  }
}

/**
 * Dispatch a request to the server using the configured adapter.
 *
 * @param {object} config The config that is to be used for the request
 * @returns {Promise} The Promise to be fulfilled
 */
module.exports = function dispatchRequest(config) {
  throwIfCancellationRequested(config);

  // Ensure headers exist
  config.headers = config.headers || {};

  // Transform request data
  config.data = transformData(
    config.data,
    config.headers,
    config.transformRequest
  );

  // Flatten headers
  config.headers = utils.merge(
    config.headers.common || {},
    config.headers[config.method] || {},
    config.headers
  );

  utils.forEach(
    ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
    function cleanHeaderConfig(method) {
      delete config.headers[method];
    }
  );

  var adapter = config.adapter || defaults.adapter;

  return adapter(config).then(function onAdapterResolution(response) {
    throwIfCancellationRequested(config);

    // Transform response data
    response.data = transformData(
      response.data,
      response.headers,
      config.transformResponse
    );

    return response;
  }, function onAdapterRejection(reason) {
    if (!isCancel(reason)) {
      throwIfCancellationRequested(config);

      // Transform response data
      if (reason && reason.response) {
        reason.response.data = transformData(
          reason.response.data,
          reason.response.headers,
          config.transformResponse
        );
      }
    }

    return Promise.reject(reason);
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/core/enhanceError.js":
/*!*****************************************************!*\
  !*** ./node_modules/axios/lib/core/enhanceError.js ***!
  \*****************************************************/
/***/ ((module) => {

"use strict";


/**
 * Update an Error with the specified config, error code, and response.
 *
 * @param {Error} error The error to update.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The error.
 */
module.exports = function enhanceError(error, config, code, request, response) {
  error.config = config;
  if (code) {
    error.code = code;
  }

  error.request = request;
  error.response = response;
  error.isAxiosError = true;

  error.toJSON = function toJSON() {
    return {
      // Standard
      message: this.message,
      name: this.name,
      // Microsoft
      description: this.description,
      number: this.number,
      // Mozilla
      fileName: this.fileName,
      lineNumber: this.lineNumber,
      columnNumber: this.columnNumber,
      stack: this.stack,
      // Axios
      config: this.config,
      code: this.code
    };
  };
  return error;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/mergeConfig.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/core/mergeConfig.js ***!
  \****************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ../utils */ "./node_modules/axios/lib/utils.js");

/**
 * Config-specific merge-function which creates a new config-object
 * by merging two configuration objects together.
 *
 * @param {Object} config1
 * @param {Object} config2
 * @returns {Object} New object resulting from merging config2 to config1
 */
module.exports = function mergeConfig(config1, config2) {
  // eslint-disable-next-line no-param-reassign
  config2 = config2 || {};
  var config = {};

  var valueFromConfig2Keys = ['url', 'method', 'data'];
  var mergeDeepPropertiesKeys = ['headers', 'auth', 'proxy', 'params'];
  var defaultToConfig2Keys = [
    'baseURL', 'transformRequest', 'transformResponse', 'paramsSerializer',
    'timeout', 'timeoutMessage', 'withCredentials', 'adapter', 'responseType', 'xsrfCookieName',
    'xsrfHeaderName', 'onUploadProgress', 'onDownloadProgress', 'decompress',
    'maxContentLength', 'maxBodyLength', 'maxRedirects', 'transport', 'httpAgent',
    'httpsAgent', 'cancelToken', 'socketPath', 'responseEncoding'
  ];
  var directMergeKeys = ['validateStatus'];

  function getMergedValue(target, source) {
    if (utils.isPlainObject(target) && utils.isPlainObject(source)) {
      return utils.merge(target, source);
    } else if (utils.isPlainObject(source)) {
      return utils.merge({}, source);
    } else if (utils.isArray(source)) {
      return source.slice();
    }
    return source;
  }

  function mergeDeepProperties(prop) {
    if (!utils.isUndefined(config2[prop])) {
      config[prop] = getMergedValue(config1[prop], config2[prop]);
    } else if (!utils.isUndefined(config1[prop])) {
      config[prop] = getMergedValue(undefined, config1[prop]);
    }
  }

  utils.forEach(valueFromConfig2Keys, function valueFromConfig2(prop) {
    if (!utils.isUndefined(config2[prop])) {
      config[prop] = getMergedValue(undefined, config2[prop]);
    }
  });

  utils.forEach(mergeDeepPropertiesKeys, mergeDeepProperties);

  utils.forEach(defaultToConfig2Keys, function defaultToConfig2(prop) {
    if (!utils.isUndefined(config2[prop])) {
      config[prop] = getMergedValue(undefined, config2[prop]);
    } else if (!utils.isUndefined(config1[prop])) {
      config[prop] = getMergedValue(undefined, config1[prop]);
    }
  });

  utils.forEach(directMergeKeys, function merge(prop) {
    if (prop in config2) {
      config[prop] = getMergedValue(config1[prop], config2[prop]);
    } else if (prop in config1) {
      config[prop] = getMergedValue(undefined, config1[prop]);
    }
  });

  var axiosKeys = valueFromConfig2Keys
    .concat(mergeDeepPropertiesKeys)
    .concat(defaultToConfig2Keys)
    .concat(directMergeKeys);

  var otherKeys = Object
    .keys(config1)
    .concat(Object.keys(config2))
    .filter(function filterAxiosKeys(key) {
      return axiosKeys.indexOf(key) === -1;
    });

  utils.forEach(otherKeys, mergeDeepProperties);

  return config;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/settle.js":
/*!***********************************************!*\
  !*** ./node_modules/axios/lib/core/settle.js ***!
  \***********************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var createError = __webpack_require__(/*! ./createError */ "./node_modules/axios/lib/core/createError.js");

/**
 * Resolve or reject a Promise based on response status.
 *
 * @param {Function} resolve A function that resolves the promise.
 * @param {Function} reject A function that rejects the promise.
 * @param {object} response The response.
 */
module.exports = function settle(resolve, reject, response) {
  var validateStatus = response.config.validateStatus;
  if (!response.status || !validateStatus || validateStatus(response.status)) {
    resolve(response);
  } else {
    reject(createError(
      'Request failed with status code ' + response.status,
      response.config,
      null,
      response.request,
      response
    ));
  }
};


/***/ }),

/***/ "./node_modules/axios/lib/core/transformData.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/core/transformData.js ***!
  \******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

/**
 * Transform the data for a request or a response
 *
 * @param {Object|String} data The data to be transformed
 * @param {Array} headers The headers for the request or response
 * @param {Array|Function} fns A single function or Array of functions
 * @returns {*} The resulting transformed data
 */
module.exports = function transformData(data, headers, fns) {
  /*eslint no-param-reassign:0*/
  utils.forEach(fns, function transform(fn) {
    data = fn(data, headers);
  });

  return data;
};


/***/ }),

/***/ "./node_modules/axios/lib/defaults.js":
/*!********************************************!*\
  !*** ./node_modules/axios/lib/defaults.js ***!
  \********************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var process = __webpack_require__(/*! process/browser */ "./node_modules/process/browser.js");


var utils = __webpack_require__(/*! ./utils */ "./node_modules/axios/lib/utils.js");
var normalizeHeaderName = __webpack_require__(/*! ./helpers/normalizeHeaderName */ "./node_modules/axios/lib/helpers/normalizeHeaderName.js");

var DEFAULT_CONTENT_TYPE = {
  'Content-Type': 'application/x-www-form-urlencoded'
};

function setContentTypeIfUnset(headers, value) {
  if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
    headers['Content-Type'] = value;
  }
}

function getDefaultAdapter() {
  var adapter;
  if (typeof XMLHttpRequest !== 'undefined') {
    // For browsers use XHR adapter
    adapter = __webpack_require__(/*! ./adapters/xhr */ "./node_modules/axios/lib/adapters/xhr.js");
  } else if (typeof process !== 'undefined' && Object.prototype.toString.call(process) === '[object process]') {
    // For node use HTTP adapter
    adapter = __webpack_require__(/*! ./adapters/http */ "./node_modules/axios/lib/adapters/xhr.js");
  }
  return adapter;
}

var defaults = {
  adapter: getDefaultAdapter(),

  transformRequest: [function transformRequest(data, headers) {
    normalizeHeaderName(headers, 'Accept');
    normalizeHeaderName(headers, 'Content-Type');
    if (utils.isFormData(data) ||
      utils.isArrayBuffer(data) ||
      utils.isBuffer(data) ||
      utils.isStream(data) ||
      utils.isFile(data) ||
      utils.isBlob(data)
    ) {
      return data;
    }
    if (utils.isArrayBufferView(data)) {
      return data.buffer;
    }
    if (utils.isURLSearchParams(data)) {
      setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
      return data.toString();
    }
    if (utils.isObject(data)) {
      setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
      return JSON.stringify(data);
    }
    return data;
  }],

  transformResponse: [function transformResponse(data) {
    /*eslint no-param-reassign:0*/
    if (typeof data === 'string') {
      try {
        data = JSON.parse(data);
      } catch (e) { /* Ignore */ }
    }
    return data;
  }],

  /**
   * A timeout in milliseconds to abort a request. If set to 0 (default) a
   * timeout is not created.
   */
  timeout: 0,

  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',

  maxContentLength: -1,
  maxBodyLength: -1,

  validateStatus: function validateStatus(status) {
    return status >= 200 && status < 300;
  }
};

defaults.headers = {
  common: {
    'Accept': 'application/json, text/plain, */*'
  }
};

utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
  defaults.headers[method] = {};
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
});

module.exports = defaults;


/***/ }),

/***/ "./node_modules/axios/lib/helpers/bind.js":
/*!************************************************!*\
  !*** ./node_modules/axios/lib/helpers/bind.js ***!
  \************************************************/
/***/ ((module) => {

"use strict";


module.exports = function bind(fn, thisArg) {
  return function wrap() {
    var args = new Array(arguments.length);
    for (var i = 0; i < args.length; i++) {
      args[i] = arguments[i];
    }
    return fn.apply(thisArg, args);
  };
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/buildURL.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/helpers/buildURL.js ***!
  \****************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

function encode(val) {
  return encodeURIComponent(val).
    replace(/%3A/gi, ':').
    replace(/%24/g, '$').
    replace(/%2C/gi, ',').
    replace(/%20/g, '+').
    replace(/%5B/gi, '[').
    replace(/%5D/gi, ']');
}

/**
 * Build a URL by appending params to the end
 *
 * @param {string} url The base of the url (e.g., http://www.google.com)
 * @param {object} [params] The params to be appended
 * @returns {string} The formatted url
 */
module.exports = function buildURL(url, params, paramsSerializer) {
  /*eslint no-param-reassign:0*/
  if (!params) {
    return url;
  }

  var serializedParams;
  if (paramsSerializer) {
    serializedParams = paramsSerializer(params);
  } else if (utils.isURLSearchParams(params)) {
    serializedParams = params.toString();
  } else {
    var parts = [];

    utils.forEach(params, function serialize(val, key) {
      if (val === null || typeof val === 'undefined') {
        return;
      }

      if (utils.isArray(val)) {
        key = key + '[]';
      } else {
        val = [val];
      }

      utils.forEach(val, function parseValue(v) {
        if (utils.isDate(v)) {
          v = v.toISOString();
        } else if (utils.isObject(v)) {
          v = JSON.stringify(v);
        }
        parts.push(encode(key) + '=' + encode(v));
      });
    });

    serializedParams = parts.join('&');
  }

  if (serializedParams) {
    var hashmarkIndex = url.indexOf('#');
    if (hashmarkIndex !== -1) {
      url = url.slice(0, hashmarkIndex);
    }

    url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
  }

  return url;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/combineURLs.js":
/*!*******************************************************!*\
  !*** ./node_modules/axios/lib/helpers/combineURLs.js ***!
  \*******************************************************/
/***/ ((module) => {

"use strict";


/**
 * Creates a new URL by combining the specified URLs
 *
 * @param {string} baseURL The base URL
 * @param {string} relativeURL The relative URL
 * @returns {string} The combined URL
 */
module.exports = function combineURLs(baseURL, relativeURL) {
  return relativeURL
    ? baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '')
    : baseURL;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/cookies.js":
/*!***************************************************!*\
  !*** ./node_modules/axios/lib/helpers/cookies.js ***!
  \***************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs support document.cookie
    (function standardBrowserEnv() {
      return {
        write: function write(name, value, expires, path, domain, secure) {
          var cookie = [];
          cookie.push(name + '=' + encodeURIComponent(value));

          if (utils.isNumber(expires)) {
            cookie.push('expires=' + new Date(expires).toGMTString());
          }

          if (utils.isString(path)) {
            cookie.push('path=' + path);
          }

          if (utils.isString(domain)) {
            cookie.push('domain=' + domain);
          }

          if (secure === true) {
            cookie.push('secure');
          }

          document.cookie = cookie.join('; ');
        },

        read: function read(name) {
          var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
          return (match ? decodeURIComponent(match[3]) : null);
        },

        remove: function remove(name) {
          this.write(name, '', Date.now() - 86400000);
        }
      };
    })() :

  // Non standard browser env (web workers, react-native) lack needed support.
    (function nonStandardBrowserEnv() {
      return {
        write: function write() {},
        read: function read() { return null; },
        remove: function remove() {}
      };
    })()
);


/***/ }),

/***/ "./node_modules/axios/lib/helpers/isAbsoluteURL.js":
/*!*********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/isAbsoluteURL.js ***!
  \*********************************************************/
/***/ ((module) => {

"use strict";


/**
 * Determines whether the specified URL is absolute
 *
 * @param {string} url The URL to test
 * @returns {boolean} True if the specified URL is absolute, otherwise false
 */
module.exports = function isAbsoluteURL(url) {
  // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
  // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
  // by any combination of letters, digits, plus, period, or hyphen.
  return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/isAxiosError.js":
/*!********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/isAxiosError.js ***!
  \********************************************************/
/***/ ((module) => {

"use strict";


/**
 * Determines whether the payload is an error thrown by Axios
 *
 * @param {*} payload The value to test
 * @returns {boolean} True if the payload is an error thrown by Axios, otherwise false
 */
module.exports = function isAxiosError(payload) {
  return (typeof payload === 'object') && (payload.isAxiosError === true);
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/isURLSameOrigin.js":
/*!***********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/isURLSameOrigin.js ***!
  \***********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs have full support of the APIs needed to test
  // whether the request URL is of the same origin as current location.
    (function standardBrowserEnv() {
      var msie = /(msie|trident)/i.test(navigator.userAgent);
      var urlParsingNode = document.createElement('a');
      var originURL;

      /**
    * Parse a URL to discover it's components
    *
    * @param {String} url The URL to be parsed
    * @returns {Object}
    */
      function resolveURL(url) {
        var href = url;

        if (msie) {
        // IE needs attribute set twice to normalize properties
          urlParsingNode.setAttribute('href', href);
          href = urlParsingNode.href;
        }

        urlParsingNode.setAttribute('href', href);

        // urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
        return {
          href: urlParsingNode.href,
          protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
          host: urlParsingNode.host,
          search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
          hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
          hostname: urlParsingNode.hostname,
          port: urlParsingNode.port,
          pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
            urlParsingNode.pathname :
            '/' + urlParsingNode.pathname
        };
      }

      originURL = resolveURL(window.location.href);

      /**
    * Determine if a URL shares the same origin as the current location
    *
    * @param {String} requestURL The URL to test
    * @returns {boolean} True if URL shares the same origin, otherwise false
    */
      return function isURLSameOrigin(requestURL) {
        var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
        return (parsed.protocol === originURL.protocol &&
            parsed.host === originURL.host);
      };
    })() :

  // Non standard browser envs (web workers, react-native) lack needed support.
    (function nonStandardBrowserEnv() {
      return function isURLSameOrigin() {
        return true;
      };
    })()
);


/***/ }),

/***/ "./node_modules/axios/lib/helpers/normalizeHeaderName.js":
/*!***************************************************************!*\
  !*** ./node_modules/axios/lib/helpers/normalizeHeaderName.js ***!
  \***************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ../utils */ "./node_modules/axios/lib/utils.js");

module.exports = function normalizeHeaderName(headers, normalizedName) {
  utils.forEach(headers, function processHeader(value, name) {
    if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
      headers[normalizedName] = value;
      delete headers[name];
    }
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/parseHeaders.js":
/*!********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/parseHeaders.js ***!
  \********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

// Headers whose duplicates are ignored by node
// c.f. https://nodejs.org/api/http.html#http_message_headers
var ignoreDuplicateOf = [
  'age', 'authorization', 'content-length', 'content-type', 'etag',
  'expires', 'from', 'host', 'if-modified-since', 'if-unmodified-since',
  'last-modified', 'location', 'max-forwards', 'proxy-authorization',
  'referer', 'retry-after', 'user-agent'
];

/**
 * Parse headers into an object
 *
 * ```
 * Date: Wed, 27 Aug 2014 08:58:49 GMT
 * Content-Type: application/json
 * Connection: keep-alive
 * Transfer-Encoding: chunked
 * ```
 *
 * @param {String} headers Headers needing to be parsed
 * @returns {Object} Headers parsed into an object
 */
module.exports = function parseHeaders(headers) {
  var parsed = {};
  var key;
  var val;
  var i;

  if (!headers) { return parsed; }

  utils.forEach(headers.split('\n'), function parser(line) {
    i = line.indexOf(':');
    key = utils.trim(line.substr(0, i)).toLowerCase();
    val = utils.trim(line.substr(i + 1));

    if (key) {
      if (parsed[key] && ignoreDuplicateOf.indexOf(key) >= 0) {
        return;
      }
      if (key === 'set-cookie') {
        parsed[key] = (parsed[key] ? parsed[key] : []).concat([val]);
      } else {
        parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
      }
    }
  });

  return parsed;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/spread.js":
/*!**************************************************!*\
  !*** ./node_modules/axios/lib/helpers/spread.js ***!
  \**************************************************/
/***/ ((module) => {

"use strict";


/**
 * Syntactic sugar for invoking a function and expanding an array for arguments.
 *
 * Common use case would be to use `Function.prototype.apply`.
 *
 *  ```js
 *  function f(x, y, z) {}
 *  var args = [1, 2, 3];
 *  f.apply(null, args);
 *  ```
 *
 * With `spread` this example can be re-written.
 *
 *  ```js
 *  spread(function(x, y, z) {})([1, 2, 3]);
 *  ```
 *
 * @param {Function} callback
 * @returns {Function}
 */
module.exports = function spread(callback) {
  return function wrap(arr) {
    return callback.apply(null, arr);
  };
};


/***/ }),

/***/ "./node_modules/axios/lib/utils.js":
/*!*****************************************!*\
  !*** ./node_modules/axios/lib/utils.js ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var bind = __webpack_require__(/*! ./helpers/bind */ "./node_modules/axios/lib/helpers/bind.js");

/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

var toString = Object.prototype.toString;

/**
 * Determine if a value is an Array
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Array, otherwise false
 */
function isArray(val) {
  return toString.call(val) === '[object Array]';
}

/**
 * Determine if a value is undefined
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if the value is undefined, otherwise false
 */
function isUndefined(val) {
  return typeof val === 'undefined';
}

/**
 * Determine if a value is a Buffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Buffer, otherwise false
 */
function isBuffer(val) {
  return val !== null && !isUndefined(val) && val.constructor !== null && !isUndefined(val.constructor)
    && typeof val.constructor.isBuffer === 'function' && val.constructor.isBuffer(val);
}

/**
 * Determine if a value is an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
 */
function isArrayBuffer(val) {
  return toString.call(val) === '[object ArrayBuffer]';
}

/**
 * Determine if a value is a FormData
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an FormData, otherwise false
 */
function isFormData(val) {
  return (typeof FormData !== 'undefined') && (val instanceof FormData);
}

/**
 * Determine if a value is a view on an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
 */
function isArrayBufferView(val) {
  var result;
  if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
    result = ArrayBuffer.isView(val);
  } else {
    result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
  }
  return result;
}

/**
 * Determine if a value is a String
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a String, otherwise false
 */
function isString(val) {
  return typeof val === 'string';
}

/**
 * Determine if a value is a Number
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Number, otherwise false
 */
function isNumber(val) {
  return typeof val === 'number';
}

/**
 * Determine if a value is an Object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Object, otherwise false
 */
function isObject(val) {
  return val !== null && typeof val === 'object';
}

/**
 * Determine if a value is a plain Object
 *
 * @param {Object} val The value to test
 * @return {boolean} True if value is a plain Object, otherwise false
 */
function isPlainObject(val) {
  if (toString.call(val) !== '[object Object]') {
    return false;
  }

  var prototype = Object.getPrototypeOf(val);
  return prototype === null || prototype === Object.prototype;
}

/**
 * Determine if a value is a Date
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Date, otherwise false
 */
function isDate(val) {
  return toString.call(val) === '[object Date]';
}

/**
 * Determine if a value is a File
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a File, otherwise false
 */
function isFile(val) {
  return toString.call(val) === '[object File]';
}

/**
 * Determine if a value is a Blob
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Blob, otherwise false
 */
function isBlob(val) {
  return toString.call(val) === '[object Blob]';
}

/**
 * Determine if a value is a Function
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Function, otherwise false
 */
function isFunction(val) {
  return toString.call(val) === '[object Function]';
}

/**
 * Determine if a value is a Stream
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Stream, otherwise false
 */
function isStream(val) {
  return isObject(val) && isFunction(val.pipe);
}

/**
 * Determine if a value is a URLSearchParams object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
 */
function isURLSearchParams(val) {
  return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
}

/**
 * Trim excess whitespace off the beginning and end of a string
 *
 * @param {String} str The String to trim
 * @returns {String} The String freed of excess whitespace
 */
function trim(str) {
  return str.replace(/^\s*/, '').replace(/\s*$/, '');
}

/**
 * Determine if we're running in a standard browser environment
 *
 * This allows axios to run in a web worker, and react-native.
 * Both environments support XMLHttpRequest, but not fully standard globals.
 *
 * web workers:
 *  typeof window -> undefined
 *  typeof document -> undefined
 *
 * react-native:
 *  navigator.product -> 'ReactNative'
 * nativescript
 *  navigator.product -> 'NativeScript' or 'NS'
 */
function isStandardBrowserEnv() {
  if (typeof navigator !== 'undefined' && (navigator.product === 'ReactNative' ||
                                           navigator.product === 'NativeScript' ||
                                           navigator.product === 'NS')) {
    return false;
  }
  return (
    typeof window !== 'undefined' &&
    typeof document !== 'undefined'
  );
}

/**
 * Iterate over an Array or an Object invoking a function for each item.
 *
 * If `obj` is an Array callback will be called passing
 * the value, index, and complete array for each item.
 *
 * If 'obj' is an Object callback will be called passing
 * the value, key, and complete object for each property.
 *
 * @param {Object|Array} obj The object to iterate
 * @param {Function} fn The callback to invoke for each item
 */
function forEach(obj, fn) {
  // Don't bother if no value provided
  if (obj === null || typeof obj === 'undefined') {
    return;
  }

  // Force an array if not already something iterable
  if (typeof obj !== 'object') {
    /*eslint no-param-reassign:0*/
    obj = [obj];
  }

  if (isArray(obj)) {
    // Iterate over array values
    for (var i = 0, l = obj.length; i < l; i++) {
      fn.call(null, obj[i], i, obj);
    }
  } else {
    // Iterate over object keys
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        fn.call(null, obj[key], key, obj);
      }
    }
  }
}

/**
 * Accepts varargs expecting each argument to be an object, then
 * immutably merges the properties of each object and returns result.
 *
 * When multiple objects contain the same key the later object in
 * the arguments list will take precedence.
 *
 * Example:
 *
 * ```js
 * var result = merge({foo: 123}, {foo: 456});
 * console.log(result.foo); // outputs 456
 * ```
 *
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function merge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (isPlainObject(result[key]) && isPlainObject(val)) {
      result[key] = merge(result[key], val);
    } else if (isPlainObject(val)) {
      result[key] = merge({}, val);
    } else if (isArray(val)) {
      result[key] = val.slice();
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Extends object a by mutably adding to it the properties of object b.
 *
 * @param {Object} a The object to be extended
 * @param {Object} b The object to copy properties from
 * @param {Object} thisArg The object to bind function to
 * @return {Object} The resulting value of object a
 */
function extend(a, b, thisArg) {
  forEach(b, function assignValue(val, key) {
    if (thisArg && typeof val === 'function') {
      a[key] = bind(val, thisArg);
    } else {
      a[key] = val;
    }
  });
  return a;
}

/**
 * Remove byte order marker. This catches EF BB BF (the UTF-8 BOM)
 *
 * @param {string} content with BOM
 * @return {string} content value without BOM
 */
function stripBOM(content) {
  if (content.charCodeAt(0) === 0xFEFF) {
    content = content.slice(1);
  }
  return content;
}

module.exports = {
  isArray: isArray,
  isArrayBuffer: isArrayBuffer,
  isBuffer: isBuffer,
  isFormData: isFormData,
  isArrayBufferView: isArrayBufferView,
  isString: isString,
  isNumber: isNumber,
  isObject: isObject,
  isPlainObject: isPlainObject,
  isUndefined: isUndefined,
  isDate: isDate,
  isFile: isFile,
  isBlob: isBlob,
  isFunction: isFunction,
  isStream: isStream,
  isURLSearchParams: isURLSearchParams,
  isStandardBrowserEnv: isStandardBrowserEnv,
  forEach: forEach,
  merge: merge,
  extend: extend,
  trim: trim,
  stripBOM: stripBOM
};


/***/ }),

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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
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
    };

    this.BNB.onopen = function (event) {
      console.log(event);
    };

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
/* harmony import */ var _layout_Site_Header_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../layout/Site/Header.vue */ "./resources/js/layout/Site/Header.vue");
/* harmony import */ var _layout_Site_Footer_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../layout/Site/Footer.vue */ "./resources/js/layout/Site/Footer.vue");
/* harmony import */ var _Components_Binance_CryptoBar_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Components/Binance/CryptoBar.vue */ "./resources/js/Components/Binance/CryptoBar.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    Header: _layout_Site_Header_vue__WEBPACK_IMPORTED_MODULE_0__.default,
    Footer: _layout_Site_Footer_vue__WEBPACK_IMPORTED_MODULE_1__.default,
    CryptoBar: _Components_Binance_CryptoBar_vue__WEBPACK_IMPORTED_MODULE_2__.default
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Footer'
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'HeaderSite'
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.horz-list{\r\n        border-top:3px solid #ffd500;\n}\n.horz-list li i {\r\n    font-size:20px;\r\n    margin-right:3px;\n}\n.horz-list ul {\r\n  margin: 0 10rem;\r\n  padding:19px ;\r\n  list-style-type: none;\r\n  text-align: center;\r\n    background-color: #00000020;\r\n    border-radius:10px;\n}\n.horz-list ul li {\r\n  display: inline;\r\n  color:#fff;\n}\n.horz-list ul li {\r\n  text-decoration: none;\r\n  padding: 4px 12px;\r\n  list-style:\n}\n.horz-list  .coin-value{\r\n     color:fff;\n}\r\n\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


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

/***/ "./resources/js/Components/Binance/CryptoBar.vue":
/*!*******************************************************!*\
  !*** ./resources/js/Components/Binance/CryptoBar.vue ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CryptoBar.vue?vue&type=template&id=03a71f84& */ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84&");
/* harmony import */ var _CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CryptoBar.vue?vue&type=script&lang=js& */ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js&");
/* harmony import */ var _CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./CryptoBar.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__.render,
  _CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/Binance/CryptoBar.vue"
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

/***/ "./resources/js/layout/Site/Footer.vue":
/*!*********************************************!*\
  !*** ./resources/js/layout/Site/Footer.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Footer.vue?vue&type=template&id=107bac08& */ "./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08&");
/* harmony import */ var _Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Footer.vue?vue&type=script&lang=js& */ "./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__.render,
  _Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/layout/Site/Footer.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/layout/Site/Header.vue":
/*!*********************************************!*\
  !*** ./resources/js/layout/Site/Header.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Header.vue?vue&type=template&id=18f48dee& */ "./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee&");
/* harmony import */ var _Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Header.vue?vue&type=script&lang=js& */ "./resources/js/layout/Site/Header.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__.render,
  _Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/layout/Site/Header.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=script&lang=js&");
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

/***/ "./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Footer.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/layout/Site/Header.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/layout/Site/Header.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Header.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_template_id_03a71f84___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=template&id=03a71f84& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84&");


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

/***/ "./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08&":
/*!****************************************************************************!*\
  !*** ./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_107bac08___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Footer.vue?vue&type=template&id=107bac08& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08&");


/***/ }),

/***/ "./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee&":
/*!****************************************************************************!*\
  !*** ./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_18f48dee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Header.vue?vue&type=template&id=18f48dee& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee&");


/***/ }),

/***/ "./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-style-loader/index.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ var __WEBPACK_REEXPORT_OBJECT__ = {};
/* harmony reexport (unknown) */ for(const __WEBPACK_IMPORT_KEY__ in _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== "default") __WEBPACK_REEXPORT_OBJECT__[__WEBPACK_IMPORT_KEY__] = () => _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoBar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[__WEBPACK_IMPORT_KEY__]
/* harmony reexport (unknown) */ __webpack_require__.d(__webpack_exports__, __WEBPACK_REEXPORT_OBJECT__);


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=template&id=03a71f84& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "horz-list " }, [
    _c("ul", [
      _c("li", [
        _c("i", { staticClass: "cc BTC " }),
        _vm._v("  $ "),
        _c(
          "span",
          { staticClass: "coin-value" },
          [
            _c(
              "content-loader",
              {
                attrs: {
                  width: 60,
                  height: 4,
                  speed: 1,
                  primaryColor: "#f7f7f7",
                  secondaryColor: "#d1d1d1"
                }
              },
              [
                _c("rect", {
                  attrs: {
                    x: "0",
                    y: "0",
                    rx: "0",
                    ry: "0",
                    width: "53",
                    height: "3"
                  }
                })
              ]
            ),
            _vm._v("\n                        " + _vm._s(this.BTCBUSD.c))
          ],
          1
        )
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
      _c("div", { staticClass: "container-fluid", attrs: { role: "main" } }, [
        _c(
          "div",
          {
            staticClass: "exchange-section data_background text-center",
            attrs: {
              "data-background": "/site/assets/images/exchange-background.png"
            }
          },
          [
            _vm._v(".\r\n                    "),
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



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Footer.vue?vue&type=template&id=107bac08& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("footer", [
      _c("div", { staticClass: "pull-right" }, [
        _vm._v("\n    Cryptic - Admin Template by "),
        _c(
          "a",
          {
            attrs: { href: "https://themeforest.net/user/modeltheme/portfolio" }
          },
          [_vm._v("ModelTheme")]
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "clearfix" })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/layout/Site/Header.vue?vue&type=template&id=18f48dee& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "top_nav" }, [
      _c("div", { staticClass: "nav_menu" }, [
        _c("ul", { staticClass: "nav navbar-nav navbar-left" }, [
          _c("li", { staticClass: "toggle-li" }, [
            _c("div", { staticClass: "nav toggle burger-nav" }, [
              _c("a", { attrs: { id: "menu_toggle" } }, [
                _c("div", { staticClass: "burger" }, [
                  _c("span"),
                  _vm._v(" "),
                  _c("span"),
                  _vm._v(" "),
                  _c("span")
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("li", { staticClass: "megamenu-li" }, [
            _c("div", { staticClass: "megamenu-dropdown-wrapper" }, [
              _c(
                "a",
                {
                  staticClass: "megamenu-dropdown-trigger megamenu-trigger",
                  attrs: { href: "#0" }
                },
                [
                  _c("i", { staticClass: "icon-wallet icons" }),
                  _vm._v(" "),
                  _c("span", [_vm._v(" The Wallet ")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "fa fa-angle-down" })
                ]
              ),
              _vm._v(" "),
              _c("nav", { staticClass: "megamenu-dropdown" }, [
                _c(
                  "a",
                  { staticClass: "megamenu-close", attrs: { href: "#0" } },
                  [_vm._v("Close")]
                ),
                _vm._v(" "),
                _c("ul", { staticClass: "megamenu-dropdown-content" }, [
                  _c("li", { staticClass: "has-children" }, [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", {
                        staticClass: "cc mmt-icon BTC",
                        attrs: { title: "BTC" }
                      }),
                      _vm._v(" Bitcoin")
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      { staticClass: "megamenu-dropdown-icons is-hidden" },
                      [
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-1",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon BTC",
                                  attrs: { title: "BTC" }
                                }),
                                _vm._v(" All Transactions (BTC)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-2",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon BTC",
                                  attrs: { title: "BTC" }
                                }),
                                _vm._v(" Sent BTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Sent Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-3",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon BTC",
                                  attrs: { title: "BTC" }
                                }),
                                _vm._v(" Received BTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-4",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon BTC",
                                  attrs: { title: "BTC" }
                                }),
                                _vm._v(" Exchanged BTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Exchanges")
                              ])
                            ]
                          )
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "has-children" }, [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", {
                        staticClass: "cc mmt-icon LTC",
                        attrs: { title: "LTC" }
                      }),
                      _vm._v(" Litecoin")
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      { staticClass: "megamenu-dropdown-icons is-hidden" },
                      [
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-1",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon LTC",
                                  attrs: { title: "LTC" }
                                }),
                                _vm._v(" All Transactions (LTC)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-2",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon LTC",
                                  attrs: { title: "LTC" }
                                }),
                                _vm._v(" Sent LTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Sent Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-3",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon LTC",
                                  attrs: { title: "LTC" }
                                }),
                                _vm._v(" Received LTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-4",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon LTC",
                                  attrs: { title: "LTC" }
                                }),
                                _vm._v(" Exchanged LTC (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Exchanges")
                              ])
                            ]
                          )
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "has-children" }, [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", {
                        staticClass: "cc mmt-icon ETH",
                        attrs: { title: "ETH" }
                      }),
                      _vm._v(" Ethereum")
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      { staticClass: "megamenu-dropdown-icons is-hidden" },
                      [
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-1",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon ETH",
                                  attrs: { title: "ETH" }
                                }),
                                _vm._v(" All Transactions (ETH)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-2",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon ETH",
                                  attrs: { title: "ETH" }
                                }),
                                _vm._v(" Sent ETH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Sent Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-3",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon ETH",
                                  attrs: { title: "ETH" }
                                }),
                                _vm._v(" Received ETH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-4",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon ETH",
                                  attrs: { title: "ETH" }
                                }),
                                _vm._v(" Exchanged ETH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Exchanges")
                              ])
                            ]
                          )
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "has-children" }, [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", {
                        staticClass: "cc mmt-icon DASH",
                        attrs: { title: "DASH" }
                      }),
                      _vm._v(" DASH")
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      { staticClass: "megamenu-dropdown-icons is-hidden" },
                      [
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-1",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon DASH",
                                  attrs: { title: "DASH" }
                                }),
                                _vm._v(" All Transactions (DASH)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-2",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon DASH",
                                  attrs: { title: "DASH" }
                                }),
                                _vm._v(" Sent DASH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Sent Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-3",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon DASH",
                                  attrs: { title: "DASH" }
                                }),
                                _vm._v(" Received DASH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("In-dept Check Received Transactions")
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              staticClass: "megamenu-dropdown-item item-4",
                              attrs: { href: "search.html" }
                            },
                            [
                              _c("h3", [
                                _c("i", {
                                  staticClass: "cc mmt-icon DASH",
                                  attrs: { title: "DASH" }
                                }),
                                _vm._v(" Exchanged DASH (Transactions)")
                              ]),
                              _vm._v(" "),
                              _c("div", [
                                _vm._v("View Sent/Received Exchanges")
                              ])
                            ]
                          )
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("i", { staticClass: "icon-wallet icons cc" }),
                      _vm._v(" Add New Wallet")
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("li", { staticClass: "dropdown-menu-1-li" }, [
            _c("div", { staticClass: "dropdown-menu-1 dropdown" }, [
              _c(
                "a",
                {
                  staticClass: "dropdown-toggle",
                  attrs: { "data-toggle": "dropdown" }
                },
                [
                  _c("i", { staticClass: "icon-feed icons" }),
                  _vm._v(" Reports\n            "),
                  _c("span", { staticClass: "fa fa-angle-down" })
                ]
              ),
              _vm._v(" "),
              _c("ul", { staticClass: "dropdown-menu archive" }, [
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...8b0133 (0.01 BTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-success pull-right" },
                      [_vm._v("Success")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...9c3286 (0.07 BTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-success pull-right" },
                      [_vm._v("Success")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...4a3432 (0.44 LTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-danger pull-right" },
                      [_vm._v("Canceled")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...1e8437 (0.91 BTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-warning pull-right" },
                      [_vm._v("Pending")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...8b0133 (3.51 LTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-success pull-right" },
                      [_vm._v("Success")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...9c3286 (0.07 ETH)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-warning pull-right" },
                      [_vm._v("Pending")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...8b0133 (0.01 BTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-success pull-right" },
                      [_vm._v("Success")]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "crypto_address.html" } }, [
                    _c("span", { staticClass: "pull-left" }, [
                      _vm._v("...9c3286 (0.07 BTC)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "label label-success pull-right" },
                      [_vm._v("Success")]
                    )
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("li", { staticClass: "button-night-mode" }, [
            _vm._v("Night Mode\n        "),
            _c(
              "button",
              {
                staticClass: "btn btn-sm btn-toggle",
                attrs: {
                  type: "button",
                  "data-toggle": "button",
                  "aria-pressed": "true",
                  autocomplete: "off"
                }
              },
              [_c("div", { staticClass: "handle" })]
            )
          ])
        ]),
        _vm._v(" "),
        _c("ul", { staticClass: "nav navbar-nav navbar-right" }, [
          _c("li", { attrs: { id: "st-trigger-effects" } }, [
            _c(
              "a",
              {
                staticClass: "trigger-sidebar",
                attrs: { "data-effect": "st-effect" }
              },
              [_c("i", { staticClass: "fa fa-th" })]
            )
          ]),
          _vm._v(" "),
          _c("li", {}, [
            _c(
              "a",
              {
                staticClass: "user-profile dropdown-toggle",
                attrs: {
                  href: "javascript:;",
                  "data-toggle": "dropdown",
                  "aria-expanded": "false"
                }
              },
              [
                _c("img", {
                  attrs: { src: "/Site/assets/images/profile-pic.jpg", alt: "" }
                })
              ]
            ),
            _vm._v(" "),
            _c(
              "ul",
              { staticClass: "dropdown-menu dropdown-usermenu pull-right" },
              [
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _vm._v(" Profile")
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _c("span", { staticClass: "badge bg-red pull-right" }, [
                      _vm._v("50%")
                    ]),
                    _vm._v(" "),
                    _c("span", [_vm._v("Settings")])
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [_vm._v("Help")])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "login.html" } }, [
                    _c("i", { staticClass: "fa fa-sign-out pull-right" }),
                    _vm._v(" Log Out")
                  ])
                ])
              ]
            )
          ]),
          _vm._v(" "),
          _c(
            "li",
            { staticClass: "dropdown", attrs: { role: "presentation" } },
            [
              _c(
                "a",
                {
                  staticClass: "dropdown-toggle info-number faa-horizontal",
                  attrs: {
                    href: "javascript:;",
                    "data-toggle": "dropdown",
                    "aria-expanded": "false"
                  }
                },
                [
                  _c("i", {
                    staticClass: "fa fa-envelope faa-horizontal animated"
                  }),
                  _vm._v(" "),
                  _c("span", { staticClass: "badge faa-horizontal animated" }, [
                    _vm._v("3")
                  ])
                ]
              ),
              _vm._v(" "),
              _c(
                "ul",
                {
                  staticClass: "dropdown-menu list-unstyled msg_list",
                  attrs: { id: "menu1", role: "menu" }
                },
                [
                  _c("li", [
                    _c("a", [
                      _c("span", { staticClass: "image" }, [
                        _c("img", {
                          attrs: {
                            src: "/Site/assets/images/profile-pic.jpg",
                            alt: "Profile Image"
                          }
                        })
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _c("span", [_vm._v("John Smith")]),
                        _vm._v(" "),
                        _c("span", { staticClass: "time" }, [
                          _vm._v("3 mins ago")
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "message" }, [
                        _vm._v(
                          "\n                Film festivals used to be do-or-die moments for movie makers...\n              "
                        )
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("a", [
                      _c("span", { staticClass: "image" }, [
                        _c("img", {
                          attrs: {
                            src: "/Site/assets/images/profile-pic.jpg",
                            alt: "Profile Image"
                          }
                        })
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _c("span", [_vm._v("John Smith")]),
                        _vm._v(" "),
                        _c("span", { staticClass: "time" }, [
                          _vm._v("4 mins ago")
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "message" }, [
                        _vm._v(
                          "\n                Film festivals used to be do-or-die moments for movie makers...\n              "
                        )
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("a", [
                      _c("span", { staticClass: "image" }, [
                        _c("img", {
                          attrs: {
                            src: "/Site/assets/images/profile-pic.jpg",
                            alt: "Profile Image"
                          }
                        })
                      ]),
                      _vm._v(" "),
                      _c("span", [
                        _c("span", [_vm._v("John Smith")]),
                        _vm._v(" "),
                        _c("span", { staticClass: "time" }, [
                          _vm._v("6 mins ago")
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "message" }, [
                        _vm._v(
                          "\n                Film festivals used to be do-or-die moments for movie makers...\n              "
                        )
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("div", { staticClass: "text-center" }, [
                      _c("a", [
                        _c("strong", [_vm._v("See All Alerts")]),
                        _vm._v(" "),
                        _c("i", { staticClass: "fa fa-angle-right" })
                      ])
                    ])
                  ])
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c("li", { staticClass: "search-wrap" }, [
            _c(
              "a",
              {
                staticClass: "search-nav",
                attrs: { href: "javascript:;", id: "btn-search" }
              },
              [
                _c("i", {
                  staticClass: "fa fa-search",
                  attrs: { "aria-hidden": "true" }
                })
              ]
            )
          ]),
          _vm._v(" "),
          _c("li", { staticClass: "language" }, [
            _c(
              "a",
              {
                staticClass: "lang-swich dropdown-toggle",
                attrs: {
                  href: "javascript:;",
                  "data-toggle": "dropdown",
                  "aria-expanded": "false"
                }
              },
              [
                _c("img", {
                  attrs: {
                    src: "/Site/assets/images/united-kingdom.svg",
                    alt: "uk"
                  }
                })
              ]
            ),
            _vm._v(" "),
            _c(
              "ul",
              { staticClass: "dropdown-menu dropdown-usermenu pull-right" },
              [
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _c("img", {
                      attrs: {
                        src: "/Site/assets/images/france.svg",
                        alt: "fr"
                      }
                    }),
                    _c("span", [_vm._v("France")])
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _c("img", {
                      attrs: {
                        src: "/Site/assets/images/germany.svg",
                        alt: "de"
                      }
                    }),
                    _c("span", [_vm._v("Germany")])
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _c("img", {
                      attrs: { src: "/Site/assets/images/italy.svg", alt: "it" }
                    }),
                    _c("span", [_vm._v("Italy")])
                  ])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("a", { attrs: { href: "javascript:;" } }, [
                    _c("img", {
                      attrs: { src: "/Site/assets/images/spain.svg", alt: "es" }
                    }),
                    _c("span", [_vm._v("Spain")])
                  ])
                ])
              ]
            )
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoBar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/Binance/CryptoBar.vue?vue&type=style&index=0&lang=css&");
if(content.__esModule) content = content.default;
if(typeof content === 'string') content = [[module.id, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var add = __webpack_require__(/*! !../../../../node_modules/vue-style-loader/lib/addStylesClient.js */ "./node_modules/vue-style-loader/lib/addStylesClient.js").default
var update = add("92d860c4", content, false, {});
// Hot Module Replacement
if(false) {}

/***/ })

}]);