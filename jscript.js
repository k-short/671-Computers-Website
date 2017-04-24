$('.dropdown-toggle').dropdown();


$('#divNewNotifications li').on('click', function() {
    $('#dropdown_title').html($(this).find('a').html());
    });

function phoneNumberPlain(inputtxt)
{
    var phoneno = /^\d{10}$/;
    if((inputtxt.match(phoneno)))  {
        return true;
    }
    else  {
        return false;
    }
}

function phoneNumberExtra(inputtxt)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if((inputtxt.match(phoneno)))  {
      return true;
  }
  else {
      return false;
  }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

$(document).ready(function() {
    $('#createUserButton').click(function() {
      event.stopPropagation();
      var id = $('#userID').val();
      var name = $('#userName').val();
      var email = $('#userEmail').val();
      var phone = $('#userPhone').val();
      var address = $('#userMailAdd').val();

      if(!phoneNumberPlain(phone) && !phoneNumberExtra(phone)){
          alert("Invalid phone number.");
          return false;
      }else if(!validateEmail(email)){
        alert("Invalid email address.");
      }
      else {
        addUser(id, name, email, phone, address);
      }
      return false;
  });
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
      return false;
  });
});

$(document).ready(function() {
    $('#updateMInv').click(function() {
      event.stopPropagation();
        updateMemInventory($('#memSizeInput').val(), $('#mInvInput').val());
      return false;
  });
});

$(document).ready(function() {
    $('#updateSInv').click(function() {
      event.stopPropagation();
        updateStorInventory($('#storSizeInput').val(), $('#storTypeInput').val(), $('#sInvInput').val());
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
        document.getElementById("updateResponse").innerHTML = this.responseText;
        queryInventory('Chassis');
        document.getElementById("chassisInput").value= "";
        document.getElementById("cInvInput").value= "";
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
        document.getElementById("updateResponse").innerHTML = this.responseText;
        queryInventory('Memory');
        document.getElementById("memSizeInput").value= "";
        document.getElementById("mInvInput").value= "";
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
        document.getElementById("updateResponse").innerHTML = this.responseText;
        queryInventory('Storage');
        document.getElementById("storSizeInput").value= "";
        document.getElementById("storTypeInput").value= "";
        document.getElementById("sInvInput").value= "";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "updateStorInventory.php?storage=" + storage + "&type=" + type + "&newInv=" + inv, true);
    xmlhttp.send();
 }

 function addUser(id, name, email, phone, address){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("creationMessage").innerHTML = this.responseText;
        if(this.responseText == "User account created."){
          document.getElementById("userID").value= "";
          document.getElementById("userName").value= "";
          document.getElementById("userEmail").value= "";
          document.getElementById("userPhone").value= "";
          document.getElementById("userMailAdd").value= "";
        }
      }
    };
    //Get the query result
    xmlhttp.open("GET", "addUser.php?userID=" + id + "&userName=" + name + "&userEmail=" + email +
                 "&userPhone=" + phone + "&userMailAdd=" + address, true);
    xmlhttp.send();
 }
