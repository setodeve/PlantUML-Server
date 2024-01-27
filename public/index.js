let editor
const output = document.getElementById('output-container-show')
const buttonPNG = document.getElementById('buttonPNG')
const buttonSVG = document.getElementById('buttonSVG')
const buttonTXT = document.getElementById('buttonTXT')
require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' }});
require(['vs/editor/editor.main'], function() {
  editor = monaco.editor.create(document.getElementById('input-container'), {
        value: '',
        language: 'markdown',
        automaticLayout: true,
        colors: {
          "editor.background": '#dce7f2'
        }
    });
    
    
    editor.onDidChangeModelContent(e => {
      proceedOutput()      
    });
  });

window.addEventListener("load", (event) => {
  proceedOutput();
});

buttonPNG.addEventListener("click", () => {
  downloadOutput("png")
}, false);

buttonSVG.addEventListener("click", () => {
  downloadOutput("svg")
}, false);

buttonTXT.addEventListener("click", () => {
  downloadOutput("txt")
}, false);

function downloadOutput(type){
  fetch('renderOutput.php', {
    method: 'POST',
    body: JSON.stringify({
      "textData":editor.getValue(),
      "type":type
    })
  })
  .then(response => response.text())
  .then(res => {
    const url = res;
    if (type == "txt"){
      downloadTxt(res)
    }else{
      downloadImage(url,type)
    }
  })
  .catch(error => {
      console.log(error);
  });
}

function proceedOutput() {
  fetch('renderOutput.php', {
      method: 'POST',
      body: JSON.stringify({
        "textData":editor.getValue(),
        "type": "png"
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

async function downloadImage(imageSrc,type){
  try {
      const image = await fetch(imageSrc);
      const imageBlob = await image.blob();
      const imageURL = URL.createObjectURL(imageBlob);

      const mimeTypeArray = imageBlob.type.split('/');
      const extension = mimeTypeArray[1];

      const link = document.createElement('a');
      link.href = imageURL;
      link.download = `test.${type}`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
  } catch (error) {
      throw new Error(`${error}. Image src: ${imageSrc}`);
  }
}

async function downloadTxt(fileUrl) {
  const response = await fetch(fileUrl);
  const blob = await response.blob();
  const newBlob = new Blob([blob]);
  const objUrl = window.URL.createObjectURL(newBlob);
  const link = document.createElement("a");
  link.href = objUrl;
  link.download = "test.txt";
  link.click();

  setTimeout(() => {
    window.URL.revokeObjectURL(objUrl);
  }, 250);
}