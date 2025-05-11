<?php 
  session_start();
  include './imports/DBConnection.php';
  include './Functions/Authentication.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicole Store</title>
    <?php
      include './imports/extensions.php';
      include './frames/modals/Signup.php';
    ?>
</head>
<body>
    <!--This Handles the Sign in page Design-->
    <div class='flex flex-col'>
      <div class='w-screen flex text-center justify-between border-b-1 px-10 pt-10 pb-5'>

          <h2 class='font-[Italiana] font-bold text-4xl'>
            Nicole's
          </h2>
          <div id="registerBtn" class='flex border w-[100px] bg-white text-black p-2 text-center 
          justify-center rounded-2xl hover:bg-[#1E1E1E] cursor-pointer hover:text-white'>
            <p>Register</p>
          </div>

      </div>

      
      <div class='p-10 flex justify-center w-screen '>
          <div class='flex flex-col w-lg'>

            <p class='font-bold my-3'>Sign in to Continue</p>
            <form action="" method='POST'>
              <label htmlFor="email">Email Address</label> <br />
              <input class='border p-3 my-3 w-full rounded-md '
               type="email" name="email" required/> <br />
              <label htmlFor="password">Password</label> <br />
              <input class='border  p-3 my-3 w-full rounded-md '
               type="password" name="password" required /> <br />

              <div class='flex justify-between px-4 py-2'>
                <div class='flex content-center'>
                  <input class='size-7 mx-2 accent-black' type="checkbox" name="checkbox"/>
                  <p class='font-small text-black'>Stay signed in</p>
                </div>
                <p class='text-[#464545] font-normal hover:text-[#1d1c1c]'>
                  <a href="">Forgot Password?</a>
                </p>
              </div>
              <input class='bg-[#1E1E1E] text-white rounded-2xl w-full text-[20px] font-bold
              my-2 py-3  hover:bg-[#353434] cursor-pointer' 
               type="submit" name="sign_in" value='Sign in' />
            </form>

          </div>  
      </div>
    </div>

    <!--Function for the register button to show the Sign up modal-->
    <script>
        const modal = document.getElementById('signupModal');
        const openBtn = document.getElementById('registerBtn');
        const closeBtn = document.getElementById('closeModal');

        openBtn.addEventListener('click', () =>{
            modal.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
    
</body>
</html>