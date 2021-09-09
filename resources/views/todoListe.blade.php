<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>todoListe </title>

    </head>
    <body class="antialiased">
       <h1>{{$listeTitle}}</h1>

       @foreach($todoListe as $todo)
        <li>
            <input type="checkbox" id=<?php echo "$todo->id"; ?> name="todo" 
            <?php echo "checked"; ?>
            
            >


            <p>
                {{ $todo["content"] }}
                {{ $todo["finished"] }}
                
            </p>
            
        </li>

       @endforeach
    </body>
</html>
