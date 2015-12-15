//$(function() {
//    $( "input[type=submit]" )
//      .button()
//});
 function DisplayLogin() {
   document.getElementById('Register').style.display = "none";
   document.getElementById('Login').style.display = "block";
}
function DisplayRegister() {
  document.getElementById('Login').style.display = "none";
  document.getElementById('Register').style.display = "block";
}
function OverColor(obj) {
  obj.style.backgroundColor = '#0090ff';
}
function OutColor(obj) {
  obj.style.backgroundColor = '#0080ff';
}
function DownColor(obj) {
  obj.style.backgroundColor = '#00a0ff';
}
function UpColor(obj) {
  obj.style.backgroundColor = '#0090ff';
}