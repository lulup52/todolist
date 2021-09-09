
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>todoListe </title>

       


    </head>
    <body>
        <div>
            <span>{{$listeTitle}}</span>
            <span><a href="/api">retour</a></span>
        </div>
        <div>
            @foreach($todoListe as $todo)
            <button>switch</button>
            <input value="{{$todo->content}}"></input>
            <div>
                <a href="/api/todos/destroy/{{$todo->id}}" >delete</a>
            </div>
            @endforeach
            <div class='addButon'>
            

                <div id='formContainer' >
                    <form action="/api/todos/store" method="post" class="form-example">
                        <div class="">
                            <label for="content">what to do ? </label>
                            <input type="text" name="content" id="content" required>
                            <label for="liste_id"></label>
                            <input type="hidden" name="liste_id" id="liste_id" required value={{$liste_id}}>
                        </div>
                        <div class="form-example">
                            <input type="submit" value="save!">
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </body>
   
</html>
