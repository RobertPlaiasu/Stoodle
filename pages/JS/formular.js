$(document).ready(function(){
    $.getJSON( "ajax/fromular.json", function( data ) {
        $.each( data, function() {
            for (let i = 0; i < data.classSelect.length; i++) 
                $(".classSelect").append(`<option value="${data.classSelect[i]}">${data.classSelect[i]}</option>`);

            for (let i = 0; i < data.county.length; i++) 
                $("#countyPassion").append(`<option value="${data.county[i]}">${data.county[i]}</option>`);

            for (let i = 0; i < data.branch.length; i++) 
                $("#branchSelect").append(`<option value="${data.branch[i]}">${data.branch[i]}</option>`);

            for (let i = 0; i < data.books.length; i++) 
                $("#booksSelect").append(`<option value="${data.books[i]}">${data.books[i]}</option>`);

            for (let i = 0; i < data.passion.length; i++) 
                $("#passionSelect").append(`<option value="${data.passion[i]}">${data.passion[i]}</option>`);
        });
    });
})