let typeAnswer = "UML"
const answer = document.getElementById('answer-container-show')
const buttonUML = document.getElementById('buttonUML')
const buttonCODE = document.getElementById('buttonCODE')

window.addEventListener("load", (event) => {
  proceedAnswer(typeAnswer);
});

function proceedAnswer(type) {
  typeAnswer = type
  data =  '@startuml\nBob -> Alice : hello\n@enduml'
  fetch('renderAnswer.php', {
      method: 'POST',
      body: JSON.stringify({
        "textData":data,
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
      console.log(ele.innerHTML)
      answer.appendChild(ele)
    }


  })
  .catch(error => {
      console.log(error);
  });
}