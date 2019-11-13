



/* 
let e = document.getElementById("formVal");
formVal = document.getElementById("formVal");
//value = formVal.options[formVal.selectedIndex].value;

//example


 formVal.addEventListener("click", function(event){       
    value = e.options[e.selectedIndex].value;
    console.log(value);


    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
             // Typical action to be performed when the document is ready:
        document.getElementById("math").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "math/math.php", true); //?number="+value
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("number=" + encodeURIComponent(value));

});  */
