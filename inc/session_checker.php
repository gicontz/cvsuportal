<?php
# Log a user Out 
function logOut(){ 
    $_SESSION = array(); 
    if (isset($_COOKIE[session_name()])) { 
        setcookie(session_name(), '', time()-42000, '/'); 
    } 
    session_destroy();
}

function sessionX(){ 
    $logLength = 1800; # time in seconds :: 1800 = 30 minutes 
    $ctime = strtotime("now"); # Create a time from a string 
    # If no session time is created, create one 
    if(!isset($_SESSION['sessionX'])){  
        # create session time 
        $_SESSION['sessionX'] = $ctime;  
    }else{ 
        # Check if they have exceded the time limit of inactivity 
        if(((strtotime("now") - $_SESSION['sessionX']) > $logLength)){ 
            # If exceded the time, log the user out 
            logOut(); 
            # Redirect to login page to log back in 
            header('Location: lib/logout');
            exit; 
        }else{ 
            # If they have not exceded the time limit of inactivity, keep them logged in 
            $_SESSION['sessionX'] = $ctime; 
        } 
    } 
} 

sessionX();