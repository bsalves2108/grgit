"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}function _createClass(e,t,n){return t&&_defineProperties(e.prototype,t),n&&_defineProperties(e,n),e}$(document).ready(function(){new editContact});var editContact=function(){function e(){_classCallCheck(this,e),this.edit()}return _createClass(e,[{key:"edit",value:function(){$("#submitEdit").click(function(e){var t=$("#editContactForm").serialize();$.ajax({url:"/contacts/edit",data:t,method:"post",success:function(){document.location="/contacts"}})})}}]),e}();