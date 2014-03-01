//////////////////////////////////////////////////////////////////////////////////////////////////// 
//JavaScript Document
//
//function populate_votes() # FUNCTION CONTAINING THE AJAX FUNCTIONING   
//	arguments:
//  	-color: receive the color sended by the "onclick" event in the hyperlink 
//		-id: the value of the "id" attribute in <td> HTML element
//	
//	Using some XMLHttpRequest properties readyState & status:
//
//	XMLHttpRequest.readyState == 0 // request not initialized
//	XMLHttpRequest.readyState == 1 // server connection established
//	XMLHttpRequest.readyState == 2 // request received
//	XMLHttpRequest.readyState == 3 // processing
//	XMLHttpRequest.readyState == 4 // completed and response is ready
//
//
//
//	XMLHttpRequest.status == 200: "OK"
//  XMLHttpRequest.status == 404: Page not found
//
//function calculate() // FUNCTION THAT GETS THE EACH CELL VALUES FROM COLUMN "VALUES" IN THE TABLE
// 
// important variables:
//		* rows_num // store the number of rows in the table
//
//
//
////////////////////////////////////////////////////////////////////////////////////////////////////


function populate_votes(color,id){ //Create the function that will implement AJAX
	id_cell=id;
	clicked_color = color;

	if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  		}else{		// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
// Setting all things to do if the negotiation with the server was ok.  "onreadystatechange" and "status" value tells us the real status of it 		
xmlhttp.onreadystatechange=function(){ 
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	   // set the response text to the right cell
    document.getElementById("td"+id).innerHTML=xmlhttp.responseText;
	}
}
	//document.write(clicked_color);
xmlhttp.open("GET","get_color_votes.php?q="+clicked_color,true);
xmlhttp.send();
}


function calculate(){
 //table is a row object 
 table= document.getElementsByTagName("tr");
 //get the number of rows in the table
 rows_num = table.length;
 total="";
 
 // starting in i=1 to skip fist row (header row)
 	for (i=1;i<rows_num;i++){ 
 // get all the information stored in the the second column of the table
		subtotal=document.getElementById("data_table").rows[i].cells[1].innerText;
		
			if (subtotal !== ""){
				// change string to integer in order to sum every value
				total = eval(total) + eval(subtotal); 
			}
		}
 // setting the result of the sum in the total cell
 document.getElementById("jscript_result").innerHTML=total; 
	}