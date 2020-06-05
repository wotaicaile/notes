var one = document.querySelector('.one');
var two = document.querySelector('.two');
var three = document.querySelector('.three');
var four = document.querySelector('.four');

var p1 = document.querySelector('.p1');
var p2 = document.querySelector('.p2');
var p3 = document.querySelector('.p3');
var p4 = document.querySelector('.p4');
var ep = document.querySelector('.empty');

one.onclick = function(){

	ep.innerHTML = p1.innerHTML;
	// lx被覆盖，为zzq的值。
}
two.onclick = function(){

	ep.innerHTML = p2.innerHTML;

}
three.onclick = function(){
	ep.innerHTML = p3.innerHTML; 
}
four.onclick = function(){
	ep.innerHTML = p4.innerHTML; 
}