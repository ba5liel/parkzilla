var ok;
function clos(){
  document.getElementById("moda").style.display = "none";
}
function yesA(){
  var arrivalTime = document.arrivalTime.timeValue.value;
  if(arrivalTime == ""){
    document.getElementById("errorT").innerHTML = " Please fill the time of your arrival.";
    return;
  }
  else{
  var ATime = arrivalTime.split(":");
  var h = ATime[0];
  var m = ATime[1];
  if(ok)
  window.location.assign("index.php?alterId="+g+"&hour="+h+"&min="+m);
}
}

function checkTime(e){
  var match = /(\d{1,2}):(\d{1,2})/.exec(e.value)
  if(!match){
    ok=0;
    document.getElementById("errorT").innerHTML = " The time must be in '09:00' format.";
  }
  else{
    ok=1;
    document.getElementById("errorT").innerHTML = " ";
  }

}
