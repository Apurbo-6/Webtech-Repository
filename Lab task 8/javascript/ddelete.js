function getAll() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesearch").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../view/actionAllEmployee.php?",true);
    xmlhttp.send();
    return;
}

function deleteEmployee(str) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("livesearch").innerHTML = this.responseText;
    getAll();
  }
  };
  xmlhttp.open("GET","../view/deleteDone.php?q="+str,true);
  xmlhttp.send();

  






    console.log(str);
    document.getElementById("demo").style.color = "red";
}





/*
  function showResult(str) {


    //document.getElementById("search").style.backgroundColor="RED";
    if (str.length==0) {

      //document.getElementById("livesearch").innerHTML=""; 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("livesearch").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../view/getAllEmployee.php?",true);
      xmlhttp.send();

        //document.getElementById("livesearch").style.border="0px";
        
        //document.getElementById("productTable").innerHTML="";
        return;
    } else {

    document.getElementById("livesearch").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesearch").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../view/getEmployee.php?q="+str,true);
    xmlhttp.send();
  }
}*/