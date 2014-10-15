import DS from 'ember-data';

export default DS.RESTAdapter.registerTransform('raw', {
    deserialize: function(serialized) {
        return serialized;
    },  
    serialize: function(deserialized) {
        return deserialized;
    }   
});
