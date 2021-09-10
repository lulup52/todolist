
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>todoListe </title>
        <link href='/css/style.css' rel="stylesheet">
       
    </head>
    <body>
        <div class='content'>
           <a href="/api" class='actionButton backButton'>retour</a>
            <h1 class='title'>{{$listeTitle}}</h1>
            <div>
                <ul class="listeTodoListe">
                    @foreach($todoListe as $todo)
                        <li>
                            <div>
                                <p class='listeContent' id="content{{$todo->id}}">
                                {{$todo->content}}
                                </p>
                            </div>

                            <div class='contentOptionBlock'>
                                <div class='updateForm' id="updateForm{{$todo->id}}">

                                    <form action="/api/todos/update/{{$todo->id}}" method="post" class="form-example">
                                        <div class="">
                                            <label for="contentUpdate"></label>
                                            <input type="text" name="name" id="contentUpdate" value=<?php echo $todo->content ?>  />
                                        </div>
                                        <div class="">
                                            <input type="submit" value="save!">
                                        </div>
                                    </form>

                                </div>
                                <div class='optionContainer' id="option{{$todo->id}}"> 
                                    <button class='' onClick="updateTodo('{{$todo->id}}')" id="{{$todo->id}}">modifier</button>
                                    <a class='actionButton' href="/api/todos/destroy/{{$todo->id}}" >delete</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <div id='formContainer' >
                    <form action="/api/todos/store" method="post" class="form-example">
                        <div class="">
                            <label for="content">what to do ? </label>
                            <input type="text" name="content" id="content" required>
                            <label for="listeId"></label>
                            <input type="hidden" name="liste_id" id="listeId" value="{{$liste_id}}">
                        </div>
                        <div class="form-example">
                            <input type="submit" value="save!">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
        function updateTodo(testValue) {
            let styleElement = document.getElementById(`updateForm${testValue}`).style.display 
            if(styleElement==='') {
                document.getElementById(`content${testValue}`).style.display ='none'
                document.getElementById(`option${testValue}`).style.display ='none'
                document.getElementById(`updateForm${testValue}`).style.display ='block'
            } else if (styleElement==='block') {
                document.getElementById(`content${testValue}`).style.display ='block'
                document.getElementById(`option${testValue}`).style.display ='block'
                document.getElementById(`updateForm${testValue}`).style.display =''
                
            }
        }

        </script>
    </body>
   
</html>
