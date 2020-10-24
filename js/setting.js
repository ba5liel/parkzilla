function openSetting(){
  document.getElementById('setting').style.width = '350px';
}
function closeX(){
  document.getElementById('setting').style.width = '0';
}
var acc = document.getElementsByClassName('acc');
for(var i = 0; i <acc.length; i++){
  acc[i].onclick = function(){
      this.classList.toggle('activeA');
      this.nextElementSibling.classList.toggle('show');
    };
}
var acc2 = document.querySelectorAll('.section ul li');
for(var i = 0; i <acc2.length; i++){
  acc2[i].onclick = function(){
      this.classList.toggle('activeB');
      this.nextElementSibling.classList.toggle('show');
    };
}
