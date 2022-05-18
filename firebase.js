
firebase = require('firebase');
url = require('url');

var config = {
    apiKey: "AIzaSyArExeckKTS22ijowqbGvFO39Tqe6jtEqc",
    authDomain: "car-fc895.firebaseapp.com",
    databaseURL: "https://car-fc895.firebaseio.com",
    projectId: "car-fc895",
    storageBucket: "car-fc895.appspot.com",
    messagingSenderId: "435057324541"
};

var arrDrivers = new Array();
var indexObj = 0;
firebase.initializeApp(config);

var starCountRef = firebase.database().ref('data');
starCountRef.on('value', function (snapshot) {
    var dataValue = snapshot.val();
    alert(dataValue.data);
});
