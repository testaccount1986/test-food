import DS from 'ember-data';

export default DS.Model.extend({
    name: DS.attr('string'),
    shortName: DS.attr('string'),
    ingredients: DS.hasMany('ingredient'),
    recipe: DS.belongsTo('recipe')
});
