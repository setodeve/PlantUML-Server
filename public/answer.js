import data from "./data.json" assert { type: "json" };
let typeAnswer = "UML"
const answer = document.getElementById('answer-container-show')
const buttonUML = document.getElementById('buttonUML')
const buttonCODE = document.getElementById('buttonCODE')
const answerCode = IntialAnswer()["code"]

window.addEventListener("load", (event) => {
  proceedAnswer("UML");
});

buttonUML.addEventListener("click", () => {
  proceedAnswer("UML")
});

buttonCODE.addEventListener("click", () => {
  proceedAnswer("CODE")
});

function proceedAnswer(type) {
  typeAnswer = type
  fetch('renderAnswer.php', {
      method: 'POST',
      body: JSON.stringify({
        "textData":answerCode,
        "type":typeAnswer
      })
  })
  .then(response => response.json())
  .then(res => {
    answer.innerHTML = ""
    if (res["type"]=="UML"){
      const ele = document.createElement('img')
      ele.setAttribute('src', res["data"])
      answer.appendChild(ele)
    }else{
      const ele = document.createElement('div')
      ele.innerHTML = res["data"].replaceAll('\n', '<br>');
      answer.appendChild(ele)
    }
  })
  .catch(error => {
      console.log(error);
  });
}

function IntialAnswer(){
  const url = new URL(window.location.href);
  const title = url.searchParams.get('title');
  return data.find(d => d.title === title);
}