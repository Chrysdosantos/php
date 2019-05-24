<style>
/*order ok: link,visited,hover,active*/
A:link, A:visited, A:hover, A:active{color:#0000ff;}

#flotante,#flotante2,#flotante3,#flotante4,#flotante5,#flotante6,#flotante7,#flotante8,#flotante9,#flotante10
{
	position: absolute;
	display:none;
	font-family:Arial;
	font-size:0.8em;
	border:1px solid #808080;
	background-color:#f1f1f1;

}

 </style>
 <script type="text/javascript">
 
<!--
//Funcion que muestra el div en la posicion del mouse
function showdiv(event)
{
  //determina un margen de pixels del div al raton
  margin=5;

  //La variable IE determina si estamos utilizando IE
  var IE = document.all?true:false;
  //Si no utilizamos IE capturamos el evento del mouse
  if (!IE) document.captureEvents(Event.MOUSEMOVE)

  var tempX = 0;
  var tempY = 0;

  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}

  

  document.getElementById('flotante').style.top = (tempY+margin);
  document.getElementById('flotante').style.left = (tempX+margin);
  document.getElementById('flotante').style.display='block';
  return;
}

function showdiv2(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante2').style.top = (tempY+margin);
  document.getElementById('flotante2').style.left = (tempX+margin);
  document.getElementById('flotante2').style.display='block';
  return;
}

function showdiv3(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante3').style.top = (tempY+margin);
  document.getElementById('flotante3').style.left = (tempX+margin);
  document.getElementById('flotante3').style.display='block';
  return;
}

function showdiv4(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante4').style.top = (tempY+margin);
  document.getElementById('flotante4').style.left = (tempX+margin);
  document.getElementById('flotante4').style.display='block';
  return;
}

function showdiv5(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante5').style.top = (tempY+margin);
  document.getElementById('flotante5').style.left = (tempX+margin);
  document.getElementById('flotante5').style.display='block';
  return;
}

function showdiv6(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante6').style.top = (tempY+margin);
  document.getElementById('flotante6').style.left = (tempX+margin);
  document.getElementById('flotante6').style.display='block';
  return;
}

function showdiv7(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante7').style.top = (tempY+margin);
  document.getElementById('flotante7').style.left = (tempX+margin);
  document.getElementById('flotante7').style.display='block';
  return;
}

function showdiv8(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante8').style.top = (tempY+margin);
  document.getElementById('flotante8').style.left = (tempX+margin);
  document.getElementById('flotante8').style.display='block';
  return;
}

function showdiv9(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante9').style.top = (tempY+margin);
  document.getElementById('flotante9').style.left = (tempX+margin);
  document.getElementById('flotante9').style.display='block';
  return;
}

function showdiv10(event)
{
  margin=5;
  var IE = document.all?true:false;
  if (!IE) document.captureEvents(Event.MOUSEMOVE)
  var tempX = 0;
  var tempY = 0;
  if(IE)
  { //para IE
    tempX = event.clientX + document.body.scrollLeft;
    tempY = event.clientY + document.body.scrollTop;
  }else{ //para netscape
    tempX = event.pageX;
    tempY = event.pageY;
  }
  if (tempX < 0){tempX = 0;}
  if (tempY < 0){tempY = 0;}
   document.getElementById('flotante10').style.top = (tempY+margin);
  document.getElementById('flotante10').style.left = (tempX+margin);
  document.getElementById('flotante10').style.display='block';
  return;
}
-->
</script>