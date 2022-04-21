

/*Simple open a pop up with affiliate name */ 
function basicPopup(id) {
  var affiliate = "teste" + id;
  var s = document.getElementById(affiliate).innerHTML;
  varWindow = window.open ('popup.html', 'popup', "width=400 height=400")

  text = "<p style='text-align:center'>Dear " + s;
  text = text + ", <br> Gambling.com Groups Irish office, would like  to invite you for some food and drinks on 5th May 2022 @ 7:00pm."; 
  text = text + "<br> <br> <br>  Address:  GDC Media Ltd  3rd Floor,<br>   Fitzwilliam Court,  Lesson Cl <br> Dublin 2   Ireland";
  text = text + "<br> <br> <br>  <img id ='pic' src='../image/gambling.png'></div> </p>";
  varWindow.document.write (text);
  }
