<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade Viewing Delete account</title>
</head>

<body padded="1.w2" outlines="0">
    <?PHP 
    $result1="";
session_start()
require_once "config.php";

if(isset($_POST['btn-return'])){
    $sql="DELETE FROM tblaccounts WHERE userID=?";
    if($stmt=mysqli_prepare($link,$sql)){
        mysqli_stmt_bind_param($stmt,"s",trim($_POST['txtusername']));
    if(mysqli_stmt_execute($stmt)){
        
            header("location:adminpage.php");
            exit(); 
            
        }
        else
        {
        $result1="Error";
        }
    }
    else
    {
        $result1="Error on delete statement";
    }
}

if(isset($_POST['btn-submit'])){
    header("location:adminpage.php");
   exit(); 
    }
?>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="loginForm" method="POST">
            <div class="logoHolder">
                <div class="logo">
                   <!-- <img class="logoimg" src="arellano-logo.png">-->
                   
                </div>
                
                <div class="entryText">
                   Are you sure you want 
                   <br>to delete this account?
                </div>
            </div>
            <div class="user-info">
            
            </div>
             
        <div class="buttonHolder">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="hidden" name="txtusername" value="<?PHP echo trim($_GET['userID']);?>"/>
                <button id="btn-return" name="btn-return" type="submit" style="background-color: #4CAF50;">Yes</button>
                <button id="btn-submit" name="btn-submit" type="submit" style="background-color: darkred;">No</button>
        </div><br>
         <div class="popup" >
                <h3 style="background: red;border-radius: 10px"><?php echo $result1;?></h3>
            </div>
    </form>
    </div>
    </form>

 
            
    




 <style>
    html,body               { box-sizing: border-box; width: 100%; max-width: 100% }
*::before,*::after, *   { box-sizing: inherit }

body                    { margin: 0 }
button           { font-family: inherit; margin: 0 }
img                     { display: block }

body[padded="1"],
body[padded="0"] [band*="padded"] {
/*

    All math reference: https://www.mathsisfun.com/equation_of_line.html

*/
/*
    responsive page padding
    and responsive band padding (same as responsive page padding, but at band level)

    Top/Bottom padding: p1(320,16) p2(1920, 72) => 0.035x + 4.8  => vary from 16 to  72px
    Left/Right padding: p3(320, 8) p4(1920,320) => 0.195x - 54.4 => vary from  8 to 320px

    'Band padding' is only active when 'page padding' is off (0)
*/
    padding: calc(3.5vh + 4.8px) calc(19.5vw - 54.4px);
}
/* double width padding */
body[padded*="1"][padded*="w2"], body[padded="0"] [band*="padded"][band*="w2"] {
    padding: calc(3.5vh + 4.8px) calc((19.5vw - 54.4px) * 2);
}

/* for easy debugging (put in <body>) */
[outlines="1"] * { outline: 1px dashed }

/*******************************/
/* main page flexbox structure */
/*******************************/
/* default: everything is an FBL column of rows */
div, #loginForm { display: flex; flex-flow: column wrap; justify-content: center; align-content: center }

/* exceptions: FBL row of columns */
.logoHolder>*,
.buttonHolder { flex-flow: row nowrap; width: 100% }

/* alignments */
.wrapper { align-items: center }

/* allow to fill available parent width */
button{ flex-grow: 1 }

/******************************/
/* element sizing and spacing */
/******************************/
body             { height: 100vh }
.wrapper         { width: 100%; height: 100% }

/* defaults */
#loginForm>div   { padding: 0 0 1rem 0 } /* Holders */
#loginForm>div>* { padding: 0.5rem 0 } /* holder content */

/* exceptions */
.logoImg         { padding: 0.5rem 1rem; height: 100% ;position: relative;}
.linksHolder     { padding: 0.625rem 0 }

/* this and thats */
.buttonHolder button {
    height: calc(1.75vmax + 30.4px); /* (320,36)(1920,64) */
}
#btn-return { margin-right: 1rem }

/**************************/
/* eye-candy/theming only */
/**************************/
body {
    font-family: 'Roboto', sans-serif;
    background-color: #131C70
}

/**/


/**/
.buttonHolder button {
    color: #fff; background-color: #515772;
    font-size: 1rem; letter-spacing: 1px;

    border-radius: 8px; border: none;
    cursor: pointer;
    margin-top: 100px;
    margin-bottom: 0px;
}


.buttonHolder button:focus { border: 2px solid #000    }
.buttonHolder button:hover { background-color: #2d3142 }

/**/
.linksHolder {
    margin-top: 250px;
    text-align: center;
    font-size: 0.8125rem; /* was 13px */
    position: center;
}
.logo img{
                
                width: 550px;
                height: 131px;
                left: 690px;
                top: 0px;
                mix-blend-mode: normal;
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.50));
                margin-bottom: 10px;

            }
.entryText{
    color: #4a4d67;
    font-weight: 1000;
    font-size: 30px;
    margin-bottom: 50px;
}
.wrapper{
    border-style: solid;
    border-radius: 20px;
    border-width:1px;
    height: 700px;
    width: 600px;
    position: relative;
    background-color: #f9fbff;
}
.user-info{
    color: #4a4d67;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 30px;
}
</style>
</body>
</html>