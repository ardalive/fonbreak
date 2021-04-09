/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import $ from 'jquery';

const socket = new WebSocket('wss://fonbreak.com:8000/ajax/');

socket.addEventListener('open', function (event) {
    socket.send('Hello Server!');
});

socket.addEventListener('message', function (event) {
    console.log('Message from server ', event.data);
});

$(document).ready(function(){
    $("button, .ticket").click(function(){
        $.ajax(
            {
                // url: '/ajax',
                url: 'https://fonbreak.com:8000/ajax/',
                dataType: 'json',
                type: 'POST',
                data: {
                    id: $(this).attr('id')
                },
                success: function(result){
                    console.log(result);
                }});
    });
});