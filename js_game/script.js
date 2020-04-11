var jora = {name: "Jora", height:"184", age:"25"};
var borya = {name: "Borya", height:"175", age:"18"};
var mary = {name: "Mary", height:"168", age:"19"};

function runGame() {
	var joraScore = jora.height + 5 * jora.age; 
	var boryaScore = borya.height + 5 * borya.age;
	var maryScore = mary.height + 5 * mary.age;

	 if (joraScore > boryaScore && joraScore > maryScore) {
	 	console.log(jora.name + ' wins the game with ' + joraScore + ' points!');
	 }

	 else if (boryaScore > joraScore && boryaScore > maryScore){
	 	console.log(borya.name + ' wins the game with ' + boryaScore + ' points!');
	 }

	 else if (maryScore > joraScore && maryScore > boryaScore) {
	 	console.log(mary.name + ' wins the game with ' + maryScore + ' points!');
	 }

	 else {
	 	console.log('There is a draw.'); 
	 }
}

runGame();