//track gps
var x = document.getElementById("result");
function track(){
  if(navigator.geolocation)
  {
    navigator.geolocation.getCurrentPosition(showR, showE);
  }
  else{
    x.innerHTML = "your browser wet the bed!"
  }
}
  function showR(position){
    var lat = position.coords.latitude;
    var log = position.coords.longitude;
    var value = String(lat) + "-" + String(log);
    document.forms[1].elements[8].value = value;
  }
  function showE(error)
  {
    switch(error.code)
			{
				case error.PERMISSION_DENIED: document.getElementById("result").innerHTML = "why did you denied permission you dum baby!"
						break;
				case error.POSITION_UNAVAILABLE: document.getElementById("result").innerHTML = "You are offline!"
						break;
				case error.TIME_OUT: document.getElementById("result").innerHTML = "TIME_OUT!"
						break;
				case error.UNKNOWN_ERROR: document.getElementById("result").innerHTML = "UNKOWN ERROR"
						break;

			}
  }
