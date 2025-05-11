<!--This Handles the Sign up page Design-->
<div id="signupModal" class="hidden fixed inset-0 bg-black/25 backdrop-blur-sm flex justify-center items-center text-black">
    <div class='fixed inset-0 bg-black/25 backdrop-blur-sm flex justify-center items-center text-black'>
        <div class='w-[400px] flex flex-col'>
            <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

                <div class='w-full flex justify-between text-center items-center'>
                    <p class='font-bold text-[20px]'>Create your Account</p>
                    <button id="closeModal" class='text-xl hover:cursor-pointer'>X</button>
                </div>
                
                <p class='mb-3'>Registration is easy</p>
                
                <form action="./Functions/IndexFunctions/Registration.php" method='POST'>
                    <label htmlFor="emailreg">Email address</label> <br />
                    <input class='border rounded-md w-full my-2 p-2' type="email" name='emailreg'
                    required/> <br/>
                    <label htmlFor="fullname">Full name</label> <br/>
                    <input class='border rounded-md w-full my-2 p-2' type="text" name='fullnamereg' 
                    required/> <br/>
                    <label htmlFor="password">Password</label> <br/>
                    <input class='border rounded-md w-full my-2 p-2' type="password" name='passwordreg' 
                    required/> <br/>
                    <label htmlFor="Confirmpasswordreg">Confirm Password</label> <br/>
                    <input class='border rounded-md w-full my-2 p-2' type="password" name='Confirmpasswordreg' 
                    required/> <br/>
                    <p class="mb-3 text-red-500"><?php if(isset($_SESSION['Regmessage'])){
                        echo $_SESSION['Regmessage'];
                        unset($_SESSION['Regmessage']);
                    } ?>
                    </p>
                    <div class='w-full mt-5 text-center'>
                        <p>By clicking Sign up you agree to
                            Nicole Store <a class=' font-bold' href="">Terms of Use</a> and &nbsp;
                            <a class='font-bold' href="">Privacy Policy</a>.
                        </p>
                    </div> <br />
                    <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                    hover:bg-[#353434] cursor-pointer' type="submit" name='Sign_up'/>
                </form>

            </div>
        </div>
    </div>
</div>