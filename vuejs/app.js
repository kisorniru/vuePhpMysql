// This is accessable from local
var app = new Vue({

    el: "#root",
    data: {
        showingAddModal: false,
        showingEditModal: false,
        showingDeleteModal: false,
        successMessage: "",
        errorMessage: "",
        users: [],
        newUser: { username: "", email: "", mobile: ""},
        selectedUser: {}
    },
    mounted: function(){
        this.getAllUsers();
    },
    methods: {
        getAllUsers: function(){
            axios.get("http://vuephpmysql.local/database/api.php?action=read")
            .then(function (callbackResponse){
                if (callbackResponse.data.error) {
                    app.errorMessage = callbackResponse.data.message;
                } else {
                    app.users = callbackResponse.data.users;
                }
            });
        },
        saveUser: function(){
            var formData = app.toFormData(app.newUser);
            axios.post("http://vuephpmysql.local/database/api.php?action=create", formData)
            .then(function (callbackResponse){
                app.newUser = { username: "", email: "", mobile: ""};
                if (callbackResponse.data.error) {
                    app.errorMessage = callbackResponse.data.message;
                } else {
                    app.successMessage = callbackResponse.data.message;
                    app.getAllUsers();
                }
            });
        },
        getCurrentUser: function(user){
            app.selectedUser = user;
        },
        updateUser: function(){
            var formData = app.toFormData(app.selectedUser);
            axios.post("http://vuephpmysql.local/database/api.php?action=update", formData)
            .then(function (callbackResponse){
                app.selectedUser = {};
                if (callbackResponse.data.error) {
                    app.errorMessage = callbackResponse.data.message;
                } else {
                    app.successMessage = callbackResponse.data.message;
                }
                app.getAllUsers();
            });
        },
        deleteUser: function(){
            var formData = app.toFormData(app.selectedUser);
            axios.post("http://vuephpmysql.local/database/api.php?action=delete", formData)
            .then(function (callbackResponse){
                app.selectedUser = {};
                if (callbackResponse.data.error) {
                    app.errorMessage = callbackResponse.data.message;
                } else {
                    app.successMessage = callbackResponse.data.message;
                }
                app.getAllUsers();
            });
        },
        toFormData: function(obj){
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
                // console.log(key, obj[key]);
            }
            return form_data;
        },
        clearMessage: function(){
            app.errorMessage = "";
            app.successMessage = "";
        }
    }
});