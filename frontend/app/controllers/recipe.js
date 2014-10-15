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
        var self = this;
        this.recipeContent = this.model.filter(function(recipe) {
            if (recipe.get('name').match(rx)) {
                return true;
            }
            if (recipe.get('cookingTime').match(rx)) {
                return true;
            }
            return false;
        });
        this.total = this.recipeContent;
    }.observes('filter'),
    actions: {
        view: function(recipe) {
            this.transitionTo('recipeView', recipe.get('id'));
        }
    }
});
