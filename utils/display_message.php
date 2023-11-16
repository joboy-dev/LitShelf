<!-- <?php
    // function displayMessage() {
    //     $message = null;
    //     if (isset($_SESSION['error'])) {
    //         $message = $_SESSION['error'];

    //         echo "
    //             <div class='message error'>
    //                 <p>$message</p>
    //             </div>
    //             ";
    //         unset($_SESSION['error']);
    //     }
    
    //     if (isset($_SESSION['success'])) {
    //         $message = $_SESSION['success'];
            
    //         echo "
    //             <div class='message success'>
    //                 <p>$message</p>
    //             </div>
    //             ";
    //         unset($_SESSION['success']);
    //     }
    // }

?> -->


<?php if (isset($_SESSION['error'])): ?> 
    <div class='message error'>
        <p><?php echo $_SESSION['error']; ?></p>
    </div>

    <?php unset($_SESSION['error']); ?>

<?php elseif (isset($_SESSION['success'])): ?> 
    <div class='message success'>
        <p><?php echo $_SESSION['success']; ?></p>
    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif?>