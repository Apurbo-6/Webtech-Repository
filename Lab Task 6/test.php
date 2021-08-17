

<?php 

session_start();


if(isset($_SESSION['username'])){
    //header('location: testFinal2.php');

        echo    '<!DOCTYPE html>
                <html>

                 ';
                include('header2.php');

        echo    '<style>
                .error {color: #2BDE1A;}
                </style>';


        echo    '<span class="error"> <b> <h1 align="center">';

        echo  'Welcome '.$_SESSION['username'].' <br> to <br> Green Dhaka Bus limited';

        echo  '</h1> </span>

                <body style="background-color:#DFF0E2;">




                </body>';

                include('footer.php');

        echo    '</html>';

        


}
else{

    header('location: login.php');
}

?>
