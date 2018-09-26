"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

$(document).ready(function () {
  new contact();
});

var contact =
/*#__PURE__*/
function (_view) {
  _inherits(contact, _view);

  function contact(data) {
    var _this;

    _classCallCheck(this, contact);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(contact).call(this, $('.right-content').html()));
    $('.list-group-item-action').on('click', function (event) {
      _this.inactiveAll();

      $(event.currentTarget).addClass('active');
      var id = $(event.currentTarget).data('id');
      $.ajax({
        url: 'contacts/' + id,
        success: function success(response) {
          response.createdAt = moment(response.createdAt).format('DD/MM/YYYY HH:mm:ss');
          response.lastUpdate = moment(response.lastUpdate).format('DD/MM/YYYY HH:mm:ss');

          _get(_getPrototypeOf(contact.prototype), "dataBindSimulator", _assertThisInitialized(_this)).call(_assertThisInitialized(_this), response, $('.right-content'));

          _this.contactChosen();

          _this.removeContact();
        }
      });
    });
    return _this;
  }

  _createClass(contact, [{
    key: "removeContact",
    value: function removeContact() {
      var _this2 = this;

      $('.removeContact').on('click', function (event) {
        var id = $(event.currentTarget).data('id');
        $('#removeConfirm').modal('show');
        $('#confirmRemove').on('click', function () {
          _this2.reallyRemove(id);
        });
      });
    }
  }, {
    key: "reallyRemove",
    value: function reallyRemove(id) {
      $.ajax({
        url: '/contacts/remove/' + id,
        success: function success() {
          document.location = '/contacts';
        }
      });
    }
  }, {
    key: "contactChosen",
    value: function contactChosen() {
      $('.info-data').show();
      $('.chose-one').hide();
    }
  }, {
    key: "inactiveAll",
    value: function inactiveAll() {
      $('.list-group-item-action').removeClass('active');
    }
  }]);

  return contact;
}(view);