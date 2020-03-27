@include('inc.head')
<body>
    
        @include('inc.navbar')
        
    <div class="container">
            @include('inc.messages')
            @yield('content')
    </div>   
        
   
</body>
</html>
