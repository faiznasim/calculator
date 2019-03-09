
function calculate(number1, number2, num1_base, num2_base, sign, res_base) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      {
     //   alert(this.responseText);
        document.getElementById("resid").value = this.responseText;
      }
    };
    xhttp.open("GET", "http://localhost/calculator/cal_pro.php?f_num="+number1 + "&s_num="+number2 + "&f_num_base="+num1_base + "&s_num_base="+num2_base + "&opr="+sign + "&ans_base="+res_base, true);
    xhttp.send();
  }

  var num1;
  var op;
  var base1;
  function plusbutton()
  {
    num1 = document.getElementById("inputid").value;
    op = 1;
    base1 = document.getElementById("input_base").value;
    console.log("successfully received "+num1+ " which is in base "+base1);
  }

  function minusbutton()
  {
    num1 = document.getElementById("inputid").value;
    op = 2;
    console.log("successfully received "+num1);
  }

  function multiplication_button()
  {
    num1 = document.getElementById("inputid").value;
    op = 4;
    base1 = document.getElementById("input_base").value;
    console.log("successfully received "+num1+ " which is in base "+base1);
  }
  function factorial()
  {
    num1 = document.getElementById("inputid").value;
    op = 5;
    base1 = document.getElementById("input_base").value;
    console.log("successfully received "+num1+ " which is in base "+base1);
  }

  function equalbutton()
  {
    var num2 = document.getElementById("inputid").value;
    var base2 = document.getElementById("input_base").value;
    var res_base = document.getElementById("result_base").value;
    console.log("successfully received "+num2+ " which is in base "+base2);
    calculate(num1,num2,base1,base2,op,res_base);
  }