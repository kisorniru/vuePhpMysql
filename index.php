<html>
    
    <head>
        
        <title>curd-vuejs2-php-mysqli</title>
        <link rel="icon" href="vuejs_logo.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script type="text/javascript" src="vuejs/axios.js"></script>
        
    </head>

    <body>

        <div id="root">

            <div class="container">

                <h1 class="fleft">List of Users</h1>
                <button class="fright" @click="showingAddModal = true">Add New</button>
                <div class="clear"></div>

                <hr>

                <p class="errorMessage" v-if="errorMessage">
                    {{ errorMessage }}
                </p>

                <p class="successMessage" v-if="successMessage">
                    {{ successMessage }}
                </p>

                <table class="List">
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tr v-for="user, i in users">
                        <td>{{ i+1 }}</td>
                        <td>{{ user.username }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.mobile }}</td>
                        <td><button @click="showingEditModal = true; getCurrentUser(user);">Edit</button></td>
                        <td><button @click="showingDeleteModal = true; getCurrentUser(user);">Delete</button></td>
                    </tr>
                </table>

            </div>

            <div class="modal" id="addModal" v-if="showingAddModal">
                
                <div class="modalContainer">
                    <div class="modalHeading">
                        <p class="fleft">Add New User</p>
                        <button class="fright close" @click="showingAddModal = false">X</button>
                        <div class="clear"></div>
                    </div>
                    <div class="modalContent">
                        <table class="form">
                            <tr>
                                <th>UserName</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="newUser.username"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="newUser.email"></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="newUser.mobile"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <th> </th>
                                <th> <button @click="showingAddModal = false; saveUser();">Save</button> </th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

            <div class="modal" id="editModal" v-if="showingEditModal">
                
                <div class="modalContainer">
                    <div class="modalHeading">
                        <p class="fleft">Edit This User</p>
                        <button class="fright close" @click="showingEditModal = false">X</button>
                        <div class="clear"></div>
                    </div>
                    <div class="modalContent">
                        <table class="form">
                            <tr>
                                <th>UserName</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="selectedUser.username"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="selectedUser.email"></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <th> : </th>
                                <td><input type="text" name="" v-model="selectedUser.mobile"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <th> </th>
                                <th> <button @click="showingEditModal = false; updateUser();">Update</button> </th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

             <div class="modal" id="deleteModal" v-if="showingDeleteModal">
                
                <div class="modalContainer">
                    <div class="modalHeading">
                        <p class="fleft">Are you sure?</p>
                        <button class="fright close" @click="showingDeleteModal = false">X</button>
                        <div class="clear"></div>
                    </div>
                    <div class="modalContent">
                        <p>You are going to delete <b>Mr. {{ selectedUser.username }}</b> from the list</p>
                        <br><br><br><br><br>
                        <button @click="showingDeleteModal = false; deleteUser();">Yes</button>
                        <button @click="showingDeleteModal = false">No</button>
                    </div>
                </div>

            </div>

        </div>

        <script type="text/javascript" src="vuejs/vue.js"></script>
        <script type="text/javascript" src="vuejs/app.js"></script>
    </body>

</html>