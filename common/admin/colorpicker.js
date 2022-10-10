(function webpackUniversalModuleDefinition(root, factory) {
    if(typeof exports === 'object' && typeof module === 'object')
        module.exports = factory();
    else if(typeof define === 'function' && define.amd)
        define([], factory);
    else if(typeof exports === 'object')
        exports["vcolorpicker"] = factory();
    else
        root["vcolorpicker"] = factory();
})((typeof self !== 'undefined' ? self : this), function() {
    return /******/ (function(modules) { // webpackBootstrap
        /******/ 	// The module cache
        /******/ 	var installedModules = {};
        /******/
        /******/ 	// The require function
        /******/ 	function __webpack_require__(moduleId) {
            /******/
            /******/ 		// Check if module is in cache
            /******/ 		if(installedModules[moduleId]) {
                /******/ 			return installedModules[moduleId].exports;
                /******/ 		}
            /******/ 		// Create a new module (and put it into the cache)
            /******/ 		var module = installedModules[moduleId] = {
                /******/ 			i: moduleId,
                /******/ 			l: false,
                /******/ 			exports: {}
                /******/ 		};
            /******/
            /******/ 		// Execute the module function
            /******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
            /******/
            /******/ 		// Flag the module as loaded
            /******/ 		module.l = true;
            /******/
            /******/ 		// Return the exports of the module
            /******/ 		return module.exports;
            /******/ 	}
        /******/
        /******/
        /******/ 	// expose the modules object (__webpack_modules__)
        /******/ 	__webpack_require__.m = modules;
        /******/
        /******/ 	// expose the module cache
        /******/ 	__webpack_require__.c = installedModules;
        /******/
        /******/ 	// define getter function for harmony exports
        /******/ 	__webpack_require__.d = function(exports, name, getter) {
            /******/ 		if(!__webpack_require__.o(exports, name)) {
                /******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
                /******/ 		}
            /******/ 	};
        /******/
        /******/ 	// define __esModule on exports
        /******/ 	__webpack_require__.r = function(exports) {
            /******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
                /******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
                /******/ 		}
            /******/ 		Object.defineProperty(exports, '__esModule', { value: true });
            /******/ 	};
        /******/
        /******/ 	// create a fake namespace object
        /******/ 	// mode & 1: value is a module id, require it
        /******/ 	// mode & 2: merge all properties of value into the ns
        /******/ 	// mode & 4: return value when already ns object
        /******/ 	// mode & 8|1: behave like require
        /******/ 	__webpack_require__.t = function(value, mode) {
            /******/ 		if(mode & 1) value = __webpack_require__(value);
            /******/ 		if(mode & 8) return value;
            /******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
            /******/ 		var ns = Object.create(null);
            /******/ 		__webpack_require__.r(ns);
            /******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
            /******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
            /******/ 		return ns;
            /******/ 	};
        /******/
        /******/ 	// getDefaultExport function for compatibility with non-harmony modules
        /******/ 	__webpack_require__.n = function(module) {
            /******/ 		var getter = module && module.__esModule ?
                /******/ 			function getDefault() { return module['default']; } :
                /******/ 			function getModuleExports() { return module; };
            /******/ 		__webpack_require__.d(getter, 'a', getter);
            /******/ 		return getter;
            /******/ 	};
        /******/
        /******/ 	// Object.prototype.hasOwnProperty.call
        /******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
        /******/
        /******/ 	// __webpack_public_path__
        /******/ 	__webpack_require__.p = "";
        /******/
        /******/
        /******/ 	// Load entry module and return exports
        /******/ 	return __webpack_require__(__webpack_require__.s = "112a");
        /******/ })
        /************************************************************************/
        /******/ ({

            /***/ "008a":
            /***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
                var defined = __webpack_require__("f6b4");
                module.exports = function (it) {
                    return Object(defined(it));
                };


                /***/ }),

            /***/ "064e":
            /***/ (function(module, exports, __webpack_require__) {

                var anObject = __webpack_require__("69b3");
                var IE8_DOM_DEFINE = __webpack_require__("db6b");
                var toPrimitive = __webpack_require__("94b3");
                var dP = Object.defineProperty;

                exports.f = __webpack_require__("149f") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
                    anObject(O);
                    P = toPrimitive(P, true);
                    anObject(Attributes);
                    if (IE8_DOM_DEFINE) try {
                        return dP(O, P, Attributes);
                    } catch (e) { /* empty */ }
                    if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
                    if ('value' in Attributes) O[P] = Attributes.value;
                    return O;
                };


                /***/ }),

            /***/ "06a2":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var $at = __webpack_require__("fc81")(true);

// 21.1.3.27 String.prototype[@@iterator]()
                __webpack_require__("492d")(String, 'String', function (iterated) {
                    this._t = String(iterated); // target
                    this._i = 0;                // next index
// 21.1.5.2.1 %StringIteratorPrototype%.next()
                }, function () {
                    var O = this._t;
                    var index = this._i;
                    var point;
                    if (index >= O.length) return { value: undefined, done: true };
                    point = $at(O, index);
                    this._i += point.length;
                    return { value: point, done: false };
                });


                /***/ }),

            /***/ "09b9":
            /***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
                var IObject = __webpack_require__("224c");
                var defined = __webpack_require__("f6b4");
                module.exports = function (it) {
                    return IObject(defined(it));
                };


                /***/ }),

            /***/ "0b53":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

// ECMAScript 6 symbols shim
                var global = __webpack_require__("e7ad");
                var has = __webpack_require__("e042");
                var DESCRIPTORS = __webpack_require__("149f");
                var $export = __webpack_require__("e46b");
                var redefine = __webpack_require__("bf16");
                var META = __webpack_require__("f71f").KEY;
                var $fails = __webpack_require__("238a");
                var shared = __webpack_require__("6798");
                var setToStringTag = __webpack_require__("399f");
                var uid = __webpack_require__("ec45");
                var wks = __webpack_require__("cb3d");
                var wksExt = __webpack_require__("a08d");
                var wksDefine = __webpack_require__("4d34");
                var enumKeys = __webpack_require__("f091");
                var isArray = __webpack_require__("2346");
                var anObject = __webpack_require__("69b3");
                var isObject = __webpack_require__("fb68");
                var toObject = __webpack_require__("008a");
                var toIObject = __webpack_require__("09b9");
                var toPrimitive = __webpack_require__("94b3");
                var createDesc = __webpack_require__("cc33");
                var _create = __webpack_require__("e005");
                var gOPNExt = __webpack_require__("9370");
                var $GOPD = __webpack_require__("dcb7");
                var $GOPS = __webpack_require__("2f77");
                var $DP = __webpack_require__("064e");
                var $keys = __webpack_require__("80a9");
                var gOPD = $GOPD.f;
                var dP = $DP.f;
                var gOPN = gOPNExt.f;
                var $Symbol = global.Symbol;
                var $JSON = global.JSON;
                var _stringify = $JSON && $JSON.stringify;
                var PROTOTYPE = 'prototype';
                var HIDDEN = wks('_hidden');
                var TO_PRIMITIVE = wks('toPrimitive');
                var isEnum = {}.propertyIsEnumerable;
                var SymbolRegistry = shared('symbol-registry');
                var AllSymbols = shared('symbols');
                var OPSymbols = shared('op-symbols');
                var ObjectProto = Object[PROTOTYPE];
                var USE_NATIVE = typeof $Symbol == 'function' && !!$GOPS.f;
                var QObject = global.QObject;
// Don't use setters in Qt Script, https://github.com/zloirock/core-js/issues/173
                var setter = !QObject || !QObject[PROTOTYPE] || !QObject[PROTOTYPE].findChild;

// fallback for old Android, https://code.google.com/p/v8/issues/detail?id=687
                var setSymbolDesc = DESCRIPTORS && $fails(function () {
                    return _create(dP({}, 'a', {
                        get: function () { return dP(this, 'a', { value: 7 }).a; }
                    })).a != 7;
                }) ? function (it, key, D) {
                    var protoDesc = gOPD(ObjectProto, key);
                    if (protoDesc) delete ObjectProto[key];
                    dP(it, key, D);
                    if (protoDesc && it !== ObjectProto) dP(ObjectProto, key, protoDesc);
                } : dP;

                var wrap = function (tag) {
                    var sym = AllSymbols[tag] = _create($Symbol[PROTOTYPE]);
                    sym._k = tag;
                    return sym;
                };

                var isSymbol = USE_NATIVE && typeof $Symbol.iterator == 'symbol' ? function (it) {
                    return typeof it == 'symbol';
                } : function (it) {
                    return it instanceof $Symbol;
                };

                var $defineProperty = function defineProperty(it, key, D) {
                    if (it === ObjectProto) $defineProperty(OPSymbols, key, D);
                    anObject(it);
                    key = toPrimitive(key, true);
                    anObject(D);
                    if (has(AllSymbols, key)) {
                        if (!D.enumerable) {
                            if (!has(it, HIDDEN)) dP(it, HIDDEN, createDesc(1, {}));
                            it[HIDDEN][key] = true;
                        } else {
                            if (has(it, HIDDEN) && it[HIDDEN][key]) it[HIDDEN][key] = false;
                            D = _create(D, { enumerable: createDesc(0, false) });
                        } return setSymbolDesc(it, key, D);
                    } return dP(it, key, D);
                };
                var $defineProperties = function defineProperties(it, P) {
                    anObject(it);
                    var keys = enumKeys(P = toIObject(P));
                    var i = 0;
                    var l = keys.length;
                    var key;
                    while (l > i) $defineProperty(it, key = keys[i++], P[key]);
                    return it;
                };
                var $create = function create(it, P) {
                    return P === undefined ? _create(it) : $defineProperties(_create(it), P);
                };
                var $propertyIsEnumerable = function propertyIsEnumerable(key) {
                    var E = isEnum.call(this, key = toPrimitive(key, true));
                    if (this === ObjectProto && has(AllSymbols, key) && !has(OPSymbols, key)) return false;
                    return E || !has(this, key) || !has(AllSymbols, key) || has(this, HIDDEN) && this[HIDDEN][key] ? E : true;
                };
                var $getOwnPropertyDescriptor = function getOwnPropertyDescriptor(it, key) {
                    it = toIObject(it);
                    key = toPrimitive(key, true);
                    if (it === ObjectProto && has(AllSymbols, key) && !has(OPSymbols, key)) return;
                    var D = gOPD(it, key);
                    if (D && has(AllSymbols, key) && !(has(it, HIDDEN) && it[HIDDEN][key])) D.enumerable = true;
                    return D;
                };
                var $getOwnPropertyNames = function getOwnPropertyNames(it) {
                    var names = gOPN(toIObject(it));
                    var result = [];
                    var i = 0;
                    var key;
                    while (names.length > i) {
                        if (!has(AllSymbols, key = names[i++]) && key != HIDDEN && key != META) result.push(key);
                    } return result;
                };
                var $getOwnPropertySymbols = function getOwnPropertySymbols(it) {
                    var IS_OP = it === ObjectProto;
                    var names = gOPN(IS_OP ? OPSymbols : toIObject(it));
                    var result = [];
                    var i = 0;
                    var key;
                    while (names.length > i) {
                        if (has(AllSymbols, key = names[i++]) && (IS_OP ? has(ObjectProto, key) : true)) result.push(AllSymbols[key]);
                    } return result;
                };

// 19.4.1.1 Symbol([description])
                if (!USE_NATIVE) {
                    $Symbol = function Symbol() {
                        if (this instanceof $Symbol) throw TypeError('Symbol is not a constructor!');
                        var tag = uid(arguments.length > 0 ? arguments[0] : undefined);
                        var $set = function (value) {
                            if (this === ObjectProto) $set.call(OPSymbols, value);
                            if (has(this, HIDDEN) && has(this[HIDDEN], tag)) this[HIDDEN][tag] = false;
                            setSymbolDesc(this, tag, createDesc(1, value));
                        };
                        if (DESCRIPTORS && setter) setSymbolDesc(ObjectProto, tag, { configurable: true, set: $set });
                        return wrap(tag);
                    };
                    redefine($Symbol[PROTOTYPE], 'toString', function toString() {
                        return this._k;
                    });

                    $GOPD.f = $getOwnPropertyDescriptor;
                    $DP.f = $defineProperty;
                    __webpack_require__("2ea2").f = gOPNExt.f = $getOwnPropertyNames;
                    __webpack_require__("4f18").f = $propertyIsEnumerable;
                    $GOPS.f = $getOwnPropertySymbols;

                    if (DESCRIPTORS && !__webpack_require__("550e")) {
                        redefine(ObjectProto, 'propertyIsEnumerable', $propertyIsEnumerable, true);
                    }

                    wksExt.f = function (name) {
                        return wrap(wks(name));
                    };
                }

                $export($export.G + $export.W + $export.F * !USE_NATIVE, { Symbol: $Symbol });

                for (var es6Symbols = (
                    // 19.4.2.2, 19.4.2.3, 19.4.2.4, 19.4.2.6, 19.4.2.8, 19.4.2.9, 19.4.2.10, 19.4.2.11, 19.4.2.12, 19.4.2.13, 19.4.2.14
                    'hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables'
                ).split(','), j = 0; es6Symbols.length > j;)wks(es6Symbols[j++]);

                for (var wellKnownSymbols = $keys(wks.store), k = 0; wellKnownSymbols.length > k;) wksDefine(wellKnownSymbols[k++]);

                $export($export.S + $export.F * !USE_NATIVE, 'Symbol', {
                    // 19.4.2.1 Symbol.for(key)
                    'for': function (key) {
                        return has(SymbolRegistry, key += '')
                            ? SymbolRegistry[key]
                            : SymbolRegistry[key] = $Symbol(key);
                    },
                    // 19.4.2.5 Symbol.keyFor(sym)
                    keyFor: function keyFor(sym) {
                        if (!isSymbol(sym)) throw TypeError(sym + ' is not a symbol!');
                        for (var key in SymbolRegistry) if (SymbolRegistry[key] === sym) return key;
                    },
                    useSetter: function () { setter = true; },
                    useSimple: function () { setter = false; }
                });

                $export($export.S + $export.F * !USE_NATIVE, 'Object', {
                    // 19.1.2.2 Object.create(O [, Properties])
                    create: $create,
                    // 19.1.2.4 Object.defineProperty(O, P, Attributes)
                    defineProperty: $defineProperty,
                    // 19.1.2.3 Object.defineProperties(O, Properties)
                    defineProperties: $defineProperties,
                    // 19.1.2.6 Object.getOwnPropertyDescriptor(O, P)
                    getOwnPropertyDescriptor: $getOwnPropertyDescriptor,
                    // 19.1.2.7 Object.getOwnPropertyNames(O)
                    getOwnPropertyNames: $getOwnPropertyNames,
                    // 19.1.2.8 Object.getOwnPropertySymbols(O)
                    getOwnPropertySymbols: $getOwnPropertySymbols
                });

// Chrome 38 and 39 `Object.getOwnPropertySymbols` fails on primitives
// https://bugs.chromium.org/p/v8/issues/detail?id=3443
                var FAILS_ON_PRIMITIVES = $fails(function () { $GOPS.f(1); });

                $export($export.S + $export.F * FAILS_ON_PRIMITIVES, 'Object', {
                    getOwnPropertySymbols: function getOwnPropertySymbols(it) {
                        return $GOPS.f(toObject(it));
                    }
                });

// 24.3.2 JSON.stringify(value [, replacer [, space]])
                $JSON && $export($export.S + $export.F * (!USE_NATIVE || $fails(function () {
                    var S = $Symbol();
                    // MS Edge converts symbol values to JSON as {}
                    // WebKit converts symbol values to JSON as null
                    // V8 throws on boxed symbols
                    return _stringify([S]) != '[null]' || _stringify({ a: S }) != '{}' || _stringify(Object(S)) != '{}';
                })), 'JSON', {
                    stringify: function stringify(it) {
                        var args = [it];
                        var i = 1;
                        var replacer, $replacer;
                        while (arguments.length > i) args.push(arguments[i++]);
                        $replacer = replacer = args[1];
                        if (!isObject(replacer) && it === undefined || isSymbol(it)) return; // IE8 returns string on undefined
                        if (!isArray(replacer)) replacer = function (key, value) {
                            if (typeof $replacer == 'function') value = $replacer.call(this, key, value);
                            if (!isSymbol(value)) return value;
                        };
                        args[1] = replacer;
                        return _stringify.apply($JSON, args);
                    }
                });

// 19.4.3.4 Symbol.prototype[@@toPrimitive](hint)
                $Symbol[PROTOTYPE][TO_PRIMITIVE] || __webpack_require__("86d4")($Symbol[PROTOTYPE], TO_PRIMITIVE, $Symbol[PROTOTYPE].valueOf);
// 19.4.3.5 Symbol.prototype[@@toStringTag]
                setToStringTag($Symbol, 'Symbol');
// 20.2.1.9 Math[@@toStringTag]
                setToStringTag(Math, 'Math', true);
// 24.3.3 JSON[@@toStringTag]
                setToStringTag(global.JSON, 'JSON', true);


                /***/ }),

            /***/ "0dc8":
            /***/ (function(module, exports, __webpack_require__) {

                var dP = __webpack_require__("064e");
                var anObject = __webpack_require__("69b3");
                var getKeys = __webpack_require__("80a9");

                module.exports = __webpack_require__("149f") ? Object.defineProperties : function defineProperties(O, Properties) {
                    anObject(O);
                    var keys = getKeys(Properties);
                    var length = keys.length;
                    var i = 0;
                    var P;
                    while (length > i) dP.f(O, P = keys[i++], Properties[P]);
                    return O;
                };


                /***/ }),

            /***/ "0e8b":
            /***/ (function(module, exports, __webpack_require__) {

// 22.1.3.31 Array.prototype[@@unscopables]
                var UNSCOPABLES = __webpack_require__("cb3d")('unscopables');
                var ArrayProto = Array.prototype;
                if (ArrayProto[UNSCOPABLES] == undefined) __webpack_require__("86d4")(ArrayProto, UNSCOPABLES, {});
                module.exports = function (key) {
                    ArrayProto[UNSCOPABLES][key] = true;
                };


                /***/ }),

            /***/ "112a":
            /***/ (function(module, __webpack_exports__, __webpack_require__) {

                "use strict";
// ESM COMPAT FLAG
                __webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/_@vue_cli-service@3.12.1@@vue/cli-service/lib/commands/build/setPublicPath.js
// This file is imported into lib/wc client bundles.

                if (typeof window !== 'undefined') {
                    if (true) {
                        __webpack_require__("e67d")
                    }

                    var i
                    if ((i = window.document.currentScript) && (i = i.src.match(/(.+\/)[^/]+\.js(\?.*)?$/))) {
                        __webpack_require__.p = i[1] // eslint-disable-line
                    }
                }

// Indicate to webpack that this file can be concatenated
                /* harmony default export */ var setPublicPath = (null);

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es6.function.name.js
                var es6_function_name = __webpack_require__("cc57");

// CONCATENATED MODULE: ./node_modules/_cache-loader@2.0.1@cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"32b1bac4-vue-loader-template"}!./node_modules/_vue-loader@15.9.2@vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/_cache-loader@2.0.1@cache-loader/dist/cjs.js??ref--0-0!./node_modules/_vue-loader@15.9.2@vue-loader/lib??vue-loader-options!./packages/color-picker/src/color-picker.vue?vue&type=template&id=29accc04&scoped=true&lang=html&
                var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{directives:[{name:"clickoutside",rawName:"v-clickoutside",value:(_vm.closePanel),expression:"closePanel"}],ref:"colorPicker",staticClass:"m-colorPicker",on:{"click":function (event) { event.stopPropagation() }}},[_c('div',{staticClass:"colorBtn",class:{ disabled: _vm.disabled },style:(("background: " + _vm.showColor)),on:{"click":_vm.openPanel}}),_c('div',{staticClass:"box",class:{ open: _vm.openStatus }},[_c('div',{staticClass:"hd"},[_c('div',{staticClass:"colorView",style:(("background-color: " + _vm.showPanelColor))}),_c('div',{staticClass:"defaultColor",on:{"click":_vm.handleDefaultColor,"mouseover":function($event){_vm.hoveColor = _vm.defaultColor},"mouseout":function($event){_vm.hoveColor = null}}},[_vm._v("默认颜色")])]),_c('div',{staticClass:"bd"},[_c('h3',[_vm._v("主题颜色")]),_c('ul',{staticClass:"tColor"},_vm._l((_vm.tColor),function(color,index){return _c('li',{key:index,style:({ backgroundColor: color }),on:{"mouseover":function($event){_vm.hoveColor = color},"mouseout":function($event){_vm.hoveColor = null},"click":function($event){return _vm.updataValue(color)}}})}),0),_c('ul',{staticClass:"bColor"},_vm._l((_vm.colorPanel),function(item,index){return _c('li',{key:index},[_c('ul',_vm._l((item),function(color,cindex){return _c('li',{key:cindex,style:({ backgroundColor: color }),on:{"mouseover":function($event){_vm.hoveColor = color},"mouseout":function($event){_vm.hoveColor = null},"click":function($event){return _vm.updataValue(color)}}})}),0)])}),0),_c('h3',[_vm._v("标准颜色")]),_c('ul',{staticClass:"tColor"},_vm._l((_vm.bColor),function(color,index){return _c('li',{key:index,style:({ backgroundColor: color }),on:{"mouseover":function($event){_vm.hoveColor = color},"mouseout":function($event){_vm.hoveColor = null},"click":function($event){return _vm.updataValue(color)}}})}),0),_c('h3',{on:{"click":_vm.triggerHtml5Color}},[_vm._v("更多颜色...")]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.html5Color),expression:"html5Color"}],ref:"html5Color",attrs:{"type":"color"},domProps:{"value":(_vm.html5Color)},on:{"change":function($event){return _vm.updataValue(_vm.html5Color)},"input":function($event){if($event.target.composing){ return; }_vm.html5Color=$event.target.value}}})])])])}
                var staticRenderFns = []


// CONCATENATED MODULE: ./packages/color-picker/src/color-picker.vue?vue&type=template&id=29accc04&scoped=true&lang=html&

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/web.dom.iterable.js
                var web_dom_iterable = __webpack_require__("6d57");

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es7.symbol.async-iterator.js
                var es7_symbol_async_iterator = __webpack_require__("309f");

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es6.symbol.js
                var es6_symbol = __webpack_require__("0b53");

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es6.string.iterator.js
                var es6_string_iterator = __webpack_require__("06a2");

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es6.array.from.js
                var es6_array_from = __webpack_require__("ec25");

// EXTERNAL MODULE: ./node_modules/_core-js@2.6.11@core-js/modules/es6.regexp.to-string.js
                var es6_regexp_to_string = __webpack_require__("2b45");

// CONCATENATED MODULE: ./packages/directive/clickoutside.js
                var nodeList = [];
                var ctx = '@@clickoutsideContext';
                var startClick;
                var seed = 0;
                document.addEventListener('mousedown', function (e) {
                    return startClick = e;
                });
                document.addEventListener('mouseup', function (e) {
                    nodeList.forEach(function (node) {
                        return node[ctx].documentHandler(e, startClick);
                    });
                });

                function createDocumentHandler(el, binding, vnode) {
                    return function () {
                        var mouseup = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
                        var mousedown = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
                        if (!vnode || !vnode.context || !mouseup.target || !mousedown.target || el.contains(mouseup.target) || el.contains(mousedown.target) || el === mouseup.target || vnode.context.popperElm && (vnode.context.popperElm.contains(mouseup.target) || vnode.context.popperElm.contains(mousedown.target))) return;

                        if (binding.expression && el[ctx].methodName && vnode.context[el[ctx].methodName]) {
                            vnode.context[el[ctx].methodName]();
                        } else {
                            el[ctx].bindingFn && el[ctx].bindingFn();
                        }
                    };
                }
                /**
                 * v-clickoutside
                 * @desc 点击元素外面才会触发的事件
                 * @example
                 * ```vue
                 * <div v-element-clickoutside="handleClose">
                 * ```
                 */


                /* harmony default export */ var clickoutside = ({
                    bind: function bind(el, binding, vnode) {
                        nodeList.push(el);
                        var id = seed++;
                        el[ctx] = {
                            id: id,
                            documentHandler: createDocumentHandler(el, binding, vnode),
                            methodName: binding.expression,
                            bindingFn: binding.value
                        };
                    },
                    update: function update(el, binding, vnode) {
                        el[ctx].documentHandler = createDocumentHandler(el, binding, vnode);
                        el[ctx].methodName = binding.expression;
                        el[ctx].bindingFn = binding.value;
                    },
                    unbind: function unbind(el) {
                        var len = nodeList.length;

                        for (var i = 0; i < len; i++) {
                            if (nodeList[i][ctx].id === el[ctx].id) {
                                nodeList.splice(i, 1);
                                break;
                            }
                        }

                        delete el[ctx];
                    }
                });
// CONCATENATED MODULE: ./node_modules/_cache-loader@2.0.1@cache-loader/dist/cjs.js??ref--12-0!./node_modules/_thread-loader@2.1.3@thread-loader/dist/cjs.js!./node_modules/_babel-loader@8.1.0@babel-loader/lib!./node_modules/_cache-loader@2.0.1@cache-loader/dist/cjs.js??ref--0-0!./node_modules/_vue-loader@15.9.2@vue-loader/lib??vue-loader-options!./packages/color-picker/src/color-picker.vue?vue&type=script&lang=js&








                function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

                function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

                function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

                /* harmony default export */ var color_pickervue_type_script_lang_js_ = ({
                    name: 'colorPicker',
                    directives: {
                        clickoutside: clickoutside
                    },
                    props: {
                        // 当前颜色值
                        value: {
                            type: String,
                            required: true
                        },
                        // 默认颜色
                        defaultColor: {
                            type: String,
                            default: '#000000'
                        },
                        // 禁用状态
                        disabled: {
                            type: Boolean,
                            default: false
                        }
                    },
                    data: function data() {
                        return {
                            // 面板打开状态
                            openStatus: false,
                            // 鼠标经过的颜色块
                            hoveColor: null,
                            // 主题颜色
                            tColor: ['#000000', '#ffffff', '#eeece1', '#1e497b', '#4e81bb', '#e2534d', '#9aba60', '#8165a0', '#47acc5', '#f9974c'],
                            // 颜色面板
                            colorConfig: [['#7f7f7f', '#f2f2f2'], ['#0d0d0d', '#808080'], ['#1c1a10', '#ddd8c3'], ['#0e243d', '#c6d9f0'], ['#233f5e', '#dae5f0'], ['#632623', '#f2dbdb'], ['#4d602c', '#eaf1de'], ['#3f3150', '#e6e0ec'], ['#1e5867', '#d9eef3'], ['#99490f', '#fee9da']],
                            // 标准颜色
                            bColor: ['#c21401', '#ff1e02', '#ffc12a', '#ffff3a', '#90cf5b', '#00af57', '#00afee', '#0071be', '#00215f', '#72349d'],
                            html5Color: this.value
                        };
                    },
                    computed: {
                        // 显示面板颜色
                        showPanelColor: function showPanelColor() {
                            if (this.hoveColor) {
                                return this.hoveColor;
                            } else {
                                return this.showColor;
                            }
                        },
                        // 显示颜色
                        showColor: function showColor() {
                            if (this.value) {
                                return this.value;
                            } else {
                                return this.defaultColor;
                            }
                        },
                        // 颜色面板
                        colorPanel: function colorPanel() {
                            var colorArr = [];

                            var _iterator = _createForOfIteratorHelper(this.colorConfig),
                                _step;

                            try {
                                for (_iterator.s(); !(_step = _iterator.n()).done;) {
                                    var color = _step.value;
                                    colorArr.push(this.gradient(color[1], color[0], 5));
                                }
                            } catch (err) {
                                _iterator.e(err);
                            } finally {
                                _iterator.f();
                            }

                            return colorArr;
                        }
                    },
                    methods: {
                        openPanel: function openPanel() {
                            this.openStatus = !this.disabled;
                        },
                        closePanel: function closePanel() {
                            this.openStatus = false;
                        },
                        triggerHtml5Color: function triggerHtml5Color() {
                            this.$refs.html5Color.click();
                        },
                        // 更新组件的值 value
                        updataValue: function updataValue(value) {
                            this.$emit('input', value);
                            this.$emit('change', value);
                            this.openStatus = false;
                        },
                        // 设置默认颜色
                        handleDefaultColor: function handleDefaultColor() {
                            this.updataValue(this.defaultColor);
                        },
                        // 格式化 hex 颜色值
                        parseColor: function parseColor(hexStr) {
                            if (hexStr.length === 4) {
                                hexStr = '#' + hexStr[1] + hexStr[1] + hexStr[2] + hexStr[2] + hexStr[3] + hexStr[3];
                            } else {
                                return hexStr;
                            }
                        },
                        // RGB 颜色 转 HEX 颜色
                        rgbToHex: function rgbToHex(r, g, b) {
                            var hex = (r << 16 | g << 8 | b).toString(16);
                            return '#' + new Array(Math.abs(hex.length - 7)).join('0') + hex;
                        },
                        // HEX 转 RGB 颜色
                        hexToRgb: function hexToRgb(hex) {
                            hex = this.parseColor(hex);
                            var rgb = [];

                            for (var i = 1; i < 7; i += 2) {
                                rgb.push(parseInt('0x' + hex.slice(i, i + 2)));
                            }

                            return rgb;
                        },
                        // 计算渐变过渡颜色
                        gradient: function gradient(startColor, endColor, step) {
                            // 讲 hex 转换为 rgb
                            var sColor = this.hexToRgb(startColor);
                            var eColor = this.hexToRgb(endColor); // 计算R\G\B每一步的差值

                            var rStep = (eColor[0] - sColor[0]) / step;
                            var gStep = (eColor[1] - sColor[1]) / step;
                            var bStep = (eColor[2] - sColor[2]) / step;
                            var gradientColorArr = []; // 计算每一步的hex值

                            for (var i = 0; i < step; i++) {
                                gradientColorArr.push(this.rgbToHex(parseInt(rStep * i + sColor[0]), parseInt(gStep * i + sColor[1]), parseInt(bStep * i + sColor[2])));
                            }

                            return gradientColorArr;
                        }
                    }
                });
// CONCATENATED MODULE: ./packages/color-picker/src/color-picker.vue?vue&type=script&lang=js&
                /* harmony default export */ var src_color_pickervue_type_script_lang_js_ = (color_pickervue_type_script_lang_js_);
// EXTERNAL MODULE: ./packages/color-picker/src/color-picker.vue?vue&type=style&index=0&id=29accc04&lang=scss&scoped=true&
                var color_pickervue_type_style_index_0_id_29accc04_lang_scss_scoped_true_ = __webpack_require__("e137");

// CONCATENATED MODULE: ./node_modules/_vue-loader@15.9.2@vue-loader/lib/runtime/componentNormalizer.js
                /* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

                function normalizeComponent (
                    scriptExports,
                    render,
                    staticRenderFns,
                    functionalTemplate,
                    injectStyles,
                    scopeId,
                    moduleIdentifier, /* server only */
                    shadowMode /* vue-cli only */
                ) {
                    // Vue.extend constructor export interop
                    var options = typeof scriptExports === 'function'
                        ? scriptExports.options
                        : scriptExports

                    // render functions
                    if (render) {
                        options.render = render
                        options.staticRenderFns = staticRenderFns
                        options._compiled = true
                    }

                    // functional template
                    if (functionalTemplate) {
                        options.functional = true
                    }

                    // scopedId
                    if (scopeId) {
                        options._scopeId = 'data-v-' + scopeId
                    }

                    var hook
                    if (moduleIdentifier) { // server build
                        hook = function (context) {
                            // 2.3 injection
                            context =
                                context || // cached call
                                (this.$vnode && this.$vnode.ssrContext) || // stateful
                                (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
                            // 2.2 with runInNewContext: true
                            if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
                                context = __VUE_SSR_CONTEXT__
                            }
                            // inject component styles
                            if (injectStyles) {
                                injectStyles.call(this, context)
                            }
                            // register component module identifier for async chunk inferrence
                            if (context && context._registeredComponents) {
                                context._registeredComponents.add(moduleIdentifier)
                            }
                        }
                        // used by ssr in case component is cached and beforeCreate
                        // never gets called
                        options._ssrRegister = hook
                    } else if (injectStyles) {
                        hook = shadowMode
                            ? function () {
                                injectStyles.call(
                                    this,
                                    (options.functional ? this.parent : this).$root.$options.shadowRoot
                                )
                            }
                            : injectStyles
                    }

                    if (hook) {
                        if (options.functional) {
                            // for template-only hot-reload because in that case the render fn doesn't
                            // go through the normalizer
                            options._injectStyles = hook
                            // register for functional component in vue file
                            var originalRender = options.render
                            options.render = function renderWithStyleInjection (h, context) {
                                hook.call(context)
                                return originalRender(h, context)
                            }
                        } else {
                            // inject component registration as beforeCreate hook
                            var existing = options.beforeCreate
                            options.beforeCreate = existing
                                ? [].concat(existing, hook)
                                : [hook]
                        }
                    }

                    return {
                        exports: scriptExports,
                        options: options
                    }
                }

// CONCATENATED MODULE: ./packages/color-picker/src/color-picker.vue






                /* normalize component */

                var component = normalizeComponent(
                    src_color_pickervue_type_script_lang_js_,
                    render,
                    staticRenderFns,
                    false,
                    null,
                    "29accc04",
                    null

                )

                /* harmony default export */ var color_picker = (component.exports);
// CONCATENATED MODULE: ./packages/color-picker/index.js

// 导入组件
                // 为组件提供 install 安装方法，供按需引入

                color_picker.install = function (Vue) {
                    Vue.component(color_picker.name, color_picker);
                }; // 默认导出组件


                /* harmony default export */ var packages_color_picker = (color_picker);
// CONCATENATED MODULE: ./packages/index.js

// 导入颜色选择器组件
                // 存储组件列表

                var components = [packages_color_picker]; // 定义 install 方法，接收 Vue 作为参数。如果使用 use 注册插件，则所有的组件都将被注册

                var install = function install(Vue) {
                    // 判断是否可以安装
                    if (install.installed) return; // 遍历注册全局组件

                    components.map(function (component) {
                        return Vue.component(component.name, component);
                    });
                }; // 判断是否是直接引入文件


                if (typeof window !== 'undefined' && window.Vue) {
                    install(window.Vue);
                }

                /* harmony default export */ var packages_0 = ({
                    // 导出的对象必须具有 install，才能被 Vue.use() 方法安装
                    install: install,
                    // 以下是具体的组件列表
                    colorPicker: packages_color_picker
                });
// CONCATENATED MODULE: ./node_modules/_@vue_cli-service@3.12.1@@vue/cli-service/lib/commands/build/entry-lib.js


                /* harmony default export */ var entry_lib = __webpack_exports__["default"] = (packages_0);



                /***/ }),

            /***/ "149f":
            /***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
                module.exports = !__webpack_require__("238a")(function () {
                    return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
                });


                /***/ }),

            /***/ "190b":
            /***/ (function(module, exports, __webpack_require__) {

// 21.2.5.3 get RegExp.prototype.flags()
                if (__webpack_require__("149f") && /./g.flags != 'g') __webpack_require__("064e").f(RegExp.prototype, 'flags', {
                    configurable: true,
                    get: __webpack_require__("f1fe")
                });


                /***/ }),

            /***/ "1b07":
            /***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
                var content = __webpack_require__("ca06");
                if(typeof content === 'string') content = [[module.i, content, '']];
                if(content.locals) module.exports = content.locals;
// add the styles to the DOM
                var add = __webpack_require__("85cb").default
                var update = add("34f6f920", content, true, {"sourceMap":false,"shadowMode":false});

                /***/ }),

            /***/ "224c":
            /***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
                var cof = __webpack_require__("75c4");
// eslint-disable-next-line no-prototype-builtins
                module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
                    return cof(it) == 'String' ? it.split('') : Object(it);
                };


                /***/ }),

            /***/ "2285":
            /***/ (function(module, exports, __webpack_require__) {

// check on default Array iterator
                var Iterators = __webpack_require__("da6d");
                var ITERATOR = __webpack_require__("cb3d")('iterator');
                var ArrayProto = Array.prototype;

                module.exports = function (it) {
                    return it !== undefined && (Iterators.Array === it || ArrayProto[ITERATOR] === it);
                };


                /***/ }),

            /***/ "2346":
            /***/ (function(module, exports, __webpack_require__) {

// 7.2.2 IsArray(argument)
                var cof = __webpack_require__("75c4");
                module.exports = Array.isArray || function isArray(arg) {
                    return cof(arg) == 'Array';
                };


                /***/ }),

            /***/ "238a":
            /***/ (function(module, exports) {

                module.exports = function (exec) {
                    try {
                        return !!exec();
                    } catch (e) {
                        return true;
                    }
                };


                /***/ }),

            /***/ "2b45":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                __webpack_require__("190b");
                var anObject = __webpack_require__("69b3");
                var $flags = __webpack_require__("f1fe");
                var DESCRIPTORS = __webpack_require__("149f");
                var TO_STRING = 'toString';
                var $toString = /./[TO_STRING];

                var define = function (fn) {
                    __webpack_require__("bf16")(RegExp.prototype, TO_STRING, fn, true);
                };

// 21.2.5.14 RegExp.prototype.toString()
                if (__webpack_require__("238a")(function () { return $toString.call({ source: 'a', flags: 'b' }) != '/a/b'; })) {
                    define(function toString() {
                        var R = anObject(this);
                        return '/'.concat(R.source, '/',
                            'flags' in R ? R.flags : !DESCRIPTORS && R instanceof RegExp ? $flags.call(R) : undefined);
                    });
// FF44- RegExp#toString has a wrong name
                } else if ($toString.name != TO_STRING) {
                    define(function toString() {
                        return $toString.call(this);
                    });
                }


                /***/ }),

            /***/ "2ea2":
            /***/ (function(module, exports, __webpack_require__) {

// 19.1.2.7 / 15.2.3.4 Object.getOwnPropertyNames(O)
                var $keys = __webpack_require__("c2f7");
                var hiddenKeys = __webpack_require__("ceac").concat('length', 'prototype');

                exports.f = Object.getOwnPropertyNames || function getOwnPropertyNames(O) {
                    return $keys(O, hiddenKeys);
                };


                /***/ }),

            /***/ "2f77":
            /***/ (function(module, exports) {

                exports.f = Object.getOwnPropertySymbols;


                /***/ }),

            /***/ "309f":
            /***/ (function(module, exports, __webpack_require__) {

                __webpack_require__("4d34")('asyncIterator');


                /***/ }),

            /***/ "32b9":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var create = __webpack_require__("e005");
                var descriptor = __webpack_require__("cc33");
                var setToStringTag = __webpack_require__("399f");
                var IteratorPrototype = {};

// 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
                __webpack_require__("86d4")(IteratorPrototype, __webpack_require__("cb3d")('iterator'), function () { return this; });

                module.exports = function (Constructor, NAME, next) {
                    Constructor.prototype = create(IteratorPrototype, { next: descriptor(1, next) });
                    setToStringTag(Constructor, NAME + ' Iterator');
                };


                /***/ }),

            /***/ "399f":
            /***/ (function(module, exports, __webpack_require__) {

                var def = __webpack_require__("064e").f;
                var has = __webpack_require__("e042");
                var TAG = __webpack_require__("cb3d")('toStringTag');

                module.exports = function (it, tag, stat) {
                    if (it && !has(it = stat ? it : it.prototype, TAG)) def(it, TAG, { configurable: true, value: tag });
                };


                /***/ }),

            /***/ "475d":
            /***/ (function(module, exports) {

                module.exports = function (done, value) {
                    return { value: value, done: !!done };
                };


                /***/ }),

            /***/ "492d":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var LIBRARY = __webpack_require__("550e");
                var $export = __webpack_require__("e46b");
                var redefine = __webpack_require__("bf16");
                var hide = __webpack_require__("86d4");
                var Iterators = __webpack_require__("da6d");
                var $iterCreate = __webpack_require__("32b9");
                var setToStringTag = __webpack_require__("399f");
                var getPrototypeOf = __webpack_require__("58cf");
                var ITERATOR = __webpack_require__("cb3d")('iterator');
                var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
                var FF_ITERATOR = '@@iterator';
                var KEYS = 'keys';
                var VALUES = 'values';

                var returnThis = function () { return this; };

                module.exports = function (Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
                    $iterCreate(Constructor, NAME, next);
                    var getMethod = function (kind) {
                        if (!BUGGY && kind in proto) return proto[kind];
                        switch (kind) {
                            case KEYS: return function keys() { return new Constructor(this, kind); };
                            case VALUES: return function values() { return new Constructor(this, kind); };
                        } return function entries() { return new Constructor(this, kind); };
                    };
                    var TAG = NAME + ' Iterator';
                    var DEF_VALUES = DEFAULT == VALUES;
                    var VALUES_BUG = false;
                    var proto = Base.prototype;
                    var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
                    var $default = $native || getMethod(DEFAULT);
                    var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
                    var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
                    var methods, key, IteratorPrototype;
                    // Fix native
                    if ($anyNative) {
                        IteratorPrototype = getPrototypeOf($anyNative.call(new Base()));
                        if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
                            // Set @@toStringTag to native iterators
                            setToStringTag(IteratorPrototype, TAG, true);
                            // fix for some old engines
                            if (!LIBRARY && typeof IteratorPrototype[ITERATOR] != 'function') hide(IteratorPrototype, ITERATOR, returnThis);
                        }
                    }
                    // fix Array#{values, @@iterator}.name in V8 / FF
                    if (DEF_VALUES && $native && $native.name !== VALUES) {
                        VALUES_BUG = true;
                        $default = function values() { return $native.call(this); };
                    }
                    // Define iterator
                    if ((!LIBRARY || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
                        hide(proto, ITERATOR, $default);
                    }
                    // Plug for library
                    Iterators[NAME] = $default;
                    Iterators[TAG] = returnThis;
                    if (DEFAULT) {
                        methods = {
                            values: DEF_VALUES ? $default : getMethod(VALUES),
                            keys: IS_SET ? $default : getMethod(KEYS),
                            entries: $entries
                        };
                        if (FORCED) for (key in methods) {
                            if (!(key in proto)) redefine(proto, key, methods[key]);
                        } else $export($export.P + $export.F * (BUGGY || VALUES_BUG), NAME, methods);
                    }
                    return methods;
                };


                /***/ }),

            /***/ "4ce5":
            /***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
                var aFunction = __webpack_require__("5daa");
                module.exports = function (fn, that, length) {
                    aFunction(fn);
                    if (that === undefined) return fn;
                    switch (length) {
                        case 1: return function (a) {
                            return fn.call(that, a);
                        };
                        case 2: return function (a, b) {
                            return fn.call(that, a, b);
                        };
                        case 3: return function (a, b, c) {
                            return fn.call(that, a, b, c);
                        };
                    }
                    return function (/* ...args */) {
                        return fn.apply(that, arguments);
                    };
                };


                /***/ }),

            /***/ "4d34":
            /***/ (function(module, exports, __webpack_require__) {

                var global = __webpack_require__("e7ad");
                var core = __webpack_require__("7ddc");
                var LIBRARY = __webpack_require__("550e");
                var wksExt = __webpack_require__("a08d");
                var defineProperty = __webpack_require__("064e").f;
                module.exports = function (name) {
                    var $Symbol = core.Symbol || (core.Symbol = LIBRARY ? {} : global.Symbol || {});
                    if (name.charAt(0) != '_' && !(name in $Symbol)) defineProperty($Symbol, name, { value: wksExt.f(name) });
                };


                /***/ }),

            /***/ "4f18":
            /***/ (function(module, exports) {

                exports.f = {}.propertyIsEnumerable;


                /***/ }),

            /***/ "550e":
            /***/ (function(module, exports) {

                module.exports = false;


                /***/ }),

            /***/ "56f2":
            /***/ (function(module, exports, __webpack_require__) {

                var shared = __webpack_require__("6798")('keys');
                var uid = __webpack_require__("ec45");
                module.exports = function (key) {
                    return shared[key] || (shared[key] = uid(key));
                };


                /***/ }),

            /***/ "58cf":
            /***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)
                var has = __webpack_require__("e042");
                var toObject = __webpack_require__("008a");
                var IE_PROTO = __webpack_require__("56f2")('IE_PROTO');
                var ObjectProto = Object.prototype;

                module.exports = Object.getPrototypeOf || function (O) {
                    O = toObject(O);
                    if (has(O, IE_PROTO)) return O[IE_PROTO];
                    if (typeof O.constructor == 'function' && O instanceof O.constructor) {
                        return O.constructor.prototype;
                    } return O instanceof Object ? ObjectProto : null;
                };


                /***/ }),

            /***/ "5daa":
            /***/ (function(module, exports) {

                module.exports = function (it) {
                    if (typeof it != 'function') throw TypeError(it + ' is not a function!');
                    return it;
                };


                /***/ }),

            /***/ "6798":
            /***/ (function(module, exports, __webpack_require__) {

                var core = __webpack_require__("7ddc");
                var global = __webpack_require__("e7ad");
                var SHARED = '__core-js_shared__';
                var store = global[SHARED] || (global[SHARED] = {});

                (module.exports = function (key, value) {
                    return store[key] || (store[key] = value !== undefined ? value : {});
                })('versions', []).push({
                    version: core.version,
                    mode: __webpack_require__("550e") ? 'pure' : 'global',
                    copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
                });


                /***/ }),

            /***/ "690e":
            /***/ (function(module, exports) {

                /*
                    MIT License http://www.opensource.org/licenses/mit-license.php
                    Author Tobias Koppers @sokra
                */
// css base code, injected by the css-loader
                module.exports = function(useSourceMap) {
                    var list = [];

                    // return the list of modules as css string
                    list.toString = function toString() {
                        return this.map(function (item) {
                            var content = cssWithMappingToString(item, useSourceMap);
                            if(item[2]) {
                                return "@media " + item[2] + "{" + content + "}";
                            } else {
                                return content;
                            }
                        }).join("");
                    };

                    // import a list of modules into the list
                    list.i = function(modules, mediaQuery) {
                        if(typeof modules === "string")
                            modules = [[null, modules, ""]];
                        var alreadyImportedModules = {};
                        for(var i = 0; i < this.length; i++) {
                            var id = this[i][0];
                            if(typeof id === "number")
                                alreadyImportedModules[id] = true;
                        }
                        for(i = 0; i < modules.length; i++) {
                            var item = modules[i];
                            // skip already imported module
                            // this implementation is not 100% perfect for weird media query combinations
                            //  when a module is imported multiple times with different media queries.
                            //  I hope this will never occur (Hey this way we have smaller bundles)
                            if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
                                if(mediaQuery && !item[2]) {
                                    item[2] = mediaQuery;
                                } else if(mediaQuery) {
                                    item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
                                }
                                list.push(item);
                            }
                        }
                    };
                    return list;
                };

                function cssWithMappingToString(item, useSourceMap) {
                    var content = item[1] || '';
                    var cssMapping = item[3];
                    if (!cssMapping) {
                        return content;
                    }

                    if (useSourceMap && typeof btoa === 'function') {
                        var sourceMapping = toComment(cssMapping);
                        var sourceURLs = cssMapping.sources.map(function (source) {
                            return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
                        });

                        return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
                    }

                    return [content].join('\n');
                }

// Adapted from convert-source-map (MIT)
                function toComment(sourceMap) {
                    // eslint-disable-next-line no-undef
                    var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
                    var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

                    return '/*# ' + data + ' */';
                }


                /***/ }),

            /***/ "69b3":
            /***/ (function(module, exports, __webpack_require__) {

                var isObject = __webpack_require__("fb68");
                module.exports = function (it) {
                    if (!isObject(it)) throw TypeError(it + ' is not an object!');
                    return it;
                };


                /***/ }),

            /***/ "6d57":
            /***/ (function(module, exports, __webpack_require__) {

                var $iterators = __webpack_require__("e44b");
                var getKeys = __webpack_require__("80a9");
                var redefine = __webpack_require__("bf16");
                var global = __webpack_require__("e7ad");
                var hide = __webpack_require__("86d4");
                var Iterators = __webpack_require__("da6d");
                var wks = __webpack_require__("cb3d");
                var ITERATOR = wks('iterator');
                var TO_STRING_TAG = wks('toStringTag');
                var ArrayValues = Iterators.Array;

                var DOMIterables = {
                    CSSRuleList: true, // TODO: Not spec compliant, should be false.
                    CSSStyleDeclaration: false,
                    CSSValueList: false,
                    ClientRectList: false,
                    DOMRectList: false,
                    DOMStringList: false,
                    DOMTokenList: true,
                    DataTransferItemList: false,
                    FileList: false,
                    HTMLAllCollection: false,
                    HTMLCollection: false,
                    HTMLFormElement: false,
                    HTMLSelectElement: false,
                    MediaList: true, // TODO: Not spec compliant, should be false.
                    MimeTypeArray: false,
                    NamedNodeMap: false,
                    NodeList: true,
                    PaintRequestList: false,
                    Plugin: false,
                    PluginArray: false,
                    SVGLengthList: false,
                    SVGNumberList: false,
                    SVGPathSegList: false,
                    SVGPointList: false,
                    SVGStringList: false,
                    SVGTransformList: false,
                    SourceBufferList: false,
                    StyleSheetList: true, // TODO: Not spec compliant, should be false.
                    TextTrackCueList: false,
                    TextTrackList: false,
                    TouchList: false
                };

                for (var collections = getKeys(DOMIterables), i = 0; i < collections.length; i++) {
                    var NAME = collections[i];
                    var explicit = DOMIterables[NAME];
                    var Collection = global[NAME];
                    var proto = Collection && Collection.prototype;
                    var key;
                    if (proto) {
                        if (!proto[ITERATOR]) hide(proto, ITERATOR, ArrayValues);
                        if (!proto[TO_STRING_TAG]) hide(proto, TO_STRING_TAG, NAME);
                        Iterators[NAME] = ArrayValues;
                        if (explicit) for (key in $iterators) if (!proto[key]) redefine(proto, key, $iterators[key], true);
                    }
                }


                /***/ }),

            /***/ "75c4":
            /***/ (function(module, exports) {

                var toString = {}.toString;

                module.exports = function (it) {
                    return toString.call(it).slice(8, -1);
                };


                /***/ }),

            /***/ "7ddc":
            /***/ (function(module, exports) {

                var core = module.exports = { version: '2.6.11' };
                if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


                /***/ }),

            /***/ "7e23":
            /***/ (function(module, exports, __webpack_require__) {

// getting tag from 19.1.3.6 Object.prototype.toString()
                var cof = __webpack_require__("75c4");
                var TAG = __webpack_require__("cb3d")('toStringTag');
// ES3 wrong here
                var ARG = cof(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
                var tryGet = function (it, key) {
                    try {
                        return it[key];
                    } catch (e) { /* empty */ }
                };

                module.exports = function (it) {
                    var O, T, B;
                    return it === undefined ? 'Undefined' : it === null ? 'Null'
                        // @@toStringTag case
                        : typeof (T = tryGet(O = Object(it), TAG)) == 'string' ? T
                            // builtinTag case
                            : ARG ? cof(O)
                                // ES3 arguments fallback
                                : (B = cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
                };


                /***/ }),

            /***/ "80a9":
            /***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 / 15.2.3.14 Object.keys(O)
                var $keys = __webpack_require__("c2f7");
                var enumBugKeys = __webpack_require__("ceac");

                module.exports = Object.keys || function keys(O) {
                    return $keys(O, enumBugKeys);
                };


                /***/ }),

            /***/ "85cb":
            /***/ (function(module, __webpack_exports__, __webpack_require__) {

                "use strict";
// ESM COMPAT FLAG
                __webpack_require__.r(__webpack_exports__);

// EXPORTS
                __webpack_require__.d(__webpack_exports__, "default", function() { return /* binding */ addStylesClient; });

// CONCATENATED MODULE: ./node_modules/_vue-style-loader@4.1.2@vue-style-loader/lib/listToStyles.js
                /**
                 * Translates the list format produced by css-loader into something
                 * easier to manipulate.
                 */
                function listToStyles (parentId, list) {
                    var styles = []
                    var newStyles = {}
                    for (var i = 0; i < list.length; i++) {
                        var item = list[i]
                        var id = item[0]
                        var css = item[1]
                        var media = item[2]
                        var sourceMap = item[3]
                        var part = {
                            id: parentId + ':' + i,
                            css: css,
                            media: media,
                            sourceMap: sourceMap
                        }
                        if (!newStyles[id]) {
                            styles.push(newStyles[id] = { id: id, parts: [part] })
                        } else {
                            newStyles[id].parts.push(part)
                        }
                    }
                    return styles
                }

// CONCATENATED MODULE: ./node_modules/_vue-style-loader@4.1.2@vue-style-loader/lib/addStylesClient.js
                /*
                  MIT License http://www.opensource.org/licenses/mit-license.php
                  Author Tobias Koppers @sokra
                  Modified by Evan You @yyx990803
                */



                var hasDocument = typeof document !== 'undefined'

                if (typeof DEBUG !== 'undefined' && DEBUG) {
                    if (!hasDocument) {
                        throw new Error(
                            'vue-style-loader cannot be used in a non-browser environment. ' +
                            "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
                        ) }
                }

                /*
                type StyleObject = {
                  id: number;
                  parts: Array<StyleObjectPart>
                }

                type StyleObjectPart = {
                  css: string;
                  media: string;
                  sourceMap: ?string
                }
                */

                var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

                var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
                var singletonElement = null
                var singletonCounter = 0
                var isProduction = false
                var noop = function () {}
                var options = null
                var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
                var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

                function addStylesClient (parentId, list, _isProduction, _options) {
                    isProduction = _isProduction

                    options = _options || {}

                    var styles = listToStyles(parentId, list)
                    addStylesToDom(styles)

                    return function update (newList) {
                        var mayRemove = []
                        for (var i = 0; i < styles.length; i++) {
                            var item = styles[i]
                            var domStyle = stylesInDom[item.id]
                            domStyle.refs--
                            mayRemove.push(domStyle)
                        }
                        if (newList) {
                            styles = listToStyles(parentId, newList)
                            addStylesToDom(styles)
                        } else {
                            styles = []
                        }
                        for (var i = 0; i < mayRemove.length; i++) {
                            var domStyle = mayRemove[i]
                            if (domStyle.refs === 0) {
                                for (var j = 0; j < domStyle.parts.length; j++) {
                                    domStyle.parts[j]()
                                }
                                delete stylesInDom[domStyle.id]
                            }
                        }
                    }
                }

                function addStylesToDom (styles /* Array<StyleObject> */) {
                    for (var i = 0; i < styles.length; i++) {
                        var item = styles[i]
                        var domStyle = stylesInDom[item.id]
                        if (domStyle) {
                            domStyle.refs++
                            for (var j = 0; j < domStyle.parts.length; j++) {
                                domStyle.parts[j](item.parts[j])
                            }
                            for (; j < item.parts.length; j++) {
                                domStyle.parts.push(addStyle(item.parts[j]))
                            }
                            if (domStyle.parts.length > item.parts.length) {
                                domStyle.parts.length = item.parts.length
                            }
                        } else {
                            var parts = []
                            for (var j = 0; j < item.parts.length; j++) {
                                parts.push(addStyle(item.parts[j]))
                            }
                            stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
                        }
                    }
                }

                function createStyleElement () {
                    var styleElement = document.createElement('style')
                    styleElement.type = 'text/css'
                    head.appendChild(styleElement)
                    return styleElement
                }

                function addStyle (obj /* StyleObjectPart */) {
                    var update, remove
                    var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

                    if (styleElement) {
                        if (isProduction) {
                            // has SSR styles and in production mode.
                            // simply do nothing.
                            return noop
                        } else {
                            // has SSR styles but in dev mode.
                            // for some reason Chrome can't handle source map in server-rendered
                            // style tags - source maps in <style> only works if the style tag is
                            // created and inserted dynamically. So we remove the server rendered
                            // styles and inject new ones.
                            styleElement.parentNode.removeChild(styleElement)
                        }
                    }

                    if (isOldIE) {
                        // use singleton mode for IE9.
                        var styleIndex = singletonCounter++
                        styleElement = singletonElement || (singletonElement = createStyleElement())
                        update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
                        remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
                    } else {
                        // use multi-style-tag mode in all other cases
                        styleElement = createStyleElement()
                        update = applyToTag.bind(null, styleElement)
                        remove = function () {
                            styleElement.parentNode.removeChild(styleElement)
                        }
                    }

                    update(obj)

                    return function updateStyle (newObj /* StyleObjectPart */) {
                        if (newObj) {
                            if (newObj.css === obj.css &&
                                newObj.media === obj.media &&
                                newObj.sourceMap === obj.sourceMap) {
                                return
                            }
                            update(obj = newObj)
                        } else {
                            remove()
                        }
                    }
                }

                var replaceText = (function () {
                    var textStore = []

                    return function (index, replacement) {
                        textStore[index] = replacement
                        return textStore.filter(Boolean).join('\n')
                    }
                })()

                function applyToSingletonTag (styleElement, index, remove, obj) {
                    var css = remove ? '' : obj.css

                    if (styleElement.styleSheet) {
                        styleElement.styleSheet.cssText = replaceText(index, css)
                    } else {
                        var cssNode = document.createTextNode(css)
                        var childNodes = styleElement.childNodes
                        if (childNodes[index]) styleElement.removeChild(childNodes[index])
                        if (childNodes.length) {
                            styleElement.insertBefore(cssNode, childNodes[index])
                        } else {
                            styleElement.appendChild(cssNode)
                        }
                    }
                }

                function applyToTag (styleElement, obj) {
                    var css = obj.css
                    var media = obj.media
                    var sourceMap = obj.sourceMap

                    if (media) {
                        styleElement.setAttribute('media', media)
                    }
                    if (options.ssrId) {
                        styleElement.setAttribute(ssrIdKey, obj.id)
                    }

                    if (sourceMap) {
                        // https://developer.chrome.com/devtools/docs/javascript-debugging
                        // this makes source maps inside style tags work properly in Chrome
                        css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
                        // http://stackoverflow.com/a/26603875
                        css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
                    }

                    if (styleElement.styleSheet) {
                        styleElement.styleSheet.cssText = css
                    } else {
                        while (styleElement.firstChild) {
                            styleElement.removeChild(styleElement.firstChild)
                        }
                        styleElement.appendChild(document.createTextNode(css))
                    }
                }


                /***/ }),

            /***/ "86d4":
            /***/ (function(module, exports, __webpack_require__) {

                var dP = __webpack_require__("064e");
                var createDesc = __webpack_require__("cc33");
                module.exports = __webpack_require__("149f") ? function (object, key, value) {
                    return dP.f(object, key, createDesc(1, value));
                } : function (object, key, value) {
                    object[key] = value;
                    return object;
                };


                /***/ }),

            /***/ "8df1":
            /***/ (function(module, exports, __webpack_require__) {

                var document = __webpack_require__("e7ad").document;
                module.exports = document && document.documentElement;


                /***/ }),

            /***/ "9370":
            /***/ (function(module, exports, __webpack_require__) {

// fallback for IE11 buggy Object.getOwnPropertyNames with iframe and window
                var toIObject = __webpack_require__("09b9");
                var gOPN = __webpack_require__("2ea2").f;
                var toString = {}.toString;

                var windowNames = typeof window == 'object' && window && Object.getOwnPropertyNames
                    ? Object.getOwnPropertyNames(window) : [];

                var getWindowNames = function (it) {
                    try {
                        return gOPN(it);
                    } catch (e) {
                        return windowNames.slice();
                    }
                };

                module.exports.f = function getOwnPropertyNames(it) {
                    return windowNames && toString.call(it) == '[object Window]' ? getWindowNames(it) : gOPN(toIObject(it));
                };


                /***/ }),

            /***/ "94b3":
            /***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
                var isObject = __webpack_require__("fb68");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
                module.exports = function (it, S) {
                    if (!isObject(it)) return it;
                    var fn, val;
                    if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
                    if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
                    if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
                    throw TypeError("Can't convert object to primitive value");
                };


                /***/ }),

            /***/ "a08d":
            /***/ (function(module, exports, __webpack_require__) {

                exports.f = __webpack_require__("cb3d");


                /***/ }),

            /***/ "b3a6":
            /***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
                var toIObject = __webpack_require__("09b9");
                var toLength = __webpack_require__("eafa");
                var toAbsoluteIndex = __webpack_require__("f58a");
                module.exports = function (IS_INCLUDES) {
                    return function ($this, el, fromIndex) {
                        var O = toIObject($this);
                        var length = toLength(O.length);
                        var index = toAbsoluteIndex(fromIndex, length);
                        var value;
                        // Array#includes uses SameValueZero equality algorithm
                        // eslint-disable-next-line no-self-compare
                        if (IS_INCLUDES && el != el) while (length > index) {
                            value = O[index++];
                            // eslint-disable-next-line no-self-compare
                            if (value != value) return true;
                            // Array#indexOf ignores holes, Array#includes - not
                        } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
                            if (O[index] === el) return IS_INCLUDES || index || 0;
                        } return !IS_INCLUDES && -1;
                    };
                };


                /***/ }),

            /***/ "bf16":
            /***/ (function(module, exports, __webpack_require__) {

                var global = __webpack_require__("e7ad");
                var hide = __webpack_require__("86d4");
                var has = __webpack_require__("e042");
                var SRC = __webpack_require__("ec45")('src');
                var $toString = __webpack_require__("d07e");
                var TO_STRING = 'toString';
                var TPL = ('' + $toString).split(TO_STRING);

                __webpack_require__("7ddc").inspectSource = function (it) {
                    return $toString.call(it);
                };

                (module.exports = function (O, key, val, safe) {
                    var isFunction = typeof val == 'function';
                    if (isFunction) has(val, 'name') || hide(val, 'name', key);
                    if (O[key] === val) return;
                    if (isFunction) has(val, SRC) || hide(val, SRC, O[key] ? '' + O[key] : TPL.join(String(key)));
                    if (O === global) {
                        O[key] = val;
                    } else if (!safe) {
                        delete O[key];
                        hide(O, key, val);
                    } else if (O[key]) {
                        O[key] = val;
                    } else {
                        hide(O, key, val);
                    }
// add fake Function#toString for correct work wrapped methods / constructors with methods like LoDash isNative
                })(Function.prototype, TO_STRING, function toString() {
                    return typeof this == 'function' && this[SRC] || $toString.call(this);
                });


                /***/ }),

            /***/ "bfe7":
            /***/ (function(module, exports, __webpack_require__) {

                var isObject = __webpack_require__("fb68");
                var document = __webpack_require__("e7ad").document;
// typeof document.createElement is 'object' in old IE
                var is = isObject(document) && isObject(document.createElement);
                module.exports = function (it) {
                    return is ? document.createElement(it) : {};
                };


                /***/ }),

            /***/ "c2f7":
            /***/ (function(module, exports, __webpack_require__) {

                var has = __webpack_require__("e042");
                var toIObject = __webpack_require__("09b9");
                var arrayIndexOf = __webpack_require__("b3a6")(false);
                var IE_PROTO = __webpack_require__("56f2")('IE_PROTO');

                module.exports = function (object, names) {
                    var O = toIObject(object);
                    var i = 0;
                    var result = [];
                    var key;
                    for (key in O) if (key != IE_PROTO) has(O, key) && result.push(key);
                    // Don't enum bug & hidden keys
                    while (names.length > i) if (has(O, key = names[i++])) {
                        ~arrayIndexOf(result, key) || result.push(key);
                    }
                    return result;
                };


                /***/ }),

            /***/ "ca06":
            /***/ (function(module, exports, __webpack_require__) {

                exports = module.exports = __webpack_require__("690e")(false);
// imports


// module
                exports.push([module.i, ".m-colorPicker[data-v-29accc04]{position:relative;text-align:left;font-size:14px;display:inline-block;outline:none}.m-colorPicker li[data-v-29accc04],.m-colorPicker ol[data-v-29accc04],.m-colorPicker ul[data-v-29accc04]{list-style:none;margin:0;padding:0}.m-colorPicker .colorBtn[data-v-29accc04]{width:15px;height:15px}.m-colorPicker .colorBtn.disabled[data-v-29accc04]{cursor:no-drop}.m-colorPicker .box[data-v-29accc04]{position:absolute;width:190px;background:#fff;border:1px solid #ddd;visibility:hidden;border-radius:2px;margin-top:2px;padding:10px;padding-bottom:5px;-webkit-box-shadow:0 0 5px rgba(0,0,0,.15);box-shadow:0 0 5px rgba(0,0,0,.15);opacity:0;-webkit-transition:all .3s ease;transition:all .3s ease;-webkit-box-sizing:content-box;box-sizing:content-box}.m-colorPicker .box h3[data-v-29accc04]{margin:0;font-size:14px;font-weight:400;margin-top:10px;margin-bottom:5px;line-height:1;color:#333}.m-colorPicker .box input[data-v-29accc04]{visibility:hidden;position:absolute;left:0;bottom:0}.m-colorPicker .box.open[data-v-29accc04]{visibility:visible;opacity:1;z-index:1}.m-colorPicker .hd[data-v-29accc04]{overflow:hidden;line-height:29px}.m-colorPicker .hd .colorView[data-v-29accc04]{width:100px;height:30px;float:left;-webkit-transition:background-color .3s ease;transition:background-color .3s ease}.m-colorPicker .hd .defaultColor[data-v-29accc04]{width:80px;float:right;text-align:center;border:1px solid #ddd;cursor:pointer;color:#333}.m-colorPicker .tColor li[data-v-29accc04]{width:15px;height:15px;display:inline-block;margin:0 2px;-webkit-transition:all .3s ease;transition:all .3s ease}.m-colorPicker .tColor li[data-v-29accc04]:hover{-webkit-box-shadow:0 0 5px rgba(0,0,0,.4);box-shadow:0 0 5px rgba(0,0,0,.4);-webkit-transform:scale(1.3);transform:scale(1.3)}.m-colorPicker .bColor li[data-v-29accc04]{width:15px;display:inline-block;margin:0 2px}.m-colorPicker .bColor li li[data-v-29accc04]{display:block;width:15px;height:15px;-webkit-transition:all .3s ease;transition:all .3s ease;margin:0}.m-colorPicker .bColor li li[data-v-29accc04]:hover{-webkit-box-shadow:0 0 5px rgba(0,0,0,.4);box-shadow:0 0 5px rgba(0,0,0,.4);-webkit-transform:scale(1.3);transform:scale(1.3)}", ""]);

// exports


                /***/ }),

            /***/ "cb3d":
            /***/ (function(module, exports, __webpack_require__) {

                var store = __webpack_require__("6798")('wks');
                var uid = __webpack_require__("ec45");
                var Symbol = __webpack_require__("e7ad").Symbol;
                var USE_SYMBOL = typeof Symbol == 'function';

                var $exports = module.exports = function (name) {
                    return store[name] || (store[name] =
                        USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
                };

                $exports.store = store;


                /***/ }),

            /***/ "cc33":
            /***/ (function(module, exports) {

                module.exports = function (bitmap, value) {
                    return {
                        enumerable: !(bitmap & 1),
                        configurable: !(bitmap & 2),
                        writable: !(bitmap & 4),
                        value: value
                    };
                };


                /***/ }),

            /***/ "cc57":
            /***/ (function(module, exports, __webpack_require__) {

                var dP = __webpack_require__("064e").f;
                var FProto = Function.prototype;
                var nameRE = /^\s*function ([^ (]*)/;
                var NAME = 'name';

// 19.2.4.2 name
                NAME in FProto || __webpack_require__("149f") && dP(FProto, NAME, {
                    configurable: true,
                    get: function () {
                        try {
                            return ('' + this).match(nameRE)[1];
                        } catch (e) {
                            return '';
                        }
                    }
                });


                /***/ }),

            /***/ "ceac":
            /***/ (function(module, exports) {

// IE 8- don't enum bug keys
                module.exports = (
                    'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
                ).split(',');


                /***/ }),

            /***/ "d07e":
            /***/ (function(module, exports, __webpack_require__) {

                module.exports = __webpack_require__("6798")('native-function-to-string', Function.toString);


                /***/ }),

            /***/ "d0bc":
            /***/ (function(module, exports, __webpack_require__) {

// call something on iterator step with safe closing on error
                var anObject = __webpack_require__("69b3");
                module.exports = function (iterator, fn, value, entries) {
                    try {
                        return entries ? fn(anObject(value)[0], value[1]) : fn(value);
                        // 7.4.6 IteratorClose(iterator, completion)
                    } catch (e) {
                        var ret = iterator['return'];
                        if (ret !== undefined) anObject(ret.call(iterator));
                        throw e;
                    }
                };


                /***/ }),

            /***/ "d0c5":
            /***/ (function(module, exports, __webpack_require__) {

                var ITERATOR = __webpack_require__("cb3d")('iterator');
                var SAFE_CLOSING = false;

                try {
                    var riter = [7][ITERATOR]();
                    riter['return'] = function () { SAFE_CLOSING = true; };
                    // eslint-disable-next-line no-throw-literal
                    Array.from(riter, function () { throw 2; });
                } catch (e) { /* empty */ }

                module.exports = function (exec, skipClosing) {
                    if (!skipClosing && !SAFE_CLOSING) return false;
                    var safe = false;
                    try {
                        var arr = [7];
                        var iter = arr[ITERATOR]();
                        iter.next = function () { return { done: safe = true }; };
                        arr[ITERATOR] = function () { return iter; };
                        exec(arr);
                    } catch (e) { /* empty */ }
                    return safe;
                };


                /***/ }),

            /***/ "da6d":
            /***/ (function(module, exports) {

                module.exports = {};


                /***/ }),

            /***/ "db6b":
            /***/ (function(module, exports, __webpack_require__) {

                module.exports = !__webpack_require__("149f") && !__webpack_require__("238a")(function () {
                    return Object.defineProperty(__webpack_require__("bfe7")('div'), 'a', { get: function () { return 7; } }).a != 7;
                });


                /***/ }),

            /***/ "dcb7":
            /***/ (function(module, exports, __webpack_require__) {

                var pIE = __webpack_require__("4f18");
                var createDesc = __webpack_require__("cc33");
                var toIObject = __webpack_require__("09b9");
                var toPrimitive = __webpack_require__("94b3");
                var has = __webpack_require__("e042");
                var IE8_DOM_DEFINE = __webpack_require__("db6b");
                var gOPD = Object.getOwnPropertyDescriptor;

                exports.f = __webpack_require__("149f") ? gOPD : function getOwnPropertyDescriptor(O, P) {
                    O = toIObject(O);
                    P = toPrimitive(P, true);
                    if (IE8_DOM_DEFINE) try {
                        return gOPD(O, P);
                    } catch (e) { /* empty */ }
                    if (has(O, P)) return createDesc(!pIE.f.call(O, P), O[P]);
                };


                /***/ }),

            /***/ "e005":
            /***/ (function(module, exports, __webpack_require__) {

// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
                var anObject = __webpack_require__("69b3");
                var dPs = __webpack_require__("0dc8");
                var enumBugKeys = __webpack_require__("ceac");
                var IE_PROTO = __webpack_require__("56f2")('IE_PROTO');
                var Empty = function () { /* empty */ };
                var PROTOTYPE = 'prototype';

// Create object with fake `null` prototype: use iframe Object with cleared prototype
                var createDict = function () {
                    // Thrash, waste and sodomy: IE GC bug
                    var iframe = __webpack_require__("bfe7")('iframe');
                    var i = enumBugKeys.length;
                    var lt = '<';
                    var gt = '>';
                    var iframeDocument;
                    iframe.style.display = 'none';
                    __webpack_require__("8df1").appendChild(iframe);
                    iframe.src = 'javascript:'; // eslint-disable-line no-script-url
                    // createDict = iframe.contentWindow.Object;
                    // html.removeChild(iframe);
                    iframeDocument = iframe.contentWindow.document;
                    iframeDocument.open();
                    iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
                    iframeDocument.close();
                    createDict = iframeDocument.F;
                    while (i--) delete createDict[PROTOTYPE][enumBugKeys[i]];
                    return createDict();
                };

                module.exports = Object.create || function create(O, Properties) {
                    var result;
                    if (O !== null) {
                        Empty[PROTOTYPE] = anObject(O);
                        result = new Empty();
                        Empty[PROTOTYPE] = null;
                        // add "__proto__" for Object.getPrototypeOf polyfill
                        result[IE_PROTO] = O;
                    } else result = createDict();
                    return Properties === undefined ? result : dPs(result, Properties);
                };


                /***/ }),

            /***/ "e042":
            /***/ (function(module, exports) {

                var hasOwnProperty = {}.hasOwnProperty;
                module.exports = function (it, key) {
                    return hasOwnProperty.call(it, key);
                };


                /***/ }),

            /***/ "e137":
            /***/ (function(module, __webpack_exports__, __webpack_require__) {

                "use strict";
                /* harmony import */ var _node_modules_vue_style_loader_4_1_2_vue_style_loader_index_js_ref_8_oneOf_1_0_node_modules_css_loader_1_0_1_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_15_9_2_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_3_node_modules_sass_loader_7_3_1_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_node_modules_cache_loader_2_0_1_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_15_9_2_vue_loader_lib_index_js_vue_loader_options_color_picker_vue_vue_type_style_index_0_id_29accc04_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("1b07");
                /* harmony import */ var _node_modules_vue_style_loader_4_1_2_vue_style_loader_index_js_ref_8_oneOf_1_0_node_modules_css_loader_1_0_1_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_15_9_2_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_3_node_modules_sass_loader_7_3_1_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_node_modules_cache_loader_2_0_1_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_15_9_2_vue_loader_lib_index_js_vue_loader_options_color_picker_vue_vue_type_style_index_0_id_29accc04_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_style_loader_4_1_2_vue_style_loader_index_js_ref_8_oneOf_1_0_node_modules_css_loader_1_0_1_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_15_9_2_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_3_node_modules_sass_loader_7_3_1_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_node_modules_cache_loader_2_0_1_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_15_9_2_vue_loader_lib_index_js_vue_loader_options_color_picker_vue_vue_type_style_index_0_id_29accc04_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
                /* unused harmony reexport * */
                /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_vue_style_loader_4_1_2_vue_style_loader_index_js_ref_8_oneOf_1_0_node_modules_css_loader_1_0_1_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_15_9_2_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_postcss_loader_3_0_0_postcss_loader_src_index_js_ref_8_oneOf_1_3_node_modules_sass_loader_7_3_1_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_node_modules_cache_loader_2_0_1_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_15_9_2_vue_loader_lib_index_js_vue_loader_options_color_picker_vue_vue_type_style_index_0_id_29accc04_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a);

                /***/ }),

            /***/ "e44b":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var addToUnscopables = __webpack_require__("0e8b");
                var step = __webpack_require__("475d");
                var Iterators = __webpack_require__("da6d");
                var toIObject = __webpack_require__("09b9");

// 22.1.3.4 Array.prototype.entries()
// 22.1.3.13 Array.prototype.keys()
// 22.1.3.29 Array.prototype.values()
// 22.1.3.30 Array.prototype[@@iterator]()
                module.exports = __webpack_require__("492d")(Array, 'Array', function (iterated, kind) {
                    this._t = toIObject(iterated); // target
                    this._i = 0;                   // next index
                    this._k = kind;                // kind
// 22.1.5.2.1 %ArrayIteratorPrototype%.next()
                }, function () {
                    var O = this._t;
                    var kind = this._k;
                    var index = this._i++;
                    if (!O || index >= O.length) {
                        this._t = undefined;
                        return step(1);
                    }
                    if (kind == 'keys') return step(0, index);
                    if (kind == 'values') return step(0, O[index]);
                    return step(0, [index, O[index]]);
                }, 'values');

// argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
                Iterators.Arguments = Iterators.Array;

                addToUnscopables('keys');
                addToUnscopables('values');
                addToUnscopables('entries');


                /***/ }),

            /***/ "e46b":
            /***/ (function(module, exports, __webpack_require__) {

                var global = __webpack_require__("e7ad");
                var core = __webpack_require__("7ddc");
                var hide = __webpack_require__("86d4");
                var redefine = __webpack_require__("bf16");
                var ctx = __webpack_require__("4ce5");
                var PROTOTYPE = 'prototype';

                var $export = function (type, name, source) {
                    var IS_FORCED = type & $export.F;
                    var IS_GLOBAL = type & $export.G;
                    var IS_STATIC = type & $export.S;
                    var IS_PROTO = type & $export.P;
                    var IS_BIND = type & $export.B;
                    var target = IS_GLOBAL ? global : IS_STATIC ? global[name] || (global[name] = {}) : (global[name] || {})[PROTOTYPE];
                    var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
                    var expProto = exports[PROTOTYPE] || (exports[PROTOTYPE] = {});
                    var key, own, out, exp;
                    if (IS_GLOBAL) source = name;
                    for (key in source) {
                        // contains in native
                        own = !IS_FORCED && target && target[key] !== undefined;
                        // export native or passed
                        out = (own ? target : source)[key];
                        // bind timers to global for call from export context
                        exp = IS_BIND && own ? ctx(out, global) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
                        // extend global
                        if (target) redefine(target, key, out, type & $export.U);
                        // export
                        if (exports[key] != out) hide(exports, key, exp);
                        if (IS_PROTO && expProto[key] != out) expProto[key] = out;
                    }
                };
                global.core = core;
// type bitmap
                $export.F = 1;   // forced
                $export.G = 2;   // global
                $export.S = 4;   // static
                $export.P = 8;   // proto
                $export.B = 16;  // bind
                $export.W = 32;  // wrap
                $export.U = 64;  // safe
                $export.R = 128; // real proto method for `library`
                module.exports = $export;


                /***/ }),

            /***/ "e67d":
            /***/ (function(module, exports) {

// document.currentScript polyfill by Adam Miller

// MIT license

                (function(document){
                    var currentScript = "currentScript",
                        scripts = document.getElementsByTagName('script'); // Live NodeList collection

                    // If browser needs currentScript polyfill, add get currentScript() to the document object
                    if (!(currentScript in document)) {
                        Object.defineProperty(document, currentScript, {
                            get: function(){

                                // IE 6-10 supports script readyState
                                // IE 10+ support stack trace
                                try { throw new Error(); }
                                catch (err) {

                                    // Find the second match for the "at" string to get file src url from stack.
                                    // Specifically works with the format of stack traces in IE.
                                    var i, res = ((/.*at [^\(]*\((.*):.+:.+\)$/ig).exec(err.stack) || [false])[1];

                                    // For all scripts on the page, if src matches or if ready state is interactive, return the script tag
                                    for(i in scripts){
                                        if(scripts[i].src == res || scripts[i].readyState == "interactive"){
                                            return scripts[i];
                                        }
                                    }

                                    // If no match, return null
                                    return null;
                                }
                            }
                        });
                    }
                })(document);


                /***/ }),

            /***/ "e7ad":
            /***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
                var global = module.exports = typeof window != 'undefined' && window.Math == Math
                    ? window : typeof self != 'undefined' && self.Math == Math ? self
                        // eslint-disable-next-line no-new-func
                        : Function('return this')();
                if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


                /***/ }),

            /***/ "eafa":
            /***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
                var toInteger = __webpack_require__("ee21");
                var min = Math.min;
                module.exports = function (it) {
                    return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
                };


                /***/ }),

            /***/ "ebc3":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var $defineProperty = __webpack_require__("064e");
                var createDesc = __webpack_require__("cc33");

                module.exports = function (object, index, value) {
                    if (index in object) $defineProperty.f(object, index, createDesc(0, value));
                    else object[index] = value;
                };


                /***/ }),

            /***/ "ec25":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

                var ctx = __webpack_require__("4ce5");
                var $export = __webpack_require__("e46b");
                var toObject = __webpack_require__("008a");
                var call = __webpack_require__("d0bc");
                var isArrayIter = __webpack_require__("2285");
                var toLength = __webpack_require__("eafa");
                var createProperty = __webpack_require__("ebc3");
                var getIterFn = __webpack_require__("f878");

                $export($export.S + $export.F * !__webpack_require__("d0c5")(function (iter) { Array.from(iter); }), 'Array', {
                    // 22.1.2.1 Array.from(arrayLike, mapfn = undefined, thisArg = undefined)
                    from: function from(arrayLike /* , mapfn = undefined, thisArg = undefined */) {
                        var O = toObject(arrayLike);
                        var C = typeof this == 'function' ? this : Array;
                        var aLen = arguments.length;
                        var mapfn = aLen > 1 ? arguments[1] : undefined;
                        var mapping = mapfn !== undefined;
                        var index = 0;
                        var iterFn = getIterFn(O);
                        var length, result, step, iterator;
                        if (mapping) mapfn = ctx(mapfn, aLen > 2 ? arguments[2] : undefined, 2);
                        // if object isn't iterable or it's array with default iterator - use simple case
                        if (iterFn != undefined && !(C == Array && isArrayIter(iterFn))) {
                            for (iterator = iterFn.call(O), result = new C(); !(step = iterator.next()).done; index++) {
                                createProperty(result, index, mapping ? call(iterator, mapfn, [step.value, index], true) : step.value);
                            }
                        } else {
                            length = toLength(O.length);
                            for (result = new C(length); length > index; index++) {
                                createProperty(result, index, mapping ? mapfn(O[index], index) : O[index]);
                            }
                        }
                        result.length = index;
                        return result;
                    }
                });


                /***/ }),

            /***/ "ec45":
            /***/ (function(module, exports) {

                var id = 0;
                var px = Math.random();
                module.exports = function (key) {
                    return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
                };


                /***/ }),

            /***/ "ee21":
            /***/ (function(module, exports) {

// 7.1.4 ToInteger
                var ceil = Math.ceil;
                var floor = Math.floor;
                module.exports = function (it) {
                    return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
                };


                /***/ }),

            /***/ "f091":
            /***/ (function(module, exports, __webpack_require__) {

// all enumerable object keys, includes symbols
                var getKeys = __webpack_require__("80a9");
                var gOPS = __webpack_require__("2f77");
                var pIE = __webpack_require__("4f18");
                module.exports = function (it) {
                    var result = getKeys(it);
                    var getSymbols = gOPS.f;
                    if (getSymbols) {
                        var symbols = getSymbols(it);
                        var isEnum = pIE.f;
                        var i = 0;
                        var key;
                        while (symbols.length > i) if (isEnum.call(it, key = symbols[i++])) result.push(key);
                    } return result;
                };


                /***/ }),

            /***/ "f1fe":
            /***/ (function(module, exports, __webpack_require__) {

                "use strict";

// 21.2.5.3 get RegExp.prototype.flags
                var anObject = __webpack_require__("69b3");
                module.exports = function () {
                    var that = anObject(this);
                    var result = '';
                    if (that.global) result += 'g';
                    if (that.ignoreCase) result += 'i';
                    if (that.multiline) result += 'm';
                    if (that.unicode) result += 'u';
                    if (that.sticky) result += 'y';
                    return result;
                };


                /***/ }),

            /***/ "f58a":
            /***/ (function(module, exports, __webpack_require__) {

                var toInteger = __webpack_require__("ee21");
                var max = Math.max;
                var min = Math.min;
                module.exports = function (index, length) {
                    index = toInteger(index);
                    return index < 0 ? max(index + length, 0) : min(index, length);
                };


                /***/ }),

            /***/ "f6b4":
            /***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
                module.exports = function (it) {
                    if (it == undefined) throw TypeError("Can't call method on  " + it);
                    return it;
                };


                /***/ }),

            /***/ "f71f":
            /***/ (function(module, exports, __webpack_require__) {

                var META = __webpack_require__("ec45")('meta');
                var isObject = __webpack_require__("fb68");
                var has = __webpack_require__("e042");
                var setDesc = __webpack_require__("064e").f;
                var id = 0;
                var isExtensible = Object.isExtensible || function () {
                    return true;
                };
                var FREEZE = !__webpack_require__("238a")(function () {
                    return isExtensible(Object.preventExtensions({}));
                });
                var setMeta = function (it) {
                    setDesc(it, META, { value: {
                            i: 'O' + ++id, // object ID
                            w: {}          // weak collections IDs
                        } });
                };
                var fastKey = function (it, create) {
                    // return primitive with prefix
                    if (!isObject(it)) return typeof it == 'symbol' ? it : (typeof it == 'string' ? 'S' : 'P') + it;
                    if (!has(it, META)) {
                        // can't set metadata to uncaught frozen object
                        if (!isExtensible(it)) return 'F';
                        // not necessary to add metadata
                        if (!create) return 'E';
                        // add missing metadata
                        setMeta(it);
                        // return object ID
                    } return it[META].i;
                };
                var getWeak = function (it, create) {
                    if (!has(it, META)) {
                        // can't set metadata to uncaught frozen object
                        if (!isExtensible(it)) return true;
                        // not necessary to add metadata
                        if (!create) return false;
                        // add missing metadata
                        setMeta(it);
                        // return hash weak collections IDs
                    } return it[META].w;
                };
// add metadata on freeze-family methods calling
                var onFreeze = function (it) {
                    if (FREEZE && meta.NEED && isExtensible(it) && !has(it, META)) setMeta(it);
                    return it;
                };
                var meta = module.exports = {
                    KEY: META,
                    NEED: false,
                    fastKey: fastKey,
                    getWeak: getWeak,
                    onFreeze: onFreeze
                };


                /***/ }),

            /***/ "f878":
            /***/ (function(module, exports, __webpack_require__) {

                var classof = __webpack_require__("7e23");
                var ITERATOR = __webpack_require__("cb3d")('iterator');
                var Iterators = __webpack_require__("da6d");
                module.exports = __webpack_require__("7ddc").getIteratorMethod = function (it) {
                    if (it != undefined) return it[ITERATOR]
                        || it['@@iterator']
                        || Iterators[classof(it)];
                };


                /***/ }),

            /***/ "fb68":
            /***/ (function(module, exports) {

                module.exports = function (it) {
                    return typeof it === 'object' ? it !== null : typeof it === 'function';
                };


                /***/ }),

            /***/ "fc81":
            /***/ (function(module, exports, __webpack_require__) {

                var toInteger = __webpack_require__("ee21");
                var defined = __webpack_require__("f6b4");
// true  -> String#at
// false -> String#codePointAt
                module.exports = function (TO_STRING) {
                    return function (that, pos) {
                        var s = String(defined(that));
                        var i = toInteger(pos);
                        var l = s.length;
                        var a, b;
                        if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
                        a = s.charCodeAt(i);
                        return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff
                            ? TO_STRING ? s.charAt(i) : a
                            : TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
                    };
                };


                /***/ })

            /******/ });
});
//# sourceMappingURL=vcolorpicker.umd.js.map
