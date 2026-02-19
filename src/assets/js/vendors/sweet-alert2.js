$(document).ready(function () {

    function resetEmotes() {

        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    }

    document.getElementById ("backupDB")

        .addEventListener ("click", resetEmotes, false);

});
