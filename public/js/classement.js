function ShowRank(res){  
    if(res == "") {  
       document.getElementById("txt").innerHTML  =  "";  
       return;  
    }
    else {  
       if(window.XMLHttpRequest) {  
          // code for IE7+, Firefox, Chrome, Opera, Safari  
          xmlhttp = new XMLHttpRequest();  
        }
       else {  
          // code for IE6, IE5  
          xmlhttp = new  ActiveXObject("Microsoft.XMLHTTP");  
        }  
        xmlhttp.onreadystatechange = function() {  
            if(this.readyState == 4 && this.status == 200) {  
                document.getElementById("txt").innerHTML = this.responseText;  
            }  
        };  
       xmlhttp.open("GET","classement?r=" + res,true);  
       xmlhttp.send();  
    }  
}  
