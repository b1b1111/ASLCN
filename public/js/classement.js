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
                document.getElementById("txt")=
                var table = document.createElement("table");
                var tbody = document.createElement("tbody");
                var row = document.createElement("row");
                var col = document.createElement("column");
                var col1 = document.createElement("column1");
                var col2 = document.createElement("column2");
            }  
        };  
       xmlhttp.open("GET","/aslcn/classement/" + res,true);  
       xmlhttp.send();  
    }  
}  
