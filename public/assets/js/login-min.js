"use strict";function login(){$("#loginBtn").click(function(){var n=$("#formLogin").serialize();$.ajax({url:"/login",data:n,method:"POST",success:function(n){document.location="/contacts"}})})}$(document).ready(function(){login()});