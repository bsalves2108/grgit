"use strict";

$(document).ready(function () {
  login();
});

function login() {
  $('#loginBtn').click(function () {
    var data = $('#formLogin').serialize();
    $.ajax({
      url: '/login',
      data: data,
      method: 'POST',
      success: function success(request) {
        document.location = '/contacts';
      }
    });
  });
}