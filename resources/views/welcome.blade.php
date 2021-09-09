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
            <button>
                 <a href=<?php echo "todo_liste/$liste->id"; ?>>
                     <label for=<?php echo "liste $liste->id"; ?>></label>
                     <input type="text" id=<?php echo "liste $liste->id"?> name="name" value="{{$liste->name}}" disabled>
                 </a>
 
            </button>
        </div>
       @endforeach
    </body>
</html>
