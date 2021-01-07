<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSS3 Pizza Chart</title>
<style>
body {
    font-family:Tahoma, Geneva, sans-serif;
}
h2 {
    text-align:center;
}
.chart {
    position:relative;
    width:500px;
    height:250px;
}
.hold {
    position:absolute;
    width:200px;
    height:200px;
    clip:rect(0px,200px,200px,100px);
    left:300px;
}
.Pizza {
    position:absolute;
/*  width:100px;
    height:200px;
    border-radius:100px 0 0 100px;
    transform-origin:right center; */
    width:200px;
    height:200px;
    clip:rect(0px,100px,200px,0px);
    border-radius:100px; 
}
</style>
</head>
<body>
<style>
<style>
     .PizzaContainer {
          height: 100px; */
          width: 100px;
          float: right;
          margin: 0 0 20px 20px;
     }
     /* #PizzaSliceYellow .Pizza {
          background-color: #f2cd00;
          transform:rotate(60deg);
     } */
     #PizzaSliceBlue {
          transform:rotate(90deg);
     }
     #PizzaSliceBlue .Pizza {
          background-color: #002095;
          transform:rotate(90deg);
     }
     #PizzaSliceRed {
          transform:rotate(180deg);
     }
     #PizzaSliceRed .Pizza {
          background-color: #950000;
          transform:rotate(90deg);
     }
      #PizzaSliceOlive {
          transform:rotate(270deg);
     }
     #PizzaSliceOlive .Pizza {
          background-color: #a5a000;
          transform:rotate(90deg);
     }
     #PizzaSliceOrange {
          transform:rotate(360deg);
     }
     #PizzaSliceOrange .Pizza {
          background-color: #f5a010;
          transform:rotate(90deg);
     }
      /* #PizzaSliceLime {
          transform:rotate(300deg);
     }
     #PizzaSliceLime .Pizza {
          background-color: #99FF00;
          transform:rotate(60deg);
     } */
     /* .b{
         left: 50%;
         top: 50%;
     } */
</style>
<div class="PizzaContainer">
<div class="PizzaBackground"></div>
{{-- <div id="PizzaSliceYellow" class="hold">
<div class="Pizza"></div>
</div> --}}
<div id="PizzaSliceBlue" class="hold">
<div class="Pizza text-center">A</div>
</div>
<div id="PizzaSliceRed" class="hold">
<div class="Pizza">A</div>
</div>
<div id="PizzaSliceOlive" class="hold">
<div class="Pizza">A</div>
</div>
<div id="PizzaSliceOrange" class="hold">
<div class="Pizza">A</div>
</div>
{{-- <div id="PizzaSliceLime" class="hold">
<div class="Pizza"></div>
</div> --}}
</div>
</body>
</html>