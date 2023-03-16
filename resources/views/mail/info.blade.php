<div style="display: block; margin: auto; max-width: 600px;" class="main">
    <h1 style="font-size: 18px; font-weight: bold; margin-top: 20px">Richiesta informazioni</h1>
    <p>richiesta informazioni per:</p>
    <p>Annuncio con id: {{$details['announcement_id']}}</p>
    <p>Nome Annuncio: {{$details['announcement_title']}}</p>
    <br>
    <p>da: {{$details['name']}} </p>
    <p>Con email {{$details['email']}}</p>
    <p>Descrizione Richiesta: {{$details['description']}}</p>
    
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