var lastID="0";
var xhttpp;
xhttpp = new XMLHttpRequest();
xhttpp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    lastID = this.responseText;
    setInterval(GetLastID, 3000);
    }
  };
xhttpp.open("GET", "../inc/actualites_lastROW.php?ID=last", true);
xhttpp.send();

function GetLastID() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      if(this.responseText != lastID)GETLast_actualite();
      lastID = this.responseText;
      }
    };
    xhttp.open("GET", "../inc/actualites_lastROW.php?ID=last", true);
    xhttp.send();
  }

  function GETLast_actualite()
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)update_actualite(this.responseText);
    };
    xhttp.open("GET", "../inc/actualites_lastROW.php", true);
    xhttp.send();
  }

  function update_actualite(lastrow)
  {
    document.getElementById("notification").innerHTML=lastrow;
  }  