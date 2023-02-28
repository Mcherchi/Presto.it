<div style="display: block; margin: auto; max-width: 600px;" class="main">
    <h1 style="font-size: 18px; font-weight: bold; margin-top: 20px">Iscrizione Utente</h1>

    <p>Hai ricevuto una mail da: {{$user['name']}} </p>
    <p>Con email {{$user['email']}}</p>
    
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