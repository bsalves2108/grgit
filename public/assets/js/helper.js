"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

String.prototype.replaceAll = function (searchStr, replaceStr) {
  var str = this;

  if (str.indexOf(searchStr) === -1) {
    return str;
  }

  return str.replace(searchStr, replaceStr).replaceAll(searchStr, replaceStr);
};

var view =
/*#__PURE__*/
function () {
  function view(data) {
    _classCallCheck(this, view);

    this.data = data;
  }

  _createClass(view, [{
    key: "dataBindSimulator",
    value: function dataBindSimulator(object, target) {
      $(target).html(this.data);
      var newHtml = $(target).html();

      for (var x in object) {
        newHtml = newHtml.replaceAll('{{' + x + '}}', object[x]);
      }

      $(target).html(newHtml);
    }
  }]);

  return view;
}();