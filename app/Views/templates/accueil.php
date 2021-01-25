<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
<div id="conteneurSlider" style="text-align: center;">
    <div class="my-slider">
        <div class="slide-item"><img src="https://i.picsum.photos/id/866/200/300.jpg?hmac=rcadCENKh4rD6MAp6V_ma-AyWv641M4iiOpe1RyFHeI" alt=""></div>
        <div class="slide-item"><img src="https://i.picsum.photos/id/866/200/300.jpg?hmac=rcadCENKh4rD6MAp6V_ma-AyWv641M4iiOpe1RyFHeI" alt=""></div>
        <div class="slide-item"><img src="https://i.picsum.photos/id/866/200/300.jpg?hmac=rcadCENKh4rD6MAp6V_ma-AyWv641M4iiOpe1RyFHeI" alt=""></div>
    </div>
</div>
<div id="conteneur">
    <a id="btnStart" class="btn btn-primary" href="<?= base_url('public/vote') ?>" role="button">Let's make a Vot'Rank !</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
    let slider = tns({
        "container": ".my-slider",
        "autoHeight": true,
        "items": 1,
        "swipeAngle": false,
        "speed": 400
    });
</script>