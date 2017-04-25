<div class="container">
    <h1>Skráning</h1>
    
    <form action="<?php echo URL;?>Home/signup" method="post">
        <label for="username">Username:</label>
        <input id="username" name="username" type="text"><br><br>
                            
        <label for="pass">Password:</label>
        <input id="pass" name="password" type="password" required><br><br>
                        
        <label for="confpass" >Conferm Password:</label>
        <input id="confpass" name="confpass" type="password" required><br><br>

        <label for="nafn">Email:</label>
        <input id="nafn" name="email" type="text" required><br><br>
        

        <input name="create" type="submit" value="create">
    </form>
</div>
