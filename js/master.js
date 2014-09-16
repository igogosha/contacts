ContactsApp = Backbone.Model.extend({
    initialize: function(){
        alert("Welcome to this world");
    }
    
});
var contactsView = Backbone.View.extend({});

var contacts = new ContactsApp();