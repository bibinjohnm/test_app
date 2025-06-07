<html>
    <head><title>send post data</title></head>
    <body>
        <h1>send user information</h1>
        <form method ="POST" action="<?=url('get-userdata')?>">
            <label>Name:<input type="text" name="name"></label>
            <label>Age:<input type="text" name="age"></label>
            <label>Phone :<input type="text" name="phone"></label>
               <input type="hidden" name="_token" value=<?=csrf_token()?>> 
            <input type="submit" value="send">
            
            
        </form>
    </body>

</html>