"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$(document).ready(function () {
  new editContact();
});

var editContact =
/*#__PURE__*/
function () {
  function editContact() {
    _classCallCheck(this, editContact);

    this.edit();
  }

  _createClass(editContact, [{
    key: "edit",
    value: function edit() {
      $('#submitEdit').click(function (event) {
        var data = $('#editContactForm').serialize();
        $.ajax({
          url: '/contacts/edit',
          data: data,
          method: 'post',
          success: function success() {
            document.location = '/contacts';
          }
        });
      });
    }
  }]);

  return editContact;
}();