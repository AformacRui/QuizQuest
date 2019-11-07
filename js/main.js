let event1 = document.getElementById("clickChoice1");

event1.addEventListener("click", function(){

document.getElementById("validChoice").innerText = "Hello World!";
});

let event2 = document.getElementById("clickChoice2");

event2.addEventListener("click", function(){
document.getElementById("validChoice").innerText = "Hello World!3";
});

let event3 = document.getElementById("clickChoice3");

event3.addEventListener("click", function(){
  document.getElementById("validChoice").innerText = "Hello YOU";
});

let event4 = document.getElementById("clickChoice4");

event4.addEventListener("click", function(){
  document.getElementById("validChoice").innerText = "Hello Youuuuuu";
});

var event5 = document.getElementById("clickChoice5");

event5.addEventListener("click", function(){
  document.getElementById("validChoice").innerHTML = "Voulez-vous jouer à ce quizz 5";
});


var event6 = document.getElementById("clickChoice6");

event6.addEventListener("click", function(){
  document.getElementById("validChoice").innerText = "Voulez vous jouer à ce quizz 6";
});

console.log("OK");