import Ember from 'ember';
import config from './config/environment';

var Router = Ember.Router.extend({
  location: config.locationType
});

Router.map(function() {
  this.route('recipe');
  this.route(
      'recipeView',
      {path: 'recipeView/:id'}
  );
});

export default Router;
