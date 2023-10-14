<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 

<title>Espace pharmacien</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--------------------------------STYLE-----------------------------------------------------> 
<style>
  body {
    color: rgb(78, 77, 77);
    background: rgb(248, 248, 248);
    font-family: 'Roboto', sans-serif;
  }

  span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
 /* background: #2691d9; */
  transition: .5s;
}
 input:focus ~ label,
 input:valid ~ label{
  top: -5px;
  color: #09BD9E;
  outline: none;
}
 input:focus ~ span::before,
input:valid ~ span::before{
  width: 100%;
  outline: none;
}






    .form-control {
    border-color: #eee;
        min-height: 41px;
    box-shadow: none !important;
  }
    .form-control:focus {
    border-color: #5cd3b4;
  }
    .form-control, .btn {        
        border-radius: 3px;
    }
  .signup-form {
    width: 500px;
    margin: 0 auto;
    padding: 30px 0;
  }
    .signup-form h2 {
    color:  #41cba9;
        margin: 0 0 30px 0;
    display: inline-block;
    padding: 0 30px 10px 0;
   /* border-bottom: 3px solid #5cd3b4;*/

    }
    .signup-form form {
    color: rgb(78, 77, 77);;
    border-radius: 5px;
      margin-bottom: 15px;
        background: #fff;
        border-top: 5px solid #41cba9;
        border-left: 5px solid #41cba9;

        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
        padding: 30px;
    }
  .signup-form .form-group {
    margin-bottom: 20px;
  }
  .signup-form label {
    font-weight: normal;
    font-size: 13px;
  }
    .signup-form input[type="checkbox"] {
    margin-top: 2px;
  }
    .signup-form .btn {        
        font-size: 16px;
        font-weight: bold;
    background: #5cd3b4;
    border: none;
    margin-top: 20px;
    min-width: 140px;
    }
  .signup-form .btn:hover, .signup-form .btn:focus {
    background: #41cba9;
        outline: none !important;
  }
    .signup-form a {
      color: #41cba9;
    font-weight: bold;
    text-decoration: underline;
  }
  .signup-form a:hover {
    text-decoration: none;
  }
    .signup-form form a {
    color: #5cd3b4;
    text-decoration: none;
  } 
  .signup-form form a:hover {
    text-decoration: underline;
  }
</style>
<!--------------------------------END STYLE----------------------------------------------------->
</head>
<body>
<div class="signup-form">
    <form action="{{ route('pharmacien.create') }}" method="post" class="form-horizontal">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif

    @csrf
    <div class=" col-xs-offset-4">
      <h2>Pharmacien</h2>
    </div>    
        <div class="form-group">
      <label class="control-label col-xs-4">Nom complet</label>
      <div class="col-xs-8">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>          
        </div>
        <div class="form-group">
          <label class="control-label col-xs-4">date de naissance </label>
          <div class="col-xs-8">
                    <input type="date" class="form-control" name="dateNaissance" value="{{ old('dateNaissance') }}">
                    <span class="text-danger">@error('dateNaissance'){{ $message }}@enderror</span>
                </div>          
            </div>
    <div class="form-group">
      <label class="control-label col-xs-4">E-mail </label>
      <div class="col-xs-8">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>          
        </div>

        <div class="form-group">
          <label class="control-label col-xs-4">téléphone </label>
          <div class="col-xs-8">
                    <input type="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}">
                    <span class="text-danger">@error('telephone'){{ $message }}@enderror</span>
                </div>          
            </div>

            <div class="form-group">
              <label class="control-label col-xs-4">Adresse </label>
              <div class="col-xs-8">
                        <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}">
                        <span class="text-danger">@error('adresse'){{ $message }}@enderror</span>
                    </div>          
                </div>



    <div class="form-group">
      <label class="control-label col-xs-4">mot de passe </label>
      <div class="col-xs-8">
                <input type="password" class="form-control" name="password" >
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>          
        </div>
    <div class="form-group">
      <label class="control-label col-xs-4">Confirmer le mot de passe </label>
      <div class="col-xs-8">
                <input type="password" class="form-control" name="cpassword"  >
                <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
            </div>          
        </div>
    <div class="form-group">
      <div class="col-xs-8 col-xs-offset-4">
       
        <button type="submit" class="btn btn-primary btn-lg">Inscription</button>
      </div>  
    </div>          
    </form>
  <div class="text-center">Vous avez un compte ? <a href="{{ route('pharmacien.login') }}">Connectez-vous </a></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>