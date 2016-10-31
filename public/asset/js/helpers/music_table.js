

$(document).ready(function(){

    create_audio_player = function(url_counter){
        $("#floating-player").addClass("none-null");
        var hidden_url = $("#hidden-song-url"+url_counter).val();
        var hidden_title = $("#hidden-song-title"+url_counter).val();
        var audio_setup = "<h4 id='now-playing'>Now Playing : <b>"+hidden_title+"</b>" +
                          "</h4><center><audio autoplay controls style='background-color:black;'> " +
                          " <source src='"+hidden_url+"' " +
                          "type='audio/mp3' >"+"</audio></center>";
        $("#floating-player").html(audio_setup);

    }

});