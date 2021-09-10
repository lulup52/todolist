<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='/css/style.css' rel="stylesheet">
        <title>todoListe </title>   

    </head>
    <body >
        <div class='content'>
            <h1 class='title'>Here is your toto lists</h1>
            <ul class="listeTodoListe">
                @foreach($allListes as $liste)
                    <li>
                        <div>
                            <a href=<?php echo "/api/todo_liste/$liste->id"; ?> class='listeName' id="liste{{$liste->id}}">
                            {{$liste->name}}
                            </a>

                
                        </div>
                        <div class='listeOptionBlock'>
                            <div class='updateForm' id="updateForm{{$liste->id}}">

                                <form action="/api/listes/update/{{$liste->id}}" method="post" class="form-example">
                                    <div class="">
                                        <label for="nameUpdate"></label>
                                        <input type="text" name="name" id="nameUpdate" value=<?php echo $liste->name ?>  />
                                    </div>
                                    <div class="form-example">
                                        <input type="submit" value="save!">
                                    </div>
                                </form>

                            </div>
                            <div class='optionContainer' id="option{{$liste->id}}"> 
                                <button class='optionButton' onClick="updateListe('{{$liste->id}}')" id="{{$liste->id}}">modifier</button>
                                <a class='optionButton actionButton' href="/api/listes/destroy/{{$liste->id}}" >delete</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div>
                <div id='formContainer' >
                    <form action="/api/listes/store" method="post" class="form-example">
                        <label for="nameListe">Enter your new list title: </label>
                        <input type="text" name="name" id="nameListe" required>
                        <input type="submit" value="save!">
                    </form>
                </div>
            </div>
        </div>
        
        <script>


        function updateListe(testValue) {
            let styleElement = document.getElementById(`updateForm${testValue}`).style.display 
            if(styleElement==='') {
                document.getElementById(`liste${testValue}`).style.display ='none'
                document.getElementById(`option${testValue}`).style.display ='none'
                document.getElementById(`updateForm${testValue}`).style.display ='block'
            } else if (styleElement==='block') {
                document.getElementById(`liste${testValue}`).style.display ='block'
                document.getElementById(`option${testValue}`).style.display ='block'
                document.getElementById(`updateForm${testValue}`).style.display =''
                
            }
        }

        </script>
    </body>
</html>
