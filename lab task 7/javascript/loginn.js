function userVal() {
        var userName=document.getElementById("userName").value;
        //document.getElementById("usernameErr").innerHTML= "khbjhvbj";

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
