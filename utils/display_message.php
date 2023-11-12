<?php
    function displayMessage() {
        $message = null;
        if (isset($_SESSION['error'])) {
            $message = $_SESSION['error'];

            echo "
                <div class='message error'>
                    <p>$message</p>
                </div>
                ";
            unset($_SESSION['error']);
        }
    
        if (isset($_SESSION['success'])) {
            $message = $_SESSION['error'];
            
            echo "
                <div class='message success'>
                    <p>$message</p>
                </div>
                ";
            unset($_SESSION['success']);
        }
    }

?>