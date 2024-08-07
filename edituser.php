<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<?php $result1="";$account="";?>
<?php include("session-checker.php");
require_once "config.php";
if(isset($_POST['btn-return'])){
   
    
        $sql="UPDATE tblaccounts SET username=?, password=?, name=?, status=?, usertype=? WHERE userID=?";
        if($stmt=mysqli_prepare($link,$sql)){
        mysqli_stmt_bind_param($stmt,"ssssss",$_POST['txtusername'],$_POST['txtpassword'],$_POST['txtname'],$_POST['cmbstatus'],$_POST['cmbusertype'],$_GET['userID']);
        if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Account Updated!');document.location='adminpage.php'</script>";
        exit();
           
        }
        
        
        
    }
    else{
        $result1="Error on update statement";
        }
    

}

else{
    if(isset($_GET['userID'])&& !empty(trim($_GET['userID']))){
        $sql="SELECT * FROM tblaccounts WHERE userID=?";
        if($stmt=mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stmt, "s",$_GET['userID']);
            if(mysqli_stmt_execute($stmt)){
                $result=mysqli_stmt_get_result($stmt);
                $account=mysqli_fetch_array($result,MYSQLI_ASSOC);
            }
            else{
                $result1="error on select statement";

        }
            }
    }

}

?>
<body padded="1.w2" outlines="0">
    
    <div class="wrapper">
        <?php require_once 'config.php';?>
        <form action="<?php  echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?> " id="loginForm" method="POST">
            <div class="logoHolder">
                <div class="logo">
                   <!-- <img class="logoimg" src="arellano-logo.png">-->
                   
                </div>
                <div class="entryText"><br><br>
                    
        UPDATE USER ACCOUNT
                </div>
            </div>
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?> "method="POST">
            <div class="inputHolder">
                <label for="username">USER ID</label>
                <div class="inputfield">
                    <input id="txtuserid" name="txtuserid" type="text" value="<?php if (isset($account['userID'])) { echo $account['userID']; }?>" disabled required>
                    <div class="keyboard"></div>
                </div>
            </div>
            <div class="inputHolder">
                <label for="password">USERNAME</label>
                <div class="inputfield">
                    <input id="txtusername" name="txtusername" type="text" value="<?php if (isset($account['username'])) { echo $account['username']; }?>" required>
                    <div class="keyboard"></div>
                </div>
            </div>
             <div class="inputHolder">
                <label for="password">Full Name:</label>
                <div class="inputfield">
                    <input id="txtpassword" name="txtpassword" type="text"  value="<?php if (isset($account['password'])) { echo $account['password']; }?>" required>
                    <div class="keyboard"></div>
                </div>
            </div>
           
                
                  <label>  
                Current STATUS:<?php if (isset($account['status'])) { echo $account['status']; }?><br>
            Change to: <select name="cmbstatus" id="cmbstatus" required>
            <option value="">---------------Select Status------------------</option>
            <option value="PAID">PAID</option>
            <option value="UNPAID">UNPAID</option>
                 </select><br>
               </label><br>
        
           <div class="inputHolder">
                <label for="password">Full Name:</label>
                <div class="inputfield">
                    <input id="txtname" name="txtname" type="text"  value="<?php if (isset($account['name'])) { echo $account['name']; }?>" required>
                    <div class="keyboard"></div>
                </div>
            </div>
           <div class="radioholder" style="float: left;margin-left: 100px;";
                  <label>  
                Current USERTYPE:<?php if (isset($account['usertype'])) { echo $account['usertype']; }?><br>
            Change to: <select name="cmbusertype" id="cmbusertype" required >
            <option value="">---------------Select Usertype------------------</option>
            <option value="ADMIN">ADMIN</option>
            <option value="PROFESSOR">PROFESSOR</option>
            <option value="USER">USER</option>
                 </select><br>
               </label>
           

            </div><br>
            

            <div class="buttonHolder">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <button id="btn-return" name="btn-return" style="background-color: #4CAF50" type="submit">Update</button>
                <button id="btn-submit" name="btn-submit" style="background-color: darkred;" type="submit">Cancel </button>
            </div>
            <div class="popup" >
                <h3 style="background: red;border-radius: 10px"><?php echo $result1;?></h3>
            </div>
        </form>
        </form>

           
        </form>
    </div>

</body>
<footer style="position: left 30px;">
     <div class="linksHolder">
                <div class="version"></div>
            </div>
</footer>
<style>
    html,body               { box-sizing: border-box; width: 100%; max-width: 100% }
*::before,*::after, *   { box-sizing: inherit }

body                    { margin: 0  }
button, input           { font-family: inherit; margin: 0 }
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
.inputHolder>div,
.buttonHolder { flex-flow: row nowrap; width: 100% }

/* alignments */
.wrapper { align-items: center }

/* allow to fill available parent width */
button, input { flex-grow: 1 }

/******************************/
/* element sizing and spacing */
/******************************/
body             { height: 100vh }
.wrapper         { width: 100%; height: 100% }

/* defaults */
#loginForm>div   { padding: 0 0 1rem 0 } /* Holders */
#loginForm>div>* { padding: 0.5rem 0 } /* holder content */

/* exceptions */
.logoImg         { padding: 0.5rem 1rem; height: 100% }
.linksHolder     { padding: 0.625rem 0 }

/* this and thats */
.inputHolder input {
    height: 50px; /* (320,36)(1920,72) */
    padding: 0 0.25rem 0 3.5rem; /* L/R only */

    max-width: calc(100% - 4vmax - 0.65rem); /* limit 'flex-grow: 1' somewhat */
    /* minus correcion for 'keyboard'
       => width (4max), L-margin (0.5rem) and some icon width (0.15rem) quirk */
}
.inputHolder .keyboard {
    width    : 100%;
    max-width: 4vmax;
    margin   : 0 0 0 0.5rem;
}
.buttonHolder button {
    height: calc(1.75vmax + 30.4px); /* (320,36)(1920,64) */
}
#btn-return { margin-right: 1rem }

/**************************/
/* eye-candy/theming only */
/**************************/
body {
    font-family: 'Roboto', sans-serif;
    
    background-color: #131C70;
}

/**/
.inputHolder label {
    color: #4a4d67;
    font-weight: 550;
    font-size: 14px;
}
.inputHolder input {
    color: #333; background-color: #fff;
    font-size: 17px;

    border-radius: 8px; border: 1px solid #51577245;

    outline: 0;
    box-shadow: 0 3px 11px 0 rgba(81, 87, 114, .2);
}
.inputHolder .keyboard {
    background-image: url(https://image.flaticon.com/icons/svg/917/917059.svg);
    background-repeat: no-repeat;
    background-position: center;
}
.inputHolder input:focus {
    border: 1px solid #515772
}
.radioholder input{
     color: #333; background-color: #fff;
    font-size: 100px;

    border-radius: 8px; border: 1px solid #51577245;

    outline: 0;
    box-shadow: 0 3px 11px 0 rgba(81, 87, 114, .2);
}
.radioholder{
width: 100px;
}
.radioholder label{
      color: #4a4d67;
    font-weight: 550;
    font-size: 14px;
}

/**/
.buttonHolder button {
    color: #fff; background-color: #515772;
    font-size: 1rem; letter-spacing: 1px;

    border-radius: 8px; border: none;
    cursor: pointer;
}
#btn-return { color: #262733; background-color: #a8b8c9 }

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
            }
.entryText{
    color: #4a4d67;
    font-weight: 900;
    font-size: 20px;
    margin-bottom: 10px;
    text-align: center;
    margin-top: 0px;
}
.body{
    background-color: rgba(0, 65, 255, 1) !important;
}
.wrapper{
    border-style: solid;
    border-radius: 20px;
    border-width:1px;
    height: 800px;
    width: 600px;
    position: relative;
    background-color: #f9fbff;
}
 #popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: red;
      border: 1px solid black;
      padding: 20px;
    }
</style>
<script>
    var executeBtn = document.getElementById("btn-submit");
    // Add an event listener to the button
    executeBtn.addEventListener("click", function() {
    // Code to execute goes here...
    window.location.href = "adminpage.php";
    // Close the modal
    
});
$(document).ready(function() {
  // Get the password value from the database
  var password = '<?php echo $account["password"]; ?>';

  // If the password is not empty, add a password hint to the input field
  if (password) {
    $('#password').attr('placeholder', 'Hint: ' + password);
  }
});
</script>
</html>