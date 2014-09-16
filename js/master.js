ContactsApp = Backbone.Model.extend({
    initialize: function(){
        $(".loginPage").fadeIn(1000);
    },
    
    autentificate: function(e) {
        e.stopPropagation();
        alert('autentificate called!');
    }
    
});
ContactsView = Backbone.View.extend({
    
    model: ContactsApp,
    
    events: {
        "click #signIn"         : "act",
    },
    
    act: function() {
        this.model.autentificate();
    }
    
});

var contacts = new ContactsApp({});
var view = new ContactsView();