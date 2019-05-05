
const express = require('express')
const app = express()
const pug = require('pug')
const bodyParser = require('body-parser')
const view_path = './views'// the "theme" path

function initUser (app) {
  app.use(bodyParser.urlencoded({ extended: true }));
  app.set('views', view_path )
  app.set('view engine', 'pug')


  app.get('/rorcalcresults', function(req, res) {
    res.render('ror-calc-results')
  })

  app.get('/all', function(req, res) {
    res.send(JSON.stringify(DATAFILE));
  })

  app.get('/data/:idx/:key', function(req, res) {
    var idx = req.params['idx'];
    var key = req.params['key'];
    res.send(JSON.stringify(DATAFILE[idx][key]));
  })

  //main dash
  app.get('/', function(req, res) {
    res.render('index', { title: "Acutal vs. Average ROR Calculator" })
  })

   // 404
  app.use(function (req, res, next) {
    res.status(404).send("404: Sorry can't find that!!")
  })

  //500
  app.use(function (err, req, res, next) {
    console.error(err.stack)
    res.status(500).send('500: Something broke!')
  })
}// initUser

module.exports = initUser
