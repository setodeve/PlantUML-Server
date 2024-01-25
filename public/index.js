let editor
const output = document.getElementById('output-container')

window.addEventListener("load", (event) => {
  proceedOutput();
});

require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' }});
require(['vs/editor/editor.main'], function() {
  editor = monaco.editor.create(document.getElementById('input-container'), {
        value: [
            '',
            '@startuml',
            'Bob -> Alice : hello',
            '@enduml',
            ''
        ].join('\n'),
        language: 'markdown',
        automaticLayout: true
    });
    monaco.editor.setTheme('default')
    
    editor.onDidChangeModelContent(e => {
      proceedOutput()      
    });
  });


function proceedOutput() {
  fetch('renderOutput.php', {
      method: 'POST',
      body: JSON.stringify({
        "textData":editor.getValue()
      })
  })
  .then(response => response.text())
  .then(res => {
    output.innerHTML = ""
    let img = document.createElement('img')
    img.setAttribute('src',res)
    output.appendChild(img)
  })
  .catch(error => {
      console.log(error);
  });
}