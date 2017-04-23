$('.dropdown-toggle').dropdown();


$('#divNewNotifications li').on('click', function() {
    $('#dropdown_title').html($(this).find('a').html());
    });

$(document).ready(function() {
    $('#inventoryButton').click(function() {
      event.stopPropagation();
      queryInventory($('#inventoryType').val());
      //alert($('#inventoryType').val());
      //foo($('#formValueId').val());
      return false;
  });
});

$(document).ready(function() {
    $('#updateCInv').click(function() {
      event.stopPropagation();
        updateChassisInventory($('#chassisInput').val(), $('#cInvInput').val());
        queryInventory('Chassis');
      return false;
  });
});

$(document).ready(function() {
    $('#updateMInv').click(function() {
      event.stopPropagation();
        updateMemInventory($('#memSizeInput').val(), $('#mInvInput').val());
        queryInventory('Memory');
      return false;
  });
});

$(document).ready(function() {
    $('#updateSInv').click(function() {
      event.stopPropagation();
        updateStorInventory($('#storSizeInput').val(), $('#storTypeInput').val(), $('#sInvInput').val());
        queryInventory('Storage');
      return false;
  });
});
	 /*
    Query the database using getquery.php file.
	String str is the specific query to be called..
	The query is displayed in the calling HTML document.

	Utilizes AJAX (xmlhttp) to dynamically update HTML page without reloading it.
 */
 function queryAllCustomers(){
		 if(window.XMLHttpRequest){
			 xmlhttp = new XMLHttpRequest();
		 } else{
			 //For older IE (5, 6)
			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange = function(){
			 if(this.readyState == 4 && this.status == 200){
				 //Put result table into document  at allCustBody spot
				 document.getElementById("adminTable").innerHTML = this.responseText;
				 //document.getElementById("adminHeader").innerHTML= "Customers";
			 }
		 };
		 //Get the query result
		 xmlhttp.open("GET", "ShowAllCustomers.php", true);
		 xmlhttp.send();
 }

 function queryAllDefaultSystems(){
		 if(window.XMLHttpRequest){
			 xmlhttp = new XMLHttpRequest();
		 } else{
			 //For older IE (5, 6)
			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange = function(){
			 if(this.readyState == 4 && this.status == 200){
				 //Put result table into document  at allCustBody spot
				 document.getElementById("adminTable").innerHTML = this.responseText;
				// document.getElementById("adminHeader").innerHTML= "Default Systems";
			 }
		 };
		 //Get the query result
		 xmlhttp.open("GET", "showAllDefaults.php", true);
		 xmlhttp.send();
 }

 function queryInventory(str){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        //Put result table into document  at allCustBody spot
        document.getElementById("inventoryTable").innerHTML = this.responseText;
        //document.getElementById("adminHeader").innerHTML= "Customers";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "getInventory.php?inventoryType=" + str, true);
    xmlhttp.send();
 }

 function updateChassisInventory(chassis, inv){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        //Put result table into document  at allCustBody spot
        document.getElementById("updateResponse").innerHTML = this.responseText;
        //document.getElementById("adminHeader").innerHTML= "Customers";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "updateChassisInventory.php?chassisNo=" + chassis + "&newInv=" + inv, true);
    xmlhttp.send();
 }

 function updateMemInventory(memory, inv){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        //Put result table into document  at allCustBody spot
        document.getElementById("updateResponse").innerHTML = this.responseText;
        //document.getElementById("adminHeader").innerHTML= "Customers";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "updateMemInventory.php?memory=" + memory + "&newInv=" + inv, true);
    xmlhttp.send();
 }

 function updateStorInventory(storage, type, inv){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        //Put result table into document  at allCustBody spot
        document.getElementById("updateResponse").innerHTML = this.responseText;
        //document.getElementById("adminHeader").innerHTML= "Customers";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "updateStorInventory.php?storage=" + storage + "&type=" + type + "&newInv=" + inv, true);
    xmlhttp.send();
 }
