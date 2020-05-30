$(function() {
    
    //autocompletion 
    $("#type").autocomplete({
        source: "index.php?controleur=Type&action=index",
        minLength: 1
    });                

});