/* ROR CALCULATOR
 * ================================================
 * ACTUAL VS AVERAGE ROR CALCULATOR FOR INCISIC
 * Jon C. Wretlind
 * Developer
 * ================================================
 * @version 1.10.0a
 *
 */
var express = require('express')
var fs = require('fs')
var app = express()
global.DATAFILE

app.set('port', (process.env.PORT || 5000))
app.use(express.static(__dirname + '/public'))

// read in datafile for the application into a global
console.log("loading JSON datafile...")
var data = fs.readFileSync(__dirname + '/public/data/rorcalc_schiller.json')

function escapeSpecialChars(data) {
    return data.toString().replace(/\n/g, "\\n")
        .replace(/\r/g, "\\r")
        .replace(/\t/g, "\\t")

}
escapeSpecialChars(data)
DATAFILE = JSON.parse(data)

//

//ROUTES
require('./routes').routes(app)


app.listen(app.get('port'), function() {
  console.log("Node app is running at localhost:" + app.get('port'))
})
