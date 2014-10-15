import Ember from 'ember';

export default Ember.Controller.extend({
    actions: {
        list: function() {
            this.transitionTo('recipe');
        }
    }
});
