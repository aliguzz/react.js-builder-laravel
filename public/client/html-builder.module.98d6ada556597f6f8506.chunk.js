webpackJsonp(["html-builder.module"], {
    "0hNI": function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return a
        }), n.d = function(e) {
            return l["\u0275vid"](2, [l["\u0275ncd"](null, 0), (e()(), l["\u0275eld"](1, 0, [
                ["body", 1]
            ], null, 5, "div", [
                ["class", "mat-expansion-panel-content"],
                ["role", "region"]
            ], [
                [24, "@bodyExpansion", 0],
                [2, "mat-expanded", null],
                [1, "aria-labelledby", 0],
                [8, "id", 0]
            ], [
                [null, "@bodyExpansion.done"],
                [null, "@bodyExpansion.start"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "@bodyExpansion.done" === n && (l = !1 !== o._bodyAnimation(t) && l), "@bodyExpansion.start" === n && (l = !1 !== o._bodyAnimation(t) && l), l
            }, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 3, "div", [
                ["class", "mat-expansion-panel-body"]
            ], null, null, null, null, null)), l["\u0275ncd"](null, 1), (e()(), l["\u0275and"](16777216, null, null, 1, null, r)), l["\u0275did"](5, 212992, null, 0, i.c, [l.ComponentFactoryResolver, l.ViewContainerRef], {
                portal: [0, "portal"]
            }, null), l["\u0275ncd"](null, 2)], function(e, n) {
                e(n, 5, 0, n.component._portal)
            }, function(e, n) {
                var t = n.component;
                e(n, 1, 0, t._getExpandedState(), t.expanded, t._headerId, t.id)
            })
        }, t.d(n, "b", function() {
            return u
        }), n.c = function(e) {
            return l["\u0275vid"](2, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "span", [
                ["class", "mat-content"]
            ], null, null, null, null, null)), l["\u0275ncd"](null, 0), l["\u0275ncd"](null, 1), l["\u0275ncd"](null, 2), (e()(), l["\u0275and"](16777216, null, null, 1, null, s)), l["\u0275did"](5, 16384, null, 0, o.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 5, 0, n.component._showToggle())
            }, null)
        };
        var l = t("LMZF"),
            o = t("Un6q"),
            i = t("CZgk"),
            a = l["\u0275crt"]({
                encapsulation: 2,
                styles: [".mat-expansion-panel{transition:box-shadow 280ms cubic-bezier(.4,0,.2,1);box-sizing:content-box;display:block;margin:0;transition:margin 225ms cubic-bezier(.4,0,.2,1)}.mat-expansion-panel:not([class*=mat-elevation-z]){box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12)}.mat-expansion-panel-content{overflow:hidden}.mat-expansion-panel-content.mat-expanded{overflow:visible}.mat-expansion-panel-body{padding:0 24px 16px}.mat-expansion-panel-spacing{margin:16px 0}.mat-accordion .mat-expansion-panel-spacing:first-child{margin-top:0}.mat-accordion .mat-expansion-panel-spacing:last-child{margin-bottom:0}.mat-action-row{border-top-style:solid;border-top-width:1px;display:flex;flex-direction:row;justify-content:flex-end;padding:16px 8px 16px 24px}.mat-action-row button.mat-button{margin-left:8px}[dir=rtl] .mat-action-row button.mat-button{margin-left:0;margin-right:8px}"],
                data: {
                    animation: [{
                        type: 7,
                        name: "bodyExpansion",
                        definitions: [{
                            type: 0,
                            name: "collapsed",
                            styles: {
                                type: 6,
                                styles: {
                                    height: "0px",
                                    visibility: "hidden"
                                },
                                offset: null
                            },
                            options: void 0
                        }, {
                            type: 0,
                            name: "expanded",
                            styles: {
                                type: 6,
                                styles: {
                                    height: "*",
                                    visibility: "visible"
                                },
                                offset: null
                            },
                            options: void 0
                        }, {
                            type: 1,
                            expr: "expanded <=> collapsed",
                            animation: {
                                type: 4,
                                styles: null,
                                timings: "225ms cubic-bezier(0.4,0.0,0.2,1)"
                            },
                            options: null
                        }],
                        options: {}
                    }]
                }
            });

        function r(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275and"](0, null, null, 0))], null, null)
        }
        var u = l["\u0275crt"]({
            encapsulation: 2,
            styles: [".mat-expansion-panel-header{display:flex;flex-direction:row;align-items:center;padding:0 24px}.mat-expansion-panel-header:focus,.mat-expansion-panel-header:hover{outline:0}.mat-expansion-panel-header.mat-expanded:focus,.mat-expansion-panel-header.mat-expanded:hover{background:inherit}.mat-expansion-panel-header:not([aria-disabled=true]){cursor:pointer}.mat-content{display:flex;flex:1;flex-direction:row;overflow:hidden}.mat-expansion-panel-header-description,.mat-expansion-panel-header-title{display:flex;flex-grow:1;margin-right:16px}[dir=rtl] .mat-expansion-panel-header-description,[dir=rtl] .mat-expansion-panel-header-title{margin-right:0;margin-left:16px}.mat-expansion-panel-header-description{flex-grow:2}.mat-expansion-indicator::after{border-style:solid;border-width:0 2px 2px 0;content:'';display:inline-block;padding:3px;transform:rotate(45deg);vertical-align:middle}"],
            data: {
                animation: [{
                    type: 7,
                    name: "indicatorRotate",
                    definitions: [{
                        type: 0,
                        name: "collapsed",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "rotate(0deg)"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 0,
                        name: "expanded",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "rotate(180deg)"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 1,
                        expr: "expanded <=> collapsed",
                        animation: {
                            type: 4,
                            styles: null,
                            timings: "225ms cubic-bezier(0.4,0.0,0.2,1)"
                        },
                        options: null
                    }],
                    options: {}
                }, {
                    type: 7,
                    name: "expansionHeight",
                    definitions: [{
                        type: 0,
                        name: "collapsed",
                        styles: {
                            type: 6,
                            styles: {
                                height: "{{collapsedHeight}}"
                            },
                            offset: null
                        },
                        options: {
                            params: {
                                collapsedHeight: "48px"
                            }
                        }
                    }, {
                        type: 0,
                        name: "expanded",
                        styles: {
                            type: 6,
                            styles: {
                                height: "{{expandedHeight}}"
                            },
                            offset: null
                        },
                        options: {
                            params: {
                                expandedHeight: "64px"
                            }
                        }
                    }, {
                        type: 1,
                        expr: "expanded <=> collapsed",
                        animation: {
                            type: 4,
                            styles: null,
                            timings: "225ms cubic-bezier(0.4,0.0,0.2,1)"
                        },
                        options: null
                    }],
                    options: {}
                }]
            }
        });

        function s(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 0, "span", [
                ["class", "mat-expansion-indicator"]
            ], [
                [24, "@indicatorRotate", 0]
            ], null, null, null, null))], null, function(e, n) {
                e(n, 0, 0, n.component._getExpandedState())
            })
        }
    },
    "4AbN": function(e, n, t) {
        (function(n) {
            var t, l;
            l = function() {
                return function e(n, l, o) {
                    function i(r, u) {
                        if (!l[r]) {
                            if (!n[r]) {
                                if (!u && "function" == typeof t && t) return t(r, !0);
                                if (a) return a(r, !0);
                                var s = new Error("Cannot find module '" + r + "'");
                                throw s.code = "MODULE_NOT_FOUND", s
                            }
                            var d = l[r] = {
                                exports: {}
                            };
                            n[r][0].call(d.exports, function(e) {
                                return i(n[r][1][e] || e)
                            }, d, d.exports, e, n, l, o)
                        }
                        return l[r].exports
                    }
                    for (var a = "function" == typeof t && t, r = 0; r < o.length; r++) i(o[r]);
                    return i
                }({
                    1: [function(e, t, l) {
                        (function(e) {
                            ! function(n) {
                                var o = "object" == typeof l && l && !l.nodeType && l,
                                    i = "object" == typeof t && t && !t.nodeType && t,
                                    a = "object" == typeof e && e;
                                a.global !== a && a.window !== a && a.self !== a || (n = a);
                                var r, u, s = 2147483647,
                                    d = 36,
                                    c = 1,
                                    p = 26,
                                    h = 38,
                                    f = 700,
                                    m = 72,
                                    g = 128,
                                    b = "-",
                                    v = /^xn--/,
                                    y = /[^\x20-\x7E]/,
                                    x = /[\x2E\u3002\uFF0E\uFF61]/g,
                                    w = {
                                        overflow: "Overflow: input needs wider integers to process",
                                        "not-basic": "Illegal input >= 0x80 (not a basic code point)",
                                        "invalid-input": "Invalid input"
                                    },
                                    _ = d - c,
                                    k = Math.floor,
                                    C = String.fromCharCode;

                                function E(e) {
                                    throw new RangeError(w[e])
                                }

                                function R(e, n) {
                                    for (var t = e.length, l = []; t--;) l[t] = n(e[t]);
                                    return l
                                }

                                function S(e, n) {
                                    var t = e.split("@"),
                                        l = "";
                                    return t.length > 1 && (l = t[0] + "@", e = t[1]), l + R((e = e.replace(x, ".")).split("."), n).join(".")
                                }

                                function T(e) {
                                    for (var n, t, l = [], o = 0, i = e.length; o < i;)(n = e.charCodeAt(o++)) >= 55296 && n <= 56319 && o < i ? 56320 == (64512 & (t = e.charCodeAt(o++))) ? l.push(((1023 & n) << 10) + (1023 & t) + 65536) : (l.push(n), o--) : l.push(n);
                                    return l
                                }

                                function P(e) {
                                    return R(e, function(e) {
                                        var n = "";
                                        return e > 65535 && (n += C((e -= 65536) >>> 10 & 1023 | 55296), e = 56320 | 1023 & e), n + C(e)
                                    }).join("")
                                }

                                function I(e, n) {
                                    return e + 22 + 75 * (e < 26) - ((0 != n) << 5)
                                }

                                function D(e, n, t) {
                                    var l = 0;
                                    for (e = t ? k(e / f) : e >> 1, e += k(e / n); e > _ * p >> 1; l += d) e = k(e / _);
                                    return k(l + (_ + 1) * e / (e + h))
                                }

                                function O(e) {
                                    var n, t, l, o, i, a, r, u, h, f, v, y = [],
                                        x = e.length,
                                        w = 0,
                                        _ = g,
                                        C = m;
                                    for ((t = e.lastIndexOf(b)) < 0 && (t = 0), l = 0; l < t; ++l) e.charCodeAt(l) >= 128 && E("not-basic"), y.push(e.charCodeAt(l));
                                    for (o = t > 0 ? t + 1 : 0; o < x;) {
                                        for (i = w, a = 1, r = d; o >= x && E("invalid-input"), ((u = (v = e.charCodeAt(o++)) - 48 < 10 ? v - 22 : v - 65 < 26 ? v - 65 : v - 97 < 26 ? v - 97 : d) >= d || u > k((s - w) / a)) && E("overflow"), w += u * a, !(u < (h = r <= C ? c : r >= C + p ? p : r - C)); r += d) a > k(s / (f = d - h)) && E("overflow"), a *= f;
                                        C = D(w - i, n = y.length + 1, 0 == i), k(w / n) > s - _ && E("overflow"), _ += k(w / n), w %= n, y.splice(w++, 0, _)
                                    }
                                    return P(y)
                                }

                                function M(e) {
                                    var n, t, l, o, i, a, r, u, h, f, v, y, x, w, _, R = [];
                                    for (y = (e = T(e)).length, n = g, t = 0, i = m, a = 0; a < y; ++a)(v = e[a]) < 128 && R.push(C(v));
                                    for (l = o = R.length, o && R.push(b); l < y;) {
                                        for (r = s, a = 0; a < y; ++a)(v = e[a]) >= n && v < r && (r = v);
                                        for (r - n > k((s - t) / (x = l + 1)) && E("overflow"), t += (r - n) * x, n = r, a = 0; a < y; ++a)
                                            if ((v = e[a]) < n && ++t > s && E("overflow"), v == n) {
                                                for (u = t, h = d; !(u < (f = h <= i ? c : h >= i + p ? p : h - i)); h += d) R.push(C(I(f + (_ = u - f) % (w = d - f), 0))), u = k(_ / w);
                                                R.push(C(I(u, 0))), i = D(t, x, l == o), t = 0, ++l
                                            }++t, ++n
                                    }
                                    return R.join("")
                                }
                                if (r = {
                                        version: "1.3.2",
                                        ucs2: {
                                            decode: T,
                                            encode: P
                                        },
                                        decode: O,
                                        encode: M,
                                        toASCII: function(e) {
                                            return S(e, function(e) {
                                                return y.test(e) ? "xn--" + M(e) : e
                                            })
                                        },
                                        toUnicode: function(e) {
                                            return S(e, function(e) {
                                                return v.test(e) ? O(e.slice(4).toLowerCase()) : e
                                            })
                                        }
                                    }, o && i)
                                    if (t.exports == o) i.exports = r;
                                    else
                                        for (u in r) r.hasOwnProperty(u) && (o[u] = r[u]);
                                else n.punycode = r
                            }(this)
                        }).call(this, "undefined" != typeof n ? n : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
                    }, {}],
                    2: [function(e, n, t) {
                        var l = e("./log");
                        n.exports = function(e, n, t, o, i, a, r) {
                            var u = function e(n, t) {
                                    for (var o = 3 === n.nodeType ? document.createTextNode(n.nodeValue) : n.cloneNode(!1), i = n.firstChild; i;) !0 !== t && 1 === i.nodeType && "SCRIPT" === i.nodeName || o.appendChild(e(i, t)), i = i.nextSibling;
                                    return 1 === n.nodeType && (o._scrollTop = n.scrollTop, o._scrollLeft = n.scrollLeft, "CANVAS" === n.nodeName ? function(e, n) {
                                        try {
                                            n && (n.width = e.width, n.height = e.height, n.getContext("2d").putImageData(e.getContext("2d").getImageData(0, 0, e.width, e.height), 0, 0))
                                        } catch (n) {
                                            l("Unable to copy canvas content from", e, n)
                                        }
                                    }(n, o) : "TEXTAREA" !== n.nodeName && "SELECT" !== n.nodeName || (o.value = n.value)), o
                                }(e.documentElement, i.javascriptEnabled),
                                s = n.createElement("iframe");
                            return s.className = "html2canvas-container", s.style.visibility = "hidden", s.style.position = "fixed", s.style.left = "-10000px", s.style.top = "0px", s.style.border = "0", s.width = t, s.height = o, s.scrolling = "no", n.body.appendChild(s), new Promise(function(n) {
                                var t = s.contentWindow.document;
                                s.contentWindow.onload = s.onload = function() {
                                        var e = setInterval(function() {
                                            t.body.childNodes.length > 0 && (function e(n) {
                                                if (1 === n.nodeType) {
                                                    n.scrollTop = n._scrollTop, n.scrollLeft = n._scrollLeft;
                                                    for (var t = n.firstChild; t;) e(t), t = t.nextSibling
                                                }
                                            }(t.documentElement), clearInterval(e), "view" === i.type && (s.contentWindow.scrollTo(a, r), !/(iPad|iPhone|iPod)/g.test(navigator.userAgent) || s.contentWindow.scrollY === r && s.contentWindow.scrollX === a || (t.documentElement.style.top = -r + "px", t.documentElement.style.left = -a + "px", t.documentElement.style.position = "absolute")), n(s))
                                        }, 50)
                                    }, t.open(), t.write("<!DOCTYPE html><html></html>"),
                                    function(e, n, t) {
                                        !e.defaultView || n === e.defaultView.pageXOffset && t === e.defaultView.pageYOffset || e.defaultView.scrollTo(n, t)
                                    }(e, a, r), t.replaceChild(t.adoptNode(u), t.documentElement), t.close()
                            })
                        }
                    }, {
                        "./log": 13
                    }],
                    3: [function(e, n, t) {
                        function l(e) {
                            this.r = 0, this.g = 0, this.b = 0, this.a = null, this.fromArray(e) || this.namedColor(e) || this.rgb(e) || this.rgba(e) || this.hex6(e) || this.hex3(e)
                        }
                        l.prototype.darken = function(e) {
                            var n = 1 - e;
                            return new l([Math.round(this.r * n), Math.round(this.g * n), Math.round(this.b * n), this.a])
                        }, l.prototype.isTransparent = function() {
                            return 0 === this.a
                        }, l.prototype.isBlack = function() {
                            return 0 === this.r && 0 === this.g && 0 === this.b
                        }, l.prototype.fromArray = function(e) {
                            return Array.isArray(e) && (this.r = Math.min(e[0], 255), this.g = Math.min(e[1], 255), this.b = Math.min(e[2], 255), e.length > 3 && (this.a = e[3])), Array.isArray(e)
                        };
                        var o = /^#([a-f0-9]{3})$/i;
                        l.prototype.hex3 = function(e) {
                            var n;
                            return null !== (n = e.match(o)) && (this.r = parseInt(n[1][0] + n[1][0], 16), this.g = parseInt(n[1][1] + n[1][1], 16), this.b = parseInt(n[1][2] + n[1][2], 16)), null !== n
                        };
                        var i = /^#([a-f0-9]{6})$/i;
                        l.prototype.hex6 = function(e) {
                            var n = null;
                            return null !== (n = e.match(i)) && (this.r = parseInt(n[1].substring(0, 2), 16), this.g = parseInt(n[1].substring(2, 4), 16), this.b = parseInt(n[1].substring(4, 6), 16)), null !== n
                        };
                        var a = /^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/;
                        l.prototype.rgb = function(e) {
                            var n;
                            return null !== (n = e.match(a)) && (this.r = Number(n[1]), this.g = Number(n[2]), this.b = Number(n[3])), null !== n
                        };
                        var r = /^rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d?\.?\d+)\s*\)$/;
                        l.prototype.rgba = function(e) {
                            var n;
                            return null !== (n = e.match(r)) && (this.r = Number(n[1]), this.g = Number(n[2]), this.b = Number(n[3]), this.a = Number(n[4])), null !== n
                        }, l.prototype.toString = function() {
                            return null !== this.a && 1 !== this.a ? "rgba(" + [this.r, this.g, this.b, this.a].join(",") + ")" : "rgb(" + [this.r, this.g, this.b].join(",") + ")"
                        }, l.prototype.namedColor = function(e) {
                            e = e.toLowerCase();
                            var n = u[e];
                            if (n) this.r = n[0], this.g = n[1], this.b = n[2];
                            else if ("transparent" === e) return this.r = this.g = this.b = this.a = 0, !0;
                            return !!n
                        }, l.prototype.isColor = !0;
                        var u = {
                            aliceblue: [240, 248, 255],
                            antiquewhite: [250, 235, 215],
                            aqua: [0, 255, 255],
                            aquamarine: [127, 255, 212],
                            azure: [240, 255, 255],
                            beige: [245, 245, 220],
                            bisque: [255, 228, 196],
                            black: [0, 0, 0],
                            blanchedalmond: [255, 235, 205],
                            blue: [0, 0, 255],
                            blueviolet: [138, 43, 226],
                            brown: [165, 42, 42],
                            burlywood: [222, 184, 135],
                            cadetblue: [95, 158, 160],
                            chartreuse: [127, 255, 0],
                            chocolate: [210, 105, 30],
                            coral: [255, 127, 80],
                            cornflowerblue: [100, 149, 237],
                            cornsilk: [255, 248, 220],
                            crimson: [220, 20, 60],
                            cyan: [0, 255, 255],
                            darkblue: [0, 0, 139],
                            darkcyan: [0, 139, 139],
                            darkgoldenrod: [184, 134, 11],
                            darkgray: [169, 169, 169],
                            darkgreen: [0, 100, 0],
                            darkgrey: [169, 169, 169],
                            darkkhaki: [189, 183, 107],
                            darkmagenta: [139, 0, 139],
                            darkolivegreen: [85, 107, 47],
                            darkorange: [255, 140, 0],
                            darkorchid: [153, 50, 204],
                            darkred: [139, 0, 0],
                            darksalmon: [233, 150, 122],
                            darkseagreen: [143, 188, 143],
                            darkslateblue: [72, 61, 139],
                            darkslategray: [47, 79, 79],
                            darkslategrey: [47, 79, 79],
                            darkturquoise: [0, 206, 209],
                            darkviolet: [148, 0, 211],
                            deeppink: [255, 20, 147],
                            deepskyblue: [0, 191, 255],
                            dimgray: [105, 105, 105],
                            dimgrey: [105, 105, 105],
                            dodgerblue: [30, 144, 255],
                            firebrick: [178, 34, 34],
                            floralwhite: [255, 250, 240],
                            forestgreen: [34, 139, 34],
                            fuchsia: [255, 0, 255],
                            gainsboro: [220, 220, 220],
                            ghostwhite: [248, 248, 255],
                            gold: [255, 215, 0],
                            goldenrod: [218, 165, 32],
                            gray: [128, 128, 128],
                            green: [0, 128, 0],
                            greenyellow: [173, 255, 47],
                            grey: [128, 128, 128],
                            honeydew: [240, 255, 240],
                            hotpink: [255, 105, 180],
                            indianred: [205, 92, 92],
                            indigo: [75, 0, 130],
                            ivory: [255, 255, 240],
                            khaki: [240, 230, 140],
                            lavender: [230, 230, 250],
                            lavenderblush: [255, 240, 245],
                            lawngreen: [124, 252, 0],
                            lemonchiffon: [255, 250, 205],
                            lightblue: [173, 216, 230],
                            lightcoral: [240, 128, 128],
                            lightcyan: [224, 255, 255],
                            lightgoldenrodyellow: [250, 250, 210],
                            lightgray: [211, 211, 211],
                            lightgreen: [144, 238, 144],
                            lightgrey: [211, 211, 211],
                            lightpink: [255, 182, 193],
                            lightsalmon: [255, 160, 122],
                            lightseagreen: [32, 178, 170],
                            lightskyblue: [135, 206, 250],
                            lightslategray: [119, 136, 153],
                            lightslategrey: [119, 136, 153],
                            lightsteelblue: [176, 196, 222],
                            lightyellow: [255, 255, 224],
                            lime: [0, 255, 0],
                            limegreen: [50, 205, 50],
                            linen: [250, 240, 230],
                            magenta: [255, 0, 255],
                            maroon: [128, 0, 0],
                            mediumaquamarine: [102, 205, 170],
                            mediumblue: [0, 0, 205],
                            mediumorchid: [186, 85, 211],
                            mediumpurple: [147, 112, 219],
                            mediumseagreen: [60, 179, 113],
                            mediumslateblue: [123, 104, 238],
                            mediumspringgreen: [0, 250, 154],
                            mediumturquoise: [72, 209, 204],
                            mediumvioletred: [199, 21, 133],
                            midnightblue: [25, 25, 112],
                            mintcream: [245, 255, 250],
                            mistyrose: [255, 228, 225],
                            moccasin: [255, 228, 181],
                            navajowhite: [255, 222, 173],
                            navy: [0, 0, 128],
                            oldlace: [253, 245, 230],
                            olive: [128, 128, 0],
                            olivedrab: [107, 142, 35],
                            orange: [255, 165, 0],
                            orangered: [255, 69, 0],
                            orchid: [218, 112, 214],
                            palegoldenrod: [238, 232, 170],
                            palegreen: [152, 251, 152],
                            paleturquoise: [175, 238, 238],
                            palevioletred: [219, 112, 147],
                            papayawhip: [255, 239, 213],
                            peachpuff: [255, 218, 185],
                            peru: [205, 133, 63],
                            pink: [255, 192, 203],
                            plum: [221, 160, 221],
                            powderblue: [176, 224, 230],
                            purple: [128, 0, 128],
                            rebeccapurple: [102, 51, 153],
                            red: [255, 0, 0],
                            rosybrown: [188, 143, 143],
                            royalblue: [65, 105, 225],
                            saddlebrown: [139, 69, 19],
                            salmon: [250, 128, 114],
                            sandybrown: [244, 164, 96],
                            seagreen: [46, 139, 87],
                            seashell: [255, 245, 238],
                            sienna: [160, 82, 45],
                            silver: [192, 192, 192],
                            skyblue: [135, 206, 235],
                            slateblue: [106, 90, 205],
                            slategray: [112, 128, 144],
                            slategrey: [112, 128, 144],
                            snow: [255, 250, 250],
                            springgreen: [0, 255, 127],
                            steelblue: [70, 130, 180],
                            tan: [210, 180, 140],
                            teal: [0, 128, 128],
                            thistle: [216, 191, 216],
                            tomato: [255, 99, 71],
                            turquoise: [64, 224, 208],
                            violet: [238, 130, 238],
                            wheat: [245, 222, 179],
                            white: [255, 255, 255],
                            whitesmoke: [245, 245, 245],
                            yellow: [255, 255, 0],
                            yellowgreen: [154, 205, 50]
                        };
                        n.exports = l
                    }, {}],
                    4: [function(e, n, t) {
                        var l = e("./support"),
                            o = e("./renderers/canvas"),
                            i = e("./imageloader"),
                            a = e("./nodeparser"),
                            r = e("./nodecontainer"),
                            u = e("./log"),
                            s = e("./utils"),
                            d = e("./clone"),
                            c = e("./proxy").loadUrlDocument,
                            p = s.getBounds,
                            h = "data-html2canvas-node",
                            f = 0;

                        function m(e, n) {
                            var t, l, i = f++;
                            if ((n = n || {}).logging && (u.options.logging = !0, u.options.start = Date.now()), n.async = "undefined" == typeof n.async || n.async, n.allowTaint = "undefined" != typeof n.allowTaint && n.allowTaint, n.removeContainer = "undefined" == typeof n.removeContainer || n.removeContainer, n.javascriptEnabled = "undefined" != typeof n.javascriptEnabled && n.javascriptEnabled, n.imageTimeout = "undefined" == typeof n.imageTimeout ? 1e4 : n.imageTimeout, n.renderer = "function" == typeof n.renderer ? n.renderer : o, n.strict = !!n.strict, "string" == typeof e) {
                                if ("string" != typeof n.proxy) return Promise.reject("Proxy must be used when rendering url");
                                var a = null != n.width ? n.width : window.innerWidth,
                                    r = null != n.height ? n.height : window.innerHeight;
                                return c((t = e, l = document.createElement("a"), l.href = t, l.href = l.href, l), n.proxy, document, a, r, n).then(function(e) {
                                    return b(e.contentWindow.document.documentElement, e, n, a, r)
                                })
                            }
                            var s = (void 0 === e ? [document.documentElement] : e.length ? e : [e])[0];
                            return s.setAttribute(h + i, i),
                                function(e, n, t, l, o) {
                                    return d(e, e, t, l, n, e.defaultView.pageXOffset, e.defaultView.pageYOffset).then(function(i) {
                                        u("Document cloned");
                                        var a = h + o,
                                            r = "[" + a + "='" + o + "']";
                                        e.querySelector(r).removeAttribute(a);
                                        var s = i.contentWindow,
                                            d = s.document.querySelector(r);
                                        return ("function" == typeof n.onclone ? Promise.resolve(n.onclone(s.document)) : Promise.resolve(!0)).then(function() {
                                            return b(d, i, n, t, l)
                                        })
                                    })
                                }(s.ownerDocument, n, s.ownerDocument.defaultView.innerWidth, s.ownerDocument.defaultView.innerHeight, i).then(function(e) {
                                    return "function" == typeof n.onrendered && (u("options.onrendered is deprecated, html2canvas returns a Promise containing the canvas"), n.onrendered(e)), e
                                })
                        }
                        m.CanvasRenderer = o, m.NodeContainer = r, m.log = u, m.utils = s;
                        var g = "undefined" == typeof document || "function" != typeof Object.create || "function" != typeof document.createElement("canvas").getContext ? function() {
                            return Promise.reject("No canvas support")
                        } : m;

                        function b(e, n, t, o, r) {
                            var s, d = n.contentWindow,
                                c = new l(d.document),
                                h = new i(t, c),
                                f = p(e),
                                m = "view" === t.type ? o : (s = d.document, Math.max(Math.max(s.body.scrollWidth, s.documentElement.scrollWidth), Math.max(s.body.offsetWidth, s.documentElement.offsetWidth), Math.max(s.body.clientWidth, s.documentElement.clientWidth))),
                                g = "view" === t.type ? r : function(e) {
                                    return Math.max(Math.max(e.body.scrollHeight, e.documentElement.scrollHeight), Math.max(e.body.offsetHeight, e.documentElement.offsetHeight), Math.max(e.body.clientHeight, e.documentElement.clientHeight))
                                }(d.document),
                                b = new t.renderer(m, g, h, t, document);
                            return new a(e, b, c, h, t).ready.then(function() {
                                var l;
                                return u("Finished rendering"), l = "view" === t.type ? v(b.canvas, {
                                        width: b.canvas.width,
                                        height: b.canvas.height,
                                        top: 0,
                                        left: 0,
                                        x: 0,
                                        y: 0
                                    }) : e === d.document.body || e === d.document.documentElement || null != t.canvas ? b.canvas : v(b.canvas, {
                                        width: null != t.width ? t.width : f.width,
                                        height: null != t.height ? t.height : f.height,
                                        top: f.top,
                                        left: f.left,
                                        x: 0,
                                        y: 0
                                    }),
                                    function(e, n) {
                                        n.removeContainer && (e.parentNode.removeChild(e), u("Cleaned up container"))
                                    }(n, t), l
                            })
                        }

                        function v(e, n) {
                            var t = document.createElement("canvas"),
                                l = Math.min(e.width - 1, Math.max(0, n.left)),
                                o = Math.min(e.width, Math.max(1, n.left + n.width)),
                                i = Math.min(e.height - 1, Math.max(0, n.top)),
                                a = Math.min(e.height, Math.max(1, n.top + n.height));
                            t.width = n.width, t.height = n.height;
                            var r = o - l,
                                s = a - i;
                            return u("Cropping canvas at:", "left:", n.left, "top:", n.top, "width:", r, "height:", s), u("Resulting crop with width", n.width, "and height", n.height, "with x", l, "and y", i), t.getContext("2d").drawImage(e, l, i, r, s, n.x, n.y, r, s), t
                        }
                        n.exports = g
                    }, {
                        "./clone": 2,
                        "./imageloader": 11,
                        "./log": 13,
                        "./nodecontainer": 14,
                        "./nodeparser": 15,
                        "./proxy": 16,
                        "./renderers/canvas": 20,
                        "./support": 22,
                        "./utils": 26
                    }],
                    5: [function(e, n, t) {
                        var l = e("./log"),
                            o = e("./utils").smallImage;
                        n.exports = function e(n) {
                            if (this.src = n, l("DummyImageContainer for", n), !this.promise || !this.image) {
                                l("Initiating DummyImageContainer"), e.prototype.image = new Image;
                                var t = this.image;
                                e.prototype.promise = new Promise(function(e, n) {
                                    t.onload = e, t.onerror = n, t.src = o(), !0 === t.complete && e(t)
                                })
                            }
                        }
                    }, {
                        "./log": 13,
                        "./utils": 26
                    }],
                    6: [function(e, n, t) {
                        var l = e("./utils").smallImage;
                        n.exports = function(e, n) {
                            var t, o, i = document.createElement("div"),
                                a = document.createElement("img"),
                                r = document.createElement("span");
                            i.style.visibility = "hidden", i.style.fontFamily = e, i.style.fontSize = n, i.style.margin = 0, i.style.padding = 0, document.body.appendChild(i), a.src = l(), a.width = 1, a.height = 1, a.style.margin = 0, a.style.padding = 0, a.style.verticalAlign = "baseline", r.style.fontFamily = e, r.style.fontSize = n, r.style.margin = 0, r.style.padding = 0, r.appendChild(document.createTextNode("Hidden Text")), i.appendChild(r), i.appendChild(a), t = a.offsetTop - r.offsetTop + 1, i.removeChild(r), i.appendChild(document.createTextNode("Hidden Text")), i.style.lineHeight = "normal", a.style.verticalAlign = "super", o = a.offsetTop - i.offsetTop + 1, document.body.removeChild(i), this.baseline = t, this.lineWidth = 1, this.middle = o
                        }
                    }, {
                        "./utils": 26
                    }],
                    7: [function(e, n, t) {
                        var l = e("./font");

                        function o() {
                            this.data = {}
                        }
                        o.prototype.getMetrics = function(e, n) {
                            return void 0 === this.data[e + "-" + n] && (this.data[e + "-" + n] = new l(e, n)), this.data[e + "-" + n]
                        }, n.exports = o
                    }, {
                        "./font": 6
                    }],
                    8: [function(e, n, t) {
                        var l = e("./utils").getBounds,
                            o = e("./proxy").loadUrlDocument;

                        function i(n, t, o) {
                            this.image = null, this.src = n;
                            var i = this,
                                a = l(n);
                            this.promise = (t ? new Promise(function(e) {
                                "about:blank" === n.contentWindow.document.URL || null == n.contentWindow.document.documentElement ? n.contentWindow.onload = n.onload = function() {
                                    e(n)
                                } : e(n)
                            }) : this.proxyLoad(o.proxy, a, o)).then(function(n) {
                                return e("./core")(n.contentWindow.document.documentElement, {
                                    type: "view",
                                    width: n.width,
                                    height: n.height,
                                    proxy: o.proxy,
                                    javascriptEnabled: o.javascriptEnabled,
                                    removeContainer: o.removeContainer,
                                    allowTaint: o.allowTaint,
                                    imageTimeout: o.imageTimeout / 2
                                })
                            }).then(function(e) {
                                return i.image = e
                            })
                        }
                        i.prototype.proxyLoad = function(e, n, t) {
                            var l = this.src;
                            return o(l.src, e, l.ownerDocument, n.width, n.height, t)
                        }, n.exports = i
                    }, {
                        "./core": 4,
                        "./proxy": 16,
                        "./utils": 26
                    }],
                    9: [function(e, n, t) {
                        function l(e) {
                            this.src = e.value, this.colorStops = [], this.type = null, this.x0 = .5, this.y0 = .5, this.x1 = .5, this.y1 = .5, this.promise = Promise.resolve(!0)
                        }
                        l.TYPES = {
                            LINEAR: 1,
                            RADIAL: 2
                        }, l.REGEXP_COLORSTOP = /^\s*(rgba?\(\s*\d{1,3},\s*\d{1,3},\s*\d{1,3}(?:,\s*[0-9\.]+)?\s*\)|[a-z]{3,20}|#[a-f0-9]{3,6})(?:\s+(\d{1,3}(?:\.\d+)?)(%|px)?)?(?:\s|$)/i, n.exports = l
                    }, {}],
                    10: [function(e, n, t) {
                        n.exports = function(e, n) {
                            this.src = e, this.image = new Image;
                            var t = this;
                            this.tainted = null, this.promise = new Promise(function(l, o) {
                                t.image.onload = l, t.image.onerror = o, n && (t.image.crossOrigin = "anonymous"), t.image.src = e, !0 === t.image.complete && l(t.image)
                            })
                        }
                    }, {}],
                    11: [function(e, n, t) {
                        var l = e("./log"),
                            o = e("./imagecontainer"),
                            i = e("./dummyimagecontainer"),
                            a = e("./proxyimagecontainer"),
                            r = e("./framecontainer"),
                            u = e("./svgcontainer"),
                            s = e("./svgnodecontainer"),
                            d = e("./lineargradientcontainer"),
                            c = e("./webkitgradientcontainer"),
                            p = e("./utils").bind;

                        function h(e, n) {
                            this.link = null, this.options = e, this.support = n, this.origin = this.getOrigin(window.location.href)
                        }
                        h.prototype.findImages = function(e) {
                            var n = [];
                            return e.reduce(function(e, n) {
                                switch (n.node.nodeName) {
                                    case "IMG":
                                        return e.concat([{
                                            args: [n.node.src],
                                            method: "url"
                                        }]);
                                    case "svg":
                                    case "IFRAME":
                                        return e.concat([{
                                            args: [n.node],
                                            method: n.node.nodeName
                                        }])
                                }
                                return e
                            }, []).forEach(this.addImage(n, this.loadImage), this), n
                        }, h.prototype.findBackgroundImage = function(e, n) {
                            return n.parseBackgroundImages().filter(this.hasImageBackground).forEach(this.addImage(e, this.loadImage), this), e
                        }, h.prototype.addImage = function(e, n) {
                            return function(t) {
                                t.args.forEach(function(o) {
                                    this.imageExists(e, o) || (e.splice(0, 0, n.call(this, t)), l("Added image #" + e.length, "string" == typeof o ? o.substring(0, 100) : o))
                                }, this)
                            }
                        }, h.prototype.hasImageBackground = function(e) {
                            return "none" !== e.method
                        }, h.prototype.loadImage = function(e) {
                            if ("url" === e.method) {
                                var n = e.args[0];
                                return !this.isSVG(n) || this.support.svg || this.options.allowTaint ? n.match(/data:image\/.*;base64,/i) ? new o(n.replace(/url\(['"]{0,}|['"]{0,}\)$/gi, ""), !1) : this.isSameOrigin(n) || !0 === this.options.allowTaint || this.isSVG(n) ? new o(n, !1) : this.support.cors && !this.options.allowTaint && this.options.useCORS ? new o(n, !0) : this.options.proxy ? new a(n, this.options.proxy) : new i(n) : new u(n)
                            }
                            return "linear-gradient" === e.method ? new d(e) : "gradient" === e.method ? new c(e) : "svg" === e.method ? new s(e.args[0], this.support.svg) : "IFRAME" === e.method ? new r(e.args[0], this.isSameOrigin(e.args[0].src), this.options) : new i(e)
                        }, h.prototype.isSVG = function(e) {
                            return "svg" === e.substring(e.length - 3).toLowerCase() || u.prototype.isInline(e)
                        }, h.prototype.imageExists = function(e, n) {
                            return e.some(function(e) {
                                return e.src === n
                            })
                        }, h.prototype.isSameOrigin = function(e) {
                            return this.getOrigin(e) === this.origin
                        }, h.prototype.getOrigin = function(e) {
                            var n = this.link || (this.link = document.createElement("a"));
                            return n.href = e, n.href = n.href, n.protocol + n.hostname + n.port
                        }, h.prototype.getPromise = function(e) {
                            return this.timeout(e, this.options.imageTimeout).catch(function() {
                                return new i(e.src).promise.then(function(n) {
                                    e.image = n
                                })
                            })
                        }, h.prototype.get = function(e) {
                            var n = null;
                            return this.images.some(function(t) {
                                return (n = t).src === e
                            }) ? n : null
                        }, h.prototype.fetch = function(e) {
                            return this.images = e.reduce(p(this.findBackgroundImage, this), this.findImages(e)), this.images.forEach(function(e, n) {
                                e.promise.then(function() {
                                    l("Succesfully loaded image #" + (n + 1), e)
                                }, function(t) {
                                    l("Failed loading image #" + (n + 1), e, t)
                                })
                            }), this.ready = Promise.all(this.images.map(this.getPromise, this)), l("Finished searching images"), this
                        }, h.prototype.timeout = function(e, n) {
                            var t, o = Promise.race([e.promise, new Promise(function(o, i) {
                                t = setTimeout(function() {
                                    l("Timed out loading image", e), i(e)
                                }, n)
                            })]).then(function(e) {
                                return clearTimeout(t), e
                            });
                            return o.catch(function() {
                                clearTimeout(t)
                            }), o
                        }, n.exports = h
                    }, {
                        "./dummyimagecontainer": 5,
                        "./framecontainer": 8,
                        "./imagecontainer": 10,
                        "./lineargradientcontainer": 12,
                        "./log": 13,
                        "./proxyimagecontainer": 17,
                        "./svgcontainer": 23,
                        "./svgnodecontainer": 24,
                        "./utils": 26,
                        "./webkitgradientcontainer": 27
                    }],
                    12: [function(e, n, t) {
                        var l = e("./gradientcontainer"),
                            o = e("./color");

                        function i(e) {
                            l.apply(this, arguments), this.type = l.TYPES.LINEAR;
                            var n = i.REGEXP_DIRECTION.test(e.args[0]) || !l.REGEXP_COLORSTOP.test(e.args[0]);
                            n ? e.args[0].split(/\s+/).reverse().forEach(function(e, n) {
                                switch (e) {
                                    case "left":
                                        this.x0 = 0, this.x1 = 1;
                                        break;
                                    case "top":
                                        this.y0 = 0, this.y1 = 1;
                                        break;
                                    case "right":
                                        this.x0 = 1, this.x1 = 0;
                                        break;
                                    case "bottom":
                                        this.y0 = 1, this.y1 = 0;
                                        break;
                                    case "to":
                                        var t = this.y0,
                                            l = this.x0;
                                        this.y0 = this.y1, this.x0 = this.x1, this.x1 = l, this.y1 = t;
                                        break;
                                    case "center":
                                        break;
                                    default:
                                        var o = .01 * parseFloat(e, 10);
                                        if (isNaN(o)) break;
                                        0 === n ? (this.y0 = o, this.y1 = 1 - this.y0) : (this.x0 = o, this.x1 = 1 - this.x0)
                                }
                            }, this) : (this.y0 = 0, this.y1 = 1), this.colorStops = e.args.slice(n ? 1 : 0).map(function(e) {
                                var n = e.match(l.REGEXP_COLORSTOP),
                                    t = +n[2],
                                    i = 0 === t ? "%" : n[3];
                                return {
                                    color: new o(n[1]),
                                    stop: "%" === i ? t / 100 : null
                                }
                            }), null === this.colorStops[0].stop && (this.colorStops[0].stop = 0), null === this.colorStops[this.colorStops.length - 1].stop && (this.colorStops[this.colorStops.length - 1].stop = 1), this.colorStops.forEach(function(e, n) {
                                null === e.stop && this.colorStops.slice(n).some(function(t, l) {
                                    return null !== t.stop && (e.stop = (t.stop - this.colorStops[n - 1].stop) / (l + 1) + this.colorStops[n - 1].stop, !0)
                                }, this)
                            }, this)
                        }
                        i.prototype = Object.create(l.prototype), i.REGEXP_DIRECTION = /^\s*(?:to|left|right|top|bottom|center|\d{1,3}(?:\.\d+)?%?)(?:\s|$)/i, n.exports = i
                    }, {
                        "./color": 3,
                        "./gradientcontainer": 9
                    }],
                    13: [function(e, n, t) {
                        var l = function() {
                            l.options.logging && window.console && window.console.log && Function.prototype.bind.call(window.console.log, window.console).apply(window.console, [Date.now() - l.options.start + "ms", "html2canvas:"].concat([].slice.call(arguments, 0)))
                        };
                        l.options = {
                            logging: !1
                        }, n.exports = l
                    }, {}],
                    14: [function(e, n, t) {
                        var l = e("./color"),
                            o = e("./utils"),
                            i = o.getBounds,
                            a = o.parseBackgrounds,
                            r = o.offsetBounds;

                        function u(e, n) {
                            this.node = e, this.parent = n, this.stack = null, this.bounds = null, this.borders = null, this.clip = [], this.backgroundClip = [], this.offsetBounds = null, this.visible = null, this.computedStyles = null, this.colors = {}, this.styles = {}, this.backgroundImages = null, this.transformData = null, this.transformMatrix = null, this.isPseudoElement = !1, this.opacity = null
                        }

                        function s(e) {
                            return -1 !== e.toString().indexOf("%")
                        }

                        function d(e) {
                            return e.replace("px", "")
                        }

                        function c(e) {
                            return parseFloat(e)
                        }
                        u.prototype.cloneTo = function(e) {
                            e.visible = this.visible, e.borders = this.borders, e.bounds = this.bounds, e.clip = this.clip, e.backgroundClip = this.backgroundClip, e.computedStyles = this.computedStyles, e.styles = this.styles, e.backgroundImages = this.backgroundImages, e.opacity = this.opacity
                        }, u.prototype.getOpacity = function() {
                            return null === this.opacity ? this.opacity = this.cssFloat("opacity") : this.opacity
                        }, u.prototype.assignStack = function(e) {
                            this.stack = e, e.children.push(this)
                        }, u.prototype.isElementVisible = function() {
                            return this.node.nodeType === Node.TEXT_NODE ? this.parent.visible : "none" !== this.css("display") && "hidden" !== this.css("visibility") && !this.node.hasAttribute("data-html2canvas-ignore") && ("INPUT" !== this.node.nodeName || "hidden" !== this.node.getAttribute("type"))
                        }, u.prototype.css = function(e) {
                            return this.computedStyles || (this.computedStyles = this.isPseudoElement ? this.parent.computedStyle(this.before ? ":before" : ":after") : this.computedStyle(null)), this.styles[e] || (this.styles[e] = this.computedStyles[e])
                        }, u.prototype.prefixedCss = function(e) {
                            var n = this.css(e);
                            return void 0 === n && ["webkit", "moz", "ms", "o"].some(function(t) {
                                return void 0 !== (n = this.css(t + e.substr(0, 1).toUpperCase() + e.substr(1)))
                            }, this), void 0 === n ? null : n
                        }, u.prototype.computedStyle = function(e) {
                            return this.node.ownerDocument.defaultView.getComputedStyle(this.node, e)
                        }, u.prototype.cssInt = function(e) {
                            var n = parseInt(this.css(e), 10);
                            return isNaN(n) ? 0 : n
                        }, u.prototype.color = function(e) {
                            return this.colors[e] || (this.colors[e] = new l(this.css(e)))
                        }, u.prototype.cssFloat = function(e) {
                            var n = parseFloat(this.css(e));
                            return isNaN(n) ? 0 : n
                        }, u.prototype.fontWeight = function() {
                            var e = this.css("fontWeight");
                            switch (parseInt(e, 10)) {
                                case 401:
                                    e = "bold";
                                    break;
                                case 400:
                                    e = "normal"
                            }
                            return e
                        }, u.prototype.parseClip = function() {
                            var e = this.css("clip").match(this.CLIP);
                            return e ? {
                                top: parseInt(e[1], 10),
                                right: parseInt(e[2], 10),
                                bottom: parseInt(e[3], 10),
                                left: parseInt(e[4], 10)
                            } : null
                        }, u.prototype.parseBackgroundImages = function() {
                            return this.backgroundImages || (this.backgroundImages = a(this.css("backgroundImage")))
                        }, u.prototype.cssList = function(e, n) {
                            var t = (this.css(e) || "").split(",");
                            return 1 === (t = (t = t[n || 0] || t[0] || "auto").trim().split(" ")).length && (t = [t[0], s(t[0]) ? "auto" : t[0]]), t
                        }, u.prototype.parseBackgroundSize = function(e, n, t) {
                            var l, o, i = this.cssList("backgroundSize", t);
                            if (s(i[0])) l = e.width * parseFloat(i[0]) / 100;
                            else {
                                if (/contain|cover/.test(i[0])) {
                                    var a = n.width / n.height;
                                    return e.width / e.height < a ^ "contain" === i[0] ? {
                                        width: e.height * a,
                                        height: e.height
                                    } : {
                                        width: e.width,
                                        height: e.width / a
                                    }
                                }
                                l = parseInt(i[0], 10)
                            }
                            return o = "auto" === i[0] && "auto" === i[1] ? n.height : "auto" === i[1] ? l / n.width * n.height : s(i[1]) ? e.height * parseFloat(i[1]) / 100 : parseInt(i[1], 10), "auto" === i[0] && (l = o / n.height * n.width), {
                                width: l,
                                height: o
                            }
                        }, u.prototype.parseBackgroundPosition = function(e, n, t, l) {
                            var o, i, a = this.cssList("backgroundPosition", t);
                            return o = s(a[0]) ? (e.width - (l || n).width) * (parseFloat(a[0]) / 100) : parseInt(a[0], 10), i = "auto" === a[1] ? o / n.width * n.height : s(a[1]) ? (e.height - (l || n).height) * parseFloat(a[1]) / 100 : parseInt(a[1], 10), "auto" === a[0] && (o = i / n.height * n.width), {
                                left: o,
                                top: i
                            }
                        }, u.prototype.parseBackgroundRepeat = function(e) {
                            return this.cssList("backgroundRepeat", e)[0]
                        }, u.prototype.parseTextShadows = function() {
                            var e = this.css("textShadow"),
                                n = [];
                            if (e && "none" !== e)
                                for (var t = e.match(this.TEXT_SHADOW_PROPERTY), o = 0; t && o < t.length; o++) {
                                    var i = t[o].match(this.TEXT_SHADOW_VALUES);
                                    n.push({
                                        color: new l(i[0]),
                                        offsetX: i[1] ? parseFloat(i[1].replace("px", "")) : 0,
                                        offsetY: i[2] ? parseFloat(i[2].replace("px", "")) : 0,
                                        blur: i[3] ? i[3].replace("px", "") : 0
                                    })
                                }
                            return n
                        }, u.prototype.parseTransform = function() {
                            if (!this.transformData)
                                if (this.hasTransform()) {
                                    var e = this.parseBounds(),
                                        n = this.prefixedCss("transformOrigin").split(" ").map(d).map(c);
                                    n[0] += e.left, n[1] += e.top, this.transformData = {
                                        origin: n,
                                        matrix: this.parseTransformMatrix()
                                    }
                                } else this.transformData = {
                                    origin: [0, 0],
                                    matrix: [1, 0, 0, 1, 0, 0]
                                };
                            return this.transformData
                        }, u.prototype.parseTransformMatrix = function() {
                            if (!this.transformMatrix) {
                                var e = this.prefixedCss("transform"),
                                    n = e ? function(e) {
                                        if (e && "matrix" === e[1]) return e[2].split(",").map(function(e) {
                                            return parseFloat(e.trim())
                                        });
                                        if (e && "matrix3d" === e[1]) {
                                            var n = e[2].split(",").map(function(e) {
                                                return parseFloat(e.trim())
                                            });
                                            return [n[0], n[1], n[4], n[5], n[12], n[13]]
                                        }
                                    }(e.match(this.MATRIX_PROPERTY)) : null;
                                this.transformMatrix = n || [1, 0, 0, 1, 0, 0]
                            }
                            return this.transformMatrix
                        }, u.prototype.parseBounds = function() {
                            return this.bounds || (this.bounds = this.hasTransform() ? r(this.node) : i(this.node))
                        }, u.prototype.hasTransform = function() {
                            return "1,0,0,1,0,0" !== this.parseTransformMatrix().join(",") || this.parent && this.parent.hasTransform()
                        }, u.prototype.getValue = function() {
                            var e, n, t = this.node.value || "";
                            return "SELECT" === this.node.tagName ? t = (n = (e = this.node).options[e.selectedIndex || 0]) && n.text || "" : "password" === this.node.type && (t = Array(t.length + 1).join("\u2022")), 0 === t.length ? this.node.placeholder || "" : t
                        }, u.prototype.MATRIX_PROPERTY = /(matrix|matrix3d)\((.+)\)/, u.prototype.TEXT_SHADOW_PROPERTY = /((rgba|rgb)\([^\)]+\)(\s-?\d+px){0,})/g, u.prototype.TEXT_SHADOW_VALUES = /(-?\d+px)|(#.+)|(rgb\(.+\))|(rgba\(.+\))/g, u.prototype.CLIP = /^rect\((\d+)px,? (\d+)px,? (\d+)px,? (\d+)px\)$/, n.exports = u
                    }, {
                        "./color": 3,
                        "./utils": 26
                    }],
                    15: [function(e, n, t) {
                        var l = e("./log"),
                            o = e("punycode"),
                            i = e("./nodecontainer"),
                            a = e("./textcontainer"),
                            r = e("./pseudoelementcontainer"),
                            u = e("./fontmetrics"),
                            s = e("./color"),
                            d = e("./stackingcontext"),
                            c = e("./utils"),
                            p = c.bind,
                            h = c.getBounds,
                            f = c.parseBackgrounds,
                            m = c.offsetBounds;

                        function g(e, n, t, o, a) {
                            l("Starting NodeParser"), this.renderer = n, this.options = a, this.range = null, this.support = t, this.renderQueue = [], this.stack = new d(!0, 1, e.ownerDocument, null);
                            var r = new i(e, null);
                            if (a.background && n.rectangle(0, 0, n.width, n.height, new s(a.background)), e === e.ownerDocument.documentElement) {
                                var c = new i(r.color("backgroundColor").isTransparent() ? e.ownerDocument.body : e.ownerDocument.documentElement, null);
                                n.rectangle(0, 0, n.width, n.height, c.color("backgroundColor"))
                            }
                            r.visibile = r.isElementVisible(), this.createPseudoHideStyles(e.ownerDocument), this.disableAnimations(e.ownerDocument), this.nodes = z([r].concat(this.getChildren(r)).filter(function(e) {
                                return e.visible = e.isElementVisible()
                            }).map(this.getPseudoElements, this)), this.fontMetrics = new u, l("Fetched nodes, total:", this.nodes.length), l("Calculate overflow clips"), this.calculateOverflowClips(), l("Start fetching images"), this.images = o.fetch(this.nodes.filter(j)), this.ready = this.images.ready.then(p(function() {
                                return l("Images loaded, starting parsing"), l("Creating stacking contexts"), this.createStackingContexts(), l("Sorting stacking contexts"), this.sortStackingContexts(this.stack), this.parse(this.stack), l("Render queue created with " + this.renderQueue.length + " items"), new Promise(p(function(e) {
                                    a.async ? "function" == typeof a.async ? a.async.call(this, this.renderQueue, e) : this.renderQueue.length > 0 ? (this.renderIndex = 0, this.asyncRenderer(this.renderQueue, e)) : e() : (this.renderQueue.forEach(this.paint, this), e())
                                }, this))
                            }, this))
                        }

                        function b(e) {
                            return e.parent && e.parent.clip.length
                        }

                        function v() {}
                        g.prototype.calculateOverflowClips = function() {
                            this.nodes.forEach(function(e) {
                                if (j(e)) {
                                    L(e) && e.appendToDOM(), e.borders = this.parseBorders(e);
                                    var n = "hidden" === e.css("overflow") ? [e.borders.clip] : [],
                                        t = e.parseClip();
                                    t && -1 !== ["absolute", "fixed"].indexOf(e.css("position")) && n.push([
                                        ["rect", e.bounds.left + t.left, e.bounds.top + t.top, t.right - t.left, t.bottom - t.top]
                                    ]), e.clip = b(e) ? e.parent.clip.concat(n) : n, e.backgroundClip = "hidden" !== e.css("overflow") ? e.clip.concat([e.borders.clip]) : e.clip, L(e) && e.cleanDOM()
                                } else A(e) && (e.clip = b(e) ? e.parent.clip : []);
                                L(e) || (e.bounds = null)
                            }, this)
                        }, g.prototype.asyncRenderer = function(e, n, t) {
                            t = t || Date.now(), this.paint(e[this.renderIndex++]), e.length === this.renderIndex ? n() : t + 20 > Date.now() ? this.asyncRenderer(e, n, t) : setTimeout(p(function() {
                                this.asyncRenderer(e, n)
                            }, this), 0)
                        }, g.prototype.createPseudoHideStyles = function(e) {
                            this.createStyles(e, "." + r.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE + ':before { content: "" !important; display: none !important; }.' + r.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER + ':after { content: "" !important; display: none !important; }')
                        }, g.prototype.disableAnimations = function(e) {
                            this.createStyles(e, "* { -webkit-animation: none !important; -moz-animation: none !important; -o-animation: none !important; animation: none !important; -webkit-transition: none !important; -moz-transition: none !important; -o-transition: none !important; transition: none !important;}")
                        }, g.prototype.createStyles = function(e, n) {
                            var t = e.createElement("style");
                            t.innerHTML = n, e.body.appendChild(t)
                        }, g.prototype.getPseudoElements = function(e) {
                            var n = [
                                [e]
                            ];
                            if (e.node.nodeType === Node.ELEMENT_NODE) {
                                var t = this.getPseudoElement(e, ":before"),
                                    l = this.getPseudoElement(e, ":after");
                                t && n.push(t), l && n.push(l)
                            }
                            return z(n)
                        }, g.prototype.getPseudoElement = function(e, n) {
                            var t = e.computedStyle(n);
                            if (!t || !t.content || "none" === t.content || "-moz-alt-content" === t.content || "none" === t.display) return null;
                            for (var l = function(e) {
                                    var n = e.substr(0, 1);
                                    return n === e.substr(e.length - 1) && n.match(/'|"/) ? e.substr(1, e.length - 2) : e
                                }(t.content), o = "url" === l.substr(0, 3), i = document.createElement(o ? "img" : "html2canvaspseudoelement"), u = new r(i, e, n), s = t.length - 1; s >= 0; s--) {
                                var d = t.item(s).replace(/(\-[a-z])/g, function(e) {
                                    return e.toUpperCase().replace("-", "")
                                });
                                i.style[d] = t[d]
                            }
                            if (i.className = r.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE + " " + r.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER, o) return i.src = f(l)[0].args[0], [u];
                            var c = document.createTextNode(l);
                            return i.appendChild(c), [u, new a(c, u)]
                        }, g.prototype.getChildren = function(e) {
                            return z([].filter.call(e.node.childNodes, O).map(function(n) {
                                var t = [n.nodeType === Node.TEXT_NODE ? new a(n, e) : new i(n, e)].filter(H);
                                return n.nodeType === Node.ELEMENT_NODE && t.length && "TEXTAREA" !== n.tagName ? t[0].isElementVisible() ? t.concat(this.getChildren(t[0])) : [] : t
                            }, this))
                        }, g.prototype.newStackingContext = function(e, n) {
                            var t = new d(n, e.getOpacity(), e.node, e.parent);
                            e.cloneTo(t), (n ? t.getParentStack(this) : t.parent.stack).contexts.push(t), e.stack = t
                        }, g.prototype.createStackingContexts = function() {
                            this.nodes.forEach(function(e) {
                                j(e) && (this.isRootElement(e) || function(e) {
                                    return e.getOpacity() < 1
                                }(e) || function(e) {
                                    var n = e.css("position");
                                    return "auto" !== (-1 !== ["absolute", "relative", "fixed"].indexOf(n) ? e.css("zIndex") : "auto")
                                }(e) || this.isBodyWithTransparentRoot(e) || e.hasTransform()) ? this.newStackingContext(e, !0) : j(e) && (M(e) && T(e) || function(e) {
                                    return -1 !== ["inline-block", "inline-table"].indexOf(e.css("display"))
                                }(e) || N(e)) ? this.newStackingContext(e, !1) : e.assignStack(e.parent.stack)
                            }, this)
                        }, g.prototype.isBodyWithTransparentRoot = function(e) {
                            return "BODY" === e.node.nodeName && e.parent.color("backgroundColor").isTransparent()
                        }, g.prototype.isRootElement = function(e) {
                            return null === e.parent
                        }, g.prototype.sortStackingContexts = function(e) {
                            var n;
                            e.contexts.sort((n = e.contexts.slice(0), function(e, t) {
                                return e.cssInt("zIndex") + n.indexOf(e) / n.length - (t.cssInt("zIndex") + n.indexOf(t) / n.length)
                            })), e.contexts.forEach(this.sortStackingContexts, this)
                        }, g.prototype.parseTextBounds = function(e) {
                            return function(n, t, l) {
                                if ("none" !== e.parent.css("textDecoration").substr(0, 4) || 0 !== n.trim().length) {
                                    if (this.support.rangeBounds && !e.parent.hasTransform()) {
                                        var o = l.slice(0, t).join("").length;
                                        return this.getRangeBounds(e.node, o, n.length)
                                    }
                                    if (e.node && "string" == typeof e.node.data) {
                                        var i = e.node.splitText(n.length),
                                            a = this.getWrapperBounds(e.node, e.parent.hasTransform());
                                        return e.node = i, a
                                    }
                                } else this.support.rangeBounds && !e.parent.hasTransform() || (e.node = e.node.splitText(n.length));
                                return {}
                            }
                        }, g.prototype.getWrapperBounds = function(e, n) {
                            var t = e.ownerDocument.createElement("html2canvaswrapper"),
                                l = e.parentNode,
                                o = e.cloneNode(!0);
                            t.appendChild(e.cloneNode(!0)), l.replaceChild(t, e);
                            var i = n ? m(t) : h(t);
                            return l.replaceChild(o, t), i
                        }, g.prototype.getRangeBounds = function(e, n, t) {
                            var l = this.range || (this.range = e.ownerDocument.createRange());
                            return l.setStart(e, n), l.setEnd(e, n + t), l.getBoundingClientRect()
                        }, g.prototype.parse = function(e) {
                            var n = e.contexts.filter(R),
                                t = e.children.filter(j),
                                l = t.filter(B(N)),
                                o = l.filter(B(M)).filter(B(P)),
                                i = t.filter(B(M)).filter(N),
                                a = l.filter(B(M)).filter(P),
                                r = e.contexts.concat(l.filter(M)).filter(T),
                                u = e.children.filter(A).filter(D),
                                s = e.contexts.filter(S);
                            n.concat(o).concat(i).concat(a).concat(r).concat(u).concat(s).forEach(function(e) {
                                this.renderQueue.push(e), I(e) && (this.parse(e), this.renderQueue.push(new v))
                            }, this)
                        }, g.prototype.paint = function(e) {
                            try {
                                e instanceof v ? this.renderer.ctx.restore() : A(e) ? (L(e.parent) && e.parent.appendToDOM(), this.paintText(e), L(e.parent) && e.parent.cleanDOM()) : this.paintNode(e)
                            } catch (e) {
                                if (l(e), this.options.strict) throw e
                            }
                        }, g.prototype.paintNode = function(e) {
                            I(e) && (this.renderer.setOpacity(e.opacity), this.renderer.ctx.save(), e.hasTransform() && this.renderer.setTransform(e.parseTransform())), "INPUT" === e.node.nodeName && "checkbox" === e.node.type ? this.paintCheckbox(e) : "INPUT" === e.node.nodeName && "radio" === e.node.type ? this.paintRadio(e) : this.paintElement(e)
                        }, g.prototype.paintElement = function(e) {
                            var n = e.parseBounds();
                            this.renderer.clip(e.backgroundClip, function() {
                                this.renderer.renderBackground(e, n, e.borders.borders.map(V))
                            }, this), this.renderer.clip(e.clip, function() {
                                this.renderer.renderBorders(e.borders.borders)
                            }, this), this.renderer.clip(e.backgroundClip, function() {
                                switch (e.node.nodeName) {
                                    case "svg":
                                    case "IFRAME":
                                        var t = this.images.get(e.node);
                                        t ? this.renderer.renderImage(e, n, e.borders, t) : l("Error loading <" + e.node.nodeName + ">", e.node);
                                        break;
                                    case "IMG":
                                        var o = this.images.get(e.node.src);
                                        o ? this.renderer.renderImage(e, n, e.borders, o) : l("Error loading <img>", e.node.src);
                                        break;
                                    case "CANVAS":
                                        this.renderer.renderImage(e, n, e.borders, {
                                            image: e.node
                                        });
                                        break;
                                    case "SELECT":
                                    case "INPUT":
                                    case "TEXTAREA":
                                        this.paintFormValue(e)
                                }
                            }, this)
                        }, g.prototype.paintCheckbox = function(e) {
                            var n = e.parseBounds(),
                                t = Math.min(n.width, n.height),
                                l = {
                                    width: t - 1,
                                    height: t - 1,
                                    top: n.top,
                                    left: n.left
                                },
                                o = [3, 3],
                                i = [o, o, o, o],
                                a = [1, 1, 1, 1].map(function(e) {
                                    return {
                                        color: new s("#A5A5A5"),
                                        width: e
                                    }
                                }),
                                r = _(l, i, a);
                            this.renderer.clip(e.backgroundClip, function() {
                                this.renderer.rectangle(l.left + 1, l.top + 1, l.width - 2, l.height - 2, new s("#DEDEDE")), this.renderer.renderBorders(x(a, l, r, i)), e.node.checked && (this.renderer.font(new s("#424242"), "normal", "normal", "bold", t - 3 + "px", "arial"), this.renderer.text("\u2714", l.left + t / 6, l.top + t - 1))
                            }, this)
                        }, g.prototype.paintRadio = function(e) {
                            var n = e.parseBounds(),
                                t = Math.min(n.width, n.height) - 2;
                            this.renderer.clip(e.backgroundClip, function() {
                                this.renderer.circleStroke(n.left + 1, n.top + 1, t, new s("#DEDEDE"), 1, new s("#A5A5A5")), e.node.checked && this.renderer.circle(Math.ceil(n.left + t / 4) + 1, Math.ceil(n.top + t / 4) + 1, Math.floor(t / 2), new s("#424242"))
                            }, this)
                        }, g.prototype.paintFormValue = function(e) {
                            var n = e.getValue();
                            if (n.length > 0) {
                                var t = e.node.ownerDocument,
                                    o = t.createElement("html2canvaswrapper");
                                ["lineHeight", "textAlign", "fontFamily", "fontWeight", "fontSize", "color", "paddingLeft", "paddingTop", "paddingRight", "paddingBottom", "width", "height", "borderLeftStyle", "borderTopStyle", "borderLeftWidth", "borderTopWidth", "boxSizing", "whiteSpace", "wordWrap"].forEach(function(n) {
                                    try {
                                        o.style[n] = e.css(n)
                                    } catch (e) {
                                        l("html2canvas: Parse: Exception caught in renderFormValue: " + e.message)
                                    }
                                });
                                var i = e.parseBounds();
                                o.style.position = "fixed", o.style.left = i.left + "px", o.style.top = i.top + "px", o.textContent = n, t.body.appendChild(o), this.paintText(new a(o.firstChild, e)), t.body.removeChild(o)
                            }
                        }, g.prototype.paintText = function(e) {
                            e.applyTextTransform();
                            var n = o.ucs2.decode(e.node.data),
                                t = this.options.letterRendering && ! function(e) {
                                    return /^(normal|none|0px)$/.test(e.parent.css("letterSpacing"))
                                }(e) || /[^\u0000-\u00ff]/.test(e.node.data) ? n.map(function(e) {
                                    return o.ucs2.encode([e])
                                }) : function(e) {
                                    for (var n, t = [], l = 0, i = !1; e.length;) - 1 !== [32, 13, 10, 9, 45].indexOf(e[l]) === i ? ((n = e.splice(0, l)).length && t.push(o.ucs2.encode(n)), i = !i, l = 0) : l++, l >= e.length && (n = e.splice(0, l)).length && t.push(o.ucs2.encode(n));
                                    return t
                                }(n),
                                l = e.parent.fontWeight(),
                                i = e.parent.css("fontSize"),
                                a = e.parent.css("fontFamily"),
                                r = e.parent.parseTextShadows();
                            this.renderer.font(e.parent.color("color"), e.parent.css("fontStyle"), e.parent.css("fontVariant"), l, i, a), r.length ? this.renderer.fontShadow(r[0].color, r[0].offsetX, r[0].offsetY, r[0].blur) : this.renderer.clearShadow(), this.renderer.clip(e.parent.clip, function() {
                                t.map(this.parseTextBounds(e), this).forEach(function(n, l) {
                                    n && (this.renderer.text(t[l], n.left, n.bottom), this.renderTextDecoration(e.parent, n, this.fontMetrics.getMetrics(a, i)))
                                }, this)
                            }, this)
                        }, g.prototype.renderTextDecoration = function(e, n, t) {
                            switch (e.css("textDecoration").split(" ")[0]) {
                                case "underline":
                                    this.renderer.rectangle(n.left, Math.round(n.top + t.baseline + t.lineWidth), n.width, 1, e.color("color"));
                                    break;
                                case "overline":
                                    this.renderer.rectangle(n.left, Math.round(n.top), n.width, 1, e.color("color"));
                                    break;
                                case "line-through":
                                    this.renderer.rectangle(n.left, Math.ceil(n.top + t.middle + t.lineWidth), n.width, 1, e.color("color"))
                            }
                        };
                        var y = {
                            inset: [
                                ["darken", .6],
                                ["darken", .1],
                                ["darken", .1],
                                ["darken", .6]
                            ]
                        };

                        function x(e, n, t, l) {
                            return e.map(function(o, i) {
                                if (o.width > 0) {
                                    var a = n.left,
                                        r = n.top,
                                        u = n.width,
                                        s = n.height - e[2].width;
                                    switch (i) {
                                        case 0:
                                            o.args = C({
                                                c1: [a, r],
                                                c2: [a + u, r],
                                                c3: [a + u - e[1].width, r + (s = e[0].width)],
                                                c4: [a + e[3].width, r + s]
                                            }, l[0], l[1], t.topLeftOuter, t.topLeftInner, t.topRightOuter, t.topRightInner);
                                            break;
                                        case 1:
                                            o.args = C({
                                                c1: [(a = n.left + n.width - e[1].width) + (u = e[1].width), r],
                                                c2: [a + u, r + s + e[2].width],
                                                c3: [a, r + s],
                                                c4: [a, r + e[0].width]
                                            }, l[1], l[2], t.topRightOuter, t.topRightInner, t.bottomRightOuter, t.bottomRightInner);
                                            break;
                                        case 2:
                                            o.args = C({
                                                c1: [a + u, (r = r + n.height - e[2].width) + (s = e[2].width)],
                                                c2: [a, r + s],
                                                c3: [a + e[3].width, r],
                                                c4: [a + u - e[3].width, r]
                                            }, l[2], l[3], t.bottomRightOuter, t.bottomRightInner, t.bottomLeftOuter, t.bottomLeftInner);
                                            break;
                                        case 3:
                                            o.args = C({
                                                c1: [a, r + s + e[2].width],
                                                c2: [a, r],
                                                c3: [a + (u = e[3].width), r + e[0].width],
                                                c4: [a + u, r + s]
                                            }, l[3], l[0], t.bottomLeftOuter, t.bottomLeftInner, t.topLeftOuter, t.topLeftInner)
                                    }
                                }
                                return o
                            })
                        }

                        function w(e, n, t, l) {
                            var o = (Math.sqrt(2) - 1) / 3 * 4,
                                i = t * o,
                                a = l * o,
                                r = e + t,
                                u = n + l;
                            return {
                                topLeft: k({
                                    x: e,
                                    y: u
                                }, {
                                    x: e,
                                    y: u - a
                                }, {
                                    x: r - i,
                                    y: n
                                }, {
                                    x: r,
                                    y: n
                                }),
                                topRight: k({
                                    x: e,
                                    y: n
                                }, {
                                    x: e + i,
                                    y: n
                                }, {
                                    x: r,
                                    y: u - a
                                }, {
                                    x: r,
                                    y: u
                                }),
                                bottomRight: k({
                                    x: r,
                                    y: n
                                }, {
                                    x: r,
                                    y: n + a
                                }, {
                                    x: e + i,
                                    y: u
                                }, {
                                    x: e,
                                    y: u
                                }),
                                bottomLeft: k({
                                    x: r,
                                    y: u
                                }, {
                                    x: r - i,
                                    y: u
                                }, {
                                    x: e,
                                    y: n + a
                                }, {
                                    x: e,
                                    y: n
                                })
                            }
                        }

                        function _(e, n, t) {
                            var l = e.left,
                                o = e.top,
                                i = e.width,
                                a = e.height,
                                r = n[0][0] < i / 2 ? n[0][0] : i / 2,
                                u = n[0][1] < a / 2 ? n[0][1] : a / 2,
                                s = n[1][0] < i / 2 ? n[1][0] : i / 2,
                                d = n[1][1] < a / 2 ? n[1][1] : a / 2,
                                c = n[2][0] < i / 2 ? n[2][0] : i / 2,
                                p = n[2][1] < a / 2 ? n[2][1] : a / 2,
                                h = n[3][0] < i / 2 ? n[3][0] : i / 2,
                                f = n[3][1] < a / 2 ? n[3][1] : a / 2,
                                m = i - s,
                                g = a - p,
                                b = i - c,
                                v = a - f;
                            return {
                                topLeftOuter: w(l, o, r, u).topLeft.subdivide(.5),
                                topLeftInner: w(l + t[3].width, o + t[0].width, Math.max(0, r - t[3].width), Math.max(0, u - t[0].width)).topLeft.subdivide(.5),
                                topRightOuter: w(l + m, o, s, d).topRight.subdivide(.5),
                                topRightInner: w(l + Math.min(m, i + t[3].width), o + t[0].width, m > i + t[3].width ? 0 : s - t[3].width, d - t[0].width).topRight.subdivide(.5),
                                bottomRightOuter: w(l + b, o + g, c, p).bottomRight.subdivide(.5),
                                bottomRightInner: w(l + Math.min(b, i - t[3].width), o + Math.min(g, a + t[0].width), Math.max(0, c - t[1].width), p - t[2].width).bottomRight.subdivide(.5),
                                bottomLeftOuter: w(l, o + v, h, f).bottomLeft.subdivide(.5),
                                bottomLeftInner: w(l + t[3].width, o + v, Math.max(0, h - t[3].width), f - t[2].width).bottomLeft.subdivide(.5)
                            }
                        }

                        function k(e, n, t, l) {
                            var o = function(e, n, t) {
                                return {
                                    x: e.x + (n.x - e.x) * t,
                                    y: e.y + (n.y - e.y) * t
                                }
                            };
                            return {
                                start: e,
                                startControl: n,
                                endControl: t,
                                end: l,
                                subdivide: function(i) {
                                    var a = o(e, n, i),
                                        r = o(n, t, i),
                                        u = o(t, l, i),
                                        s = o(a, r, i),
                                        d = o(r, u, i),
                                        c = o(s, d, i);
                                    return [k(e, a, s, c), k(c, d, u, l)]
                                },
                                curveTo: function(e) {
                                    e.push(["bezierCurve", n.x, n.y, t.x, t.y, l.x, l.y])
                                },
                                curveToReversed: function(l) {
                                    l.push(["bezierCurve", t.x, t.y, n.x, n.y, e.x, e.y])
                                }
                            }
                        }

                        function C(e, n, t, l, o, i, a) {
                            var r = [];
                            return n[0] > 0 || n[1] > 0 ? (r.push(["line", l[1].start.x, l[1].start.y]), l[1].curveTo(r)) : r.push(["line", e.c1[0], e.c1[1]]), t[0] > 0 || t[1] > 0 ? (r.push(["line", i[0].start.x, i[0].start.y]), i[0].curveTo(r), r.push(["line", a[0].end.x, a[0].end.y]), a[0].curveToReversed(r)) : (r.push(["line", e.c2[0], e.c2[1]]), r.push(["line", e.c3[0], e.c3[1]])), n[0] > 0 || n[1] > 0 ? (r.push(["line", o[1].end.x, o[1].end.y]), o[1].curveToReversed(r)) : r.push(["line", e.c4[0], e.c4[1]]), r
                        }

                        function E(e, n, t, l, o, i, a) {
                            n[0] > 0 || n[1] > 0 ? (e.push(["line", l[0].start.x, l[0].start.y]), l[0].curveTo(e), l[1].curveTo(e)) : e.push(["line", i, a]), (t[0] > 0 || t[1] > 0) && e.push(["line", o[0].start.x, o[0].start.y])
                        }

                        function R(e) {
                            return e.cssInt("zIndex") < 0
                        }

                        function S(e) {
                            return e.cssInt("zIndex") > 0
                        }

                        function T(e) {
                            return 0 === e.cssInt("zIndex")
                        }

                        function P(e) {
                            return -1 !== ["inline", "inline-block", "inline-table"].indexOf(e.css("display"))
                        }

                        function I(e) {
                            return e instanceof d
                        }

                        function D(e) {
                            return e.node.data.trim().length > 0
                        }

                        function O(e) {
                            return e.nodeType === Node.TEXT_NODE || e.nodeType === Node.ELEMENT_NODE
                        }

                        function M(e) {
                            return "static" !== e.css("position")
                        }

                        function N(e) {
                            return "none" !== e.css("float")
                        }

                        function B(e) {
                            var n = this;
                            return function() {
                                return !e.apply(n, arguments)
                            }
                        }

                        function j(e) {
                            return e.node.nodeType === Node.ELEMENT_NODE
                        }

                        function L(e) {
                            return !0 === e.isPseudoElement
                        }

                        function A(e) {
                            return e.node.nodeType === Node.TEXT_NODE
                        }

                        function F(e) {
                            return parseInt(e, 10)
                        }

                        function V(e) {
                            return e.width
                        }

                        function H(e) {
                            return e.node.nodeType !== Node.ELEMENT_NODE || -1 === ["SCRIPT", "HEAD", "TITLE", "OBJECT", "BR", "OPTION"].indexOf(e.node.nodeName)
                        }

                        function z(e) {
                            return [].concat.apply([], e)
                        }
                        g.prototype.parseBorders = function(e) {
                            var n = e.parseBounds(),
                                t = function(e) {
                                    return ["TopLeft", "TopRight", "BottomRight", "BottomLeft"].map(function(n) {
                                        var t = e.css("border" + n + "Radius").split(" ");
                                        return t.length <= 1 && (t[1] = t[0]), t.map(F)
                                    })
                                }(e),
                                l = ["Top", "Right", "Bottom", "Left"].map(function(n, t) {
                                    var l = e.css("border" + n + "Style"),
                                        o = e.color("border" + n + "Color");
                                    "inset" === l && o.isBlack() && (o = new s([255, 255, 255, o.a]));
                                    var i = y[l] ? y[l][t] : null;
                                    return {
                                        width: e.cssInt("border" + n + "Width"),
                                        color: i ? o[i[0]](i[1]) : o,
                                        args: null
                                    }
                                }),
                                o = _(n, t, l);
                            return {
                                clip: this.parseBackgroundClip(e, o, l, t, n),
                                borders: x(l, n, o, t)
                            }
                        }, g.prototype.parseBackgroundClip = function(e, n, t, l, o) {
                            var i = [];
                            switch (e.css("backgroundClip")) {
                                case "content-box":
                                case "padding-box":
                                    E(i, l[0], l[1], n.topLeftInner, n.topRightInner, o.left + t[3].width, o.top + t[0].width), E(i, l[1], l[2], n.topRightInner, n.bottomRightInner, o.left + o.width - t[1].width, o.top + t[0].width), E(i, l[2], l[3], n.bottomRightInner, n.bottomLeftInner, o.left + o.width - t[1].width, o.top + o.height - t[2].width), E(i, l[3], l[0], n.bottomLeftInner, n.topLeftInner, o.left + t[3].width, o.top + o.height - t[2].width);
                                    break;
                                default:
                                    E(i, l[0], l[1], n.topLeftOuter, n.topRightOuter, o.left, o.top), E(i, l[1], l[2], n.topRightOuter, n.bottomRightOuter, o.left + o.width, o.top), E(i, l[2], l[3], n.bottomRightOuter, n.bottomLeftOuter, o.left + o.width, o.top + o.height), E(i, l[3], l[0], n.bottomLeftOuter, n.topLeftOuter, o.left, o.top + o.height)
                            }
                            return i
                        }, n.exports = g
                    }, {
                        "./color": 3,
                        "./fontmetrics": 7,
                        "./log": 13,
                        "./nodecontainer": 14,
                        "./pseudoelementcontainer": 18,
                        "./stackingcontext": 21,
                        "./textcontainer": 25,
                        "./utils": 26,
                        punycode: 1
                    }],
                    16: [function(e, n, t) {
                        var l = e("./xhr"),
                            o = e("./utils"),
                            i = e("./log"),
                            a = e("./clone"),
                            r = o.decode64;

                        function u(e, n, t) {
                            var o = "withCredentials" in new XMLHttpRequest;
                            if (!n) return Promise.reject("No proxy configured");
                            var i = c(o),
                                a = p(n, e, i);
                            return o ? l(a) : d(t, a, i).then(function(e) {
                                return r(e.content)
                            })
                        }
                        var s = 0;

                        function d(e, n, t) {
                            return new Promise(function(l, o) {
                                var i = e.createElement("script"),
                                    a = function() {
                                        delete window.html2canvas.proxy[t], e.body.removeChild(i)
                                    };
                                window.html2canvas.proxy[t] = function(e) {
                                    a(), l(e)
                                }, i.src = n, i.onerror = function(e) {
                                    a(), o(e)
                                }, e.body.appendChild(i)
                            })
                        }

                        function c(e) {
                            return e ? "" : "html2canvas_" + Date.now() + "_" + ++s + "_" + Math.round(1e5 * Math.random())
                        }

                        function p(e, n, t) {
                            return e + "?url=" + encodeURIComponent(n) + (t.length ? "&callback=html2canvas.proxy." + t : "")
                        }

                        function h(e) {
                            return function(n) {
                                var t, l = new DOMParser;
                                try {
                                    t = l.parseFromString(n, "text/html")
                                } catch (e) {
                                    i("DOMParser not supported, falling back to createHTMLDocument"), t = document.implementation.createHTMLDocument("");
                                    try {
                                        t.open(), t.write(n), t.close()
                                    } catch (e) {
                                        i("createHTMLDocument write not supported, falling back to document.body.innerHTML"), t.body.innerHTML = n
                                    }
                                }
                                var o = t.querySelector("base");
                                if (!o || !o.href.host) {
                                    var a = t.createElement("base");
                                    a.href = e, t.head.insertBefore(a, t.head.firstChild)
                                }
                                return t
                            }
                        }
                        t.Proxy = u, t.ProxyURL = function(e, n, t) {
                            var l = "crossOrigin" in new Image,
                                o = c(l),
                                i = p(n, e, o);
                            return l ? Promise.resolve(i) : d(t, i, o).then(function(e) {
                                return "data:" + e.type + ";base64," + e.content
                            })
                        }, t.loadUrlDocument = function(e, n, t, l, o, i) {
                            return new u(e, n, window.document).then(h(e)).then(function(e) {
                                return a(e, t, l, o, i, 0, 0)
                            })
                        }
                    }, {
                        "./clone": 2,
                        "./log": 13,
                        "./utils": 26,
                        "./xhr": 28
                    }],
                    17: [function(e, n, t) {
                        var l = e("./proxy").ProxyURL;
                        n.exports = function(e, n) {
                            var t = document.createElement("a");
                            t.href = e, this.src = e = t.href, this.image = new Image;
                            var o = this;
                            this.promise = new Promise(function(t, i) {
                                o.image.crossOrigin = "Anonymous", o.image.onload = t, o.image.onerror = i, new l(e, n, document).then(function(e) {
                                    o.image.src = e
                                }).catch(i)
                            })
                        }
                    }, {
                        "./proxy": 16
                    }],
                    18: [function(e, n, t) {
                        var l = e("./nodecontainer");

                        function o(e, n, t) {
                            l.call(this, e, n), this.isPseudoElement = !0, this.before = ":before" === t
                        }
                        o.prototype.cloneTo = function(e) {
                            o.prototype.cloneTo.call(this, e), e.isPseudoElement = !0, e.before = this.before
                        }, (o.prototype = Object.create(l.prototype)).appendToDOM = function() {
                            this.before ? this.parent.node.insertBefore(this.node, this.parent.node.firstChild) : this.parent.node.appendChild(this.node), this.parent.node.className += " " + this.getHideClass()
                        }, o.prototype.cleanDOM = function() {
                            this.node.parentNode.removeChild(this.node), this.parent.node.className = this.parent.node.className.replace(this.getHideClass(), "")
                        }, o.prototype.getHideClass = function() {
                            return this["PSEUDO_HIDE_ELEMENT_CLASS_" + (this.before ? "BEFORE" : "AFTER")]
                        }, o.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE = "___html2canvas___pseudoelement_before", o.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER = "___html2canvas___pseudoelement_after", n.exports = o
                    }, {
                        "./nodecontainer": 14
                    }],
                    19: [function(e, n, t) {
                        var l = e("./log");

                        function o(e, n, t, l, o) {
                            this.width = e, this.height = n, this.images = t, this.options = l, this.document = o
                        }
                        o.prototype.renderImage = function(e, n, t, l) {
                            var o = e.cssInt("paddingLeft"),
                                i = e.cssInt("paddingTop"),
                                a = e.cssInt("paddingRight"),
                                r = e.cssInt("paddingBottom"),
                                u = t.borders,
                                s = n.width - (u[1].width + u[3].width + o + a),
                                d = n.height - (u[0].width + u[2].width + i + r);
                            this.drawImage(l, 0, 0, l.image.width || s, l.image.height || d, n.left + o + u[3].width, n.top + i + u[0].width, s, d)
                        }, o.prototype.renderBackground = function(e, n, t) {
                            n.height > 0 && n.width > 0 && (this.renderBackgroundColor(e, n), this.renderBackgroundImage(e, n, t))
                        }, o.prototype.renderBackgroundColor = function(e, n) {
                            var t = e.color("backgroundColor");
                            t.isTransparent() || this.rectangle(n.left, n.top, n.width, n.height, t)
                        }, o.prototype.renderBorders = function(e) {
                            e.forEach(this.renderBorder, this)
                        }, o.prototype.renderBorder = function(e) {
                            e.color.isTransparent() || null === e.args || this.drawShape(e.args, e.color)
                        }, o.prototype.renderBackgroundImage = function(e, n, t) {
                            e.parseBackgroundImages().reverse().forEach(function(o, i, a) {
                                switch (o.method) {
                                    case "url":
                                        var r = this.images.get(o.args[0]);
                                        r ? this.renderBackgroundRepeating(e, n, r, a.length - (i + 1), t) : l("Error loading background-image", o.args[0]);
                                        break;
                                    case "linear-gradient":
                                    case "gradient":
                                        var u = this.images.get(o.value);
                                        u ? this.renderBackgroundGradient(u, n, t) : l("Error loading background-image", o.args[0]);
                                        break;
                                    case "none":
                                        break;
                                    default:
                                        l("Unknown background-image type", o.args[0])
                                }
                            }, this)
                        }, o.prototype.renderBackgroundRepeating = function(e, n, t, l, o) {
                            var i = e.parseBackgroundSize(n, t.image, l),
                                a = e.parseBackgroundPosition(n, t.image, l, i);
                            switch (e.parseBackgroundRepeat(l)) {
                                case "repeat-x":
                                case "repeat no-repeat":
                                    this.backgroundRepeatShape(t, a, i, n, n.left + o[3], n.top + a.top + o[0], 99999, i.height, o);
                                    break;
                                case "repeat-y":
                                case "no-repeat repeat":
                                    this.backgroundRepeatShape(t, a, i, n, n.left + a.left + o[3], n.top + o[0], i.width, 99999, o);
                                    break;
                                case "no-repeat":
                                    this.backgroundRepeatShape(t, a, i, n, n.left + a.left + o[3], n.top + a.top + o[0], i.width, i.height, o);
                                    break;
                                default:
                                    this.renderBackgroundRepeat(t, a, i, {
                                        top: n.top,
                                        left: n.left
                                    }, o[3], o[0])
                            }
                        }, n.exports = o
                    }, {
                        "./log": 13
                    }],
                    20: [function(e, n, t) {
                        var l = e("../renderer"),
                            o = e("../lineargradientcontainer"),
                            i = e("../log");

                        function a(e, n) {
                            l.apply(this, arguments), this.canvas = this.options.canvas || this.document.createElement("canvas"), this.options.canvas || (this.canvas.width = e, this.canvas.height = n), this.ctx = this.canvas.getContext("2d"), this.taintCtx = this.document.createElement("canvas").getContext("2d"), this.ctx.textBaseline = "bottom", this.variables = {}, i("Initialized CanvasRenderer with size", e, "x", n)
                        }

                        function r(e) {
                            return e.length > 0
                        }(a.prototype = Object.create(l.prototype)).setFillStyle = function(e) {
                            return this.ctx.fillStyle = "object" == typeof e && e.isColor ? e.toString() : e, this.ctx
                        }, a.prototype.rectangle = function(e, n, t, l, o) {
                            this.setFillStyle(o).fillRect(e, n, t, l)
                        }, a.prototype.circle = function(e, n, t, l) {
                            this.setFillStyle(l), this.ctx.beginPath(), this.ctx.arc(e + t / 2, n + t / 2, t / 2, 0, 2 * Math.PI, !0), this.ctx.closePath(), this.ctx.fill()
                        }, a.prototype.circleStroke = function(e, n, t, l, o, i) {
                            this.circle(e, n, t, l), this.ctx.strokeStyle = i.toString(), this.ctx.stroke()
                        }, a.prototype.drawShape = function(e, n) {
                            this.shape(e), this.setFillStyle(n).fill()
                        }, a.prototype.taints = function(e) {
                            if (null === e.tainted) {
                                this.taintCtx.drawImage(e.image, 0, 0);
                                try {
                                    this.taintCtx.getImageData(0, 0, 1, 1), e.tainted = !1
                                } catch (n) {
                                    this.taintCtx = document.createElement("canvas").getContext("2d"), e.tainted = !0
                                }
                            }
                            return e.tainted
                        }, a.prototype.drawImage = function(e, n, t, l, o, i, a, r, u) {
                            this.taints(e) && !this.options.allowTaint || this.ctx.drawImage(e.image, n, t, l, o, i, a, r, u)
                        }, a.prototype.clip = function(e, n, t) {
                            this.ctx.save(), e.filter(r).forEach(function(e) {
                                this.shape(e).clip()
                            }, this), n.call(t), this.ctx.restore()
                        }, a.prototype.shape = function(e) {
                            return this.ctx.beginPath(), e.forEach(function(e, n) {
                                "rect" === e[0] ? this.ctx.rect.apply(this.ctx, e.slice(1)) : this.ctx[0 === n ? "moveTo" : e[0] + "To"].apply(this.ctx, e.slice(1))
                            }, this), this.ctx.closePath(), this.ctx
                        }, a.prototype.font = function(e, n, t, l, o, i) {
                            this.setFillStyle(e).font = [n, t, l, o, i].join(" ").split(",")[0]
                        }, a.prototype.fontShadow = function(e, n, t, l) {
                            this.setVariable("shadowColor", e.toString()).setVariable("shadowOffsetY", n).setVariable("shadowOffsetX", t).setVariable("shadowBlur", l)
                        }, a.prototype.clearShadow = function() {
                            this.setVariable("shadowColor", "rgba(0,0,0,0)")
                        }, a.prototype.setOpacity = function(e) {
                            this.ctx.globalAlpha = e
                        }, a.prototype.setTransform = function(e) {
                            this.ctx.translate(e.origin[0], e.origin[1]), this.ctx.transform.apply(this.ctx, e.matrix), this.ctx.translate(-e.origin[0], -e.origin[1])
                        }, a.prototype.setVariable = function(e, n) {
                            return this.variables[e] !== n && (this.variables[e] = this.ctx[e] = n), this
                        }, a.prototype.text = function(e, n, t) {
                            this.ctx.fillText(e, n, t)
                        }, a.prototype.backgroundRepeatShape = function(e, n, t, l, o, i, a, r, u) {
                            var s = [
                                ["line", Math.round(o), Math.round(i)],
                                ["line", Math.round(o + a), Math.round(i)],
                                ["line", Math.round(o + a), Math.round(r + i)],
                                ["line", Math.round(o), Math.round(r + i)]
                            ];
                            this.clip([s], function() {
                                this.renderBackgroundRepeat(e, n, t, l, u[3], u[0])
                            }, this)
                        }, a.prototype.renderBackgroundRepeat = function(e, n, t, l, o, i) {
                            var a = Math.round(l.left + n.left + o),
                                r = Math.round(l.top + n.top + i);
                            this.setFillStyle(this.ctx.createPattern(this.resizeImage(e, t), "repeat")), this.ctx.translate(a, r), this.ctx.fill(), this.ctx.translate(-a, -r)
                        }, a.prototype.renderBackgroundGradient = function(e, n) {
                            if (e instanceof o) {
                                var t = this.ctx.createLinearGradient(n.left + n.width * e.x0, n.top + n.height * e.y0, n.left + n.width * e.x1, n.top + n.height * e.y1);
                                e.colorStops.forEach(function(e) {
                                    t.addColorStop(e.stop, e.color.toString())
                                }), this.rectangle(n.left, n.top, n.width, n.height, t)
                            }
                        }, a.prototype.resizeImage = function(e, n) {
                            var t = e.image;
                            if (t.width === n.width && t.height === n.height) return t;
                            var l = document.createElement("canvas");
                            return l.width = n.width, l.height = n.height, l.getContext("2d").drawImage(t, 0, 0, t.width, t.height, 0, 0, n.width, n.height), l
                        }, n.exports = a
                    }, {
                        "../lineargradientcontainer": 12,
                        "../log": 13,
                        "../renderer": 19
                    }],
                    21: [function(e, n, t) {
                        var l = e("./nodecontainer");

                        function o(e, n, t, o) {
                            l.call(this, t, o), this.ownStacking = e, this.contexts = [], this.children = [], this.opacity = (this.parent ? this.parent.stack.opacity : 1) * n
                        }(o.prototype = Object.create(l.prototype)).getParentStack = function(e) {
                            var n = this.parent ? this.parent.stack : null;
                            return n ? n.ownStacking ? n : n.getParentStack(e) : e.stack
                        }, n.exports = o
                    }, {
                        "./nodecontainer": 14
                    }],
                    22: [function(e, n, t) {
                        function l(e) {
                            this.rangeBounds = this.testRangeBounds(e), this.cors = this.testCORS(), this.svg = this.testSVG()
                        }
                        l.prototype.testRangeBounds = function(e) {
                            var n, t, l = !1;
                            return e.createRange && (n = e.createRange()).getBoundingClientRect && ((t = e.createElement("boundtest")).style.height = "123px", t.style.display = "block", e.body.appendChild(t), n.selectNode(t), 123 === n.getBoundingClientRect().height && (l = !0), e.body.removeChild(t)), l
                        }, l.prototype.testCORS = function() {
                            return "undefined" != typeof(new Image).crossOrigin
                        }, l.prototype.testSVG = function() {
                            var e = new Image,
                                n = document.createElement("canvas"),
                                t = n.getContext("2d");
                            e.src = "data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg'></svg>";
                            try {
                                t.drawImage(e, 0, 0), n.toDataURL()
                            } catch (e) {
                                return !1
                            }
                            return !0
                        }, n.exports = l
                    }, {}],
                    23: [function(e, n, t) {
                        var l = e("./xhr"),
                            o = e("./utils").decode64;

                        function i(e) {
                            this.src = e, this.image = null;
                            var n = this;
                            this.promise = this.hasFabric().then(function() {
                                return n.isInline(e) ? Promise.resolve(n.inlineFormatting(e)) : l(e)
                            }).then(function(e) {
                                return new Promise(function(t) {
                                    window.html2canvas.svg.fabric.loadSVGFromString(e, n.createCanvas.call(n, t))
                                })
                            })
                        }
                        i.prototype.hasFabric = function() {
                            return window.html2canvas.svg && window.html2canvas.svg.fabric ? Promise.resolve() : Promise.reject(new Error("html2canvas.svg.js is not loaded, cannot render svg"))
                        }, i.prototype.inlineFormatting = function(e) {
                            return /^data:image\/svg\+xml;base64,/.test(e) ? this.decode64(this.removeContentType(e)) : this.removeContentType(e)
                        }, i.prototype.removeContentType = function(e) {
                            return e.replace(/^data:image\/svg\+xml(;base64)?,/, "")
                        }, i.prototype.isInline = function(e) {
                            return /^data:image\/svg\+xml/i.test(e)
                        }, i.prototype.createCanvas = function(e) {
                            var n = this;
                            return function(t, l) {
                                var o = new window.html2canvas.svg.fabric.StaticCanvas("c");
                                n.image = o.lowerCanvasEl, o.setWidth(l.width).setHeight(l.height).add(window.html2canvas.svg.fabric.util.groupSVGElements(t, l)).renderAll(), e(o.lowerCanvasEl)
                            }
                        }, i.prototype.decode64 = function(e) {
                            return "function" == typeof window.atob ? window.atob(e) : o(e)
                        }, n.exports = i
                    }, {
                        "./utils": 26,
                        "./xhr": 28
                    }],
                    24: [function(e, n, t) {
                        var l = e("./svgcontainer");

                        function o(e, n) {
                            this.src = e, this.image = null;
                            var t = this;
                            this.promise = n ? new Promise(function(n, l) {
                                t.image = new Image, t.image.onload = n, t.image.onerror = l, t.image.src = "data:image/svg+xml," + (new XMLSerializer).serializeToString(e), !0 === t.image.complete && n(t.image)
                            }) : this.hasFabric().then(function() {
                                return new Promise(function(n) {
                                    window.html2canvas.svg.fabric.parseSVGDocument(e, t.createCanvas.call(t, n))
                                })
                            })
                        }
                        o.prototype = Object.create(l.prototype), n.exports = o
                    }, {
                        "./svgcontainer": 23
                    }],
                    25: [function(e, n, t) {
                        var l = e("./nodecontainer");

                        function o(e, n) {
                            l.call(this, e, n)
                        }

                        function i(e, n, t) {
                            if (e.length > 0) return n + t.toUpperCase()
                        }(o.prototype = Object.create(l.prototype)).applyTextTransform = function() {
                            this.node.data = this.transform(this.parent.css("textTransform"))
                        }, o.prototype.transform = function(e) {
                            var n = this.node.data;
                            switch (e) {
                                case "lowercase":
                                    return n.toLowerCase();
                                case "capitalize":
                                    return n.replace(/(^|\s|:|-|\(|\))([a-z])/g, i);
                                case "uppercase":
                                    return n.toUpperCase();
                                default:
                                    return n
                            }
                        }, n.exports = o
                    }, {
                        "./nodecontainer": 14
                    }],
                    26: [function(e, n, t) {
                        t.smallImage = function() {
                            return "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                        }, t.bind = function(e, n) {
                            return function() {
                                return e.apply(n, arguments)
                            }
                        }, t.decode64 = function(e) {
                            var n, t, l, o, i, a, r, u = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
                                s = e.length,
                                d = "";
                            for (n = 0; n < s; n += 4) i = u.indexOf(e[n]) << 2 | (t = u.indexOf(e[n + 1])) >> 4, a = (15 & t) << 4 | (l = u.indexOf(e[n + 2])) >> 2, r = (3 & l) << 6 | (o = u.indexOf(e[n + 3])), d += 64 === l ? String.fromCharCode(i) : 64 === o || -1 === o ? String.fromCharCode(i, a) : String.fromCharCode(i, a, r);
                            return d
                        }, t.getBounds = function(e) {
                            if (e.getBoundingClientRect) {
                                var n = e.getBoundingClientRect(),
                                    t = null == e.offsetWidth ? n.width : e.offsetWidth;
                                return {
                                    top: n.top,
                                    bottom: n.bottom || n.top + n.height,
                                    right: n.left + t,
                                    left: n.left,
                                    width: t,
                                    height: null == e.offsetHeight ? n.height : e.offsetHeight
                                }
                            }
                            return {}
                        }, t.offsetBounds = function(e) {
                            var n = e.offsetParent ? t.offsetBounds(e.offsetParent) : {
                                top: 0,
                                left: 0
                            };
                            return {
                                top: e.offsetTop + n.top,
                                bottom: e.offsetTop + e.offsetHeight + n.top,
                                right: e.offsetLeft + n.left + e.offsetWidth,
                                left: e.offsetLeft + n.left,
                                width: e.offsetWidth,
                                height: e.offsetHeight
                            }
                        }, t.parseBackgrounds = function(e) {
                            var n, t, l, o, i, a, r, u = [],
                                s = 0,
                                d = 0,
                                c = function() {
                                    n && ('"' === t.substr(0, 1) && (t = t.substr(1, t.length - 2)), t && r.push(t), "-" === n.substr(0, 1) && (o = n.indexOf("-", 1) + 1) > 0 && (l = n.substr(0, o), n = n.substr(o)), u.push({
                                        prefix: l,
                                        method: n.toLowerCase(),
                                        value: i,
                                        args: r,
                                        image: null
                                    })), r = [], n = l = t = i = ""
                                };
                            return r = [], n = l = t = i = "", e.split("").forEach(function(e) {
                                if (!(0 === s && " \r\n\t".indexOf(e) > -1)) {
                                    switch (e) {
                                        case '"':
                                            a ? a === e && (a = null) : a = e;
                                            break;
                                        case "(":
                                            if (a) break;
                                            if (0 === s) return s = 1, void(i += e);
                                            d++;
                                            break;
                                        case ")":
                                            if (a) break;
                                            if (1 === s) {
                                                if (0 === d) return s = 0, i += e, void c();
                                                d--
                                            }
                                            break;
                                        case ",":
                                            if (a) break;
                                            if (0 === s) return void c();
                                            if (1 === s && 0 === d && !n.match(/^url$/i)) return r.push(t), t = "", void(i += e)
                                    }
                                    i += e, 0 === s ? n += e : t += e
                                }
                            }), c(), u
                        }
                    }, {}],
                    27: [function(e, n, t) {
                        var l = e("./gradientcontainer");

                        function o(e) {
                            l.apply(this, arguments), this.type = "linear" === e.args[0] ? l.TYPES.LINEAR : l.TYPES.RADIAL
                        }
                        o.prototype = Object.create(l.prototype), n.exports = o
                    }, {
                        "./gradientcontainer": 9
                    }],
                    28: [function(e, n, t) {
                        n.exports = function(e) {
                            return new Promise(function(n, t) {
                                var l = new XMLHttpRequest;
                                l.open("GET", e), l.onload = function() {
                                    200 === l.status ? n(l.responseText) : t(new Error(l.statusText))
                                }, l.onerror = function() {
                                    t(new Error("Network Error"))
                                }, l.send()
                            })
                        }
                    }, {}]
                }, {}, [4])(4)
            }, e.exports = l()
        }).call(n, t("fRUx"))
    },
    "4bK+": function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return l
        });
        var l = [];
        l.push({
            name: "paragraph",
            frameworks: ["base"],
            nodes: ["p"],
            html: "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit involuptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>",
            types: ["flow"],
            validChildren: ["phrasing"],
            category: "typography",
            icon: "short-text"
        }), l.push({
            name: "divider",
            frameworks: ["base"],
            nodes: ["hr"],
            html: "<hr>",
            types: ["flow"],
            validChildren: !1,
            category: "layout",
            dragHelper: !0,
            icon: "remove"
        }), l.push({
            name: "marked text",
            frameworks: ["base"],
            nodes: ["mark"],
            html: "<mark>Marked Text</mark>",
            types: ["flow", "phrasing"],
            validChildren: ["phrasing"],
            category: "typography",
            icon: "info"
        }), l.push({
            name: "definition list",
            frameworks: ["base"],
            nodes: ["dl"],
            html: '<dl class="dl-horizontal"><dt>Description lists</dt><dd>A description list is perfect for defining terms.</dd><dt>Euismod</dt><dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd><dd>Donec id elit non mi porta gravida at eget metus.</dd><dt>Malesuada porta</dt><dd>Etiam porta sem malesuada magna mollis euismod.</dd><dt>Felis euismod semper eget lacinia</dt><dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd></dl>',
            types: ["flow", "sectioning root"],
            validChildren: ["dt", "dd"],
            category: "typography",
            previewScale: "0.4",
            scaleDragPreview: !1,
            icon: "view-list"
        }), l.push({
            name: "blockqoute",
            frameworks: ["base"],
            nodes: ["blockqoute"],
            html: '<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><footer>Someone famous in <cite title="Source Title">Source Title</cite></footer></blockquote>',
            types: ["flow", "sectioning root"],
            validChildren: ["flow"],
            category: "typography",
            previewScale: "0.5",
            scaleDragPreview: !1,
            icon: "format-quote"
        }), l.push({
            name: "list item",
            frameworks: ["base"],
            nodes: ["li"],
            html: "<li>A basic list item</li>",
            types: ["li"],
            validChildren: ["flow"]
        }), l.push({
            name: "unordered list",
            frameworks: ["base"],
            nodes: ["ul"],
            html: "<ul><li>List item #1</li><li>List item #2</li><li>List item #3</li><ul>",
            types: ["flow"],
            validChildren: ["li"],
            category: "typography",
            icon: "format-list-bulleted"
        }), l.push({
            name: "body",
            frameworks: ["base"],
            nodes: ["body"],
            html: !1,
            draggable: !1,
            types: ["flow"],
            validChildren: ["flow"]
        }), l.push({
            name: "button",
            frameworks: ["base"],
            nodes: ["button"],
            html: '<button class="btn btn-success">Click Me</button>',
            types: ["flow", "phrasing", "interactive", "listed", "labelable", "submittable", "reassociateable", "form-associated"],
            validChildren: ["phrasing"],
            category: "buttons",
            icon: "button-custom"
        }), l.push({
            name: "div container",
            frameworks: ["base"],
            nodes: ["div"],
            html: "<div></div>",
            types: ["flow"],
            validChildren: ["flow"],
            category: "layout",
            dragHelper: !0,
            previewScale: "0.7",
            icon: "crop-landscape"
        }), l.push({
            name: "heading",
            nodes: ["h1", "h2", "h3", "h4", "h5", "h6"],
            frameworks: ["base"],
            html: "<h2>Heading</h2>",
            types: ["heading", "flow"],
            validChildren: ["phrasing"],
            category: "typography",
            icon: "format-size",
            attributes: {
                types: {
                    list: [{
                        name: "h1",
                        value: "h1"
                    }, {
                        name: "h2",
                        value: "h2"
                    }, {
                        name: "h3",
                        value: "h3"
                    }, {
                        name: "h4",
                        value: "h4"
                    }, {
                        name: "h5",
                        value: "h5"
                    }, {
                        name: "h6",
                        value: "h6"
                    }],
                    value: "h1",
                    onAssign: function(e) {
                        for (var n = e.selected.node.nodeName.toLowerCase(), t = this.list.length - 1; t >= 0; t--)
                            if (n == this.list[t].value) return this.value = this.list[t].value
                    },
                    onChange: function(e, n) {
                        var t = document.createElement(n);
                        t.innerHTML = e.selected.node.innerHTML, e.selected.node.parentNode.replaceChild(t, e.selected.node), e.selected.node = t, e.repositionBox("selected")
                    }
                }
            }
        }), l.push({
            name: "icon",
            nodes: ["i"],
            frameworks: ["base", "bootstrap"],
            html: !1,
            types: ["flow", "phrasing"],
            validChildren: !1,
            category: !1,
            canDrag: !0,
            canModify: ["text", "attributes"],
            attributes: {
                size: {
                    list: [{
                        name: "Default",
                        value: "default"
                    }, {
                        name: "Large",
                        value: "fa-lg"
                    }, {
                        name: "2x",
                        value: "fa-2x"
                    }, {
                        name: "3x",
                        value: "fa-3x"
                    }, {
                        name: "4x",
                        value: "fa-4x"
                    }, {
                        name: "5x",
                        value: "fa-5x"
                    }],
                    value: "default",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            },
            dragHelper: !0
        }), l.push({
            name: "generic",
            nodes: ["em", "strong", "u", "s", "small"],
            frameworks: ["base"],
            html: !1,
            types: ["flow", "phrasing"],
            validChildren: !1,
            category: !1,
            canDrag: !1,
            canModify: ["text", "attributes"]
        }), l.push({
            name: "label",
            nodes: ["label"],
            frameworks: ["base"],
            html: !1,
            types: ["flow", "phrasing"],
            validChildren: !1,
            category: !1,
            canDrag: !1,
            canModify: ["text", "attributes"]
        })
    },
    "9Rbf": function(e, n, t) {
        "use strict";
        t.d(n, "c", function() {
            return c
        }), t.d(n, "b", function() {
            return s
        }), t.d(n, "a", function() {
            return d
        });
        var l = t("LMZF"),
            o = t("j5BN"),
            i = t("6Xbx"),
            a = t("XEj9"),
            r = 0,
            u = function(e, n) {
                this.source = e, this.value = n
            },
            s = function(e) {
                function n(n) {
                    var t = e.call(this) || this;
                    return t._changeDetector = n, t._value = null, t._name = "mat-radio-group-" + r++, t._selected = null, t._isInitialized = !1, t._labelPosition = "after", t._disabled = !1, t._required = !1, t._controlValueAccessorChangeFn = function() {}, t.onTouched = function() {}, t.change = new l.EventEmitter, t
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "name", {
                    get: function() {
                        return this._name
                    },
                    set: function(e) {
                        this._name = e, this._updateRadioButtonNames()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "align", {
                    get: function() {
                        return "after" == this.labelPosition ? "start" : "end"
                    },
                    set: function(e) {
                        this.labelPosition = "start" == e ? "after" : "before"
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "labelPosition", {
                    get: function() {
                        return this._labelPosition
                    },
                    set: function(e) {
                        this._labelPosition = "before" == e ? "before" : "after", this._markRadiosForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "value", {
                    get: function() {
                        return this._value
                    },
                    set: function(e) {
                        this._value != e && (this._value = e, this._updateSelectedRadioFromValue(), this._checkSelectedRadioButton())
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype._checkSelectedRadioButton = function() {
                    this._selected && !this._selected.checked && (this._selected.checked = !0)
                }, Object.defineProperty(n.prototype, "selected", {
                    get: function() {
                        return this._selected
                    },
                    set: function(e) {
                        this._selected = e, this.value = e ? e.value : null, this._checkSelectedRadioButton()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "disabled", {
                    get: function() {
                        return this._disabled
                    },
                    set: function(e) {
                        this._disabled = Object(a.c)(e), this._markRadiosForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "required", {
                    get: function() {
                        return this._required
                    },
                    set: function(e) {
                        this._required = Object(a.c)(e), this._markRadiosForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngAfterContentInit = function() {
                    this._isInitialized = !0
                }, n.prototype._touch = function() {
                    this.onTouched && this.onTouched()
                }, n.prototype._updateRadioButtonNames = function() {
                    var e = this;
                    this._radios && this._radios.forEach(function(n) {
                        n.name = e.name
                    })
                }, n.prototype._updateSelectedRadioFromValue = function() {
                    var e = this;
                    null == this._radios || null != this._selected && this._selected.value == this._value || (this._selected = null, this._radios.forEach(function(n) {
                        n.checked = e.value == n.value, n.checked && (e._selected = n)
                    }))
                }, n.prototype._emitChangeEvent = function() {
                    this._isInitialized && this.change.emit(new u(this._selected, this._value))
                }, n.prototype._markRadiosForCheck = function() {
                    this._radios && this._radios.forEach(function(e) {
                        return e._markForCheck()
                    })
                }, n.prototype.writeValue = function(e) {
                    this.value = e, this._changeDetector.markForCheck()
                }, n.prototype.registerOnChange = function(e) {
                    this._controlValueAccessorChangeFn = e
                }, n.prototype.registerOnTouched = function(e) {
                    this.onTouched = e
                }, n.prototype.setDisabledState = function(e) {
                    this.disabled = e, this._changeDetector.markForCheck()
                }, n
            }(Object(o.G)(function() {})),
            d = function(e) {
                function n(n, t, o, i, a) {
                    var u = e.call(this, t) || this;
                    return u._changeDetector = o, u._focusMonitor = i, u._radioDispatcher = a, u._uniqueId = "mat-radio-" + ++r, u.id = u._uniqueId, u.change = new l.EventEmitter, u._checked = !1, u._value = null, u._removeUniqueSelectionListener = function() {}, u.radioGroup = n, u._removeUniqueSelectionListener = a.listen(function(e, n) {
                        e != u.id && n == u.name && (u.checked = !1)
                    }), u
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "checked", {
                    get: function() {
                        return this._checked
                    },
                    set: function(e) {
                        var n = Object(a.c)(e);
                        this._checked != n && (this._checked = n, n && this.radioGroup && this.radioGroup.value != this.value ? this.radioGroup.selected = this : !n && this.radioGroup && this.radioGroup.value == this.value && (this.radioGroup.selected = null), n && this._radioDispatcher.notify(this.id, this.name), this._changeDetector.markForCheck())
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "value", {
                    get: function() {
                        return this._value
                    },
                    set: function(e) {
                        this._value != e && (this._value = e, null != this.radioGroup && (this.checked || (this.checked = this.radioGroup.value == e), this.checked && (this.radioGroup.selected = this)))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "align", {
                    get: function() {
                        return "after" == this.labelPosition ? "start" : "end"
                    },
                    set: function(e) {
                        this.labelPosition = "start" == e ? "after" : "before"
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "labelPosition", {
                    get: function() {
                        return this._labelPosition || this.radioGroup && this.radioGroup.labelPosition || "after"
                    },
                    set: function(e) {
                        this._labelPosition = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "disabled", {
                    get: function() {
                        return this._disabled || null != this.radioGroup && this.radioGroup.disabled
                    },
                    set: function(e) {
                        this._disabled = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "required", {
                    get: function() {
                        return this._required || this.radioGroup && this.radioGroup.required
                    },
                    set: function(e) {
                        this._required = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "inputId", {
                    get: function() {
                        return (this.id || this._uniqueId) + "-input"
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.focus = function() {
                    this._focusMonitor.focusVia(this._inputElement.nativeElement, "keyboard")
                }, n.prototype._markForCheck = function() {
                    this._changeDetector.markForCheck()
                }, n.prototype.ngOnInit = function() {
                    this.radioGroup && (this.checked = this.radioGroup.value === this._value, this.name = this.radioGroup.name)
                }, n.prototype.ngAfterViewInit = function() {
                    var e = this;
                    this._focusMonitor.monitor(this._inputElement.nativeElement).subscribe(function(n) {
                        return e._onInputFocusChange(n)
                    })
                }, n.prototype.ngOnDestroy = function() {
                    this._focusMonitor.stopMonitoring(this._inputElement.nativeElement), this._removeUniqueSelectionListener()
                }, n.prototype._emitChangeEvent = function() {
                    this.change.emit(new u(this, this._value))
                }, n.prototype._isRippleDisabled = function() {
                    return this.disableRipple || this.disabled
                }, n.prototype._onInputClick = function(e) {
                    e.stopPropagation()
                }, n.prototype._onInputChange = function(e) {
                    e.stopPropagation();
                    var n = this.radioGroup && this.value != this.radioGroup.value;
                    this.checked = !0, this._emitChangeEvent(), this.radioGroup && (this.radioGroup._controlValueAccessorChangeFn(this.value), this.radioGroup._touch(), n && this.radioGroup._emitChangeEvent())
                }, n.prototype._onInputFocusChange = function(e) {
                    this._focusRipple || "keyboard" !== e ? e || (this.radioGroup && this.radioGroup._touch(), this._focusRipple && (this._focusRipple.fadeOut(), this._focusRipple = null)) : this._focusRipple = this._ripple.launch(0, 0, {
                        persistent: !0
                    })
                }, n
            }(Object(o.E)(Object(o.F)(Object(o.I)(function(e) {
                this._elementRef = e
            })), "accent")),
            c = function() {}
    },
    FhOc: function(e, n, t) {
        "use strict";
        t.d(n, "b", function() {
            return u
        }), t.d(n, "a", function() {
            return a
        }), t.d(n, "c", function() {
            return s
        });
        var l = t("LMZF"),
            o = t("XEj9"),
            i = 0,
            a = function() {
                function e() {
                    this.id = "cdk-accordion-" + i++, this._multi = !1
                }
                return Object.defineProperty(e.prototype, "multi", {
                    get: function() {
                        return this._multi
                    },
                    set: function(e) {
                        this._multi = Object(o.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), e
            }(),
            r = 0,
            u = function() {
                function e(e, n, t) {
                    var o = this;
                    this.accordion = e, this._changeDetectorRef = n, this._expansionDispatcher = t, this.closed = new l.EventEmitter, this.opened = new l.EventEmitter, this.destroyed = new l.EventEmitter, this.expandedChange = new l.EventEmitter, this.id = "cdk-accordion-child-" + r++, this._expanded = !1, this._disabled = !1, this._removeUniqueSelectionListener = function() {}, this._removeUniqueSelectionListener = t.listen(function(e, n) {
                        o.accordion && !o.accordion.multi && o.accordion.id === n && o.id !== e && (o.expanded = !1)
                    })
                }
                return Object.defineProperty(e.prototype, "expanded", {
                    get: function() {
                        return this._expanded
                    },
                    set: function(e) {
                        e = Object(o.c)(e), this._expanded !== e && (this._expanded = e, this.expandedChange.emit(e), e ? (this.opened.emit(), this._expansionDispatcher.notify(this.id, this.accordion ? this.accordion.id : this.id)) : this.closed.emit(), this._changeDetectorRef.markForCheck())
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "disabled", {
                    get: function() {
                        return this._disabled
                    },
                    set: function(e) {
                        this._disabled = Object(o.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.ngOnDestroy = function() {
                    this.destroyed.emit(), this._removeUniqueSelectionListener()
                }, e.prototype.toggle = function() {
                    this.disabled || (this.expanded = !this.expanded)
                }, e.prototype.close = function() {
                    this.disabled || (this.expanded = !1)
                }, e.prototype.open = function() {
                    this.disabled || (this.expanded = !0)
                }, e
            }(),
            s = function() {}
    },
    HJs5: function(e, n, t) {
        "use strict";
        Object.defineProperty(n, "__esModule", {
            value: !0
        });
        var l = Object.assign || function(e) {
            for (var n = 1; n < arguments.length; n++) {
                var t = arguments[n];
                for (var l in t) Object.prototype.hasOwnProperty.call(t, l) && (e[l] = t[l])
            }
            return e
        };
        n.default = function(e) {
            try {
                return h(e)
            } catch (e) {
                console.error(e)
            }
        };
        var o = ["meta", "link", "area", "base", "col", "command", "embeded", "source", "link"],
            i = ["b", "big", "i", "small", "tt", "abbr", "acronym", "cite", "dfn", "em", "kbd", "strong", "samp", "time", "var", "a", "bdo", "br", "br", "img", "map", "object", "q", "script", "span", "sub", "sup", "button", "label", "input", "select", "textarea", "param", "hr"],
            a = function(e) {
                return /\S/.test(e)
            },
            r = function(e, n) {
                return [].concat(function(e) {
                    if (Array.isArray(e)) {
                        for (var n = 0, t = Array(e.length); n < e.length; n++) t[n] = e[n];
                        return t
                    }
                    return Array.from(e)
                }(e), [n])
            },
            u = function(e, n) {
                return e.filter(function(e) {
                    return e != n
                })
            },
            s = function(e) {
                var n = e.node,
                    t = e.spaceCount;
                return t < 0 && (t = 0), "\n".repeat(e.newLine + 0) + "   ".repeat(t) + n
            },
            d = function(e) {
                var n = e.node;
                if ("tag" != e.nodeType) return {};
                var t, l = "/" == (t = n)[1] ? "closed" : "/>" == t.slice(-2) ? "single" : "opened",
                    o = function(e, n) {
                        var t = !1;
                        switch (l) {
                            case "closed":
                                t = e.slice(2, -1);
                                break;
                            case "opened":
                                t = e.slice(1, -1);
                                break;
                            case "single":
                                t = e.slice(1, -2)
                        }
                        return t.split(" ")[0]
                    }(n);
                return {
                    tagType: l,
                    tagName: o,
                    tagIsInline: i.indexOf(o) > -1
                }
            },
            c = function(e) {
                var n = e.nodeType,
                    t = e.previousNodeType,
                    l = e.previousTagIsInline,
                    o = e.tagInfo,
                    i = o.tagIsInline,
                    a = o.tagType;
                return "comment" == n || "opened" == a && !i && 0 != t || !("closed" != a || i || !l && "tag" == t && ("closed" != e.previousTagType || l)) || !(!i || "tag" != n || ("tag" != t || l) && "comment" != t) || "text" == n && ["tag", "comment"].indexOf(t) > -1 && !l
            },
            p = function(e) {
                var n = e.nodeType,
                    t = e.tagInfo,
                    l = e.previousNodeType,
                    o = e.previousTagIsInline,
                    i = e.previousTagType,
                    a = e.level;
                if ("tag" == n) {
                    var r = t.tagIsInline;
                    return r && ("tag" == l && 0 == o || "comment" == l) ? a + 1 : r && "text" == l || r && "tag" == l && o ? 0 : "closed" != t.tagType || "tag" != l || o ? a : 0
                }
                return "text" == n ? ["tag", "comment"].indexOf(l) > -1 && !o && "opened" == i ? a + 1 : 0 : "comment" == n ? 0 == l ? a : a + 1 : void 0
            },
            h = function(e) {
                var n, t = "",
                    i = "",
                    h = 0,
                    f = [],
                    m = "",
                    g = !1,
                    b = !1,
                    v = e.split(""),
                    y = 0,
                    x = !0,
                    w = !1,
                    _ = void 0;
                try {
                    for (var k, C = v[Symbol.iterator](); !(x = (k = C.next()).done); x = !0) {
                        var E = k.value;
                        if (i += E, e.length == y + 1 || "<" == (v.length - 1 != y && v[y + 1]) || ">" == E) {
                            var R = "\x3c!--" == (n = i = i.replace(/\n/g, "")).slice(0, 4) ? "comment" : "<" == n[0] && ">" == n[n.length - 1] ? "tag" : "text",
                                S = d({
                                    node: i,
                                    nodeType: R
                                });
                            if ("tag" == R && -1 == o.indexOf(S.tagName)) {
                                var T = S.tagIsInline,
                                    P = S.tagType,
                                    I = S.tagName;
                                T || "opened" != P || (f = r(f, I)), h = f.length - 1, T || "closed" != P || (f = u(f, I))
                            }
                            "tag" != m || g || (S.tagIsInline || "text" == R) && (i = i.replace(/^\s+/g, ""));
                            var D = c({
                                    nodeType: R,
                                    tagInfo: S,
                                    previousNodeType: m,
                                    previousTagIsInline: g,
                                    previousTagType: b
                                }),
                                O = p({
                                    level: h,
                                    nodeType: R,
                                    tagInfo: S,
                                    previousNodeType: m,
                                    previousTagIsInline: g,
                                    previousTagType: b
                                }),
                                M = l({
                                    level: h,
                                    node: i,
                                    nodeType: R,
                                    newLine: D,
                                    spaceCount: O,
                                    previousTagType: b,
                                    previousTagIsInline: g,
                                    previousNodeType: m
                                }, S);
                            a(i) && (t += s({
                                node: i,
                                spaceCount: M.spaceCount,
                                newLine: M.newLine
                            })), a(i) && (m = R, "tag" == R && (b = M.tagType, g = M.tagIsInline)), i = ""
                        }
                        y++
                    }
                } catch (e) {
                    w = !0, _ = e
                } finally {
                    try {
                        !x && C.return && C.return()
                    } finally {
                        if (w) throw _
                    }
                }
                return t
            };
        e.exports = n.default
    },
    HiZe: function(e, n, t) {
        "use strict";
        Object.defineProperty(n, "__esModule", {
            value: !0
        });
        var l = t("LMZF"),
            o = function() {},
            i = t("uAL3"),
            a = t("k1En"),
            r = t("yvN4"),
            u = t("08uy"),
            s = t("l6MO"),
            d = t("rz2P"),
            c = t("911F"),
            p = t("hzkV"),
            h = t("JmXj"),
            f = t("oqGC"),
            m = t("UHIZ"),
            g = t("Un6q"),
            b = t("ZS4e"),
            v = function() {
                function e(e, n, t, l, o, i, a) {
                    this.templatesApi = e, this.settings = n, this.activeProject = t, this.modal = l, this.toast = o, this.inspectorDrawer = i, this.loader = a, this.templates = [], this.loading = !1
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.templatesApi.all({
                        per_page: 25
                    }).subscribe(function(n) {
                        e.templates = n.data
                    })
                }, e.prototype.applyTemplate = function(e) {
                    var n = this;
                    this.modal.open(b.a, {
                        title: "Apply Template",
                        body: "Are you sure you want to apply this template?",
                        bodyBold: "This will erase all the current contents of your project.",
                        ok: "Apply"
                    }).afterClosed().subscribe(function(t) {
                        t && (n.loading = !0, n.loader.show(), n.inspectorDrawer.close(), n.activeProject.applyTemplate(e.name).subscribe(function() {
                            n.toast.open("Template applied"), n.loading = !1, n.loader.hide()
                        }))
                    })
                }, e.prototype.getThumbnailUrl = function(e) {
                    return this.settings.getBaseUrl(!0) + "/" + e.thumbnail
                }, e
            }(),
            y = t("mRB5"),
            x = t("URHI"),
            w = t("4AbN"),
            _ = t("TO51"),
            k = t("Rx5t"),
            C = t("eIqN"),
            E = t("w/Ur"),
            R = function() {
                function e(e, n, t, l, o, i, a) {
                    this.settings = e, this.builderDocument = n, this.projectUrl = t, this.projects = l, this.templates = o, this.toast = i, this.localStorage = a, this.pages = [], this.activePage = 0, this.saving = !1, this.bindToBuilderDocumentChangeEvent()
                }
                return e.prototype.get = function() {
                    return this.project
                }, e.prototype.getPages = function() {
                    return this.pages
                }, e.prototype.getPage = function(e) {
                    return this.pages.find(function(n) {
                        return n.name.toLowerCase() === e.toLowerCase()
                    })
                }, e.prototype.getActivePage = function() {
                    return this.pages[this.activePage]
                }, e.prototype.save = function(e) {
                    var n = this;
                    void 0 === e && (e = {
                        thumbnail: !0
                    }), this.saving = !0, e.thumbnail && w(this.builderDocument.getBody(), {
                        svgRendering: !0,
                        height: 1e3
                    }).then(function(e) {
                        n.projects.generateThumbnail(n.project.model.id, e.toDataURL("image/png")).subscribe()
                    }), e.params || (e.params = {}), this.pages[this.activePage].html = this.builderDocument.getOuterHtml();
                    var t = Object.assign({}, e.params, {
                            name: this.project.model.name,
                            css: this.project.css,
                            js: this.project.js,
                            theme: this.project.model.theme,
                            template: this.project.model.template,
                            framework: this.project.model.framework,
                            pages: this.pages.map(function(e) {
                                return {
                                    name: e.name,
                                    html: e.html
                                }
                            })
                        }),
                        l = this.projects.update(this.project.model.id, t).pipe(Object(C.a)());
                    return l.subscribe(function(e) {
                        n.project = e.project, n.saving = !1
                    }, function() {
                        n.saving = !1, n.toast.open("Could not save project")
                    }), l
                }, e.prototype.addPage = function(e) {
                    return this.pages.push(e), this.activePage = this.pages.length - 1, this.updateBuilderDocument(), e
                }, e.prototype.updatePage = function(e) {
                    var n = this.pages.findIndex(function(n) {
                        return n.name === e.name
                    });
                    return this.pages[n] = e, this
                }, e.prototype.setActivePage = function(e) {
                    this.activePage = this.pages.findIndex(function(n) {
                        return n.name === e.name
                    }), this.updateBuilderDocument()
                }, e.prototype.removePage = function(e) {
                    var n = this.pages.findIndex(function(n) {
                        return n.name === e
                    });
                    this.pages.splice(n, 1), this.activePage = n - 1, this.updateBuilderDocument()
                }, e.prototype.setProject = function(e) {
                    this.project = e, this.activePage = 0, this.pages = e.pages, this.activeTemplate = e.template, this.builderDocument.setTemplate(this.activeTemplate), this.builderDocument.setFramework(e.model.framework)
                }, e.prototype.applyTemplate = function(e) {
                    var n = this,
                        t = new _.a;
                    return this.project.model.template = e, this.templates.get(e).subscribe(function(e) {
                        n.activeTemplate = e.template, n.pages = e.template.pages.map(function(e) {
                            return {
                                name: e.name,
                                html: new E.a(n.getBaseUrl()).generate(e.html, n.activeTemplate).getOuterHtml()
                            }
                        }), n.save({
                            thumbnail: !0
                        }).subscribe(function() {
                            n.activePage = 0, n.updateBuilderDocument().then(function() {
                                t.next() && t.complete()
                            })
                        })
                    }), t
                }, e.prototype.changeFramework = function(e) {
                    var n = this;
                    return this.project.model.framework = e, new Promise(function(e) {
                        n.save({
                            thumbnail: !1
                        }).subscribe(function() {
                            n.updateBuilderDocument().then(function() {
                                return e()
                            })
                        })
                    })
                }, e.prototype.applyTheme = function(e) {
                    var n = this;
                    return this.project.model.theme = e ? e.name : null, new Promise(function(e) {
                        n.save({
                            thumbnail: !1
                        }).subscribe(function() {
                            n.updateBuilderDocument().then(function() {
                                return e()
                            })
                        })
                    })
                }, e.prototype.getBaseUrl = function(e) {
                    return void 0 === e && (e = !1), this.projectUrl.getBaseUrl(this.project.model, e)
                }, e.prototype.getSiteUrl = function() {
                    return this.settings.getBaseUrl(!0) + "sites/" + this.project.model.name
                }, e.prototype.updateBuilderDocument = function() {
                    return this.builderDocument.update({
                        html: this.getActivePage().html,
                        template: this.activeTemplate,
                        source: "activeProject",
                        framework: this.project.model.framework,
                        theme: this.project.model.theme
                    })
                }, e.prototype.getTemplate = function() {
                    return this.activeTemplate
                }, e.prototype.hasTemplate = function() {
                    return void 0 !== this.activeTemplate
                }, e.prototype.bindToBuilderDocumentChangeEvent = function() {
                    var e = this;
                    this.builderDocument.contentChanged.pipe(Object(k.a)(1e3)).subscribe(function(n) {
                        "activeProject" !== n && (e.pages[e.activePage].html = e.builderDocument.getOuterHtml(), e.localStorage.get("settings.autoSave") && e.save({
                            thumbnail: !1
                        }))
                    })
                }, e
            }(),
            S = t("S4PI"),
            T = t("XEjt"),
            P = function() {
                function e() {
                    this.activePanel = null
                }
                return e.prototype.toggle = function(e) {
                    this.activePanel = e, this.drawer.toggle()
                }, e.prototype.close = function() {
                    return this.activePanel = null, this.drawer.close()
                }, e.prototype.setDrawer = function(e) {
                    this.drawer = e
                }, e
            }(),
            I = function() {
                function e() {}
                return e.prototype.isVisible = function() {
                    return this.visible
                }, e.prototype.show = function() {
                    this.visible = !0
                }, e.prototype.hide = function() {
                    this.visible = !1
                }, e.prototype.setLoader = function(e) {
                    this.loader = e
                }, e
            }(),
            D = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\ntemplates-panel{display:block;background-color:#fafafa;height:100%;width:300px;-webkit-box-sizing:inherit;box-sizing:inherit}templates-panel .templates{padding:20px}templates-panel .templates>.template{margin-bottom:20px;cursor:pointer;background-color:#fff;-webkit-transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1),-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);-webkit-box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12)}templates-panel .templates>.template.disabled{pointer-events:none;opacity:.7}templates-panel .templates>.template:hover{-webkit-box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12);box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}templates-panel .templates>.template>.name{padding:10px 0;text-align:center}templates-panel .templates>.template>img{display:block;width:100%;height:auto}"]
                ],
                data: {}
            });

        function O(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "div", [
                ["class", "template"]
            ], [
                [2, "disabled", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyTemplate(e.context.$implicit) && l), l
            }, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 0, "img", [], [
                [8, "src", 4]
            ], null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 1, "div", [
                ["class", "name"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](3, null, ["", ""]))], null, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t.loading), e(n, 1, 0, t.getThumbnailUrl(n.context.$implicit)), e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function M(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "div", [
                ["class", "templates scroll-container"],
                ["customScrollbar", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, f.a, [l.ElementRef, m.m], {
                theme: [0, "theme"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, O)), l["\u0275did"](3, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 1, 0, ""), e(n, 3, 0, t.templates)
            }, null)
        }
        var N = l["\u0275ccf"]("templates-panel", v, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "templates-panel", [], null, null, null, M, D)), l["\u0275did"](1, 114688, null, 0, v, [y.a, x.a, R, S.a, T.a, P, I], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {}, []),
            B = t("ESfO"),
            j = t("ghl+"),
            L = t("V8+5"),
            A = t("8Xfy"),
            F = t("Y7bZ"),
            V = t("eIMU"),
            H = function() {
                function e(e, n, t, l, o, i) {
                    this.themesApi = e, this.loader = n, this.inspectorDrawer = t, this.activeProject = l, this.toast = o, this.settings = i, this.themes = []
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.themesApi.all().subscribe(function(n) {
                        e.themes = n.themes
                    })
                }, e.prototype.applyTheme = function(e) {
                    var n = this;
                    this.loader.show(), this.inspectorDrawer.close(), this.activeProject.applyTheme(e).then(function() {
                        n.toast.open("Theme applied"), n.loader.hide()
                    })
                }, e.prototype.getThumbnailUrl = function(e) {
                    return this.settings.getBaseUrl(!0) + "/" + e.thumbnail
                }, e.prototype.themeIsActive = function(e) {
                    return e ? this.activeProject.get().model.theme === e.name : this.activeProject.get().model.theme
                }, e
            }(),
            z = function() {
                function e(e) {
                    this.http = e
                }
                return e.prototype.all = function() {
                    return this.http.get("themes")
                }, e
            }(),
            q = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\nthemes-panel{display:block;background-color:#fafafa;height:100%;width:300px;-webkit-box-sizing:inherit;box-sizing:inherit}themes-panel .remove-button{width:100%;height:40px;margin-bottom:20px}themes-panel .themes{padding:20px}themes-panel .themes>.theme{margin-bottom:20px;cursor:pointer;background-color:#fff;border:2px solid transparent;-webkit-transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1),-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);-webkit-box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12)}themes-panel .themes>.theme.disabled{pointer-events:none;opacity:.7}themes-panel .themes>.theme.active{border-color:#009688}themes-panel .themes>.theme:hover{-webkit-box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12);box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}themes-panel .themes>.theme>.name{padding:10px 0;text-align:center}themes-panel .themes>.theme>img{display:block;width:100%;height:auto}"]
                ],
                data: {}
            });

        function U(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "button", [
                ["class", "remove-button"],
                ["color", "warn"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyTheme() && l), l
            }, B.d, B.b)), l["\u0275did"](1, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Remove"]))], function(e, n) {
                e(n, 1, 0, "warn")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled || null)
            })
        }

        function W(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "div", [
                ["class", "theme"]
            ], [
                [2, "disabled", null],
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyTheme(e.context.$implicit) && l), l
            }, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 0, "img", [], [
                [8, "src", 4]
            ], null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 1, "div", [
                ["class", "name"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](3, null, ["", ""]))], null, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t.loader.isVisible(), t.themeIsActive(n.context.$implicit)), e(n, 1, 0, t.getThumbnailUrl(n.context.$implicit)), e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function $(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 5, "div", [
                ["class", "themes scroll-container"],
                ["customScrollbar", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, f.a, [l.ElementRef, m.m], {
                theme: [0, "theme"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, U)), l["\u0275did"](3, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, W)), l["\u0275did"](5, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 1, 0, ""), e(n, 3, 0, t.themeIsActive()), e(n, 5, 0, t.themes)
            }, null)
        }
        var X, G = l["\u0275ccf"]("themes-panel", H, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "themes-panel", [], null, null, null, $, q)), l["\u0275did"](1, 114688, null, 0, H, [z, I, P, R, T.a, x.a], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {}, []),
            Z = t("07cn"),
            Y = t("cC+T"),
            K = t("jk5D"),
            Q = t("OFGE"),
            J = t("4jwp"),
            ee = t("l6RC"),
            ne = t("sLKV"),
            te = t("ASJH"),
            le = t("0hNI"),
            oe = t("RXNa"),
            ie = t("ka8K"),
            ae = function() {
                function e(e, n) {
                    this.builderDocument = e, this.previewContainer = n
                }
                return e.prototype.scroll = function(e) {
                    var n = this.builderDocument.getScrollTop(),
                        t = e + this.builderDocument.getScrollTop();
                    this.previewHeight || (this.previewHeight = this.previewContainer.offsetHeight), t - n <= 80 ? this.scrollFrameUp() : t > n + this.previewHeight - 80 ? this.scrollFrameDown() : this.stopScrolling()
                }, e.prototype.stopScrolling = function() {
                    return clearInterval(this.scrollDownTimeout), clearInterval(this.scrollUpTimeout)
                }, e.prototype.scrollFrameDown = function() {
                    var e = this;
                    return clearInterval(this.scrollDownTimeout), this.scrollDownTimeout = setInterval(function() {
                        return e.setScrollTop(e.builderDocument.getScrollTop() + 40)
                    }, 40)
                }, e.prototype.scrollFrameUp = function() {
                    var e = this;
                    return clearInterval(this.scrollUpTimeout), this.scrollUpTimeout = setInterval(function() {
                        return e.setScrollTop(e.builderDocument.getScrollTop() - 40)
                    }, 40)
                }, e.prototype.setScrollTop = function(e) {
                    e = Math.max(0, e), this.builderDocument.getBody().scrollTop = e
                }, e
            }(),
            re = t("7jK9"),
            ue = function() {
                function e() {}
                return e.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this.dragOverlay = document.querySelector(".drag-overlay");
                    var n = document.querySelector("live-preview");
                    this.scroller = new ae(this.builderDocument, n), this.zone.runOutsideAngular(function() {
                        e.initHammer(e.getDragHandles())
                    })
                }, e.prototype.initHammer = function(e) {
                    for (var n = this, t = e.length - 1; t >= 0; t--) {
                        var l = new Hammer.Manager(e[t]),
                            o = new Hammer.Pan({
                                direction: Hammer.DIRECTION_ALL,
                                threshold: 0
                            });
                        l.add([o]), l.on("panstart", function(e) {
                            return n.handleDragStart(e)
                        }), l.on("panmove", function(e) {
                            return n.handleDrag(e)
                        }), l.on("panend", function(e) {
                            return n.handleDragEnd(e)
                        })
                    }
                }, e.prototype.handleDragStart = function(e) {
                    this.bodyBeforeDrag = this.builderDocument.getBody().cloneNode(!0), this.builderDocument.getBody().classList.add("dragging"), this.livePreview.dragging = !0, this.livePreview.contextBoxes.hideBoxes(), this.setDragElement(e), this.renderer.setStyle(this.dragOverlay, "display", "block"), this.dragHelper.show(this.dragEl.element), "column" !== this.dragEl.element.name && (this.renderer.setAttribute(this.dragEl.node, "data-display", this.dragEl.node.style.display), this.createDropPlaceholder(), this.renderer.setStyle(this.dragEl.node, "display", "none"))
                }, e.prototype.handleDrag = function(e) {
                    var n = e.center.x,
                        t = e.center.y;
                    if (this.repositionDragMirror(t, n), !(n <= 380)) {
                        var l = this.builderDocument.elementFromPoint(n - 380, t);
                        this.scroller.scroll(t);
                        var o = this.dragEl.node.className;
                        return o && o.match("col-") ? this.sortColumns && this.sortColumns(l, e) : this.repositionDropPlaceholder(l, n - 380, t)
                    }
                }, e.prototype.handleDragEnd = function(e) {
                    this.scroller.stopScrolling(), this.livePreview.dragging = !1, this.builderDocument.getBody().classList.remove("dragging"), this.dragHelper.hide(), this.renderer.setStyle(this.dragOverlay, "display", "none"), "column" !== this.dragEl.element.name && (this.dropPlaceholder.parentNode && this.dropPlaceholder.parentNode.replaceChild(this.dragEl.node, this.dropPlaceholder), this.showDragEl(), this.dropPlaceholder.remove(), this.dropPlaceholder = null), this.builderDocument.getBody().contains(this.dragEl.node) && (this.selectedElement.selectNode(this.dragEl.node), this.undoManager.wrapDomChanges(this.builderDocument.getBody(), null, {
                        before: this.bodyBeforeDrag
                    }), this.builderDocument.contentChanged.next("builder"))
                }, e.prototype.showDragEl = function() {
                    this.renderer.setStyle(this.dragEl.node, "display", this.dragEl.node.getAttribute("data-display")), this.renderer.removeAttribute(this.dragEl.node, "data-display")
                }, e.prototype.repositionDropPlaceholder = function(e, n, t) {
                    if (e && this.dragEl.node != e && !this.dragEl.node.contains(e)) {
                        for (var l = 0, o = e.children.length; l < o; l++) {
                            var i = e.children[l];
                            if (re.a.coordinatesAboveNode(i, n, t) && this.elements.canInsert(e, this.dragEl.element)) return e.insertBefore(this.dropPlaceholder, i)
                        }
                        this.elements.canInsert(e, this.dragEl.element) && e.appendChild(this.dropPlaceholder)
                    }
                }, e.prototype.repositionDragMirror = function(e, n) {
                    this.dragHelper.reposition(e, n)
                }, e.prototype.createDropPlaceholder = function() {
                    this.dropPlaceholder = this.builderDocument.createElement("div"), this.dropPlaceholder.classList.add("drop-placeholder"), this.renderer.setStyle(this.dropPlaceholder, "display", this.dragEl.node.getAttribute("data-display")), this.renderer.setStyle(this.dropPlaceholder, "pointer-events", "none"), this.renderer.setStyle(this.dropPlaceholder, "height", "50px"), this.renderer.setStyle(this.dropPlaceholder, "background", 'url(\'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="6" height="6"><rect width="6" height="6" fill="transparent"/><path d="M0 6L6 0ZM7 5L5 7ZM-1 1L1 -1Z" stroke="rgba(0, 0, 0, 0.2)" stroke-width="2"/></svg>\')')
                }, e
            }(),
            se = this && this.__extends || (X = Object.setPrototypeOf || {
                    __proto__: []
                }
                instanceof Array && function(e, n) {
                    e.__proto__ = n
                } || function(e, n) {
                    for (var t in n) n.hasOwnProperty(t) && (e[t] = n[t])
                },
                function(e, n) {
                    function t() {
                        this.constructor = e
                    }
                    X(e, n), e.prototype = null === n ? Object.create(n) : (t.prototype = n.prototype, new t)
                }),
            de = function(e) {
                function n(n, t, l, o, i, a, r, u, s) {
                    var d = e.call(this) || this;
                    return d.livePreview = n, d.undoManager = t, d.elements = l, d.zone = o, d.selectedElement = i, d.builderDocument = a, d.activeProject = r, d.renderer = u, d.dragHelper = s, d
                }
                return se(n, e), n.prototype.getDragHandles = function() {
                    return document.querySelectorAll(".element-drag-handle")
                }, n.prototype.setDragElement = function(e) {
                    var n = this.elements.findByName(e.target.closest(".element").dataset.name),
                        t = re.a.nodeFromString(n.html);
                    this.dragEl = {
                        node: t,
                        element: n
                    }
                }, n.prototype.handleDragEnd = function(n) {
                    var t = this;
                    e.prototype.handleDragEnd.call(this, n), this.dragEl.element.css && this.activeProject.save({
                        thumbnail: !1,
                        params: {
                            custom_element_css: this.dragEl.element.css
                        }
                    }).subscribe(function() {
                        t.builderDocument.reloadCustomElementsCss()
                    })
                }, n
            }(ue),
            ce = function() {
                this.isImage = !1
            },
            pe = function() {
                function e(e, n, t, l) {
                    this.undoManager = e, this.codeEditor = n, this.builderDocument = t, this.selected = l
                }
                return e.prototype.remove = function() {
                    this.builderDocument.actions.removeNode(this.selected.node)
                }, e.prototype.undo = function() {
                    this.undoManager.undo()
                }, e.prototype.redo = function() {
                    this.undoManager.redo()
                }, e.prototype.copy = function() {
                    this.builderDocument.actions.copyNode(this.selected.node)
                }, e.prototype.cut = function() {
                    this.builderDocument.actions.cutNode(this.selected.node)
                }, e.prototype.paste = function() {
                    this.builderDocument.actions.pasteNode(this.selected.node)
                }, e.prototype.canPaste = function() {
                    return this.builderDocument.actions.copiedNode
                }, e.prototype.duplicate = function() {
                    this.builderDocument.actions.duplicateNode(this.selected.node)
                }, e.prototype.selectParent = function() {
                    this.selected.selectParent()
                }, e.prototype.canSelectParent = function() {
                    return this.selected.canSelectParent()
                }, e.prototype.canSelectChild = function() {
                    return this.selected.canSelectChild()
                }, e.prototype.selectChild = function() {
                    this.selected.selectFirstChild()
                }, e.prototype.viewSourceCode = function() {
                    var e = this;
                    this.codeEditor.open().subscribe(function(n) {
                        n.selectNodeSource(e.selected.node)
                    })
                }, e.prototype.move = function(e) {
                    this.builderDocument.actions.moveSelected(e)
                }, e
            }(),
            he = function() {
                function e(e, n, t, l, o, i, a, r, u, s, d, c, p, h) {
                    this.zone = e, this.elements = n, this.undoManager = t, this.inlineTextEditor = l, this.parsedProject = o, this.contextMenu = i, this.overlay = a, this.keybinds = r, this.selected = u, this.contextBoxes = s, this.builderDocument = d, this.activeProject = c, this.loader = p, this.linkEditor = h, this.dragging = !1, this.hover = new ce, this.activeWidth = "desktop"
                }
                return e.prototype.init = function(e) {
                    var n = this;
                    this.loader.show(), this.iframe = e.nativeElement, this.iframe.src = this.activeProject.getBaseUrl(), this.iframe.onload = function() {
                        n.builderDocument.setBaseUrl(n.activeProject.getBaseUrl()), n.builderDocument.init(n.iframe.contentDocument), n.builderDocument.reload("activeProject").then(function() {
                            n.registerKeybinds(), n.bindToIframeEvents(), n.bindToUndoCommandExecuted(), n.loader.hide()
                        })
                    }
                }, e.prototype.bindToUndoCommandExecuted = function() {
                    var e = this;
                    this.undoManager.executedCommand.subscribe(function() {
                        e.repositionBox("selected"), e.hideBox("hover")
                    })
                }, e.prototype.bindToIframeEvents = function() {
                    var e = this,
                        n = new Hammer.Manager(this.builderDocument.get()),
                        t = new Hammer.Tap({
                            event: "double_tap",
                            taps: 2
                        });
                    n.add(t), this.listenForHover(), this.listenForClick(), this.listenForDoubleClick(n), this.listenForContextMenu(), this.keybinds.listenOn(this.builderDocument.get()), this.builderDocument.on("scroll", function(n) {
                        e.contextBoxes.hideBox("hover"), e.selected.node && e.repositionBox("selected"), e.inlineTextEditor.close(), e.contextMenu.close()
                    }, !0)
                }, e.prototype.listenForContextMenu = function() {
                    var e = this;
                    this.builderDocument.on("contextmenu", function(n) {
                        e.zone.run(function() {
                            n.preventDefault(), e.selected.selectNode(n.target), e.contextMenu.open(pe, n, {
                                offsetX: 380,
                                overlay: e.overlay
                            })
                        })
                    })
                }, e.prototype.registerKeybinds = function() {
                    var e = this;
                    this.keybinds.add("ctrl+shift+x", function() {
                        return e.builderDocument.actions.cutNode(e.selected.node)
                    }), this.keybinds.add("ctrl+shift+c", function() {
                        return e.builderDocument.actions.copyNode(e.selected.node)
                    }), this.keybinds.add("ctrl+shift+v", function() {
                        return e.builderDocument.actions.pasteNode(e.selected.node)
                    }), this.keybinds.add("delete", function() {
                        return e.builderDocument.actions.removeNode(e.selected.node)
                    }), this.keybinds.add("ctrl+z", function() {
                        return e.undoManager.undo()
                    }), this.keybinds.add("ctrl+y", function() {
                        return e.undoManager.redo()
                    }), this.keybinds.addWithPreventDefault("arrow_up", function() {
                        return e.builderDocument.actions.moveSelected("up")
                    }), this.keybinds.addWithPreventDefault("arrow_down", function() {
                        return e.builderDocument.actions.moveSelected("down")
                    })
                }, e.prototype.listenForHover = function() {
                    var e = this;
                    this.builderDocument.on("mousemove", function(n) {
                        e.zone.run(function() {
                            if (!e.dragging) {
                                var t = e.builderDocument.elementFromPoint(n.pageX, n.pageY - e.builderDocument.getScrollTop());
                                if (t && t !== e.hover.node) {
                                    if (e.hover.previous = e.hover.node, e.selected.node && e.selected.node == t) return e.contextBoxes.hideBox("hover");
                                    e.hover.node = t, e.hover.element = e.elements.match(e.hover.node, "hover", !0), e.dragging || e.repositionBox("hover")
                                }
                            }
                        })
                    })
                }, e.prototype.listenForClick = function() {
                    var e = this;
                    this.builderDocument.get().addEventListener("click", function(n) {
                        e.zone.run(function() {
                            var t = n.target;
                            if (e.handleLinkClick(n), e.handleFormSubmitButtonClick(n), e.builderDocument.focus(), e.selected.node == t) return !0;
                            re.a.nodeIsEditable(t) || (e.contextMenu.close(), e.inlineTextEditor.close(), e.linkEditor.close(), e.selected.selectNode(t))
                        })
                    }, !0)
                }, e.prototype.listenForDoubleClick = function(e) {
                    var n = this;
                    e.on("double_tap", function(e) {
                        n.zone.run(function() {
                            var t = n.elements.match(e.target);
                            re.a.nodeIsEditable(e.target) || t.canModify.indexOf("text") > -1 && t.showWysiwyg && (n.hideBox("selected"), n.inlineTextEditor.open(e.target))
                        })
                    })
                }, e.prototype.handleLinkClick = function(e) {
                    var n = e.target;
                    if (n.matches("a, a *")) {
                        e.preventDefault(), e.stopPropagation(), "a" !== n.tagName.toLowerCase() && (n = n.closest("a"));
                        var t = n.href ? n.href.replace(this.activeProject.getBaseUrl(), "") : "";
                        if (0 !== t.indexOf("#") && !(t.indexOf("//") > -1)) {
                            var l = t.replace(".html", "");
                            this.activeProject.setActivePage(this.activeProject.getPage(l))
                        }
                    }
                }, e.prototype.handleFormSubmitButtonClick = function(e) {
                    e.target.matches("button[type=submit], button[type=submit] *") && (e.preventDefault(), e.stopPropagation())
                }, e.prototype.repositionBox = function(e) {
                    this.contextBoxes.repositionBox(e, this[e].node, this[e].element)
                }, e.prototype.hideBox = function(e) {
                    this.contextBoxes.hideBox(e)
                }, e.prototype.getElementDisplayName = function(e, n) {
                    return this.elements.getDisplayName(e, n)
                }, e.prototype.setWidth = function(e) {
                    this.activeWidth = e
                }, e
            }(),
            fe = function() {
                function e() {}
                return e.generic = function(e) {
                    return {
                        undo: e.undo,
                        redo: e.redo
                    }
                }, e.domChanges = function(e) {
                    return {
                        undo: function() {
                            for (; e.node.hasChildNodes();) e.node.removeChild(e.node.firstChild);
                            for (var n = e.oldNode.cloneNode(!0); n.hasChildNodes();) e.node.appendChild(n.firstChild)
                        },
                        redo: function() {
                            for (; e.node.hasChildNodes();) e.node.removeChild(e.node.firstChild);
                            for (var n = e.newNode.cloneNode(!0); n.hasChildNodes();) e.node.appendChild(n.firstChild)
                        }
                    }
                }, e
            }(),
            me = function() {
                function e(e, n) {
                    this.name = e, this.params = n;
                    var t = fe[e](n);
                    this.undo = t.undo.bind(this), this.redo = t.redo.bind(this)
                }
                return e.prototype.undo = function() {}, e.prototype.redo = function() {}, e
            }(),
            ge = function() {
                function e() {
                    this.commands = [], this.pointer = -1, this.executedCommand = new l.EventEmitter
                }
                return e.prototype.canUndo = function() {
                    return -1 !== this.pointer
                }, e.prototype.canRedo = function() {
                    return this.pointer < this.commands.length - 1
                }, e.prototype.undo = function() {
                    var e = this.commands[this.pointer];
                    e && (e.undo(), this.pointer -= 1, this.executedCommand.emit("undo"))
                }, e.prototype.redo = function() {
                    var e = this.commands[this.pointer + 1];
                    e && (e.redo(), this.pointer += 1, this.executedCommand.emit("redo"))
                }, e.prototype.add = function(e, n) {
                    this.commands.length > 100 && this.commands.splice(this.commands.length - 1, 1);
                    var t = new me(e, n);
                    return this.commands.push(t), this.pointer = this.commands.length - 1, t
                }, e.prototype.wrapDomChanges = function(e, n, t) {
                    if (void 0 === t && (t = {}), e) {
                        var l = t.before || e.cloneNode(!0);
                        n && n();
                        var o = t.after || e.cloneNode(!0);
                        this.add("domChanges", {
                            oldNode: l,
                            newNode: o,
                            node: e
                        })
                    }
                }, e
            }(),
            be = t("T1w8"),
            ve = t("eoFs"),
            ye = this && this.__extends || function() {
                var e = Object.setPrototypeOf || {
                    __proto__: []
                }
                instanceof Array && function(e, n) {
                    e.__proto__ = n
                } || function(e, n) {
                    for (var t in n) n.hasOwnProperty(t) && (e[t] = n[t])
                };
                return function(n, t) {
                    function l() {
                        this.constructor = n
                    }
                    e(n, t), n.prototype = null === t ? Object.create(t) : (l.prototype = t.prototype, new l)
                }
            }(),
            xe = function(e) {
                function n(n, t) {
                    var l = e.call(this) || this;
                    return l.elements = n, l.contextBoxes = t, l.changed = new ve.a(null), l
                }
                return ye(n, e), n.prototype.isLayout = function() {
                    return this.elements.isLayout(this.node)
                }, n.prototype.selectParent = function() {
                    this.selectNode(this.node.parentNode)
                }, n.prototype.canSelectParent = function() {
                    if (!this.node) return !1;
                    var e = this.node.parentNode;
                    return e && "body" !== e.nodeName.toLowerCase()
                }, n.prototype.selectFirstChild = function() {
                    this.selectNode(this.node.firstChild)
                }, n.prototype.canSelectChild = function() {
                    return !!this.node && this.node.firstChild
                }, n.prototype.getStyle = function(e) {
                    return this.node ? window.getComputedStyle(this.node)[e] : null
                }, n.prototype.canModify = function(e) {
                    return this.elements.canModify(e, this.element)
                }, n.prototype.selectNode = function(e) {
                    if (e && e.nodeType === Node.ELEMENT_NODE && this.node !== e) {
                        "html" === e.nodeName.toLowerCase() && (e = e.firstChild), this.previous = this.node, e && this.node !== e && (this.node = e), this.element = this.elements.match(this.node, "select", !0), this.parent = this.node.parentNode, this.contextBoxes.repositionBox("selected", this.node, this.element), this.locked = this.node.className.indexOf("locked") > -1, this.isImage = "img" === this.node.nodeName.toLowerCase();
                        var n = this.node;
                        for (this.path = []; n && n.nodeType === Node.ELEMENT_NODE && "body" !== n.nodeName.toLowerCase();) this.path.unshift({
                            node: n,
                            name: this.elements.getDisplayName(this.elements.match(n), n)
                        }), n = n.parentNode;
                        this.changed.next(this)
                    }
                }, n
            }(ce),
            we = t("/UzT"),
            _e = function() {
                function e(e, n, t) {
                    this.actions = e, this.settings = n, this.contextBoxes = t, this.contentChanged = new _.a, this.loaded = new _.a, this.framework = "bootstrap-4", this.actions.setChangedSubject(this.contentChanged)
                }
                return e.prototype.init = function(e) {
                    this.document = e, this.loaded.next(), this.loaded.complete()
                }, e.prototype.getInnerHtml = function() {
                    return this.document.documentElement.innerHTML
                }, e.prototype.getOuterHtml = function() {
                    return this.document.documentElement.outerHTML
                }, e.prototype.get = function() {
                    return this.document
                }, e.prototype.getBody = function() {
                    return this.document.body
                }, e.prototype.focus = function() {
                    this.getBody().focus()
                }, e.prototype.getScrollTop = function() {
                    return this.document.documentElement.scrollTop || this.getBody().scrollTop
                }, e.prototype.scrollIntoView = function(e) {
                    e && e.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                        inline: "center"
                    })
                }, e.prototype.elementFromPoint = function(e, n) {
                    return this.document.elementFromPoint(e, n)
                }, e.prototype.reloadCustomElementsCss = function() {
                    var e = this.find("#custom-elements-css"),
                        n = e.getAttribute("href").split("?")[0] + "?=" + we.a.randomString(8);
                    e.setAttribute("href", n)
                }, e.prototype.createElement = function(e) {
                    return this.document.createElement(e)
                }, e.prototype.setInnerHtml = function(e) {
                    this.document.documentElement.innerHTML = e.trim()
                }, e.prototype.on = function(e, n, t) {
                    this.document.addEventListener(e, n, t)
                }, e.prototype.find = function(e) {
                    return this.document.querySelector(e)
                }, e.prototype.findAll = function(e) {
                    return this.document.querySelectorAll(e)
                }, e.prototype.execCommand = function(e, n) {
                    return this.document.execCommand(e, null, n)
                }, e.prototype.queryCommandState = function(e) {
                    return this.document.queryCommandState(e)
                }, e.prototype.setHtml = function(e, n) {
                    void 0 === n && (n = "builder"), this.update({
                        html: e,
                        source: n
                    })
                }, e.prototype.update = function(e) {
                    return e = Object.assign({}, {
                        template: this.template,
                        framework: this.framework,
                        source: "builderDocument"
                    }, e), this.template = e.template || this.template, this.framework = e.framework || this.framework, this.contextBoxes.hideBoxes(), this.setInnerHtml(this.transformHtml(e.html, this.template, this.framework)), this.addIframeCss(), this.contentChanged.next(e.source), new Promise(function(e) {
                        setTimeout(function() {
                            return e()
                        }, 200)
                    })
                }, e.prototype.transformHtml = function(e, n, t) {
                    var l = new E.a;
                    return l.setBaseUrl(this.baseUrl), l.generate(e, n, t).getInnerHtml()
                }, e.prototype.reload = function(e) {
                    return void 0 === e && (e = "builder"), this.update({
                        html: this.getInnerHtml(),
                        source: e
                    })
                }, e.prototype.getMetaTagValue = function(e) {
                    var n = this.document.querySelector("meta[name=" + e + "]");
                    return n && n.getAttribute("content")
                }, e.prototype.setMetaTagValue = function(e, n) {
                    var t = this.document.querySelector("meta[name=" + e + "]");
                    t || (t = this.document.createElement("meta"), this.document.head.appendChild(t)), t.setAttribute("name", e), t.setAttribute("content", n)
                }, e.prototype.getTitleValue = function() {
                    var e = this.document.querySelector("title");
                    return e && e.innerText
                }, e.prototype.setTitleValue = function(e) {
                    var n = this.document.querySelector("title");
                    n || (n = this.document.createElement("title"), this.document.head.appendChild(n)), n.innerText = e
                }, e.prototype.setTemplate = function(e) {
                    this.template = e
                }, e.prototype.setFramework = function(e) {
                    this.framework = e
                }, e.prototype.addIframeCss = function() {
                    var e = this.settings.getAssetUrl() + "css/iframe.css",
                        n = re.a.createLink(e, "preview-css");
                    this.document.head.appendChild(n)
                }, e.prototype.setBaseUrl = function(e) {
                    this.baseUrl = e
                }, e
            }(),
            ke = function() {
                function e(e) {
                    this.zone = e
                }
                return e.prototype.getName = function() {
                    return this.element && this.element.name
                }, e.prototype.reposition = function(e, n) {
                    this.component.renderer.setStyle(this.component.el.nativeElement, "top", e - 20 + "px"), this.component.renderer.setStyle(this.component.el.nativeElement, "left", n + 21 + "px")
                }, e.prototype.show = function(e) {
                    var n = this;
                    this.zone.run(function() {
                        return n.element = e
                    }), this.component.renderer.removeClass(this.component.el.nativeElement, "hidden")
                }, e.prototype.hide = function() {
                    this.component.renderer.addClass(this.component.el.nativeElement, "hidden")
                }, e.prototype.setComponent = function(e) {
                    this.component = e
                }, e
            }(),
            Ce = function() {
                function e(e) {
                    this.elements = e, this.categories = ["components", "layout", "media", "typography", "buttons", "forms"]
                }
                return e.prototype.ngOnInit = function() {}, e.prototype.getElementsForCategory = function(e) {
                    return this.elements.getAll().filter(function(n) {
                        return n.category === e
                    })
                }, e
            }(),
            Ee = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nelements-panel{display:block;background: rgba(255,255,255,0.5);border: 1px solid rgba(255,255,255,0.5);padding:15px;min-width:280px;}elements-panel .mat-expansion-panel .mat-expansion-panel-body{margin:0}elements-panel .elements-grid>.element{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;padding:15px;border-bottom:1px solid #e0e0e0;cursor:move}elements-panel .elements-grid>.element:hover{background-color:#fafafa}elements-panel .elements-grid>.element>svg-icon{display:block;width:26px;height:26px;color:rgba(0,0,0,.54)}elements-panel .elements-grid>.element>.name{text-transform:uppercase;font-size:1.1rem;margin-left:8px}"]
                ],
                data: {}
            });

        function Re(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 4, "div", [
                ["class", "element element-drag-handle"]
            ], [
                [1, "data-name", 0]
            ], null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 1, "svg-icon", [], null, null, null, ne.b, ne.a)), l["\u0275did"](2, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](3, 0, null, null, 1, "div", [
                ["class", "name"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](4, null, ["", ""]))], function(e, n) {
                e(n, 2, 0, n.context.$implicit.icon)
            }, function(e, n) {
                e(n, 0, 0, n.context.$implicit.name), e(n, 4, 0, n.context.$implicit.name)
            })
        }

        function Se(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 2, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 6, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 2, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"]
            ], null, null, null, null, null)), l["\u0275did"](8, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](9, null, ["", ""])), (e()(), l["\u0275eld"](10, 0, null, 1, 2, "div", [
                ["class", "elements-grid"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Re)), l["\u0275did"](12, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0, n.component.getElementsForCategory(n.context.$implicit))
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight))), e(n, 9, 0, n.context.$implicit)
            })
        }

        function Te(e) {
            return l["\u0275vid"](2, [(e()(), l["\u0275eld"](0, 0, null, null, 6, "section", [
                ["class", "categories"],
                ["dragElements", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 1064960, null, 1, de, [he, ge, be.a, l.NgZone, xe, _e, R, l.Renderer2, ke], null, null), l["\u0275qud"](603979776, 1, {
                dragElements: 1
            }), (e()(), l["\u0275eld"](3, 0, null, null, 3, "mat-accordion", [
                ["class", "mat-accordion"]
            ], null, null, null, null, null)), l["\u0275did"](4, 16384, null, 0, oe.a, [], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Se)), l["\u0275did"](6, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                e(n, 6, 0, n.component.categories)
            }, null)
        }
        var Pe = t("0nO6"),
            Ie = t("ZYB1"),
            De = t("kkSj"),
            Oe = t("Lpd/"),
            Me = t("j5BN"),
            Ne = function() {
                function e(e, n, t, l) {
                    this.livePreview = e, this.undoManager = n, this.selectedElement = t, this.renderer = l, this.customAttributes = {}, this.position = "none", this.classes = [], this.visibilityClasses = []
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selectedElement.changed.subscribe(function() {
                        e.onElementSelected()
                    })
                }, e.prototype.onElementSelected = function() {
                    var e = this;
                    if (this.customAttributes = {}, this.classes = [], this.visibilityClasses = [], this.callElementOnAssign(this.selectedElement), this.selectedElement.node) {
                        for (var n = 0; n < this.selectedElement.node.classList.length; n++) {
                            var t = this.selectedElement.node.classList[n],
                                l = this.selectedElement.element.hiddenClasses;
                            l && l.indexOf(t) > -1 || this.classes.push(t)
                        }
                        for (this.id = this.selectedElement.node.id, ["pull-left", "pull-right", "center-block"].forEach(function(n) {
                                e.position = e.selectedElement.node.className.indexOf(n) > -1 ? n : "none"
                            }), n = 0; n < this.selectedElement.node.classList.length; n++)["hidden-xs", "hidden-sm", "hidden-md", "hidden-lg"].indexOf(t = this.selectedElement.node.classList[n]) > -1 && this.visibilityClasses.push(t)
                    }
                }, e.prototype.changeElPosition = function(e) {
                    this.removeClass(["pull-left", "pull-right", "center-block"]), name && "none" !== name && this.addClass([e]), this.livePreview.repositionBox("selected")
                }, e.prototype.changeElId = function(e) {
                    this.selectedElement.node.id = e
                }, e.prototype.changeVisibility = function(e) {
                    var n = "hidden-" + e,
                        t = this.visibilityClasses.indexOf(n);
                    t > -1 ? (this.renderer.removeClass(this.selectedElement.node, n), this.visibilityClasses.splice(t, 1)) : (this.renderer.addClass(this.selectedElement.node, n), this.visibilityClasses.push(n)), this.livePreview.repositionBox("selected")
                }, e.prototype.removeClass = function(e, n) {
                    var t = this;
                    void 0 === n && (n = !0), e.forEach(function(e) {
                        t.classes.splice(t.classes.indexOf(e), 1), t.renderer.removeClass(t.selectedElement.node, e)
                    }), n && this.undoManager.add("generic", {
                        undo: function() {
                            t.addClass(e, !1)
                        },
                        redo: function() {
                            t.removeClass(e, !1)
                        }
                    }), this.livePreview.repositionBox("selected")
                }, e.prototype.addClass = function(e, n) {
                    var t = this;
                    void 0 === n && (n = !0), (1 !== e.length || e[0].length) && (e.forEach(function(e) {
                        e && e.length && -1 === t.classes.indexOf(e) && t.classes.push(e), t.renderer.addClass(t.selectedElement.node, e)
                    }), n && this.undoManager.add("generic", {
                        undo: function() {
                            t.removeClass(e, !1)
                        },
                        redo: function() {
                            t.addClass(e, !1)
                        }
                    }), this.livePreview.repositionBox("selected"))
                }, e.prototype.callElementOnChange = function(e, n) {
                    var t = this.customAttributes[e].value;
                    this.customAttributes[e].value = n, this.makeUndoCommand(this.customAttributes[e].onChange, t, n), this.customAttributes[e].onChange ? this.customAttributes[e].onChange(this.livePreview, n) : this.defaultOnChange(this.customAttributes[e]), this.livePreview.repositionBox("selected")
                }, e.prototype.shouldClassBeHidden = function(e) {
                    return e.indexOf("hidden-") > -1 || e.indexOf("col-") > -1
                }, e.prototype.makeUndoCommand = function(e, n, t) {
                    var l = this;
                    this.undoManager.add("generic", {
                        undo: function() {
                            e(l.livePreview, n)
                        },
                        redo: function() {
                            e(l.livePreview, t)
                        }
                    })
                }, e.prototype.callElementOnAssign = function(e) {
                    for (var n in e.element.attributes) this.customAttributes[n] = Object.assign({}, e.element.attributes[n]), this.customAttributes[n].onAssign ? this.customAttributes[n].onAssign(this.livePreview) : this.defaultOnAssign(this.customAttributes[n])
                }, e.prototype.getElAttributeKeys = function(e) {
                    return Object.keys(e)
                }, e.prototype.defaultOnAssign = function(e) {
                    for (var n = null, t = e.list.length - 1; t >= 0; t--)
                        if (n = e.list[t], this.selectedElement.node.className.indexOf(e.list[t].value) > -1) return e.value = e.list[t];
                    return e.value = n
                }, e.prototype.defaultOnChange = function(e) {
                    for (var n = this, t = e.list.length - 1; t >= 0; t--) this.renderer.removeClass(this.selectedElement.node, e.list[t].value);
                    this.renderer.addClass(this.selectedElement.node, e.value), setTimeout(function() {
                        return n.livePreview.repositionBox("selected")
                    }, 300)
                }, e
            }(),
            Be = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nattributes-panel{display:block}attributes-panel .visibility-controls{text-align:center;margin:0 0 15px}attributes-panel .visibility-controls>button{padding:12px 15px;background-color:#f5f5f5;border:1px solid #e0e0e0;color:inherit;border-radius:3px;margin:0 3px}attributes-panel .visibility-controls>button.active{background-color:#fff}attributes-panel .input-container,attributes-panel .mat-chip-list-wrapper{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;color:rgba(0,0,0,.87)}attributes-panel .input-container label,attributes-panel .mat-chip-list-wrapper label{-webkit-box-flex:0;-ms-flex:0 0 80px;flex:0 0 80px;width:80px;font-weight:700;font-size:1.2rem;text-transform:capitalize;text-align:left}attributes-panel .input-container input,attributes-panel .input-container select,attributes-panel .mat-chip-list-wrapper input,attributes-panel .mat-chip-list-wrapper select{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;max-width:168px;font-size:1.3rem}attributes-panel .mat-chip-list-wrapper>.mat-chip{margin-top:7px!important;color:inherit;padding:4px 12px}attributes-panel .mat-chip-list-wrapper>.mat-chip:last-of-type{margin-bottom:5px}attributes-panel .mat-chip-list-wrapper>.mat-chip>.mat-chip-remove{color:inherit}"]
                ],
                data: {}
            });

        function je(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit.value), e(n, 2, 0, n.context.$implicit.value)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function Le(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 7, "select", [], [
                [8, "id", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 1).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 1).onTouched() && o), "ngModelChange" === n && (o = !1 !== i.callElementOnChange(e.parent.context.$implicit, t) && o), o
            }, null, null)), l["\u0275did"](1, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](3, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](5, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, je)), l["\u0275did"](7, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 3, 0, n.parent.context.$implicit, t.customAttributes[n.parent.context.$implicit].value), e(n, 7, 0, t.customAttributes[n.parent.context.$implicit].list)
            }, function(e, n) {
                e(n, 0, 0, n.parent.context.$implicit, l["\u0275nov"](n, 5).ngClassUntouched, l["\u0275nov"](n, 5).ngClassTouched, l["\u0275nov"](n, 5).ngClassPristine, l["\u0275nov"](n, 5).ngClassDirty, l["\u0275nov"](n, 5).ngClassValid, l["\u0275nov"](n, 5).ngClassInvalid, l["\u0275nov"](n, 5).ngClassPending)
            })
        }

        function Ae(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 5, "input", [], [
                [8, "id", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 1)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 1).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 1)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 1)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== i.callElementOnChange(e.parent.context.$implicit, t) && o), o
            }, null, null)), l["\u0275did"](1, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](3, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](5, 16384, null, 0, Pe.o, [Pe.n], null, null)], function(e, n) {
                e(n, 3, 0, n.parent.context.$implicit, n.component.customAttributes[n.parent.context.$implicit].value)
            }, function(e, n) {
                e(n, 0, 0, n.parent.context.$implicit, l["\u0275nov"](n, 5).ngClassUntouched, l["\u0275nov"](n, 5).ngClassTouched, l["\u0275nov"](n, 5).ngClassPristine, l["\u0275nov"](n, 5).ngClassDirty, l["\u0275nov"](n, 5).ngClassValid, l["\u0275nov"](n, 5).ngClassInvalid, l["\u0275nov"](n, 5).ngClassPending)
            })
        }

        function Fe(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 7, null, null, null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 6, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 1, "label", [], [
                [8, "htmlFor", 0]
            ], null, null, null, null)), (e()(), l["\u0275ted"](3, null, ["", ""])), (e()(), l["\u0275and"](16777216, null, null, 1, null, Le)), l["\u0275did"](5, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Ae)), l["\u0275did"](7, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 5, 0, !t.customAttributes[n.context.$implicit].text), e(n, 7, 0, t.customAttributes[n.context.$implicit].text)
            }, function(e, n) {
                e(n, 2, 0, n.context.$implicit), e(n, 3, 0, n.context.$implicit)
            })
        }

        function Ve(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 5, "mat-chip", [
                ["class", "mat-chip"],
                ["role", "option"]
            ], [
                [1, "tabindex", 0],
                [2, "mat-chip-selected", null],
                [1, "disabled", 0],
                [1, "aria-disabled", 0],
                [1, "aria-selected", 0]
            ], [
                [null, "remove"],
                [null, "click"],
                [null, "keydown"],
                [null, "focus"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 1)._handleClick(t) && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 1)._handleKeydown(t) && o), "focus" === n && (o = 0 != (l["\u0275nov"](e, 1)._hasFocus = !0) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 1)._blur() && o), "remove" === n && (o = !1 !== i.removeClass([e.parent.context.$implicit]) && o), o
            }, null, null)), l["\u0275did"](1, 147456, [
                [1, 4]
            ], 0, Ie.a, [l.ElementRef], {
                removable: [0, "removable"]
            }, {
                onRemove: "remove"
            }), (e()(), l["\u0275ted"](2, null, [" ", " "])), (e()(), l["\u0275eld"](3, 0, null, null, 2, "svg-icon", [
                ["class", "mat-chip-remove"],
                ["matChipRemove", ""],
                ["name", "cancel"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 5)._handleClick() && o), o
            }, ne.b, ne.a)), l["\u0275did"](4, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), l["\u0275did"](5, 16384, null, 0, Ie.d, [Ie.a], null, null)], function(e, n) {
                e(n, 1, 0, !0), e(n, 4, 0, "cancel")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled ? null : -1, l["\u0275nov"](n, 1).selected, l["\u0275nov"](n, 1).disabled || null, l["\u0275nov"](n, 1).disabled.toString(), l["\u0275nov"](n, 1).ariaSelected), e(n, 2, 0, n.parent.context.$implicit)
            })
        }

        function He(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, null, null, null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Ve)), l["\u0275did"](2, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 2, 0, !n.component.shouldClassBeHidden(n.context.$implicit))
            }, null)
        }

        function ze(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 16, "div", [
                ["class", "visibility-controls"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Hide on mobile"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 2).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 2)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 2)._handleTouchend() && o), "click" === n && (o = !1 !== i.changeVisibility("xs") && o), o
            }, null, null)), l["\u0275did"](2, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](3, 0, null, null, 1, "svg-icon", [
                ["name", "phone-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](4, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](5, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Hide on tablet"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 6).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 6)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 6)._handleTouchend() && o), "click" === n && (o = !1 !== i.changeVisibility("sm") && o), o
            }, null, null)), l["\u0275did"](6, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 1, "svg-icon", [
                ["name", "tablet-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](8, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](9, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Hide on laptop"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 10).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 10)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 10)._handleTouchend() && o), "click" === n && (o = !1 !== i.changeVisibility("md") && o), o
            }, null, null)), l["\u0275did"](10, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](11, 0, null, null, 1, "svg-icon", [
                ["name", "laptop-chromebook"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](12, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](13, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Hide on desktop"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 14).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 14)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 14)._handleTouchend() && o), "click" === n && (o = !1 !== i.changeVisibility("lg") && o), o
            }, null, null)), l["\u0275did"](14, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](15, 0, null, null, 1, "svg-icon", [
                ["name", "desktop-windows"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](16, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](17, 0, null, null, 50, "div", [
                ["class", "inputs"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Fe)), l["\u0275did"](19, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](20, 0, null, null, 25, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](21, 0, null, null, 2, "label", [
                ["for", "position"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](22, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Position"])), (e()(), l["\u0275eld"](24, 0, null, null, 21, "select", [
                ["id", "position"],
                ["name", "position"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 25).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 25).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.position = t) && o), "ngModelChange" === n && (o = !1 !== i.changeElPosition(t) && o), o
            }, null, null)), l["\u0275did"](25, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](27, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](29, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](30, 0, null, null, 3, "option", [
                ["value", "none"]
            ], null, null, null, null, null)), l["\u0275did"](31, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](32, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["None"])), (e()(), l["\u0275eld"](34, 0, null, null, 3, "option", [
                ["value", "pull-left"]
            ], null, null, null, null, null)), l["\u0275did"](35, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](36, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["Left"])), (e()(), l["\u0275eld"](38, 0, null, null, 3, "option", [
                ["value", "pull-right"]
            ], null, null, null, null, null)), l["\u0275did"](39, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](40, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["Right"])), (e()(), l["\u0275eld"](42, 0, null, null, 3, "option", [
                ["value", "center-block"]
            ], null, null, null, null, null)), l["\u0275did"](43, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](44, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["Center"])), (e()(), l["\u0275eld"](46, 0, null, null, 9, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](47, 0, null, null, 2, "label", [
                ["for", "id"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](48, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["ID"])), (e()(), l["\u0275eld"](50, 0, null, null, 5, "input", [
                ["id", "id"],
                ["name", "id"],
                ["type", "text"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 51)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 51).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 51)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 51)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.id = t) && o), "ngModelChange" === n && (o = !1 !== i.changeElId(t) && o), o
            }, null, null)), l["\u0275did"](51, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](53, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](55, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](56, 0, null, null, 11, "mat-chip-list", [
                ["class", "input-container mat-chip-list"]
            ], [
                [1, "tabindex", 0],
                [1, "aria-describedby", 0],
                [1, "aria-required", 0],
                [1, "aria-disabled", 0],
                [1, "aria-invalid", 0],
                [1, "aria-multiselectable", 0],
                [1, "role", 0],
                [2, "mat-chip-list-disabled", null],
                [2, "mat-chip-list-invalid", null],
                [2, "mat-chip-list-required", null],
                [1, "aria-orientation", 0]
            ], [
                [null, "focus"],
                [null, "blur"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 58).focus() && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 58)._blur() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 58)._keydown(t) && o), o
            }, De.b, De.a)), l["\u0275prd"](6144, null, Oe.b, null, [Ie.c]), l["\u0275did"](58, 1556480, [
                ["chipList", 4]
            ], 1, Ie.c, [l.ElementRef, l.ChangeDetectorRef, [2, ee.c],
                [2, Pe.q],
                [2, Pe.j], Me.d, [8, null]
            ], {
                selectable: [0, "selectable"]
            }, null), l["\u0275qud"](603979776, 1, {
                chips: 1
            }), (e()(), l["\u0275eld"](60, 0, null, 0, 2, "label", [
                ["for", "class"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](61, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Class"])), (e()(), l["\u0275eld"](63, 0, null, 0, 2, "input", [
                ["class", "mat-chip-input mat-input-element"],
                ["id", "class"],
                ["placeholder", "+New Class..."],
                ["trans-placeholder", ""]
            ], null, [
                [null, "matChipInputTokenEnd"],
                [null, "keydown"],
                [null, "blur"],
                [null, "focus"],
                [null, "input"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "keydown" === n && (o = !1 !== l["\u0275nov"](e, 65)._keydown(t) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 65)._blur() && o), "focus" === n && (o = !1 !== l["\u0275nov"](e, 65)._focus() && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 65)._onInput() && o), "matChipInputTokenEnd" === n && (i.addClass([t.value]), o = !1 !== (t.input.value = "") && o), o
            }, null, null)), l["\u0275did"](64, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](65, 16384, null, 0, Ie.b, [l.ElementRef], {
                chipList: [0, "chipList"],
                addOnBlur: [1, "addOnBlur"],
                placeholder: [2, "placeholder"]
            }, {
                chipEnd: "matChipInputTokenEnd"
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, He)), l["\u0275did"](67, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 2, 0, "Hide on mobile"), e(n, 4, 0, "phone-android"), e(n, 6, 0, "Hide on tablet"), e(n, 8, 0, "tablet-android"), e(n, 10, 0, "Hide on laptop"), e(n, 12, 0, "laptop-chromebook"), e(n, 14, 0, "Hide on desktop"), e(n, 16, 0, "desktop-windows"), e(n, 19, 0, t.getElAttributeKeys(t.customAttributes)), e(n, 27, 0, "position", t.position), e(n, 31, 0, "none"), e(n, 32, 0, "none"), e(n, 35, 0, "pull-left"), e(n, 36, 0, "pull-left"), e(n, 39, 0, "pull-right"), e(n, 40, 0, "pull-right"), e(n, 43, 0, "center-block"), e(n, 44, 0, "center-block"), e(n, 53, 0, "id", t.id), e(n, 58, 0, !1), e(n, 65, 0, l["\u0275nov"](n, 58), !0, "+New Class..."), e(n, 67, 0, t.classes)
            }, function(e, n) {
                var t = n.component;
                e(n, 1, 0, t.visibilityClasses.indexOf("hidden-xs") > -1), e(n, 5, 0, t.visibilityClasses.indexOf("hidden-sm") > -1), e(n, 9, 0, t.visibilityClasses.indexOf("hidden-md") > -1), e(n, 13, 0, t.visibilityClasses.indexOf("hidden-lg") > -1), e(n, 24, 0, l["\u0275nov"](n, 29).ngClassUntouched, l["\u0275nov"](n, 29).ngClassTouched, l["\u0275nov"](n, 29).ngClassPristine, l["\u0275nov"](n, 29).ngClassDirty, l["\u0275nov"](n, 29).ngClassValid, l["\u0275nov"](n, 29).ngClassInvalid, l["\u0275nov"](n, 29).ngClassPending), e(n, 50, 0, l["\u0275nov"](n, 55).ngClassUntouched, l["\u0275nov"](n, 55).ngClassTouched, l["\u0275nov"](n, 55).ngClassPristine, l["\u0275nov"](n, 55).ngClassDirty, l["\u0275nov"](n, 55).ngClassValid, l["\u0275nov"](n, 55).ngClassInvalid, l["\u0275nov"](n, 55).ngClassPending), e(n, 56, 1, [l["\u0275nov"](n, 58)._tabIndex, l["\u0275nov"](n, 58)._ariaDescribedby || null, l["\u0275nov"](n, 58).required.toString(), l["\u0275nov"](n, 58).disabled.toString(), l["\u0275nov"](n, 58).errorState, l["\u0275nov"](n, 58).multiple, l["\u0275nov"](n, 58).role, l["\u0275nov"](n, 58).disabled, l["\u0275nov"](n, 58).errorState, l["\u0275nov"](n, 58).required, l["\u0275nov"](n, 58).ariaOrientation])
            })
        }
        var qe = ["linear-gradient(to right, #959595 0%, #0D0D0D 46%, #010101 50%, #0A0A0A 53%, #4E4E4E 76%, #383838 87%, #1b1b1b 100%)", "linear-gradient(to right, #FF0000 0%, #FFFF00 50%, #ff0000 100%)", "linear-gradient(to right, #f6f8f9 0%, #E5EBEE 50%, #D7DEE3 51%, #f5f7f9 100%)", "linear-gradient(to right, #008080 0%, #FFFFFF 25%, #05C1FF 50%, #FFFFFF 75%, #005757 100%)", "linear-gradient(to right, #ff0000 0%, #000000 100%)", "linear-gradient(to bottom, #93cede 0%,#75bdd1 41%, #49a5bf 100%)", "linear-gradient(to right, #f8ffe8 0%, #E3F5AB 33%, #b7df2d 100%)", "linear-gradient(to right, #b8e1fc 0%, #A9D2F3 10%, #90BAE4 25%, #90BCEA 37%, #90BFF0 50%, #6BA8E5 51%, #A2DAF5 83%, #bdf3fd 100%)", "linear-gradient(to right, #f0b7a1 0%, #8C3310 50%, #752201 51%, #bf6e4e 100%)", "linear-gradient(to right, #ff0000 0%, #FFFF00 25%, #05C1FF 50%, #FFFF00 75%, #ff0000 100%)", "linear-gradient(to right, #ffb76b 0%, #FFA73D 50%, #FF7C00 51%, #ff7f04 100%)", "linear-gradient(to right, #ffff00 0%, #05C1FF 50%, #ffff00 100%)", "linear-gradient(to bottom, #febf01 0%,#febf01 100%)", "linear-gradient(to bottom, #fcfff4 0%,#e9e9ce 100%)", "linear-gradient(to bottom, #49c0f0 0%,#2cafe3 100%)", "linear-gradient(to bottom, #cc0000 0%,#cc0000 100%)", "linear-gradient(to bottom, #73880a 0%,#73880a 100%)", "linear-gradient(to bottom, #627d4d 0%,#1f3b08 100%)", "linear-gradient(to bottom, #b8c6df 0%,#6d88b7 100%)", "linear-gradient(to bottom, #9dd53a 0%,#a1d54f 50%,#80c217 51%,#7cbc0a 100%)", "linear-gradient(to bottom, #b8c6df 0%,#6d88b7 100%)", "linear-gradient(to bottom, #ff3019 0%,#cf0404 100%)", "linear-gradient(to bottom, #e570e7 0%,#c85ec7 47%,#a849a3 100%)", "linear-gradient(to bottom, #ffffff 0%,#f3f3f3 50%,#ededed 51%,#ffffff 100%)"],
            Ue = function() {
                function e() {
                    this.gradients = qe.slice(), this.selected = new l.EventEmitter, this.closed = new l.EventEmitter
                }
                return e.prototype.emitSelectedEvent = function(e) {
                    this.selected.emit(e)
                }, e.prototype.emitClosedEvent = function() {
                    this.closed.emit()
                }, e
            }(),
            We = t("CA4r"),
            $e = function() {
                function e(e, n, t, o, i) {
                    this.livePreview = e, this.modal = n, this.settings = t, this.activeProject = o, this.builderActions = i, this.textures = new Array(28), this.backgroundRepeat = "no-repeat", this.backgroundPosition = "top left", this.selected = new l.EventEmitter, this.closed = new l.EventEmitter
                }
                return e.prototype.emitSelectedEvent = function(e) {
                    this.selected.emit(e)
                }, e.prototype.emitClosedEvent = function() {
                    this.closed.emit()
                }, e.prototype.ngOnInit = function() {
                    this.backgroundRepeat = this.livePreview.selected.getStyle("backgroundRepeat"), this.backgroundPosition = this.livePreview.selected.getStyle("backgroundPosition")
                }, e.prototype.getTextureUrl = function(e) {
                    return this.settings.getAssetUrl() + "images/textures/" + e + ".png"
                }, e.prototype.applyStyle = function(e, n) {
                    this[e] = n, this.builderActions.applyStyle(this.livePreview.selected.node, e, n)
                }, e.prototype.uploadImage = function() {
                    var e = this,
                        n = {
                            uri: "uploads/images",
                            httpParams: {
                                path: this.activeProject.getBaseUrl(!0) + "images"
                            }
                        };
                    this.modal.open(We.a, n).afterClosed().subscribe(function(n) {
                        e.emitSelectedEvent(n)
                    })
                }, e
            }(),
            Xe = function() {
                function e(e, n, t, l, o) {
                    this.selectedElement = e, this.panel = n, this.renderer = t, this.builderActions = l, this.colorPicker = o, this.styles = {
                        backgroundImage: "",
                        backgroundColor: ""
                    }
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selectedElement.changed.subscribe(function() {
                        e.styles.backgroundImage = e.selectedElement.getStyle("backgroundImage"), e.styles.backgroundColor = e.selectedElement.getStyle("backgroundColor"), e.setBackgroundButtonColor()
                    })
                }, e.prototype.openGradientPanel = function() {
                    var e = this;
                    this.panel.open(Ue, this.gradientButton).selected.subscribe(function(n) {
                        e.setBackgroundButtonColor(), e.applyBackgroundStyle("backgroundImage", n)
                    })
                }, e.prototype.openColorpickerPanel = function() {
                    var e = this;
                    this.colorPicker.open(this.gradientButton, {
                        position: "right"
                    }).selected.subscribe(function(n) {
                        e.setBackgroundButtonColor(), e.applyBackgroundStyle("backgroundColor", n, !1)
                    })
                }, e.prototype.openBackgroundPanel = function() {
                    var e = this;
                    this.panel.open($e, this.gradientButton).selected.subscribe(function(n) {
                        e.applyBackgroundStyle("backgroundImage", "url(" + n + ")")
                    })
                }, e.prototype.setBackgroundButtonColor = function() {
                    "rgba(0, 0, 0, 0)" !== this.styles.backgroundColor && this.renderer.setStyle(this.backgroundButton.nativeElement, "backgroundColor", this.styles.backgroundColor)
                }, e.prototype.applyBackgroundStyle = function(e, n, t) {
                    void 0 === t && (t = !0), this.styles[e] = n, this.builderActions.applyStyle(this.selectedElement.node, e, this.styles[e], t)
                }, e
            }(),
            Ge = t("CZgk"),
            Ze = function() {
                function e(e) {
                    this.overlay = e
                }
                return e.prototype.open = function(e, n, t) {
                    var l = this;
                    void 0 === t && (t = {}), t = Object.assign({}, this.getDefaultConfig(), t), this.close();
                    var o = this.overlay.position().connectedTo(n, {
                        originX: "end",
                        originY: "center"
                    }, {
                        overlayX: "start",
                        overlayY: "center"
                    }).withFallbackPosition({
                        originX: "end",
                        originY: "center"
                    }, {
                        overlayX: "start",
                        overlayY: "top"
                    }).withOffsetX(35);
                    return this.overlayRef = this.overlay.create({
                        positionStrategy: o,
                        hasBackdrop: !0
                    }), this.overlayRef.backdropClick().subscribe(function() {
                        return l.close()
                    }), this.componentRef = this.overlayRef.attach(new Ge.d(e)), this.componentRef.instance.closed.subscribe(function() {
                        l.close()
                    }), this.componentRef.instance.selected.subscribe(function() {
                        t.closeOnSelected && l.close()
                    }), this.componentRef.instance
                }, e.prototype.close = function() {
                    this.overlayRef && this.overlayRef.dispose(), this.componentRef && (this.componentRef.instance.closed && this.componentRef.instance.closed.observers.forEach(function(e) {
                        e.unsubscribe()
                    }), this.componentRef.instance.selected && this.componentRef.instance.selected.observers.forEach(function(e) {
                        e.unsubscribe()
                    }))
                }, e.prototype.getDefaultConfig = function() {
                    return {
                        closeOnSelected: !0
                    }
                }, e
            }(),
            Ye = function() {
                function e(e, n, t, l) {
                    this.undoManager = e, this.selected = n, this.elements = t, this.contextBoxes = l, this.contentChanged = new _.a
                }
                return e.prototype.applyStyle = function(e, n, t, l) {
                    var o = this;
                    void 0 === l && (l = !0), l ? this.undoManager.wrapDomChanges(e, function() {
                        e.style[n] = t, o.contextBoxes.repositionBox("selected", e), o.contentChanged.next("builderDocument")
                    }) : (e.style[n] = t, this.contextBoxes.repositionBox("selected", e), this.contentChanged.next("builderDocument"))
                }, e.prototype.cloneNode = function(e) {
                    var n = this,
                        t = e.cloneNode(!0);
                    return this.undoManager.wrapDomChanges(e.parentNode, function() {
                        e.parentNode.insertBefore(t, e.nextElementSibling), n.contentChanged.next("nodeAdded")
                    }), t
                }, e.prototype.removeNode = function(e) {
                    var n = this;
                    if (e) return this.undoManager.wrapDomChanges(e.parentNode, function() {
                        n.selected.node === e && n.selected.selectParent(), e.parentNode.removeChild(e), n.contentChanged.next("nodeRemoved")
                    }), this.contextBoxes.hideBoxes(), e
                }, e.prototype.copyNode = function(e) {
                    e && "BODY" != e.nodeName && (this.copiedNode = e.cloneNode(!0))
                }, e.prototype.pasteNode = function(e, n) {
                    var t = this;
                    n || (n = this.copiedNode), e && n && (this.undoManager.wrapDomChanges(e.parentNode, function() {
                        "BODY" == e.nodeName ? e.appendChild(n) : e.parentNode.insertBefore(n, e.nextSibling), t.contextBoxes.hideBox("selected")
                    }), this.contentChanged.next("nodeAdded"))
                }, e.prototype.cutNode = function(e) {
                    e && "BODY" != e.nodeName && (this.copyNode(e), this.removeNode(e))
                }, e.prototype.duplicateNode = function(e) {
                    var n = e.cloneNode(!0);
                    this.pasteNode(this.selected.node, n)
                }, e.prototype.setChangedSubject = function(e) {
                    this.contentChanged = e
                }, e.prototype.moveSelected = function(e) {
                    if (this.selected.node) {
                        if ("down" == e) {
                            var n = this.selected.node.nextElementSibling;
                            n ? this.elements.canInsert(n, this.selected.element) ? n.insertBefore(this.selected.node, n.firstChild) : n.parentNode.insertBefore(this.selected.node, n.nextElementSibling) : this.elements.canInsert(t = this.selected.node.parentNode.parentNode, this.selected.element) && t.parentNode.insertBefore(this.selected.node, t.nextElementSibling)
                        } else if ("up" == e) {
                            var t, l = this.selected.node.previousElementSibling;
                            l ? this.elements.canInsert(l, this.selected.element) ? l.appendChild(this.selected.node) : l.parentNode.insertBefore(this.selected.node, l) : this.elements.canInsert(t = this.selected.node.parentNode.parentNode, this.selected.element) && t.insertBefore(this.selected.node, this.selected.node.parentNode)
                        }
                        this.contextBoxes.repositionBox("selected", this.selected.node)
                    }
                }, e
            }(),
            Ke = t("Pog7"),
            Qe = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nbackground-panel{display:block}background-panel>.buttons{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}background-panel>.buttons>button{-webkit-box-flex:0;-ms-flex:0 0 31%;flex:0 0 31%;width:31%;height:70px;background-color:#fff;border-radius:2px;border:2px solid #e0e0e0}background-panel>.buttons>button:hover{background-color:#fafafa}background-panel>.buttons>button>svg-icon{margin:0 auto;width:30px;height:30px}background-panel>.buttons>button>.name{display:block;text-align:center;margin-top:5px;font-size:1.3rem}"]
                ],
                data: {}
            });

        function Je(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                gradientButton: 0
            }), l["\u0275qud"](402653184, 2, {
                backgroundButton: 0
            }), (e()(), l["\u0275eld"](2, 0, null, null, 18, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, [
                [2, 0],
                ["backgroundButton", 1]
            ], null, 5, "button", [
                ["class", "no-style"],
                ["type", "button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openColorpickerPanel() && l), l
            }, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 1, "svg-icon", [
                ["name", "format-color-fill"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](5, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](6, 0, null, null, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](7, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Background"])), (e()(), l["\u0275eld"](9, 0, null, null, 5, "button", [
                ["class", "no-style"],
                ["type", "button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openBackgroundPanel() && l), l
            }, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 1, "svg-icon", [
                ["name", "image"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](11, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](12, 0, null, null, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Image"])), (e()(), l["\u0275eld"](15, 0, [
                [1, 0],
                ["gradientButton", 1]
            ], null, 5, "button", [
                ["class", "no-style"],
                ["type", "button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openGradientPanel() && l), l
            }, null, null)), (e()(), l["\u0275eld"](16, 0, null, null, 1, "svg-icon", [
                ["name", "gradient"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](17, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](19, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Gradient"]))], function(e, n) {
                e(n, 5, 0, "format-color-fill"), e(n, 11, 0, "image"), e(n, 17, 0, "gradient")
            }, null)
        }
        var en = t("kMVV"),
            nn = t("RyBE"),
            tn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [".mat-slider{display:inline-block;position:relative;box-sizing:border-box;padding:8px;outline:0;vertical-align:middle}.mat-slider-wrapper{position:absolute}.mat-slider-track-wrapper{position:absolute;top:0;left:0;overflow:hidden}.mat-slider-track-fill{position:absolute;transform-origin:0 0;transition:transform .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-track-background{position:absolute;transform-origin:100% 100%;transition:transform .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-ticks-container{position:absolute;left:0;top:0;overflow:hidden}.mat-slider-ticks{background-repeat:repeat;background-clip:content-box;box-sizing:border-box;opacity:0;transition:opacity .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-thumb-container{position:absolute;z-index:1;transition:transform .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-focus-ring{position:absolute;width:30px;height:30px;border-radius:50%;transform:scale(0);opacity:0;transition:transform .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1),opacity .4s cubic-bezier(.25,.8,.25,1)}.cdk-keyboard-focused .mat-slider-focus-ring,.cdk-program-focused .mat-slider-focus-ring{transform:scale(1);opacity:1}.mat-slider:not(.mat-slider-disabled) .mat-slider-thumb,.mat-slider:not(.mat-slider-disabled) .mat-slider-thumb-label{cursor:-webkit-grab;cursor:grab}.mat-slider-sliding:not(.mat-slider-disabled) .mat-slider-thumb,.mat-slider-sliding:not(.mat-slider-disabled) .mat-slider-thumb-label,.mat-slider:not(.mat-slider-disabled) .mat-slider-thumb-label:active,.mat-slider:not(.mat-slider-disabled) .mat-slider-thumb:active{cursor:-webkit-grabbing;cursor:grabbing}.mat-slider-thumb{position:absolute;right:-10px;bottom:-10px;box-sizing:border-box;width:20px;height:20px;border:3px solid transparent;border-radius:50%;transform:scale(.7);transition:transform .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1),border-color .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-thumb-label{display:none;align-items:center;justify-content:center;position:absolute;width:28px;height:28px;border-radius:50%;transition:transform .4s cubic-bezier(.25,.8,.25,1),border-radius .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-thumb-label-text{z-index:1;opacity:0;transition:opacity .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-sliding .mat-slider-thumb-container,.mat-slider-sliding .mat-slider-track-background,.mat-slider-sliding .mat-slider-track-fill{transition-duration:0s}.mat-slider-has-ticks .mat-slider-wrapper::after{content:'';position:absolute;border-width:0;border-style:solid;opacity:0;transition:opacity .4s cubic-bezier(.25,.8,.25,1)}.mat-slider-has-ticks.cdk-focused:not(.mat-slider-hide-last-tick) .mat-slider-wrapper::after,.mat-slider-has-ticks:hover:not(.mat-slider-hide-last-tick) .mat-slider-wrapper::after{opacity:1}.mat-slider-has-ticks.cdk-focused:not(.mat-slider-disabled) .mat-slider-ticks,.mat-slider-has-ticks:hover:not(.mat-slider-disabled) .mat-slider-ticks{opacity:1}.mat-slider-thumb-label-showing .mat-slider-focus-ring{transform:scale(0);opacity:0}.mat-slider-thumb-label-showing .mat-slider-thumb-label{display:flex}.mat-slider-axis-inverted .mat-slider-track-fill{transform-origin:100% 100%}.mat-slider-axis-inverted .mat-slider-track-background{transform-origin:0 0}.mat-slider:not(.mat-slider-disabled).cdk-focused.mat-slider-thumb-label-showing .mat-slider-thumb{transform:scale(0)}.mat-slider:not(.mat-slider-disabled).cdk-focused .mat-slider-thumb-label{border-radius:50% 50% 0}.mat-slider:not(.mat-slider-disabled).cdk-focused .mat-slider-thumb-label-text{opacity:1}.mat-slider:not(.mat-slider-disabled).cdk-mouse-focused .mat-slider-thumb,.mat-slider:not(.mat-slider-disabled).cdk-program-focused .mat-slider-thumb,.mat-slider:not(.mat-slider-disabled).cdk-touch-focused .mat-slider-thumb{border-width:2px;transform:scale(1)}.mat-slider-disabled .mat-slider-focus-ring{transform:scale(0);opacity:0}.mat-slider-disabled .mat-slider-thumb{border-width:4px;transform:scale(.5)}.mat-slider-disabled .mat-slider-thumb-label{display:none}.mat-slider-horizontal{height:48px;min-width:128px}.mat-slider-horizontal .mat-slider-wrapper{height:2px;top:23px;left:8px;right:8px}.mat-slider-horizontal .mat-slider-wrapper::after{height:2px;border-left-width:2px;right:0;top:0}.mat-slider-horizontal .mat-slider-track-wrapper{height:2px;width:100%}.mat-slider-horizontal .mat-slider-track-fill{height:2px;width:100%;transform:scaleX(0)}.mat-slider-horizontal .mat-slider-track-background{height:2px;width:100%;transform:scaleX(1)}.mat-slider-horizontal .mat-slider-ticks-container{height:2px;width:100%}@media screen and (-ms-high-contrast:active){.mat-slider-horizontal .mat-slider-ticks-container{height:0;outline:solid 2px;top:1px}}.mat-slider-horizontal .mat-slider-ticks{height:2px;width:100%}.mat-slider-horizontal .mat-slider-thumb-container{width:100%;height:0;top:50%}.mat-slider-horizontal .mat-slider-focus-ring{top:-15px;right:-15px}.mat-slider-horizontal .mat-slider-thumb-label{right:-14px;top:-40px;transform:translateY(26px) scale(.01) rotate(45deg)}.mat-slider-horizontal .mat-slider-thumb-label-text{transform:rotate(-45deg)}.mat-slider-horizontal.cdk-focused .mat-slider-thumb-label{transform:rotate(45deg)}.mat-slider-vertical{width:48px;min-height:128px}.mat-slider-vertical .mat-slider-wrapper{width:2px;top:8px;bottom:8px;left:23px}.mat-slider-vertical .mat-slider-wrapper::after{width:2px;border-top-width:2px;bottom:0;left:0}.mat-slider-vertical .mat-slider-track-wrapper{height:100%;width:2px}.mat-slider-vertical .mat-slider-track-fill{height:100%;width:2px;transform:scaleY(0)}.mat-slider-vertical .mat-slider-track-background{height:100%;width:2px;transform:scaleY(1)}.mat-slider-vertical .mat-slider-ticks-container{width:2px;height:100%}@media screen and (-ms-high-contrast:active){.mat-slider-vertical .mat-slider-ticks-container{width:0;outline:solid 2px;left:1px}}.mat-slider-vertical .mat-slider-focus-ring{bottom:-15px;left:-15px}.mat-slider-vertical .mat-slider-ticks{width:2px;height:100%}.mat-slider-vertical .mat-slider-thumb-container{height:100%;width:0;left:50%}.mat-slider-vertical .mat-slider-thumb{-webkit-backface-visibility:hidden;backface-visibility:hidden}.mat-slider-vertical .mat-slider-thumb-label{bottom:-14px;left:-40px;transform:translateX(26px) scale(.01) rotate(-45deg)}.mat-slider-vertical .mat-slider-thumb-label-text{transform:rotate(45deg)}.mat-slider-vertical.cdk-focused .mat-slider-thumb-label{transform:rotate(-45deg)}[dir=rtl] .mat-slider-wrapper::after{left:0;right:auto}[dir=rtl] .mat-slider-horizontal .mat-slider-track-fill{transform-origin:100% 100%}[dir=rtl] .mat-slider-horizontal .mat-slider-track-background{transform-origin:0 0}[dir=rtl] .mat-slider-horizontal.mat-slider-axis-inverted .mat-slider-track-fill{transform-origin:0 0}[dir=rtl] .mat-slider-horizontal.mat-slider-axis-inverted .mat-slider-track-background{transform-origin:100% 100%}"],
                data: {}
            });

        function ln(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](402653184, 1, {
                _sliderWrapper: 0
            }), (e()(), l["\u0275eld"](1, 0, [
                [1, 0],
                ["sliderWrapper", 1]
            ], null, 16, "div", [
                ["class", "mat-slider-wrapper"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 4, "div", [
                ["class", "mat-slider-track-wrapper"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 1, "div", [
                ["class", "mat-slider-track-background"]
            ], null, null, null, null, null)), l["\u0275did"](4, 278528, null, 0, g.NgStyle, [l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngStyle: [0, "ngStyle"]
            }, null), (e()(), l["\u0275eld"](5, 0, null, null, 1, "div", [
                ["class", "mat-slider-track-fill"]
            ], null, null, null, null, null)), l["\u0275did"](6, 278528, null, 0, g.NgStyle, [l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngStyle: [0, "ngStyle"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 3, "div", [
                ["class", "mat-slider-ticks-container"]
            ], null, null, null, null, null)), l["\u0275did"](8, 278528, null, 0, g.NgStyle, [l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngStyle: [0, "ngStyle"]
            }, null), (e()(), l["\u0275eld"](9, 0, null, null, 1, "div", [
                ["class", "mat-slider-ticks"]
            ], null, null, null, null, null)), l["\u0275did"](10, 278528, null, 0, g.NgStyle, [l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngStyle: [0, "ngStyle"]
            }, null), (e()(), l["\u0275eld"](11, 0, null, null, 6, "div", [
                ["class", "mat-slider-thumb-container"]
            ], null, null, null, null, null)), l["\u0275did"](12, 278528, null, 0, g.NgStyle, [l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngStyle: [0, "ngStyle"]
            }, null), (e()(), l["\u0275eld"](13, 0, null, null, 0, "div", [
                ["class", "mat-slider-focus-ring"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](14, 0, null, null, 0, "div", [
                ["class", "mat-slider-thumb"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](15, 0, null, null, 2, "div", [
                ["class", "mat-slider-thumb-label"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](16, 0, null, null, 1, "span", [
                ["class", "mat-slider-thumb-label-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](17, null, ["", ""]))], function(e, n) {
                var t = n.component;
                e(n, 4, 0, t._trackBackgroundStyles), e(n, 6, 0, t._trackFillStyles), e(n, 8, 0, t._ticksContainerStyles), e(n, 10, 0, t._ticksStyles), e(n, 12, 0, t._thumbContainerStyles)
            }, function(e, n) {
                e(n, 17, 0, n.component.displayValue)
            })
        }
        var on = function() {
                function e(e, n, t, l) {
                    this.selectedElement = e, this.colorPicker = n, this.renderer = t, this.builderActions = l, this.sliders = ["angle", "distance", "blur", "spread"], this.resetProps()
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selectedElement.changed.subscribe(function() {
                        e.stringToProps(e.selectedElement.getStyle("boxShadow" == e.props.type ? "boxShadow" : "textShadow")), e.setColorButtonColor()
                    })
                }, e.prototype.applyStyle = function(e, n, t) {
                    void 0 === t && (t = !0), this.props[e] = n, this.builderActions.applyStyle(this.selectedElement.node, this.props.type, this.propsToString(this.props), t), this.clearShadow("boxShadow" === this.props.type ? "textShadow" : "boxShadow")
                }, e.prototype.clearShadow = function(e) {
                    this.builderActions.applyStyle(this.selectedElement.node, e, "none", !1)
                }, e.prototype.openColorpickerPanel = function() {
                    var e = this;
                    this.colorPicker.open(this.colorButton, {
                        position: "right"
                    }).selected.subscribe(function(n) {
                        e.setColorButtonColor(), e.applyStyle("color", n)
                    })
                }, e.prototype.setColorButtonColor = function() {
                    "rgba(0, 0, 0, 0)" !== this.props.color && this.renderer.setStyle(this.colorButton.nativeElement, "backgroundColor", this.props.color)
                }, e.prototype.propsToString = function(e) {
                    var n = Math.round(e.blur),
                        t = Math.round(e.spread),
                        l = parseInt(e.angle) * (Math.PI / 180),
                        o = Math.round(e.distance * Math.cos(l)),
                        i = Math.round(e.distance * Math.sin(l)),
                        a = (e.inset && "boxShadow" == e.type ? "inset " : "") + o + "px " + i + "px " + n + "px ";
                    return "boxShadow" == e.type && (a += t + "px "), a + e.color
                }, e.prototype.stringToProps = function(e) {
                    if (!e || "none" == e) return this.resetProps();
                    var n = e.replace(/, /g, ",").split(" ").map(function(e) {
                        return e.indexOf("px") > -1 ? +e.replace("px", "") : e
                    });
                    4 == n.length ? (this.props.color = n[0], this.props.angle = n[1], this.props.distance = n[2], this.props.blur = n[3]) : 5 != n.length && 6 != n.length || (this.props.color = n[0], this.props.angle = n[1], this.props.distance = n[2], this.props.blur = n[3], this.props.spread = n[4])
                }, e.prototype.resetProps = function() {
                    this.props = {
                        type: "boxShadow",
                        inset: !1,
                        angle: 0,
                        distance: 5,
                        blur: 10,
                        color: "rgba(0, 0, 0, 0.5)",
                        spread: 0
                    }
                }, e
            }(),
            an = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nshadows-panel{display:block}shadows-panel .sliders>.slider-container>.title{color:rgba(0,0,0,.87);text-transform:capitalize}shadows-panel .sliders>.slider-container>.inner-container{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}shadows-panel .sliders>.slider-container>.inner-container>.mat-slider{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto}shadows-panel .sliders>.slider-container>.inner-container>.input-container{width:65px;height:25px;margin-left:10px;border-radius:3px;overflow:hidden}shadows-panel .sliders>.slider-container>.inner-container>.input-container>input{width:100%;height:100%;border:2px solid #e0e0e0}shadows-panel .types{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;margin-top:10px}shadows-panel .types>.color-button{background-color:#fff;border-radius:2px;height:38px;text-align:center;-webkit-box-flex:0;-ms-flex:0 0 22%;flex:0 0 22%}shadows-panel .types>.box-shadow{-webkit-box-flex:0;-ms-flex:0 0 44%;flex:0 0 44%}shadows-panel .types>.text-shadow{-webkit-box-flex:0;-ms-flex:0 0 30%;flex:0 0 30%}"]
                ],
                data: {}
            });

        function rn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 17, null, null, null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 1, "div", [
                ["class", "title"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](2, null, ["", ""])), (e()(), l["\u0275eld"](3, 0, null, null, 14, "div", [
                ["class", "inner-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 5, "mat-slider", [
                ["class", "mat-slider"],
                ["min", "1"],
                ["role", "slider"],
                ["step", "1"]
            ], [
                [8, "tabIndex", 0],
                [1, "aria-disabled", 0],
                [1, "aria-valuemax", 0],
                [1, "aria-valuemin", 0],
                [1, "aria-valuenow", 0],
                [1, "aria-orientation", 0],
                [2, "mat-slider-disabled", null],
                [2, "mat-slider-has-ticks", null],
                [2, "mat-slider-horizontal", null],
                [2, "mat-slider-axis-inverted", null],
                [2, "mat-slider-sliding", null],
                [2, "mat-slider-thumb-label-showing", null],
                [2, "mat-slider-vertical", null],
                [2, "mat-slider-min-value", null],
                [2, "mat-slider-hide-last-tick", null],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "input"],
                [null, "ngModelChange"],
                [null, "focus"],
                [null, "blur"],
                [null, "click"],
                [null, "keydown"],
                [null, "keyup"],
                [null, "mouseenter"],
                [null, "slide"],
                [null, "slideend"],
                [null, "slidestart"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 5)._onFocus() && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 5)._onBlur() && o), "click" === n && (o = !1 !== l["\u0275nov"](e, 5)._onClick(t) && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 5)._onKeydown(t) && o), "keyup" === n && (o = !1 !== l["\u0275nov"](e, 5)._onKeyup() && o), "mouseenter" === n && (o = !1 !== l["\u0275nov"](e, 5)._onMouseenter() && o), "slide" === n && (o = !1 !== l["\u0275nov"](e, 5)._onSlide(t) && o), "slideend" === n && (o = !1 !== l["\u0275nov"](e, 5)._onSlideEnd() && o), "slidestart" === n && (o = !1 !== l["\u0275nov"](e, 5)._onSlideStart(t) && o), "input" === n && (o = !1 !== i.applyStyle(e.parent.context.$implicit, t.value, !1) && o), "ngModelChange" === n && (o = !1 !== (i.props[e.parent.context.$implicit] = t) && o), o
            }, ln, tn)), l["\u0275did"](5, 245760, null, 0, en.a, [l.ElementRef, A.i, l.ChangeDetectorRef, [2, ee.c],
                [8, null]
            ], {
                max: [0, "max"],
                min: [1, "min"],
                step: [2, "step"]
            }, {
                input: "input"
            }), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [en.a]), l["\u0275did"](7, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](9, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](10, 0, null, null, 7, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](11, 0, null, null, 6, "input", [
                ["min", "1"],
                ["type", "number"]
            ], [
                [8, "max", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 12)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 12).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 12)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 12)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 13).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 13).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 13).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.props[e.parent.context.$implicit] = t) && o), o
            }, null, null)), l["\u0275did"](12, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](13, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](15, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](17, 16384, null, 0, Pe.o, [Pe.n], null, null)], function(e, n) {
                var t = n.component;
                e(n, 5, 0, "angle" == n.parent.context.$implicit ? 360 : 20, "1", "1"), e(n, 7, 0, t.props[n.parent.context.$implicit]), e(n, 15, 0, t.props[n.parent.context.$implicit])
            }, function(e, n) {
                e(n, 2, 0, n.parent.context.$implicit), e(n, 4, 1, [l["\u0275nov"](n, 5).tabIndex, l["\u0275nov"](n, 5).disabled, l["\u0275nov"](n, 5).max, l["\u0275nov"](n, 5).min, l["\u0275nov"](n, 5).value, l["\u0275nov"](n, 5).vertical ? "vertical" : "horizontal", l["\u0275nov"](n, 5).disabled, l["\u0275nov"](n, 5).tickInterval, !l["\u0275nov"](n, 5).vertical, l["\u0275nov"](n, 5)._invertAxis, l["\u0275nov"](n, 5)._isSliding, l["\u0275nov"](n, 5).thumbLabel, l["\u0275nov"](n, 5).vertical, l["\u0275nov"](n, 5)._isMinValue, l["\u0275nov"](n, 5).disabled || l["\u0275nov"](n, 5)._isMinValue && l["\u0275nov"](n, 5)._thumbGap && l["\u0275nov"](n, 5)._invertAxis, l["\u0275nov"](n, 9).ngClassUntouched, l["\u0275nov"](n, 9).ngClassTouched, l["\u0275nov"](n, 9).ngClassPristine, l["\u0275nov"](n, 9).ngClassDirty, l["\u0275nov"](n, 9).ngClassValid, l["\u0275nov"](n, 9).ngClassInvalid, l["\u0275nov"](n, 9).ngClassPending]), e(n, 11, 0, "angle" == n.parent.context.$implicit ? 360 : 20, l["\u0275nov"](n, 17).ngClassUntouched, l["\u0275nov"](n, 17).ngClassTouched, l["\u0275nov"](n, 17).ngClassPristine, l["\u0275nov"](n, 17).ngClassDirty, l["\u0275nov"](n, 17).ngClassValid, l["\u0275nov"](n, 17).ngClassInvalid, l["\u0275nov"](n, 17).ngClassPending)
            })
        }

        function un(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "div", [
                ["class", "slider-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, rn)), l["\u0275did"](2, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 2, 0, "spread" !== n.context.$implicit || "boxShadow" === n.component.props.type)
            }, null)
        }

        function sn(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                colorButton: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 2, "div", [
                ["class", "sliders"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, un)), l["\u0275did"](3, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](4, 0, null, null, 37, "div", [
                ["class", "types"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](5, 0, [
                [1, 0],
                ["colorButton", 1]
            ], null, 2, "button", [
                ["class", "no-style color-button"],
                ["trans", ""]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openColorpickerPanel() && l), l
            }, null, null)), l["\u0275did"](6, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Color"])), (e()(), l["\u0275eld"](8, 0, null, null, 16, "div", [
                ["class", "input-container box-shadow"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](9, 0, null, null, 15, "select", [
                ["id", "shadow-type"],
                ["name", "shadow-type"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 10).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 10).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.props.type = t) && o), "ngModelChange" === n && (o = !1 !== i.applyStyle("type", i.props.type) && o), o
            }, null, null)), l["\u0275did"](10, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](12, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](14, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](15, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "boxShadow"]
            ], null, null, null, null, null)), l["\u0275did"](16, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](17, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](18, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Box Shadow"])), (e()(), l["\u0275eld"](20, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "textShadow"]
            ], null, null, null, null, null)), l["\u0275did"](21, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](22, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](23, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Text Shadow"])), (e()(), l["\u0275eld"](25, 0, null, null, 16, "div", [
                ["class", "input-container text-shadow"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](26, 0, null, null, 15, "select", [
                ["id", "shadow-inset"],
                ["name", "shadow-inset"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 27).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 27).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.props.inset = t) && o), "ngModelChange" === n && (o = !1 !== i.applyStyle("inset", i.props.inset) && o), o
            }, null, null)), l["\u0275did"](27, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](29, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](31, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](32, 0, null, null, 4, "option", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](33, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](34, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](35, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Outter"])), (e()(), l["\u0275eld"](37, 0, null, null, 4, "option", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](38, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](39, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](40, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Inner"]))], function(e, n) {
                var t = n.component;
                e(n, 3, 0, t.sliders), e(n, 12, 0, "shadow-type", t.props.type), e(n, 16, 0, "boxShadow"), e(n, 17, 0, "boxShadow"), e(n, 21, 0, "textShadow"), e(n, 22, 0, "textShadow"), e(n, 29, 0, "shadow-inset", t.props.inset), e(n, 33, 0, !1), e(n, 34, 0, !1), e(n, 38, 0, !0), e(n, 39, 0, !0)
            }, function(e, n) {
                e(n, 9, 0, l["\u0275nov"](n, 14).ngClassUntouched, l["\u0275nov"](n, 14).ngClassTouched, l["\u0275nov"](n, 14).ngClassPristine, l["\u0275nov"](n, 14).ngClassDirty, l["\u0275nov"](n, 14).ngClassValid, l["\u0275nov"](n, 14).ngClassInvalid, l["\u0275nov"](n, 14).ngClassPending), e(n, 26, 0, l["\u0275nov"](n, 31).ngClassUntouched, l["\u0275nov"](n, 31).ngClassTouched, l["\u0275nov"](n, 31).ngClassPristine, l["\u0275nov"](n, 31).ngClassDirty, l["\u0275nov"](n, 31).ngClassValid, l["\u0275nov"](n, 31).ngClassInvalid, l["\u0275nov"](n, 31).ngClassPending)
            })
        }
        var dn = function() {
                function e() {
                    this.active = !1
                }
                return e.prototype.ngOnInit = function() {}, e
            }(),
            cn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ['\n\n\nside-control-border{display:block;pointer-events:none}side-control-border .side-control-border-inner{position:absolute;top:0;left:0;width:100%;height:100%}side-control-border .side-control-border-inner.active:after,side-control-border .side-control-border-inner.active:before{background-color:#009688}side-control-border .side-control-border-inner.enable-after:after,side-control-border .side-control-border-inner.enable-before:before,side-control-border .side-control-border-inner.enable:after,side-control-border .side-control-border-inner.enable:before{display:block}side-control-border .side-control-border-inner:after,side-control-border .side-control-border-inner:before{content:"";display:none;position:absolute;background-color:#d8d7d7}side-control-border .bottom-border:after,side-control-border .bottom-border:before,side-control-border .top-border:after,side-control-border .top-border:before{width:50%;height:2px}side-control-border .bottom-border:before,side-control-border .top-border:before{left:0}side-control-border .bottom-border:after,side-control-border .top-border:after{right:0}side-control-border .top-border:after,side-control-border .top-border:before{top:0}side-control-border .bottom-border:after,side-control-border .bottom-border:before{bottom:0}side-control-border .left-border:after,side-control-border .left-border:before,side-control-border .right-border:after,side-control-border .right-border:before{width:2px;height:50%}side-control-border .left-border:before,side-control-border .right-border:before{top:0}side-control-border .left-border:after,side-control-border .right-border:after{bottom:0}side-control-border .right-border:after,side-control-border .right-border:before{right:0}side-control-border .left-border:after,side-control-border .left-border:before{left:0}']
                ],
                data: {}
            });

        function pn(e) {
            return l["\u0275vid"](2, [(e()(), l["\u0275eld"](0, 0, null, null, 0, "span", [
                ["class", "side-control-border-inner top-border"]
            ], [
                [2, "active", null],
                [2, "enable", null],
                [2, "enable-before", null],
                [2, "enable-after", null]
            ], null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 0, "span", [
                ["class", "side-control-border-inner left-border"]
            ], [
                [2, "active", null],
                [2, "enable", null],
                [2, "enable-before", null],
                [2, "enable-after", null]
            ], null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 0, "span", [
                ["class", "side-control-border-inner bottom-border"]
            ], [
                [2, "active", null],
                [2, "enable", null],
                [2, "enable-before", null],
                [2, "enable-after", null]
            ], null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 0, "span", [
                ["class", "side-control-border-inner right-border"]
            ], [
                [2, "active", null],
                [2, "enable", null],
                [2, "enable-before", null],
                [2, "enable-after", null]
            ], null, null, null, null))], null, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t.active, "top" === t.type || "all" === t.type, "top-left" === t.type, "top-right" === t.type), e(n, 1, 0, t.active, "left" === t.type || "all" === t.type, "top-left" === t.type, "bottom-left" === t.type), e(n, 2, 0, t.active, "bottom" === t.type || "all" === t.type, "bottom-left" === t.type, "bottom-right" === t.type), e(n, 3, 0, t.active, "right" === t.type || "all" === t.type, "top-right" === t.type, "bottom-right" === t.type)
            })
        }
        var hn = function() {
                function e(e, n) {
                    this.selected = e, this.builderActions = n, this.sliderValue = 0, this.max = 100, this.type = "padding", this.availableSides = ["top", "right", "bottom", "left"], this.enabledSides = ["top", "right", "bottom", "left"], this.spacing = {
                        all: 0,
                        top: 0,
                        left: 0,
                        right: 0,
                        bottom: 0
                    }, this.resetSpacing()
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selected.changed.subscribe(function() {
                        e.setSelectedElementSpacingValues()
                    })
                }, e.prototype.toggleSide = function(e) {
                    "all" === e ? this.enabledSides = this.enabledSides.length > 0 ? [] : this.availableSides.slice() : this.isSideEnabled(e) ? this.enabledSides.splice(this.enabledSides.indexOf(e), 1) : this.enabledSides.push(e), this.applySpacing()
                }, e.prototype.isSideEnabled = function(e) {
                    return "all" === e ? 4 === this.enabledSides.length : this.enabledSides.indexOf(e) > -1
                }, e.prototype.applySpacing = function(e) {
                    this.maybeResetAllSpacingValue(), this.resetDisabledSideValues();
                    var n = this.generateSpacingCssValue();
                    this.builderActions.applyStyle(this.selected.node, this.type, n), this.sliderValue = e ? this.spacing[e] : 0
                }, e.prototype.maybeResetAllSpacingValue = function() {
                    var e = this;
                    this.availableSides.forEach(function(n) {
                        e.spacing[n] !== e.spacing.all && (e.spacing.all = 0)
                    })
                }, e.prototype.applySpacingToAllSides = function() {
                    var e = this;
                    this.enabledSides = this.availableSides.slice(), this.availableSides.forEach(function(n) {
                        e.spacing[n] = e.spacing.all
                    }), this.applySpacing("all")
                }, e.prototype.applySpacingForEnabledSides = function(e) {
                    var n = this;
                    this.resetSpacing(), this.enabledSides.forEach(function(t) {
                        n.spacing[t] = e, 4 === n.enabledSides.length && (n.spacing.all = e)
                    }), this.applySpacing()
                }, e.prototype.setSelectedElementSpacingValues = function() {
                    var e = this;
                    this.availableSides.forEach(function(n) {
                        e.spacing[n] = e.selected.getStyle(e.generateCssRuleName(n)).replace("px", "")
                    }), this.spacing.all = this.allSpacingValuesEqual() ? this.spacing.top : 0
                }, e.prototype.generateCssRuleName = function(e) {
                    return e = this.ucFirst(e), "borderWidth" === this.type ? "border" + e + "Width" : "borderRadius" === this.type ? this.generateBorderRadiusRuleName(e) : this.type + e
                }, e.prototype.generateBorderRadiusRuleName = function(e) {
                    switch (e = e.toLowerCase()) {
                        case "top":
                            return "borderTopLeftRadius";
                        case "left":
                            return "borderTopRightRadius";
                        case "bottom":
                            return "borderBottomLeftRadius";
                        case "right":
                            return "borderBottomRightRadius"
                    }
                }, e.prototype.generateSpacingCssValue = function() {
                    return "borderRadius" === this.type ? this.spacing.top + "px " + this.spacing.left + "px " + this.spacing.bottom + "px " + this.spacing.right + "px" : this.spacing.top + "px " + this.spacing.right + "px " + this.spacing.bottom + "px " + this.spacing.left + "px"
                }, e.prototype.resetDisabledSideValues = function() {
                    var e = this;
                    this.availableSides.forEach(function(n) {
                        e.isSideEnabled(n) || (e.spacing[n] = 0)
                    })
                }, e.prototype.allSpacingValuesEqual = function() {
                    var e = this;
                    return 4 === this.availableSides.filter(function(n) {
                        return e.spacing[n] === e.spacing.top
                    }).length
                }, e.prototype.resetSpacing = function() {
                    this.spacing = {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0,
                        all: 0
                    }
                }, e.prototype.ucFirst = function(e) {
                    return e.charAt(0).toUpperCase() + e.slice(1)
                }, e
            }(),
            fn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nspacing-panel{display:block}spacing-panel .side-controls{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;margin-top:5px}spacing-panel .side-controls>.side-control{width:25px;height:25px;border:1px solid #e0e0e0;background-color:#fafafa;margin-right:5px;position:relative}spacing-panel .side-controls>.side-control.all-control{border-color:#e0e0e0;margin-right:auto}spacing-panel .side-controls>.side-control.all-control.active{border-color:#eff1f2}spacing-panel .side-controls>.side-control.top-control{border-top-color:#e0e0e0}spacing-panel .side-controls>.side-control.top-control.active{border-top-color:#eff1f2}spacing-panel .side-controls>.side-control.right-control{border-right-color:#e0e0e0}spacing-panel .side-controls>.side-control.right-control.active{border-right-color:#eff1f2}spacing-panel .side-controls>.side-control.bottom-control{border-bottom-color:#e0e0e0}spacing-panel .side-controls>.side-control.bottom-control.active{border-bottom-color:#eff1f2}spacing-panel .side-controls>.side-control.left-control{border-left-color:#e0e0e0}spacing-panel .side-controls>.side-control.left-control.active{border-left-color:#eff1f2}spacing-panel .side-inputs{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;width:100%;height:115px}spacing-panel .side-inputs input{border:2px solid #e0e0e0;background-color:#fff;height:100%;text-align:center}spacing-panel .side-inputs>.all-input{-webkit-box-flex:0;-ms-flex:0 0 49%;flex:0 0 49%;width:49%}spacing-panel .side-inputs>.side-inputs-inner{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-flex:0;-ms-flex:0 0 49%;flex:0 0 49%;width:49%}spacing-panel .side-inputs>.side-inputs-inner.borderRadius>.input-container{width:48%;height:55px}spacing-panel .side-inputs>.side-inputs-inner.borderRadius>.input-container.left-input,spacing-panel .side-inputs>.side-inputs-inner.borderRadius>.input-container.top-input{margin-bottom:5px}spacing-panel .side-inputs>.side-inputs-inner>.input-container{height:36px}spacing-panel .side-inputs>.side-inputs-inner>.left-input,spacing-panel .side-inputs>.side-inputs-inner>.right-input{width:49%;margin-top:1.8px}spacing-panel .side-inputs>.side-inputs-inner>.bottom-input{margin-top:auto}spacing-panel .mat-slider{width:100%}"]
                ],
                data: {}
            });

        function mn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 15, "div", [
                ["class", "side-controls"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 2, "button", [
                ["class", "no-style side-control all-control"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleSide("all") && l), l
            }, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 1, "side-control-border", [
                ["type", "all"]
            ], null, null, null, pn, cn)), l["\u0275did"](3, 114688, null, 0, dn, [], {
                type: [0, "type"],
                active: [1, "active"]
            }, null), (e()(), l["\u0275eld"](4, 0, null, null, 2, "button", [
                ["class", "no-style side-control top-control"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleSide("top") && l), l
            }, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 1, "side-control-border", [], null, null, null, pn, cn)), l["\u0275did"](6, 114688, null, 0, dn, [], {
                type: [0, "type"],
                active: [1, "active"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 2, "button", [
                ["class", "no-style side-control right-control"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleSide("right") && l), l
            }, null, null)), (e()(), l["\u0275eld"](8, 0, null, null, 1, "side-control-border", [], null, null, null, pn, cn)), l["\u0275did"](9, 114688, null, 0, dn, [], {
                type: [0, "type"],
                active: [1, "active"]
            }, null), (e()(), l["\u0275eld"](10, 0, null, null, 2, "button", [
                ["class", "no-style side-control bottom-control"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleSide("bottom") && l), l
            }, null, null)), (e()(), l["\u0275eld"](11, 0, null, null, 1, "side-control-border", [], null, null, null, pn, cn)), l["\u0275did"](12, 114688, null, 0, dn, [], {
                type: [0, "type"],
                active: [1, "active"]
            }, null), (e()(), l["\u0275eld"](13, 0, null, null, 2, "button", [
                ["class", "no-style side-control left-control"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleSide("left") && l), l
            }, null, null)), (e()(), l["\u0275eld"](14, 0, null, null, 1, "side-control-border", [], null, null, null, pn, cn)), l["\u0275did"](15, 114688, null, 0, dn, [], {
                type: [0, "type"],
                active: [1, "active"]
            }, null), (e()(), l["\u0275eld"](16, 0, null, null, 2, "mat-slider", [
                ["class", "mat-slider"],
                ["min", "1"],
                ["role", "slider"],
                ["step", "1"]
            ], [
                [8, "tabIndex", 0],
                [1, "aria-disabled", 0],
                [1, "aria-valuemax", 0],
                [1, "aria-valuemin", 0],
                [1, "aria-valuenow", 0],
                [1, "aria-orientation", 0],
                [2, "mat-slider-disabled", null],
                [2, "mat-slider-has-ticks", null],
                [2, "mat-slider-horizontal", null],
                [2, "mat-slider-axis-inverted", null],
                [2, "mat-slider-sliding", null],
                [2, "mat-slider-thumb-label-showing", null],
                [2, "mat-slider-vertical", null],
                [2, "mat-slider-min-value", null],
                [2, "mat-slider-hide-last-tick", null]
            ], [
                [null, "input"],
                [null, "focus"],
                [null, "blur"],
                [null, "click"],
                [null, "keydown"],
                [null, "keyup"],
                [null, "mouseenter"],
                [null, "slide"],
                [null, "slideend"],
                [null, "slidestart"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 18)._onFocus() && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 18)._onBlur() && o), "click" === n && (o = !1 !== l["\u0275nov"](e, 18)._onClick(t) && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 18)._onKeydown(t) && o), "keyup" === n && (o = !1 !== l["\u0275nov"](e, 18)._onKeyup() && o), "mouseenter" === n && (o = !1 !== l["\u0275nov"](e, 18)._onMouseenter() && o), "slide" === n && (o = !1 !== l["\u0275nov"](e, 18)._onSlide(t) && o), "slideend" === n && (o = !1 !== l["\u0275nov"](e, 18)._onSlideEnd() && o), "slidestart" === n && (o = !1 !== l["\u0275nov"](e, 18)._onSlideStart(t) && o), "input" === n && (o = !1 !== i.applySpacingForEnabledSides(t.value) && o), o
            }, ln, tn)), l["\u0275prd"](5120, null, Pe.m, function(e) {
                return [e]
            }, [en.a]), l["\u0275did"](18, 245760, null, 0, en.a, [l.ElementRef, A.i, l.ChangeDetectorRef, [2, ee.c],
                [8, null]
            ], {
                disabled: [0, "disabled"],
                max: [1, "max"],
                min: [2, "min"],
                step: [3, "step"],
                value: [4, "value"]
            }, {
                input: "input"
            }), l["\u0275ncd"](null, 0), (e()(), l["\u0275eld"](20, 0, null, null, 42, "div", [
                ["class", "side-inputs"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](21, 0, null, null, 7, "div", [
                ["class", "input-container all-input"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](22, 0, null, null, 6, "input", [
                ["max", "999"],
                ["min", "1"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 23)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 23).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 23)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 23)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 24).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 24).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 24).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.spacing.all = t) && o), "ngModelChange" === n && (o = !1 !== i.applySpacingToAllSides() && o), o
            }, null, null)), l["\u0275did"](23, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](24, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](26, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](28, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](29, 0, null, null, 33, "div", [
                ["class", "side-inputs-inner"]
            ], null, null, null, null, null)), l["\u0275did"](30, 278528, null, 0, g.NgClass, [l.IterableDiffers, l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                klass: [0, "klass"],
                ngClass: [1, "ngClass"]
            }, null), (e()(), l["\u0275eld"](31, 0, null, null, 7, "div", [
                ["class", "input-container top-input"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](32, 0, null, null, 6, "input", [
                ["max", "999"],
                ["min", "1"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 33)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 33).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 33)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 33)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 34).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 34).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 34).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.spacing.top = t) && o), "ngModelChange" === n && (o = !1 !== i.applySpacing("top") && o), o
            }, null, null)), l["\u0275did"](33, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](34, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](36, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](38, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](39, 0, null, null, 7, "div", [
                ["class", "input-container left-input"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](40, 0, null, null, 6, "input", [
                ["max", "999"],
                ["min", "1"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 41)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 41).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 41)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 41)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 42).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 42).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 42).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.spacing.left = t) && o), "ngModelChange" === n && (o = !1 !== i.applySpacing("left") && o), o
            }, null, null)), l["\u0275did"](41, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](42, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](44, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](46, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](47, 0, null, null, 7, "div", [
                ["class", "input-container right-input"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](48, 0, null, null, 6, "input", [
                ["max", "999"],
                ["min", "1"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 49)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 49).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 49)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 49)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 50).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 50).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 50).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.spacing.right = t) && o), "ngModelChange" === n && (o = !1 !== i.applySpacing("right") && o), o
            }, null, null)), l["\u0275did"](49, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](50, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](52, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](54, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](55, 0, null, null, 7, "div", [
                ["class", "input-container bottom-input"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](56, 0, null, null, 6, "input", [
                ["max", "999"],
                ["min", "1"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 57)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 57).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 57)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 57)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 58).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 58).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 58).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.spacing.bottom = t) && o), "ngModelChange" === n && (o = !1 !== i.applySpacing("bottom") && o), o
            }, null, null)), l["\u0275did"](57, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](58, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](60, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](62, 16384, null, 0, Pe.o, [Pe.n], null, null)], function(e, n) {
                var t = n.component;
                e(n, 3, 0, "all", t.isSideEnabled("all")), e(n, 6, 0, "borderRadius" === t.type ? "top-left" : "top", t.isSideEnabled("top")), e(n, 9, 0, "borderRadius" === t.type ? "bottom-left" : "right", t.isSideEnabled("right")), e(n, 12, 0, "borderRadius" === t.type ? "top-right" : "bottom", t.isSideEnabled("bottom")), e(n, 15, 0, "borderRadius" === t.type ? "bottom-right" : "left", t.isSideEnabled("left")), e(n, 18, 0, !t.enabledSides.length, t.max, "1", "1", t.sliderValue), e(n, 26, 0, t.spacing.all), e(n, 30, 0, "side-inputs-inner", t.type), e(n, 36, 0, t.spacing.top), e(n, 44, 0, t.spacing.left), e(n, 52, 0, t.spacing.right), e(n, 60, 0, t.spacing.bottom)
            }, function(e, n) {
                e(n, 16, 1, [l["\u0275nov"](n, 18).tabIndex, l["\u0275nov"](n, 18).disabled, l["\u0275nov"](n, 18).max, l["\u0275nov"](n, 18).min, l["\u0275nov"](n, 18).value, l["\u0275nov"](n, 18).vertical ? "vertical" : "horizontal", l["\u0275nov"](n, 18).disabled, l["\u0275nov"](n, 18).tickInterval, !l["\u0275nov"](n, 18).vertical, l["\u0275nov"](n, 18)._invertAxis, l["\u0275nov"](n, 18)._isSliding, l["\u0275nov"](n, 18).thumbLabel, l["\u0275nov"](n, 18).vertical, l["\u0275nov"](n, 18)._isMinValue, l["\u0275nov"](n, 18).disabled || l["\u0275nov"](n, 18)._isMinValue && l["\u0275nov"](n, 18)._thumbGap && l["\u0275nov"](n, 18)._invertAxis]), e(n, 22, 0, l["\u0275nov"](n, 28).ngClassUntouched, l["\u0275nov"](n, 28).ngClassTouched, l["\u0275nov"](n, 28).ngClassPristine, l["\u0275nov"](n, 28).ngClassDirty, l["\u0275nov"](n, 28).ngClassValid, l["\u0275nov"](n, 28).ngClassInvalid, l["\u0275nov"](n, 28).ngClassPending), e(n, 32, 0, l["\u0275nov"](n, 38).ngClassUntouched, l["\u0275nov"](n, 38).ngClassTouched, l["\u0275nov"](n, 38).ngClassPristine, l["\u0275nov"](n, 38).ngClassDirty, l["\u0275nov"](n, 38).ngClassValid, l["\u0275nov"](n, 38).ngClassInvalid, l["\u0275nov"](n, 38).ngClassPending), e(n, 40, 0, l["\u0275nov"](n, 46).ngClassUntouched, l["\u0275nov"](n, 46).ngClassTouched, l["\u0275nov"](n, 46).ngClassPristine, l["\u0275nov"](n, 46).ngClassDirty, l["\u0275nov"](n, 46).ngClassValid, l["\u0275nov"](n, 46).ngClassInvalid, l["\u0275nov"](n, 46).ngClassPending), e(n, 48, 0, l["\u0275nov"](n, 54).ngClassUntouched, l["\u0275nov"](n, 54).ngClassTouched, l["\u0275nov"](n, 54).ngClassPristine, l["\u0275nov"](n, 54).ngClassDirty, l["\u0275nov"](n, 54).ngClassValid, l["\u0275nov"](n, 54).ngClassInvalid, l["\u0275nov"](n, 54).ngClassPending), e(n, 56, 0, l["\u0275nov"](n, 62).ngClassUntouched, l["\u0275nov"](n, 62).ngClassTouched, l["\u0275nov"](n, 62).ngClassPristine, l["\u0275nov"](n, 62).ngClassDirty, l["\u0275nov"](n, 62).ngClassValid, l["\u0275nov"](n, 62).ngClassInvalid, l["\u0275nov"](n, 62).ngClassPending)
            })
        }
        var gn = [{
                name: "Impact",
                css: "Impact, Charcoal, sans-serif"
            }, {
                name: "Comic Sans",
                css: '"Comic Sans MS", cursive, sans-serif'
            }, {
                name: "Arial Black",
                css: '"Arial Black", Gadget, sans-serif'
            }, {
                name: "Century Gothic",
                css: "Century Gothic, sans-serif"
            }, {
                name: "Courier New",
                css: '"Courier New", Courier, monospace'
            }, {
                name: "Lucida Sans",
                css: '"Lucida Sans Unicode", "Lucida Grande", sans-serif'
            }, {
                name: "Times New Roman",
                css: '"Times New Roman", Times, serif'
            }, {
                name: "Lucida Console",
                css: '"Lucida Console", Monaco, monospace'
            }, {
                name: "Andele Mono",
                css: '"Andele Mono", monospace, sans-serif'
            }, {
                name: "Verdana",
                css: "Verdana, Geneva, sans-serif"
            }, {
                name: "Helvetica Neue",
                css: '"Helvetica Neue", Helvetica, Arial, sans-serif'
            }],
            bn = [100, 200, 300, 400, 500, 600, 700, 800, 900],
            vn = t("GI3C"),
            yn = function() {
                function e(e, n, t) {
                    this.http = e, this.builderDocument = n, this.settings = t, this.loading = !1, this.originalFonts = [], this.filteredFonts = [], this.searchControl = new Pe.f, this.fontPage = 0, this.selected = new l.EventEmitter, this.closed = new l.EventEmitter
                }
                return e.prototype.ngOnInit = function() {
                    this.getAll(), this.bindToSearchQuery()
                }, e.prototype.emitSelectedEvent = function(e) {
                    this.selected.emit(e)
                }, e.prototype.emitClosedEvent = function() {
                    this.closed.emit()
                }, e.prototype.nextPage = function() {
                    this.filteredFonts.length > this.fontPage + 1 && (this.fontPage++, this.loadIntoDom())
                }, e.prototype.previousPage = function() {
                    this.fontPage - 1 > 0 && (this.fontPage--, this.loadIntoDom())
                }, e.prototype.applyFont = function(e) {
                    this.loadIntoDom([e], this.builderDocument.get().head), this.emitSelectedEvent(e)
                }, e.prototype.getAll = function() {
                    var e = this,
                        n = this.settings.get("builder.google_fonts_api_key");
                    this.http.get("https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=" + n).subscribe(function(n) {
                        e.originalFonts = e.createPaginator(n.items), e.filteredFonts = e.originalFonts.slice(), e.loadIntoDom()
                    })
                }, e.prototype.createPaginator = function(e) {
                    for (var n = []; e.length > 0;) n.push(e.splice(0, 15));
                    return n
                }, e.prototype.bindToSearchQuery = function() {
                    var e = this;
                    this.searchControl.valueChanges.pipe(Object(k.a)(100), Object(vn.a)()).subscribe(function(n) {
                        n || (e.filteredFonts = e.originalFonts);
                        var t = [];
                        e.originalFonts.forEach(function(e) {
                            e.forEach(function(e) {
                                e.family.toLowerCase().indexOf(n) > -1 && t.push(e)
                            })
                        }), e.filteredFonts = e.createPaginator(t)
                    })
                }, e.prototype.loadIntoDom = function(e, n) {
                    void 0 === e && (e = null), void 0 === n && (n = null);
                    var t = n || document.head;
                    this.loading = !0, e || (e = this.filteredFonts[this.fontPage].map(function(e) {
                        return e.family
                    })), n || (l = t.querySelector("#dynamic-fonts")) && l.remove();
                    var l, o = t.querySelector("#dynamic-fonts"),
                        i = e.join("|").replace(/ /g, "+");
                    o ? o.href += "|" + i : ((l = document.createElement("link")).rel = "stylesheet", l.href = "https://fonts.googleapis.com/css?family=" + i, l.id = "dynamic-fonts", t.appendChild(l)), this.loading = !1
                }, e
            }(),
            xn = function() {
                function e(e, n, t, l) {
                    this.selectedElement = e, this.panel = n, this.builderActions = t, this.colorPicker = l, this.styles = {}, this.baseFonts = gn.slice(), this.fontWeights = bn.slice()
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selectedElement.changed.subscribe(function() {
                        e.getSelectedElementTextStyles()
                    })
                }, e.prototype.applyTextStyle = function(e, n) {
                    void 0 === n && (n = !0), this.builderActions.applyStyle(this.selectedElement.node, e, this.styles[e], n)
                }, e.prototype.toggleTextStyle = function(e, n) {
                    this.textStyleIs(e, n) ? this.builderActions.applyStyle(this.selectedElement.node, e, "initial") : this.builderActions.applyStyle(this.selectedElement.node, e, n)
                }, e.prototype.textStyleIs = function(e, n) {
                    return this.selectedElement.getStyle(e).indexOf(n) > -1
                }, e.prototype.openColorpickerPanel = function(e) {
                    var n = this;
                    this.colorPicker.open(new l.ElementRef(e), {
                        position: "right"
                    }).selected.subscribe(function(e) {
                        n.styles.color = e, n.applyTextStyle("color", !1)
                    })
                }, e.prototype.openGoogleFontsPanel = function() {
                    var e = this;
                    this.panel.open(yn, this.googleFontsOrigin).selected.subscribe(function(n) {
                        e.builderActions.applyStyle(e.selectedElement.node, "fontFamily", n)
                    })
                }, e.prototype.getSelectedElementTextStyles = function() {
                    this.styles = {
                        color: this.selectedElement.getStyle("color"),
                        fontSize: this.selectedElement.getStyle("fontSize").replace("px", ""),
                        textAlign: this.selectedElement.getStyle("textAlign"),
                        fontStyle: this.selectedElement.getStyle("fontStyle"),
                        fontFamily: this.selectedElement.getStyle("fontFamily"),
                        lineHeight: this.selectedElement.getStyle("lineHeight"),
                        fontWeight: this.selectedElement.getStyle("fontWeight"),
                        textDecoration: this.selectedElement.getStyle("textDecoration")
                    }
                }, e
            }(),
            wn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ntext-style-panel{display:block}text-style-panel .font-styles,text-style-panel .text-decorations{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;margin:8px 0}text-style-panel .font-styles>.input-container,text-style-panel .text-decorations>.input-container{width:80px}text-style-panel .font-styles>.input-container>input,text-style-panel .font-styles>.input-container>select,text-style-panel .text-decorations>.input-container>input,text-style-panel .text-decorations>.input-container>select{height:35px}text-style-panel .font-styles button,text-style-panel .text-decorations button{-webkit-box-flex:0;-ms-flex:0 0 35px;flex:0 0 35px;width:35px;height:33px;font-weight:500;text-align:center;background-color:#fafafa;border:1px solid #e0e0e0;border-radius:2px;margin-right:4px}text-style-panel .font-styles button>svg-icon,text-style-panel .text-decorations button>svg-icon{margin:0 auto}text-style-panel .font-styles button.active,text-style-panel .text-decorations button.active{color:#009688}text-style-panel .font-styles button.italic,text-style-panel .text-decorations button.italic{font-style:italic}text-style-panel .font-styles button.overline,text-style-panel .text-decorations button.overline{text-decoration:overline}text-style-panel .font-styles button.strike,text-style-panel .text-decorations button.strike{text-decoration:line-through}text-style-panel .font-styles button.underline,text-style-panel .text-decorations button.underline{text-decoration:underline}text-style-panel .font-family-container{height:38px;display:-webkit-box;display:-ms-flexbox;display:flex}text-style-panel .font-family-container>.google-fonts-button{margin-left:10px;-webkit-box-flex:0;-ms-flex:0 0 50px;flex:0 0 50px;width:50px;height:36px;background-color:#fafafa;border:1px solid #e0e0e0;border-radius:2px}text-style-panel .font-family-container>.google-fonts-button>svg-icon{margin:0 auto}text-style-panel .text-color{width:100%;height:35px;background-color:#fafafa;cursor:pointer}"]
                ],
                data: {}
            });

        function _n(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit.css), e(n, 2, 0, n.context.$implicit.css)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function kn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit), e(n, 2, 0, n.context.$implicit)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit)
            })
        }

        function Cn(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                googleFontsOrigin: 0
            }), (e()(), l["\u0275eld"](1, 0, [
                [1, 0],
                ["googleFontsOrigin", 1]
            ], null, 18, "div", [
                ["class", "font-family-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 13, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 12, "select", [
                ["id", "font-family"],
                ["name", "font-family"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 4).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 4).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.styles.fontFamily = t) && o), "ngModelChange" === n && (o = !1 !== i.applyTextStyle("fontFamily") && o), o
            }, null, null)), l["\u0275did"](4, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](6, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](8, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](9, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", ""]
            ], null, null, null, null, null)), l["\u0275did"](10, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](11, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](12, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Font"])), (e()(), l["\u0275and"](16777216, null, null, 1, null, _n)), l["\u0275did"](15, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](16, 16777216, null, null, 3, "button", [
                ["class", "no-style google-fonts-button"],
                ["matTooltip", "Google fonts"],
                ["type", "button"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 17).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 17)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 17)._handleTouchend() && o), "click" === n && (o = !1 !== i.openGoogleFontsPanel() && o), o
            }, null, null)), l["\u0275did"](17, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 1, "svg-icon", [
                ["name", "google-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](19, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](20, 0, null, null, 18, "div", [
                ["class", "text-decorations"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](21, 0, null, null, 8, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](22, 0, null, null, 1, "button", [
                ["class", "no-style italic"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleTextStyle("fontStyle", "italic") && l), l
            }, null, null)), (e()(), l["\u0275ted"](-1, null, ["I"])), (e()(), l["\u0275eld"](24, 0, null, null, 1, "button", [
                ["class", "no-style underline"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleTextStyle("textDecoration", "underline") && l), l
            }, null, null)), (e()(), l["\u0275ted"](-1, null, ["U"])), (e()(), l["\u0275eld"](26, 0, null, null, 1, "button", [
                ["class", "no-style strike"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleTextStyle("textDecoration", "line-through") && l), l
            }, null, null)), (e()(), l["\u0275ted"](-1, null, ["S"])), (e()(), l["\u0275eld"](28, 0, null, null, 1, "button", [
                ["class", "no-style overline"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleTextStyle("textDecoration", "overline") && l), l
            }, null, null)), (e()(), l["\u0275ted"](-1, null, ["O"])), (e()(), l["\u0275eld"](30, 0, null, null, 8, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](31, 0, null, null, 7, "select", [
                ["id", "font-weight"],
                ["name", "font-weight"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 32).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 32).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.styles.fontWeight = t) && o), "ngModelChange" === n && (o = !1 !== i.applyTextStyle("fontWeight") && o), o
            }, null, null)), l["\u0275did"](32, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](34, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](36, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, kn)), l["\u0275did"](38, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](39, 0, null, null, 22, "div", [
                ["class", "font-styles"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](40, 0, null, null, 8, "div", [
                ["class", "input-container font-size"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](41, 16777216, null, null, 7, "input", [
                ["matTooltip", "font size"],
                ["max", "999"],
                ["min", "1"],
                ["name", "font-size"],
                ["type", "number"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"],
                [null, "change"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 42)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 42).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 42)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 42)._compositionEnd(t.target.value) && o), "change" === n && (o = !1 !== l["\u0275nov"](e, 43).onChange(t.target.value) && o), "input" === n && (o = !1 !== l["\u0275nov"](e, 43).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 43).onTouched() && o), "longpress" === n && (o = !1 !== l["\u0275nov"](e, 48).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 48)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 48)._handleTouchend() && o), "ngModelChange" === n && (o = !1 !== (i.styles.fontSize = t) && o), "ngModelChange" === n && (o = !1 !== i.applyTextStyle("fontSize") && o), o
            }, null, null)), l["\u0275did"](42, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](43, 16384, null, 0, Pe.y, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e, n) {
                return [e, n]
            }, [Pe.d, Pe.y]), l["\u0275did"](45, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](47, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](48, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](49, 0, null, null, 12, "div", [
                ["class", "text-align"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](50, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "align left"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 51).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 51)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 51)._handleTouchend() && o), "click" === n && (o = !1 !== i.toggleTextStyle("textAlign", "left") && o), o
            }, null, null)), l["\u0275did"](51, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](52, 0, null, null, 1, "svg-icon", [
                ["name", "format-align-left"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](53, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](54, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "align center"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 55).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 55)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 55)._handleTouchend() && o), "click" === n && (o = !1 !== i.toggleTextStyle("textAlign", "center") && o), o
            }, null, null)), l["\u0275did"](55, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](56, 0, null, null, 1, "svg-icon", [
                ["name", "format-align-center"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](57, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](58, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "align right"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 59).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 59)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 59)._handleTouchend() && o), "click" === n && (o = !1 !== i.toggleTextStyle("textAlign", "right") && o), o
            }, null, null)), l["\u0275did"](59, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](60, 0, null, null, 1, "svg-icon", [
                ["name", "format-align-right"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](61, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](62, 16777216, [
                ["origin", 1]
            ], null, 1, "div", [
                ["class", "text-color"],
                ["matTooltip", "text color"]
            ], [
                [4, "backgroundColor", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 63).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 63)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 63)._handleTouchend() && o), "click" === n && (o = !1 !== i.openColorpickerPanel(l["\u0275nov"](e, 62)) && o), o
            }, null, null)), l["\u0275did"](63, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 6, 0, "font-family", t.styles.fontFamily), e(n, 10, 0, ""), e(n, 11, 0, ""), e(n, 15, 0, t.baseFonts), e(n, 17, 0, "Google fonts"), e(n, 19, 0, "google-custom"), e(n, 34, 0, "font-weight", t.styles.fontWeight), e(n, 38, 0, t.fontWeights), e(n, 45, 0, "font-size", t.styles.fontSize), e(n, 48, 0, "font size"), e(n, 51, 0, "align left"), e(n, 53, 0, "format-align-left"), e(n, 55, 0, "align center"), e(n, 57, 0, "format-align-center"), e(n, 59, 0, "align right"), e(n, 61, 0, "format-align-right"), e(n, 63, 0, "text color")
            }, function(e, n) {
                var t = n.component;
                e(n, 3, 0, l["\u0275nov"](n, 8).ngClassUntouched, l["\u0275nov"](n, 8).ngClassTouched, l["\u0275nov"](n, 8).ngClassPristine, l["\u0275nov"](n, 8).ngClassDirty, l["\u0275nov"](n, 8).ngClassValid, l["\u0275nov"](n, 8).ngClassInvalid, l["\u0275nov"](n, 8).ngClassPending), e(n, 22, 0, t.textStyleIs("fontStyle", "italic")), e(n, 24, 0, t.textStyleIs("textDecoration", "underline")), e(n, 26, 0, t.textStyleIs("textDecoration", "line-through")), e(n, 28, 0, t.textStyleIs("textDecoration", "overline")), e(n, 31, 0, l["\u0275nov"](n, 36).ngClassUntouched, l["\u0275nov"](n, 36).ngClassTouched, l["\u0275nov"](n, 36).ngClassPristine, l["\u0275nov"](n, 36).ngClassDirty, l["\u0275nov"](n, 36).ngClassValid, l["\u0275nov"](n, 36).ngClassInvalid, l["\u0275nov"](n, 36).ngClassPending), e(n, 41, 0, l["\u0275nov"](n, 47).ngClassUntouched, l["\u0275nov"](n, 47).ngClassTouched, l["\u0275nov"](n, 47).ngClassPristine, l["\u0275nov"](n, 47).ngClassDirty, l["\u0275nov"](n, 47).ngClassValid, l["\u0275nov"](n, 47).ngClassInvalid, l["\u0275nov"](n, 47).ngClassPending), e(n, 50, 0, t.textStyleIs("textAlign", "left")), e(n, 54, 0, t.textStyleIs("textAlign", "center")), e(n, 58, 0, t.textStyleIs("textAlign", "right")), e(n, 62, 0, t.styles.color)
            })
        }
        var En = function() {
                function e(e, n, t) {
                    this.selected = e, this.colorPicker = n, this.builderActions = t, this.borderStyle = "none", this.borderColor = "#eee"
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selected.changed.subscribe(function() {
                        e.setInitialBorderStyles()
                    })
                }, e.prototype.applyBorderColor = function(e) {
                    this.borderColor = e, this.builderActions.applyStyle(this.selected.node, "borderColor", e)
                }, e.prototype.applyBorderStyle = function() {
                    this.builderActions.applyStyle(this.selected.node, "borderStyle", this.borderStyle)
                }, e.prototype.openColorpickerPanel = function() {
                    var e = this;
                    this.colorPicker.open(this.colorButton, {
                        position: "right"
                    }).selected.subscribe(function(n) {
                        e.applyBorderColor(n)
                    })
                }, e.prototype.setInitialBorderStyles = function() {
                    this.borderStyle = this.selected.getStyle("borderStyle"), this.borderColor = this.selected.getStyle("borderColor")
                }, e
            }(),
            Rn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nborder-style-controls{display:-webkit-box;display:-ms-flexbox;display:flex;height:35px;margin-bottom:10px}border-style-controls>.border-color{display:block;height:32px;margin-right:5px;background-color:#fafafa;border:3px solid #fafafa}border-style-controls>.border-color,border-style-controls>.input-container{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;width:50%}"]
                ],
                data: {}
            });

        function Sn(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                colorButton: 0
            }), (e()(), l["\u0275eld"](1, 16777216, [
                [1, 0],
                ["colorButton", 1]
            ], null, 1, "button", [
                ["class", "no-style border-color"],
                ["matTooltip", "Border Color"],
                ["type", "button"]
            ], [
                [4, "borderColor", null]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 2).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 2)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 2)._handleTouchend() && o), "click" === n && (o = !1 !== i.openColorpickerPanel() && o), o
            }, null, null)), l["\u0275did"](2, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](3, 0, null, null, 51, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 50, "select", [
                ["id", "border-style"],
                ["name", "border-style"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 5).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 5).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.borderStyle = t) && o), "ngModelChange" === n && (o = !1 !== i.applyBorderStyle() && o), o
            }, null, null)), l["\u0275did"](5, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](7, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](9, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](10, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "none"]
            ], null, null, null, null, null)), l["\u0275did"](11, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](12, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["None"])), (e()(), l["\u0275eld"](15, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "solid"]
            ], null, null, null, null, null)), l["\u0275did"](16, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](17, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](18, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Solid"])), (e()(), l["\u0275eld"](20, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "dashed"]
            ], null, null, null, null, null)), l["\u0275did"](21, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](22, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](23, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Dashed"])), (e()(), l["\u0275eld"](25, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "dotted"]
            ], null, null, null, null, null)), l["\u0275did"](26, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](27, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](28, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Dotted"])), (e()(), l["\u0275eld"](30, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "double"]
            ], null, null, null, null, null)), l["\u0275did"](31, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](32, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](33, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Double"])), (e()(), l["\u0275eld"](35, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "groove"]
            ], null, null, null, null, null)), l["\u0275did"](36, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](37, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](38, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Groove"])), (e()(), l["\u0275eld"](40, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "ridge"]
            ], null, null, null, null, null)), l["\u0275did"](41, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](42, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](43, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Ridge"])), (e()(), l["\u0275eld"](45, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "inset"]
            ], null, null, null, null, null)), l["\u0275did"](46, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](47, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](48, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Inset"])), (e()(), l["\u0275eld"](50, 0, null, null, 4, "option", [
                ["trans", ""],
                ["value", "outset"]
            ], null, null, null, null, null)), l["\u0275did"](51, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](52, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](53, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Outset"]))], function(e, n) {
                var t = n.component;
                e(n, 2, 0, "Border Color"), e(n, 7, 0, "border-style", t.borderStyle), e(n, 11, 0, "none"), e(n, 12, 0, "none"), e(n, 16, 0, "solid"), e(n, 17, 0, "solid"), e(n, 21, 0, "dashed"), e(n, 22, 0, "dashed"), e(n, 26, 0, "dotted"), e(n, 27, 0, "dotted"), e(n, 31, 0, "double"), e(n, 32, 0, "double"), e(n, 36, 0, "groove"), e(n, 37, 0, "groove"), e(n, 41, 0, "ridge"), e(n, 42, 0, "ridge"), e(n, 46, 0, "inset"), e(n, 47, 0, "inset"), e(n, 51, 0, "outset"), e(n, 52, 0, "outset")
            }, function(e, n) {
                e(n, 1, 0, n.component.borderColor), e(n, 4, 0, l["\u0275nov"](n, 9).ngClassUntouched, l["\u0275nov"](n, 9).ngClassTouched, l["\u0275nov"](n, 9).ngClassPristine, l["\u0275nov"](n, 9).ngClassDirty, l["\u0275nov"](n, 9).ngClassValid, l["\u0275nov"](n, 9).ngClassInvalid, l["\u0275nov"](n, 9).ngClassPending)
            })
        }
        var Tn = t("zHJD"),
            Pn = t("MRij"),
            In = function() {
                function e(e, n, t, l, o, i, a, r) {
                    this.livePreview = e, this.selected = n, this.layout = t, this.inspector = l, this.modal = o, this.activeProject = i, this.linkEditor = a, this.elements = r
                }
                return e.prototype.canModify = function(e) {
                    return this.livePreview.selected.canModify(e)
                }, e.prototype.openLayoutPanel = function() {
                    this.layout.selectRowAndContainerUsing(this.livePreview.selected.node), this.inspector.openPanel("layout")
                }, e.prototype.openUploadImageModal = function() {
                    var e = this,
                        n = {
                            uri: "uploads/images",
                            httpParams: {
                                path: this.activeProject.getBaseUrl(!0) + "images"
                            }
                        };
                    this.modal.open(We.a, n).afterClosed().subscribe(function(n) {
                        n && (e.livePreview.selected.node.src = n)
                    })
                }, e.prototype.openLinkEditorModal = function() {
                    this.linkEditor.open(this.livePreview.selected.node)
                }, e.prototype.selectedIsLayout = function() {
                    return this.livePreview.selected.isLayout()
                }, e.prototype.selectedIsImage = function() {
                    return this.livePreview.selected.isImage
                }, e.prototype.selectedIsLink = function() {
                    return this.elements.isLink(this.livePreview.selected.node)
                }, e
            }(),
            Dn = function() {
                function e(e, n, t, l, o) {
                    var i = this;
                    this.builderDocument = e, this.selected = n, this.undoManager = t, this.contextBoxes = l, this.elements = o, this.containers = [], this.selected.changed.subscribe(function() {
                        i.selectRowAndContainerUsing(i.selected.node)
                    })
                }
                return e.prototype.loadContainers = function() {
                    var e = this;
                    this.containers = [], Array.from(this.builderDocument.findAll(".container")).forEach(function(n) {
                        var t = Array.from(n.querySelectorAll(".row"));
                        e.containers.push({
                            node: n,
                            rows: t,
                            id: we.a.randomString()
                        })
                    }), this.selectedContainer && this.selectContainer(this.selectedContainer.node)
                }, e.prototype.createRow = function(e, n, t) {
                    var l = this.builderDocument.createElement("div");
                    l.appendChild(this.createColumnNode(12)), l.classList.add("row"), "start" === t ? n ? n.parentNode.insertBefore(l, n) : e.appendChild(l) : n[t](l), this.selectRow(l), this.builderDocument.contentChanged.next("builder")
                }, e.prototype.createContainer = function(e, n) {
                    var t = this.builderDocument.createElement("div");
                    t.appendChild(this.createColumnNode(12)), t.classList.add("row");
                    var l = this.builderDocument.createElement("div");
                    l.classList.add("container"), l.appendChild(t), "start" === n ? this.builderDocument.getBody().appendChild(l) : e[n](l), this.builderDocument.contentChanged.next("builder"), this.selectContainer(l), this.selected.selectNode(this.selectedContainer.node)
                }, e.prototype.selectContainer = function(e, n) {
                    void 0 === n && (n = !0), e && (this.selectedContainer = e.nodeType ? this.containers.find(function(n) {
                        return n.node === e
                    }) : e, this.selectedContainer && n && this.selectRow(this.selectedContainer.rows[0]))
                }, e.prototype.rowIsSelected = function(e) {
                    return this.selectedRow && this.selectedRow.node === e
                }, e.prototype.containerIsSelected = function(e) {
                    return this.selectedContainer && this.selectedContainer.node === e
                }, e.prototype.selectRow = function(e, n) {
                    if (void 0 === n && (n = !0), e) {
                        n && this.selected.selectNode(e);
                        var t = this.getColumns(e),
                            l = t.map(function(e) {
                                return e.span
                            });
                        this.builderDocument.scrollIntoView(e), this.selectedRow = {
                            node: e,
                            columns: t,
                            preset: l
                        }
                    }
                }, e.prototype.getColumns = function(e) {
                    var n = this;
                    return this.nodeListToArray(e.children).filter(function(e) {
                        return e.className.indexOf("col-") > -1
                    }).map(function(e) {
                        return {
                            node: e,
                            span: n.getSpan(e),
                            id: we.a.randomString()
                        }
                    })
                }, e.prototype.selectColumn = function(e) {
                    this.selected.selectNode(e), this.builderDocument.scrollIntoView(e)
                }, e.prototype.applyPreset = function(e) {
                    var n = this,
                        t = this.selectedRow.node.cloneNode(!0);
                    this.selectedRow.columns.length > e.length && this.selectedRow.columns.slice(e.length).forEach(function(e) {
                        return e.node.remove()
                    }), e.forEach(function(e, t) {
                        n.selectedRow.columns[t] ? n.resizeColumn(n.selectedRow.columns[t].node, e) : n.selectedRow.columns[t - 1] ? n.addNewColumn(n.selectedRow.columns[t - 1].node, e) : n.selectedRow.node.appendChild(n.createColumnNode(e))
                    }), this.undoManager.add("domChanges", {
                        oldNode: t,
                        newNode: this.selectedRow.node.cloneNode(!0),
                        node: this.selectedRow.node
                    }), this.selectRow(this.selectedRow.node), this.builderDocument.contentChanged.next("builder"), this.contextBoxes.repositionBox("selected", this.selected.node)
                }, e.prototype.addNewColumn = function(e, n, t) {
                    void 0 === t && (t = "after");
                    var l = this.getNodeIndex(this.selectedRow.columns, e),
                        o = this.nodeListToArray(e.parentNode.childNodes),
                        i = o.filter(function(e) {
                            return l < e
                        }),
                        a = o.filter(function(e) {
                            return l > e
                        }),
                        r = !1;
                    if (this.getTotalSpan(this.selectedRow.columns) + n <= 12 && (e[t](this.createColumnNode(n)), r = !0), !r && this.widerThen(1, i[0]) ? (this.resizeColumn(i[0], 1, "-"), e[t](this.createColumnNode(n)), r = !0) : !r && this.widerThen(1, e) && (this.resizeColumn(e, 1, "-"), e.after(this.createColumnNode(n)), r = !0), !r)
                        for (var u = 0; u < i.length; u++)
                            if (this.widerThen(1, i[u])) {
                                this.resizeColumn(i[u], 1, "-"), e[t](this.createColumnNode(n)), r = !0;
                                break
                            }
                    if (!r)
                        for (u = 0; u < a.length; u++)
                            if (this.widerThen(1, a[u])) {
                                this.resizeColumn(a[u], 1, "-"), e[t](this.createColumnNode(n)), r = !0;
                                break
                            }
                    this.selectedRow.columns = this.getColumns(this.selectedRow.node)
                }, e.prototype.getTotalSpan = function(e) {
                    var n = this;
                    return e.map(function(e) {
                        return n.getSpan(e.node)
                    }).reduce(function(e, n) {
                        return e + n
                    })
                }, e.prototype.createColumnNode = function(e) {
                    var n = this.builderDocument.createElement("div");
                    return n.className = "col-sm-" + e, n
                }, e.prototype.widerThen = function(e, n) {
                    if (this.isColumn(n)) return this.getSpan(n) > e
                }, e.prototype.isColumn = function(e) {
                    if (e && e.className) return e.className.indexOf("col-") > -1
                }, e.prototype.getNodeIndex = function(e, n) {
                    for (var t = e.length - 1; t >= 0; t--)
                        if (e[t] === n) return t
                }, e.prototype.resizeColumn = function(e, n, t) {
                    n || (n = 1), e.className = e.className.replace(/(col-[a-z]+-)([0-9]+)/, function(e, l, o) {
                        return t ? "+" === t ? l + (parseInt(o) + n) : l + (parseInt(o) - n) : l + n
                    })
                }, e.prototype.getSpan = function(e) {
                    return parseInt(e.className.match(/col-[a-z]+-([0-9]+)/)[1])
                }, e.prototype.nodeListToArray = function(e) {
                    for (var n = [], t = 0; t < e.length; t++) n.push(e[t]);
                    return n
                }, e.prototype.selectRowAndContainerUsing = function(e) {
                    var n, t;
                    e && this.selected.isLayout() && (this.elements.isRow(this.selected.node) && (t = (n = e).closest(".container")), this.elements.isColumn(this.selected.node) && (t = (n = e.closest(".row")).closest(".container")), this.elements.isContainer(this.selected.node) && (n = (t = e).querySelector(".row")), this.rowIsSelected(n) || this.selectRow(n, !1), this.containerIsSelected(t) || this.selectContainer(t, !1))
                }, e
            }(),
            On = function() {
                function e(e) {
                    var n = this;
                    this.selectedElement = e, this.activePanel = "elements", this.panelChanged = new _.a, this.selectedElement.changed.subscribe(function() {
                        n.selectedElement.node && (n.selectedElement.isLayout() ? n.openPanel("layout") : n.openPanel("inspector"))
                    })
                }
                return e.prototype.togglePanel = function(e) {
                    this.activePanel = e, this.panelChanged.next(e)
                }, e.prototype.openPanel = function(e) {
                    this.activePanelIs(e) || (this.activePanel = e, this.panelChanged.next(e))
                }, e.prototype.activePanelIs = function(e) {
                    return this.activePanel === e
                }, e
            }(),
            Mn = function() {
                function e(e, n) {
                    this.activeProject = e, this.builderDocument = n
                }
                return e.prototype.setEmail = function() {
                    this.node.href = "mailto:" + this.hrefModel, this.closeAndEmitChanges()
                }, e.prototype.setDownload = function() {
                    this.node.href = this.hrefModel, this.node.setAttribute("download", this.downloadName), this.closeAndEmitChanges()
                }, e.prototype.setPageLink = function() {
                    this.node.href = this.hrefModel + ".html", this.closeAndEmitChanges()
                }, e.prototype.setUrl = function() {
                    this.node.href = this.hrefModel, this.closeAndEmitChanges()
                }, e.prototype.closeAndEmitChanges = function() {
                    this.close(), this.builderDocument.contentChanged.next("builder")
                }, e.prototype.close = function() {
                    this.overlayRef.dispose()
                }, e.prototype.setParams = function(e, n) {
                    this.node = e, this.overlayRef = n
                }, e.prototype.resetModel = function() {
                    this.hrefModel = null
                }, e
            }(),
            Nn = function() {
                function e(e) {
                    this.overlay = e
                }
                return e.prototype.open = function(e) {
                    var n = this,
                        t = this.overlay.position().connectedTo(new l.ElementRef(e), {
                            originX: "center",
                            originY: "top"
                        }, {
                            overlayX: "center",
                            overlayY: "bottom"
                        }).withFallbackPosition({
                            originX: "center",
                            originY: "bottom"
                        }, {
                            overlayX: "center",
                            overlayY: "top"
                        }).withFallbackPosition({
                            originX: "end",
                            originY: "bottom"
                        }, {
                            overlayX: "end",
                            overlayY: "top"
                        }).withOffsetX(380);
                    this.overlayRef && this.overlayRef.dispose(), this.overlayRef = this.overlay.create({
                        positionStrategy: t,
                        hasBackdrop: !0,
                        panelClass: "link-editor-panel"
                    }), this.overlayRef.attach(new Ge.d(Mn)).instance.setParams(e, this.overlayRef), this.overlayRef.backdropClick().subscribe(function() {
                        n.overlayRef.dispose()
                    })
                }, e.prototype.close = function() {
                    this.overlayRef && this.overlayRef.dispose()
                }, e
            }(),
            Bn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ninspector-panel{display:block;overflow:auto;padding: 15px;background: rgba(255,255,255,0.5);border: 1px solid rgba(255,255,255,0.5);min-width:280px;}inspector-panel>.breadcrumbs{background-color:#fafafa;border:1px solid #e0e0e0;padding:10px;border-radius:3px;margin-bottom:30px}inspector-panel>.breadcrumbs>.crumb-container:hover:not(.last) .crumb{text-decoration:underline}inspector-panel>.breadcrumbs>.crumb-container.last .crumb{color:#009688;pointer-events:none}inspector-panel>.breadcrumbs svg-icon{vertical-align:sub;width:15px;height:15px}inspector-panel>.edit-layout-button{width:100%;margin-bottom:15px}inspector-panel .mat-expansion-panel .mat-expansion-panel-body{margin:15px}"]
                ],
                data: {}
            });

        function jn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "svg-icon", [
                ["name", "keyboard-arrow-right"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](1, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 1, 0, "keyboard-arrow-right")
            }, null)
        }

        function Ln(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 4, "span", [
                ["class", "crumb-container"]
            ], [
                [2, "last", null]
            ], [
                [null, "mouseenter"],
                [null, "mouseleave"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "mouseenter" === n && (l = !1 !== o.livePreview.repositionBox("hover", e.context.$implicit.node) && l), "mouseleave" === n && (l = !1 !== o.livePreview.hideBox("hover") && l), l
            }, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 1, "button", [
                ["class", "crumb no-style"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selected.selectNode(e.context.$implicit.node) && l), l
            }, null, null)), (e()(), l["\u0275ted"](2, null, ["", ""])), (e()(), l["\u0275and"](16777216, null, null, 1, null, jn)), l["\u0275did"](4, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 4, 0, !n.context.last)
            }, function(e, n) {
                e(n, 0, 0, n.context.last), e(n, 2, 0, n.context.$implicit.name)
            })
        }

        function An(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "div", [
                ["class", "breadcrumbs"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Ln)), l["\u0275did"](2, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                e(n, 2, 0, n.component.livePreview.selected.path)
            }, null)
        }

        function Fn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "button", [
                ["class", "edit-layout-button"],
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openLayoutPanel() && l), l
            }, B.d, B.b)), l["\u0275did"](1, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Edit Layout"]))], function(e, n) {
                e(n, 1, 0, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled || null)
            })
        }

        function Vn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "button", [
                ["class", "edit-layout-button"],
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openUploadImageModal() && l), l
            }, B.d, B.b)), l["\u0275did"](1, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change Image"]))], function(e, n) {
                e(n, 1, 0, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled || null)
            })
        }

        function Hn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "button", [
                ["class", "edit-layout-button"],
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openLinkEditorModal() && l), l
            }, B.d, B.b)), l["\u0275did"](1, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change Link"]))], function(e, n) {
                e(n, 1, 0, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled || null)
            })
        }

        function zn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 1, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Attributes"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "attributes-panel", [
                ["class", "panel-body"]
            ], null, null, null, ze, Be)), l["\u0275did"](12, 114688, null, 0, Ne, [he, ge, xe, l.Renderer2], null, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function qn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 2, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Background"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "background-panel", [
                ["class", "panel-body"]
            ], null, null, null, Je, Qe)), l["\u0275did"](12, 114688, null, 0, Xe, [xe, Ze, l.Renderer2, Ye, Ke.a], null, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Un(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 3, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Shadows"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "shadows-panel", [
                ["class", "panel-body"]
            ], null, null, null, sn, an)), l["\u0275did"](12, 114688, null, 0, on, [xe, Ke.a, l.Renderer2, Ye], null, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Wn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 4, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Padding"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "spacing-panel", [
                ["class", "panel-body"],
                ["type", "padding"]
            ], null, null, null, mn, fn)), l["\u0275did"](12, 114688, null, 0, hn, [xe, Ye], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0, "padding")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function $n(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 5, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Margin"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "spacing-panel", [
                ["class", "panel-body"],
                ["type", "margin"]
            ], null, null, null, mn, fn)), l["\u0275did"](12, 114688, null, 0, hn, [xe, Ye], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0, "margin")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Xn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 6, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Text Style"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "text-style-panel", [
                ["class", "panel-body"]
            ], null, null, null, Cn, wn)), l["\u0275did"](12, 114688, null, 0, xn, [xe, Ze, Ye, Ke.a], null, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Gn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 14, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 7, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Border"])), (e()(), l["\u0275eld"](11, 0, null, 1, 3, "spacing-panel", [
                ["class", "panel-body"],
                ["type", "borderWidth"]
            ], null, null, null, mn, fn)), l["\u0275did"](12, 114688, null, 0, hn, [xe, Ye], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275eld"](13, 0, null, 0, 1, "border-style-controls", [], null, null, null, Sn, Rn)), l["\u0275did"](14, 114688, null, 0, En, [xe, Ke.a, Ye], null, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0, "borderWidth"), e(n, 14, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Zn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 16777216, null, null, 12, "mat-expansion-panel", [
                ["class", "category mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], null, null, le.d, le.a)), l["\u0275did"](1, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], null, null), l["\u0275qud"](335544320, 8, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](3, 0, null, 0, 7, "mat-expansion-panel-header", [
                ["class", "mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 4)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._keydown(t) && o), o
            }, le.c, le.b)), l["\u0275did"](4, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](5, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](6, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](7, 0, null, 0, 3, "mat-panel-title", [
                ["class", "mat-expansion-panel-header-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](8, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275ted"](-1, null, ["Border Roundness"])), (e()(), l["\u0275eld"](11, 0, null, 1, 1, "spacing-panel", [
                ["class", "panel-body"],
                ["max", "30"],
                ["type", "borderRadius"]
            ], null, null, null, mn, fn)), l["\u0275did"](12, 114688, null, 0, hn, [xe, Ye], {
                max: [0, "max"],
                type: [1, "type"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 12, 0, "30", "borderRadius")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).expanded, l["\u0275nov"](n, 1)._hasSpacing()), e(n, 3, 0, l["\u0275nov"](n, 4).panel._headerId, l["\u0275nov"](n, 4).panel.disabled ? -1 : 0, l["\u0275nov"](n, 4)._getPanelId(), l["\u0275nov"](n, 4)._isExpanded(), l["\u0275nov"](n, 4).panel.disabled, l["\u0275nov"](n, 4)._isExpanded(), e(n, 6, 0, l["\u0275nov"](n, 4)._getExpandedState(), e(n, 5, 0, l["\u0275nov"](n, 4).collapsedHeight, l["\u0275nov"](n, 4).expandedHeight)))
            })
        }

        function Yn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 7, "no-results-message", [], null, null, null, Tn.b, Tn.a)), l["\u0275did"](1, 49152, null, 0, Pn.a, [x.a], null, null), (e()(), l["\u0275eld"](2, 0, null, 0, 2, "span", [
                ["primary-text", ""],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](3, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Nothing is selected."])), (e()(), l["\u0275eld"](5, 0, null, 1, 2, "span", [
                ["secondary-text", ""],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](6, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Click on any element on the right to inspect and modify it."]))], null, null)
        }

        function Kn(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275and"](16777216, null, null, 1, null, An)), l["\u0275did"](1, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Fn)), l["\u0275did"](3, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Vn)), l["\u0275did"](5, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Hn)), l["\u0275did"](7, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](8, 0, null, null, 17, "mat-accordion", [
                ["class", "mat-accordion"]
            ], null, null, null, null, null)), l["\u0275did"](9, 16384, null, 0, oe.a, [], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, zn)), l["\u0275did"](11, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, qn)), l["\u0275did"](13, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Un)), l["\u0275did"](15, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Wn)), l["\u0275did"](17, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, $n)), l["\u0275did"](19, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Xn)), l["\u0275did"](21, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Gn)), l["\u0275did"](23, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Zn)), l["\u0275did"](25, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Yn)), l["\u0275did"](27, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 1, 0, t.livePreview.selected.path && t.livePreview.selected.path.length), e(n, 3, 0, t.selectedIsLayout()), e(n, 5, 0, t.selectedIsImage()), e(n, 7, 0, t.selectedIsLink()), e(n, 11, 0, t.canModify("attributes")), e(n, 13, 0, t.canModify("background")), e(n, 15, 0, t.canModify("shadows")), e(n, 17, 0, t.canModify("padding")), e(n, 19, 0, t.canModify("margin")), e(n, 21, 0, t.canModify("text")), e(n, 23, 0, t.canModify("box")), e(n, 25, 0, t.canModify("box")), e(n, 27, 0, !t.selected.node)
            }, null)
        }
        var Qn = function() {
                function e() {
                    this.selected = new l.EventEmitter, this.customPanelOpen = !1, this.customPresetIsValid = !0
                }
                return e.prototype.ngOnChanges = function() {
                    this.customSpan = this.preset.join(" + ")
                }, e.prototype.selectPreset = function(e) {
                    this.selected.emit(e)
                }, e.prototype.selectPresetFromCustomSpan = function() {
                    var e = this.customSpan.split("+").map(function(e) {
                        return parseInt(e.trim())
                    });
                    this.presetIsValid(e) ? (this.selectPreset(e), this.customPresetIsValid = !0) : this.customPresetIsValid = !1
                }, e.prototype.toggleCustomPanel = function() {
                    this.customPanelOpen = !this.customPanelOpen
                }, e.prototype.presetIsActive = function(e) {
                    return this.preset.length == e.length && this.preset.every(function(n, t) {
                        return n === e[t]
                    })
                }, e.prototype.presetIsValid = function(e) {
                    var n = e.filter(function(e) {
                        return e > 0 && e <= 12
                    });
                    return n.length && 12 === n.reduce(function(e, n) {
                        return e + n
                    })
                }, e
            }(),
            Jn = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ncolumn-presets{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;margin:20px 0}column-presets>.custom-preset>.col{line-height:28px;padding:0 6px;font-weight:500;color:#fff}column-presets>.preset{display:-webkit-box;display:-ms-flexbox;display:flex;height:28px;-webkit-box-flex:0;-ms-flex:0 0 calc(25% - 4px);flex:0 0 calc(25% - 4px);margin-bottom:8px}column-presets>.preset.active>.col,column-presets>.preset:hover>.col{opacity:1}column-presets>.preset>.col{height:100%;margin-right:3px;border-radius:2px;background-color:#009688;opacity:.2;cursor:pointer}column-presets>.preset .col-12{width:100%}column-presets>.preset .col-8{width:66.66666667%}column-presets>.preset .col-6{width:50%}column-presets>.preset .col-4{width:33.33333333%}column-presets>.preset .col-3{width:25%}column-presets>.preset .col-2{width:16.66666667%}column-presets>.custom-span-panel{margin-top:5px}column-presets>.custom-span-panel>input{height:30px;margin:0}column-presets>.custom-span-panel>.error{margin-top:5px}"]
                ],
                data: {}
            });

        function et(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "div", [
                ["class", "error"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["This preset is not valid."]))], null, null)
        }

        function nt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 8, "div", [
                ["class", "custom-span-panel input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 5, "input", [
                ["placeholder", "4 + 4 + 4"],
                ["type", "text"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 2)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 2).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 2)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 2)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.customSpan = t) && o), "ngModelChange" === n && (o = !1 !== i.selectPresetFromCustomSpan(t) && o), o
            }, null, null)), l["\u0275did"](2, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](4, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](6, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, et)), l["\u0275did"](8, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 4, 0, t.customSpan), e(n, 8, 0, !t.customPresetIsValid)
            }, function(e, n) {
                e(n, 1, 0, l["\u0275nov"](n, 6).ngClassUntouched, l["\u0275nov"](n, 6).ngClassTouched, l["\u0275nov"](n, 6).ngClassPristine, l["\u0275nov"](n, 6).ngClassDirty, l["\u0275nov"](n, 6).ngClassValid, l["\u0275nov"](n, 6).ngClassInvalid, l["\u0275nov"](n, 6).ngClassPending)
            })
        }

        function tt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([12]) && l), l
            }, null, null)), l["\u0275pad"](1, 1), (e()(), l["\u0275eld"](2, 0, null, null, 0, "span", [
                ["class", "col col-12"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 3, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([6, 6]) && l), l
            }, null, null)), l["\u0275pad"](4, 2), (e()(), l["\u0275eld"](5, 0, null, null, 0, "div", [
                ["class", "col col-6"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](6, 0, null, null, 0, "div", [
                ["class", "col col-6"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](7, 0, null, null, 3, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([4, 8]) && l), l
            }, null, null)), l["\u0275pad"](8, 2), (e()(), l["\u0275eld"](9, 0, null, null, 0, "div", [
                ["class", "col col-4"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 0, "div", [
                ["class", "col col-8"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](11, 0, null, null, 3, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([8, 4]) && l), l
            }, null, null)), l["\u0275pad"](12, 2), (e()(), l["\u0275eld"](13, 0, null, null, 0, "div", [
                ["class", "col col-8"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](14, 0, null, null, 0, "div", [
                ["class", "col col-4"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](15, 0, null, null, 4, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([4, 4, 4]) && l), l
            }, null, null)), l["\u0275pad"](16, 3), (e()(), l["\u0275eld"](17, 0, null, null, 0, "div", [
                ["class", "col col-4"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](18, 0, null, null, 0, "div", [
                ["class", "col col-4"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](19, 0, null, null, 0, "div", [
                ["class", "col col-4"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](20, 0, null, null, 5, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([3, 3, 3, 3]) && l), l
            }, null, null)), l["\u0275pad"](21, 4), (e()(), l["\u0275eld"](22, 0, null, null, 0, "div", [
                ["class", "col col-3"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](23, 0, null, null, 0, "div", [
                ["class", "col col-3"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](24, 0, null, null, 0, "div", [
                ["class", "col col-3"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](25, 0, null, null, 0, "div", [
                ["class", "col col-3"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](26, 0, null, null, 7, "div", [
                ["class", "preset"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectPreset([2, 2, 2, 2, 2, 2]) && l), l
            }, null, null)), l["\u0275pad"](27, 6), (e()(), l["\u0275eld"](28, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](29, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](30, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](31, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](32, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](33, 0, null, null, 0, "div", [
                ["class", "col col-2"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](34, 0, null, null, 3, "button", [
                ["class", "no-style preset custom-preset"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleCustomPanel() && l), l
            }, null, null)), (e()(), l["\u0275eld"](35, 0, null, null, 2, "span", [
                ["class", "col col-12"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](36, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Custom"])), (e()(), l["\u0275and"](16777216, null, null, 1, null, nt)), l["\u0275did"](39, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 39, 0, n.component.customPanelOpen)
            }, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t.presetIsActive(e(n, 1, 0, 12))), e(n, 3, 0, t.presetIsActive(e(n, 4, 0, 6, 6))), e(n, 7, 0, t.presetIsActive(e(n, 8, 0, 4, 8))), e(n, 11, 0, t.presetIsActive(e(n, 12, 0, 8, 4))), e(n, 15, 0, t.presetIsActive(e(n, 16, 0, 4, 4, 4))), e(n, 20, 0, t.presetIsActive(e(n, 21, 0, 3, 3, 3, 3))), e(n, 26, 0, t.presetIsActive(e(n, 27, 0, 2, 2, 2, 2, 2, 2)))
            })
        }
        var lt = t("UdtQ"),
            ot = function() {
                function e(e, n, t, l, o) {
                    this.undoManager = e, this.livePreview = n, this.layoutPanel = t, this.builderDocument = l, this.el = o
                }
                return e.prototype.ngAfterContentInit = function() {
                    var e = this;
                    new lt(this.el.nativeElement, {
                        draggable: "." + this.type + "-drag-wrapper",
                        handle: ".drag-handle",
                        animation: 250,
                        onUpdate: function(n) {
                            var t = e.getNodeList(),
                                l = t.slice();
                            we.a.moveArrayElement(l, n.oldIndex, n.newIndex), re.a.reorderDom(l, t), e.livePreview.repositionBox("selected"), e.builderDocument.contentChanged.next("builder"), e.createUndoCommand(t, l)
                        }
                    })
                }, e.prototype.getNodeList = function() {
                    switch (this.type) {
                        case "container":
                            return this.layoutPanel.containers.map(function(e) {
                                return e.node
                            });
                        case "row":
                            return this.layoutPanel.selectedContainer.rows;
                        case "column":
                            return this.layoutPanel.selectedRow.columns.map(function(e) {
                                return e.node
                            })
                    }
                }, e.prototype.createUndoCommand = function(e, n) {
                    var t = this;
                    this.undoManager.add("generic", {
                        undo: function() {
                            re.a.reorderDom(e, n), t.livePreview.repositionBox("selected")
                        },
                        redo: function() {
                            re.a.reorderDom(n, e), t.livePreview.repositionBox("selected")
                        }
                    })
                }, e
            }(),
            it = function() {
                function e(e, n, t, l, o) {
                    this.builderDocument = e, this.selectedElement = n, this.contextBoxes = t, this.layoutPanel = l, this.inspector = o
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.builderDocument.contentChanged.subscribe(function(n) {
                        e.inspector.activePanelIs("layout") && e.layoutPanel.loadContainers()
                    }), this.inspector.panelChanged.subscribe(function(n) {
                        "layout" === n && e.layoutPanel.loadContainers()
                    })
                }, e.prototype.openInspectorPanel = function(e) {
                    this.selectedElement.selectNode(e), this.inspector.togglePanel("inspector")
                }, e.prototype.cloneContainer = function(e) {
                    var n = this.builderDocument.actions.cloneNode(e.node);
                    this.layoutPanel.selectContainer(n)
                }, e.prototype.cloneRow = function(e) {
                    var n = this.builderDocument.actions.cloneNode(e);
                    this.layoutPanel.selectRow(n, !0)
                }, e.prototype.removeItem = function(e) {
                    this.builderDocument.actions.removeNode(e)
                }, e.prototype.repositionHoverBox = function(e) {
                    this.contextBoxes.repositionBox("hover", e)
                }, e.prototype.hideHoverBox = function() {
                    this.contextBoxes.hideBox("hover")
                }, e.prototype.containerIsSelected = function(e) {
                    return !!this.layoutPanel.selectedContainer && this.layoutPanel.selectedContainer.node === e.node
                }, e.prototype.onPanelOpen = function(e) {
                    this.layoutPanel.selectedContainer = e, e.rows.length && this.layoutPanel.selectRow(e.rows[0])
                }, e.prototype.isSelected = function(e) {
                    return this.selectedElement.node === e
                }, e.prototype.widthFromSpan = function(e) {
                    return 100 * e / 12 + "%"
                }, e
            }(),
            at = function() {
                function e(e, n) {
                    this.elements = e, this.localStorage = n, this.minHeight = 40, this.spacing = 10, this.minWidth = 100, this.minLeft = 15
                }
                return e.prototype.repositionBox = function(e, n, t) {
                    if (this.localStorage.get("settings." + e + "BoxEnabled", !0)) {
                        if (!n || n.nodeType !== Node.ELEMENT_NODE || this.nodeIsHtmlOrBody(n)) return this.hideBox(e);
                        if (t || (t = this.elements.match(n)), !t) return !0;
                        "selected" === e && this.hideBox("hover");
                        var l = n.getBoundingClientRect();
                        l.width && l.height ? (this.getBox(e).style.top = this.getBoxTop(l) + "px", this.getBox(e).style.left = this.getBoxLeft(l) + "px", this.getBox(e).style.height = this.getBoxHeight(l) + "px", this.getBox(e).style.width = this.getBoxWidth(l) + "px", this.showBox(e)) : this.hideBox(e), parseInt(this.getBox(e).style.top) < 20 ? this.getBox(e).classList.add("toolbar-bottom") : this.getBox(e).classList.remove("toolbar-bottom")
                    }
                }, e.prototype.getBoxHeight = function(e) {
                    return (e.height < this.minHeight ? this.minHeight : e.height) + 2 * this.spacing
                }, e.prototype.getBoxWidth = function(e) {
                    var n = e.width < this.minWidth ? this.minWidth : e.width,
                        t = this.previewRect.width - 2 * this.minLeft - 20;
                    return (n += 2 * this.spacing) > t ? t : n
                }, e.prototype.getBoxTop = function(e) {
                    return e.top - (e.height < this.minHeight ? this.minHeight - e.height : 0) / 2 - this.spacing
                }, e.prototype.getBoxLeft = function(e) {
                    var n = e.width < this.minWidth ? this.minWidth - e.width : 0;
                    return (n = e.left - n / 2 - this.spacing) < this.minLeft ? this.minLeft : n
                }, e.prototype.hideBox = function(e) {
                    this.getBox(e).classList.add("hidden")
                }, e.prototype.hideBoxes = function() {
                    this.hideBox("selected"), this.hideBox("hover")
                }, e.prototype.showBox = function(e) {
                    this.getBox(e).classList.remove("hidden")
                }, e.prototype.set = function(e, n, t) {
                    this.hoverBox = e, this.selectedBox = n, this.previewRect = t.nativeElement.getBoundingClientRect()
                }, e.prototype.getBox = function(e) {
                    return "hover" === e ? this.hoverBox : this.selectedBox
                }, e.prototype.nodeIsHtmlOrBody = function(e) {
                    return !!e && ("BODY" === e.nodeName || "HTML" === e.nodeName)
                }, e
            }(),
            rt = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ['\n\n\nlayout-panel{display:block;padding:15px;background: rgba(255,255,255,0.5);border: 1px solid rgba(255,255,255,0.5);min-width:280px;}layout-panel .container-config{padding:10px}layout-panel .mat-action-row,layout-panel .row-actions{padding:0}layout-panel .mat-action-row>button,layout-panel .row-actions>button{margin-left:-1px;padding:10px;border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;color:rgba(0,0,0,.54);cursor:pointer}layout-panel .add-item-button{display:block;position:relative;height:11px;width:100%;margin:5px 0;font-size:1rem;font-weight:500;text-align:center;background-color:#f1f1f1}layout-panel .add-item-button.hide-text>span{display:none}layout-panel .add-item-button:hover>span{display:inline-block;color:rgba(0,0,0,.87)}layout-panel .add-item-button>span{position:relative;z-index:1;color:rgba(0,0,0,.54);background-color:inherit}layout-panel .add-item-button:before{display:block;content:"";position:absolute;top:5px;left:0;width:100%;border:1px dashed #e0e0e0;z-index:0}layout-panel .rows .row{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#fafafa;border:1px solid #e0e0e0;margin-bottom:5px;cursor:move;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}layout-panel .rows .row>.row-name{padding:10px 0 10px 10px}layout-panel .rows .row>.row-actions{margin-left:auto}layout-panel .rows .row>.row-actions>button>svg-icon{width:16px;height:16px}layout-panel .rows .row.selected{border-color:#009688}layout-panel .rows .add-item-button{background-color:#fff}layout-panel .current-columns{display:-webkit-box;display:-ms-flexbox;display:flex;margin-top:10px}layout-panel .current-columns>.column{background-color:#fafafa;border:1px solid #e0e0e0;margin:0 0 0 -1px;padding:10px 0;text-align:center;cursor:ew-resize;position:relative}layout-panel .current-columns>.column.dragging{background:repeating-linear-gradient(-45deg,transparent,transparent 2px,rgba(0,0,0,.1) 0,rgba(0,0,0,.1) 4px)}layout-panel .current-columns>.column.selected{border-color:#009688;z-index:1}layout-panel .current-columns>.column:hover:not(.dragging){background-color:#fff}']
                ],
                data: {}
            });

        function ut(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 23, "div", [
                ["class", "row-drag-wrapper"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 18, "div", [
                ["class", "row drag-handle"]
            ], [
                [2, "selected", null]
            ], [
                [null, "click"],
                [null, "mouseenter"],
                [null, "mouseleave"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "click" === n && (l = !1 !== o.layoutPanel.selectRow(e.context.$implicit) && l), "mouseenter" === n && (l = !1 !== o.repositionHoverBox(e.context.$implicit) && l), "mouseleave" === n && (l = !1 !== o.hideHoverBox() && l), l
            }, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 4, "div", [
                ["class", "row-name"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](4, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Row"])), (e()(), l["\u0275ted"](6, null, [" ", ""])), (e()(), l["\u0275eld"](7, 0, null, null, 12, "div", [
                ["class", "row-actions"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](8, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Modify"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 9).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 9)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 9)._handleTouchend() && o), "click" === n && (o = !1 !== i.openInspectorPanel(e.context.$implicit) && o), o
            }, null, null)), l["\u0275did"](9, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](10, 0, null, null, 1, "svg-icon", [
                ["name", "brush"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](11, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](12, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Clone"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 13).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 13)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 13)._handleTouchend() && o), "click" === n && (o = !1 !== i.cloneRow(e.context.$implicit) && o), o
            }, null, null)), l["\u0275did"](13, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](14, 0, null, null, 1, "svg-icon", [
                ["name", "content-copy"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](15, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](16, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Delete"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 17).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 17)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 17)._handleTouchend() && o), "click" === n && (o = !1 !== i.removeItem(e.context.$implicit) && o), o
            }, null, null)), l["\u0275did"](17, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 1, "svg-icon", [
                ["name", "delete"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](19, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](20, 0, null, null, 3, "button", [
                ["class", "no-style add-item-button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.layoutPanel.createRow(e.parent.context.$implicit.node, e.context.$implicit, "after") && l), l
            }, null, null)), (e()(), l["\u0275eld"](21, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](22, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["+ ADD ROW"]))], function(e, n) {
                e(n, 9, 0, "Modify"), e(n, 11, 0, "brush"), e(n, 13, 0, "Clone"), e(n, 15, 0, "content-copy"), e(n, 17, 0, "Delete"), e(n, 19, 0, "delete")
            }, function(e, n) {
                e(n, 1, 0, n.component.layoutPanel.rowIsSelected(n.context.$implicit)), e(n, 6, 0, n.context.index + 1)
            })
        }

        function st(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "div", [
                ["class", "column column-helper column-drag-wrapper drag-handle"]
            ], [
                [4, "width", null],
                [8, "id", 0],
                [2, "selected", null]
            ], [
                [null, "click"],
                [null, "mouseenter"],
                [null, "mouseleave"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "click" === n && (l = !1 !== o.layoutPanel.selectColumn(e.context.$implicit.node) && l), "mouseenter" === n && (l = !1 !== o.repositionHoverBox(e.context.$implicit.node) && l), "mouseleave" === n && (l = !1 !== o.hideHoverBox() && l), l
            }, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t.widthFromSpan(n.context.$implicit.span), n.context.$implicit.id, t.isSelected(n.context.$implicit.node)), e(n, 1, 0, n.context.$implicit.span)
            })
        }

        function dt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 6, null, null, null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 1, "column-presets", [], null, [
                [null, "selected"]
            ], function(e, n, t) {
                var l = !0;
                return "selected" === n && (l = !1 !== e.component.layoutPanel.applyPreset(t) && l), l
            }, tt, Jn)), l["\u0275did"](2, 573440, null, 0, Qn, [], {
                preset: [0, "preset"]
            }, {
                selected: "selected"
            }), (e()(), l["\u0275eld"](3, 0, null, null, 3, "div", [
                ["class", "current-columns"],
                ["reorderLayoutItems", "column"]
            ], null, null, null, null, null)), l["\u0275did"](4, 1064960, null, 0, ot, [ge, he, Dn, _e, l.ElementRef], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, st)), l["\u0275did"](6, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 2, 0, t.layoutPanel.selectedRow.preset), e(n, 4, 0, "column"), e(n, 6, 0, t.layoutPanel.selectedRow.columns)
            }, null)
        }

        function ct(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 44, "div", [
                ["class", "container-drag-wrapper"]
            ], [
                [8, "id", 0]
            ], null, null, null, null)), (e()(), l["\u0275eld"](1, 16777216, null, null, 39, "mat-expansion-panel", [
                ["class", "container-panel mat-elevation-z mat-expansion-panel"]
            ], [
                [2, "mat-expanded", null],
                [2, "mat-expansion-panel-spacing", null]
            ], [
                [null, "opened"]
            ], function(e, n, t) {
                var l = !0;
                return "opened" === n && (l = !1 !== e.component.onPanelOpen(e.context.$implicit) && l), l
            }, le.d, le.a)), l["\u0275did"](2, 1753088, null, 1, oe.c, [
                [2, oe.a], l.ChangeDetectorRef, ie.c, l.ViewContainerRef
            ], {
                expanded: [0, "expanded"]
            }, {
                opened: "opened"
            }), l["\u0275qud"](335544320, 1, {
                _lazyContent: 0
            }), (e()(), l["\u0275eld"](4, 0, null, 0, 11, "mat-expansion-panel-header", [
                ["class", "drag-handle mat-expansion-panel-header"],
                ["role", "button"]
            ], [
                [1, "id", 0],
                [1, "tabindex", 0],
                [1, "aria-controls", 0],
                [1, "aria-expanded", 0],
                [1, "aria-disabled", 0],
                [2, "mat-expanded", null],
                [40, "@expansionHeight", 0]
            ], [
                [null, "mouseenter"],
                [null, "mouseleave"],
                [null, "click"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 5)._toggle() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 5)._keydown(t) && o), "mouseenter" === n && (o = !1 !== i.repositionHoverBox(e.context.$implicit.node) && o), "mouseleave" === n && (o = !1 !== i.hideHoverBox() && o), o
            }, le.c, le.b)), l["\u0275did"](5, 180224, null, 0, oe.e, [oe.c, l.ElementRef, A.i, l.ChangeDetectorRef], null, null), l["\u0275pod"](6, {
                collapsedHeight: 0,
                expandedHeight: 1
            }), l["\u0275pod"](7, {
                value: 0,
                params: 1
            }), (e()(), l["\u0275eld"](8, 0, null, 0, 7, "mat-panel-title", [
                ["class", "name mat-expansion-panel-header-title"]
            ], null, null, null, null, null)), l["\u0275did"](9, 16384, null, 0, oe.f, [], null, null), (e()(), l["\u0275eld"](10, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](11, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Container"])), (e()(), l["\u0275eld"](13, 0, null, null, 0, "span", [], [
                [8, "innerHTML", 1]
            ], null, null, null, null)), (e()(), l["\u0275eld"](14, 0, null, null, 1, "span", [], null, null, null, null, null)), (e()(), l["\u0275ted"](15, null, ["", ""])), (e()(), l["\u0275eld"](16, 0, null, 1, 10, "div", [
                ["class", "container-config"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](17, 0, null, null, 7, "div", [
                ["class", "rows"],
                ["reorderLayoutItems", "row"]
            ], null, null, null, null, null)), l["\u0275did"](18, 1064960, null, 0, ot, [ge, he, Dn, _e, l.ElementRef], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275eld"](19, 0, null, null, 3, "button", [
                ["class", "no-style add-item-button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.layoutPanel.createRow(e.context.$implicit.node, e.context.$implicit.rows[0], "start") && l), l
            }, null, null)), (e()(), l["\u0275eld"](20, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](21, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["+ ADD ROW"])), (e()(), l["\u0275and"](16777216, null, null, 1, null, ut)), l["\u0275did"](24, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, dt)), l["\u0275did"](26, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](27, 0, null, 2, 13, "mat-action-row", [
                ["class", "mat-action-row"]
            ], null, null, null, null, null)), l["\u0275did"](28, 16384, null, 0, oe.d, [], null, null), (e()(), l["\u0275eld"](29, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Modify"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 30).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 30)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 30)._handleTouchend() && o), "click" === n && (o = !1 !== i.openInspectorPanel(e.context.$implicit.node) && o), o
            }, null, null)), l["\u0275did"](30, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](31, 0, null, null, 1, "svg-icon", [
                ["name", "brush"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](32, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](33, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Clone"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 34).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 34)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 34)._handleTouchend() && o), "click" === n && (o = !1 !== i.cloneContainer(e.context.$implicit) && o), o
            }, null, null)), l["\u0275did"](34, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](35, 0, null, null, 1, "svg-icon", [
                ["name", "content-copy"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](36, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](37, 16777216, null, null, 3, "button", [
                ["class", "no-style"],
                ["matTooltip", "Delete"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 38).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 38)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 38)._handleTouchend() && o), "click" === n && (o = !1 !== i.removeItem(e.context.$implicit.node) && o), o
            }, null, null)), l["\u0275did"](38, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](39, 0, null, null, 1, "svg-icon", [
                ["name", "delete"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](40, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](41, 0, null, null, 3, "button", [
                ["class", "no-style add-item-button hide-text"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.layoutPanel.createContainer(e.context.$implicit.node, "after") && l), l
            }, null, null)), (e()(), l["\u0275eld"](42, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](43, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["+ ADD CONTAINER"]))], function(e, n) {
                var t = n.component;
                e(n, 2, 0, t.containerIsSelected(n.context.$implicit)), e(n, 18, 0, "row"), e(n, 24, 0, n.context.$implicit.rows), e(n, 26, 0, t.layoutPanel.selectedRow), e(n, 30, 0, "Modify"), e(n, 32, 0, "brush"), e(n, 34, 0, "Clone"), e(n, 36, 0, "content-copy"), e(n, 38, 0, "Delete"), e(n, 40, 0, "delete")
            }, function(e, n) {
                e(n, 0, 0, n.context.$implicit.id), e(n, 1, 0, l["\u0275nov"](n, 2).expanded, l["\u0275nov"](n, 2)._hasSpacing()), e(n, 4, 0, l["\u0275nov"](n, 5).panel._headerId, l["\u0275nov"](n, 5).panel.disabled ? -1 : 0, l["\u0275nov"](n, 5)._getPanelId(), l["\u0275nov"](n, 5)._isExpanded(), l["\u0275nov"](n, 5).panel.disabled, l["\u0275nov"](n, 5)._isExpanded(), e(n, 7, 0, l["\u0275nov"](n, 5)._getExpandedState(), e(n, 6, 0, l["\u0275nov"](n, 5).collapsedHeight, l["\u0275nov"](n, 5).expandedHeight))), e(n, 13, 0, "&nbsp"), e(n, 15, 0, n.context.index + 1)
            })
        }

        function pt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 8, "mat-accordion", [
                ["class", "containers mat-accordion"],
                ["reorderLayoutItems", "container"]
            ], null, null, null, null, null)), l["\u0275did"](1, 16384, null, 0, oe.a, [], null, null), l["\u0275did"](2, 1064960, null, 0, ot, [ge, he, Dn, _e, l.ElementRef], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275eld"](3, 0, null, null, 3, "button", [
                ["class", "no-style add-item-button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.layoutPanel.createContainer(null, "start") && l), l
            }, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](5, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["+ ADD CONTAINER"])), (e()(), l["\u0275and"](16777216, null, null, 1, null, ct)), l["\u0275did"](8, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 2, 0, "container"), e(n, 8, 0, t.layoutPanel.containers)
            }, null)
        }
        var ht = function() {
                function e(e, n, t, l) {
                    this.activeProject = e, this.projects = n, this.toast = t, this.builderDocument = l, this.loading = !1, this.updateModel = {}, this.errors = {}
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.selectedPage = this.activeProject.getPages()[0], this.builderDocument.loaded.subscribe(function() {
                        e.hydrateUpdateModel()
                    })
                }, e.prototype.createNewPage = function() {
                    var e = this;
                    this.loading = !0;
                    var n = "Page " + (this.activeProject.getPages().length + 1);
                    this.activeProject.getPages().find(function(e) {
                        return e.name === n
                    }) && (n += " Copy");
                    var t = (new E.a).setBaseUrl(this.activeProject.getBaseUrl()).generate("", null, this.activeProject.get().model.framework).getOuterHtml();
                    this.selectedPage = this.activeProject.addPage({
                        name: n,
                        html: t
                    }), console.log(this.activeProject.getPages()), this.activeProject.save().subscribe(function() {
                        e.loading = !1, e.toast.open("Page created")
                    })
                }, e.prototype.canDeleteSelectedPage = function() {
                    return this.selectedPage && this.activeProject.getPages().length > 1
                }, e.prototype.onPageSelected = function() {
                    this.hydrateUpdateModel(), this.activeProject.setActivePage(this.selectedPage)
                }, e.prototype.updateSelectedPage = function() {
                    var e = this;
                    this.loading = !0, this.builderDocument.setMetaTagValue("keywords", this.updateModel.keywords), this.builderDocument.setTitleValue(this.updateModel.title), this.builderDocument.setMetaTagValue("description", this.updateModel.description), this.builderDocument.contentChanged.next("builder");
                    var n = {
                        name: this.updateModel.name,
                        html: this.builderDocument.getOuterHtml()
                    };
                    this.activeProject.updatePage(n).save({
                        thumbnail: !1
                    }).subscribe(function() {
                        e.loading = !1, e.toast.open("Page updated")
                    })
                }, e.prototype.deleteSelectedPage = function() {
                    var e = this;
                    this.loading = !0, this.activeProject.removePage(this.selectedPage.name), this.selectedPage = this.activeProject.getActivePage(), this.activeProject.save({
                        thumbnail: !1
                    }).subscribe(function() {
                        e.loading = !1, e.toast.open("Page deleted")
                    })
                }, e.prototype.duplicateSelectedPage = function() {
                    var e = this;
                    this.loading = !0, this.activeProject.addPage({
                        name: this.selectedPage.name + " Copy",
                        html: this.selectedPage.html
                    }), this.selectedPage = this.activeProject.getActivePage(), this.activeProject.save({
                        thumbnail: !1
                    }).subscribe(function() {
                        e.loading = !1, e.toast.open("Page duplicated")
                    })
                }, e.prototype.hydrateUpdateModel = function() {
                    this.updateModel = {
                        name: this.selectedPage.name,
                        title: this.builderDocument.getTitleValue(),
                        description: this.builderDocument.getMetaTagValue("description"),
                        keywords: this.builderDocument.getMetaTagValue("keywords")
                    }
                }, e
            }(),
            ft = t("Dki4"),
            mt = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\npages-panel{display:block;padding:15px;background: rgba(255,255,255,0.5);border: 1px solid rgba(255,255,255,0.5);min-width:280px;}pages-panel .active-page-actions{color:rgba(0,0,0,.54);text-align:right}pages-panel .new-page-button{width:100%;height:45px;margin-bottom:15px}"]
                ],
                data: {}
            });

        function gt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                ngValue: [0, "ngValue"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                ngValue: [0, "ngValue"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit), e(n, 2, 0, n.context.$implicit)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function bt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "p", [
                ["class", "error"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.errors.name)
            })
        }

        function vt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "p", [
                ["class", "error"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.errors.title)
            })
        }

        function yt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "p", [
                ["class", "error"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.errors.description)
            })
        }

        function xt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "p", [
                ["class", "error"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.errors.keywords)
            })
        }

        function wt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 63, "form", [
                ["class", "page-options many-inputs content-panel"],
                ["ngNativeValidate", ""]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngSubmit"],
                [null, "submit"],
                [null, "reset"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "submit" === n && (o = !1 !== l["\u0275nov"](e, 1).onSubmit(t) && o), "reset" === n && (o = !1 !== l["\u0275nov"](e, 1).onReset() && o), "ngSubmit" === n && (o = !1 !== i.updateSelectedPage() && o), o
            }, null, null)), l["\u0275did"](1, 4210688, null, 0, Pe.q, [
                [8, null],
                [8, null]
            ], null, {
                ngSubmit: "ngSubmit"
            }), l["\u0275prd"](2048, null, Pe.c, null, [Pe.q]), l["\u0275did"](3, 16384, null, 0, Pe.p, [Pe.c], null, null), (e()(), l["\u0275eld"](4, 0, null, null, 2, "div", [
                ["class", "header"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](5, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page SEO Options"])), (e()(), l["\u0275eld"](7, 0, null, null, 13, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](8, 0, null, null, 2, "label", [
                ["for", "selected-page-name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](9, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page Name"])), (e()(), l["\u0275eld"](11, 0, null, null, 7, "input", [
                ["id", "selected-page-name"],
                ["name", "selected-page-name"],
                ["required", ""],
                ["type", "text"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 12)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 12).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 12)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 12)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.updateModel.name = t) && o), o
            }, null, null)), l["\u0275did"](12, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](13, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](16, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](18, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, bt)), l["\u0275did"](20, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](21, 0, null, null, 11, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](22, 0, null, null, 2, "label", [
                ["for", "selected-page-title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](23, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page Title"])), (e()(), l["\u0275eld"](25, 0, null, null, 5, "input", [
                ["id", "selected-page-title"],
                ["name", "selected-page-title"],
                ["type", "text"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 26)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 26).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 26)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 26)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.updateModel.title = t) && o), o
            }, null, null)), l["\u0275did"](26, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](28, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](30, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, vt)), l["\u0275did"](32, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](33, 0, null, null, 11, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](34, 0, null, null, 2, "label", [
                ["for", "selected-page-description"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](35, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page Description"])), (e()(), l["\u0275eld"](37, 0, null, null, 5, "textarea", [
                ["id", "selected-page-description"],
                ["name", "selected-page-description"],
                ["type", "text"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 38)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 38).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 38)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 38)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.updateModel.description = t) && o), o
            }, null, null)), l["\u0275did"](38, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](40, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](42, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, yt)), l["\u0275did"](44, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](45, 0, null, null, 14, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](46, 0, null, null, 2, "label", [
                ["for", "selected-page-keywords"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](47, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page Keywords"])), (e()(), l["\u0275eld"](49, 0, null, null, 5, "input", [
                ["id", "selected-page-keywords"],
                ["name", "selected-page-keywords"],
                ["type", "text"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 50)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 50).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 50)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 50)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.updateModel.keywords = t) && o), o
            }, null, null)), l["\u0275did"](50, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](52, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](54, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](55, 0, null, null, 2, "p", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](56, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Separate each one with a comma."])), (e()(), l["\u0275and"](16777216, null, null, 1, null, xt)), l["\u0275did"](59, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](60, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "submit"]
            ], [
                [8, "disabled", 0]
            ], null, null, B.d, B.b)), l["\u0275did"](61, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](62, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Update"]))], function(e, n) {
                var t = n.component;
                e(n, 13, 0, ""), e(n, 16, 0, "selected-page-name", t.updateModel.name), e(n, 20, 0, t.errors.name), e(n, 28, 0, "selected-page-title", t.updateModel.title), e(n, 32, 0, t.errors.title), e(n, 40, 0, "selected-page-description", t.updateModel.description), e(n, 44, 0, t.errors.description), e(n, 52, 0, "selected-page-keywords", t.updateModel.keywords), e(n, 59, 0, t.errors.keywords), e(n, 61, 0, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 3).ngClassUntouched, l["\u0275nov"](n, 3).ngClassTouched, l["\u0275nov"](n, 3).ngClassPristine, l["\u0275nov"](n, 3).ngClassDirty, l["\u0275nov"](n, 3).ngClassValid, l["\u0275nov"](n, 3).ngClassInvalid, l["\u0275nov"](n, 3).ngClassPending), e(n, 11, 0, l["\u0275nov"](n, 13).required ? "" : null, l["\u0275nov"](n, 18).ngClassUntouched, l["\u0275nov"](n, 18).ngClassTouched, l["\u0275nov"](n, 18).ngClassPristine, l["\u0275nov"](n, 18).ngClassDirty, l["\u0275nov"](n, 18).ngClassValid, l["\u0275nov"](n, 18).ngClassInvalid, l["\u0275nov"](n, 18).ngClassPending), e(n, 25, 0, l["\u0275nov"](n, 30).ngClassUntouched, l["\u0275nov"](n, 30).ngClassTouched, l["\u0275nov"](n, 30).ngClassPristine, l["\u0275nov"](n, 30).ngClassDirty, l["\u0275nov"](n, 30).ngClassValid, l["\u0275nov"](n, 30).ngClassInvalid, l["\u0275nov"](n, 30).ngClassPending), e(n, 37, 0, l["\u0275nov"](n, 42).ngClassUntouched, l["\u0275nov"](n, 42).ngClassTouched, l["\u0275nov"](n, 42).ngClassPristine, l["\u0275nov"](n, 42).ngClassDirty, l["\u0275nov"](n, 42).ngClassValid, l["\u0275nov"](n, 42).ngClassInvalid, l["\u0275nov"](n, 42).ngClassPending), e(n, 49, 0, l["\u0275nov"](n, 54).ngClassUntouched, l["\u0275nov"](n, 54).ngClassTouched, l["\u0275nov"](n, 54).ngClassPristine, l["\u0275nov"](n, 54).ngClassDirty, l["\u0275nov"](n, 54).ngClassValid, l["\u0275nov"](n, 54).ngClassInvalid, l["\u0275nov"](n, 54).ngClassPending), e(n, 60, 0, l["\u0275nov"](n, 61).disabled || null)
            })
        }

        function _t(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 4, "button", [
                ["class", "new-page-button"],
                ["color", "accent"],
                ["mat-raised-button", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.createNewPage() && l), l
            }, B.d, B.b)), l["\u0275did"](1, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), (e()(), l["\u0275eld"](2, 0, null, 0, 1, "svg-icon", [
                ["name", "add"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](3, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275ted"](-1, 0, [" New Page"])), (e()(), l["\u0275eld"](5, 0, null, null, 21, "div", [
                ["class", "content-panel"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](6, 0, null, null, 2, "div", [
                ["class", "header"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](7, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Active Page"])), (e()(), l["\u0275eld"](9, 0, null, null, 8, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 7, "select", [
                ["id", "active-page"],
                ["name", "active-page"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 11).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 11).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.selectedPage = t) && o), "ngModelChange" === n && (o = !1 !== i.onPageSelected() && o), o
            }, null, null)), l["\u0275did"](11, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](13, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](15, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, gt)), l["\u0275did"](17, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 8, "div", [
                ["class", "active-page-actions"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](19, 16777216, null, null, 3, "button", [
                ["color", "warn"],
                ["mat-button", ""],
                ["matTooltip", "Delete"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 21).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 21)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 21)._handleTouchend() && o), "click" === n && (o = !1 !== i.deleteSelectedPage() && o), o
            }, B.d, B.b)), l["\u0275did"](20, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](21, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["Delete"])), (e()(), l["\u0275eld"](23, 16777216, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-button", ""],
                ["matTooltip", "Duplicate"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 25).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 25)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 25)._handleTouchend() && o), "click" === n && (o = !1 !== i.duplicateSelectedPage() && o), o
            }, B.d, B.b)), l["\u0275did"](24, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](25, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["Duplicate"])), (e()(), l["\u0275and"](16777216, null, null, 1, null, wt)), l["\u0275did"](28, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 1, 0, t.loading, "accent"), e(n, 3, 0, "add"), e(n, 13, 0, "active-page", t.selectedPage), e(n, 17, 0, t.activeProject.getPages()), e(n, 20, 0, !t.canDeleteSelectedPage() || t.loading, "warn"), e(n, 21, 0, "Delete"), e(n, 24, 0, t.loading, "accent"), e(n, 25, 0, "Duplicate"), e(n, 28, 0, t.selectedPage)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).disabled || null), e(n, 10, 0, l["\u0275nov"](n, 15).ngClassUntouched, l["\u0275nov"](n, 15).ngClassTouched, l["\u0275nov"](n, 15).ngClassPristine, l["\u0275nov"](n, 15).ngClassDirty, l["\u0275nov"](n, 15).ngClassValid, l["\u0275nov"](n, 15).ngClassInvalid, l["\u0275nov"](n, 15).ngClassPending), e(n, 19, 0, l["\u0275nov"](n, 20).disabled || null), e(n, 23, 0, l["\u0275nov"](n, 24).disabled || null)
            })
        }
        var kt = t("IkyP"),
            Ct = t("3uJi"),
            Et = function() {
                function e(e, n, t, l, o, i) {
                    this.overlay = e, this.inspector = n, this.activeProject = t, this.inspectorDrawer = l, this.loader = o, this.localStorage = i
                }
                return e.prototype.ngOnInit = function() {
                    this.hydrateModels()
                }, e.prototype.changeFramework = function(e) {
                    var n = this;
                    this.loader.show(), this.activeProject.changeFramework(e).then(function() {
                        n.loader.hide()
                    })
                }, e.prototype.openTemplatesPanel = function() {
                    this.inspectorDrawer.toggle("templates")
                }, e.prototype.openThemesPanel = function() {
                    this.inspectorDrawer.toggle("themes")
                }, e.prototype.updateSettings = function() {
                    for (var e in this.settings) this.localStorage.set("settings." + e, this.settings[e])
                }, e.prototype.hydrateModels = function() {
                    this.selectedFramework = this.activeProject.get().model.framework, this.settings = {
                        hoverBoxEnabled: this.localStorage.get("settings.hoverBoxEnabled", !0),
                        selectedBoxEnabled: this.localStorage.get("settings.selectedBoxEnabled", !0),
                        autoSave: this.localStorage.get("settings.autoSave", !1)
                    }
                }, e
            }(),
            Rt = t("wK1S"),
            St = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nsettings-panel{display:block;min-width:280px;height:auto;padding:15px;background: rgba(255,255,255,0.5);border: 1px solid rgba(255,255,255,0.5);}settings-panel .input-container>.fake-label{color:inherit;padding-bottom:5px}settings-panel .input-container>.box{display:-webkit-box;display:-ms-flexbox;display:flex}settings-panel .input-container>.box>.fake-input{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;margin-right:5px;height:38px;background-color:#fff;border:1px solid #e0e0e0;padding:0 10px;color:inherit;line-height:38px;cursor:pointer;text-transform:capitalize}settings-panel .setting-container>p{color:rgba(0,0,0,.54)}"]
                ],
                data: {}
            });

        function Tt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "span", [], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.activeProject.getTemplate().name)
            })
        }

        function Pt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["None"]))], null, null)
        }

        function It(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 51, "div", [
                ["class", "content-panel many-inputs"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 2, "div", [
                ["class", "header"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Project Settings"])), (e()(), l["\u0275eld"](4, 0, null, null, 22, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 2, "label", [
                ["for", "project-framework"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](6, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Framework"])), (e()(), l["\u0275eld"](8, 0, null, null, 18, "select", [
                ["id", "project-framework"],
                ["name", "project-framework"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 9).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 9).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.selectedFramework = t) && o), "ngModelChange" === n && (o = !1 !== i.changeFramework(i.selectedFramework) && o), o
            }, null, null)), l["\u0275did"](9, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](11, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](13, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](14, 0, null, null, 4, "option", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](15, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](16, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](17, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["None"])), (e()(), l["\u0275eld"](19, 0, null, null, 3, "option", [
                ["value", "bootstrap-3"]
            ], null, null, null, null, null)), l["\u0275did"](20, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](21, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["Bootstrap 3"])), (e()(), l["\u0275eld"](23, 0, null, null, 3, "option", [
                ["value", "bootstrap-4"]
            ], null, null, null, null, null)), l["\u0275did"](24, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](25, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, null, ["Bootstrap 4"])), (e()(), l["\u0275eld"](27, 0, null, null, 13, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](28, 0, null, null, 2, "div", [
                ["class", "fake-label"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](29, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Template"])), (e()(), l["\u0275eld"](31, 0, null, null, 9, "div", [
                ["class", "box"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](32, 0, null, null, 4, "div", [
                ["class", "fake-input"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openTemplatesPanel() && l), l
            }, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Tt)), l["\u0275did"](34, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Pt)), l["\u0275did"](36, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](37, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openTemplatesPanel() && l), l
            }, B.d, B.b)), l["\u0275did"](38, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](39, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"])), (e()(), l["\u0275eld"](41, 0, null, null, 10, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](42, 0, null, null, 2, "div", [
                ["class", "fake-label"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](43, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Theme"])), (e()(), l["\u0275eld"](45, 0, null, null, 6, "div", [
                ["class", "box"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](46, 0, null, null, 1, "div", [
                ["class", "fake-input"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openThemesPanel() && l), l
            }, null, null)), (e()(), l["\u0275ted"](47, null, ["", ""])), (e()(), l["\u0275eld"](48, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.openThemesPanel() && l), l
            }, B.d, B.b)), l["\u0275did"](49, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](50, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"])), (e()(), l["\u0275eld"](52, 0, null, null, 38, "div", [
                ["class", "content-panel many-inputs"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](53, 0, null, null, 2, "div", [
                ["class", "header"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](54, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Builder Settings"])), (e()(), l["\u0275eld"](56, 0, null, null, 11, "div", [
                ["class", "setting-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](57, 0, null, null, 7, "mat-slide-toggle", [
                ["class", "mat-slide-toggle"],
                ["trans", ""]
            ], [
                [8, "id", 0],
                [2, "mat-checked", null],
                [2, "mat-disabled", null],
                [2, "mat-slide-toggle-label-before", null],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "ngModelChange" === n && (l = !1 !== (o.settings.autoSave = t) && l), "ngModelChange" === n && (l = !1 !== o.updateSettings() && l), l
            }, kt.b, kt.a)), l["\u0275did"](58, 1228800, null, 0, Ct.a, [l.ElementRef, L.a, A.i, l.ChangeDetectorRef, [8, null]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Ct.a]), l["\u0275did"](60, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](62, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](63, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Auto Save"])), (e()(), l["\u0275eld"](65, 0, null, null, 2, "p", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](66, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Toggle auto saving of project when changes are made in the builder."])), (e()(), l["\u0275eld"](68, 0, null, null, 11, "div", [
                ["class", "setting-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](69, 0, null, null, 7, "mat-slide-toggle", [
                ["class", "mat-slide-toggle"],
                ["trans", ""]
            ], [
                [8, "id", 0],
                [2, "mat-checked", null],
                [2, "mat-disabled", null],
                [2, "mat-slide-toggle-label-before", null],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "ngModelChange" === n && (l = !1 !== (o.settings.hoverBoxEnabled = t) && l), "ngModelChange" === n && (l = !1 !== o.updateSettings() && l), l
            }, kt.b, kt.a)), l["\u0275did"](70, 1228800, null, 0, Ct.a, [l.ElementRef, L.a, A.i, l.ChangeDetectorRef, [8, null]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Ct.a]), l["\u0275did"](72, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](74, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](75, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Hover Box"])), (e()(), l["\u0275eld"](77, 0, null, null, 2, "p", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](78, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Toggle visibility of box that appears when hovering over elements in the builder."])), (e()(), l["\u0275eld"](80, 0, null, null, 10, "div", [
                ["class", "setting-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](81, 0, null, null, 7, "mat-slide-toggle", [
                ["class", "mat-slide-toggle"],
                ["trans", ""]
            ], [
                [8, "id", 0],
                [2, "mat-checked", null],
                [2, "mat-disabled", null],
                [2, "mat-slide-toggle-label-before", null],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "ngModelChange" === n && (l = !1 !== (o.settings.selectedBoxEnabled = t) && l), "ngModelChange" === n && (l = !1 !== o.updateSettings() && l), l
            }, kt.b, kt.a)), l["\u0275did"](82, 1228800, null, 0, Ct.a, [l.ElementRef, L.a, A.i, l.ChangeDetectorRef, [8, null]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Ct.a]), l["\u0275did"](84, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](86, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](87, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Selected Box"])), (e()(), l["\u0275eld"](89, 0, null, null, 1, "p", [
                ["class", "ng-binding"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Toggle visibility of box that appears when clicking on element in the builder."]))], function(e, n) {
                var t = n.component;
                e(n, 11, 0, "project-framework", t.selectedFramework), e(n, 15, 0, null), e(n, 16, 0, null), e(n, 20, 0, "bootstrap-3"), e(n, 21, 0, "bootstrap-3"), e(n, 24, 0, "bootstrap-4"), e(n, 25, 0, "bootstrap-4"), e(n, 34, 0, t.activeProject.hasTemplate()), e(n, 36, 0, !t.activeProject.hasTemplate()), e(n, 38, 0, "accent"), e(n, 49, 0, "accent"), e(n, 60, 0, t.settings.autoSave), e(n, 72, 0, t.settings.hoverBoxEnabled), e(n, 84, 0, t.settings.selectedBoxEnabled)
            }, function(e, n) {
                var t = n.component;
                e(n, 8, 0, l["\u0275nov"](n, 13).ngClassUntouched, l["\u0275nov"](n, 13).ngClassTouched, l["\u0275nov"](n, 13).ngClassPristine, l["\u0275nov"](n, 13).ngClassDirty, l["\u0275nov"](n, 13).ngClassValid, l["\u0275nov"](n, 13).ngClassInvalid, l["\u0275nov"](n, 13).ngClassPending), e(n, 37, 0, l["\u0275nov"](n, 38).disabled || null), e(n, 47, 0, t.activeProject.get().model.theme || "None"), e(n, 48, 0, l["\u0275nov"](n, 49).disabled || null), e(n, 57, 1, [l["\u0275nov"](n, 58).id, l["\u0275nov"](n, 58).checked, l["\u0275nov"](n, 58).disabled, "before" == l["\u0275nov"](n, 58).labelPosition, l["\u0275nov"](n, 62).ngClassUntouched, l["\u0275nov"](n, 62).ngClassTouched, l["\u0275nov"](n, 62).ngClassPristine, l["\u0275nov"](n, 62).ngClassDirty, l["\u0275nov"](n, 62).ngClassValid, l["\u0275nov"](n, 62).ngClassInvalid, l["\u0275nov"](n, 62).ngClassPending]), e(n, 69, 1, [l["\u0275nov"](n, 70).id, l["\u0275nov"](n, 70).checked, l["\u0275nov"](n, 70).disabled, "before" == l["\u0275nov"](n, 70).labelPosition, l["\u0275nov"](n, 74).ngClassUntouched, l["\u0275nov"](n, 74).ngClassTouched, l["\u0275nov"](n, 74).ngClassPristine, l["\u0275nov"](n, 74).ngClassDirty, l["\u0275nov"](n, 74).ngClassValid, l["\u0275nov"](n, 74).ngClassInvalid, l["\u0275nov"](n, 74).ngClassPending]), e(n, 81, 1, [l["\u0275nov"](n, 82).id, l["\u0275nov"](n, 82).checked, l["\u0275nov"](n, 82).disabled, "before" == l["\u0275nov"](n, 82).labelPosition, l["\u0275nov"](n, 86).ngClassUntouched, l["\u0275nov"](n, 86).ngClassTouched, l["\u0275nov"](n, 86).ngClassPristine, l["\u0275nov"](n, 86).ngClassDirty, l["\u0275nov"](n, 86).ngClassValid, l["\u0275nov"](n, 86).ngClassInvalid, l["\u0275nov"](n, 86).ngClassPending])
            })
        }
        var Dt = t("wu+X"),
            Ot = t("ZFRd"),
            Mt = function() {
                function e(e, n) {
                    this.livePreview = e, this.contextBoxes = n, this.visible = !1, this.selectedIndex = 3
                }
                return e.prototype.toggleVisibility = function() {
                    var e = this;
                    this.visible = !this.visible, this.visible && requestAnimationFrame(function() {
                        return e.tabs.selectedIndex = e.selectedIndex
                    })
                }, e.prototype.switchDevice = function(e) {
                    this.selectedIndex = e.index, this.livePreview.setWidth(this.getWidthFromIndex(e.index)), this.contextBoxes.hideBoxes()
                }, e.prototype.getWidthFromIndex = function(e) {
                    switch (e) {
                        case 0:
                            return "phone";
                        case 1:
                            return "tablet";
                        case 2:
                            return "laptop";
                        case 3:
                            return "desktop"
                    }
                }, e
            }(),
            Nt = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\ndevice-switcher{display:block;width:100%;overflow:hidden;position:absolute;left:0;bottom:50px;background-color:#fff;-webkit-box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12);box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}device-switcher .device-description{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:155px;background-color:#fafafa}device-switcher .device-description>svg-icon{width:45px;height:45px;margin-bottom:10px}device-switcher .mat-tab-label{min-width:25%}"]
                ],
                data: {
                    animation: [{
                        type: 7,
                        name: "toggleAnimation",
                        definitions: [{
                            type: 0,
                            name: "true",
                            styles: {
                                type: 6,
                                styles: {
                                    height: "*",
                                    display: "block"
                                },
                                offset: null
                            },
                            options: void 0
                        }, {
                            type: 0,
                            name: "false",
                            styles: {
                                type: 6,
                                styles: {
                                    height: "0",
                                    display: "none"
                                },
                                offset: null
                            },
                            options: void 0
                        }, {
                            type: 1,
                            expr: "true <=> false",
                            animation: {
                                type: 4,
                                styles: null,
                                timings: "225ms cubic-bezier(.4,0,.2,1)"
                            },
                            options: null
                        }],
                        options: {}
                    }]
                }
            });

        function Bt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "svg-icon", [
                ["name", "phone-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](1, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 1, 0, "phone-android")
            }, null)
        }

        function jt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "svg-icon", [
                ["name", "tablet-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](1, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 1, 0, "tablet-android")
            }, null)
        }

        function Lt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "svg-icon", [
                ["name", "laptop-chromebook"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](1, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 1, 0, "laptop-chromebook")
            }, null)
        }

        function At(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "svg-icon", [
                ["name", "desktop-windows"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](1, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 1, 0, "desktop-windows")
            }, null)
        }

        function Ft(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                tabs: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 54, "mat-tab-group", [
                ["class", "mat-tab-group"],
                ["color", "accent"]
            ], [
                [2, "mat-tab-group-dynamic-height", null],
                [2, "mat-tab-group-inverted-header", null]
            ], [
                [null, "selectedTabChange"]
            ], function(e, n, t) {
                var l = !0;
                return "selectedTabChange" === n && (l = !1 !== e.component.switchDevice(t) && l), l
            }, Dt.c, Dt.b)), l["\u0275did"](2, 3325952, [
                [1, 4],
                ["tabs", 4]
            ], 1, Ot.e, [l.ElementRef, l.ChangeDetectorRef], {
                color: [0, "color"],
                dynamicHeight: [1, "dynamicHeight"]
            }, {
                selectedTabChange: "selectedTabChange"
            }), l["\u0275qud"](603979776, 2, {
                _tabs: 1
            }), (e()(), l["\u0275eld"](4, 16777216, null, null, 12, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](5, 770048, [
                [2, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 3, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, Bt)), l["\u0275did"](8, 16384, [
                [3, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](9, 0, null, 0, 7, "div", [
                ["class", "device-description"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 1, "svg-icon", [
                ["name", "phone-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](11, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](12, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Phone"])), (e()(), l["\u0275eld"](15, 0, null, null, 1, "div", [
                ["class", "size"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["768px and Smaller"])), (e()(), l["\u0275eld"](17, 16777216, null, null, 12, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](18, 770048, [
                [2, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 4, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, jt)), l["\u0275did"](21, 16384, [
                [4, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](22, 0, null, 0, 7, "div", [
                ["class", "device-description"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](23, 0, null, null, 1, "svg-icon", [
                ["name", "tablet-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](24, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](25, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](26, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Tablet"])), (e()(), l["\u0275eld"](28, 0, null, null, 1, "div", [
                ["class", "size"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["768px - 992px"])), (e()(), l["\u0275eld"](30, 16777216, null, null, 12, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](31, 770048, [
                [2, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 5, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, Lt)), l["\u0275did"](34, 16384, [
                [5, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](35, 0, null, 0, 7, "div", [
                ["class", "device-description"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](36, 0, null, null, 1, "svg-icon", [
                ["name", "laptop-chromebook"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](37, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](38, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](39, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Laptop"])), (e()(), l["\u0275eld"](41, 0, null, null, 1, "div", [
                ["class", "size"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["992px - 1200px"])), (e()(), l["\u0275eld"](43, 16777216, null, null, 12, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](44, 770048, [
                [2, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 6, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, At)), l["\u0275did"](47, 16384, [
                [6, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](48, 0, null, 0, 7, "div", [
                ["class", "device-description"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](49, 0, null, null, 1, "svg-icon", [
                ["name", "desktop-windows"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](50, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](51, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](52, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Desktop"])), (e()(), l["\u0275eld"](54, 0, null, null, 1, "div", [
                ["class", "size"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["1200px and Larger"]))], function(e, n) {
                e(n, 2, 0, "accent", !0), e(n, 5, 0), e(n, 11, 0, "phone-android"), e(n, 18, 0), e(n, 24, 0, "tablet-android"), e(n, 31, 0), e(n, 37, 0, "laptop-chromebook"), e(n, 44, 0), e(n, 50, 0, "desktop-windows")
            }, function(e, n) {
                e(n, 1, 0, l["\u0275nov"](n, 2).dynamicHeight, "below" === l["\u0275nov"](n, 2).headerPosition)
            })
        }
        var Vt = t("pxYe"),
            Ht = function() {
                function e(e, n, t, l, o, i, a, r, u, s, d) {
                    this.inspector = e, this.undoManager = n, this.codeEditor = t, this.projects = l, this.activeProject = o, this.toast = i, this.el = a, this.settings = r, this.contextBoxes = u, this.modal = s, this.currentUser = d
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.codeEditor.setOrigin(this.el), this.inspector.elementRef = this.el, this.el.nativeElement.addEventListener("mouseenter", function(n) {
                        e.contextBoxes.hideBox("hover")
                    })
                }, e.prototype.toggleCodeEditor = function() {
                    this.codeEditor.toggle()
                }, e.prototype.saveProject = function() {
                    var e = this;
                    this.activeProject.save().subscribe(function() {
                        e.toast.open("Project saved")
                    })
                }, e.prototype.openPublishProjectModal = function() {
                    this.modal.open(Vt.a, {
                        project: this.activeProject.get().model
                    })
                }, e.prototype.openPreview = function() {
                    var e = this;
                    this.activeProject.save().subscribe(function() {
                        window.open(e.activeProject.getSiteUrl(), "_blank")
                    })
                }, e.prototype.toggleDeviceSwitcher = function() {
                    this.deviceSwitcher.toggleVisibility()
                }, e.prototype.downloadProject = function() {
                    var e = this;
                    this.activeProject.save({
                        thumbnail: !1
                    }).subscribe(function() {
                        window.open(e.settings.getBaseUrl(!0) + "secure/projects/" + e.activeProject.get().model.id + "/download", "_blank")
                    })
                }, e
            }(),
            zt = ["chrome", "clouds", "crimson_editor", "tomorrow_night", "dawn", "dreamweaver", "eclipse", "github", "solarized_light", "textmate", "tomorrow", "xcode", "kuroir", "katzen_milch", "ambiance", "chaos", "clouds_midnight", "cobalt", "idle_fingers", "kr_theme", "merbivore", "merbivore_soft", "mono_industrial", "monokai", "pastel_on_dark", "solarized_light", "terminal", "tomorrow_night_blue", "tomorrow_night_bright", "tomorrow_night_80s", "twilight", "vibrant_ink"],
            qt = t("IQ3e"),
            Ut = function() {
                function e(e, n, t, l) {
                    this.utils = e, this.activeProject = n, this.selectedElement = t, this.builderDocument = l, this.loading = !1, this.suppressChangeEvents = !1, this.theme = "chrome", this.themes = zt, this.activeEditor = "html", this.contentsChange = new _.a, this.close = new _.a, this.loaded = new _.a, this.subscriptions = []
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.initEditor().then(function() {
                        e.updateEditorContents(e.activeEditor);
                        var n = e.selectedElement.changed.subscribe(function() {
                            e.selectedElement.node && e.selectNodeSource(e.selectedElement.node)
                        });
                        e.bindToBuilderDocumentChangeEvent(), e.bindToEditorChangeEvent(), e.subscriptions.push(n), setTimeout(function() {
                            e.loaded.next(e), e.loaded.complete()
                        })
                    })
                }, e.prototype.ngOnDestroy = function() {
                    this.editor && this.editor.destroy(), this.subscriptions.forEach(function(e) {
                        e && e.unsubscribe()
                    })
                }, e.prototype.afterLoaded = function() {
                    return this.loaded.asObservable()
                }, e.prototype.onClose = function() {
                    return this.close.asObservable()
                }, e.prototype.selectNodeSource = function(e) {
                    this.editor.find(e.outerHTML)
                }, e.prototype.useTheme = function(e) {
                    this.editor.setTheme("ace/theme/" + e)
                }, e.prototype.switchType = function(e) {
                    this.activeEditor = e, this.changeEditorMode(e), this.updateEditorContents(e)
                }, e.prototype.updateEditorContents = function(e) {
                    "html" === e ? this.setEditorValue(qt(this.builderDocument.getOuterHtml())) : "css" === e ? this.setEditorValue(this.activeProject.get().css) : "js" === e && this.setEditorValue(this.activeProject.get().js)
                }, e.prototype.bindToEditorChangeEvent = function() {
                    var e = this,
                        n = this.contentsChange.pipe(Object(k.a)(800)).subscribe(function() {
                            var n = !1;
                            "html" === e.activeEditor ? e.builderDocument.setHtml(e.editor.getValue(), "codeEditor") : "css" === e.activeEditor ? (e.activeProject.get().css = e.editor.getValue(), n = !0) : "js" === e.activeEditor && (e.activeProject.get().js = e.editor.getValue(), n = !0), n && e.activeProject.save({
                                thumbnail: !1
                            }).subscribe(function() {
                                e.builderDocument.reload("codeEditor")
                            })
                        });
                    this.subscriptions.push(n)
                }, e.prototype.bindToBuilderDocumentChangeEvent = function() {
                    var e = this,
                        n = this.builderDocument.contentChanged.pipe(Object(k.a)(500)).subscribe(function(n) {
                            "codeEditor" !== n && e.updateEditorContents(e.activeEditor)
                        });
                    this.subscriptions.push(n)
                }, e.prototype.setEditorValue = function(e) {
                    this.suppressChangeEvents = !0, this.editor.getValue() !== e && this.editor.setValue(e, -1), this.suppressChangeEvents = !1
                }, e.prototype.activeTypeIs = function(e) {
                    return this.activeEditor === e
                }, e.prototype.closeEditor = function() {
                    this.close.next(), this.close.complete()
                }, e.prototype.initEditor = function(e) {
                    var n = this;
                    return void 0 === e && (e = "html"), this.loading = !0, this.utils.loadScript("js/ace/ace.js").then(function() {
                        n.editor = ace.edit(n.editorEl.nativeElement), n.changeEditorMode(e), n.useTheme("chrome"), n.editor.$blockScrolling = 1 / 0, n.loading = !1, n.editor.on("change", function() {
                            n.suppressChangeEvents || n.contentsChange.next()
                        })
                    })
                }, e.prototype.changeEditorMode = function(e) {
                    e = "js" === e ? "javascript" : e, this.editor.getSession().setMode("ace/mode/" + e)
                }, e
            }(),
            Wt = function() {
                function e(e) {
                    this.overlay = e
                }
                return e.prototype.toggle = function() {
                    this.overlayRef ? this.close() : this.open()
                }, e.prototype.open = function() {
                    var e = this;
                    if (this.overlayRef) return this.componentRef.instance.afterLoaded();
                    var n = this.overlay.position().connectedTo(this.origin, {
                        originX: "end",
                        originY: "bottom"
                    }, {
                        overlayX: "start",
                        overlayY: "bottom"
                    }).withFallbackPosition({
                        originX: "end",
                        originY: "top"
                    }, {
                        overlayX: "start",
                        overlayY: "top"
                    }).withOffsetX(15).withOffsetY(15);
                    this.overlayRef && this.overlayRef.dispose();
                    var t = document.querySelector("live-preview").getBoundingClientRect();
                    return this.overlayRef = this.overlay.create({
                        positionStrategy: n,
                        width: t.width - 50,
                        height: t.height - 30
                    }), this.componentRef = this.overlayRef.attach(new Ge.d(Ut)), this.componentRef.instance.onClose().subscribe(function() {
                        e.close()
                    }), this.componentRef.instance.afterLoaded()
                }, e.prototype.close = function() {
                    this.overlayRef && (this.overlayRef.dispose(), this.overlayRef = null)
                }, e.prototype.setOrigin = function(e) {
                    this.origin = e
                }, e
            }(),
            $t = t("i4Ku"),
            Xt = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\ninspector{display:-webkit-box;display:-ms-flexbox;display:flex;position:relative;z-index:3;-webkit-box-shadow:1px 0 2px rgba(0,0,0,.5);box-shadow:1px 0 2px rgba(0,0,0,.5)}inspector .mat-expansion-panel{margin-bottom:10px;border:1px solid #e0e0e0}inspector .mat-expansion-panel.mat-expanded{background-color:#fff}inspector .mat-expansion-panel.mat-expanded>.mat-expansion-panel-header,inspector .mat-expansion-panel:not(.mat-expanded)>.mat-expansion-panel-header:not([aria-disabled=true]):hover{background-color:#fafafa}inspector .mat-expansion-panel>.mat-expansion-panel-header{border-radius:3px;background-color:#fff;overflow:hidden}inspector .mat-expansion-panel>.mat-expansion-panel-header .mat-expansion-panel-header-title{color:inherit;font-weight:500;text-transform:capitalize;font-size:1.4rem}inspector .mat-expansion-panel>.mat-expansion-panel-header .mat-expansion-indicator{padding-bottom:5px}inspector .mat-expansion-panel>.mat-expansion-panel-header .mat-expansion-indicator:after{color:inherit}inspector .mat-expansion-panel .mat-expansion-panel-body{margin:8px;padding:0;overflow:hidden}inspector .input-container input,inspector .input-container select,inspector .input-container textarea{display:block;width:100%;margin:0 0 5px;border-color:#e0e0e0;background-color:#fff;color:inherit}inspector>.inspector-nav{position:relative;z-index:2;width:120px;-webkit-box-flex:0;-ms-flex:0 0 120px;flex:0 0 120px;height:100%;color:rgba(0,0,0,.54);text-align:center;padding:20px 0}inspector>.inspector-nav>.back-button{position:absolute;bottom:10px;left:32px;background-color:#A932C7;border-radius:100%;padding:2px 3px 0px 2px;font-size: 20px;line-height:20px;color:#fff;}inspector>.inspector-nav>.panel-nav{margin-top:50px}inspector>.inspector-nav>.panel-nav>.panel-nav-item{cursor:pointer;display:block;width:82%;text-align:left;margin-bottom:10px;min-width:0;line-height:normal;padding-left:0;margin-left:10px;}inspector>.inspector-nav>.panel-nav>.panel-nav-item[disabled]{color:rgba(0,0,0,.38);cursor:auto}inspector>.inspector-nav>.panel-nav>.panel-nav-item.active{box-shadow: 0 2px 5px 0 rgba(22, 45, 61, 0.58);}inspector>.inspector-nav>.panel-nav>.panel-nav-item:hover:not([disabled]):not(.active){}inspector>.inspector-nav>.panel-nav>.panel-nav-item .mat-button-focus-overlay{background-color:transparent}inspector>.inspector-nav>.panel-nav>.panel-nav-item svg-icon{display:inline-block;width:35px;height:35px;background: linear-gradient(to bottom, rgba(255, 255, 255, 0.96) 0%, rgba(238, 238, 238, 0.96) 100%);border-radius: 5px;}inspector>.inspector-nav>.panel-nav>.panel-nav-item .name{display:inline-block;font-size:1.2rem;font-weight:700;letter-spacing:.5px;background: linear-gradient(to bottom, rgba(255, 255, 255, 0.96) 0%, rgba(238, 238, 238, 0.96) 100%);padding: 11px 9px 10px 9px;border-radius: 0 5px 5px 0;min-width:70px;display:none;}@media screen and (max-height:600px){inspector>.inspector-nav>.panel-nav{margin-top:10px}inspector>.inspector-nav>.panel-nav>.panel-nav-item{padding:0;padding-left:0;margin-left:10px;}inspector>.inspector-nav>.panel-nav>svg-icon{width:20px;height:20px}}inspector>.inspector-nav>.undo-nav{position:absolute;bottom:15px;width:100%}@media screen and (max-height:800px){inspector>.inspector-nav>.undo-nav{display:none}}inspector>.inspector-nav>.undo-nav>.panel-nav-item{padding:5px 0}inspector>.inspector-nav>.undo-nav>.panel-nav-item>.name{font-size:1rem}inspector>.inspector-nav>.back-button>svg-icon{color:inherit;width:30px;height:30px}inspector>.inspector-content{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;height:100%;color:rgba(0,0,0,.54);position:static;min-width:auto;}inspector>.inspector-content>.panel-container{position:relative;height:calc(100%);}inspector>.inspector-content>.actions{position:absolute;border-top:1px solid #e0e0e0;background:#fff;height:auto;left:10px;bottom:50px;z-index:99;width:35px;border-radius:5px;}inspector>.inspector-content>.actions>.mat-progress-bar{position:absolute;top:-5px;left:0}inspector>.inspector-content>.actions>.mat-button{line-height:50px;border-right:1px solid #e0e0e0;min-width:100%;max-width:100%;}inspector .content-panel{background-color:#fff;border-radius:2px;padding:15px;margin-bottom:15px;color:rgba(0,0,0,.87);-webkit-box-shadow:0 2px 1px -1px rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 1px 3px 0 rgba(0,0,0,.12);box-shadow:0 2px 1px -1px rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 1px 3px 0 rgba(0,0,0,.12)}inspector .content-panel>.header{margin-bottom:20px;font-size:1.5rem;font-weight:500}"]
                ],
                data: {}
            });

        function Gt(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "mat-progress-bar", [
                ["aria-valuemax", "100"],
                ["aria-valuemin", "0"],
                ["class", "mat-progress-bar"],
                ["color", "accent"],
                ["mode", "indeterminate"],
                ["role", "progressbar"]
            ], [
                [1, "aria-valuenow", 0],
                [1, "mode", 0]
            ], null, null, Z.b, Z.a)), l["\u0275did"](1, 49152, null, 0, Y.a, [l.ElementRef], {
                color: [0, "color"],
                mode: [1, "mode"]
            }, null)], function(e, n) {
                e(n, 1, 0, "accent", "indeterminate")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).value, l["\u0275nov"](n, 1).mode)
            })
        }

        function Zt(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                deviceSwitcher: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 63, "nav", [
                ["class", "inspector-nav mat-elevation-z3"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 16777216, null, null, 4, "a", [
                ["class", "back-button"],
                ["matTooltip", "Dashboard"],
                ["routerLink", "/admin/panda-pages"]
            ], [
                [1, "target", 0],
                [8, "href", 4]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== l["\u0275nov"](e, 3).onClick(t.button, t.ctrlKey, t.metaKey, t.shiftKey) && o), "longpress" === n && (o = !1 !== l["\u0275nov"](e, 4).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 4)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 4)._handleTouchend() && o), o
            }, null, null)), l["\u0275did"](3, 671744, null, 0, m.o, [m.m, m.a, g.LocationStrategy], {
                routerLink: [0, "routerLink"]
            }, null), l["\u0275did"](4, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](5, 0, null, null, 1, "svg-icon", [
                ["name", "keyboard-arrow-left"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](6, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 42, "div", [
                ["class", "panel-nav"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](8, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.inspector.togglePanel("layout") && l), l
            }, B.d, B.b)), l["\u0275did"](9, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](10, 0, null, 0, 1, "svg-icon", [
                ["name", "web-design-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](11, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](12, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Layout"])), (e()(), l["\u0275eld"](15, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.inspector.togglePanel("elements") && l), l
            }, B.d, B.b)), l["\u0275did"](16, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](17, 0, null, 0, 1, "svg-icon", [
                ["name", "puzzle-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](18, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](19, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](20, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Elements"])), (e()(), l["\u0275eld"](22, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.inspector.togglePanel("inspector") && l), l
            }, B.d, B.b)), l["\u0275did"](23, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](24, 0, null, 0, 1, "svg-icon", [
                ["name", "brush-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](25, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](26, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](27, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Inspector"])), (e()(), l["\u0275eld"](29, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.inspector.togglePanel("pages") && l), l
            }, B.d, B.b)), l["\u0275did"](30, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](31, 0, null, 0, 1, "svg-icon", [
                ["name", "documents-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](32, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](33, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](34, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Pages"])), (e()(), l["\u0275eld"](36, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.inspector.togglePanel("settings") && l), l
            }, B.d, B.b)), l["\u0275did"](37, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](38, 0, null, 0, 1, "svg-icon", [
                ["name", "settings-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](39, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](40, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](41, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Settings"])), (e()(), l["\u0275eld"](43, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.toggleCodeEditor() && l), l
            }, B.d, B.b)), l["\u0275did"](44, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](45, 0, null, 0, 1, "svg-icon", [
                ["name", "source-code-custom"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](46, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](47, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](48, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Code Edtr"])), (e()(), l["\u0275eld"](50, 0, null, null, 14, "div", [
                ["class", "panel-nav undo-nav"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](51, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.undoManager.undo() && l), l
            }, B.d, B.b)), l["\u0275did"](52, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](53, 0, null, 0, 1, "svg-icon", [
                ["name", "undo"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](54, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](55, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](56, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Undo"])), (e()(), l["\u0275eld"](58, 0, null, null, 6, "button", [
                ["class", "panel-nav-item"],
                ["mat-button", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.undoManager.redo() && l), l
            }, B.d, B.b)), l["\u0275did"](59, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](60, 0, null, 0, 1, "svg-icon", [
                ["name", "redo"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](61, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](62, 0, null, 0, 2, "span", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](63, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Redo"])), (e()(), l["\u0275eld"](65, 0, null, null, 42, "div", [
                ["class", "inspector-content"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](66, 0, null, null, 11, "div", [
                ["class", "panel-container"],
                ["customScrollbar", ""]
            ], null, null, null, null, null)), l["\u0275did"](67, 4341760, null, 0, f.a, [l.ElementRef, m.m], {
                theme: [0, "theme"]
            }, null), (e()(), l["\u0275eld"](68, 0, null, null, 1, "elements-panel", [], [
                [2, "hidden", null]
            ], null, null, Te, Ee)), l["\u0275did"](69, 114688, null, 0, Ce, [be.a], null, null), (e()(), l["\u0275eld"](70, 0, null, null, 1, "inspector-panel", [], [
                [2, "hidden", null]
            ], null, null, Kn, Bn)), l["\u0275did"](71, 49152, null, 0, In, [he, xe, Dn, On, S.a, R, Nn, be.a], null, null), (e()(), l["\u0275eld"](72, 0, null, null, 1, "layout-panel", [], [
                [2, "hidden", null]
            ], null, null, pt, rt)), l["\u0275did"](73, 114688, null, 0, it, [_e, xe, at, Dn, On], null, null), (e()(), l["\u0275eld"](74, 0, null, null, 1, "pages-panel", [], [
                [2, "hidden", null]
            ], null, null, _t, mt)), l["\u0275did"](75, 114688, null, 0, ht, [R, ft.a, T.a, _e], null, null), (e()(), l["\u0275eld"](76, 0, null, null, 1, "settings-panel", [], [
                [2, "hidden", null]
            ], null, null, It, St)), l["\u0275did"](77, 114688, null, 0, Et, [Q.c, On, R, P, I, Rt.a], null, null), (e()(), l["\u0275eld"](78, 0, null, null, 1, "device-switcher", [], [
                [40, "@toggleAnimation", 0]
            ], null, null, Ft, Nt)), l["\u0275did"](79, 49152, [
                [1, 4],
                ["deviceSwitcher", 4]
            ], 0, Mt, [he, at], null, null), (e()(), l["\u0275eld"](80, 0, null, null, 27, "div", [
                ["class", "actions"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Gt)), l["\u0275did"](82, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](83, 16777216, null, null, 4, "button", [
                ["mat-button", ""],
                ["matTooltip", "Preview"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 85).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 85)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 85)._handleTouchend() && o), "click" === n && (o = !1 !== i.openPreview() && o), o
            }, B.d, B.b)), l["\u0275did"](84, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), l["\u0275did"](85, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](86, 0, null, 0, 1, "svg-icon", [
                ["name", "visibility"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](87, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](88, 16777216, null, null, 4, "button", [
                ["mat-button", ""],
                ["matTooltip", "Download"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 90).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 90)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 90)._handleTouchend() && o), "click" === n && (o = !1 !== i.downloadProject() && o), o
            }, B.d, B.b)), l["\u0275did"](89, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), l["\u0275did"](90, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](91, 0, null, 0, 1, "svg-icon", [
                ["name", "file-download"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](92, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](93, 16777216, null, null, 4, "button", [
                ["mat-button", ""],
                ["matTooltip", "Publish"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 95).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 95)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 95)._handleTouchend() && o), "click" === n && (o = !1 !== i.openPublishProjectModal() && o), o
            }, B.d, B.b)), l["\u0275did"](94, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), l["\u0275did"](95, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](96, 0, null, 0, 1, "svg-icon", [
                ["name", "publish"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](97, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](98, 16777216, null, null, 4, "button", [
                ["mat-button", ""],
                ["matTooltip", "Change device"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 100).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 100)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 100)._handleTouchend() && o), "click" === n && (o = !1 !== i.toggleDeviceSwitcher() && o), o
            }, B.d, B.b)), l["\u0275did"](99, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](100, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](101, 0, null, 0, 1, "svg-icon", [
                ["name", "phone-android"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](102, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](103, 16777216, null, null, 4, "button", [
                ["mat-button", ""],
                ["matTooltip", "Save project"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 105).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 105)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 105)._handleTouchend() && o), "click" === n && (o = !1 !== i.saveProject() && o), o
            }, B.d, B.b)), l["\u0275did"](104, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"]
            }, null), l["\u0275did"](105, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](106, 0, null, 0, 1, "svg-icon", [
                ["name", "save"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](107, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 3, 0, "/admin/panda-pages"), e(n, 4, 0, "Dashboard"), e(n, 6, 0, "keyboard-arrow-left"), e(n, 11, 0, "web-design-custom"), e(n, 18, 0, "puzzle-custom"), e(n, 25, 0, "brush-custom"), e(n, 32, 0, "documents-custom"), e(n, 39, 0, "settings-custom"), e(n, 44, 0, !t.currentUser.hasPermission("editors.enable")), e(n, 46, 0, "source-code-custom"), e(n, 52, 0, !t.undoManager.canUndo()), e(n, 54, 0, "undo"), e(n, 59, 0, !t.undoManager.canRedo()), e(n, 61, 0, "redo"), e(n, 67, 0, ""), e(n, 69, 0), e(n, 73, 0), e(n, 75, 0), e(n, 77, 0), e(n, 82, 0, t.activeProject.saving), e(n, 84, 0, t.activeProject.saving), e(n, 85, 0, "Preview"), e(n, 87, 0, "visibility"), e(n, 89, 0, !t.currentUser.hasPermission("projects.download")), e(n, 90, 0, "Download"), e(n, 92, 0, "file-download"), e(n, 94, 0, !t.currentUser.hasPermission("projects.publish")), e(n, 95, 0, "Publish"), e(n, 97, 0, "publish"), e(n, 100, 0, "Change device"), e(n, 102, 0, "phone-android"), e(n, 104, 0, t.activeProject.saving), e(n, 105, 0, "Save project"), e(n, 107, 0, "save")
            }, function(e, n) {
                var t = n.component;
                e(n, 2, 0, l["\u0275nov"](n, 3).target, l["\u0275nov"](n, 3).href), e(n, 8, 0, t.inspector.activePanelIs("layout"), l["\u0275nov"](n, 9).disabled || null), e(n, 15, 0, t.inspector.activePanelIs("elements"), l["\u0275nov"](n, 16).disabled || null), e(n, 22, 0, t.inspector.activePanelIs("inspector"), l["\u0275nov"](n, 23).disabled || null), e(n, 29, 0, t.inspector.activePanelIs("pages"), l["\u0275nov"](n, 30).disabled || null), e(n, 36, 0, t.inspector.activePanelIs("settings"), l["\u0275nov"](n, 37).disabled || null), e(n, 43, 0, l["\u0275nov"](n, 44).disabled || null), e(n, 51, 0, l["\u0275nov"](n, 52).disabled || null), e(n, 58, 0, l["\u0275nov"](n, 59).disabled || null), e(n, 68, 0, !t.inspector.activePanelIs("elements")), e(n, 70, 0, !t.inspector.activePanelIs("inspector")), e(n, 72, 0, !t.inspector.activePanelIs("layout")), e(n, 74, 0, !t.inspector.activePanelIs("pages")), e(n, 76, 0, !t.inspector.activePanelIs("settings")), e(n, 78, 0, l["\u0275nov"](n, 79).visible), e(n, 83, 0, l["\u0275nov"](n, 84).disabled || null), e(n, 88, 0, l["\u0275nov"](n, 89).disabled || null), e(n, 93, 0, l["\u0275nov"](n, 94).disabled || null), e(n, 98, 0, l["\u0275nov"](n, 99).disabled || null), e(n, 103, 0, l["\u0275nov"](n, 104).disabled || null)
            })
        }
        var Yt = t("e0rv"),
            Kt = l["\u0275crt"]({
                encapsulation: 2,
                styles: [],
                data: {}
            });

        function Qt(e) {
            return l["\u0275vid"](2, [l["\u0275ncd"](null, 0)], null, null)
        }
        var Jt = l["\u0275crt"]({
            encapsulation: 2,
            styles: [],
            data: {
                animation: [{
                    type: 7,
                    name: "transform",
                    definitions: [{
                        type: 0,
                        name: "open, open-instant",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "translate3d(0, 0, 0)",
                                visibility: "visible"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 0,
                        name: "void",
                        styles: {
                            type: 6,
                            styles: {
                                visibility: "hidden"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 1,
                        expr: "void => open-instant",
                        animation: {
                            type: 4,
                            styles: null,
                            timings: "0ms"
                        },
                        options: null
                    }, {
                        type: 1,
                        expr: "void <=> open, open-instant => void",
                        animation: {
                            type: 4,
                            styles: null,
                            timings: "400ms cubic-bezier(0.25, 0.8, 0.25, 1)"
                        },
                        options: null
                    }],
                    options: {}
                }]
            }
        });

        function el(e) {
            return l["\u0275vid"](2, [l["\u0275ncd"](null, 0)], null, null)
        }
        var nl = l["\u0275crt"]({
            encapsulation: 2,
            styles: [".mat-drawer-container{position:relative;z-index:1;box-sizing:border-box;-webkit-overflow-scrolling:touch;display:block;overflow:hidden}.mat-drawer-container[fullscreen]{top:0;left:0;right:0;bottom:0;position:absolute}.mat-drawer-container[fullscreen].mat-drawer-opened{overflow:hidden}.mat-drawer-backdrop{top:0;left:0;right:0;bottom:0;position:absolute;display:block;z-index:3;visibility:hidden}.mat-drawer-backdrop.mat-drawer-shown{visibility:visible}.mat-drawer-transition .mat-drawer-backdrop{transition-duration:.4s;transition-timing-function:cubic-bezier(.25,.8,.25,1);transition-property:background-color,visibility}@media screen and (-ms-high-contrast:active){.mat-drawer-backdrop{opacity:.5}}.mat-drawer-content{-webkit-backface-visibility:hidden;backface-visibility:hidden;position:relative;z-index:1;display:block;height:100%;overflow:auto}.mat-drawer-transition .mat-drawer-content{transition-duration:.4s;transition-timing-function:cubic-bezier(.25,.8,.25,1);transition-property:transform,margin-left,margin-right}.mat-drawer{position:relative;z-index:4;display:block;position:absolute;top:0;bottom:0;z-index:3;outline:0;box-sizing:border-box;overflow-y:auto;transform:translate3d(-100%,0,0)}.mat-drawer.mat-drawer-side{z-index:2}.mat-drawer.mat-drawer-end{right:0;transform:translate3d(100%,0,0)}[dir=rtl] .mat-drawer{transform:translate3d(100%,0,0)}[dir=rtl] .mat-drawer.mat-drawer-end{left:0;right:auto;transform:translate3d(-100%,0,0)}.mat-drawer:not(.mat-drawer-side){box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12)}.mat-sidenav-fixed{position:fixed}"],
            data: {}
        });

        function tl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "mat-drawer-content", [
                ["cdkScrollable", ""],
                ["class", "mat-drawer-content"]
            ], [
                [4, "margin-left", "px"],
                [4, "margin-right", "px"]
            ], null, null, Qt, Kt)), l["\u0275did"](1, 212992, [
                [1, 4]
            ], 0, J.a, [l.ElementRef, J.d, l.NgZone], null, null), l["\u0275did"](2, 1097728, null, 0, Yt.d, [l.ChangeDetectorRef, Yt.c], null, null), l["\u0275ncd"](0, 2)], function(e, n) {
                e(n, 1, 0)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 2)._margins.left, l["\u0275nov"](n, 2)._margins.right)
            })
        }

        function ll(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](671088640, 1, {
                scrollable: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 0, "div", [
                ["class", "mat-drawer-backdrop"]
            ], [
                [2, "mat-drawer-shown", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component._onBackdropClicked() && l), l
            }, null, null)), l["\u0275ncd"](null, 0), l["\u0275ncd"](null, 1), (e()(), l["\u0275and"](16777216, null, null, 1, null, tl)), l["\u0275did"](5, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 5, 0, !n.component._content)
            }, function(e, n) {
                e(n, 1, 0, n.component._isShowingBackdrop())
            })
        }
        var ol = this && this.__extends || function() {
                var e = Object.setPrototypeOf || {
                    __proto__: []
                }
                instanceof Array && function(e, n) {
                    e.__proto__ = n
                } || function(e, n) {
                    for (var t in n) n.hasOwnProperty(t) && (e[t] = n[t])
                };
                return function(n, t) {
                    function l() {
                        this.constructor = n
                    }
                    e(n, t), n.prototype = null === t ? Object.create(t) : (l.prototype = t.prototype, new l)
                }
            }(),
            il = function(e) {
                function n(n, t, l, o, i, a, r, u) {
                    var s = e.call(this) || this;
                    return s.livePreview = n, s.renderer = t, s.undoManager = l, s.elements = o, s.zone = i, s.selectedElement = a, s.builderDocument = r, s.dragHelper = u, s
                }
                return ol(n, e), n.prototype.getDragHandles = function() {
                    return document.querySelectorAll(".context-box-drag-handle")
                }, n.prototype.setDragElement = function(e) {
                    this.dragEl = e.target.closest(".selected-box") ? this.livePreview.selected : this.livePreview.hover
                }, n.prototype.sortColumns = function(e, n) {
                    var t = e.parentElement.className;
                    e !== this.dragEl.node && e.parentNode === this.dragEl.node.parentNode && t && t.match("row") && (n.direction === Hammer.DIRECTION_RIGHT ? this.dragEl.node.before(e) : n.direction === Hammer.DIRECTION_LEFT && this.dragEl.node.after(e), this.livePreview.repositionBox("selected"))
                }, n
            }(ue),
            al = function() {
                function e(e, n, t, l, o, i, a, r, u, s, d) {
                    this.livePreview = e, this.builderActions = n, this.selectedElement = t, this.inspector = l, this.modal = o, this.activeProject = i, this.contextBoxes = a, this.inlineTextEditor = r, this.el = u, this.elements = s, this.linkEditor = d
                }
                return Object.defineProperty(e.prototype, "c1", {
                    get: function() {
                        return "selected" === this.type
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "c2", {
                    get: function() {
                        return "hover" === this.type
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.getDisplayName = function() {
                    var e = this.livePreview[this.type];
                    return this.livePreview.getElementDisplayName(e.element, e.node)
                }, e.prototype.deleteNode = function() {
                    this.builderActions.removeNode(this.livePreview[this.type].node)
                }, e.prototype.editNode = function() {
                    var e = this.livePreview[this.type].node;
                    this.elements.isLayout(e) ? this.inspector.openPanel("layout") : this.elements.isImage(e) ? this.openUploadImageModal() : this.elements.isLink(e) ? this.linkEditor.open(e) : this.elements.canModifyText(this.elements.match(e)) && (this.contextBoxes.hideBoxes(), this.inlineTextEditor.open(e))
                }, e.prototype.openUploadImageModal = function() {
                    var e = this,
                        n = {
                            uri: "uploads/images",
                            httpParams: {
                                path: this.activeProject.getBaseUrl(!0) + "images"
                            }
                        };
                    this.modal.open(We.a, n).afterClosed().subscribe(function(n) {
                        n && (e.livePreview[e.type].node.src = n)
                    })
                }, e
            }(),
            rl = ["fa fa-glass", "fa fa-music", "fa fa-search", "fa fa-envelope-o", "fa fa-heart", "fa fa-star", "fa fa-star-o", "fa fa-user", "fa fa-film", "fa fa-th-large", "fa fa-th", "fa fa-th-list", "fa fa-check", "fa fa-times", "fa fa-search-plus", "fa fa-search-minus", "fa fa-power-off", "fa fa-signal", "fa fa-cog", "fa fa-trash-o", "fa fa-home", "fa fa-file-o", "fa fa-clock-o", "fa fa-road", "fa fa-download", "fa fa-arrow-circle-o-down", "fa fa-arrow-circle-o-up", "fa fa-inbox", "fa fa-play-circle-o", "fa fa-repeat", "fa fa-refresh", "fa fa-list-alt", "fa fa-lock", "fa fa-flag", "fa fa-headphones", "fa fa-volume-off", "fa fa-volume-down", "fa fa-volume-up", "fa fa-qrcode", "fa fa-barcode", "fa fa-tag", "fa fa-tags", "fa fa-book", "fa fa-bookmark", "fa fa-print", "fa fa-camera", "fa fa-font", "fa fa-bold", "fa fa-italic", "fa fa-text-height", "fa fa-text-width", "fa fa-align-left", "fa fa-align-center", "fa fa-align-right", "fa fa-align-justify", "fa fa-list", "fa fa-outdent", "fa fa-indent", "fa fa-video-camera", "fa fa-picture-o", "fa fa-pencil", "fa fa-map-marker", "fa fa-adjust", "fa fa-tint", "fa fa-pencil-square-o", "fa fa-share-square-o", "fa fa-check-square-o", "fa fa-arrows", "fa fa-step-backward", "fa fa-fast-backward", "fa fa-backward", "fa fa-play", "fa fa-pause", "fa fa-stop", "fa fa-forward", "fa fa-fast-forward", "fa fa-step-forward", "fa fa-eject", "fa fa-chevron-left", "fa fa-chevron-right", "fa fa-plus-circle", "fa fa-minus-circle", "fa fa-times-circle", "fa fa-check-circle", "fa fa-question-circle", "fa fa-info-circle", "fa fa-crosshairs", "fa fa-times-circle-o", "fa fa-check-circle-o", "fa fa-ban", "fa fa-arrow-left", "fa fa-arrow-right", "fa fa-arrow-up", "fa fa-arrow-down", "fa fa-share", "fa fa-expand", "fa fa-compress", "fa fa-plus", "fa fa-minus", "fa fa-asterisk", "fa fa-exclamation-circle", "fa fa-gift", "fa fa-leaf", "fa fa-fire", "fa fa-eye", "fa fa-eye-slash", "fa fa-exclamation-triangle", "fa fa-plane", "fa fa-calendar", "fa fa-random", "fa fa-comment", "fa fa-magnet", "fa fa-chevron-up", "fa fa-chevron-down", "fa fa-retweet", "fa fa-shopping-cart", "fa fa-folder", "fa fa-folder-open", "fa fa-arrows-v", "fa fa-arrows-h", "fa fa-bar-chart-o", "fa fa-twitter-square", "fa fa-facebook-square", "fa fa-camera-retro", "fa fa-key", "fa fa-cogs", "fa fa-comments", "fa fa-thumbs-o-up", "fa fa-thumbs-o-down", "fa fa-star-half", "fa fa-heart-o", "fa fa-sign-out", "fa fa-linkedin-square", "fa fa-thumb-tack", "fa fa-external-link", "fa fa-sign-in", "fa fa-trophy", "fa fa-github-square", "fa fa-upload", "fa fa-lemon-o", "fa fa-phone", "fa fa-square-o", "fa fa-bookmark-o", "fa fa-phone-square", "fa fa-twitter", "fa fa-facebook", "fa fa-github", "fa fa-unlock", "fa fa-credit-card", "fa fa-rss", "fa fa-hdd-o", "fa fa-bullhorn", "fa fa-bell", "fa fa-certificate", "fa fa-hand-o-right", "fa fa-hand-o-left", "fa fa-hand-o-up", "fa fa-hand-o-down", "fa fa-arrow-circle-left", "fa fa-arrow-circle-right", "fa fa-arrow-circle-up", "fa fa-arrow-circle-down", "fa fa-globe", "fa fa-wrench", "fa fa-tasks", "fa fa-filter", "fa fa-briefcase", "fa fa-arrows-alt", "fa fa-users", "fa fa-link", "fa fa-cloud", "fa fa-flask", "fa fa-scissors", "fa fa-files-o", "fa fa-paperclip", "fa fa-floppy-o", "fa fa-square", "fa fa-bars", "fa fa-list-ul", "fa fa-list-ol", "fa fa-strikethrough", "fa fa-underline", "fa fa-table", "fa fa-magic", "fa fa-truck", "fa fa-pinterest", "fa fa-pinterest-square", "fa fa-google-plus-square", "fa fa-google-plus", "fa fa-money", "fa fa-caret-down", "fa fa-caret-up", "fa fa-caret-left", "fa fa-caret-right", "fa fa-columns", "fa fa-sort", "fa fa-sort-desc", "fa fa-sort-asc", "fa fa-envelope", "fa fa-linkedin", "fa fa-undo", "fa fa-gavel", "fa fa-tachometer", "fa fa-comment-o", "fa fa-comments-o", "fa fa-bolt", "fa fa-sitemap", "fa fa-umbrella", "fa fa-clipboard", "fa fa-lightbulb-o", "fa fa-exchange", "fa fa-cloud-download", "fa fa-cloud-upload", "fa fa-user-md", "fa fa-stethoscope", "fa fa-suitcase", "fa fa-bell-o", "fa fa-coffee", "fa fa-cutlery", "fa fa-file-text-o", "fa fa-building-o", "fa fa-hospital-o", "fa fa-ambulance", "fa fa-medkit", "fa fa-fighter-jet", "fa fa-beer", "fa fa-h-square", "fa fa-plus-square", "fa fa-angle-double-left", "fa fa-angle-double-right", "fa fa-angle-double-up", "fa fa-angle-double-down", "fa fa-angle-left", "fa fa-angle-right", "fa fa-angle-up", "fa fa-angle-down", "fa fa-desktop", "fa fa-laptop", "fa fa-tablet", "fa fa-mobile", "fa fa-circle-o", "fa fa-quote-left", "fa fa-quote-right", "fa fa-spinner", "fa fa-circle", "fa fa-reply", "fa fa-github-alt", "fa fa-folder-o", "fa fa-folder-open-o", "fa fa-smile-o", "fa fa-frown-o", "fa fa-meh-o", "fa fa-gamepad", "fa fa-keyboard-o", "fa fa-flag-o", "fa fa-flag-checkered", "fa fa-terminal", "fa fa-code", "fa fa-reply-all", "fa fa-star-half-o", "fa fa-location-arrow", "fa fa-crop", "fa fa-code-fork", "fa fa-chain-broken", "fa fa-question", "fa fa-info", "fa fa-exclamation", "fa fa-superscript", "fa fa-subscript", "fa fa-eraser", "fa fa-puzzle-piece", "fa fa-microphone", "fa fa-microphone-slash", "fa fa-shield", "fa fa-calendar-o", "fa fa-fire-extinguisher", "fa fa-rocket", "fa fa-maxcdn", "fa fa-chevron-circle-left", "fa fa-chevron-circle-right", "fa fa-chevron-circle-up", "fa fa-chevron-circle-down", "fa fa-html5", "fa fa-css3", "fa fa-anchor", "fa fa-unlock-alt", "fa fa-bullseye", "fa fa-ellipsis-h", "fa fa-ellipsis-v", "fa fa-rss-square", "fa fa-play-circle", "fa fa-ticket", "fa fa-minus-square", "fa fa-minus-square-o", "fa fa-level-up", "fa fa-level-down", "fa fa-check-square", "fa fa-pencil-square", "fa fa-external-link-square", "fa fa-share-square", "fa fa-compass", "fa fa-caret-square-o-down", "fa fa-caret-square-o-up", "fa fa-caret-square-o-right", "fa fa-eur", "fa fa-gbp", "fa fa-usd", "fa fa-inr", "fa fa-jpy", "fa fa-rub", "fa fa-krw", "fa fa-btc", "fa fa-file", "fa fa-file-text", "fa fa-sort-alpha-asc", "fa fa-sort-alpha-desc", "fa fa-sort-amount-asc", "fa fa-sort-amount-desc", "fa fa-sort-numeric-asc", "fa fa-sort-numeric-desc", "fa fa-thumbs-up", "fa fa-thumbs-down", "fa fa-youtube-square", "fa fa-youtube", "fa fa-xing", "fa fa-xing-square", "fa fa-youtube-play", "fa fa-dropbox", "fa fa-stack-overflow", "fa fa-instagram", "fa fa-flickr", "fa fa-adn", "fa fa-bitbucket", "fa fa-bitbucket-square", "fa fa-tumblr", "fa fa-tumblr-square", "fa fa-long-arrow-down", "fa fa-long-arrow-up", "fa fa-long-arrow-left", "fa fa-long-arrow-right", "fa fa-apple", "fa fa-windows", "fa fa-android", "fa fa-linux", "fa fa-dribbble", "fa fa-skype", "fa fa-foursquare", "fa fa-trello", "fa fa-female", "fa fa-male", "fa fa-gittip", "fa fa-sun-o", "fa fa-moon-o", "fa fa-archive", "fa fa-bug", "fa fa-vk", "fa fa-weibo", "fa fa-renren", "fa fa-pagelines", "fa fa-stack-exchange", "fa fa-arrow-circle-o-right", "fa fa-arrow-circle-o-left", "fa fa-caret-square-o-left", "fa fa-dot-circle-o", "fa fa-wheelchair", "fa fa-vimeo-square", "fa fa-try", "fa fa-plus-square-o", "fa fa-space-shuttle", "fa fa-slack", "fa fa-envelope-square", "fa fa-wordpress", "fa fa-openid", "fa fa-university", "fa fa-graduation-cap", "fa fa-yahoo", "fa fa-google", "fa fa-reddit", "fa fa-reddit-square", "fa fa-stumbleupon-circle", "fa fa-stumbleupon", "fa fa-delicious", "fa fa-digg", "fa fa-pied-piper", "fa fa-pied-piper-alt", "fa fa-drupal", "fa fa-joomla", "fa fa-language", "fa fa-fax", "fa fa-building", "fa fa-child", "fa fa-paw", "fa fa-spoon", "fa fa-cube", "fa fa-cubes", "fa fa-behance", "fa fa-behance-square", "fa fa-steam", "fa fa-steam-square", "fa fa-recycle", "fa fa-car", "fa fa-taxi", "fa fa-tree", "fa fa-spotify", "fa fa-deviantart", "fa fa-soundcloud", "fa fa-database", "fa fa-file-pdf-o", "fa fa-file-word-o", "fa fa-file-excel-o", "fa fa-file-powerpoint-o", "fa fa-file-image-o", "fa fa-file-archive-o", "fa fa-file-audio-o", "fa fa-file-video-o", "fa fa-file-code-o", "fa fa-vine", "fa fa-codepen", "fa fa-jsfiddle", "fa fa-life-ring", "fa fa-circle-o-notch", "fa fa-rebel", "fa fa-empire", "fa fa-git-square", "fa fa-git", "fa fa-hacker-news", "fa fa-tencent-weibo", "fa fa-qq", "fa fa-weixin", "fa fa-paper-plane", "fa fa-paper-plane-o", "fa fa-history", "fa fa-circle-thin", "fa fa-header", "fa fa-paragraph", "fa fa-sliders", "fa fa-share-alt", "fa fa-share-alt-square", "fa fa-bomb"],
            ul = function() {
                function e(e, n, t) {
                    this.builderDocument = e, this.settings = n, this.undoManager = t, this.styles = {
                        fonts: gn,
                        weights: bn,
                        sizes: [1, 2, 3, 4, 5, 6, 7],
                        icons: rl
                    }
                }
                return e.prototype.ngOnInit = function() {
                    this.editedNode = this.builderDocument.find("[contenteditable]"), this.beforeDomNode = this.editedNode.parentNode.cloneNode(!0)
                }, e.prototype.ngOnDestroy = function() {
                    this.makeNodesNotEditable(), this.undoManager.wrapDomChanges(this.editedNode.parentNode, null, {
                        before: this.beforeDomNode
                    }), this.builderDocument.contentChanged.next("builder")
                }, e.prototype.execCommand = function(e, n) {
                    this.builderDocument.execCommand(e, n)
                }, e.prototype.commandIsActive = function(e) {
                    return this.builderDocument.queryCommandState(e)
                }, e.prototype.createLink = function() {
                    this.execCommand("createLink", this.linkModel), this.linkModel = null, this.togglePanel("link")
                }, e.prototype.insertIcon = function(e) {
                    this.execCommand("insertHtml", '<i class="' + e + '"></i>'), this.togglePanel("icons")
                }, e.prototype.togglePanel = function(e) {
                    var n = this;
                    this[e + "PanelIsOpen"] = !this[e + "PanelIsOpen"], "icons" === e && this.loadFontAwesome(), setTimeout(function() {
                        return n.overlayRef.updatePosition()
                    })
                }, e.prototype.makeNodesNotEditable = function() {
                    for (var e = this.builderDocument.findAll("[contenteditable]"), n = e.length - 1; n >= 0; n--) e[n].removeAttribute("contenteditable"), e[n].blur()
                }, e.prototype.loadFontAwesome = function() {
                    document.head.querySelector("#font-awesome") || document.head.appendChild(re.a.createLink(this.settings.getBaseUrl(!0) + "builder/css/font-awesome.min.css", "font-awesome"))
                }, e.prototype.setOverlayRef = function(e) {
                    this.overlayRef = e
                }, e
            }(),
            sl = function() {
                function e(e) {
                    this.overlay = e
                }
                return e.prototype.open = function(e) {
                    var n = this.overlay.position().connectedTo(new l.ElementRef(e), {
                        originX: "center",
                        originY: "top"
                    }, {
                        overlayX: "center",
                        overlayY: "bottom"
                    }).withFallbackPosition({
                        originX: "center",
                        originY: "bottom"
                    }, {
                        overlayX: "center",
                        overlayY: "top"
                    }).withOffsetX(380).withOffsetY(-10);
                    this.overlayRef && this.overlayRef.dispose(), this.overlayRef = this.overlay.create({
                        positionStrategy: n,
                        hasBackdrop: !1
                    }), this.overlayRef.attach(new Ge.d(ul)).instance.setOverlayRef(this.overlayRef), e.setAttribute("contenteditable", "true"), e.focus()
                }, e.prototype.close = function() {
                    this.overlayRef && this.overlayRef.dispose()
                }, e
            }(),
            dl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ncontext-box{position:absolute;top:0;left:0;border:1px solid #88ceff;color:#fff;pointer-events:none}context-box.toolbar-bottom>.context-box-toolbar{top:auto;bottom:-12px}context-box>.context-box-toolbar{top:-12px;left:0;width:100%;height:25px;color:#88ceff;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}context-box>.context-box-toolbar,context-box>.spacing{position:absolute;pointer-events:all}context-box .bottom-spacing,context-box>.top-spacing{height:10px;width:100%;left:0;top:0}context-box>.bottom-spacing{top:auto;bottom:0}context-box .right-spacing,context-box>.left-spacing{height:100%;width:10px;top:0;left:0}context-box>.right-spacing{right:0;left:auto}context-box .action-button{position:absolute;border:1px solid #88ceff;border-radius:2px;background-color:#fff}context-box .action-button.edit-button{left:-11px}context-box .action-button.edit-button:hover{background-color:#88ceff;color:#fff}context-box .action-button.delete-button{right:-11px}context-box .action-button.delete-button:hover{background-color:#f44336;border-color:#f44336;color:#fff}context-box .action-button svg-icon{width:30px;height:30px}context-box .element-name{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;position:absolute;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%);height:25px;padding:5px;overflow:hidden;white-space:nowrap;border:1px solid #88ceff;border-radius:2px;background-color:#fff;cursor:move}context-box .element-name:hover{color:#55b9ff}context-box .element-name>.column-name{text-transform:uppercase;font-size:1.4rem}context-box .element-name svg-icon{display:block}"]
                ],
                data: {}
            });

        function cl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 0, "div", [
                ["class", "spacing top-spacing"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 0, "div", [
                ["class", "spacing left-spacing"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 0, "div", [
                ["class", "spacing right-spacing"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 0, "div", [
                ["class", "spacing bottom-spacing"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 11, "div", [
                ["class", "context-box-toolbar"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 2, "button", [
                ["class", "no-style action-button edit-button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.editNode() && l), l
            }, null, null)), (e()(), l["\u0275eld"](6, 0, null, null, 1, "svg-icon", [
                ["name", "mode-edit"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](7, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](8, 0, null, null, 4, "div", [
                ["class", "element-name context-box-drag-handle"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](9, 0, null, null, 1, "svg-icon", [
                ["name", "drag-handle"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](10, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](11, 0, null, null, 1, "span", [
                ["class", "column-name"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](12, null, ["", ""])), (e()(), l["\u0275eld"](13, 0, null, null, 2, "button", [
                ["class", "no-style action-button delete-button"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.deleteNode() && l), l
            }, null, null)), (e()(), l["\u0275eld"](14, 0, null, null, 1, "svg-icon", [
                ["name", "close"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](15, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                e(n, 7, 0, "mode-edit"), e(n, 10, 0, "drag-handle"), e(n, 15, 0, "close")
            }, function(e, n) {
                e(n, 12, 0, n.component.getDisplayName())
            })
        }
        var pl = function() {
                function e(e, n) {
                    this.livePreview = e, this.contextBoxes = n
                }
                return e.prototype.ngOnInit = function() {
                    this.contextBoxes.set(this.hoverBox.el.nativeElement, this.selectedBox.el.nativeElement, this.iframe), this.livePreview.init(this.iframe)
                }, e
            }(),
            hl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\nlive-preview{display:block;height:100%;position:relative;overflow:hidden;background-image:linear-gradient(45deg,rgba(0,0,0,.05) 25%,transparent 0,transparent 75%,rgba(0,0,0,.05) 0,rgba(0,0,0,.05)),linear-gradient(45deg,rgba(0,0,0,.05) 25%,transparent 0,transparent 75%,rgba(0,0,0,.05) 0,rgba(0,0,0,.05));background-size:48px 48px;background-position:0 0,24px 24px}live-preview>.width-container{width:100%;height:100%;margin:0 auto;-webkit-transition:width 225ms cubic-bezier(.4,0,.2,1);transition:width 225ms cubic-bezier(.4,0,.2,1)}live-preview>.width-container.phone{width:480px}live-preview>.width-container.phone,live-preview>.width-container.tablet{-webkit-box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12);box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}live-preview>.width-container.tablet{width:768px}live-preview>.width-container.laptop{width:992px;-webkit-box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12);box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}live-preview>.width-container.desktop{width:100%}live-preview iframe{display:block;width:100%;height:100%;border:none}live-preview .highlights{position:absolute}live-preview .drag-overlay{display:none;position:absolute;top:0;left:0;width:100%;height:100%}"]
                ],
                data: {}
            });

        function fl(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                iframe: 0
            }), l["\u0275qud"](402653184, 2, {
                hoverBox: 0
            }), l["\u0275qud"](402653184, 3, {
                selectedBox: 0
            }), (e()(), l["\u0275eld"](3, 0, null, null, 10, "div", [
                ["class", "width-container"],
                ["previewDragAndDrop", ""]
            ], null, null, null, null, null)), l["\u0275did"](4, 278528, null, 0, g.NgClass, [l.IterableDiffers, l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                klass: [0, "klass"],
                ngClass: [1, "ngClass"]
            }, null), l["\u0275did"](5, 1064960, null, 1, il, [he, l.Renderer2, ge, be.a, l.NgZone, xe, _e, ke], null, null), l["\u0275qud"](603979776, 4, {
                dragElements: 1
            }), (e()(), l["\u0275eld"](7, 0, null, null, 4, "div", [
                ["class", "highlights"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](8, 0, null, null, 1, "context-box", [
                ["class", "hidden"],
                ["type", "hover"]
            ], [
                [2, "selected-box", null],
                [2, "hover-box", null]
            ], null, null, cl, dl)), l["\u0275did"](9, 49152, [
                [2, 4],
                ["hoverBox", 4]
            ], 0, al, [he, Ye, xe, On, S.a, R, at, sl, l.ElementRef, be.a, Nn], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275eld"](10, 0, null, null, 1, "context-box", [
                ["class", "hidden"],
                ["type", "selected"]
            ], [
                [2, "selected-box", null],
                [2, "hover-box", null]
            ], null, null, cl, dl)), l["\u0275did"](11, 49152, [
                [3, 4],
                ["selectedBox", 4]
            ], 0, al, [he, Ye, xe, On, S.a, R, at, sl, l.ElementRef, be.a, Nn], {
                type: [0, "type"]
            }, null), (e()(), l["\u0275eld"](12, 0, [
                [1, 0],
                ["iframe", 1]
            ], null, 0, "iframe", [], null, null, null, null, null)), (e()(), l["\u0275eld"](13, 0, [
                ["dragOverlay", 1]
            ], null, 0, "div", [
                ["class", "drag-overlay"]
            ], null, null, null, null, null))], function(e, n) {
                e(n, 4, 0, "width-container", n.component.livePreview.activeWidth), e(n, 9, 0, "hover"), e(n, 11, 0, "selected")
            }, function(e, n) {
                e(n, 8, 0, l["\u0275nov"](n, 9).c1, l["\u0275nov"](n, 9).c2), e(n, 10, 0, l["\u0275nov"](n, 11).c1, l["\u0275nov"](n, 11).c2)
            })
        }
        var ml = function(e, n, t) {
                this.renderer = e, this.el = n, this.dragHelper = t
            },
            gl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ndrag-visual-helper{display:block;position:fixed;bottom:-50px;left:-100px;pointer-events:none;background-color:#fff;color:rgba(0,0,0,.87);max-height:40px;border-radius:2px;padding:10px;text-align:center;-webkit-box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);font-size:1.5rem;text-transform:capitalize;z-index:10}"]
                ],
                data: {}
            });

        function bl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "div", [
                ["class", "name"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 1, 0, n.component.dragHelper.getName())
            })
        }
        var vl = t("1F7g"),
            yl = t("/M6a"),
            xl = function() {
                function e(e, n, t, l, o, i, a) {
                    this.elements = e, this.route = n, this.activeProject = t, this.inspectorDrawer = l, this.dragVisualHelper = o, this.loader = i, this.codeEditor = a
                }
                return e.prototype.ngOnInit = function() {
                    var e = this;
                    this.loader.setLoader(this.loaderEl), this.route.data.subscribe(function(n) {
                        e.activeProject.setProject(n.project), e.elements.init(n.customElements), e.inspectorDrawer.setDrawer(e.drawer), e.dragVisualHelper.setComponent(e.dragHelper)
                    })
                }, e.prototype.ngOnDestroy = function() {
                    this.codeEditor.close()
                }, e.prototype.getInspectorDrawerPanel = function() {
                    return this.inspectorDrawer.activePanel
                }, e
            }(),
            wl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nhtml-builder{display:-webkit-box;display:-ms-flexbox;display:flex;height:100%;width:100%}html-builder>inspector{-webkit-box-flex:0;-ms-flex:0 0 0;flex:0 0 0;width:0;height:100%}html-builder>mat-drawer-container{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;height:100%}html-builder loading-indicator.overlay{background-color:#fff}"]
                ],
                data: {}
            });

        function _l(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "templates-panel", [], null, null, null, M, D)), l["\u0275did"](1, 114688, null, 0, v, [y.a, x.a, R, S.a, T.a, P, I], null, null)], function(e, n) {
                e(n, 1, 0)
            }, null)
        }

        function kl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "themes-panel", [], null, null, null, $, q)), l["\u0275did"](1, 114688, null, 0, H, [z, I, P, R, T.a, x.a], null, null)], function(e, n) {
                e(n, 1, 0)
            }, null)
        }

        function Cl(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                drawer: 0
            }), l["\u0275qud"](402653184, 2, {
                dragHelper: 0
            }), l["\u0275qud"](402653184, 3, {
                loaderEl: 0
            }), (e()(), l["\u0275eld"](3, 0, null, null, 1, "inspector", [], null, null, null, Zt, Xt)), l["\u0275did"](4, 114688, null, 0, Ht, [On, ge, Wt, ft.a, R, T.a, l.ElementRef, x.a, at, S.a, $t.a], null, null), (e()(), l["\u0275eld"](5, 0, null, null, 13, "mat-drawer-container", [
                ["class", "mat-drawer-container"]
            ], null, null, null, ll, nl)), l["\u0275did"](6, 1490944, null, 2, Yt.c, [
                [2, ee.c], l.ElementRef, l.NgZone, l.ChangeDetectorRef, Yt.a
            ], null, null), l["\u0275qud"](603979776, 4, {
                _drawers: 1
            }), l["\u0275qud"](335544320, 5, {
                _content: 0
            }), (e()(), l["\u0275eld"](9, 0, null, 0, 5, "mat-drawer", [
                ["class", "mat-drawer"],
                ["tabIndex", "-1"]
            ], [
                [40, "@transform", 0],
                [1, "align", 0],
                [2, "mat-drawer-end", null],
                [2, "mat-drawer-over", null],
                [2, "mat-drawer-push", null],
                [2, "mat-drawer-side", null]
            ], [
                ["component", "@transform.start"],
                ["component", "@transform.done"],
                [null, "keydown"]
            ], function(e, n, t) {
                var o = !0;
                return "component:@transform.start" === n && (o = !1 !== l["\u0275nov"](e, 10)._onAnimationStart(t) && o), "component:@transform.done" === n && (o = !1 !== l["\u0275nov"](e, 10)._onAnimationEnd(t) && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 10).handleKeydown(t) && o), o
            }, el, Jt)), l["\u0275did"](10, 3325952, [
                [4, 4],
                [1, 4],
                ["inspectorDrawer", 4]
            ], 0, Yt.b, [l.ElementRef, A.j, A.i, L.a, [2, g.DOCUMENT]], null, null), (e()(), l["\u0275and"](16777216, null, 0, 1, null, _l)), l["\u0275did"](12, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, 0, 1, null, kl)), l["\u0275did"](14, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275eld"](15, 0, null, 1, 3, "mat-drawer-content", [
                ["class", "mat-drawer-content"]
            ], [
                [4, "margin-left", "px"],
                [4, "margin-right", "px"]
            ], null, null, Qt, Kt)), l["\u0275did"](16, 1097728, [
                [5, 4]
            ], 0, Yt.d, [l.ChangeDetectorRef, Yt.c], null, null), (e()(), l["\u0275eld"](17, 0, null, 0, 1, "live-preview", [], null, null, null, fl, hl)), l["\u0275did"](18, 114688, null, 0, pl, [he, at], null, null), (e()(), l["\u0275eld"](19, 0, null, null, 1, "drag-visual-helper", [
                ["class", "drag-helper"]
            ], null, null, null, bl, gl)), l["\u0275did"](20, 49152, [
                [2, 4],
                ["dragHelper", 4]
            ], 0, ml, [l.Renderer2, l.ElementRef, ke], null, null), (e()(), l["\u0275eld"](21, 0, null, null, 1, "loading-indicator", [
                ["class", "overlay"]
            ], [
                [2, "visible", null]
            ], null, null, vl.b, vl.a)), l["\u0275did"](22, 49152, null, 0, yl.a, [l.ElementRef], {
                isVisible: [0, "isVisible"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 4, 0), e(n, 6, 0), e(n, 12, 0, "templates" === t.getInspectorDrawerPanel()), e(n, 14, 0, "themes" === t.getInspectorDrawerPanel()), e(n, 18, 0), e(n, 22, 0, t.loader.isVisible())
            }, function(e, n) {
                e(n, 9, 0, l["\u0275nov"](n, 10)._animationState, null, "end" === l["\u0275nov"](n, 10).position, "over" === l["\u0275nov"](n, 10).mode, "push" === l["\u0275nov"](n, 10).mode, "side" === l["\u0275nov"](n, 10).mode), e(n, 15, 0, l["\u0275nov"](n, 16)._margins.left, l["\u0275nov"](n, 16)._margins.right), e(n, 21, 0, l["\u0275nov"](n, 22).isVisible)
            })
        }
        var El = l["\u0275ccf"]("html-builder", xl, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "html-builder", [], null, null, null, Cl, wl)), l["\u0275did"](1, 245760, null, 0, xl, [be.a, m.a, R, P, ke, I, Wt], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {}, []),
            Rl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\n\n\n\n\ngradient-background-panel{display:block;width:260px;height:400px;background-color:#fff;-webkit-box-shadow:-1px 0 2px rgba(0,0,0,.5);box-shadow:-1px 0 2px rgba(0,0,0,.5);border-radius:2px}gradient-background-panel>.header{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;color:inherit;font-weight:500;border-bottom:1px solid #e0e0e0}gradient-background-panel>.header>.close-button{margin-left:auto}gradient-background-panel>.previews{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:10px}gradient-background-panel>.previews>.preview{-webkit-box-flex:0;-ms-flex:0 0 23%;flex:0 0 23%;width:23%;height:50px;margin-bottom:7px;border:1px solid #e0e0e0;-webkit-transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1);transition:box-shadow .28s cubic-bezier(.4,0,.2,1),-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1)}gradient-background-panel>.previews>.preview:hover{-webkit-box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}"]
                ],
                data: {}
            });

        function Sl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 0, "button", [
                ["class", "preview no-style"]
            ], [
                [4, "background", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.emitSelectedEvent(e.context.$implicit) && l), l
            }, null, null))], null, function(e, n) {
                e(n, 0, 0, n.context.$implicit)
            })
        }

        function Tl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 6, "div", [
                ["class", "header"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Gradient Background"])), (e()(), l["\u0275eld"](4, 0, null, null, 2, "button", [
                ["class", "close-button no-style"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.emitClosedEvent() && l), l
            }, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 1, "svg-icon", [
                ["name", "close"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](6, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 2, "div", [
                ["class", "previews"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Sl)), l["\u0275did"](9, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 6, 0, "close"), e(n, 9, 0, t.gradients)
            }, null)
        }
        var Pl = l["\u0275ccf"]("gradient-background-panel", Ue, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "gradient-background-panel", [], null, null, null, Tl, Rl)), l["\u0275did"](1, 49152, null, 0, Ue, [], null, null)], null, null)
            }, {}, {
                selected: "selected",
                closed: "closed"
            }, []),
            Il = t("TFmc"),
            Dl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ngoogle-fonts-panel{display:block;width:260px;min-height:600px;background-color:#fff;-webkit-box-shadow:-1px 0 2px rgba(0,0,0,.5);box-shadow:-1px 0 2px rgba(0,0,0,.5);border-radius:2px;color:rgba(0,0,0,.87)}google-fonts-panel>.header{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;color:inherit;border-bottom:1px solid #e0e0e0}google-fonts-panel>.header>.close-button{margin-left:auto}google-fonts-panel>.search{padding:10px;width:auto}google-fonts-panel>.search>input{background-color:#fff;border-color:#e0e0e0}google-fonts-panel>.fonts{text-align:center;padding:10px 0}google-fonts-panel>.fonts>.font{display:block;font-size:1.8rem;margin-bottom:10px;width:100%}google-fonts-panel>.fonts>.font:hover{text-decoration:underline}google-fonts-panel>.pagination{padding:0 10px 10px;text-align:right;margin-top:auto}"]
                ],
                data: {}
            });

        function Ol(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "button", [
                ["class", "no-style font"]
            ], [
                [4, "fontFamily", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyFont(e.context.$implicit.family) && l), l
            }, null, null)), (e()(), l["\u0275ted"](1, null, ["", ""]))], null, function(e, n) {
                e(n, 0, 0, n.context.$implicit.family), e(n, 1, 0, n.context.$implicit.family)
            })
        }

        function Ml(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 6, "div", [
                ["class", "header"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Google Fonts"])), (e()(), l["\u0275eld"](4, 0, null, null, 2, "button", [
                ["class", "close-button no-style"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.emitClosedEvent() && l), l
            }, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 1, "svg-icon", [
                ["name", "close"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](6, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 7, "div", [
                ["class", "input-container search"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](8, 0, null, null, 6, "input", [
                ["placeholder", "Search..."],
                ["trans-placeholder", ""],
                ["type", "search"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 9)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 9).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 9)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 9)._compositionEnd(t.target.value) && o), o
            }, null, null)), l["\u0275did"](9, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](11, 540672, null, 0, Pe.g, [
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                form: [0, "form"]
            }, null), l["\u0275prd"](2048, null, Pe.n, null, [Pe.g]), l["\u0275did"](13, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](14, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275eld"](15, 0, null, null, 2, "div", [
                ["class", "fonts"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, Ol)), l["\u0275did"](17, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 8, "div", [
                ["class", "pagination"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](19, 16777216, null, null, 3, "button", [
                ["class", "no-style previous-page"],
                ["matTooltip", "Previous Page"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 20).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 20)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 20)._handleTouchend() && o), "click" === n && (o = !1 !== i.previousPage() && o), o
            }, null, null)), l["\u0275did"](20, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](21, 0, null, null, 1, "svg-icon", [
                ["name", "keyboard-arrow-left"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](22, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](23, 16777216, null, null, 3, "button", [
                ["class", "no-style next-page"],
                ["matTooltip", "Next Page"]
            ], null, [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 24).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 24)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 24)._handleTouchend() && o), "click" === n && (o = !1 !== i.nextPage() && o), o
            }, null, null)), l["\u0275did"](24, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](25, 0, null, null, 1, "svg-icon", [
                ["name", "keyboard-arrow-right"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](26, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 6, 0, "close"), e(n, 11, 0, t.searchControl), e(n, 17, 0, t.filteredFonts[t.fontPage]), e(n, 20, 0, "Previous Page"), e(n, 22, 0, "keyboard-arrow-left"), e(n, 24, 0, "Next Page"), e(n, 26, 0, "keyboard-arrow-right")
            }, function(e, n) {
                e(n, 8, 0, l["\u0275nov"](n, 13).ngClassUntouched, l["\u0275nov"](n, 13).ngClassTouched, l["\u0275nov"](n, 13).ngClassPristine, l["\u0275nov"](n, 13).ngClassDirty, l["\u0275nov"](n, 13).ngClassValid, l["\u0275nov"](n, 13).ngClassInvalid, l["\u0275nov"](n, 13).ngClassPending)
            })
        }
        var Nl = l["\u0275ccf"]("google-fonts-panel", yn, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "google-fonts-panel", [], null, null, null, Ml, Dl)), l["\u0275did"](1, 114688, null, 0, yn, [Il.a, _e, x.a], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {
                selected: "selected",
                closed: "closed"
            }, []),
            Bl = t("9Rbf"),
            jl = t("vneY"),
            Ll = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nimage-background-panel{display:block;width:260px;height:565px;background-color:#fff;-webkit-box-shadow:-1px 0 2px rgba(0,0,0,.5);box-shadow:-1px 0 2px rgba(0,0,0,.5);border-radius:2px;text-align:center}image-background-panel>.header{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;color:inherit;font-weight:500;border-bottom:1px solid #fff}image-background-panel>.header>.close-button{margin-left:auto}image-background-panel>.upload-button{width:90%;margin:15px 0}image-background-panel>.separator{padding:10px;color:inherit;background-color:#fafafa;margin:10px 0;text-align:left;font-weight:500}image-background-panel>.textures{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;max-height:190px;overflow:auto;position:relative}image-background-panel>.textures>.texture{width:50px;height:50px;margin:5px;border:1px solid #e0e0e0}image-background-panel>.textures>.texture>img{width:100%;height:100%}image-background-panel .image-properties{display:-webkit-box;display:-ms-flexbox;display:flex;color:rgba(0,0,0,.54);text-align:left}image-background-panel .image-properties>.property-panel{-webkit-box-flex:0;-ms-flex:0 1 50%;flex:0 1 50%;padding:10px}image-background-panel .image-properties>.property-panel>.title{margin-bottom:5px}image-background-panel .image-properties .mat-radio-button{display:block;margin-bottom:5px}image-background-panel .position>.controls{width:90px;height:90px}image-background-panel .position>.controls>.box{display:inline-block;width:25px;height:25px;margin:2.5px;background-color:#fafafa;border:1px solid #e0e0e0;border-radius:2px}image-background-panel .position>.controls>.box.active{background-color:#009688;border-color:#009688}"]
                ],
                data: {}
            });

        function Al(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "button", [
                ["class", "no-style texture"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "click" === n && (l = !1 !== o.emitSelectedEvent(o.getTextureUrl(e.context.index)) && l), l
            }, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 0, "img", [], [
                [8, "src", 4]
            ], null, null, null, null))], null, function(e, n) {
                e(n, 1, 0, n.component.getTextureUrl(n.context.index))
            })
        }

        function Fl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 6, "div", [
                ["class", "header"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 2, "div", [
                ["class", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](2, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Image Background"])), (e()(), l["\u0275eld"](4, 0, null, null, 2, "button", [
                ["class", "close-button no-style"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.emitClosedEvent() && l), l
            }, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 1, "svg-icon", [
                ["name", "close"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](6, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](7, 0, null, null, 3, "button", [
                ["class", "upload-button"],
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.uploadImage() && l), l
            }, B.d, B.b)), l["\u0275did"](8, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](9, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Upload Image"])), (e()(), l["\u0275eld"](11, 0, null, null, 2, "div", [
                ["class", "separator"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](12, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Textures"])), (e()(), l["\u0275eld"](14, 0, null, null, 3, "div", [
                ["class", "textures"],
                ["customScrollbar", ""]
            ], null, null, null, null, null)), l["\u0275did"](15, 4341760, null, 0, f.a, [l.ElementRef, m.m], {
                theme: [0, "theme"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Al)), l["\u0275did"](17, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](18, 0, null, null, 2, "div", [
                ["class", "separator"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](19, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Image Properties"])), (e()(), l["\u0275eld"](21, 0, null, null, 41, "div", [
                ["class", "image-properties"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](22, 0, null, null, 26, "div", [
                ["class", "repeat property-panel"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](23, 0, null, null, 2, "div", [
                ["class", "title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](24, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Repeat"])), (e()(), l["\u0275eld"](26, 0, null, null, 22, "mat-radio-group", [
                ["class", "controls mat-radio-group"],
                ["role", "radiogroup"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "ngModelChange" === n && (l = !1 !== (o.backgroundRepeat = t) && l), "ngModelChange" === n && (l = !1 !== o.applyStyle("backgroundRepeat", o.backgroundRepeat) && l), l
            }, null, null)), l["\u0275did"](27, 1064960, null, 1, Bl.b, [l.ChangeDetectorRef], null, null), l["\u0275qud"](603979776, 1, {
                _radios: 1
            }), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Bl.b]), l["\u0275did"](30, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                model: [0, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](32, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](33, 0, null, null, 3, "mat-radio-button", [
                ["class", "mat-radio-button"],
                ["trans", ""],
                ["value", "no-repeat"]
            ], [
                [2, "mat-radio-checked", null],
                [2, "mat-radio-disabled", null],
                [1, "id", 0]
            ], [
                [null, "focus"]
            ], function(e, n, t) {
                var o = !0;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 35)._inputElement.nativeElement.focus() && o), o
            }, jl.b, jl.a)), l["\u0275did"](34, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](35, 4440064, [
                [1, 4]
            ], 0, Bl.a, [
                [2, Bl.b], l.ElementRef, l.ChangeDetectorRef, A.i, ie.c
            ], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["None"])), (e()(), l["\u0275eld"](37, 0, null, null, 3, "mat-radio-button", [
                ["class", "mat-radio-button"],
                ["trans", ""],
                ["value", "repeat-x"]
            ], [
                [2, "mat-radio-checked", null],
                [2, "mat-radio-disabled", null],
                [1, "id", 0]
            ], [
                [null, "focus"]
            ], function(e, n, t) {
                var o = !0;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 39)._inputElement.nativeElement.focus() && o), o
            }, jl.b, jl.a)), l["\u0275did"](38, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](39, 4440064, [
                [1, 4]
            ], 0, Bl.a, [
                [2, Bl.b], l.ElementRef, l.ChangeDetectorRef, A.i, ie.c
            ], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["Horizontal"])), (e()(), l["\u0275eld"](41, 0, null, null, 3, "mat-radio-button", [
                ["class", "mat-radio-button"],
                ["trans", ""],
                ["value", "repeat-y"]
            ], [
                [2, "mat-radio-checked", null],
                [2, "mat-radio-disabled", null],
                [1, "id", 0]
            ], [
                [null, "focus"]
            ], function(e, n, t) {
                var o = !0;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 43)._inputElement.nativeElement.focus() && o), o
            }, jl.b, jl.a)), l["\u0275did"](42, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](43, 4440064, [
                [1, 4]
            ], 0, Bl.a, [
                [2, Bl.b], l.ElementRef, l.ChangeDetectorRef, A.i, ie.c
            ], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["Vertical"])), (e()(), l["\u0275eld"](45, 0, null, null, 3, "mat-radio-button", [
                ["class", "mat-radio-button"],
                ["trans", ""],
                ["value", "repeat"]
            ], [
                [2, "mat-radio-checked", null],
                [2, "mat-radio-disabled", null],
                [1, "id", 0]
            ], [
                [null, "focus"]
            ], function(e, n, t) {
                var o = !0;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 47)._inputElement.nativeElement.focus() && o), o
            }, jl.b, jl.a)), l["\u0275did"](46, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), l["\u0275did"](47, 4440064, [
                [1, 4]
            ], 0, Bl.a, [
                [2, Bl.b], l.ElementRef, l.ChangeDetectorRef, A.i, ie.c
            ], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](-1, 0, ["All"])), (e()(), l["\u0275eld"](49, 0, null, null, 13, "div", [
                ["class", "position property-panel"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](50, 0, null, null, 2, "div", [
                ["class", "title"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](51, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Position"])), (e()(), l["\u0275eld"](53, 0, null, null, 9, "div", [
                ["class", "controls"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](54, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "top left") && l), l
            }, null, null)), (e()(), l["\u0275eld"](55, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "top center") && l), l
            }, null, null)), (e()(), l["\u0275eld"](56, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "top right") && l), l
            }, null, null)), (e()(), l["\u0275eld"](57, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "center center") && l), l
            }, null, null)), (e()(), l["\u0275eld"](58, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "center right") && l), l
            }, null, null)), (e()(), l["\u0275eld"](59, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "center left") && l), l
            }, null, null)), (e()(), l["\u0275eld"](60, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "bottom left") && l), l
            }, null, null)), (e()(), l["\u0275eld"](61, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "bottom center") && l), l
            }, null, null)), (e()(), l["\u0275eld"](62, 0, null, null, 0, "button", [
                ["class", "no-style box"]
            ], [
                [2, "active", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.applyStyle("backgroundPosition", "bottom right") && l), l
            }, null, null))], function(e, n) {
                var t = n.component;
                e(n, 6, 0, "close"), e(n, 8, 0, "accent"), e(n, 15, 0, ""), e(n, 17, 0, t.textures), e(n, 30, 0, t.backgroundRepeat), e(n, 35, 0, "no-repeat"), e(n, 39, 0, "repeat-x"), e(n, 43, 0, "repeat-y"), e(n, 47, 0, "repeat")
            }, function(e, n) {
                var t = n.component;
                e(n, 7, 0, l["\u0275nov"](n, 8).disabled || null), e(n, 26, 0, l["\u0275nov"](n, 32).ngClassUntouched, l["\u0275nov"](n, 32).ngClassTouched, l["\u0275nov"](n, 32).ngClassPristine, l["\u0275nov"](n, 32).ngClassDirty, l["\u0275nov"](n, 32).ngClassValid, l["\u0275nov"](n, 32).ngClassInvalid, l["\u0275nov"](n, 32).ngClassPending), e(n, 33, 0, l["\u0275nov"](n, 35).checked, l["\u0275nov"](n, 35).disabled, l["\u0275nov"](n, 35).id), e(n, 37, 0, l["\u0275nov"](n, 39).checked, l["\u0275nov"](n, 39).disabled, l["\u0275nov"](n, 39).id), e(n, 41, 0, l["\u0275nov"](n, 43).checked, l["\u0275nov"](n, 43).disabled, l["\u0275nov"](n, 43).id), e(n, 45, 0, l["\u0275nov"](n, 47).checked, l["\u0275nov"](n, 47).disabled, l["\u0275nov"](n, 47).id), e(n, 54, 0, "top left" === t.backgroundPosition), e(n, 55, 0, "top center" === t.backgroundPosition), e(n, 56, 0, "top right" === t.backgroundPosition), e(n, 57, 0, "center center" === t.backgroundPosition), e(n, 58, 0, "center right" === t.backgroundPosition), e(n, 59, 0, "center left" === t.backgroundPosition), e(n, 60, 0, "bottom left" === t.backgroundPosition), e(n, 61, 0, "bottom center" === t.backgroundPosition), e(n, 62, 0, "bottom right" === t.backgroundPosition)
            })
        }
        var Vl = l["\u0275ccf"]("image-background-panel", $e, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "image-background-panel", [], null, null, null, Fl, Ll)), l["\u0275did"](1, 114688, null, 0, $e, [he, S.a, x.a, R, Ye], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {
                selected: "selected",
                closed: "closed"
            }, []),
            Hl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ninline-text-editor{display:block;background-color:#fff;-webkit-box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);width:648px;overflow:hidden}inline-text-editor>.icons-panel,inline-text-editor>.link-panel,inline-text-editor>.toolbar{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px}inline-text-editor>.link-panel{border-top:1px solid #e0e0e0}inline-text-editor>.link-panel>button{margin-left:8px}inline-text-editor>.icons-panel{border-top:1px solid #e0e0e0;-ms-flex-wrap:wrap;flex-wrap:wrap;height:400px;width:100%;overflow:auto;position:relative}inline-text-editor .controls-group{margin-right:5px;padding-right:5px;border-right:1px solid rgba(0,0,0,.08)}inline-text-editor .controls-group:last-of-type{border-right:none;margin-right:0;padding-right:0}inline-text-editor .controls-group.flex-group{display:-webkit-box;display:-ms-flexbox;display:flex}inline-text-editor .controls-group>.input-container{margin-right:5px}inline-text-editor .controls-group .active{color:#009688}"]
                ],
                data: {}
            });

        function zl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit), e(n, 2, 0, n.context.$implicit)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit)
            })
        }

        function ql(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit.css), e(n, 2, 0, n.context.$implicit.css)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit.name)
            })
        }

        function Ul(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 17, "form", [
                ["class", "link-panel"],
                ["ngNativeValidate", ""]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngSubmit"],
                [null, "submit"],
                [null, "reset"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "submit" === n && (o = !1 !== l["\u0275nov"](e, 1).onSubmit(t) && o), "reset" === n && (o = !1 !== l["\u0275nov"](e, 1).onReset() && o), "ngSubmit" === n && (o = !1 !== i.createLink() && o), o
            }, null, null)), l["\u0275did"](1, 4210688, null, 0, Pe.q, [
                [8, null],
                [8, null]
            ], null, {
                ngSubmit: "ngSubmit"
            }), l["\u0275prd"](2048, null, Pe.c, null, [Pe.q]), l["\u0275did"](3, 16384, null, 0, Pe.p, [Pe.c], null, null), (e()(), l["\u0275eld"](4, 0, null, null, 9, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 8, "input", [
                ["name", "inline-editor-link"],
                ["placeholder", "Enter url..."],
                ["required", ""],
                ["trans-placeholder", ""],
                ["type", "url"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 6)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 6).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 6)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 6)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.linkModel = t) && o), o
            }, null, null)), l["\u0275did"](6, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](7, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](10, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](12, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275eld"](14, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "submit"]
            ], [
                [8, "disabled", 0]
            ], null, null, B.d, B.b)), l["\u0275did"](15, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                color: [0, "color"]
            }, null), l["\u0275did"](16, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Add"]))], function(e, n) {
                var t = n.component;
                e(n, 7, 0, ""), e(n, 10, 0, "inline-editor-link", t.linkModel), e(n, 15, 0, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 3).ngClassUntouched, l["\u0275nov"](n, 3).ngClassTouched, l["\u0275nov"](n, 3).ngClassPristine, l["\u0275nov"](n, 3).ngClassDirty, l["\u0275nov"](n, 3).ngClassValid, l["\u0275nov"](n, 3).ngClassInvalid, l["\u0275nov"](n, 3).ngClassPending), e(n, 5, 0, l["\u0275nov"](n, 7).required ? "" : null, l["\u0275nov"](n, 12).ngClassUntouched, l["\u0275nov"](n, 12).ngClassTouched, l["\u0275nov"](n, 12).ngClassPristine, l["\u0275nov"](n, 12).ngClassDirty, l["\u0275nov"](n, 12).ngClassValid, l["\u0275nov"](n, 12).ngClassInvalid, l["\u0275nov"](n, 12).ngClassPending), e(n, 14, 0, l["\u0275nov"](n, 15).disabled || null)
            })
        }

        function Wl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "button", [
                ["mat-icon-button", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.insertIcon(e.context.$implicit) && l), l
            }, B.d, B.b)), l["\u0275did"](1, 278528, null, 0, g.NgClass, [l.IterableDiffers, l.KeyValueDiffers, l.ElementRef, l.Renderer2], {
                ngClass: [0, "ngClass"]
            }, null), l["\u0275did"](2, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null)], function(e, n) {
                e(n, 1, 0, n.context.$implicit)
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 2).disabled || null)
            })
        }

        function $l(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "div", [
                ["class", "icons-panel"],
                ["customScrollbar", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, f.a, [l.ElementRef, m.m], {
                theme: [0, "theme"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Wl)), l["\u0275did"](3, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 1, 0, ""), e(n, 3, 0, t.styles.icons)
            }, null)
        }

        function Xl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 58, "div", [
                ["class", "toolbar"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](1, 0, null, null, 8, "div", [
                ["class", "controls-group flex-group"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 3, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 2, "select", [
                ["id", "font-size"],
                ["name", "font-size"]
            ], null, [
                [null, "change"]
            ], function(e, n, t) {
                var l = !0;
                return "change" === n && (l = !1 !== e.component.execCommand("fontSize", t.target.value) && l), l
            }, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, zl)), l["\u0275did"](5, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](6, 0, null, null, 3, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](7, 0, null, null, 2, "select", [
                ["id", "font-family"],
                ["name", "font-family"]
            ], null, [
                [null, "change"]
            ], function(e, n, t) {
                var l = !0;
                return "change" === n && (l = !1 !== e.component.execCommand("fontName", t.target.value) && l), l
            }, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, ql)), l["\u0275did"](9, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](10, 0, null, null, 20, "div", [
                ["class", "controls-group"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](11, 16777216, null, null, 4, "button", [
                ["class", "no-style italic"],
                ["mat-icon-button", ""],
                ["matTooltip", "Bold"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 13).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 13)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 13)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("bold") && o), o
            }, B.d, B.b)), l["\u0275did"](12, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](13, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](14, 0, null, 0, 1, "svg-icon", [
                ["name", "format-bold"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](15, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](16, 16777216, null, null, 4, "button", [
                ["class", "no-style italic"],
                ["mat-icon-button", ""],
                ["matTooltip", "Italic"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 18).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 18)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 18)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("italic") && o), o
            }, B.d, B.b)), l["\u0275did"](17, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](18, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](19, 0, null, 0, 1, "svg-icon", [
                ["name", "format-italic"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](20, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](21, 16777216, null, null, 4, "button", [
                ["class", "no-style underline"],
                ["mat-icon-button", ""],
                ["matTooltip", "Underline"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 23).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 23)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 23)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("underline") && o), o
            }, B.d, B.b)), l["\u0275did"](22, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](23, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](24, 0, null, 0, 1, "svg-icon", [
                ["name", "format-underlined"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](25, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](26, 16777216, null, null, 4, "button", [
                ["class", "no-style strike"],
                ["mat-icon-button", ""],
                ["matTooltip", "Strikethrough"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 28).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 28)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 28)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("strikethrough") && o), o
            }, B.d, B.b)), l["\u0275did"](27, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](28, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](29, 0, null, 0, 1, "svg-icon", [
                ["name", "format-strikethrough"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](30, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](31, 0, null, null, 5, "div", [
                ["class", "controls-group"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](32, 16777216, null, null, 4, "button", [
                ["mat-icon-button", ""],
                ["matTooltip", "Add Link"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 34).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 34)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 34)._handleTouchend() && o), "click" === n && (o = !1 !== i.togglePanel("link") && o), o
            }, B.d, B.b)), l["\u0275did"](33, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](34, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](35, 0, null, 0, 1, "svg-icon", [
                ["name", "link"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](36, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](37, 0, null, null, 15, "div", [
                ["class", "controls-group text-align"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](38, 16777216, null, null, 4, "button", [
                ["class", "no-style"],
                ["mat-icon-button", ""],
                ["matTooltip", "Align left"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 40).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 40)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 40)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("justifyLeft") && o), o
            }, B.d, B.b)), l["\u0275did"](39, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](40, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](41, 0, null, 0, 1, "svg-icon", [
                ["name", "format-align-left"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](42, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](43, 16777216, null, null, 4, "button", [
                ["class", "no-style"],
                ["mat-icon-button", ""],
                ["matTooltip", "Align center"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 45).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 45)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 45)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("justifyCenter") && o), o
            }, B.d, B.b)), l["\u0275did"](44, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](45, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](46, 0, null, 0, 1, "svg-icon", [
                ["name", "format-align-center"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](47, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](48, 16777216, null, null, 4, "button", [
                ["class", "no-style"],
                ["mat-icon-button", ""],
                ["matTooltip", "Align right"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 50).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 50)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 50)._handleTouchend() && o), "click" === n && (o = !1 !== i.execCommand("justifyRight") && o), o
            }, B.d, B.b)), l["\u0275did"](49, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](50, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](51, 0, null, 0, 1, "svg-icon", [
                ["name", "format-align-right"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](52, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](53, 0, null, null, 5, "div", [
                ["class", "controls-group"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](54, 16777216, null, null, 4, "button", [
                ["mat-icon-button", ""],
                ["matTooltip", "Add Icon"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"],
                [null, "longpress"],
                [null, "keydown"],
                [null, "touchend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "longpress" === n && (o = !1 !== l["\u0275nov"](e, 56).show() && o), "keydown" === n && (o = !1 !== l["\u0275nov"](e, 56)._handleKeydown(t) && o), "touchend" === n && (o = !1 !== l["\u0275nov"](e, 56)._handleTouchend() && o), "click" === n && (o = !1 !== i.togglePanel("icons") && o), o
            }, B.d, B.b)), l["\u0275did"](55, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](56, 147456, null, 0, K.d, [Q.c, l.ElementRef, J.d, l.ViewContainerRef, l.NgZone, L.a, A.d, A.i, K.b, [2, ee.c],
                [2, K.a]
            ], {
                message: [0, "message"]
            }, null), (e()(), l["\u0275eld"](57, 0, null, 0, 1, "svg-icon", [
                ["name", "insert-emoticon"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](58, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Ul)), l["\u0275did"](60, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, $l)), l["\u0275did"](62, 16384, null, 0, g.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 5, 0, t.styles.sizes), e(n, 9, 0, t.styles.fonts), e(n, 13, 0, "Bold"), e(n, 15, 0, "format-bold"), e(n, 18, 0, "Italic"), e(n, 20, 0, "format-italic"), e(n, 23, 0, "Underline"), e(n, 25, 0, "format-underlined"), e(n, 28, 0, "Strikethrough"), e(n, 30, 0, "format-strikethrough"), e(n, 34, 0, "Add Link"), e(n, 36, 0, "link"), e(n, 40, 0, "Align left"), e(n, 42, 0, "format-align-left"), e(n, 45, 0, "Align center"), e(n, 47, 0, "format-align-center"), e(n, 50, 0, "Align right"), e(n, 52, 0, "format-align-right"), e(n, 56, 0, "Add Icon"), e(n, 58, 0, "insert-emoticon"), e(n, 60, 0, t.linkPanelIsOpen), e(n, 62, 0, t.iconsPanelIsOpen)
            }, function(e, n) {
                var t = n.component;
                e(n, 11, 0, t.commandIsActive("bold"), l["\u0275nov"](n, 12).disabled || null), e(n, 16, 0, t.commandIsActive("italic"), l["\u0275nov"](n, 17).disabled || null), e(n, 21, 0, t.commandIsActive("underline"), l["\u0275nov"](n, 22).disabled || null), e(n, 26, 0, t.commandIsActive("strikethrough"), l["\u0275nov"](n, 27).disabled || null), e(n, 32, 0, t.linkPanelIsOpen, l["\u0275nov"](n, 33).disabled || null), e(n, 38, 0, t.commandIsActive("justifyLeft"), l["\u0275nov"](n, 39).disabled || null), e(n, 43, 0, t.commandIsActive("justifyCenter"), l["\u0275nov"](n, 44).disabled || null), e(n, 48, 0, t.commandIsActive("justifyRight"), l["\u0275nov"](n, 49).disabled || null), e(n, 54, 0, t.iconsPanelIsOpen, l["\u0275nov"](n, 55).disabled || null)
            })
        }
        var Gl = l["\u0275ccf"]("inline-text-editor", ul, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "inline-text-editor", [], null, null, null, Xl, Hl)), l["\u0275did"](1, 245760, null, 0, ul, [_e, x.a, ge], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {}, []),
            Zl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\ncode-editor{display:block;min-width:800px;min-height:540px;width:100%;height:100%;background-color:#fff;-webkit-box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12)}code-editor .toolbar{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#fafafa}code-editor .toolbar>.theme-select-container{max-width:150px}code-editor .toolbar>.type-buttons{margin-left:auto}code-editor .toolbar .action-buttons{margin-left:80px}code-editor .toolbar .active{color:#009688}code-editor .editor-container{height:calc(100% - 40px)}code-editor .editor{height:100%;min-height:500px;border:1px solid #e0e0e0;font-size:1.4rem}"]
                ],
                data: {}
            });

        function Yl(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 3, "option", [], null, null, null, null, null)), l["\u0275did"](1, 147456, null, 0, Pe.s, [l.ElementRef, l.Renderer2, [2, Pe.v]], {
                value: [0, "value"]
            }, null), l["\u0275did"](2, 147456, null, 0, Pe.B, [l.ElementRef, l.Renderer2, [8, null]], {
                value: [0, "value"]
            }, null), (e()(), l["\u0275ted"](3, null, ["", ""]))], function(e, n) {
                e(n, 1, 0, n.context.$implicit), e(n, 2, 0, n.context.$implicit)
            }, function(e, n) {
                e(n, 3, 0, n.context.$implicit)
            })
        }

        function Kl(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                editorEl: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 24, "div", [
                ["class", "toolbar"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](2, 0, null, null, 8, "div", [
                ["class", "input-container theme-select-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 7, "select", [
                ["id", "editor-theme"],
                ["name", "editor-theme"]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "change"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "change" === n && (o = !1 !== l["\u0275nov"](e, 4).onChange(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 4).onTouched() && o), "ngModelChange" === n && (o = !1 !== (i.theme = t) && o), "ngModelChange" === n && (o = !1 !== i.useTheme(i.theme) && o), o
            }, null, null)), l["\u0275did"](4, 16384, null, 0, Pe.v, [l.Renderer2, l.ElementRef], null, null), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.v]), l["\u0275did"](6, 671744, null, 0, Pe.r, [
                [8, null],
                [8, null],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](8, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, Yl)), l["\u0275did"](10, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](11, 0, null, null, 9, "div", [
                ["class", "type-buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](12, 0, null, null, 2, "button", [
                ["mat-button", ""],
                ["type", "button"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.switchType("html") && l), l
            }, B.d, B.b)), l["\u0275did"](13, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275ted"](-1, 0, ["HTML"])), (e()(), l["\u0275eld"](15, 0, null, null, 2, "button", [
                ["mat-button", ""],
                ["type", "button"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.switchType("css") && l), l
            }, B.d, B.b)), l["\u0275did"](16, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275ted"](-1, 0, ["CSS"])), (e()(), l["\u0275eld"](18, 0, null, null, 2, "button", [
                ["mat-button", ""],
                ["type", "button"]
            ], [
                [2, "active", null],
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.switchType("js") && l), l
            }, B.d, B.b)), l["\u0275did"](19, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275ted"](-1, 0, ["JS"])), (e()(), l["\u0275eld"](21, 0, null, null, 4, "div", [
                ["class", "action-buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](22, 0, null, null, 3, "button", [
                ["mat-icon-button", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.closeEditor() && l), l
            }, B.d, B.b)), l["\u0275did"](23, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), (e()(), l["\u0275eld"](24, 0, null, 0, 1, "svg-icon", [
                ["name", "close"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](25, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](26, 0, null, null, 1, "div", [
                ["class", "editor-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](27, 0, [
                [1, 0],
                ["editor", 1]
            ], null, 0, "div", [
                ["class", "editor"]
            ], null, null, null, null, null))], function(e, n) {
                var t = n.component;
                e(n, 6, 0, "editor-theme", t.theme), e(n, 10, 0, t.themes), e(n, 25, 0, "close")
            }, function(e, n) {
                var t = n.component;
                e(n, 3, 0, l["\u0275nov"](n, 8).ngClassUntouched, l["\u0275nov"](n, 8).ngClassTouched, l["\u0275nov"](n, 8).ngClassPristine, l["\u0275nov"](n, 8).ngClassDirty, l["\u0275nov"](n, 8).ngClassValid, l["\u0275nov"](n, 8).ngClassInvalid, l["\u0275nov"](n, 8).ngClassPending), e(n, 12, 0, t.activeTypeIs("html"), l["\u0275nov"](n, 13).disabled || null), e(n, 15, 0, t.activeTypeIs("css"), l["\u0275nov"](n, 16).disabled || null), e(n, 18, 0, t.activeTypeIs("js"), l["\u0275nov"](n, 19).disabled || null), e(n, 22, 0, l["\u0275nov"](n, 23).disabled || null)
            })
        }
        var Ql = l["\u0275ccf"]("code-editor", Ut, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "code-editor", [], null, null, null, Kl, Zl)), l["\u0275did"](1, 245760, null, 0, Ut, [we.a, R, xe, _e], null, null)], function(e, n) {
                    e(n, 1, 0)
                }, null)
            }, {}, {}, []),
            Jl = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nlive-preview-context-menu{display:block}.context-menu-origin{position:fixed;width:1px;height:1px;visibility:hidden;pointer-events:none}.context-menu{width:300px;background-color:#fff;-webkit-box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);z-index:10;padding:8px 0}.context-menu .context-menu-item{width:100%;background-color:inherit;color:rgba(0,0,0,.87);border:none;line-height:48px;font-size:16px;height:48px;padding:0 16px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;cursor:pointer;outline:none}.context-menu .context-menu-item:hover:not(:disabled){background-color:rgba(0,0,0,.04)}.context-menu .context-menu-item:disabled{color:rgba(0,0,0,.38);cursor:default}.context-menu .context-menu-item>svg-icon{margin-right:16px;color:rgba(0,0,0,.54)}.context-menu .context-menu-item>.alt-text{margin-left:auto;color:rgba(0,0,0,.54);font-size:14px}.context-menu .context-menu-item>.indent{margin-left:40px}.context-menu .separator{background-color:rgba(0,0,0,.11);margin:8px 0;height:1px;max-height:1px;min-height:1px;width:100%}"]
                ],
                data: {}
            });

        function eo(e) {
            return l["\u0275vid"](0, [l["\u0275qud"](402653184, 1, {
                trigger: 0
            }), l["\u0275qud"](402653184, 2, {
                contextMenu: 0
            }), (e()(), l["\u0275eld"](2, 0, [
                [2, 0],
                ["contextMenu", 1]
            ], null, 89, "div", [
                ["class", "context-menu"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 5, "button", [
                ["class", "context-menu-item"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectParent() && l), l
            }, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "arrow-upward"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](5, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](6, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](7, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Select Parent"])), (e()(), l["\u0275eld"](9, 0, null, null, 5, "button", [
                ["class", "context-menu-item"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.selectChild() && l), l
            }, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "arrow-downward"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](11, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](12, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](13, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Select Child"])), (e()(), l["\u0275eld"](15, 0, null, null, 0, "div", [
                ["class", "separator"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](16, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.cut() && l), l
            }, null, null)), (e()(), l["\u0275eld"](17, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "content-cut"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](18, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](19, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](20, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Cut"])), (e()(), l["\u0275eld"](22, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Ctrl+Shift+X"])), (e()(), l["\u0275eld"](24, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.copy() && l), l
            }, null, null)), (e()(), l["\u0275eld"](25, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "content-copy"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](26, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](27, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](28, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Copy"])), (e()(), l["\u0275eld"](30, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Ctrl+Shift+C"])), (e()(), l["\u0275eld"](32, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.paste() && l), l
            }, null, null)), (e()(), l["\u0275eld"](33, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "content-paste"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](34, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](35, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](36, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Paste"])), (e()(), l["\u0275eld"](38, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Ctrl+Shift+V"])), (e()(), l["\u0275eld"](40, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.remove() && l), l
            }, null, null)), (e()(), l["\u0275eld"](41, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "delete"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](42, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](43, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](44, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Delete"])), (e()(), l["\u0275eld"](46, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Del"])), (e()(), l["\u0275eld"](48, 0, null, null, 5, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.duplicate() && l), l
            }, null, null)), (e()(), l["\u0275eld"](49, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "flip-to-back"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](50, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](51, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](52, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Duplicate"])), (e()(), l["\u0275eld"](54, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.move("up") && l), l
            }, null, null)), (e()(), l["\u0275eld"](55, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "keyboard-arrow-up"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](56, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](57, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](58, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Move Up"])), (e()(), l["\u0275eld"](60, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Arrow Up"])), (e()(), l["\u0275eld"](62, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.move("down") && l), l
            }, null, null)), (e()(), l["\u0275eld"](63, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "keyboard-arrow-down"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](64, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](65, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](66, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Move Down"])), (e()(), l["\u0275eld"](68, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Arrow Down"])), (e()(), l["\u0275eld"](70, 0, null, null, 0, "div", [
                ["class", "separator"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](71, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.undo() && l), l
            }, null, null)), (e()(), l["\u0275eld"](72, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "undo"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](73, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](74, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](75, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Undo"])), (e()(), l["\u0275eld"](77, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Ctrl+Z"])), (e()(), l["\u0275eld"](79, 0, null, null, 7, "button", [
                ["class", "context-menu-item"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.redo() && l), l
            }, null, null)), (e()(), l["\u0275eld"](80, 0, null, null, 1, "svg-icon", [
                ["class", "mat-icon"],
                ["name", "redo"]
            ], null, null, null, ne.b, ne.a)), l["\u0275did"](81, 114688, null, 0, te.a, [l.ElementRef, l.Renderer2, x.a], {
                name: [0, "name"]
            }, null), (e()(), l["\u0275eld"](82, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](83, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Redo"])), (e()(), l["\u0275eld"](85, 0, null, null, 1, "span", [
                ["class", "alt-text"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["Ctrl+Y"])), (e()(), l["\u0275eld"](87, 0, null, null, 0, "div", [
                ["class", "separator"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](88, 0, null, null, 3, "button", [
                ["class", "context-menu-item"]
            ], null, [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.viewSourceCode() && l), l
            }, null, null)), (e()(), l["\u0275eld"](89, 0, null, null, 2, "span", [
                ["class", "indent"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](90, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["View Source"]))], function(e, n) {
                e(n, 5, 0, "arrow-upward"), e(n, 11, 0, "arrow-downward"), e(n, 18, 0, "content-cut"), e(n, 26, 0, "content-copy"), e(n, 34, 0, "content-paste"), e(n, 42, 0, "delete"), e(n, 50, 0, "flip-to-back"), e(n, 56, 0, "keyboard-arrow-up"), e(n, 64, 0, "keyboard-arrow-down"), e(n, 73, 0, "undo"), e(n, 81, 0, "redo")
            }, function(e, n) {
                var t = n.component;
                e(n, 3, 0, !t.canSelectParent()), e(n, 9, 0, !t.canSelectChild()), e(n, 32, 0, !t.canPaste()), e(n, 71, 0, !t.undoManager.canUndo()), e(n, 79, 0, !t.undoManager.canRedo())
            })
        }
        var no = l["\u0275ccf"]("live-preview-context-menu", pe, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "live-preview-context-menu", [], null, null, null, eo, Jl)), l["\u0275did"](1, 49152, null, 0, pe, [ge, Wt, _e, xe], null, null)], null, null)
            }, {}, {}, []),
            to = t("aayJ"),
            lo = t("dYU3"),
            oo = l["\u0275crt"]({
                encapsulation: 2,
                styles: [
                    ["\n\n\nlink-editor{display:block;background-color:#fff;-webkit-box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12);width:648px;overflow:hidden}link-editor .mat-tab-body-content{padding:15px}link-editor .buttons{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;margin-top:15px}link-editor .page-list-item{cursor:pointer}link-editor .page-list-item:hover{background-color:#fafafa}link-editor .page-list-item.selected{background-color:#f1f1f1}"]
                ],
                data: {}
            });

        function io(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Url"]))], null, null)
        }

        function ao(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Page"]))], null, null)
        }

        function ro(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 4, "mat-list-item", [
                ["class", "page-list-item mat-list-item"],
                ["role", "listitem"]
            ], [
                [2, "selected", null]
            ], [
                [null, "click"],
                [null, "focus"],
                [null, "blur"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "focus" === n && (o = !1 !== l["\u0275nov"](e, 1)._handleFocus() && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 1)._handleBlur() && o), "click" === n && (o = !1 !== (i.hrefModel = e.context.$implicit.name) && o), o
            }, to.e, to.b)), l["\u0275did"](1, 1097728, null, 2, lo.c, [l.ElementRef, [2, lo.f]], null, null), l["\u0275qud"](603979776, 4, {
                _lines: 1
            }), l["\u0275qud"](335544320, 5, {
                _hasAvatar: 0
            }), (e()(), l["\u0275ted"](4, 2, [" ", " "]))], null, function(e, n) {
                e(n, 0, 0, n.component.hrefModel === n.context.$implicit.name), e(n, 4, 0, n.context.$implicit.name)
            })
        }

        function uo(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Download"]))], null, null)
        }

        function so(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 2, "span", [
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](1, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Email"]))], null, null)
        }

        function co(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 118, "mat-tab-group", [
                ["class", "mat-tab-group"],
                ["color", "accent"]
            ], [
                [2, "mat-tab-group-dynamic-height", null],
                [2, "mat-tab-group-inverted-header", null]
            ], [
                [null, "selectedTabChange"]
            ], function(e, n, t) {
                var l = !0;
                return "selectedTabChange" === n && (l = !1 !== e.component.resetModel() && l), l
            }, Dt.c, Dt.b)), l["\u0275did"](1, 3325952, null, 1, Ot.e, [l.ElementRef, l.ChangeDetectorRef], {
                color: [0, "color"],
                dynamicHeight: [1, "dynamicHeight"]
            }, {
                selectedTabChange: "selectedTabChange"
            }), l["\u0275qud"](603979776, 1, {
                _tabs: 1
            }), (e()(), l["\u0275eld"](3, 16777216, null, null, 27, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](4, 770048, [
                [1, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 2, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, io)), l["\u0275did"](7, 16384, [
                [2, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](8, 0, null, 0, 22, "form", [
                ["ngNativeValidate", ""]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngSubmit"],
                [null, "submit"],
                [null, "reset"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "submit" === n && (o = !1 !== l["\u0275nov"](e, 9).onSubmit(t) && o), "reset" === n && (o = !1 !== l["\u0275nov"](e, 9).onReset() && o), "ngSubmit" === n && (o = !1 !== i.setUrl() && o), o
            }, null, null)), l["\u0275did"](9, 4210688, null, 0, Pe.q, [
                [8, null],
                [8, null]
            ], null, {
                ngSubmit: "ngSubmit"
            }), l["\u0275prd"](2048, null, Pe.c, null, [Pe.q]), l["\u0275did"](11, 16384, null, 0, Pe.p, [Pe.c], null, null), (e()(), l["\u0275eld"](12, 0, null, null, 9, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](13, 0, null, null, 8, "input", [
                ["name", "url"],
                ["placeholder", "Enter website url..."],
                ["required", ""],
                ["trans-placeholder", ""],
                ["type", "url"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 14)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 14).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 14)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 14)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.hrefModel = t) && o), o
            }, null, null)), l["\u0275did"](14, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](15, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](18, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](20, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](21, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275eld"](22, 0, null, null, 8, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](23, 0, null, null, 3, "button", [
                ["mat-button", ""],
                ["trans", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.close() && l), l
            }, B.d, B.b)), l["\u0275did"](24, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](25, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Cancel"])), (e()(), l["\u0275eld"](27, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "submit"]
            ], [
                [8, "disabled", 0]
            ], null, null, B.d, B.b)), l["\u0275did"](28, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](29, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"])), (e()(), l["\u0275eld"](31, 16777216, null, null, 17, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](32, 770048, [
                [1, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 3, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, ao)), l["\u0275did"](35, 16384, [
                [3, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](36, 0, null, 0, 3, "mat-list", [
                ["class", "mat-list"],
                ["role", "list"]
            ], null, null, null, to.g, to.a)), l["\u0275did"](37, 49152, null, 0, lo.a, [], null, null), (e()(), l["\u0275and"](16777216, null, 0, 1, null, ro)), l["\u0275did"](39, 802816, null, 0, g.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](40, 0, null, 0, 8, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](41, 0, null, null, 3, "button", [
                ["mat-button", ""],
                ["trans", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.close() && l), l
            }, B.d, B.b)), l["\u0275did"](42, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](43, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Cancel"])), (e()(), l["\u0275eld"](45, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.setPageLink() && l), l
            }, B.d, B.b)), l["\u0275did"](46, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](47, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"])), (e()(), l["\u0275eld"](49, 16777216, null, null, 41, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](50, 770048, [
                [1, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 6, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, uo)), l["\u0275did"](53, 16384, [
                [6, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](54, 0, null, 0, 36, "form", [
                ["class", "many-inputs"],
                ["ngNativeValidate", ""]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngSubmit"],
                [null, "submit"],
                [null, "reset"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "submit" === n && (o = !1 !== l["\u0275nov"](e, 55).onSubmit(t) && o), "reset" === n && (o = !1 !== l["\u0275nov"](e, 55).onReset() && o), "ngSubmit" === n && (o = !1 !== i.setDownload() && o), o
            }, null, null)), l["\u0275did"](55, 4210688, null, 0, Pe.q, [
                [8, null],
                [8, null]
            ], null, {
                ngSubmit: "ngSubmit"
            }), l["\u0275prd"](2048, null, Pe.c, null, [Pe.q]), l["\u0275did"](57, 16384, null, 0, Pe.p, [Pe.c], null, null), (e()(), l["\u0275eld"](58, 0, null, null, 11, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](59, 0, null, null, 2, "label", [
                ["for", "name"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](60, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Name"])), (e()(), l["\u0275eld"](62, 0, null, null, 7, "input", [
                ["id", "name"],
                ["name", "download"],
                ["required", ""],
                ["type", "text"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 63)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 63).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 63)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 63)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.downloadName = t) && o), o
            }, null, null)), l["\u0275did"](63, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](64, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](67, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](69, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](70, 0, null, null, 11, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](71, 0, null, null, 2, "label", [
                ["for", "download"],
                ["trans", ""]
            ], null, null, null, null, null)), l["\u0275did"](72, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, null, ["Url"])), (e()(), l["\u0275eld"](74, 0, null, null, 7, "input", [
                ["id", "download"],
                ["name", "download"],
                ["required", ""],
                ["type", "url"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 75)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 75).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 75)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 75)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.hrefModel = t) && o), o
            }, null, null)), l["\u0275did"](75, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](76, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](79, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](81, 16384, null, 0, Pe.o, [Pe.n], null, null), (e()(), l["\u0275eld"](82, 0, null, null, 8, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](83, 0, null, null, 3, "button", [
                ["mat-button", ""],
                ["trans", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.close() && l), l
            }, B.d, B.b)), l["\u0275did"](84, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](85, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Cancel"])), (e()(), l["\u0275eld"](87, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "submit"]
            ], [
                [8, "disabled", 0]
            ], null, null, B.d, B.b)), l["\u0275did"](88, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](89, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"])), (e()(), l["\u0275eld"](91, 16777216, null, null, 27, "mat-tab", [], null, null, null, Dt.d, Dt.a)), l["\u0275did"](92, 770048, [
                [1, 4]
            ], 1, Ot.b, [l.ViewContainerRef], null, null), l["\u0275qud"](335544320, 7, {
                templateLabel: 0
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, so)), l["\u0275did"](95, 16384, [
                [7, 4]
            ], 0, Ot.g, [l.TemplateRef, l.ViewContainerRef], null, null), (e()(), l["\u0275eld"](96, 0, null, 0, 22, "form", [
                ["ngNativeValidate", ""]
            ], [
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngSubmit"],
                [null, "submit"],
                [null, "reset"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "submit" === n && (o = !1 !== l["\u0275nov"](e, 97).onSubmit(t) && o), "reset" === n && (o = !1 !== l["\u0275nov"](e, 97).onReset() && o), "ngSubmit" === n && (o = !1 !== i.setEmail() && o), o
            }, null, null)), l["\u0275did"](97, 4210688, null, 0, Pe.q, [
                [8, null],
                [8, null]
            ], null, {
                ngSubmit: "ngSubmit"
            }), l["\u0275prd"](2048, null, Pe.c, null, [Pe.q]), l["\u0275did"](99, 16384, null, 0, Pe.p, [Pe.c], null, null), (e()(), l["\u0275eld"](100, 0, null, null, 9, "div", [
                ["class", "input-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](101, 0, null, null, 8, "input", [
                ["name", "email"],
                ["placeholder", "Enter email address..."],
                ["required", ""],
                ["trans-placeholder", ""],
                ["type", "email"]
            ], [
                [1, "required", 0],
                [2, "ng-untouched", null],
                [2, "ng-touched", null],
                [2, "ng-pristine", null],
                [2, "ng-dirty", null],
                [2, "ng-valid", null],
                [2, "ng-invalid", null],
                [2, "ng-pending", null]
            ], [
                [null, "ngModelChange"],
                [null, "input"],
                [null, "blur"],
                [null, "compositionstart"],
                [null, "compositionend"]
            ], function(e, n, t) {
                var o = !0,
                    i = e.component;
                return "input" === n && (o = !1 !== l["\u0275nov"](e, 102)._handleInput(t.target.value) && o), "blur" === n && (o = !1 !== l["\u0275nov"](e, 102).onTouched() && o), "compositionstart" === n && (o = !1 !== l["\u0275nov"](e, 102)._compositionStart() && o), "compositionend" === n && (o = !1 !== l["\u0275nov"](e, 102)._compositionEnd(t.target.value) && o), "ngModelChange" === n && (o = !1 !== (i.hrefModel = t) && o), o
            }, null, null)), l["\u0275did"](102, 16384, null, 0, Pe.d, [l.Renderer2, l.ElementRef, [2, Pe.a]], null, null), l["\u0275did"](103, 16384, null, 0, Pe.u, [], {
                required: [0, "required"]
            }, null), l["\u0275prd"](1024, null, Pe.l, function(e) {
                return [e]
            }, [Pe.u]), l["\u0275prd"](1024, null, Pe.m, function(e) {
                return [e]
            }, [Pe.d]), l["\u0275did"](106, 671744, null, 0, Pe.r, [
                [2, Pe.c],
                [2, Pe.l],
                [8, null],
                [2, Pe.m]
            ], {
                name: [0, "name"],
                model: [1, "model"]
            }, {
                update: "ngModelChange"
            }), l["\u0275prd"](2048, null, Pe.n, null, [Pe.r]), l["\u0275did"](108, 16384, null, 0, Pe.o, [Pe.n], null, null), l["\u0275did"](109, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275eld"](110, 0, null, null, 8, "div", [
                ["class", "buttons"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](111, 0, null, null, 3, "button", [
                ["mat-button", ""],
                ["trans", ""],
                ["type", "button"]
            ], [
                [8, "disabled", 0]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component.close() && l), l
            }, B.d, B.b)), l["\u0275did"](112, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], null, null), l["\u0275did"](113, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Cancel"])), (e()(), l["\u0275eld"](115, 0, null, null, 3, "button", [
                ["color", "accent"],
                ["mat-raised-button", ""],
                ["trans", ""],
                ["type", "submit"]
            ], [
                [8, "disabled", 0]
            ], null, null, B.d, B.b)), l["\u0275did"](116, 180224, null, 0, j.b, [l.ElementRef, L.a, A.i], {
                disabled: [0, "disabled"],
                color: [1, "color"]
            }, null), l["\u0275did"](117, 4341760, null, 0, F.a, [l.ElementRef, V.a, x.a], null, null), (e()(), l["\u0275ted"](-1, 0, ["Change"]))], function(e, n) {
                var t = n.component;
                e(n, 1, 0, "accent", !0), e(n, 4, 0), e(n, 15, 0, ""), e(n, 18, 0, "url", t.hrefModel), e(n, 28, 0, !t.hrefModel, "accent"), e(n, 32, 0), e(n, 39, 0, t.activeProject.getPages()), e(n, 46, 0, !t.hrefModel, "accent"), e(n, 50, 0), e(n, 64, 0, ""), e(n, 67, 0, "download", t.downloadName), e(n, 76, 0, ""), e(n, 79, 0, "download", t.hrefModel), e(n, 88, 0, !t.hrefModel, "accent"), e(n, 92, 0), e(n, 103, 0, ""), e(n, 106, 0, "email", t.hrefModel), e(n, 116, 0, !t.hrefModel, "accent")
            }, function(e, n) {
                e(n, 0, 0, l["\u0275nov"](n, 1).dynamicHeight, "below" === l["\u0275nov"](n, 1).headerPosition), e(n, 8, 0, l["\u0275nov"](n, 11).ngClassUntouched, l["\u0275nov"](n, 11).ngClassTouched, l["\u0275nov"](n, 11).ngClassPristine, l["\u0275nov"](n, 11).ngClassDirty, l["\u0275nov"](n, 11).ngClassValid, l["\u0275nov"](n, 11).ngClassInvalid, l["\u0275nov"](n, 11).ngClassPending), e(n, 13, 0, l["\u0275nov"](n, 15).required ? "" : null, l["\u0275nov"](n, 20).ngClassUntouched, l["\u0275nov"](n, 20).ngClassTouched, l["\u0275nov"](n, 20).ngClassPristine, l["\u0275nov"](n, 20).ngClassDirty, l["\u0275nov"](n, 20).ngClassValid, l["\u0275nov"](n, 20).ngClassInvalid, l["\u0275nov"](n, 20).ngClassPending), e(n, 23, 0, l["\u0275nov"](n, 24).disabled || null), e(n, 27, 0, l["\u0275nov"](n, 28).disabled || null), e(n, 41, 0, l["\u0275nov"](n, 42).disabled || null), e(n, 45, 0, l["\u0275nov"](n, 46).disabled || null), e(n, 54, 0, l["\u0275nov"](n, 57).ngClassUntouched, l["\u0275nov"](n, 57).ngClassTouched, l["\u0275nov"](n, 57).ngClassPristine, l["\u0275nov"](n, 57).ngClassDirty, l["\u0275nov"](n, 57).ngClassValid, l["\u0275nov"](n, 57).ngClassInvalid, l["\u0275nov"](n, 57).ngClassPending), e(n, 62, 0, l["\u0275nov"](n, 64).required ? "" : null, l["\u0275nov"](n, 69).ngClassUntouched, l["\u0275nov"](n, 69).ngClassTouched, l["\u0275nov"](n, 69).ngClassPristine, l["\u0275nov"](n, 69).ngClassDirty, l["\u0275nov"](n, 69).ngClassValid, l["\u0275nov"](n, 69).ngClassInvalid, l["\u0275nov"](n, 69).ngClassPending), e(n, 74, 0, l["\u0275nov"](n, 76).required ? "" : null, l["\u0275nov"](n, 81).ngClassUntouched, l["\u0275nov"](n, 81).ngClassTouched, l["\u0275nov"](n, 81).ngClassPristine, l["\u0275nov"](n, 81).ngClassDirty, l["\u0275nov"](n, 81).ngClassValid, l["\u0275nov"](n, 81).ngClassInvalid, l["\u0275nov"](n, 81).ngClassPending), e(n, 83, 0, l["\u0275nov"](n, 84).disabled || null), e(n, 87, 0, l["\u0275nov"](n, 88).disabled || null), e(n, 96, 0, l["\u0275nov"](n, 99).ngClassUntouched, l["\u0275nov"](n, 99).ngClassTouched, l["\u0275nov"](n, 99).ngClassPristine, l["\u0275nov"](n, 99).ngClassDirty, l["\u0275nov"](n, 99).ngClassValid, l["\u0275nov"](n, 99).ngClassInvalid, l["\u0275nov"](n, 99).ngClassPending), e(n, 101, 0, l["\u0275nov"](n, 103).required ? "" : null, l["\u0275nov"](n, 108).ngClassUntouched, l["\u0275nov"](n, 108).ngClassTouched, l["\u0275nov"](n, 108).ngClassPristine, l["\u0275nov"](n, 108).ngClassDirty, l["\u0275nov"](n, 108).ngClassValid, l["\u0275nov"](n, 108).ngClassInvalid, l["\u0275nov"](n, 108).ngClassPending), e(n, 111, 0, l["\u0275nov"](n, 112).disabled || null), e(n, 115, 0, l["\u0275nov"](n, 116).disabled || null)
            })
        }
        var po = l["\u0275ccf"]("link-editor", Mn, function(e) {
                return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "link-editor", [], null, null, null, co, oo)), l["\u0275did"](1, 49152, null, 0, Mn, [R, _e], null, null)], null, null)
            }, {}, {}, []),
            ho = t("9iV4"),
            fo = t("QMm5"),
            mo = t("3Czw"),
            go = t("LT5m"),
            bo = t("R1vt"),
            vo = t("ppgG"),
            yo = t("w24y"),
            xo = t("H/HH"),
            wo = t("Ci9u"),
            _o = t("qxQ7"),
            ko = t("Kg88"),
            Co = t("/s+c"),
            Eo = function() {
                function e(e) {
                    this.http = e
                }
                return e.prototype.getCustom = function() {
                    return this.http.get("elements/custom")
                }, e
            }(),
            Ro = function() {
                function e(e) {
                    this.elementsApi = e
                }
                return e.prototype.resolve = function(e, n) {
                    return this.elementsApi.getCustom().toPromise()
                }, e
            }(),
            So = function() {
                function e(e, n, t) {
                    this.router = e, this.projects = n, this.currentUser = t
                }
                return e.prototype.resolve = function(e, n) {
                    var t = this;
                    return this.projects.get(e.params.id).toPromise().then(function(e) {
                        if (!t.userCanOpenProjectInBuilder(e.project)) throw 403;
                        return e.project
                    }).catch(function() {
                        t.router.navigate(["admin/panda-pages"])
                    })
                }, e.prototype.userCanOpenProjectInBuilder = function(e) {
                    var n = this;
                    return void 0 !== e.model.users.find(function(e) {
                        return e.id === n.currentUser.get("id")
                    })
                }, e
            }(),
            To = t("4Vp2"),
            Po = t("0cZJ"),
            Io = t("5rbx"),
            Do = t("t7g5"),
            Oo = t("ki1d"),
            Mo = t("HMTr"),
            No = t("T2Au"),
            Bo = t("VGwS"),
            jo = function() {},
            Lo = t("FhOc");
        t.d(n, "HtmlBuilderModuleNgFactory", function() {
            return Ao
        });
        var Ao = l["\u0275cmf"](o, [], function(e) {
            return l["\u0275mod"]([l["\u0275mpd"](512, l.ComponentFactoryResolver, l["\u0275CodegenComponentFactoryResolver"], [
                [8, [i.a, a.a, a.b, r.a, u.a, s.a, d.a, c.a, p.a, h.a, El, Pl, Nl, Vl, Gl, Ql, no, N, G, po]],
                [3, l.ComponentFactoryResolver], l.NgModuleRef
            ]), l["\u0275mpd"](4608, g.NgLocalization, g.NgLocaleLocalization, [l.LOCALE_ID, [2, g["\u0275a"]]]), l["\u0275mpd"](4608, Pe.A, Pe.A, []), l["\u0275mpd"](4608, Pe.e, Pe.e, []), l["\u0275mpd"](4608, ho.i, ho.o, [g.DOCUMENT, l.PLATFORM_ID, ho.m]), l["\u0275mpd"](4608, ho.p, ho.p, [ho.i, ho.n]), l["\u0275mpd"](5120, ho.a, function(e) {
                return [e]
            }, [ho.p]), l["\u0275mpd"](4608, ho.l, ho.l, []), l["\u0275mpd"](6144, ho.j, null, [ho.l]), l["\u0275mpd"](4608, ho.h, ho.h, [ho.j]), l["\u0275mpd"](6144, ho.b, null, [ho.h]), l["\u0275mpd"](4608, ho.f, ho.k, [ho.b, l.Injector]), l["\u0275mpd"](4608, ho.c, ho.c, [ho.f]), l["\u0275mpd"](4608, fo.ColorPickerService, fo.ColorPickerService, []), l["\u0275mpd"](6144, ee.b, null, [g.DOCUMENT]), l["\u0275mpd"](4608, ee.c, ee.c, [
                [2, ee.b]
            ]), l["\u0275mpd"](4608, L.a, L.a, []), l["\u0275mpd"](4608, A.k, A.k, [L.a]), l["\u0275mpd"](4608, A.j, A.j, [A.k, l.NgZone, g.DOCUMENT]), l["\u0275mpd"](136192, A.d, A.b, [
                [3, A.d], g.DOCUMENT
            ]), l["\u0275mpd"](5120, A.n, A.m, [
                [3, A.n],
                [2, A.l], g.DOCUMENT
            ]), l["\u0275mpd"](5120, A.i, A.g, [
                [3, A.i], l.NgZone, L.a
            ]), l["\u0275mpd"](5120, J.d, J.b, [
                [3, J.d], l.NgZone, L.a
            ]), l["\u0275mpd"](5120, J.g, J.f, [
                [3, J.g], L.a, l.NgZone
            ]), l["\u0275mpd"](4608, Q.i, Q.i, [J.d, J.g, l.NgZone, g.DOCUMENT]), l["\u0275mpd"](5120, Q.e, Q.j, [
                [3, Q.e], g.DOCUMENT
            ]), l["\u0275mpd"](4608, Q.h, Q.h, [J.g, g.DOCUMENT]), l["\u0275mpd"](5120, Q.f, Q.m, [
                [3, Q.f], g.DOCUMENT
            ]), l["\u0275mpd"](4608, Q.c, Q.c, [Q.i, Q.e, l.ComponentFactoryResolver, Q.h, Q.f, l.ApplicationRef, l.Injector, l.NgZone, g.DOCUMENT]), l["\u0275mpd"](5120, Q.k, Q.l, [Q.c]), l["\u0275mpd"](4608, mo.d, mo.d, [L.a]), l["\u0275mpd"](135680, mo.a, mo.a, [mo.d, l.NgZone]), l["\u0275mpd"](4608, go.b, go.b, [Q.c, A.n, l.Injector, mo.a, [3, go.b]]), l["\u0275mpd"](5120, bo.b, bo.g, [Q.c]), l["\u0275mpd"](4608, vo.b, vo.b, []), l["\u0275mpd"](4608, T.a, T.a, [x.a, V.a, go.b]), l["\u0275mpd"](5120, yo.c, yo.d, [Q.c]), l["\u0275mpd"](4608, yo.e, yo.e, [Q.c, l.Injector, [2, g.Location],
                [2, yo.b], yo.c, [3, yo.e], Q.e
            ]), l["\u0275mpd"](4608, S.a, S.a, [yo.e]), l["\u0275mpd"](4608, Ke.a, Ke.a, [Q.c]), l["\u0275mpd"](5120, K.b, K.c, [Q.c]), l["\u0275mpd"](4608, nn.f, Me.e, [
                [2, Me.i],
                [2, Me.n]
            ]), l["\u0275mpd"](4608, y.a, y.a, [xo.a]), l["\u0275mpd"](4608, wo.a, wo.a, [Il.a]), l["\u0275mpd"](4608, _o.a, _o.a, [x.a, $t.a]), l["\u0275mpd"](4608, re.a, re.a, []), l["\u0275mpd"](4608, ft.a, ft.a, [xo.a]), l["\u0275mpd"](5120, ie.c, ie.d, [
                [3, ie.c]
            ]), l["\u0275mpd"](4608, Me.d, Me.d, []), l["\u0275mpd"](4608, be.a, be.a, [V.a]), l["\u0275mpd"](4608, ge, ge, []), l["\u0275mpd"](4608, sl, sl, [Q.c]), l["\u0275mpd"](4608, at, at, [be.a, Rt.a]), l["\u0275mpd"](4608, xe, xe, [be.a, at]), l["\u0275mpd"](4608, Ye, Ye, [ge, xe, be.a, at]), l["\u0275mpd"](4608, _e, _e, [Ye, x.a, at]), l["\u0275mpd"](4608, R, R, [x.a, _e, _o.a, ft.a, y.a, T.a, Rt.a]), l["\u0275mpd"](4608, I, I, []), l["\u0275mpd"](4608, Nn, Nn, [Q.c]), l["\u0275mpd"](4608, he, he, [l.NgZone, be.a, ge, sl, R, ko.a, Q.c, Co.a, xe, at, _e, R, I, Nn]), l["\u0275mpd"](4608, On, On, [xe]), l["\u0275mpd"](4608, Ze, Ze, [Q.c]), l["\u0275mpd"](4608, Eo, Eo, [xo.a]), l["\u0275mpd"](4608, Ro, Ro, [Eo]), l["\u0275mpd"](4608, Dn, Dn, [_e, xe, ge, at, be.a]), l["\u0275mpd"](4608, Wt, Wt, [Q.c]), l["\u0275mpd"](4608, So, So, [m.m, ft.a, $t.a]), l["\u0275mpd"](4608, P, P, []), l["\u0275mpd"](4608, z, z, [Il.a]), l["\u0275mpd"](4608, ke, ke, [l.NgZone]), l["\u0275mpd"](512, g.CommonModule, g.CommonModule, []), l["\u0275mpd"](512, Pe.x, Pe.x, []), l["\u0275mpd"](512, Pe.k, Pe.k, []), l["\u0275mpd"](512, Pe.t, Pe.t, []), l["\u0275mpd"](512, m.p, m.p, [
                [2, m.u],
                [2, m.m]
            ]), l["\u0275mpd"](512, ho.e, ho.e, []), l["\u0275mpd"](512, ho.d, ho.d, []), l["\u0275mpd"](512, To.ColorPickerModule, To.ColorPickerModule, []), l["\u0275mpd"](512, ee.a, ee.a, []), l["\u0275mpd"](256, Me.f, !0, []), l["\u0275mpd"](512, Me.n, Me.n, [
                [2, Me.f]
            ]), l["\u0275mpd"](512, L.b, L.b, []), l["\u0275mpd"](512, Me.y, Me.y, []), l["\u0275mpd"](512, A.a, A.a, []), l["\u0275mpd"](512, j.c, j.c, []), l["\u0275mpd"](512, Ge.g, Ge.g, []), l["\u0275mpd"](512, J.c, J.c, []), l["\u0275mpd"](512, Q.g, Q.g, []), l["\u0275mpd"](512, mo.c, mo.c, []), l["\u0275mpd"](512, go.d, go.d, []), l["\u0275mpd"](512, bo.e, bo.e, []), l["\u0275mpd"](512, vo.c, vo.c, []), l["\u0275mpd"](512, Po.c, Po.c, []), l["\u0275mpd"](512, Io.a, Io.a, []), l["\u0275mpd"](512, Do.a, Do.a, []), l["\u0275mpd"](512, K.e, K.e, []), l["\u0275mpd"](512, yo.i, yo.i, []), l["\u0275mpd"](512, Me.p, Me.p, []), l["\u0275mpd"](512, Me.w, Me.w, []), l["\u0275mpd"](512, Oo.b, Oo.b, []), l["\u0275mpd"](512, lo.d, lo.d, []), l["\u0275mpd"](512, Ct.b, Ct.b, []), l["\u0275mpd"](512, Y.b, Y.b, []), l["\u0275mpd"](512, Mo.a, Mo.a, []), l["\u0275mpd"](512, No.a, No.a, []), l["\u0275mpd"](512, jo, jo, []), l["\u0275mpd"](512, Yt.h, Yt.h, []), l["\u0275mpd"](512, Lo.c, Lo.c, []), l["\u0275mpd"](512, oe.b, oe.b, []), l["\u0275mpd"](512, en.b, en.b, []), l["\u0275mpd"](512, Ie.e, Ie.e, []), l["\u0275mpd"](512, Ot.j, Ot.j, []), l["\u0275mpd"](512, Bl.c, Bl.c, []), l["\u0275mpd"](512, o, o, []), l["\u0275mpd"](256, ho.m, "XSRF-TOKEN", []), l["\u0275mpd"](256, ho.n, "X-XSRF-TOKEN", []), l["\u0275mpd"](256, bo.a, {
                overlapTrigger: !0,
                xPosition: "after",
                yPosition: "below"
            }, []), l["\u0275mpd"](256, K.a, {
                showDelay: 0,
                hideDelay: 0,
                touchendHideDelay: 1500
            }, []), l["\u0275mpd"](1024, m.k, function() {
                return [
                    [{
                        path: ":id",
                        component: xl,
                        canActivate: [Bo.a],
                        resolve: {
                            customElements: Ro,
                            project: So
                        }
                    }]
                ]
            }, []), l["\u0275mpd"](256, Yt.a, !1, [])])
        })
    },
    IQ3e: function(e, n, t) {
        "use strict";
        Object.defineProperty(n, "__esModule", {
            value: !0
        });
        var l, o = (l = t("HJs5")) && l.__esModule ? l : {
            default: l
        };
        n.default = o.default, e.exports = n.default
    },
    "Lpd/": function(e, n, t) {
        "use strict";
        t.d(n, "c", function() {
            return h
        }), t.d(n, "a", function() {
            return p
        }), t.d(n, "b", function() {
            return s
        });
        var l = t("6Xbx"),
            o = t("XEj9"),
            i = t("j5BN"),
            a = t("kH4A"),
            r = t("fNvg"),
            u = t("pXwq"),
            s = function() {};

        function d(e) {
            return Error("A hint was already declared for 'align=\"" + e + "\"'.")
        }
        var c = 0,
            p = function(e) {
                function n(n, t, l) {
                    var o = e.call(this, n) || this;
                    return o._elementRef = n, o._changeDetectorRef = t, o._showAlwaysAnimate = !1, o._subscriptAnimationState = "", o._hintLabel = "", o._hintLabelId = "mat-hint-" + c++, o._labelOptions = l || {}, o.floatLabel = o._labelOptions.float || "auto", o
                }
                return Object(l.b)(n, e), Object.defineProperty(n.prototype, "dividerColor", {
                    get: function() {
                        return this.color
                    },
                    set: function(e) {
                        this.color = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "hideRequiredMarker", {
                    get: function() {
                        return this._hideRequiredMarker
                    },
                    set: function(e) {
                        this._hideRequiredMarker = Object(o.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_shouldAlwaysFloat", {
                    get: function() {
                        return "always" === this._floatLabel && !this._showAlwaysAnimate
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_canLabelFloat", {
                    get: function() {
                        return "never" !== this._floatLabel
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "hintLabel", {
                    get: function() {
                        return this._hintLabel
                    },
                    set: function(e) {
                        this._hintLabel = e, this._processHints()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "floatPlaceholder", {
                    get: function() {
                        return this._floatLabel
                    },
                    set: function(e) {
                        this.floatLabel = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "floatLabel", {
                    get: function() {
                        return this._floatLabel
                    },
                    set: function(e) {
                        e !== this._floatLabel && (this._floatLabel = e || this._labelOptions.float || "auto", this._changeDetectorRef.markForCheck())
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._validateControlChild(), this._control.controlType && this._elementRef.nativeElement.classList.add("mat-form-field-type-" + this._control.controlType), this._control.stateChanges.pipe(Object(r.a)(null)).subscribe(function() {
                        e._validatePlaceholders(), e._syncDescribedByIds(), e._changeDetectorRef.markForCheck()
                    });
                    var n = this._control.ngControl;
                    n && n.valueChanges && n.valueChanges.subscribe(function() {
                        e._changeDetectorRef.markForCheck()
                    }), this._hintChildren.changes.pipe(Object(r.a)(null)).subscribe(function() {
                        e._processHints(), e._changeDetectorRef.markForCheck()
                    }), this._errorChildren.changes.pipe(Object(r.a)(null)).subscribe(function() {
                        e._syncDescribedByIds(), e._changeDetectorRef.markForCheck()
                    })
                }, n.prototype.ngAfterContentChecked = function() {
                    this._validateControlChild()
                }, n.prototype.ngAfterViewInit = function() {
                    this._subscriptAnimationState = "enter", this._changeDetectorRef.detectChanges()
                }, n.prototype._shouldForward = function(e) {
                    var n = this._control ? this._control.ngControl : null;
                    return n && n[e]
                }, n.prototype._hasPlaceholder = function() {
                    return !(!this._control.placeholder && !this._placeholderChild)
                }, n.prototype._hasLabel = function() {
                    return !!this._labelChild
                }, n.prototype._shouldLabelFloat = function() {
                    return this._canLabelFloat && (this._control.shouldLabelFloat || this._control.shouldPlaceholderFloat || this._shouldAlwaysFloat)
                }, n.prototype._hideControlPlaceholder = function() {
                    return !this._hasLabel() || !this._shouldLabelFloat()
                }, n.prototype._hasFloatingLabel = function() {
                    return this._hasLabel() || this._hasPlaceholder()
                }, n.prototype._getDisplayedMessages = function() {
                    return this._errorChildren && this._errorChildren.length > 0 && this._control.errorState ? "error" : "hint"
                }, n.prototype._animateAndLockLabel = function() {
                    var e = this;
                    this._hasFloatingLabel() && this._canLabelFloat && (this._showAlwaysAnimate = !0, this._floatLabel = "always", Object(a.a)(this._label.nativeElement, "transitionend").pipe(Object(u.a)(1)).subscribe(function() {
                        e._showAlwaysAnimate = !1
                    }), this._changeDetectorRef.markForCheck())
                }, n.prototype._validatePlaceholders = function() {
                    if (this._control.placeholder && this._placeholderChild) throw Error("Placeholder attribute and child element were both specified.")
                }, n.prototype._processHints = function() {
                    this._validateHints(), this._syncDescribedByIds()
                }, n.prototype._validateHints = function() {
                    var e, n, t = this;
                    this._hintChildren && this._hintChildren.forEach(function(l) {
                        if ("start" === l.align) {
                            if (e || t.hintLabel) throw d("start");
                            e = l
                        } else if ("end" === l.align) {
                            if (n) throw d("end");
                            n = l
                        }
                    })
                }, n.prototype._syncDescribedByIds = function() {
                    if (this._control) {
                        var e = [];
                        if ("hint" === this._getDisplayedMessages()) {
                            var n = this._hintChildren ? this._hintChildren.find(function(e) {
                                    return "start" === e.align
                                }) : null,
                                t = this._hintChildren ? this._hintChildren.find(function(e) {
                                    return "end" === e.align
                                }) : null;
                            n ? e.push(n.id) : this._hintLabel && e.push(this._hintLabelId), t && e.push(t.id)
                        } else this._errorChildren && (e = this._errorChildren.map(function(e) {
                            return e.id
                        }));
                        this._control.setDescribedByIds(e)
                    }
                }, n.prototype._validateControlChild = function() {
                    if (!this._control) throw Error("mat-form-field must contain a MatFormFieldControl.")
                }, n
            }(Object(i.E)(function(e) {
                this._elementRef = e
            }, "primary")),
            h = function() {}
    },
    RXNa: function(e, n, t) {
        "use strict";
        t.d(n, "b", function() {
            return x
        }), t.d(n, "a", function() {
            return f
        }), t.d(n, "c", function() {
            return g
        }), t.d(n, "d", function() {
            return b
        }), t.d(n, "e", function() {
            return v
        }), t.d(n, "f", function() {
            return y
        });
        var l = t("FhOc"),
            o = t("CZgk"),
            i = t("6Xbx"),
            a = t("XEj9"),
            r = t("TO51"),
            u = t("pXwq"),
            s = t("LaOa"),
            d = t("fNvg"),
            c = t("rT01"),
            p = t("2kLc"),
            h = t("qLnt"),
            f = function(e) {
                function n() {
                    var n = null !== e && e.apply(this, arguments) || this;
                    return n._hideToggle = !1, n.displayMode = "default", n
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "hideToggle", {
                    get: function() {
                        return this._hideToggle
                    },
                    set: function(e) {
                        this._hideToggle = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), n
            }(l.a),
            m = 0,
            g = function(e) {
                function n(n, t, l, o) {
                    var i = e.call(this, n, t, l) || this;
                    return i._viewContainerRef = o, i._hideToggle = !1, i._inputChanges = new r.a, i._headerId = "mat-expansion-panel-header-" + m++, i.accordion = n, i
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "hideToggle", {
                    get: function() {
                        return this._hideToggle
                    },
                    set: function(e) {
                        this._hideToggle = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype._getHideToggle = function() {
                    return this.accordion ? this.accordion.hideToggle : this.hideToggle
                }, n.prototype._hasSpacing = function() {
                    return !!this.accordion && "default" === (this.expanded ? this.accordion.displayMode : this._getExpandedState())
                }, n.prototype._getExpandedState = function() {
                    return this.expanded ? "expanded" : "collapsed"
                }, n.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._lazyContent && this.opened.pipe(Object(d.a)(null), Object(s.a)(function() {
                        return e.expanded && !e._portal
                    }), Object(u.a)(1)).subscribe(function() {
                        e._portal = new o.h(e._lazyContent._template, e._viewContainerRef)
                    })
                }, n.prototype.ngOnChanges = function(e) {
                    this._inputChanges.next(e)
                }, n.prototype.ngOnDestroy = function() {
                    e.prototype.ngOnDestroy.call(this), this._inputChanges.complete()
                }, n.prototype._bodyAnimation = function(e) {
                    var n = e.element.classList,
                        t = e.phaseName,
                        l = e.toState;
                    "done" === t && "expanded" === l ? n.add("mat-expanded") : "start" === t && "collapsed" === l && n.remove("mat-expanded")
                }, n
            }(l.b),
            b = function() {},
            v = function() {
                function e(e, n, t, l) {
                    var o = this;
                    this.panel = e, this._element = n, this._focusMonitor = t, this._changeDetectorRef = l, this._parentChangeSubscription = h.a.EMPTY, this._parentChangeSubscription = Object(p.a)(e.opened, e.closed, e._inputChanges.pipe(Object(s.a)(function(e) {
                        return !(!e.hideToggle && !e.disabled)
                    }))).subscribe(function() {
                        return o._changeDetectorRef.markForCheck()
                    }), t.monitor(n.nativeElement)
                }
                return e.prototype._toggle = function() {
                    this.panel.toggle()
                }, e.prototype._isExpanded = function() {
                    return this.panel.expanded
                }, e.prototype._getExpandedState = function() {
                    return this.panel._getExpandedState()
                }, e.prototype._getPanelId = function() {
                    return this.panel.id
                }, e.prototype._showToggle = function() {
                    return !this.panel.hideToggle && !this.panel.disabled
                }, e.prototype._keydown = function(e) {
                    switch (e.keyCode) {
                        case c.n:
                        case c.f:
                            e.preventDefault(), this._toggle();
                            break;
                        default:
                            return
                    }
                }, e.prototype.ngOnDestroy = function() {
                    this._parentChangeSubscription.unsubscribe(), this._focusMonitor.stopMonitoring(this._element.nativeElement)
                }, e
            }(),
            y = function() {},
            x = function() {}
    },
    T1w8: function(module, __webpack_exports__, __webpack_require__) {
        "use strict";
        __webpack_require__.d(__webpack_exports__, "a", function() {
            return Elements
        });
        var __WEBPACK_IMPORTED_MODULE_0__definitions_base__ = __webpack_require__("4bK+"),
            __WEBPACK_IMPORTED_MODULE_1__definitions_bootstrap__ = __webpack_require__("URmx"),
            Elements = function() {
                function Elements(e) {
                    this.i18n = e, this.elements = [], this.defaults = {
                        name: "Generic",
                        canModify: ["padding", "margin", "box", "text", "attributes", "float", "shadows", "background"],
                        canDrag: !0,
                        showWysiwyg: !0,
                        attributes: {},
                        previewScale: 1,
                        scaleDragPreview: !0,
                        resizable: !0,
                        types: ["flow"],
                        validChildren: ["flow"]
                    }, this.specialCases = [function(e, n, t, l) {
                        if ("LABEL" == e.nodeName && l.indexOf("checkbox") > -1) return e.parentNode
                    }, function(e, n, t, l) {
                        if (t.indexOf("progress-bar") > -1) return e.parentNode
                    }, function(e, n, t, l) {
                        if (t.indexOf("container-fluid") > -1 && l.indexOf("navbar") > -1) return e.parentNode
                    }]
                }
                return Elements.prototype.getAll = function() {
                    return this.elements
                }, Elements.prototype.findByName = function(e) {
                    return this.elements.find(function(n) {
                        return n.name === e
                    })
                }, Elements.prototype.getDisplayName = function(e, n) {
                    if (e) return "div container" === e.name ? n.id ? n.id : n.classList[0] ? n.classList[0] : e.name : e.name
                }, Elements.prototype.canModifyText = function(e) {
                    return this.canModify("text", e) && e.showWysiwyg
                }, Elements.prototype.canModify = function(e, n) {
                    if (n) return n.canModify.indexOf(e.toLowerCase()) > -1
                }, Elements.prototype.isImage = function(e) {
                    return !!e && "img" === e.nodeName.toLowerCase()
                }, Elements.prototype.isLink = function(e) {
                    return !!e && "a" === e.nodeName.toLowerCase()
                }, Elements.prototype.isLayout = function(e) {
                    return !!e && (this.isColumn(e) || this.isRow(e) || this.isContainer(e))
                }, Elements.prototype.isContainer = function(e) {
                    return !!e && e.classList.contains("container")
                }, Elements.prototype.isRow = function(e) {
                    return !(!e || !e.classList) && e.classList.contains("row")
                }, Elements.prototype.isColumn = function(e) {
                    return !!e && e.className && e.className.indexOf("col-") > -1
                }, Elements.prototype.checkForSpecialCases = function(e) {
                    if (!e) return !1;
                    for (var n = e.parentNode, t = e.nodeName, l = n ? n.nodeName : "", o = 0; o < this.specialCases.length; o++) {
                        var i = this.specialCases[o](e, n, t, l);
                        if (i) return i
                    }
                }, Elements.prototype.canInsert = function(e, n) {
                    if ("BODY" == e.nodeName) return !0;
                    if ("HTML" == e.nodeName) return !1;
                    var t = this.match(e);
                    if (t && t.validChildren && n.types)
                        for (var l = t.validChildren.length - 1; l >= 0; l--)
                            if (n.types.indexOf(t.validChildren[l]) > -1) return !0;
                    return !1
                }, Elements.prototype.match = function(e, n, t) {
                    if (void 0 === n && (n = null), void 0 === t && (t = !0), !e || !e.nodeName) return !1;
                    var l = this.checkForSpecialCases(e),
                        o = e.nodeName.toLowerCase();
                    if (l && (e = l), e.className)
                        for (var i = 0; i < this.elements.length; i++)
                            for (var a = this.elements[i], r = e.className.toLowerCase().split(/\s+/), u = 0; u < r.length; u++)
                                if (a.class) {
                                    if (r[u] === a.class) return a;
                                    if (a.class.indexOf("*") > -1 && r[u].match(new RegExp(a.class.replace("*", ".*")))) return a
                                }
                    var s = function(n) {
                            var t = d.elements[n];
                            if (e.dataset && e.dataset.name) return {
                                value: d.findByName(e.dataset.name)
                            };
                            if (e.type) {
                                var l = o + "=" + e.type;
                                if (Array.isArray(t.nodes) && t.nodes.find(function(e) {
                                        return e == l
                                    })) return {
                                    value: t
                                }
                            }
                            return t.nodes.indexOf(o) > -1 ? {
                                value: t
                            } : void 0
                        },
                        d = this;
                    for (i = 0; i < this.elements.length; i++) {
                        var c = s(i);
                        if ("object" == typeof c) return c.value
                    }
                    if (t) return this.match(e.parentNode, n, !0);
                    var p = e.className.split(/\s+/)[0],
                        h = Object.assign({}, this.defaults);
                    return h.name = p ? p.replace("-", " ") : e.nodeName.toLowerCase(), h
                }, Elements.prototype.addElement = function(e) {
                    var n = Object.assign({}, this.defaults, e);
                    n.name = this.i18n.t(n.name), this.elements.push(n)
                }, Elements.prototype.init = function(e) {
                    var n = this;
                    __WEBPACK_IMPORTED_MODULE_0__definitions_base__.a.concat(__WEBPACK_IMPORTED_MODULE_1__definitions_bootstrap__.a).forEach(function(e) {
                        return n.addElement(e)
                    }), this.addCustomElements(e)
                }, Elements.prototype.addCustomElements = function(customElements) {
                    var _this = this,
                        customCss = "";
                    customElements.forEach(function(element) {
                        var config = eval(element.config);
                        config.html = element.html, config.css = element.css, _this.addElement(config), customCss += "\n" + config.css
                    })
                }, Elements
            }()
    },
    URmx: function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return l
        });
        var l = [];
        l.push({
            name: "page header",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "page-header",
            html: '<div class="page-header"><h1>Example page header <small>Header subtext</small></h1></div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "typography",
            previewScale: "0.4",
            icon: "header-custom"
        }), l.push({
            name: "progress bar",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "progress",
            html: '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">60%</div></div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "components",
            icon: "show-chart"
        }), l.push({
            name: "list group",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "list-group",
            html: '<div class="list-group"><a href="#" class="list-group-item disabled">Cras justo odio</a><a href="#" class="list-group-item">Dapibus ac facilisis in</a><a href="#" class="list-group-item">Morbi leo risus</a><a href="#" class="list-group-item">Porta ac consectetur ac</a><a href="#" class="list-group-item">Vestibulum at eros</a></div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "components",
            previewScale: "0.4",
            icon: "view-list"
        }), l.push({
            name: "panel",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "panel",
            html: '<div class="panel panel-primary"><div class="panel-heading">Panel heading without title</div><div class="panel-body">Panel content</div><div class="panel-footer">Panel Footer</div></div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "components",
            previewScale: "0.4",
            icon: "crop-portrait"
        }), l.push({
            name: "container",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "container",
            html: '<div class="container"></div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "layout",
            dragHelper: !0,
            icon: "crop-square",
            attributes: {
                type: {
                    list: [{
                        name: "Default",
                        value: "container"
                    }, {
                        name: "Wide",
                        value: "container-fluid"
                    }],
                    value: "container",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            }
        }), l.push({
            name: "row",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "row",
            html: '<section class="row"><div class="col-md-4"></div><div class="col-md-3"></div><div class="col-md-5"></div></section>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "layout",
            previewScale: "0.15",
            dragHelper: !0,
            icon: "view-stream"
        }), l.push({
            name: "well",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "well",
            html: '<div class="well">Look, I\'m in a well!</div>',
            types: ["flow"],
            validChildren: ["flow"],
            category: "layout",
            icon: "label-outline"
        }), l.push({
            name: "label",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "label",
            html: '<span class="label label-success">Label</span>',
            types: ["flow", "phrasing"],
            validChildren: ["phrasing"],
            category: "typography",
            previewScale: 2,
            hiddenClasses: ["label"],
            icon: "label-outline"
        }), l.push({
            name: "column",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "col-*",
            html: '<div class="col-sm-6"></div>',
            types: ["flow"],
            validChildren: ["flow"],
            canModify: ["text", "box", "margin", "padding", "attributes"]
        }), l.push({
            name: "button group",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "btn-group",
            html: '<div class="btn-group"><button type="button" class="btn btn-default">Left</button><button type="button" class="btn btn-default">Middle</button><button type="button" class="btn btn-default">Right</button></div>',
            types: ["flow"],
            validChildren: ["button"],
            category: "buttons",
            previewScale: "0.9",
            icon: "view-column"
        }), l.push({
            name: "button toolbar",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "btn-toolbar",
            html: '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"><div class="btn-group" role="group" aria-label="First group"><button type="button" class="btn btn-default">1</button><button type="button" class="btn btn-default">2</button><button type="button" class="btn btn-default">3</button><button type="button" class="btn btn-default">4</button></div><div class="btn-group" role="group" aria-label="Second group"><button type="button" class="btn btn-default">5</button><button type="button" class="btn btn-default">6</button><button type="button" class="btn btn-default">7</button></div><div class="btn-group" role="group" aria-label="Third group"><button type="button" class="btn btn-default">8</button></div></div>',
            types: ["flow"],
            validChildren: [".btn-group"],
            category: "buttons",
            previewScale: "0.6",
            icon: "view-module"
        }), l.push({
            name: "input field",
            nodes: ["input=text", "input=email", "input=password"],
            frameworks: ["bootstrap"],
            html: '<input type="text" class="form-control" placeholder="Text input">',
            types: ["flow", "phrasing", "interactive", "listed", "labelable", "submittable", "resettable", "reassociateable", "form-associated"],
            validChildren: !1,
            previewScale: "0.5",
            showWysiwyg: !1,
            hiddenClasses: ["form-control"],
            category: "forms",
            icon: "power-input",
            attributes: {
                placeholder: {
                    text: !0,
                    value: "Text input",
                    onAssign: function(e) {
                        this.value = e.selected.node.getAttribute("placeholder")
                    },
                    onChange: function(e, n) {
                        e.selected.node.setAttribute("placeholder", n), e.repositionBox("selected")
                    }
                },
                type: {
                    list: [{
                        name: "Text",
                        value: "text"
                    }, {
                        name: "Password",
                        value: "password"
                    }, {
                        name: "Date",
                        value: "date"
                    }, {
                        name: "Email",
                        value: "email"
                    }, {
                        name: "Datetime",
                        value: "datetime"
                    }, {
                        name: "Datetime Local",
                        value: "datetime-local"
                    }, {
                        name: "Month",
                        value: "month"
                    }, {
                        name: "Time",
                        value: "time"
                    }, {
                        name: "Week",
                        value: "week"
                    }, {
                        name: "Number",
                        value: "number"
                    }, {
                        name: "Url",
                        value: "url"
                    }, {
                        name: "Search",
                        value: "search"
                    }, {
                        name: "Tel",
                        value: "tel"
                    }, {
                        name: "Color",
                        value: "color"
                    }],
                    value: "",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.getAttribute("type") == this.list[n].value) return this.value = this.list[n].value;
                        return this.value = this.list[0].value
                    },
                    onChange: function(e, n) {
                        e.selected.node.setAttribute("type", n)
                    }
                }
            }
        }), l.push({
            name: "text area",
            nodes: ["textarea"],
            frameworks: ["bootstrap"],
            html: '<textarea class="form-control" rows="3"></textarea>',
            types: ["flow", "phrasing", "interactive", "listed", "labelable", "submittable", "resettable", "reassociateable", "form-associated"],
            validChildren: !1,
            previewScale: "0.5",
            showWysiwyg: !1,
            hiddenClasses: ["form-control"],
            category: "forms",
            icon: "short-text",
            attributes: {
                rows: {
                    text: !0,
                    value: 1,
                    onAssign: function(e) {
                        this.value = e.selected.node.getAttribute("rows")
                    },
                    onChange: function(e, n) {
                        e.selected.node.setAttribute("rows", n), e.repositionBox("selected")
                    }
                },
                placeholder: {
                    text: !0,
                    value: "Placeholder...",
                    onAssign: function(e) {
                        this.value = e.selected.node.getAttribute("placeholder")
                    },
                    onChange: function(e, n) {
                        e.selected.node.setAttribute("placeholder", n), e.repositionBox("selected")
                    }
                }
            }
        }), l.push({
            name: "checkbox",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "checkbox",
            html: '<div class="checkbox"><label><input type="checkbox">Option #1</label></div>',
            types: ["flow", "phrasing", "interactive", "listed", "labelable", "submittable", "resettable", "reassociateable", "form-associated"],
            validChildren: !1,
            category: "forms",
            showWysiwyg: !1,
            icon: "check-box"
        }), l.push({
            name: "input group",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "input-group",
            html: '<div class="form-group"><div class="input-group"><div class="input-group-addon">@</div><input class="form-control" type="email" placeholder="Enter email"></div></div>',
            types: ["flow"],
            validChildren: !1,
            attributes: {
                size: {
                    list: [{
                        name: "Medium",
                        value: "default"
                    }, {
                        name: "Large",
                        value: "input-group-lg"
                    }, {
                        name: "Small",
                        value: "input-group-sm"
                    }],
                    value: "default",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            },
            previewScale: "0.5",
            showWysiwyg: !1,
            category: "forms",
            icon: "view-list",
            hiddenClasses: ["input-group"]
        }), l.push({
            name: "form group",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "form-group",
            html: '<div class="form-group"><label for="email" class="control-label">Email address</label><input type="email" class="form-control" id="email" placeholder="Enter email"></div>',
            types: ["flow"],
            validChildren: !1,
            attributes: {
                state: {
                    list: [{
                        name: "None",
                        value: "default"
                    }, {
                        name: "Error",
                        value: "has-error"
                    }, {
                        name: "Success",
                        value: "has-success"
                    }, {
                        name: "Warning",
                        value: "has-warning"
                    }],
                    value: "default",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            },
            previewScale: "0.5",
            showWysiwyg: !1,
            category: "forms",
            icon: "view-headline",
            hiddenClasses: ["form-group"]
        }), l.push({
            name: "link",
            frameworks: ["base", "bootstrap"],
            nodes: ["a"],
            html: '<a href="#">A simple hyperlink.</a>',
            types: ["flow", "phrasing", "interactive"],
            validChildren: ["flow"],
            category: "typography",
            icon: "link"
        }), l.push({
            name: "addon",
            nodes: "*",
            frameworks: ["bootstrap"],
            class: "input-group-addon",
            html: !1,
            canDrag: !1,
            types: ["flow"],
            validChildren: !1,
            canModify: ["text", "attributes"],
            attributes: {
                side: {
                    list: [{
                        name: "Left",
                        value: "left"
                    }, {
                        name: "Right",
                        value: "right"
                    }],
                    value: !1,
                    onAssign: function(e) {
                        for (var n = 0; null != e.selected.node.previousSibling;) n++;
                        this.value = n ? this.list[1].value : this.list[0].value
                    },
                    onChange: function(e, n) {
                        var t = e.selected.node.parentNode.childNodes;
                        "right" === n ? t[t.length - 1].after(e.selected.node) : t[0].before(e.selected.node)
                    }
                },
                contents: {
                    list: [{
                        name: "Text",
                        value: "text"
                    }, {
                        name: "Checkbox",
                        value: "checkbox"
                    }, {
                        name: "Radio",
                        value: "radio"
                    }, {
                        name: "Button",
                        value: "button"
                    }, {
                        name: "Dropdown",
                        value: "dropdown"
                    }],
                    onAssign: function(e) {
                        if (e.selected.node) {
                            var n = e.selected.node.closest(".input-group-addon").childNodes;
                            n[0].nodeType === Node.TEXT_NODE ? this.value = this.list[0].value : "checkbox" == n[0].type ? this.value = this.list[1].value : "radio" == n[0].type ? this.value = this.list[2].value : "BUTTON" == n[0].nodeName ? this.value = this.list[3].value : n.length > 1 && (this.value = this.list[4].value)
                        }
                    },
                    onChange: function(e, n) {
                        "text" == n ? (e.selected.node.classList.remove(), e.selected.node.classList.add("input-group-addon"), e.selected.node.innerHTML = "", e.selected.node.innerText = "@") : "checkbox" == n ? (e.selected.node.classList.remove(), e.selected.node.classList.add("input-group-addon"), e.selected.node.innerHTML = '<input type="checkbox">') : "radio" == n ? (e.selected.node.classList.remove(), e.selected.node.classList.add("input-group-addon"), e.selected.node.innerHTML = '<input type="radio">') : "button" == n ? (e.selected.node.classList.remove(), e.selected.node.classList.add("input-group-btn"), e.selected.node.innerHTML = '<button class="btn btn-default" type="button">Go!</button>') : "dropdown" == n && (e.selected.node.classList.remove(), e.selected.node.classList.add("input-group-btn"), e.selected.node.innerHTML = '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li><li class="divider"></li><li><a href="#">Separated link</a></li></ul>')
                    }
                }
            },
            showWysiwyg: !1,
            hiddenClasses: ["input-group-addon"]
        }), l.push({
            name: "select",
            nodes: ["select"],
            frameworks: ["bootstrap"],
            html: '<select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>',
            types: ["flow", "phrasing", "interactive", "listed", "labelable", "submittable", "resettable", "reassociateable", "form-associated"],
            validChildren: !1,
            attributes: {
                state: {
                    value: "none",
                    list: [{
                        name: "None",
                        value: "none"
                    }, {
                        name: "Error",
                        value: "has-error"
                    }, {
                        name: "Success",
                        value: "has-success"
                    }, {
                        name: "Warning",
                        value: "has-warning"
                    }],
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            },
            previewScale: "0.5",
            showWysiwyg: !1,
            category: "forms",
            icon: "arrow-drop-down"
        }), l.push({
            name: "image",
            nodes: ["img"],
            frameworks: ["bootstrap"],
            html: '<img src=/client/builder/images/default.jpg" class="img-responsive">',
            types: ["flow", "phrasing", "embedded", "interactive", "form-associated"],
            validChildren: !1,
            category: "media",
            icon: "image",
            canModify: ["padding", "margin", "attributes", "shadows", "borders"],
            previewScale: "0.3",
            attributes: {
                shape: {
                    list: [{
                        name: "Default",
                        value: "none"
                    }, {
                        name: "Rounded",
                        value: "img-rounded"
                    }, {
                        name: "Thumbnail",
                        value: "img-thumbnail"
                    }, {
                        name: "Circle",
                        value: "img-circle"
                    }],
                    value: "none",
                    onAssign: function(e) {
                        for (var n = this.list.length - 1; n >= 0; n--)
                            if (e.selected.node.className.indexOf(this.list[n].value) > -1) return this.value = this.list[n].value
                    },
                    onChange: function(e, n) {
                        for (var t = this.list.length - 1; t >= 0; t--) this.list[t].value && e.selected.node.classList.remove(this.list[t].value);
                        e.selected.node.classList.add(n)
                    }
                }
            }
        }), l.push({
            name: "responsive video",
            nodes: "*",
            class: "embed-responsive",
            frameworks: ["bootstrap"],
            html: '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="//www.youtube.com/embed/sENM2wA_FTg"></iframe></div>',
            types: ["flow"],
            validChildren: !1,
            category: "media",
            icon: "video-library",
            canModify: ["padding", "margin", "shadows", "attributes"],
            attributes: {
                url: {
                    text: !0,
                    value: "//www.youtube.com/embed/wGp0GAd1d1s",
                    onAssign: function(e) {
                        this.value = e.selected.node.querySelector("iframe").src
                    },
                    onChange: function(e, n) {
                        e.selected.node.querySelector("iframe").src = n
                    }
                }
            },
            hiddenClasses: ["embed-responsive", "embed-responsive-16by9", "preview-node", "img-responsive"]
        }), l.push({
            name: "image grid",
            nodes: "*",
            class: "image-grid",
            frameworks: ["bootstrap"],
            html: '<div class="row image-grid"><div class="col-xs-3"><a href="#" class="thumbnail"><img src="templates/freelancer/images/portfolio/cabin.png"></a></div><div class="col-xs-3"><a href="#" class="thumbnail"><img src="templates/freelancer/images/portfolio/cabin.png"></a></div><div class="col-xs-3"><a href="#" class="thumbnail"><img src="templates/freelancer/images/portfolio/cabin.png"></a></div><div class="col-xs-3"><a href="#" class="thumbnail"><img src="templates/freelancer/images/portfolio/cabin.png"></a></div></div>',
            types: ["flow"],
            validChildren: !1,
            category: "media",
            icon: "grid-on",
            canModify: ["padding", "margin", "shadows", "attributes"],
            previewScale: "0.2"
        })
    },
    UdtQ: function(e, n, t) {
        var l, o;
        ! function(i) {
            "use strict";
            void 0 === (o = "function" == typeof(l = function() {
                if ("undefined" == typeof window || !window.document) return function() {
                    throw new Error("Sortable.js requires a window with a document")
                };
                var e, n, t, l, o, i, a, r, u, s, d, c, p, h, f, m, g, b, v, y, x, w = {},
                    _ = /\s+/g,
                    k = /left|right|inline/,
                    C = "Sortable" + (new Date).getTime(),
                    E = window,
                    R = E.document,
                    S = E.parseInt,
                    T = E.setTimeout,
                    P = E.jQuery || E.Zepto,
                    I = E.Polymer,
                    D = !1,
                    O = "draggable" in R.createElement("div"),
                    M = !navigator.userAgent.match(/(?:Trident.*rv[ :]?11\.|msie)/i) && ((x = R.createElement("x")).style.cssText = "pointer-events:auto", "auto" === x.style.pointerEvents),
                    N = !1,
                    B = Math.abs,
                    j = Math.min,
                    L = [],
                    A = [],
                    F = le(function(e, n, t) {
                        if (t && n.scroll) {
                            var l, o, i, a, d, c, p = t[C],
                                h = n.scrollSensitivity,
                                f = n.scrollSpeed,
                                m = e.clientX,
                                g = e.clientY,
                                b = window.innerWidth,
                                v = window.innerHeight;
                            if (u !== t && (u = t, s = n.scrollFn, !0 === (r = n.scroll))) {
                                r = t;
                                do {
                                    if (r.offsetWidth < r.scrollWidth || r.offsetHeight < r.scrollHeight) break
                                } while (r = r.parentNode)
                            }
                            r && (l = r, o = r.getBoundingClientRect(), i = (B(o.right - m) <= h) - (B(o.left - m) <= h), a = (B(o.bottom - g) <= h) - (B(o.top - g) <= h)), i || a || (a = (v - g <= h) - (g <= h), ((i = (b - m <= h) - (m <= h)) || a) && (l = E)), w.vx === i && w.vy === a && w.el === l || (w.el = l, w.vx = i, w.vy = a, clearInterval(w.pid), l && (w.pid = setInterval(function() {
                                if (c = a ? a * f : 0, d = i ? i * f : 0, "function" == typeof s) return s.call(p, d, c, e);
                                l === E ? E.scrollTo(E.pageXOffset + d, E.pageYOffset + c) : (l.scrollTop += c, l.scrollLeft += d)
                            }, 24)))
                        }
                    }, 30),
                    V = function(e) {
                        function n(e, n) {
                            return void 0 !== e && !0 !== e || (e = t.name), "function" == typeof e ? e : function(t, l) {
                                var o = l.options.group.name;
                                return n ? e : e && (e.join ? e.indexOf(o) > -1 : o == e)
                            }
                        }
                        var t = {},
                            l = e.group;
                        l && "object" == typeof l || (l = {
                            name: l
                        }), t.name = l.name, t.checkPull = n(l.pull, !0), t.checkPut = n(l.put), t.revertClone = l.revertClone, e.group = t
                    };
                try {
                    window.addEventListener("test", null, Object.defineProperty({}, "passive", {
                        get: function() {
                            D = {
                                capture: !1,
                                passive: !1
                            }
                        }
                    }))
                } catch (e) {}

                function H(e, n) {
                    if (!e || !e.nodeType || 1 !== e.nodeType) throw "Sortable: `el` must be HTMLElement, and not " + {}.toString.call(e);
                    this.el = e, this.options = n = oe({}, n), e[C] = this;
                    var t = {
                        group: Math.random(),
                        sort: !0,
                        disabled: !1,
                        store: null,
                        handle: null,
                        scroll: !0,
                        scrollSensitivity: 30,
                        scrollSpeed: 10,
                        draggable: /[uo]l/i.test(e.nodeName) ? "li" : ">*",
                        ghostClass: "sortable-ghost",
                        chosenClass: "sortable-chosen",
                        dragClass: "sortable-drag",
                        ignore: "a, img",
                        filter: null,
                        preventOnFilter: !0,
                        animation: 0,
                        setData: function(e, n) {
                            e.setData("Text", n.textContent)
                        },
                        dropBubble: !1,
                        dragoverBubble: !1,
                        dataIdAttr: "data-id",
                        delay: 0,
                        forceFallback: !1,
                        fallbackClass: "sortable-fallback",
                        fallbackOnBody: !1,
                        fallbackTolerance: 0,
                        fallbackOffset: {
                            x: 0,
                            y: 0
                        },
                        supportPointer: !1 !== H.supportPointer
                    };
                    for (var l in t) !(l in n) && (n[l] = t[l]);
                    for (var o in V(n), this) "_" === o.charAt(0) && "function" == typeof this[o] && (this[o] = this[o].bind(this));
                    this.nativeDraggable = !n.forceFallback && O, W(e, "mousedown", this._onTapStart), W(e, "touchstart", this._onTapStart), n.supportPointer && W(e, "pointerdown", this._onTapStart), this.nativeDraggable && (W(e, "dragover", this), W(e, "dragenter", this)), A.push(this._onDragOver), n.store && this.sort(n.store.get(this))
                }

                function z(n, t) {
                    "clone" !== n.lastPullMode && (t = !0), l && l.state !== t && (G(l, "display", t ? "none" : ""), t || l.state && (n.options.group.revertClone ? (o.insertBefore(l, i), n._animate(e, l)) : o.insertBefore(l, e)), l.state = t)
                }

                function q(e, n, t) {
                    if (e) {
                        t = t || R;
                        do {
                            if (">*" === n && e.parentNode === t || te(e, n)) return e
                        } while (e = U(e))
                    }
                    return null
                }

                function U(e) {
                    var n = e.host;
                    return n && n.nodeType ? n : e.parentNode
                }

                function W(e, n, t) {
                    e.addEventListener(n, t, D)
                }

                function $(e, n, t) {
                    e.removeEventListener(n, t, D)
                }

                function X(e, n, t) {
                    if (e)
                        if (e.classList) e.classList[t ? "add" : "remove"](n);
                        else {
                            var l = (" " + e.className + " ").replace(_, " ").replace(" " + n + " ", " ");
                            e.className = (l + (t ? " " + n : "")).replace(_, " ")
                        }
                }

                function G(e, n, t) {
                    var l = e && e.style;
                    if (l) {
                        if (void 0 === t) return R.defaultView && R.defaultView.getComputedStyle ? t = R.defaultView.getComputedStyle(e, "") : e.currentStyle && (t = e.currentStyle), void 0 === n ? t : t[n];
                        n in l || (n = "-webkit-" + n), l[n] = t + ("string" == typeof t ? "" : "px")
                    }
                }

                function Z(e, n, t) {
                    if (e) {
                        var l = e.getElementsByTagName(n),
                            o = 0,
                            i = l.length;
                        if (t)
                            for (; o < i; o++) t(l[o], o);
                        return l
                    }
                    return []
                }

                function Y(e, n, t, o, i, a, r, u) {
                    e = e || n[C];
                    var s = R.createEvent("Event"),
                        d = e.options,
                        c = "on" + t.charAt(0).toUpperCase() + t.substr(1);
                    s.initEvent(t, !0, !0), s.to = i || n, s.from = a || n, s.item = o || n, s.clone = l, s.oldIndex = r, s.newIndex = u, n.dispatchEvent(s), d[c] && d[c].call(e, s)
                }

                function K(e, n, t, l, o, i, a, r) {
                    var u, s, d = e[C],
                        c = d.options.onMove;
                    return (u = R.createEvent("Event")).initEvent("move", !0, !0), u.to = n, u.from = e, u.dragged = t, u.draggedRect = l, u.related = o || n, u.relatedRect = i || n.getBoundingClientRect(), u.willInsertAfter = r, e.dispatchEvent(u), c && (s = c.call(d, u, a)), s
                }

                function Q(e) {
                    e.draggable = !1
                }

                function J() {
                    N = !1
                }

                function ee(e) {
                    for (var n = e.tagName + e.className + e.src + e.href + e.textContent, t = n.length, l = 0; t--;) l += n.charCodeAt(t);
                    return l.toString(36)
                }

                function ne(e, n) {
                    var t = 0;
                    if (!e || !e.parentNode) return -1;
                    for (; e && (e = e.previousElementSibling);) "TEMPLATE" === e.nodeName.toUpperCase() || ">*" !== n && !te(e, n) || t++;
                    return t
                }

                function te(e, n) {
                    if (e) {
                        var t = (n = n.split(".")).shift().toUpperCase(),
                            l = new RegExp("\\s(" + n.join("|") + ")(?=\\s)", "g");
                        return !("" !== t && e.nodeName.toUpperCase() != t || n.length && ((" " + e.className + " ").match(l) || []).length != n.length)
                    }
                    return !1
                }

                function le(e, n) {
                    var t, l;
                    return function() {
                        void 0 === t && (t = arguments, l = this, T(function() {
                            1 === t.length ? e.call(l, t[0]) : e.apply(l, t), t = void 0
                        }, n))
                    }
                }

                function oe(e, n) {
                    if (e && n)
                        for (var t in n) n.hasOwnProperty(t) && (e[t] = n[t]);
                    return e
                }

                function ie(e) {
                    return I && I.dom ? I.dom(e).cloneNode(!0) : P ? P(e).clone(!0)[0] : e.cloneNode(!0)
                }

                function ae(e) {
                    return T(e, 0)
                }

                function re(e) {
                    return clearTimeout(e)
                }
                return H.prototype = {
                    constructor: H,
                    _onTapStart: function(n) {
                        var t, l = this,
                            o = this.el,
                            i = this.options,
                            r = i.preventOnFilter,
                            u = n.type,
                            s = n.touches && n.touches[0],
                            d = (s || n).target,
                            c = n.target.shadowRoot && n.path && n.path[0] || d,
                            p = i.filter;
                        if (function(e) {
                                for (var n = e.getElementsByTagName("input"), t = n.length; t--;) {
                                    var l = n[t];
                                    l.checked && L.push(l)
                                }
                            }(o), !e && !(/mousedown|pointerdown/.test(u) && 0 !== n.button || i.disabled) && !c.isContentEditable && (d = q(d, i.draggable, o)) && a !== d) {
                            if (t = ne(d, i.draggable), "function" == typeof p) {
                                if (p.call(this, n, d, this)) return Y(l, c, "filter", d, o, o, t), void(r && n.preventDefault())
                            } else if (p && (p = p.split(",").some(function(e) {
                                    if (e = q(c, e.trim(), o)) return Y(l, e, "filter", d, o, o, t), !0
                                }))) return void(r && n.preventDefault());
                            i.handle && !q(c, i.handle, o) || this._prepareDragStart(n, s, d, t)
                        }
                    },
                    _prepareDragStart: function(t, l, r, u) {
                        var s, d = this,
                            c = d.el,
                            p = d.options,
                            f = c.ownerDocument;
                        r && !e && r.parentNode === c && (b = t, o = c, n = (e = r).parentNode, i = e.nextSibling, a = r, m = p.group, h = u, this._lastX = (l || t).clientX, this._lastY = (l || t).clientY, e.style["will-change"] = "all", s = function() {
                            d._disableDelayedDrag(), e.draggable = d.nativeDraggable, X(e, p.chosenClass, !0), d._triggerDragStart(t, l), Y(d, o, "choose", e, o, o, h)
                        }, p.ignore.split(",").forEach(function(n) {
                            Z(e, n.trim(), Q)
                        }), W(f, "mouseup", d._onDrop), W(f, "touchend", d._onDrop), W(f, "touchcancel", d._onDrop), W(f, "selectstart", d), p.supportPointer && W(f, "pointercancel", d._onDrop), p.delay ? (W(f, "mouseup", d._disableDelayedDrag), W(f, "touchend", d._disableDelayedDrag), W(f, "touchcancel", d._disableDelayedDrag), W(f, "mousemove", d._disableDelayedDrag), W(f, "touchmove", d._disableDelayedDrag), p.supportPointer && W(f, "pointermove", d._disableDelayedDrag), d._dragStartTimer = T(s, p.delay)) : s())
                    },
                    _disableDelayedDrag: function() {
                        var e = this.el.ownerDocument;
                        clearTimeout(this._dragStartTimer), $(e, "mouseup", this._disableDelayedDrag), $(e, "touchend", this._disableDelayedDrag), $(e, "touchcancel", this._disableDelayedDrag), $(e, "mousemove", this._disableDelayedDrag), $(e, "touchmove", this._disableDelayedDrag), $(e, "pointermove", this._disableDelayedDrag)
                    },
                    _triggerDragStart: function(n, t) {
                        (t = t || ("touch" == n.pointerType ? n : null)) ? this._onDragStart(b = {
                            target: e,
                            clientX: t.clientX,
                            clientY: t.clientY
                        }, "touch"): this.nativeDraggable ? (W(e, "dragend", this), W(o, "dragstart", this._onDragStart)) : this._onDragStart(b, !0);
                        try {
                            R.selection ? ae(function() {
                                R.selection.empty()
                            }) : window.getSelection().removeAllRanges()
                        } catch (e) {}
                    },
                    _dragStarted: function() {
                        if (o && e) {
                            var n = this.options;
                            X(e, n.ghostClass, !0), X(e, n.dragClass, !1), H.active = this, Y(this, o, "start", e, o, o, h)
                        } else this._nulling()
                    },
                    _emulateDragOver: function() {
                        if (v) {
                            if (this._lastX === v.clientX && this._lastY === v.clientY) return;
                            this._lastX = v.clientX, this._lastY = v.clientY, M || G(t, "display", "none");
                            var e = R.elementFromPoint(v.clientX, v.clientY),
                                n = e,
                                l = A.length;
                            if (e && e.shadowRoot && (n = e = e.shadowRoot.elementFromPoint(v.clientX, v.clientY)), n)
                                do {
                                    if (n[C]) {
                                        for (; l--;) A[l]({
                                            clientX: v.clientX,
                                            clientY: v.clientY,
                                            target: e,
                                            rootEl: n
                                        });
                                        break
                                    }
                                    e = n
                                } while (n = n.parentNode);
                            M || G(t, "display", "")
                        }
                    },
                    _onTouchMove: function(e) {
                        if (b) {
                            var n = this.options,
                                l = n.fallbackTolerance,
                                o = n.fallbackOffset,
                                i = e.touches ? e.touches[0] : e,
                                a = i.clientX - b.clientX + o.x,
                                r = i.clientY - b.clientY + o.y,
                                u = e.touches ? "translate3d(" + a + "px," + r + "px,0)" : "translate(" + a + "px," + r + "px)";
                            if (!H.active) {
                                if (l && j(B(i.clientX - this._lastX), B(i.clientY - this._lastY)) < l) return;
                                this._dragStarted()
                            }
                            this._appendGhost(), y = !0, v = i, G(t, "webkitTransform", u), G(t, "mozTransform", u), G(t, "msTransform", u), G(t, "transform", u), e.preventDefault()
                        }
                    },
                    _appendGhost: function() {
                        if (!t) {
                            var n, l = e.getBoundingClientRect(),
                                i = G(e),
                                a = this.options;
                            X(t = e.cloneNode(!0), a.ghostClass, !1), X(t, a.fallbackClass, !0), X(t, a.dragClass, !0), G(t, "top", l.top - S(i.marginTop, 10)), G(t, "left", l.left - S(i.marginLeft, 10)), G(t, "width", l.width), G(t, "height", l.height), G(t, "opacity", "0.8"), G(t, "position", "fixed"), G(t, "zIndex", "100000"), G(t, "pointerEvents", "none"), a.fallbackOnBody && R.body.appendChild(t) || o.appendChild(t), n = t.getBoundingClientRect(), G(t, "width", 2 * l.width - n.width), G(t, "height", 2 * l.height - n.height)
                        }
                    },
                    _onDragStart: function(n, t) {
                        var i = this,
                            a = n.dataTransfer,
                            r = i.options;
                        i._offUpEvents(), m.checkPull(i, i, e, n) && ((l = ie(e)).draggable = !1, l.style["will-change"] = "", G(l, "display", "none"), X(l, i.options.chosenClass, !1), i._cloneId = ae(function() {
                            o.insertBefore(l, e), Y(i, o, "clone", e)
                        })), X(e, r.dragClass, !0), t ? ("touch" === t ? (W(R, "touchmove", i._onTouchMove), W(R, "touchend", i._onDrop), W(R, "touchcancel", i._onDrop), r.supportPointer && (W(R, "pointermove", i._onTouchMove), W(R, "pointerup", i._onDrop))) : (W(R, "mousemove", i._onTouchMove), W(R, "mouseup", i._onDrop)), i._loopId = setInterval(i._emulateDragOver, 50)) : (a && (a.effectAllowed = "move", r.setData && r.setData.call(i, a, e)), W(R, "drop", i), i._dragStartId = ae(i._dragStarted))
                    },
                    _onDragOver: function(a) {
                        var r, u, s, h, f = this.el,
                            b = this.options,
                            v = b.group,
                            x = H.active,
                            w = m === v,
                            _ = !1,
                            E = b.sort;
                        if (void 0 !== a.preventDefault && (a.preventDefault(), !b.dragoverBubble && a.stopPropagation()), !e.animated && (y = !0, x && !b.disabled && (w ? E || (h = !o.contains(e)) : g === this || (x.lastPullMode = m.checkPull(this, x, e, a)) && v.checkPut(this, x, e, a)) && (void 0 === a.rootEl || a.rootEl === this.el))) {
                            if (F(a, b, this.el), N) return;
                            if (r = q(a.target, b.draggable, f), u = e.getBoundingClientRect(), g !== this && (g = this, _ = !0), h) return z(x, !0), n = o, void(l || i ? o.insertBefore(e, l || i) : E || o.appendChild(e));
                            if (0 === f.children.length || f.children[0] === t || f === a.target && function(e, n) {
                                    var t = e.lastElementChild.getBoundingClientRect();
                                    return n.clientY - (t.top + t.height) > 5 || n.clientX - (t.left + t.width) > 5
                                }(f, a)) {
                                if (0 !== f.children.length && f.children[0] !== t && f === a.target && (r = f.lastElementChild), r) {
                                    if (r.animated) return;
                                    s = r.getBoundingClientRect()
                                }
                                z(x, w), !1 !== K(o, f, e, u, r, s, a) && (e.contains(f) || (f.appendChild(e), n = f), this._animate(u, e), r && this._animate(s, r))
                            } else if (r && !r.animated && r !== e && void 0 !== r.parentNode[C]) {
                                d !== r && (d = r, c = G(r), p = G(r.parentNode));
                                var R = (s = r.getBoundingClientRect()).right - s.left,
                                    S = s.bottom - s.top,
                                    P = k.test(c.cssFloat + c.display) || "flex" == p.display && 0 === p["flex-direction"].indexOf("row"),
                                    I = r.offsetWidth > e.offsetWidth,
                                    D = r.offsetHeight > e.offsetHeight,
                                    O = (P ? (a.clientX - s.left) / R : (a.clientY - s.top) / S) > .5,
                                    M = r.nextElementSibling,
                                    B = !1;
                                if (P) {
                                    var j = e.offsetTop,
                                        L = r.offsetTop;
                                    B = j === L ? r.previousElementSibling === e && !I || O && I : r.previousElementSibling === e || e.previousElementSibling === r ? (a.clientY - s.top) / S > .5 : L > j
                                } else _ || (B = M !== e && !D || O && D);
                                var A = K(o, f, e, u, r, s, a, B);
                                !1 !== A && (1 !== A && -1 !== A || (B = 1 === A), N = !0, T(J, 30), z(x, w), e.contains(f) || (B && !M ? f.appendChild(e) : r.parentNode.insertBefore(e, B ? M : r)), n = e.parentNode, this._animate(u, e), this._animate(s, r))
                            }
                        }
                    },
                    _animate: function(e, n) {
                        var t = this.options.animation;
                        if (t) {
                            var l = n.getBoundingClientRect();
                            1 === e.nodeType && (e = e.getBoundingClientRect()), G(n, "transition", "none"), G(n, "transform", "translate3d(" + (e.left - l.left) + "px," + (e.top - l.top) + "px,0)"), G(n, "transition", "all " + t + "ms"), G(n, "transform", "translate3d(0,0,0)"), clearTimeout(n.animated), n.animated = T(function() {
                                G(n, "transition", ""), G(n, "transform", ""), n.animated = !1
                            }, t)
                        }
                    },
                    _offUpEvents: function() {
                        var e = this.el.ownerDocument;
                        $(R, "touchmove", this._onTouchMove), $(R, "pointermove", this._onTouchMove), $(e, "mouseup", this._onDrop), $(e, "touchend", this._onDrop), $(e, "pointerup", this._onDrop), $(e, "touchcancel", this._onDrop), $(e, "pointercancel", this._onDrop), $(e, "selectstart", this)
                    },
                    _onDrop: function(a) {
                        var r = this.el,
                            u = this.options;
                        clearInterval(this._loopId), clearInterval(w.pid), clearTimeout(this._dragStartTimer), re(this._cloneId), re(this._dragStartId), $(R, "mouseover", this), $(R, "mousemove", this._onTouchMove), this.nativeDraggable && ($(R, "drop", this), $(r, "dragstart", this._onDragStart)), this._offUpEvents(), a && (y && (a.preventDefault(), !u.dropBubble && a.stopPropagation()), t && t.parentNode && t.parentNode.removeChild(t), o !== n && "clone" === H.active.lastPullMode || l && l.parentNode && l.parentNode.removeChild(l), e && (this.nativeDraggable && $(e, "dragend", this), Q(e), e.style["will-change"] = "", X(e, this.options.ghostClass, !1), X(e, this.options.chosenClass, !1), Y(this, o, "unchoose", e, n, o, h), o !== n ? (f = ne(e, u.draggable)) >= 0 && (Y(null, n, "add", e, n, o, h, f), Y(this, o, "remove", e, n, o, h, f), Y(null, n, "sort", e, n, o, h, f), Y(this, o, "sort", e, n, o, h, f)) : e.nextSibling !== i && (f = ne(e, u.draggable)) >= 0 && (Y(this, o, "update", e, n, o, h, f), Y(this, o, "sort", e, n, o, h, f)), H.active && (null != f && -1 !== f || (f = h), Y(this, o, "end", e, n, o, h, f), this.save()))), this._nulling()
                    },
                    _nulling: function() {
                        o = e = n = t = i = l = a = r = u = b = v = y = f = d = c = g = m = H.active = null, L.forEach(function(e) {
                            e.checked = !0
                        }), L.length = 0
                    },
                    handleEvent: function(n) {
                        switch (n.type) {
                            case "drop":
                            case "dragend":
                                this._onDrop(n);
                                break;
                            case "dragover":
                            case "dragenter":
                                e && (this._onDragOver(n), function(e) {
                                    e.dataTransfer && (e.dataTransfer.dropEffect = "move"), e.preventDefault()
                                }(n));
                                break;
                            case "mouseover":
                                this._onDrop(n);
                                break;
                            case "selectstart":
                                n.preventDefault()
                        }
                    },
                    toArray: function() {
                        for (var e, n = [], t = this.el.children, l = 0, o = t.length, i = this.options; l < o; l++) q(e = t[l], i.draggable, this.el) && n.push(e.getAttribute(i.dataIdAttr) || ee(e));
                        return n
                    },
                    sort: function(e) {
                        var n = {},
                            t = this.el;
                        this.toArray().forEach(function(e, l) {
                            var o = t.children[l];
                            q(o, this.options.draggable, t) && (n[e] = o)
                        }, this), e.forEach(function(e) {
                            n[e] && (t.removeChild(n[e]), t.appendChild(n[e]))
                        })
                    },
                    save: function() {
                        var e = this.options.store;
                        e && e.set(this)
                    },
                    closest: function(e, n) {
                        return q(e, n || this.options.draggable, this.el)
                    },
                    option: function(e, n) {
                        var t = this.options;
                        if (void 0 === n) return t[e];
                        t[e] = n, "group" === e && V(t)
                    },
                    destroy: function() {
                        var e = this.el;
                        e[C] = null, $(e, "mousedown", this._onTapStart), $(e, "touchstart", this._onTapStart), $(e, "pointerdown", this._onTapStart), this.nativeDraggable && ($(e, "dragover", this), $(e, "dragenter", this)), Array.prototype.forEach.call(e.querySelectorAll("[draggable]"), function(e) {
                            e.removeAttribute("draggable")
                        }), A.splice(A.indexOf(this._onDragOver), 1), this._onDrop(), this.el = e = null
                    }
                }, W(R, "touchmove", function(e) {
                    H.active && e.preventDefault()
                }), H.utils = {
                    on: W,
                    off: $,
                    css: G,
                    find: Z,
                    is: function(e, n) {
                        return !!q(e, n, e)
                    },
                    extend: oe,
                    throttle: le,
                    closest: q,
                    toggleClass: X,
                    clone: ie,
                    index: ne,
                    nextTick: ae,
                    cancelNextTick: re
                }, H.create = function(e, n) {
                    return new H(e, n)
                }, H.version = "1.7.0", H
            }) ? l.call(n, t, n, e) : l) || (e.exports = o)
        }()
    },
    ZFRd: function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return f
        }), t.d(n, "c", function() {
            return v
        }), t.d(n, "d", function() {
            return b
        }), t.d(n, "f", function() {
            return _
        }), t.d(n, "h", function() {
            return w
        }), t.d(n, "b", function() {
            return g
        }), t.d(n, "g", function() {
            return m
        }), t.d(n, "i", function() {
            return k
        }), t.d(n, "j", function() {
            return C
        }), t.d(n, "e", function() {
            return x
        });
        var l = t("CZgk"),
            o = t("LMZF"),
            i = t("j5BN"),
            a = t("6Xbx"),
            r = t("TO51"),
            u = t("XEj9"),
            s = t("qLnt"),
            d = t("2kLc"),
            c = t("rT01"),
            p = t("GZB0"),
            h = t("5O0w"),
            f = function() {
                function e(e, n) {
                    this._elementRef = e, this._ngZone = n
                }
                return e.prototype.alignToElement = function(e) {
                    var n = this;
                    this.show(), "undefined" != typeof requestAnimationFrame ? this._ngZone.runOutsideAngular(function() {
                        requestAnimationFrame(function() {
                            return n._setStyles(e)
                        })
                    }) : this._setStyles(e)
                }, e.prototype.show = function() {
                    this._elementRef.nativeElement.style.visibility = "visible"
                }, e.prototype.hide = function() {
                    this._elementRef.nativeElement.style.visibility = "hidden"
                }, e.prototype._setStyles = function(e) {
                    var n = this._elementRef.nativeElement;
                    n.style.left = e ? (e.offsetLeft || 0) + "px" : "0", n.style.width = e ? (e.offsetWidth || 0) + "px" : "0"
                }, e
            }(),
            m = function(e) {
                function n(n, t) {
                    return e.call(this, n, t) || this
                }
                return Object(a.b)(n, e), n
            }(l.b),
            g = function(e) {
                function n(n) {
                    var t = e.call(this) || this;
                    return t._viewContainerRef = n, t.textLabel = "", t._contentPortal = null, t._labelChange = new r.a, t._disableChange = new r.a, t.position = null, t.origin = null, t.isActive = !1, t
                }
                return Object(a.b)(n, e), Object.defineProperty(n.prototype, "content", {
                    get: function() {
                        return this._contentPortal
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngOnChanges = function(e) {
                    e.hasOwnProperty("textLabel") && this._labelChange.next(), e.hasOwnProperty("disabled") && this._disableChange.next()
                }, n.prototype.ngOnDestroy = function() {
                    this._disableChange.complete(), this._labelChange.complete()
                }, n.prototype.ngOnInit = function() {
                    this._contentPortal = new l.h(this._content, this._viewContainerRef)
                }, n
            }(Object(i.G)(function() {})),
            b = function(e) {
                function n(n, t, l) {
                    var o = e.call(this, n, t) || this;
                    return o._host = l, o
                }
                return Object(a.b)(n, e), n.prototype.ngOnInit = function() {
                    var e = this;
                    this._host._isCenterPosition(this._host._position) && this.attach(this._host._content), this._centeringSub = this._host._beforeCentering.subscribe(function(n) {
                        n && (e.hasAttached() || e.attach(e._host._content))
                    }), this._leavingSub = this._host._afterLeavingCenter.subscribe(function() {
                        e.detach()
                    })
                }, n.prototype.ngOnDestroy = function() {
                    this._centeringSub && !this._centeringSub.closed && this._centeringSub.unsubscribe(), this._leavingSub && !this._leavingSub.closed && this._leavingSub.unsubscribe()
                }, n
            }(l.c),
            v = function() {
                function e(e, n) {
                    this._elementRef = e, this._dir = n, this._onCentering = new o.EventEmitter, this._beforeCentering = new o.EventEmitter, this._afterLeavingCenter = new o.EventEmitter, this._onCentered = new o.EventEmitter(!0)
                }
                return Object.defineProperty(e.prototype, "position", {
                    set: function(e) {
                        this._position = e < 0 ? "ltr" == this._getLayoutDirection() ? "left" : "right" : e > 0 ? "ltr" == this._getLayoutDirection() ? "right" : "left" : "center"
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "origin", {
                    set: function(e) {
                        if (null != e) {
                            var n = this._getLayoutDirection();
                            this._origin = "ltr" == n && e <= 0 || "rtl" == n && e > 0 ? "left" : "right"
                        }
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.ngOnInit = function() {
                    "center" == this._position && this._origin && (this._position = "left" == this._origin ? "left-origin-center" : "right-origin-center")
                }, e.prototype._onTranslateTabStarted = function(e) {
                    var n = this._isCenterPosition(e.toState);
                    this._beforeCentering.emit(n), n && this._onCentering.emit(this._elementRef.nativeElement.clientHeight)
                }, e.prototype._onTranslateTabComplete = function(e) {
                    this._isCenterPosition(e.toState) && this._isCenterPosition(this._position) && this._onCentered.emit(), this._isCenterPosition(e.fromState) && !this._isCenterPosition(this._position) && this._afterLeavingCenter.emit()
                }, e.prototype._getLayoutDirection = function() {
                    return this._dir && "rtl" === this._dir.value ? "rtl" : "ltr"
                }, e.prototype._isCenterPosition = function(e) {
                    return "center" == e || "left-origin-center" == e || "right-origin-center" == e
                }, e
            }(),
            y = 0,
            x = function(e) {
                function n(n, t) {
                    var l = e.call(this, n) || this;
                    return l._changeDetectorRef = t, l._indexToSelect = 0, l._tabBodyWrapperHeight = 0, l._tabsSubscription = s.a.EMPTY, l._tabLabelSubscription = s.a.EMPTY, l._dynamicHeight = !1, l._selectedIndex = null, l.headerPosition = "above", l.selectedIndexChange = new o.EventEmitter, l.focusChange = new o.EventEmitter, l.animationDone = new o.EventEmitter, l.selectedTabChange = new o.EventEmitter(!0), l.selectChange = l.selectedTabChange, l._groupId = y++, l
                }
                return Object(a.b)(n, e), Object.defineProperty(n.prototype, "dynamicHeight", {
                    get: function() {
                        return this._dynamicHeight
                    },
                    set: function(e) {
                        this._dynamicHeight = Object(u.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_dynamicHeightDeprecated", {
                    get: function() {
                        return this._dynamicHeight
                    },
                    set: function(e) {
                        this._dynamicHeight = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "selectedIndex", {
                    get: function() {
                        return this._selectedIndex
                    },
                    set: function(e) {
                        this._indexToSelect = Object(u.d)(e, null)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "backgroundColor", {
                    get: function() {
                        return this._backgroundColor
                    },
                    set: function(e) {
                        var n = this._elementRef.nativeElement;
                        n.classList.remove("mat-background-" + this.backgroundColor), e && n.classList.add("mat-background-" + e), this._backgroundColor = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngAfterContentChecked = function() {
                    var e = this,
                        n = this._indexToSelect = Math.min(this._tabs.length - 1, Math.max(this._indexToSelect || 0, 0));
                    if (this._selectedIndex != n && null != this._selectedIndex) {
                        var t = this._createChangeEvent(n);
                        this.selectedTabChange.emit(t), Promise.resolve().then(function() {
                            return e.selectedIndexChange.emit(n)
                        })
                    }
                    this._tabs.forEach(function(t, l) {
                        t.position = l - n, t.isActive = l === n, null == e._selectedIndex || 0 != t.position || t.origin || (t.origin = n - e._selectedIndex)
                    }), this._selectedIndex !== n && (this._selectedIndex = n, this._changeDetectorRef.markForCheck())
                }, n.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._subscribeToTabLabels(), this._tabsSubscription = this._tabs.changes.subscribe(function() {
                        e._subscribeToTabLabels(), e._changeDetectorRef.markForCheck()
                    })
                }, n.prototype.ngOnDestroy = function() {
                    this._tabsSubscription.unsubscribe(), this._tabLabelSubscription.unsubscribe()
                }, n.prototype._focusChanged = function(e) {
                    this.focusChange.emit(this._createChangeEvent(e))
                }, n.prototype._createChangeEvent = function(e) {
                    var n = new function() {};
                    return n.index = e, this._tabs && this._tabs.length && (n.tab = this._tabs.toArray()[e]), n
                }, n.prototype._subscribeToTabLabels = function() {
                    var e = this;
                    this._tabLabelSubscription && this._tabLabelSubscription.unsubscribe(), this._tabLabelSubscription = d.a.apply(void 0, this._tabs.map(function(e) {
                        return e._disableChange
                    }).concat(this._tabs.map(function(e) {
                        return e._labelChange
                    }))).subscribe(function() {
                        e._changeDetectorRef.markForCheck()
                    })
                }, n.prototype._getTabLabelId = function(e) {
                    return "mat-tab-label-" + this._groupId + "-" + e
                }, n.prototype._getTabContentId = function(e) {
                    return "mat-tab-content-" + this._groupId + "-" + e
                }, n.prototype._setTabBodyWrapperHeight = function(e) {
                    if (this._dynamicHeight && this._tabBodyWrapperHeight) {
                        var n = this._tabBodyWrapper.nativeElement;
                        n.style.height = this._tabBodyWrapperHeight + "px", this._tabBodyWrapper.nativeElement.offsetHeight && (n.style.height = e + "px")
                    }
                }, n.prototype._removeTabBodyWrapperHeight = function() {
                    this._tabBodyWrapperHeight = this._tabBodyWrapper.nativeElement.clientHeight, this._tabBodyWrapper.nativeElement.style.height = "", this.animationDone.emit()
                }, n.prototype._handleClick = function(e, n, t) {
                    e.disabled || (this.selectedIndex = n.focusIndex = t)
                }, n.prototype._getTabIndex = function(e, n) {
                    return e.disabled ? null : this.selectedIndex === n ? 0 : -1
                }, n
            }(Object(i.E)(Object(i.F)(function(e) {
                this._elementRef = e
            }), "primary")),
            w = function(e) {
                function n(n) {
                    var t = e.call(this) || this;
                    return t.elementRef = n, t
                }
                return Object(a.b)(n, e), n.prototype.focus = function() {
                    this.elementRef.nativeElement.focus()
                }, n.prototype.getOffsetLeft = function() {
                    return this.elementRef.nativeElement.offsetLeft
                }, n.prototype.getOffsetWidth = function() {
                    return this.elementRef.nativeElement.offsetWidth
                }, n
            }(Object(i.G)(function() {})),
            _ = function(e) {
                function n(n, t, l, i) {
                    var a = e.call(this) || this;
                    return a._elementRef = n, a._changeDetectorRef = t, a._viewportRuler = l, a._dir = i, a._focusIndex = 0, a._scrollDistance = 0, a._selectedIndexChanged = !1, a._realignInkBar = s.a.EMPTY, a._showPaginationControls = !1, a._disableScrollAfter = !0, a._disableScrollBefore = !0, a._selectedIndex = 0, a.selectFocusedIndex = new o.EventEmitter, a.indexFocused = new o.EventEmitter, a
                }
                return Object(a.b)(n, e), Object.defineProperty(n.prototype, "selectedIndex", {
                    get: function() {
                        return this._selectedIndex
                    },
                    set: function(e) {
                        e = Object(u.d)(e), this._selectedIndexChanged = this._selectedIndex != e, this._selectedIndex = e, this._focusIndex = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngAfterContentChecked = function() {
                    this._tabLabelCount != this._labelWrappers.length && (this._updatePagination(), this._tabLabelCount = this._labelWrappers.length, this._changeDetectorRef.markForCheck()), this._selectedIndexChanged && (this._scrollToLabel(this._selectedIndex), this._checkScrollingControls(), this._alignInkBarToSelectedTab(), this._selectedIndexChanged = !1, this._changeDetectorRef.markForCheck()), this._scrollDistanceChanged && (this._updateTabScrollPosition(), this._scrollDistanceChanged = !1, this._changeDetectorRef.markForCheck())
                }, n.prototype._handleKeydown = function(e) {
                    switch (e.keyCode) {
                        case c.m:
                            this._focusNextTab();
                            break;
                        case c.i:
                            this._focusPreviousTab();
                            break;
                        case c.h:
                            this._focusFirstTab(), e.preventDefault();
                            break;
                        case c.e:
                            this._focusLastTab(), e.preventDefault();
                            break;
                        case c.f:
                        case c.n:
                            this.selectFocusedIndex.emit(this.focusIndex), e.preventDefault()
                    }
                }, n.prototype.ngAfterContentInit = function() {
                    var e = this,
                        n = this._dir ? this._dir.change : Object(p.a)(null),
                        t = this._viewportRuler.change(150),
                        l = function() {
                            e._updatePagination(), e._alignInkBarToSelectedTab()
                        };
                    "undefined" != typeof requestAnimationFrame ? requestAnimationFrame(l) : l(), this._realignInkBar = Object(d.a)(n, t).subscribe(l)
                }, n.prototype.ngOnDestroy = function() {
                    this._realignInkBar.unsubscribe()
                }, n.prototype._onContentChanges = function() {
                    this._updatePagination(), this._alignInkBarToSelectedTab(), this._changeDetectorRef.markForCheck()
                }, n.prototype._updatePagination = function() {
                    this._checkPaginationEnabled(), this._checkScrollingControls(), this._updateTabScrollPosition()
                }, Object.defineProperty(n.prototype, "focusIndex", {
                    get: function() {
                        return this._focusIndex
                    },
                    set: function(e) {
                        this._isValidIndex(e) && this._focusIndex != e && (this._focusIndex = e, this.indexFocused.emit(e), this._setTabFocus(e))
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype._isValidIndex = function(e) {
                    if (!this._labelWrappers) return !0;
                    var n = this._labelWrappers ? this._labelWrappers.toArray()[e] : null;
                    return !!n && !n.disabled
                }, n.prototype._setTabFocus = function(e) {
                    if (this._showPaginationControls && this._scrollToLabel(e), this._labelWrappers && this._labelWrappers.length) {
                        this._labelWrappers.toArray()[e].focus();
                        var n = this._tabListContainer.nativeElement,
                            t = this._getLayoutDirection();
                        n.scrollLeft = "ltr" == t ? 0 : n.scrollWidth - n.offsetWidth
                    }
                }, n.prototype._moveFocus = function(e) {
                    if (this._labelWrappers)
                        for (var n = this._labelWrappers.toArray(), t = this.focusIndex + e; t < n.length && t >= 0; t += e)
                            if (this._isValidIndex(t)) return void(this.focusIndex = t)
                }, n.prototype._focusNextTab = function() {
                    this._moveFocus("ltr" == this._getLayoutDirection() ? 1 : -1)
                }, n.prototype._focusPreviousTab = function() {
                    this._moveFocus("ltr" == this._getLayoutDirection() ? -1 : 1)
                }, n.prototype._focusFirstTab = function() {
                    for (var e = 0; e < this._labelWrappers.length; e++)
                        if (this._isValidIndex(e)) {
                            this.focusIndex = e;
                            break
                        }
                }, n.prototype._focusLastTab = function() {
                    for (var e = this._labelWrappers.length - 1; e > -1; e--)
                        if (this._isValidIndex(e)) {
                            this.focusIndex = e;
                            break
                        }
                }, n.prototype._getLayoutDirection = function() {
                    return this._dir && "rtl" === this._dir.value ? "rtl" : "ltr"
                }, n.prototype._updateTabScrollPosition = function() {
                    var e = this.scrollDistance,
                        n = "ltr" === this._getLayoutDirection() ? -e : e;
                    this._tabList.nativeElement.style.transform = "translate3d(" + n + "px, 0, 0)"
                }, Object.defineProperty(n.prototype, "scrollDistance", {
                    get: function() {
                        return this._scrollDistance
                    },
                    set: function(e) {
                        this._scrollDistance = Math.max(0, Math.min(this._getMaxScrollDistance(), e)), this._scrollDistanceChanged = !0, this._checkScrollingControls()
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype._scrollHeader = function(e) {
                    this.scrollDistance += ("before" == e ? -1 : 1) * this._tabListContainer.nativeElement.offsetWidth / 3
                }, n.prototype._scrollToLabel = function(e) {
                    var n = this._labelWrappers ? this._labelWrappers.toArray()[e] : null;
                    if (n) {
                        var t, l, o = this._tabListContainer.nativeElement.offsetWidth;
                        "ltr" == this._getLayoutDirection() ? l = (t = n.getOffsetLeft()) + n.getOffsetWidth() : t = (l = this._tabList.nativeElement.offsetWidth - n.getOffsetLeft()) - n.getOffsetWidth();
                        var i = this.scrollDistance,
                            a = this.scrollDistance + o;
                        t < i ? this.scrollDistance -= i - t + 60 : l > a && (this.scrollDistance += l - a + 60)
                    }
                }, n.prototype._checkPaginationEnabled = function() {
                    var e = this._tabList.nativeElement.scrollWidth > this._elementRef.nativeElement.offsetWidth;
                    e || (this.scrollDistance = 0), e !== this._showPaginationControls && this._changeDetectorRef.markForCheck(), this._showPaginationControls = e
                }, n.prototype._checkScrollingControls = function() {
                    this._disableScrollBefore = 0 == this.scrollDistance, this._disableScrollAfter = this.scrollDistance == this._getMaxScrollDistance(), this._changeDetectorRef.markForCheck()
                }, n.prototype._getMaxScrollDistance = function() {
                    return this._tabList.nativeElement.scrollWidth - this._tabListContainer.nativeElement.offsetWidth || 0
                }, n.prototype._alignInkBarToSelectedTab = function() {
                    var e = this._labelWrappers && this._labelWrappers.length ? this._labelWrappers.toArray()[this.selectedIndex].elementRef.nativeElement : null;
                    this._inkBar.alignToElement(e)
                }, n
            }(Object(i.F)(function() {})),
            k = function(e) {
                function n(n, t, l, o, i) {
                    var a = e.call(this, n) || this;
                    return a._dir = t, a._ngZone = l, a._changeDetectorRef = o, a._viewportRuler = i, a._onDestroy = new r.a, a._disableRipple = !1, a
                }
                return Object(a.b)(n, e), Object.defineProperty(n.prototype, "backgroundColor", {
                    get: function() {
                        return this._backgroundColor
                    },
                    set: function(e) {
                        var n = this._elementRef.nativeElement;
                        n.classList.remove("mat-background-" + this.backgroundColor), e && n.classList.add("mat-background-" + e), this._backgroundColor = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "disableRipple", {
                    get: function() {
                        return this._disableRipple
                    },
                    set: function(e) {
                        this._disableRipple = Object(u.c)(e), this._setLinkDisableRipple()
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.updateActiveLink = function(e) {
                    this._activeLinkChanged = this._activeLinkElement != e, this._activeLinkElement = e, this._activeLinkChanged && this._changeDetectorRef.markForCheck()
                }, n.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._ngZone.runOutsideAngular(function() {
                        var n = e._dir ? e._dir.change : Object(p.a)(null);
                        return Object(d.a)(n, e._viewportRuler.change(10)).pipe(Object(h.a)(e._onDestroy)).subscribe(function() {
                            return e._alignInkBar()
                        })
                    }), this._setLinkDisableRipple()
                }, n.prototype.ngAfterContentChecked = function() {
                    this._activeLinkChanged && (this._alignInkBar(), this._activeLinkChanged = !1)
                }, n.prototype.ngOnDestroy = function() {
                    this._onDestroy.next(), this._onDestroy.complete()
                }, n.prototype._alignInkBar = function() {
                    this._activeLinkElement && this._inkBar.alignToElement(this._activeLinkElement.nativeElement)
                }, n.prototype._setLinkDisableRipple = function() {
                    var e = this;
                    this._tabLinks && this._tabLinks.forEach(function(n) {
                        return n.disableRipple = e.disableRipple
                    })
                }, n
            }(Object(i.E)(function(e) {
                this._elementRef = e
            }, "primary")),
            C = function() {}
    },
    ZYB1: function(e, n, t) {
        "use strict";
        t.d(n, "e", function() {
            return y
        }), t.d(n, "c", function() {
            return b
        }), t.d(n, "a", function() {
            return f
        }), t.d(n, "d", function() {
            return m
        }), t.d(n, "b", function() {
            return v
        });
        var l = t("LMZF"),
            o = t("j5BN"),
            i = t("6Xbx"),
            a = t("8Xfy"),
            r = t("XEj9"),
            u = t("ka8K"),
            s = t("rT01"),
            d = t("fNvg"),
            c = t("2kLc"),
            p = t("qLnt"),
            h = t("TO51"),
            f = function(e) {
                function n(n) {
                    var t = e.call(this, n) || this;
                    return t._elementRef = n, t._hasFocus = !1, t._selected = !1, t._selectable = !0, t._removable = !0, t._onFocus = new h.a, t._onBlur = new h.a, t.selectionChange = new l.EventEmitter, t.destroyed = new l.EventEmitter, t.destroy = t.destroyed, t.removed = new l.EventEmitter, t.onRemove = t.removed, t
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "selected", {
                    get: function() {
                        return this._selected
                    },
                    set: function(e) {
                        this._selected = Object(r.c)(e), this.selectionChange.emit({
                            source: this,
                            isUserInput: !1,
                            selected: e
                        })
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "value", {
                    get: function() {
                        return void 0 != this._value ? this._value : this._elementRef.nativeElement.textContent
                    },
                    set: function(e) {
                        this._value = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "selectable", {
                    get: function() {
                        return this._selectable
                    },
                    set: function(e) {
                        this._selectable = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "removable", {
                    get: function() {
                        return this._removable
                    },
                    set: function(e) {
                        this._removable = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "ariaSelected", {
                    get: function() {
                        return this.selectable ? this.selected.toString() : null
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngOnDestroy = function() {
                    this.destroyed.emit({
                        chip: this
                    })
                }, n.prototype.select = function() {
                    this._selected = !0, this.selectionChange.emit({
                        source: this,
                        isUserInput: !1,
                        selected: !0
                    })
                }, n.prototype.deselect = function() {
                    this._selected = !1, this.selectionChange.emit({
                        source: this,
                        isUserInput: !1,
                        selected: !1
                    })
                }, n.prototype.selectViaInteraction = function() {
                    this._selected = !0, this.selectionChange.emit({
                        source: this,
                        isUserInput: !0,
                        selected: !0
                    })
                }, n.prototype.toggleSelected = function(e) {
                    return void 0 === e && (e = !1), this._selected = !this.selected, this.selectionChange.emit({
                        source: this,
                        isUserInput: e,
                        selected: this._selected
                    }), this.selected
                }, n.prototype.focus = function() {
                    this._elementRef.nativeElement.focus(), this._onFocus.next({
                        chip: this
                    })
                }, n.prototype.remove = function() {
                    this.removable && this.removed.emit({
                        chip: this
                    })
                }, n.prototype._handleClick = function(e) {
                    this.disabled || (e.preventDefault(), e.stopPropagation(), this.focus())
                }, n.prototype._handleKeydown = function(e) {
                    if (!this.disabled) switch (e.keyCode) {
                        case s.c:
                        case s.b:
                            this.remove(), e.preventDefault();
                            break;
                        case s.n:
                            this.selectable && this.toggleSelected(!0), e.preventDefault()
                    }
                }, n.prototype._blur = function() {
                    this._hasFocus = !1, this._onBlur.next({
                        chip: this
                    })
                }, n
            }(Object(o.E)(Object(o.G)(function(e) {
                this._elementRef = e
            }), "primary")),
            m = function() {
                function e(e) {
                    this._parentChip = e
                }
                return e.prototype._handleClick = function() {
                    this._parentChip.removable && this._parentChip.remove()
                }, e
            }(),
            g = 0,
            b = function(e) {
                function n(n, t, o, i, a, r, u) {
                    var s = e.call(this, r, i, a, u) || this;
                    return s._elementRef = n, s._changeDetectorRef = t, s._dir = o, s.ngControl = u, s.controlType = "mat-chip-list", s._lastDestroyedIndex = null, s._chipSet = new WeakMap, s._tabOutSubscription = p.a.EMPTY, s._uid = "mat-chip-list-" + g++, s._tabIndex = 0, s._userTabIndex = null, s._onTouched = function() {}, s._onChange = function() {}, s._multiple = !1, s._compareWith = function(e, n) {
                        return e === n
                    }, s._required = !1, s._disabled = !1, s.ariaOrientation = "horizontal", s._selectable = !0, s.change = new l.EventEmitter, s.valueChange = new l.EventEmitter, s.ngControl && (s.ngControl.valueAccessor = s), s
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "selected", {
                    get: function() {
                        return this.multiple ? this._selectionModel.selected : this._selectionModel.selected[0]
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "role", {
                    get: function() {
                        return this.empty ? null : "listbox"
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "multiple", {
                    get: function() {
                        return this._multiple
                    },
                    set: function(e) {
                        this._multiple = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "compareWith", {
                    get: function() {
                        return this._compareWith
                    },
                    set: function(e) {
                        this._compareWith = e, this._selectionModel && this._initializeSelection()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "value", {
                    get: function() {
                        return this._value
                    },
                    set: function(e) {
                        this.writeValue(e), this._value = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "id", {
                    get: function() {
                        return this._id || this._uid
                    },
                    set: function(e) {
                        this._id = e, this.stateChanges.next()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "required", {
                    get: function() {
                        return this._required
                    },
                    set: function(e) {
                        this._required = Object(r.c)(e), this.stateChanges.next()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "placeholder", {
                    get: function() {
                        return this._chipInput ? this._chipInput.placeholder : this._placeholder
                    },
                    set: function(e) {
                        this._placeholder = e, this.stateChanges.next()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "focused", {
                    get: function() {
                        return this.chips.some(function(e) {
                            return e._hasFocus
                        }) || this._chipInput && this._chipInput.focused
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "empty", {
                    get: function() {
                        return (!this._chipInput || this._chipInput.empty) && 0 === this.chips.length
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "shouldLabelFloat", {
                    get: function() {
                        return !this.empty || this.focused
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "disabled", {
                    get: function() {
                        return this.ngControl ? !!this.ngControl.disabled : this._disabled
                    },
                    set: function(e) {
                        this._disabled = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "selectable", {
                    get: function() {
                        return this._selectable
                    },
                    set: function(e) {
                        this._selectable = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "tabIndex", {
                    set: function(e) {
                        this._userTabIndex = e, this._tabIndex = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "chipSelectionChanges", {
                    get: function() {
                        return c.a.apply(void 0, this.chips.map(function(e) {
                            return e.selectionChange
                        }))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "chipFocusChanges", {
                    get: function() {
                        return c.a.apply(void 0, this.chips.map(function(e) {
                            return e._onFocus
                        }))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "chipBlurChanges", {
                    get: function() {
                        return c.a.apply(void 0, this.chips.map(function(e) {
                            return e._onBlur
                        }))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "chipRemoveChanges", {
                    get: function() {
                        return c.a.apply(void 0, this.chips.map(function(e) {
                            return e.destroy
                        }))
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._keyManager = new a.h(this.chips).withWrap().withVerticalOrientation().withHorizontalOrientation(this._dir ? this._dir.value : "ltr"), this._tabOutSubscription = this._keyManager.tabOut.subscribe(function() {
                        e._tabIndex = -1, setTimeout(function() {
                            return e._tabIndex = e._userTabIndex || 0
                        })
                    }), this._changeSubscription = this.chips.changes.pipe(Object(d.a)(null)).subscribe(function() {
                        e._resetChips(), e._initializeSelection(), e._updateTabIndex(), e._updateFocusForDestroyedChips()
                    })
                }, n.prototype.ngOnInit = function() {
                    this._selectionModel = new u.b(this.multiple, void 0, !1), this.stateChanges.next()
                }, n.prototype.ngDoCheck = function() {
                    this.ngControl && this.updateErrorState()
                }, n.prototype.ngOnDestroy = function() {
                    this._tabOutSubscription.unsubscribe(), this._changeSubscription && this._changeSubscription.unsubscribe(), this._dropSubscriptions(), this.stateChanges.complete()
                }, n.prototype.registerInput = function(e) {
                    this._chipInput = e
                }, n.prototype.setDescribedByIds = function(e) {
                    this._ariaDescribedby = e.join(" ")
                }, n.prototype.writeValue = function(e) {
                    this.chips && this._setSelectionByValue(e, !1)
                }, n.prototype.registerOnChange = function(e) {
                    this._onChange = e
                }, n.prototype.registerOnTouched = function(e) {
                    this._onTouched = e
                }, n.prototype.setDisabledState = function(e) {
                    this.disabled = e, this._elementRef.nativeElement.disabled = e, this.stateChanges.next()
                }, n.prototype.onContainerClick = function() {
                    this.focus()
                }, n.prototype.focus = function() {
                    this._chipInput && this._chipInput.focused || (this.chips.length > 0 ? (this._keyManager.setFirstItemActive(), this.stateChanges.next()) : (this._focusInput(), this.stateChanges.next()))
                }, n.prototype._focusInput = function() {
                    this._chipInput && this._chipInput.focus()
                }, n.prototype._keydown = function(e) {
                    var n = e.target;
                    e.keyCode === s.b && this._isInputEmpty(n) ? (this._keyManager.setLastItemActive(), e.preventDefault()) : n && n.classList.contains("mat-chip") && (this._keyManager.onKeydown(e), this.stateChanges.next())
                }, n.prototype._updateTabIndex = function() {
                    this._tabIndex = this._userTabIndex || (0 === this.chips.length ? -1 : 0)
                }, n.prototype._updateKeyManager = function(e) {
                    var n = this.chips.toArray().indexOf(e);
                    this._isValidIndex(n) && (e._hasFocus && (n < this.chips.length - 1 ? this._keyManager.setActiveItem(n) : n - 1 >= 0 && this._keyManager.setActiveItem(n - 1)), this._keyManager.activeItemIndex === n && (this._lastDestroyedIndex = n))
                }, n.prototype._updateFocusForDestroyedChips = function() {
                    var e = this.chips;
                    if (null != this._lastDestroyedIndex && e.length > 0) {
                        var n = Math.min(this._lastDestroyedIndex, e.length - 1);
                        this._keyManager.setActiveItem(n);
                        var t = this._keyManager.activeItem;
                        t && t.focus()
                    }
                    this._lastDestroyedIndex = null
                }, n.prototype._isValidIndex = function(e) {
                    return e >= 0 && e < this.chips.length
                }, n.prototype._isInputEmpty = function(e) {
                    return !(!e || "input" !== e.nodeName.toLowerCase() || e.value)
                }, n.prototype._setSelectionByValue = function(e, n) {
                    var t = this;
                    if (void 0 === n && (n = !0), this._clearSelection(), this.chips.forEach(function(e) {
                            return e.deselect()
                        }), Array.isArray(e)) e.forEach(function(e) {
                        return t._selectValue(e, n)
                    }), this._sortValues();
                    else {
                        var l = this._selectValue(e, n);
                        if (l) {
                            var o = this.chips.toArray().indexOf(l);
                            n ? this._keyManager.setActiveItem(o) : this._keyManager.updateActiveItemIndex(o)
                        }
                    }
                }, n.prototype._selectValue = function(e, n) {
                    var t = this;
                    void 0 === n && (n = !0);
                    var l = this.chips.find(function(n) {
                        return null != n.value && t._compareWith(n.value, e)
                    });
                    return l && (n ? l.selectViaInteraction() : l.select(), this._selectionModel.select(l)), l
                }, n.prototype._initializeSelection = function() {
                    var e = this;
                    Promise.resolve().then(function() {
                        (e.ngControl || e._value) && (e._setSelectionByValue(e.ngControl ? e.ngControl.value : e._value, !1), e.stateChanges.next())
                    })
                }, n.prototype._clearSelection = function(e) {
                    this._selectionModel.clear(), this.chips.forEach(function(n) {
                        n !== e && n.deselect()
                    }), this.stateChanges.next()
                }, n.prototype._sortValues = function() {
                    var e = this;
                    this._multiple && (this._selectionModel.clear(), this.chips.forEach(function(n) {
                        n.selected && e._selectionModel.select(n)
                    }), this.stateChanges.next())
                }, n.prototype._propagateChanges = function(e) {
                    var n;
                    n = Array.isArray(this.selected) ? this.selected.map(function(e) {
                        return e.value
                    }) : this.selected ? this.selected.value : e, this._value = n, this.change.emit(new function(e, n) {
                        this.source = e, this.value = n
                    }(this, n)), this.valueChange.emit(n), this._onChange(n), this._changeDetectorRef.markForCheck()
                }, n.prototype._blur = function() {
                    var e = this;
                    this.disabled || (this._chipInput ? setTimeout(function() {
                        e.focused || e._markAsTouched()
                    }) : this._markAsTouched())
                }, n.prototype._markAsTouched = function() {
                    this._onTouched(), this._changeDetectorRef.markForCheck(), this.stateChanges.next()
                }, n.prototype._resetChips = function() {
                    this._dropSubscriptions(), this._listenToChipsFocus(), this._listenToChipsSelection(), this._listenToChipsRemoved()
                }, n.prototype._dropSubscriptions = function() {
                    this._chipFocusSubscription && (this._chipFocusSubscription.unsubscribe(), this._chipFocusSubscription = null), this._chipBlurSubscription && (this._chipBlurSubscription.unsubscribe(), this._chipBlurSubscription = null), this._chipSelectionSubscription && (this._chipSelectionSubscription.unsubscribe(), this._chipSelectionSubscription = null)
                }, n.prototype._listenToChipsSelection = function() {
                    var e = this;
                    this._chipSelectionSubscription = this.chipSelectionChanges.subscribe(function(n) {
                        n.source.selected ? e._selectionModel.select(n.source) : e._selectionModel.deselect(n.source), e.multiple || e.chips.forEach(function(n) {
                            !e._selectionModel.isSelected(n) && n.selected && n.deselect()
                        }), n.isUserInput && e._propagateChanges()
                    })
                }, n.prototype._listenToChipsFocus = function() {
                    var e = this;
                    this._chipFocusSubscription = this.chipFocusChanges.subscribe(function(n) {
                        var t = e.chips.toArray().indexOf(n.chip);
                        e._isValidIndex(t) && e._keyManager.updateActiveItemIndex(t), e.stateChanges.next()
                    }), this._chipBlurSubscription = this.chipBlurChanges.subscribe(function() {
                        e._blur(), e.stateChanges.next()
                    })
                }, n.prototype._listenToChipsRemoved = function() {
                    var e = this;
                    this._chipRemoveSubscription = this.chipRemoveChanges.subscribe(function(n) {
                        e._updateKeyManager(n.chip)
                    })
                }, n
            }(Object(o.H)(function(e, n, t, l) {
                this._defaultErrorStateMatcher = e, this._parentForm = n, this._parentFormGroup = t, this.ngControl = l
            })),
            v = function() {
                function e(e) {
                    this._elementRef = e, this.focused = !1, this._addOnBlur = !1, this.separatorKeyCodes = [s.f], this.chipEnd = new l.EventEmitter, this.placeholder = "", this._inputElement = this._elementRef.nativeElement
                }
                return Object.defineProperty(e.prototype, "chipList", {
                    set: function(e) {
                        e && (this._chipList = e, this._chipList.registerInput(this))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "addOnBlur", {
                    get: function() {
                        return this._addOnBlur
                    },
                    set: function(e) {
                        this._addOnBlur = Object(r.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "empty", {
                    get: function() {
                        return !this._inputElement.value
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype._keydown = function(e) {
                    this._emitChipEnd(e)
                }, e.prototype._blur = function() {
                    this.addOnBlur && this._emitChipEnd(), this.focused = !1, this._chipList.focused || this._chipList._blur(), this._chipList.stateChanges.next()
                }, e.prototype._focus = function() {
                    this.focused = !0, this._chipList.stateChanges.next()
                }, e.prototype._emitChipEnd = function(e) {
                    !this._inputElement.value && e && this._chipList._keydown(e), (!e || this.separatorKeyCodes.indexOf(e.keyCode) > -1) && (this.chipEnd.emit({
                        input: this._inputElement,
                        value: this._inputElement.value
                    }), e && e.preventDefault())
                }, e.prototype._onInput = function() {
                    this._chipList.stateChanges.next()
                }, e.prototype.focus = function() {
                    this._inputElement.focus()
                }, e
            }(),
            y = function() {}
    },
    e0rv: function(e, n, t) {
        "use strict";
        t.d(n, "h", function() {
            return k
        }), t.d(n, "a", function() {
            return g
        }), t.d(n, "d", function() {
            return b
        }), t.d(n, "b", function() {
            return v
        }), t.d(n, "c", function() {
            return y
        }), t.d(n, "g", function() {
            return x
        }), t.d(n, "e", function() {
            return w
        }), t.d(n, "f", function() {
            return _
        });
        var l = t("LMZF"),
            o = t("6Xbx"),
            i = t("XEj9"),
            a = t("rT01"),
            r = t("2kLc"),
            u = t("LaOa"),
            s = t("pXwq"),
            d = t("fNvg"),
            c = t("5O0w"),
            p = t("Rx5t"),
            h = t("qqDE"),
            f = t("TO51");

        function m(e) {
            throw Error("A drawer was already declared for 'position=\"" + e + "\"'")
        }
        t("AP4T");
        var g = new l.InjectionToken("MAT_DRAWER_DEFAULT_AUTOSIZE"),
            b = function() {
                function e(e, n) {
                    this._changeDetectorRef = e, this._container = n, this._margins = {
                        left: null,
                        right: null
                    }
                }
                return e.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._container._contentMargins.subscribe(function(n) {
                        e._margins = n, e._changeDetectorRef.markForCheck()
                    })
                }, e
            }(),
            v = function() {
                function e(e, n, t, o, i) {
                    var a = this;
                    this._elementRef = e, this._focusTrapFactory = n, this._focusMonitor = t, this._platform = o, this._doc = i, this._elementFocusedBeforeDrawerWasOpened = null, this._enableAnimations = !1, this._position = "start", this._mode = "over", this._disableClose = !1, this._animationStarted = new l.EventEmitter, this._animationState = "void", this.openedChange = new l.EventEmitter(!0), this.onOpen = this._openedStream, this.onClose = this._closedStream, this.onPositionChanged = new l.EventEmitter, this.onAlignChanged = new l.EventEmitter, this._modeChanged = new f.a, this._opened = !1, this.openedChange.subscribe(function(e) {
                        e ? (a._doc && (a._elementFocusedBeforeDrawerWasOpened = a._doc.activeElement), a._isFocusTrapEnabled && a._focusTrap && a._trapFocus()) : a._restoreFocus()
                    })
                }
                return Object.defineProperty(e.prototype, "position", {
                    get: function() {
                        return this._position
                    },
                    set: function(e) {
                        (e = "end" === e ? "end" : "start") != this._position && (this._position = e, this.onAlignChanged.emit(), this.onPositionChanged.emit())
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "align", {
                    get: function() {
                        return this.position
                    },
                    set: function(e) {
                        this.position = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "mode", {
                    get: function() {
                        return this._mode
                    },
                    set: function(e) {
                        this._mode = e, this._modeChanged.next()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "disableClose", {
                    get: function() {
                        return this._disableClose
                    },
                    set: function(e) {
                        this._disableClose = Object(i.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "_openedStream", {
                    get: function() {
                        return this.openedChange.pipe(Object(u.a)(function(e) {
                            return e
                        }), Object(h.a)(function() {}))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "openedStart", {
                    get: function() {
                        return this._animationStarted.pipe(Object(u.a)(function(e) {
                            return e.fromState !== e.toState && 0 === e.toState.indexOf("open")
                        }), Object(h.a)(function() {}))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "_closedStream", {
                    get: function() {
                        return this.openedChange.pipe(Object(u.a)(function(e) {
                            return !e
                        }), Object(h.a)(function() {}))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "closedStart", {
                    get: function() {
                        return this._animationStarted.pipe(Object(u.a)(function(e) {
                            return e.fromState !== e.toState && "void" === e.toState
                        }), Object(h.a)(function() {}))
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "_isFocusTrapEnabled", {
                    get: function() {
                        return this.opened && "side" !== this.mode
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype._trapFocus = function() {
                    var e = this;
                    this._focusTrap.focusInitialElementWhenReady().then(function(n) {
                        n || "function" != typeof e._elementRef.nativeElement.focus || e._elementRef.nativeElement.focus()
                    })
                }, e.prototype._restoreFocus = function() {
                    var e = this._doc && this._doc.activeElement;
                    e && this._elementRef.nativeElement.contains(e) && (this._elementFocusedBeforeDrawerWasOpened instanceof HTMLElement ? this._focusMonitor.focusVia(this._elementFocusedBeforeDrawerWasOpened, this._openedVia) : this._elementRef.nativeElement.blur()), this._elementFocusedBeforeDrawerWasOpened = null, this._openedVia = null
                }, e.prototype.ngAfterContentInit = function() {
                    this._focusTrap = this._focusTrapFactory.create(this._elementRef.nativeElement), this._focusTrap.enabled = this._isFocusTrapEnabled
                }, e.prototype.ngAfterContentChecked = function() {
                    this._platform.isBrowser && (this._enableAnimations = !0)
                }, e.prototype.ngOnDestroy = function() {
                    this._focusTrap && this._focusTrap.destroy()
                }, Object.defineProperty(e.prototype, "opened", {
                    get: function() {
                        return this._opened
                    },
                    set: function(e) {
                        this.toggle(Object(i.c)(e))
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.open = function(e) {
                    return this.toggle(!0, e)
                }, e.prototype.close = function() {
                    return this.toggle(!1)
                }, e.prototype.toggle = function(e, n) {
                    var t = this;
                    return void 0 === e && (e = !this.opened), void 0 === n && (n = "program"), this._opened = e, e ? (this._animationState = this._enableAnimations ? "open" : "open-instant", this._openedVia = n) : (this._animationState = "void", this._restoreFocus()), this._focusTrap && (this._focusTrap.enabled = this._isFocusTrapEnabled), new Promise(function(e) {
                        t.openedChange.pipe(Object(s.a)(1)).subscribe(function(n) {
                            e(new function(e, n) {
                                this.type = e, this.animationFinished = n
                            }(n ? "open" : "close", !0))
                        })
                    })
                }, e.prototype.handleKeydown = function(e) {
                    e.keyCode !== a.g || this.disableClose || (this.close(), e.stopPropagation())
                }, e.prototype._onAnimationStart = function(e) {
                    this._animationStarted.emit(e)
                }, e.prototype._onAnimationEnd = function(e) {
                    var n = e.fromState,
                        t = e.toState;
                    (0 === t.indexOf("open") && "void" === n || "void" === t && 0 === n.indexOf("open")) && this.openedChange.emit(this._opened)
                }, Object.defineProperty(e.prototype, "_width", {
                    get: function() {
                        return this._elementRef.nativeElement && this._elementRef.nativeElement.offsetWidth || 0
                    },
                    enumerable: !0,
                    configurable: !0
                }), e
            }(),
            y = function() {
                function e(e, n, t, o, i) {
                    void 0 === i && (i = !1);
                    var a = this;
                    this._dir = e, this._element = n, this._ngZone = t, this._changeDetectorRef = o, this.backdropClick = new l.EventEmitter, this._destroyed = new f.a, this._doCheckSubject = new f.a, this._contentMargins = new f.a, e && e.change.pipe(Object(c.a)(this._destroyed)).subscribe(function() {
                        a._validateDrawers(), a._updateContentMargins()
                    }), this._autosize = i
                }
                return Object.defineProperty(e.prototype, "start", {
                    get: function() {
                        return this._start
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "end", {
                    get: function() {
                        return this._end
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(e.prototype, "autosize", {
                    get: function() {
                        return this._autosize
                    },
                    set: function(e) {
                        this._autosize = Object(i.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), e.prototype.ngAfterContentInit = function() {
                    var e = this;
                    this._drawers.changes.pipe(Object(d.a)(null)).subscribe(function() {
                        e._validateDrawers(), e._drawers.forEach(function(n) {
                            e._watchDrawerToggle(n), e._watchDrawerPosition(n), e._watchDrawerMode(n)
                        }), (!e._drawers.length || e._isDrawerOpen(e._start) || e._isDrawerOpen(e._end)) && e._updateContentMargins(), e._changeDetectorRef.markForCheck()
                    }), this._doCheckSubject.pipe(Object(p.a)(10), Object(c.a)(this._destroyed)).subscribe(function() {
                        return e._updateContentMargins()
                    })
                }, e.prototype.ngOnDestroy = function() {
                    this._doCheckSubject.complete(), this._destroyed.next(), this._destroyed.complete()
                }, e.prototype.open = function() {
                    this._drawers.forEach(function(e) {
                        return e.open()
                    })
                }, e.prototype.close = function() {
                    this._drawers.forEach(function(e) {
                        return e.close()
                    })
                }, e.prototype.ngDoCheck = function() {
                    var e = this;
                    this._autosize && this._isPushed() && this._ngZone.runOutsideAngular(function() {
                        return e._doCheckSubject.next()
                    })
                }, e.prototype._watchDrawerToggle = function(e) {
                    var n = this;
                    e._animationStarted.pipe(Object(c.a)(this._drawers.changes), Object(u.a)(function(e) {
                        return e.fromState !== e.toState
                    })).subscribe(function(e) {
                        "open-instant" !== e.toState && n._element.nativeElement.classList.add("mat-drawer-transition"), n._updateContentMargins(), n._changeDetectorRef.markForCheck()
                    }), "side" !== e.mode && e.openedChange.pipe(Object(c.a)(this._drawers.changes)).subscribe(function() {
                        return n._setContainerClass(e.opened)
                    })
                }, e.prototype._watchDrawerPosition = function(e) {
                    var n = this;
                    e && e.onPositionChanged.pipe(Object(c.a)(this._drawers.changes)).subscribe(function() {
                        n._ngZone.onMicrotaskEmpty.asObservable().pipe(Object(s.a)(1)).subscribe(function() {
                            n._validateDrawers()
                        })
                    })
                }, e.prototype._watchDrawerMode = function(e) {
                    var n = this;
                    e && e._modeChanged.pipe(Object(c.a)(Object(r.a)(this._drawers.changes, this._destroyed))).subscribe(function() {
                        n._updateContentMargins(), n._changeDetectorRef.markForCheck()
                    })
                }, e.prototype._setContainerClass = function(e) {
                    e ? this._element.nativeElement.classList.add("mat-drawer-opened") : this._element.nativeElement.classList.remove("mat-drawer-opened")
                }, e.prototype._validateDrawers = function() {
                    var e = this;
                    this._start = this._end = null, this._drawers.forEach(function(n) {
                        "end" == n.position ? (null != e._end && m("end"), e._end = n) : (null != e._start && m("start"), e._start = n)
                    }), this._right = this._left = null, this._dir && "ltr" != this._dir.value ? (this._left = this._end, this._right = this._start) : (this._left = this._start, this._right = this._end)
                }, e.prototype._isPushed = function() {
                    return this._isDrawerOpen(this._start) && "over" != this._start.mode || this._isDrawerOpen(this._end) && "over" != this._end.mode
                }, e.prototype._onBackdropClicked = function() {
                    this.backdropClick.emit(), this._closeModalDrawer()
                }, e.prototype._closeModalDrawer = function() {
                    [this._start, this._end].filter(function(e) {
                        return e && !e.disableClose && "side" !== e.mode
                    }).forEach(function(e) {
                        return e.close()
                    })
                }, e.prototype._isShowingBackdrop = function() {
                    return this._isDrawerOpen(this._start) && "side" != this._start.mode || this._isDrawerOpen(this._end) && "side" != this._end.mode
                }, e.prototype._isDrawerOpen = function(e) {
                    return null != e && e.opened
                }, e.prototype._updateContentMargins = function() {
                    var e = this,
                        n = 0,
                        t = 0;
                    if (this._left && this._left.opened && ("side" == this._left.mode ? n += this._left._width : "push" == this._left.mode && (n += l = this._left._width, t -= l)), this._right && this._right.opened)
                        if ("side" == this._right.mode) t += this._right._width;
                        else if ("push" == this._right.mode) {
                        var l;
                        t += l = this._right._width, n -= l
                    }
                    this._ngZone.run(function() {
                        return e._contentMargins.next({
                            left: n,
                            right: t
                        })
                    })
                }, e
            }(),
            x = function(e) {
                function n(n, t) {
                    return e.call(this, n, t) || this
                }
                return Object(o.b)(n, e), n
            }(b),
            w = function(e) {
                function n() {
                    var n = null !== e && e.apply(this, arguments) || this;
                    return n._fixedInViewport = !1, n._fixedTopGap = 0, n._fixedBottomGap = 0, n
                }
                return Object(o.b)(n, e), Object.defineProperty(n.prototype, "fixedInViewport", {
                    get: function() {
                        return this._fixedInViewport
                    },
                    set: function(e) {
                        this._fixedInViewport = Object(i.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "fixedTopGap", {
                    get: function() {
                        return this._fixedTopGap
                    },
                    set: function(e) {
                        this._fixedTopGap = Object(i.d)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "fixedBottomGap", {
                    get: function() {
                        return this._fixedBottomGap
                    },
                    set: function(e) {
                        this._fixedBottomGap = Object(i.d)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), n
            }(v),
            _ = function(e) {
                function n() {
                    return null !== e && e.apply(this, arguments) || this
                }
                return Object(o.b)(n, e), n
            }(y),
            k = function() {}
    },
    kMVV: function(e, n, t) {
        "use strict";
        t.d(n, "b", function() {
            return d
        }), t.d(n, "a", function() {
            return s
        });
        var l = t("LMZF"),
            o = t("j5BN"),
            i = t("6Xbx"),
            a = t("XEj9"),
            r = t("rT01"),
            u = t("qLnt"),
            s = function(e) {
                function n(n, t, o, i, a) {
                    var r = e.call(this, n) || this;
                    return r._focusMonitor = t, r._changeDetectorRef = o, r._dir = i, r._invert = !1, r._max = 100, r._min = 0, r._step = 1, r._thumbLabel = !1, r._tickInterval = 0, r._value = null, r._vertical = !1, r.change = new l.EventEmitter, r.input = new l.EventEmitter, r.onTouched = function() {}, r._percent = 0, r._isSliding = !1, r._isActive = !1, r._tickIntervalPercent = 0, r._sliderDimensions = null, r._controlValueAccessorChangeFn = function() {}, r._dirChangeSubscription = u.a.EMPTY, r.tabIndex = parseInt(a) || 0, r
                }
                return Object(i.b)(n, e), Object.defineProperty(n.prototype, "invert", {
                    get: function() {
                        return this._invert
                    },
                    set: function(e) {
                        this._invert = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "max", {
                    get: function() {
                        return this._max
                    },
                    set: function(e) {
                        this._max = Object(a.d)(e, this._max), this._percent = this._calculatePercentage(this._value), this._changeDetectorRef.markForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "min", {
                    get: function() {
                        return this._min
                    },
                    set: function(e) {
                        this._min = Object(a.d)(e, this._min), null === this._value && (this.value = this._min), this._percent = this._calculatePercentage(this._value), this._changeDetectorRef.markForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "step", {
                    get: function() {
                        return this._step
                    },
                    set: function(e) {
                        this._step = Object(a.d)(e, this._step), this._step % 1 != 0 && (this._roundLabelTo = this._step.toString().split(".").pop().length), this._changeDetectorRef.markForCheck()
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "thumbLabel", {
                    get: function() {
                        return this._thumbLabel
                    },
                    set: function(e) {
                        this._thumbLabel = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_thumbLabelDeprecated", {
                    get: function() {
                        return this._thumbLabel
                    },
                    set: function(e) {
                        this._thumbLabel = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "tickInterval", {
                    get: function() {
                        return this._tickInterval
                    },
                    set: function(e) {
                        this._tickInterval = "auto" === e ? "auto" : "number" == typeof e || "string" == typeof e ? Object(a.d)(e, this._tickInterval) : 0
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_tickIntervalDeprecated", {
                    get: function() {
                        return this.tickInterval
                    },
                    set: function(e) {
                        this.tickInterval = e
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "value", {
                    get: function() {
                        return null === this._value && (this.value = this._min), this._value
                    },
                    set: function(e) {
                        e !== this._value && (this._value = Object(a.d)(e), this._percent = this._calculatePercentage(this._value), this._changeDetectorRef.markForCheck())
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "vertical", {
                    get: function() {
                        return this._vertical
                    },
                    set: function(e) {
                        this._vertical = Object(a.c)(e)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "displayValue", {
                    get: function() {
                        return this._roundLabelTo && this.value && this.value % 1 != 0 ? this.value.toFixed(this._roundLabelTo) : this.value || 0
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.focus = function() {
                    this._focusHostElement()
                }, n.prototype.blur = function() {
                    this._blurHostElement()
                }, Object.defineProperty(n.prototype, "percent", {
                    get: function() {
                        return this._clamp(this._percent)
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_invertAxis", {
                    get: function() {
                        return this.vertical ? !this.invert : this.invert
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_isMinValue", {
                    get: function() {
                        return 0 === this.percent
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_thumbGap", {
                    get: function() {
                        return this.disabled ? 7 : this._isMinValue && !this.thumbLabel ? this._isActive ? 10 : 7 : 0
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_trackBackgroundStyles", {
                    get: function() {
                        var e = this.vertical ? "Y" : "X";
                        return {
                            transform: "translate" + e + "(" + (this._invertMouseCoords ? "-" : "") + this._thumbGap + "px) scale" + e + "(" + (1 - this.percent) + ")"
                        }
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_trackFillStyles", {
                    get: function() {
                        var e = this.vertical ? "Y" : "X";
                        return {
                            transform: "translate" + e + "(" + (this._invertMouseCoords ? "" : "-") + this._thumbGap + "px) scale" + e + "(" + this.percent + ")"
                        }
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_ticksContainerStyles", {
                    get: function() {
                        return {
                            transform: "translate" + (this.vertical ? "Y" : "X") + "(" + (this.vertical || "rtl" != this._direction ? "-" : "") + this._tickIntervalPercent / 2 * 100 + "%)"
                        }
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_ticksStyles", {
                    get: function() {
                        var e = 100 * this._tickIntervalPercent,
                            n = {
                                backgroundSize: this.vertical ? "2px " + e + "%" : e + "% 2px",
                                transform: "translateZ(0) translate" + (this.vertical ? "Y" : "X") + "(" + (this.vertical || "rtl" != this._direction ? "" : "-") + e / 2 + "%)" + (this.vertical || "rtl" != this._direction ? "" : " rotate(180deg)")
                            };
                        return this._isMinValue && this._thumbGap && (n["padding" + (this.vertical ? this._invertAxis ? "Bottom" : "Top" : this._invertAxis ? "Right" : "Left")] = this._thumbGap + "px"), n
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_thumbContainerStyles", {
                    get: function() {
                        return {
                            transform: "translate" + (this.vertical ? "Y" : "X") + "(-" + 100 * (("rtl" != this._direction || this.vertical ? this._invertAxis : !this._invertAxis) ? this.percent : 1 - this.percent) + "%)"
                        }
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_invertMouseCoords", {
                    get: function() {
                        return "rtl" != this._direction || this.vertical ? this._invertAxis : !this._invertAxis
                    },
                    enumerable: !0,
                    configurable: !0
                }), Object.defineProperty(n.prototype, "_direction", {
                    get: function() {
                        return this._dir && "rtl" == this._dir.value ? "rtl" : "ltr"
                    },
                    enumerable: !0,
                    configurable: !0
                }), n.prototype.ngOnInit = function() {
                    var e = this;
                    this._focusMonitor.monitor(this._elementRef.nativeElement, !0).subscribe(function(n) {
                        e._isActive = !!n && "keyboard" !== n, e._changeDetectorRef.detectChanges()
                    }), this._dir && (this._dirChangeSubscription = this._dir.change.subscribe(function() {
                        e._changeDetectorRef.markForCheck()
                    }))
                }, n.prototype.ngOnDestroy = function() {
                    this._focusMonitor.stopMonitoring(this._elementRef.nativeElement), this._dirChangeSubscription.unsubscribe()
                }, n.prototype._onMouseenter = function() {
                    this.disabled || (this._sliderDimensions = this._getSliderDimensions(), this._updateTickIntervalPercent())
                }, n.prototype._onClick = function(e) {
                    if (!this.disabled) {
                        var n = this.value;
                        this._isSliding = !1, this._focusHostElement(), this._updateValueFromPosition({
                            x: e.clientX,
                            y: e.clientY
                        }), n != this.value && (this._emitInputEvent(), this._emitChangeEvent())
                    }
                }, n.prototype._onSlide = function(e) {
                    if (!this.disabled) {
                        this._isSliding || this._onSlideStart(null), e.preventDefault();
                        var n = this.value;
                        this._updateValueFromPosition({
                            x: e.center.x,
                            y: e.center.y
                        }), n != this.value && this._emitInputEvent()
                    }
                }, n.prototype._onSlideStart = function(e) {
                    this.disabled || this._isSliding || (this._onMouseenter(), this._isSliding = !0, this._focusHostElement(), this._valueOnSlideStart = this.value, e && (this._updateValueFromPosition({
                        x: e.center.x,
                        y: e.center.y
                    }), e.preventDefault()))
                }, n.prototype._onSlideEnd = function() {
                    this._isSliding = !1, this._valueOnSlideStart == this.value || this.disabled || this._emitChangeEvent(), this._valueOnSlideStart = null
                }, n.prototype._onFocus = function() {
                    this._sliderDimensions = this._getSliderDimensions(), this._updateTickIntervalPercent()
                }, n.prototype._onBlur = function() {
                    this.onTouched()
                }, n.prototype._onKeydown = function(e) {
                    if (!this.disabled) {
                        var n = this.value;
                        switch (e.keyCode) {
                            case r.l:
                                this._increment(10);
                                break;
                            case r.k:
                                this._increment(-10);
                                break;
                            case r.e:
                                this.value = this.max;
                                break;
                            case r.h:
                                this.value = this.min;
                                break;
                            case r.i:
                                this._increment("rtl" == this._direction ? 1 : -1);
                                break;
                            case r.p:
                                this._increment(1);
                                break;
                            case r.m:
                                this._increment("rtl" == this._direction ? -1 : 1);
                                break;
                            case r.d:
                                this._increment(-1);
                                break;
                            default:
                                return
                        }
                        n != this.value && (this._emitInputEvent(), this._emitChangeEvent()), this._isSliding = !0, e.preventDefault()
                    }
                }, n.prototype._onKeyup = function() {
                    this._isSliding = !1
                }, n.prototype._increment = function(e) {
                    this.value = this._clamp((this.value || 0) + this.step * e, this.min, this.max)
                }, n.prototype._updateValueFromPosition = function(e) {
                    if (this._sliderDimensions) {
                        var n = this._clamp(((this.vertical ? e.y : e.x) - (this.vertical ? this._sliderDimensions.top : this._sliderDimensions.left)) / (this.vertical ? this._sliderDimensions.height : this._sliderDimensions.width));
                        this._invertMouseCoords && (n = 1 - n);
                        var t = this._calculateValue(n),
                            l = Math.round((t - this.min) / this.step) * this.step + this.min;
                        this.value = this._clamp(l, this.min, this.max)
                    }
                }, n.prototype._emitChangeEvent = function() {
                    this._controlValueAccessorChangeFn(this.value), this.change.emit(this._createChangeEvent())
                }, n.prototype._emitInputEvent = function() {
                    this.input.emit(this._createChangeEvent())
                }, n.prototype._updateTickIntervalPercent = function() {
                    if (this.tickInterval && this._sliderDimensions)
                        if ("auto" == this.tickInterval) {
                            var e = this.vertical ? this._sliderDimensions.height : this._sliderDimensions.width,
                                n = Math.ceil(30 / (e * this.step / (this.max - this.min)));
                            this._tickIntervalPercent = n * this.step / e
                        } else this._tickIntervalPercent = this.tickInterval * this.step / (this.max - this.min)
                }, n.prototype._createChangeEvent = function(e) {
                    void 0 === e && (e = this.value);
                    var n = new function() {};
                    return n.source = this, n.value = e, n
                }, n.prototype._calculatePercentage = function(e) {
                    return ((e || 0) - this.min) / (this.max - this.min)
                }, n.prototype._calculateValue = function(e) {
                    return this.min + e * (this.max - this.min)
                }, n.prototype._clamp = function(e, n, t) {
                    return void 0 === n && (n = 0), void 0 === t && (t = 1), Math.max(n, Math.min(e, t))
                }, n.prototype._getSliderDimensions = function() {
                    return this._sliderWrapper ? this._sliderWrapper.nativeElement.getBoundingClientRect() : null
                }, n.prototype._focusHostElement = function() {
                    this._elementRef.nativeElement.focus()
                }, n.prototype._blurHostElement = function() {
                    this._elementRef.nativeElement.blur()
                }, n.prototype.writeValue = function(e) {
                    this.value = e
                }, n.prototype.registerOnChange = function(e) {
                    this._controlValueAccessorChangeFn = e
                }, n.prototype.registerOnTouched = function(e) {
                    this.onTouched = e
                }, n.prototype.setDisabledState = function(e) {
                    this.disabled = e
                }, n
            }(Object(o.I)(Object(o.E)(Object(o.G)(function(e) {
                this._elementRef = e
            }), "accent"))),
            d = function() {}
    },
    kkSj: function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return o
        }), n.b = function(e) {
            return l["\u0275vid"](2, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "div", [
                ["class", "mat-chip-list-wrapper"]
            ], null, null, null, null, null)), l["\u0275ncd"](null, 0)], null, null)
        };
        var l = t("LMZF"),
            o = l["\u0275crt"]({
                encapsulation: 2,
                styles: [".mat-chip-list-wrapper{display:flex;flex-direction:row;flex-wrap:wrap;align-items:baseline}.mat-chip:not(.mat-basic-chip){transition:box-shadow 280ms cubic-bezier(.4,0,.2,1);display:inline-flex;padding:7px 12px;border-radius:24px;align-items:center;cursor:default}.mat-chip:not(.mat-basic-chip)+.mat-chip:not(.mat-basic-chip){margin:0 0 0 8px}[dir=rtl] .mat-chip:not(.mat-basic-chip)+.mat-chip:not(.mat-basic-chip){margin:0 8px 0 0}.mat-form-field-prefix .mat-chip:not(.mat-basic-chip):last-child{margin-right:8px}[dir=rtl] .mat-form-field-prefix .mat-chip:not(.mat-basic-chip):last-child{margin-left:8px}.mat-chip:not(.mat-basic-chip) .mat-chip-remove.mat-icon{width:1em;height:1em}.mat-chip:not(.mat-basic-chip):focus{box-shadow:0 3px 3px -2px rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 1px 8px 0 rgba(0,0,0,.12);outline:0}@media screen and (-ms-high-contrast:active){.mat-chip:not(.mat-basic-chip){outline:solid 1px}}.mat-chip-list-stacked .mat-chip-list-wrapper{display:block}.mat-chip-list-stacked .mat-chip-list-wrapper .mat-chip:not(.mat-basic-chip){display:block;margin:0;margin-bottom:8px}[dir=rtl] .mat-chip-list-stacked .mat-chip-list-wrapper .mat-chip:not(.mat-basic-chip){margin:0;margin-bottom:8px}.mat-chip-list-stacked .mat-chip-list-wrapper .mat-chip:not(.mat-basic-chip):last-child,[dir=rtl] .mat-chip-list-stacked .mat-chip-list-wrapper .mat-chip:not(.mat-basic-chip):last-child{margin-bottom:0}.mat-form-field-prefix .mat-chip-list-wrapper{margin-bottom:8px}.mat-chip-remove{margin-right:-4px;margin-left:6px;cursor:pointer}[dir=rtl] .mat-chip-remove{margin-right:6px;margin-left:-4px}input.mat-chip-input{width:150px;margin:3px;flex:1 0 150px}"],
                data: {}
            })
    },
    vneY: function(e, n, t) {
        "use strict";
        t.d(n, "a", function() {
            return a
        }), n.b = function(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](402653184, 1, {
                _ripple: 0
            }), l["\u0275qud"](402653184, 2, {
                _inputElement: 0
            }), (e()(), l["\u0275eld"](2, 0, [
                ["label", 1]
            ], null, 11, "label", [
                ["class", "mat-radio-label"]
            ], [
                [1, "for", 0]
            ], null, null, null, null)), (e()(), l["\u0275eld"](3, 0, null, null, 5, "div", [
                ["class", "mat-radio-container"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](4, 0, null, null, 0, "div", [
                ["class", "mat-radio-outer-circle"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](5, 0, null, null, 0, "div", [
                ["class", "mat-radio-inner-circle"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](6, 0, null, null, 2, "div", [
                ["class", "mat-radio-ripple mat-ripple"],
                ["mat-ripple", ""]
            ], [
                [2, "mat-ripple-unbounded", null]
            ], null, null, null, null)), l["\u0275did"](7, 212992, [
                [1, 4]
            ], 0, i.x, [l.ElementRef, l.NgZone, o.a, [2, i.m]], {
                centered: [0, "centered"],
                radius: [1, "radius"],
                animation: [2, "animation"],
                disabled: [3, "disabled"],
                trigger: [4, "trigger"]
            }, null), l["\u0275pod"](8, {
                enterDuration: 0
            }), (e()(), l["\u0275eld"](9, 0, [
                [2, 0],
                ["input", 1]
            ], null, 0, "input", [
                ["class", "mat-radio-input cdk-visually-hidden"],
                ["type", "radio"]
            ], [
                [8, "id", 0],
                [8, "checked", 0],
                [8, "disabled", 0],
                [8, "tabIndex", 0],
                [1, "name", 0],
                [8, "required", 0],
                [1, "aria-label", 0],
                [1, "aria-labelledby", 0],
                [1, "aria-describedby", 0]
            ], [
                [null, "change"],
                [null, "click"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "change" === n && (l = !1 !== o._onInputChange(t) && l), "click" === n && (l = !1 !== o._onInputClick(t) && l), l
            }, null, null)), (e()(), l["\u0275eld"](10, 0, null, null, 3, "div", [
                ["class", "mat-radio-label-content"]
            ], [
                [2, "mat-radio-label-before", null]
            ], null, null, null, null)), (e()(), l["\u0275eld"](11, 0, null, null, 1, "span", [
                ["style", "display:none"]
            ], null, null, null, null, null)), (e()(), l["\u0275ted"](-1, null, ["\xa0"])), l["\u0275ncd"](null, 0)], function(e, n) {
                var t = n.component;
                e(n, 7, 0, !0, 23, e(n, 8, 0, 150), t._isRippleDisabled(), l["\u0275nov"](n, 2))
            }, function(e, n) {
                var t = n.component;
                e(n, 2, 0, t.inputId), e(n, 6, 0, l["\u0275nov"](n, 7).unbounded), e(n, 9, 0, t.inputId, t.checked, t.disabled, t.tabIndex, t.name, t.required, t.ariaLabel, t.ariaLabelledby, t.ariaDescribedby), e(n, 10, 0, "before" == t.labelPosition)
            })
        };
        var l = t("LMZF"),
            o = t("V8+5"),
            i = t("j5BN"),
            a = l["\u0275crt"]({
                encapsulation: 2,
                styles: [".mat-radio-button{display:inline-block}.mat-radio-label{cursor:pointer;display:inline-flex;align-items:center;white-space:nowrap;vertical-align:middle}.mat-radio-container{box-sizing:border-box;display:inline-block;position:relative;width:20px;height:20px;flex-shrink:0}.mat-radio-outer-circle{box-sizing:border-box;height:20px;left:0;position:absolute;top:0;transition:border-color ease 280ms;width:20px;border-width:2px;border-style:solid;border-radius:50%}.mat-radio-inner-circle{border-radius:50%;box-sizing:border-box;height:20px;left:0;position:absolute;top:0;transition:transform ease 280ms,background-color ease 280ms;width:20px;transform:scale(.001)}.mat-radio-checked .mat-radio-inner-circle{transform:scale(.5)}.mat-radio-label-content{display:inline-block;order:0;line-height:inherit;padding-left:8px;padding-right:0}[dir=rtl] .mat-radio-label-content{padding-right:8px;padding-left:0}.mat-radio-label-content.mat-radio-label-before{order:-1;padding-left:0;padding-right:8px}[dir=rtl] .mat-radio-label-content.mat-radio-label-before{padding-right:0;padding-left:8px}.mat-radio-disabled,.mat-radio-disabled .mat-radio-label{cursor:default}.mat-radio-ripple{position:absolute;left:calc(50% - 25px);top:calc(50% - 25px);height:50px;width:50px;z-index:1;pointer-events:none}"],
                data: {}
            })
    },
    "wu+X": function(e, n, t) {
        "use strict";
        t.d(n, "b", function() {
            return p
        }), n.c = function(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](402653184, 1, {
                _tabBodyWrapper: 0
            }), (e()(), l["\u0275eld"](1, 0, null, null, 4, "mat-tab-header", [
                ["class", "mat-tab-header"]
            ], [
                [2, "mat-tab-header-pagination-controls-enabled", null],
                [2, "mat-tab-header-rtl", null]
            ], [
                [null, "indexFocused"],
                [null, "selectFocusedIndex"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "indexFocused" === n && (l = !1 !== o._focusChanged(t) && l), "selectFocusedIndex" === n && (l = !1 !== (o.selectedIndex = t) && l), l
            }, _, w)), l["\u0275did"](2, 3325952, [
                ["tabHeader", 4]
            ], 1, o.f, [l.ElementRef, l.ChangeDetectorRef, s.g, [2, a.c]], {
                disableRipple: [0, "disableRipple"],
                selectedIndex: [1, "selectedIndex"]
            }, {
                selectFocusedIndex: "selectFocusedIndex",
                indexFocused: "indexFocused"
            }), l["\u0275qud"](603979776, 2, {
                _labelWrappers: 1
            }), (e()(), l["\u0275and"](16777216, null, 0, 1, null, g)), l["\u0275did"](5, 802816, null, 0, i.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null), (e()(), l["\u0275eld"](6, 0, [
                [1, 0],
                ["tabBodyWrapper", 1]
            ], null, 2, "div", [
                ["class", "mat-tab-body-wrapper"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, b)), l["\u0275did"](8, 802816, null, 0, i.NgForOf, [l.ViewContainerRef, l.TemplateRef, l.IterableDiffers], {
                ngForOf: [0, "ngForOf"]
            }, null)], function(e, n) {
                var t = n.component;
                e(n, 2, 0, t.disableRipple, t.selectedIndex), e(n, 5, 0, t._tabs), e(n, 8, 0, t._tabs)
            }, function(e, n) {
                e(n, 1, 0, l["\u0275nov"](n, 2)._showPaginationControls, "rtl" == l["\u0275nov"](n, 2)._getLayoutDirection())
            })
        }, t.d(n, "a", function() {
            return k
        }), n.d = function(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](402653184, 1, {
                _content: 0
            }), (e()(), l["\u0275and"](0, [
                [1, 2]
            ], null, 0, null, C))], null, null)
        };
        var l = t("LMZF"),
            o = t("ZFRd"),
            i = t("Un6q"),
            a = t("l6RC"),
            r = t("V8+5"),
            u = t("ppgG"),
            s = t("4jwp"),
            d = t("j5BN"),
            c = t("CZgk"),
            p = l["\u0275crt"]({
                encapsulation: 2,
                styles: [".mat-tab-group{display:flex;flex-direction:column}.mat-tab-group.mat-tab-group-inverted-header{flex-direction:column-reverse}.mat-tab-label{height:48px;padding:0 24px;cursor:pointer;box-sizing:border-box;opacity:.6;min-width:160px;text-align:center;display:inline-flex;justify-content:center;align-items:center;white-space:nowrap;position:relative}.mat-tab-label:focus{outline:0}.mat-tab-label:focus:not(.mat-tab-disabled){opacity:1}.mat-tab-label.mat-tab-disabled{cursor:default}.mat-tab-label.mat-tab-label-content{display:inline-flex;justify-content:center;align-items:center;white-space:nowrap}@media (max-width:599px){.mat-tab-label{padding:0 12px}}@media (max-width:959px){.mat-tab-label{padding:0 12px}}.mat-tab-group[mat-stretch-tabs] .mat-tab-label{flex-basis:0;flex-grow:1}.mat-tab-body-wrapper{position:relative;overflow:hidden;display:flex;transition:height .5s cubic-bezier(.35,0,.25,1)}.mat-tab-body{top:0;left:0;right:0;bottom:0;position:absolute;display:block;overflow:hidden}.mat-tab-body.mat-tab-body-active{position:relative;overflow-x:hidden;overflow-y:auto;z-index:1;flex-grow:1}.mat-tab-group.mat-tab-group-dynamic-height .mat-tab-body.mat-tab-body-active{overflow-y:hidden}"],
                data: {}
            });

        function h(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275and"](0, null, null, 0))], null, null)
        }

        function f(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275and"](16777216, null, null, 1, null, h)), l["\u0275did"](1, 212992, null, 0, c.c, [l.ComponentFactoryResolver, l.ViewContainerRef], {
                portal: [0, "portal"]
            }, null), (e()(), l["\u0275and"](0, null, null, 0))], function(e, n) {
                e(n, 1, 0, n.parent.context.$implicit.templateLabel)
            }, null)
        }

        function m(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275ted"](0, null, ["", ""]))], null, function(e, n) {
                e(n, 0, 0, n.parent.context.$implicit.textLabel)
            })
        }

        function g(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 7, "div", [
                ["class", "mat-tab-label mat-ripple"],
                ["mat-ripple", ""],
                ["matTabLabelWrapper", ""],
                ["role", "tab"]
            ], [
                [8, "id", 0],
                [1, "tabIndex", 0],
                [1, "aria-controls", 0],
                [1, "aria-selected", 0],
                [2, "mat-tab-label-active", null],
                [2, "mat-ripple-unbounded", null],
                [2, "mat-tab-disabled", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var o = !0;
                return "click" === n && (o = !1 !== e.component._handleClick(e.context.$implicit, l["\u0275nov"](e.parent, 2), e.context.index) && o), o
            }, null, null)), l["\u0275did"](1, 212992, null, 0, d.x, [l.ElementRef, l.NgZone, r.a, [2, d.m]], {
                disabled: [0, "disabled"]
            }, null), l["\u0275did"](2, 16384, [
                [2, 4]
            ], 0, o.h, [l.ElementRef], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](3, 0, null, null, 4, "div", [
                ["class", "mat-tab-label-content"]
            ], null, null, null, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, f)), l["\u0275did"](5, 16384, null, 0, i.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null), (e()(), l["\u0275and"](16777216, null, null, 1, null, m)), l["\u0275did"](7, 16384, null, 0, i.NgIf, [l.ViewContainerRef, l.TemplateRef], {
                ngIf: [0, "ngIf"]
            }, null)], function(e, n) {
                e(n, 1, 0, n.context.$implicit.disabled || n.component.disableRipple), e(n, 2, 0, n.context.$implicit.disabled), e(n, 5, 0, n.context.$implicit.templateLabel), e(n, 7, 0, !n.context.$implicit.templateLabel)
            }, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t._getTabLabelId(n.context.index), t._getTabIndex(n.context.$implicit, n.context.index), t._getTabContentId(n.context.index), t.selectedIndex == n.context.index, t.selectedIndex == n.context.index, l["\u0275nov"](n, 1).unbounded, l["\u0275nov"](n, 2).disabled)
            })
        }

        function b(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275eld"](0, 0, null, null, 1, "mat-tab-body", [
                ["class", "mat-tab-body"],
                ["role", "tabpanel"]
            ], [
                [8, "id", 0],
                [1, "aria-labelledby", 0],
                [2, "mat-tab-body-active", null]
            ], [
                [null, "_onCentered"],
                [null, "_onCentering"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "_onCentered" === n && (l = !1 !== o._removeTabBodyWrapperHeight() && l), "_onCentering" === n && (l = !1 !== o._setTabBodyWrapperHeight(t) && l), l
            }, x, v)), l["\u0275did"](1, 114688, null, 0, o.c, [l.ElementRef, [2, a.c]], {
                _content: [0, "_content"],
                position: [1, "position"],
                origin: [2, "origin"]
            }, {
                _onCentering: "_onCentering",
                _onCentered: "_onCentered"
            })], function(e, n) {
                e(n, 1, 0, n.context.$implicit.content, n.context.$implicit.position, n.context.$implicit.origin)
            }, function(e, n) {
                var t = n.component;
                e(n, 0, 0, t._getTabContentId(n.context.index), t._getTabLabelId(n.context.index), t.selectedIndex == n.context.index)
            })
        }
        var v = l["\u0275crt"]({
            encapsulation: 2,
            styles: [".mat-tab-body-content{-webkit-backface-visibility:hidden;backface-visibility:hidden;height:100%;overflow:auto}.mat-tab-group-dynamic-height .mat-tab-body-content{overflow:hidden}"],
            data: {
                animation: [{
                    type: 7,
                    name: "translateTab",
                    definitions: [{
                        type: 0,
                        name: "center, void, left-origin-center, right-origin-center",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "none"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 0,
                        name: "left",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "translate3d(-100%, 0, 0)"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 0,
                        name: "right",
                        styles: {
                            type: 6,
                            styles: {
                                transform: "translate3d(100%, 0, 0)"
                            },
                            offset: null
                        },
                        options: void 0
                    }, {
                        type: 1,
                        expr: "* => left, * => right, left => center, right => center",
                        animation: {
                            type: 4,
                            styles: null,
                            timings: "500ms cubic-bezier(0.35, 0, 0.25, 1)"
                        },
                        options: null
                    }, {
                        type: 1,
                        expr: "void => left-origin-center",
                        animation: [{
                            type: 6,
                            styles: {
                                transform: "translate3d(-100%, 0, 0)"
                            },
                            offset: null
                        }, {
                            type: 4,
                            styles: null,
                            timings: "500ms cubic-bezier(0.35, 0, 0.25, 1)"
                        }],
                        options: null
                    }, {
                        type: 1,
                        expr: "void => right-origin-center",
                        animation: [{
                            type: 6,
                            styles: {
                                transform: "translate3d(100%, 0, 0)"
                            },
                            offset: null
                        }, {
                            type: 4,
                            styles: null,
                            timings: "500ms cubic-bezier(0.35, 0, 0.25, 1)"
                        }],
                        options: null
                    }],
                    options: {}
                }]
            }
        });

        function y(e) {
            return l["\u0275vid"](0, [(e()(), l["\u0275and"](0, null, null, 0))], null, null)
        }

        function x(e) {
            return l["\u0275vid"](2, [(e()(), l["\u0275eld"](0, 0, [
                ["content", 1]
            ], null, 2, "div", [
                ["class", "mat-tab-body-content"]
            ], [
                [24, "@translateTab", 0]
            ], [
                [null, "@translateTab.start"],
                [null, "@translateTab.done"]
            ], function(e, n, t) {
                var l = !0,
                    o = e.component;
                return "@translateTab.start" === n && (l = !1 !== o._onTranslateTabStarted(t) && l), "@translateTab.done" === n && (l = !1 !== o._onTranslateTabComplete(t) && l), l
            }, null, null)), (e()(), l["\u0275and"](16777216, null, null, 1, null, y)), l["\u0275did"](2, 212992, null, 0, o.d, [l.ComponentFactoryResolver, l.ViewContainerRef, o.c], null, null)], function(e, n) {
                e(n, 2, 0)
            }, function(e, n) {
                e(n, 0, 0, n.component._position)
            })
        }
        var w = l["\u0275crt"]({
            encapsulation: 2,
            styles: [".mat-tab-header{display:flex;overflow:hidden;position:relative;flex-shrink:0}.mat-tab-label{height:48px;padding:0 24px;cursor:pointer;box-sizing:border-box;opacity:.6;min-width:160px;text-align:center;display:inline-flex;justify-content:center;align-items:center;white-space:nowrap;position:relative}.mat-tab-label:focus{outline:0}.mat-tab-label:focus:not(.mat-tab-disabled){opacity:1}.mat-tab-label.mat-tab-disabled{cursor:default}.mat-tab-label.mat-tab-label-content{display:inline-flex;justify-content:center;align-items:center;white-space:nowrap}@media (max-width:599px){.mat-tab-label{min-width:72px}}.mat-ink-bar{position:absolute;bottom:0;height:2px;transition:.5s cubic-bezier(.35,0,.25,1)}.mat-tab-group-inverted-header .mat-ink-bar{bottom:auto;top:0}@media screen and (-ms-high-contrast:active){.mat-ink-bar{outline:solid 2px;height:0}}.mat-tab-header-pagination{position:relative;display:none;justify-content:center;align-items:center;min-width:32px;cursor:pointer;z-index:2}.mat-tab-header-pagination-controls-enabled .mat-tab-header-pagination{display:flex}.mat-tab-header-pagination-before,.mat-tab-header-rtl .mat-tab-header-pagination-after{padding-left:4px}.mat-tab-header-pagination-before .mat-tab-header-pagination-chevron,.mat-tab-header-rtl .mat-tab-header-pagination-after .mat-tab-header-pagination-chevron{transform:rotate(-135deg)}.mat-tab-header-pagination-after,.mat-tab-header-rtl .mat-tab-header-pagination-before{padding-right:4px}.mat-tab-header-pagination-after .mat-tab-header-pagination-chevron,.mat-tab-header-rtl .mat-tab-header-pagination-before .mat-tab-header-pagination-chevron{transform:rotate(45deg)}.mat-tab-header-pagination-chevron{border-style:solid;border-width:2px 2px 0 0;content:'';height:8px;width:8px}.mat-tab-header-pagination-disabled{box-shadow:none;cursor:default}.mat-tab-label-container{display:flex;flex-grow:1;overflow:hidden;z-index:1}.mat-tab-list{flex-grow:1;position:relative;transition:transform .5s cubic-bezier(.35,0,.25,1)}.mat-tab-labels{display:flex}"],
            data: {}
        });

        function _(e) {
            return l["\u0275vid"](2, [l["\u0275qud"](402653184, 1, {
                _inkBar: 0
            }), l["\u0275qud"](402653184, 2, {
                _tabListContainer: 0
            }), l["\u0275qud"](402653184, 3, {
                _tabList: 0
            }), (e()(), l["\u0275eld"](3, 0, null, null, 2, "div", [
                ["aria-hidden", "true"],
                ["class", "mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-ripple"],
                ["mat-ripple", ""]
            ], [
                [2, "mat-tab-header-pagination-disabled", null],
                [2, "mat-ripple-unbounded", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component._scrollHeader("before") && l), l
            }, null, null)), l["\u0275did"](4, 212992, null, 0, d.x, [l.ElementRef, l.NgZone, r.a, [2, d.m]], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](5, 0, null, null, 0, "div", [
                ["class", "mat-tab-header-pagination-chevron"]
            ], null, null, null, null, null)), (e()(), l["\u0275eld"](6, 0, [
                [2, 0],
                ["tabListContainer", 1]
            ], null, 6, "div", [
                ["class", "mat-tab-label-container"]
            ], null, [
                [null, "keydown"]
            ], function(e, n, t) {
                var l = !0;
                return "keydown" === n && (l = !1 !== e.component._handleKeydown(t) && l), l
            }, null, null)), (e()(), l["\u0275eld"](7, 0, [
                [3, 0],
                ["tabList", 1]
            ], null, 5, "div", [
                ["class", "mat-tab-list"],
                ["role", "tablist"]
            ], null, [
                [null, "cdkObserveContent"]
            ], function(e, n, t) {
                var l = !0;
                return "cdkObserveContent" === n && (l = !1 !== e.component._onContentChanges() && l), l
            }, null, null)), l["\u0275did"](8, 1720320, null, 0, u.a, [u.b, l.ElementRef, l.NgZone], null, {
                event: "cdkObserveContent"
            }), (e()(), l["\u0275eld"](9, 0, null, null, 1, "div", [
                ["class", "mat-tab-labels"]
            ], null, null, null, null, null)), l["\u0275ncd"](null, 0), (e()(), l["\u0275eld"](11, 0, null, null, 1, "mat-ink-bar", [
                ["class", "mat-ink-bar"]
            ], null, null, null, null, null)), l["\u0275did"](12, 16384, [
                [1, 4]
            ], 0, o.a, [l.ElementRef, l.NgZone], null, null), (e()(), l["\u0275eld"](13, 0, null, null, 2, "div", [
                ["aria-hidden", "true"],
                ["class", "mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-ripple"],
                ["mat-ripple", ""]
            ], [
                [2, "mat-tab-header-pagination-disabled", null],
                [2, "mat-ripple-unbounded", null]
            ], [
                [null, "click"]
            ], function(e, n, t) {
                var l = !0;
                return "click" === n && (l = !1 !== e.component._scrollHeader("after") && l), l
            }, null, null)), l["\u0275did"](14, 212992, null, 0, d.x, [l.ElementRef, l.NgZone, r.a, [2, d.m]], {
                disabled: [0, "disabled"]
            }, null), (e()(), l["\u0275eld"](15, 0, null, null, 0, "div", [
                ["class", "mat-tab-header-pagination-chevron"]
            ], null, null, null, null, null))], function(e, n) {
                var t = n.component;
                e(n, 4, 0, t._disableScrollBefore || t.disableRipple), e(n, 14, 0, t._disableScrollAfter || t.disableRipple)
            }, function(e, n) {
                var t = n.component;
                e(n, 3, 0, t._disableScrollBefore, l["\u0275nov"](n, 4).unbounded), e(n, 13, 0, t._disableScrollAfter, l["\u0275nov"](n, 14).unbounded)
            })
        }
        var k = l["\u0275crt"]({
            encapsulation: 2,
            styles: [],
            data: {}
        });

        function C(e) {
            return l["\u0275vid"](0, [l["\u0275ncd"](null, 0), (e()(), l["\u0275and"](0, null, null, 0))], null, null)
        }
    }
});
//# sourceMappingURL=html-builder.module.98d6ada556597f6f8506.chunk.js.map