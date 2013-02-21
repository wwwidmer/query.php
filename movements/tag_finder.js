<script src="http://code.jquery.com/jquery-1.9.1.min.js">
<script type="text/javascript" >  

// Selects the tags to be searched for from the input

function select(){
       
        var total= new Array();
        
        for(var i=0;i<document.forms[0].length;i++){
                if(document.forms[0][i].checked){
                        total[0]=document.forms[0][i].value+"\n";
                }
        }
               
        for(var i=0;i<document.forms[1].length;i++){
                if(document.forms[1][i].checked){
                        total.push(document.forms[1][i].value);     
                }	
        }
              
        sendHttpReq(total);	
                         
}

// function to find XMLHttp request according to browser

function getXMLHttp(){
  var xmlHttp;
   try{
     //Firefox, Opera 8.0+, Safari
     xmlHttp = new XMLHttpRequest();
   } catch(e){
     //Internet Explorer
     try {
       xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
     } catch(e){
       try {
         xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
       } catch(e){
         alert("Your browser does not support AJAX")
         return false;
       }
     }
   }
   return xmlHttp;
}

// function to send out xmlhttprequest to the server to handle the server side scripting

function sendHttpReq (total){       
        xmlhttp=getXMLHttp();               
      
        am = total[0];
        lf = total[1];
        
        if(total.length>2){
                // create more vars if user selects more input
        }
         
         xmlhttp.open("GET","tag_finder.php?q="+am +'&r='+lf,true);         
         xmlhttp.send();
}

</script>	
