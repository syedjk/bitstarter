#!/usr/bin/env node

//PrimeNumbers
var isPrime = function(n, d){
	if(d == 1) {return true;}
	else if(n%d == 0) {return false;}
	else {return isPrime(n,d-1);}
};

var firstkfib = function(k){
	var i = 1;
	var arr = [];
	for(i=1;i<k+1;i++){
		if(isPrime(i,i-1))
			arr.push(i);
	}
	return arr;
};

var fmt = function(arr){
	return arr.join(",");
};

var fs = require('fs');
var outFile = "primeNum.txt";


var k = 541;
console.log("PrimeNumbers(" + k + ")");
fs.writeFileSync(outFile, fmt(firstkfib(k))+"\n");
console.log(fmt(firstkfib(k)));
