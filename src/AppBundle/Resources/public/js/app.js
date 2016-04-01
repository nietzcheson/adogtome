$(document).ready(function(){
    $('#searchPets').on('click', function(){
        var breed = $('select[name="pets[breeds]"]').val(),
             gender = $('input[name="pets[gender]"]:checked').val();

             if(breed !=undefined && gender !=undefined){
                 searchPets(breed, gender);
             }
    });

    function searchPets(breed, gender)
    {
        $.ajax({
            url: Routing.generate('api_pets', { breed: breed, gender: gender}),
            dataType: 'json',
            success: function(data){

                if(data.pets !=0){
                    $('#resultSearchPets').fadeIn(500);
                    $('#resultSearchPets').html(data.pets);
                    $('#homePets').fadeOut(500);
                    $('.navigation').fadeOut(500);
                    $('#alertsPets').html('<div class="alert alert-info" role="alert"><strong>'+data.quantity+' found</strong></div>');
                }else{
                    $('#homePets').fadeIn(500);
                    $('.navigation').fadeIn(500);
                    $('#alertsPets').html('<div class="alert alert-danger" role="alert"><strong>No results</strong></div>');
                    $('#resultSearchPets').fadeOut(100);
                }
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    }
});
