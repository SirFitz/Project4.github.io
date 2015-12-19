window.onload = function(){
    document.getElementById("button").addEventListener("click", LoginButton);
	//document.getElementById("adminButton").addEventListener("click", AdminPage);
};	

function AjaxR(file, func){
	new Ajax.Request(file, {
		method: "post",
		onSuccess: func
	});
}

function LoginButton() {
	var username = document.getElementById("uname").value;
	var pword = document.getElementById("pword").value;
	
	new Ajax.Request("login.php?username="+username+"&password="+pword, {
		method: "post",
		onSuccess: homePage
	});
		
	function homePage(answer){
		var userCheck = answer.responseText;
		
		if(userCheck == 0) {
			new Ajax.Updater("container", "newUser.html", {
				method: "get"
			});
		} else {
			if (userCheck == "True"){
				new Ajax.Updater("container", "homepage.html", {
					method: "get"
				});
				DisplayUser();
				DisplayMsg();
			} else {
				alert ("Incorrect Login");
				new Ajax.Updater("container", "index.html", {
					method: "get"
				});
			}
		}
	}
}

function AdminPage() {
	var id = document.getElementById("id").value;
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var pword = document.getElementById("password").value;
	var username = document.getElementById("username").value;
	
	new Ajax.Request("newUser.php?id="+id+"&firname="+fname+"&lasname="+lname+"&pass="+pword+"&uname="+username, {
		method: "post",
		onSuccess: newPage
	});
	
	function newPage(answer){
		var userCheck = answer.responseText;
		alert (answer.responseText);
		if(userCheck == "True") {
			alert ("New User Added Successfully");
			new Ajax.Updater("place", "newUser.html", {
				method: "get"
			});
		}else{
			alert("User not added. Try Again!");
			new Ajax.Updater("place", "newUser.html", {
				method: "get"
			});
		}
			
	}
}	

function loadPage(){
	new Ajax.Updater("area", "compose.html", {
					method: "get"
				});
}

function homePage() {
	new Ajax.Updater("area", "homepage.html", {
					method: "get"
				});
}



function Logout() {
	alert("You are being logged out");
	new Ajax.Updater("area", "index.html", {
					method: "get"
				});
}

function DisplayUser() {
	new Ajax.Request("users.php", {
		method: "get",
		onSuccess: sendAlert
	});
	
	function sendAlert(data) {
		document.getElementById("users").innerHTML = data.responseText;
	}
}

function DisplayMsg() {
	new Ajax.Request("lastMessage.php", {
		method: "get",
		onSuccess: showMsg
	});
	
	function showMsg(data) {
		document.getElementById("lmessages").innerHTML = data.responseText;
	}
}

function msgSend(){
	var username = document.getElementById("username").value;
	var body = document.getElementById("body").value;
	var subject = document.getElementById("subject").value;
	var recipients = document.getElementById("recipients").value;
	
	recip = recipients.split(",");
	
	new Ajax.Request("no.php", {
		method: "post",
		onSuccess: displayMessage
	});
	
	function displayMessage(data) {
		alert("foolishness");
	}
}