<html>
    
    <head>
        
        <title>curd-vuejs2-php-mysqli</title>
        <link rel="icon" href="vuejs_logo.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script type="text/javascript" src="vuejs/axios.js"></script>
        <!-- axios.js not dependent with vue.js SO you can use it any here of you project head/body -->
        <style type="text/css">

            

        </style>

    </head>

    <body>

        <div id="root">
            
            <button @click="getPosts()">Call API</button>

            <div v-for="post in posts">
                <h3>{{ post.name }}</h3>
                <img v-bind:src="post.photo }}" alt="" width="300px" height="300px">
            </div>

        </div>

        <script type="text/javascript" src="vuejs/vue.js"></script>
        <script type="text/javascript">

            // This is accessable from local
            var app = new Vue({
                el: '#root',
                data: {
                    posts: []
                },
                methods: {
                    getPosts: function(){
                        var currentApp = this;
                        axios.get("https://kisorniru.github.io/json-example/pets-data.json")
                        .then(function(apiResponse){
                            currentApp.posts = apiResponse.data.pets;
                            console.log(currentApp.posts);
                        });
                    }
                }
            });

        </script>
    </body>
</html>