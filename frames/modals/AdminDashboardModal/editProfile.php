<!--Edit Profile Modal for the User-->
<div id="addProfileModal" class="hidden fixed inset-0 flex justify-center items-center  text-black z-10">
    <div class='w-[400px] flex flex-col'>
        <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

            <div class='w-full flex justify-between text-center items-center'>
                <p class='font-bold text-[20px]'>Register Customer</p>
                <button id="closeModalProfile" class='text-xl hover:cursor-pointer'>X</button>
            </div>
            
            <p class='mb-3'>Fill all the required information</p>

            <form action="" method='POST'>
                <label htmlFor="Email">Email</label> <br />
                <input class='border rounded-md w-full my-2 p-2' type="text" name='Email'
                required/> <br/>
                <label htmlFor="FName">First Name</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='FName' 
                required/> <br/>
                <label htmlFor="LName">Last Name</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='LName' 
                 /> <br/>
                <label htmlFor="Password">Password</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="password" name='Password' 
                required/> <br/>
                <label htmlFor="ContactNumber">Contact Number</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ContactNumber' 
                required/> <br/>
                <label htmlFor="ProfileImage">Profile Image</label> <br/>
                <input class='border rounded-md my-2 p-2 hover:cursor-pointer' type="file" name='ProfileImage' 
                required/> <br/>
                <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                hover:bg-[#353434] cursor-pointer' type="submit" name='RegisterProduct' value="Save Changes"/>
            </form>

        </div>
    </div>
</div>