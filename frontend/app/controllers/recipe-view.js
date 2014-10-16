import Ember from 'ember';

export default Ember.ObjectController.extend({
    actions: {
        list: function() {
            this.transitionTo('recipe');
        }
    }
});
