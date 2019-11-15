



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


/*         function sendAJAX(arrayjs)
        {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                alert('posted value' + xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET","../scripts_php/response_compare?q=" + arrayjs ,true);
        xmlhttp.send();
        }
 */


/*        
        $.post('response_compare.php', {
        data: resp
        }, function(response) {
        console.log(response);
  }); */



        
/*          console.log(arrayjs);
            $.ajax({
            type: "POST",
                url: "../scripts_php/response_compare.php",
                data: {content : arrayjs},
                dataType: "text",
                success: function(html){
                alert( "Submitted");
                    }
          });   */
          
        
         
       /* $.ajax({ 
        type: "POST", 
        url: "../scripts_php/response_compare.php", 
        data: { kvcArray : myJSONText }, 
            success: function() { 
                alert("Success"); 
            }
        });  */
