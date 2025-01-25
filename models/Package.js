const mongoose = require('mongoose');

const packageSchema = new mongoose.Schema({
  name: String,
  price: Number,
  description: String,
  imageUrl: String,
});

module.exports = mongoose.model('Package', packageSchema);
