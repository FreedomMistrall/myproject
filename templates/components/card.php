<?php
    foreach ($items as $item) {
?>
<div class="col-sm-4">
    <div  class="card border-secondary mb-3" style = " max-width : 18rem;">
            <img class="card-img-top" src= <?php echo $item['img'] ?> alt="Card image cap">
            <div  class = "card-body">
                <h5  class = "card-title"> <b> <?php echo $item ['name'] ?> </b></h5>
                <p  class = "card-text" style="color:#000080"> <?php echo $description ?> </p>
                </div>
            <div  class ="card-footer bg-transparent border-secondary"><b> <?php echo $item['priceDisc'] ?></b></div>
    </div>
</div>
<?php } ?>