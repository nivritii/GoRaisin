/*var myEditor = document.querySelector('#editor-container')
var html = myEditor.children[0].innerHTML*/

var quill = new Quill('#editor-container', {
    modules: {
        toolbar: [
            ['bold', 'italic'],
            ['link', 'blockquote', 'code-block', 'image'],
            [{ list: 'ordered' }, { list: 'bullet' }]
        ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});

/*var myEditor = document.querySelector('#editor-container')
var html = myEditor.children[0].innerHTML;*/

var form = document.querySelector('cLDesc');
form.onsubmit = function() {
    // Populate hidden form on submit
    quill.editor.root.innerHTML
    var delta = quill.getContents();
    var about = document.querySelector('input[name=cLDesc]').children[0].innerHTML;
    about.value = JSON.stringify(quill.getContents());


    /*console.log("Submitted", $(form).serialize(), $(form).serializeArray());*/

    return false;
};
