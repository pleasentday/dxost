var btns = document.getElementsByClassName('menu');
var par = document.getElementsByClassName('des');
btns[0].onclick = function() {
  par[0].classList.remove("des_on");
}
btns[1].onclick = function() {
  par[0].classList.add("des_on");
}
