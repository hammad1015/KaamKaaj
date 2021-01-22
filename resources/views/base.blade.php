<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link 
        rel         ="stylesheet" 
        href        ="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity   ="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin ="anonymous"
    >

    <title>KaamKaaj</title>
</head>

<body>

    @include('navbar')
    <br>
    
    <div class="container col-12 col-md-6" >
        
        @yield('form')
        
    </div>
    <div class="container col-12 col-md-8">

        @yield('content')

    </div>
    

</body>

</html>