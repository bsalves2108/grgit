"use strict";function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,e){for(var a=0;a<e.length;a++){var n=e[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function _createClass(t,e,a){return e&&_defineProperties(t.prototype,e),a&&_defineProperties(t,a),t}var dashboard=function(){function t(e){_classCallCheck(this,t),this.data=e,this.createGraph()}return _createClass(t,[{key:"getData",value:function(){var t=this;return new Promise(function(e){$.ajax({url:"/dashboard/getData",success:function(a){e(t.data=a)}})})}},{key:"createGraph",value:function(){var t=this;this.getData().then(function(){var e=document.getElementById("cpm").getContext("2d"),a=document.getElementById("upm").getContext("2d");new Chart(e,{type:"line",data:{labels:t.data.cpm.map(function(t){return t.months}),datasets:[{label:"Contacts per month",backgroundColor:"rgb(22, 168, 134)",borderColor:"rgb(22, 140, 42)",data:t.data.cpm.map(function(t){return t.total})}]},options:{}}),new Chart(a,{type:"line",data:{labels:t.data.upm.map(function(t){return t.months}),datasets:[{label:"Contacts per month",backgroundColor:"rgb(83, 0, 251)",borderColor:"rgb(22, 0, 134)",data:t.data.upm.map(function(t){return t.total})}]},options:{}})})}}]),t}();new dashboard;