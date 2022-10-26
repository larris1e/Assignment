<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container" >
    <form method="POST" action="user_data.php">
        <h1>Registration Form</h1>
        <div class="form-group">
        <label for="name">
            Name: <input type="text" name="name" class="form-control">
        </label><br> </div>
        <div class="form-group">
        <label for="Email">
            Email:<input type="email" name="email" class="form-control">
        </label><br>
        </div>
        <div class="form-group">
        <label for="dob">
            Date of birth: <input type="date" name="dob" id="" class="form-control"> 
        </label><br>
        </div>
        <div class="form-group">
        <label for="country">
            Country: <select name="country" id="" class="form-control">
                <option value="Nigeria">Nigeria</option>
                <option value="Ghana">Ghana</option>
                <option value="South Africa">South Africa</option>
                <option value="Italy">Italy</option>
            </select> <br>
            </div>
            <div class="form-group">
            <label for="gender">
            Gender: <select name="gender" id="" class="form-control">
                <option value="male">Male</option>
                <option value="female">Fmale</option>
            </select> 
        <br>
</div> 
 <button type="submit" class="btn">submit</button>
        </div>
    </form>
</body>
</html>

