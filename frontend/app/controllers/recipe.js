import Ember from 'ember';

export default Ember.ArrayController.extend({
    filter: '',
    total: Ember.computed( function() {
        return this.model.get('length');
    }),
    recipeContent: function(items) {
        return this.model;
    }.property('recipeContent'),
    test: Ember.computed(
        function() {
        return this.get('filter');
    }
    ),
    filteredContent: function(){
        var filter = this.get('filter');
        var rx = new RegExp(filter, 'gi');
        return this.model.filter(function(recipe) {
            if (recipe.get('name').match(rx)) {
                return true;
            }
            if (recipe.get('cookingTime').match(rx)) {
                return true;
            }
            var ingredients = recipe.get('ingredients');
            for(var i=0; i<ingredients.length;i++) {
                if (ingredients[i].match(rx)) {
                    return true;
                }
            }
            return false;
        });
    }.property('filteredContent', 'filter'),
    actions: {
        view: function(recipe) {
            this.transitionTo('recipeView', recipe.get('id'));
        }
    }
});
