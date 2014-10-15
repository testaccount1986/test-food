import Ember from 'ember';

import DS from 'ember-data';

export default Ember.Route.extend({
    model: function(recipe) {
        this.store.push(
            'recipe',
            {
                id: 1,
                name: 'Lemon Chicken',
                cookingTime: '30 minutes',
                ingredients: [
                    'Chicken',
                    'Lemon',
                    'Thyme',
                ]
            }
        );
        this.store.push(
            'recipe',
            {
                id: 2,
                name: 'Beef Stroganoff',
                cookingTime: '30 minutes',
                ingredients: [
                    'Beef',
                    'Mustard',
                    'Mushrooms'
                ]
            }
        );
        this.store.push(
            'recipe',
            {
                id: 3,
                name: 'Caesar Salad',
                cookingTime: '25 minutes',
                ingredients: [
                     'Lettuce', 'Croutons', 'Parmesan'
                ]
            }
        );
        return this.store.find('recipe', recipe.id);
    }
});
