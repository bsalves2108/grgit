"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$(document).ready(function () {
  new newContact();
});

var newContact =
/*#__PURE__*/
function () {
  function newContact() {
    _classCallCheck(this, newContact);

    this.new();
    this.validator();
  }

  _createClass(newContact, [{
    key: "validator",
    value: function validator() {
      $("#newContactForm").validate({
        rules: {
          name: "required",
          email: {
            required: true,
            email: true
          },
          phone: {
            required: true,
            minlength: 15
          }
        },
        messages: {
          name: "Please enter your name",
          email: "Please enter a valid email address",
          phone: "Please enter your phone"
        }
      });
    }
  }, {
    key: "new",
    value: function _new() {
      var form = $("#newContactForm");
      form.validate();
      $("#submitNew").click(function (e) {
        e.preventDefault();

        if (form.valid()) {
          var data = form.serialize();
          $.ajax({
            url: '/contacts/new',
            type: 'POST',
            data: data,
            success: function success() {
              document.location = '/contacts';
            }
          });
        }
      });
    }
  }]);

  return newContact;
}();