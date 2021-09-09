<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>todoListe </title>   

    </head>
    <body class="antialiased">
       <h1>Ici, la liste de vos ToDo Listes</h1>
       @foreach($allListes as $liste)
        <div>
            <div>
                <button>
                     <a href=<?php echo "/api/todo_liste/$liste->id"; ?>>
                         <label for=<?php echo "liste $liste->id"; ?>></label>
                         <input type="text" id=<?php echo "liste $liste->id"?> name="name" value="{{$liste->name}}" disabled>
                     </a>
     
                </button>
            </div>
            <div>
                <a href="/api/listes/update/{{$liste->id}}" >modifier</a>
            </div>
            <div>
                <a href="/api/listes/destroy/{{$liste->id}}" >delete</a>
            </div>
        </div>
       @endforeach
       <div>
            

            <div id='formContainer' >
                <form action="/api/listes/store" method="post" class="form-example">
                    <div class="">
                        <label for="name">Enter your new list: </label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="save!">
                    </div>
                </form>
            </div>
        </div>


        <script>
          
        </script>
    </body>
</html>
