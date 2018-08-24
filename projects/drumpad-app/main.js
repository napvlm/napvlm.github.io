


function playSound(e) {
	const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
	const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
	if (!audio) return; //stop the function from running
<<<<<<< HEAD
   
	audio.currentTime = 0;
	audio.play();
	key.classList.add('playing'); 
=======

// 	audio.currentTime = 0;
	audio.load();
	audio.play(); 
	key.classList.add('playing');
>>>>>>> 13dbe02f063075f4bf8de327ce7dcd6c1b468b0e
};


function removeTransition(e) {
	if (e.propertyName !=='transform')
		return;
	this.classList.remove('playing');
};

const keys = document.querySelectorAll('.key');

keys.forEach(keys => keys.addEventListener('transitionend', removeTransition));

window.addEventListener('keydown',playSound);
