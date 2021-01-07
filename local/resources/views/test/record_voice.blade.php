<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Voice Controlled Notes App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
        <link href="{{ asset('dist/voice_convert_to_text/styles.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="app"> 
                <div class="input-single">
                    <textarea id="note-textarea" placeholder="Create a new note by typing or using voice recognition." rows="6"></textarea>
                </div>         
                <button id="start-record-btn" title="Start Recording">Start Recognition</button>
                <button id="pause-record-btn" title="Pause Recording">Pause Recognition</button>
                <button id="save-note-btn" title="Save Note">Save Note</button>   
            </div>

        </div>

        <script src="{{asset('/assets/dist/js/jquery.min.js')}}"></script>
        <script src="{{ asset('dist/voice_convert_to_text/script.js')}}"></script>


    </body>
</html>


