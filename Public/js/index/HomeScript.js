//$(function() {
//    $( "input[type=submit]" )
//      .button()
//});
 function DisplayLogin() {
   document.getElementById('Register').style.visibility = "hidden";
   document.getElementById('Login').style.visibility = "visible";
}
function DisplayRegister() {
  document.getElementById('Login').style.visibility = "hidden";
  document.getElementById('Register').style.visibility = "visible";
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