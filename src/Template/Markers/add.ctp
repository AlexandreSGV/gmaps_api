<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marker $marker
 */
?>

<div class="markers form large-9 medium-8 columns content">


    <script type="text/javascript">

    
        function myMap() {
            var myCenter = new google.maps.LatLng(-7.84419304,-34.910384091);
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 14};
            var map = new google.maps.Map(mapCanvas, mapOptions);

            var meuIconeFlor = {
                url: "https://image.flaticon.com/icons/png/128/346/346167.png", // url
                scaledSize: new google.maps.Size(50, 50), // scaled size
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 20),
                labelOrigin: new google.maps.Point(-11, -10)
            };


            map.addListener('click', function(event) {
                var markerLatLng = event.latLng;
                document.getElementById("lat").value = markerLatLng.lat();
                document.getElementById("lng").value = markerLatLng.lng();
                var marker = new google.maps.Marker({
                  position: markerLatLng,
                  icon: meuIconeFlor,
                  map: map,
                  title: 'Hello World!'
                });

                    });


        }
</script>

<div id="map" style="width:70%;height:500px"></div>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCvcFAuDX9XSqe9-OPBlYMhdb7FPYWD5W8&callback=myMap'); ?>

    <?= $this->Form->create($marker) ?>
    <fieldset>
        <legend><?= __('Add Marker') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
