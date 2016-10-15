$(document).ready(function() {

    var i, j, k, subtotal;
    var locations = [];
    var count = 0;
    var unique = true;
    var data = JSON.parse(document.getElementById('js').innerHTML);

    /* Find unique cinemas */
    for (i = 0; i < data.location.length; i++) {
        for (j = 0; j < locations.length; j++) {
            if (locations[j].name == data.location[i].name) {
                unique = false;
            }
        }
        if (unique) {
            locations[count] = {};
            locations[count].name = data.location[i].name;
            locations[count].id = data.location[i].id;
            count++;
        }
        unique = true;
    }

    /* Push to form */
    for (i = 0; i < locations.length; i++) {
        $("#selectLocation").append(new Option(locations[i].name, locations[i].id));
    }

    /* Listen for location selection */
    $("#selectLocation").on("change", function (event) {
        for (i = 0; i < data.sessions.length; i++) {
            if (data.sessions[i].location_id == $("#selectLocation").val()) {
                $("#selectSession").append(new Option(data.sessions[i].time, data.sessions[i].id));
            }
        }
    });

    /* Populate quantities */
    for (k = 0; k <= 10; k++) {
        $(".quantity").append(new Option(k, k));
    }

    /* Update subtotal */
    $(".modal-content").change(function() {
        var total = 0.0;
        $(".table>tbody>tr").each(function () {
            var quantity = $(this).find("option:selected").val();
            var price = $(this).find(".price").text().replace(/[^\d.]/, "");
            var amount = (quantity * price);
            total += parseInt(amount);
            $(this).find(".subtotal").text("$" + amount.toFixed(2));
        });

        $(".total").text("$" + total.toFixed(2));

        /* Buy now enabled */
        if (total != 0 && $("#selectLocation").val() != null && $("#selectSession").val() != null) {
            $(".buy-now").prop("disabled", false);
        } else {
            $(".buy-now").prop("disabled", true);
        }

    });

});