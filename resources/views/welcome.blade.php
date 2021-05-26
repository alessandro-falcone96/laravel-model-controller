<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            div{
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>

        <div class="content">
            <div id="app">
                <ul>
                    <li v-for="film in films">
                        <h3>@{{film.title}}</h3>
                    </li>
                </ul>
            </div>
        </div>


        {{-- AXIOS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- VUE JS --}}
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    films: []
                },
                mounted: function() {
                    axios.get('/api/movies')
                    .then((response) => {
                        this.films = response.data;
                        // console.log(this.films);
                    });
                }
            })
        </script>

    </body>
</html>
