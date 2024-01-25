let editor
const html = document.getElementById('output-container')

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
      
    });
  });
