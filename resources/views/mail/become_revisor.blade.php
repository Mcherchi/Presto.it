<div style="display: block; margin: auto; max-width: 600px;" class="main">
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
        background-color: white;
    }

    a:hover {
        border-left-width: 1em;
        min-height: 2em;
    }
</style>