"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var dashboard =
/*#__PURE__*/
function () {
  function dashboard(data) {
    _classCallCheck(this, dashboard);

    this.data = data;
    this.createGraph();
  }

  _createClass(dashboard, [{
    key: "getData",
    value: function getData() {
      var _this = this;

      return new Promise(function (resolve) {
        $.ajax({
          url: '/dashboard/getData',
          success: function success(response) {
            resolve(_this.data = response);
          }
        });
      });
    }
  }, {
    key: "createGraph",
    value: function createGraph() {
      var _this2 = this;

      this.getData().then(function () {
        var cpm = document.getElementById('cpm').getContext('2d');
        var upm = document.getElementById('upm').getContext('2d');
        new Chart(cpm, {
          type: 'line',
          data: {
            labels: _this2.data.cpm.map(function (data) {
              return data.months;
            }),
            datasets: [{
              label: "Contacts per month",
              backgroundColor: 'rgb(22, 168, 134)',
              borderColor: 'rgb(22, 140, 42)',
              data: _this2.data.cpm.map(function (data) {
                return data.total;
              })
            }]
          },
          options: {}
        });
        new Chart(upm, {
          type: 'line',
          data: {
            labels: _this2.data.upm.map(function (data) {
              return data.months;
            }),
            datasets: [{
              label: "Contacts per month",
              backgroundColor: 'rgb(83, 0, 251)',
              borderColor: 'rgb(22, 0, 134)',
              data: _this2.data.upm.map(function (data) {
                return data.total;
              })
            }]
          },
          options: {}
        });
      });
    }
  }]);

  return dashboard;
}();

new dashboard();