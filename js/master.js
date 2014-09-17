var Router = Backbone.Router.extend({
    routes: {
        '' : 'home'
    }
});

var ContactsApp = Backbone.View.extend({
    
    el: '.contactsApp',
    
    render: function() {
        this.$el.html('Some new content here');
    }
    
});

var contactsApp = new ContactsApp();

var router = new Router();
router.on('route:home', function(){
    contactsApp.render();
});

Backbone.history.start();
