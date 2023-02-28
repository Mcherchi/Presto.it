{{-- <div style="display: block; margin: auto; max-width: 600px;" class="main">
    <h1 style="font-size: 18px; font-weight: bold; margin-top: 20px">Richiesta per diventare revisore</h1>
    <h2>Ecco i suoi dati</h2>
    <p>Nome: {{$user->name}} </p>
    <p>Email {{$user->email}}</p>
    <a href="{{route('make.revisor', compact('user'))}}">Rendi Revisore</a>
    
    <img alt="Inspect with Tabs" src="https://assets-examples.mailtrap.io/integration-examples/welcome.png"
        style="width: 100%;">
</div>
<!-- Example of invalid for email html/css, will be detected by Mailtrap: -->
<style>
    .main {
        background-color: blue;
    }

    a:hover {
        border-left-width: 1em;
        min-height: 2em;
    }
</style> --}}

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
<style>

</style>
</head>

<body style="background-color: whitesmoke; margin: auto; margin: auto;">
      <div style="background-color: #E86174; padding: 30px; text-align: center;">
            <h1 style="font-size: 25px; font-family: 'Roboto', sans-serif; color: white; margin-bottom: 15px;">Un nuovo utente ha richiesto di diventare revisore.</h1>
      </div>
      <div style="display: flex; justify-content: center;">
            <div style=" background-color: white; border-radius: 10px; box-shadow: rgb(148, 148, 148) 5px; border: solid rgb(148, 148, 148) 0.25px; display: flex; justify-content: center; margin: 30px; width: 70%;" class="main">
                  <div style="text-align: center;">
                        <h4 style="font-family: 'Montserrat', sans-serif;">Ecco i suoi dati</h4>
                        <p style="font-size: 13px; font-family: 'Montserrat', sans-serif;">Nome: {{$user->name}} </p>
                        <p style="font-size: 13px; font-family: 'Montserrat', sans-serif; margin-bottom: 25px;"">Email {{$user->email}}</p>
                        <a style="background-color: #E86174; border: #212529 solid 1px; font-size: smaller; font-weight: 500; text-transform: uppercase; border-radius: 15px; text-decoration: none; padding: 10px 20px; margin-bottom: 30px;" href="{{route('make.revisor', compact('user'))}}">Rendi Revisore</a>
                  </div>
            </div>
      </div>
      <div style="background-color: #212529;  padding: 20px;">
            <div style="display: flex; align-items: center;">
                  <img alt="Logo" src="\assets\Risorsa-1.png"
                  style="width: 80px; height: 80px; margin: 20px;">
                  <div style="color: white;">
                        <p style="font-weight: 500; font-size: 15px; font-family: 'Montserrat', sans-serif;">Get in touch</p>
                        <p style="font-size: 11px; font-family: 'Montserrat', sans-serif;">Via Cagliari 25, Cagliari(CA)</p>
                        <p style="font-size: 11px; font-family: 'Montserrat', sans-serif;">0781-505060</p>
                        <p style="font-size: 11px; font-family: 'Montserrat', sans-serif;">info@presto.it</p>
                  </div>
            </div>
            
            <div style="color: white; font-size: 11px; font-family: 'Montserrat', sans-serif; margin-top: 20px; text-align: center;">
                  <hr style="width: 40%; margin-bottom: 20px;">
                  <a href="" style="text-decoration: none; color: white; font-weight: 700;">Presto.it</a>,  All Right Reserved {{date('Y')}}
            </div>
      </div>
      
</body>
</html>