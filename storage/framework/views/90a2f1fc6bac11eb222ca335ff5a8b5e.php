<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Houses</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    </head>
    <body>
    <div class="ui two column centered grid">
        <div class="four column centered row">
            <div class="column"></div>
            <div class="column"></div>
        </div>
        <div class="column">
            <div class="main ui container" style="padding: 2em 2em">
                <form class="ui form">
                    <h4 class="ui dividing header">Search form</h4>
                    <div class="field">
                        <label>Name</label>
                        <div class="">
                            <div class="field">
                                <input type="text" name="name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Bedrooms</label>
                            <input type="text" name="bedrooms" maxlength="16" placeholder="Bedrooms">
                        </div>
                        <div class="four wide field">
                            <label>Bathrooms</label>
                            <input type="text" name="bathrooms" maxlength="3" placeholder="Bathrooms">
                        </div>
                        <div class="four wide field">
                            <label>Storeys</label>
                            <input type="text" name="storeys" maxlength="3" placeholder="Storeys">
                        </div>
                        <div class="four wide field">
                            <label>Garages</label>
                            <input type="text" name="garages" maxlength="3" placeholder="Garages">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <label>Price</label>
                            <div class="two fields">
                                <div class="field">
                                    <input type="text" name="price_from" placeholder="From">
                                </div>
                                <div class="field">
                                    <input type="text" name="price_to" placeholder="To">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui button" tabindex="0" id="submit">Search</div>
                </form>
            </div>
        </div>
        <div class="column" style="padding: 2em 2em">
            <div id="searching" style="display: none">Searching...</div>
            <div id="nofound" style="display: none">Found nothing.</div>
            <div>
                <table class="ui celled table" style="display: none">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Storeys</th>
                            <th>Garages</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="four column centered row">
            <div class="column"></div>
            <div class="column"></div>
        </div>
    </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#submit').on('click', function () {
            $("#searching").show();
            $("#content").empty();

            const url = window.location.origin + "/api/houses/";
            let params = {};
            $('input').each((index, element) => params[$(element).attr('name')] = $(element).val());
            $.ajax({
                method: "GET",
                url: url,
                data: params
            })
            .done(function (result) {
                $("#searching").hide();
                if (result.length === 0) {
                    $("#nofound").show();
                    $("table").hide();
                } else {
                    $("#nofound").hide();
                    let html = "";
                    $(result).each(function (index, element) {
                        console.log(element);
                        html +=
                            "<tr>" + '<td data-label="Name">' + element.name + '</td>' +
                            '<td data-label="Price">' + element.price + '</td>' +
                            '<td data-label="Bedrooms">' + element.bedrooms + '</td>' +
                            '<td data-label="Bathrooms">' + element.bathrooms + '</td>' +
                            '<td data-label="Storeys">' + element.storeys + '</td>' +
                            '<td data-label="Garages">' + element.garages + '</td></tr>';
                    } );
                    $("#content").html(html);
                    $("table").show();
                }
            });
        });
        // $('#sortby').on('change', function() {
        //     const urlParams = new URLSearchParams(window.location.search);
        //     let page = 1;
        //     if (urlParams.has('page')) {
        //         page = urlParams.get('page');
        //     }
        //     window.location.href = window.location.origin + '/?page=' + page + '&sort=' + this.value;
        // });
    });
</script>

<?php /**PATH C:\Users\truep\Herd\houses\resources\views/welcome.blade.php ENDPATH**/ ?>