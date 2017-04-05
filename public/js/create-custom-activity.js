/**
 * autoNumeric.js
 * @author: Bob Knothe
 * @author: Sokolov Yura
 * @version: 1.9.46 - 2016-09-11 GMT 10:00 PM / 22:00
 *
 * Created by Robert J. Knothe on 2010-10-25. Please report any bugs to https://github.com/BobKnothe/autoNumeric
 * Contributor by Sokolov Yura on 2010-11-07
 *
 * Copyright (c) 2011 Robert J. Knothe http://www.decorplanit.com/plugin/
 *
 * The MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof module&&module.exports?module.exports=a(require("jquery")):a(window.jQuery)}(function(a){"use strict";function b(a){var b={};if(void 0===a.selectionStart){a.focus();var c=document.selection.createRange();b.length=c.text.length,c.moveStart("character",-a.value.length),b.end=c.text.length,b.start=b.end-b.length}else b.start=a.selectionStart,b.end=a.selectionEnd,b.length=b.end-b.start;return b}function c(a,b,c){if(void 0===a.selectionStart){a.focus();var d=a.createTextRange();d.collapse(!0),d.moveEnd("character",c),d.moveStart("character",b),d.select()}else a.selectionStart=b,a.selectionEnd=c}function d(b,c){a.each(c,function(a,d){"function"==typeof d?c[a]=d(b,c,a):"function"==typeof b.autoNumeric[d]&&(c[a]=b.autoNumeric[d](b,c,a))})}function e(a,b){"string"==typeof a[b]&&(a[b]*=1)}function f(a,b){d(a,b),b.tagList=["b","caption","cite","code","dd","del","div","dfn","dt","em","h1","h2","h3","h4","h5","h6","ins","kdb","label","li","output","p","q","s","sample","span","strong","td","th","u","var"];var c=b.vMax.toString().split("."),f=b.vMin||0===b.vMin?b.vMin.toString().split("."):[];if(e(b,"vMax"),e(b,"vMin"),e(b,"mDec"),b.mDec="CHF"===b.mRound?"2":b.mDec,b.allowLeading=!0,b.aNeg=b.vMin<0?"-":"",c[0]=c[0].replace("-",""),f[0]=f[0].replace("-",""),b.mInt=Math.max(c[0].length,f[0].length,1),null===b.mDec){var g=0,h=0;c[1]&&(g=c[1].length),f[1]&&(h=f[1].length),b.mDec=Math.max(g,h)}null===b.altDec&&b.mDec>0&&("."===b.aDec&&","!==b.aSep?b.altDec=",":","===b.aDec&&"."!==b.aSep&&(b.altDec="."));var i=b.aNeg?"([-\\"+b.aNeg+"]?)":"(-?)";b.aNegRegAutoStrip=i,b.skipFirstAutoStrip=new RegExp(i+"[^-"+(b.aNeg?"\\"+b.aNeg:"")+"\\"+b.aDec+"\\d].*?(\\d|\\"+b.aDec+"\\d)"),b.skipLastAutoStrip=new RegExp("(\\d\\"+b.aDec+"?)[^\\"+b.aDec+"\\d]\\D*$");var j="-"+b.aNum+"\\"+b.aDec;return b.allowedAutoStrip=new RegExp("[^"+j+"]","gi"),b.numRegAutoStrip=new RegExp(i+"(?:\\"+b.aDec+"?(\\d+\\"+b.aDec+"\\d+)|(\\d*(?:\\"+b.aDec+"\\d*)?))"),b}function g(a,b,c){if(b.aSign)for(;a.indexOf(b.aSign)>-1;)a=a.replace(b.aSign,"");a=a.replace(b.skipFirstAutoStrip,"$1$2"),a=a.replace(b.skipLastAutoStrip,"$1"),a=a.replace(b.allowedAutoStrip,""),b.altDec&&(a=a.replace(b.altDec,b.aDec));var d=a.match(b.numRegAutoStrip);if(a=d?[d[1],d[2],d[3]].join(""):"",("allow"===b.lZero||"keep"===b.lZero)&&"strip"!==c){var e=[],f="";e=a.split(b.aDec),e[0].indexOf("-")!==-1&&(f="-",e[0]=e[0].replace("-","")),e[0].length>b.mInt&&"0"===e[0].charAt(0)&&(e[0]=e[0].slice(1)),a=f+e.join(b.aDec)}if(c&&"deny"===b.lZero||c&&"allow"===b.lZero&&b.allowLeading===!1){var g="^"+b.aNegRegAutoStrip+"0*(\\d"+("leading"===c?")":"|$)");g=new RegExp(g),a=a.replace(g,"$1$2")}return a}function h(a,b){if("p"===b.pSign){var c=b.nBracket.split(",");b.hasFocus||b.removeBrackets?(b.hasFocus&&a.charAt(0)===c[0]||b.removeBrackets&&a.charAt(0)===c[0])&&(a=a.replace(c[0],b.aNeg),a=a.replace(c[1],"")):(a=a.replace(b.aNeg,""),a=c[0]+a+c[1])}return a}function i(a,b){if(a){var c=+a;if(c<1e-6&&c>-1)a=+a,a<1e-6&&a>0&&(a=(a+10).toString(),a=a.substring(1)),a<0&&a>-1&&(a=(a-10).toString(),a="-"+a.substring(2)),a=a.toString();else{var d=a.split(".");void 0!==d[1]&&(0===+d[1]?a=d[0]:(d[1]=d[1].replace(/0*$/,""),a=d.join(".")))}}return"keep"===b.lZero?a:a.replace(/^0*(\d)/,"$1")}function j(a,b,c){return b&&"."!==b&&(a=a.replace(b,".")),c&&"-"!==c&&(a=a.replace(c,"-")),a.match(/\d/)||(a+="0"),a}function k(a,b,c){return c&&"-"!==c&&(a=a.replace("-",c)),b&&"."!==b&&(a=a.replace(".",b)),a}function l(a,b,c){return""===a||a===b.aNeg?"zero"===b.wEmpty?a+"0":"sign"===b.wEmpty||c?a+b.aSign:a:null}function m(a,b){a=g(a,b);var c=a.replace(",","."),d=l(a,b,!0);if(null!==d)return d;var e="";e=2===b.dGroup?/(\d)((\d)(\d{2}?)+)$/:4===b.dGroup?/(\d)((\d{4}?)+)$/:/(\d)((\d{3}?)+)$/;var f=a.split(b.aDec);b.altDec&&1===f.length&&(f=a.split(b.altDec));var i=f[0];if(b.aSep)for(;e.test(i);)i=i.replace(e,"$1"+b.aSep+"$2");if(0!==b.mDec&&f.length>1?(f[1].length>b.mDec&&(f[1]=f[1].substring(0,b.mDec)),a=i+b.aDec+f[1]):a=i,b.aSign){var j=a.indexOf(b.aNeg)!==-1;a=a.replace(b.aNeg,""),a="p"===b.pSign?b.aSign+a:a+b.aSign,j&&(a=b.aNeg+a)}return c<0&&null!==b.nBracket&&(a=h(a,b)),a}function n(a,b){a=""===a?"0":a.toString(),e(b,"mDec"),"CHF"===b.mRound&&(a=(Math.round(20*a)/20).toString());var c="",d=0,f="",g="boolean"==typeof b.aPad||null===b.aPad?b.aPad?b.mDec:0:+b.aPad,h=function(a){var b=0===g?/(\.(?:\d*[1-9])?)0*$/:1===g?/(\.\d(?:\d*[1-9])?)0*$/:new RegExp("(\\.\\d{"+g+"}(?:\\d*[1-9])?)0*$");return a=a.replace(b,"$1"),0===g&&(a=a.replace(/\.$/,"")),a};"-"===a.charAt(0)&&(f="-",a=a.replace("-","")),a.match(/^\d/)||(a="0"+a),"-"===f&&0===+a&&(f=""),(+a>0&&"keep"!==b.lZero||a.length>0&&"allow"===b.lZero)&&(a=a.replace(/^0*(\d)/,"$1"));var i=a.lastIndexOf("."),j=i===-1?a.length-1:i,k=a.length-1-j;if(k<=b.mDec){if(c=a,k<g){i===-1&&(c+=b.aDec);for(var l="000000";k<g;)l=l.substring(0,g-k),c+=l,k+=l.length}else k>g?c=h(c):0===k&&0===g&&(c=c.replace(/\.$/,""));if("CHF"!==b.mRound)return 0===+c?c:f+c;"CHF"===b.mRound&&(i=c.lastIndexOf("."),a=c)}var m=i+b.mDec,n=+a.charAt(m+1),o=a.substring(0,m+1).split(""),p="."===a.charAt(m)?a.charAt(m-1)%2:a.charAt(m)%2,q=!0;if(1!==p&&(p=0===p&&a.substring(m+2,a.length)>0?1:0),n>4&&"S"===b.mRound||n>4&&"A"===b.mRound&&""===f||n>5&&"A"===b.mRound&&"-"===f||n>5&&"s"===b.mRound||n>5&&"a"===b.mRound&&""===f||n>4&&"a"===b.mRound&&"-"===f||n>5&&"B"===b.mRound||5===n&&"B"===b.mRound&&1===p||n>0&&"C"===b.mRound&&""===f||n>0&&"F"===b.mRound&&"-"===f||n>0&&"U"===b.mRound||"CHF"===b.mRound)for(d=o.length-1;d>=0;d-=1)if("."!==o[d]){if("CHF"===b.mRound&&o[d]<=2&&q){o[d]=0,q=!1;break}if("CHF"===b.mRound&&o[d]<=7&&q){o[d]=5,q=!1;break}if("CHF"===b.mRound&&q?(o[d]=10,q=!1):o[d]=+o[d]+1,o[d]<10)break;d>0&&(o[d]="0")}return o=o.slice(0,m+1),c=h(o.join("")),0===+c?c:f+c}function o(a,b,c){var d=b.aDec,e=b.mDec;if(a="paste"===c?n(a,b):a,d&&e){var f=a.split(d);f[1]&&f[1].length>e&&(e>0?(f[1]=f[1].substring(0,e),a=f.join(d)):a=f[0])}return a}function p(a,b){a=g(a,b),a=o(a,b),a=j(a,b.aDec,b.aNeg);var c=+a;return c>=b.vMin&&c<=b.vMax}function q(b,c){this.settings=c,this.that=b,this.$that=a(b),this.formatted=!1,this.settingsClone=f(this.$that,this.settings),this.value=b.value}function r(b){return"string"==typeof b&&(b=b.replace(/\[/g,"\\[").replace(/\]/g,"\\]"),b="#"+b.replace(/(:|\.)/g,"\\$1")),a(b)}function s(a,b,c){var d=a.data("autoNumeric");d||(d={},a.data("autoNumeric",d));var e=d.holder;return(void 0===e&&b||c)&&(e=new q(a.get(0),b),d.holder=e),e}q.prototype={init:function(a){this.value=this.that.value,this.settingsClone=f(this.$that,this.settings),this.ctrlKey=a.ctrlKey,this.cmdKey=a.metaKey,this.shiftKey=a.shiftKey,this.selection=b(this.that),"keydown"!==a.type&&"keyup"!==a.type||(this.kdCode=a.keyCode),this.which=a.which,this.processed=!1,this.formatted=!1},setSelection:function(a,b,d){a=Math.max(a,0),b=Math.min(b,this.that.value.length),this.selection={start:a,end:b,length:b-a},(void 0===d||d)&&c(this.that,a,b)},setPosition:function(a,b){this.setSelection(a,a,b)},getBeforeAfter:function(){var a=this.value,b=a.substring(0,this.selection.start),c=a.substring(this.selection.end,a.length);return[b,c]},getBeforeAfterStriped:function(){var a=this.getBeforeAfter();return a[0]=g(a[0],this.settingsClone),a[1]=g(a[1],this.settingsClone),a},normalizeParts:function(a,b){var c=this.settingsClone;b=g(b,c);var d=!!b.match(/^\d/)||"leading";a=g(a,c,d),""!==a&&a!==c.aNeg||"deny"!==c.lZero||b>""&&(b=b.replace(/^0*(\d)/,"$1"));var e=a+b;if(c.aDec){var f=e.match(new RegExp("^"+c.aNegRegAutoStrip+"\\"+c.aDec));f&&(a=a.replace(f[1],f[1]+"0"),e=a+b)}return"zero"!==c.wEmpty||e!==c.aNeg&&""!==e||(a+="0"),[a,b]},setValueParts:function(a,b,c){var d=this.settingsClone,e=this.normalizeParts(a,b),f=e.join(""),g=e[0].length;return!!p(f,d)&&(f=o(f,d,c),g>f.length&&(g=f.length),this.value=f,this.setPosition(g,!1),!0)},signPosition:function(){var a=this.settingsClone,b=a.aSign,c=this.that;if(b){var d=b.length;if("p"===a.pSign){var e=a.aNeg&&c.value&&c.value.charAt(0)===a.aNeg;return e?[1,d+1]:[0,d]}var f=c.value.length;return[f-d,f]}return[1e3,-1]},expandSelectionOnSign:function(a){var b=this.signPosition(),c=this.selection;c.start<b[1]&&c.end>b[0]&&((c.start<b[0]||c.end>b[1])&&this.value.substring(Math.max(c.start,b[0]),Math.min(c.end,b[1])).match(/^\s*$/)?c.start<b[0]?this.setSelection(c.start,b[0],a):this.setSelection(b[1],c.end,a):this.setSelection(Math.min(c.start,b[0]),Math.max(c.end,b[1]),a))},checkPaste:function(){if(void 0!==this.valuePartsBeforePaste){var a=this.getBeforeAfter(),b=this.valuePartsBeforePaste;delete this.valuePartsBeforePaste,a[0]=a[0].substr(0,b[0].length)+g(a[0].substr(b[0].length),this.settingsClone),this.setValueParts(a[0],a[1],"paste")||(this.value=b.join(""),this.setPosition(b[0].length,!1))}},skipAllways:function(a){var b=this.kdCode,c=this.which,d=this.ctrlKey,e=this.cmdKey,f=this.shiftKey;if((d||e)&&"keyup"===a.type&&void 0!==this.valuePartsBeforePaste||f&&45===b)return this.checkPaste(),!1;if(b>=112&&b<=123||b>=91&&b<=93||b>=9&&b<=31||b<8&&(0===c||c===b)||144===b||145===b||45===b||224===b)return!0;if((d||e)&&65===b)return!0;if((d||e)&&(67===b||86===b||88===b))return"keydown"===a.type&&this.expandSelectionOnSign(),86!==b&&45!==b||("keydown"===a.type||"keypress"===a.type?void 0===this.valuePartsBeforePaste&&(this.valuePartsBeforePaste=this.getBeforeAfter()):this.checkPaste()),"keydown"===a.type||"keypress"===a.type||67===b;if(d||e)return!0;if(37===b||39===b){var g=this.settingsClone.aSep,h=this.selection.start,i=this.that.value;return"keydown"===a.type&&g&&!this.shiftKey&&(37===b&&i.charAt(h-2)===g?this.setPosition(h-1):39===b&&i.charAt(h+1)===g&&this.setPosition(h+1)),!0}return b>=34&&b<=40},processAllways:function(){var a;return(8===this.kdCode||46===this.kdCode)&&(this.selection.length?(this.expandSelectionOnSign(!1),a=this.getBeforeAfterStriped(),this.setValueParts(a[0],a[1])):(a=this.getBeforeAfterStriped(),8===this.kdCode?a[0]=a[0].substring(0,a[0].length-1):a[1]=a[1].substring(1,a[1].length),this.setValueParts(a[0],a[1])),!0)},processKeypress:function(){var a=this.settingsClone,b=String.fromCharCode(this.which),c=this.getBeforeAfterStriped(),d=c[0],e=c[1];return b===a.aDec||a.altDec&&b===a.altDec||("."===b||","===b)&&110===this.kdCode?!a.mDec||!a.aDec||(!!(a.aNeg&&e.indexOf(a.aNeg)>-1)||(d.indexOf(a.aDec)>-1||(e.indexOf(a.aDec)>0||(0===e.indexOf(a.aDec)&&(e=e.substr(1)),this.setValueParts(d+a.aDec,e),!0)))):"-"===b||"+"===b?!a.aNeg||(""===d&&e.indexOf(a.aNeg)>-1&&(d=a.aNeg,e=e.substring(1,e.length)),d=d.charAt(0)===a.aNeg?d.substring(1,d.length):"-"===b?a.aNeg+d:d,this.setValueParts(d,e),!0):!(b>="0"&&b<="9")||(a.aNeg&&""===d&&e.indexOf(a.aNeg)>-1&&(d=a.aNeg,e=e.substring(1,e.length)),a.vMax<=0&&a.vMin<a.vMax&&this.value.indexOf(a.aNeg)===-1&&"0"!==b&&(d=a.aNeg+d),this.setValueParts(d+b,e),!0)},formatQuick:function(){var a=this.settingsClone,b=this.getBeforeAfterStriped(),c=this.value;if((""===a.aSep||""!==a.aSep&&c.indexOf(a.aSep)===-1)&&(""===a.aSign||""!==a.aSign&&c.indexOf(a.aSign)===-1)){var d=[],e="";d=c.split(a.aDec),d[0].indexOf("-")>-1&&(e="-",d[0]=d[0].replace("-",""),b[0]=b[0].replace("-","")),d[0].length>a.mInt&&"0"===b[0].charAt(0)&&(b[0]=b[0].slice(1)),b[0]=e+b[0]}var f=m(this.value,this.settingsClone),g=f.length;if(f){var h=b[0].split(""),i=0;for(i;i<h.length;i+=1)h[i].match("\\d")||(h[i]="\\"+h[i]);var j=new RegExp("^.*?"+h.join(".*?")),k=f.match(j);k?(g=k[0].length,(0===g&&f.charAt(0)!==a.aNeg||1===g&&f.charAt(0)===a.aNeg)&&a.aSign&&"p"===a.pSign&&(g=this.settingsClone.aSign.length+("-"===f.charAt(0)?1:0))):a.aSign&&"s"===a.pSign&&(g-=a.aSign.length)}this.that.value!==f&&(this.that.value=f,this.setPosition(g)),this.formatted=!0}};var t={init:function(b){return this.each(function(){var d=a(this),e=d.data("autoNumeric"),f=d.data(),i=d.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])");if("object"==typeof e)return this;e=a.extend({},a.fn.autoNumeric.defaults,f,b,{aNum:"0123456789",hasFocus:!1,removeBrackets:!1,runOnce:!1,tagList:["b","caption","cite","code","dd","del","div","dfn","dt","em","h1","h2","h3","h4","h5","h6","ins","kdb","label","li","output","p","q","s","sample","span","strong","td","th","u","var"]}),e.aDec===e.aSep&&a.error("autoNumeric will not function properly when the decimal character aDec: '"+e.aDec+"' and thousand separator aSep: '"+e.aSep+"' are the same character"),d.data("autoNumeric",e);var o=s(d,e);if(i||"input"!==d.prop("tagName").toLowerCase()||a.error('The input type "'+d.prop("type")+'" is not supported by autoNumeric()'),a.inArray(d.prop("tagName").toLowerCase(),e.tagList)===-1&&"input"!==d.prop("tagName").toLowerCase()&&a.error("The <"+d.prop("tagName").toLowerCase()+"> is not supported by autoNumeric()"),e.runOnce===!1&&e.aForm){if(i){var q=!0;""===d[0].value&&"empty"===e.wEmpty&&(d[0].value="",q=!1),""===d[0].value&&"sign"===e.wEmpty&&(d[0].value=e.aSign,q=!1),q&&""!==d.val()&&(null===e.anDefault&&d[0].value===d.prop("defaultValue")||null!==e.anDefault&&e.anDefault.toString()===d.val())&&d.autoNumeric("set",d.val())}a.inArray(d.prop("tagName").toLowerCase(),e.tagList)!==-1&&""!==d.text()&&d.autoNumeric("set",d.text())}e.runOnce=!0,d.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])")&&(d.on("keydown.autoNumeric",function(b){return o=s(d),o.settings.aDec===o.settings.aSep&&a.error("autoNumeric will not function properly when the decimal character aDec: '"+o.settings.aDec+"' and thousand separator aSep: '"+o.settings.aSep+"' are the same character"),o.that.readOnly?(o.processed=!0,!0):(o.init(b),o.skipAllways(b)?(o.processed=!0,!0):o.processAllways()?(o.processed=!0,o.formatQuick(),b.preventDefault(),!1):(o.formatted=!1,!0))}),d.on("keypress.autoNumeric",function(a){o=s(d);var b=o.processed;return o.init(a),!!o.skipAllways(a)||(b?(a.preventDefault(),!1):o.processAllways()||o.processKeypress()?(o.formatQuick(),a.preventDefault(),!1):void(o.formatted=!1))}),d.on("keyup.autoNumeric",function(a){o=s(d),o.init(a);var b=o.skipAllways(a),e=o.kdCode;return o.kdCode=0,delete o.valuePartsBeforePaste,d[0].value===o.settings.aSign?"s"===o.settings.pSign?c(this,0,0):c(this,o.settings.aSign.length,o.settings.aSign.length):9===e&&c(this,0,d.val().length),!!b||(""===this.value||void(o.formatted||o.formatQuick()))}),d.on("focusin.autoNumeric",function(){o=s(d);var a=o.settingsClone;if(a.hasFocus=!0,null!==a.nBracket){var b=d.val();d.val(h(b,a))}o.inVal=d.val();var c=l(o.inVal,a,!0);null!==c&&""!==c&&d.val(c)}),d.on("focusout.autoNumeric",function(){o=s(d);var a=o.settingsClone,b=d.val(),c=b,e="";a.hasFocus=!1,"allow"===a.lZero&&(a.allowLeading=!1,e="leading"),""!==b&&(b=g(b,a,e),null===l(b,a)&&p(b,a,d[0])?(b=j(b,a.aDec,a.aNeg),b=n(b,a),b=k(b,a.aDec,a.aNeg)):b="");var f=l(b,a,!1);null===f&&(f=m(b,a)),f===o.inVal&&f===c||(d.val(f),d.change(),delete o.inVal)}))})},destroy:function(){return a(this).each(function(){var b=a(this);b.removeData("autoNumeric"),b.off(".autoNumeric")})},update:function(b){return a(this).each(function(){var c=r(a(this)),d=c.data("autoNumeric");"object"!=typeof d&&a.error("You must initialize autoNumeric('init', {options}) prior to calling the 'update' method");var e=c.autoNumeric("get");if(d=a.extend(d,b),s(c,d,!0),d.aDec===d.aSep&&a.error("autoNumeric will not function properly when the decimal character aDec: '"+d.aDec+"' and thousand separator aSep: '"+d.aSep+"' are the same character"),c.data("autoNumeric",d),""!==c.val()||""!==c.text())return c.autoNumeric("set",e)})},set:function(b){if(null!==b&&!isNaN(b))return a(this).each(function(){var c=r(a(this)),d=c.data("autoNumeric"),e=b.toString(),f=b.toString(),g=c.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])");return"object"!=typeof d&&a.error("You must initialize autoNumeric('init', {options}) prior to calling the 'set' method"),f!==c.attr("value")&&f!==c.text()||d.runOnce!==!1||(e=e.replace(",",".")),a.isNumeric(+e)||a.error("The value ("+e+") being 'set' is not numeric and has caused a error to be thrown"),e=i(e,d),d.setEvent=!0,e.toString(),""!==e&&(e=n(e,d)),e=k(e,d.aDec,d.aNeg),p(e,d)||(e=n("",d)),e=m(e,d),g?c.val(e):a.inArray(c.prop("tagName").toLowerCase(),d.tagList)!==-1&&c.text(e)})},get:function(){var b=r(a(this)),c=b.data("autoNumeric");"object"!=typeof c&&a.error("You must initialize autoNumeric('init', {options}) prior to calling the 'get' method");var d="";return b.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])")?d=b.eq(0).val():a.inArray(b.prop("tagName").toLowerCase(),c.tagList)!==-1?d=b.eq(0).text():a.error("The <"+b.prop("tagName").toLowerCase()+"> is not supported by autoNumeric()"),""===d&&"empty"===c.wEmpty||d===c.aSign&&("sign"===c.wEmpty||"empty"===c.wEmpty)?"":(""!==d&&null!==c.nBracket&&(c.removeBrackets=!0,d=h(d,c),c.removeBrackets=!1),(c.runOnce||c.aForm===!1)&&(d=g(d,c)),d=j(d,c.aDec,c.aNeg),0===+d&&"keep"!==c.lZero&&(d="0"),"keep"===c.lZero?d:d=i(d,c))},getString:function(){var b=!1,c=r(a(this)),d=c.serialize(),e=d.split("&"),f=a("form").index(c),g=a("form:eq("+f+")"),h=[],i=[],j=/^(?:submit|button|image|reset|file)$/i,k=/^(?:input|select|textarea|keygen)/i,l=/^(?:checkbox|radio)$/i,m=/^(?:button|checkbox|color|date|datetime|datetime-local|email|file|image|month|number|password|radio|range|reset|search|submit|time|url|week)/i,n=0;return a.each(g[0],function(a,b){""===b.name||!k.test(b.localName)||j.test(b.type)||b.disabled||!b.checked&&l.test(b.type)?i.push(-1):(i.push(n),n+=1)}),n=0,a.each(g[0],function(a,b){"input"!==b.localName||""!==b.type&&"text"!==b.type&&"hidden"!==b.type&&"tel"!==b.type?(h.push(-1),"input"===b.localName&&m.test(b.type)&&(n+=1)):(h.push(n),n+=1)}),a.each(e,function(c,d){d=e[c].split("=");var g=a.inArray(c,i);if(g>-1&&h[g]>-1){var j=a("form:eq("+f+") input:eq("+h[g]+")"),k=j.data("autoNumeric");"object"==typeof k&&null!==d[1]&&(d[1]=a("form:eq("+f+") input:eq("+h[g]+")").autoNumeric("get").toString(),e[c]=d.join("="),b=!0)}}),b||a.error("You must initialize autoNumeric('init', {options}) prior to calling the 'getString' method"),e.join("&")},getArray:function(){var b=!1,c=r(a(this)),d=c.serializeArray(),e=a("form").index(c),f=a("form:eq("+e+")"),g=[],h=[],i=/^(?:submit|button|image|reset|file)$/i,j=/^(?:input|select|textarea|keygen)/i,k=/^(?:checkbox|radio)$/i,l=/^(?:button|checkbox|color|date|datetime|datetime-local|email|file|image|month|number|password|radio|range|reset|search|submit|time|url|week)/i,m=0;return a.each(f[0],function(a,b){""===b.name||!j.test(b.localName)||i.test(b.type)||b.disabled||!b.checked&&k.test(b.type)?h.push(-1):(h.push(m),m+=1)}),m=0,a.each(f[0],function(a,b){"input"!==b.localName||""!==b.type&&"text"!==b.type&&"hidden"!==b.type&&"tel"!==b.type?(g.push(-1),"input"===b.localName&&l.test(b.type)&&(m+=1)):(g.push(m),m+=1)}),a.each(d,function(c,d){var f=a.inArray(c,h);if(f>-1&&g[f]>-1){var i=a("form:eq("+e+") input:eq("+g[f]+")"),j=i.data("autoNumeric");"object"==typeof j&&(d.value=a("form:eq("+e+") input:eq("+g[f]+")").autoNumeric("get").toString(),b=!0)}}),b||a.error("None of the successful form inputs are initialized by autoNumeric."),d},getSettings:function(){var b=r(a(this));return b.eq(0).data("autoNumeric")}};a.fn.autoNumeric=function(b){return t[b]?t[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?void a.error('Method "'+b+'" is not supported by autoNumeric()'):t.init.apply(this,arguments)},a.fn.autoNumeric.defaults={aSep:",",dGroup:"3",aDec:".",altDec:null,aSign:"",pSign:"p",vMax:"9999999999999.99",vMin:"-9999999999999.99",mDec:null,mRound:"S",aPad:!0,nBracket:null,wEmpty:"empty",lZero:"allow",sNumber:!0,aForm:!0,anDefault:null}});
/* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */

(function($, undefined){

	var $window = $(window);

	function UTCDate(){
		return new Date(Date.UTC.apply(Date, arguments));
	}
	function UTCToday(){
		var today = new Date();
		return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
	}
	function alias(method){
		return function(){
			return this[method].apply(this, arguments);
		};
	}

	var DateArray = (function(){
		var extras = {
			get: function(i){
				return this.slice(i)[0];
			},
			contains: function(d){
				// Array.indexOf is not cross-browser;
				// $.inArray doesn't work with Dates
				var val = d && d.valueOf();
				for (var i=0, l=this.length; i < l; i++)
					if (this[i].valueOf() === val)
						return i;
				return -1;
			},
			remove: function(i){
				this.splice(i,1);
			},
			replace: function(new_array){
				if (!new_array)
					return;
				if (!$.isArray(new_array))
					new_array = [new_array];
				this.clear();
				this.push.apply(this, new_array);
			},
			clear: function(){
				this.splice(0);
			},
			copy: function(){
				var a = new DateArray();
				a.replace(this);
				return a;
			}
		};

		return function(){
			var a = [];
			a.push.apply(a, arguments);
			$.extend(a, extras);
			return a;
		};
	})();


	// Picker object

	var Datepicker = function(element, options){
		this.dates = new DateArray();
		this.viewDate = UTCToday();
		this.focusDate = null;

		this._process_options(options);

		this.element = $(element);
		this.isInline = false;
		this.isInput = this.element.is('input');
		this.component = this.element.is('.date') ? this.element.find('.add-on, .input-group-addon, .btn') : false;
		this.hasInput = this.component && this.element.find('input').length;
		if (this.component && this.component.length === 0)
			this.component = false;

		this.picker = $(DPGlobal.template);
		this._buildEvents();
		this._attachEvents();

		if (this.isInline){
			this.picker.addClass('datepicker-inline').appendTo(this.element);
		}
		else {
			this.picker.addClass('datepicker-dropdown dropdown-menu');
		}

		if (this.o.rtl){
			this.picker.addClass('datepicker-rtl');
		}

		this.viewMode = this.o.startView;

		if (this.o.calendarWeeks)
			this.picker.find('tfoot th.today')
						.attr('colspan', function(i, val){
							return parseInt(val) + 1;
						});

		this._allow_update = false;

		this.setStartDate(this._o.startDate);
		this.setEndDate(this._o.endDate);
		this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);

		this.fillDow();
		this.fillMonths();

		this._allow_update = true;

		this.update();
		this.showMode();

		if (this.isInline){
			this.show();
		}
	};

	Datepicker.prototype = {
		constructor: Datepicker,

		_process_options: function(opts){
			// Store raw options for reference
			this._o = $.extend({}, this._o, opts);
			// Processed options
			var o = this.o = $.extend({}, this._o);

			// Check if "de-DE" style date is available, if not language should
			// fallback to 2 letter code eg "de"
			var lang = o.language;
			if (!dates[lang]){
				lang = lang.split('-')[0];
				if (!dates[lang])
					lang = defaults.language;
			}
			o.language = lang;

			switch (o.startView){
				case 2:
				case 'decade':
					o.startView = 2;
					break;
				case 1:
				case 'year':
					o.startView = 1;
					break;
				default:
					o.startView = 0;
			}

			switch (o.minViewMode){
				case 1:
				case 'months':
					o.minViewMode = 1;
					break;
				case 2:
				case 'years':
					o.minViewMode = 2;
					break;
				default:
					o.minViewMode = 0;
			}

			o.startView = Math.max(o.startView, o.minViewMode);

			// true, false, or Number > 0
			if (o.multidate !== true){
				o.multidate = Number(o.multidate) || false;
				if (o.multidate !== false)
					o.multidate = Math.max(0, o.multidate);
				else
					o.multidate = 1;
			}
			o.multidateSeparator = String(o.multidateSeparator);

			o.weekStart %= 7;
			o.weekEnd = ((o.weekStart + 6) % 7);

			var format = DPGlobal.parseFormat(o.format);
			if (o.startDate !== -Infinity){
				if (!!o.startDate){
					if (o.startDate instanceof Date)
						o.startDate = this._local_to_utc(this._zero_time(o.startDate));
					else
						o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
				}
				else {
					o.startDate = -Infinity;
				}
			}
			if (o.endDate !== Infinity){
				if (!!o.endDate){
					if (o.endDate instanceof Date)
						o.endDate = this._local_to_utc(this._zero_time(o.endDate));
					else
						o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
				}
				else {
					o.endDate = Infinity;
				}
			}

			o.daysOfWeekDisabled = o.daysOfWeekDisabled||[];
			if (!$.isArray(o.daysOfWeekDisabled))
				o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
			o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function(d){
				return parseInt(d, 10);
			});

			var plc = String(o.orientation).toLowerCase().split(/\s+/g),
				_plc = o.orientation.toLowerCase();
			plc = $.grep(plc, function(word){
				return (/^auto|left|right|top|bottom$/).test(word);
			});
			o.orientation = {x: 'auto', y: 'auto'};
			if (!_plc || _plc === 'auto')
				; // no action
			else if (plc.length === 1){
				switch (plc[0]){
					case 'top':
					case 'bottom':
						o.orientation.y = plc[0];
						break;
					case 'left':
					case 'right':
						o.orientation.x = plc[0];
						break;
				}
			}
			else {
				_plc = $.grep(plc, function(word){
					return (/^left|right$/).test(word);
				});
				o.orientation.x = _plc[0] || 'auto';

				_plc = $.grep(plc, function(word){
					return (/^top|bottom$/).test(word);
				});
				o.orientation.y = _plc[0] || 'auto';
			}
		},
		_events: [],
		_secondaryEvents: [],
		_applyEvents: function(evs){
			for (var i=0, el, ch, ev; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.on(ev, ch);
			}
		},
		_unapplyEvents: function(evs){
			for (var i=0, el, ev, ch; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.off(ev, ch);
			}
		},
		_buildEvents: function(){
			if (this.isInput){ // single input
				this._events = [
					[this.element, {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}]
				];
			}
			else if (this.component && this.hasInput){ // component: input + button
				this._events = [
					// For components that are not readonly, allow keyboard nav
					[this.element.find('input'), {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}],
					[this.component, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			else if (this.element.is('div')){  // inline datepicker
				this.isInline = true;
			}
			else {
				this._events = [
					[this.element, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			this._events.push(
				// Component: listen for blur on element descendants
				[this.element, '*', {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}],
				// Input: listen for blur on element
				[this.element, {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}]
			);

			this._secondaryEvents = [
				[this.picker, {
					click: $.proxy(this.click, this)
				}],
				[$(window), {
					resize: $.proxy(this.place, this)
				}],
				[$(document), {
					'mousedown touchstart': $.proxy(function(e){
						// Clicked outside the datepicker, hide it
						if (!(
							this.element.is(e.target) ||
							this.element.find(e.target).length ||
							this.picker.is(e.target) ||
							this.picker.find(e.target).length
						)){
							this.hide();
						}
					}, this)
				}]
			];
		},
		_attachEvents: function(){
			this._detachEvents();
			this._applyEvents(this._events);
		},
		_detachEvents: function(){
			this._unapplyEvents(this._events);
		},
		_attachSecondaryEvents: function(){
			this._detachSecondaryEvents();
			this._applyEvents(this._secondaryEvents);
		},
		_detachSecondaryEvents: function(){
			this._unapplyEvents(this._secondaryEvents);
		},
		_trigger: function(event, altdate){
			var date = altdate || this.dates.get(-1),
				local_date = this._utc_to_local(date);

			this.element.trigger({
				type: event,
				date: local_date,
				dates: $.map(this.dates, this._utc_to_local),
				format: $.proxy(function(ix, format){
					if (arguments.length === 0){
						ix = this.dates.length - 1;
						format = this.o.format;
					}
					else if (typeof ix === 'string'){
						format = ix;
						ix = this.dates.length - 1;
					}
					format = format || this.o.format;
					var date = this.dates.get(ix);
					return DPGlobal.formatDate(date, format, this.o.language);
				}, this)
			});
		},

		show: function(){
			if (!this.isInline)
				this.picker.appendTo('body');
			this.picker.show();
			this.place();
			this._attachSecondaryEvents();
			this._trigger('show');
		},

		hide: function(){
			if (this.isInline)
				return;
			if (!this.picker.is(':visible'))
				return;
			this.focusDate = null;
			this.picker.hide().detach();
			this._detachSecondaryEvents();
			this.viewMode = this.o.startView;
			this.showMode();

			if (
				this.o.forceParse &&
				(
					this.isInput && this.element.val() ||
					this.hasInput && this.element.find('input').val()
				)
			)
				this.setValue();
			this._trigger('hide');
		},

		remove: function(){
			this.hide();
			this._detachEvents();
			this._detachSecondaryEvents();
			this.picker.remove();
			delete this.element.data().datepicker;
			if (!this.isInput){
				delete this.element.data().date;
			}
		},

		_utc_to_local: function(utc){
			return utc && new Date(utc.getTime() + (utc.getTimezoneOffset()*60000));
		},
		_local_to_utc: function(local){
			return local && new Date(local.getTime() - (local.getTimezoneOffset()*60000));
		},
		_zero_time: function(local){
			return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
		},
		_zero_utc_time: function(utc){
			return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
		},

		getDates: function(){
			return $.map(this.dates, this._utc_to_local);
		},

		getUTCDates: function(){
			return $.map(this.dates, function(d){
				return new Date(d);
			});
		},

		getDate: function(){
			return this._utc_to_local(this.getUTCDate());
		},

		getUTCDate: function(){
			return new Date(this.dates.get(-1));
		},

		setDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, args);
			this._trigger('changeDate');
			this.setValue();
		},

		setUTCDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, $.map(args, this._utc_to_local));
			this._trigger('changeDate');
			this.setValue();
		},

		setDate: alias('setDates'),
		setUTCDate: alias('setUTCDates'),

		setValue: function(){
			var formatted = this.getFormattedDate();
			if (!this.isInput){
				if (this.component){
					this.element.find('input').val(formatted).change();
				}
			}
			else {
				this.element.val(formatted).change();
			}
		},

		getFormattedDate: function(format){
			if (format === undefined)
				format = this.o.format;

			var lang = this.o.language;
			return $.map(this.dates, function(d){
				return DPGlobal.formatDate(d, format, lang);
			}).join(this.o.multidateSeparator);
		},

		setStartDate: function(startDate){
			this._process_options({startDate: startDate});
			this.update();
			this.updateNavArrows();
		},

		setEndDate: function(endDate){
			this._process_options({endDate: endDate});
			this.update();
			this.updateNavArrows();
		},

		setDaysOfWeekDisabled: function(daysOfWeekDisabled){
			this._process_options({daysOfWeekDisabled: daysOfWeekDisabled});
			this.update();
			this.updateNavArrows();
		},

		place: function(){
			if (this.isInline)
				return;
			var calendarWidth = this.picker.outerWidth(),
				calendarHeight = this.picker.outerHeight(),
				visualPadding = 10,
				windowWidth = $window.width(),
				windowHeight = $window.height(),
				scrollTop = $window.scrollTop();

			var zIndex = parseInt(this.element.parents().filter(function(){
					return $(this).css('z-index') !== 'auto';
				}).first().css('z-index'))+10;
			var offset = this.component ? this.component.parent().offset() : this.element.offset();
			var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(false);
			var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(false);
			var left = offset.left,
				top = offset.top;

			this.picker.removeClass(
				'datepicker-orient-top datepicker-orient-bottom '+
				'datepicker-orient-right datepicker-orient-left'
			);

			if (this.o.orientation.x !== 'auto'){
				this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
				if (this.o.orientation.x === 'right')
					left -= calendarWidth - width;
			}
			// auto x orientation is best-placement: if it crosses a window
			// edge, fudge it sideways
			else {
				// Default to left
				this.picker.addClass('datepicker-orient-left');
				if (offset.left < 0)
					left -= offset.left - visualPadding;
				else if (offset.left + calendarWidth > windowWidth)
					left = windowWidth - calendarWidth - visualPadding;
			}

			// auto y orientation is best-situation: top or bottom, no fudging,
			// decision based on which shows more of the calendar
			var yorient = this.o.orientation.y,
				top_overflow, bottom_overflow;
			if (yorient === 'auto'){
				top_overflow = -scrollTop + offset.top - calendarHeight;
				bottom_overflow = scrollTop + windowHeight - (offset.top + height + calendarHeight);
				if (Math.max(top_overflow, bottom_overflow) === bottom_overflow)
					yorient = 'top';
				else
					yorient = 'bottom';
			}
			this.picker.addClass('datepicker-orient-' + yorient);
			if (yorient === 'top')
				top += height;
			else
				top -= calendarHeight + parseInt(this.picker.css('padding-top'));

			this.picker.css({
				top: top,
				left: left,
				zIndex: zIndex
			});
		},

		_allow_update: true,
		update: function(){
			if (!this._allow_update)
				return;

			var oldDates = this.dates.copy(),
				dates = [],
				fromArgs = false;
			if (arguments.length){
				$.each(arguments, $.proxy(function(i, date){
					if (date instanceof Date)
						date = this._local_to_utc(date);
					dates.push(date);
				}, this));
				fromArgs = true;
			}
			else {
				dates = this.isInput
						? this.element.val()
						: this.element.data('date') || this.element.find('input').val();
				if (dates && this.o.multidate)
					dates = dates.split(this.o.multidateSeparator);
				else
					dates = [dates];
				delete this.element.data().date;
			}

			dates = $.map(dates, $.proxy(function(date){
				return DPGlobal.parseDate(date, this.o.format, this.o.language);
			}, this));
			dates = $.grep(dates, $.proxy(function(date){
				return (
					date < this.o.startDate ||
					date > this.o.endDate ||
					!date
				);
			}, this), true);
			this.dates.replace(dates);

			if (this.dates.length)
				this.viewDate = new Date(this.dates.get(-1));
			else if (this.viewDate < this.o.startDate)
				this.viewDate = new Date(this.o.startDate);
			else if (this.viewDate > this.o.endDate)
				this.viewDate = new Date(this.o.endDate);

			if (fromArgs){
				// setting date by clicking
				this.setValue();
			}
			else if (dates.length){
				// setting date by typing
				if (String(oldDates) !== String(this.dates))
					this._trigger('changeDate');
			}
			if (!this.dates.length && oldDates.length)
				this._trigger('clearDate');

			this.fill();
		},

		fillDow: function(){
			var dowCnt = this.o.weekStart,
				html = '<tr>';
			if (this.o.calendarWeeks){
				var cell = '<th class="cw">&nbsp;</th>';
				html += cell;
				this.picker.find('.datepicker-days thead tr:first-child').prepend(cell);
			}
			while (dowCnt < this.o.weekStart + 7){
				html += '<th class="dow">'+dates[this.o.language].daysMin[(dowCnt++)%7]+'</th>';
			}
			html += '</tr>';
			this.picker.find('.datepicker-days thead').append(html);
		},

		fillMonths: function(){
			var html = '',
			i = 0;
			while (i < 12){
				html += '<span class="month">'+dates[this.o.language].monthsShort[i++]+'</span>';
			}
			this.picker.find('.datepicker-months td').html(html);
		},

		setRange: function(range){
			if (!range || !range.length)
				delete this.range;
			else
				this.range = $.map(range, function(d){
					return d.valueOf();
				});
			this.fill();
		},

		getClassNames: function(date){
			var cls = [],
				year = this.viewDate.getUTCFullYear(),
				month = this.viewDate.getUTCMonth(),
				today = new Date();
			if (date.getUTCFullYear() < year || (date.getUTCFullYear() === year && date.getUTCMonth() < month)){
				cls.push('old');
			}
			else if (date.getUTCFullYear() > year || (date.getUTCFullYear() === year && date.getUTCMonth() > month)){
				cls.push('new');
			}
			if (this.focusDate && date.valueOf() === this.focusDate.valueOf())
				cls.push('focused');
			// Compare internal UTC date with local today, not UTC today
			if (this.o.todayHighlight &&
				date.getUTCFullYear() === today.getFullYear() &&
				date.getUTCMonth() === today.getMonth() &&
				date.getUTCDate() === today.getDate()){
				cls.push('today');
			}
			if (this.dates.contains(date) !== -1)
				cls.push('active');
			if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate ||
				$.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1){
				cls.push('disabled');
			}
			if (this.range){
				if (date > this.range[0] && date < this.range[this.range.length-1]){
					cls.push('range');
				}
				if ($.inArray(date.valueOf(), this.range) !== -1){
					cls.push('selected');
				}
			}
			return cls;
		},

		fill: function(){
			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth(),
				startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -Infinity,
				startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -Infinity,
				endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
				endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
				todaytxt = dates[this.o.language].today || dates['en'].today || '',
				cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
				tooltip;
			this.picker.find('.datepicker-days thead th.datepicker-switch')
						.text(dates[this.o.language].months[month]+' '+year);
			this.picker.find('tfoot th.today')
						.text(todaytxt)
						.toggle(this.o.todayBtn !== false);
			this.picker.find('tfoot th.clear')
						.text(cleartxt)
						.toggle(this.o.clearBtn !== false);
			this.updateNavArrows();
			this.fillMonths();
			var prevMonth = UTCDate(year, month-1, 28),
				day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
			prevMonth.setUTCDate(day);
			prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7)%7);
			var nextMonth = new Date(prevMonth);
			nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
			nextMonth = nextMonth.valueOf();
			var html = [];
			var clsName;
			while (prevMonth.valueOf() < nextMonth){
				if (prevMonth.getUTCDay() === this.o.weekStart){
					html.push('<tr>');
					if (this.o.calendarWeeks){
						// ISO 8601: First week contains first thursday.
						// ISO also states week starts on Monday, but we can be more abstract here.
						var
							// Start of current week: based on weekstart/current date
							ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) % 7 * 864e5),
							// Thursday of this week
							th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),
							// First Thursday of year, year from thursday
							yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 - yth.getUTCDay())%7*864e5),
							// Calendar week: ms between thursdays, div ms per day, div 7 days
							calWeek =  (th - yth) / 864e5 / 7 + 1;
						html.push('<td class="cw">'+ calWeek +'</td>');

					}
				}
				clsName = this.getClassNames(prevMonth);
				clsName.push('day');

				if (this.o.beforeShowDay !== $.noop){
					var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
					if (before === undefined)
						before = {};
					else if (typeof(before) === 'boolean')
						before = {enabled: before};
					else if (typeof(before) === 'string')
						before = {classes: before};
					if (before.enabled === false)
						clsName.push('disabled');
					if (before.classes)
						clsName = clsName.concat(before.classes.split(/\s+/));
					if (before.tooltip)
						tooltip = before.tooltip;
				}

				clsName = $.unique(clsName);
				html.push('<td class="'+clsName.join(' ')+'"' + (tooltip ? ' title="'+tooltip+'"' : '') + '>'+prevMonth.getUTCDate() + '</td>');
				if (prevMonth.getUTCDay() === this.o.weekEnd){
					html.push('</tr>');
				}
				prevMonth.setUTCDate(prevMonth.getUTCDate()+1);
			}
			this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

			var months = this.picker.find('.datepicker-months')
						.find('th:eq(1)')
							.text(year)
							.end()
						.find('span').removeClass('active');

			$.each(this.dates, function(i, d){
				if (d.getUTCFullYear() === year)
					months.eq(d.getUTCMonth()).addClass('active');
			});

			if (year < startYear || year > endYear){
				months.addClass('disabled');
			}
			if (year === startYear){
				months.slice(0, startMonth).addClass('disabled');
			}
			if (year === endYear){
				months.slice(endMonth+1).addClass('disabled');
			}

			html = '';
			year = parseInt(year/10, 10) * 10;
			var yearCont = this.picker.find('.datepicker-years')
								.find('th:eq(1)')
									.text(year + '-' + (year + 9))
									.end()
								.find('td');
			year -= 1;
			var years = $.map(this.dates, function(d){
					return d.getUTCFullYear();
				}),
				classes;
			for (var i = -1; i < 11; i++){
				classes = ['year'];
				if (i === -1)
					classes.push('old');
				else if (i === 10)
					classes.push('new');
				if ($.inArray(year, years) !== -1)
					classes.push('active');
				if (year < startYear || year > endYear)
					classes.push('disabled');
				html += '<span class="' + classes.join(' ') + '">'+year+'</span>';
				year += 1;
			}
			yearCont.html(html);
		},

		updateNavArrows: function(){
			if (!this._allow_update)
				return;

			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth();
			switch (this.viewMode){
				case 0:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() && month <= this.o.startDate.getUTCMonth()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() && month >= this.o.endDate.getUTCMonth()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
				case 1:
				case 2:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
			}
		},

		click: function(e){
			e.preventDefault();
			var target = $(e.target).closest('span, td, th'),
				year, month, day;
			if (target.length === 1){
				switch (target[0].nodeName.toLowerCase()){
					case 'th':
						switch (target[0].className){
							case 'datepicker-switch':
								this.showMode(1);
								break;
							case 'prev':
							case 'next':
								var dir = DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1);
								switch (this.viewMode){
									case 0:
										this.viewDate = this.moveMonth(this.viewDate, dir);
										this._trigger('changeMonth', this.viewDate);
										break;
									case 1:
									case 2:
										this.viewDate = this.moveYear(this.viewDate, dir);
										if (this.viewMode === 1)
											this._trigger('changeYear', this.viewDate);
										break;
								}
								this.fill();
								break;
							case 'today':
								var date = new Date();
								date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);

								this.showMode(-2);
								var which = this.o.todayBtn === 'linked' ? null : 'view';
								this._setDate(date, which);
								break;
							case 'clear':
								var element;
								if (this.isInput)
									element = this.element;
								else if (this.component)
									element = this.element.find('input');
								if (element)
									element.val("").change();
								this.update();
								this._trigger('changeDate');
								if (this.o.autoclose)
									this.hide();
								break;
						}
						break;
					case 'span':
						if (!target.is('.disabled')){
							this.viewDate.setUTCDate(1);
							if (target.is('.month')){
								day = 1;
								month = target.parent().find('span').index(target);
								year = this.viewDate.getUTCFullYear();
								this.viewDate.setUTCMonth(month);
								this._trigger('changeMonth', this.viewDate);
								if (this.o.minViewMode === 1){
									this._setDate(UTCDate(year, month, day));
								}
							}
							else {
								day = 1;
								month = 0;
								year = parseInt(target.text(), 10)||0;
								this.viewDate.setUTCFullYear(year);
								this._trigger('changeYear', this.viewDate);
								if (this.o.minViewMode === 2){
									this._setDate(UTCDate(year, month, day));
								}
							}
							this.showMode(-1);
							this.fill();
						}
						break;
					case 'td':
						if (target.is('.day') && !target.is('.disabled')){
							day = parseInt(target.text(), 10)||1;
							year = this.viewDate.getUTCFullYear();
							month = this.viewDate.getUTCMonth();
							if (target.is('.old')){
								if (month === 0){
									month = 11;
									year -= 1;
								}
								else {
									month -= 1;
								}
							}
							else if (target.is('.new')){
								if (month === 11){
									month = 0;
									year += 1;
								}
								else {
									month += 1;
								}
							}
							this._setDate(UTCDate(year, month, day));
						}
						break;
				}
			}
			if (this.picker.is(':visible') && this._focused_from){
				$(this._focused_from).focus();
			}
			delete this._focused_from;
		},

		_toggle_multidate: function(date){
			var ix = this.dates.contains(date);
			if (!date){
				this.dates.clear();
			}
			else if (ix !== -1){
				this.dates.remove(ix);
			}
			else {
				this.dates.push(date);
			}
			if (typeof this.o.multidate === 'number')
				while (this.dates.length > this.o.multidate)
					this.dates.remove(0);
		},

		_setDate: function(date, which){
			if (!which || which === 'date')
				this._toggle_multidate(date && new Date(date));
			if (!which || which  === 'view')
				this.viewDate = date && new Date(date);

			this.fill();
			this.setValue();
			this._trigger('changeDate');
			var element;
			if (this.isInput){
				element = this.element;
			}
			else if (this.component){
				element = this.element.find('input');
			}
			if (element){
				element.change();
			}
			if (this.o.autoclose && (!which || which === 'date')){
				this.hide();
			}
		},

		moveMonth: function(date, dir){
			if (!date)
				return undefined;
			if (!dir)
				return date;
			var new_date = new Date(date.valueOf()),
				day = new_date.getUTCDate(),
				month = new_date.getUTCMonth(),
				mag = Math.abs(dir),
				new_month, test;
			dir = dir > 0 ? 1 : -1;
			if (mag === 1){
				test = dir === -1
					// If going back one month, make sure month is not current month
					// (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
					? function(){
						return new_date.getUTCMonth() === month;
					}
					// If going forward one month, make sure month is as expected
					// (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
					: function(){
						return new_date.getUTCMonth() !== new_month;
					};
				new_month = month + dir;
				new_date.setUTCMonth(new_month);
				// Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
				if (new_month < 0 || new_month > 11)
					new_month = (new_month + 12) % 12;
			}
			else {
				// For magnitudes >1, move one month at a time...
				for (var i=0; i < mag; i++)
					// ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
					new_date = this.moveMonth(new_date, dir);
				// ...then reset the day, keeping it in the new month
				new_month = new_date.getUTCMonth();
				new_date.setUTCDate(day);
				test = function(){
					return new_month !== new_date.getUTCMonth();
				};
			}
			// Common date-resetting loop -- if date is beyond end of month, make it
			// end of month
			while (test()){
				new_date.setUTCDate(--day);
				new_date.setUTCMonth(new_month);
			}
			return new_date;
		},

		moveYear: function(date, dir){
			return this.moveMonth(date, dir*12);
		},

		dateWithinRange: function(date){
			return date >= this.o.startDate && date <= this.o.endDate;
		},

		keydown: function(e){
			if (this.picker.is(':not(:visible)')){
				if (e.keyCode === 27) // allow escape to hide and re-show picker
					this.show();
				return;
			}
			var dateChanged = false,
				dir, newDate, newViewDate,
				focusDate = this.focusDate || this.viewDate;
			switch (e.keyCode){
				case 27: // escape
					if (this.focusDate){
						this.focusDate = null;
						this.viewDate = this.dates.get(-1) || this.viewDate;
						this.fill();
					}
					else
						this.hide();
					e.preventDefault();
					break;
				case 37: // left
				case 39: // right
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 37 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 38: // up
				case 40: // down
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 38 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 32: // spacebar
					// Spacebar is used in manually typing dates in some formats.
					// As such, its behavior should not be hijacked.
					break;
				case 13: // enter
					focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
					this._toggle_multidate(focusDate);
					dateChanged = true;
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.setValue();
					this.fill();
					if (this.picker.is(':visible')){
						e.preventDefault();
						if (this.o.autoclose)
							this.hide();
					}
					break;
				case 9: // tab
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.fill();
					this.hide();
					break;
			}
			if (dateChanged){
				if (this.dates.length)
					this._trigger('changeDate');
				else
					this._trigger('clearDate');
				var element;
				if (this.isInput){
					element = this.element;
				}
				else if (this.component){
					element = this.element.find('input');
				}
				if (element){
					element.change();
				}
			}
		},

		showMode: function(dir){
			if (dir){
				this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
			}
			this.picker
				.find('>div')
				.hide()
				.filter('.datepicker-'+DPGlobal.modes[this.viewMode].clsName)
					.css('display', 'block');
			this.updateNavArrows();
		}
	};

	var DateRangePicker = function(element, options){
		this.element = $(element);
		this.inputs = $.map(options.inputs, function(i){
			return i.jquery ? i[0] : i;
		});
		delete options.inputs;

		$(this.inputs)
			.datepicker(options)
			.bind('changeDate', $.proxy(this.dateUpdated, this));

		this.pickers = $.map(this.inputs, function(i){
			return $(i).data('datepicker');
		});
		this.updateDates();
	};
	DateRangePicker.prototype = {
		updateDates: function(){
			this.dates = $.map(this.pickers, function(i){
				return i.getUTCDate();
			});
			this.updateRanges();
		},
		updateRanges: function(){
			var range = $.map(this.dates, function(d){
				return d.valueOf();
			});
			$.each(this.pickers, function(i, p){
				p.setRange(range);
			});
		},
		dateUpdated: function(e){
			// `this.updating` is a workaround for preventing infinite recursion
			// between `changeDate` triggering and `setUTCDate` calling.  Until
			// there is a better mechanism.
			if (this.updating)
				return;
			this.updating = true;

			var dp = $(e.target).data('datepicker'),
				new_date = dp.getUTCDate(),
				i = $.inArray(e.target, this.inputs),
				l = this.inputs.length;
			if (i === -1)
				return;

			$.each(this.pickers, function(i, p){
				if (!p.getUTCDate())
					p.setUTCDate(new_date);
			});

			if (new_date < this.dates[i]){
				// Date being moved earlier/left
				while (i >= 0 && new_date < this.dates[i]){
					this.pickers[i--].setUTCDate(new_date);
				}
			}
			else if (new_date > this.dates[i]){
				// Date being moved later/right
				while (i < l && new_date > this.dates[i]){
					this.pickers[i++].setUTCDate(new_date);
				}
			}
			this.updateDates();

			delete this.updating;
		},
		remove: function(){
			$.map(this.pickers, function(p){ p.remove(); });
			delete this.element.data().datepicker;
		}
	};

	function opts_from_el(el, prefix){
		// Derive options from element data-attrs
		var data = $(el).data(),
			out = {}, inkey,
			replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
		prefix = new RegExp('^' + prefix.toLowerCase());
		function re_lower(_,a){
			return a.toLowerCase();
		}
		for (var key in data)
			if (prefix.test(key)){
				inkey = key.replace(replace, re_lower);
				out[inkey] = data[key];
			}
		return out;
	}

	function opts_from_locale(lang){
		// Derive options from locale plugins
		var out = {};
		// Check if "de-DE" style date is available, if not language should
		// fallback to 2 letter code eg "de"
		if (!dates[lang]){
			lang = lang.split('-')[0];
			if (!dates[lang])
				return;
		}
		var d = dates[lang];
		$.each(locale_opts, function(i,k){
			if (k in d)
				out[k] = d[k];
		});
		return out;
	}

	var old = $.fn.datepicker;
	$.fn.datepicker = function(option){
		var args = Array.apply(null, arguments);
		args.shift();
		var internal_return;
		this.each(function(){
			var $this = $(this),
				data = $this.data('datepicker'),
				options = typeof option === 'object' && option;
			if (!data){
				var elopts = opts_from_el(this, 'date'),
					// Preliminary otions
					xopts = $.extend({}, defaults, elopts, options),
					locopts = opts_from_locale(xopts.language),
					// Options priority: js args, data-attrs, locales, defaults
					opts = $.extend({}, defaults, locopts, elopts, options);
				if ($this.is('.input-daterange') || opts.inputs){
					var ropts = {
						inputs: opts.inputs || $this.find('input').toArray()
					};
					$this.data('datepicker', (data = new DateRangePicker(this, $.extend(opts, ropts))));
				}
				else {
					$this.data('datepicker', (data = new Datepicker(this, opts)));
				}
			}
			if (typeof option === 'string' && typeof data[option] === 'function'){
				internal_return = data[option].apply(data, args);
				if (internal_return !== undefined)
					return false;
			}
		});
		if (internal_return !== undefined)
			return internal_return;
		else
			return this;
	};

	var defaults = $.fn.datepicker.defaults = {
		autoclose: false,
		beforeShowDay: $.noop,
		calendarWeeks: false,
		clearBtn: false,
		daysOfWeekDisabled: [],
		endDate: Infinity,
		forceParse: true,
		format: 'mm/dd/yyyy',
		keyboardNavigation: true,
		language: 'en',
		minViewMode: 0,
		multidate: false,
		multidateSeparator: ',',
		orientation: "auto",
		rtl: false,
		startDate: -Infinity,
		startView: 0,
		todayBtn: false,
		todayHighlight: false,
		weekStart: 0
	};
	var locale_opts = $.fn.datepicker.locale_opts = [
		'format',
		'rtl',
		'weekStart'
	];
	$.fn.datepicker.Constructor = Datepicker;
	var dates = $.fn.datepicker.dates = {
		en: {
			days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			today: "Today",
			clear: "Clear"
		}
	};

	var DPGlobal = {
		modes: [
			{
				clsName: 'days',
				navFnc: 'Month',
				navStep: 1
			},
			{
				clsName: 'months',
				navFnc: 'FullYear',
				navStep: 1
			},
			{
				clsName: 'years',
				navFnc: 'FullYear',
				navStep: 10
		}],
		isLeapYear: function(year){
			return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
		},
		getDaysInMonth: function(year, month){
			return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
		},
		validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
		nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
		parseFormat: function(format){
			// IE treats \0 as a string end in inputs (truncating the value),
			// so it's a bad format delimiter, anyway
			var separators = format.replace(this.validParts, '\0').split('\0'),
				parts = format.match(this.validParts);
			if (!separators || !separators.length || !parts || parts.length === 0){
				throw new Error("Invalid date format.");
			}
			return {separators: separators, parts: parts};
		},
		parseDate: function(date, format, language){
			if (!date)
				return undefined;
			if (date instanceof Date)
				return date;
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var part_re = /([\-+]\d+)([dmwy])/,
				parts = date.match(/([\-+]\d+)([dmwy])/g),
				part, dir, i;
			if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)){
				date = new Date();
				for (i=0; i < parts.length; i++){
					part = part_re.exec(parts[i]);
					dir = parseInt(part[1]);
					switch (part[2]){
						case 'd':
							date.setUTCDate(date.getUTCDate() + dir);
							break;
						case 'm':
							date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
							break;
						case 'w':
							date.setUTCDate(date.getUTCDate() + dir * 7);
							break;
						case 'y':
							date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
							break;
					}
				}
				return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
			}
			parts = date && date.match(this.nonpunctuation) || [];
			date = new Date();
			var parsed = {},
				setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
				setters_map = {
					yyyy: function(d,v){
						return d.setUTCFullYear(v);
					},
					yy: function(d,v){
						return d.setUTCFullYear(2000+v);
					},
					m: function(d,v){
						if (isNaN(d))
							return d;
						v -= 1;
						while (v < 0) v += 12;
						v %= 12;
						d.setUTCMonth(v);
						while (d.getUTCMonth() !== v)
							d.setUTCDate(d.getUTCDate()-1);
						return d;
					},
					d: function(d,v){
						return d.setUTCDate(v);
					}
				},
				val, filtered;
			setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
			setters_map['dd'] = setters_map['d'];
			date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
			var fparts = format.parts.slice();
			// Remove noop parts
			if (parts.length !== fparts.length){
				fparts = $(fparts).filter(function(i,p){
					return $.inArray(p, setters_order) !== -1;
				}).toArray();
			}
			// Process remainder
			function match_part(){
				var m = this.slice(0, parts[i].length),
					p = parts[i].slice(0, m.length);
				return m === p;
			}
			if (parts.length === fparts.length){
				var cnt;
				for (i=0, cnt = fparts.length; i < cnt; i++){
					val = parseInt(parts[i], 10);
					part = fparts[i];
					if (isNaN(val)){
						switch (part){
							case 'MM':
								filtered = $(dates[language].months).filter(match_part);
								val = $.inArray(filtered[0], dates[language].months) + 1;
								break;
							case 'M':
								filtered = $(dates[language].monthsShort).filter(match_part);
								val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
								break;
						}
					}
					parsed[part] = val;
				}
				var _date, s;
				for (i=0; i < setters_order.length; i++){
					s = setters_order[i];
					if (s in parsed && !isNaN(parsed[s])){
						_date = new Date(date);
						setters_map[s](_date, parsed[s]);
						if (!isNaN(_date))
							date = _date;
					}
				}
			}
			return date;
		},
		formatDate: function(date, format, language){
			if (!date)
				return '';
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var val = {
				d: date.getUTCDate(),
				D: dates[language].daysShort[date.getUTCDay()],
				DD: dates[language].days[date.getUTCDay()],
				m: date.getUTCMonth() + 1,
				M: dates[language].monthsShort[date.getUTCMonth()],
				MM: dates[language].months[date.getUTCMonth()],
				yy: date.getUTCFullYear().toString().substring(2),
				yyyy: date.getUTCFullYear()
			};
			val.dd = (val.d < 10 ? '0' : '') + val.d;
			val.mm = (val.m < 10 ? '0' : '') + val.m;
			date = [];
			var seps = $.extend([], format.separators);
			for (var i=0, cnt = format.parts.length; i <= cnt; i++){
				if (seps.length)
					date.push(seps.shift());
				date.push(val[format.parts[i]]);
			}
			return date.join('');
		},
		headTemplate: '<thead>'+
							'<tr>'+
								'<th class="prev">&laquo;</th>'+
								'<th colspan="5" class="datepicker-switch"></th>'+
								'<th class="next">&raquo;</th>'+
							'</tr>'+
						'</thead>',
		contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
		footTemplate: '<tfoot>'+
							'<tr>'+
								'<th colspan="7" class="today"></th>'+
							'</tr>'+
							'<tr>'+
								'<th colspan="7" class="clear"></th>'+
							'</tr>'+
						'</tfoot>'
	};
	DPGlobal.template = '<div class="datepicker">'+
							'<div class="datepicker-days">'+
								'<table class=" table-condensed">'+
									DPGlobal.headTemplate+
									'<tbody></tbody>'+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-months">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-years">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
						'</div>';

	$.fn.datepicker.DPGlobal = DPGlobal;


	/* DATEPICKER NO CONFLICT
	* =================== */

	$.fn.datepicker.noConflict = function(){
		$.fn.datepicker = old;
		return this;
	};


	/* DATEPICKER DATA-API
	* ================== */

	$(document).on(
		'focus.datepicker.data-api click.datepicker.data-api',
		'[data-provide="datepicker"]',
		function(e){
			var $this = $(this);
			if ($this.data('datepicker'))
				return;
			e.preventDefault();
			// component click requires us to explicitly show it
			$this.datepicker('show');
		}
	);
	$(function(){
		$('[data-provide="datepicker-inline"]').datepicker();
	});

}(window.jQuery));

!function(a){a.fn.datepicker.dates.es={days:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],daysShort:["Dom","Lun","Mar","Mié","Jue","Vie","Sáb"],daysMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],today:"Hoy",monthsTitle:"Meses",clear:"Borrar",weekStart:1,format:"dd/mm/yyyy"}}(jQuery);
$(document).ready(function () {
    $('.input-group.date').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd-mm-yyyy',
        orientation: 'top',
        todayBtn: true,
        todayHighlight: true
    });
});
