const express = require('express');
const router = express.Router();
const Package = require('../models/Package');

// GET all packages
router.get('/packages', async (req, res) => {
  try {
    const packages = await Package.find();
    res.json(packages);
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
});

// POST a package
router.post('/packages', async (req, res) => {
  const newPackage = new Package(req.body);
  try {
    const savedPackage = await newPackage.save();
    res.status(201).json(savedPackage);
  } catch (error) {
    res.status(400).json({ message: error.message });
  }
});

module.exports = router;
