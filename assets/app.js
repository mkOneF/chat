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

const eventSource = new EventSource("http://localhost:3000/.well-known/mercure?topic=message");
eventSource.onmessage = event => {
    const data = JSON.parse(event.data);

    $('.message-inner').append(
        $('<div>')
            .attr('class', 'message')
            .append(
                $('<div>')
                    .attr('class', 'name')
                    .text(`${data.name}: `)
            )
            .append(
                $('<div>')
                    .attr('class', 'casual-message')
                    .text(data.message)
            )
    );
}

$('form').on('submit', function(event) {
    const $form = $(this);
    const data = $form.serializeArray();

    $.post({
        url: $form.attr('url'),
        data: {
            message: data[1].value,
            name: data[0].value,
        }, // meh
    });

    $form.find('[name=message]').val('');
    event.preventDefault();
});


