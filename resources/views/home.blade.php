<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Teams and Players</title>
        
        <link href="/css/bulma.css" rel="stylesheet" type="text/css">
        <link href="/css/all.css" rel="stylesheet" type="text/css">

    </head>
    <body>
            <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                      </a>
                    </div>
                  
                    <div id="navbarBasicExample" class="navbar-menu">
                      <div class="navbar-start">
                        <a class="navbar-item">
                          Sports
                        </a>
                      </div>
                  
                      <div class="navbar-end">
                        <div class="navbar-item">
                          <div class="buttons">
                          
                            <a href="/logout" class="button is-light">
                              Logout
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </nav>
       <div class="container">
            
           <section class="section" id="app">
               <navigation></navigation>
               <router-view></router-view>
               <team-modal></team-modal>
               <player-modal></player-modal>
               <new-player-modal></new-player-modal>
           </section>
       </div>
       <script src='/js/app.js'></script>
       <script src='/js/hamburger.js'></script>
    </body>
</html>
