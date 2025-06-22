<!--Edit Profile Modal for the User-->
<div id="editProfileModal" class="hidden fixed inset-0 flex justify-center items-center z-10  text-black z-10">
    <div class='w-[400px] flex flex-col'>
        <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

            <div class='w-full flex justify-between text-center items-center'>
                <p class='font-bold text-[20px]'>Edit Profile</p>
                <button id="closeModalProfile" class='text-xl hover:cursor-pointer'>X</button>
            </div>
            
            <p class='mb-3'>Fill all the required information </p>

            <form action="../Functions/ProfileProcess.php" method='POST'>
                <label htmlFor="Email">Email</label> <br />
                <input class='border rounded-md w-full my-2 p-2' type="text" name='Email' value="<?php echo $_SESSION['email'] ?>"
                required/> <br/>
                <label htmlFor="FullName">Full Name</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='FullName' value="<?php echo $_SESSION['name'] ?>"
                required/> <br/>
                <label htmlFor="Password">Password</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="password" name='Password'
                required/> <br/>
                <label htmlFor="ContactNumber">Contact Number</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ContactNumber' value="<?php echo $_SESSION['Contact_Number'] ?>"
                required/> <br/> <br/>
                <input type="hidden" name='user_id' value="<?php echo $_SESSION['user_id'] ?>"
                required/>
                <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                hover:bg-[#353434] cursor-pointer' type="submit" name='editProfBtn' value="Save Changes"/>
            </form>

        </div>
    </div>
</div>