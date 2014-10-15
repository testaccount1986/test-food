import DS from 'ember-data';

export default DS.Model.extend({
    name: DS.attr('string'),
    cookingTime: DS.attr('string'),
    ingredients: DS.attr('raw')
});
