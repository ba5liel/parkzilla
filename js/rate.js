function rate(self){
    if(window.XMLHttpRequest){
      var xhttp = new XMLHttpRequest();
    }
    else{
      var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function(){
      if(xhttp.status == 200 && xhttp.readyState == 4){
        document.getElementById("logPost").innerHTML = xhttp.responseText;
      }
    }
    var g = self.getAttribute("rate");
    xhttp.open("GET","rate.php?g="+g,true);
    xhttp.send();
}
