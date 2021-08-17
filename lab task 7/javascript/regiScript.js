function nameVal() {
        var name=document.getElementById("name").value;

        var regex= /^[a-zA-Z][a-zA-Z.\_\-\ ][\ a-zA-Z.\-\_]+/ ;


        if (regex.test(name)) {
            document.getElementById("nameErr").innerHTML= "";
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("nameErr").innerHTML= "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }


    }


    function emailVal() {
        var email=document.getElementById("email").value;
        regex= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
        

        if (regex.test(email)) {
            document.getElementById("emailErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("emailErr").innerHTML= "Must be a valid email_address : anything@example.Com";
        }


    }




function userVal() {
        var userName=document.getElementById("userName").value;
        document.getElementById("usernameErr").innerHTML= "khbjhvbj";

        var regex= /^[0-9a-zA-Z-_]{2,}[^\s.]$/ ;


        if (regex.test(userName)) {
            document.getElementById("usernameErr").innerHTML= "";
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("usernameErr").innerHTML= "Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }


    }


    function passVal() {
        var password=document.getElementById("password").value;
        var regex= /^[0-9a-zA-Z@%#$]{8,}$/ ;
        

        if (regex.test(password)) {
            document.getElementById("passwordErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("passwordErr").innerHTML= "At least 8 and No use of special characters (space,@, #, $, %)";
        }


    }




    function rePassVal() {
        var rePassword=document.getElementById("rePassword").value;
        var regex= /^[0-9a-zA-Z@%#$]{8,}$/ ;
        

        if (regex.test(rePassword)) {
            document.getElementById("rePasswordErr").innerHTML= "";

            if(document.getElementById("password").value != document.getElementById("rePassword").value){

                document.getElementById("rePasswordErr").innerHTML= "didn't macth the password ";
                
            }
        }
        else
        {
            document.getElementById("rePasswordErr").innerHTML= "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
        }


    }