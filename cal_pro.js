
function calculate(number1, number2) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("resid").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "http://localhost/calculator/cal_pro.php?x="+number1 + "&y="+number2, true);
    xhttp.send();
  }

  function plusbutton()
  {
    var num1 = document.getElementById("inputid").value;
    console.log("successfully received "+num1);
  }
  var num1;
  function equalbutton()
  {
    var num2 = document.getElementById("inputid").value;
    console.log("successfully received "+num2);
    calculate(num1,num2);
  }